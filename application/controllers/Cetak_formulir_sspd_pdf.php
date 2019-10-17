<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_formulir_sspd_pdf extends CI_Controller{

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

    function newLine($pdf){
        $pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'L');
        $pdf->Ln();
    }

	function RowMultiBorderWithHeight($data, $border = array(),$height, $pdf)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$pdf->NbLines($this->widths[$i],$data[$i], $pdf));
		$h=$height*$nb;
		//Issue a page break first if needed
		$pdf->CheckPageBreak($h);
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$pdf->widths[$i];
			$a=isset($pdf->aligns[$i]) ? $pdf->aligns[$i] : 'L';
			//Save the current position
			$x=$pdf->GetX();
			$y=$pdf->GetY();
			//Draw the border
			//$this->Rect($x,$y,$w,$h);
			$pdf->Cell($w, $h, '', isset($border[$i]) ? $border[$i] : 1, 0);
			$pdf->SetXY($x,$y);
			//Print the text
			$pdf->MultiCell($w,$height,$data[$i],0,$a);
			//Put the position to the right of the cell
			$pdf->SetXY($x+$w,$y);
		}
		//Go to the next line
		$pdf->Ln($h);
	}


	function pageCetak() {

		$t_customer_order_id = getVarClean('t_customer_order_id','int',0);

		$data = array();
        $sql = "select a.order_no ,
			   c.company_brand as nama,
			   c.brand_address_name ||' no. '|| c.brand_address_no as alamat,
			   c.npwd,
			   'SPTPD' as dasar_setoran ,
			   e.code as masa_pajak,
			   to_char(e.start_date,'YYYY') as tahun,
			   d.receipt_no as no_urut ,
			   f.code||h.code as ayat ,
			   f.penalty_code as penalty_ayat ,
			   f.vat_code as jenis_pajak,
			   b.total_vat_amount as jumlah,
			   nvl(g.penalty_amt,0)as penalty_amt,
			   b.no_kohir,
			   replace(f_terbilang(to_char(round(nvl(b.total_vat_amount,0)+nvl(g.penalty_amt,0))),'IDR'), '  ', ' ') as dengan_huruf
		from t_customer_order a,
			 t_vat_setllement b,
			 t_cust_account c ,
			 t_payment_receipt d,
			 p_finance_period e ,
			 p_vat_type f,
			 t_vat_penalty g,
			 p_vat_type_dtl h
		where a.t_customer_order_id = b.t_customer_order_id
			  and b.t_cust_account_id = c.t_cust_account_id
			  and c.p_vat_type_dtl_id = h.p_vat_type_dtl_id
			  and b.t_vat_setllement_id = d.t_vat_setllement_id (+)
			  and b.p_finance_period_id = e.p_finance_period_id
			  and c.p_vat_type_id = f.p_vat_type_id
			  and b.t_vat_setllement_id = g.t_vat_setllement_id (+)
			  and a.t_customer_order_id = ?";
        $output = $this->db->query($sql, array($t_customer_order_id));
        $data = $output->row_array();


		$pdf = new FPDF();

		$this->startY = $pdf->GetY();
        $this->startX = $this->paperWSize-42;
        $this->lengthCell = $this->startX+20;
		$pdf->AliasNbPages();
		$pdf->AddPage("P");
		$pdf->SetFont('Arial', '', 7);

		$pdf->Image(getValByCode('LOGO'),15,13,25,25);

		$lheader = $this->lengthCell / 8;
		$lheader1 = $lheader * 1;
		$lheader3 = $lheader * 3;
		$lheader4 = $lheader * 4;

		$pdf->Cell($lheader1, $this->height, "", "LT", 0, 'L');
		$pdf->Cell($lheader3, $this->height, "", "TR", 0, 'L');
		$pdf->Cell($lheader3, $this->height, "", "T", 0, 'L');
		$pdf->Cell($lheader1, $this->height, "", "TR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lheader3, $this->height, getValByCode('INSTANSI_1'), "R", 0, 'C');
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell($lheader4, $this->height, "SSPD", "R", 0, 'C');
		$pdf->Ln();
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lheader3, $this->height, getValByCode('INSTANSI_2'), "R", 0, 'C');

		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell($lheader4, $this->height, "(SURAT SETORAN PAJAK DAERAH)", "R", 0, 'C');
		$pdf->Ln();
		$pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell($lheader3, $this->height, getValByCode('ALAMAT_6'), "R", 0, 'C');

		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell($lheader4, $this->height, "Tahun ".$data["tahun"], "R", 0, 'C');
		$pdf->Ln();
		$pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell($lheader3, $this->height, "Telp.".getValByCode('ALAMAT_2')." - ".getValByCode('ALAMAT_3'), "R", 0, 'C');
		$pdf->Cell($lheader4, $this->height, "", "R", 0, 'C');
		$pdf->Ln();
		$pdf->Cell($lheader1, $this->height, "", "LB", 0, 'L');
		$pdf->Cell($lheader3, $this->height, "", "BR", 0, 'L');
		$pdf->Cell($lheader3, $this->height, "", "B", 0, 'L');
		$pdf->Cell($lheader1, $this->height, "", "BR", 0, 'L');

		$lbody = $this->lengthCell / 3;
		$lbody1 = $lbody * 1;
		$lbody2 = $lbody * 2;
		$lbody3 = $lbody * 3;

		$pdf->SetFont('Arial', '', 12);
		$pdf->Ln();
		$pdf->Cell($lbody3, $this->height, "", "LR", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($lbody1, $this->height, "          Nama", "L", 0, 'L');
		$pdf->Cell($lbody2, $this->height, ": ".$data["nama"], "R", 0, 'L');
		$this->newLine($pdf);
		$this->newLine($pdf);
		$pdf->Cell($lbody1, $this->height, "          Alamat", "L", 0, 'L');
		$pdf->Cell($lbody2, $this->height, ": ".$data["alamat"], "R", 0, 'L');
		$this->newLine($pdf);
		$this->newLine($pdf);

		$pdf->Cell($lbody1, $this->height + 2, "          NPWD", "L", 0, 'L');
		$pdf->Cell($lbody1, $this->height + 2, "", "", 0, 'L');
		$pdf->Cell($lbody1, $this->height + 2, "", "R", 0, 'L');
		$pdf->Ln($this->height-4);

		$pdf->Cell($lbody1, $this->height, "", "L", 0, 'L');
		$rep_npwd = str_replace(".","",$data["npwd"]);
		$arr1 = str_split($rep_npwd);

		$this->kotak(1, 34, 1,$arr1[0], $pdf);
		$this->kotakKosong(1, 34, 1, $pdf);
		$this->kotak(1, 34, 1,$arr1[1], $pdf);
		$this->kotakKosong(1, 34, 1, $pdf);
		$this->kotak(1, 34, 1,$arr1[2], $pdf);
		$this->kotak(1, 34, 1,$arr1[3], $pdf);
		$this->kotak(1, 34, 1,$arr1[4], $pdf);
		$this->kotak(1, 34, 1,$arr1[5], $pdf);
		$this->kotak(1, 34, 1,$arr1[6], $pdf);
		$this->kotak(1, 34, 1,$arr1[7], $pdf);
		$this->kotak(1, 34, 1,$arr1[8], $pdf);
		$this->kotakKosong(1, 34, 1, $pdf);
		$this->kotak(1, 34, 2,$arr1[9], $pdf);
		$this->kotakKosong(1, 34, 1, $pdf);
		$this->kotak(1, 34, 2,$arr1[10], $pdf);

		$this->newLine($pdf);
		$this->newLine($pdf);


		//ceking menyetor
		$SKPDKB = "";
		$SPTPD = "";
		$SKPDKBT = "";
		$K_Pembetulan = "";
		$STPD = "";
		$K_Keberatan = "";
		$lain_lain = "";


		if ($data["dasar_setoran"] == "SKPDKB"){
		   $SKPDKB = "X";
		}else if($data["dasar_setoran"] == "SPTPD"){
		   $SPTPD = "X";
		}else if($data["dasar_setoran"] == "SKPDKBT"){
		   $SKPDKBT = "X";
		}else if($data["dasar_setoran"] == "K Pembetulan"){
		   $K_Pembetulan = "X";
		}else if($data["dasar_setoran"] == "STPD"){
		   $STPD = "X";
		}else if($data["dasar_setoran"] == "K Keberatan"){
		   $K_Keberatan = "X";
		}else{
		   $lain_lain = "X";
		}

		if ($data["penalty_amt"] == 0){
			$STPD = "";
		}else{
			$STPD = "X";
		}


		$pdf->Cell($lbody1, $this->height, "          (Menyetor berdasarkan *)", "L", 0, 'L');

		$lcek = $lbody2 / 3;
		$lcek1 = $lcek * 1;
		$pdf->Cell($lcek1, $this->height + 2, "     SKPDKB", "", 0, 'L');
		$pdf->Cell($lcek1, $this->height + 2, "          SPTPD", "", 0, 'L');
		$pdf->Cell($lcek1, $this->height + 2, "               Lain-lain", "R", 0, 'L');
		$pdf->Ln($this->height-4);

		$pdf->Cell($lbody1, $this->height, "", "L", 0, 'L');
		$this->kotak(1, 34, 1,$SKPDKB, $pdf);
		$pdf->Cell($lcek1, $this->height, "", "", 0, 'C');
		$this->kotak(1, 34, 1,$SPTPD, $pdf);
		$pdf->Cell($lcek1, $this->height, "", "", 0, 'C');
		$this->kotak(1, 34, 1,$lain_lain, $pdf);

		$this->newLine($pdf);
		$this->newLine($pdf);

		$pdf->Cell($lbody1, $this->height, "", "L", 0, 'L');

		$pdf->Cell($lcek1, $this->height + 2, "     SKPDKBT", "", 0, 'L');
		$pdf->Cell($lcek1, $this->height + 2, "          K Pembetulan", "", 0, 'L');
		$pdf->Cell($lcek1, $this->height + 2, "", "R", 0, 'L');
		$pdf->Ln($this->height-4);

		$pdf->Cell($lbody1, $this->height, "", "L", 0, 'L');
		$this->kotak(1, 34, 1,$SKPDKBT, $pdf);
		$pdf->Cell($lcek1, $this->height, "", "", 0, 'C');
		$this->kotak(1, 34, 1,$K_Pembetulan, $pdf);

		$this->newLine($pdf);
		$this->newLine($pdf);

		$pdf->Cell($lbody1, $this->height, "", "L", 0, 'L');

		$pdf->Cell($lcek1, $this->height + 2, "     STPD", "", 0, 'L');
		$pdf->Cell($lcek1, $this->height + 2, "          K Keberatan", "", 0, 'L');
		$pdf->Cell($lcek1, $this->height + 2, "", "R", 0, 'L');
		$pdf->Ln($this->height-4);

		$pdf->Cell($lbody1, $this->height, "", "L", 0, 'L');
		$this->kotak(1, 34, 1,$STPD, $pdf);
		$pdf->Cell($lcek1, $this->height, "", "", 0, 'C');
		$this->kotak(1, 34, 1,$K_Keberatan, $pdf);

		$this->newLine($pdf);
		$this->newLine($pdf);
		$this->newLine($pdf);
		$this->newLine($pdf);

		$pdf->Cell($lbody1, $this->height, " Masa Pajak : ".$data["masa_pajak"], "L", 0, 'L');
		$pdf->Cell($lcek1, $this->height, "          Tahun : ".$data["tahun"], "", 0, 'L');
		$pdf->Cell($lcek1, $this->height, "               No. Urut : ".$data["no_kohir"], "", 0, 'L');

		$pdf->Cell($lcek1, $this->height, "", "R", 0, 'L');

		$this->newLine($pdf);
		$this->newLine($pdf);

		$ltable = $this->lengthCell / 17;
		$ltable1 = $ltable * 1;
		$ltable4 = $ltable * 4;

		$pdf->Cell($ltable1, $this->height + 2, "No.", "TBLR", 0, 'C');
		$pdf->Cell($ltable4, $this->height + 2, "Ayat", "TBLR", 0, 'C');
		$pdf->Cell($ltable4 * 2, $this->height + 2, "Jenis Pajak", "TBLR", 0, 'C');
		$pdf->Cell($ltable4, $this->height + 2, "Jumlah (Rp)", "TBLR", 0, 'C');


		//$jumlahBaris = 5;
		//for($i = 0; $i < $jumlahBaris; $i++){
			$pdf->Ln();
			//$this->Cell($ltable1, $this->height + 2, "1", "TBLR", 0, 'C');
			//$this->Cell($ltable4, $this->height + 2, $data["ayat"], "TBLR", 0, 'L');
			//$this->Cell($ltable4 * 2, $this->height + 2, $data["jenis_pajak"], "TBLR", 0, 'L');
			//$this->Cell($ltable4, $this->height + 2, $data["jumlah"], "TBLR", 0, 'C');
		//}


		//isi kolom
		$pdf->SetWidths(array($ltable1, $ltable4, $ltable4 * 2, $ltable4));
		$pdf->SetAligns(array("C", "L", "L", "R"));
		$no = 1;
		$tot = 0;
		for ($i=0; $i<count($data['ayat']); $i++) {
			$this->RowMultiBorderWithHeight(array($no,
												  $data["ayat"],
												  $data["jenis_pajak"],
												  number_format($data["jumlah"],2,",",".")
												  ),
											array('TBLR',
												  'TBLR',
												  'TBLR',
												  'TBLR')
												  ,$this->height, $pdf);
			$no = $no + 1;
			$tot = $tot + $data["jumlah"];
		}
		//isi kolom
		$tot2 = 0;
		if ($data["penalty_amt"] != 0){
			$pdf->SetWidths(array($ltable1, $ltable4, $ltable4 * 2, $ltable4));
			$pdf->SetAligns(array("C", "L", "L", "R"));

			for ($i=0; $i<count($data['penalty_ayat']); $i++) {
				$this->RowMultiBorderWithHeight(array($no,
													  $data["penalty_ayat"],
													  "Denda ".$data["jenis_pajak"],
													  number_format($data["penalty_amt"],2,",",".")
													  ),
												array('TBLR',
													  'TBLR',
													  'TBLR',
													  'TBLR')
													  ,$this->height, $pdf);
				$no = $no + 1;
				$tot2 = $tot2 + $data["penalty_amt"];
			}
		}

		$total_jum = $tot + $tot2;
		$pdf->Cell($ltable1, $this->height + 2, "", "L", 0, 'C');
		$pdf->Cell($ltable4, $this->height + 2, "", "", 0, 'C');
		$pdf->Cell($ltable4 * 2, $this->height + 2, "Jumlah Setoran Pajak", "TBLR", 0, 'C');
		$pdf->Cell($ltable4, $this->height + 2, number_format($total_jum,2,",","."), "TBLR", 0, 'R');

		$pdf->Ln();
		$this->newLine($pdf);

		$pdf->SetWidths(array($ltable1 + $ltable4, $ltable4 * 3));
		$pdf->SetAligns(array("C", "L"));
		$this->RowMultiBorderWithHeight(array("Dengan huruf", $data["dengan_huruf"]),
										array("L", "TBLR"),
										$this->height, $pdf);
		$this->newLine($pdf);

		$lowTable = $this->lengthCell / 3;
		$lowTable1 = $lowTable * 1;

		$pdf->Cell($lowTable1, $this->height + 2, "Kode Register", "LTR", 0, 'C');
		$pdf->Cell($lowTable1, $this->height + 2, "Diterima oleh", "LTR", 0, 'C');
		$pdf->Cell($lowTable1, $this->height + 2, "............................. Tahun", "LTR", 0, 'C');

		$pdf->Ln();
		$pdf->Cell($lowTable1, $this->height + 2, "", "LR", 0, 'C');
		$pdf->Cell($lowTable1, $this->height + 2, "Petugas Tempat Pembayaran", "LR", 0, 'C');
		$pdf->Cell($lowTable1, $this->height + 2, ".....................", "LR", 0, 'C');
		if ($data["no_urut"] != "") {

			$query = "select f_encrypt_str('".$data["no_urut"]."') AS enc_data";
			$result = $this->db->query($query);
			$row = $result->row_array();
			$encImageData = $row["enc_data"];

			$pdf->Image(base_url().'/qrcode/generate-qr.php?param='.$encImageData,30,$pdf->getY(),25,0,'PNG');
		}
		$pdf->Ln();
		$pdf->Cell($lowTable1, $this->height + 2, "", "LR", 0, 'C');
		$pdf->Cell($lowTable1, $this->height + 2, "Tanggal :".date("d F Y"), "LR", 0, 'L');
		$pdf->Cell($lowTable1, $this->height + 2, "Penyetor", "LR", 0, 'C');

		$pdf->Ln();
		$pdf->Cell($lowTable1, $this->height + 2, "", "LR", 0, 'C');
		$pdf->Cell($lowTable1, $this->height + 2, "", "LR", 0, 'C');
		$pdf->Cell($lowTable1, $this->height + 2, "", "LR", 0, 'C');
		$pdf->Cell($lowTable1, $this->height + 2, "", "LR", 0, 'C');

		$pdf->Ln();
		$pdf->Cell($lowTable1, $this->height + 2, "", "LR", 0, 'C');
		$pdf->Cell($lowTable1, $this->height + 2, "", "LR", 0, 'L'); //$data["no_urut"]
		$pdf->Cell($lowTable1, $this->height + 2, "", "LR", 0, 'C');

		$nomor_urut = explode("-",$data["no_urut"]);

		if(!isset($nomor_urut[0])) {
			$nomor_urut[0] = '';
		}
		if(!isset($nomor_urut[1])) {
			$nomor_urut[1] = '';
		}

		$pdf->Ln();
		$pdf->Cell($lowTable1, $this->height + 2, $nomor_urut[0], "LR", 0, 'L');
		$pdf->Cell($lowTable1, $this->height + 2, "", "LR", 0, 'C');
		$pdf->Cell($lowTable1, $this->height + 2, "", "LR", 0, 'C');

		$user = $this->session->userdata('app_user_name');
		$pdf->Ln();
		$pdf->Cell($lowTable1, $this->height + 2, $nomor_urut[1], "BLR", 0, 'L');
		$pdf->Cell($lowTable1, $this->height + 2, "Nama Terang : ".$user, "BLR", 0, 'L');
		$pdf->Cell($lowTable1, $this->height + 2, "(.....................)", "BLR", 0, 'C');

		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell($lowTable1 - 15, $this->height + 2, "Beri tanda X pada kotak", "", 0, 'L');
		$this->kotak(1, 34, 1,"", $pdf);
		$pdf->Cell($lowTable1, $this->height + 2, "sesuai dengan yang dimiliki.", "", 0, 'L');

		$pdf->Output("","I");
	}

	function tulis($text, $align, $pdf){
		$pdf->Cell(5, $this->height, "", "L", 0, 'C');
		$pdf->Cell($this->lengthCell - 10, $this->height, $text, "", 0, $align);
		$pdf->Cell(5, $this->height, "", "R", 0, 'C');
		$pdf->Ln();
	}

	function kotakKosong($pembilang, $penyebut, $jumlahKotak, $pdf){
		$lkotak = $pembilang / $penyebut * $this->lengthCell;
		for($i = 0; $i < $jumlahKotak; $i++){
			$pdf->Cell($lkotak, $this->height, "", "LR", 0, 'L');
		}
	}

	function kotak($pembilang, $penyebut, $jumlahKotak, $isi, $pdf){
		$lkotak = $pembilang / $penyebut * $this->lengthCell;
		for($i = 0; $i < $jumlahKotak; $i++){
			$pdf->Cell($lkotak, $this->height, $isi, "TBLR", 0, 'C');
		}
	}

	function getNumberFormat($number, $dec) {
			if (!empty($number)) {
				return number_format($number, $dec);
			} else {
				return "";
			}
	}

}



