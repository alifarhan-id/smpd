<?php

/**
 * Global Param Model
 *
 */
class P_global_param extends Abstract_model {

    public $table           = "p_global_param";
    public $pkey            = "p_global_param_id";
    public $alias           = "gb";

    public $fields          = array(
                                'p_global_param_id'       => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'Parameter ID'),

                                'code'    => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'Code'),
                                'value'      => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Nilai 1'),
                                'type_1'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Type'),
                                'is_range'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Range'),
                                'value_2'      => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Nilai 2'),
                                'description'     => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Keterangan'),

                                'creation_date'  => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'  => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "gb.*";
    public $fromClause      = "sikp.p_global_param gb";

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

	function getValByCode($code) {
		$sql = "SELECT * FROM sikp.p_global_param WHERE upper(code) = ?";
		$result = $this->db->query($sql, array(strtoupper($code)));
		$item = $result->row_array();

		if(count($item) == 0) return '';
		return $item['value'];
	}

}

/* End of file p_global_param.php */