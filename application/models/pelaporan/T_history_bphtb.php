<?php

/**
 * Pembuatan schema Model
 * 
 */
class T_history_bphtb extends Abstract_model {

    public $table           = "h_bphtb_registration";
    public $pkey            = "";
    public $alias           = "h";

    public $fields          = array();

    public $selectClause    = " h.* ";

    public $fromClause      = "h_bphtb_registration h ";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {
        $ci =& get_instance();

        if($this->actionType == 'CREATE') {

        }else {
            /*$this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];*/
        }
        return true;
    }
    
}

