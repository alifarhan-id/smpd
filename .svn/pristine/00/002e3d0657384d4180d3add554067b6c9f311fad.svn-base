<?php

/**
 * T_penutupan_wp Model
 *
 */
class T_penutupan_wp_ver_piutang extends Abstract_model {

    public $table           = "t_vat_registration";
    public $pkey            = "t_vat_registration_id";
    public $alias           = "a";

    public $fields          = array(
                                't_customer_order_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Cust Order'),
                                'order_no'           => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'No Urut'),
                                'rqst_type_code'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),

                                'p_rqst_type_id'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Deskripsi'),
                                'order_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                't_vat_registration_id'            => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Created By'),
                                'p_order_status_id'            => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Created By'),
                                'company_brand'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'npwpd'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                                'description'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                'order_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Order Date'),
                                 'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "x.* ";
    public $fromClause      = "v_t_cust_acc_status_modif x";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $sql = "SELECT * FROM f_order_no(".$this->record['p_rqst_type_id'].")";
        $query = $this->db->query($sql);
        $item = $query->row_array();

        

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            $this->record['p_order_status_id'] = 1;
            $this->record['order_no'] = $item['f_order_no'];
            $this->record['order_date'] = date('Y-m-d');
            $this->record['creation_date'] = date('Y-m-d');
            $this->record['created_by'] = $userdata['app_user_name'];
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

    function getData($t_customer_order_id){

        $sql = "SELECT * 
                FROM v_t_cust_acc_status_modif
                WHERE t_customer_order_id = $t_customer_order_id";
        
        $query = $this->db->query($sql);
        // print_r($query);
        // exit();
        $item = $query->row_array();
         
        return $item;
    }

    function getDataPiutang($npwd){
        $sql="select a.*,to_char(a.tgl_tap,'dd-mm-yyyy') as tgl_tap_formated, to_char(a.tgl_bayar,'dd-mm-yyyy') as tgl_bayar_formated , b.wp_name, c.code as periode_bayar
            from t_piutang_pajak_penetapan_final as a
            LEFT JOIN t_cust_account as b ON a.t_cust_account_id = b.t_cust_account_id
            LEFT JOIN p_finance_period as c ON a.p_finance_period_id = c.p_finance_period_id
            WHERE a.npwd ILIKE '%".$npwd."%'";
        $query = $this->db->query($sql);
        /*print_r($sql);
        exit();*/
        $item = $query->result_array();
         
        return $item;
    }

    function setWpInactive($t_cust_account_id){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        
        $sql = "select f_update_acc_status(".$t_cust_account_id.",3,'TUTUP SEMENTARA POSISI PIUTANG',to_char(sysdate, 'dd-mm-yyyy'), '".$userdata['app_user_name']."')";

        $query = $this->db->query($sql);
        /*print_r($sql);
        exit();*/
        $item = $query->result_array();
         
        return $item;
        
        /*$dbConn = new clsDBConnSIKP();
        if($dbConn->query($sql)){
            $dbConn->next_record();
            if($dbConn->Record['o_result_msg'] != 'OK'){
                $t_vat_registrationForm->Errors->addError($dbConn->Record['o_result_msg']);
            }
        }else{
            $t_vat_registrationForm->Errors->addError('Gagal update status');
        }*/
    }

}

/* End of file Icons.php */