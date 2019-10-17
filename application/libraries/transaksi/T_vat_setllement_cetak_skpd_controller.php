<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_vat_setllement_cetak_skpd_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_setllement_cetak_skpd_controller {

	function read(){
		$s_keyword = getVarClean('s_keyword', 'str', '');
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

         $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        

        try {
        	if(!empty($s_keyword)){
        		$ci = & get_instance();
	            $ci->load->model('transaksi/t_vat_setllement_cetak_skpd');
	            $table = $ci->t_vat_setllement_cetak_skpd;

	            $req_param = array(
	                "sort_by" =>null, // tidak di sort by 
	                "sord" => null,// tidak di sord
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

	            $req_param['where'] = array();

	            $table->setCriteria("a.p_finance_period_id = b.p_finance_period_id");
	            $table->setCriteria("a.t_customer_order_id = c.t_customer_order_id");
	            $table->setCriteria("a.t_cust_account_id = d.t_cust_account_id");
	            $table->setCriteria("c.p_rqst_type_id = e.p_rqst_type_id");
	            $table->setCriteria("sett_type.p_settlement_type_id = a.p_settlement_type_id(+)");
	            $table->setCriteria("(upper(d.wp_name) LIKE upper('%".$s_keyword."%') OR 
									  upper(a.npwd) LIKE upper('%".$s_keyword."%') OR
									  upper(a.no_kohir) LIKE upper('%".$s_keyword."%')
									)");

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

	            if ($page == 0) $data['page'] = 1;
	            else $data['page'] = $page;

	            $data['total'] = $total_pages;
	            $data['records'] = $count;

	            $data['rows'] = $table->getAll();
	            $data['success'] = true;
        	} 
        	

        } catch (Exception $e) {
        	$data['message'] = $e->getMessage();        	
        }
        return $data;
	}

}