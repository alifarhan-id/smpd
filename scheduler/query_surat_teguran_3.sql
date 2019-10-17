declare
	o_result_code numeric; 
	o_result_msg varchar;
begin
	p_test_debt_letter_3_and_skpdkb_monthly(sysdate,o_result_code,o_result_msg);
	DBMS_OUTPUT.PUT_LINE('code: ' || o_result_code);
	DBMS_OUTPUT.PUT_LINE('message: ' || o_result_msg);
end