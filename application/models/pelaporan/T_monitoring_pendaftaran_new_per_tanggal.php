<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_monitoring_pendaftaran_new_per_tanggal extends Abstract_model {

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

    function getDataView($param_arr = array()){
        try {
            $sql = "select replace(replace(f_monitor_tipro_daftar_per_tanggal_v2(1,"
                    .$param_arr['nilai'].",'".$param_arr['date_start_laporan']."','".$param_arr['date_end_laporan']."',"
                    .$param_arr['p_vat_type_id']."),'(\"',''),'\")','') from dual";
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

    function getData($param_arr = array()){
        try {
            $sql = "SELECT * 
                    FROM t_vat_registration a 
                    left join p_vat_type_dtl b on a.p_vat_type_dtl_id=b.p_vat_type_dtl_id  
                    left join t_customer_order c on a.t_customer_order_id = c. t_customer_order_id
                    where trunc(a.creation_date) BETWEEN to_date('".$param_arr['date_start_laporan']."','dd-mm-yyyy') 
                        and to_date('".$param_arr['date_end_laporan']."','dd-mm-yyyy')
                    and case when ".$param_arr['p_vat_type_id']."=0 then true
                            else a.p_vat_type_dtl_id in (select p_vat_type_dtl_id from p_vat_type_dtl where p_vat_type_id =".$param_arr['p_vat_type_id'].")
                        end 
                    and case when ".$param_arr['nilai']."=0 then true
                            else c.p_order_status_id = ".$param_arr['nilai']."
                        end ";
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