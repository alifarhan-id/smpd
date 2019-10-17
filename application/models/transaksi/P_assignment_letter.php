<?php

/**
 * Bank Model
 *
 */
class P_assignment_letter extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    ="a.*,
                              b.assignment_name";
    public $fromClause      ="p_assignment_letter a
                              left join p_assignment_type b
                              on a.p_assignment_type_id = b.p_assignment_type_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function insert($param = array()){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $userdata = $userdata['app_user_name'];
        $date = date('Y-m-d');

        $data =  array(
                        'p_assignment_letter_id' => $this->generate_id('p_assignment_letter', 'p_assignment_letter_id'), 
                        'letter_no' => $param['letter_no'], 
                        'letter_body' => $param['letter_body'], 
                        'letter_date' => $param['letter_date'], 
                        'description' => $param['description'],
                        'p_assignment_type_id' => $param['p_assignment_type_id'],
                        'created_by' => $userdata, 
                        'updated_by' => $userdata, 
                        'creation_date' => $date, 
                        'updated_date' => $date);

        //$query = $this->db->query($sql);
        $this->db->insert('p_assignment_letter',$data);
        $item = 'sukses';

        return $item;
    }

    function update($param = array()){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $userdata = $userdata['app_user_name'];
        $updated_date = date('Y-m-d');

        $data =  array('letter_no' => $param['letter_no'], 
                        'letter_body' => $param['letter_body'], 
                        'letter_date' => $param['letter_date'], 
                        'description' => $param['description'],
                        'p_assignment_type_id' => $param['p_assignment_type_id'],
                        'updated_by' => $userdata, 
                        'updated_date' => $updated_date);

        $this->db->where('p_assignment_letter_id', $param['p_assignment_letter_id']);
        $this->db->update('sikp.p_assignment_letter', $data);
        $item = 'sukses';

        return $item;
    }

    function delete($id){
        $ci =& get_instance();

        $this->db->delete('sikp.p_assignment_letter', array('p_assignment_letter_id' => $id));
        $item = 'sukses';
        return $item;
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            
            $this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            $this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];
            //if false please throw new Exception
        }
        return true;
    }

}

/* End of file p_bank.php */