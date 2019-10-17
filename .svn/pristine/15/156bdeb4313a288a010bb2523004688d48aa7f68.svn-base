<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_daftar_bphtb_verifikasi_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_daftar_bphtb_verifikasi_controller {

    function excel()
    {
        $start_date = getVarClean('date_start_laporan', 'str', '');
        $end_date   = getVarClean('date_end_laporan', 'str', '');
        $kec        = getVarClean('object_p_region_id_kec','str','');

        try {

            $ci = &get_instance();
            $ci->load->model('transaksi/t_laporan_daftar_bphtb_verifikasi');
            $table = $ci->t_laporan_daftar_bphtb_verifikasi;

            $items = $table->getExcel($start_date, $end_date, $kec);  
            
            startExcel('DAFTAR_BPHTB_VERIFIKASI_'.date("dmy").'.xls');
            echo '<html>';
            echo '<head><title>LAPORAN DAFTAR BPHTB BERDASARKAN TANGGAL VERIFIKASI</title></head>';
            echo '<body>';
            	echo '<div><h3> LAPORAN DAFTAR BPHTB BERDASARKAN TANGGAL VERIFIKASI </h3></div>';
            	echo '<div><b> Tanggal : '.$this->dateToString($start_date) .' s/d '. $this->dateToString($end_date) .'</b></div>';
                echo '<table border="1">';
	                echo '<tr>';
		                echo '<th rowspan="2">No</th>';
		                echo '<th rowspan="1" colspan="4">WP</th>';
		                echo '<th rowspan="2">JENIS TRANSAKSI</th>';
		                echo '<th rowspan="2">NOP</th>';
		                echo '<th rowspan="2">LOKASI OBJEK PAJAK</th>';
		                echo '<th rowspan="2">LT</th>';
		                echo '<th rowspan="2">LB</th>';
		                echo '<th rowspan="2">HARGA TANAH / m2 (Rp)</th>';
		                echo '<th rowspan="2">HARGA BANGUNAN / m2 (Rp)</th>';
		                echo '<th rowspan="2">TOTAL</th>';
		                echo '<th rowspan="2">HARGA TRANSAKSI / <br> PASAR / LELANG</th>';
		                echo '<th rowspan="2">NILAI PAJAK YANG HARUS DIBAYAR</th>';
		                echo '<th rowspan="1" colspan="3">NOTA VERIFIKASI</th>';
		                echo '<th rowspan="1" colspan="3">SSPD BPHTB</th>';
		                echo '<th rowspan="1" colspan="3">VALIDASI DAN LEGALISASI</th>';
		                echo '<th rowspan="2">KETERANGAN</th>';
	                echo '</tr>';

	                echo '<tr>';
		                echo '<th>NAMA WP</th>';
		                echo '<th>ALAMAT</th>';
		                echo '<th>KELURAHAN</th>';
		                echo '<th>KECAMATAN</th>';

		                echo '<th>NOMOR</th>';
		                echo '<th>TANGGAL</th>';
		                echo '<th>(Rp)</th>';

		                echo '<th>NOMOR</th>';
		                echo '<th>TANGGAL</th>';
		                echo '<th>(Rp)</th>';

		                echo '<th>NOMOR</th>';
		                echo '<th>TANGGAL</th>';
		                echo '<th>KURANG BAYAR / LEBIH BAYAR (Rp)</th>';
	                echo '</tr>';

	                $no = 1;
	                if ($items != 'no result'){
		                foreach ($items as $item) {
		                	echo '<tr>';
								echo '<td align="center">'.$no++.'</td>';
								echo '<td align="left">'.$item['wp_name'].'</td>';
								echo '<td align="left">'.$item['wp_address_name'].'</td>';
								echo '<td align="left">'.$item['kelurahan_wp_name'].'</td>';
								echo '<td align="left">'.$item['kecamatan_wp_name'].'</td>';
								echo '<td align="left">'.$item['nama_dokumen'].'</td>';
								echo '<td align="left">&nbsp;'.$item['njop_pbb'].'</td>';
								echo '<td align="left">'.$item['object_address_name'].'</td>';
								echo '<td align="right">'.number_format($item['land_area'],0,",",".").'</td>';
								echo '<td align="right">'.number_format($item['building_area'],0,",",".").'</td>';	
								echo '<td align="right">'.number_format($item['land_price_per_m'],0,",",".").'</td>';
								echo '<td align="right">'.number_format($item['building_price_per_m'],0,",",".").'</td>';	
								echo '<td align="right">'.number_format($item['land_total_price']+$item['building_total_price'],0,",",".").'</td>';
								echo '<td align="right">'.number_format($item['market_price'],0,",",".").'</td>';
								echo '<td align="right">'.number_format($item['bphtb_amt_final'],0,",",".").'</td>';
								echo '<td align="left">'.$item['registration_no'].'</td>';
								echo '<td align="left">'.$item['tgl_bphtb'].'</td>';
								echo '<td align="right">'.number_format($item['bphtb_amt_final'],0,",",".").'</td>';
								echo '<td align="left">'.$item['receipt_no'].'</td>';
								echo '<td align="left">'.$item['tgl_bayar'].'</td>';
								echo '<td align="right">'.number_format($item['payment_amount'],0,",",".").'</td>';
								echo '<td align="left">&nbsp;'.$item['order_no'].'</td>';
								echo '<td align="left">'.$item['tgl_bayar'].'</td>';
								if ($item['receipt_no']==''){
									echo '<td align="right">'.number_format(0,0,",",".").'</td>';
								}else{
									echo '<td align="right">'.number_format($item['bphtb_amt_final']-$item['payment_amount'],0,",",".").'</td>';
								}
								echo '<td align="left">'.$item['description'].'</td>';
							echo '</tr>';
		                }
	                }
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