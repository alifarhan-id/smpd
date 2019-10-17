<?php

/**
 * Role Module Model
 *
 */
class P_application_role extends Abstract_model {

    public $table           = "p_application_role";
    public $pkey            = "p_application_role_id";
    public $alias           = "rm";

    public $fields          = array(
                                'p_application_role_id'     => array('pkey' => true,'nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Application Role ID'),
								'p_application_id'     => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'Module ID'),
                                'p_app_role_id'    => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'Role ID'),

								'valid_from'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Valid From'),
								'valid_to'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Valid To'),
								
                                'creation_date'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),
                            );

    public $selectClause    = "p_application_role_id AS id,
                                rm.p_application_id, rm.p_app_role_id, m.code";
    public $fromClause      = "p_application_role rm
                               left join p_application m on rm.p_application_id = m.p_application_id";

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
            //$this->record['creation_date'] = date('Y-m-d');
            //$this->record['updated_date'] = date('Y-m-d');
            $this->record['creation_date'] = date('Y-m-d');
            $this->record['created_by'] = $userdata['app_user_name'];
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];
			
			$this->db->set('valid_from',"sysdate",false);
			$this->db->set('valid_to',"null",false);
			
			$this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            //$this->record['updated_date'] = date('Y-m-d');
            //if false please throw new Exception

            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];

        }
        return true;
    }

    public function removeItem($value) {

        /*$code = explode('.', $value);
        $p_app_role_id = $code[0];
        $p_application_id = $code[1];*/
		$p_application_role_id = $value;

        $sql = "delete from p_application_role where p_application_role_id = ?";
        $this->db->query($sql, array($p_application_role_id));
        return true;
    }

}

/* End of file Groups.php */