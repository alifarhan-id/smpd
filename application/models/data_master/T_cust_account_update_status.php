<?php

/**
 * T_cust_account_update_status Model
 *
 */
class T_cust_account_update_status extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = " a.t_cust_account_id, 
                                a.npwd, a.wp_name, 
                                a.p_vat_type_id,  
                                a.p_account_status_id,
                                b.vat_code AS jenis_pajak, 
                                c.code AS status_wp, 
                                a.last_satatus_date";
    public $fromClause      = " t_cust_account AS a
                                LEFT JOIN p_vat_type AS b 
                                    ON a.p_vat_type_id = b.p_vat_type_id
                                LEFT JOIN p_account_status AS c 
                                    ON a.p_account_status_id = c.p_account_status_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            /*$this->record['creation_date'] = date('Y-m-d');
            $this->record['created_by'] = $userdata['app_user_name'];*/
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];
            
            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];
            //if false please throw new Exception
        }
        return true;
    }

    function updateStatus($t_cust_account_id,$description,$p_account_status_id,$valid_to){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $sql = "SELECT f_update_acc_status(".$t_cust_account_id.",".$p_account_status_id.",'".$description."','".$valid_to."', '".$userdata['app_user_name']."')";
        //return $sql;
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data['f_update_acc_status'];
    }

}

/* End of file T_cust_account_update_status.php */