<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_rep_penerimaan_pertahun_sts_controller
* @version 07/05/2015 12:18:00
*/
class T_rep_penerimaan_pertahun_sts_controller {   

    function excel()
    {
        $p_year_period_id     = getVarClean('p_year_period_id', 'int', 0);
        $p_vat_type_id        = getVarClean('p_vat_type_id', 'int', 0);
        $start_piutang        = getVarClean('start_piutang', 'str', '');
        $end_piutang          = getVarClean('end_piutang', 'str', '');
        $tgl_status           = getVarClean('tgl_status', 'str', '');
        $p_account_status_id  = getVarClean('p_account_status_id', 'int', 0);

        //echo $p_year_period_id." ".$p_vat_type_id." ".$start_piutang." ".$end_piutang." ".$tgl_status." ".$p_account_status_id;
        //exit();
        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_rep_penerimaan_pertahun_sts');
            $table = $ci->t_rep_penerimaan_pertahun_sts;
            
            $data = $table->getWP($p_year_period_id,$p_vat_type_id, $start_piutang, $end_piutang, $tgl_status, $p_account_status_id);

            
            startExcel("laporan_posisi_wp_belum_bayar");
            echo '<html>';
            echo '<head><title>REP laporan_posisi_wp_belum_bayar</title></head>';
            echo '<body>';

            echo "<div><h3> LAPORAN POSISI WP BELUM BAYAR </h3></div>"; 
            echo "<h3>Periode Belum Bayar : ".$start_piutang." s/d ".$end_piutang."<br/>";  
            echo "Posisi Laporan Tanggal : ".$tgl_status."</h3>"; 

            if($data != 'no result'){
                echo '<table border="1">';
                echo '<tr>
                        <th rowspan="2">NO</th>
                        <th rowspan="2">NAMA PERUSAHAAN</th>
                        <th rowspan="2">ALAMAT</th>
                        <th colspan="12">REALISASI DAN TANGGAL BAYAR</th>
                        <th rowspan="2">JUMLAH</th>
                    </tr>';
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
                for ($i = 0; $i < count($data); $i++) {

                    $data2 = array();
                    $arrpaydate = array();

                    for($j = 1; $j <= 12; $j++){
                        $sts = "f_" . str_pad($j, 2, '0', STR_PAD_LEFT) . "_sts";
                        $amt = "f_" . str_pad($j, 2, '0', STR_PAD_LEFT) . "_amt";
                        $paydate = "f_" . str_pad($j, 2, '0', STR_PAD_LEFT) . "_paydate";
                                    
                        if(is_null($data[$i][$sts])){
                            $data2[$j] = number_format($data[$i][$amt], 0, ',', '.');
                            $arrpaydate[$j] = $data[$i][$paydate];
                        }
                        else{
                            $data2[$j] = $data[$i][$sts];
                        }
                    }
                    
                    $jumlah_kanan[$i] = 0;
                    for($k = 1; $k <=12; $k++) {
                        $amt = "f_" . str_pad($k, 2, '0', STR_PAD_LEFT) . "_amt";
                        $jumlah_kanan[$i] += $data[$i][$amt];
                    }
                    
                    $grand_total += $jumlah_kanan[$i]; //total bottom

                    echo '<tr>
                        <td align="center" valign="top">'.($i+1).'</td>
                        <td valign="top">'.$data[$i]["nama"].'</td>
                        <td valign="top">'.$data[$i]["alamat"].' <br/> '.$data[$i]["npwpd"].'</td>
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
                        <td colspan="15" align="center"> <b>TOTAL</b> </td>
                        <td><b>'.number_format($grand_total, 0, ',', '.').'</b></td>
                    </tr>';

                echo '</table>';
            }
            echo '</body>';
            echo '</html>';
            exit;

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }


    }
}

/* End of file T_rep_penerimaan_pertahun_sts_controller.php */