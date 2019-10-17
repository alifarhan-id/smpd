<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_restore_tuutap_controller
* @version 07/05/2015 12:18:00
*/
class T_restore_tuutap_controller {

	function read(){
		$npwd = getVarClean('npwd', 'str', '');
		$tahun = getVarClean('tahun', 'str', '');
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

         $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');        

        try {
        	if(!empty($npwd)){
        		$ci = & get_instance();
	            $ci->load->model('transaksi/t_restore_tuutap');
	            $table = $ci->t_restore_tuutap;

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

	            $table->setCriteria("periode_gab LIKE upper('%".$tahun."%')");
	            $table->setCriteria("npwpd_gab LIKE upper('%".$npwd."%')");

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

	            $data['rows'] = $table->getAll(0,0, 'thn_bln','ASC');
	            $data['success'] = true;
        	} 
        	

        } catch (Exception $e) {
        	$data['message'] = $e->getMessage();        	
        }
        return $data;
	}

	function doMigration(){
		$npwpd_gab  = getVarClean('npwpd_gab','str','');
		$periode_gab = getVarClean('periode_gab','str','');
		$thn_bln    = getVarClean('thn_bln','str','');
		$no_kohir   = getVarClean('no_kohir','str','');

		//print_r($npwpd_gab." ".$periode_gab." ".$thn_bln." ".$no_kohir);exit;

		$data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

		try {
            
            if(!empty($npwpd_gab) && !empty($periode_gab) && !empty($thn_bln) && !empty($no_kohir)){

                $ci = & get_instance();
                $ci->load->model('transaksi/t_restore_tuutap');
                $table = $ci->t_restore_tuutap;

                $result = $table->migrasiData($npwpd_gab, $periode_gab,$thn_bln,$no_kohir);      

                //print_r($result);exit();
                $data['result'] = $result;
                $data['success'] = true;

                return $data;
            }
        } catch (Exception $e) {
            //$data['message'] = $e->getMessage();
            echo $e->getMessage();
            exit;
        }
	}

}