-- Function: f_gen_nota_ver_tambahan(character varying, character varying)

-- DROP FUNCTION f_gen_nota_ver_tambahan(character varying, character varying);

CREATE OR REPLACE FUNCTION sikp.f_gen_nota_ver_tambahan(
    i_registartion_no_ref character varying,
    i_user_name character varying)
  RETURNS character varying AS
$BODY$

declare
    ln_x            numeric(5);
    ln_bphtb_id     Number(12);
    ln_pay_amount   Number(16,2);
    ln_origin_vat_amt Number(16,2);
    ls_return       varchar2(500);
    ln_region_id     Number(12);
    v_region_no      varchar2(10);
    v_order_no       varchar2(64);
    v_customer_order_id Number(12);
    v_registration_no varchar2(64);
    ln_out_standing   Number(16,2);
    ln_final_bphtb   Number(16,2);
    ln_penalty       Number(16,2);
    ln_penalty_pct   Number(8,2);
BEGIN
    --cek apakah data sudah di bayar
    ls_return := 'Nota verifikasi tambahan berhasil dibuat';
    begin
         select a.t_bphtb_registration_id , object_p_region_id_kec, a.bphtb_amt_final,  nvl(b.payment_amount ,0)
         into ln_bphtb_id , ln_region_id , ln_origin_vat_amt, ln_pay_amount
         from t_bphtb_registration a, t_payment_receipt_bphtb b
         where a.registration_no = i_registartion_no_ref
               and a.t_bphtb_registration_id = b.t_bphtb_registration_id (+);

         ln_out_standing := ln_origin_vat_amt - ln_pay_amount;

         --hitung penalty
         ln_penalty := 0;
         ln_penalty_pct := 0;
         --hitung ulang final amount
         ln_final_bphtb := ln_out_standing + ln_penalty ;


         begin
           Select lpad(region_code,2,'0') into v_region_no
           from p_region
           where p_region_id = ln_region_id  ;
           exception
              when others then
                  v_region_no := '00';
        end;

	--Routine body goes here...
	v_order_no := f_order_no(6);
	v_customer_order_id := generate_id('sikp','t_customer_order','t_customer_order_id');

	INSERT INTO t_customer_order(
			 t_customer_order_id, order_no, p_rqst_type_id, p_order_status_id,
			 order_date, creation_date, created_by, updated_date,
			 updated_by)
		 VALUES (v_customer_order_id, v_order_no,6, 1,
			sysdate, sysdate, i_user_name, sysdate,
			i_user_name);
	--select order_no from sikp.t_customer_order where t_customer_order_id = v_customer_order_id into v_registration_no;
	--select v_region_no||lpad(to_char(t_bphtb_regno_seq.nextval),'5','0') into v_registration_no
	--from dual;

    v_registration_no := f_get_registration_no_bphtb(i_user_name);

	INSERT INTO t_bphtb_registration (
		t_customer_order_id,
		registration_no,
		wp_name,
		npwp,
		wp_address_name,
		wp_rt,
		wp_rw,
		wp_p_region_id,
		wp_p_region_id_kec,
		wp_p_region_id_kel,
		phone_no,
		mobile_phone_no,
		njop_pbb,
		object_address_name,
		object_rt,
		object_rw,
		object_p_region_id,
		object_p_region_id_kec,
		object_p_region_id_kel,
		p_bphtb_legal_doc_type_id,
		land_area,
		land_price_per_m,
		land_total_price,
		building_area,
		building_price_per_m,
		building_total_price,
		market_price,
		npop,
		npop_tkp,
		npop_kp,
		bphtb_amt,
		bphtb_discount,
		bphtb_amt_final,
		description,
		creation_date,
		created_by,
		updated_date,
		updated_by,
		--new
		p_bphtb_type_id,
		registration_no_ref ,
		prev_payment_amount ,
		outstanding_amount,
		penalty_amount,
		penalty_pct
	)
        Select
		v_customer_order_id,
		v_registration_no,
		wp_name,
		npwp,
		wp_address_name,
		wp_rt,
		wp_rw,
		wp_p_region_id,
		wp_p_region_id_kec,
		wp_p_region_id_kel,
		phone_no,
		mobile_phone_no,
		njop_pbb,
		object_address_name,
		object_rt,
		object_rw,
		object_p_region_id,
		object_p_region_id_kec,
		object_p_region_id_kel,
		p_bphtb_legal_doc_type_id,
		land_area,
		land_price_per_m,
		land_total_price,
		building_area,
		building_price_per_m,
		building_total_price,
		market_price,
		npop,
		npop_tkp,
		npop_kp,
		bphtb_amt,
		bphtb_discount,
		ln_final_bphtb,--bphtb_amt_final,
		description,
		sysdate,
		i_user_name,
		sysdate,
		i_user_name,
		--new
		2,
		i_registartion_no_ref,
		ln_pay_amount ,
		ln_out_standing,
		ln_penalty,
		ln_penalty_pct
	from t_bphtb_registration
	where t_bphtb_registration_id = ln_bphtb_id
	      ;
         exception
            when others then
               ls_return := sqlerrm;
               Return ls_return;

    end ;
    return ls_return ;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;