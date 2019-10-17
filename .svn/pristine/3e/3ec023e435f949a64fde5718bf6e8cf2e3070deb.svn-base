<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Inquery_bphtb_ws_controller
* @version 07/05/2015 12:18:00
*/
class Inquery_bphtb_ws_controller {

	function read(){
		$nop 	  = getVarClean('nop','str','');
		$tahun  = getVarClean('tahun','str','');

		$data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

		
		$final_result = array();
		try {

			$ci = & get_instance();
                  $ci->load->model('transaksi/inquery_bphtb_ws');
                  $table = $ci->inquery_bphtb_ws;

                  $ws_data = $table->getDataLink($nop, $tahun);

                  if(!empty($ws_data)){
                  	for ($i=0; $i <count($ws_data) ; $i++) { 
                  		$final_result[$i]['nop'] = $ws_data[$i]->NOP;
                  		$final_result[$i]['kota_op'] = $ws_data[$i]->KOTA_OP;
                  		$final_result[$i]['kelurahan_op'] = $ws_data[$i]->KELURAHAN_OP;
                  		$final_result[$i]['kecamatan_op'] = $ws_data[$i]->KECAMATAN_OP;
                  		$final_result[$i]['jalan'] = $ws_data[$i]->JALAN_OP;
                  		$final_result[$i]['rt'] = $ws_data[$i]->RT_OP;
                  		$final_result[$i]['rw'] = $ws_data[$i]->RW_OP;
                  		$final_result[$i]['luas_bumi'] = $ws_data[$i]->LUAS_BUMI;
					$final_result[$i]['luas_bang'] = $ws_data[$i]->LUAS_BANG;
					$final_result[$i]['njop_bang'] = $ws_data[$i]->NJOP_BANG;
					$final_result[$i]['njop_bumi'] = $ws_data[$i]->NJOP_BUMI;
					$final_result[$i]['njop_pbb'] = $ws_data[$i]->NJOP_PBB;
					$final_result[$i]['pbb_terhitung'] = $ws_data[$i]->PBB_TERHUTANG;
                  	}

                  	$kota_op = $table->getKotaOp($final_result[0]['kota_op']);
                  	for ($i=0; $i < count($kota_op); $i++) { 
                  		$final_result[$i]['nama_kota'] = $kota_op[$i]['region_name'];
                  		$final_result[$i]['id_kota'] = $kota_op[$i]['p_region_id'];
                  	}

                  	$kecamatan_op = $table->getKecOp($final_result[0]['kecamatan_op']);
                  	for ($i=0; $i <count($kecamatan_op); $i++) { 
                  		$final_result[$i]['nama_kecamatan'] = $kota_op[$i]['region_name'];
                  		$final_result[$i]['id_kecamatan'] = $kota_op[$i]['p_region_id'];
                  	}

                  	$kelurahan_op = $table->getKelOp($final_result[0]['kelurahan_op']);
                  	for ($i=0; $i <count($kelurahan_op); $i++) { 
                  		$final_result[$i]['nama_kelurahan'] = $kota_op[$i]['region_name'];
                  		$final_result[$i]['id_kelurahan'] = $kota_op[$i]['p_region_id'];
                  	}

                  	if ($page == 0) $data['page'] = 1;
      	            else $data['page'] = $page;

      	            $data['total'] = $total_pages;
      	            $data['records'] = $count;

      	            $data['rows'] = $final_result;
      	            $data['success'] = true;
                  }


			
		} catch (Exception $e) {
			$data['message'] = $e->getMessage();
		}

		return $data;

	}
}
 