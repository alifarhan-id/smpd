<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_rep_pengurangan_bphtb extends CI_Controller{
	var $fontSize = 10;
	var $fontFam = 'Arial';
	var $yearId = 0;
	var $yearCode="";
	// var $paperWSize = 330;
	// var $paperHSize = 215;
	var $height = 5;
	var $currX;
	var $currY;
	var $widths;
	var $aligns;

	function __construct() {
	    parent::__construct();
		$pdf = new FPDF();		
		$pdf->AddPage("P");

		$size = array(216 ,356);
	    $this->DefPageSize = $size;
		$this->CurPageSize = $size;
		$this->startY = 0;
		$this->startX = 0;
		$this->lengthCell = $size[0]-30;
	}

	function pageCetak(){
		$t_bphtb_registration_id = getVarClean('t_bphtb_registration_id','int',0);

		if($t_bphtb_registration_id != 0){
			$data = $this->getDataGonoGini($t_bphtb_registration_id);

			$pdf = new FPDF();		

			$pdf->AliasNbPages();
			$pdf->AddPage("P");
			$pdf->SetFont("Arial", "B", 12);
			$pdf->Cell($this->lengthCell, $this->height, "", "", 0, "C");
			$pdf->Ln();
			$pdf->Cell($this->lengthCell, $this->height, "LEMBAR PERHITUNGAN", "", 0, "C");
			$pdf->Ln();
			$pdf->SetFont("Arial", "B", 13);
			$pdf->Cell($this->lengthCell, $this->height, "PENGURANGAN ATAU KERINGANAN", "", 0, "C");
			$pdf->Ln();
			$pdf->SetFont("Arial", "B", 14);
			$pdf->Cell($this->lengthCell, $this->height, "BEA PEROLEHAN HAK ATAS TANAH DAN BANGUNAN", "B", 0, "C");
			$pdf->Ln();
			$pdf->Ln();

			$lbody = $this->lengthCell / 20;
			$lbody1 = $lbody * 1;
			$lbody4 = $lbody * 4;
			$lbody10 = $lbody * 15;

			$pdf->SetFont("Arial", "B", 12);
			$this->barisBaru_long($pdf,"A", "1 Nama Wajib Pajak", ": " . $data["wp_name"]);
			$this->barisBaru_long($pdf,"", "2 ".$data['opsi_a2'], ": ".$data['opsi_a2_keterangan']);
			$this->barisBaru_long($pdf,"", "3 Alamat Wajib Pajak", ": " . $data["wp_address_name"]);
			$this->barisBaru_long($pdf,"", "4 RT/RW", ": RT. " . $data["wp_rt"] . "/RW. " .  $data["wp_rw"]);
			$this->barisBaru_long($pdf,"", "5 Kelurahan/Desa", ": " . $data["wp_kelurahan"]);
			$this->barisBaru_long($pdf,"", "6 Kecamatan", ": " . $data["wp_kecamatan"]);
			$this->barisBaru_long($pdf,"", "7 Kabupaten/Kota", ": " . $data["wp_kota"]);
			$pdf->Ln();
			
			$this->barisBaru_long($pdf,"B", "1 Nomor Objek Pajak (NOP) PBB ", ": " . $data["njop_pbb"]);
			$this->barisBaru_long($pdf,"", "2 Letak tanah atau bangunan", ": " . $data["object_address_name"]);
			$this->barisBaru_long($pdf,"", "3 RT/RW", ": RT. " . trim($data["object_rt"]) . "/RW. " . $data["object_rw"]);
			$this->barisBaru_long($pdf,"", "4 Kelurahan/Desa", ": " . $data["object_kelurahan"]);
			$this->barisBaru_long($pdf,"", "5 Kecamatan", ": " . $data["object_kecamatan"]);
			$this->barisBaru_long($pdf,"", "6 Kabupaten/Kota", ": " . $data["object_region"]);
			$this->barisBaru_long($pdf,"", "7 ".$data['opsi_b7'], ": ".$data['opsi_b7_keterangan']);
			$pdf->Ln();
			
			$this->barisBaru($pdf,"C", "Penghitungan NJOP PBB", "");
			$lbodyx = ($this->lengthCell - $lbody1) / 9;
			$lbodyx1 = $lbodyx * 1;
			$lbodyx2 = $lbodyx * 2;
			$lbodyx3 = $lbodyx * 3;

			$pdf->Cell($lbody1, $this->height, "", "", 0, "");
			$pdf->SetWidths(array($lbodyx1, $lbodyx2, $lbodyx3, $lbodyx3));
			$pdf->SetAligns(array("C", "C", "C", "C"));
			$pdf->RowMultiBorderWithHeight(
				array
				(
					"\nUraian",
					"Luas\n(Diisi luas tanah dan atau bangunan yang haknya diperoleh)",
					"NJOP PBB / m2\n(Diisi berdasarkan SPPT PBB tahun terjadinya perolehan hak / Tahun",
					"\nLuas x NJOP PBB / m2"
				),
				array
				(
					"TBL",
					"TBR",
					"TBLR",
					"TBLR"
				),
				$this->height);
			
			$pdf->Cell($lbody1, $this->height, "", "", 0, "");
			$pdf->Cell($lbodyx1, $this->height, "Tanah (bumi)", "L", 0, "");
			$pdf->Cell($lbodyx1, $this->height, number_format($data["land_area"], 0, ",", "."), "", 0, "R");
			$pdf->Cell($lbodyx1, $this->height, "m2", "R", 0, "L");
			$pdf->Cell($lbodyx1, $this->height, "Rp", "", 0, "L");
			$pdf->Cell($lbodyx1, $this->height, number_format($data["land_price_per_m"], 0, ",", "."), "", 0, "R");
			$pdf->Cell($lbodyx1, $this->height, "", "R", 0, "");
			$pdf->Cell($lbodyx1, $this->height, "Rp", "", 0, "L");
			$pdf->Cell($lbodyx1+$lbodyx1, $this->height, number_format($data["land_total_price"], 0, ",", "."), "R", 0, "R");
			/*$this->Cell($lbodyx1, $this->height, "", "R", 0, "");*/
			$pdf->Ln();

			$pdf->Cell($lbody1, $this->height, "", "", 0, "");
			$pdf->Cell($lbodyx1, $this->height, "Bangunan", "L", 0, "");
			$pdf->Cell($lbodyx1, $this->height, number_format($data["building_area"], 0, ",", "."), "", 0, "R");
			$pdf->Cell($lbodyx1, $this->height, "m2", "R", 0, "L");
			$pdf->Cell($lbodyx1, $this->height, "Rp", "", 0, "L");
			$pdf->Cell($lbodyx1, $this->height, number_format($data["building_price_per_m"], 0, ",", "."), "", 0, "R");
			$pdf->Cell($lbodyx1, $this->height, "", "R", 0, "");
			$pdf->Cell($lbodyx1, $this->height, "Rp", "", 0, "L");
			$pdf->Cell($lbodyx1+$lbodyx1, $this->height, number_format($data["building_total_price"], 0, ",", "."), "R", 0, "R");
			/*$this->Cell($lbodyx1, $this->height, "", "R", 0, "");*/
			$pdf->Ln();
			
			$pdf->Cell($lbody1, $this->height, "", "", 0, "");
			$pdf->Cell($lbodyx1, $this->height, "", "BL", 0, "");
			$pdf->Cell($lbodyx1, $this->height, "", "B", 0, "R");
			$pdf->Cell($lbodyx1, $this->height, "", "BR", 0, "L");
			$pdf->Cell($lbodyx1, $this->height, "", "B", 0, "L");
			$pdf->Cell($lbodyx1, $this->height, "", "B", 0, "R");
			$pdf->Cell($lbodyx1, $this->height, "", "BR", 0, "R");
			$pdf->Cell($lbodyx1, $this->height, "Rp", "B", 0, "L");
			$pdf->Cell($lbodyx1+$lbodyx1, $this->height, number_format($data["land_total_price"] + $data["building_total_price"], 0, ",", "."), "BR", 0, "R");
			/*$this->Cell($lbodyx1, $this->height, "", "BR", 0, "");*/
			$pdf->Ln();
			$jenis_harga_bphtb = $data["jenis_harga_bphtb"];
			if(empty($jenis_harga_bphtb)) $jenis_harga_bphtb = 99;
			$jenis_harga = array(1 => 'Harga Transaksi',2 =>  'Harga Pasar',3 => 'Harga Lelang', 99 => 'Harga Pasar');


			}

			$pdf->Cell($lbody1, $this->height, "", "", 0, "");
			$pdf->Cell($this->lengthCell - $lbody1, $this->height, "Jenis perolehan hak atas tanah dan atau bangunan	".$data['jenis_perolehan_hak'], "", 0, "");
			$pdf->Ln();
			$pdf->Cell($lbody1, $this->height, "", "", 0, "");
			$pdf->Cell($this->lengthCell - $lbody1, $this->height, "".$data['keterangan_opsi_c'], "", 0, "");
			$pdf->Ln();
			$pdf->Cell($lbody1, $this->height, "", "", 0, "");
			$pdf->Cell($lbody1+$lbody1, $this->height, "Nomor ", "", 0, "");
			$pdf->Cell($this->lengthCell - $lbody1 -$lbody1-$lbody1, $this->height, ": ".$data['nomor_notaris'], "", 0, "");
			$pdf->Ln();
			$pdf->Cell($lbody1, $this->height, "", "", 0, "");
			$pdf->Cell($lbody1+ $lbody1, $this->height, "Tanggal ", "", 0, "");
			$pdf->Cell($this->lengthCell - $lbody1-$lbody1-$lbody1, $this->height, ": ".$this->beautyDate($data['tanggal_sk']), "", 0, "");
			$pdf->Ln();
			$pdf->Ln();

			$pdf->Cell($lbody1, $this->height, "", "", 0, "");
			$pdf->Cell($this->lengthCell - $lbody1, $this->height, "PENGHITUNGAN BPHTB", "", 0, "");
			$pdf->Ln();
			
			$this->barisBaru2($pdf,$lbody1, "Nilai Perolehan Objek Pajak (NPOP)", "", "Rp", $data["npop"]);
			$this->barisBaru2($pdf,$lbody1, "Nilai Perolehan Objek Pajak Tidak Kena Pajak (NPOPTKP)", "", "Rp", $data["npop_tkp"]);
			if($data["npop_kp"]==0){
				$this->barisBaruStr($pdf,$lbody1, "Nilai Perolehan Objek Pajak Kena Pajak (NPOPKP)", "", "Rp","NIHIL");
			}else{
				$this->barisBaru2($pdf,$lbody1, "Nilai Perolehan Objek Pajak Kena Pajak (NPOPKP)", "", "Rp", $data["npop_kp"]);
			}
			
			if($data["npop_kp"]==0){
				$this->barisBaruStr($pdf,$lbody1, "Bea Perolehan Hak atas Tanah dan Bangunan yang terutang", "5%", "Rp", "NIHIL");
			}else{
				$this->barisBaru2($pdf,$lbody1, "Bea Perolehan Hak atas Tanah dan Bangunan yang terutang", "5%", "Rp", $data["bphtb_amt"]);
			}

			$pdf->Cell($lbody1, $this->height, "", "", 0, "");
			$pdf->Cell($this->lengthCell - $lbody1, $this->height, "Pengenaan Pengurangan Karena ".$data['jenis_perolehan_hak'], "", 0, "");
			$pdf->Ln();
			$this->barisBaru2($pdf,$lbody1, "Besaran Pengenaan Pengurangan ", $data['description'], "Rp", $data["bphtb_discount"]);

			if($data["npop_kp"]==0){
				$this->barisBaruStr($pdf,$lbody1, "Bea Perolehan Hak atas Tanah dan Bangunan yang harus dibayar", "", "Rp", "NIHIL");
			}else{
				$this->barisBaru3($pdf,$lbody1, "Bea Perolehan Hak atas Tanah dan Bangunan yang harus dibayar", "", "Rp", $data["bphtb_amt_final"]);
			}

			$pdf->Cell($lbody1, $this->height, "", "", 0, "");
			$pdf->Cell($lbody1+ $lbody1, $this->height, "Terbilang :", "", 0, "");
			$pdf->SetFont("Arial", "iB", 8);
			$pdf->Cell($this->lengthCell - $lbody1- $lbody1- $lbody1, $this->height, $data['terbilang'], "", 0, "");
			$pdf->Ln();
			$pdf->Ln();


			$pdf->SetFont("Arial", "", 8);
			
			$pdf->Cell($lbody1+5, $this->height, "Catatan :", "", 0, "");
			$pdf->SetFont("Arial", "i", 8);
			$pdf->Cell($this->lengthCell - $lbody1 - 5, $this->height, "Apabila ada kekeliruan dikarenakan data maka akan diperbaiki dengan data terbaru", "", 0, "");
			$pdf->Ln();
					
			$lbody = $this->lengthCell / 4;
			$lbody1 = $lbody * 1;
			$lbody2 = $lbody * 2;
			$lbody3 = $lbody * 3;

			$pdf->output();
	}

	function getDataGonoGini($t_bphtb_registration_id){
		$whereClause='';
    	$data = array();

    	$sql = "select j.t_bphtb_exemption_id, j.exemption_amount, j.dasar_pengurang, j.analisa_penguranan, j.jenis_pensiunan, j.jenis_perolehan_hak, j.sk_bpn_no, to_char(j.tanggal_sk,'DD-MM-YYYY') as tanggal_sk, 
			j.pilihan_lembar_cetak, j.opsi_a2, j.opsi_a2_keterangan, j.opsi_b7, j.opsi_b7_keterangan, j.keterangan_opsi_c, j.keterangan_opsi_c_gono_gini,
			to_char(j.tanggal_berita_acara,'DD-MM-YYYY') as tanggal_berita_acara, j.pemeriksa_id, j.administrator_id,
			j.nomor_berita_acara, j.nomor_notaris,
			k.pemeriksa_nama as nama_pemeriksa, k.pemeriksa_nip as nip_pemeriksa, k.pemeriksa_jabatan as jabatan_pemeriksa,
			l.pemeriksa_nama as nama_operator, l.pemeriksa_nip as nip_operator, l.pemeriksa_jabatan as jabatan_operator,
			a.*,
			cust_order.p_rqst_type_id,
			b.region_name as wp_kota,
			c.region_name as wp_kecamatan,
			d.region_name as wp_kelurahan,
			e.region_name as object_region,
			f.region_name as object_kecamatan,
			g.region_name as object_kelurahan,
			h.description as doc_name

			from t_bphtb_exemption as j
			left join t_bphtb_registration as a  on j.t_bphtb_registration_id = a.t_bphtb_registration_id
			left join p_region as b
				on a.wp_p_region_id = b.p_region_id
			left join p_region as c
				on a.wp_p_region_id_kec = c.p_region_id
			left join p_region as d
				on a.wp_p_region_id_kel = d.p_region_id
			left join p_region as e
				on a.object_p_region_id = e.p_region_id
			left join p_region as f
				on a.object_p_region_id_kec = f.p_region_id
			left join p_region as g
				on a.object_p_region_id_kel = g.p_region_id
			left join p_bphtb_legal_doc_type as h
				on a.p_bphtb_legal_doc_type_id = h.p_bphtb_legal_doc_type_id
			left join t_customer_order as cust_order
				on cust_order.t_customer_order_id = a.t_customer_order_id
			left join t_bphtb_exemption_pemeriksa as k
			   on j.pemeriksa_id = k.t_bphtb_exemption_pemeriksa_id
			left join t_bphtb_exemption_pemeriksa as l
				on j.administrator_id = l.t_bphtb_exemption_pemeriksa_id
			where j.t_bphtb_registration_id = ".$t_bphtb_registration_id;

		$output = $this->db->query($sql);
		$data = $output->row_array();

		$data['terbilang'] = '';

		$sql2 = "SELECT * FROM f_terbilang('".ceil($data['bphtb_amt_final'])."','') as terbilang";        
        $output = $this->db->query($sql2);
        $items = $output->row_array();

        $data['terbilang'] = $items['terbilang'];



		return $data;

	}

	function beautyDate($tgl) {
	    
	    $arrtgl = explode("-", $tgl);
	    $dd = $arrtgl[0];
	    $mm = $arrtgl[1];
	    $yyyy = $arrtgl[2];
	    
	    $arrmonth = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	    return $dd." ".$arrmonth[$mm-1]." ".$yyyy;
	}
	
	
	function barisBaru3($pdf,$subtractor, $field, $middle, $currency, $data){
		$lbodyx = ($this->lengthCell - $subtractor) / 9;
		$lbodyx1 = $lbodyx * 1;
		$lbodyx2 = $lbodyx * 2;
		$lbodyx3 = $lbodyx * 3;
		$lbodyx5 = $lbodyx * 5;
		
		$pdf->Cell($subtractor, $this->height, "", "", 0, "L");
		$pdf->Cell($lbodyx3 + $lbodyx2, $this->height, "$field", "", 0, "L");
		$pdf->Cell($lbodyx1+10, $this->height, "$middle", "", 0, "L");
		$pdf->Cell($lbodyx1, $this->height, "$currency", "", 0, "L");
		$pdf->SetFont("Arial", "B", 8);
		$pdf->Cell($lbodyx2-10, $this->height, number_format($data, 0, ",", "."), "", 0, "R");
		$pdf->SetFont("Arial", "", 8);
		$pdf->Ln();
	}

	function barisBaru2($pdf,$subtractor, $field, $middle, $currency, $data){
		$lbodyx = ($this->lengthCell - $subtractor) / 9;
		$lbodyx1 = $lbodyx * 1;
		$lbodyx2 = $lbodyx * 2;
		$lbodyx3 = $lbodyx * 3;
		$lbodyx5 = $lbodyx * 5;
		
		$pdf->Cell($subtractor, $this->height, "", "", 0, "L");
		$pdf->Cell($lbodyx3 + $lbodyx2, $this->height, "$field", "", 0, "L");
		$pdf->Cell($lbodyx1+10, $this->height, "$middle", "", 0, "L");
		$pdf->Cell($lbodyx1, $this->height, "$currency", "", 0, "L");
		$pdf->Cell($lbodyx2-10, $this->height, number_format($data, 0, ",", "."), "", 0, "R");
		$pdf->Ln();
	}

	function barisBaruStr($pdf,$subtractor, $field, $middle, $currency, $data){
		$lbodyx = ($this->lengthCell - $subtractor) / 9;
		$lbodyx1 = $lbodyx * 1;
		$lbodyx2 = $lbodyx * 2;
		$lbodyx3 = $lbodyx * 3;
		$lbodyx5 = $lbodyx * 5;
		
		$pdf->Cell($subtractor, $this->height, "", "", 0, "L");
		$pdf->Cell($lbodyx3 + $lbodyx2, $this->height, "$field", "", 0, "L");
		$pdf->Cell($lbodyx1, $this->height, "$middle", "", 0, "L");
		$pdf->Cell($lbodyx1, $this->height, " ", "", 0, "L");
		$pdf->Cell($lbodyx2, $this->height, $data, "", 0, "R");
		$pdf->Ln();
	}
	
	function barisBaru($pdf,$section, $field, $data){
		$pdf->SetFont("Arial", "", 8);
		$lbody = $this->lengthCell / 20;
		$lbody1 = $lbody * 1;
		$lbody4 = $lbody * 4;
		$lbody15 = $lbody * 15;
		
		$pdf->Cell($lbody1, $this->height, "$section", "", 0, "L");
		$pdf->Cell($lbody4, $this->height, "$field", "", 0, "L");
		
		$pdf->SetWidths(array($lbody15));
		$pdf->SetAligns(array("L"));
		$pdf->RowMultiBorderWithHeight(array($data), array(""), $this->height);
	}
	function barisBaru_long($pdf,$section, $field, $data){
		$pdf->SetFont("Arial", "", 8);
		$lbody = $this->lengthCell / 20;
		$lbody1 = $lbody * 1;
		$lbody4 = $lbody * 4;
		$lbody15 = $lbody * 15;
		
		$pdf->Cell($lbody1, $this->height, "$section", "", 0, "L");
		$pdf->Cell($lbody4+$lbody1, $this->height, "$field", "", 0, "L");
		
		$pdf->SetWidths(array($lbody15-$lbody1));
		$pdf->SetAligns(array("L"));
		$pdf->RowMultiBorderWithHeight(array($data), array(""), $this->height);
	}
}