<?php

/**
 * Icons Model
 *
 */
class T_vat_registration extends Abstract_model {

    public $table           = "t_vat_registration";
    public $pkey            = "t_vat_registration_id";
    public $alias           = "a";

    public $fields          = array(
                                't_customer_order_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Cust Order'),
                                'order_no'           => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'No Urut'),
                                'rqst_type_code'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),

                                'p_rqst_type_id'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Deskripsi'),
                                'order_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                't_vat_registration_id'            => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Created By'),
                                'p_order_status_id'            => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Created By'),
                                'company_brand'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'npwpd'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                                'description'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                'order_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Order Date'),
                                 'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "a.*";
    public $fromClause      = "v_vat_registration a";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $sql = "SELECT * FROM f_order_no(".$this->record['p_rqst_type_id'].")";
        $query = $this->db->query($sql);
        $item = $query->row_array();

        

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            $this->record['p_order_status_id'] = 1;
            $this->record['order_no'] = $item['f_order_no'];
            $this->record['order_date'] = date('Y-m-d');
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

    function insertUpdate($icode ,$cusorderid,$regionidkel,$regionidkec,$regionid,$regionidkelown,$regionidkecown,$regionidown,$companyname ,$addressname ,$jobid,$companybrand ,$addressno ,$addressrt ,$addressrw ,$addressnoown ,$addressrtown ,$addressrwown ,$phoneno ,$faxno ,$zipcode ,$phonenoown ,$companyown ,$mobilenoown ,$faxnoown ,$zipcodeown ,$mobileno ,$addressnameown ,$i_email ,$vattypedtlid,$wpusername ,$wpuserpwd ,$wpname ,$wpaddressname ,$wpaddressno ,$wprt ,$wprw ,$wpkel,$wpkec,$wpkota,$wpphoneno ,$wpmobileno ,$wpfaxno ,$wpzipcode ,
        $wpemail ,$brandaddress ,$brandno ,$brandrt ,$brandrw ,$brandkel,$brandkec,$brandkota,$brandphoneno ,$brandmobileno ,$brandfaxno ,$brandzipcode ,$idvat,$questionid,$privateanswer ,$i_mode){

        

        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $uname = $userdata['app_user_name'];
		
		if($i_mode == 'I') {
			$wpusername = generateRandomString(10);
			$wpuserpwd = generateRandomString(10);
		}
	
        $sql = "SELECT * FROM f_crud_vat_reg_new('$icode' ,'$uname',$cusorderid,$regionidkel,$regionidkec,$regionid,$regionidkelown,$regionidkecown,$regionidown,'$companyname' ,'$addressname' ,$jobid,'$companybrand' ,'$addressno' ,'$addressrt' ,'$addressrw' ,'$addressnoown' ,'$addressrtown' ,'$addressrwown' ,'$phoneno' ,'$faxno' ,'$zipcode','$phonenoown','$companyown' ,'$mobilenoown' ,'$faxnoown' ,'$zipcodeown' ,'$mobileno' ,'$addressnameown' ,'$i_email' ,$vattypedtlid,'$wpusername' ,'$wpuserpwd' ,'$wpname' ,'$wpaddressname' ,'$wpaddressno' ,'$wprt' ,'$wprw' ,'$wpkel','$wpkec','$wpkota','$wpphoneno' ,'$wpmobileno' ,'$wpfaxno' ,'$wpzipcode' , '$wpemail' ,'$brandaddress' ,'$brandno' ,'$brandrt' ,'$brandrw' ,'$brandkel','$brandkec','$brandkota','$brandphoneno' ,'$brandmobileno' ,'$brandfaxno' ,'$brandzipcode' ,$idvat,$questionid,'$privateanswer' ,'$i_mode')";
        
        $query = $this->db->query($sql);
        // print_r($sql);
        // exit();
        $item = $query->row_array();
         
        return $item;
    }

    

}

/* End of file Icons.php */