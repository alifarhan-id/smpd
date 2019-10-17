<?php

/**
 * t_vat_registration_npwpd_jabatan Model
 *
 */
class T_vat_registration_npwpd_jabatan extends Abstract_model {

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

    function insertUpdate(
                            $company_brand,
                            $company_additional_addr,
                            $brand_address_name,
                            $brand_address_no,
                            $brand_address_rt,
                            $brand_address_rw,
                            $brand_p_region_id_kel,
                            $brand_p_region_id_kec,
                            $brand_p_region_id,
                            $brand_phone_no,
                            $brand_mobile_no,
                            $brand_fax_no,
                            $brand_zip_code,
                            $p_rqst_type_id,
                            $p_vat_type_dtl_id){

        

        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $uname = $userdata['app_user_name'];

        $sql = "SELECT * from f_insert_vat_reg_npwpd_jabatan(
                    '$uname', 
                    '$company_brand',
                    '$company_additional_addr',
                    '$brand_address_name',
                    '$brand_address_no',
                    '$brand_address_rt',
                    '$brand_address_rw',
                    $brand_p_region_id_kel,
                    $brand_p_region_id_kec,
                    $brand_p_region_id,
                    '$brand_phone_no',
                    '$brand_mobile_no',
                    '$brand_fax_no',
                    '$brand_zip_code',
                    $p_rqst_type_id,
                    $p_vat_type_dtl_id
                    )";
        
        $query = $this->db->query($sql);
        // print_r($sql);
        // exit();
        $item = $query->row_array();
         
        return $item;
    }

    

}

/* End of file Icons.php */