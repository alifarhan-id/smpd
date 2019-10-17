<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Groups_controller
* @version 07/05/2015 12:18:00
*/
class T_lembar_kontrol_bphtb_controller {

    function read() {

        $page                = getVarClean('page','int',1);
        $limit               = getVarClean('rows','int',5);
        $sord                = getVarClean('sord','str','desc');
        $date_start          = getVarClean('date_start_laporan','str','');
        $date_end            = getVarClean('date_end_laporan','str','');

        //echo "start = ".$date_start." enc = ".$date_end." name = ".$nama_wp;exit();


        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {
            if (!empty($date_start) && !empty($date_end)){
                $ci = & get_instance();
                $ci->load->model('transaksi/t_lembar_kontrol_bphtb');
                $table = $ci->t_lembar_kontrol_bphtb;              
                

                if(!empty($date_start) && !empty($date_end)) {
                    $table->setCriteria("(trunc(a.creation_date) BETWEEN '".$date_start."' AND '".$date_end."')");
                }elseif (!empty($date_start) && empty($date_end)) {
                   $table->setCriteria("trunc(a.creation_date) >= '".$date_start."'");
                }elseif (empty($date_start) && !empty($date_end)) {
                   $table->setCriteria("trunc(a.creation_date) <= '".$date_end."'");
                }   
                //print_r($table);exit();

               
                $count = $table->countAll();

                if ($count > 0) $total_pages = ceil($count / $limit);
                else $total_pages = 1;

                if ($page > $total_pages) $page = $total_pages;
                $start = $limit * $page - ($limit); // do not put $limit*($page - 1)


                if ($page == 0) $data['page'] = 1;
                else $data['page'] = $page;

                $data['total'] = $total_pages;
                $data['records'] = $count;

                $data['rows'] = $table->getAll(0, 0, 'wp_name', 'asc');
            }
            $data['success'] = true;
            return $data;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    

}

/* End of file T_lembar_kontrol_bphtb_controller.php */