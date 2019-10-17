<?php

/**
 * T_block_piutang Model
 *
 */
class T_block_piutang extends Abstract_model {

    public $table           = "p_block_piutang";
    public $pkey            = "block_id";
    public $alias           = "b";

    public $fields          = "";

    public $selectClause    = "b.*";
    public $fromClause      = "p_block_piutang";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }
    

    function updateData($block_status, $alasan){

        try {

            $ci =& get_instance();
            $userdata = $ci->session->userdata;
            $username = $userdata['app_user_name'];

            $sql = "select * from f_update_block_piutang('$block_status','$alasan','$username')";
            $query = $this->db->query($sql);

            //echo $sql ; exit();

            $items = $query->result_array();
            // print_r($sql);
            // exit();
            return $items;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

    }
    

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            
            $this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            $this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];
            //if false please throw new Exception
        }
        return true;
    }

}

/* End of file p_bank.php */