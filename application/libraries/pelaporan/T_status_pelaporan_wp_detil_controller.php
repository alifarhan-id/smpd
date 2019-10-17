 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_status_pelaporan_wp_detil_controller.php
* @version 07/05/2015 12:18:00
*/
class T_status_pelaporan_wp_detil_controller {

	function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);        

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_status_pelaporan_wp_detil');
            $table = $ci->t_status_pelaporan_wp_detil;
             
            $result = $table->getWP_detil();
            
            //$table->setJQGridParam($req_param);
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

/* End of file T_status_pelaporan_wp_detil_controller.php.php */