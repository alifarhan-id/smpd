<?php

/**
 * Chart_proc Model
 *
 */
class Chart_proc_next extends Abstract_model {

    public $table           = "p_w_chart_proc";
    public $pkey            = "p_w_chart_proc_id";
    public $alias           = "next";

    public $fields          = array('p_w_chart_proc_id'   => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Doc type'),
                                'p_workflow_id'        => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'ID Workflow'),
                                'p_procedure_id_prev'    => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'ID Prev'),
                                'p_procedure_id_next'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'ID Next'),
                                'p_procedure_id_alt'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'ID Alt'),
                                'importance_level'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Importance Level'),
                                'f_init'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'F INIT'),
                                'valid_from'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Valid From'),
                                'valid_to'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Valid To'),
                                'sequence_no'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Sequence No')                                
                                );

    public $selectClause    = "next.*";
    public $fromClause      = "v_wf_chart_next next";

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

            $this->record[$this->pkey] = $this->generate_id($this->table);
            $this->db->set('update_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->db->set('create_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['update_by'] = $userdata['app_user_name'];
            $this->record['create_by'] = $userdata['app_user_name'];

            if(empty($this->record['valid_to'])) {
                $this->db->set('valid_to', NULL);
            }else {
                $this->db->set('valid_to',"to_date('".$this->record['valid_to']."','yyyy-mm-dd')",false);
            }

            $this->db->set('valid_from',"to_date('".$this->record['valid_from']."','yyyy-mm-dd')",false);

            if(empty($this->record['sequence_no'])) {
                $this->record['sequence_no'] = null;
            }else {
                $this->record['sequence_no'] = (integer)$this->record['sequence_no'];
            }

            if(empty($this->record['p_procedure_id_alt'])) {
                $this->record['p_procedure_id_alt'] = null;
            }else {
                $this->record['p_procedure_id_alt'] = (integer)$this->record['p_procedure_id_alt'];
            }

            if(empty($this->record['p_procedure_id_next'])) {
                $this->record['p_procedure_id_next'] = null;
            }else {
                $this->record['p_procedure_id_next'] = (integer)$this->record['p_procedure_id_next'];
            }

            unset($this->record['valid_from']);
            unset($this->record['valid_to']);

        }else {
            //do something
            //example:
            //if false please throw new Exception
            $this->db->set('update_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['update_by'] = $userdata['app_user_name'];
            
            if(empty($this->record['valid_to'])) {
                $this->db->set('valid_to', NULL);
            }else {
                $this->db->set('valid_to',"to_date('".$this->record['valid_to']."','yyyy-mm-dd')",false);
            }

            $this->db->set('valid_from',"to_date('".$this->record['valid_from']."','yyyy-mm-dd')",false);

            if(empty($this->record['sequence_no'])) {
                $this->record['sequence_no'] = null;
            }else {
                $this->record['sequence_no'] = (integer)$this->record['sequence_no'];
            }
            
            if(empty($this->record['p_procedure_id_alt'])) {
                $this->record['p_procedure_id_alt'] = null;
            }else {
                $this->record['p_procedure_id_alt'] = (integer)$this->record['p_procedure_id_alt'];
            }

            if(empty($this->record['p_procedure_id_next'])) {
                $this->record['p_procedure_id_next'] = null;
            }else {
                $this->record['p_procedure_id_next'] = (integer)$this->record['p_procedure_id_next'];
            }

            unset($this->record['valid_from']);
            unset($this->record['valid_to']);
        }
        return true;
    }
}

/* End of file */