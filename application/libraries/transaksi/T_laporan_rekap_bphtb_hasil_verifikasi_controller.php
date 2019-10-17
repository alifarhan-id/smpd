<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_rekap_bphtb_hasil_verifikasi_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_rekap_bphtb_hasil_verifikasi_controller {

    function read()
    {
        $start_date = getVarClean('date_start_laporan', 'str', '');
        $end_date   = getVarClean('date_end_laporan', 'str', '');
        $sidx = getVarClean('sidx','str','wp_name');
        $sord = getVarClean('sord','str','asc');
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        


        try {
            if (!empty($start_date)&&!empty($end_date)){
            	$ci = & get_instance();
                $ci->load->model('transaksi/t_laporan_rekap_bphtb_hasil_verifikasi');
                $table = $ci->t_laporan_rekap_bphtb_hasil_verifikasi;

                /*$req_param = array(
                    "sort_by" => $sidx,
                    "sord" => $sord,
                    "limit" => null,
                    "field" => null,
                    "where" => null,
                    "where_in" => null,
                    "where_not_in" => null,
                    "search" =>$_REQUEST['_search'],
                    "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                    "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                    "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
                );

                // Filter Table
                $req_param['where'] = array();*/


                $start_date = "'".$start_date."'";
                $end_date   = "'".$end_date."'";

                $table->setCriteria("cust_order.p_order_status_id <> 1");
                $table->setCriteria("reg_bphtb.status_verifikasi = 'Y'");
                $table->setCriteria("(trunc(reg_bphtb.creation_date) BETWEEN ".$start_date." AND ".$end_date.")");
                $table->setCriteria("(payment.receipt_no is not null or payment.receipt_no <> '')");                     

                // $table->setJQGridParam($req_param);
                $count = $table->countAll();

                if ($count > 0) $total_pages = ceil($count / $limit);
                else $total_pages = 1;

                if ($page > $total_pages) $page = $total_pages;
                $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

                /*$req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
                );

                $table->setJQGridParam($req_param);*/

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

}

/* End of file Groups_controller.php */