CREATE OR REPLACE PROCEDURE sikp.p_gen_skpdkb_monthly(i_status_date IN timestamp without time zone, o_result_code OUT numeric, o_result_msg OUT character varying) AS
    ldt_curr_date    date;
    ln_curr_day      number(2);
    ln_count         number(8);
    ln_fin_period_id Number(8);
    ln_default_tgl_teguran1 Number(3);
    ln_default_tgl_teguran2 Number(3);
    ln_default_tgl_teguran3 Number(3);
    ln_p_rqst_id     number(3);
    ln_vat_sttle_id  Number(10);
    ln_customer_order_id number(10);
    ls_order_no          varchar2(32);
    ldt_due_date         date;
    ldt_start_date       date;
    ldt_end_date       date;
    ln_due_in_day        Number(5);
    ln_penalty_amt       Number(16,2);
    ln_total_vat_amt     Number(16,2);
    ln_result_code       number(12);
    ln_omzet             Number(16,2);
    ln_interest_charge   Number(16,2); 
    ln_increasing_charge Number(16,2);
    ln_debt_vat_amt      Number(16,2);
    ln_fin_period_id_sebelum     Number(8);
    ln_fin_period_id_max Number(8);
    ldt_max_start_date   date;
    ldt_curr_start_date  date;
    ldt_curr_end_date    date;
    ln_penalty_id        Number(10);
    ln_pct               Number(5,2);
    ln_month_qty         Number(5);
    ldt_period           date;
    ln_t_gen_skpdkb_id   Number(12);
    ln_cust_order_gen_skpdkb Number(12);
    ln_t_gen_skpdkb_dtl_id Number(12);
    ls_tap_no            Varchar2(32);
    ls_debt_period_code  Varchar2(128);
    ls_result_msg        Varchar2(500);
    ldt_date_temp        date;
	ldt_curr_date_temp   date;
	ln_p_vat_type_dtl_id Number(5);
    ls_payment_key       varchar2(32); 
    ls_no_kohir          varchar2(32);
    ls_vat_type_code varchar(32);
    /*declare
       o_result_code numeric(8);
       o_result_msg  varchar2(500);
      begin
        p_gen_skpdkb_monthly(to_date('06-05-2014','dd-mm-yyyy'), o_result_code, o_result_msg );
        dbms_output.put_line(o_result_msg);
      end;
    */
BEGIN
    o_result_code := 0;
    o_result_msg  := 'OK';
    ln_vat_sttle_id := 0;
    ln_penalty_id   := 0;
    ln_due_in_day   := 14;
		ln_default_tgl_teguran1 := 22; 
    ln_default_tgl_teguran2 := 29; 
    ln_default_tgl_teguran3 := 06;

    --cek status_date
    if i_status_date is null then
       Select trunc(sysdate), to_number(to_char(sysdate,'DD'))
       into ldt_curr_date, ln_curr_day
       from dual;
    else
       ldt_curr_date := trunc(i_status_date);
       ln_curr_day   := to_number(to_char(i_status_date,'DD'));
			 ldt_curr_date_temp := trunc(i_status_date);
    end if;
/*
		--khusus teguran 2
		if ln_curr_day<6 THEN
			ldt_curr_date_temp := add_months(ldt_curr_date,-1);
		end IF;
	*/	
		--set tanggal risil surat teguran,cocok hanya untuk teguran 3
		select 
			debt_letter_1,
			to_number(to_char(start_date-1+debt_letter_2,'DD')),
			to_number(to_char(start_date-1+debt_letter_3,'DD'))
		INTO
			ln_default_tgl_teguran1,
			ln_default_tgl_teguran2,
			ln_default_tgl_teguran3
		from p_finance_period
		where trunc(add_months(ldt_curr_date_temp,-1)) BETWEEN trunc(start_date) AND trunc(end_date) ;

    --cek apakah tgl hari ini ada dalam hari libur
    select count(*) into ln_count
    from p_special_day
    where trunc(special_date) = trunc(ldt_curr_date);

    if ln_count > 0 then
          return;
    end if;

    if ln_curr_day != ln_default_tgl_teguran3 then
			o_result_code := 404;
			o_result_msg  := 'tanggal tidak cocok-'||to_char (ldt_curr_date_temp,'dd-mm-yyyy')||'-'||ln_default_tgl_teguran3; 
			return;
    end if;
		o_result_msg  := 'OK '||ldt_curr_date;

    --get debt_period_code  2 bulan mundur dari tanggal status 
    select add_months(ldt_curr_date,-2) into ldt_period ;
    
    select p_finance_period_id , start_date , end_date , 
           decode(to_char(start_date,'mm') ,
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
    into ln_fin_period_id , ldt_curr_start_date , ldt_curr_end_date, ls_debt_period_code
    from p_finance_period
    where trunc(ldt_period) between trunc(start_date) and trunc(end_date);
    
    ldt_due_date := ldt_curr_start_date + ln_due_in_day;
    
    --delete t_vat_setllement_skpdkb;
    --delete t_vat_penalty_skpdkb;
    --delete t_customer_order_skpdkb;

    Select count(1) into ln_count
    From t_gen_skpdkb
    Where p_finance_period_id = ln_fin_period_id ;

    if ln_count > 0 then
       o_result_code := -99;
       o_result_msg  := 'SKPDKB Jabatan periode '|| to_char(ldt_curr_start_date,'mon-yyyy') ||' sudah dibuat';
       return ;
    else

    --generate laporan 
       ln_cust_order_gen_skpdkb := generate_id('sikp','t_customer_order','t_customer_order_id');
       ls_order_no := f_order_no(1);
       --ls_order_no := lpad(to_char(ln_customer_order_id),8,'0');
       -- insert order
       INSERT INTO t_customer_order
              (t_customer_order_id, order_no, p_rqst_type_id, p_order_status_id, 
	       order_date, creation_date, created_by, updated_date, updated_by)
       VALUES (ln_cust_order_gen_skpdkb, ls_order_no, 14, 1, 
	       sysdate, sysdate, 'SYSTEM', sysdate, 'SYSTEM');

       ln_t_gen_skpdkb_id := generate_id('sikp','t_gen_skpdkb','t_gen_skpdkb_id');
       --insert t_debt_letter 
       insert into t_gen_skpdkb
           (t_gen_skpdkb_id, p_settlement_type_id, t_customer_order_id, p_finance_period_id ,tap_date,
            sequence_no, letter_no , is_approve_1, is_approve_2,is_approve_3 ,
            creation_date, created_by, updated_date, updated_by
           )
       values
           (ln_t_gen_skpdkb_id,4, ln_cust_order_gen_skpdkb, ln_fin_period_id, ldt_curr_date ,
            1,null,null,null,null,
            sysdate, 'SYSTEM', sysdate, 'SYSTEM'
           );
       commit;
    end if;

    ln_customer_order_id := generate_id('sikp','t_customer_order','t_customer_order_id');
    For rec_i in 
        (select x.*
         from t_cust_account x
         where not exists (select 1 
                           from t_payment_receipt a, t_vat_setllement b 
                           where a.t_vat_setllement_id = b.t_vat_setllement_id 
                                 and b.p_finance_period_id = ln_fin_period_id
                                 and b.p_settlement_type_id <> 7
                                 and a.t_cust_account_id = x.t_cust_account_id
                                 --and a.p_vat_type_dtl_id <> 11 --(mamin)
                           )
               and x.p_account_status_id = 1
               and trunc(x.active_date) <= trunc(ldt_curr_start_date)
							 and x.p_vat_type_dtl_id not in (
																								11,
																								15,
																								41,
																								12,
																								42,
																								43,
																								30,
																								17,
																								21,
																								27,
																								31,
																								33,
																								23
																							) --(mamin) -- 10-11-2015 -- insidentil --(01-04-2016)
								and case when trunc(sysdate) < to_date('10-10-2016','dd-mm-yyyy') then (x.npwpd_jabatan != 'Y' or x.npwpd_jabatan is null)
										else TRUE		
										end--npwpd jabatan tidak mendapatkan teguran hingga oktober 2016
        )
    loop
        ln_increasing_charge := 0;
            begin
               select p_finance_period_id into ln_fin_period_id_sebelum
               from 
                  (
                   select p_finance_period_id
                   from p_finance_period
                   where start_date < (select start_date from p_finance_period where p_finance_period_id = ln_fin_period_id)
                   order by start_date desc
                  )
               where rownum < 2;
               exception
                  when others then
                     ln_fin_period_id_sebelum := null;
            end;
            
            --get max
	    --=========================================================
	    -- Cek apakah sudah ada ketetapan atau sptpd sebelumnya ?
	    --=========================================================
	    select count(*) into ln_count
	    from t_vat_setllement a
	    where a.t_cust_account_id = rec_i.t_cust_account_id
	         and p_finance_period_id = ln_fin_period_id_sebelum
	         --and p_settlement_type_id in (1,2,3,4,5,6,9)
	         and a.p_settlement_type_id = 1; --hanya sptpd saja berdasarkan perintah pak iman tgl 24/03/2015
                                 
                 
	    if ln_count > 0 then
		   --cek nilai transaksi
		   select nvl(max(total_trans_amount),0) , nvl(max(total_vat_amount),0), max(a.p_vat_type_dtl_id)
		   into ln_omzet , ln_total_vat_amt, ln_p_vat_type_dtl_id
		   from t_vat_setllement a
			 left join t_cust_account b on a.t_cust_account_id = b.t_cust_account_id
	           where a.t_cust_account_id = rec_i.t_cust_account_id
	              and p_finance_period_id = ln_fin_period_id_sebelum
	              --and p_settlement_type_id in (1,2,3,4,5,6,9);
                  and a.p_settlement_type_id = 1 --hanya sptpd saja berdasarkan perintah pak iman tgl 24/03/2015
									and a.p_vat_type_dtl_id in (select p_vat_type_dtl_id from p_vat_type_dtl where p_vat_type_id =b.p_vat_type_id); 
              
			      
		   --get p_rqt_type
		   Select p_rqst_type_id into ln_p_rqst_id
		   from p_rqst_type
		   where p_rqst_type_id in (7,8,9,10,11) 
			 and p_vat_type_id = rec_i.p_vat_type_id ;
		   
		   --ln_customer_order_id := ln_customer_order_id + 1;
		   ln_customer_order_id := generate_id('sikp','t_customer_order','t_customer_order_id');
		   ls_order_no := f_order_no(ln_p_rqst_id);
		   --ls_order_no := lpad(to_char(ln_customer_order_id),8,'0');
		   -- insert order
                   INSERT INTO t_customer_order
                     (t_customer_order_id, order_no, p_rqst_type_id, p_order_status_id, 
	              order_date, creation_date, created_by, updated_date, updated_by)
                   VALUES (ln_customer_order_id, ls_order_no, ln_p_rqst_id , 1, 
	                   ldt_curr_date, sysdate, 'SYSTEM', sysdate, 'SYSTEM');

	           
		   --ln_vat_sttle_id := ln_vat_sttle_id + 1;
		   SELECT seq_vat_setllement_id.nextval  INTO ln_vat_sttle_id FROM dual; 
		   
		   ln_debt_vat_amt  := ln_total_vat_amt ;
		   ln_increasing_charge := ln_debt_vat_amt * 0.25;
		   ln_interest_charge := 0.02 * nvl(ln_debt_vat_amt ,0);
		   ln_total_vat_amt := nvl(ln_total_vat_amt,0) + nvl(ln_increasing_charge,0) + ln_interest_charge;

		   --get vat_type_code asep 2-12-2017
		   select substr(code, 3, 2) into ls_vat_type_code 
		   from p_vat_type 
		   where p_vat_type_id = rec_i.p_vat_type_id;
		   
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
			VALUES (ln_vat_sttle_id , ln_customer_order_id, ldt_curr_date, ln_fin_period_id, 
				rec_i.t_cust_account_id, rec_i.npwd, sysdate, 'ADMIN', sysdate, 'ADMIN', 
				ln_omzet, ln_total_vat_amt , 4,
				ln_debt_vat_amt ,  0, 0, 0, 0,                         
				ln_interest_charge, ln_increasing_charge , 0, (ldt_curr_date + 15), 'N',
				ldt_curr_start_date , ldt_curr_end_date,
				nvl(rec_i.p_vat_type_dtl_id,ln_p_vat_type_dtl_id),ls_payment_key, ls_no_kohir
				);
				
		   --get penalty 
		   --select ceil(months_between(ldt_curr_date, ldt_due_date)) into ln_month_qty
	       --    from dual;
	       --    ln_pct := 0.02 * ln_month_qty ;
		      
		   --ln_penalty_amt := ln_pct * nvl(ln_total_vat_amt ,0);
		   --ln_penalty_amt := 0.2 * nvl(ln_total_vat_amt ,0);
		   --ln_month_qty := 1;
		   --insert t_penalty
		   --select t_vat_penalty_seq.nextval into ln_penalty_id from dual;
		   --ln_penalty_id := ln_penalty_id +1;
		   /*insert into t_vat_penalty
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
			  ldt_due_date ,
			  ldt_curr_date,
			  ln_month_qty ,
			  ln_pct * 100,
			  ln_penalty_amt,
			  sysdate,
			  'ADMIN',
			  sysdate,
			  'ADMIN'
			 );
		      
		   UPDATE t_vat_setllement SET
		        total_penalty_amount = nvl(ln_penalty_amt,0)
		   WHERE  t_vat_setllement_id = ln_vat_sttle_id;
		   */
	    else  --if ln_count > 0 then
	    
	      begin
	       	select max(b.start_date) into ldt_max_start_date
	        from t_vat_setllement a, p_finance_period b
	        where a.t_cust_account_id = rec_i.t_cust_account_id
	            and a.p_finance_period_id = b.p_finance_period_id
	            --and a.p_settlement_type_id in (1,2,3,4,5,6,9)
	            and a.p_settlement_type_id = 1 --hanya sptpd saja berdasarkan perintah pak iman tgl 24/03/2015
                    and b.start_date < ldt_curr_start_date
	            ;
               
	        select p_finance_period_id into ln_fin_period_id_sebelum
	        from p_finance_period
	        where start_date = ldt_max_start_date;

            select nvl(max(total_trans_amount),0) , nvl(max(total_vat_amount),0),  max(a.p_vat_type_dtl_id)
		    into ln_omzet , ln_total_vat_amt, ln_p_vat_type_dtl_id
		    from t_vat_setllement a
				left join t_cust_account b on a.t_cust_account_id = b.t_cust_account_id
	        where a.t_cust_account_id = rec_i.t_cust_account_id
	              and p_finance_period_id = ln_fin_period_id_sebelum
	              --and p_settlement_type_id in (1,2,3,4,5,6,9);
	              and a.p_settlement_type_id = 1 --hanya sptpd saja berdasarkan perintah pak iman tgl 24/03/2015
								and a.p_vat_type_dtl_id in (select p_vat_type_dtl_id from p_vat_type_dtl where p_vat_type_id =b.p_vat_type_id); 
	        
	        --get p_rqt_type
		    select p_rqst_type_id into ln_p_rqst_id
		    from p_rqst_type
		    where p_rqst_type_id in (7,8,9,10,11) 
		      and p_vat_type_id = rec_i.p_vat_type_id ;
		   
	        --ln_customer_order_id := ln_customer_order_id + 1;
	        ln_customer_order_id := generate_id('sikp','t_customer_order','t_customer_order_id');
		    ls_order_no := f_order_no(ln_p_rqst_id);
		   --ls_order_no := lpad(to_char(ln_customer_order_id),8,'0');
		   -- insert order
            INSERT INTO t_customer_order
            (t_customer_order_id, order_no, p_rqst_type_id, p_order_status_id, 
	        order_date, creation_date, created_by, updated_date, updated_by)
            VALUES (ln_customer_order_id, ls_order_no, ln_p_rqst_id , 1, 
	        ldt_curr_date, sysdate, 'SYSTEM', sysdate, 'SYSTEM');

	           
		   
		   SELECT seq_vat_setllement_id.nextval  INTO ln_vat_sttle_id FROM dual; 
		   --ln_vat_sttle_id := ln_vat_sttle_id + 1;

		   ln_debt_vat_amt  := ln_total_vat_amt ;
		   ln_increasing_charge := ln_debt_vat_amt * 0.25;
		   ln_interest_charge := 0.02 * nvl(ln_debt_vat_amt ,0);
		   ln_total_vat_amt := nvl(ln_total_vat_amt,0) + nvl(ln_increasing_charge,0) + ln_interest_charge;

		   --get vat_type_code asep 2-12-2017
		   select substr(code, 3, 2) into ls_vat_type_code 
		   from p_vat_type 
		   where p_vat_type_id = rec_i.p_vat_type_id;
		   
		   ls_payment_key := f_get_payment_key_pjdl('system gen skpdkb', ls_vat_type_code);
		   select f_generate_kohir(ln_customer_order_id) into ls_no_kohir ;
		   
		INSERT INTO t_vat_setllement(
			       t_vat_setllement_id, t_customer_order_id, settlement_date, p_finance_period_id, 
			       t_cust_account_id, npwd, creation_date, created_by, updated_date, updated_by,
			       total_trans_amount, total_vat_amount,p_settlement_type_id,
			       debt_vat_amt ,cr_adjustment ,cr_payment , cr_others , cr_stp,
			       db_interest_charge  , db_increasing_charge , db_admin_penalty , due_date, is_settled ,
			       start_period , end_period,
			       p_vat_type_dtl_id,
			       payment_key, no_kohir
			       )
		VALUES (ln_vat_sttle_id , ln_customer_order_id, ldt_curr_date, ln_fin_period_id, 
				rec_i.t_cust_account_id, rec_i.npwd, sysdate, 'ADMIN', sysdate, 'ADMIN', 
				ln_omzet, ln_total_vat_amt , 4,
				ln_debt_vat_amt ,  0, 0, 0, 0,                         
				ln_interest_charge, ln_increasing_charge , 0, (ldt_curr_date+15), 'N',
				ldt_curr_start_date , ldt_curr_end_date,
				nvl(rec_i.p_vat_type_dtl_id,ln_p_vat_type_dtl_id),
				ls_payment_key, ls_no_kohir
				);
	        
	        --get penalty 
		   /*select ceil(months_between(ldt_curr_date, ldt_due_date)) into ln_month_qty
	           from dual;
	           ln_pct := 0.02 * ln_month_qty ;
		      
		   ln_penalty_amt := ln_pct * nvl(ln_total_vat_amt ,0);
		   --insert t_penalty
		   select t_vat_penalty_seq.nextval into ln_penalty_id from dual;
		   --ln_penalty_id := ln_penalty_id +1;
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
			  ldt_due_date ,
			  ldt_curr_date,
			  ln_month_qty ,
			  ln_pct * 100,
			  ln_penalty_amt,
			  sysdate,
			  'ADMIN',
			  sysdate,
			  'ADMIN'
			 );
		      
		   UPDATE t_vat_setllement SET
		        total_penalty_amount = nvl(ln_penalty_amt,0)
		   WHERE  t_vat_setllement_id = ln_vat_sttle_id;*/
		   
	        exception 
	           when others then
	              null;
	      end;   
	    end if; --if ln_count > 0
        commit;
    end loop;

    --loop detl skpdkb jabatan
    ln_t_gen_skpdkb_dtl_id := generate_id('sikp','t_gen_skpdkb_dtl','t_gen_skpdkb_dtl_id');
           
       for rec_i in ( Select b.t_cust_account_id, b.p_vat_type_id, b.p_account_status_id, c.order_no, 
                      --(a.total_vat_amount +  a.db_interest_charge + a.db_increasing_charge) as debt_amount , a.t_vat_setllement_id ,
											(a.total_vat_amount ) as debt_amount , a.t_vat_setllement_id ,
                      a.settlement_date
                      from t_vat_setllement a, t_cust_account b, t_customer_order c
                      where p_finance_period_id = ln_fin_period_id
                            and p_settlement_type_id = 4
                            and a.t_cust_account_id = b.t_cust_account_id
                            and a.t_customer_order_id = c.t_customer_order_id 
                    )
       loop
          ls_tap_no := rec_i.order_no;
          insert into t_gen_skpdkb_dtl 
             (t_gen_skpdkb_dtl_id,t_gen_skpdkb_id ,t_cust_account_id,t_vat_setllement_id,
              tap_no,tap_date,due_date,debt_amount,is_email_send,is_sms_send,
              creation_date,created_by,updated_date,updated_by,p_account_status_id,debt_period_code
             )
          values
             (ln_t_gen_skpdkb_dtl_id ,ln_t_gen_skpdkb_id, rec_i.t_cust_account_id, rec_i.t_vat_setllement_id,
              ls_tap_no, rec_i.settlement_date,(ldt_curr_date+15) , rec_i.debt_amount,null,null,
              sysdate, 'SYSTEM', sysdate, 'SYSTEM',rec_i.p_account_status_id,ls_debt_period_code
             );

          ln_t_gen_skpdkb_dtl_id := ln_t_gen_skpdkb_dtl_id + 1;
          
       end loop;
       commit;

       select o_result_code, o_result_msg 
       into ln_result_code , ls_result_msg
       from f_first_submit_engine(506,--IN i_doc_type_id numeric,
                                  ln_cust_order_gen_skpdkb,--IN i_cust_order_id numeric, 
                                  'ADMIN'--IN i_username character varying
                                  );
       if o_result_code = 0 then
	       for rec_i in 
		   (
		     select b.t_customer_order_id--, a.* 
		     from t_gen_skpdkb_dtl a, t_vat_setllement b
		     where a.t_gen_skpdkb_id = ln_t_gen_skpdkb_id
			 and a.t_vat_setllement_id = b.t_vat_setllement_id
		   )
	       loop
		    select o_result_code, o_result_msg 
				into o_result_code , o_result_msg
		    from f_first_submit_engine_2step(501,--IN i_doc_type_id numeric,
						     rec_i.t_customer_order_id,--IN i_cust_order_id numeric, 
						     'admin'--IN i_username character varying
				       ); 
	       end loop;
        end if;
    EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.PUT_LINE('SQLERRM: ' || SQLERRM);
            DBMS_OUTPUT.PUT_LINE('SQLCODE: ' || SQLCODE);
            o_result_code := -999;
            o_result_msg  := SQLERRM;
            
END

