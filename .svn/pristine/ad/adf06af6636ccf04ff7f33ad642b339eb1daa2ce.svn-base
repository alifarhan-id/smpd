<?php

/**
 * v_cust_acc_dtl_trans Model
 *
 */
class V_cust_acc_dtl_trans extends Abstract_model {

    public $table           = "t_vat_setllement";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";
    /* Display fields */
    public $displayFields = array();
    /* Details table */
    public $details = array();

    public $selectClause    = "a.t_vat_setllement_id, c.trans_date, c.bill_no, c.service_desc, c.service_charge, c.vat_charge";
    public $fromClause      = "t_vat_setllement a, 
                                t_vat_setllement_dtl b, 
                                t_cust_acc_dtl_trans c";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function get_v_cust_acc_dtl_trans($t_vat_setllement_id,$t_cust_account_id){
        $sql = "select  c.trans_date, c.bill_no, c.service_desc, c.service_charge, c.vat_charge 
                from t_vat_setllement a, t_vat_setllement_dtl b, t_cust_acc_dtl_trans c
                where a.t_vat_setllement_id = b.t_vat_setllement_id
                      and a.t_vat_setllement_id = ? 
                      and b.t_cust_acc_dtl_trans_id = c.t_cust_acc_dtl_trans_id 
                      and b.t_cust_account_id = ?";
        
        $output = $this->db->query($sql, array($t_vat_setllement_id,$t_cust_account_id));
        //echo "vat_type->".$p_vat_type_id." tgl ->".$tgl_penerimaan." setoran->".$i_flag_setoran."kode bank -> ".$kode_bank." status->".$status;exit;
        $items = $output->result_array();
        
        return $items;
    }

    /**
     * validate
     * input record validator
     */
    public function validate(){
        
        if ($this->actionType == 'CREATE'){
            // TODO : Write your validation for CREATE here
            
        }else if ($this->actionType == 'UPDATE'){
            // TODO : Write your validation for UPDATE here
        }
        
        return true;
    }

}

/* End of file v_cust_acc_dtl_trans.php */