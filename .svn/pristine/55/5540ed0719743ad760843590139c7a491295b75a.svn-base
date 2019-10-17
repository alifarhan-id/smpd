<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_cust_account_update_status_controller
* @version 07/05/2015 12:18:00
*/
class T_cust_account_update_status_controller {

	function read()
    {
        $s_keyword  = getVarClean('s_keyword', 'str', '');
        $sidx 	    = getVarClean('sidx','str','wp_name');
        $sord 	    = getVarClean('sord','str','asc');
        $page	    = getVarClean('page','int',1);
        $limit 	    = getVarClean('rows','int',5);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {
            if (!empty($s_keyword)){
            	$ci = & get_instance();
                $ci->load->model('data_master/t_cust_account_update_status');
                $table = $ci->t_cust_account_update_status;

                

                $table->setCriteria("(upper(a.wp_name) LIKE upper('%".$s_keyword."%') OR 
                                        upper(a.npwd) LIKE upper('%".$s_keyword."%'))");            

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
        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function updateStatus() {

        $t_cust_account_id = getVarClean('t_cust_account_id', 'int', 0);
        $description = getVarClean('description', 'str', '');
        $p_account_status_id = getVarClean('p_account_status_id', 'int', 0);
        $valid_to = getVarClean('valid_to', 'str', '');

        //exit;

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'records' => 0, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('data_master/t_cust_account_update_status');
            $table = $ci->t_cust_account_update_status;

            $message = $table->updateStatus($t_cust_account_id,$description,$p_account_status_id,$valid_to);

            //echo($message);exit;

            $data['message'] = $message;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;

    }
}

/* End of file Groups_controller.php */