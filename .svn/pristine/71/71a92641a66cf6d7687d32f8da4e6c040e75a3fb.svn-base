 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_rep_lap_tingkat_kepatuhan_wp_controller
* @version 07/05/2015 12:18:00
*/
class T_rep_penerimaan_pertahun_controller {
 
    function excel(){

        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);
        $p_year_period_id = getVarClean('p_year_period_id','int',0);
        $tgl_status  = getVarClean('tgl_status','str', '');
        $p_account_status_id = getVarClean('p_account_status_id','int',0);
        $status_bayar  = getVarClean('status_bayar','int',0);

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_rep_penerimaan_pertahun');
            $table = $ci->t_rep_penerimaan_pertahun;

            $data = $table->getData($p_year_period_id, $p_vat_type_id, $tgl_status, $p_account_status_id, $status_bayar);
           
            

           startExcel(date("dmy") . 'laporan_penerimaan_pertahun_'.$data[0]["tahun"].'.xls');
            echo '<html>';
            echo '<head><title> LAPORAN PENERIMAAN PER TAHUN </title></head>';
            echo '<body>';
            echo "<div><h3> LAPORAN PENERIMAAN PER TAHUN </h3></div>";  
            echo "<div><h3>TAHUN : ".$data[0]["tahun"]."</h3></div>";   


            echo '<table border="1" width="100%"> ';
            echo '<tr>
                        <th rowspan="2">NO</th>
                        <th rowspan="2">Nama Perusahaan</th>
                        <th rowspan="2">Alamat</th>
                        <th rowspan="2">Tanggal Pengukuhan</th>
                        <th colspan="12">Realisasi dan Tanggal Bayar</th>
                        <th rowspan="2">Jumlah</th>
                  </tr>
                 ';

             

            echo '<tr>
                    <th> Desember <br/> '.($data[0]["tahun"] - 1).' </th>
                    <th> Januari </th>
                    <th> Februari </th>
                    <th> Maret </th>
                    <th> April </th>
                    <th> Mei </th>
                    <th> Juni </th>
                    <th> Juli </th>
                    <th> Agustus </th>
                    <th> September </th>
                    <th> Oktober </th>
                    <th> November </th>
                </tr>';

            $jumlah_kanan = array();
            $grand_total = 0;
            $total_per_bulan = array();
            $total_per_bulan[12] = 0;
            $total_per_bulan[1] = 0;
            $total_per_bulan[2] = 0;
            $total_per_bulan[3] = 0;
            $total_per_bulan[4] = 0;
            $total_per_bulan[5] = 0;
            $total_per_bulan[6] = 0;
            $total_per_bulan[7] = 0;
            $total_per_bulan[8] = 0;
            $total_per_bulan[9] = 0;
            $total_per_bulan[10] = 0;
            $total_per_bulan[11] = 0;

                 
            for ($i = 0; $i < count($data); $i++) {
                if(!empty($data[$i]['active_date'])){
                    $data[$i]['active_date'] = DateTime::createFromFormat('d-M-y H:i:s', $data[$i]['active_date']);
                    $data[$i]['active_date'] =   date_format($data[$i]['active_date'], 'd-M-Y');
                }else{
                    $data[$i]['active_date'] = '';
                }

                $data2 = array();
                $arrpaydate = array();

                for($j = 1; $j <= 12; $j++){
                    $sts = "f_" . str_pad($j, 2, '0', STR_PAD_LEFT) . "_sts";
                    $amt = "f_" . str_pad($j, 2, '0', STR_PAD_LEFT) . "_amt";
                    $paydate = "f_" . str_pad($j, 2, '0', STR_PAD_LEFT) . "_paydate";
                    //  print_r($data[$i][$sts]);
                    // exit();      
                    if(is_null($data[$i][$sts])){
                        $data2[$j] = number_format(round($data[$i][$amt]), 0, ',', '.');
                        $arrpaydate[$j] = $data[$i][$paydate];
                    } 
                    else{
                        $data2[$j] = $data[$i][$sts];
                    }
                    
                    //jumlah ke bawah per bulan
                    $total_per_bulan[$j] += round($data[$i][$amt]);
                     
                }
                
                $jumlah_kanan[$i] = 0;
                for($k = 1; $k <=12; $k++) {
                    $amt = "f_" . str_pad($k, 2, '0', STR_PAD_LEFT) . "_amt";
                    $jumlah_kanan[$i] += round($data[$i][$amt]);
                }
                
                $grand_total += $jumlah_kanan[$i]; //total bottom
                
                // //jumlah per bulan
                // print_r($data[$i]["active_date"]);
                // exit();

                echo '<tr>
                    <td align="center" valign="top">'.($i+1).'</td>
                    <td valign="top">'.$data[$i]["nama"].'</td>
                    <td valign="top">'.$data[$i]["alamat"].' <br/> '.$data[$i]["npwpd"].'</td>
                    <td valign="top">'.$data[$i]["active_date"].'</td>
                    <td align="right" valign="top">'.$data2[12].'<br/> '.$arrpaydate[12].'</td>
                    <td align="right" valign="top">'.$data2[1].'<br/> '.$arrpaydate[1].'</td>
                    <td align="right" valign="top">'.$data2[2].'<br/> '.$arrpaydate[2].'</td>
                    <td align="right" valign="top">'.$data2[3].'<br/> '.$arrpaydate[3].'</td>
                    <td align="right" valign="top">'.$data2[4].'<br/> '.$arrpaydate[4].'</td>
                    <td align="right" valign="top">'.$data2[5].'<br/> '.$arrpaydate[5].'</td>
                    <td align="right" valign="top">'.$data2[6].'<br/> '.$arrpaydate[6].'</td>
                    <td align="right" valign="top">'.$data2[7].'<br/> '.$arrpaydate[7].'</td>
                    <td align="right" valign="top">'.$data2[8].'<br/> '.$arrpaydate[8].'</td>
                    <td align="right" valign="top">'.$data2[9].'<br/> '.$arrpaydate[9].'</td>
                    <td align="right" valign="top">'.$data2[10].'<br/> '.$arrpaydate[10].'</td>
                    <td align="right" valign="top">'.$data2[11].'<br/> '.$arrpaydate[11].'</td>
                    <td align="right" valign="top">'.number_format($jumlah_kanan[$i], 0, ',', '.').'</td>
                </tr>';
                
            }

            echo '<tr>
                    <td colspan="4" align="center"> <b>TOTAL</b> </td>
                    <td><b>'.number_format($total_per_bulan[12], 0, ',', '.').'</b></td>
                    <td><b>'.number_format($total_per_bulan[1], 0, ',', '.').'</b></td>
                    <td><b>'.number_format($total_per_bulan[2], 0, ',', '.').'</b></td>
                    <td><b>'.number_format($total_per_bulan[3], 0, ',', '.').'</b></td>
                    <td><b>'.number_format($total_per_bulan[4], 0, ',', '.').'</b></td>
                    <td><b>'.number_format($total_per_bulan[5], 0, ',', '.').'</b></td>
                    <td><b>'.number_format($total_per_bulan[6], 0, ',', '.').'</b></td>
                    <td><b>'.number_format($total_per_bulan[7], 0, ',', '.').'</b></td>
                    <td><b>'.number_format($total_per_bulan[8], 0, ',', '.').'</b></td>
                    <td><b>'.number_format($total_per_bulan[9], 0, ',', '.').'</b></td>
                    <td><b>'.number_format($total_per_bulan[10], 0, ',', '.').'</b></td>
                    <td><b>'.number_format($total_per_bulan[11], 0, ',', '.').'</b></td>
                    <td><b>'.number_format($grand_total, 0, ',', '.').'</b></td>
                </tr>';
            echo '</table>';

            echo '<br>';
            echo '<i>Keterangan:</i>';
            echo '<table style="font-style:italic;">
            <tr>
                <td valign="top">UNREGISTER </td>
                <td valign="top" colspan="2">: Belum terdaftar pada saat posisi bulan yang tercantum</td>
            </tr>
            <tr>
                <td valign="top">INSIDENTIL </td>
                <td valign="top" colspan="2">: WP yang transaksinya insidentil (non reguler)</td>
            </tr>
            <tr>
                <td valign="top">NIHIL1  </td>
                <td valign="top" colspan="2">: WP melaporkan NIHIL dan sudah register(flag bayar) pada saat posisi tgl report</td>
            </tr>
            <tr>
                <td valign="top">NIHIL2  </td>
                <td valign="top" colspan="2">: WP melaporkan NIHIL tapi belum register(flag bayar) pada saat posisi tgl report</td>
            </tr>
            <tr>
                <td valign="top">SKPDKB</td>
                <td valign="top" colspan="2">: WP belum bayar sampai dengan posisi report dan ditetapkan secara jabatan</td>
            </tr>
            <tr>
                <td valign="top">NOREPORT</td>
                <td valign="top" colspan="2">: WP sudah aktif tetapi belum pernah melakukan transaksi sampai dengan posisi tgl report</td>
            </tr>
            <tr>
                <td valign="top">SPTPD</td>
                <td valign="top" colspan="2">: WP melaporkan berdasarkan omset yang mereka laporkan</td>
            </tr>
            </table>';



            echo '</body>';
            echo '</html>';

// print_r($data);
//             exit();
            exit;

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }


    }

    function readHTML(){
        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);
        $p_year_period_id = getVarClean('p_year_period_id','int',0);
        $tgl_status  = getVarClean('tgl_status','str', '');
        $p_account_status_id = getVarClean('p_account_status_id','int',0);
        $status_bayar  = getVarClean('status_bayar','int',0);

        try {
            $ci = &get_instance();
            $ci->load->model('pelaporan/t_rep_penerimaan_pertahun');
            $table = $ci->t_rep_penerimaan_pertahun;

            $data = $table->getData($p_year_period_id, $p_vat_type_id, $tgl_status, $p_account_status_id, $status_bayar);
            $output .='<table id="table-penerimaan-pertahun" class="grid-table-container" border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td valign="top">';

            $output .='<table class="grid-table" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="HeaderLeft"><img border="0" alt="" src="../Styles/sikp/Images/Spacer.gif"></td> 
                                <td class="th"><strong>LAPORAN PENERIMAAN PERTAHUN</strong></td> 
                                <td class="HeaderRight"><img border="0" alt="" src="../Styles/sikp/Images/Spacer.gif"></td>
                            </tr>
                            </table>';
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    function readData(){
        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);
        $p_year_period_id = getVarClean('p_year_period_id','int',0);
        $tgl_status  = getVarClean('tgl_status','str', '');
        $p_account_status_id = getVarClean('p_account_status_id','int',0);
        $status_bayar  = getVarClean('status_bayar','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {
            $ci = &get_instance();
            $ci->load->model('pelaporan/t_rep_penerimaan_pertahun');
            $table = $ci->t_rep_penerimaan_pertahun;

            $result = $table->getData($p_year_period_id, $p_vat_type_id, $tgl_status, $p_account_status_id, $status_bayar);

            $result_temp=array(); 

            for ($i=0; $i<count($result); $i++){
                $result_temp ['jenis_pajak'][$i] = $result [$i]['jenis_pajak'];
                $result_temp ['tahun'][$i] = $result [$i] ['tahun'];
                $result_temp ['nama'][$i] = $result [$i] ['nama'];
                $result_temp ['alamat'][$i] = $result [$i] ['alamat'];
                $result_temp ['npwpd'][$i] = $result [$i] ['npwpd'];
                $result_temp ['active_date'][$i] = $result [$i] ['active_date'];
                for ($j=12; $j > 0 ; $j--) { 
                    $sts = "f_" . str_pad($j, 2, '0', STR_PAD_LEFT) . "_sts";
                    $amt = "f_" . str_pad($j, 2, '0', STR_PAD_LEFT) . "_amt";
                    $paydate = "f_" . str_pad($j, 2, '0', STR_PAD_LEFT) . "_paydate";
                    $result_temp [$sts][$i] = $result[$i][$sts];
                    $result_temp [$amt][$i] = $result[$i][$amt];
                    $result_temp [$paydate][$i] = $result[$i][$paydate];
                }
                
            }

            $temp=0;
            $bul=1;
            $result_final=array();

            $bulan = array(1 => 'Januari', 2 => 'Februari',
                                    3 => 'Maret', 4 => 'April',
                                    5 => 'Mei', 6 => 'Juni',
                                    7 => 'Juli', 8 => 'Agustus',
                                    9 => 'September', 10 => 'Oktober',
                                    11 => 'November', 12 => 'Desember');

            for ($i=0; $i<count($result)*12; $i++){
                if ($i%12==0&&$i!=0){
                    $temp++;
                    $bul=1;
                }
                $sts = "f_" . str_pad($bul, 2, '0', STR_PAD_LEFT) . "_sts";
                $amt = "f_" . str_pad($bul, 2, '0', STR_PAD_LEFT) . "_amt";
                $paydate = "f_" . str_pad($bul, 2, '0', STR_PAD_LEFT) . "_paydate";

                $result_final [$i] ['npwpd'] =$result_temp ['npwpd'][$temp];
                $result_final [$i] ['nama'] =$result_temp ['nama'][$temp];
                $result_final [$i] ['alamat'] =$result_temp ['alamat'][$temp];
                $result_final [$i] ['tgl_realisasi'] = (empty($result_temp[$amt][$temp]) )? '-' : $result_temp [$paydate][$temp];
                $result_final [$i] ['masa_pajak'] = ($bul==12)? $bulan[$bul].' '.($result_temp ['tahun'][$temp]-1) : $bulan[$bul].' '.$result_temp ['tahun'][$temp];
                $result_final [$i] ['jml'] =$result_temp [$amt][$temp];
                $result_final [$i] ['keterangan'] = (empty($result_temp[$amt][$temp]) )?  $result_temp [$paydate][$temp]:'-';
                
                $bul++;
            }
             //print_r($result_final);exit;

            $data['rows'] = $result_final;
            $data['success'] = true; 

        } catch (Exception $e) {
            $data['message'] = $e->getMessage();        
        }

        return $data;

    }


}

/* End of file Groups_controller.php */