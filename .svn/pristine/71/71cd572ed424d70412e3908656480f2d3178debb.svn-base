<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_block_piutang_controller_controller
* @version 07/05/2015 12:18:00
*/
class T_block_piutang_controller {

    function edit(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        
        $block_status = getVarClean('status','str','');
        $alasan = getVarClean('alasan','str','');        

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_block_piutang');
            $table = $ci->t_block_piutang;

            $result = $table->updateData($block_status, $alasan) ;
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