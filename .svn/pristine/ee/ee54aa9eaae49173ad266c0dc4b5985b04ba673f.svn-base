<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_laporan_harian_sptpd extends Abstract_model {

    public $table           = "t_cust_account";
    public $pkey            = "t_cust_account_id";
    public $alias           = "a";

    public $fields          = "";

    public $selectClause    = "a.*";
    public $fromClause      = "t_cust_account a";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function getData1($param_arr = array()){
        try {
            $sql = "select 
                        *,
                        to_char(start_period, 'DD-MM-YYYY') as start_period_formated,
                        to_char(end_period, 'DD-MM-YYYY') as end_period_formated,
                        to_char(tanggal, 'DD-MM-YYYY') as date_settle_formated 
                    from sikp.f_laporan_harian_sptpd2(1,".$param_arr['year_code'].",'".$param_arr['date_start_laporan']."', '".$param_arr['date_end_laporan']."',".$param_arr['p_vat_type_dtl_id'].") ORDER BY tanggal, jenis ASC";
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

    function getData($param_arr = array()){
        try {
            $sql = "select 
                        *,
                        to_char(start_period, 'DD-MM-YYYY') as start_period_formated,
                        to_char(end_period, 'DD-MM-YYYY') as end_period_formated,
                        to_char(tanggal, 'DD-MM-YYYY') as date_settle_formated 
                    from sikp.f_laporan_harian_sptpd2(".$param_arr['p_vat_type_id'].",2001,'".$param_arr['date_start_laporan']."', '".$param_arr['date_end_laporan']."') ORDER BY trunc(tanggal),ayat_code_dtl, jenis ASC";
                    
            $query = $this->db->query($sql);

            $items = $query->result_array();
            /*print_r($items);
            exit();*/
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