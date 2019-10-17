<?php defined('BASEPATH') OR exit('No direct script access allowed');
//require('fpdf_html/WriteHTML.php');
require('mpdf60/mpdf.php');

class Cetak_surat_tugas_pdf extends CI_Controller{

	var $fontSize = 10;
    var $fontFam = 'Arial';
    var $yearId = 0;
    var $yearCode="";
    var $paperWSize = 206;
    var $paperHSize = 330.2;
    var $height = 5;
    var $currX;
    var $currY;
    var $widths;
    var $aligns;

    function __construct() {
        parent::__construct();
        //$this->formCetak();
    }
	
	function pageCetak() {
		$p_assignment_letter_id = getVarClean('p_assignment_letter_id','int',0);

		$sql = "select * from p_assignment_letter where p_assignment_letter_id = ?";
		$query = $this->db->query($sql, array($p_assignment_letter_id));
		$data = $query->row_array();

		if (empty($data)){
			echo "Data Tidak Ada";
			exit();
		}

		$pdf=new mPDF();
		// $pdf->AddPage('P','Letter');
		// $pdf->SetFont('Arial');
		$pdf->WriteHTML($data['letter_body']);
		$pdf->Output();		
	}
	

}



