<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Groups_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_setllement_ro_otobuk_controller {

    function read() {

        $page                = getVarClean('page','int',1);
        $limit               = getVarClean('rows','int',5);
        $sidx                = getVarClean('sidx','str','t_customer_order_id');
        $sord                = getVarClean('sord','str','desc');
        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_vat_setllement_ro_otobuk');
            $table = $ci->t_vat_setllement_ro_otobuk;

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => null,
                "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
            );

            // Filter Table
            $req_param['where'] = array();

            $table->setCriteria("a.p_finance_period_id = b.p_finance_period_id");
            $table->setCriteria("a.t_customer_order_id = c.t_customer_order_id");
            $table->setCriteria("a.t_cust_account_id = d.t_cust_account_id");
            $table->setCriteria("c.p_rqst_type_id = e.p_rqst_type_id");
            $table->setCriteria("a.t_customer_order_id=".$t_customer_order_id);

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

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function read_setllement() {

        $page                = getVarClean('page','int',1);
        $limit               = getVarClean('rows','int',5);
        $sidx                = getVarClean('sidx','str','t_vat_setllement_id');
        $sord                = getVarClean('sord','str','desc');
        $t_vat_setllement_id = getVarClean('t_vat_setllement_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_vat_setllement_ro_otobuk');
            $table = $ci->t_vat_setllement_ro_otobuk;

            $items = $table->getDataStellment($t_vat_setllement_id);

            $data['items'] = $items;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function read_type_setllement() {

        $page                = getVarClean('page','int',1);
        $limit               = getVarClean('rows','int',5);
        $sidx                = getVarClean('sidx','str','t_vat_setllement_id');
        $sord                = getVarClean('sord','str','desc');
        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_vat_setllement_ro_otobuk');
            $table = $ci->t_vat_setllement_ro_otobuk;

            $items = $table->getDataTypeStellment($t_customer_order_id);

            $data['items'] = $items;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function read_count_setllement() {

        $page                = getVarClean('page','int',1);
        $limit               = getVarClean('rows','int',5);
        $sidx                = getVarClean('sidx','str','t_vat_setllement_id');
        $sord                = getVarClean('sord','str','desc');
        $t_vat_setllement_id = getVarClean('t_vat_setllement_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_vat_setllement_ro_otobuk');
            $table = $ci->t_vat_setllement_ro_otobuk;

            $items = $table->getDataCountStellment($t_vat_setllement_id);

            $data['items'] = $items;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function update_no_kohir() {

        $page                = getVarClean('page','int',1);
        $limit               = getVarClean('rows','int',5);
        $sidx                = getVarClean('sidx','str','t_vat_setllement_id');
        $sord                = getVarClean('sord','str','desc');
        $t_vat_setllement_id = getVarClean('t_vat_setllement_id','int',0);
        $no_kohir            = getVarClean('no_kohir','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_vat_setllement_ro_otobuk');
            $table = $ci->t_vat_setllement_ro_otobuk;

            $items = $table->updateNoKohir($t_vat_setllement_id,$no_kohir);

            $data['items'] = $items;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function generate_kohir() {

        $page                = getVarClean('page','int',1);
        $limit               = getVarClean('rows','int',5);
        $sidx                = getVarClean('sidx','str','t_vat_setllement_id');
        $sord                = getVarClean('sord','str','desc');
        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_vat_setllement_ro_otobuk');
            $table = $ci->t_vat_setllement_ro_otobuk;

            $items = $table->generateKohir($t_customer_order_id);

            $data['items'] = $items;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function update_t_vat_setllement() {

        $page                = getVarClean('page','int',1);
        $limit               = getVarClean('rows','int',5);
        $sidx                = getVarClean('sidx','str','t_vat_setllement_id');
        $sord                = getVarClean('sord','str','desc');
        $t_vat_setllement_id = getVarClean('t_vat_setllement_id','int',0);
        $is_anomali          = getVarClean('is_anomali','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_vat_setllement_ro_otobuk');
            $table = $ci->t_vat_setllement_ro_otobuk;

            $items = $table->updateSetllement($t_vat_setllement_id,$is_anomali);

            $data['items'] = $items;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

}

/* End of file Groups_controller.php */