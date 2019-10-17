<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reset_pass_wp_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','a.t_customer_user_id');
        $sord = getVarClean('sord','str','asc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('data_master/reset_pass_wp');
            $table = $ci->reset_pass_wp;

            $req_param = array(
                "sort_by" =>$sidx, // tidak di sort by
                "sord" => $sord,// tidak di sord
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

            $table->setCriteria("b.p_user_status_id =1");
            $table->setCriteria("is_employee = 'N'");

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
            logging('view data customer');
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function reset_pass() {

        $p_app_user_id = getVarClean('p_app_user_id', 'int', 0);

        //exit;

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'records' => 0, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('data_master/reset_pass_wp');
            $table = $ci->reset_pass_wp;

            $message = $table->reset_pass($p_app_user_id);

            //print_r($message['hasil']);exit;

            $data['message'] = $message;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;

    }

    function excel() {

        try{

            $ci = &get_instance();
            $ci->load->model('data_master/reset_pass_wp');
            $table = $ci->reset_pass_wp;

            $results =  $table->get_pass();
            //print_r($results); exit();

            startExcel("view_username_pass.xls");

            $output = '';
            $output .='<table  border="1">';

            $output.='<tr>';
                $output.='<th style="text-align">NO</th>';
                $output.='<th>NPWPD</th>';
                $output.='<th>NAMA WP</th>';
                $output.='<th>USERNAME</th>';
                $output.='<th>PASSWORD</th>';
                $output.='<th>NAMA PEMILIK</th>';
                $output.='<th>EMAIL</th>';
                $output.='<th>MEREK DAGANG</th>';
                $output.='<th>JENIS PAJAK</th>';
            $output.='</tr>';

            $no = 1;

            foreach ($results as $result) {
                $output .= '<tr>';
                    $output .= '<td valign="top">'.$no++.'</td>';
                    $output .= '<td valign="top">'.$result['npwpd'].'</td>';
                    $output .= '<td valign="top">'.$result['nama_wp'].'</td>';
                    $output .= '<td valign="top">'.$result['username'].'</td>';
                    $output .= '<td valign="top">'.$result['password'].'</td>';
                    $output .= '<td valign="top">'.$result['nama_pemilik'].'</td>';
                    $output .= '<td valign="top">'.$result['email'].'</td>';
                    $output .= '<td valign="top">'.$result['merek_dagang'].'</td>';
                    $output .= '<td valign="top">'.$result['jenis_pajak'].'</td>';
                $output .='</tr>';
            }

            /*for ($i=0; $i <count($result) ; $i++) {
                $output .= '<tr>';

                $output .= '<td>'.$result[$i]['no'].'</td>';
                $output .= '<td>'.$result[$i]['npwpd'].'</td>';
                $output .= '<td>'.$result[$i]['nama_wp'].'</td>';
                $output .= '<td>'.$result[$i]['username'].'</td>';
                $output .= '<td>'.$result[$i]['password'].'</td>';
                $output .= '<td>'.$result[$i]['nama_pemilik'].'</td>';
                $output .= '<td>'.$result[$i]['email'].'</td>';
                $output .= '<td>'.$result[$i]['merek_dagang'].'</td>';
                $output .= '<td>'.$result[$i]['jenis_pajak'].'</td>';



                $output.='</tr>';
                # code...
            }
            */
            $output.='</table>';

            //print_r($item['avg_tap']); exit();

            echo $output;
                exit;
        } catch(Exception $e){
            echo $e->getMessage();
                exit;
        }


    }
}



