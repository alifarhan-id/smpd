<?php

/**
 * T_laporan_rekap_surat_teguran_per_bulan Model
 *
 */
class T_laporan_rekap_surat_teguran_per_bulan extends Abstract_model {

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

    function getDataRekap($p_finance_period_id){
        $sql = "select t_debt_letter_id,t_customer_order_id,letter_date, sequence_no, code, 
                    (select count(*)
                    from f_debt_letter_list(a.t_customer_order_id) x
                    LEFT JOIN t_cust_account as y ON x.t_cust_account_id = y.t_cust_account_id
                    where y.p_vat_type_dtl_id NOT IN (11, 15, 17, 21, 27, 30, 41, 42, 43)) as jml
            from t_debt_letter a
            LEFT JOIN p_finance_period b on a.p_finance_period_id=b.p_finance_period_id
             where 
                a.p_finance_period_id in (select p_finance_period_id 
                    from p_finance_period where p_year_period_id = ?)
            ORDER BY letter_date";
        
        $output = $this->db->query($sql, array($p_finance_period_id));
        //echo "vat_type->".$p_vat_type_id." tgl ->".$tgl_penerimaan." setoran->".$i_flag_setoran."kode bank -> ".$kode_bank." status->".$status;exit;

        $items = $output->result_array();
        if($items == '' || $items == null)
            $items = 'no result';
        //print_r($items); exit;
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

/* End of file T_laporan_rekap_surat_teguran_per_bulan.php */