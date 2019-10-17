CREATE OR REPLACE FUNCTION sikp.f_get_payment_key_pjdl(i_user_name character varying, i_vat_type_code character varying)
  RETURNS character varying AS
$BODY$
   ls_return  varchar2(32);
   ln_year    number(4);
   ln_count   number(10);
   ln_seq     Number(10);
   ls_error   varchar(500);
begin
      select to_number(to_char(sysdate,'yy')) into ln_year;
      --cek year
      select count(1) into ln_count 
      from t_payment_key_counter 
      where year_period = ln_year 
           and payment_key_type = 100;
      if ln_count = 0 then
         --recreate sequence
         DROP SEQUENCE seq_payment_key_pjdl;
         CREATE SEQUENCE seq_payment_key_pjdl
           INCREMENT 1
           MINVALUE 1
           MAXVALUE 9999999999
           START 1
           CACHE 1;
           
         --select sequence
         select seq_payment_key_pjdl.nextval into ln_seq from dual;
         --insert t_peyament_key_counter
         insert into t_payment_key_counter
            (t_payment_key_counter_id,
             year_period,
             payment_key_type,
             lastcounter_no,
             description,
             updated_date,
             updated_by
            )
         values
            (seq_t_payment_key_counter.nextval,
             ln_year,
             100,
             ln_seq,
             null,
             sysdate,
             i_user_name
            );
         --ls_return := '00'||to_char(ln_year)||lpad(to_char(ln_seq),8,'0');
         ls_return := '5208'||i_vat_type_code||to_char(ln_year)||lpad(to_char(ln_seq),8,'0');
         
      else
         --select sequnce
         select seq_payment_key_pjdl.nextval into ln_seq from dual;
         --uodate 
         update t_payment_key_counter
         set lastcounter_no = ln_seq
         where year_period = ln_year 
           and payment_key_type = 100;
         --ls_return := '00'||to_char(ln_year)||lpad(to_char(ln_seq),8,'0');
         ls_return := '5208'||i_vat_type_code||to_char(ln_year)||lpad(to_char(ln_seq),8,'0');
      end if;
      return ls_return;
   exception
     when others then
        ls_error := sqlerrm;
        ls_return := null;
        return ls_error;

end$BODY$
  LANGUAGE edbspl VOLATILE SECURITY DEFINER
  COST 100;

