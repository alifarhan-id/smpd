 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_pembayaran_wp_baru_controller.php
* @version 07/05/2015 12:18:00
*/
class T_laporan_pembayaran_wp_baru_controller {
 
    function read() {
 
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('p_year_period_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');

        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);
        $status_pembayaran = getVarClean('status_pembayaran','int',0);
        $p_year_period_id = getVarClean('p_year_period_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        $payment_amount = array();

        if(($sidx = '' || $sidx == 0) && $p_year_period_id == '' && $p_year_period_id == '' && ($status_pembayaran == '' || $status_pembayaran == 0) && ($p_vat_type_id == '' || $p_vat_type_id == 0)){
            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_pembayaran_wp_baru');
            $table = $ci->t_laporan_pembayaran_wp_baru;
        }else{
            try {

                $ci = & get_instance();
                $ci->load->model('pelaporan/t_laporan_pembayaran_wp_baru');
                $table = $ci->t_laporan_pembayaran_wp_baru;
                 
                $result = $table->getData($status_pembayaran, $p_year_period_id, $p_vat_type_id);

                //$result[$i]['total']
                
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

    function excel(){
        $date_start_laporan = getVarClean('date_start_laporan', 'str', '');
        $date_end_laporan   = getVarClean('date_end_laporan', 'str', '');
        $p_vat_type_id = getVarClean('p_vat_type_id', 'str', '');
        $status_pembayaran   = getVarClean('status_pembayaran', 'str', '');
        $p_year_period_id   = getVarClean('p_year_period_id', 'str', '');

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_pembayaran_wp_baru');
            $table = $ci->t_laporan_pembayaran_wp_baru;

            $result = $table->getData($status_pembayaran, $p_year_period_id, $p_vat_type_id, $date_start_laporan, $date_end_laporan);

            //startExcel(date("dmy") . '_laporan_pembayaran_berdasarkan_cara_bayar.xls');
            startExcel('laporan_pembayaran.xls');
            echo '<html>';
            echo '<head><title>LAPORAN PEMBAYARAN BERDASARKAN CARA BAYAR</title></head>';
            echo '<body>';
            echo '<h2>LAPORAN PEMBAYARAN BERDASARKAN CARA BAYAR<h2/>';
            echo '<h2>PERIODE PENETAPAN : '.$date_start_laporan.' s.d. '.$date_end_laporan.'</h2>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th align="center">NO</th>';
            echo '<th align="center">JENIS PAJAK</th>';
            echo '<th align="center">AYAT PAJAK</th>';
            echo '<th align="center">NAMA</th>';
            echo '<th align="center">NPWPD</th>';
            echo '<th align="center">MASA PAJAK</th>';
            echo '<th align="center">TGL TAP</th>';
            echo '<th align="center">TOTAL HARUS DIBAYAR</th>';
            echo '<th align="center">STATUS BAYAR</th>';            
            echo '<th align="center">CARA BAYAR</th>';           
            echo '<th align="center">TANGGAL BAYAR</th>';           
            echo '<th align="center">BESARNYA</th>';           
            echo '<th align="center">SISA</th>';
            echo '</tr>';
            
            $no = 0;
            $jumlahtemp = 0;    
            $total=0;

            $jumlah =0;
            $jumlah_realisasi =0;
            $jumlah_sisa =0;

            for ($i = 0; $i < count($result); $i++) {
                $temp = $result[$i]['total_vat_amount']+$result[$i]['total_penalty_amount'];
                $temp_sisa = $temp - $result[$i]['payment_amount'];
                $jumlah = $jumlah + $temp;
                $jumlah_realisasi = $jumlah_realisasi + $result[$i]['payment_amount'];
                $jumlah_sisa = $jumlah_sisa + $temp_sisa;

                echo '<tr><td align="center" >'.($i+1).'</td>';
                echo '<td align="left" >'.$result[$i]['jenis_pajak'].'</td>';
                echo '<td align="left" >'.$result[$i]['ayat_pajak'].'</td>';
                echo '<td align="left" >'.$result[$i]['wp_name'].'</td>';
                echo '<td align="left" >'.$result[$i]['npwpd'].'</td>';
                echo '<td align="left" >'.$result[$i]['masa_pajak'].'</td>';
                echo '<td align="left" >'.$result[$i]['tgl_tap'].'</td>';
                echo '<td align="right" >'.number_format($temp, 2, ',', '.').'</td>';
                
                if ($result[$i]['payment_date']=='') {
                    echo '<td align="left" >Belum Bayar</td>';
                }else{
                    echo '<td align="left" >Sudah Bayar</td>';
                }
                echo '<td align="left" >'.$result[$i]['p_payment_type_code'].'</td>';
                echo '<td align="left" >'.$result[$i]['payment_date'].'</td>';
                echo '<td align="right" >'.number_format($result[$i]['payment_amount'], 2, ',', '.').'</td>';
                echo '<td align="right" >'.number_format($temp-$result[$i]['payment_amount'], 2, ',', '.').'</td>';
                echo '</tr>';
            }


            echo '<tr><td align="center" colspan=7 >Jumlah</td>';
            echo '<td align="right">'.number_format($jumlah, 2, ',', '.').'</td>';
            echo '<td align="center" colspan=3 ></td>';
            echo '<td align="right">'.number_format($jumlah_realisasi, 2, ',', '.').'</td>';
            echo '<td align="right">'.number_format($jumlah_sisa, 2, ',', '.').'</td>';
            echo '</tr>';

            echo '</table></br></br>';

            echo '<table width="100%">';
            echo '<tr>
                        <td align="center" width="50%"></td>
                     </tr>
                     <tr>
                        <td align="center" width="50%"></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%">Mengetahui,</td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%"></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%">KEPALA BIDANG</td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%">KEPALA VERIFIKASI, OTORISASI DAN PEMBUKUAN</td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%">PAJAK PENDAFTARAN</td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%">BIDANG PAJAK PENDAFTARAN</td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%"></td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%"></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%"></td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%"></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%"></td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%"></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%">Drs, H. GUN GUN SUMARYANA</td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%">Drs. H. DEDEN SAEPULLOH, MM</td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%">NIP. 19700806 199101 1001</td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%">NIP. 19681210 199010 1001</td>
                     </tr>
                     ';
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

/* End of file t_laporan_pembayaran_wp_baru_controller.php.php */