<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class vats_controller
* @version 07/05/2015 12:18:00
*/
class T_debt_letter_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_customer_order_id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $t_customer_order_id = getVarClean('t_customer_order_id','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_debt_letter');
            $table = $ci->t_debt_letter;

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => isset($_REQUEST['_search']) ? $_REQUEST['_search'] : null,
                "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
            );

            // Filter Table
            $req_param['where'] = array();
            $req_param['where'][] = 't_customer_order_id = '.$t_customer_order_id;
              

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

            $data['row'] = $table->getAll(0, -1, 't_customer_order_id', 'asc');
            $data['success'] = true;
            logging('view data vat');
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function readro(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

        $t_customer_order_id= getVarClean('t_customer_order_id','int',0);
        

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_debt_letter');
            $table = $ci->t_debt_letter;

            $result = $table->getData($t_customer_order_id);
            $count = count($result);

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;

    }

    function excel(){
        $t_customer_order_id= getVarClean('t_customer_order_id','int',0);
        $p_vat_type_id= getVarClean('p_vat_type_id','int',0);
        try{
            $ci = &get_instance();
            $ci->load->model('transaksi/t_debt_letter');
            $table = $ci->t_debt_letter;
            // print_r($result);
            // exit();

            $vat_code = $table->getVatCode($p_vat_type_id);
            
            $judul = $table->getJudul($t_customer_order_id, $p_vat_type_id);

            startExcel("LAPORAN_".$judul['judul'].".xls");
            echo '<html>';
            echo '<head><title>LAPORAN INDEX KEPATUHAN WP</title></head>';
            echo '<body>';
                echo "<div><h3> DAFTAR SURAT TEGURAN PAJAK ".$vat_code." </h3></div>";  
            echo "<div><b>Tanggal cetak : ".date('d-M-Y')."</b></div><br/>";    
            

            echo "<table border='1'>";
            echo "<tr>
                <th>NO</th>
                <th>NPWPD</th>  
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>JATUH TEMPO</th>
                <th>MASA PAJAK</th>
                <th>BESARNYA</th>
                <th>KETERANGAN</th>
            </tr>";

            $result = $table->getExcel($t_customer_order_id, $p_vat_type_id);
            for ($i=0; $i < count($result) ; $i++) { 
                if ($result[$i]['company_name']=='-' || empty($result[$i]['company_name'])){
                    $result[$i]['company_name']=$result[$i]['wp_name'];
                }
                if ($result[$i]['address_name']=='-' || empty($result[$i]['address_name'])){
                    $result[$i]['address_name']=$result[$i]['wp_address_name'].' '.$result[$i]['wp_address_no'];
                }
                echo "<tr>
                    <td>".($i+1)."</td>
                    <td>".$result[$i]['npwd']."</td>
                    <td>".$result[$i]['company_name']."</td>
                    <td>".$result[$i]['address_name']."</td>
                    <td>".$result[$i]['due_date']."</td>
                    <td>".$result[$i]['start_date']." s.d. ".$result[$i]['end_date']."</td>
                    <td align='right'>".number_format($result[$i]['debt_amount'], 2, ',', '.')."</td>
                    <td>".$result[$i]['description']."</td>
                </tr>";
            }
            echo "</table>";
            echo '</body>';
            echo '</html>';
            exit;
        }catch (Exception $e){
            echo $e->getMessage();
            exit;
        }
    }



    
}

/* End of file vats_controller.php */