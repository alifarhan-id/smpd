<?php

/**
 * p_application Model
 *
 */
class P_application extends Abstract_model {

    public $table           = "p_application";
    public $pkey            = "p_application_id";
    public $alias           = "mod";

    public $fields          = array(
                                'p_application_id'             => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Module'),
                                'code'           => array('nullable' => false, 'type' => 'str', 'unique' => true, 'display' => 'Module Name'),
                                'description'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Module Description'),
                                'module_icon'           => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Icon'),
                                'is_active'             => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Status Active'),
								'listing_no'             => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Listing No'),
                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "mod.*, CASE coalesce(mod.is_active,'N') WHEN 'N' THEN 'TIDAK AKTIF'
                                        WHEN 'Y' THEN 'AKTIF'
                                    END as status_active";
    public $fromClause      = "p_application mod";

    public $refs            = array('p_app_menu' => 'p_application_id',
                                    'p_application_role' => 'p_application_id');

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

    function getHomep_application($p_app_user_id) {
        $sql = "select m.p_application_id, m.code, m.module_icon, m.description
                        from p_application m
                        where m.p_application_id in (
                        select rm.p_application_id from p_application_role rm
                        where m.is_active = 'Y' and
                            rm.p_app_role_id in (select c.p_app_role_id
                                    from p_app_user_role c
                                    left join p_app_role d on c.p_app_role_id = d.p_app_role_id
                                    where c.p_app_user_id = ?))
                            and m.p_application_id != 999
                            order by listing_no";


        $query = $this->db->query($sql, array($p_app_user_id));
        $rows = $query->result_array();

        return $rows;
    }

    function allowAccessPanel($p_app_user_id, $p_application_id) {
        if(empty($p_app_user_id) or empty($p_application_id)) return false;
        $sql = "select m.p_application_id, m.code, m.module_icon, m.description
                        from p_application m
                        where m.p_application_id in (
                        select rm.p_application_id from p_application_role rm
                        where rm.p_app_role_id in (select c.p_app_role_id
                                    from p_app_user_role c
                                    left join p_app_role d on c.p_app_role_id = d.p_app_role_id
                                    where c.p_app_user_id = ? ))
                and m.p_application_id = ?";

        $query = $this->db->query($sql, array($p_app_user_id, $p_application_id));
        $rows = $query->row_array();

        return $rows != null;
    }

}

/* End of file Groups.php */