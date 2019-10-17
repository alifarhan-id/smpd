<?php

/**
 * p_app_user Model
 *
 */
class P_app_user extends Abstract_model {

    public $table           = "p_app_user";
    public $pkey            = "p_app_user_id";
    public $alias           = "usr";

    public $fields          = array(
                                'p_app_user_id'         => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID User'),
                                'app_user_name'         => array('nullable' => false, 'type' => 'str', 'unique' => true, 'display' => 'User Name'),
                                'full_name'    			=> array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Full Name'),
                                'email_address'        	=> array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Email'),
                                'user_pwd'     			=> array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Password'),
                                'p_user_status_id'      => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Status'),
								'is_employee'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Pegawai?'),
                                'creation_date'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),
                            );

    public $selectClause    = "usr.*, CASE coalesce(usr.p_user_status_id,'0') WHEN '0' THEN 'Not Active'
                                        WHEN '1' THEN 'Active'
                                    END as status_active";
    public $fromClause      = "p_app_user usr";

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

            if (isset($this->record['user_pwd'])){
                if (trim($this->record['user_pwd']) == '') throw new Exception('Password Field is Empty');
                if (strlen($this->record['user_pwd']) < 4) throw new Exception('Mininum password length is 4 characters');
                $this->record['user_pwd'] = md5($this->record['user_pwd']);
            }

			$this->record['is_employee'] = 'Y';
            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            //$this->record['updated_date'] = date('Y-m-d');
            //if false please throw new Exception

            if(empty($this->record['user_pwd']))
                unset($this->record['user_pwd']);
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];

        }
        return true;
    }

}

/* End of file p_app_user.php */