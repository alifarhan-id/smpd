<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_rep_pengurangan_bphtb_surat_keputusan extends CI_Controller{
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

		$data = $this->getDataSuratKeputusan($t_bphtb_registration_id);

		if($t_bphtb_registration_id != 0){
			$pdf = new FPDF();

			$lbody = $this->lengthCell / 20;
			$lbody1 = $lbody * 1;
			$lbody4 = $lbody * 4;
			$lbody10 = $lbody * 15;

			$pdf->AliasNbPages();
			$pdf->AddPage("P");
			$pdf->Image(getValByCode('LOGO'),10,10,20,20);

			$pdf->SetFont("Arial", "B", 10);
			$pdf->Cell($this->lengthCell, $this->height, "", "", 0, "C");
			$pdf->Ln();
			$pdf->Cell($this->lengthCell, $this->height, getValByCode('INSTANSI_1'), "", 0, "C");
			$pdf->Ln();
			$pdf->SetFont("Arial", "B", 14);
			$pdf->Cell($this->lengthCell, $this->height, getValByCode('INSTANSI_2'), "", 0, "C");
			$pdf->Ln();
			$pdf->SetFont("Arial", "B", 8);
			$pdf->Cell($this->lengthCell, $this->height, getValByCode('ALAMAT_6')." Telp : ".getValByCode('ALAMAT_4')." ".getValByCode('ALAMAT_3'), "B", 0, "C");
			$pdf->Ln();
			$pdf->Ln();

			$pdf->SetFont("Arial", "B", 8);
			$pdf->SetWidths(array($this->lengthCell));
			$pdf->SetAligns(array("C"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	getValByCode('INSTANSI_1')." \nKEPUTUSAN KEPALA ".strtoupper(getValByCode('INSTANSI_2'))." \nNOMOR : "."                                   ".
					"\nPEMBERIAN PENGURANGAN \nBEA PEROLEHAN HAK ATAS TANAH DAN BANGUNAN \nYANG TERUTANG \nKEPALA ".strtoupper(getValByCode('INSTANSI_3'))
				),
				array
				(
					""
				),
				$this->height-1);
			$pdf->Ln();

			$pdf->SetFont("Arial", "", 8);
			$pdf->SetWidths(array($lbody1+$lbody1,$this->lengthCell-$lbody1-$lbody1));
			$pdf->SetAligns(array("L","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"Membaca",
					": Surat Permohonan Pengurangan Bea Perolehan Hak atas Tanah dan Bangunan atas nama"
				),
				array
				(
					"",""
				),
				$this->height-1);
			$pdf->SetWidths(array($lbody1+$lbody1,$lbody1+$lbody1+$lbody1,$this->lengthCell-$lbody1-$lbody1-$lbody1-$lbody1-$lbody1));
			$pdf->SetAligns(array("L","L","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"",
					"   - Nama",
					": ".$data["wp_name"]
				),
				array
				(
					"","",""
				),
				$this->height-1);
			$pdf->SetWidths(array($lbody1+$lbody1,$lbody1+$lbody1+$lbody1,$this->lengthCell-$lbody1-$lbody1-$lbody1-$lbody1-$lbody1));
			$pdf->SetAligns(array("L","L","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"",
					"   - ".$data['opsi_a2'],
					": ".$data['opsi_a2_keterangan']
				),
				array
				(
					"","",""
				),
				$this->height-1);
			$pdf->Ln();

			$pdf->SetWidths(array($lbody1+$lbody1,6,$this->lengthCell-$lbody1-$lbody1-6));
			$pdf->SetAligns(array("L","J","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"Menimbang",
					": a.",
					"Hasil pemeriksaan atas permohonan pengurangan Bea Perolehan Hak atas Tanah dan Bangunan yang terutang sebagaimana pemeriksaan"
				),
				array
				(
					"","",""
				),
				$this->height-1);
			$pdf->SetWidths(array($lbody1+$lbody1+6,$lbody1+$lbody1+$lbody1-6,$this->lengthCell-$lbody1-$lbody1-$lbody1-$lbody1-$lbody1));
			$pdf->SetAligns(array("L","L","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"",
					"Nomor",
					": ".$data['nomor_berita_acara']
				),
				array
				(
					"","",""
				),
				$this->height-1);
			$pdf->SetWidths(array($lbody1+$lbody1+6,$lbody1+$lbody1+$lbody1-6,$this->lengthCell-$lbody1-$lbody1-$lbody1-$lbody1-$lbody1));
			$pdf->SetAligns(array("L","L","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"",
					"Tanggal",
					": ".$this->beautyDate($data['tanggal_berita_acara'])
				),
				array
				(
					"","",""
				),
				$this->height-1);
			$pdf->SetWidths(array($lbody1+$lbody1,6,$this->lengthCell-$lbody1-$lbody1-6));
			$pdf->SetAligns(array("L","R","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"",
					" b.",
					"Bahwa terdapat/tidak terdapat )* cukup alasan untuk mengurangkan besarnya Bea Perolehan Hak atas Tanan dan Bangunan yang terutang"
				),
				array
				(
					"","",""
				),
				$this->height-1);
			$pdf->Ln();

			$pdf->SetWidths(array($lbody1+$lbody1,6,$this->lengthCell-$lbody1-$lbody1-6));
			$pdf->SetAligns(array("L","R","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"Mengingat",
					": 1.",
					"Peraturan Daerah Nomor 20 Tahun 2011 tentang Pajak Daerah, sebagaimana diubah dengan Peraturan Daerah No. 06 Tahun 2016;"
				),
				array
				(
					"","",""
				),
				$this->height-1);
			$pdf->SetWidths(array($lbody1+$lbody1,6,$this->lengthCell-$lbody1-$lbody1-6));
			$pdf->SetAligns(array("L","R","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"",
					" 2.",
					"Peraturan Bupati Nomor 308 Tahun 2013 tentang Tata Cara Pemungutan dan Standar Operasional Prosedur Bea Perolehan Hak atas Tanah dan Bangunan"
				),
				array
				(
					"","",""
				),
				$this->height-1);
			$pdf->Ln();

			$pdf->SetFont("Arial", "B", 8);
			$pdf->SetWidths(array($this->lengthCell));
			$pdf->SetAligns(array("C"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"MEMUTUSKAN"
				),
				array
				(
					""
				),
				$this->height-1);
			$pdf->Ln();
			
			$pdf->SetFont("Arial", "", 8);
			$pdf->SetWidths(array($lbody1+$lbody1,3,$this->lengthCell-$lbody1-$lbody1-3));
			$pdf->SetAligns(array("L","J","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"Menetapkan",":",
					"KEPUTUSAN KEPALA ".strtoupper(getValByCode('INSTANSI_3'))." TENTANG PEMBERIAN PENGURANGAN BEA PEROLEHAN HAK ATAS TANAH DAN BANGUNAN YANG TERUTANG"
				),
				array
				(
					"","",""
				),
				$this->height-1);
			$pdf->Ln();	

			$pdf->SetFont("Arial", "", 8);
			$pdf->SetWidths(array($lbody1+$lbody1,3,$this->lengthCell-$lbody1-$lbody1-3));
			$pdf->SetAligns(array("L","J","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"PERTAMA",":",
					"Mengabulkan seluruhnya/mengabaikan sebagian/menolak permohonan pengurangan Bea Perolehan Hak atas Tanah dan Bangunan (BPHTB) yang terutang kepada wajib pajak"
				),
				array
				(
					"","",""
				),
				$this->height-1);

			$pdf->SetFont("Arial", "B", 12);
			$this->barisBaru($pdf,"", "Nama Wajib Pajak", ": " . $data["wp_name"]);
			$this->barisBaru($pdf,"", $data['opsi_a2'], ": ".$data['opsi_a2_keterangan']);
			$this->barisBaru($pdf,"", "Alamat Wajib Pajak", ": " . $data["wp_address_name"]);
			$this->barisBaru($pdf,"", "RT/RW", ": RT. " . $data["wp_rt"] . "/RW. " .  $data["wp_rw"]);
			$this->barisBaru($pdf,"", "Kelurahan/Desa", ": " . $data["wp_kelurahan"]);
			$this->barisBaru($pdf,"", "Kecamatan", ": " . $data["wp_kecamatan"]);
			$this->barisBaru($pdf,"", "Kabupaten/Kota", ": " . $data["wp_kota"]);
			$this->barisBaru($pdf,"", "Tahun BPHTB", ": ".date("Y"));
			$this->barisBaru_special($pdf,"", "Atas perolehan hak atas tanah dan/atau bangunannya dengan", ": ".$data['jenis_perolehan_hak']);
			$this->barisBaru($pdf,"", "Akta/Risalah Lelang/Keputusan Pemberian Hak/Putusan Hakim/Dokumen lainnya)**", "");
			$this->barisBaru($pdf,"", $data['keterangan_opsi_c']."", "");
			$this->barisBaru($pdf,"", "Nomor", ": ".$data['opsi_b7_keterangan']);
			$this->barisBaru($pdf,"", "Tanggal", ": ".$this->beautyDate($data['tanggal_sk']));
			$this->barisBaru($pdf,"", "NOP PBB", ": " . $data["njop_pbb"]);
			$this->barisBaru($pdf,"", "NJOP", ": Rp. ".number_format($data['npop'], 0, ",", "."));
			$this->barisBaru($pdf,"", "Alamat", ": " . $data["object_address_name"]);
			$this->barisBaru($pdf,"", "RT/RW", ": RT. " . trim($data["object_rt"]). "/RW. " . $data["object_rw"]);
			$this->barisBaru($pdf,"", "Kelurahan/Desa", ": " . $data["object_kelurahan"]);
			$this->barisBaru($pdf,"", "Kecamatan", ": " . $data["object_kecamatan"]);
			$this->barisBaru($pdf,"", "Kabupaten/Kota", ": " . $data["object_region"]);
			$pdf->Ln();

			$pdf->SetWidths(array($lbody1+$lbody1,3,$this->lengthCell-$lbody1-$lbody1-3));
			$pdf->SetAligns(array("L","J","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"KEDUA",":",
					"Sesuai dengan keputusan sebagaimana dimaksud pada dictum PERTAMA maka besarnya BPHTB yang seharusnya dibayar adalah sebagai berikut :"
				),
				array
				(
					"","",""
				),
				$this->height-1);
			
			$this->barisBaru2($pdf,$lbody1+$lbody1+3, "- Nilai Perolehan Objek Pajak (NPOP)", "", "Rp", $data["npop"]);
			$this->barisBaru2($pdf,$lbody1+$lbody1+3, "- Nilai Perolehan Objek Pajak Tidak Kena Pajak (NPOPTKP)", "", "Rp", $data["npop_tkp"]);
			if($data["npop_kp"]==0){
				$this->barisBaruStr($pdf,$lbody1+$lbody1+3, "- Nilai Perolehan Objek Pajak Kena Pajak (NPOPKP)", "", "Rp","NIHIL");
			}else{
				$this->barisBaru2($pdf,$lbody1+$lbody1+3, "- Nilai Perolehan Objek Pajak Kena Pajak (NPOPKP)", "", "Rp", $data["npop_kp"]);
			}
			
			if($data["npop_kp"]==0){
				$this->barisBaruStr($pdf,$lbody1+$lbody1+3, "- Bea Perolehan Hak atas Tanah dan Bangunan yang terutang", "5%", "Rp", "NIHIL");
			}else{
				$this->barisBaru2($pdf,$lbody1+$lbody1+3, "- Bea Perolehan Hak atas Tanah dan Bangunan yang terutang", "5%", "Rp", $data["bphtb_amt"]);
			}

			$pdf->Cell($lbody1+$lbody1+3, $this->height, "", "", 0, "");
			$pdf->Cell($this->lengthCell - $lbody1+$lbody1+3, $this->height, "- Pengenaan Pengurangan Karena ".$data['jenis_perolehan_hak'], "", 0, "");
			$pdf->Ln();
			$this->barisBaru2($pdf,$lbody1+$lbody1+3, "- Besaran Pengenaan Pengurangan ", $data['persen_pengurangan']."%", "Rp", $data["bphtb_discount"]);

			if($data["npop_kp"]==0){
				$this->barisBaruStr($pdf,$lbody1+$lbody1+3, "- Bea Perolehan Hak atas Tanah dan Bangunan yang harus dibayar", "", "Rp", "NIHIL");
			}else{
				$this->barisBaru3($pdf,$lbody1+$lbody1+3, "- Bea Perolehan Hak atas Tanah dan Bangunan yang harus dibayar", "", "Rp", $data["bphtb_amt_final"]);
			}

			$pdf->Cell($lbody1+$lbody1+3, $this->height, "", "", 0, "");
			$pdf->Cell($lbody1+ $lbody1, $this->height, "- Terbilang :", "", 0, "");
			$pdf->SetFont("Arial", "iB", 8);
			$pdf->Cell($this->lengthCell - $lbody1- $lbody1- $lbody1-$lbody1-3, $this->height, $data['terbilang'], "", 0, "");
			$pdf->Ln();
			$pdf->Ln();

			$pdf->SetFont("Arial", "", 8);
			$pdf->SetWidths(array($lbody1+$lbody1,3,$this->lengthCell-$lbody1-$lbody1-3));
			$pdf->SetAligns(array("L","J","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"KETIGA",":",
					"Apabila dikemudian hari ternyata terdapat kekeliruan dalam surat keputusan ini maka akan dibetulkan sebagaimana mestinya"
				),
				array
				(
					"","",""
				),
				$this->height-1);
			$pdf->Ln();

			$pdf->SetWidths(array($lbody1+$lbody1,6,$this->lengthCell-$lbody1-$lbody1-6));
			$pdf->SetAligns(array("L","J","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"KEEMPAT",": a.",
					"Asli Keputusan ini disampaikan kepada Wajib Pajak"
				),
				array
				(
					"","",""
				),
				$this->height-1);
			$pdf->SetWidths(array($lbody1+$lbody1,6,$this->lengthCell-$lbody1-$lbody1-6));
			$pdf->SetAligns(array("L","J","J"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"","  b.",
					"Salinan Keputusan ini disimpan sebagai arsip ".strtoupper(getValByCode('INSTANSI_3'))
				),
				array
				(
					"","",""
				),
				$this->height-1);
			$pdf->Ln();

			$ttd = $this->lengthCell / 3;
			$ttd1 = $ttd * 1;
			$ttd2 = $ttd * 2;
			
			$pdf->SetWidths(array($ttd2,$ttd1));
			$pdf->SetAligns(array("C","L"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"",
					"Ditetapkan di ".strtoupper(getValByCode('ALAMAT_3'))." \npada tanggal "
				),
				array
				(
					"",""
				),
				$this->height-1);	
			$pdf->Ln();

			$pdf->SetFont("Arial", "B", 8);
			$pdf->SetWidths(array($ttd2,$ttd1));
			$pdf->SetAligns(array("C","C"));
			if ($data['status_tanggal']==1){
				$pdf->RowMultiBorderWithHeight(
				array
				(	"",
					"KEPALA DINAS PELAYANAN PAJAK\n\n\n\n\nDrs. PRIANA WIRASAPUTRA, MM\nPembina Utama Muda\nNIP. 19600308 198503 1 007"
				),
				array
				(
					"",""
				),
				$this->height-1);
			}else{
				$pdf->RowMultiBorderWithHeight(
				array
				(	"",
					"KEPALA ".strtoupper(getValByCode('INSTANSI_2'))." \n\n\n\n\nDrs. H. Ema Sumarna, M. Si\nPembina Utama Muda IV/C\nNIP. 19661207 198603 1 006"
				),
				array
				(
					"",""
				),
				$this->height-1);
			}		
			
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();

			$pdf->Cell(15, $this->height-2, "Tembusan, ", "B", 0, "L");
			$pdf->SetFont("Arial", "", 8);
			$pdf->Cell(15, $this->height-2, " disampaikan kepada Yth :", "", 0, "L");
			$pdf->Ln();
			
			$pdf->SetWidths(array(100));
			$pdf->SetAligns(array("L"));
			$pdf->RowMultiBorderWithHeight(
				array
				(	"1. Bapak Bupati Kabupaten ".getValByCode('ALAMAT_3')." (sebagai laporan)\n".
					"2. Bapak Wakil Bupati Kabupaten ".getValByCode('ALAMAT_3')." (sebagai laporan)\n".
					"3. Bapak Sekretaris Kabupaten ".getValByCode('ALAMAT_3')." (sebagai laporan)\n".
					"4. Arsip"
				),
				array
				(
					""
				),
				$this->height-1);
			$pdf->Ln();

			$pdf->output();

		}

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
		$pdf->Cell($lbodyx1, $this->height, "$middle", "", 0, "L");
		$pdf->Cell($lbodyx1, $this->height, "$currency", "", 0, "L");
		$pdf->SetFont("Arial", "B", 8);
		$pdf->Cell($lbodyx2, $this->height, number_format($data, 0, ",", "."), "", 0, "R");
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
		$pdf->Cell($lbodyx1, $this->height, "$middle", "", 0, "L");
		$pdf->Cell($lbodyx1, $this->height, "$currency", "", 0, "L");
		$pdf->Cell($lbodyx2, $this->height, number_format($data, 0, ",", "."), "", 0, "R");
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
		
		$pdf->Cell($lbody1+$lbody1+3, $this->height, "$section", "", 0, "L");
		$pdf->Cell($lbody4, $this->height, "$field", "", 0, "L");
		
		$pdf->SetWidths(array($lbody15-$lbody1-3));
		$pdf->SetAligns(array("L"));
		$pdf->RowMultiBorderWithHeight(array($data), array(""), $this->height);
	}

	function barisBaru_special($pdf,$section, $field, $data){
		$pdf->SetFont("Arial", "", 8);
		$lbody = $this->lengthCell / 20;
		$lbody1 = $lbody * 1;
		$lbody4 = $lbody * 4;
		$lbody15 = $lbody * 15;		
		$pdf->SetWidths(array($lbody1+$lbody1+3,$lbody4,$lbody15-$lbody1-3));
		$pdf->SetAligns(array("L","J","J"));
		$pdf->RowMultiBorderWithHeight(array($section,$field,$data), array("","",""), $this->height);
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

	function getDataSuratKeputusan($t_bphtb_registration_id){
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
			h.description as doc_name,
			case when a.creation_date <= to_date('06-01-2016','dd-mm-yyyy') then 1 
			else 0 end as status_tanggal

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
			where j.t_bphtb_registration_id =". $t_bphtb_registration_id;

		$output = $this->db->query($sql);
		$data = $output->row_array();

		$data["persen_pengurangan"] = ceil($data["bphtb_discount"]/$data["bphtb_amt"] * 100);

		$sql2 = "SELECT * FROM f_terbilang('".ceil($data['bphtb_amt_final'])."','') as terbilang";        
        $output = $this->db->query($sql2);
        $items = $output->row_array();

        $data['terbilang'] = ucwords($items['terbilang'])." Rupiah";

		return $data;

	}
}