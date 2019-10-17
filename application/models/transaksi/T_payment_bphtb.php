<?php

/**
 * Pembuatan schema Model
 *
 */
class T_payment_bphtb extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = " ";

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

    function getPaymentBphtb($no_registrasi = 0){
        $sql = "select o_ret_code from f_inquery_bphtb('".$no_registrasi."', null)";
        $query = $this->db->query($sql);
        //exit;
        $data =  $query->row_array();

        return $data['o_ret_code'];
    }

    function paymentBphtb($no_registrasi = 0,$nilai_pembayaran=0,$bit48=null){
        $sql = "SELECT * FROM f_payment_bphtb('".$no_registrasi."',".$nilai_pembayaran.", '1', '1', '".$bit48."', null)";
        $query = $this->db->query($sql);
        //exit;
        $data =  $query->row_array();

        return $data['o_ret_code'];
    }

    
}

