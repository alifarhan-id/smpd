<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_bphtb_delete_list_controller
* @version 07/05/2015 12:18:00
*/
class T_bphtb_delete_list_controller {

    function read_data() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('t_bphtb_registration_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');

        $s_keyword = getVarClean('s_keyword','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        if($s_keyword == ''){
            $ci = & get_instance();
            $ci->load->model('transaksi/t_bphtb_delete_list');
            $table = $ci->t_bphtb_delete_list;
        }else{
            try {

                $ci = & get_instance();
                $ci->load->model('transaksi/t_bphtb_delete_list');
                $table = $ci->t_bphtb_delete_list;
                 
                $result = $table->getData($s_keyword);

                $count = count($result);
                //count($result)

                if ($count > 0) $total_pages = ceil($count / $limit);
                else $total_pages = 1;

                if ($page > $total_pages) $page = $total_pages;
                $start = $limit * $page - 1; // do not put $limit*($page - 1)

               
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

    }

    function hapusBphtb(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

        $t_bphtb_registration_id= getVarClean('t_bphtb_registration_id','int',0);  

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_bphtb_delete_list');
            $table = $ci->t_bphtb_delete_list;
            $result = $table->hapusBphtb($t_bphtb_registration_id) ;
            $count = count($result);

            /*$data['rows'] = $result;
            $data['success'] = true;*/

        }catch (Exception $e) {
            //$data['message'] = $e->getMessage();
        }

        return $result;

    } 

}
