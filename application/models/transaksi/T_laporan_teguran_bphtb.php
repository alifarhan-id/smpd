<?php

/**
 * t_laporan_teguran_bphtb Model
 *
 */
class T_laporan_teguran_bphtb extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = " reg_bphtb.t_bphtb_registration_id, 
                                to_char(reg_bphtb.creation_date, 'YYYY-MM-DD') as creation_date, 
                                registration_no, 
                                wp_name, 
                                reg_bphtb.p_bphtb_legal_doc_type_id, 
                                bphtb_doc.description, 
                                njop_pbb, 
                                land_area, 
                                land_total_price, 
                                building_area, 
                                building_total_price, 
                                market_price, 
                                bphtb_amt_final, 
                                building_total_price+land_total_price as nilai_njop";
    public $fromClause      = "sikp.t_bphtb_registration reg_bphtb 
                                    LEFT JOIN p_bphtb_legal_doc_type bphtb_doc 
                                on bphtb_doc.p_bphtb_legal_doc_type_id = reg_bphtb.p_bphtb_legal_doc_type_id 
                                    LEFT JOIN t_customer_order cust_order 
                                ON cust_order.t_customer_order_id = reg_bphtb.t_customer_order_id ";

    public $refs            = array();

    function __construct() {
        parent::__construct();
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