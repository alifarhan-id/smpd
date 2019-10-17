<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Groups_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_setllement_dtl_ro_otobuk_tapping_controller {

    function read() {

        $t_vat_setllement_id = getVarClean('t_vat_setllement_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi_wf/t_vat_setllement_dtl_ro_otobuk_tapping');
            $table = $ci->t_vat_setllement_dtl_ro_otobuk_tapping;

            
            // Filter Table
            $req_param['where'] = array();
            $table->setCriteria("t_vat_setllement_id=".$t_vat_setllement_id);
            $count = $table->countAll();
            $total_pages = 1;
            $page =0;

            $params = $table->getAll();

            $ws_data = $table->getDataLink($params[0]);
            $dataBaru = array();

            if(!empty($ws_data)){
                for($i=0;$i<count($ws_data); $i++) {
                    $dataBaru[$i]['tanggal'] = $ws_data[$i]->tanggal;
                    $dataBaru[$i]['jml_receipt'] = $ws_data[$i]->jml_receipt;
                    $dataBaru[$i]['sub_total'] = $ws_data[$i]->sub_total;
                    $dataBaru[$i]['charge'] = $ws_data[$i]->charge;
                    $dataBaru[$i]['tax'] = $ws_data[$i]->tax;
                    $dataBaru[$i]['total'] = $ws_data[$i]->total;
                }
            }

            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['rows'] = $dataBaru;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }
}

/* End of file Groups_controller.php */