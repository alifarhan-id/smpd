<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class vats_controller
* @version 07/05/2015 12:18:00
*/
class T_executive_summary_report_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_executive_summary_report_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_executive_summary_report');
            $table = $ci->t_executive_summary_report;

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

            $data['row'] = $table->getAll(0, -1, 't_executive_summary_report_id', 'asc');
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

        $p_year_period_id = getVarClean('p_year_period_id', 'int', 0);
        $p_vat_type_id = getVarClean('p_vat_type_id', 'int', 0);
        $period_type = getVarClean('period_type', 'int', 0);
        $p_finance_period_id = getVarClean('p_finance_period_id', 'int', 0);
        $triwulan = getVarClean('triwulan', 'str', '');
        $semester = getVarClean('semester', 'str', '');
        $penjelasan = getVarClean('penjelasan', 'str', '');
        $permasalahan = getVarClean('permasalahan', 'str', '');
        $kesimpulan = getVarClean('kesimpulan', 'str', '');
        $saran = getVarClean('saran', 'str', '');

        

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_executive_summary_report');
            $table = $ci->t_executive_summary_report;

            $result = $table->insertUpdate($p_year_period_id,$p_vat_type_id, $period_type, $p_finance_period_id,$triwulan,$semester, $penjelasan,$permasalahan,$kesimpulan,$saran) ;
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
        $sidx = getVarClean('sidx','str','t_executive_summary_report_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_executive_summary_report');
            $table = $ci->t_executive_summary_report;

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