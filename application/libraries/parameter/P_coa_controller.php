<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class region levels_controller
* @version 07/05/2015 12:18:00
*/
class P_coa_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','p_region_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        $parent_id = getVarClean('parent_id','int',0);
        $p_region_id = getVarClean('p_region_id','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('parameter/p_region');
            $table = $ci->p_region;

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


            if(!empty($p_region_id)) {
                $req_param['where'][] = 'parent_id = '.$p_region_id;
            }

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
            logging('view data region level');
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }   

    function readLov() {

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',5);
        $page = getVarClean('page','int',1);

        $sort = getVarClean('sort','str','coa_id');
        $dir  = getVarClean('dir','str','asc');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('parameter/p_coa');
            $table = $ci->p_coa;

            if(!empty($searchPhrase)) {
                $table->setCriteria("(upper(coa_code) like upper('%".$searchPhrase."%') OR upper(coa_name) like upper('%".$searchPhrase."%') OR upper(description) like upper('%".$searchPhrase."%'))");
            }

            $start = ($start-1) * $limit;
            $items = $table->getAll($start, $limit, $sort, $dir);
            $totalcount = $table->countAll();

            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['rows'] = $items;
            $data['success'] = true;
            $data['total'] = $totalcount;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    
}

/* End of file region levels_controller.php */