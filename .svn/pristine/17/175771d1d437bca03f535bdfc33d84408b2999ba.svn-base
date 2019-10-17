<?php

/**
 * Chart_proc Model
 *
 */
class T_vat_registration_npwpd_jabatan_ro extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = " d.p_rqst_type_id, 
                                a.p_vat_type_dtl_id,
                                a.t_vat_registration_id,
                                c.vat_code as vat_code_dtl,
                                a.t_customer_order_id,
                                a.company_brand, 
                                a.brand_address_name, 
                                a.brand_address_no, 
                                case 
                                    when length(nvl(a.brand_address_rt,''))<1 
                                        then '-' 
                                    else 
                                        a.brand_address_rt end as brand_address_rt,
                                case 
                                    when length(nvl(a.brand_address_rw,''))<1 
                                        then '-' 
                                    else 
                                        a.brand_address_rw end as brand_address_rw,
                                e.region_name as kota,
                                f.region_name as kecamatan,
                                g.region_name as kelurahan,
                                case 
                                    when length(nvl(a.brand_zip_code,''))<1 
                                        then '-' 
                                    else 
                                        a.brand_zip_code end as brand_zip_code,
                                case 
                                    when length(nvl(a.brand_phone_no,''))<1 
                                        then '-' 
                                    else 
                                        a.brand_phone_no end as brand_phone_no,
                                case 
                                    when length(nvl(a.brand_fax_no,''))<1 
                                        then '-' 
                                    else 
                                        a.brand_fax_no end as brand_fax_no,
                                a.wp_name, 
                                a.wp_address_name, 
                                a.company_name, 
                                a.address_name, 
                                b.code as job_name, 
                                a.bap_employee_no_1, 
                                a.bap_employee_name_1, 
                                a.bap_employee_no_2, 
                                a.bap_employee_name_2, 
                                a.bap_employee_job_pos_1, 
                                a.bap_employee_job_pos_2 ,
                                a.created_by, 
                                a.updated_by, 
                                to_char(a.creation_date,'dd-mm-yyyy') as creation_date, 
                                to_char(a.updated_date,'dd-mm-yyyy') as updated_date,
                                h.code as rqst_type_code,d.order_no,
                                case 
                                    when length(nvl(a.company_additional_addr,''))<1 
                                        then '-' 
                                    else 
                                        a.company_additional_addr end as company_additional_addr";
    public $fromClause      = " t_vat_registration a 
                                    left join p_job_position b 
                                on a.p_job_position_id = b.p_job_position_id 
                                    left join p_vat_type_dtl c 
                                on c.p_vat_type_dtl_id=a.p_vat_type_dtl_id 
                                    left join t_customer_order d 
                                on d.t_customer_order_id = a.t_customer_order_id 
                                    left join p_region e 
                                on e.p_region_id = a.brand_p_region_id 
                                    left join p_region f 
                                on f.p_region_id = a.brand_p_region_id_kec 
                                    left join p_region g 
                                on g.p_region_id = a.brand_p_region_id_kel 
                                    left join p_rqst_type h 
                                on h.p_rqst_type_id = d.p_rqst_type_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {
        // $ci =& get_instance();
        // $userinfo = $ci->ion_auth->user()->row();

        if($this->actionType == 'CREATE') {
            //do something
            // example :

            // $this->record[$this->pkey] = $this->generate_id($this->table);
            // $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            // $this->db->set('creation_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            // $this->record['updated_by'] = $userinfo->username;
            // $this->record['created_by'] = $userinfo->username;

        }else {
            //do something
            //example:
            //if false please throw new Exception
            // $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            // $this->record['updated_by'] = $userinfo->username;
        }
        return true;
    }
}

/* End of file */