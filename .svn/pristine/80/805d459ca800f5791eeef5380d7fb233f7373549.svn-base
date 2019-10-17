<?php

/**
 * Document_type Model
 *
 */
class Document_type extends Abstract_model {

    public $table           = "p_document_type";
    public $pkey            = "p_document_type_id";
    public $alias           = "doc_type";

    public $fields          = array(
                                'p_document_type_id'   => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Doc type'),
                                'doc_name'        => array('nullable' => false, 'type' => 'str', 'unique' => true, 'display' => 'Doc Name'),
                                'display_name'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Display Name'),
                                'tdoc'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'TDoc'),
                                'tctl'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'TCTL'),
                                'tuser'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'TUSER'),
                                'package_name'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Package Name'),
                                'f_profile'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Profile'),
                                'profile_source'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Profile Source'),
                                'description'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Description'),
                                'listing_no'    => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'Listing No'),
                                'f_app_fraud_engine'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Engine'),
                            );

    public $selectClause    = "doc_type.*";
    public $fromClause      = "p_document_type doc_type";

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
            //$this->record['created_date'] = date('Y-m-d');
            //$this->record['updated_date'] = date('Y-m-d');

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->db->set('creation_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['app_user_name'];
            $this->record['created_by'] = $userdata['app_user_name'];
            $this->record['owner'] = 'sikp';

        }else {
            //do something
            //example:
            //$this->record['updated_date'] = date('Y-m-d');
            //if false please throw new Exception
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['app_user_name'];
            $this->record['owner'] = 'sikp';
        }
        return true;
    }

}

/* End of file */