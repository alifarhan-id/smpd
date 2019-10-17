<?php

/**
 *  Model
 *
 */
class T_cust_acc_dtl_trans_month extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array( );

    public $selectClause    = "";
    public $fromClause      = "";

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
           

        }else {
            //do something
            //example:
            //if false please throw new Exception
        }
        return true;
    }

    function get_data($t_cust_account_id){

        $sql = "SELECT * FROM f_get_cust_acc_dtl_trans_month(".$t_cust_account_id.") ORDER BY trans_date_txt DESC";
       // return $sql;
        $query = $this->db->query($sql);
        $items = $query->result_array();
        return $items;
    }




}

/* End of file Icons.php */