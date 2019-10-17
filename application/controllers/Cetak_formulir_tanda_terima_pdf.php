<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_formulir_tanda_terima_pdf extends CI_Controller{

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

		$sql="";
		if ($t_customer_order_id != 0) {
			$sql .=  "SELECT *,regexp_replace(brand_address_name, '\r|\n', '', 'g') as 	brand_address_name from(
							SELECT
								 b.code || decode(a.legal_doc_desc,null,'',' ('||a.legal_doc_desc||')') as doc_name, c.order_no,A.t_customer_order_id
							FROM
								t_cust_order_legal_doc A,
								p_legal_doc_type b,
								t_customer_order C
							WHERE
								A .p_legal_doc_type_id = b.p_legal_doc_type_id
							AND A .t_customer_order_id = ".$t_customer_order_id."
							AND C .t_customer_order_id = A .t_customer_order_id) base_doc
							LEFT JOIN	t_cust_account cust_account ON cust_account.t_customer_order_id = base_doc.t_customer_order_id
";
			
		}
		//echo ($sql);exit;
		$query = $this->db->query($sql);
		$data = $query->result_array();
		// print_r($data);
		// exit();
		

		$pdf = new FPDF();


		
		$pdf->AliasNbPages();
		$pdf->AddPage("P");
		$pdf->SetFont('Arial', '', 10);

		$lengthJudul1 = ($this->lengthCell * 3) / 9;
		$lengthJudul2 = ($this->lengthCell * 3) / 9;
		$lengthJudul3 = ($this->lengthCell * 3) / 9;
		$batas1 = ($lengthJudul3 * 2) / 5;
		$batas2 = ($lengthJudul3 * 3) / 5;

		$pdf->Image(getValByCode('LOGO'),15,20,25,25);

		$length1 = ($this->lengthCell * 2) / 9;
		$length2 = ($this->lengthCell * 4) / 9;
		$length3 = ($this->lengthCell * 3) / 9;
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
        $this->seEnter($pdf);
		$pdf->Cell($length1, $this->height, "", "L", 0, 'C');
		$pdf->Cell($length2, $this->height, getValByCode('INSTANSI_1'), 0, 0, 'C');
		$pdf->Cell($length3, $this->height, "  Nomor Formulir", "R", 0, 'L');
		$pdf->Ln();
		$pdf->Cell($length1, $this->height, "", "L", 0, 'C');
		$pdf->Cell($length2, $this->height, getValByCode('INSTANSI_2'), 0, 0, 'C');

		//nomor formulir
		$tmp = "";
		if (empty($data[0]["order_no"])) {
			$tmp  = "        ";
		}else{
			$tmp = $data[0]["order_no"];
		}
		$arr1 = str_split($tmp);
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
		$pdf->Cell($length1, $this->height-4, "", "L", 0, 'C');
		$pdf->Cell($length2, $this->height-4, "", "", 0, 'C');
		$pdf->Cell($length3, $this->height-4, "", "R", 0, 'L');
		$pdf->Ln();

        //-------------- TANDA TERIMA
		$pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'C');
        $pdf->Ln();
		$pdf->Cell($this->lengthCell, $this->height, "TANDA TERIMA", "LR", 0, 'C');
		$pdf->Ln();
        $this->seEnter($pdf);

        //--------------- ISI
        //$this->printIsi('Nama', 2);
        //$this->printIsi('Alamat', 3, $data);
	   	$pdf->SetFont('Arial', '', 10);
		$kolom1 = ($this->lengthCell * 3) / 8;
		$kolom2 = ($this->lengthCell * 5) / 8;
		$pdf->SetWidths(array($kolom1, $kolom2));
		$pdf->SetAligns(array("L", "L"));
		if(empty($data[0]["wp_name"])){
			$this->printIsi('Nama / Merk Dagang', $pdf, 2);
		}else{
	   		$pdf->RowMultiBorderWithHeight(array("       "."Nama / Merk Dagang",
											  ":  ".$data[0]["wp_name"]." / ".$data[0]["company_brand"])
											  ,
										array('L',
										      'R')
											  ,$this->height*2);
		
	   	}
		
		/*if(empty($data["company_brand"])){
			$this->printIsi('Merk Dagang', 2);
		}else{
	   		$pdf->RowMultiBorderWithHeight()array("       "."Merk Dagang",
											  ":  ".$data["company_brand"])
											  ,
										array('L',
										      'R')
											  ,$this->height*2);
		
	   	}*/
		if(empty($data[0]["brand_address_name"])){
			$this->printIsi('Alamat Merk Dagang', $pdf, 2);
		}else{
	   	$pdf->RowMultiBorderWithHeight(array("       "."Alamat Merk Dagang",
											  ":  ".$data[0]["brand_address_name"]." ".$data[0]["brand_address_no"])
											  ,
										array('L',
										      'R')
											  ,$this->height*2);
		
		}
		/*
        $this->printIsi('Telah Menerima', 4, $data);
		*/
		$kolom1 = ($this->lengthCell * 3) / 8;
		$kolom2 = ($this->lengthCell * 5) / 8;
		$pdf->SetWidths(array($kolom1, $kolom2));
		$pdf->SetAligns(array("L", "L"));
		// echo "<pre>";
		// print_r(($data));
		// 		exit();
		for ($i=0; $i<count($data); $i++) {
			if($i==0){
				$pdf->RowMultiBorderWithHeight(array("       "."Dokumen",
													  ":  - ".$data[$i]['doc_name'])
													  ,
												array('L',
												      'R')
													  ,$this->height*1.5);
			}else{
				
				$pdf->RowMultiBorderWithHeight(array("",
													  "   - ".$data[$i]['doc_name'])
													  ,
												array('L',
												      'R')
													  ,$this->height*1.5);
			}
		}
		
        $this->seEnter($pdf);
        $this->seEnter($pdf);

        //---------------- TTD
        $ttdKolom1 = ($this->lengthCell * 5) / 8;
        $ttdKolom2 = ($this->lengthCell * 3) / 8;
        $pdf->Cell($ttdKolom1, $this->height, '', 'L', 0,'L');
        $pdf->Cell($ttdKolom2, $this->height, getValByCode('ALAMAT_3').', ...................................................', 'R', 0,'R');
        $pdf->Ln();
        $pdf->Cell($ttdKolom1, $this->height, '', 'L', 0,'C');
        $pdf->Cell($ttdKolom2, $this->height, '    Yang Menerima', 'R', 0,'C');
        $pdf->Ln();
        $this->seEnter($pdf);
        $this->seEnter($pdf);
        $this->seEnter($pdf);
        $this->seEnter($pdf);
        $pdf->Cell($ttdKolom1, $this->height, '', 'L', 0,'C');
        $pdf->Cell($ttdKolom2, $this->height, '(...................................................)', 'R', 0,'C');
        $pdf->Ln();
        $this->seEnter($pdf);
        $pdf->Cell($this->lengthCell, $this->height, '', 'LBR', 0,'C');
		$pdf->Output();
	}

	function printIsi($jenis, $pdf, $isi = "", $data = null) {
        $pdf->SetFont('Arial', '', 10);
        $kolom1 = ($this->lengthCell * 3) / 8;
		$kolom2 = ($this->lengthCell * 5) / 8;
        $pdf->Cell($kolom1, $this->height, "       ".$jenis, "L", 0, 'L');

        if (is_numeric($isi)) {
			if ($data === null) {
				$pdf->Cell($kolom2, $this->height, ":  .......................................................................................................", "R", 0, 'L');
				$pdf->Ln();
				if ($isi > 1) {
					for ($index = 0; $index < $isi-1; $index++)
					{
						$pdf->Cell($kolom1, $this->height, "", "L", 0, 'L');
						$pdf->Cell($kolom2, $this->height, "   .......................................................................................................", "R", 0, 'L');
						$pdf->Ln();
					}
					$pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'C');
				}
			} else{
				for($i = 0; $i < count($data); $i++){
					if($i == 0){
						$pdf->Cell($kolom2, $this->height, ":  " . $data[$i], "R", 0, "L");
					} else {
						$pdf->Cell($kolom1, $this->height, "", "L", 0, 'L');
						$pdf->Cell($kolom2, $this->height, "   " . $data[$i], "R", 0, "L");
					}
					
					$pdf->Ln();
				}
				$pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'C');
			}
        } else {
            $pdf->Cell($kolom2, $this->height, ":  ".$isi, "R", 0, 'L');
        }
        $pdf->Ln();
    }

    function seEnter($pdf) {
        $pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'C');
        $pdf->Ln();
    }

	

	

}



