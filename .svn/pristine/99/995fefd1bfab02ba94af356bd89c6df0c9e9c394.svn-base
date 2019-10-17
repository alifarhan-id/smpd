<?php

/**
 * Chart_proc Model
 *
 */
class T_bphtb_registration_oc_ver extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = "a.*,
                                cust_order.p_rqst_type_id,
                                b.region_name as wp_kota,
                                c.region_name as wp_kecamatan,
                                d.region_name as wp_kelurahan,
                                e.region_name as object_region,
                                f.region_name as object_kecamatan,
                                g.region_name as object_kelurahan,
                                h.description as doc_name,
                                (a.bphtb_amt - a.bphtb_discount) AS bphtb_amt_final_old,
                                j.payment_vat_amount AS prev_payment_amount";
    public $fromClause      = "t_bphtb_registration as a 
                                left join p_region as b
                                    on a.wp_p_region_id = b.p_region_id
                                left join p_region as c
                                    on a.wp_p_region_id_kec = c.p_region_id
                                left join p_region as d
                                    on a.wp_p_region_id_kel = d.p_region_id
                                left join p_region as e
                                    on a.object_p_region_id = e.p_region_id
                                left join p_region as f
                                    on a.object_p_region_id_kec = f.p_region_id
                                left join p_region as g
                                    on a.object_p_region_id_kel = g.p_region_id
                                left join p_bphtb_legal_doc_type as h
                                    on a.p_bphtb_legal_doc_type_id = h.p_bphtb_legal_doc_type_id
                                left join t_customer_order as cust_order
                                    on cust_order.t_customer_order_id = a.t_customer_order_id
                                left join t_bphtb_registration as i
                                    on a.registration_no_ref = i.registration_no
                                left join t_payment_receipt_bphtb as j
                                    on i.t_bphtb_registration_id = j.t_bphtb_registration_id";

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