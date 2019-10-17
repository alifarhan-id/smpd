<?php

/**
 * Icons Model
 *
 */
class T_cust_order_legal_doc extends Abstract_model {

    public $table           = "t_cust_order_legal_doc";
    public $pkey            = "t_cust_order_legal_doc_id";
    public $alias           = "a";

    public $fields          = array(
                                't_cust_order_legal_doc_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Cust Order'),
                                't_customer_order_id'  => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'ID Cust Order'),
                                'p_legal_doc_type_id'           => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'No Urut'),
                                'legal_doc_desc'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Jenis Dokumen'),
                                'origin_file_name'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Nama File Ori'),
                                'file_name'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Nama File'),
                                'file_folder'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Folder'),
                                'description'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                 'creation_date'         => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "a.*, b.code legal_doc_desc";
    public $fromClause      = "t_cust_order_legal_doc a
                               left join p_legal_doc_type b on  a.p_legal_doc_type_id =b.p_legal_doc_type_id";
    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        // $target_folder = "../uploads/";
        // $target_file = $target_folder.$_FILES['file_name']['name'];
        // $nama_file = $_FILES['file_name']['name'];

        // $typefile = pathinfo($target_file, PATHINFO_EXTENSION);

        // $result_upload = move_uploaded_file($_FILES['file_name']['tmp_name'], $target_file);
        // $file = str_replace("../", "", $target_file);

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            $this->record['creation_date'] = date('Y-m-d');
            $this->record['created_by'] = $userdata['app_user_name'];
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];
            
            //$this->record['file_folder'] =  $file;
            // $this->record['file_name'] = date('Y-m-d'). $file;
            $this->record['file_folder'] = "upload";

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

    function save($param = array()){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $user_name = $userdata['app_user_name'];
        $sysdate = date('Y-m-d');
        $t_cust_order_legal_doc_id = $this->generate_id($this->table, $this->pkey);



        $data =  array(
            't_cust_order_legal_doc_id' => $t_cust_order_legal_doc_id, 
            't_customer_order_id' => $param['t_customer_order_id'],
            'p_legal_doc_type_id' => $param['p_legal_doc_type_id'], 
            'legal_doc_desc' => $param['legal_doc_desc'], 
            'origin_file_name' => $param['client_name'], 
            'file_folder' => 'upload', 
            'file_name' => $param['file_name'],
            'description' => $param['description'], 
            'creation_date' => $sysdate, 
            'created_by' => $user_name, 
            'updated_date' => $sysdate, 
            'updated_by' => $user_name);
        
        $query = $this->db->insert($this->table, $data);
        $item = $query->row_array();
            
        return $item;
    }

}

/* End of file Icons.php */