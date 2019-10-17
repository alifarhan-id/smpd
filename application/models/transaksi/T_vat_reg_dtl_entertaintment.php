<?php

/**
 * Icons Model
 *
 */
class T_vat_reg_dtl_entertaintment extends Abstract_model {

    public $table           = "t_vat_reg_dtl_entertaintment";
    public $pkey            = "t_vat_reg_dtl_entertaintment_id";
    public $alias           = "a";

    public $fields          = array(
                                't_vat_reg_dtl_entertaintment_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Cust Order'),
                                't_vat_registration_id'  => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'ID Cust Order'),
                                'entertainment_desc'           => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'No Urut'),
                                'room_qty'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Jumlah Kamar'),
                                'clerk_qty'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Jumlah Kamar'),
                                'seat_qty'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Okupansi'),
                                'service_charge_wd'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Tarif Weekend'),
                                'booking_hour'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Jam Booking'),
                                'f_and_b'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'F & B'),
                                'portion_person'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Porsi/Orang'),
                                'service_charge_we'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Tarif Non Weekend'),
                                'description'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                 'creation_date'         => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By')

                            );

    public $selectClause    = "a.*";
    public $fromClause      = "v_vat_reg_dtl_entertaintment a";
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
            $this->record['portion_person']=(int) $this->record['portion_person'];
            $this->record['booking_hour']=(int) $this->record['booking_hour'];
            $this->record['f_and_b']=(int) $this->record['f_and_b'];
        
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

    function getEnterDesc($t_vat_registration_id){
        $sql = "SELECT a.p_vat_type_dtl_id, b.vat_code
                FROM t_vat_registration a, p_vat_type_dtl b 
                WHERE a.p_vat_type_dtl_id=b.p_vat_type_dtl_id and a.t_vat_registration_id = ".$t_vat_registration_id;
        $query = $this->db->query($sql);
        $item = $query->row_array();

        return $item;
    }

    



    

    

}

/* End of file Icons.php */