<?php

/**
 * t_ppat Model
 *
 */
class T_ppat_user extends Abstract_model {

    public $table           = "t_ppat_user";
    public $pkey            = "t_ppat_user_id";
    public $alias           = "a";

    public $fields          = array(
                                't_ppat_user_id'    => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID T PPAT'),
                                'user_name'         => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Username'),
                                'user_pwd'      => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'User Password'),
                                'valid_from'             => array('nullable' => false, 'type' => 'date', 'unique' => false, 'display' => 'Massa Berlaku Dari'),

                                'valid_to'           => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Berlaku Sampai'),
                                'mobile_phone_no'          => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'No Handphone'),

                                'description'       => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),

                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By')

                            );

    public $selectClause    = " a.user_name,
                                a.user_pwd,
                                to_char(a.valid_from,'DD-MON-YYYY') as valid_from,
                                to_char(a.valid_to,'DD-MON-YYYY') as valid_to,
                                to_char(a.creation_date,'DD-MON-YYYY') as creation_date,
                                to_char(a.updated_date,'DD-MON-YYYY') as updated_date,
                                a.description,
                                a.mobile_phone_no,
                                a.t_ppat_id,
                                a.t_ppat_user_id,
                                a.created_by, 
                                a.updated_by,
                                b.code";
    public $fromClause      = " t_ppat_user a
                                LEFT join p_user_status b 
                                on a.p_user_status_id = b.p_user_status_id";

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
            //$this->db->set('valid_to',"NULL",false);
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] =  $userdata['app_user_name'];
            if(empty($this->record['valid_to']))
                $this->record['valid_to'] =  NULL;
        }
        return true;
    }

    function insert($param){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $sql = "SELECT * FROM f_insert_ppat_user(
                                                    ".$param['t_ppat_id'].", '".
                                                    $param['user_name']."', '".
                                                    $param['user_pwd']."',
                                                    ' ".$param['ppat_name']."', 
                                                    '".$param['email_address']."', 
                                                    '".$param['description']."' , 
                                                    '".$param['valid_from']."', 
                                                    '".$param['valid_to']."',
                                                    '".date('Y-m-d')."', 
                                                    '".$userdata['app_user_name']."', 
                                                    '".date('Y-m-d')."', 
                                                    '".$userdata['app_user_name']."', 
                                                    '".$param['mobile_no']."')";
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data;
    }

    

}

/* End of file p_bank.php */