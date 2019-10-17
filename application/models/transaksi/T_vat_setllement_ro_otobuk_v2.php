<?php

/**
 * Icons Model
 *
 */
class T_vat_setllement_ro_otobuk_v2 extends Abstract_model {

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

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        return true;
    }

    function getData($CURR_DOC_ID){


        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        $sql = "SELECT a.t_vat_setllement_id, a.t_customer_order_id, 
                a.settlement_date, a.p_finance_period_id, 
                a.t_cust_account_id, a.npwd, a.total_trans_amount,
                a.total_vat_amount, b.code as finance_period_code, c.order_no, c.p_rqst_type_id, e.code as rqst_type_code,e.p_vat_type_id
                FROM t_vat_setllement a, p_finance_period b, t_customer_order c, t_cust_account d, p_rqst_type e
                WHERE a.p_finance_period_id = b.p_finance_period_id AND
                a.t_customer_order_id = c.t_customer_order_id AND
                a.t_cust_account_id = d.t_cust_account_id AND
                c.p_rqst_type_id = e.p_rqst_type_id AND
                a.t_customer_order_id = ?";

        $query = $this->db->query($sql, array($CURR_DOC_ID));
        $items = $query->result_array();
            
        return $items;
    }

    function getDetail($t_vat_setllement_id){


        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        $sql = "SELECT order_no, f.vat_code as jenis_pajak, a.npwd,company_brand, brand_address_name, brand_address_no, c.code as finance_period_code, to_char(a.start_period,'dd-mm-yyyy') as start_date_txt, to_char(a.end_period,'dd-mm-yyyy') as end_date_txt, total_trans_amount, total_vat_amount, to_char(due_date,'dd-mm-yyyy') as due_date, nvl(total_penalty_amount,0) as total_penalty_amount, nvl(debt_vat_amt,0) as debt_vat_amt, nvl(db_interest_charge,0) as db_interest_charge, nvl(db_increasing_charge,0) as db_increasing_charge, a.payment_key
                FROM t_vat_setllement a 
                LEFT JOIN t_cust_account b on a.t_cust_account_id = b.t_cust_account_id
                LEFT JOIN p_finance_period c on a.p_finance_period_id = c.p_finance_period_id
                LEFT JOIN t_customer_order d on a.t_customer_order_id = d.t_customer_order_id
                LEFT JOIN p_vat_type_dtl e on a.p_vat_type_dtl_id = e.p_vat_type_dtl_id
                LEFT JOIN p_vat_type f on e.p_vat_type_id = f.p_vat_type_id
                WHERE t_vat_setllement_id = ?";

        $query = $this->db->query($sql, array($t_vat_setllement_id));
        $items = $query->row_array();
            
        return $items;
    }

    

    

}

/* End of file Icons.php */