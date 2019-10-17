<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_cetak_kartu_npwpd_dr_t_cust_account extends Abstract_model {

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

    

    function getData($s_keyword){
        try {
            $sql = "SELECT * FROM t_cust_account WHERE
                    npwpd ilike '%".$s_keyword."%'
                    OR wp_name ilike '%".$s_keyword."%'
                    OR company_brand ilike '%".$s_keyword."%'
                    ORDER BY wp_name";
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