
CREATE OR REPLACE FUNCTION sikp.f_vat_settlement_manual_skpdkb_jabatan(
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
	 ls_payment_key VARCHAR;
	 ls_no_kohir VARCHAR;

	ln_t_gen_skpdkb_id number(5);
	ln_t_gen_skpdkb_dtl_id number(10);
	ls_debt_period_code  Varchar2(128);
	ln_p_account_status_id number(1);
	ln_p_rqst_id number(5);
	ln_customer_order_id number(10);
	ls_order_no Varchar2(16);
	ln_vat_sttle_id number(10);
	ln_increasing_charge Number(16,2);
	ln_interest_charge Number(16,2);
	ln_total_vat_amt Number(16,2);
	ld_tap_date date;
	ln_month_qty NUMBER (16,2);
	in_penalty_amt NUMBER (16,2);
	ld_jth_tempo_masa_pajak date;
	ln_tgl_jth_tempo_masa_pajak number(2);
	ln_interest_charge_month number(2);
	ls_vat_type_code varchar(32);

begin

   if trim(i_user) is null then
      o_mess := 'Session web and habis, silahkan logout dan login kembali.';
      o_cust_order_id := 0;
      return;
   end if;
	
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

		--cek apakah skpdkb jabatan sudah terbit atau belum
	 Select t_gen_skpdkb_id,tap_date into ln_t_gen_skpdkb_id,ld_tap_date
    From t_gen_skpdkb
    Where p_finance_period_id = i_finance_period_id;
   
	 if trim(ln_t_gen_skpdkb_id) is null then
      o_mess := 'SKPDKB Jabatan untuk masa pajak tersebut belum terbit atau tidak ditemukan.';
      o_cust_order_id := 0;
      return;
   end if;
	 
	 --membuat skpdkb jabatan
	 
	 --insert t_customer_order
	 Select p_rqst_type_id into ln_p_rqst_id
		   from p_rqst_type
		   where p_rqst_type_id in (7,8,9,10,11) 
			 and p_vat_type_id = (select p_vat_type_id 
														from  p_vat_type_dtl
														where p_vat_type_dtl_id = i_p_vat_type_dtl_id);

	 ln_customer_order_id := generate_id('sikp','t_customer_order','t_customer_order_id');
	 ls_order_no := f_order_no(ln_p_rqst_id);

	 INSERT INTO t_customer_order
		(t_customer_order_id, order_no, p_rqst_type_id, p_order_status_id, 
		order_date, creation_date, created_by, updated_date, updated_by)
	 VALUES (ln_customer_order_id, ls_order_no, ln_p_rqst_id , 1, 
		trunc(sysdate), sysdate, 'SYSTEM', sysdate, 'SYSTEM');

	 --insert t_vat_setllement
	 SELECT seq_vat_setllement_id.nextval  INTO ln_vat_sttle_id FROM dual; 
	 
	 --hitung pokok
	 select start_date + due_in_day -1, due_in_day into ld_jth_tempo_masa_pajak,ln_tgl_jth_tempo_masa_pajak
		from p_finance_period 
		where 
		(select end_date + 1 from p_finance_period where p_finance_period_id = i_finance_period_id)
		BETWEEN start_date and end_date;

	 ln_interest_charge_month := (DATE_PART('year', sysdate) - DATE_PART('year', ld_jth_tempo_masa_pajak))*12
															+(DATE_PART('month', sysdate) - DATE_PART('month', ld_jth_tempo_masa_pajak))
															+(case when ((DATE_PART('day', sysdate))>(ln_tgl_jth_tempo_masa_pajak)) then 1 else 0 end);
	 
	 ln_debt_vat_amt  := round(ln_pct * i_trans_amount);
	 ln_increasing_charge := ln_debt_vat_amt * 0.25;
	 ln_interest_charge := 0.02 * nvl(ln_debt_vat_amt ,0) * ln_interest_charge_month;
	 ln_total_vat_amt := nvl(ln_debt_vat_amt,0) + nvl(ln_increasing_charge,0) + ln_interest_charge;

	 ls_payment_key := f_get_payment_key_pjdl('system gen skpdkb', ls_vat_type_code);
	 select f_generate_kohir(ln_customer_order_id) into ls_no_kohir ;

	 INSERT INTO t_vat_setllement(
			       t_vat_setllement_id, t_customer_order_id, settlement_date, p_finance_period_id, 
			       t_cust_account_id, npwd, creation_date, created_by, updated_date, updated_by,
			       total_trans_amount, total_vat_amount,p_settlement_type_id,
			       debt_vat_amt ,cr_adjustment ,cr_payment , cr_others , cr_stp,
			       db_interest_charge  , db_increasing_charge , db_admin_penalty , due_date, is_settled ,
			       start_period , end_period,
			       p_vat_type_dtl_id,payment_key, no_kohir
			       )
			VALUES (ln_vat_sttle_id , ln_customer_order_id, sysdate, i_finance_period_id, 
				i_cust_account_id, i_npwd, sysdate, i_user, sysdate, i_user, 
				i_trans_amount, ln_total_vat_amt , 4,
				ln_debt_vat_amt ,  0, 0, 0, 0,                         
				ln_interest_charge, ln_increasing_charge , 0, (sysdate + 15), 'N',
				to_date(i_start_period,'dd-mm-yyyy') , to_date(i_end_period,'dd-mm-yyyy'),
				i_p_vat_type_dtl_id,ls_payment_key, ls_no_kohir
				);
	 --hitung denda
	 /*ln_month_qty := (DATE_PART('year', sysdate) - DATE_PART('year', ld_tap_date))*12
									 +(DATE_PART('month', sysdate) - DATE_PART('month', ld_tap_date));*/
	 ln_month_qty := 0;
	 in_penalty_amt := 0.02 * ln_month_qty * ln_total_vat_amt;
	 
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
						ln_vat_sttle_id,
						(ld_tap_date + 15) ,
						sysdate,
						ln_month_qty,
						ln_month_qty *2,
						round(in_penalty_amt),
						sysdate,
						i_user,
						sysdate,
						i_user
					 );

	 update t_vat_setllement 
			set total_penalty_amount = round(in_penalty_amt) 
			where t_vat_setllement_id = ln_vat_sttle_id ;

	 --insert ke t gen skpdkb dtl
	 select decode(to_char(start_date,'mm') ,
                  '01','JANUARI',
                  '02','FEBRUARI',
                  '03','MARET',
                  '04','APRIL',
                  '05','MEI',
                  '06','JUNI',
                  '07','JULI',
                  '08','AGUSTUS',
                  '09','SEPTEMBER',
                  '10','OKTOBER',
                  '11','NOPEMBER',
                  '12','DESEMBER'
                  )
	 into ls_debt_period_code
	 from p_finance_period
	 Where p_finance_period_id = i_finance_period_id;

	 ln_t_gen_skpdkb_dtl_id := generate_id('sikp','t_gen_skpdkb_dtl','t_gen_skpdkb_dtl_id');
	 insert into t_gen_skpdkb_dtl 
			 (t_gen_skpdkb_dtl_id,t_gen_skpdkb_id ,t_cust_account_id,t_vat_setllement_id,
				tap_no,tap_date,due_date,debt_amount,is_email_send,is_sms_send,
				creation_date,created_by,updated_date,updated_by,p_account_status_id,debt_period_code
			 )
		values
			 (ln_t_gen_skpdkb_dtl_id ,ln_t_gen_skpdkb_id, i_cust_account_id, ln_vat_sttle_id,
				ls_order_no, ld_tap_date,(ld_tap_date+15) , ln_total_vat_amt,null,null,
				sysdate, i_user, sysdate, i_user,ln_p_account_status_id,ls_debt_period_code
			 );
         
	 o_mess := 'Data Berhasil Disimpan dengan nomor bayar ('||ls_payment_key||')';	
	 o_cust_order_id := ln_customer_order_id;
	      
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
           o_mess := to_char(nvl(ln_result_code,-99))||' : '|| nvl(ls_result_msg,' Pembuatan SKPDKB Jabatan gagal .') ;
	end if;
	--o_mess := 'sdsd';
	o_cust_order_id := 0;
	--rollback;
	return;
end;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
