<?php

/**
 * Icons Model
 *
 */
class T_vat_reg_dtl_parking extends Abstract_model {

    public $table           = "t_vat_reg_dtl_parking";
    public $pkey            = "t_vat_reg_dtl_parking_id";
    public $alias           = "a";

    public $fields          = array(
                                't_vat_reg_dtl_parking_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Cust Order'),
                                't_vat_registration_id'  => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'ID Cust Order'),
                                'classification_desc'           => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'No Urut'),
                                'parking_size'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Nomor Surat'),
                                'max_load_qty'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Berlaku Dari'),
                                'avg_subscription_qty'          => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Berlaku Sampai'),
                                'first_service_charge'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Berlaku Dari'),
                                'next_service_charge'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Berlaku Sampai'),
                                'description'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                 'creation_date'         => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "a.*, round(parking_size,0) as parking_size, round(first_service_charge,0) as first_service_charge, round(next_service_charge,0) as next_service_charge";
    public $fromClause      = "v_vat_reg_dtl_parking a";
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
            $this->record['classification_desc'] = "PARKIR";
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



    

}

/* End of file Icons.php */