<?php

/**
 * T_restore_trans Model
 *
 */
class T_restore_trans extends Abstract_model {

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

    function getData_restore($npwd, $p_vat_type_id, $date_start_laporan, $date_end_laporan){
        try {
            $sql = "SELECT *, p.code as periode_code, t.code as type_code
                    FROM h_vat_setllement h
                    LEFT JOIN p_finance_period p
                    on p.p_finance_period_id = h.p_finance_period_id
                    LEFT JOIN p_settlement_type t
                    on t.p_settlement_type_id = h.p_settlement_type_id
                    WHERE modification_type = 'Delete'
                    ";
            if ($npwd != '' || $npwd != null){
                $sql.=" and h.npwd LIKE '%".$npwd."%' ";
            }
            if ($date_start_laporan != '' && $date_end_laporan != ''){
                $sql.=" and (trunc(modification_date) <= '".$date_end_laporan."') and (trunc(modification_date) >= '".$date_start_laporan."') ";
            }
            if ( $p_vat_type_id != '' || $p_vat_type_id != 0){
                $sql.=" and (h.p_vat_type_dtl_id in (select p_vat_type_dtl_id from p_vat_type_dtl where p_vat_type_id = ".$p_vat_type_id.")) ";
            }

            $sql.=" order by modification_date desc ";
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

/* End of file T_restore_trans.php */