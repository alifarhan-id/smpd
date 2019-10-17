<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_vat_setllement_edit_lb_controller
* @version 07/05/2015 12:18:00
*/
class T_vat_setllement_edit_lb_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','a.creation_date');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_edit_lb');
            $table = $ci->t_vat_setllement_edit_lb;

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => $_REQUEST['_search'],
                "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
            );

            // Filter Table
            $req_param['where'] = array();
            $table->setCriteria(" p_settlement_type_id = 8");

            $table->setJQGridParam($req_param);
            $count = $table->countAll();

            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;

            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

            $req_param['limit'] = array(
                'start' => $start,
                'end' => $limit
            );

            $table->setJQGridParam($req_param);

            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['rows'] = $table->getAll();
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function submit(){
        $page                   = getVarClean('page','int',1);
        $limit                  = getVarClean('rows','int',5);        
        
        $cusAccId               = getVarClean('cusAccId','int',0);
        $Period                 = getVarClean('Period','int',0);
        $yearPeriod             = getVarClean('yearPeriod','int',0);
        $npwd                   = getVarClean('npwd','str','');
        $ms_start               = getVarClean('ms_start','str','');
        $ms_end                 = getVarClean('ms_end','str','');
        $kamar                  = getVarClean('kamar','int',0);
        $tot                    = getVarClean('tot','int',0);
        $p_vat_type_dtl_id      = getVarClean('p_vat_type_dtl_id','int',0);
        $p_vat_type_dtl_cls_id  = getVarClean('p_vat_type_dtl_cls_id','int',0);

        $final_result           = array();

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            if($p_vat_type_dtl_cls_id == 0 || $p_vat_type_dtl_cls_id == '') 
                $p_vat_type_dtl_cls_id = 'NULL';

            if($kamar == '') 
                $kamar = 0;




            $ci = & get_instance();
            $ci->load->model('transaksi/t_vat_setllement_edit_lb');
            $table = $ci->t_vat_setllement_edit_lb;
            $result = $table->saveDataSubmit($cusAccId,$Period,$npwd,$ms_start,$ms_end,$kamar,$tot,$p_vat_type_dtl_id,$p_vat_type_dtl_cls_id);

            /*$data['items'] = $result;
            return $data;*/

            $cust_id = $result['o_cust_order_id'];
            $mess    = $result['o_mess'];

            if($cust_id != 0 || $cust_id != ''){
                
                $getEngine = $table->getEngine2step($cust_id);
                $t_vat_setllement_id = $table->getVatSetllement($cust_id);

                $result_code = $getEngine['o_result_code'];
                $result_msg  = $getEngine['o_result_msg'];

                if($result_code == 0){
                    $final_result ['t_vat_setllement_id'] = $t_vat_setllement_id;
                    $final_result ['msg'] = $mess;
                }else{
                    $final_result ['t_vat_setllement_id'] = null;
                    $final_result ['msg'] = $result_msg;
                }

            }else{
                $final_result ['t_vat_setllement_id'] = 0;
                $final_result ['msg'] = str_replace('"','',$mess);
            }
            
            //$count = count($final_result);

            $data['items'] = $final_result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }
}

/* End of file T_vat_setllement_edit_lb_controller.php */