<?php

/**
 * Pembuatan schema Model
 *
 */
class T_vat_setllement_cetak_skpd_penelitian extends Abstract_model {

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

        if($this->actionType == 'CREATE') {

        }else {
            /*$this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];*/
        }
        return true;
    }

    function getData($s_keyword){
        $sql = "SELECT  a.no_kohir,
                        sett_type.code as sett_code,
                        d.wp_name, 
                        a.t_vat_setllement_id, 
                        a.t_customer_order_id, 
                        a.total_penalty_amount, 
                        a.settlement_date, 
                        a.p_finance_period_id, 
                        a.t_cust_account_id, 
                        a.npwd, 
                        a.total_trans_amount,
                        a.total_vat_amount, 
                        b.code as finance_period_code, 
                        c.order_no, 
                        c.p_rqst_type_id, 
                        e.code as rqst_type_code, 
                        d.p_vat_type_id
            FROM t_vat_setllement a, p_finance_period b, t_customer_order c, t_cust_account d, p_rqst_type e,p_settlement_type sett_type
            WHERE a.p_finance_period_id = b.p_finance_period_id AND
                a.t_customer_order_id = c.t_customer_order_id AND
                a.t_cust_account_id = d.t_cust_account_id AND
                c.p_rqst_type_id = e.p_rqst_type_id AND
                sett_type.p_settlement_type_id = a.p_settlement_type_id(+) AND
                ( upper(d.wp_name) LIKE upper('%".$s_keyword."%') OR 
                  upper(a.npwd) LIKE upper('%".$s_keyword."%') OR
                  upper(a.no_kohir) LIKE upper('%".$s_keyword."%')
                )
                and a.p_settlement_type_id =2
            ORDER BY d.wp_name ASC, b.start_date DESC";
        $query = $this->db->query($sql);
        //exit;
        $items = $query->result_array();


        /*if ($items == null || $items == '')
            $items = 'no result';*/
        // print_r($items);
        // exit();
        return $items;
    }
}

