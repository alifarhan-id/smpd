<?php

/**
 * Icons Model
 *
 */
class T_vat_reg_employee extends Abstract_model {

    public $table           = "t_vat_reg_employee";
    public $pkey            = "t_vat_reg_employee_id";
    public $alias           = "a";

    public $fields          = array(
                                't_vat_reg_employee_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Emp'),
                                't_vat_registration_id'           => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'ID Reg'),
                                'p_job_position_id'           => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'ID Jabatan'),
                                'employee_qty'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Jumlah Pegawai'),

                                'employee_salery'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Gaji Pegawai'),
                                'description'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "a.*, round(employee_salery, 0) as employee_salery";
    public $fromClause      = "v_vat_reg_employee a";

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