<?php

/**
 * Groups Model
 *
 */
class P_app_user_role extends Abstract_model {

    public $table           = "p_app_user_role";
    public $pkey            = "p_app_user_role_id";
    public $alias           = "ru";

    public $fields          = array(
                                'p_app_user_role_id'     => array('pkey' => true,'nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'User Role ID'),
								'p_app_user_id'     => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'User ID'),
                                'p_app_role_id'    => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'Role ID'),

								'valid_from'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Valid From'),
								'valid_to'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Valid To'),

                                'creation_date'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),
                            );

    public $selectClause    = "p_app_user_role_id AS id,
                                ru.p_app_user_id, ru.p_app_role_id, r.code,
                                usr.app_user_name, usr.full_name, usr.email_address,
                                usr_status.code as user_status";
    public $fromClause      = "p_app_user_role ru
                               left join p_app_role r on ru.p_app_role_id = r.p_app_role_id
                               left join p_app_user usr on ru.p_app_user_id = usr.p_app_user_id
                               left join p_user_status usr_status on usr.p_user_status_id = usr_status.p_user_status_id";

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
			$this->db->set('valid_from',"sysdate",false);
			$this->db->set('valid_to',"null",false);


        }
        return true;
    }

    public function removeItem($value) {

        /*$code = explode('.', $value);
        $p_app_user_id = $code[0];
        $p_app_role_id = $code[1];*/
		$p_app_user_role_id = $value;

        $sql = "delete from p_app_user_role where p_app_user_role_id = ? ";
        $this->db->query($sql, array($p_app_user_role_id));
        return true;
    }

}

/* End of file Groups.php */