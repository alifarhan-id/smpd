<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_lap_harian_teller extends CI_Controller{
	var $fontSize = 10;
	var $fontFam = 'Arial';
	var $yearId = 0;
	var $yearCode="";
	var $paperWSize = 330;
	var $paperHSize = 215;
	var $height = 5;
	var $currX;
	var $currY;
	var $widths;
	var $aligns;

	function __construct() {
	    parent::__construct();
		$pdf = new FPDF();
		$this->startY = $pdf->GetY();
		$this->startX = $this->paperWSize-72;
		$this->lengthCell = $this->startX+20;		
	}

	function pageCetak(){
		$tgl_penerimaan     = getVarClean('tgl_penerimaan','str','');        
        $nama_teller        = getVarClean('nama_teller','str','');
        $p_payment_type_id  = getVarClean('p_payment_type_id','int',0);

        if($tgl_penerimaan != ''){

        	$data = $this->getDataTeller($tgl_penerimaan,$nama_teller,$p_payment_type_id);
        	//print_r($data);exit();

        	$pdf = new FPDF();

        	$pdf->AliasNbPages();
			$pdf->AddPage("L");
			$pdf->SetFont('Arial', '', 10);

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
			$pdf->Cell($lheader4, $this->height, "LAPORAN HARIAN TELLER", "R", 0, 'C');
			$pdf->Ln();
			$pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lheader3, $this->height, getValByCode('INSTANSI_2'), "R", 0, 'C');
			$pdf->Cell($lheader4, $this->height, "TANGGAL : ".$tgl_penerimaan, "R", 0, 'C');
			$pdf->Ln();
			$pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lheader3, $this->height, getValByCode('ALAMAT_6'), "R", 0, 'C');
			$pdf->Cell($lheader4, $this->height, "USER TELLER : ".$nama_teller, "R", 0, 'C');
			$pdf->Ln();
			$pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
			$pdf->Cell($lheader3, $this->height, "Telp. ".getValByCode('ALAMAT_4')." - ".getValByCode('ALAMAT_3'), "R", 0, 'C');
			
			$pdf->Cell($lheader4, $this->height, "", "R", 0, 'C');
			
			$pdf->Ln();
			$pdf->Cell($lheader1, $this->height, "", "LB", 0, 'L');
			$pdf->Cell($lheader3, $this->height, "", "BR", 0, 'L');
			$pdf->Cell($lheader3, $this->height, "", "B", 0, 'L');
			$pdf->Cell($lheader1, $this->height, "", "BR", 0, 'L');
			$pdf->Ln();
			
			$ltable = $this->lengthCell / 26;
			$ltable1 = $ltable * 1;
			$ltable2 = $ltable * 2;
			$ltable3 = $ltable * 3;
			$ltable4 = $ltable * 4;
			$ltable5 = $ltable * 5;
			$ltable22 = $ltable * 22;
			
			//besar
			$pdf->Ln();
			$pdf->Cell($ltable1, $this->height + 2, "NO.", "TBLR", 0, 'C');
			$pdf->Cell($ltable4, $this->height + 2, "NAMA WP", "TBLR", 0, 'C');
			$pdf->Cell($ltable3, $this->height + 2, "NPWPD", "TBLR", 0, 'C');
			$pdf->Cell($ltable3, $this->height + 2, "TGL BAYAR", "TBLR", 0, 'C');
			$pdf->Cell($ltable4, $this->height + 2, "PERIODE", "TBLR", 0, 'C');
			$pdf->Cell($ltable3, $this->height + 2, "AYAT PAJAK", "TBLR", 0, 'C');
			$pdf->Cell($ltable2, $this->height + 2, "NO KOHIR", "TBLR", 0, 'C');
			$pdf->Cell($ltable3, $this->height + 2, "NILAI DENDA", "TBLR", 0, 'C');
			$pdf->Cell($ltable3, $this->height + 2, "NILAI PAJAK", "TBLR", 0, 'C');
			$pdf->Ln();

			$pdf->SetWidths(array($ltable1, $ltable4, $ltable3, $ltable3, $ltable4, $ltable3, $ltable2, $ltable3, $ltable3));
			$pdf->SetAligns(array("C", "L", "L", "C", "L", "L", "C", "R", "R"));

			$no = 1;
			$total_payment = 0;
		    $total_denda = 0;
		    $ayat_pajak = $data[0]['ayat_pajak'];
		    
		    $total_per_ayat = 0;
		    $total_denda_per_ayat = 0;
		    
		    for($i = 0; $i < count($data); $i++) {

			    $total_payment += $data[$i]['payment_vat_amount'];
			    $total_denda += $data[$i]['denda'];

	    		if($ayat_pajak != $data[$i]['ayat_pajak']) {
	                $pdf->SetWidths(array($ltable1+$ltable4+$ltable3+$ltable3+$ltable4+$ltable3+$ltable2, $ltable3, $ltable3));
			        $pdf->SetAligns(array("C", "R", "R"));      
	    			$pdf->SetFont('Arial', 'B', 10);
	    			$pdf->RowMultiBorderWithHeight(array('TOTAL '.$ayat_pajak,
													  'Rp. '.number_format($total_denda_per_ayat, 0, ',', '.'),
													  'Rp. '.number_format($total_per_ayat, 0, ',', '.')
													  ),
												array('TBLR',
													  'TBLR',
													  'TBLR')
													  ,$this->height);
													  
	    			$pdf->SetFont('Arial', '', 10);
	    			$pdf->SetWidths(array($ltable1, $ltable4, $ltable3, $ltable3, $ltable4, $ltable3, $ltable2, $ltable3, $ltable3));
			        $pdf->SetAligns(array("C", "L", "L", "C", "L", "L", "C", "R", "R"));
			        
			        $pdf->RowMultiBorderWithHeight(array($no,
													  $data[$i]["wp_name"],
													  $data[$i]["npwd"],
													  $data[$i]["payment_date"],
													  $data[$i]["finance_period_code"],
													  $data[$i]["ayat_pajak"],
													  $data[$i]["no_kohir"],
													  number_format($data[$i]["denda"], 0, ',', '.'),
													  number_format($data[$i]["payment_vat_amount"], 0, ',', '.')
													  ),
												array('TBLR',
													  'TBLR',
													  'TBLR',
													  'TBLR',
													  'TBLR',
													  'TBLR',
													  'TBLR',
													  'TBLR',
													  'TBLR')
													  ,$this->height);
	    			
	    			$ayat_pajak = $data[$i]['ayat_pajak'];
	    			$total_per_ayat = 0;
	    			$total_denda_per_ayat = 0;
	    
	    			$total_per_ayat += $data[$i]['payment_vat_amount'];
	    			$total_denda_per_ayat += $data[$i]['denda'];
	    			
	    		}else {
	    
	    			$total_per_ayat += $data[$i]['payment_vat_amount'];
	    			$total_denda_per_ayat += $data[$i]['denda'];
	                
	                $pdf->SetFont('Arial', '', 10);
	                $pdf->SetWidths(array($ltable1, $ltable4, $ltable3, $ltable3, $ltable4, $ltable3, $ltable2, $ltable3, $ltable3));
			        $pdf->SetAligns(array("C", "L", "L", "C", "L", "L", "C", "R", "R"));
			        $pdf->RowMultiBorderWithHeight(array($no,
													  $data[$i]["wp_name"],
													  $data[$i]["npwd"],
													  $data[$i]["payment_date"],
													  $data[$i]["finance_period_code"],
													  $data[$i]["ayat_pajak"],
													  $data[$i]["no_kohir"],
													  number_format($data[$i]["denda"], 0, ',', '.'),
													  number_format($data[$i]["payment_vat_amount"], 0, ',', '.')
													  ),
												array('TBLR',
													  'TBLR',
													  'TBLR',
													  'TBLR',
													  'TBLR',
													  'TBLR',
													  'TBLR',
													  'TBLR',
													  'TBLR')
													  ,$this->height);
													  
	    		}
	    		
	    		$no++;
		    }	
		    
		    $pdf->SetWidths(array($ltable1+$ltable4+$ltable3+$ltable3+$ltable4+$ltable3+$ltable2, $ltable3, $ltable3));
			$pdf->SetAligns(array("C", "R", "R"));                
	    	
	    	$pdf->SetFont('Arial', 'B', 10);
	    	$pdf->RowMultiBorderWithHeight(array('TOTAL '.$ayat_pajak,
											  'Rp. '.number_format($total_denda_per_ayat, 0, ',', '.'),
											  'Rp. '.number_format($total_per_ayat, 0, ',', '.')
											  ),
										array('TBLR',
											  'TBLR',
											  'TBLR')
											  ,$this->height);
		    
		    $pdf->RowMultiBorderWithHeight(array('TOTAL',
											  'Rp. '.number_format($total_denda, 0, ',', '.'),
											  'Rp. '.number_format($total_payment, 0, ',', '.')
											  ),
										array('TBLR',
											  'TBLR',
											  'TBLR')
											  ,$this->height);
											  
			$pdf->SetFont('Arial', '', 10);
			$pdf->Ln();
	        $pdf->Ln();
	        
			$pdf->SetAligns(array("C", "C"));
			$pdf->SetWidths(array(180, 120));
			$pdf->RowMultiBorderWithHeight( array("",getValByCode('ALAMAT_3').", " . date("d F Y")."\n\n\n\n\n\n\n\n(....................................)"), array("",""), 5 );

			$pdf->output();


        }

	}

	function getDataTeller($tgl_penerimaan,$nama_teller,$p_payment_type_id){
		$whereClause='';
		$data = array();

		$sql = "SELECT f.t_payment_receipt_id, f.p_cg_terminal_id, f.npwd, d.wp_name, f.receipt_no, f.payment_date, 
					a.no_kohir, f.finance_period_code, f.payment_amount, f.payment_vat_amount,
						c.vat_code as ayat_pajak, f.payment_amount - f.payment_vat_amount as denda
						FROM t_payment_receipt f, t_vat_setllement a, p_vat_type_dtl c, t_cust_account d
						WHERE 
						f.t_vat_setllement_id = a.t_vat_setllement_id AND
						f.p_vat_type_dtl_id = c.p_vat_type_dtl_id AND
						a.t_cust_account_id = d.t_cust_account_id AND
						( upper(f.p_cg_terminal_id) LIKE upper('%".$nama_teller."%')
						) 
						AND trunc(f.payment_date) = '".$tgl_penerimaan."'
						and case when ".$p_payment_type_id."=0 then true
								 when ".$p_payment_type_id."=2 and p_payment_type_id is null then TRUE
								 else p_payment_type_id = ".$p_payment_type_id."
							end
						ORDER BY c.vat_code ASC, f.payment_date DESC";

		$output = $this->db->query($sql);
		$data = $output->result_array();

		return $data;
	}
}