<?php

/**
 * Icons Model
 *
 */
class P_rest_service_type extends Abstract_model {

    public $table           = "p_rest_service_type";
    public $pkey            = "p_rest_service_type_id";
    public $alias           = "pr";

    public $fields          = array(
                                'p_rest_service_type_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Rest Service'),
                                'code'           => array('nullable' => false, 'type' => 'str', 'unique' => true, 'display' => 'Jenis Pelayanan'),
                                'description'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                'service_name'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Service Name'),
                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "pr.*, to_char(pr.updated_date, 'dd-Mon-yyyy') as update_date_str";
    public $fromClause      = "p_rest_service_type pr";

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

}

/* End of file Icons.php */