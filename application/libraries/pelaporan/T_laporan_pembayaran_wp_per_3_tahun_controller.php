 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library 
* @class t_laporan_pembayaran_wp_per_3_tahun_controller.php
* @version 07/05/2015 12:18:00
*/
class T_laporan_pembayaran_wp_per_3_tahun_controller {
 
    function read() {
 
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        //$limit = 5;
        $sidx = getVarClean('p_year_period_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');

        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);
        $p_year_period_id = getVarClean('p_year_period_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        $payment_amount = array();

        if(($sidx = '' || $sidx == 0) && $p_year_period_id == '' && $p_year_period_id == '' && ($p_vat_type_id == '' || $p_vat_type_id == 0)){
            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_pembayaran_wp_per_3_tahun');
            $table = $ci->t_laporan_pembayaran_wp_per_3_tahun;
        }else{
            try {

                $ci = & get_instance();
                $ci->load->model('pelaporan/t_laporan_pembayaran_wp_per_3_tahun');
                $table = $ci->t_laporan_pembayaran_wp_per_3_tahun;
                 
                $result = $table->getData($p_year_period_id, $p_vat_type_id);

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

                $new_data = array();
                $counter = 0;
                $taunmin= 2;
                $temp_counter = $counter;
                $sel_counter = $counter;

                for ($i=0; $i < count($result) ; $i++) { 
                    $result_jml = $table->getPajak($p_year_period_id, $result[$i]['t_cust_account_id']);
               
                    $temp_year_code = '';
                    $sel_counter = $counter;
                    $temp_counter = $sel_counter;
                    $taunmin= 2;
                    $x=0;
                    for($j=0;$j<count($result_jml);$j++){
                        if ($j%12==0){
                           $temp_counter = $sel_counter; 
                           $taun = 'taun_'.$taunmin;
                           $taunmin--;
                           $x=0;
                        }

                        $new_data [$temp_counter]['no_baru']=($i+1).'-'.($x+1);
                        $new_data [$temp_counter]['npwd']=$result[$i]['npwd'];
                        $new_data [$temp_counter]['company_brand']=$result[$i]['company_brand'];
                        $new_data [$temp_counter]['alamat']=$result[$i]['alamat'];
                        $new_data [$temp_counter]['active_date']=$result[$i]['active_date'];
                        $new_data [$temp_counter]['bulan'] = substr($result_jml[$x]['code'],0,-5);

                        $new_data [$temp_counter][$taun] = $result_jml[$j]['pajak'];
                        
                        if ($taun=='taun_2'){
                            $counter++;
                        }
                        
                        $temp_counter++;
                        $x++;
                    }     
                }

                
                //$table->setJQGridParam($req_param);
                $count = count($result);
                //count($result)

                if ($count > 0) $total_pages = ceil($count / $limit);
                else $total_pages = 1;

                if ($page > $total_pages) $page = $total_pages;
                $start = $limit * $page - 1; // do not put $limit*($page - 1)

                $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
                );
                $table->setJQGridParam($req_param);
               
                if ($page == 0) $data['page'] = 1;
                else $data['page'] = $page;

                $data['total'] = $total_pages;
                $data['records'] = $count;

                $data['rows'] = $new_data;
                $data['success'] = true;

            }catch (Exception $e) {
                $data['message'] = $e->getMessage();
            }

            return $data;
        }

        
    }

    function tampil(){
        $date_start_laporan = getVarClean('date_start_laporan', 'str', '');
        $date_end_laporan   = getVarClean('date_end_laporan', 'str', '');
        $p_vat_type_id = getVarClean('p_vat_type_id', 'str', '');
        $vat_code   = getVarClean('vat_code', 'str', '');
        $year_code   = getVarClean('year_code', 'str', '');
        $p_year_period_id   = getVarClean('p_year_period_id', 'str', '');
        $param   = getVarClean('view', 'str', '');

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_pembayaran_wp_per_3_tahun');
            $table = $ci->t_laporan_pembayaran_wp_per_3_tahun;

            $result = $table->getData($p_year_period_id, $p_vat_type_id);

            if($param == 'excel'){
                startExcel(date("dmy") . '_laporan_pembayaran_wp_per_3_tahun.xls');
            }

            $output = '';
            $output.='<html>';
            $output.='<head><title>LAPORAN PEMBAYARAN BERDASARKAN CARA BAYAR</title></head>';
            $output.='<body>';
            $output.='<table id="table-piutang" class="grid-table-container" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top">';
            $output.='<table class="grid-table" border="0" cellspacing="0" cellpadding="0" width="900">
                    <tr>
                        <td class="th" colspan = 9 ><strong>LAPORAN PEMBAYARAN WP PER 3 TAHUN</strong></td> 
                    </tr>
                    </table>';
            $output.='<h2>JENIS PAJAK : '.$vat_code.' </h2>';
            $output.='<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px" width="100%">
                <tr >';
            
            $tahun2 = (int) $year_code - 2;
            $tahun1 = (int) $year_code - 1;

            $output.='<th align="center" >NO</th>';
            $output.='<th align="center" >NPWPD</th>';
            $output.='<th align="center" >NAMA MERK DAGANG</th>';
            $output.='<th align="center" >ALAMAT MERK DAGANG</th>';
            $output.='<th align="center" >TGL PENGUKUHAN</th>';
            $output.='<th align="center" >MASA PAJAK</th>';
            $output.='<th align="center" >'.$tahun2.'</th>';
            $output.='<th align="center" >'.$tahun1.'</th>';
            $output.='<th align="center" >'.$year_code.'</th>';
            $output.='</tr>';

            $new_data = array();
            $counter = 0;
            $taunmin= 2;
            $temp_counter = $counter;
            $sel_counter = $counter;

            for ($i=0; $i < count($result) ; $i++) { 
                //untuk tahun sekarang
                $result_jml = $table->getPajak($p_year_period_id, $result[$i]['t_cust_account_id']);
               
               $temp_year_code = '';
               $sel_counter = $counter;
               $temp_counter = $sel_counter;
               $taunmin= 2;
               $x=0;
                for($j=0;$j<count($result_jml);$j++){
                    if ($j%12==0){
                       $temp_counter = $sel_counter; 
                       $taun = 'taun_'.$taunmin;
                       $taunmin--;
                       $x=0;
                    }

                    $new_data [$temp_counter]['no']=($i+1).'-'.($x+1);
                    $new_data [$temp_counter]['npwd']=$result[$i]['npwd'];
                    $new_data [$temp_counter]['company_brand']=$result[$i]['company_brand'];
                    $new_data [$temp_counter]['alamat']=$result[$i]['alamat'];
                    $new_data [$temp_counter]['active_date']=$result[$i]['active_date'];
                    $new_data [$temp_counter]['bulan'] = substr($result_jml[$x]['code'],0,-5);

                    $new_data [$temp_counter][$taun] = $result_jml[$j]['pajak'];
                    
                    if ($taun=='taun_2'){
                        $counter++;
                    }
                    
                    $temp_counter++;
                    $x++;
                }  
            }
            for ($k=0; $k < count($new_data); $k++) { 
                //$output .=  '<tr><td>'.($i+1).'-'.($k+1).'&nbsp</td>';
                $output .=  '<tr><td>'.$new_data [$k]['no'].'&nbsp</td>';
                $output .=  '<td>'.$new_data [$k]['npwd'].'</td>';
                $output .=  '<td>'.$new_data [$k]['company_brand'].'</td>';
                $output .=  '<td>'.$new_data [$k]['alamat'].'</td>';
                $output .=  '<td>'.$new_data [$k]['active_date'].'</td>';   
                $output .=  '<td>'.$new_data [$k]['bulan'].'</td>';   
                $output .=  '<td align="right">'.number_format($new_data [$k]['taun_2'], 2, ',', '.').'</td>';  
                $output .=  '<td align="right">'.number_format($new_data [$k]['taun_1'], 2, ',', '.').'</td>';  
                $output .=  '<td align="right">'.number_format($new_data [$k]['taun_0'], 2, ',', '.').'</td></tr>';
            }

            //print_r(count($new_data));exit;   

            $output.='</table>';

            $output.='</body>';
            $output.='</html>';

            //echo $output(implode($html,''));
            if($param == 'excel'){
                echo $output;
                exit;
            }
            return $output;

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }


    }
        
}


/* End of file t_laporan_pembayaran_wp_per_3_tahun_controller.php.php */