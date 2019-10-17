<?php

/**
 * Pembuatan schema Model
 *
 */
class T_bphtb_delete_list extends Abstract_model {

    public $table           = "t_bphtb_registration";
    public $pkey            = "t_bphtb_registration_id";
    public $alias           = "a";

    public $fields          = array();

    public $selectClause    = " a.*
                              ";

    public $fromClause      = "t_bphtb_registration a ";

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

    function getData($s_keyword){
        $sql = "select 
                * 
                    from t_bphtb_registration a
                    where 
                    ( upper(a.wp_name) LIKE upper('%".$s_keyword."%') OR 
                      upper(a.njop_pbb) LIKE upper('%".$s_keyword."%') OR
                      upper(a.registration_no) LIKE upper('%".$s_keyword."%')
                    )
                    ORDER BY trim(a.wp_name) ASC";
        $query = $this->db->query($sql);
        //exit;
        $items = $query->result_array();


        if ($items == null || $items == '')
            $items = 'no result';
        // print_r($items);
        // exit();
        return $items;
    }

    public function hapusBphtb(){
        $ci =& get_instance();
        $userinfo = $ci->session->userdata;

        $t_bphtb_registration_id = getVarClean('t_bphtb_registration_id','int',0);
        $alasan = getVarClean('alasan','str','');


        try {

            $sql = "select 
                    * 
                      from f_delete_bphtb(".$t_bphtb_registration_id.",'".$alasan."','".$userinfo['app_user_name']."') AS msg";

            $query = $this->db->query($sql);
            $msg = $query->result_array();


            $result['success'] = true;
            $result['message'] = $msg[0]['msg'];

        }catch(Exception $e) {
            $result['success'] = false;
            $result['message'] = $e->getMessage();
        }

        echo json_encode($result);
        exit;
    }

    
}

