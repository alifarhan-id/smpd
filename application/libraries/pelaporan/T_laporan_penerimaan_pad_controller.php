 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_laporan_penerimaan_pad_controller.php
* @version 07/05/2015 12:18:00
*/
class T_laporan_penerimaan_pad_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('p_vat_type_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');

        $p_year_period_id = getVarClean('p_year_period_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_penerimaan_pad');
            $table = $ci->t_laporan_penerimaan_pad;
             
            $result = $table->getData($p_year_period_id);

            $count = count($result);
            for ($i=0; $i <$count ; $i++) { 
                $first_char = substr($result[$i]['rc_pad'], 0,1);
                if ($first_char == '#') {
                    $result[$i]['rc_pad_formated'] = substr($result[$i]['rc_pad'], 1);
                } else {
                    $result[$i]['rc_pad_formated'] = $result[$i]['rc_pad'];
                }
            }
            



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

    function excel() {
    
        $p_year_period_id = getVarClean('p_year_period_id','int',0);
        $year_code = getVarClean('year_code','str','');
            
        try{
            
            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_penerimaan_pad');
            $table = $ci->t_laporan_penerimaan_pad;

            $result =  $table->getData($p_year_period_id);
            //print_r($result); exit();

            startExcel("laporan_penerimaan_pad.xls");
        
            $output = '';
            
            $output .= '<h2 style="text-align: center;">DAFTAR PENERIMAAN PAD BERDASARKAN JENIS PENERIMAAN</h2>';
            $output .= '<h2 style="text-align: center;">TAHUN '.$year_code.'</h2> <br/>';

            $output .='<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px">
                        <tr class="Caption">';


            $output.='<th rowspan = 2>NO</th>';
            $output.='<th rowspan = 2>JENIS PENERIMAAN</th>';
            $output.='<th rowspan = 2>TARGET</th>';
            //$output.='<th>NO KOHIR</th>';

            $output.='<th colspan = 12 align=center>BULAN</th>';
            $output.='<th rowspan = 2>JUMLAH</th>';
            $output.='<th rowspan = 2>PERSENTASE</th>';
            $output.='</tr>';
                $output.='<tr class="Caption">';
                    $output.='<th align="center">JANUARI</th>';
                    $output.='<th align="center">FEBRUARI</th>';
                    $output.='<th align="center">MARET</th>';
                    $output.='<th align="center">APRIL</th>';
                    $output.='<th align="center">MEI</th>';
                    $output.='<th align="center">JUNI</th>';
                    $output.='<th align="center">JULI</th>';
                    $output.='<th align="center">AGUSTUS</th>';
                    $output.='<th align="center">SEPTEMBER</th>';
                    $output.='<th align="center">OKTOBER</th>';
                    $output.='<th align="center">NOVEMBER</th>';
                    $output.='<th align="center">DESEMBER</th>';
                $output.='</tr>';
            $output.='</tr>';

            
            for ($i=0; $i <count($result) ; $i++) { 
                $output .= '<tr>';
                $first_char = substr($result[$i]['rc_pad'], 0,1);
                $output .= '<td>'.($i+1).'</td>';
                if ($first_char == '#') {
                    $output .= '<td><b>'.substr($result[$i]['rc_pad'],1).'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['target'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['januari'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['februari'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['maret'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['april'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['mei'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['juni'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['juli'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['agustus'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['september'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['oktober'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['november'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['desember'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['total'], 2, ',', '.').'</b></td>';
                    $output .= '<td><b>'.number_format($result[$i]['persentasi'], 2, ',', '.').'</b></td>';
                }else{
                    $output .= '<td>'.$result[$i]['rc_pad'].'</td>';
                    $output .= '<td>'.number_format($result[$i]['target'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['januari'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['februari'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['maret'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['april'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['mei'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['juni'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['juli'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['agustus'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['september'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['oktober'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['november'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['desember'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['total'], 2, ',', '.').'</td>';
                    $output .= '<td>'.number_format($result[$i]['persentasi'], 2, ',', '.').'</td>';
                }
                
                
                $output.='</tr>';
                # code...
            }
            
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

/* End of file T_laporan_penerimaan_pad_controller.php.php */
