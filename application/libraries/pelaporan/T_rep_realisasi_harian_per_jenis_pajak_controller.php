<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_daftar_bphtb_controller
* @version 07/05/2015 12:18:00
*/
class T_rep_realisasi_harian_per_jenis_pajak_controller {

    function excel()
    {
        $p_vat_type_id        = getVarClean('p_vat_type_id', 'int', 0);
        $p_year_period_id     = getVarClean('p_year_period_id', 'int', 0);
        $tgl_penerimaan       = getVarClean('tgl_penerimaan','str','');
        $tgl_penerimaan_last  = getVarClean('tgl_penerimaan_last', 'str', '');
        $jenis_setoran        = getVarClean('jenis_setoran', 'str', '');
        $jenis_laporan        = getVarClean('jenis_laporan', 'str', 'all');
        $year_date            = getVarClean('year_date', 'str', '');
        
        try {

        	$param =  array('p_vat_type_id' =>$p_vat_type_id,
                        'p_year_period_id'=>$p_year_period_id,
                        'tgl_penerimaan'=>$tgl_penerimaan,
                        'tgl_penerimaan_last'=>$tgl_penerimaan_last,
                        'jenis_setoran'=>$jenis_setoran,
                        'jenis_laporan'=>$jenis_laporan,
                        'year_date'=>$year_date );

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_rep_realisasi_harian_per_jenis_pajak');
            $table = $ci->t_rep_realisasi_harian_per_jenis_pajak;

            if ($jenis_laporan=='all'){
            	$items = $table->getJenisLapAll($param);
            }else  if ($jenis_laporan=='piutang'){
            	$items = $table->getJenisLapPiutang($param);
            }else  if ($jenis_laporan=='murni'){
            	$items = $table->getJenisLapMurni($param);
            }

              
            $start_date = str_replace("'","",$tgl_penerimaan);
            $end_date   = str_replace("'","",$tgl_penerimaan_last);

            startExcel('LAPORAN_REALISASI_HARIAN_PER_JENIS_PAJAK_'.date("dmy").'.xls');
            echo '<html>';
            echo '<head><title>LAPORAN REALISASI HARIAN PER JENIS PAJAK</title></head>';
            echo '<body>';
            	echo '<div><h3>LAPORAN REALISASI HARIAN PER JENIS PAJAK</h3></div>';
            	echo "<div> Tahun ".$year_date."</div>";
            	echo '<div><b> Tanggal : '.$this->dateToString($start_date) .' s/d '. $this->dateToString($end_date) .'</b></div>';
                echo '<table border="1">';
	                echo '<tr>
							<th>NO</th>
							<th>TANGGAL</th>
							<th>NAMA AYAT</th>
							<th>NO KOHIR</th>
							<th>NAMA WP</th>
							<th>MERK DAGANG</th>
							<th>ALAMAT MERK DAGANG</th>
							<th>NPWPD</th>
							<th>JUMLAH</th>
							<th>MASA PAJAK</th>
							<th>TANGGAL TAP</th>
							<th>TANGGAL BAYAR</th>
							<th>KETERANGAN</th>
						</tr>';

					
					$total_nilai_penerimaan = 0;
	                $no = 1;
	                if (!empty($items)){
		                foreach ($items as $item) {
		                	echo '<tr>';
								echo '<td align="center">'.$no++.'</td>';
								echo '<td align="center">'.$item['kode_jns_pajak'].' '.$item['kode_ayat'].'</td>';
								echo '<td align="left">&nbsp;'.$item['nama_ayat'].'</td>';
								echo '<td align="left">'.$item['no_kohir'].'</td>';
								echo '<td align="left">'.trim(strtoupper($item['wp_name'])).'</td>';
								echo '<td align="left">'.trim(strtoupper($item['company_brand'])).'</td>';
								echo '<td align="left">'.trim(strtoupper($item['brand_address_name'])).'</td>';
								echo '<td align="left">'.$item['npwpd'].'</td>';
								echo '<td align="right">'.number_format($item['jumlah_terima'],2,",",".").'</td>';
								echo '<td align="left">'.$item['masa_pajak'].'</td>';
								echo '<td align="center">'.$item['kd_tap'].'</td>';
								echo '<td align="center">'.$item['payment_date'].'</td>';
								echo '<td align="center">'.$item['code'].'</td>';
							echo '</tr>';
							
							$total_nilai_penerimaan += $item['jumlah_terima'];
		                }
	                }

	                echo '<tr>
							<td colspan="8" align="center"> <b>TOTAL</b> </td>
							<td align="right"><b>'.number_format($total_nilai_penerimaan,2,",",".").'</b></td>
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

    function dateToString($date){
		if(empty($date)) return "";
		
		$monthname = array(0  => '-',
		                   1  => 'Januari',
		                   2  => 'Februari',
		                   3  => 'Maret',
		                   4  => 'April',
		                   5  => 'Mei',
		                   6  => 'Juni',
		                   7  => 'Juli',
		                   8  => 'Agustus',
		                   9  => 'September',
		                   10 => 'Oktober',
		                   11 => 'November',
		                   12 => 'Desember');    
		
		$pieces = explode('-', $date);
		
		return $pieces[0].'-'.$monthname[(int)$pieces[1]].'-'.$pieces[2];
	}
}

/* End of file Groups_controller.php */