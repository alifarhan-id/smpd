<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_trans_bulanan_pdf extends CI_Controller{
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



	function save_pdf(){
		$t_cust_account_id = getVarClean('t_cust_account_id','int',0);

		$items = $this->getDataPdf($t_cust_account_id);


		$pdf = new FPDF(); 
		$pdf->AliasNbPages();
		$pdf->AddPage("P");			
		$pdf->SetFont('Arial', '', 10);
		
		$kosong = ($this->lengthCell * 3) / 15;
		$kol1 = ($this->lengthCell * 3) / 15;
		$kol2 = ($this->lengthCell * 3) / 15;
		$kol3 = ($this->lengthCell * 3) / 15;  
		$kosong2 = ($this->lengthCell * 3) / 15;
		
		$pdf->Cell($this->lengthCell, $this->height, "TRANSAKSI BULANAN WP", 0, 0, 'C');
		$pdf->Ln(10);
		$pdf->Cell($kosong, $this->height, "", 0, 0, 'C');
		$pdf->Cell($kol1, $this->height, "Tanggal Transaksi", 1, 0, 'C');
		$pdf->Cell($kol2, $this->height, "Nilai Transaksi", 1, 0, 'C');
		$pdf->Cell($kol3, $this->height, "Nilai Pajak", 1, 0, 'C');
		$pdf->Cell($kosong2, $this->height, "", 0, 0, 'C');
		$pdf->Ln();
		$pdf->SetWidths(array($kosong, $kol1, $kol2, $kol3, $kosong2));
		$pdf->SetAligns(array("C", "C", "R", "R", "C"));

		foreach ($items as $data) {
			$pdf->RowMultiBorderWithHeight(array("",
											  $data["trans_date_txt"],
											  $data["service_charge"],
											  $data["vat_charge"],"")
											 ,
										array('',
											  'TBLR',
											  'TBLR',
											  'TBLR','')
											  ,$this->height);
		}


		$pdf->output();

		
	}

	



	function getDataPdf($t_cust_account_id){
       	$sql = "select * from f_get_cust_acc_dtl_trans_month(".$t_cust_account_id.") AS tbl (t_cust_acc_dtl_trans_month)";

       	$output = $this->db->query($sql);
        $items = $output->result_array();

        return $items;

	}
}