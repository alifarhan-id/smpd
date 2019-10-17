<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_vat_setllement_ro_order_paymentkey_controller_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_setllement_ro_order_paymentkey_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_vat_setllement_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $payment_key = getVarClean('payment_key','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_ro_order_paymentkey');
            $table = $ci->t_vat_setllement_ro_order_paymentkey;

            

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" =>isset($_REQUEST['_search']) ? $_REQUEST['_search'] : null,
                "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
            );

            // Filter Table

            $item = $table->getCustOrder($payment_key);
            $cust_order_id = $item['t_customer_order_id'];

            $req_param['where'] = array();
            $req_param['where'][] = "t_customer_order_id = ".$cust_order_id;

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

            $data['rows'] = $table->getAll();
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
        
        
        $p_payment_type_id = getVarClean('p_payment_type_id','int',0);    
        $payment_key = getVarClean('payment_key','str','');       

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_ro_order_paymentkey');
            $table = $ci->t_vat_setllement_ro_order_paymentkey;
            $item = $table->getCustOrder($payment_key);
            $cust_order_id = $item['t_customer_order_id'];

            $result = $table->insertUpdate($cust_order_id, $p_payment_type_id) ;
            $count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }
}

/* End of file Groups_controller.php */