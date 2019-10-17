<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class region T_cust_acc_dtl_trans_controller
* @version 07/05/2015 12:18:00
*/
class T_cust_acc_dtl_trans_controller {

    function readLov_NPWD() {

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',5);

        $sort = getVarClean('sort','str','');
        $dir  = getVarClean('dir','str','');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/ty_lov_npwd');
            $table = $ci->ty_lov_npwd;

            if(!empty($searchPhrase)) {
                $table->setCriteria("(upper(npwd) ".$table->likeOperator." upper('%".$searchPhrase."%')
                                    OR upper(company_name) ".$table->likeOperator." upper('%".$searchPhrase."%'))");
            }

            $start = ($start-1) * $limit;
            $items = $table->getAll($start, $limit, $sort, $dir);
            $totalcount = $table->countAll();

            $data['rows'] = $items;
            $data['success'] = true;
            $data['total'] = $totalcount;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function fisrtLoad_NPWD() {

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',3);

        $sort = getVarClean('sort','str','ty_lov_npwd');
        $dir  = getVarClean('dir','str','asc');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/ty_lov_npwd');
            $table = $ci->ty_lov_npwd;

            if(!empty($searchPhrase)) {
                $table->setCriteria("(upper(npwd) ".$table->likeOperator." upper('%".$searchPhrase."%')
                                    OR upper(company_name) ".$table->likeOperator." upper('%".$searchPhrase."%'))");
            }

            $start = ($start-1) * $limit;
            $items = $table->getAll();
            $totalcount = $table->countAll();
            $items=$items[0];

            $data['rows'] = $items;
            $data['success'] = true;
            //$data['total'] = $totalcount;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }

    function read() {


        $t_cust_account_id = getVarClean('t_cust_account_id','int',0);
        $trans_date        = getVarClean('trans_date','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {
            if (!empty($t_cust_account_id)&&!empty($trans_date)){
                $ci = & get_instance();
                $ci->load->model('transaksi/t_cust_acc_dtl_trans');
                $table = $ci->t_cust_acc_dtl_trans;
                // $items[0] = "res";
                $items = $table->get_data($t_cust_account_id,$trans_date);
                
                
                $data['total'] = 0;//$total_pages;
                $data['records'] = 0;//$count;
                $data['rows'] = $items;
                
            }
            $data['success'] = true;

                
            return $data;
            
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function insert_data() {
        $t_cust_account_id = getVarClean('t_cust_account_id','int',0);
        $trans_date        = getVarClean('trans_date','str','');
        $bill_no           = getVarClean('bill_no','str','');
        $service_charge    = getVarClean('service_charge','int',0);
        $description       = getVarClean('description','str',null);
        $serve_desc        = '';
        $vat_charge        = "null";

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_cust_acc_dtl_trans');
            $table = $ci->t_cust_acc_dtl_trans;


            $param = array( 't_cust_account_id' => $t_cust_account_id,
                            'trans_date' => $trans_date,
                            'bill_no' => $bill_no,
                            'service_charge' => $service_charge,
                            'description' => $description,
                            'serve_desc' => $serve_desc,
                            'vat_charge' => $vat_charge,
                            );

            $items = $table->insert_data($param);

            $data['rows'] = $items;
            $data['success'] = true;
            //$data['total'] = $totalcount;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }

    function delete_data() {
        $t_cust_acc_dtl_trans_id = getVarClean('t_cust_acc_dtl_trans_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_cust_acc_dtl_trans');
            $table = $ci->t_cust_acc_dtl_trans;

            $items = $table->delete_data($t_cust_acc_dtl_trans_id);

            $data['rows'] = $items;
            $data['success'] = true;
            //$data['total'] = $totalcount;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }

    function saveUpload(){
        try {
            $ci = & get_instance();
            $userdata = $ci->session->userdata;
            $ci->load->model('transaksi/t_cust_acc_dtl_trans');
            $table = $ci->t_cust_acc_dtl_trans;

            $form_t_cust_account_id = $ci->input->post('form_t_cust_account_id');
            $form_trans_date = $ci->input->post('form_trans_date');

            

            global $_FILES;

            //print_r($_FILES);exit;

            //read file excel
            if(empty($_FILES['uploadForm']['name'])){
                throw new Exception('File tidak boleh kosong');
            }

            $file_name = $_FILES['uploadForm']['name']; // <-- File Name
            $file_location = './upload/files/excel/'.$file_name; // <-- LOKASI Upload File

            if (!move_uploaded_file($_FILES['uploadForm']['tmp_name'], $file_location)){
                throw new Exception("Upload file gagal");
            }

            include('excel/reader.php');
            $xl_reader = new Spreadsheet_Excel_Reader();
            $res = $xl_reader->_ole->read($file_location);

            if($res === false) {
                if($xl_reader->_ole->error == 1) {
                    $result['message'] = "File Harus Format Excel";
                    $result['success'] = false;
                    echo json_encode($result);
                    exit;
                }
            }

            $xl_reader->read($file_location);
            $firstColumn = $xl_reader->sheets[0]['cells'][1][1];

            $value = $table->get_uName_NPWPD();

            $form_t_cust_account_id = empty($form_t_cust_account_id) ? $value : $form_t_cust_account_id;

            for($i = 2; $i <= $xl_reader->sheets[0]['numRows']; $i++) {
               $i_tgl_trans =  $xl_reader->sheets[0]['cells'][$i][1];   
               $i_bill_no =  $xl_reader->sheets[0]['cells'][$i][2];
               $i_serve_desc =  $xl_reader->sheets[0]['cells'][$i][3];
               $i_serve_charge =  $xl_reader->sheets[0]['cells'][$i][4];
               $i_vat_charge = "null";
               $i_desc = $xl_reader->sheets[0]['cells'][$i][5];
                                                   
    
               if(empty($i_bill_no)) break;
                $param = array( 't_cust_account_id' => $form_t_cust_account_id,
                            'trans_date' => $i_tgl_trans,
                            'bill_no' => $i_bill_no,
                            'service_charge' => $i_serve_charge,
                            'description' => $i_desc,
                            'serve_desc' => $i_serve_desc,
                            'vat_charge' => $i_vat_charge,
                            );

                $dt = $table->insert_data($param);

                $msg = $dt['o_result_msg'];
               

              if (trim($msg) != 'OK'){
                  throw new Exception('Terdapat Kesalahan Pada File Excel');            
              }
            
            }

            $result['message'] = $items;
                    $result['success'] = false;
                    echo json_encode($result);
                    exit;


        }catch(Exception $e) {
            $result['success'] = false;
            $result['message'] = $e->getMessage();
        }

        echo json_encode($result);
        exit;
    }
}

/* End of file region T_cust_acc_dtl_trans_controller.php */