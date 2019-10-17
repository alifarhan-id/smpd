 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_restore_trans_controller.php
* @version 07/05/2015 12:18:00
*/
class T_restore_trans_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('t_vat_setllement_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');
        $date_start_laporan = getVarClean('date_start_laporan','str','');
        $date_end_laporan = getVarClean('date_end_laporan','str','');
        $npwd = getVarClean('npwd','str','');
        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        if(($sidx = '' || $sidx == 0) && $date_start_laporan == '' && $date_end_laporan == '' && $npwd == '' && ($p_vat_type_id == '' || $p_vat_type_id == 0)){
            $ci = & get_instance();
            $ci->load->model('transaksi/t_restore_trans');
            $table = $ci->t_restore_trans;
        }else{
            try {

                $ci = & get_instance();
                $ci->load->model('trans/t_restore_trans');
                $table = $ci->t_restore_trans;
                 
                $result = $table->getData_restore($npwd, $p_vat_type_id, $date_start_laporan, $date_end_laporan);


                
                //$table->setJQGridParam($req_param);
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

    function Restore(){
        $t_vat_setllement_id = getVarClean('t_vat_setllement_id','int',0);
        $alasan              = getVarClean('alasan','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_restore_trans');
            $table = $ci->t_restore_trans;

            $result = $table->fc_restore($t_vat_setllement_id, $alasan);
            
            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }



    
}

/* End of file T_restore_trans_controller.php.php */