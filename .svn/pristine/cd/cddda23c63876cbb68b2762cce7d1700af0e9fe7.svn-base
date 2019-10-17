<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class vats_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_setllement_ro_otobuk_v2_controller {

    function getData(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        
        $CURR_DOC_ID = getVarClean('CURR_DOC_ID','int',0);      

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/T_vat_setllement_ro_otobuk_v2');
            $table = $ci->T_vat_setllement_ro_otobuk_v2;

            $result = $table->getData($CURR_DOC_ID) ;
            $count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }

    function getDetail(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        
        $t_vat_setllement_id = getVarClean('t_vat_setllement_id','int',0); 

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/T_vat_setllement_ro_otobuk_v2');
            $table = $ci->T_vat_setllement_ro_otobuk_v2;

            $result = $table->getDetail($t_vat_setllement_id) ;
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