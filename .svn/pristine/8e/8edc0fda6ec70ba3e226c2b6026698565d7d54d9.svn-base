<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class vats_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_registration_npwpd_jabatan_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_customer_order_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_registration_npwpd_jabatan');
            $table = $ci->t_vat_registration_npwpd_jabatan;

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

            $data['row'] = $table->getAll(0, -1, 't_vat_registration_npwpd_jabatan_id', 'asc');
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

        $company_brand= getVarClean('company_brand', 'str', '');
        $company_additional_addr= getVarClean('company_additional_addr', 'str', '');
        $brand_address_name= getVarClean('brand_address_name', 'str', '');
        $brand_address_no= getVarClean('brand_address_no', 'str', '');
        $brand_address_rt= getVarClean('brand_address_rt', 'str', '');
        $brand_address_rw= getVarClean('brand_address_rw', 'str', '');
        $brand_p_region_id_kel= getVarClean('brand_p_region_id_kel', 'int', 0);
        $brand_p_region_id_kec= getVarClean('brand_p_region_id_kec', 'int', 0) ;
        $brand_p_region_id= getVarClean('brand_p_region_id', 'int', 0) ;
        $brand_phone_no= getVarClean('brand_phone_no', 'str', '');
        $brand_mobile_no= getVarClean('brand_mobile_no', 'str', '');
        $brand_fax_no= getVarClean('brand_fax_no', 'str', '');
        $brand_zip_code= getVarClean('brand_zip_code', 'str', '');
        $p_rqst_type_id= getVarClean('p_rqst_type_id', 'int', 0) ;
        $p_vat_type_dtl_id= getVarClean('p_vat_type_dtl_id', 'int', 0) ;
        

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_registration_npwpd_jabatan');
            $table = $ci->t_vat_registration_npwpd_jabatan;

            $result = $table->insertUpdate($company_brand,
                            $company_additional_addr,
                            $brand_address_name,
                            $brand_address_no,
                            $brand_address_rt,
                            $brand_address_rw,
                            $brand_p_region_id_kel,
                            $brand_p_region_id_kec,
                            $brand_p_region_id,
                            $brand_phone_no,
                            $brand_mobile_no,
                            $brand_fax_no,
                            $brand_zip_code,
                            $p_rqst_type_id,
                            $p_vat_type_dtl_id) ;
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
        $sidx = getVarClean('sidx','str','t_vat_registration_npwpd_jabatan_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_registration_npwpd_jabatan');
            $table = $ci->t_vat_registration_npwpd_jabatan;

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