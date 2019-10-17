<?php

/**
 * Icons Model
 *
 */
class T_vat_reg_dtl_restaurant extends Abstract_model {

    public $table           = "t_vat_reg_dtl_restaurant";
    public $pkey            = "t_vat_reg_dtl_restaurant_id";
    public $alias           = "a";

    public $fields          = array(
                                't_vat_reg_dtl_restaurant_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Cust Order'),
                                't_vat_registration_id'  => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'ID Cust Order'),
                                'service_type_desc'           => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Jenis Pelayanan'),
                                'seat_qty'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Jumlah Kursi'),
                                'table_qty'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Jumlah Meja'),
                                'max_service_qty'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Daya Tampung'),
                                'avg_subscription'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Jumlah pengunjung rata-rata per Bulan'),
                                'description'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                 'creation_date'         => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "a.*, round(avg_subscription,0) as avg_subscription";
    public $fromClause      = "v_vat_reg_dtl_restaurant a";
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