<?php

/**
 * Document_type Model
 *
 */
class Pembuatan_schema extends Abstract_model {

    public $table           = "t_schema_example";
    public $pkey            = "t_schema_example_id";
    public $alias           = "scm";

    public $fields          = array(
                                't_schema_example_id'   => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Doc type'),
                                'schema_name'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Schema Name')
                            );

    public $selectClause    = "scm.*, b.p_order_status_id";
    public $fromClause      = "t_schema_example scm 
                               left join t_customer_order b on scm.t_customer_order_id = b.t_customer_order_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {
        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            $p_rqst_type_id = 1;
            $p_order_status_id = 1;
            //do something
            // example :
            //$this->record['created_date'] = date('Y-m-d');
            //$this->record['updated_date'] = date('Y-m-d');
            $cust_order_id = $this->generate_id('T_CUSTOMER_ORDER');
            $sql = "INSERT INTO T_CUSTOMER_ORDER (  T_CUSTOMER_ORDER_ID, 
                                                    ORDER_NO, 
                                                    P_RQST_TYPE_ID, 
                                                    P_ORDER_STATUS_ID, 
                                                    ORDER_DATE, 
                                                    CREATION_DATE, 
                                                    CREATED_BY, 
                                                    UPDATED_DATE, 
                                                    UPDATED_BY )
                        VALUES (".$cust_order_id.",
                                LPAD(T_CUSTOMER_ORDER_SEQ.NEXTVAL, 10, '0'),
                                ".$p_rqst_type_id.",
                                ".$p_order_status_id.",
                                SYSDATE,
                                SYSDATE,
                                '".$userdata['app_user_name']."',
                                SYSDATE,
                                '".$userdata['app_user_name']."'
                    )";

            $dt = $this->db->query($sql);

            $this->record[$this->pkey] = $this->generate_id($this->table);
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->db->set('creation_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['app_user_name'];
            $this->record['created_by'] = $userdata['app_user_name'];
            $this->record['t_customer_order_id'] = $cust_order_id;

        }else{
            //do something
            //example:
            //$this->record['updated_date'] = date('Y-m-d');
            //if false please throw new Exception
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['app_user_name'];
        }
        return true;
    }

    function removeChild($idd){
        $sql = "select t_customer_order_id from t_schema_example where t_schema_example_id =".$idd;
        $idd = $this->db->query($sql);
        $rd = $idd->result_array();

        try {
            $this->db->where('T_CUSTOMER_ORDER_ID', $rd[0]['t_customer_order_id']);
            $this->db->delete('T_CUSTOMER_ORDER');

            return true;
        } catch (Exception $e) {
            return false;
        }
        
    }

    function create_customer_order(){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $username = $userdata['app_user_name'];

        $cust_order_id = $this->generate_id('T_CUSTOMER_ORDER');

        $sql = "INSERT INTO T_CUSTOMER_ORDER (  T_CUSTOMER_ORDER_ID, 
                                                ORDER_NO, 
                                                P_RQST_TYPE_ID, 
                                                P_ORDER_STATUS_ID, 
                                                ORDER_DATE, 
                                                CREATION_DATE, 
                                                CREATED_BY, 
                                                UPDATED_DATE, 
                                                UPDATED_BY )
                    VALUES (".$cust_order_id.",
                            LPAD(T_CUSTOMER_ORDER_SEQ.NEXTVAL, 10, '0'),
                            1,
                            1,
                            SYSDATE,
                            SYSDATE,
                            '".$username."',
                            SYSDATE,
                            '".$username."'
                )";

        $this->db->query($sql);

        return $cust_order_id;

    }

    function submitWF($t_customer_order_id, $doc_type_id) {
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $username = $userdata['app_user_name'];

        try {

            $sql = "  BEGIN ".
                            "  p_first_submit_engine(:i_doc_type_id, :i_cust_req_id, :i_username, :o_result_code, :o_result_msg ); END;";

            $stmt = oci_parse($this->db->conn_id, $sql);

            //  Bind the input parameter
            oci_bind_by_name($stmt, ':i_doc_type_id', $doc_type_id);
            oci_bind_by_name($stmt, ':i_cust_req_id', $t_customer_order_id);
            oci_bind_by_name($stmt, ':i_username', $username);

            // Bind the output parameter
            oci_bind_by_name($stmt, ':o_result_code', $code, 2000000);
            oci_bind_by_name($stmt, ':o_result_msg', $msg, 2000000);

            ociexecute($stmt);

            $data['success'] = true;
            $data['error_code'] = $code;
            $data['error_message'] = $msg;

        } catch( Exception $e ) {
            $data['success'] = false;
            $data['message'] = $e->getMessage();
        }

        //echo json_encode($data);
        exit;
    }
    
}

/* End of file */