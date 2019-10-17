<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class vats_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_setllement_ro_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_customer_order_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_ro');
            $table = $ci->t_vat_setllement_ro;

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
            $req_param['where'][] = ' a.p_finance_period_id = b.p_finance_period_id ';
            $req_param['where'][] = ' a.t_customer_order_id = c.t_customer_order_id ';
            $req_param['where'][] = ' a.t_cust_account_id = d.t_cust_account_id ';
            $req_param['where'][] = ' c.p_rqst_type_id = e.p_rqst_type_id ';
            $req_param['where'][] = ' a.t_customer_order_id = '.$t_customer_order_id;
              

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

            $result = $table->getAll(0, -1, 't_customer_order_id', 'asc');
            for ($i=0; $i < count($result); $i++) { 
                $result[$i]['total_total'] = $result[$i]['total_vat_amount'] + $result[$i]['total_penalty_amount'];
            }

            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['rows'] = $result;
            $data['success'] = true;
            //print_r($result); exit();
            logging('view data vat');
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function flagPayment(){

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_ro');
            $table = $ci->t_vat_setllement_ro;

            $result = $table->getPayment($t_customer_order_id);
            $count = count($result);

            $data['records'] = $count;

            $data['rows'] = $result;
            $data['success'] = true;
            //print_r($result); exit();
            logging('view data vat');
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function cetakRegister(){

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_ro');
            $table = $ci->t_vat_setllement_ro;

            $result = $table->cetakRegister($t_customer_order_id);
            $count = count($result);

            $data['records'] = $count;

            $data['rows'] = $result;
            $data['success'] = true;
            //print_r($result); exit();
            logging('view data vat');
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function readDetail(){

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $t_vat_setllement_id = getVarClean('t_vat_setllement_id','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_ro');
            $table = $ci->t_vat_setllement_ro;

            $result = $table->getDetail($t_vat_setllement_id);
            $count = count($result);

            //print_r($result); exit();

            $data['records'] = $count;

            $data['rows'] = $result;
            $data['success'] = true;
            //print_r($result); exit();
            logging('view data vat');
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    
}

/* End of file vats_controller.php */