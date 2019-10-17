<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_laporan_denda_profesi_ppat extends Abstract_model {

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

    function getData($p_finance_period_id,$status_bayar){
        try {
            $sql = "select a.t_vat_setllement_id as set_id,nvl(sanksi_ajb,'-') as sanksi_ajb_2,
                to_char(settlement_date,'dd-mm-yyyy') as tgl_tap,
                case when sanksi_ajb is null then '-' else x.code end as bulan_ajb,
                case when sanksi_ajb is null then x.code else '-' end as bulan_denda_profesi,
                y.payment_date,
                a.*, '' as status, 0 as nomor from t_vat_setllement_ppat a
                left join p_finance_period x on x.p_finance_period_id=a.p_finance_period_id
                left join t_payment_receipt_ppat y on y.t_vat_setllement_id=a.t_vat_setllement_id
                where TRUE ";
            if ($p_finance_period_id!=''){
                $sql.="and a.p_finance_period_id =".$p_finance_period_id;
            }
            if ($status_bayar==2){
                $sql.="and receipt_no is not null ";
            }else{
                if ($status_bayar==3){
                    $sql.="and receipt_no is null ";
                }else{
                    $sql.="";
                }
            }
            $sql.="ORDER BY ppat_name,start_period";
            $query = $this->db->query($sql);

            // echo $sql;
            // exit();

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