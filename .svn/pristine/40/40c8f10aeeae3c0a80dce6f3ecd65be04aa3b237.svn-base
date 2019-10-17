<?php

/**
 * Chart_proc Model
 *
 */
class T_vat_setllement_ro_otobuk extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = "a.t_vat_setllement_id, 
                                a.t_customer_order_id, 
                                a.settlement_date, 
                                a.p_finance_period_id, 
                                a.t_cust_account_id, 
                                a.npwd, 
                                a.total_trans_amount,
                                a.total_vat_amount, 
                                b.code as finance_period_code,
                                c.order_no, 
                                c.p_rqst_type_id, 
                                e.code as rqst_type_code";
    public $fromClause      = "t_vat_setllement a, 
                                p_finance_period b, 
                                t_customer_order c, 
                                t_cust_account d, 
                                p_rqst_type e";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {
        // $ci =& get_instance();
        // $userinfo = $ci->ion_auth->user()->row();

        if($this->actionType == 'CREATE') {
            //do something
            // example :

            // $this->record[$this->pkey] = $this->generate_id($this->table);
            // $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            // $this->db->set('creation_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            // $this->record['updated_by'] = $userinfo->username;
            // $this->record['created_by'] = $userinfo->username;

        }else {
            //do something
            //example:
            //if false please throw new Exception
            // $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            // $this->record['updated_by'] = $userinfo->username;
        }
        return true;
    }

    function getDataStellment($id = 0){
        $sql = "SELECT *
                    FROM v_vat_setllement
                WHERE t_vat_setllement_id = ".$id;
        $query = $this->db->query($sql);
        //exit;
        return $query->row_array();
    }

    function getDataTypeStellment($id=0){
        $sql = "SELECT p_settlement_type_id 
                    FROM t_vat_setllement 
                WHERE t_customer_order_id = ".$id;
        $query = $this->db->query($sql);
        //exit;
        return $query->row_array();
    }

    function getDataCountStellment($id = 0){
        $sql = "SELECT count(*) AS ada
                    FROM t_vat_penalty 
                WHERE t_vat_setllement_id =".$id;
        $query = $this->db->query($sql);
        //exit;
        return $query->row_array();
    }

    function updateNoKohir($t_vat_setllement_id,$no_kohir){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $sql = "SELECT f_update_no_kohir_vat_settlement
                    (".$t_vat_setllement_id.",'".$no_kohir."','".$userdata['app_user_name']."') as payment_key";
        $query = $this->db->query($sql);
        //exit;
        return $query->row_array();
    }

    function generateKohir($t_customer_order_id){
        $sql = "select f_generate_kohir(".$t_customer_order_id.") from dual";
        $query = $this->db->query($sql);
        //exit;
        return $query->row_array();
    }

    function updateSetllement($t_vat_setllement_id,$is_anomali){
        $sql = "UPDATE t_vat_setllement SET
                            is_anomali = '".$is_anomali."'
                            WHERE t_vat_setllement_id = ".$t_vat_setllement_id;
        $query = $this->db->query($sql);
        //exit;
        return true;
    }
}

/* End of file */