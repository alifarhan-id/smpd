<?php

/**
 * t_vat_setllement_ro_new Model
 *
 */
class T_vat_setllement_ro_new extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = " a.no_kohir,
                                d.wp_name,
                                a.payment_key,
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
                                d.p_vat_type_id,
								f.receipt_no,
								sett_type.code as sett_code,
                                (select count(*)as ada 
                                    from t_vat_penalty 
                                where t_vat_setllement_id = a.t_vat_setllement_id)";
    public $fromClause      = " t_vat_setllement a 
                                inner join p_finance_period b on a.p_finance_period_id = b.p_finance_period_id 
                                inner join t_customer_order c on a.t_customer_order_id = c.t_customer_order_id
                                inner join t_cust_account d on a.t_cust_account_id = d.t_cust_account_id
                                inner join p_rqst_type e on c.p_rqst_type_id = e.p_rqst_type_id
								left join p_settlement_type sett_type on sett_type.p_settlement_type_id = a.p_settlement_type_id
								left join t_payment_receipt f on a.t_vat_setllement_id = f.t_vat_setllement_id
								";

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
            /*$this->record['creation_date'] = date('Y-m-d');
            $this->record['created_by'] = $userdata['app_user_name'];*/
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];
            
            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];
            //if false please throw new Exception
        }
        return true;
    }

    function updateDenda($t_vat_setllement_id,$flag_piutang,$nilai_denda,$description){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $sql = "SELECT f_update_penalty_new(".$t_vat_setllement_id.",".$flag_piutang.",".
                    $nilai_denda.", '".$description."', '".$userdata['app_user_name']."') AS msg";
        //return $sql;
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data['msg'];
    }

}

/* End of file t_vat_setllement_ro_new.php */