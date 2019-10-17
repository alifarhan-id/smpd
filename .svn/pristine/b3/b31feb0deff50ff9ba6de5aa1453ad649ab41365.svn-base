<?php

/**
 * Icons Model
 *
 */
class P_year_period extends Abstract_model {

    public $table           = "p_year_period";
    public $pkey            = "p_year_period_id";
    public $alias           = "pr";

    public $fields          = array(
                                'p_year_period_id' => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Tahun'),
                                'p_status_list_id' => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'ID Status'),
                                'year_code'           => array('nullable' => false, 'type' => 'str', 'unique' => true, 'display' => 'Kode Tahun'),
                                'description'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Icon Description'),
                                'start_date'          => array('nullable' => false, 'type' => 'date', 'unique' => false, 'display' => 'Start Date'),
                                'end_date'          => array('nullable' => false, 'type' => 'date', 'unique' => false, 'display' => 'End Date'),
                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),
                                'target_triwulan_1' => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'Target Triwulan 1'),
                                'target_triwulan_2' => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'Target Triwulan 2'),
                                'target_triwulan_3' => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'Target Triwulan 3'),
                                'target_triwulan_4' => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'Target Triwulan 4')
                            );

    public $selectClause    = "pr.*, ps.code";
    public $fromClause      = "p_year_period pr left join p_status_list ps on pr.p_status_list_id = ps.p_status_list_id ";

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