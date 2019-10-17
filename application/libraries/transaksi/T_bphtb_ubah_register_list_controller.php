<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class vats_controller
* @version 07/05/2015 12:18:00
*/
class T_bphtb_ubah_register_list_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_bphtb_registration_id');
        $sord = getVarClean('sord','str','desc');

        $s_keyword = getVarClean('s_keyword','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => true, 'message' => '');

        if ($s_keyword != "") {
            try {

                $ci = & get_instance();
                $ci->load->model('transaksi/t_bphtb_ubah_register_list');
                $table = $ci->t_bphtb_ubah_register_list;

                
                if( isset($_REQUEST['searchField'])){
                    if($_REQUEST['searchField']=='wp_name') {
                        $_REQUEST['searchField']='a.wp_name';
                    }
                    if($_REQUEST['searchField']=='njop_pbb') {
                        $_REQUEST['searchField']='a.njop_pbb';
                    }
                    if($_REQUEST['searchField']=='registration_no') {
                        $_REQUEST['searchField']='a.registration_no';
                    }
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
                $req_param['where'][] = "(upper(a.wp_name) LIKE upper('%".$s_keyword."%') OR 
                                          upper(a.njop_pbb) LIKE upper('%".$s_keyword."%') OR
                                          upper(a.registration_no) LIKE upper('%".$s_keyword."%'))";
                $req_param['where'][] = "b.t_payment_receipt_bphtb_id is not null";

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

                $data['rows'] = $table->getAll(0, -1 , 'trim(a.wp_name)', 'ASC');
                $data['success'] = true;
                logging('view data vat');
            }catch (Exception $e) {
                $data['message'] = $e->getMessage();
            }
        }       

        return $data;
    }

    function readDataRegister(){
        $t_bphtb_registration_id = getVarClean('t_bphtb_registration_id','int',0);
        

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_bphtb_ubah_register_list');
            $table = $ci->t_bphtb_ubah_register_list;

            $result = $table->getRegister($t_bphtb_registration_id) ;
            
            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }

    function updateDataFlag(){
        $t_bphtb_registration_id = getVarClean('t_bphtb_registration_id','int',0);
        $alasan = getVarClean('alasan','str','');


        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_bphtb_ubah_register_list');
            $table = $ci->t_bphtb_ubah_register_list;

            $result = $table->ubahFlag($t_bphtb_registration_id, $alasan);
            
            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }

}