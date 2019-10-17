<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Customer_controller
* @version 07/05/2015 12:18:00
*/
class R_sap_unbill_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','journal_no');
        $sord = getVarClean('sord','str','asc');
        $periode = getVarClean('periode','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('report/r_sap_unbill');
            //$table = $ci->r_bil_complete_area;
            $table = new R_sap_unbill($periode);

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
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null,
                "periode" => isset($_REQUEST['periode']) ? $_REQUEST['periode'] : null
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

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function excel()
    {
        $sidx = getVarClean('sidx', 'str', 'journal_no');
        $sord = getVarClean('sord', 'str', 'asc');
        $periode = getVarClean('periode','str','');

        try {

            $ci = &get_instance();
            $ci->load->model('report/r_sap_unbill');
            //$table = $ci->r_bil_complete_area;
            $table = new R_sap_unbill($periode);

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => getVarClean('_search'),
                "search_field" => getVarClean('searchField'),
                "search_operator" => getVarClean('searchOper'),
                "search_str" => getVarClean('searchString'),
                "periode" => getVarClean('periode')
            );

            // Filter Table
            $req_param['where'] = array();

            // if (!empty($periode)) {
            //     $req_param['where'][] = "periode = '" . $periode . "'";
            // }

            $table->setJQGridParam($req_param);
            $items = $table->getAll();

            startExcel(date("dmy") . '_SAP_UNBILL.xls');
            echo '<html>';
            echo '<head><title>SAP UNBILL</title></head>';
            echo '<body>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>No</th>';
            echo '<th>Journal No</th>';
            echo '<th>Line Item</th>';
            echo '<th>Co Code</th>';
            echo '<th>Doc Type</th>';
            echo '<th>Periode</th>';
            echo '<th>Curr</th>';
            echo '<th>Reference</th>';
            echo '<th>Doc Header</th>';
            echo '<th>Doc Date</th>';
            echo '<th>Post Date</th>';
            echo '<th>Pos Key</th>';
            echo '<th>Customer GL</th>';
            echo '<th>BA</th>';
            echo '<th>Cost Center</th>';
            echo '<th>Profit Center</th>';
            echo '<th>Activity Type</th>';
            echo '<th>Assignment</th>';
            echo '<th>Text</th>';
            echo '<th>Amount Doc</th>';
            echo '<th>Amount Local</th>';
            echo '<th>Cust GL Type</th>';
            echo '<th>D_C</th>';
            echo '<th>Trade Partner</th>';
            echo '</tr>';
            $i = 1;
            foreach ($items as $item) {
                echo '<tr>';
                echo '<td>' . $i++ . '</td>';
                echo '<td>' . $item['journal_no'] . '&nbsp;</td>';
                echo '<td>' . $item['line_item'] . '</td>';
                echo '<td>' . $item['co_code'] . '&nbsp;</td>';
                echo '<td>' . $item['doc_type'] . '</td>';
                echo '<td>' . $item['period'] . '&nbsp;</td>';
                echo '<td>' . $item['curr'] . '</td>';
                echo '<td>' . $item['reference'] . '</td>';
                echo '<td>' . $item['doc_header'] . '</td>';
                echo '<td>' . $item['doc_date'] . '</td>';
                echo '<td>' . $item['post_date'] . '</td>';
                echo '<td>' . $item['pos_key'] . '</td>';
                echo '<td>' . $item['customer_gl'] . '&nbsp;</td>';
                echo '<td>' . $item['ba'] . '&nbsp;</td>';
                echo '<td>' . $item['cost_center'] . '&nbsp;</td>';
                echo '<td>' . $item['profit_center'] . '&nbsp;</td>';
                echo '<td>' . $item['activity_type'] . '&nbsp;</td>';
                echo '<td>' . $item['assignment'] . '</td>';
                echo '<td>' . $item['text'] . '</td>';
                echo '<td>' . $item['amount_doc'] . '</td>';
                echo '<td>' . $item['amount_local'] . '</td>';
                echo '<td>' . $item['cust_gl_type'] . '</td>';
                echo '<td>' . $item['d_c'] . '</td>';
                echo '<td>' . $item['trade_partner'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</body>';
            echo '</html>';
            exit;

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }


    }
}

/* End of file Groups_controller.php */