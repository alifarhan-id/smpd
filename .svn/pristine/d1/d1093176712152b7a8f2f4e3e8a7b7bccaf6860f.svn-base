-- Function: f_bphtb_registration_kb(character varying, character varying, character varying, character varying, character varying, numeric, numeric, numeric, character varying, character varying, character varying, character varying, character, character, character, character, character, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, character varying, character varying, numeric, character varying, numeric, character varying, numeric, numeric, character varying)

-- DROP FUNCTION f_bphtb_registration_kb(character varying, character varying, character varying, character varying, character varying, numeric, numeric, numeric, character varying, character varying, character varying, character varying, character, character, character, character, character, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, numeric, character varying, character varying, numeric, character varying, numeric, character varying, numeric, numeric, character varying);

CREATE OR REPLACE FUNCTION sikp.f_bphtb_registration_kb(
    IN wp_name character varying,
    IN npwp character varying,
    IN wp_address_name character varying,
    IN wp_rt character varying,
    IN wp_rw character varying,
    IN wp_p_region_id numeric,
    IN wp_p_region_id_kec numeric,
    IN wp_p_region_id_kel numeric,
    IN phone_no character varying,
    IN mobile_phone_no character varying,
    IN njop_pbb character varying,
    IN object_address_name character varying,
    IN object_rt character,
    IN object_rw character,
    IN object_p_region_id character,
    IN object_p_region_id_kec character,
    IN object_p_region_id_kel character,
    IN p_bphtb_legal_doc_type_id numeric,
    IN land_area numeric,
    IN land_price_per_m numeric,
    IN land_total_price numeric,
    IN building_area numeric,
    IN building_price_per_m numeric,
    IN building_total_price numeric,
    IN market_price numeric,
    IN npop numeric,
    IN npop_tkp numeric,
    IN npop_kp numeric,
    IN bphtb_amt numeric,
    IN bphtb_discount numeric,
    IN bphtb_amt_final numeric,
    IN description character varying,
    IN i_user character varying,
    IN jenis_harga numeric,
    IN bphtb_legal_doc_description character varying,
    IN add_disc_percent numeric,
    IN registration_no_ref character varying,
    IN prev_payment_amount numeric,
    INOUT o_t_bphtb_registration_id numeric,
    INOUT o_mess character varying)
  RETURNS record AS
$BODY$DECLARE
v_order_no varchar2;
v_customer_order_id number;
v_registration_no number;
v_region_no       Varchar2(32);
BEGIN
        begin
           Select region_code into v_region_no
           from p_region
           where p_region_id = to_number(object_p_region_id_kec) ;
           exception
              when others then
                  o_mess := 'Data kode kecamatan tidak ditemukan';
                  o_t_bphtb_registration_id := null;
                  Return;
        end;

	--Routine body goes here...
	v_order_no := f_order_no(6);
	v_customer_order_id := generate_id('sikp','t_customer_order','t_customer_order_id');

	INSERT INTO t_customer_order(
			 t_customer_order_id, order_no, p_rqst_type_id, p_order_status_id,
			 order_date, creation_date, created_by, updated_date,
			 updated_by)
		 VALUES (v_customer_order_id, v_order_no,6, 1,
			sysdate, sysdate, i_user, sysdate,
			i_user);
	--select order_no from sikp.t_customer_order where t_customer_order_id = v_customer_order_id into v_registration_no;
	--select v_region_no||lpad(to_char(t_bphtb_regno_seq.nextval),'5','0') into v_registration_no
	--from dual;
    v_registration_no := f_get_registration_no_bphtb(i_user);

	INSERT INTO "sikp"."t_bphtb_registration" (
		"t_customer_order_id",
		"registration_no",
		"wp_name",
		"npwp",
		"wp_address_name",
		"wp_rt",
		"wp_rw",
		"wp_p_region_id",
		"wp_p_region_id_kec",
		"wp_p_region_id_kel",
		"phone_no",
		"mobile_phone_no",
		"njop_pbb",
		"object_address_name",
		"object_rt",
		"object_rw",
		"object_p_region_id",
		"object_p_region_id_kec",
		"object_p_region_id_kel",
		"p_bphtb_legal_doc_type_id",
		"land_area",
		"land_price_per_m",
		"land_total_price",
		"building_area",
		"building_price_per_m",
		"building_total_price",
		"market_price",
		"npop",
		"npop_tkp",
		"npop_kp",
		"bphtb_amt",
		"bphtb_discount",
		"bphtb_amt_final",
		"description",
		"jenis_harga_bphtb",
		"bphtb_legal_doc_description",
		"add_disc_percent",
		"p_bphtb_type_id",
		"registration_no_ref",
		"prev_payment_amount",
		"creation_date",
		"created_by",
		"updated_date",
		"updated_by"
	)
VALUES
	(
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
		bphtb_amt_final,
		description,
		jenis_harga,
		bphtb_legal_doc_description,
		add_disc_percent,
		3,
		registration_no_ref,
		prev_payment_amount,
		SYSDATE,
		'ADMIN',
		SYSDATE,
		'ADMIN'
	);
o_mess := 'Data Berhasil Disimpan';

o_t_bphtb_registration_id := 1;

RETURN;
/*exception
when others then
	o_mess := sqlerrm;
	o_t_bphtb_registration_id := 1;*/
END$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;