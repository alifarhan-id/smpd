<?php

/**
 * t_rep_bulanan_target_vs_realisasi Model
 *
 */
class T_rep_bulanan_target_vs_realisasi extends Abstract_model {

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

    function getDataRow($year_period_id, $p_vat_type_id, $date_awal, $date_akhir, $p_vat_type_dtl_id){
        //echo $year_period_id.",".$p_vat_type_id.','.$date_awal.",".$date_akhir;exit;
        $sql = "SELECT SUM(target_amount) AS target, SUM(realisasi_amt) AS realisasi,
                SUM(debt_amt) AS piutang
                FROM f_target_vs_real_monthly_new(?,?)
                WHERE trunc(start_date) >= ?
                AND trunc(end_date) <= ?
                AND p_vat_type_dtl_id = ?";

        $output = $this->db->query($sql, array($year_period_id, $p_vat_type_id, $date_awal, $date_akhir, $p_vat_type_dtl_id ));
        $items = $output->result_array();

        return $items;

    }

    function getVat_type(){
        $sql = "SELECT a.p_vat_type_id, upper(a.vat_code) AS jenis_pajak, upper(substring(a.vat_code from 7)) as pajak_text, b.vat_code, b.p_vat_type_dtl_id
                FROM p_vat_type AS a 
                LEFT JOIN p_vat_type_dtl as b ON a.p_vat_type_id = b.p_vat_type_id
                WHERE a.p_vat_type_id NOT IN (7,9) AND b.p_vat_type_dtl_id NOT IN (12, 23, 30, 31, 42, 43)
                ORDER BY a.p_vat_type_id ASC, b.vat_code ASC";

        $output = $this->db->query($sql);

        $items = $output->result_array();

        return $items;
    }

    function getDataRowReklame($year_period_id, $date_awal, $date_akhir){
        $sql = "SELECT SUM(target_amount) AS target, SUM(realisasi_amt) AS realisasi,
                SUM(debt_amt) AS piutang
                FROM f_target_vs_real_monthly_new(?,9)
                WHERE trunc(start_date) >= ?
                AND trunc(end_date) <= ?";

        $output = $this->db->query($sql, array($year_period_id, $date_awal, $date_akhir));
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

/* End of file t_rep_bulanan_target_vs_realisasi.php */