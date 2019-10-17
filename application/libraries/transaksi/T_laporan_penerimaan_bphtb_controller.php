<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_penerimaan_bphtb_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_penerimaan_bphtb_controller {

    function excel()
    {
        $start_date      = getVarClean('date_start_laporan', 'str', '');
        $end_date        = getVarClean('date_end_laporan', 'str', '');
        $no_transaksi    = getVarClean('receipt_no','str','');
        $nop             = getVarClean('njop_pbb', 'str', '');
        $nama            = getVarClean('wp_name', 'str', '');
        $kec             = getVarClean('p_region_id_kecamatan','str','');
        $kel 			 = getVarClean('p_region_id_kelurahan', 'str', '');
        $jenis_transaksi = getVarClean('p_bphtb_legal_doc_type_id', 'str', '');
        $nama_pemeriksa  = getVarClean('verificated_by','str','');

        try {

            $ci = &get_instance();
            $ci->load->model('transaksi/t_laporan_penerimaan_bphtb');
            $table = $ci->t_laporan_penerimaan_bphtb;

            $param =  array('start_date' =>$start_date,
                            'end_date'=>$end_date,
                            'no_transaksi'=>$no_transaksi,
                            'nop'=>$nop,
                            'nama'=>$nama,
                            'kec'=>$kec,
                        	'kel'=>$kel,
                            'jenis_transaksi'=>$jenis_transaksi,
                            'nama_pemeriksa'=>$nama_pemeriksa);

            $items = $table->getExcel($param);  

            //print_r($items);

            //exit;
            
            startExcel('PENERIMAAN_BPTHB_'.date("dmy").'.xls');
            echo '<html>';
            echo '<head><title>LAPORAN PENERIMAAN BPHTB</title></head>';
            echo '<body>';
            	echo '<div><h3> LAPORAN PENERIMAAN BPHTB </h3></div>';
            	echo '<div><b> Tanggal : '.$this->dateToString($start_date) .' s/d '. $this->dateToString($end_date) .'</b></div>';
            	if($nama_pemeriksa != '') {
				  echo '<div><h3>VERIFIKATOR : '.$nama_pemeriksa.'</h3></div>';
				}
                echo '<table border="1">';
	                echo '<tr>';
		                echo '<th>No</th>';
		                echo '<th>NO TRANSAKSI</th>';
		                echo '<th>JENIS TRANSAKSI</th>';
		                echo '<th>NOP</th>';
		                echo '<th>ALAMAT OBJEK PAJAK</th>';
		                echo '<th>KECAMATAN OBJEK PAJAK</th>';
		                echo '<th>KELURAHAN OBJEK PAJAK</th>';
		                echo '<th>TGL BAYAR</th>';
		                echo '<th>TGL DAFTAR</th>';
		                echo '<th>NAMA SUBJEK PAJAK</th>';
		                echo '<th>ALAMAT SUBJEK PAJAK</th>';
		                echo '<th>KELURAHAN SUBJEK PAJAK</th>';
		                echo '<th>KECAMATAN SUBJEK PAJAK</th>';
		                echo '<th>LUAS TANAH</th>';
		                echo '<th>LUAS BANGUNAN</th>';
		                echo '<th>NJOP (Rp)</th>';
		                echo '<th>NILAI TRANSAKSI (Rp)</th>';
		                echo '<th>TOTAL BAYAR (Rp)</th>';
		                if($nama_pemeriksa == '') {
						  echo '<th>VERIFIKATOR</th>';
						}
						echo '<th>DAFTAR ONLINE?</th>';
	                echo '</tr>';

	                $no = 1;
	                $total_nilai_penerimaan = 0 ;
	                if ($items != 'no result'){
		                foreach ($items as $item) {
		                	$status_daftar = empty($item['t_ppat_id']) ? "Tidak" : "Ya";
		                	echo '<tr>';
								echo '<td align="center">'.$no++.'</td>';
								echo '<td align="center">'.$item['receipt_no'].'</td>';
								echo '<td align="center">'.$item['description'].'</td>';
								echo '<td align="left">&nbsp;'.$item['njop_pbb'].'</td>';
								echo '<td align="left">'.$item['object_address_name'].'</td>';
								echo '<td align="left">'.$item['kelurahan_objek_name'].'</td>';
								echo '<td align="left">'.$item['kecamatan_objek_name'].'</td>';
								echo '<td align="center">'.$this->dateToString($item['payment_date']).'</td>';
								echo '<td align="center">'.$this->dateToString($item['creation_date']).'</td>';
								echo '<td align="left">'.trim(strtoupper($item['wp_name'])).'</td>';
								echo '<td align="left">'.$item['wp_address_name'].'</td>';
								echo '<td align="left">'.$item['kelurahan_name'].'</td>';
								echo '<td align="left">'.$item['kecamatan_name'].'</td>';
								echo '<td align="right">'.number_format($item['land_area'],0,",",".").'</td>';
								echo '<td align="right">'.number_format($item['building_area'],0,",",".").'</td>';
								echo '<td align="right">'.number_format($item['njop'],0,",",".").'</td>';
								echo '<td align="right">'.number_format($item['market_price'],0,",",".").'</td>';
								echo '<td align="right">'.number_format($item['payment_amount'],0,",",".").'</td>';
								if($nama_pemeriksa == '') {
									echo '<td align="center">'.$item['verificated_by'].'</td>';
								}
								echo '<td align="center">'.$status_daftar.'</td>';
							echo '</tr>';
							
							$total_nilai_penerimaan += $item['payment_amount'];
		                }
	                }
	                echo '<tr>
							<td colspan="17" align="center"> <b>TOTAL</b> </td>
							<td align="right"><b>'.number_format($total_nilai_penerimaan,0,",",".").'</b></td>';
							if($nama_pemeriksa == '') {
								  echo '<td align="center"> &nbsp; </td>';
							} 		
					echo'</tr>';
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
		
		return $pieces[2].'-'.$monthname[(int)$pieces[1]].'-'.$pieces[0];
	}
}

/* End of file Groups_controller.php */