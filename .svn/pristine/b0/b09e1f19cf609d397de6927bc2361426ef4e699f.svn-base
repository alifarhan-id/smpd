<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_vat_setllement_ro_order_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_setllement_ro_order_controller {

	function read()
    {
        $s_keyword  = getVarClean('s_keyword', 'str', '');
        $sord 	    = getVarClean('sord','str','asc');
        $limit 	    = getVarClean('rows','int',10);

        //print_r($s_keyword);exit();

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $final_result = array();
        
        try {
            if (!empty($s_keyword)){
            	$ci = & get_instance();
                $ci->load->model('transaksi/t_vat_setllement_ro_order');
                $table = $ci->t_vat_setllement_ro_order;

                $t_customer_order_id = $table->getCustomerOrderId($s_keyword);
                if (empty($t_customer_order_id)){
                    $data['message'] = 'No Kohir Tidak Ditemukan';
                    $data['success'] = false;
                    return $data;
                }

                //$final_result = $table->getData($t_customer_order_id);
                $final_result = $table->getData2($t_customer_order_id);

                if (empty($final_result))
                    $final_result = $table->getData($t_customer_order_id);
                
                $final_result['total_total'] = $final_result['total_vat_amount'] + $final_result['total_penalty_amount'];

                //print_r($final_result);exit();

                
                
            }
            $data['items'] = $final_result;
            $data['success'] = true;
            
            
        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function payment() {
        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_ro_order');
            $table = $ci->t_vat_setllement_ro_order;

            $items = $table->payment($t_customer_order_id);

            $data['message'] = $items;
            $data['success'] = true;
            //$data['total'] = $totalcount;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }

    function cetak_register() {
        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_ro_order');
            $table = $ci->t_vat_setllement_ro_order;

            $items = $table->cetak_register($t_customer_order_id);

            $data['message'] = $items;
            $data['success'] = true;
            //$data['total'] = $totalcount;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }
}