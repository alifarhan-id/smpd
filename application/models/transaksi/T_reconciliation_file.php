<?php

/**
 * t_ppat Model
 *
 */
class T_reconciliation_file extends Abstract_model {

    public $table           = "t_reconciliation_file";
    public $pkey            = "t_reconciliation_file_id";
    public $alias           = "";

    public $fields          = array(
                                't_reconciliation_file_id'    => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID'),

                                'file_name'         => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Nama File'),
                                'file_date'         => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Nama Date'),
                                'file_dir'         => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Nama Direktori'),
                                'total_trans_record'         => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Total Transaksi Record'),
                                'total_amount'         => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Total Amount'),

                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By')

                            );

    public $selectClause    = "*";
    public $fromClause      = "t_reconciliation_file";

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
            //$this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->db->set('creation_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            //$this->record['updated_by'] =  $userdata['app_user_name'];
            $this->record['created_by'] =  $userdata['app_user_name'];

        }else {
            //do something
            //example:
            //$this->record['updated_date'] = date('Y-m-d');
            //if false please throw new Exception
            //$this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            //$this->record['updated_by'] =  $userdata['app_user_name'];
        }
        return true;
    }

}

/* End of file p_bank.php */