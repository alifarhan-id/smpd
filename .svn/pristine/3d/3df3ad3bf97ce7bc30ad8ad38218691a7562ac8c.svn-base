<?php

/**
 * T_vat_setllement_cetak_skpd Model
 *
 */
class T_vat_setllement_cetak_skpd extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = " a.no_kohir,sett_type.code as sett_code,d.wp_name, a.t_vat_setllement_id, a.t_customer_order_id, a.total_penalty_amount, 
                                a.settlement_date, a.p_finance_period_id, 
                                a.t_cust_account_id, a.npwd, a.total_trans_amount,
                                a.total_vat_amount, b.code as finance_period_code, c.order_no, c.p_rqst_type_id, e.code as rqst_type_code, d.p_vat_type_id";
    public $fromClause      = "t_vat_setllement a, p_finance_period b, t_customer_order c, t_cust_account d, p_rqst_type e,p_settlement_type sett_type";

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

/* End of file T_vat_setllement_cetak_skpd.php */