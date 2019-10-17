<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_formulir_skpdn_pdf extends CI_Controller{
	var $fontSize = 10;
	var $fontFam = 'Arial';
	var $yearId=0;
	var $yearCode="";
	var $paperWSize = 210;
	var $paperHSize = 297;
	var $height = 5;
	var $currX;
	var $currY;
	var $widths;
	var $aligns;

	function __construct() {
		parent::__construct();
        $pdf = new FPDF();        
		$this->startY = $pdf->GetY();
		$this->startX = $this->paperWSize-42;
		$this->lengthCell = $this->startX+20;
	}



	function pageCetak(){
		$idVatSS = getVarClean('t_vat_setllement_id','int',0);

		if(!empty($idVatSS)){
			$data = $this->getDataPdf($idVatSS);

			$pdf = new FPDF(); 
			$pdf->AliasNbPages();
			$pdf->AddPage("P");
			$pdf->SetFont('Arial', '', 6);
			$pdf->Image(getValByCode('LOGO'),12,12,25,25);

			$lheader = $this->lengthCell / 8;
			$lheader1 = $lheader * 1;
			$lheader2 = $lheader * 2;
			$lheader3 = $lheader * 3;
			$lheader4 = $lheader * 4;
			
			$pdf->Cell($lheader1, $this->height, "", "LT", 0, 'L');
			$pdf->Cell($lheader3 - 15, $this->height, "", "TR", 0, 'L');
			$pdf->Cell($lheader2 + 15, $this->height, "", "TR", 0, 'C');
			$pdf->Cell($lheader2, $this->height, "", "TR", 0, 'C');
			$pdf->Ln();

			$pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lheader3 - 15, $this->height, getValByCode('INSTANSI_1'), "R", 0, 'C');
			$pdf->SetFont('Arial', '', 12);
			$pdf->Cell($lheader2 + 15, $this->height, "SKPDN", "R", 0, 'C');
			$pdf->SetFont('Arial', '', 6);
			$pdf->Cell($lheader2, $this->height, "", "R", 0, 'C');
			$pdf->Ln();

			$pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lheader3 - 15, $this->height, getValByCode('INSTANSI_2'), "R", 0, 'C');
			$pdf->SetFont('Arial', '', 8);
			$pdf->Cell($lheader2 + 15, $this->height, "(Surat Keterangan Pajak Daerah Nihil)", "R", 0, 'C');
			$pdf->SetFont('Arial', '', 6);
			$pdf->Cell($lheader2, $this->height, "No. Urut", "R", 0, 'C');
			$pdf->Ln();

			$pdf->Cell($lheader1, $this->height + 2, "", "L", 0, 'L');
			$pdf->Cell($lheader3 - 15, $this->height + 2, getValByCode('ALAMAT_6'), "R", 0, 'C');
			$pdf->SetFont('Arial', '', 6);
			$pdf->Cell(9, $this->height + 2, "", "", 0, 'L');
			$pdf->Cell($lheader1 + 6, $this->height + 2, "Masa Pajak ", "", 0, 'L');
			$pdf->Cell($lheader1, $this->height + 2, ": ".$data["finance_period_code"], "R", 0, 'L');
			$pdf->SetFont('Arial', '', 6);
			$pdf->Cell($lheader2, $this->height + 2, "", "R", 0, 'C');
			$pdf->Ln($this->height - 4);
			// No Urut
			$pdf->Cell($lheader2 + $lheader4 + 1, $this->height, "", "R", 0, 'C');
			
			$no_urut = str_split($data["no_urut"]);
			$this->kotak($pdf,1, 34, 8, $no_urut);
			$pdf->Ln();

			$pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lheader3 - 15, $this->height, "Telp. ".getValByCode('ALAMAT_4')." - ".getValByCode('ALAMAT_3'), "R", 0, 'C');
			$pdf->SetFont('Arial', '', 6);
			$pdf->Cell(9, $this->height, "", "", 0, 'L');
			$pdf->Cell($lheader1 + 6, $this->height, "Tahun Pajak ", "", 0, 'L');
			$pdf->Cell($lheader1, $this->height, ": ".$data["tahun"], "R", 0, 'L');
			$pdf->Cell($lheader2, $this->height, "", "R", 0, 'C');
			$pdf->Ln();

			$pdf->Cell($lheader1, $this->height, "", "LB", 0, 'L');
			$pdf->Cell($lheader3 - 15, $this->height, "", "BR", 0, 'L');
			$pdf->Cell($lheader2 + 15, $this->height, "", "BR", 0, 'L');
			$pdf->Cell($lheader2, $this->height, "", "BR", 0, 'L');
			
			$lbody = $this->lengthCell / 4;
			$lbody1 = $lbody * 1;
			$lbody2 = $lbody * 2;
			$lbody3 = $lbody * 3;
			
			$pdf->Ln();
			$pdf->Cell(5, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody1 - 5, $this->height, "Nama", "", 0, 'L');
			$pdf->Cell($lbody3, $this->height, ": " . $data["wp_name"], "R", 0, 'L');
			$pdf->Ln();
			
			$pdf->Cell(5, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody1 - 5, $this->height, "Alamat", "", 0, 'L');
			$pdf->Cell($lbody3, $this->height, ": " . $data["wp_address_name"], "R", 0, 'L');
			$pdf->Ln();
			
			$pdf->Cell(5, $this->height + 2, "", "L", 0, 'L');
			$pdf->Cell($lbody1 - 5, $this->height + 2, "NPWPD", "", 0, 'L');
			$pdf->Cell($lbody1, $this->height + 2, "", "", 0, 'L');
			$pdf->Cell($lbody2, $this->height + 2, "", "R", 0, 'L');
			$pdf->Ln($this->height-4);
			
			$pdf->Cell($lbody1 + 3, $this->height, ":", "L", 0, 'R');
			$rep_npwd = str_replace(".", "", $data["npwd"]);
			$arr1 = str_split($rep_npwd);

			$this->kotak($pdf,1, 34, 1,$arr1[0]);
			$this->kotakKosong($pdf,1, 34, 1);
			$this->kotak($pdf,1, 34, 1,$arr1[1]);
			$this->kotakKosong($pdf,1, 34, 1);
			$this->kotak($pdf,1, 34, 1,$arr1[2]);
			$this->kotak($pdf,1, 34, 1,$arr1[3]);
			$this->kotak($pdf,1, 34, 1,$arr1[4]);
			$this->kotak($pdf,1, 34, 1,$arr1[5]);
			$this->kotak($pdf,1, 34, 1,$arr1[6]);
			$this->kotak($pdf,1, 34, 1,$arr1[7]);
			$this->kotak($pdf,1, 34, 1,$arr1[8]);
			$this->kotakKosong($pdf,1, 34, 1);
			$this->kotak($pdf,1, 34, 1,$arr1[9]);
			$this->kotak($pdf,1, 34, 1,$arr1[10]);
			$this->kotakKosong($pdf,1, 34, 1);
			$this->kotak($pdf,1, 34, 1,$arr1[11]);
			$this->kotak($pdf,1, 34, 1,$arr1[12]);
			$pdf->Ln();

			$pdf->Cell($lbody2 * 2, $this->height, "", "BLR", 0, 'L');
			$pdf->Ln();
			
			$this->tulis($pdf,"I. Berdasarkan Pasal 65 ayat (1) huruf c Peraturan Daerah Nomor 20 Tahun 2011, telah dilakukan pemeriksaan atau keterangan lain diatas", "L");
			$this->tulis($pdf,"pelaksanaan kewajiban:", "L");
			
			$lbody = $this->lengthCell / 4;
			$lbody1 = $lbody * 1;
			$lbody2 = $lbody * 2;
			$lbody3 = $lbody * 3;
			$indent = $this->lengthCell / 30;
			
			$pdf->Cell(5, $this->height + 2, "", "L", 0, 'L');
			$pdf->Cell($lbody1 - 5, $this->height + 2, "Ayat Pajak", "", 0, 'L');
			$pdf->Cell($lbody3, $this->height + 2, ": " /*. $data["ayat"]*/, "R", 0, 'L');
			$pdf->Ln($this->height - 4);

			// Ayat Pajak
			$pdf->Cell($lbody1 + 3, $this->height, ":", "L", 0, 'R');
			if(!empty($data["vat_code"])) {
				$arr_ayat = str_split($data["vat_code"]);
			} else {
				$arr_ayat = array();
				$this->kotak($pdf,1, 45, 1," - ");
			}		
			//$this->kotak(1, 34, 6, "");
			for($i = 0; $i < count($arr_ayat); $i++) {
				if($arr_ayat[$i] != " ")
					$this->kotak($pdf,1, 45, 1,$arr_ayat[$i]);
				else
					$this->kotakKosong($pdf,1, 34, 1);
			}
			$pdf->Ln();
			// ==========

			$pdf->Cell(5, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody1 - 5, $this->height, "Nama Pajak", "", 0, 'L');
			$pdf->Cell($lbody3, $this->height, ": ".$data["jenis_pajak"], "R", 0, 'L');
			$pdf->Ln();
			
			$this->tulis($pdf,"II. Dari pemeriksaan atau keterangan lain tersebut di atas, perhitungan jumlah yang masih harus dibayar adalah sebagai berikut:", "L");
			
			$pdf->Cell(5, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody3 - 5, $this->height, "1. Dasar Pengenaan", "", 0, 'L');
			$pdf->Cell(5, $this->height, "Rp ", "", 0, 'L');
			$pdf->Cell($lbody1-15, $this->height, number_format($data["total_trans_amount"],2,",","."), "", 0, 'R');
			$pdf->Cell(10, $this->height, "", "R", 0, 'L');
			$pdf->Ln();

			$pdf->Cell(5, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody3 - 5, $this->height, "2. Pajak yang Terutang", "", 0, 'L');
			//$this->Cell($lbody1, $this->height, "Rp ".number_format($data["terutang"],2,",","."), "R", 0, 'L');
			$pdf->Cell(5, $this->height, "Rp ", "", 0, 'L');
			$pdf->Cell($lbody1-15, $this->height, number_format($data["terutang"],2,",","."), "", 0, 'R');
			$pdf->Cell(10, $this->height, "", "R", 0, 'L');
			
			$pdf->Ln();
			
			$this->tulis($pdf,"3. Kredit Pajak", "L");
			
			$pdf->Cell(10, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody2 - 10, $this->height, "a. Kompensasi kelebihan dari tahun sebelumnya", "", 0, 'L');
			$pdf->Cell($lbody1, $this->height, "Rp ".number_format($data["cr_adjustment"],2,",","."), "", 0, 'L');
			$pdf->Cell($lbody1, $this->height, "", "R", 0, 'L');
			$pdf->Ln();
			
			$pdf->Cell(10, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody2 - 10, $this->height, "b. Setoran yang dilakukan", "", 0, 'L');
			$pdf->Cell($lbody1, $this->height, "Rp ".number_format($data["cr_payment"],2,",","."), "", 0, 'L');
			$pdf->Cell($lbody1, $this->height, "", "R", 0, 'L');
			$pdf->Ln();
			
			$pdf->Cell(10, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody2 - 10, $this->height, "c. Lain-lain", "", 0, 'L');
			$pdf->Cell($lbody1, $this->height, "Rp ".number_format($data["cr_others"],2,",","."), "B", 0, 'L');
			$pdf->Cell($lbody1, $this->height, "", "R", 0, 'L');
			$pdf->Ln();
			
			$pdf->Cell(10, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody2 - 10, $this->height, "d. STP (Pokok)", "", 0, 'L');
			$pdf->Cell($lbody1, $this->height, "Rp ".number_format($data["cr_stp"],2,",","."), "B", 0, 'L');
			$pdf->Cell($lbody1, $this->height, "", "R", 0, 'L');
			$pdf->Ln();
			
			$jum = $data["cr_others"] + $data["cr_payment"] + $data["cr_adjustment"] + $data["cr_stp"];
			$pdf->Cell(10, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody2 - 10, $this->height, "e. Jumlah yang dapat dikreditkan (a + b + c + d)", "", 0, 'L');
			$pdf->Cell($lbody1, $this->height, "Rp ".number_format($jum,2,",","."), "", 0, 'L');
			$pdf->Cell($lbody1, $this->height, "", "R", 0, 'L');
			$pdf->Ln();

			$pdf->Cell(5, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody3 - 5, $this->height, "4. Jumlah yang harus dibayar (2-3e)", "", 0, 'L');
			$pdf->Cell($lbody1 / 5, $this->height, "Rp ", "B", 0, 'L');
			$pdf->Cell($lbody1 / 5 * 4, $this->height, "NIHIL", "BR", 0, 'C');
			$pdf->Ln();
			
			$pdf->Cell($lbody3 - 10, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody1 + 10, $this->height, "Lombok, " . date("d F Y"), "R", 0, 'C');
			$pdf->Ln();
			
			$pdf->Cell($lbody3 - 10, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody1 + 10, $this->height, "Kepala ".getValByCode('INSTANSI_2'), "R", 0, 'C');
			$pdf->Ln();
			
			$pdf->Cell($lbody3 - 10, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody1 + 10, $this->height, getValByCode('ALAMAT_3'), "R", 0, 'C');
			$pdf->Ln();

			$pdf->Cell($lbody3 - 10, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody1 + 10, $this->height, $data["nama_kadin"], "R", 0, 'C');
			$pdf->Ln();

			$pdf->Cell($lbody3 - 10, $this->height, "", "BL", 0, 'L');
			$pdf->Cell($lbody1 + 8, $this->height, "NIP. " . $data["nip_kadin"], "BT", 0, 'L'); //isi nip
			$pdf->Cell(2, $this->height, "", "BR", 0, 'L');
			$pdf->Ln();

			$pdf->Cell($this->lengthCell, $this->height, "Gunting di sini", "B", 0, 'C');
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Cell($lbody1, $this->height, "", "TL", 0, 'L');
			$pdf->Cell($lbody2, $this->height, "TANDA TERIMA", "T", 0, 'C');
			$pdf->Cell($lbody1, $this->height, "No. SKPDN", "TR", 0, 'L');
			$pdf->Ln();
			
			$pdf->Cell($lbody1, $this->height, "     NPWPD", "L", 0, 'L');
			$pdf->Cell($lbody3, $this->height, ": ".$data["npwd"], "R", 0, 'L');
			$pdf->Ln();

			$pdf->Cell($lbody1, $this->height, "     Nama", "L", 0, 'L');
			$pdf->Cell($lbody3, $this->height, ": ".$data["wp_name"], "R", 0, 'L');
			$pdf->Ln();

			$pdf->Cell($lbody1, $this->height, "     Alamat", "L", 0, 'L');
			$pdf->Cell($lbody3, $this->height, ": ".$data["wp_address_name"], "R", 0, 'L');
			$pdf->Ln();
			$pdf->Cell($lbody3 - 10, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody1 + 10, $this->height, "Lombok, " . date("d F Y"), "R", 0, 'C');
			$pdf->Ln();
			$pdf->Cell($lbody3 - 10, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lbody1 + 10, $this->height, "Yang menerima, ", "R", 0, 'C');
			$pdf->Ln();

			$pdf->Cell($lbody3 - 10, $this->height, "", "BL", 0, 'L');
			$pdf->Cell($lbody1 + 10, $this->height, "(....................................)", "BR", 0, 'C');

		
			$pdf->output();

		}
	}

	function kotakKosong($pdf, $pembilang, $penyebut, $jumlahKotak){
		
		$lkotak = $pembilang / $penyebut * $this->lengthCell;
		for($i = 0; $i < $jumlahKotak; $i++){
			$pdf->Cell($lkotak, $this->height, "", "LR", 0, 'L');
		}
	}
	
	function kotak($pdf,$pembilang, $penyebut, $jumlahKotak, $isi){
		
		$lkotak = $pembilang / $penyebut * $this->lengthCell;
		for($i = 0; $i < $jumlahKotak; $i++){
			$pdf->Cell($lkotak, $this->height, $isi[$i], "TBLR", 0, 'C');
		}
	}

	function tulis($pdf,$text, $align){
		$pdf->Cell(5, $this->height, "", "L", 0, 'C');
		$pdf->Cell($this->lengthCell - 10, $this->height, $text, "", 0, $align);
		$pdf->Cell(5, $this->height, "", "R", 0, 'C');
		$pdf->Ln();
	}



	function getDataPdf($idVatSS){
		$whereClause='';
        $data = array();

       	$sql = "SELECT * FROM v_vat_setllement WHERE t_vat_setllement_id =".$idVatSS;

       	$output = $this->db->query($sql);
        $items = $output->result_array();

        if ($items != null || $items != ''){
        	foreach ($items as $item) {
        		$data = array (
    					't_cust_account_id' 	=> $item['t_cust_account_id'],
						'finance_period_code' 	=> $item['finance_period_code'],
						'tahun' 				=> $item['tahun'],
						'npwd' 					=> $item['npwd'],
						'due_date' 				=> $item['due_date'],
						'no_urut' 				=> $item['order_no'],
						'jenis_pajak' 			=> $item['jenis_pajak'],
						'debt_vat_amt' 			=> $item['debt_vat_amt'],
						'terutang' 				=> $item['terutang'],
						'cr_adjustment' 		=> $item['cr_adjustment'],
						'cr_payment' 			=> $item['cr_payment'],
						'cr_others' 			=> $item['cr_others'],
						'cr_stp' 				=> $item['cr_stp'],
						'db_interest_charge' 	=> $item['db_interest_charge'],
						'db_increasing_charge' 	=> $item['db_increasing_charge'],
						'vat_code' 				=> $item['nomor_ayat'],
						'total_trans_amount' 	=> $item['total_trans_amount'],
        		);
        	}
        }

        

        $sql2 = "	SELECT wp_name, wp_address_name, wp_kota 
        			FROM v_cust_account_update
					WHERE t_cust_account_id =".$data['t_cust_account_id'];

		$output2 = $this->db->query($sql2);
        $items2 = $output2->result_array();

        if ($items2 != null || $items2 != ''){
        	foreach ($items2 as $item) {
        		$data['wp_name'] 			= $item['wp_name'];
        		$data['wp_address_name'] 	= $item['wp_address_name'];
        		$data['wp_kota'] 			= $item['wp_kota'];
        		
        	}
        }

        

        $bcr = "SELECT f_gen_barcode('test')";
        $output_bcr = $this->db->query($bcr);
        $items_bcr = $output_bcr->result_array();

        if ($items_bcr != null || $items_bcr != ''){
        	foreach ($items_bcr as $item) {
        		$data['barcode'] =  $item['f_gen_barcode'];
        		
        	}
        }

        $ttd = "SELECT value as nama_kadin, value_2 as nip_kadin 
        		FROM p_global_param 
        		WHERE code = 'TTD KADIN'";

        $output_ttd = $this->db->query($ttd);
        $items_ttd = $output_ttd->result_array();
        $data['nama_kadin'] =  '';
        $data['nip_kadin'] 	=  '';
        if ($items_ttd != null || $items_ttd != ''){
        	foreach ($items_ttd as $item) {
        		$data['nama_kadin'] =  $item['nama_kadin'];
        		$data['nip_kadin'] 	=  $item['nip_kadin'];
        	}
        }
        //print_r($data);exit();

        return $data;

	}
}