<?php

/**
 * p_finance_period Model
 *
 */
class P_finance_period extends Abstract_model {

    public $table           = "p_finance_period";
    public $pkey            = "p_finance_period_id";
    public $alias           = "pf";

    public $fields          = array(
                                'p_finance_period_id' => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Tahun'),
                                'p_year_period_id' => array('type' => 'int', 'nullable' => false, 'unique' => false, 'display' => 'ID Tahun'),
                                'p_status_list_id' => array('type' => 'int', 'nullable' => false, 'unique' => false, 'display' => 'ID Status'),
                                'code'           => array('nullable' => false, 'type' => 'str', 'unique' => true, 'display' => 'Kode Tahun'),
                                'description'           => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'Deskripsi'),
                                'start_date'          => array('nullable' => false, 'type' => 'date', 'unique' => false, 'display' => 'Start Date'),
                                'end_date'          => array('nullable' => false, 'type' => 'date', 'unique' => false, 'display' => 'End Date'),
                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),
                                'due_in_day' => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'Tanggal Jatuh Tempo'),
                                'debt_letter_1' => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'Surat Teguran 1'),
                                'debt_letter_2' => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'Surat Teguran 2'),
                                'debt_letter_3' => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'Surat Teguran 3')
                            );

    public $selectClause    = "pf.*, ps.code as status_code, to_char(pf.start_date, 'dd-mm-yyyy') as start_date_str,
                                to_char(pf.end_date, 'dd-mm-yyyy') as end_date_str";
    public $fromClause      = "p_finance_period pf left join p_status_list ps on pf.p_status_list_id = ps.p_status_list_id";

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

/* End of file p_finance_period.php */