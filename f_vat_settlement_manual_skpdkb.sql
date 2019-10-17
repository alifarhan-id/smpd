CREATE OR REPLACE FUNCTION sikp.f_vat_settlement_manual_skpdkb(
    IN i_cust_account_id numeric,
    IN i_finance_period_id numeric,
    IN i_npwd character varying,
    IN i_start_period character varying,
    IN i_end_period character varying,
    IN i_qty_room_sold numeric,
    IN i_trans_amount numeric,
    IN i_p_vat_type_dtl_id numeric,
    IN i_p_vat_type_dtl_cls_id numeric,
    IN i_user character varying,
    OUT o_cust_order_id numeric,
    OUT o_mess character varying)
  RETURNS record AS
$BODY$
declare
   ada int;
   v_start_date date;
   v_end_date date;
   id_vat int;
   v_trans_amount number;
   v_vat_amount number;
   i record;
   v_customer_order_id number;
   v_order_no varchar2;

   temp_vat_setllement_id number;
   temp_payment_vat_amount number;
   
   ln_month_qty Number(5);
   ln_vat_type_id Number(5);
   ln_due_in_day  Number(5);
   ldt_due_date   date;
   ln_pct         Number(5,2);
   ln_penalty_amt Number(16,2);
   ln_penalty_id  Number(8);
   ldt_start_date date;
   ldt_end_date   date;
   ln_count       Number(6);
   ld_total_hari   Number(3);
   ls_periode     varchar2(32);

   ln_debt_vat_amt Number(16,2);
   ln_settlement_type_id Number(3);
   ls_is_settled   varchar2(1);
   ln_rqst_type_id    Number(3);
   ln_trans_qty    Number(8);
   ln_result_code  Number(10);
   ls_result_msg   Number(500);
   
   ldt_start_ms_pjk date;
   ldt_end_ms_pjk   date;
   ln_pct_class     Number(5,2);

   ln_total_vat_amount Number(16,2);
	 payment_key VARCHAR;
	 ls_no_kohir VARCHAR;
   ls_vat_type_code varchar(32);

begin

   if trim(i_user) is null then
      o_mess := 'Session web and habis, silahkan logout dan login kembali.';
      o_cust_order_id := 0;
      return;
   end if;
   
   ln_settlement_type_id := 2;
   ls_is_settled := 'N';
   --get Vat pct 
   ln_pct := 0.1 ;
   
   ln_debt_vat_amt := 0;
    
   begin 
      /*
      select nvl(vat_pct,10)/100  into ln_pct 
      from p_vat_type_dtl 
      where p_vat_type_dtl_id = i_p_vat_type_dtl_id;
      */

      /*asep*/
      select nvl(a.vat_pct,10)/100, substr(b.code, 3, 2)
      into ln_pct, ls_vat_type_code
      from p_vat_type_dtl a
      inner join p_vat_type b on a.p_vat_type_dtl_id = b.p_vat_type_dtl_id
      where a.p_vat_type_dtl_id = i_p_vat_type_dtl_id;
      
      exception 
         when others then
             o_mess := 'Pengaturan presentase pajak belum ditentukan.';
	     o_cust_order_id := 0;
	     return;
   end ;
   
   if i_p_vat_type_dtl_cls_id is not null then 
      begin
         select nvl(vat_pct,10)/100  into ln_pct_class 
         from p_vat_type_dtl_cls 
         where p_vat_type_dtl_cls_id = i_p_vat_type_dtl_cls_id;
         exception 
            when others then
               ln_pct_class := 0;
      end;
   end if;

   if ln_pct_class > 0 then
      ln_pct := ln_pct_class;
   end if;


   if ln_pct is null then
      o_mess := 'Pengaturan presentase pajak belum ditentukan.';
	     o_cust_order_id := 0;
	     return;  
   end if;
   
   --validate input :
   begin
      ldt_start_ms_pjk := to_date(i_start_period,'dd-mm-yyyy');
      exception 
         when others then
             o_mess := 'Format tanggal awal masa pajak tidak sesuai, gunakan format dd-mm-yyyy ';
	     o_cust_order_id := 0;
	     return;
   end ;
   
   if (trim(i_end_period) is null ) or length(trim(i_end_period))= 0 then
             o_mess := 'Akhir masa pajak harus diisi ';
	     o_cust_order_id := 0;
	     return;
   end if;
      
   begin
      ldt_end_ms_pjk := to_date(i_end_period,'dd-mm-yyyy');
      exception 
         when others then
             o_mess := 'Format tanggal akhir masa pajak tidak sesuai, gunakan format dd-mm-yyyy ';
	     o_cust_order_id := 0;
	     return;
   end ;
   
   --get_cust_account_info 
   begin
     select p_vat_type_id into ln_vat_type_id
     from t_cust_account
     where  t_cust_account_id = i_cust_account_id;
    
     exception
       when others then
         o_mess := 'Data NPWPD tidak ditemukan';
         o_cust_order_id := 0;
         return ;
   end;

   --get re
   begin
      select b.p_rqst_type_id into ln_rqst_type_id 
      from p_rqst_type_doc_type_map a, p_rqst_type b
      where a.p_rqst_type_id = b.p_rqst_type_id
         and b.p_vat_type_id = ln_vat_type_id
         and a.p_document_type_id = 501  --pelaporan pajak 
         and rownum < 2
         ; 

      exception
         when others then
            o_mess := 'Jenis Permohonan Lapoarn Pajak tidak ditemukan';
            o_cust_order_id := 0;
            return ;
   end;
     
   --cek period 
   if i_finance_period_id is not null then
           begin
              Select code, trunc(start_date), last_day(start_date) , to_number(to_char(last_day(start_date),'DD'))
              into ls_periode, ldt_start_date, ldt_end_date, ld_total_hari
              from p_finance_period
              where p_finance_period_id = i_finance_period_id ;
              exception
                 when others then 
                    o_mess := 'Data periode '||to_char(i_finance_period_id)||' tidak ditemukan ';
	            o_cust_order_id := 0;
	            return;
           end;
   end if;

    if i_p_vat_type_dtl_id <> 11 then
	   --cek apakah data sudah ada atau belum 
	   SELECT count(*)INTO ada 
	   FROM t_vat_setllement 
	   WHERE t_cust_account_id = i_cust_account_id
	       and p_finance_period_id = i_finance_period_id
	       and p_vat_type_dtl_id = i_p_vat_type_dtl_id ;	

	else
           ada := 0; --untuk katering / mamin boleh masuk beberapa kali 
	end if;

	IF ada > 0 THEN		
	   /*		
	   SELECT t_vat_setllement_id into temp_vat_setllement_id
	   FROM t_vat_setllement 
       WHERE t_cust_account_id = i_cust_account_id
	           and p_finance_period_id = i_finance_period_id
	           and p_vat_type_dtl_id = i_p_vat_type_dtl_id 
	   and rownum < 2 
	   ORDER BY t_vat_setllement_id DESC;
	   	*/
	   
	   SELECT nvl(sum(a.payment_vat_amount),0) into temp_payment_vat_amount
	   FROM t_payment_receipt a
	   WHERE exists (select 1 
	                 FROM t_vat_setllement x
                         WHERE x.t_cust_account_id = i_cust_account_id
	                       and p_finance_period_id = i_finance_period_id
	                       and p_vat_type_dtl_id = i_p_vat_type_dtl_id 
	                       and x.t_vat_setllement_id = a.t_vat_setllement_id
	                );
	             	
	   SELECT seq_vat_setllement_id.nextval 
	   INTO id_vat FROM dual;				

	   v_customer_order_id := generate_id('sikp','t_customer_order','t_customer_order_id');
	   v_order_no := f_order_no(ln_rqst_type_id);

           ln_debt_vat_amt := round(ln_pct * i_trans_amount);
           
	   INSERT INTO t_customer_order(
		       t_customer_order_id, order_no, p_rqst_type_id, p_order_status_id, 
		       order_date, creation_date, created_by, updated_date, 
		       updated_by)
	       VALUES (v_customer_order_id, v_order_no, ln_rqst_type_id, 1, 
		      sysdate, sysdate, i_user, sysdate,
		      i_user);

           ln_total_vat_amount := round(ln_pct * i_trans_amount);

		 payment_key := f_get_payment_key_pjdl(i_user, ls_vat_type_code);
     ls_no_kohir := f_generate_kohir(v_customer_order_id);
	   INSERT INTO t_vat_setllement(
		       t_vat_setllement_id, t_customer_order_id, settlement_date, p_finance_period_id, 
		       t_cust_account_id, npwd, creation_date, created_by, updated_date, updated_by,
		       total_trans_amount, total_vat_amount,p_settlement_type_id , is_settled, doc_no, p_vat_type_dtl_id,payment_key,no_kohir)
	        VALUES (id_vat, v_customer_order_id, sysdate, i_finance_period_id, 
		        i_cust_account_id, i_npwd, sysdate, i_user, sysdate, i_user, 
		        i_trans_amount, ln_total_vat_amount , ln_settlement_type_id , 'N',v_order_no,i_p_vat_type_dtl_id,payment_key,ls_no_kohir);
		        
           --get due_dat 
           ln_due_in_day := 14;
           
           
	   SELECT start_date, end_date
	   INTO   v_start_date, v_end_date
	   FROM   p_finance_period 
	   WHERE  p_finance_period_id = i_finance_period_id;	        

       ldt_due_date := add_months(v_start_date,1) + ln_due_in_day ;
	   	
	   v_vat_amount := round(nvl(i_trans_amount,0) * ln_pct) ;
	   UPDATE t_vat_setllement SET
		  total_trans_amount = nvl(i_trans_amount,0),
		  total_vat_amount = nvl(v_vat_amount,0) - nvl(temp_payment_vat_amount,0),
		  debt_vat_amt = ln_debt_vat_amt,
	          cr_adjustment = 0,
	          cr_payment = temp_payment_vat_amount,
	          cr_others  = 0,
	          cr_stp     = ln_debt_vat_amt,
              p_settlement_type_id = ln_settlement_type_id,
              is_settled = ls_is_settled,
	          due_date = ldt_due_date,
	          start_period = ldt_start_ms_pjk, 
	          end_period = ldt_end_ms_pjk,
	          qty_room_sold = i_qty_room_sold
	   WHERE  t_vat_setllement_id = id_vat;
	   
	   --=============================================================
	   --hitung denda jika ada 
	   --=============================================================
	   --cek apakah tgl hari ini > dari due_date 
	   if trunc(sysdate) > trunc(ldt_due_date ) then
	      --cari jumlah bulan keterlambatan bulatkan keatas
	      select ceil(months_between(sysdate, ldt_due_date)) into ln_month_qty
	      from dual;

	          if i_p_vat_type_dtl_id <> 11 then
		      ln_pct := 0.02 * ln_month_qty ;

		       
		      ln_penalty_amt := round(ln_pct * nvl(v_vat_amount - temp_payment_vat_amount,0));
		      --insert t_penalty
		      select t_vat_penalty_seq.nextval into ln_penalty_id from dual;
		      insert into t_vat_penalty 
			 (
			  t_vat_penalty_id   ,
			  t_vat_setllement_id,
			  start_penalty      ,
			  end_penalty        ,
			  month_qty          ,
			  penalty_pct        ,
			  penalty_amt        ,
			  creation_date      ,
			  created_by         ,
			  updated_date       ,
			  updated_by         
			  )
		      values
			 (ln_penalty_id ,
			  id_vat,
			  ldt_due_date ,
			  sysdate,
			  ln_month_qty ,
			  ln_pct * 100,
			  round(ln_penalty_amt),
			  sysdate,
			  i_user,
			  sysdate,
			  i_user
			 );
		      
		       UPDATE t_vat_setllement SET
			  total_penalty_amount = round(nvl(ln_penalty_amt,0))
		       WHERE  t_vat_setllement_id = id_vat;

	        end if;
	   end if;
           
	   o_mess := 'Data Berhasil Disimpan dengan nomor order ('||v_order_no||')';	
	   o_cust_order_id := v_customer_order_id;
	END IF;
	      
      return; 
exception     
when others then
	o_mess := sqlerrm;
	ls_result_msg := sqlerrm;
	ln_result_code := -99;
	if ln_total_vat_amount is null then
            o_mess := o_mess ||' total vat amount null';
        else 
            o_mess := o_mess || to_char(ln_total_vat_amount);
	end if;
	if o_mess is null then
           o_mess := to_char(nvl(ln_result_code,-99))||' : '|| nvl(ls_result_msg,' Pembuatan SKPDKB penelitian gagal .') ;
	end if;
	--o_mess := 'sdsd';
	o_cust_order_id := 0;
	--rollback;
	return;
end;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
