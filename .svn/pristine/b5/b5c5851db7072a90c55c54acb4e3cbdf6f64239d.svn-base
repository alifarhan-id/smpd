<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_trans_harian_pdf extends CI_Controller{
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
		$trans_date = getVarClean('trans_date','str','');

		$items = $this->getDataPdf($t_cust_account_id,$trans_date);


		$pdf = new FPDF(); 
		$pdf->AliasNbPages();
		$pdf->AddPage("P");		
		//$startY = $this->GetY();
		//$startX = $this->paperWSize-42;
		//$lengthCell = $startX+20;		
		$pdf->SetFont('Arial', '', 10);
		
		$kol1 = ($this->lengthCell * 3) / 15;
		$kol2 = ($this->lengthCell * 3) / 15;
		$kol3 = ($this->lengthCell * 3) / 15; 
		$kol4 = ($this->lengthCell * 3) / 15;
		$kol5 = ($this->lengthCell * 3) / 15; 
		
		$pdf->Cell($this->lengthCell, $this->height, "TRANSAKSI HARIAN WP", 0, 0, 'C');
		$pdf->Ln(10);
		$pdf->Cell($kol1, $this->height, "No. Faktur", 1, 0, 'C');
		$pdf->Cell($kol2, $this->height, "Nama Transaksi", 1, 0, 'C');
		$pdf->Cell($kol3, $this->height, "Nilai Transaksi", 1, 0, 'C');
		$pdf->Cell($kol4, $this->height, "Nilai Pajak", 1, 0, 'C');
		$pdf->Cell($kol5, $this->height, "Descripsi", 1, 0, 'C');
		$pdf->Ln();
		$pdf->SetWidths(array($kol1, $kol2, $kol3, $kol4, $kol5));
		$pdf->SetAligns(array("C", "L", "R", "R", "L"));

		foreach ($items as $data) {
			$pdf->RowMultiBorderWithHeight(array($data["bill_no"],
											  $data["service_desc"],
											  $data["service_charge"],
											  $data["vat_charge"],
											  $data["description"])
											 ,
										array('TBLR',
											  'TBLR',
											  'TBLR',
											  'TBLR',
											  'TBLR')
											  ,$this->height);
		}


		$pdf->output();

		
	}

	



	function getDataPdf($t_cust_account_id,$trans_date){
       	$sql = "SELECT bill_no, service_desc, service_charge, vat_charge, description
				FROM f_get_cust_acc_dtl_trans(".$t_cust_account_id.",'".$trans_date."')AS tbl (t_cust_acc_dtl_trans_id)";

       	$output = $this->db->query($sql);
        $items = $output->result_array();

        return $items;

	}
}