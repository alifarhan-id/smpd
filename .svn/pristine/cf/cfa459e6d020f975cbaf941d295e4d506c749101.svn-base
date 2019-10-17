<?php

/**
 * t_rep_bulanan_target_vs_realisasi_v2 Model
 *
 */
class T_rep_bulanan_target_vs_realisasi_v2 extends Abstract_model {

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

    function getDateAwal($p_finance_period_id){
        $sql = "SELECT trunc(start_date) as start_date FROM p_finance_period
                WHERE p_finance_period_id = ?";

        $output = $this->db->query($sql, array($p_finance_period_id));
        $items = $output->result_array();

        return $items;
    }

    function getDateAkhir($p_finance_period_id){
        $sql = "SELECT trunc(end_date) as end_date FROM p_finance_period
                WHERE p_finance_period_id = ?";

        $output = $this->db->query($sql, array($p_finance_period_id));
        $items = $output->result_array();

        return $items;
    }

    function getDataRow($year_period_id, $p_vat_type_id, $date_awal, $date_akhir){
        //echo $year_period_id.",".$p_vat_type_id.','.$date_awal.",".$date_akhir;exit;
        $sql = "SELECT 
                    a.vat_code as ayat,x.*
                FROM
                    f_target_vs_real_monthly_new3_mark_ii(?,?) x
                left join p_vat_type_dtl a 
                on a.p_vat_type_dtl_id = x.p_vat_type_dtl_id 
                WHERE trunc(start_date) >= ? 
                AND trunc(end_date) <= ? 
                ORDER BY a.vat_code,p_finance_period_id";

        $output = $this->db->query($sql, array($year_period_id, $p_vat_type_id, $date_awal, $date_akhir ));
        $items = $output->result_array();

        return $items;

    }

    function getVat_type(){
        $sql = "SELECT a.p_vat_type_id, upper(a.vat_code) AS jenis_pajak, upper(substring(a.vat_code from 7)) as pajak_text 
                FROM p_vat_type AS a
                WHERE a.p_vat_type_id NOT IN (7) 
                ORDER BY a.p_vat_type_id ASC";

        $output = $this->db->query($sql);

        $items = $output->result_array();

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

/* End of file t_rep_bulanan_target_vs_realisasi_v2.php */