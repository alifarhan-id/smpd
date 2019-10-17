<?php

/**
 * Pembuatan schema Model
 *
 */
class T_vat_setllement_ppat extends Abstract_model {

    public $table           = "t_bphtb_registration";
    public $pkey            = "t_bphtb_registration_id";
    public $alias           = "regis";

    public $fields          = array();

    public $selectClause    = " ";

    public $fromClause      = "";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {
        $ci =& get_instance();

        if($this->actionType == 'CREATE') {

        }else {
            /*$this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];*/
        }
        return true;
    }


    function submit($param = array()){

        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $userdata = '\''.$userdata['app_user_name'].'\'';

        foreach ($param as $key => $value) {     
            ${"$key"} = ($value == ''|| $value == null) ? 'null' : '\''.$value.'\'';
        }

        $sql = "SELECT * FROM sikp.f_vat_settlement_ppat($t_ppat_id,$ppat_name, $address_name, $no_sk , $p_finance_period_id , $sanksi_ajb,$userdata, $p_finance_period_id_ajb )";
        //return $sql;                                            
        $query = $this->db->query($sql);
        $item = $query->row_array();
        
            
        return $item;      
    }



    
}

