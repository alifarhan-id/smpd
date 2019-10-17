<?php

/**
 * Icons Model
 *
 */
class T_vat_reg_dtl_hotel_srvc extends Abstract_model {

    public $table           = "t_vat_reg_dtl_hotel_srvc";
    public $pkey            = "t_vat_reg_dtl_hotel_srvc_id";
    public $alias           = "a";

    public $fields          = array(
                                't_vat_reg_dtl_hotel_srvc_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Cust Order'),
                                't_vat_registration_id'  => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'ID Cust Order'),
                                'services'          => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Fasilitas'),
                                'description'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                 'creation_date'         => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "a.*";
    public $fromClause      = "t_vat_reg_dtl_hotel_srvc a";
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

    function getVRegDtlRest(){

        $sql = "SELECT * FROM v_vat_reg_dtl_restaurant";

        $query = $this->db->query($sql);
        $items = $query->result_array();
        
        return $items;
    }
    function getVRegDtlHotel(){

        $sql = "SELECT * FROM v_vat_reg_dtl_hotel";

        $query = $this->db->query($sql);
        $items = $query->result_array();
        
        return $items;
    }
    function getVRegDtlEntertain(){

        $sql = "SELECT * FROM v_vat_reg_dtl_entertaintment";

        $query = $this->db->query($sql);
        $items = $query->result_array();
        
        return $items;
    }
    function getVRegDtlParking(){

        $sql = "SELECT * FROM v_vat_reg_dtl_parking";

        $query = $this->db->query($sql);
        $items = $query->result_array();
        
        return $items;
    }
    function getVRegDtlPpj(){

        $sql = "SELECT * FROM v_vat_reg_dtl_ppj";

        $query = $this->db->query($sql);
        $items = $query->result_array();
        
        return $items;
    }
    
    



    

    

}

/* End of file Icons.php */