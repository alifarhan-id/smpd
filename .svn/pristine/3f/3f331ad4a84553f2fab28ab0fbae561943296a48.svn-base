<?php

/**
 * p_rqst_type Model
 *
 */
class P_rqst_type extends Abstract_model {

    public $table           = "p_rqst_type";
    public $pkey            = "p_rqst_type_id";
    public $alias           = "rqst";

    public $fields          = array(
                                'p_rqst_type_id'       => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'Request Type ID'),
                                'code'    => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'Jenis Permohonan'),
                                'description'     => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                'p_vat_type_id'     => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Vat Type ID'),
                                'vt.vat_code'    => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'Jenis Pajak'),
                                

                                'creation_date'  => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'  => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "rqst.*, vt.vat_code, to_char(rqst.updated_date, 'dd-Mon-yyyy') as updated_date_str";
    public $fromClause      = "p_rqst_type rqst
                                left join p_vat_type vt on rqst.p_vat_type_id = vt.p_vat_type_id";

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
            //$this->record['created_date'] = date('Y-m-d');
            //$this->record['updated_date'] = date('Y-m-d');
            $this->record['creation_date'] = date('Y-m-d');
            $this->record['created_by'] = $userdata['app_user_name'];
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];

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


    

}

/* End of file p_rqst_type.php */