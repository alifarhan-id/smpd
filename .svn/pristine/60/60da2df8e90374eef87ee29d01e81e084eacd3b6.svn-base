<?php

/**
 * Chart_proc Model
 *
 */
class Chart_proc_daemon extends Abstract_model {

    public $table           = "p_w_daemon_proc";
    public $pkey            = "p_w_daemon_proc_id";
    public $alias           = "daemon";

    public $fields          = array('p_w_daemon_proc_id'   => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Doc type'),
                                'p_w_chart_proc_id'        => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'ID Chart Proc'),
                                'daemon_name'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Daemon Name'),
                                'expression_rule'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Expression Rule'),
                                'valid_from'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Valid From'),
                                'valid_to'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Valid To'),
                                'description'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Description')                                
                                );

    public $selectClause    = "daemon.*";
    public $fromClause      = "p_w_daemon_proc daemon";

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

            unset($this->record['valid_from']);
            unset($this->record['valid_to']);
        }
        return true;
    }
}

/* End of file */