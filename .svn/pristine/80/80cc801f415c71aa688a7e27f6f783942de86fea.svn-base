<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_laporan_global_per_wp_per_wilayah_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_global_per_wp_per_wilayah_controller {

    function excel()
    {
        $start_date      		 = getVarClean('date_start_laporan', 'str', '');
        $end_date        		 = getVarClean('date_end_laporan', 'str', '');
        $p_rqst_type_id      	 = getVarClean('p_rqst_type_id','int',0);
        $rqst_type_code      	 = getVarClean('rqst_type_code','str','');
        $kode_wilayah      		 = getVarClean('kode_wilayah','str','');

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_global_per_wp_per_wilayah');
            $table = $ci->t_laporan_global_per_wp_per_wilayah;

            $param =  array('date_start' =>$start_date,
                        'date_end'=>$end_date,
                        'p_rqst_type_id'=>$p_rqst_type_id,
                    	'kode_wilayah'=>$kode_wilayah);

            $items = $table->getExcel($param);  

            $textFilter = 'Penerimaan Global Per WP';
	        
            
            startExcel('LAPORA_GLOBAL_PER_WP_'.date("dmy").'.xls');
            echo '<html>';
            echo '<head><title>'.$textFilter.'</title></head>';
            echo '<body>';
            	echo '<div><h3>'.$textFilter.'</h3></div>';
            	echo '<div><b> Jenis Pajak : '.$rqst_type_code.'</b></div>';
            	echo '<div><b> Tanggal : '.$this->dateToString($start_date) .' s/d '. $this->dateToString($end_date) .'</b></div>';
                echo '<table border="1">';
					echo '<tr>
							<th>NO</th>
							<th>NAMA WP</th>
							<th>ALAMAT</th>
							<th>NPWPD</th>
							<th>BESARNYA (Rp)</th>
							<th>JML SSPD</th>
							<th>NAMA AYAT</th>
							<th>PENGUKUHAN</th>
							<th>KETERANGAN</th>
						</tr>';

	                $no =1;
					$jumlah =0;
					$jumlah_wp = 0;
	                if ($items != 'no result'){
		                foreach ($items as $item) {
		                	echo '<tr>';
								echo '<td align="center">'.$no.'</td>';
								echo '<td>'.$item['nama_wp'].'</td>';
								echo '<td>'.$item['alamat_new'].'</td>';
								echo '<td>'.$item['npwpd'].'</td>';
								echo '<td align="right">'.number_format($item['amount'], 2, ",", ".").'</td>';
								echo '<td align="right">'.$item['tot_sspd'].'</td>';
								echo '<td>'.$item['jenis_pajak'].'</td>';
								echo '<td>'.$item['active_date'].'</td>';
								echo '<td>'.$item['kode_wilayah'].'</td>';
							echo '</tr>';
							
							$jumlah += $item['amount'];
							$jumlah_wp += $item['tot_sspd'];
							$no++;
		                }
	                }
	                echo 	'<tr>
								<td colspan="4" align="center"> <b> JUMLAH </b> </td>
								<td align="right"><b>'.number_format($jumlah, 2, ",", ".").'</b></td>
								<td align="right"><b>'.$jumlah_wp.'</b></td>
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

	function readDataCombo(){

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'records' => 0, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_global_per_wp_per_wilayah');
            $table = $ci->t_laporan_global_per_wp_per_wilayah;

            $items = $table->dataCombo();

            $html = "";
            $html.="<select name='kode_wilayah' id='kode_wilayah' class='form-control required' required>";
            $html.="<option value='' >Select Value</option>";
            foreach ($items as $item) {
              $html .=" <option value='" . $item['code'] . "'>" . $item['business_area_name'] . "</option>";
            }
            $html .= "</select>";

            $data['items'] = $html;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }
}

/* End of file T_laporan_global_per_wp_per_wilayah_controller.php */