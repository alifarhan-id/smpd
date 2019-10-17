<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_vat_setllement_cetak_skpd_penelitian_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_setllement_cetak_skpd_penelitian_controller {

    function read_data() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('t_vat_setllement_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');

        $s_keyword = getVarClean('s_keyword','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        if($s_keyword == ''){
            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_cetak_skpd_penelitian');
            $table = $ci->t_vat_setllement_cetak_skpd_penelitian;
        }else{
            try {

                $ci = & get_instance();
                $ci->load->model('transaksi/t_vat_setllement_cetak_skpd_penelitian');
                $table = $ci->t_vat_setllement_cetak_skpd_penelitian;
                 
                $result = $table->getData($s_keyword);

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
}
