<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class vats_controller
* @version 07/05/2015 12:18:00
*/
class T_penutupan_wp_ver_piutang_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_customer_order_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_penutupan_wp_ver_piutang');
            $table = $ci->t_penutupan_wp_ver_piutang;

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
            $req_param['where'][] = 'p_order_status_id = 1';
              

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

            $data['rows'] = $table->getAll(0, -1, 'updated_date', 'desc');
            $data['success'] = true;
            logging('view data vat');
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function readro(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

        $t_customer_order_id= getVarClean('t_customer_order_id','int',0);
        

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_penutupan_wp_ver_piutang');
            $table = $ci->t_penutupan_wp_ver_piutang;

            $result = $table->getData($t_customer_order_id);
            $count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }

    function readShowPiutang(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

        $npwd = getVarClean('npwd','str','');
        /*echo $npwd;
        exit;*/
        
        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_penutupan_wp_ver_piutang');
            $table = $ci->t_penutupan_wp_ver_piutang;

            $result = $table->getDataPiutang($npwd);
            $count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }

    function setWpInactive(){
        $t_cust_account_id = getVarClean('t_cust_account_id','int',0);
        /*echo $npwd;
        exit;*/
        
        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_penutupan_wp_ver_piutang');
            $table = $ci->t_penutupan_wp_ver_piutang;

            $result = $table->setWpInactive($t_cust_account_id);
            

            $data['rows'] = $result;
            $data['success'] = true;
            /*print_r($data);
            exit;*/

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }
}

/* End of file vats_controller.php */