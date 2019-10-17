-- Function: sikp.f_monitor_tipro_daftar_per_tanggal_v2(numeric, numeric, character varying, character varying, numeric)

-- DROP FUNCTION sikp.f_monitor_tipro_daftar_per_tanggal_v2(numeric, numeric, character varying, character varying, numeric);

CREATE OR REPLACE FUNCTION sikp.f_monitor_tipro_daftar_per_tanggal_v2(
    i_p_wf_id numeric,
    is_status numeric,
    i_start_date character varying,
    i_end_date character varying,
    i_p_vat_type_id numeric)
  RETURNS SETOF character varying AS
$BODY$
DECLARE
    rs_output varchar;
    rs_data   RECORD;
    ls_data   Varchar2(4000);
		v_start_date date;
		v_end_date date;
    --contoh pemakaian : select * from f_monitor_tipro(500)
BEGIN

		--select start_date, end_date into v_start_date,v_end_date from p_finance_period where p_finance_period_id=i_p_finance_period_id;
		select to_date(i_start_date), to_date(i_end_date) into v_start_date,v_end_date;
    FOR rs_output IN select 'H|NO_URUT|NOMOR_ORDER|NPWPD|NAMA|ALAMAT|TANGGAL_DIBUAT'||f_flow_header(i_p_wf_id, null)||'|DURASI_SD_PENGUKUHAN|DURASI_SD_PENYERAHAN' as hasil from dual
    LOOP
        -- can do some processing here
        RETURN NEXT rs_output; -- return current row of SELECT
    END LOOP;

    if is_status = 0 then
	    FOR rs_output IN 
			     select 'D|'||no_urut||'|'||ORDER_NO||'  |'||npwd||'|'|| company_name ||'|'|| brand_address_name ||'|'|| creation_date ||flow_data
			     from 
			     ( select rownum as no_urut, ORDER_NO , npwd , company_name, brand_address_name,creation_date, flow_data
			       from
			       (select *
				from 
				  (
				   
				   Select a.order_date, a.ORDER_NO, nvl(decode(p.t_customer_order_id, null, q.npwpd, p.npwd),'-') as npwd, nvl(decode(p.t_customer_order_id, null,q.company_brand, p.company_brand),'-') as company_name, brand_address_name,q.creation_date,f_flow_data_durasi_daftar(i_p_wf_id, null, a.t_customer_order_id)  as flow_data
				   from t_customer_order a , v_vat_setlle_mon p  , t_vat_registration q
				   where --a.p_order_status_id = 3 and 
							a.t_customer_order_id = p.t_customer_order_id (+)
				      and a.t_customer_order_id = q.t_customer_order_id (+)
				      and exists (select x.doc_id, x.p_w_doc_type_id
					       from t_product_order_control x,
						    p_workflow y
					       where x.p_w_doc_type_id = y.p_document_type_id
						    and y.p_workflow_id = i_p_wf_id
						    and x.doc_id = a.t_customer_order_id
					       )
				     and trunc(order_date) <= trunc(sysdate)
						 and trunc(q.creation_date) BETWEEN v_start_date and v_end_date
						 and case when i_p_vat_type_id=0 then true
											else q.p_vat_type_dtl_id in (select p_vat_type_dtl_id from p_vat_type_dtl where p_vat_type_id =i_p_vat_type_id)
									end 
				  )
				order by order_date desc
			       )
			     )
	    LOOP             
		RETURN NEXT rs_output;
	    END LOOP;
    end if;

		if is_status = 3 then
	    FOR rs_output IN 
			     select 'D|'||no_urut||'|'||ORDER_NO||'  |'||npwd||'|'|| company_name ||'|'|| brand_address_name ||'|'|| creation_date ||flow_data
			     from 
			     ( select rownum as no_urut, ORDER_NO , npwd , company_name, brand_address_name,creation_date, flow_data
			       from
			       (select *
				from 
				  (
				   
				   Select a.order_date, a.ORDER_NO, nvl(decode(p.t_customer_order_id, null, q.npwpd, p.npwd),'-') as npwd, nvl(decode(p.t_customer_order_id, null,q.company_brand, p.company_brand),'-') as company_name, brand_address_name,q.creation_date, f_flow_data_durasi_daftar(i_p_wf_id, null, a.t_customer_order_id)  as flow_data
				   from t_customer_order a , v_vat_setlle_mon p  , t_vat_registration q
				   where a.p_order_status_id = 3
				      and a.t_customer_order_id = p.t_customer_order_id (+)
				      and a.t_customer_order_id = q.t_customer_order_id (+)
				      and exists (select x.doc_id, x.p_w_doc_type_id
					       from t_product_order_control x,
						    p_workflow y
					       where x.p_w_doc_type_id = y.p_document_type_id
						    and y.p_workflow_id = i_p_wf_id
						    and x.doc_id = a.t_customer_order_id
					       )
				     and trunc(order_date) <= trunc(sysdate)
						 and trunc(q.creation_date) BETWEEN v_start_date and v_end_date
						 and case when i_p_vat_type_id=0 then true
											else q.p_vat_type_dtl_id in (select p_vat_type_dtl_id from p_vat_type_dtl where p_vat_type_id =i_p_vat_type_id)
									end 
				  )
				order by order_date desc
			       )
			     )
	    LOOP             
		RETURN NEXT rs_output;
	    END LOOP;
    end if;

		if is_status = 2 then
            FOR rs_output IN 
			     select 'D|'||no_urut||'|'||ORDER_NO||'  |'||npwd||'|'|| company_name ||'|'|| brand_address_name ||'|'|| creation_date ||flow_data
			     from 
			     ( select rownum as no_urut, ORDER_NO , npwd , company_name, brand_address_name,creation_date, flow_data
			       from
			       (select *
				from 
				  (
				   
				   Select a.order_date, a.ORDER_NO, nvl(decode(p.t_customer_order_id, null, q.npwpd, p.npwd),'-') as npwd, nvl(decode(p.t_customer_order_id, null,q.company_brand, p.company_brand),'-') as company_name, brand_address_name,q.creation_date, f_flow_data_durasi_daftar(i_p_wf_id, null, a.t_customer_order_id)  as flow_data
				   from t_customer_order a , v_vat_setlle_mon p  , t_vat_registration q
				   where a.p_order_status_id = 2
				      and a.t_customer_order_id = p.t_customer_order_id (+)
				      and a.t_customer_order_id = q.t_customer_order_id (+)
				      and exists (select x.doc_id, x.p_w_doc_type_id
					       from t_product_order_control x,
						    p_workflow y
					       where x.p_w_doc_type_id = y.p_document_type_id
						    and y.p_workflow_id = i_p_wf_id
						    and x.doc_id = a.t_customer_order_id
					       )
				     and trunc(order_date) <= trunc(sysdate)
						 and trunc(q.creation_date) BETWEEN v_start_date and v_end_date
						 and case when i_p_vat_type_id=0 then true
											else q.p_vat_type_dtl_id in (select p_vat_type_dtl_id from p_vat_type_dtl where p_vat_type_id =i_p_vat_type_id)
									end 
				  )
				order by order_date desc
			       )
			     )
	    LOOP             
		RETURN NEXT rs_output;
	    END LOOP;
    end if; --if is_status = 3 then
    RETURN;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;
ALTER FUNCTION sikp.f_monitor_tipro_daftar_per_tanggal_v2(numeric, numeric, character varying, character varying, numeric)
  OWNER TO sikp;

