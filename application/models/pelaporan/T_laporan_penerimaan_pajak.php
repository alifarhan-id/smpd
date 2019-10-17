<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_laporan_penerimaan_pajak extends Abstract_model {

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
    

    function getData($p_vat_type_id, $start_date, $end_date,$jenis_tahun){
        try {
            $sql="";
            if($jenis_tahun=='pajak'){
                $sql="select * from sikp.f_laporan_per_thn_pajak(".$p_vat_type_id.",".$year_period_id.",'".$start_date."', '".$end_date."')";
            }else if($jenis_tahun=='bayar'){
                $sql = "select * from sikp.f_laporan_per_thn_bayar(".$p_vat_type_id.",2013,'".$start_date."', '".$end_date."')";
            }
            $query = $this->db->query($sql);

            $items = $query->result_array();
            // print_r($items);
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