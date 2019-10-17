<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_cust_customer_controller
* @version 07/05/2015 12:18:00
*/
class T_pic_gis_controller {

    function read_data() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_cust_account_id');
        $sord = getVarClean('sord','str','desc');
        
        $s_keyword = getVarClean('s_keyword','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        

        try {

            $ci = & get_instance();
            $ci->load->model('data_master/t_pic_gis');
            $table = $ci->t_pic_gis;

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

            $table->setCriteria("(upper(a.company_name) ILIKE '%".$s_keyword."%' OR upper(a.npwd) ILIKE '%".$s_keyword."%')");

            
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
            //logging('view data vat');
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }
        return $data;
    }

    function readPicObject() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('t_cust_account_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');
        $t_cust_account_id = getVarClean('t_cust_account_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        if(($sidx = '' || $sidx == 0) && ($t_cust_account_id == '' || $t_cust_account_id == 0)){
            $ci = & get_instance();
            //$ci->load->model('data_master/t_pic_gis');
            //$table = $ci->t_pic_gis;
        }else{
            try {

                $ci = & get_instance();
                $ci->load->model('data_master/t_pic_gis');
                $table = $ci->t_pic_gis;
                 
                $result = $table->getDataPicObject($t_cust_account_id);

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

    function insert(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

        $t_cust_account_id      = getVarClean('t_cust_account_id','int',0);
        $longitude              = getVarClean('longitude','int',0);
        $latitude               = getVarClean('latitude','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('data_master/t_pic_gis');
            $table = $ci->t_pic_gis;

            $param =  array('t_cust_account_id' =>$t_cust_account_id,
                            'longitude'=>$longitude,
                            'latitude'=>$latitude);
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

        $t_cust_account_id      = getVarClean('t_cust_account_id','int',0);
        $longitude              = getVarClean('longitude','int',0);
        $latitude               = getVarClean('latitude','int',0);
        $pic_id                 = getVarClean('pic_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('data_master/t_pic_gis');
            $table = $ci->t_pic_gis;

            $param =  array('t_cust_account_id' =>$t_cust_account_id,
                            'longitude'=>$longitude,
                            'latitude'=>$latitude,
                            'pic_id'=>$pic_id);


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
            $ci->load->model('data_master/t_pic_gis');
            $table = $ci->t_pic_gis;
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

/* End of file t_pic_gis_controller.php */