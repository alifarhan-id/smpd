<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_formulir_parkir_pdf extends CI_Controller{

	var $fontSize = 10;
    var $fontFam = 'Arial';
    var $yearId = 0;
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
        //$this->formCetak();
        $pdf = new FPDF();
        $this->startY = $pdf->GetY();
        $this->startX = $this->paperWSize-42;
        $this->lengthCell = $this->startX+20;
    }

    function newLine(){
        $pdf = new FPDF();
        $pdf->Cell($this->lengthCell, $this->height, "", "", 0, 'L');
        $pdf->Ln();
    }
	
	
	function pageCetak() {
		
		$t_customer_order_id = getVarClean('t_customer_order_id','int',0);

		$sql="begin;";
		if ($t_customer_order_id != 0) {
			$sql .= "select * from f_cetak_pajak_parking(".$t_customer_order_id.", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "
		."NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "
		."NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, " 
		."NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, " 
		."NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "
		."'refone', 'refone2');";
			
		}
		//echo ($sql);exit;
		$query = $this->db->query($sql);
		$data = $query->row_array();


		$query = "fetch all in \"refone\";";
		$result = $this->db->query($query);
		$data1 = $result->row_array();


		$query = "fetch all in \"refone2\";";
		$result = $this->db->query($query);
		$data2 = $result->result_array();


		$query = $this->db->query("end;");
		$data3 = $result->row_array();



		

		$pdf = new FPDF();


		
		$pdf->AliasNbPages();
		$pdf->AddPage("P");		
		$startY = $pdf->getY();
		$startX = $this->paperWSize-42;
		$lengthCell = $startX+20;		
		$pdf->SetFont('Arial', '', 10);
		
		$lengthJudul1 = ($lengthCell * 3) / 9;
		$lengthJudul2 = ($lengthCell * 3) / 9;
		$lengthJudul3 = ($lengthCell * 3) / 9;
		$batas1 = ($lengthJudul3 * 2) / 5;
		$batas2 = ($lengthJudul3 * 3) / 5;
		
		$pdf->Image(getValByCode('LOGO'),15,13,25,25);
		// $pdf->Cell($lengthJudul1, $this->height, "", 0, 0, 'C');
		// $pdf->Cell($lengthJudul2, $this->height, "LAMPIRAN :", 0, 0, 'R');
		// $pdf->Cell($lengthJudul3, $this->height, "PERATURAN WALIKOTA BANDUNG", 0, 0, 'L');
		// $pdf->Ln();
		// $pdf->Cell($lengthJudul1, $this->height, "", 0, 0, 'C');
		// $pdf->Cell($lengthJudul2, $this->height, "", 0, 0, 'R');
		// $pdf->Cell($batas1, $this->height, "NOMOR", 0, 0, 'L');
		// $pdf->Cell($batas2, $this->height, ": 387 TAHUN 2012", 0, 0, 'L');
		// $pdf->Ln();
		// $pdf->Cell($lengthJudul1, $this->height, "", 0, 0, 'C');
		// $pdf->Cell($lengthJudul2, $this->height, "", 0, 0, 'R');
		// $pdf->Cell($batas1, $this->height, "TANGGAL", "B", 0, 'L');
		// $pdf->Cell($batas2, $this->height, ": 4 Juni 2012", "B", 0, 'L');
		// $pdf->Ln(10);
		
		// $pdf->Cell($lengthCell, $this->height, "1.	FORMULIR PENDAFTARAN WAJIB PAJAK", 0, 0, 'L');
		// $pdf->Ln(6);
		
		$length1 = ($lengthCell * 2) / 9;
		$length2 = ($lengthCell * 4) / 9;
		$length3 = ($lengthCell * 3) / 9;
		$kolom1 = ($length3 * 1) / 10;
		$kolom2 = ($length3 * 1) / 10;
		$kolom3 = ($length3 * 1) / 10;
		$kolom4 = ($length3 * 1) / 10;
		$kolom5 = ($length3 * 1) / 10;
		$kolom6 = ($length3 * 1) / 10;
		$kolom7 = ($length3 * 1) / 10;
		$kolom8 = ($length3 * 1) / 10;
		$penutup  = ($length3 * 2) / 10;
		
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell($length1, $this->height-4, "", "TL", 0, 'C');
		$pdf->Cell($length2, $this->height-4, "", "T", 0, 'C');
		$pdf->Cell($length3, $this->height-4, "", "TR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($length1, $this->height, "", "L", 0, 'C');
		$pdf->Cell($length2, $this->height, getValByCode('INSTANSI_1'), 0, 0, 'C');
		$pdf->Cell($length3, $this->height, "  Nomor Formulir", "R", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($length1, $this->height, "", "L", 0, 'C');
		$pdf->Cell($length2, $this->height, getValByCode('INSTANSI_2'), 0, 0, 'C');
		
		//nomor formulir
		$arr1 = str_split($data["o_order_no"]);
		$pdf->Cell($kolom1, $this->height, $arr1[0], 1, 0, 'C');
		$pdf->Cell($kolom2, $this->height, $arr1[1], 1, 0, 'C');
		$pdf->Cell($kolom3, $this->height, $arr1[2], 1, 0, 'C');
		$pdf->Cell($kolom4, $this->height, $arr1[3], 1, 0, 'C');
		$pdf->Cell($kolom5, $this->height, $arr1[4], 1, 0, 'C');
		$pdf->Cell($kolom6, $this->height, $arr1[5], 1, 0, 'C');
		$pdf->Cell($kolom7, $this->height, $arr1[6], 1, 0, 'C');
		$pdf->Cell($kolom8, $this->height, $arr1[7], 1, 0, 'C');
		$pdf->Cell($penutup, $this->height, "", "R", 0, 'C');
		//================
		$pdf->Ln();
		$pdf->Cell($length1, $this->height, "", "L", 0, 'C');
		$pdf->Cell($length2, $this->height, getValByCode('ALAMAT_1'), 0, 0, 'C');
		$pdf->Cell($length3, $this->height, "", "R", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($length1, $this->height, "", "L", 0, 'C');
		$pdf->Cell($length2, $this->height, getValByCode('ALAMAT_2'), 0, 0, 'C');
		$pdf->Cell($length3, $this->height, "", "R", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($length1, $this->height, "", "L", 0, 'C');
		$pdf->Cell($length2, $this->height, getValByCode('ALAMAT_4'), 0, 0, 'C');
		$pdf->Cell($length3, $this->height, "", "R", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($length1, $this->height, "", "L", 0, 'C');
		$pdf->Cell($length2, $this->height, getValByCode('ALAMAT_3'), 0, 0, 'C');
		$pdf->Cell($length3, $this->height, "", "R", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($length1, $this->height-4, "", "BL", 0, 'C');
		$pdf->Cell($length2, $this->height-4, "", "B", 0, 'C');
		$pdf->Cell($length3, $this->height-4, "", "BR", 0, 'L');
		$pdf->Ln();
		
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell($lengthCell, $this->height-4, "", "TLR", 0, 'C');
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height, "FORMULIR PENDAFTARAN", "LR", 0, 'C');
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height, "WAJIB PAJAK PARKIR", "LR", 0, 'C');
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height-4, "", "BLR", 0, 'C');
		$pdf->Ln();
		$pdf->SetFont('Arial', '', 8);
		
		$len1 = ($lengthCell * 6) / 10;
		$len2 = ($lengthCell * 4) / 10;
		$pdf->Cell($len1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($len2, $this->height, "Kepada Yth.", "BR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($len1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($len2, $this->height, getValByCode('INSTANSI_2'), "BR", 0, 'L');
		$pdf->Ln();
		/*
		$pdf->Cell($len1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($len2, $this->height, ".............................................................", "BR", 0, 'L');
		$pdf->Ln();		
		$pdf->Cell($len1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($len2, $this->height, "Di...........................................................", "BR", 0, 'L');
		$pdf->Ln();
		*/
		$pdf->Cell($lengthCell, $this->height, "", 1, 0, 'C');
		$pdf->Ln();
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell($lengthCell, $this->height, "PERHATIAN :", 1, 0, 'L');
		$pdf->Ln();
		
		$pdf->SetFont('Arial', '', 8);
		$per1 = ($lengthCell * 1) / 40;
		$per2 = ($lengthCell * 10) / 40;
		$per3 = ($lengthCell * 29) / 40;
		$pdf->Cell($per1, $this->height, "1. ", "TBL", 0, 'C');
		$pdf->Cell($per2+$per3, $this->height, "Harap diisi dalam rangkap 2 (dua) ditulis dalam huruf CETAK;", "BR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "2. ", "TBL", 0, 'C');
		$pdf->Cell($per2+$per3, $this->height, "Diberi v pada kotak yang tersedia untuk jawaban yang diberikan;", "BR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "3. ", "TBL", 0, 'C');
		$pdf->Cell($per2+$per3, $this->height, "Setelah Formulir Pendaftaran ini diisi dan ditanda tangani,  harap diserahkan kembali Kepada Badan Pendapatan Daerah", "BR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'L');
		$pdf->Cell($per2+$per3, $this->height, "Lombok Utara langsung atau dikirim melalui Pos paling lambat tanggal .......................", "BR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height, "", 1, 0, 'C');
		$pdf->Ln();
		
		$pdf->SetFont('Arial', 'B', 8);		
		$pdf->Cell($lengthCell, $this->height, "DIISI OLEH SELURUH WAJIB PAJAK BADAN", 1, 0, 'C');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Ln();
		
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "KETERANGAN WAJIB PAJAK", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, "", "TBR", 0, 'L');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "1. ", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "Nama Wajib Pajak", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_wp_name"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "2. ", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "Alamat", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ":", "BR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Jalan/Nomor", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_wp_address_name"]." / ".$data["o_wp_address_no"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- RT/RW", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_wp_address_rt"]." / ".$data["o_wp_address_rw"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Kelurahan", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_wp_kelurahan"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Kecamatan", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_wp_kecamatan"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Kabupaten/Kota", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_wp_kota"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Nomor Telepon", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_wp_phone_no"]."     No. Selular ".$data["o_wp_mobile_no"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Nomor Fax", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_wp_fax_no"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height+2, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height+2, "- Kode Pos", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height+2, ": ", "TBR", 0, 'L');
		$spasi = ($per3 * 1) / 20;
		$zip1 = ($per3 * 1) / 20;
		$zip2 = ($per3 * 1) / 20;
		$zip3 = ($per3 * 1) / 20;
		$zip4 = ($per3 * 1) / 20;
		$zip5 = ($per3 * 1) / 20;
		$pdf->Ln($this->height-4);
		if (empty($data["o_wp_zip_code"])) {
			$data["o_wp_zip_code"] = "     ";
		}
		$zipCodeOwn = str_split($data["o_wp_zip_code"]);
		$pdf->Cell($per1+$per2, $this->height, "", 0, 0, 'C');
		$pdf->Cell($spasi-4, $this->height, "", 0, 0, 'C'); //spasi kode pos
		$pdf->Cell($zip1, $this->height, $zipCodeOwn[0], 1, 0, 'C');
		$pdf->Cell($zip2, $this->height, $zipCodeOwn[1], 1, 0, 'C');
		$pdf->Cell($zip3, $this->height, $zipCodeOwn[2], 1, 0, 'C');
		$pdf->Cell($zip4, $this->height, $zipCodeOwn[3], 1, 0, 'C');
		$pdf->Cell($zip5, $this->height, $zipCodeOwn[4], 1, 0, 'C');
		$pdf->Ln(6);
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, "", "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "KETERANGAN PERUSAHAAN/BADAN", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, "", "TBR", 0, 'L');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "3. ", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "Nama Perusahaan / Badan", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_company_name"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "4. ", "TBL", 0, 'C');
		$pdf->Cell($per2+$per3, $this->height, "Alamat (Photo copy Surat Keterangan Domisili dilampirkan)", "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Jalan/Nomor", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_address_name"]." / ".$data["o_address_no"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- RT/RW", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_address_rt"]." / ".$data["o_address_rw"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Kelurahan", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_kelurahan_code"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Kecamatan", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_kecamatan_code"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Kabupaten/Kota", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_kota_code"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Nomor Telepon", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_phone_no"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height+2, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height+2, "- Kode Pos", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height+2, ": ", "TBR", 0, 'L');
		$spasi = ($per3 * 1) / 20;
		$zip1 = ($per3 * 1) / 20;
		$zip2 = ($per3 * 1) / 20;
		$zip3 = ($per3 * 1) / 20;
		$zip4 = ($per3 * 1) / 20;
		$zip5 = ($per3 * 1) / 20;
		$pdf->Ln($this->height-4);
		$pdf->Cell($per1+$per2, $this->height, "", 0, 0, 'C');
		//kode pos
		if (empty($data["o_zip_code"])) {
			$data["o_zip_code"] = "     ";
		}
		$zipCode = str_split($data["o_zip_code"]);
		$pdf->Cell($spasi-4, $this->height, "", 0, 0, 'C'); //spasi kode pos
		$pdf->Cell($zip1, $this->height, $zipCode[0], 1, 0, 'C');
		$pdf->Cell($zip2, $this->height, $zipCode[1], 1, 0, 'C');
		$pdf->Cell($zip3, $this->height, $zipCode[2], 1, 0, 'C');
		$pdf->Cell($zip4, $this->height, $zipCode[3], 1, 0, 'C');
		$pdf->Cell($zip5, $this->height, $zipCode[4], 1, 0, 'C');
		$pdf->Ln(6);
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, "", "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "KETERANGAN MERK DAGANG", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, "", "TBR", 0, 'L');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "5. ", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "Nama Merk Dagang", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_company_brand"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "6. ", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "Alamat Lokasi Usaha", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ":", "BR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Jalan/Nomor", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_brand_address_name"]." / ".$data["o_brand_address_no"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- RT/RW", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_brand_address_rt"]." / ".$data["o_brand_address_rw"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Kelurahan", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_brand_kelurahan"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Kecamatan", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_brand_kecamatan"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Kabupaten/Kota", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_brand_kota"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Nomor Telepon", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_brand_phone_no"]."     No. Selular ".$data["o_brand_mobile_no"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Nomor Fax", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_brand_fax_no"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height+2, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height+2, "- Kode Pos", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height+2, ": ", "TBR", 0, 'L');
		$spasi = ($per3 * 1) / 20;
		$zip1 = ($per3 * 1) / 20;
		$zip2 = ($per3 * 1) / 20;
		$zip3 = ($per3 * 1) / 20;
		$zip4 = ($per3 * 1) / 20;
		$zip5 = ($per3 * 1) / 20;
		$pdf->Ln($this->height-4);
		if (empty($data["o_brand_zip_code"])) {
			$data["o_brand_zip_code"] = "     ";
		}
		$zipCodeOwn = str_split($data["o_brand_zip_code"]);
		$pdf->Cell($per1+$per2, $this->height, "", 0, 0, 'C');
		$pdf->Cell($spasi-4, $this->height, "", 0, 0, 'C'); //spasi kode pos
		$pdf->Cell($zip1, $this->height, $zipCodeOwn[0], 1, 0, 'C');
		$pdf->Cell($zip2, $this->height, $zipCodeOwn[1], 1, 0, 'C');
		$pdf->Cell($zip3, $this->height, $zipCodeOwn[2], 1, 0, 'C');
		$pdf->Cell($zip4, $this->height, $zipCodeOwn[3], 1, 0, 'C');
		$pdf->Cell($zip5, $this->height, $zipCodeOwn[4], 1, 0, 'C');
		$pdf->Ln(6);
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, "", "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "7. ", "TBL", 0, 'C');
		$pdf->Cell($per2+$per3, $this->height, "Surat Izin yang dimiliki (Photo copy Surat Izin harap dilampirkan)", "TBR", 0, 'L');
		$pdf->Ln();
		
		$isi1 = ($per3 * 3) / 9;
		$isi2 = ($per3 * 3) / 9;
		$isi3 = ($per3 * 3) / 9;
		//surat izin
		
		for($i=0; $i<count($data1); $i++){
			//print_r($data1); exit();
			$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
			$pdf->Cell($per2, $this->height, "- Surat Izin ".$data1["license_type_code"], "B", 0, 'L');
			$pdf->Cell($isi1, $this->height, ": ", "B", 0, 'L');
			$pdf->Cell($isi2, $this->height, "No. ".$data1["license_no"][$i], "B", 0, 'L');
			$pdf->Cell($isi3, $this->height, "Tgl. ".$data1["valid_from"][$i], "BR", 0, 'L');
			$pdf->Ln();		
		}
		
		$pdf->Cell($lengthCell, $this->height, "", 1, 0, 'C');
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height, "", 1, 0, 'C');
		$pdf->Ln();
		
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "KETERANGAN PEMILIK ATAU PENGELOLA", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, "", "TBR", 0, 'L');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height, "", 1, 0, 'C');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "8. ", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "Nama Pemilik/Pengelola", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_company_owner"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, "", "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "9. ", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "Jabatan", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_job_position_code"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, "", "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "10. ", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "Alamat Tempat Tinggal", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ":", "BR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Jalan/Nomor", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_address_name_owner"]." / ".$data["o_address_no_owner"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- RT/RW", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_address_rt_owner"]." / ".$data["o_address_rw_owner"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Kelurahan", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_kelurahan_own_code"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Kecamatan", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_kecamatan_own_code"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Kabupaten/Kota", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_kota_own_code"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "- Nomor Telepon", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, ": ".$data["o_phone_no_owner"]."     No. Selular ".$data["o_mobile_no_owner"], "TBR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height+2, "", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height+2, "- Kode Pos", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height+2, ": ", "TBR", 0, 'L');
		$spasi = ($per3 * 1) / 20;
		$zip1 = ($per3 * 1) / 20;
		$zip2 = ($per3 * 1) / 20;
		$zip3 = ($per3 * 1) / 20;
		$zip4 = ($per3 * 1) / 20;
		$zip5 = ($per3 * 1) / 20;
		$pdf->Ln($this->height-4);
		if (empty($data["o_zip_code_owner"])) {
			$data["o_zip_code_owner"] = "     ";
		}
		$zipCodeOwn = str_split($data["o_zip_code_owner"]);
		$pdf->Cell($per1+$per2, $this->height, "", 0, 0, 'C');
		$pdf->Cell($spasi-4, $this->height, "", 0, 0, 'C'); //spasi kode pos
		$pdf->Cell($zip1, $this->height, $zipCodeOwn[0], 1, 0, 'C');
		$pdf->Cell($zip2, $this->height, $zipCodeOwn[1], 1, 0, 'C');
		$pdf->Cell($zip3, $this->height, $zipCodeOwn[2], 1, 0, 'C');
		$pdf->Cell($zip4, $this->height, $zipCodeOwn[3], 1, 0, 'C');
		$pdf->Cell($zip5, $this->height, $zipCodeOwn[4], 1, 0, 'C');
		$pdf->Ln(6);
		$pdf->Cell($lengthCell, $this->height, "", 1, 0, 'C');
		$pdf->Ln();
		$pdf->Cell($per1, $this->height, "11. ", "TBL", 0, 'C');
		$pdf->Cell($per2, $this->height, "Pendataan Pajak Parkir", "TB", 0, 'L');
		$pdf->Cell($per3, $this->height, "", "TBR", 0, 'L');
		$pdf->Ln();
		
		//kolom ke 7
		$kol1 = ($lengthCell * 2) / 29;
		$kol2 = ($lengthCell * 7) / 29;
		$kol3 = ($lengthCell * 6) / 29;
		$kol4 = ($lengthCell * 6) / 29;
		$kol5 = ($lengthCell * 6) / 29;
		$kol6 = ($lengthCell * 2) / 29;
		
		$pdf->Cell($kol1, $this->height, "", "LT", 0, 'C');
		$pdf->Cell($kol2, $this->height, "", "TB", 0, 'C');
		$pdf->Cell($kol3, $this->height, "", "TB", 0, 'C');
		$pdf->Cell($kol4, $this->height, "", "TB", 0, 'C');
		$pdf->Cell($kol5, $this->height, "", "TB", 0, 'C');
		$pdf->Cell($kol6, $this->height, "", "RT", 0, 'C');
		$pdf->Ln();
		$pdf->Cell($kol1, $this->height*2, "", "L", 0, 'C');
		$pdf->Cell($kol2, $this->height*2, "", 1, 0, 'C');
		$pdf->Cell($kol3, $this->height*2, "", 1, 0, 'C');
		$pdf->Cell($kol4, $this->height*2, "", 1, 0, 'C');
		$pdf->Cell($kol5, $this->height*2, "", 1, 0, 'C');
		$pdf->Cell($kol6, $this->height*2, "", "R", 0, 'C');
		$pdf->Ln($this->height-5);
		$pdf->Cell($kol1, $this->height*2, "", "L", 0, 'C');
		$pdf->Cell($kol2, $this->height*2, "Klasifikasi Tempat Parkir", 0, 0, 'C');
		$pdf->Cell($kol3, $this->height*2, "Luas Lahan Parkir", 0, 0, 'C');
		$pdf->Cell($kol4, $this->height+2, "Daya Tampung", 0, 0, 'C');
		$pdf->Cell($kol5, $this->height+2, "Frekuensi", 0, 0, 'C');
		$pdf->Cell($kol6, $this->height*2, "", "R", 0, 'C');
		$pdf->Ln($this->height);
		$pdf->Cell($kol1, $this->height, "", "L", 0, 'C');
		$pdf->Cell($kol2, $this->height, "", 0, 0, 'C');
		$pdf->Cell($kol3, $this->height, "", 0, 0, 'C');
		$pdf->Cell($kol4, $this->height-2, "Kendaraan Bermotor", 0, 0, 'C');
		$pdf->Cell($kol5, $this->height-2, "Kendaraan Bermotor", 0, 0, 'C');
		$pdf->Cell($kol6, $this->height, "", "R", 0, 'C');
		$pdf->Ln();
		
		//isi kolom
		$pdf->SetWidths(array($kol1, $kol2, $kol3, $kol4, $kol5, $kol6));
		$pdf->SetAligns(array("C", "L", "C", "C", "C", "C"));
		for ($i=0; $i<count($data2); $i++) {
		$pdf->RowMultiBorderWithHeight(array("",
											  $data2[$i]["classification_desc"],
											  $data2[$i]["parking_size"],
											  $data2[$i]["max_load_qty"],
											  $data2[$i]["avg_subscription_qty"],
											  "")
											 ,
										array('L',
										      'TBL',
											  'TBL',
											  'TBL',
											  'TBL',
											  'LR')
											  ,$this->height);
		}									  
	
		$pdf->Cell($kol1, $this->height, "", "LB", 0, 'C');
		$pdf->Cell($kol2, $this->height, "", "B", 0, 'C');
		$pdf->Cell($kol3, $this->height, "", "B", 0, 'C');
		$pdf->Cell($kol4, $this->height, "", "B", 0, 'C');
		$pdf->Cell($kol5, $this->height, "", "B", 0, 'C');
		$pdf->Cell($kol6, $this->height, "", "RB", 0, 'C');
		$pdf->Ln();
		
		
		$pdf->Cell($lengthCell, $this->height, "", 1, 0, 'C');
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height, "", 1, 0, 'C');
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height, "", 1, 0, 'C');
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height, "", 1, 0, 'C');
		$pdf->Ln();
		$bcr = "select f_gen_barcode('test')";
		$result = $this->db->query($bcr);
		$barcode = $result->row_array();
		
		//Tanda tangan 
		$ttd1 = ($lengthCell * 8) / 13;
		$ttd2 = ($lengthCell * 5) / 13;
		$pdf->Cell($ttd1, $this->height, "", "LTB", 0, 'C');
		$pdf->Cell($ttd2, $this->height, "Nama Jelas :", "TRB", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($ttd1, $this->height, "", "LTB", 0, 'C');
		$pdf->Cell($ttd2, $this->height, "Tanda Tangan", "TRB", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height*6, "", 1, 0, 'C');
		$pdf->Image(base_url().'qrcode/generate-qr.php?param='.$barcode["f_gen_barcode"],124,$pdf->getY()+3,25,0,'PNG');
		$pdf->Ln();
		
		//petugas 
		$jarak = ($lengthCell * 1) / 40;
		$ttdP1 = ($lengthCell * 15) / 40;
		$ttdP2 = ($lengthCell * 24) / 40;
		$pdf->Cell($jarak, $this->height, "", "LTB", 0, 'L');
		$pdf->Cell($ttdP1, $this->height, "DIISI OLEH PETUGAS PENERIMAN", "TB", 0, 'L');
		$pdf->Cell($ttdP2, $this->height, "DIISI OLEH PETUGAS PENCATATAN DATA", "TRB", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($jarak, $this->height, "", "LTB", 0, 'L');
		$pdf->Cell($ttdP1, $this->height, "Diterima tanggal", "TB", 0, 'L');
		$pdf->Cell($ttdP2, $this->height, "NPWPD yang diberikan :", "TRB", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($jarak, $this->height+2, "", "LTB", 0, 'L');
		$pdf->Cell($ttdP1, $this->height+2, "Nama Jelas/NIP", "TB", 0, 'L');
		$pdf->Cell($ttdP2, $this->height+2, "", "TRB", 0, 'L'); //NPWPD
		
		//isi NPWPD
		$spasi2 = ($per3 * 1) / 20;
		$npwpd1 = ($per3 * 1) / 20;
		$npwpd2 = ($per3 * 1) / 20;
		$npwpd3 = ($per3 * 1) / 20;
		$npwpd4 = ($per3 * 1) / 20;
		$npwpd5 = ($per3 * 1) / 20;
		$npwpd6 = ($per3 * 1) / 20;
		$npwpd7 = ($per3 * 1) / 20;
		$npwpd8 = ($per3 * 1) / 20;
		$npwpd9 = ($per3 * 1) / 20;
		$npwpd10 = ($per3 * 1) / 20;
		$npwpd11 = ($per3 * 1) / 20;
		$npwpd12 = ($per3 * 1) / 20;
		$npwpd13 = ($per3 * 1) / 20;
		$pdf->Ln($this->height-4);
		$pdf->Cell($jarak+$ttdP1, $this->height, "", 0, 0, 'C');
		$pdf->Cell($spasi2-4, $this->height, "", 0, 0, 'C'); //spasi npwpd
		$pdf->Cell($npwpd1, $this->height, $data["o_npwpd"][0], 1, 0, 'C');
		$pdf->Cell($spasi2-4, $this->height, "", 0, 0, 'C'); //spasi npwpd
		$pdf->Cell($npwpd2, $this->height, $data["o_npwpd"][1], 1, 0, 'C');
		$pdf->Cell($spasi2-4, $this->height, "", 0, 0, 'C'); //spasi npwpd
		$pdf->Cell($npwpd3, $this->height, $data["o_npwpd"][2], 1, 0, 'C');
		$pdf->Cell($npwpd4, $this->height, $data["o_npwpd"][3], 1, 0, 'C');
		$pdf->Cell($npwpd5, $this->height, $data["o_npwpd"][4], 1, 0, 'C');
		$pdf->Cell($npwpd6, $this->height, $data["o_npwpd"][5], 1, 0, 'C');
		$pdf->Cell($npwpd7, $this->height, $data["o_npwpd"][6], 1, 0, 'C');
		$pdf->Cell($npwpd8, $this->height, $data["o_npwpd"][7], 1, 0, 'C');
		$pdf->Cell($npwpd9, $this->height, $data["o_npwpd"][8], 1, 0, 'C');
		$pdf->Cell($spasi2-4, $this->height, "", 0, 0, 'C'); //spasi npwpd
		$pdf->Cell($npwpd10, $this->height, $data["o_npwpd"][9], 1, 0, 'C');
		$pdf->Cell($npwpd11, $this->height, $data["o_npwpd"][10], 1, 0, 'C');
		$pdf->Cell($spasi2-4, $this->height, "", 0, 0, 'C'); //spasi npwpd
		$pdf->Cell($npwpd12, $this->height, $data["o_npwpd"][11], 1, 0, 'C');
		$pdf->Cell($npwpd13, $this->height, $data["o_npwpd"][12], 1, 0, 'C');
		$pdf->Ln(6);
		
		$pdf->Cell($lengthCell, $this->height, "", 1, 0, 'C');
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height, "", 1, 0, 'C');
		$pdf->Ln();
		$pdf->Cell($lengthCell, $this->height, "", 1, 0, 'C');
		$pdf->Ln();
		$pdf->Cell($jarak, $this->height, "", "LTB", 0, 'L');
		$pdf->Cell($ttdP1, $this->height, "", "TB", 0, 'L');
		$pdf->Cell($ttdP2, $this->height, "Nama Jelas/NIP :", "TRB", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($jarak, $this->height, "", "LTB", 0, 'L');
		$pdf->Cell($ttdP1, $this->height, "", "TB", 0, 'L');
		$pdf->Cell($ttdP2, $this->height, "Tanda Tangan", "TRB", 0, 'L');
		$pdf->Output();
	}

	

	

}



