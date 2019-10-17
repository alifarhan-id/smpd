<?php

/**
 * t_ppat Model
 *
 */
class T_reconciliation_file_detail extends Abstract_model {

    public $table           = "t_reconciliation_file_detail";
    public $pkey            = "t_reconciliation_file_detail_id";
    public $alias           = "";

    public $fields          = array(
                                't_reconciliation_file_detail_id'    => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID'),
                                't_reconciliation_file_id'    => array('nullable' => false,'type' => 'int',  'unique' => false, 'display' => 'ID Parent'),

                                'transaction_date'         => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Transaction Date'),
                                'tax_code'         => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Tax Code'),
                                'payment_key'         => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Payment Key'),
                                'payment_ref_no'         => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Payment Ref No'),
                                'payment_amount'         => array('nullable' => true, 'type' => 'num', 'unique' => false, 'display' => 'Payment Amount'),

                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By')

                            );

    public $selectClause    = "*";
    public $fromClause      = "t_reconciliation_file_detail";

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

    function delDetailAll($t_reconciliation_file_id){
        $items = $this->db->delete('t_reconciliation_file_detail', array('t_reconciliation_file_id' => $t_reconciliation_file_id));
        return;
    }

}

/* End of file p_bank.php */