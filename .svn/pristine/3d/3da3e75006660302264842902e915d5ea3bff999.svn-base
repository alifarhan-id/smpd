<?php

/**
 * Icons Model
 *
 */
class T_vat_setllement_ro extends Abstract_model {

    public $table           = "t_vat_setllement";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();


    public $selectClause    = "a.no_kohir,d.wp_name, a.t_vat_setllement_id, a.t_customer_order_id, 
                            a.settlement_date, a.p_finance_period_id, 
                            a.t_cust_account_id, a.npwd, a.total_trans_amount, a.total_penalty_amount,
                            a.total_vat_amount, b.code as finance_period_code, c.order_no, c.p_rqst_type_id, e.code as rqst_type_code, d.p_vat_type_id, 0 as total_total";
    public $fromClause      = "t_vat_setllement a, p_finance_period b, t_customer_order c, t_cust_account d, p_rqst_type e";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            

        }else {
            //do something
            
        }
        return true;
    }

    function getPayment($t_customer_order_id){

        $ci =& get_instance();
        $userdata = $ci->session->userdata;


        $sql="select sikp.f_payment_manual($t_customer_order_id,'".$userdata['app_user_name']."')";
        
        $query = $this->db->query($sql);
        $item =$query->row_array();
        return $item;
    }

    function cetakRegister($t_customer_order_id){

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        $sql="select sikp.f_print_register($t_customer_order_id,'".$userdata['app_user_name']."')";
        
        $query = $this->db->query($sql);
        $item =$query->row_array();
        return $item;
    }

    function getDetail($t_vat_setllement_id){

        $sql="SELECT * FROM sikp.v_vat_setllement_dtl WHERE t_vat_setllement_id = 539542";//$t_vat_setllement_id";
        
        $query = $this->db->query($sql);
        //echo $sql; exit();
        $item =$query->result_array();
        return $item;
    }

}