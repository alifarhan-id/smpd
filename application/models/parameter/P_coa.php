<?php

/**
 * Bank Model
 *
 */
class P_coa extends Abstract_model {

    public $table           = "coa";
    public $pkey            = "coa_id";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = "*";
    public $fromClause      = "coa";

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
            
            $this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            $this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];
            //if false please throw new Exception
        }
        return true;
    }

}

/* End of file p_bank.php */