<?php

/**
 * T_lembar_kontrol_bphtb Model
 *
 */
class T_lembar_kontrol_bphtb extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = " x.receipt_no,
                                to_char(payment_date, 'YYYY-MM-DD') as payment_date,
                                a.wp_name,
                                a. registration_no,
                                a.bphtb_amt_final,
                                a.building_area,
                                a.land_area,
                                a.njop_pbb,
                                to_char(a.creation_date, 'YYYY-MM-DD') as creation_date";
    public $fromClause      = "t_bphtb_registration a
                left JOIN t_payment_receipt_bphtb x on x.t_bphtb_registration_id=a.t_bphtb_registration_id";

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

/* End of file T_lembar_kontrol_bphtb.php */