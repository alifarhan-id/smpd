<?php

/**
 * Chart_proc Model
 *
 */
class T_bphtb_keberatan_ro extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = "";
    public $fromClause      = "";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function getData($t_customer_order_id){
        $sql = "SELECT wp_name,njop_pbb,bphtb_amt_final_sebelumnya,bphtb_amt_final_keberatan,
                a.created_by,a.creation_date,a.updated_by,a.updated_date,alasan,
                d.code as p_rqst_type_code, c.creation_date as status_request_date,order_no
                FROM t_bphtb_keberatan a
                left join t_bphtb_registration b on b.t_bphtb_registration_id=a.t_bphtb_registration_id
                left join t_customer_order c on c.t_customer_order_id = a.t_customer_order_id
                left join p_rqst_type d on d.p_rqst_type_id = c.p_rqst_type_id
                WHERE a.t_customer_order_id = ".$t_customer_order_id;
        $query = $this->db->query($sql);
        //exit;
        return $query->row_array();
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