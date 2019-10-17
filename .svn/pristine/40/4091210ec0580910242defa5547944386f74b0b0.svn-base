<?php

/**
 * Icons Model
 *
 */
class Ty_lov_npwd extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array( );

    public $selectClause    = " ty_lov_npwd as t_cust_account_id, 
                                npwd, 
                                company_name,
                                p_vat_type_id, 
                                vat_code, 
                                p_vat_type_dtl_id, 
                                vat_code_dtl";
    public $fromClause      = "f_get_npwd_by_username(%s) AS tbl (ty_lov_npwd)";

    public $refs            = array();

    function __construct() {
        parent::__construct();
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'"); 
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            /*$this->record['creation_date'] = date('Y-m-d');
            $this->record['created_by'] = $userdata['app_user_name'];*/
           

        }else {
            //do something
            //example:
            //if false please throw new Exception
        }
        return true;
    }

}

/* End of file Icons.php */