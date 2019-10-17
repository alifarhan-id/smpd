<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class p_budget_type_controller
* @version 07/05/2015 12:18:00
*/
class P_budget_type_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','p_budget_type_id');
        $sord = getVarClean('sord','str','desc');
        $s_keyword = getVarClean('s_keyword','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('parameter/p_budget_type');
            $table = $ci->p_budget_type;

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

            $table->setCriteria("(upper(code) ILIKE '%".$s_keyword."%' OR upper(description) ILIKE '%".$s_keyword."%')");

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
            logging('view data status akun');
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function insert(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

        $code                     = getVarClean('code','str','');
        $listing_no               = getVarClean('listing_no','int',0);
        $description              = getVarClean('description','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('parameter/p_budget_type');
            $table = $ci->p_budget_type;
            $p_budget_type_id = $table->generate_id('p_budget_type', 'p_budget_type_id');

            $param =  array('p_budget_type_id'=>$p_budget_type_id,
                            'code'=>$code,
                            'listing_no'=>$listing_no,
                            'description'=>$description);
            //print_r($param);exit;
            $result = $table->insert($param) ;

            //print_r($result);exit;
            $count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }

    function update(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

        $p_budget_type_id       = getVarClean('p_budget_type_id','int',0);
        $code                   = getVarClean('code','str','');
        $listing_no             = getVarClean('listing_no','int',0);
        $description            = getVarClean('description','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('parameter/p_budget_type');
            $table = $ci->p_budget_type;

            $param =  array('p_budget_type_id' =>$p_budget_type_id,
                            'code'=>$code,
                            'listing_no'=>$listing_no,
                            'description'=>$description);


            $result = $table->update($param) ;
            $count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }

    function delete(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

        $id= getVarClean('id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('parameter/p_budget_type');
            $table = $ci->p_budget_type;
            $result = $table->delete($id) ;
            $count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }
}

/* End of file p_budget_type_controller.php */