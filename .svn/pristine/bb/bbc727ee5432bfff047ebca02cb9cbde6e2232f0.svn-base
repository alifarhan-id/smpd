<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class vats_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_setllement_manual_skpdkb_jabatan_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_vat_setllement_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_manual_skpdkb_jabatan');
            $table = $ci->t_vat_setllement_manual_skpdkb_jabatan;


            
            if( isset($_REQUEST['searchField']) && $_REQUEST['searchField']=='npwd') {
                $_REQUEST['searchField']='x.npwd';
            }

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => $_REQUEST['_search'],
                "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
            );

            // Filter Table

            $req_param['where'] = array();
            $req_param['where'][] = "x.p_settlement_type_id = 3";

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
        
        $t_cust_account_id = getVarClean('t_cust_account_id','int',0);
        $p_finance_period_id = getVarClean('p_finance_period_id','int',0); 
        $npwd = getVarClean('npwd','str','');
        $start_date = getVarClean('start_date','str','');
        $end_date = getVarClean('end_date','str',''); 
        $qty_room_sold = getVarClean('qty_room_sold','int',0);
        $trans_amount = getVarClean('trans_amount','int',0);
        $p_vat_type_dtl_id = getVarClean('p_vat_type_dtl_id','int',0); 
        $p_vat_type_dtl_cls_id = getVarClean('p_vat_type_dtl_cls_id','int',0);        

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_manual_skpdkb_jabatan');
            $table = $ci->t_vat_setllement_manual_skpdkb_jabatan;

            $result = $table->insertUpdate($t_cust_account_id,$p_finance_period_id,$npwd,$start_date,$end_date,$qty_room_sold,$trans_amount,$p_vat_type_dtl_id,$p_vat_type_dtl_cls_id ) ;
            $count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }
}