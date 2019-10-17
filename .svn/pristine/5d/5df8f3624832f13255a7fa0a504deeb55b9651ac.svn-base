<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class vats_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_setllement_manual_skpd_nihil_controller {

    function insertUpdate(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        
        $t_cust_account_id = getVarClean('t_cust_account_id','int',0);
        $p_finance_period_id = getVarClean('p_finance_period_id','int',0); 
        $npwd = getVarClean('npwd','str','');
        $start_date = getVarClean('start_date','str','');
        $end_date = getVarClean('end_date','str',''); 
        $p_vat_type_dtl_id = getVarClean('p_vat_type_dtl_id','int',0); 
        $p_vat_type_dtl_cls_id = getVarClean('p_vat_type_dtl_cls_id','int',0);        

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_manual_skpd_nihil');
            $table = $ci->t_vat_setllement_manual_skpd_nihil;

            $result = $table->insertUpdate($t_cust_account_id,$p_finance_period_id,$npwd,$start_date,$end_date,$p_vat_type_dtl_id,$p_vat_type_dtl_cls_id ) ;
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