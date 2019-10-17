<?php

/**
 * T_message_inbox_bphtb Model
 *
 */
class T_message_inbox_bphtb extends Abstract_model {

    public $table           = "t_vat_registration";
    public $pkey            = "t_vat_registration_id";
    public $alias           = "a";

    public $fields          = array(
                                't_customer_order_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Cust Order'),
                                'order_no'           => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'No Urut'),
                                'rqst_type_code'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),

                                'p_rqst_type_id'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Deskripsi'),
                                'order_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                't_vat_registration_id'            => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Created By'),
                                'p_order_status_id'            => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Created By'),
                                'company_brand'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'npwpd'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                                'description'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                'order_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Order Date'),
                                 'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = " x.ppat_name,
                                    inbox.*, to_char(
                                    inbox.creation_date,
                                    'yyyy-mm-dd HH24:MI:SS AM'
                                ) AS creation_date,
                                to_char(
                                    inbox.creation_date,
                                    'HH24:MI:SS PM'
                                ) AS creation_time,
                                to_char(
                                    inbox.update_date,
                                    'yyyy-mm-dd'
                                ) AS update_date,
                                mtype.message_type, '' as status_view ";
    public $fromClause      = " t_message_inbox_bphtb inbox
LEFT JOIN sikp.p_message_type mtype ON mtype.p_message_type_id = inbox.p_message_type_id
LEFT JOIN t_ppat x on x.t_ppat_id = inbox.t_ppat_id ";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $sql = "SELECT * FROM f_order_no(".$this->record['p_rqst_type_id'].")";
        $query = $this->db->query($sql);
        $item = $query->row_array();

        

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            $this->record['p_order_status_id'] = 1;
            $this->record['order_no'] = $item['f_order_no'];
            $this->record['order_date'] = date('Y-m-d');
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

    function reply($t_message_inbox_bphtb_id, $message_body){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $user = $userdata['app_user_name'];

        $sql = "select message_status from t_message_inbox_bphtb where t_message_inbox_bphtb_id = ".$t_message_inbox_bphtb_id;
        $query = $this->db->query($sql);
        $item = $query->row_array();

        if ($item['message_status']=='U' || $item['message_status']=='u') {
            $sql = "update t_message_inbox_bphtb set message_status = 'V' where t_message_inbox_bphtb_id = ".$t_message_inbox_bphtb_id;
            $item = $this->db->query($sql);
            //print_r($query); return;
        }

        $sql = "SELECT f_send_message_to_ppat($t_message_inbox_bphtb_id,'$user','$message_body',null) as pesan";
        
        $query = $this->db->query($sql);
        // print_r($query);
        // exit();
        $item = $query->row_array();
         
        return $item;
    }

    function deleteInbox($t_message_inbox_bphtb_id){

        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $user = $userdata['app_user_name'];

        $sql = "delete from t_message_inbox_bphtb where t_message_inbox_bphtb_id = $t_message_inbox_bphtb_id";
        $query = $this->db->query($sql);
        // print_r($sql);
        // exit();
         
        return $query;
    }

    

}

/* End of file Icons.php */