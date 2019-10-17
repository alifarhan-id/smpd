<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_rep_idx_kepatuhan_wp extends Abstract_model {

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
    

    function getTotalPerJenis($jenis_pajak, $p_finance_period_id, $tipe_patuh) {

        $sql = "SELECT COUNT(*) AS jumlah FROM f_rep_bpps_patuh(".$jenis_pajak.",".$p_finance_period_id.",".$tipe_patuh.")";
        $query = $this->db->query($sql);
        $jumlah_total = $query->row_array();
        return $jumlah_total;
    }

    function getGrandTotal($p_finance_period_id) {
        
        $sql = "SELECT SUM( JML) AS jumlah FROM (
                    SELECT count(*) AS JML from f_rep_bpps_patuh(null,".$p_finance_period_id.",1)
                    UNION ALL
                    SELECT count(*) AS JML from f_rep_bpps_patuh(null,".$p_finance_period_id.",2)
                    UNION ALL
                    SELECT count(*) AS JML from f_rep_bpps_patuh(null,".$p_finance_period_id.",3)
                 )";
        $query = $this->db->query($sql);
        $jumlah_total = $query->row_array();
        return $jumlah_total;
    }


    function getGrandTotalPerJenisPajak($jenis_pajak, $p_finance_period_id) {
        
        $sql = "SELECT SUM( JML) AS jumlah FROM (
                    SELECT count(*) AS JML from f_rep_bpps_patuh(".$jenis_pajak.",".$p_finance_period_id.",1)
                    UNION ALL
                    SELECT count(*) AS JML from f_rep_bpps_patuh(".$jenis_pajak.",".$p_finance_period_id.",2)
                    UNION ALL
                    SELECT count(*) AS JML from f_rep_bpps_patuh(".$jenis_pajak.",".$p_finance_period_id.",3)
                 )";
        $query = $this->db->query($sql);
        $jumlah_total = $query->row_array();
        return $jumlah_total;
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