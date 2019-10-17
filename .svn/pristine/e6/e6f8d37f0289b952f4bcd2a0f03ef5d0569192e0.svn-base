<?php

/**
 * T_restore_tuutap Model
 *
 */
class T_restore_tuutap extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = "*, to_char(to_timestamp (substring(thn_bln from 5 for 2)::text, 'MM'), 'Month') AS bulan_text";
    public $fromClause      = "tuutap";

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

    function migrasiData($npwpd_gab, $periode_gab,$thn_bln,$no_kohir){
        try {
            $sql = "call p_mig_piutang_by_request('".$npwpd_gab."','".$periode_gab."','".$thn_bln."','".$no_kohir."', 'ADMIN')";

            $query = $this->db->query($sql);                      

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

}

/* End of file T_restore_tuutap.php */