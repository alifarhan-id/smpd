<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Groups_controller
* @version 07/05/2015 12:18:00
*/
class T_reconciliation_file_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_reconciliation_file_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_reconciliation_file');
            $table = $ci->t_reconciliation_file;

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
            logging('view data icon');
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }



    function crud() {

        $data = array();
        $oper = getVarClean('oper', 'str', '');
        switch ($oper) {
            case 'add' :
                permission_check('can-add-icon');
                $data = $this->create();
            break;

            case 'edit' :
                permission_check('can-edit-icon');
                $data = $this->update();
            break;

            case 'del' :
                permission_check('can-delete-icon');
                $data = $this->destroy();
            break;

            default :
                permission_check('can-view-icon');
                $data = $this->read();
            break;
        }

        return $data;
    }


    function create() {

        $ci = & get_instance();
        $ci->load->model('transaksi/t_reconciliation_file');
        $table = $ci->t_reconciliation_file;

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        //$jsonItems = getVarClean('items', 'str', '');
        //$items = jsonDecode($jsonItems);

        
        ////////////////////
        global $_FILES;

        //print_r($_FILES);exit;

        //read file excel
        if(empty($_FILES['uploadForm']['name'])){
            throw new Exception('File tidak boleh kosong');
        }

        $file_name = $_FILES['uploadForm']['name']; // <-- File Name
        $file_location = './upload/rekon/'.$file_name; // <-- LOKASI Upload File
        $file_date = substr($file_name, -8);
        $file_dir = 'upload/rekon/';
        $total_trans_record = 0;
        $total_amount = 0;
        

        if (!move_uploaded_file($_FILES['uploadForm']['tmp_name'], $file_location)){
            throw new Exception("Upload file gagal");
        }

        $items = array( 'file_name' => $file_name,
                        'file_date' => $file_date,
                        'file_dir' => $file_dir,
                        'total_trans_record' => $total_trans_record,
                        'total_amount' => $total_amount,
                        );

        //print_r($data);exit;

        /////////////////////////

        if (!is_array($items)){
            $data['message'] = 'Invalid items parameter';
            return $data;
        }

        $table->actionType = 'CREATE';
        $errors = array();

        if (isset($items[0])){
            $numItems = count($items);
            for($i=0; $i < $numItems; $i++){
                try{

                    $table->db->trans_begin(); //Begin Trans

                        $table->setRecord($items[$i]);
                        $table->create();

                    $table->db->trans_commit(); //Commit Trans

                }catch(Exception $e){

                    $table->db->trans_rollback(); //Rollback Trans
                    $errors[] = $e->getMessage();
                }
            }

            $numErrors = count($errors);
            if ($numErrors > 0){
                $data['message'] = $numErrors." from ".$numItems." record(s) failed to be saved.<br/><br/><b>System Response:</b><br/>- ".implode("<br/>- ", $errors)."";
            }else{
                $data['success'] = true;
                $data['message'] = 'Data added successfully';
            }
            $data['rows'] =$items;
        }else {

            try{
                $table->db->trans_begin(); //Begin Trans

                    $table->setRecord($items);
                    $table->create();

                $table->db->trans_commit(); //Commit Trans

                $data['success'] = true;
                $data['message'] = 'Data added successfully';
                logging('create data icon');

            }catch (Exception $e) {
                $table->db->trans_rollback(); //Rollback Trans

                $data['message'] = $e->getMessage();
                $data['rows'] = $items;
            }

        }
        return $data;

    }

    function update($items) {

        $ci = & get_instance();
        $ci->load->model('transaksi/t_reconciliation_file');
        $table = $ci->t_reconciliation_file;

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        //$jsonItems = getVarClean('items', 'str', '');
        //$items = jsonDecode($jsonItems);


        if (!is_array($items)){
            $data['message'] = 'Invalid items parameter';
            return $data;
        }

        $table->actionType = 'UPDATE';

        if (isset($items[0])){
            $errors = array();
            $numItems = count($items);
            for($i=0; $i < $numItems; $i++){
                try{
                    $table->db->trans_begin(); //Begin Trans

                        $table->setRecord($items[$i]);
                        $table->update();

                    $table->db->trans_commit(); //Commit Trans

                    $items[$i] = $table->get($items[$i][$table->pkey]);
                }catch(Exception $e){
                    $table->db->trans_rollback(); //Rollback Trans

                    $errors[] = $e->getMessage();
                }
            }

            $numErrors = count($errors);
            if ($numErrors > 0){
                $data['message'] = $numErrors." from ".$numItems." record(s) failed to be saved.<br/><br/><b>System Response:</b><br/>- ".implode("<br/>- ", $errors)."";
            }else{
                $data['success'] = true;
                $data['message'] = 'Data update successfully';
            }
            $data['rows'] =$items;
        }else {

            try{
                $table->db->trans_begin(); //Begin Trans

                    $table->setRecord($items);
                    $table->update();

                $table->db->trans_commit(); //Commit Trans

                $data['success'] = true;
                $data['message'] = 'Data update successfully';
                logging('update data icon');
                $data['rows'] = $table->get($items[$table->pkey]);
            }catch (Exception $e) {
                $table->db->trans_rollback(); //Rollback Trans

                $data['message'] = $e->getMessage();
                $data['rows'] = $items;
            }

        }
        return $data;

    }

    function destroy() {
        $ci = & get_instance();
        $ci->load->model('transaksi/t_reconciliation_file');
        $table = $ci->t_reconciliation_file;

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $jsonItems = getVarClean('items', 'str', '');
        $items = jsonDecode($jsonItems);

        $this->deleteDetailAll($items);

        try{
            $table->db->trans_begin(); //Begin Trans

            $total = 0;
            if (is_array($items)){
                foreach ($items as $key => $value){
                    if (empty($value)) throw new Exception('Empty parameter');
                    $table->remove($value);
                    $data['rows'][] = array($table->pkey => $value);
                    $total++;
                }
            }else{
                $items = (int) $items;
                if (empty($items)){
                    throw new Exception('Empty parameter');
                }
                $table->remove($items);
                $data['rows'][] = array($table->pkey => $items);
                $data['total'] = $total = 1;
            }

            $data['success'] = true;
            $data['message'] = $total.' Data deleted successfully';
            logging('delete data icon');
            $table->db->trans_commit(); //Commit Trans

        }catch (Exception $e) {
            $table->db->trans_rollback(); //Rollback Trans
            $data['message'] = $e->getMessage();
            $data['rows'] = array();
            $data['total'] = 0;
        }
        return $data;
    }


    function readFile(){
        $t_reconciliation_file_id = getVarClean('t_reconciliation_file_id', 'int', 0);

         $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        try{

            $ci = & get_instance();
            $ci->load->model('transaksi/t_reconciliation_file');
            $table = $ci->t_reconciliation_file;
            $table->setCriteria("t_reconciliation_file_id = ".$t_reconciliation_file_id);

            $dataTable = $table->getAll();
            $dataTable = $dataTable[0];

            

            $file = file_get_contents('./'.$dataTable['file_dir'].''.$dataTable['file_name'], true);

            $line = explode("\n",$file);

            //$data['message'] = count($line);
            //print_r($data);exit;
            
            $this->deleteDetailAll($t_reconciliation_file_id);

            $total_amount = 0;

            for ($i=0; $i <count($line) ; $i++) { 
                $isi = explode(",",$line[$i]);
                $items = array();

                $items['t_reconciliation_file_id'] = $t_reconciliation_file_id;
                $items['transaction_date'] = date("Y-m-d h:i:s", strtotime($isi[0]));
                $items['tax_code'] = $isi[1];
                $items['payment_key'] = $isi[2];
                $items['payment_ref_no'] = $isi[3];
                $items['payment_amount'] = $isi[4];

                $total_amount += $isi[4];


                $pesan = $this->createDetil($items); 

                if (!$pesan['success']){
                    $data['message'] = $pesan['message'];
                    $data['success'] = false;
                    return $data;
                }
            }
            $items = array();

            $items['total_trans_record'] = count($line);
            $items['total_amount'] =$total_amount;
            $items['t_reconciliation_file_id'] = $t_reconciliation_file_id;

            $pesanUpdate = $this->update($items);

            $data['message'] = "Read File successfully";
            $data['success'] = true;
            
            return $data;
        }catch (Exception $e) {
            $table->db->trans_rollback(); //Rollback Trans
            $data['message'] = $e->getMessage();
            $data['rows'] = array();
            $data['total'] = 0;
            $data['success'] = false;
        }

        // json_encode($data);
        // exit;
        return $data;
    }

    function createDetil($items) {
        // print_r($items);exit;
        $ci = & get_instance();
        $ci->load->model('transaksi/t_reconciliation_file_detail');
        $table = $ci->t_reconciliation_file_detail;

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        if (!is_array($items)){
            $data['message'] = 'Invalid items parameter';
            return $data;
        }

        $table->actionType = 'CREATE';
        $errors = array();

        if (isset($items[0])){
            $numItems = count($items);
            for($i=0; $i < $numItems; $i++){
                try{

                    $table->db->trans_begin(); //Begin Trans

                        $table->setRecord($items[$i]);
                        $table->create();

                    $table->db->trans_commit(); //Commit Trans

                }catch(Exception $e){

                    $table->db->trans_rollback(); //Rollback Trans
                    $errors[] = $e->getMessage();
                }
            }

            $numErrors = count($errors);
            if ($numErrors > 0){
                $data['message'] = $numErrors." from ".$numItems." record(s) failed to be saved.<br/><br/><b>System Response:</b><br/>- ".implode("<br/>- ", $errors)."";
            }else{
                $data['success'] = true;
                $data['message'] = 'Data added successfully';
            }
            $data['rows'] =$items;
        }else {

            try{
                $table->db->trans_begin(); //Begin Trans

                    $table->setRecord($items);
                    $table->create();

                $table->db->trans_commit(); //Commit Trans

                $data['success'] = true;
                $data['message'] = 'Data added successfully';

            }catch (Exception $e) {
                $table->db->trans_rollback(); //Rollback Trans

                $data['message'] = $e->getMessage();
                $data['rows'] = $items;
            }

        }
        return $data;

    }

    function deleteDetailAll($t_reconciliation_file_id){

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_reconciliation_file_detail');
            $table = $ci->t_reconciliation_file_detail;
            $result = $table->delDetailAll($t_reconciliation_file_id) ;
            //$count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }
    

}

/* End of file Groups_controller.php */