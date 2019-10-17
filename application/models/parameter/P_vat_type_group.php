<?php

/**
 * Icons Model
 *
 */
class P_vat_type_group extends Abstract_model {

    public $table           = "p_vat_type_group";
    public $pkey            = "p_vat_type_group_id";
    public $alias           = "pr";

    public $fields          = array(
                                'p_vat_type_group_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Detail Jenis Pajak'),
                                'p_vat_type_id'            => array('type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Jenis Pajak'),
                                'p_vat_group_id'            => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'ID Jenis Pajak'),
                                'description'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "pr.*, pv.vat_code, to_char(pr.updated_date, 'dd-Mon-yyyy') 
                                as update_date_str";
    public $fromClause      = "p_vat_type_group pr 
left join p_vat_type pv on pr.p_vat_type_id = pv.p_vat_type_id 
left join p_vat_group p on pr.p_vat_group_id = p.p_vat_group_id ";

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
            //$this->record['p_vat_type_id'] = $_POST['p_vat_type_id'];
            //$this->db->set('valid_from',"to_char('".$this->record['valid_from_str'] ."','dd-Mon-yyyy')",false);
            //$this->record['valid_from'] = date('Y-m-d', );

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];
            //$this->record['valid_from'] = date('Y-m-d', $this->record['valid_from_str']);
            //$this->record['valid_to'] = date('Y-m-d', $this->record['valid_to_str']);
            //if false please throw new Exception
        }
        return true;
    }

}
/* End of file Icons.php */