<?php

/**
 * Icons Model
 *
 */
class P_region_level extends Abstract_model {

    public $table           = "p_region_level";
    public $pkey            = "p_region_level_id";
    public $alias           = "pr";

    public $fields          = array(
                                'p_region_level_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Region Level'),
                                'level_name'           => array('nullable' => false, 'type' => 'str', 'unique' => true, 'display' => 'Level Regional'),
                                'level_number'    => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'No. Level'),

                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "pr.*, to_char(pr.updated_date, 'dd-Mon-yyyy') as update_date_str";
    public $fromClause      = "p_region_level pr";

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