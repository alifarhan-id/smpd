<?php

/**
 * Chart_proc Model
 *
 */
class Chart_proc extends Abstract_model {

    public $table           = "v_wf_workflow_list";
    public $pkey            = "p_workflow_id";
    public $alias           = "wf";

    public $fields          = array();

    public $selectClause    = "wf.*";
    public $fromClause      = "v_wf_workflow_list wf";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {
        // $ci =& get_instance();
        // $userinfo = $ci->ion_auth->user()->row();

        if($this->actionType == 'CREATE') {
            //do something
            // example :

            // $this->record[$this->pkey] = $this->generate_id($this->table);
            // $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            // $this->db->set('creation_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            // $this->record['updated_by'] = $userinfo->username;
            // $this->record['created_by'] = $userinfo->username;

        }else {
            //do something
            //example:
            //if false please throw new Exception
            // $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            // $this->record['updated_by'] = $userinfo->username;
        }
        return true;
    }
}

/* End of file */