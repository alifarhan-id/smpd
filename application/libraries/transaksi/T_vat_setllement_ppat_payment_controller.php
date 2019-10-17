<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class vats_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_setllement_ppat_payment_controller {


    function readData(){
        $s_keyword = getVarClean('s_keyword','str','');
        

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_ppat_payment');
            $table = $ci->t_vat_setllement_ppat_payment;

            $result = $table->getData($s_keyword) ;
            
            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }

    function updateDataFlag(){
        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);


        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_ppat_payment');
            $table = $ci->t_vat_setllement_ppat_payment;

            $result = $table->ubahFlag($t_customer_order_id);
            
            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }

}