<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_rep_penerimaan_pertahun extends Abstract_model {

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
    

    function getData($p_year_period_id, $p_vat_type_id, $tgl_status, $p_account_status_id, $status_bayar){
        try {

            $sql="select *, '' as tgl_realisasi, '' as keterangan, '' as masa_pajak, 0 as jml
                 from f_rep_penerimaan_pertahun_sts_new_desc($p_year_period_id, $p_vat_type_id, '$tgl_status', $p_account_status_id, $status_bayar);";
            $query = $this->db->query($sql);

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