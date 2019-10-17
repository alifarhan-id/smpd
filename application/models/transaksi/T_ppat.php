<?php

/**
 * t_ppat Model
 *
 */
class T_ppat extends Abstract_model {

    public $table           = "t_ppat";
    public $pkey            = "t_ppat_id";
    public $alias           = "a";

    public $fields          = array(
                                't_ppat_id'    => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID T PPAT'),
                                'ppat_name'         => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Nama PPAT'),
                                'address_name'      => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Alamat Lokasi'),
                                'address_no'             => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'No Lokasi'),

                                'address_rt'           => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'RT'),
                                'address_rw'          => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'RW'),

                                'p_region_id'       => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'KOTA'),
                                'p_region_id_kec'         => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'Kecamtan'),
                                'p_region_id_kel'      => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'Kelurahan'),

                                'personal_identification_id'        => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'Jenis Identitas'),
                                'identification_no'        => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'No Identifikasi'),
                                'phone_no'      => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'No. Telpon'),

                                'mobile_no'        => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'No. Handphone'),
                                'fax_no'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'No. Fax'),
                                'zip_code'      => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Kode Pos'),
                                'email_address'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Email'),

                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By')

                            );

    public $selectClause    = "a.*,
                                b.region_name as kota,
                                c.region_name as kecamatan,
                                d.region_name as kelurahan,
                                to_char(a.creation_date,'DD-MON-YYYY')as creation_date, 
                                to_char(a.updated_date,'DD-MON-YYYY')as updated_date";
    public $fromClause      = "t_ppat a
                                left join p_region as b
                                    on a.p_region_id = b.p_region_id
                                left join p_region as c
                                    on a.p_region_id_kec = c.p_region_id
                                left join p_region as d
                                    on a.p_region_id_kel = d.p_region_id";

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
            //$this->record['created_date'] = date('Y-m-d');
            //$this->record['updated_date'] = date('Y-m-d');


            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->db->set('creation_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] =  $userdata['app_user_name'];
            $this->record['created_by'] =  $userdata['app_user_name'];

        }else {
            //do something
            //example:
            //$this->record['updated_date'] = date('Y-m-d');
            //if false please throw new Exception
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] =  $userdata['app_user_name'];
        }
        return true;
    }

    function dataCombo(){
        $sql = "SELECT p_simple_parameter_list_id,code 
                FROM p_simple_parameter_list 
                WHERE p_simple_parameter_type_id = 1";
        $query = $this->db->query($sql);
        $items = $query->result_array();
        return $items;
    }

}

/* End of file p_bank.php */