<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Groups_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_rekap_bphtb_verifikasi_controller {

    function read() {

        $page                = getVarClean('page','int',1);
        $limit               = getVarClean('rows','int',5);
        $sord                = getVarClean('sord','str','desc');
        $date_start          = getVarClean('date_start_laporan','str','');
        $date_end            = getVarClean('date_end_laporan','str','');
        $nama_wp             = getVarClean('nama_wp','str','');

        //echo "start = ".$date_start." enc = ".$date_end." name = ".$nama_wp;exit();


        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {
            if (!empty($date_start)&&!empty($date_end)){
                $ci = & get_instance();
                $ci->load->model('transaksi/t_laporan_rekap_bphtb_verifikasi');
                $table = $ci->t_laporan_rekap_bphtb_verifikasi;

                $table->setCriteria("cust_order.p_order_status_id <> 1");
                $table->setCriteria("reg_bphtb.status_verifikasi is null");

                if(!empty($date_start) && !empty($date_end)) {
                    $table->setCriteria("(trunc(reg_bphtb.creation_date) BETWEEN '".$date_start."' AND '".$date_end."')");
                }elseif (!empty($date_start) && empty($date_end)) {
                   $table->setCriteria("trunc(reg_bphtb.creation_date) >= '".$date_start."'");
                }elseif (empty($date_start) && !empty($date_end)) {
                   $table->setCriteria("trunc(reg_bphtb.creation_date) <= '".$date_end."'");
                }

                if(!empty($nama_wp)) {       
                    $table->setCriteria("(reg_bphtb.wp_name ILIKE '%".$nama_wp."%') ");
                }
                
                $count = $table->countAll();

                if ($count > 0) $total_pages = ceil($count / $limit);
                else $total_pages = 1;

                if ($page > $total_pages) $page = $total_pages;
                $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

                /*$req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
                );*/

                //$table->setJQGridParam($req_param);

                if ($page == 0) $data['page'] = 1;
                else $data['page'] = $page;

                $data['total'] = $total_pages;
                $data['records'] = $count;

                $data['rows'] = $table->getAll(0, 0, 'wp_name', 'asc');
            }
            $data['success'] = true;
            return $data;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function update(){

        $t_bphtb_registration_id = getVarClean('t_bphtb_registration_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {
            
            if(!empty($t_bphtb_registration_id)){

                $ci = & get_instance();
                $ci->load->model('transaksi/t_laporan_rekap_bphtb_verifikasi');
                $table = $ci->t_laporan_rekap_bphtb_verifikasi;

                $nomor_validasi = $table->getNomorValidasi();

                //print_r("nomor_validasi = ".$nomor_validasi);exit();

                $result = $table->updateBPHTB($t_bphtb_registration_id, $nomor_validasi);
                $result_final = '';
                if($result){
                    $result_final = $nomor_validasi;
                }

                //print_r($result_final);exit();


                $data['result'] = $result_final;
                $data['success'] = true;

                return $data;
            }
        } catch (Exception $e) {
            //$data['message'] = $e->getMessage();
            echo $e->getMessage();
            exit;
        }

    }

}

/* End of file T_laporan_rekap_bphtb_verifikasi_controller.php */