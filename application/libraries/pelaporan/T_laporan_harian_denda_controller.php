 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_harian_denda_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_harian_denda_controller {
 
    function excel(){
        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);
        $start_date = getVarClean('start_date','str','');
        $end_date  = getVarClean('end_date','str','');

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_harian_denda');
            $table = $ci->t_laporan_harian_denda;

            $result = $table->getData($p_vat_type_id, $start_date, $end_date);

            startExcel(date("dmy") . '_laporan_harian_penerimaan_denda.xls');
            echo '<html>';
            echo '<head><title>LAPORAN DENDA</title></head>';
            echo '<body>';
            echo "<h3>Laporan Penerimaan SPTPD<h3>";
            echo "<h3>Tanggal : ".$start_date." s/d ".$end_date."</h3>";
            echo '<table border="1">';
            echo '<tr>
                    <th rowspan="2"> NO</th>
                    <th rowspan="2"> NAMA </th>
                    <th rowspan="2"> ALAMAT </th>
                    <th rowspan="2"> NPWPD </th>
                    <th rowspan="2"> MASA PAJAK </th>
                    <th rowspan="2"> NO KOHIR </th>
                    <th rowspan="2"> BESARNYA (Rp) </th>
                    <th rowspan="2"> TGL MASUK </th>
                    <th rowspan="2"> JATUH TEMPO </th>
                    <th rowspan="2"> TGL BAYAR </th>
                    <th colspan="4"> SKPDKB </th>
                    <th colspan="4"> DENDA </th>
                    <th rowspan="2"> SELISIH </th>
                 </tr>';
            echo '<tr>
                    <th> BESARNYA (Rp) </th>
                    <th> NO KOHIR </th>
                    <th> TGL TAP </th>
                    <th> TGL BAYAR </th>

                    <th> BESARNYA (Rp) </th>
                    <th> NO KOHIR </th>
                    <th> TGL TAP </th>
                    <th> TGL BAYAR </th>
                </tr>';
            
            $jumlah = 0;
            $jumlah_selisih = 0;
            $total_skpdkb = 0;
            $total_sptpd = 0;
            $total_denda = 0;


            for ($i = 0; $i < count($result); $i++) {
                if($result[$i]['skpdkb_amount']==0){
                    $result[$i]['skpdkb_no_kohir'] = "";
                    $result[$i]['skpdkb_tgl_tap_formated'] = "";
                    $result[$i]['skpdkb_tgl_bayar_formated'] = "";
                }
                if($result[$i]['denda_amount']==0){
                    $result[$i]['denda_no_kohir'] = "";
                    $result[$i]['denda_tgl_tap_formated'] = "";
                    $result[$i]['denda_tgl_bayar_formated'] = "";
                }

                $jumlah = $result[$i]['skpdkb_amount']+$result[$i]['sptpd_amount']-$result[$i]['payment_amount'];
                $jumlah_selisih += $jumlah;
                $total_skpdkb+=$result[$i]['skpdkb_amount'];
                $total_sptpd+=$result[$i]['sptpd_amount'];
                $total_denda+=$result[$i]['denda_amount'];
                echo '<tr>';
                    echo    '<td>'.($i+1).'</td>';
                    echo    '<td>'.$result[$i]['nama'].'</td>';
                    echo   '<td>'.$result[$i]['alamat'].'</td>';
                    echo    '<td>'.$result[$i]['npwpd'].'</td>';
                    echo    '<td>'.$result[$i]['start_period_formated'].' s/d '.$result[$i]['end_period_formated'].'</td>';
                    echo   '<td>'.$result[$i]['no_kohir'].'</td>';
                    echo    '<td align="right">'.number_format($result[$i]['sptpd_amount'], 2, ",", ".").'</td>';
                    echo    '<td>'.$result[$i]['tgl_masuk_formated'].'</td>';
                    echo    '<td>'.$result[$i]['jatuh_tempo_formated'].'</td>';
                    echo    '<td>'.$result[$i]['tgl_bayar_formated'].'</td>';
                    echo    '<td align="right">'.number_format($result[$i]['skpdkb_amount'], 2, ",", ".").'</td>';
                    echo    '<td>'.$result[$i]['skpdkb_no_kohir'].'</td>';
                    echo   '<td>'.$result[$i]['skpdkb_tgl_tap_formated'].'</td>';
                    echo    '<td>'.$result[$i]['skpdkb_tgl_bayar_formated'].'</td>';
                    echo    '<td align="right">'.number_format($result[$i]['denda_amount'], 2, ",", ".").'</td>';
                    echo    '<td>'.$result[$i]['denda_no_kohir'].'</td>';
                    echo    '<td>'.$result[$i]['denda_tgl_tap_formated'].'</td>';
                    echo    '<td>'.$result[$i]['denda_tgl_bayar_formated'].'</td>';
                    echo    '<td align="right">'.number_format($jumlah, 2, ",", ".").'</td>';

                echo '</tr>';
            }


            echo '<tr>
                    <td colspan="6"> &nbsp; </td>
                    <td> <b>'.number_format($total_sptpd, 2, ",", ".").' </b></td>
                    <td colspan="3"> &nbsp; </td>
                    <td> <b>'.number_format($total_skpdkb, 2, ",", ".").' </b></td>
                    <td colspan="3"> &nbsp; </td>
                    <td> <b>'.number_format($total_denda, 2, ",", ".").' </b></td>
                    <td colspan="3"> &nbsp; </td>
                    <td> <b>'.number_format($jumlah_selisih, 2, ",", ".").' </b></td>

                </tr>';
    
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