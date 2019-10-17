<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_penerimaan_bphtb_pengurangan_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_rekap_bphtb_controller {

    function excel()
    {
        $start_date      = getVarClean('date_start_laporan', 'str', '');
        $end_date        = getVarClean('date_end_laporan', 'str', '');
        $filter_lap      = getVarClean('filter_lap','str','');

        try {

            $ci = &get_instance();
            $ci->load->model('transaksi/t_laporan_rekap_bphtb');
            $table = $ci->t_laporan_rekap_bphtb;

            $param =  array('start_date' =>$start_date,
                        'end_date'=>$end_date,
                        'filter_lap'=>$filter_lap);

            $items = $table->getExcel($param);  

            $textFilter = '';
	        if(!empty($filter_lap)) {
	          if($filter_lap== 1) //sudah bayar
	            $textFilter = '(Sudah Bayar)';
	          if($filter_lap == 2) //belum bayar
	            $textFilter = 'YANG BELUM ADA KONFIRMASI LEBIH LANJUT OLEH PEMOHON';
	          if($filter_lap == 3) //belum bayar
	            $textFilter = '(Nihil)';
	        }
            
            startExcel('DAFTAR_NOTA_VERIFIKASI_BPHTB_'.date("dmy").'.xls');
            echo '<html>';
            echo '<head><title>LAPORAN VERIFIKASI BPHTB '.$textFilter.'</title></head>';
            echo '<body>';
            	echo '<div><h3>LAPORAN VERIFIKASI BPHTB '.$textFilter.'</h3></div>';
            	echo '<div><b> Tanggal : '.$this->dateToString($start_date) .' s/d '. $this->dateToString($end_date) .'</b></div>';
                echo '<table border="1">';
					echo '<tr>
						<th>NO</th>
						<th>TANGGAL</th>
						<th>NO.REGISTRASI</th>
						<th>NAMA WP</th>
						<th>JENIS TRANSAKSI</th>
						<th>NOP</th>
						<th>LT/LB</th>
						<th>HARGA TANAH / m2 (Rp)</th>
						<th>HARGA BANGUNAN / m2 (Rp)</th>
						<th>TOTAL NJOP (Rp)</th>
						<th>HARGA PASAR / <br/> TRANSAKSI / <br/> LELANG </th>
						<th>NILAI PAJAK <br/> YANG HARUS DIBAYAR (Rp)</th>
						<th>PEMERIKSA</th>
					</tr>';

	                $no =1;
					$jumlah =0;
					$jumlah=0;
					$total_nilai_pajak = 0;
					$nilai_njop = 0;
	                if ($items != 'no result'){
		                foreach ($items as $item) {
		                	$nilai_njop = $item['building_total_price'] + $item['land_total_price'];
		
							echo '<tr>
									<td>'.$no.'</td>
									<td>'.$this->dateToString($item['creation_date']).'</td>	
									<td>&nbsp;'.$item['registration_no'].' </a></td>
									<td>'.$item['wp_name'].'</td>	
									<td>'.$item['description'].'</td>	
									<td>&nbsp;'.$item['njop_pbb'].'</td>	
									<td align="right">'.number_format($item['land_area'],0,",",".")." / ".number_format($item['building_area'],0,",",".").'</td>
									<td align="right">'.number_format($item['land_price_per_m'],0,",",".").'</td>
									<td align="right">'.number_format($item['building_price_per_m'],0,",",".").'</td>
									<td align="right">'.number_format($nilai_njop,0,",",".").'</td>
									<td align="right">'.number_format($item['market_price'],0,",",".").'</td>
									<td align="right">'.number_format($item['bphtb_amt_final'],0,",",".").'</td>
									<td>'.$item['verificated_by'].'</td>
								</tr>';
							
							//$jumlah+=$item['amount'];
							//	$jumlah_wp+=$dbConn->f("jumlah_wp");
							$total_nilai_pajak += $item['bphtb_amt_final'];
							$no++;
		                }
	                }
	                echo '<tr>
							<td colspan="11" align="center"><b> TOTAL </b></td>
							<td align="right"><b>'.number_format($total_nilai_pajak,2,",",".").'</b></td>
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
		
		return $pieces[2].'-'.$monthname[(int)$pieces[1]].'-'.$pieces[0];
	}
}

/* End of file Groups_controller.php */