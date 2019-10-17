<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class region T_cust_acc_dtl_trans_controller
* @version 07/05/2015 12:18:00
*/
class T_cust_acc_dtl_trans_month_controller {

    function read() {


        $t_cust_account_id = getVarClean('t_cust_account_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {
            if (!empty($t_cust_account_id)){
                $ci = & get_instance();
                $ci->load->model('transaksi/t_cust_acc_dtl_trans_month');
                $table = $ci->t_cust_acc_dtl_trans_month;

                $items = $table->get_data($t_cust_account_id);
                
                
                $data['total'] = 0;//$total_pages;
                $data['records'] = 0;//$count;
                $data['rows'] = $items;
                
            }
            $data['success'] = true;

                
            return $data;
            
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    
}

/* End of file region T_cust_acc_dtl_trans_controller.php */