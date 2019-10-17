<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_bphtb_registration_list_controller
* @version 07/05/2015 12:18:00
*/
class T_history_bphtb_controller {
 
    function read() {
        //exit;
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','njop_pbb');
        $sord = getVarClean('sord','str','desc');
        $periode = getVarClean('periode','str','');
        $p_app_menu_id = getVarClean('p_app_menu_id','str','');
        $s_keyword = getVarClean('s_keyword','str','');
        $date_start_laporan = getVarClean('date_start_laporan','str','');
        $date_end_laporan = getVarClean('date_end_laporan','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance(); 
            $ci->load->model('transaksi/t_history_bphtb');
            $table = $ci->t_history_bphtb;
             //$periode='201712';;
            if($date_start_laporan == '' && $date_end_laporan == ''){
                $table->setCriteria("(h.wp_name ILIKE '%".$s_keyword."%'
                            OR h.njop_pbb ILIKE '%".$s_keyword."%')");
            }else{
                $table->setCriteria("(h.wp_name ILIKE '%".$s_keyword."%'
                            OR h.njop_pbb ILIKE '%".$s_keyword."%')
                            AND (trunc(modification_date) between '".$date_start_laporan."' AND '".$date_end_laporan."')"); 
            }
            
            /*$table->setCriteria("(h.wp_name ILIKE '%".$s_keyword."%'
                                OR h.njop_pbb ILIKE '%".$s_keyword."%')
                                AND (trunc(modification_date) between '".$date_start_laporan."' AND '".$date_end_laporan."')"); */                  
            
            $count = $table->countAll();

            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;

            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - ($limit); // do not put $limit*($page - 1)


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

    function readSearch(){

    }
}
