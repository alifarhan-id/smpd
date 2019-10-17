<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_executive_summary_report_ver_controller
* @version 07/05/2015 12:18:00
*/
class T_executive_summary_report_ver_controller {
	function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_customer_order_id');
        $sord = getVarClean('sord','str','desc');
        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_executive_summary_report_ver');
            $table = $ci->t_executive_summary_report_ver;

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

            $table->setCriteria("t_customer_order_id = ".$t_customer_order_id);

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

    function update(){
        $penjelasan             = getVarClean('penjelasan','str','');
        $permasalahan           = getVarClean('permasalahan','str','');
        $kesimpulan             = getVarClean('kesimpulan','str','');
        $saran                  = getVarClean('saran','str','');
        $t_executive_summary_id = getVarClean('t_executive_summary_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_executive_summary_report_ver');
            $table = $ci->t_executive_summary_report_ver;

            $result = $table->updateSummaryRoVer($penjelasan,$permasalahan,$kesimpulan,$saran,$t_executive_summary_id);

            $count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;
        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;    
    }
}