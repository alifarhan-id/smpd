<?php

/**
 * Permission_role Model
 *
 */
class Permission_role extends Abstract_model {

    public $table           = "permission_role";
    public $pkey            = "";
    public $alias           = "pr";
	public $p_app_role_id 		= '';
    public $fields          = array(
                                'permission_id' => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'Permission ID'),
                                'p_app_role_id'    	=> array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'Role ID'),

                                'creation_date'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),
                            );

    public $selectClause    = "(coalesce(pr.p_app_role_id,0) || '.' || permissions.permission_id) AS role_permissions_id, permissions.permission_name, permissions.permission_display_name,
                                CASE coalesce(pr.p_app_role_id,0)
                                    WHEN 0 THEN 'No'
                                    ELSE 'Yes'
                                END AS status_permission";
    public $fromClause      = "permissions
							   left join permission_role pr on permissions.permission_id = pr.permission_id %s";

    public $refs            = array();

    function __construct($p_app_role_id = ''){
		if (!empty($p_app_role_id)){
			$this->p_app_role_id = (int) $p_app_role_id;
			$this->fromClause = sprintf($this->fromClause, 'and pr.p_app_role_id = '.$this->p_app_role_id);
		}else{
			$this->fromClause = sprintf($this->fromClause, '');
		}

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


    function removeItem($p_app_role_id, $permission_id) {
        $sql = "delete from permission_role where p_app_role_id = ? and permission_id = ?";
        $this->db->query($sql, array($p_app_role_id, $permission_id));

        return true;
    }
}

/* End of file Groups.php */