CREATE SEQUENCE sikp.seq_t_registration_no_bphtb_counter
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 99999999999999999
  START 1
  CACHE 1;


CREATE TABLE sikp.t_registration_no_bphtb_counter
(
  t_registration_no_counter_id numeric(4,0) NOT NULL,
  year_period numeric(4,0) NOT NULL,
  registration_no_type numeric(8,0) NOT NULL,
  lastcounter_no numeric(8,0) NOT NULL,
  description character varying(255),
  updated_date timestamp without time zone NOT NULL,
  updated_by character varying(32) NOT NULL,
  CONSTRAINT t_registration_no_bphtb_counter_pk PRIMARY KEY (t_registration_no_counter_id),
  CONSTRAINT t_registration_no_bphtb_counter_ak UNIQUE (year_period, registration_no_type)
)
WITH (
  OIDS=FALSE
);


CREATE OR REPLACE FUNCTION sikp.f_get_registration_no_bphtb(
    i_user_name character varying)
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
      from sikp.t_registration_no_bphtb_counter
      where year_period = ln_year
           and registration_no_type = 100;

      if ln_count = 0 then
         --recreate sequence
         DROP SEQUENCE t_bphtb_regno_seq;
         CREATE SEQUENCE t_bphtb_regno_seq
           INCREMENT 1
           MINVALUE 1
           MAXVALUE 9999999999
           START 1
           CACHE 1;

         --select sequnce
         select t_bphtb_regno_seq.nextval into ln_seq from dual;
         --insert t_peyament_key_counter
         insert into sikp.t_registration_no_bphtb_counter
            (t_registration_no_counter_id,
             year_period,
             registration_no_type,
             lastcounter_no,
             description,
             updated_date,
             updated_by
            )
         values
            (seq_t_registration_no_bphtb_counter.nextval,
             ln_year,
             100,
             ln_seq,
             null,
             sysdate,
             i_user_name
            );

         ls_return := '520813'||to_char(ln_year)||lpad(to_char(ln_seq),8,'0');

      else
         --select sequnce
         select t_bphtb_regno_seq.nextval into ln_seq from dual;

         --uodate
         update sikp.t_registration_no_bphtb_counter
         set lastcounter_no = ln_seq
         where year_period = ln_year
           and registration_no_type = 100;

         ls_return := '520813'||to_char(ln_year)||lpad(to_char(ln_seq),8,'0');
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

