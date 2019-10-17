<?php

/**
 * author : Risma
 * T_payment_receipt_skpd Model
 *
 */
class T_payment_receipt_skpd extends Abstract_model {

    public $table           = "p_rqst_type";
    public $pkey            = "p_rqst_type_id";
    public $alias           = "pp";

    public $selectClause    = "pp.*";
    public $fromClause      = "t_payment_receipt_skpd pp ";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function insertUpdate($p_vat_type_dtl_id, $payment_vat_amount, $payment_date){


        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        $tanggal = '';

        if ($payment_date == '') {
            $tanggal = date('Y-m-d');
        }else{
            $tanggal = $payment_date;
        }

        $sql = "select f_insert_jaktap_new(?,?,?) from dual;";

        $query = $this->db->query($sql, array($p_vat_type_dtl_id, $payment_vat_amount, $tanggal));
        $item = $query->row_array();
        
        
            
        return $item;
    }

    

    

}

/* End of file Icons.php */