
CREATE OR REPLACE FUNCTION sikp.f_vat_settlement_manual_new(
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
	 ada2 int;
	 tipe_ayat_cek int;
   skpdkb_terbit int;
   v_start_date date;
   v_end_date date;
   id_vat int;
   v_trans_amount number;
   v_vat_amount number;
   i record;
   v_customer_order_id number;
   v_order_no varchar2;
   
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
	 
	 ldt_active_date_acc  date;

   ln_pct_class     Number(6,3);

	 no_block BOOLEAN;
	 is_insidentil BOOLEAN;
	 ls_payment_key VARCHAR;
	 ls_no_kohir VARCHAR;

	 payment_key_expired_date DATE;
	 ls_flag_message VARCHAR;
	 ls_vat_type_code varchar(32);
   
begin
   ls_is_settled := 'N'; 
   if trim(i_user) is null then
      o_mess := 'Session web and habis, silahkan logout dan login kembali.';
      o_cust_order_id := 0;
      return;
   end if;
   
   ln_settlement_type_id := 1;
   ls_is_settled := 'N';
   --get Vat pct 
   ln_pct := 0.1 ;

   begin 
	
      select nvl(vat_pct,10)/100  into ln_pct 
      from p_vat_type_dtl 
      where p_vat_type_dtl_id = i_p_vat_type_dtl_id;

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
             o_mess := 'Format tanggal awal masa pajak tidak sesuai, gunakan format dd-mm-yyyy '||i_start_period;
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
     if ln_vat_type_id is null then
        ln_vat_type_id := 1;
     end if;
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

     SELECT COUNT(*) into tipe_ayat_cek
	   FROM t_vat_setllement vat_s
	   WHERE vat_s.t_cust_account_id = i_cust_account_id
	       and vat_s.p_finance_period_id = i_finance_period_id
	       and p_vat_type_dtl_id is null;
		 if tipe_ayat_cek > 0 then 
					o_mess := 'Pajak Pada Periode ini Sudah Terdaftar Tetapi Ayat Pajak Belum Terdaftar';
	            o_cust_order_id := 0;
	            return;
		 end if;

			
			SELECT count(*)INTO ada2 
			 FROM t_vat_setllement 
			 WHERE t_cust_account_id = i_cust_account_id
					 and p_finance_period_id = i_finance_period_id
					 and p_vat_type_dtl_id = i_p_vat_type_dtl_id
					 and (trunc(ldt_start_ms_pjk) between trunc(start_period) and trunc(end_period));	
		 

		/*SELECT count(*)INTO ada 
			 FROM t_vat_setllement sett,t_payment_receipt rec,p_finance_period f_per 
			 WHERE sett.t_cust_account_id = i_cust_account_id
					 --and sett.p_vat_type_dtl_id = i_p_vat_type_dtl_id
					 and sett.p_finance_period_id = f_per.p_finance_period_id
					 and f_per.end_date < (select start_date from p_finance_period where p_finance_period_id = i_finance_period_id)
					 and f_per.start_date >= '01-01-2013'  pengecekan untuk setelah tahun 2013
					 and sett.t_vat_setllement_id = rec.t_vat_setllement_id (+)
					 and (rec.receipt_no is null OR rec.receipt_no = '')
					 and sett.p_settlement_type_id <> 7;*/
			-----------------------------------------------------------------------------
			------------------------------BLOCK PIUTANG----------------------------------
			-----------------------------------------------------------------------------
			select i_p_vat_type_dtl_id= any('{15,17,21,27,30,41,42,43}'::int[]) OR ('F' = (select block_status from p_block_piutang)),i_p_vat_type_dtl_id= any('{15,17,21,27,30,41,42,43}'::int[]) into no_block,is_insidentil;
			if no_block=false then
					select active_date into ldt_active_date_acc from t_cust_account where t_cust_account_id = i_cust_account_id;
					SELECT count(*) into ada
					 FROM p_finance_period f_per,
								(select sett.p_finance_period_id,receipt_no,sett.t_vat_setllement_id
								 from
									t_vat_setllement sett,t_payment_receipt rec
									WHERE sett.t_cust_account_id = i_cust_account_id
									and sett.t_vat_setllement_id = rec.t_vat_setllement_id (+)
									and sett.p_settlement_type_id <> 7) as x
							where f_per.p_finance_period_id = x.p_finance_period_id(+)
							and f_per.end_date < (select start_date from p_finance_period where p_finance_period_id = i_finance_period_id)
							and f_per.start_date >= '01-01-2013'
							and f_per.start_date >= ldt_active_date_acc

							--and (f_per.start_date >= '01-01-2013'
							--OR f_per.start_date >= ldt_active_date_acc)
							
							and (receipt_no is null or receipt_no ='')
							and (t_vat_setllement_id is not null)
						;
					if ada > 0 THEN
							 o_mess := 'Maaf, masih terdapat ' || ada || ' periode pembayaran yang belum diselesaikan';
									o_cust_order_id := 0;
									return;
					END IF;
			end if;
			
	   if ada+ada2 > 0 then    
	       
	        SELECT count(*)INTO skpdkb_terbit 
	        FROM t_vat_setllement 
	        WHERE t_cust_account_id = i_cust_account_id
	            and p_finance_period_id = i_finance_period_id
	            and p_settlement_type_id = 4;	
	        
	        if skpdkb_terbit > 0 then
	            o_mess := 'Data SKPDKB periode '||ls_periode||' sudah terbit. Silahkan hubungi bagian piutang. ';
	            o_cust_order_id := 0;
	            return;
	        end if;
	        
	   end if;    

	else
           ada := 0; --untuk katering / mamin boleh masuk beberapa kali 
	end if;

	IF ada2 > 0  and not is_insidentil THEN		
	   
	   o_mess := 'Data SPTPD periode '||ls_periode||' sudah dibuat ';
	   o_cust_order_id := 0;
	   return;
		
	ELSE
           	
	   SELECT seq_vat_setllement_id.nextval 
	   INTO id_vat FROM dual;				

	   v_customer_order_id := generate_id('sikp','t_customer_order','t_customer_order_id');
	   v_order_no := f_order_no(ln_rqst_type_id);
       
	   --request dari pa iman tanggal 24 desember 2014, nilai transaksi tidak 0 jika bulan desember. syarat untuk bulan yg lain kembali ke < 10000000
       --if i_trans_amount < 0 then --request dari pa yogi tanggal 23 desember 2014 asalnya < 10000000
	   if i_trans_amount < 10000000 then
            --ditunda dulua sampai aturan nya jelas
            /*base on email 12-mar-2014*/
			--if (extract(MONTH from to_date(i_start_period,'dd-mm-yyyy'))!=12) then
				if i_p_vat_type_dtl_id IN (9,10) then
					v_vat_amount := 0 ;
				
				else 
					v_vat_amount := round(nvl(i_trans_amount,0) * ln_pct) ;
				end if;
            --end if; 
       else
            v_vat_amount := round(nvl(i_trans_amount,0) * ln_pct) ;
       end if;
       
       if v_vat_amount = 0 then
            ls_is_settled := 'Y';
            ln_settlement_type_id := 3;        
       end if;
       
	   INSERT INTO t_customer_order(
		       t_customer_order_id, order_no, p_rqst_type_id, p_order_status_id, 
		       order_date, creation_date, created_by, updated_date, 
		       updated_by)
	       VALUES (v_customer_order_id, v_order_no, ln_rqst_type_id, 1, 
		      sysdate, sysdate, i_user, sysdate,
		      i_user);
        --generate payment_key
        ls_payment_key := f_get_payment_key_pjdl(i_user, ls_vat_type_code);
        ls_no_kohir := f_generate_kohir(v_customer_order_id);


			--payment key berlaku hingga tgl jatuh tempo atau di akhir bulan
		 select 
				case 
					when trunc(sysdate) <= (a.start_date - 1 + a.due_in_day)
						then a.start_date - 1 + a.due_in_day
					else (
						select b.start_date - 1 + b.due_in_day from p_finance_period b where (a.end_date + 1) BETWEEN b.start_date and b.end_date
						)
				end 
			into payment_key_expired_date
			from p_finance_period a
			where trunc(sysdate) BETWEEN a.start_date and a.end_date;

	   INSERT INTO t_vat_setllement(
		       t_vat_setllement_id, t_customer_order_id, settlement_date, p_finance_period_id, 
		       t_cust_account_id, npwd, creation_date, created_by, updated_date, updated_by,
		       total_trans_amount, total_vat_amount,p_settlement_type_id , is_settled, doc_no, p_vat_type_dtl_id, payment_key, payment_due_day,no_kohir)
	        VALUES (id_vat, v_customer_order_id, sysdate, i_finance_period_id, 
		        i_cust_account_id, i_npwd, sysdate, i_user, sysdate, i_user, 
		        i_trans_amount, v_vat_amount, ln_settlement_type_id , ls_is_settled,v_order_no,i_p_vat_type_dtl_id, ls_payment_key, to_date(to_char(payment_key_expired_date,'dd-MM-yyyy')||' 23:59:59','dd-MM-yyyy HH24:mi:ss'),ls_no_kohir);
		        
           --get due_dat 
           ln_due_in_day := 14;
           
           begin
              /*select due_in_day into ln_due_in_day
              from p_settlement_due_date 
              where p_vat_type_id = ln_vat_type_id 
                    and sysdate > trunc(valid_from)
                    and (valid_to is null or valid_to > sysdate)
                    and rownum < 2; */
							select masa_lapor.due_in_day into ln_due_in_day 
							from p_finance_period masa_pajak
							left join p_finance_period masa_lapor on add_months(masa_pajak.start_date,1) BETWEEN masa_lapor.start_date and masa_lapor.end_date
							where masa_pajak.p_finance_period_id = i_finance_period_id;
                    
              if ln_due_in_day is null then
                 ln_due_in_day := 14;
              end if;
              
              exception
                 when others then
                    ln_due_in_day := 14;
           end;         
           
	   SELECT start_date, end_date
	   INTO   v_start_date, v_end_date
	   FROM   p_finance_period 
	   WHERE  p_finance_period_id = i_finance_period_id;	        

           ldt_due_date := add_months(v_start_date,1) + ln_due_in_day -1;
	   	
	   
	   UPDATE t_vat_setllement SET
		  total_trans_amount = nvl(i_trans_amount,0),
		  total_vat_amount = v_vat_amount,
		  debt_vat_amt = ln_debt_vat_amt,
	          cr_adjustment = 0,
	          cr_payment = 0,
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

	      /*
	      --cari persentasi penalty 
	      begin
	        select penalty_pct / 100 into ln_pct
	        from p_vat_penalty 
	        where p_vat_type_id = ln_vat_type_id 
	              and month_qty = ln_month_qty ;
	        if ln_pct is null then
	           --jika tidak ketemu maka jumlah denda = 0.02 * jumlah bulan keterlambatan 
	           ln_pct := 0.02 * ln_month_qty ;
	        end if;
	        exception
	           when others then
	              --jika tidak ketemu maka jumlah denda = 0.02 * jumlah bulan keterlambatan 
	              ln_pct := 0.02 * ln_month_qty ;
	      end;
	      */
				 if i_p_vat_type_dtl_id not in (11,33) then
						ln_pct := 0.02 * ln_month_qty ;
						
						ln_penalty_amt := round(ln_pct * nvl(v_vat_amount,0));
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

		 --kalau nihil langsung FLAG
		 if v_vat_amount = 0 then	
					ls_payment_key :=f_get_payment_key_pjdl(i_user, ls_vat_type_code);
					update t_vat_setllement set payment_key = ls_payment_key where t_vat_setllement_id = id_vat;
					select f_payment_manual_paymentkey_v2(v_customer_order_id, 'SYSTEM', 2) into ls_flag_message;
					o_mess := 'Data Berhasil Disimpan dengan nomor order ('||v_order_no||'), dan telah di Flag secara otomatis (SKPDN)';	
					o_cust_order_id := v_customer_order_id;
					RETURN;
		 end if;
           
	   o_mess := 'Data Berhasil Disimpan dengan nomor order ('||v_order_no||')';	
	   o_cust_order_id := v_customer_order_id;
	END IF;
	      
      return; 
exception     
when others then
	o_mess := sqlerrm;
	if o_mess is null then
           o_mess := to_char(ln_result_code)||' : '|| ls_result_msg ;
	end if;
	--o_mess := 'sdsd';
	o_cust_order_id := 0;
	--rollback;
	return;
end;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

