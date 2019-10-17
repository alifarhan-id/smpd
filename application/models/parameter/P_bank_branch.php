<?php

/**
 * Bank Branch Model
 *
 */
class P_bank_branch extends Abstract_model {

    public $table           = "p_bank_branch";
    public $pkey            = "p_bank_branch_id";
    public $alias           = "branch";

    public $fields          = array(
                                'p_bank_branch_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Bank Branch'),
                                 'p_bank_id'            => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'ID Bank'),
                                 'branch_name'           => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Cabang Bank'),
                                'code'           => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Kode'),
                                'parent_code'           => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Nomor Induk'),
                                'maximum_user'           => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Pengguna Maksimal'),                                
                                'description'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                
                                
                                'update_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'update_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "branch.*";
    public $fromClause      = "p_bank_branch branch";

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
            
            
            $this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];
            //$this->record['p_vat_type_id'] = $_POST['p_vat_type_id'];
            //$this->db->set('p_vat_type_id',$_GET['p_vat_type_id'],false);
            //$this->record['valid_from'] = date('Y-m-d', $time);

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            $this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];
           // $this->record['valid_from'] = date('Y-m-d', $time);
            //if false please throw new Exception
        }
        return true;
    }

}

/* End of file p_bank_branch.php */