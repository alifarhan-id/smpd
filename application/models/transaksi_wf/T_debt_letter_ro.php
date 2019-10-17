<?php

/**
 * Chart_proc Model
 * 
 */
class T_debt_letter_ro extends Abstract_model {

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
        $sql = "SELECT * 
                FROM v_debt_letter
                WHERE t_customer_order_id = ".$t_customer_order_id;
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