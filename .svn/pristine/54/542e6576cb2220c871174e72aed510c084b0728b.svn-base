<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class vats_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_registration_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_vat_registration_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_registration');
            $table = $ci->t_vat_registration;

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => isset($_REQUEST['_search']) ? $_REQUEST['_search'] : null,
                "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
            );

            // Filter Table
            $req_param['where'] = array();
            $req_param['where'][] = 't_customer_order_id = '.$t_customer_order_id;
              

            $table->setJQGridParam($req_param);
            $count = $table->countAll();

            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;

            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

            $req_param['limit'] = array(
                'start' => $start,
                'end' => $limit
            );

            $table->setJQGridParam($req_param);

            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['row'] = $table->getAll(0, -1, 't_vat_registration_id', 'asc');
            $data['success'] = true;
            logging('view data vat');
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function insertUpdate(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

        $icode = getVarClean('icode','str','');
        $cusorderid= getVarClean('t_customer_order_id','int',0);
        $regionidkel= getVarClean('p_region_id_kelurahan','int',0);
        $regionidkec= getVarClean('p_region_id_kecamatan','int',0);
        $regionid= getVarClean('p_region_id','int',0);
        $regionidkelown= getVarClean('p_region_id_kel_owner','int',0);
        $regionidkecown= getVarClean('p_region_id_kec_owner','int',0);
        $regionidown= getVarClean('p_region_id_owner','int',0);
        $companyname = getVarClean('company_name','str','');
        $addressname = getVarClean('address_name','str','');
        $jobid= getVarClean('p_job_position_id','int',0);
        $companybrand = getVarClean('company_brand','str','');
        $addressno= getVarClean('address_no','str','');
        $addressrt = getVarClean('address_rt','str','');
        $addressrw = getVarClean('address_rw','str','');
        $addressnoown = getVarClean('address_no_owner','str','');
        $addressrtown= getVarClean('address_rt_owner','str','');
        $addressrwown = getVarClean('address_rw_owner','str','');
        $phoneno = getVarClean('phone_no','str','');
        $faxno = getVarClean('fax_no','str','');
        $zipcode= getVarClean('zip_code','str','');
        $phonenoown = getVarClean('phone_no_owner','str','');
        $companyown= getVarClean('company_owner','str','');
        $mobilenoown= getVarClean('mobile_no_owner','str','');
        $faxnoown = getVarClean('fax_no_owner','str','');
        $zipcodeown= getVarClean('zip_code_owner','str','');
        $mobileno= getVarClean('mobile_no','str','');
        $addressnameown= getVarClean('address_name_owner','str','');
        $i_email = getVarClean('email','str','');
        $vattypedtlid= getVarClean('p_vat_type_dtl_id','int',0);
        $wpusername= getVarClean('wp_user_name','str','') ;
        $wpuserpwd= getVarClean('wp_user_pwd','str','') ;
        $wpname= getVarClean('wp_name','str','') ;
        $wpaddressname= getVarClean('wp_address_name','str','') ;
        $wpaddressno= getVarClean('wp_address_no','str','') ;
        $wprt= getVarClean('wp_address_rt','str','') ;
        $wprw = getVarClean('wp_address_rw','str','');
        $wpkel= getVarClean('wp_p_region_id_kelurahan','int',0);
        $wpkec= getVarClean('wp_p_region_id_kecamatan','int',0);
        $wpkota= getVarClean('wp_p_region_id','int',0);
        $wpphoneno = getVarClean('wp_phone_no','str','');
        $wpmobileno = getVarClean('wp_mobile_no','str','');
        $wpfaxno= getVarClean('wp_fax_no','str','') ;
        $wpzipcode= getVarClean('wp_zip_code','str','') ;
        $wpemail = getVarClean('wp_email','str','');
        $brandaddress= getVarClean('brand_address_name','str','') ;
        $brandno= getVarClean('brand_address_no','str','') ;
        $brandrt= getVarClean('brand_address_rt','str','') ;
        $brandrw = getVarClean('brand_address_rw','str','');
        $brandkel= getVarClean('brand_p_region_id_kel','int',0);
        $brandkec= getVarClean('brand_p_region_id_kec','int',0);
        $brandkota= getVarClean('brand_p_region_id','int',0);
        $brandphoneno= getVarClean('brand_phone_no','str','') ;
        $brandmobileno = getVarClean('brand_mobile_no','str','');
        $brandfaxno= getVarClean('brand_fax_no','str','') ;
        $brandzipcode = getVarClean('brand_zip_code','str','');
        $idvat= getVarClean('t_vat_registration_id','int',0);
        $questionid= getVarClean('p_private_question_id','int',0);
        $privateanswer = getVarClean('private_answer','str','');
        $i_mode= getVarClean('i_mode','str','');
        

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_registration');
            $table = $ci->t_vat_registration;

            $result = $table->insertUpdate($icode ,$cusorderid,$regionidkel,$regionidkec,$regionid,$regionidkelown,$regionidkecown,$regionidown,$companyname ,$addressname ,$jobid,$companybrand ,$addressno ,$addressrt ,$addressrw ,$addressnoown ,$addressrtown ,$addressrwown ,$phoneno ,$faxno ,$zipcode ,$phonenoown ,$companyown ,$mobilenoown ,$faxnoown ,$zipcodeown ,$mobileno ,$addressnameown ,$i_email ,$vattypedtlid,$wpusername ,$wpuserpwd ,$wpname ,$wpaddressname ,$wpaddressno ,$wprt ,$wprw ,$wpkel,$wpkec,$wpkota,$wpphoneno ,$wpmobileno ,$wpfaxno ,$wpzipcode ,$wpemail ,$brandaddress ,$brandno ,$brandrt ,$brandrw ,$brandkel,$brandkec,$brandkota,$brandphoneno ,$brandmobileno ,$brandfaxno ,$brandzipcode ,$idvat,$questionid,$privateanswer ,$i_mode) ;
            $count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }

    function readro() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_vat_registration_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_registration');
            $table = $ci->t_vat_registration;

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => isset($_REQUEST['_search']) ? $_REQUEST['_search'] : null,
                "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
            );

            // Filter Table
            $req_param['where'] = array("t_customer_order_id = ".$t_customer_order_id);
           // $req_param['where'][] = 't_customer_order_id = '.$t_customer_order_id;
              

            $table->setJQGridParam($req_param);
            $count = $table->countAll();

            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;

            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

            $req_param['limit'] = array(
                'start' => $start,
                'end' => $limit
            );

            $table->setJQGridParam($req_param);

            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['row'] = $table->getAll();
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    
}

/* End of file vats_controller.php */