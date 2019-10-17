<?php

/**
 * Bank Model
 *
 */
class P_budget_type extends Abstract_model {

    public $table           = "p_budget_type";
    public $pkey            = "p_budget_type_id";
    public $alias           = "";

    public $fields          = /*array(
                                'p_bank_id'       => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'License Type ID'),
                                'code'    => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'Kode'),
                                'bank_name'     => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Nama Bank'),
                                'description'     => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),

                                
                                'updated_date'  => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            )*/"";

    public $selectClause    = "*";
    public $fromClause      = "p_budget_type";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function insert($param = array()){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $userdata = $userdata['app_user_name'];
        $date = date('Y-m-d');

        $data =  array('code' =>$param['code'],
                        'p_budget_type_id' =>$param['p_budget_type_id'],
                        'description'=>$param['description'],
                        'listing_no'=>$param['listing_no'],
                        'created_by'=>$userdata,
                        'creation_date'=>$date,
                        'updated_by'=>$userdata,
                        'updated_date'=>$date);

        //$query = $this->db->query($sql);
        $this->db->insert('p_budget_type',$data);
        $item = 'sukses';

        return $item;
    }

    function update($param = array()){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $userdata = $userdata['app_user_name'];
        $updated_date = date('Y-m-d');

        $data =  array('code' =>$param['code'],
                        'listing_no'=>$param['listing_no'],
                        'p_budget_type_id'=>$param['p_budget_type_id'],
                        'description'=>$param['description']);

        $this->db->where('p_budget_type_id', $param['p_budget_type_id']);
        $this->db->update('sikp.p_budget_type', $data);
        $item = 'sukses';

        return $item;
    }

    function delete($id){
        $ci =& get_instance();

        $this->db->delete('sikp.p_budget_type', array('p_budget_type_id' => $id));
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