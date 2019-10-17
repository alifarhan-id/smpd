<?php

/**
 * Inquery_bphtb_ws Model
 *
 */
class Inquery_bphtb_ws extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = "";

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

    function getDataLink($nop, $tahun){
        $ws_data = file_get_contents("http://45.118.112.232:81/webservice-pbb/trans/bphtb_webservice.php?method=bphtb&param=".$nop.$tahun);
        //Link from CodeCharge
        //http://45.118.112.232:81/webservice-pbb/trans/bphtb_webservice.php?method=bphtb&param='.$NOP.$Tahun);
        $ws_data = json_decode($ws_data);
        $ws_data = $ws_data->items;

        return $ws_data;
    }

    function getKotaOP($kota){
        $sql = "SELECT * FROM f_get_region_nascode('".$kota."')";

        $query = $this->db->query($sql);

        $item = $query->result_array();

        return $item;
    }

    function getKecOP($kecamatan){
        $sql = "SELECT * FROM f_get_region_nascode('".$kecamatan."')";

        $query = $this->db->query($sql);

        $item = $query->result_array();

        return $item;
    }

    function getKelOP($kelurahan){
        $sql = "SELECT * FROM f_get_region_nascode('".$kelurahan."')";

        $query = $this->db->query($sql);

        $item = $query->result_array();

        return $item;
    }



    
}

/* End of file */