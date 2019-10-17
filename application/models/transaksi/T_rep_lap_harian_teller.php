<?php

/**
 * T_rep_lap_harian_teller Model
 *
 */
class T_rep_lap_harian_teller extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = "f.t_payment_receipt_id, f.p_cg_terminal_id, f.npwd, d.wp_name, f.receipt_no, f.payment_date, 
                    a.no_kohir, f.finance_period_code, f.payment_amount, f.payment_vat_amount,
                        c.vat_code as ayat_pajak, f.payment_amount - f.payment_vat_amount as denda,
                        c.code as dtl_code, 
                        vat.code as vat_code";
    public $fromClause      = "t_payment_receipt f, t_vat_setllement a, p_vat_type_dtl c, t_cust_account d,
                        p_vat_type vat";

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

/* End of file T_rep_lap_harian_teller.php */