<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class vats_controller
* @version 07/05/2015 12:18:00
*/
class T_message_inbox_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_message_inbox_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_message_inbox');
            $table = $ci->t_message_inbox;

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
            $req_param['where'][] = ' p_app_role_id_to = 27';
              

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

            $result = $table->getAll(0, -1, 'inbox.creation_date', 'desc');

            for ($i=0; $i < count($result); $i++) { 
                if($result[$i]['message_status'] == 'V'){
                    $result[$i]['status_view'] = 'Sudah Dibaca';
                } else if($result[$i]['message_status'] == 'U'){
                    $result[$i]['status_view'] = 'Belum Dibaca';
                }  else if($result[$i]['message_status'] == 'R'){
                    $result[$i]['status_view'] = 'Sudah Dibalas';
                }
            }

            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['rows'] = $result;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    

    function balas(){

        $message_body = getVarClean('message_body','str', ''); 
        $t_message_inbox_id = getVarClean('t_message_inbox_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_message_inbox');
            $table = $ci->t_message_inbox;

            $result = $table->reply($t_message_inbox_id, $message_body);
            
            $count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }

    function hapus(){
 
        $t_message_inbox_id = getVarClean('t_message_inbox_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_message_inbox');
            $table = $ci->t_message_inbox;

            $result = $table->deleteInbox($t_message_inbox_id);
            
            $count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }



    
}

/* End of file vats_controller.php */