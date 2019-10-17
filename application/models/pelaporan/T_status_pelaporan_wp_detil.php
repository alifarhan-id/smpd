<?php

/**
 * T_status_pelaporan_wp_detil Model
 *
 */
class T_status_pelaporan_wp_detil extends Abstract_model {

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

    function getWP_detil(){
        try {
            $sql = "SELECT
                        CASE WHEN cust_account.p_account_status_id = 1 THEN '1' ELSE '2' END as status,
                        vat_type.vat_code,
                        vat_type.p_vat_type_id,
                        COUNT (*) as jumlah
                    FROM
                        t_cust_account cust_account
                    LEFT JOIN
                        p_vat_type vat_type on vat_type.p_vat_type_id = cust_account.p_vat_type_id
                    WHERE CASE WHEN cust_account.p_account_status_id = 1 THEN '1' ELSE '2' END = 1
                    GROUP BY
                        vat_type.vat_code,
                        vat_type.p_vat_type_id,
                    CASE WHEN cust_account.p_account_status_id = 1 THEN '1' ELSE '2' END";
                    
            $query = $this->db->query($sql);

            $items = $query->result_array();

            if ($items == null || $items == '')
                $items = 'no result';
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

/* End of file T_status_pelaporan_wp_detil.php */