<?php

/**
 * Bank Model
 *
 */
class P_budget_account extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = /*array(
                                'p_bank_id'       => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'License Type ID'),
                                'code'    => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'Kode'),
                                'bank_name'     => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Nama Bank'),
                                'description'     => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),

                                
                                'updated_date'  => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            )*/"";

    public $selectClause    ="a.p_budget_type_id, a.p_budget_account_id,
                              a.coa_code,
                              a.coa_code || ' ' ||c.coa_name as coa_code1, 
                              a.description, c.coa_name,
                              a.p_budget_account_id,
                              to_char(a.creation_date, 'DD-MON-YYYY') creation_date, 
                              a.created_by,
                              to_char(a.updated_date, 'DD-MON-YYYY') updated_date, 
                              a.updated_by";
    public $fromClause      ="p_budget_account a, 
                              p_budget_type b,
                              coa c ";

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
                        'p_budget_account_id' => $this->generate_id('p_budget_account', 'p_budget_account_id'),
                        'description' => $param['description'], 
                        'created_by' => $userdata, 
                        'updated_by' => $userdata, 
                        'creation_date' => $date, 
                        'updated_date' => $date, 
                        'coa_code' => $param['coa_code'], 
                        'p_budget_type_id' => $param['p_budget_type_id']);

        //$query = $this->db->query($sql);
        $this->db->insert('p_budget_account',$data);
        $item = 'sukses';

        return $item;
    }

    function update($param = array()){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $userdata = $userdata['app_user_name'];
        $updated_date = date('Y-m-d');

        $data =  array('coa_code' =>$param['coa_code'],
                        'description'=>$param['description'],
                        'updated_by'=>$userdata,
                        'updated_date'=>$updated_date);

        $this->db->where('p_budget_account_id', $param['p_budget_account_id']);
        $this->db->update('sikp.p_budget_account', $data);
        $item = 'sukses';

        return $item;
    }

    function delete($id){
        $ci =& get_instance();

        $this->db->delete('sikp.p_budget_account', array('p_budget_account_id' => $id));
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