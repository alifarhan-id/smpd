<?php

/**
 * T_message_inbox_bphtb Model
 *
 */
class T_message_inbox extends Abstract_model {

    public $table           = "t_message_inbox";
    public $pkey            = "t_message_inbox_id";
    public $alias           = "inbox";

    public $fields          = array();

    public $selectClause    = " x.wp_name,
                                inbox.*, 
                                to_char(inbox.creation_date,'yyyy-mm-dd HH24:MI:SS AM') AS creation_date,
                                to_char(inbox.creation_date,'HH24:MI:SS PM') AS creation_time,
                                to_char(inbox.update_date,'yyyy-mm-dd') AS update_date,
                                mtype.message_type, 
                                '' as status_view";
    public $fromClause      = " t_message_inbox inbox
                                LEFT JOIN sikp.p_message_type mtype 
                                    ON mtype.p_message_type_id = inbox.p_message_type_id
                                LEFT JOIN t_cust_account x 
                                    on x.t_cust_account_id = inbox.t_cust_account_id ";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {

        $ci =& get_instance();
        

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            $this->record['creation_date'] = date('Y-m-d');
            $this->record['created_by'] = $userdata['app_user_name'];
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];
            //if false please throw new Exception
        }
        return true;
    }

    function reply($t_message_inbox_id, $message_body){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $user = $userdata['app_user_name'];

        $sql = "select message_status from t_message_inbox where t_message_inbox_id = ".$t_message_inbox_id;
        $query = $this->db->query($sql);
        $item = $query->row_array();

        if ($item['message_status']=='U' || $item['message_status']=='u') {
            $sql = "update t_message_inbox set message_status = 'V' where t_message_inbox_id = ".$t_message_inbox_id;
            $item = $this->db->query($sql);
            //print_r($query); return;
        }

        $sql = "SELECT f_send_message_to_wp(".$t_message_inbox_id.",'".$user."','".$message_body."',null) as pesan";
        
        $query = $this->db->query($sql);
        // print_r($query);
        // exit();
        $item = $query->row_array();
         
        return $item;
    }

    function deleteInbox($t_message_inbox_id){

        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $user = $userdata['app_user_name'];

        $sql = "delete from t_message_inbox where t_message_inbox_id = $t_message_inbox_id";
        $query = $this->db->query($sql);
        // print_r($sql);
        // exit();
         
        return $query;
    }

    

}

/* End of file Icons.php */