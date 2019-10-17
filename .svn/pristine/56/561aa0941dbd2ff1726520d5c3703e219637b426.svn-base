<?php

/**
 * Pembuatan schema Model
 *
 */
class P_procedure extends Abstract_model {

    public $table           = "p_procedure";
    public $pkey            = "p_procedure_id";
    public $alias           = "proc";

    public $fields          = array(
                                'p_procedure_id'    => array('pkey' => true, 'type' => 'str', 'nullable' => true, 'unique' => true, 'display' => 'ID Procedure'),
                                'proc_name'         => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Pekerjaan'),
                                'display_name'      => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Nama Pekerjaan'),
                                'seqno'             => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'Seq.No'),
                                'f_after'           => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'After Submit'),
                                'f_before'          => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Before Submit'),
                                'description'       => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                'is_active'         => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Is Aktif'),
                                'updated_date'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Tgl Update'),
                                'updated_by'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Diupdate Oleh'),
                                'created_by'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Dibuat Oleh'),
                                'creation_date'      => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Tgl Pembuatan')                              

                            );

    public $selectClause    = "p_procedure_id, proc.proc_name, proc.display_name, proc.seqno, proc.f_after,
                                proc.f_before, proc.description, proc.is_active,
                                to_char(proc.updated_date,'yyyy-mm-dd') as updated_date, proc.updated_by, proc.created_by,
                                to_char(proc.creation_date,'yyyy-mm-dd') as creation_date";
    public $fromClause      = "p_procedure proc";

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
            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->db->set('creation_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] =  $userdata['app_user_name'];
            $this->record['created_by'] =  $userdata['app_user_name'];

        }else {
            //do something
            //example:
            //$this->record['updated_date'] = date('Y-m-d');
            //if false please throw new Exception
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] =  $userdata['app_user_name'];
        }
        return true;
    }

}

/* End of file Users.php */
