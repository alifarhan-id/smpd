<?php

/**
 * T_vat_setllement_ro_order Model
 *
 */
class T_vat_setllement_ro_order extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = "";
    public $fromClause      = "";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function getCustomerOrderId($no_kohir){
        try {
            
            $sql = "SELECT t_customer_order_id FROM t_vat_setllement WHERE no_kohir='".$no_kohir."'";

            $query = $this->db->query($sql);

            $items = $query->row_array();
            //print_r($items[0]['nomor_validasi']);exit();

            return $items['t_customer_order_id'];

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    function getData($t_customer_order_id){
        try {

            $sql = "SELECT  a.no_kohir,
                            d.wp_name, 
                            a.t_vat_setllement_id, 
                            a.t_customer_order_id, 
                            a.settlement_date, 
                            a.p_finance_period_id, 
                            a.t_cust_account_id, 
                            a.npwd, 
                            a.total_trans_amount, 
                            a.total_penalty_amount,
                            a.total_vat_amount, 
                            b.code as finance_period_code, 
                            c.order_no, 
                            c.p_rqst_type_id, 
                            e.code as rqst_type_code, 
                            d.p_vat_type_id
                    FROM t_vat_setllement a, p_finance_period b, t_customer_order c, t_cust_account d, p_rqst_type e
                    WHERE a.p_finance_period_id = b.p_finance_period_id AND
                    a.t_customer_order_id = c.t_customer_order_id AND
                    a.t_cust_account_id = d.t_cust_account_id AND
                    c.p_rqst_type_id = e.p_rqst_type_id AND
                    a.t_customer_order_id =".$t_customer_order_id
                    ;

            $query = $this->db->query($sql);

            $items = $query->row_array();

            //print_r($query);exit();           

            return $items;
            
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        
        }
    }

    function getData2($t_customer_order_id){
        try {
            $sql="SELECT sett.*,vat_type.code||' '||dtl.code as no_ayat 
                    from v_vat_setllement_ro sett
                  left join p_vat_type_dtl dtl on sett.p_vat_type_dtl_id = dtl.p_vat_type_dtl_id
                 left join p_vat_type vat_type on vat_type.p_vat_type_id = dtl.p_vat_type_id
                    where t_customer_order_id  = ".$t_customer_order_id;

            $query = $this->db->query($sql);

            $items = $query->row_array();

            //print_r($sql);exit();           

            return $items;
            
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        
        }
        
    }

    function payment($t_customer_order_id){
        try {
            $ci =& get_instance();
            $userdata = $ci->session->userdata;

            $sql = "SELECT sikp.f_payment_manual(".$t_customer_order_id.",'".$userdata['app_user_name']."')";

            $query = $this->db->query($sql);

            $items = $query->row_array();
         

            return $items['f_payment_manual'];
            
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        
        }
    }

    function cetak_register($t_customer_order_id){
        try {
            $ci =& get_instance();
            $userdata = $ci->session->userdata;

            $sql = "SELECT sikp.f_print_register(".$t_customer_order_id.",'".$userdata['app_user_name']."')";

            $query = $this->db->query($sql);

            $items = $query->row_array();
         

            return $items['f_print_register'];
            
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        
        }
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

/* End of file T_vat_setllement_ro_order.php */