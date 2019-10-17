<?php

/**
 * T_rep_penerimaan_pertahun_sts Model
 *
 */
class T_rep_penerimaan_pertahun_sts extends Abstract_model {

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

    function getWP($p_year_period_id,$p_vat_type_id, $start_piutang, $end_piutang,  $tgl_status, $p_account_status_id){
        //echo $p_vat_type_id;exit();
        $sql = "select * from sikp.f_rep_penerimaan_pertahun_sts_piutang(?,?,?,?,?,?)";
        
        $output = $this->db->query($sql, array($p_year_period_id, $p_vat_type_id, $start_piutang, $end_piutang, $tgl_status, $p_account_status_id));
        //echo "p_year_period_id->".$p_year_period_id." p_vat_type_id ->".$p_vat_type_id." start_piutang->".$start_piutang."end_piutang -> ".$end_piutang." end_piutang->".$end_piutang." p_account_status_id->".$p_account_status_id;exit;
        
        $items = $output->result_array();
        //print_r($items);exit();

        if ($items == null || $items == '')
            $items = 'no result';
        
        return $items;
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

/* End of file T_rep_penerimaan_pertahun_sts.php */