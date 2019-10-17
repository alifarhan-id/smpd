<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_ulang_formulir_surat_teguran_pdf extends CI_Controller{

	var $fontSize = 10;
    var $fontFam = 'Arial';
    var $yearId = 0;
    var $yearCode="";
    var $paperWSize = 241.3;
    var $paperHSize = 279.4;
    var $height = 5;
    var $currX;
    var $currY;
    var $widths;
    var $aligns;

    function __construct() {
        parent::__construct();
        //$this->formCetak();
        $pdf = new FPDF('P','mm',array($this->paperWSize, $this->paperHSize));
        $this->startY = $pdf->GetY();
        $this->startX = $this->paperWSize-42;
        $this->lengthCell = $this->startX+20;
    }

    function newLine(){
        $pdf = new FPDF('P','mm',array($this->paperWSize, $this->paperHSize));
        $pdf->Cell($this->lengthCell, $this->height, "", "", 0, 'L');
        $pdf->Ln();
    }
	
	
	function pageCetak() {
		$p_year_period_id = getVarClean("p_year_period_id", "int", 0);
		$p_finance_period_id = getVarClean("p_finance_period_id", "int", 0);
		$sequence_no = getVarClean("sequence_no", "int", 0);
		$pejabat = getVarClean("pejabat","int", 1);
		$p_vat_type_id = getVarClean("p_vat_type_id", "int", 1);
		$jenis_wp = getVarClean("jenis_wp", "int", 1);
		$p_region_id_kecamatan = getVarClean("p_region_id_kecamatan", "int", 0);
		$p_region_id_kelurahan = getVarClean("p_region_id_kelurahan", "int", 0);

        $param =  array('p_year_period_id' =>$p_year_period_id,
                        'p_finance_period_id'=>$p_finance_period_id,
                        'sequence_no'=>$sequence_no,
                        'pejabat'=>$pejabat,
                        'p_vat_type_id'=>$p_vat_type_id,
                        'jenis_wp'=>$jenis_wp,
                        'p_region_id_kecamatan'=>$p_region_id_kecamatan,
                        'p_region_id_kelurahan'=>$p_region_id_kelurahan);

		$data = $this->getData($param);
		
		$pdf = new FPDF('P','mm',array($this->paperWSize, $this->paperHSize));

		for ($i=0; $i <count($data) ; $i++) { 
			$this->header($pdf, $data[$i]);
			$this->isiSurat($pdf, $data[$i]);
			$this->tandaTangan($pdf, $data[$i]);
		}

		$pdf->Output();
	}

	function tandaTangan($pdf, $data){
		$pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'L');
		$pdf->Ln();
		
		$lbody = $this->lengthCell / 16;
		$lbody2 = $lbody * 2;
		$lbody4 = $lbody * 4;

		$pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell($lbody2, $this->height, "", "L", 0, 'C');
		$pdf->Cell($lbody4, $this->height, "", "", 0, 'C');
		$pdf->Cell($lbody4, $this->height, "", "", 0, 'C');
		$pdf->Cell($lbody2, $this->height, getValByCode('ALAMAT_3').", " .$data['letter_date_txt']. 
		//. $data["tanggal"],
		"", 0, 'C');
		$pdf->Cell($lbody4, $this->height, "", "R", 0, 'C');
		$pdf->Ln();
		
		$pdf->Cell($lbody2, $this->height, "", "L", 0, 'C');
		$pdf->Cell($lbody4, $this->height, "", "", 0, 'C');
		$pdf->Cell($lbody4, $this->height, "", "", 0, 'C');
		
		$pdf->Cell($lbody2, $this->height, "KEPALA ".getValByCode('INSTANSI_2'), "", 0, 'C');
		$pdf->Cell($lbody4, $this->height, "", "R", 0, 'C');
		//$this->Ln();
		
		$pdf->Cell($lbody2, $this->height, "", "L", 0, 'C');
		$pdf->Cell($lbody4, $this->height, "", "", 0, 'C');
		$pdf->Cell($lbody4, $this->height, "", "", 0, 'C');
		$pdf->Cell($lbody4, $this->height, 
		//"Kepala Bidang Pajak Pendaftaran"
		"", "", 0, 'C');
		$pdf->Cell($lbody2, $this->height, "", "R", 0, 'C');
		$pdf->Ln();
		$posy = $pdf->getY();

		$pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'L');
		$pdf->Ln();

		$pdf->Cell($lbody2, $this->height, "", "L", 0, 'C');
		$pdf->Cell($lbody4, $this->height, "", "", 0, 'L');
		$pdf->Cell($lbody4-5, $this->height, "", "", 0, 'C');
		$pdf->Cell($lbody4+10, $this->height, "", "", 0, 'C');
		$pdf->Cell($lbody2-5, $this->height, "", "R", 0, 'C');
		$pdf->Ln();
		$pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell($lbody2-13, $this->height, "", "L", 0, 'C');
		$pdf->Cell($lbody4, $this->height, "", "", 0, 'L');
		$pdf->Cell($lbody4-5, $this->height, "", "", 0, 'C');
		$pejabat = getVarClean("pejabat","int", 1);
		if ($pejabat == 3){
			$pdf->Cell($lbody4+10, $this->height, "Drs. H. EMA SUMARNA, M. Si", "B", 0, 'C');
			
			$pdf->Image(base_url().'qrcode/generate-qr.php?param='.
							str_replace(" ","-",$data['letter_date_txt'])."_".
							$data["npwd"]."_".
							str_replace(" ","-",$data["periode"])."_".
							"Drs-H-GUN-GUN-SUMARYANA"
							//"Drs. H. EMA SUMARNA, M. Si"
							,149,$posy,25,25,'PNG'
						);
		}else{
			if ($pejabat == 1){
				$pdf->Cell($lbody4+10, $this->height, "Drs. H. GUN GUN SUMARYANA", "B", 0, 'C');
				$pdf->Image(base_url().'qrcode/generate-qr.php?param='.
				str_replace(" ","-",$data['letter_date_txt'])."_".
				$data["npwd"]."_".
				str_replace(" ","-",$data["periode"])."_".
				"Drs-H-GUN-GUN-SUMARYANA"
				,28,$posy,25,25,'PNG');
			}else{
				$pdf->Cell($lbody4+10, $this->height, "H. SONI BAKHTIAR, S.Sos, M.Si.", "B", 0, 'C');
				//$pdf->Image('../images/ttd_pa_soni.jpg',$lbody2+$lbody4+$lbody4-20,178,$lbody4+48,20);
				$pdf->Image(base_url().'qrcode/generate-qr.php?param='.
				str_replace(" ","-",$data['letter_date_txt'])."_".
				$data["npwd"]."_".
				str_replace(" ","-",$data["periode"])."_".
				"H-SONI-BAKHTIAR-S-Sos-M-Si"
				,28,$posy,25,25,'PNG');
			}
		}
		$pdf->Cell($lbody2+8 , $this->height, "", "R", 0, 'C');
		$pdf->Ln();
		
		$pdf->Cell($lbody2-12, $this->height, "", "L", 0, 'C');
		$pdf->Cell($lbody4, $this->height, "", "", 0, 'L');
		$pdf->Cell($lbody4, $this->height, "", "", 0, 'C');
		if ($pejabat == 1 || $pejabat == 3){
			//$this->Cell($lbody4 - 2, $this->height, "NIP. 19700806 199101 1 001", "", 0, 'C'); //isi nip
			$pdf->Cell($lbody4 - 2, $this->height, "NIP.  19661207 198603 1 006", "", 0, 'C'); //isi nip
		}else{
			$pdf->Cell($lbody4 - 2, $this->height, "NIP. 19750625 199403 1 001", "", 0, 'C'); //isi nip
		}
		$pdf->Cell(14, $this->height, "", "", 0, 'L');
		$pdf->Cell($lbody2, $this->height, "", "R", 0, 'C');
		$pdf->Ln(3);
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell($lbody2, $this->height, " Catatan :", "L", 0, 'L');
		$pdf->Cell($lbody4+137.1, $this->height, "", "R", 0, 'L');
		$pdf->Ln(3);
		$pdf->Cell($lbody2, $this->height, " - surat ini ditandatangani secara elektronik;", "L", 0, 'L');
		$pdf->Cell($lbody4+137.1, $this->height, "", "R", 0, 'L');
		$pdf->Ln(3);
		$pdf->Cell($lbody2, $this->height, " - Abaikan surat ini jika telah melaksanakan pembayaran Pajak Daerah;", "L", 0, 'L');
		$pdf->Cell($lbody4+137.1, $this->height, "", "R", 0, 'L');
		$pdf->Ln(3);
		if( $data["sequence_no"] == 1) {
			$pdf->Cell($lbody2, $this->height, " - Jika dalam waktu 7 ( tujuh ) hari sejak diterima Surat Teguran I ini belum melaksanakan", "L", 0, 'L');
			$pdf->Cell($lbody4+137.1, $this->height, "", "R", 0, 'L');
			$pdf->Ln(3);
			$pdf->Cell($lbody2, $this->height, "   pembayaran Pajak Daerah, maka akan disampaikan Surat Teguran II dan dapat disertai", "L", 0, 'L');
			$pdf->Cell($lbody4+137.1, $this->height, "", "R", 0, 'L');
			$pdf->Ln(3);
			$pdf->Cell($lbody2, $this->height, "   penempelan sticker/spanduk/media peringatan pada lokasi objek pajak.", "L", 0, 'L');
			$pdf->Cell($lbody4+137.1, $this->height, "", "R", 0, 'L');
			$pdf->Ln(3);
		}
		if( $data["sequence_no"] == 2) {
			$pdf->Cell($lbody2, $this->height, " - Jika  dalam waktu 7 ( tujuh ) hari sejak diterima Surat Teguran II ini belum  melaksanakan", "L", 0, 'L');
			$pdf->Cell($lbody4+137.1, $this->height, "", "R", 0, 'L');
			$pdf->Ln(3);
			$pdf->Cell($lbody2, $this->height, "   pembayaran Pajak Daerah, maka  akan disampaikan Surat Teguran III dan dapat disertai", "L", 0, 'L');
			$pdf->Cell($lbody4+137.1, $this->height, "", "R", 0, 'L');
			$pdf->Ln(3);
			$pdf->Cell($lbody2, $this->height, "   dengan   pengumuman  di  surat  kabar  sebagai  penunggak  Pajak  Daerah. Selanjutnya", "L", 0, 'L');
			$pdf->Cell($lbody4+137.1, $this->height, "", "R", 0, 'L');
			$pdf->Ln(3);
			$pdf->Cell($lbody2, $this->height, "   jumlah pajak yang harus dibayar akan ditetapkan secara jabatan ditambah dengan sanksi", "L", 0, 'L');
			$pdf->Cell($lbody4+137.1, $this->height, "", "R", 0, 'L');
			$pdf->Ln(3);
			$pdf->Cell($lbody2, $this->height, "   administrasi berupa denda kenaikan pajak dan bunga keterlambatan.", "L", 0, 'L');
			$pdf->Cell($lbody4+137.1, $this->height, "", "R", 0, 'L');
			$pdf->Ln(3);
		}
		if( $data["sequence_no"] == 3) {
			$pdf->Cell($lbody2, $this->height, " - Jika dalam waktu 2 x 24 jam sejak diterimanya Surat Teguran III ini belum melaksanakan", "L", 0, 'L');
			$pdf->Cell($lbody4+137.1, $this->height, "", "R", 0, 'L');
			$pdf->Ln(3);
			$pdf->Cell($lbody2, $this->height, "   pembayaran Pajak Daerah, maka akan disampaikan penagihan dengan Surat Paksa.", "L", 0, 'L');
			$pdf->Cell($lbody4+137.1, $this->height, "", "R", 0, 'L');
			$pdf->Ln(3);
		}
		
		$pdf->SetFont('BKANT', '', 12);
		
		$pdf->Cell(10, $this->height, "", "BL", 0, 'L');
		
		$pdf->Cell($this->lengthCell - 10, $this->height, "", "BR", 0, 'L');
	}

	function isiSurat($pdf, $data){

		$pdf->Cell($this->lengthCell, $this->height, "SURAT TEGURAN ".$this->numberToRoman($data['sequence_no']), "LR", 0, 'C');
		$pdf->Ln();
		//$pdf->Ln();
		$this->newLine();
		
		$pdf->SetFont('BKANT', '', 12);
		/*$pdf->Cell($this->lengthCell, $this->height, "Nomor: ".$data["letter_no"], "LR", 0, 'C');
		$this->newLine();*/
		$pdf->SetWidths(array(10,204.3, 5));
		$pdf->RowMultiBorderWithHeight(array("",
				"Menurut pembukuan kami hingga saat ini Saudara belum melapor dan/atau membayar pajak daerah sebagai berikut:",
				""
			),
			array("L",
				"",
				"R"
			),
			$this->height
		);
		//$this->newLine();
		// Tabel
		$ltable = ($this->lengthCell - 15) / 14;
		$ltable1 = $ltable * 1;
		$ltable2 = $ltable * 2;
		$ltable3 = $ltable * 3;
		$ltable6 = $ltable * 6;
		$ltable4 = $ltable * 4;
		
		$pdf->SetWidths(array(10, $ltable4, $ltable2, $ltable2+5, $ltable3-5, $ltable3, 5));
		$pdf->SetAligns(array("L", "C", "C", "C", "C", "C", "L"));
		
		$title_kolom4 = 'SPTPD';
		$title_kolom5 = 'TGL. SETOR';

		if( $data["sequence_no"] == 3) {
			$title_kolom4 = 'NO SKPDKB';
			$title_kolom5 = 'SKPDKB JABATAN';
		}
		
		if( $data["sequence_no"] == 3) {
			$pdf->RowMultiBorderWithHeight(
			array("",
				"JENIS PAJAK",
				"TAHUN",
				"MASA PAJAK",
				$title_kolom4,
				$title_kolom5,
				""
			),
			array("LR",
				"TBLR",
				"TBLR",
				"TBLR",
				"TBLR",
				"TBLR",
				"LR"
			),
			$this->height
			);
		}else{
			$pdf->SetWidths(array(50, $ltable4, $ltable2, $ltable2+5, $ltable3-5, $ltable3, 5-40));
			$pdf->RowMultiBorderWithHeight(
			array("",
				"JENIS PAJAK",
				"TAHUN",
				"MASA PAJAK",
				"",
				"",
				""
			),
			array("LR",
				"TBLR",
				"TBLR",
				"TBLR",
				"",
				"",
				"R"
			),
			$this->height
			);
			$pdf->SetWidths(array(10, $ltable4, $ltable2, $ltable2+5, $ltable3-5, $ltable3, 5));
		}

		
		$pdf->SetAligns(array("L", "C", "C", "C", "C", "C", "L"));
		$tahun = explode(" ",$data["periode"]);

		$bulan_periode = explode(",",$data['debt_period_code']);
		$bulan_string='';
		$i=0;
		foreach($bulan_periode as $item ){
			$bulan = explode(" ",$item);
			$bulan_string.= $bulan[0];
			$i++;
			if(!empty($bulan_periode[$i])){
				$bulan_string.="\n";
			}
		}

		if( $data["sequence_no"] == 3) {

			$pdf->RowMultiBorderWithHeight(
				array("",
					$data["vat_code"],
					$tahun[1],
					$bulan_string,
					$data["tap_no"],
					number_format($data["debt_amount"],0,",","."),
					""
				),
				array("LR",
					"TBLR",
					"TBLR",
					"TBLR",
					"TBLR",
					"TBLR",
					"LR"
				),
				$this->height
			);

		} else {
			$pdf->SetWidths(array(50, $ltable4, $ltable2, $ltable2+5, $ltable3-5, $ltable3, 5-40));
			$pdf->RowMultiBorderWithHeight(
				array("",
					$data["vat_code"],
					$tahun[1],
					$bulan_string,
					"",
					"",
					""
				),
				array("LR",
					"TBLR",
					"TBLR",
					"TBLR",
					"",
					"",
					"R"
				),
				$this->height
			);
			$pdf->SetWidths(array(10, $ltable4, $ltable2, $ltable2+5, $ltable3-5, $ltable3, 5));
		}
		
		$lbody = $this->lengthCell / 4;
		$lbody1 = $lbody * 1;
		$lbody2 = $lbody * 2;
		$lbody3 = $lbody * 3;
		$data["terbilang"]=trim($data["terbilang"]);
		$pdf->Cell(20, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lbody1 - 20,"", "", 0, 'L');	
		$pdf->Cell($lbody3, $this->height, "", "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->SetWidths(array(10,$this->lengthCell-15,5));
		$pdf->SetAligns(array("L", "J", "C"));
		$pdf->RowMultiBorderWithHeight(
				array("",
					"Untuk mencegah tindakan penagihan dengan penetapan pajak ditambah sansi administrasi secara jabatan berdasarkan ".
					"Undang-undang Nomor 28 Tahun 2009 dan Peraturan Daerah Nomor 20 Tahun 2011 Ps 70, maka diminta kepada Saudara agar ".
					"melapor dan/atau membayar pajak anda dalam waktu 7 (tujuh) hari setelah Surat Teguran ini. Setelah batas waktu tersebut ".
					"tindakan penagihan akan dilanjutkan dengan penetapan pajak ditambah sanksi administrasi secara jabatan.",
					""
				),
				array("L",
					"",
					"R"
				),
				$this->height
			);
		$this->tulis("", "L", $pdf);
		
		$this->tulis("Apabila saudara telah melaksanakan pembayaran pajak tersebut, kami mohon untuk dapat memperlihatkan", "FJ", $pdf);
		$this->tulis("SSPD yang telah divalidasi dengan melampirkan photo copy dokumen yang dimaksud.", "L", $pdf);
		$this->tulis("", "L", $pdf);
		$this->tulis("Demikian agar menjadi maklum, atas perhatian dan kerjasamanya kami ucapkan terima kasih.", "L", $pdf);
		
	}

	function header($pdf, $data){
		$pdf->AliasNbPages();
		$pdf->SetLeftMargin(10);
		$pdf->SetTopMargin(2);
		$pdf->AddPage("P");
		$pdf->AddFont('BKANT');
		
		$lheader = $this->lengthCell / 8;
		$lheader1 = $lheader * 1;
		$lheader2 = $lheader * 2;
		$lheader3 = $lheader * 3;
		$lheader4 = $lheader * 4;
		$lheader7 = $lheader * 7;
		
		$pdf->SetFont('Arial', 'B', 8);
		
		$pdf->Image(getValByCode('LOGO'),3,3,15,15);
		$pdf->Cell(8, 3, "", "", 0, 'L');
		$pdf->Cell(70, 3, getValByCode('INSTANSI_1'), "", 0, 'C');
		$pdf->Ln();
		
		//$this->SetFont('BKANT', '', 16);
		$pdf->Cell(8, 3, "", "", 0, 'L');
		$pdf->Cell(70, 3, getValByCode('INSTANSI_2'), "", 0, 'C');
		$pdf->Ln();
		
		$pdf->SetFont('Arial', '', 6);
		$pdf->Cell(8, 3, "", "", 0, 'L');
		$pdf->Cell(70, 3, getValByCode('ALAMAT_6')." TELP ".getValByCode('ALAMAT_2')." FAX. ".getValByCode('ALAMAT_4'), "", 0, 'C');
		$pdf->Ln();
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(8, 3, "", "", 0, 'L');
		$pdf->Cell(70, 3, strtoupper(getValByCode('ALAMAT_3')), "", 0, 'C');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->Cell($lheader1, $this->height, "", "", 0, 'L');
		$pdf->Cell($lheader7, $this->height, "", "", 0, 'C');
		$pdf->Ln();
		$pdf->Cell($lheader1, $this->height, "", "", 0, 'L');
		$pdf->Cell($lheader7, $this->height, "", "", 0, 'C');
		$pdf->Ln();
		
		$pdf->Cell($this->lengthCell, $this->height, "", "TLR", 0, 'L');
		$pdf->Ln();
		
		$pdf->SetFont('BKANT', '', 12);
		$lbody = $this->lengthCell / 4;
		$lbody1 = $lbody * 1;
		$lbody2 = $lbody * 2;
		$lbody3 = $lbody * 3;

		$pdf->SetWidths(array(20,2,$this->lengthCell-22));
		$pdf->SetAligns(array("L","L","L"));
		$posy = $pdf->getY();
		$data["letter_no"]=trim($data["letter_no"]);
		$no_surat = getVarClean("no_surat","str", "");
		if(!empty($no_surat)){
			$pdf->RowMultiBorderWithHeight(
				array("Nomor",
					":",
					" 973 / ".$no_surat." - BPPD"
					//" - "
				),
				array("",
					"",
					""
				),
				3
			);
		}else{
			$pdf->RowMultiBorderWithHeight(
				array("Nomor",
					":",
					" 973 /       - BPPD"
					//" - "
				),
				array("",
					"",
					"R"
				),
				3
			);
		}
		$pdf->RowMultiBorderWithHeight(
			array("Perihal",
				":",
				" SURAT TEGURAN"
			),
			array("L",
				"",
				""
			),
			3
		);

		$pdf->setY($posy-3);
		$today = getdate();
		$lkepada = $this->lengthCell / 5;
		$lkepada2 = $lkepada * 2;
		$lkepada3 = $lkepada * 3;
		
		$pdf->Cell($lkepada3, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lkepada2, $this->height, getValByCode('ALAMAT_3').", ".$data['letter_date_txt'], "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell($lkepada3, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lkepada2, $this->height, "Kepada Yth,", "R", 0, 'L');
		$pdf->Ln(6);

		$pdf->SetAligns(array("L","L","L","L"));
		$pdf->SetWidths(array($lkepada3,22,2,63.7));
		$pdf->RowMultiBorderWithHeight(
			array("",
				"Pimpinan",
				":",
				$data['company_name']
			),
			array("L",
				"",
				"",
				"R"
			),
			$this->height/2
		);
		
		$pdf->SetAligns(array("L","L","L","L"));
		$pdf->SetWidths(array($lkepada3,22,2,63.7));
		$pdf->RowMultiBorderWithHeight(
			array("",
				"NPWPD",
				":",
				$data['npwd']
			),
			array("L",
				"",
				"",
				"R"
			),
			$this->height/2
		);
		
		$pdf->SetWidths(array($lkepada3,$lkepada2));
		$pdf->SetAligns(array("L","L"));
		$pdf->RowMultiBorderWithHeight(
			array("",
				$data["address"]."\n".
				"Kec. ".$data["kecamatan"]." Kel. ".$data["kelurahan"]
			),
			array("L",
				"R"
			),
			$this->height
		);
		
		$pdf->Cell($lkepada3, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lkepada2, $this->height, "Di ", "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell($lkepada3, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lkepada2, $this->height, "          Tempat", "R", 0, 'L');
		$pdf->Ln();
		
		// $this->Cell($lkepada3, $this->height, "", "L", 0, 'L');
		// $this->Cell($lkepada2, $this->height, "", "R", 0, 'C');
		// $this->Ln();
		$pdf->Cell($lkepada3, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lkepada2, $this->height, "", "R", 0, 'C');
		$pdf->Ln();
	}

	function getData($param = array()){

		if ($param['p_region_id_kecamatan']==""){
			$param['p_region_id_kecamatan']=0;
		}
		if ($param['p_region_id_kelurahan']==""){
			$param['p_region_id_kelurahan']=0;
		}

		$sql="select * from t_debt_letter where 
			p_finance_period_id=".$param['p_finance_period_id']." and sequence_no = ".$param['sequence_no'];
		//echo $query;exit;
		$query = $this->db->query($sql);
		$result = $query->row_array();
		$t_customer_order_id = $result['t_customer_order_id'];


		if(empty($t_customer_order_id)||$t_customer_order_id==""){
			echo "data tidak ada";
			exit();
		}else{
		//$dbConn = new clsDBConnSIKP();

		//nip & nama
			$ttd = "SELECT value as nama_kadin, value_2 as nip_kadin "
				  ."FROM p_global_param "
				  ."WHERE code = 'TTD KADIN'";
				  
			$query = $this->db->query($ttd);
			$result = $query->row_array();
			
			$nama_kadin = "";
			$nip_kadin = "";

			$nama_kadin = $result["nama_kadin"];
			$nip_kadin = $result["nip_kadin"];

		$sql="select trim(regexp_replace(periode, '\s+', ' ', 'g'))as periode_v2,nvl(brand_address_rt,'-') as brand_address_rt,nvl(brand_address_rw,'-') as brand_address_rw,
				kec.region_name as kecamatan, kel.region_name as kelurahan,* from f_debt_letter_print2(".$t_customer_order_id.") AS tbl (ty_debt_letter_list)
				LEFT JOIN t_cust_account as b ON tbl.t_cust_account_id = b.t_cust_account_id
				left join p_region kec on kec.p_region_id = b.brand_p_region_id_kec
				left join p_region kel on kel.p_region_id = b.brand_p_region_id_kel
				WHERE b.p_vat_type_dtl_id NOT IN (11, 15, 17, 21, 27, 30, 41, 42, 43) 
				and b.p_vat_type_dtl_id in (select p_vat_type_dtl_id from p_vat_type_dtl where p_vat_type_id = ".$param['p_vat_type_id'].")
				and case 
						when ".$param['jenis_wp']." = 1 then true
						when ".$param['jenis_wp']." = 2 then (b.npwpd_jabatan is null or b.npwpd_jabatan!='Y')
						when ".$param['jenis_wp']." = 3 then b.npwpd_jabatan = 'Y'
					end
				and case 
						when ".$param['p_region_id_kecamatan']." = 0 then true
						else ".$param['p_region_id_kecamatan']." = b.brand_p_region_id_kec
					end
				and case 
						when ".$param['p_region_id_kelurahan']." = 0 then true
						else ".$param['p_region_id_kelurahan']." = b.brand_p_region_id_kel
					end
				order by b.company_brand";

		$query = $this->db->query($sql);
		$data = $query->result_array();
		//echo $query;exit;
		return $data;

		}
	}

	function tulis($text, $align, $pdf){
		$pdf->Cell(10, $this->height, "", "L", 0, 'C');
		$pdf->Cell(204.3, $this->height, $text, "", 0, $align, "", "");
		$pdf->Cell(5, $this->height, "", "R", 0, 'C');
		$pdf->Ln();
	}

	function numberToRoman($num){
     // Make sure that we only use the integer portion of the value
		$n = intval($num);
		$result = '';

		// Declare a lookup array that we will use to traverse the number:
		$lookup = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
		'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
		'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);

		foreach ($lookup as $roman => $value){
			// Determine the number of matches
			$matches = intval($n / $value);

			// Store that many characters
			$result .= str_repeat($roman, $matches);

			// Substract that from the number
			$n = $n % $value;
		}

	// The Roman numeral should be built, return it
		return $result;
 	}
}