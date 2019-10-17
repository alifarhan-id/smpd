<?php

/**
 * T_debt_letter Model
 *
 */
class T_debt_letter extends Abstract_model {

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

    public $selectClause    = "a.*";
    public $fromClause      = "v_vat_registration a";

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
                FROM v_debt_letter
                WHERE t_customer_order_id = $t_customer_order_id";
        
        $query = $this->db->query($sql);
        // print_r($query);
        // exit();
        $item = $query->row_array();
         
        return $item;
    }

    function updateData($t_debt_letter_id, $letter_no, $sms_content){

        $sql = "UPDATE t_debt_letter SET
                    letter_no='$letter_no', 
                    sms_content='$sms_content',
                    updated_date=sysdate,
                    updated_by='$updated_by'
                    WHERE t_debt_letter_id = $t_debt_letter_id";
        
        $query = $this->db->query($sql);
        // print_r($query);
        // exit();
        $item = $query->row_array();
         
        return $item;
    }

    function getVatCode($p_vat_type_id){
        $sql = "select upper(vat_code) as vat_code from p_vat_type where p_vat_type_id = ".$p_vat_type_id;
        
        $query = $this->db->query($sql);
        $item = $query->row_array();
    }


    function getJudul($t_customer_order_id, $p_vat_type_id){

        $sql = "select upper(vat_code) as vat_code from p_vat_type where p_vat_type_id = ".$p_vat_type_id;
        
        $query = $this->db->query($sql);
        $item = $query->row_array();

        $sql = "select 'SURAT_TEGURAN_'||sequence_no||'_'||replace('".$item['vat_code']."',' ','_')||'_PERIODE_'||replace(code,' ','_') AS judul
        from t_debt_letter a
        left join p_finance_period x on a.p_finance_period_id=x.p_finance_period_id
        where t_customer_order_id=".$t_customer_order_id;
        $query = $this->db->query($sql);
        $item = $query->row_array();
        
         
        return $item;
    }

    function getExcel($t_customer_order_id, $p_vat_type_id){

        $sql = "select * from f_debt_letter_list(".$t_customer_order_id.") as a 
          LEFT JOIN t_cust_account as b ON a.t_cust_account_id = b.t_cust_account_id
          WHERE a.p_vat_type_id = ".$p_vat_type_id." AND b.p_vat_type_dtl_id NOT IN (11, 15, 17, 21, 27, 30, 41, 42, 43)";
        
        $query = $this->db->query($sql);
        $item = $query->result_array();
        
         
        return $item;
    }


    

}

/* End of file Icons.php */