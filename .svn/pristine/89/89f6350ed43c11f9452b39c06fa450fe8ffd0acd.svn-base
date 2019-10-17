<?php

/**
 *  Model
 *
 */
class T_cust_acc_dtl_trans extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array( );

    public $selectClause    = "";
    public $fromClause      = "";

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
            /*$this->record['creation_date'] = date('Y-m-d');
            $this->record['created_by'] = $userdata['app_user_name'];*/
           

        }else {
            //do something
            //example:
            //if false please throw new Exception
        }
        return true;
    }

    function get_data($t_cust_account_id,$trans_date){

        $sql = "SELECT 
                        t_cust_acc_dtl_trans_id, 
                        t_cust_account_id, 
                        bill_no, 
                        service_desc, 
                        service_charge, 
                        vat_charge, 
                        description 
            FROM f_get_cust_acc_dtl_trans(".$t_cust_account_id.",'".$trans_date."')AS tbl (t_cust_acc_dtl_trans_id) ";
        //echo $sql;exit;
        $query = $this->db->query($sql);
        $items = $query->result_array();
        return $items;
    }

    function insert_data($param){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        $sql = "SELECT o_result_code, 
                        o_result_msg 
                FROM f_ins_cust_acc_dtl_trans_2(
                                            ".$param['t_cust_account_id'].",
                                             '".$param['trans_date']."',
                                             '".$param['bill_no']."',
                                             '".$param['serve_desc']."',
                                             ".$param['service_charge'].",
                                             ".$param['vat_charge'].",
                                             '".$param['description']."',
                                             '".$userdata['app_user_name']."')";
        $query = $this->db->query($sql);
        $items = $query->result_array();
        return $items;
    }

    function update_data($param){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $sql = "UPDATE  t_cust_acc_dtl_trans SET
                        service_desc = '".$param['service_desc']."',
                        description = '".$param['description']."',
                        bill_no = '".$param['bill_no']."',
                        service_charge = ".$param['service_charge'].",
                        vat_charge = ".$param['vat_charge'].",
                        updated_date = '".date('Y-m-d')."',
                        updated_by = '".$userdata['app_user_name']."'
                WHERE t_cust_acc_dtl_trans_id = ".$param['t_cust_acc_dtl_trans_id'];
        $query = $this->db->query($sql);
        $items = $query->result_array();
        return $items;
    }

    function delete_data($t_cust_acc_dtl_trans_id){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $items=$this->db->delete('t_cust_acc_dtl_trans', array('t_cust_acc_dtl_trans_id' => $t_cust_acc_dtl_trans_id));        
        return $items;
    }
    function get_uName_NPWPD(){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $sql = "SELECT * FROM f_get_npwd_by_username('".$userdata['app_user_name']."') AS tbl (ty_lov_npwd) WHERE rownum < 2 ";
        $query = $this->db->query($sql);
        $items = $query->row_array();
        return $items['ty_lov_npwd'];
        
    }


}

/* End of file Icons.php */