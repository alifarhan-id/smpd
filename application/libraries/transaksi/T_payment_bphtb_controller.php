<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_bphtb_registration_list_controller
* @version 07/05/2015 12:18:00
*/
class T_payment_bphtb_controller {
 

    function read_payment() {

        $no_registrasi = getVarClean('no_registrasi', 'int', 0);

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'records' => 0, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_payment_bphtb');
            $table = $ci->t_payment_bphtb;

            $items = $table->getPaymentBphtb($no_registrasi);
            $code = substr($items, 0, 2);
            $pieces = explode("@",$items);
            $pieces1st = explode("|", $pieces[0]);
            $data['pieces'] = $pieces;
            $data['pieces1st'] = $pieces1st;
            if($code == 00){
                $pieces2nd = str_replace("|", "\n", $pieces[1]);
                $data['pieces2nd'] = $pieces2nd; 
            }
            

            $data['message'] = $pieces1st[1];
            $data['code'] = $code;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;

    }

    function payment() {

        $no_registrasi      = getVarClean('no_registrasi', 'int', 0);
        $nilai_pembayaran   = getVarClean('nilai_pembayaran', 'int', 0);        
        $bit48              = getVarClean('bit48', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'records' => 0, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_payment_bphtb');
            $table = $ci->t_payment_bphtb;

            $items = $table->paymentBphtb($no_registrasi,$nilai_pembayaran,$bit48);
            $code = substr($items, 0, 2);
            $pieces = explode("@",$items);
            $pieces1st = explode("|", $pieces[0]);

            $data['items'] = $items;
            $data['message'] = $pieces1st[1];
            $data['code'] = $code;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;

    }
}
