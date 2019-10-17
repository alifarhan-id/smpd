<?php

/**
 * T_laporan_penerimaan_pad Model
 *
 */
class T_laporan_skpd_pad extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = "";
    public $fromClause      = "";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }
    

    function getData($p_year_period_id,$periode){
        try {
            $sql = "select *, '' as rc_pad_jenis_pajak_formated from f_laporan_pad_jenis_v2($p_year_period_id,'$periode') AS tbl (rc_pad_jenis_pajak);";
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