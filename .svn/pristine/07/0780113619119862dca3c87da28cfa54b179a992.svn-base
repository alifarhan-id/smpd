<?php

/**
 * Pembuatan schema Model
 *
 */
class T_order_log_kronologis extends Abstract_model {

    public $table           = "t_order_log_kronologis";
    public $pkey            = "t_customer_order_id";
    public $alias           = "a";

    public $fields          = array();

    public $selectClause    = "a.*";

    public $fromClause      = "v_t_nwo_log_kronologis a";

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

