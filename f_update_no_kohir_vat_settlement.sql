CREATE OR REPLACE FUNCTION sikp.f_update_no_kohir_vat_settlement(
    i_vat_setllement_id numeric,
    i_no_kohir character varying,
    ln_user_name character varying)
  RETURNS character varying AS
$BODY$
DECLARE
	ls_vat_payment_key varchar2;
	ls_payment_key varchar(32);
	ls_vat_type_code varchar(32);
BEGIN
	/*select payment_key into ls_vat_payment_key
	from t_vat_setllement 
	where t_vat_setllement_id = i_vat_setllement_id;*/

	/*update asep 2-12-2017*/
	select a.payment_key, substr(c.code, 3, 2) 
	into ls_vat_payment_key, ls_vat_type_code
	from  t_vat_setllement a
	inner join p_vat_type_dtl b on a.p_vat_type_dtl_id = b.p_vat_type_dtl_id
	inner join p_vat_type c on b.p_vat_type_id = c.p_vat_type_id
	where t_vat_setllement_id = i_vat_setllement_id;

	if nvl(length(ls_vat_payment_key),0)<1 THEN
		ls_payment_key :=f_get_payment_key_pjdl(ln_user_name, ls_vat_type_code);
		update t_vat_setllement
		set payment_key = ls_payment_key
		where t_vat_setllement_id = i_vat_setllement_id;
	end if;

	UPDATE t_vat_setllement
	SET no_kohir = i_no_kohir
	WHERE t_vat_setllement_id = i_vat_setllement_id;	

	if nvl(length(ls_payment_key),0) = 0 THEN 
		RETURN ls_vat_payment_key;
	else
		RETURN ls_payment_key;
	end if;
END$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
