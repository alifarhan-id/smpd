 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_penerimaan_pajak_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_penerimaan_pajak_controller {
 
    function excel(){
        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);
        $start_date = getVarClean('start_date','str','');
        $end_date  = getVarClean('end_date','str','');
        $vat_code  = getVarClean('vat_code','str','');
        $jenis_tahun  = getVarClean('jenis_tahun','str','');
        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_penerimaan_pajak');
            $table = $ci->t_laporan_penerimaan_pajak;

            $result = $table->getData($p_vat_type_id, $start_date, $end_date,$jenis_tahun);

            startExcel(date("dmy") . '_laporan_penerimaan_pajak.xls');
            echo '<html>';
            echo '<head><title>LAPORAN DENDA</title></head>';
            echo '<body>';
            echo '<table>
                    <tr>';
            echo '<table id="table-piutang" class="grid-table-container" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td valign="top">
                            <table class="grid-table" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                        <td class="th" colspan=6 align="center"><strong>LAPORAN PENERIMAAN GLOBAL PER TANGGAL PENERIMAAN</strong></td> 
                    </tr>
                    <tr>
                        <td class="th"><strong></strong></td>
                        <td class="th"><strong>JENIS PAJAK</strong></td>
                        <td class="th"><strong>: '.$vat_code.'</strong></td> 
                    </tr>
                    <tr>
                        <td class="th"><strong></strong></td>
                        <td class="th"><strong>TANGGAL</strong></td> 
                        <td class="th"><strong>: '.$start_date.' s/d '.$end_date.'</strong></td> 
                    </tr>
                    <tr>
                    </tr>
            </table>

            <table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px">
                <tr class="Caption">';
                echo '<th>NO</th>';
                echo '<th>BULAN</th>';
                echo '<th>BESARNYA</th>';
                echo '<th>JUMLAH WP</th>';
                echo '<th>JUMLAH SSPD</th>';
                echo '<th>KETERANGAN</th>';
            echo '</tr>';
            
            $jumlah = 0;
            $jumlah_wp =0;

            for ($i = 0; $i < count($result); $i++) {
                echo '<tr>';
                    echo '<td style="font-weight:bold;" align="left">'.($i+1).'</td>';
                    echo '<td style="font-weight:bold;" align="left">'.strtoupper($result[$i]['bulan_wp']).'</td>';
                    echo '<td style="font-weight:bold;" align="right">'.number_format($result[$i]['total_amount'], 0, ',', '.').'</td>';
                    echo '<td style="font-weight:bold;" align="right">'.number_format($result[$i]['jumlah_wp'], 0, ',', '.').'</td>';
                    echo '<td style="font-weight:bold;" align="right"></td>';
                    echo '<td style="font-weight:bold;" align="right"></td>';
                echo '</tr>';
            }
                echo '<tr>';
                echo '<td style="font-weight:bold;" align="left"></td>';
                echo '<td style="font-weight:bold;" align="left">JUMLAH</td>';
                echo '<td style="font-weight:bold;" align="right">'.number_format($jumlah, 0, ',', '.').'</td>';
                echo '<td style="font-weight:bold;" align="right">'.number_format($jumlah_wp, 0, ',', '.').'</td>';
                echo '<td style="font-weight:bold;" align="right"></td>';
                echo '<td style="font-weight:bold;" align="right"></td>';
                echo '</tr>';
                echo '</table></table>';

                echo '<table>';
                echo '<tr></tr>';
                echo '<tr></tr>';
                echo '<tr>';
                echo '<td colspan=4 style="font-weight:bold;" align="right"></td>';
                echo '<td colspan=2 style="font-weight:bold;" align="center">KEPALA SEKSI VERIFIKASI OTORISASI DAN</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td colspan=4 style="font-weight:bold;" align="right"></td>';
                echo '<td colspan=2 style="font-weight:bold;" align="center">PEMBUKUAN</td>';
                echo '</tr>';
                echo '<tr></tr>';
                echo '<tr></tr>';
                echo '<tr></tr>';
                echo '<tr>';
                echo '<td colspan=4 style="font-weight:bold;" align="right"></td>';
                echo '<td colspan=2 style="font-weight:bold;" align="center">(Drs. H. Deden Saepulloh, MM.)</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td colspan=4 style="font-weight:bold;" align="right"></td>';
                echo '<td colspan=2 style="font-weight:bold;" align="center">(NIP 19681210 199010 001)</td>';
                echo '</tr>';
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