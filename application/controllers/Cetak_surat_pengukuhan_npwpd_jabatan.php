<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_surat_pengukuhan_npwpd_jabatan extends CI_Controller{
	var $fontSize = 10;
    var $fontFam = 'BookmanOldStyle';
    var $yearId = 0;
    var $yearCode = "";
    var $paperWSize = 210;
    var $paperHSize = 340;
    var $height = 5;
    var $currX;
    var $currY;
    var $widths;
    var $aligns;

	function __construct() {
        parent::__construct();
        //$this->formCetak();
        $pdf = new FPDF();
        $this->startY = $pdf->GetY();
        $this->startX = $this->paperWSize-42;
        $this->lengthCell = $this->startX+20;
        $this->DefPageFormat[1] = 330;
    }

    function newLine(){
        $pdf = new FPDF();
        $pdf->Cell($this->lengthCell, $this->height, "", "", 0, 'L');
        $pdf->Ln();
	}

	function setCourier($pdf){
		$pdf->SetFont('Courier', 'B', 11);
	}

	function setBookmanOldStyle($pdf){
		$pdf->SetFont('BookmanOldStyle', 'B', 11);
	}


	function pageCetak() {

        /**
         * Get Data
         */
        $t_customer_order_id = getVarClean('CURR_DOC_ID','int',0);

        $sql = "select 
				c.wp_name,
				c.wp_address_name || ' ' || nvl(wp_address_no,' ') as wp_address_name,
				c.company_owner ,
				c.company_brand,
				c.npwpd,
				c.company_name,
				c.address_name || ' ' || nvl(address_no,' ') as company_address,
				c.address_name_owner ||nvl(address_no_owner,' ') as alamat_tinggal,
				c.brand_address_name ||nvl(brand_address_no,' ') as alamat_pajak ,
				c.brand_address_name || ' ' || nvl(brand_address_no,' ') as alamat_brand ,
				b.p_vat_type_id,
				type.vat_code,
				LPAD(c.reg_letter_no,5,0) as reg_letter_no,
				decode(c.p_hotel_grade_id,null,null,1,1,2,1,3,1,4,1,5,1,0) as klasifikasi,
				d.vat_code as detail_jenis_pajak
		from t_vat_registration c		
		left join t_customer_order a on a.t_customer_order_id = c.t_customer_order_id
		left join p_rqst_type b on a.p_rqst_type_id = b.p_rqst_type_id
		left join p_vat_type type on b.p_vat_type_id = type.p_vat_type_id
		left join p_vat_type_dtl d on c.p_vat_type_dtl_id = d.p_vat_type_dtl_id
		where a.t_customer_order_id = ?;";

        $output = $this->db->query($sql, array($t_customer_order_id));
        $data = $output->row_array();


        $pdf = new FPDF();
        $pdf->AliasNbPages();
		$pdf->AddPage("P",array(210,340));	
			
		$startY = $pdf->GetY();
		$startX = $this->paperWSize-42;
		$lengthCell = $startX + 20;
		$this->height = 5;
		
		$pdf->AddFont('BookmanOldStyle','');
		$pdf->AddFont('BookmanOldStyle','B','BookmanOldStyleB.php');
		$pdf->AddFont('BookmanOldStyle','BI','BookmanOldStyleBI.php');
		
		$pdf->Image(getValByCode('LOGO'),25,13,22,22);
		
		$lheader = $this->lengthCell / 8;
		$lheader1 = $lheader * 1;
		$lheader2 = $lheader * 2;
		$lheader3 = $lheader * 3;
		$lheader4 = $lheader * 4;
		$lheader7 = $lheader * 7;
		
		$pdf->Cell($lheader1, $this->height, "", "", 0, 'L');
		$pdf->Cell($lheader7, $this->height, "", "", 0, 'C');
		$pdf->Ln();
		
		$pdf->SetFont('BookmanOldStyle', 'B', 13);
		$pdf->Cell($lheader1, $this->height, "", "", 0, 'L');
		$pdf->Cell($lheader7, $this->height, getValByCode('INSTANSI_1'), "", 0, 'C');
		$pdf->Ln(6);
		
		//$pdf->SetFont('BookmanOldStyle', 'B', 18);
		$pdf->SetFont('BookmanOldStyle', 'B', 15);
		$pdf->Cell($lheader1, $this->height, "", "", 0, 'L');
		//$pdf->Cell($lheader7, $this->height, "DINAS PELAYANAN PAJAK", "", 0, 'C');
		$pdf->Cell($lheader7, $this->height, getValByCode('INSTANSI_2'), "", 0, 'C');
		$pdf->Ln();
		
		$pdf->SetFont('BookmanOldStyle', '', 10);
		$pdf->Cell($lheader1, $this->height + 3, "", "", 0, 'L');
		$pdf->Cell($lheader7, $this->height + 3, getValByCode('ALAMAT_5'), "", 0, 'C');
		$pdf->Ln();
		
		$pdf->Cell($lheader1, $this->height, "", "B", 0, 'L');
		$pdf->Cell($lheader7, $this->height, "", "B", 0, 'C');
		$pdf->Ln();
		
		// Set margins
		$pdf->SetLeftMargin(33);
		$pdf->SetRightMargin(0);
		
		// Judul
		
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('BookmanOldStyle', 'B', 13);
		$pdf->Cell($lengthCell-40, $this->height, "SURAT PENGUKUHAN", 0, 0, 'C');
		$pdf->Ln();
		$pdf->SetFont('BookmanOldStyle', 'B', 10);
		$pdf->Cell($lengthCell-40, $this->height, "NOMOR POKOK WAJIB PAJAK DAERAH (NPWPD) JABATAN", 0, 0, 'C');
		$pdf->Ln();
		$pdf->SetFont('BookmanOldStyle', '', 10);
		//$pdf->Cell($lengthCell-40, $this->height, "NOMOR : 973 / ".$data["reg_letter_no"]." / NPWPD.JBT - DISYANJAK", 0, 0, 'C');
		$pdf->Cell($lengthCell-40, $this->height, "NOMOR : 973 / ".$data["reg_letter_no"]." / NPWPD.JBT - BPPD", 0, 0, 'C');
		$pdf->Ln();
		
		$pdf->SetFont('BookmanOldStyle', '', 11);
		//$pdf->Cell($lengthCell, $this->height, "Nomor: 973/" . $data["reg_letter_no"]."/".str_ireplace('Pajak ','',$data['vat_code']) ."/Disyanjak", 0, 0, 'C');
		// Body Atas
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetWidths(array($lengthCell-40));
		$pdf->SetAligns(array("J"));
		$pdf->Cell(10, $this->height, "     ", 0, 0, 'J');
		$pdf->Cell($lengthCell-50, $this->height, "Berdasarkan  Peraturan  Daerah Kab. Lombok Utara Nomor 20 Tahun 2011", 0, 0, 'J');
		$pdf->Ln();
		$pdf->RowMultiBorderWithHeight(array(
			"tentang Pajak Daerah, bersama ini diterbitkan NPWPD Jabatan terhadap :"
			),
			array(
			""
			),
			$this->height);
		$pdf->Ln(2);
		$pdf->SetWidths(array(40,$lengthCell-40-40));
		$pdf->SetAligns(array("J","J"));
		$pdf->RowMultiBorderWithHeight(array(
			"Objek Pajak",
			": ".$data["company_brand"]
			),
			array(
			"",""
			),
			$this->height);
			
		$pdf->RowMultiBorderWithHeight(array(
			"Alamat",
			": ".$data["alamat_brand"]
			),
			array(
			"",""
			),
			$this->height);
			
		$pdf->RowMultiBorderWithHeight(array(
			"Jenis Pajak",
			": ".$data["vat_code"]
			),
			array(
			"",""
			),
			$this->height);
			
		$pdf->RowMultiBorderWithHeight(array(
			"NPWPD Jabatan",
			": ".$data["npwpd"]
			),
			array(
			"",""
			),
			$this->height);
		
		$pdf->Ln(2);
		$pdf->SetWidths(array($lengthCell-40));
		$pdf->SetAligns(array("J"));
		$pdf->Cell(10, $this->height, "     ", 0, 0, 'J');
		$pdf->Cell($lengthCell-50, $this->height, "Untuk   memenuhi   ketentuan   pada   Peraturan   Daerah  dimaksud, ", 0, 0, 'J');
		$pdf->Ln();
		$pdf->RowMultiBorderWithHeight(array(
			"pemilik  / pengelola    usaha    diminta    untuk   datang   ke   loket  informasi    dan    penanganan   pengaduan   pada  B P P D  Kab. Lombok Utara"
			),
			array(
			""
			),
			$this->height);
		
		
		$pdf->Cell($lengthCell-120, $this->height, "Jl. Tioq Tata Tunaq Lombok Utara", "", 0, 'J');
		$pdf->SetFont('BookmanOldStyle', 'BI', 11);
		$pdf->Cell(10, $this->height, " paling  lambat  7  (tujuh)  hari  kerja", 0, 0, 'J');
		$pdf->Ln();
		$pdf->SetFont('BookmanOldStyle', '', 11);
		$pdf->Cell(122, $this->height, "sejak   diterimanya   pengukuhan   ini   untuk    memberikan", 0, 0, 'J');
		$pdf->SetFont('BookmanOldStyle', 'BI', 11);
		$pdf->Cell($lengthCell-66, $this->height, "klarifikasi, ", 0, 0, 'J');
		$pdf->Ln();
		$pdf->Cell($lengthCell-80, $this->height, "pemutakhiran   data   dan   menerima    informasi", 0, 0, 'J');
		$pdf->SetFont('BookmanOldStyle', '', 11);
		$pdf->Cell(90, $this->height, " terkait   kewajiban", 0, 0, 'J');
		$pdf->Ln();
		$pdf->Cell(55, $this->height, "perpajakan  daerah  dengan ", 0, 0, 'J');
		$pdf->SetFont('BookmanOldStyle', 'BI', 11);
		$pdf->Cell(52, $this->height, "membawa  kelengkapan", 0, 0, 'J');
		$pdf->SetFont('BookmanOldStyle', '', 11);
		$pdf->Cell(90, $this->height, "sebagai berikut :", 0, 0, 'J');
		$pdf->Ln();
		$pdf->Ln(2);
		$pdf->SetWidths(array(7,$lengthCell-40-7));
		$pdf->SetAligns(array("J","J"));
		$pdf->RowMultiBorderWithHeight(array(
			"1. ",
			"Fotocopy identitas diri (KTP atau SIM atau Paspor);"
			),
			array(
			"",""
			),
			$this->height);
		
		$pdf->RowMultiBorderWithHeight(array(
			"2. ",
			"Fotocopy akte pendirian (untuk badan usaha); dan"
			),
			array(
			"",""
			),
			$this->height);
		
		$pdf->RowMultiBorderWithHeight(array(
			"3. ",
			"Surat pernyataan kegiatan usaha dari pemilik/pengelola usaha dan/atau fotocopy perizinan kegiatan usaha dari instansi berwenang."
			),
			array(
			"",""
			),
			$this->height);
			
		$pdf->Ln(2);
		$pdf->SetWidths(array($lengthCell-40));
		$pdf->SetAligns(array("J"));
		$pdf->Cell(10, $this->height, "     ", 0, 0, 'J');
		$pdf->Cell($lengthCell-50, $this->height, "Apabila  Saudara  telah  mendaftarkan diri dan memiliki  NPWPD  agar", 0, 0, 'J');
		$pdf->Ln();
		$pdf->RowMultiBorderWithHeight(array(
			"segera melapor pada loket Pelayanan Informasi dan Penanganan Pengaduan Badan Pengelolaan Pendapatan Daerah Jl. Tioq Tata Tunaq Lombok Utara dengan  membawa FC bukti pembayaran pajak bulan terakhir."
			),
			array(
			""
			),
			$this->height);
		$pdf->Ln(2);
		$pdf->SetWidths(array($lengthCell-40));
		$pdf->SetAligns(array("J"));
		$pdf->Cell(10, $this->height, "     ", 0, 0, 'J');
		$pdf->Cell($lengthCell-50, $this->height, "Demikian disampaikan untuk menjadi perhatian.", 0, 0, 'J');
		$pdf->Ln();
		$pdf->Ln();
		
		// Signature
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$sigLen = ($lengthCell-40) / 2;
		$sigLen1 = $sigLen * 1;
		$sigLen2 = $sigLen * 2;
		$bulan =array();
		$bulan [1]= "Januari";
		$bulan [2]= "Februari";
		$bulan [3]= "Maret";
		$bulan [4]= "April";
		$bulan [5]= "Mei";
		$bulan [6]= "Juni";
		$bulan [7]= "Juli";
		$bulan [8]= "Agustus";
		$bulan [9]= "September";
		$bulan [10]= "Oktober";
		$bulan [11]= "Nopember";
		$bulan [12]= "Desember";
		
		$tgl = getVarClean("tgl", "str", "");
		$pdf->SetFont('BookmanOldStyle', '', 8);
		$pdf->Cell($sigLen1, $this->height, "", 0, 0, 'L');
		$pdf->SetFont('BookmanOldStyle', '', 11);
		if ($tgl == ''){
			$pdf->Cell($sigLen1, $this->height, "Lombok Utara, " . date("j").' '.$bulan[date('n')].' '.date("Y"), 0, 0, 'C');
		}else{
			$pdf->Cell($sigLen1, $this->height, "Lombok Utara, ".$tgl , 0, 0, 'C');
		}
		$pdf->Ln(7);
		
		$pdf->SetFont('BookmanOldStyle', '', 8);
		$pdf->Cell($sigLen1, $this->height, "", 0, 0, 'L');
		$pdf->SetFont('BookmanOldStyle', 'B', 11);
		$pdf->Cell($sigLen1, $this->height, "a.n. BUPATI LOMBOK UTARA", 0, 0, 'C');
		$pdf->Ln();
		
		$pdf->SetFont('BookmanOldStyle', '', 8);
		$pdf->Cell($sigLen1, $this->height, "", 0, 0, 'L');
		$pdf->SetFont('BookmanOldStyle', 'B', 11);
		//$pdf->Cell($sigLen1, $this->height, "KEPALA DINAS PELAYANAN PAJAK", 0, 0, 'C');
		$pdf->Cell($sigLen1, $this->height, "KEPALA BADAN ", 0, 0, 'C');
		$pdf->Ln();
		
		$pdf->SetFont('BookmanOldStyle', '', 8);
		$pdf->Cell($sigLen1, $this->height, "", 0, 0, 'L');
		$pdf->SetFont('BookmanOldStyle', 'B', 11);
		$pdf->Cell($sigLen1, $this->height, "PENDAPATAN DAERAH", 0, 0, 'C');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell($sigLen1, $this->height, "", 0, 0, 'C');
		$pdf->Cell($sigLen1, $this->height, "Drs. H. EMA SUMARNA, M. Si", 0, 0, 'C');
		$pdf->Ln();
		
		$pdf->Cell($sigLen1, $this->height, "", 0, 0, 'C');
		$pdf->SetFont('BookmanOldStyle', '', 10);
		$pdf->Cell($sigLen1, $this->height, "PEMBINA UTAMA MUDA", 0, 0, 'C');
		$pdf->Ln();
		
		$pdf->Cell($sigLen1, $this->height, "", 0, 0, 'C');
		$pdf->Cell($sigLen1, $this->height, "NIP. 19661207 198603 1 006", 0, 0, 'C');
		
		$pdf->Image('http://'.$_SERVER['HTTP_HOST'].'/mpd/include/qrcode/generate-qr.php?param='.
		str_replace(" ","_","NOMOR : 973 / ".$data["reg_letter_no"]." / NPWPD.JBT - BPPD")."_".
		$data["npwpd"]."-".
		str_replace(" ","_",$data["company_brand"])."-".
		str_replace(" ","_",$data["alamat_brand"])."-".
		str_replace(" ","_",$data["vat_code"])
		,135,236,20,20,'PNG');
		
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('BookmanOldStyle', '', 6);
		$pdf->Cell($sigLen1, $this->height, "Sesuai dengan ketentuan yang berlaku, Surat Pengukuhan NPWPD Jabatan ini ditandatangani secara elektronik", 0, 0, 'L');
		$pdf->Ln();
		
		// Tembusan
		
		$pdf->Ln();
		//$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('BookmanOldStyle', 'BU', 9);
		$pdf->Cell(23, $this->height, "Tembusan,", 0, 0, 'L');
		$pdf->SetFont('BookmanOldStyle', '', 9);
		$pdf->Cell(0, $this->height, "disampaikan kepada Yth. :", 0, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('BookmanOldStyle', '', 9);
		//$this->height = $this->height - 1;
		$this->height = 4;
		$pdf->Cell($lengthCell, $this->height, "1. Bapak Bupati Lombok Utara(sebagai laporan);", 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height, "2. Bapak Wakil Bupati Lombok Utara(sebagai laporan); dan", 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height, "3. Bapak Sekretaris Daerah Kab. Lombok Utara (sebagai laporan).", 0, 0, 'L');

        $pdf->Output();

	}

}



