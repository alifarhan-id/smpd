<?php

/**
 * Chart_proc Model
 *
 */
class T_vat_setllement_dtl_ro_otobuk_tapping extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = " npwd,
                                to_char(start_period,'mm')as bulan,
                                to_char(start_period,'yyyy') as tahun ";
    public $fromClause      = "t_vat_setllement";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {
        // $ci =& get_instance();
        // $userinfo = $ci->ion_auth->user()->row();

        if($this->actionType == 'CREATE') {
            //do something
            // example :

            // $this->record[$this->pkey] = $this->generate_id($this->table);
            // $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            // $this->db->set('creation_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            // $this->record['updated_by'] = $userinfo->username;
            // $this->record['created_by'] = $userinfo->username;

        }else {
            //do something
            //example:
            //if false please throw new Exception
            // $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            // $this->record['updated_by'] = $userinfo->username;
        }
        return true;
    }

    function getDataLink($params = array()){
        $ws_data = file_get_contents("http://45.118.112.226/dashboard/page/print/print_data_monthly_npwpd.php?bulan=".$params['bulan']."&tahun=".$params['tahun']."&npwpd=".$params['npwd']);
        $ws_data = json_decode($ws_data);
        $ws_data = $ws_data->items;

        return $ws_data;
    }

    
}

/* End of file */