<?php

/**
 * Icons Model
 *
 */
class T_revenue_target extends Abstract_model {

    public $table           = "t_revenue_target";
    public $pkey            = "t_revenue_target_id";
    public $alias           = "a";
    public $fields          = array(
                                't_revenue_target_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Target'),
                                'p_year_period_id'           => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'ID Tahun'),
                                'p_vat_type_id'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'ID Pajak'),
                                'target_code'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Kode'),
                                'target_amt'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Jumlah'),
                                'description'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By')

                            );

    public $selectClause    = "a.* ";
    public $fromClause      = "v_t_revenue_target a ";

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