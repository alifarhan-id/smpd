<?php

/**
 * Icons Model
 *
 */
class T_vat_setllement_ro_modifikasi_ubah_register extends Abstract_model {

    public $table           = "t_vat_setllement";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = "a.no_kohir,sett_type.code as sett_code,d.wp_name, a.t_vat_setllement_id, 
                                a.t_customer_order_id, a.total_penalty_amount, 
                                a.settlement_date, a.p_finance_period_id, 
                                a.t_cust_account_id, a.npwd, a.total_trans_amount,
                                a.total_vat_amount, b.code as finance_period_code, 
                                c.order_no, c.p_rqst_type_id, e.code as rqst_type_code, d.p_vat_type_id,a.payment_key";
    public $fromClause      = "t_vat_setllement a, p_finance_period b, t_customer_order c, t_cust_account d, p_rqst_type e,p_settlement_type sett_type, t_payment_receipt f";

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

    function getRegister($t_vat_setllement_id){
        $sql = "select a.t_vat_setllement_id, a.npwd,a.no_kohir, a.is_settled,a.total_trans_amount,
                a.total_vat_amount,to_char(payment_date,'dd-mm-yyyy') as payment_date,
                p_cg_terminal_id,case when kode_bank = '110' then 1 else 2 end as is_bjb,
                b.receipt_no,b.payment_amount,b.payment_vat_amount,b.penalty_amount
                from t_vat_setllement a
                LEFT JOIN t_payment_receipt b on a.t_vat_setllement_id = b.t_vat_setllement_id
                where a.t_vat_setllement_id=".$t_vat_setllement_id;
       
        $query = $this->db->query($sql);
        $item =$query->row_array();
        return $item;
    }

    function ubahRegister($t_vat_setllement_id, $total_trans_amount, $total_vat_amount, $is_settled, $receipt_no, $payment_amount, $payment_vat_amount,$payment_date,$is_bjb,$p_cg_terminal_id,$penalty_amount){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $uname = $userdata['app_user_name'];
        $sql = "SELECT * from f_ubah_data_register3($t_vat_setllement_id, $total_trans_amount, $total_vat_amount, '$is_settled', '$receipt_no', $payment_amount, $payment_vat_amount,'$uname','$payment_date',$is_bjb,'$p_cg_terminal_id',$penalty_amount) AS msg";

        $query = $this->db->query($sql);

        $item =$query->row_array();
        return $item;
    }
    
}