<?php

/**
 * Pembuatan schema Model
 *
 */
class T_bphtb_registration_list extends Abstract_model {

    public $table           = "t_bphtb_registration";
    public $pkey            = "t_bphtb_registration_id";
    public $alias           = "regis";

    public $fields          = array();

    public $selectClause    = " cust_order.*,
                                regis.*
                              ";

    public $fromClause      = "t_bphtb_registration regis 
                                LEFT JOIN t_customer_order cust_order 
                                    on regis.t_customer_order_id = cust_order.t_customer_order_id 
                                 where (cust_order.order_no ILIKE '%%' OR regis.wp_name ILIKE '%%') 
                                 AND cust_order.p_order_status_id = 1 
                                 AND (
                                        regis.p_bphtb_type_id is null 
                                        or regis.p_bphtb_type_id = 1
                                      )";

    public $refs            = array();

    function __construct($periode = "") {
        parent::__construct();
    }

    function validate() {
        $ci =& get_instance();

        if($this->actionType == 'CREATE') {

        }else {

        }
        return true;
    }

}

