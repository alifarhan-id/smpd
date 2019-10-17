<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_formulir_sspd_bphtb extends CI_Controller{

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
		
		$t_bphtb_registration_id = getVarClean('t_bphtb_registration_id','int',0);
		
		$data = array();
        $sql = "SELECT b.t_bphtb_registration_id, b.t_customer_order_id , 
		b.registration_no,b.wp_name, b.npwp, b.wp_address_name, b.phone_no, 
		b.mobile_phone_no, b.wp_rt, b.wp_rw,
		b.wp_p_region_id, b.wp_p_region_id_kel, b.wp_p_region_id_kec, 
		kota.region_name AS wp_kota_name, 
		kelurahan.region_name AS wp_kelurahan_name, 
		kecamatan.region_name AS wp_kecamatan_name,
		b.njop_pbb, b.object_address_name, b.object_rt, b.object_rw,
		b.object_p_region_id, b.object_p_region_id_kec, b.object_p_region_id_kel, 
		object_kota.region_name AS object_kota_name, 
		object_kelurahan.region_name AS object_kelurahan_name, 
		object_kecamatan.region_name AS object_kecamatan_name,
		b.p_bphtb_legal_doc_type_id, b.bphtb_legal_doc_description, 
		b.land_area, b.building_area, b.land_price_per_m, b.building_price_per_m,
		b.land_total_price, b.building_total_price, b.market_price, b.add_disc_percent,
		(b.land_total_price + b.building_total_price) AS total_price,
		(b.add_disc_percent * b.npop) AS add_discount,
		b.jenis_harga_bphtb, b.npop, b.npop_tkp, b.npop_kp, b.bphtb_amt, 
		b.bphtb_discount, b.description,
		to_char(b.creation_date, 'YYYY-MM-DD') as creation_date,
		b.bphtb_amt_final

		FROM t_bphtb_registration AS b
		LEFT JOIN t_customer_order AS cust_order ON b.t_customer_order_id = cust_order.t_customer_order_id 
		LEFT JOIN p_region AS kota ON b.wp_p_region_id = kota.p_region_id
		LEFT JOIN p_region AS kelurahan ON b.wp_p_region_id_kel = kelurahan.p_region_id
		LEFT JOIN p_region AS kecamatan ON b.wp_p_region_id_kec = kecamatan.p_region_id
		LEFT JOIN p_region AS object_kota ON b.object_p_region_id = object_kota.p_region_id
		LEFT JOIN p_region AS object_kelurahan ON b.object_p_region_id_kec = object_kelurahan.p_region_id
		LEFT JOIN p_region AS object_kecamatan ON b.object_p_region_id_kel = object_kecamatan.p_region_id 
		WHERE b.t_bphtb_registration_id = ?";
        $output = $this->db->query($sql, array($t_bphtb_registration_id));
        $data = $output->row_array();
		
		
		$pdf = new FPDF();
		
		$this->startY = $pdf->GetY();
        $this->startX = $this->paperWSize-42;
        $this->lengthCell = $this->startX+20;
		$pdf->AliasNbPages();
		$pdf->AddPage("P");
		$pdf->SetFont('Arial', '', 7);
		
		
		
		$encImageData = '';
		$sql = "select f_encrypt_str('".$data['npwp']."-".$data['njop_pbb']."-".$data["bphtb_amt_final"]."') AS enc_data";
		$output_image = $this->db->query($sql);
		$data_image = $output_image->row_array();
		$encImageData = $data_image['enc_data'];
		
		$pdf->Image(base_url().'qrcode/generate-qr.php?param='.$encImageData,176,15,20,20,'PNG');
		
		$lheader = $this->lengthCell / 8;
		$lheader1 = $lheader * 1;
		$lheader2 = $lheader * 2;
		$lheader3 = $lheader * 3;
		$lheader4 = $lheader * 4;
		$lheader5 = $lheader * 5;
		$lheader6 = $lheader * 6;
		
		$pdf->Cell($lheader1, $this->height-2, "", "TRL", 0, 'C');
		$pdf->Cell($lheader2, $this->height-2, "", "T", 0, 'C');
		$pdf->Cell($lheader3+$lheader1, $this->height-2, "", "TR", 0, 'C');
		$pdf->Cell($lheader1, $this->height-2, "", "TR", 0, 'C');
		$pdf->Ln();
		
		$pdf->SetFont('Arial', '', 10);
		$pdf->Image(getValByCode('LOGO'),12,15,20,20);
		$pdf->Cell($lheader1, $this->height, "", "LR", 0, 'C');			
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell($lheader3+$lheader2+$lheader1, $this->height, "SURAT SETORAN PAJAK DAERAH", "R", 0, 'C');
		$pdf->Cell($lheader1, $this->height, "", "R", 0, 'C');
		$pdf->Ln();
		
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell($lheader1, $this->height, "", "LR", 0, 'C');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell($lheader3+$lheader2+$lheader1, $this->height, "BEA PEROLEHAN HAK ATAS TANAH DAN BANGUNAN", "R", 0, 'C');
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell($lheader1/2 + 3, $this->height, "", "", 0, 'R');
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell($lheader1/2 - 3, $this->height, "", "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell($lheader1, $this->height, "", "LR", 0, 'C');
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell($lheader3+$lheader2+$lheader1, $this->height, "SSPD - BPHTB", "BR", 0, 'C');
		$pdf->Cell($lheader1, $this->height, "", "R", 0, 'C');
		$pdf->Ln($this->height-5);
		
		
		// No Urut
		$pdf->Cell($lheader2 + $lheader4 + $lheader1, $this->height, "", "R", 0, 'C');
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell($lheader1, $this->height, "", "", 0, 'C');
		$pdf->Ln();
		// =======
		
		$pdf->Cell($lheader1, $this->height, "", "LR", 0, 'C');	
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell($lheader3+$lheader2+$lheader1, $this->height, "BERFUNGSI SEBAGAI SURAT PEMBERITAHUAN OBJEK PAJAK", "R", 0, 'C');
		$pdf->Cell($lheader1, $this->height, "", "R", 0, 'C');
		$pdf->Ln();
		
		$pdf->Cell($lheader1, $this->height, "", "BRL", 0, 'C');	
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell($lheader3+$lheader2+$lheader1, $this->height, "PAJAK BUMI DAN BANGUNAN (SPOP PBB)", "BR", 0, 'C');
		$pdf->Cell($lheader1, $this->height, "", "BR", 0, 'C');
		$pdf->Ln();
		
		$lbody = $this->lengthCell / 4;
		$lbody1 = $lbody * 1;
		$lbody2 = $lbody * 2;
		$lbody3 = $lbody * 3;
		$lbodyS = $lbody / 2;

		//$this->Cell(5, $this->height, "", "TL", 0, 'L');
		$pdf->Cell($lbody1 + $lbody3 , $this->height, getValByCode('INSTANSI_2')." KABUPATEN ".strtoupper(getValByCode('ALAMAT_3')), "LR", 0, 'L');
		$pdf->Ln();

		//$this->Cell(5, $this->height, "", "BL", 0, 'L');
		$pdf->Cell($lbody1 + $lbody3 , $this->height, "PERHATIAN : Bacalah petunjuk pada halaman belakang lembar ini terlebih dahulu", "LBR", 0, 'L');
		$pdf->Ln();
		
		//A
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(5, $this->height, "A.", "L", 0, 'L');
		$pdf->Cell($lbodyS , $this->height, "1. Nama", "", 0, 'L');
		$pdf->Cell($lbody3+$lbodyS- 5, $this->height, ": " . $data["wp_name"], "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lbodyS , $this->height, "2. NPWP", "", 0, 'L');
		$pdf->Cell($lbody3+$lbodyS- 5, $this->height, ": " .$data["npwp"], "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lbodyS , $this->height, "3. Alamat", "", 0, 'L');
		$pdf->Cell($lbody3 + $lbodyS- 5, $this->height, ": " . $data["wp_address_name"], "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lbodyS , $this->height, "4. Kelurahan/Desa", "", 0, 'L');
		$pdf->Cell(($lbody3+$lbodyS- 5)/2 - 20, $this->height, ": ".$data["wp_kelurahan_name"], "", 0, 'L');
		$pdf->Cell(30, $this->height, "5. RT/RW : ".$data["wp_rt"]."/".$data["wp_rw"], "", 0, 'L');
		$pdf->Cell(($lbody3+$lbodyS- 5)/2 - 10, $this->height, "6. Kecamatan : ".$data["wp_kecamatan_name"], "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(5, $this->height, "", "BL", 0, 'L');
		$pdf->Cell($lbodyS , $this->height, "7. Kabupaten/Kota", "B", 0, 'L');
		$pdf->Cell(($lbody3+$lbodyS- 5)/2 - 20, $this->height, ": ".$data["wp_kota_name"], "B", 0, 'L');
		$pdf->Cell(30, $this->height, "", "B", 0, 'L');
		$pdf->Cell(($lbody3+$lbodyS- 5)/2 - 10, $this->height, "8. Kode Pos : -", "BR", 0, 'L');
		$pdf->Ln();
		
		//B
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(5, $this->height, "B.", "L", 0, 'L');
		$pdf->Cell($lbody1 , $this->height, "1. Nama Objek Pajak (NOP) PBB", "", 0, 'L');
		$pdf->Cell($lbody3- 5, $this->height, ": " . $data["njop_pbb"], "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lbody1 , $this->height, "2. Letak Tanah dan Bangunan", "", 0, 'L');
		$pdf->Cell($lbody3- 5, $this->height, ": " .$data["object_address_name"], "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lbodyS , $this->height, "3. Kelurahan/Desa", "", 0, 'L');
		$pdf->Cell(($lbody3+$lbodyS- 5)/2, $this->height, ": ".$data["object_kelurahan_name"], "", 0, 'L');
		$pdf->Cell(($lbody3+$lbodyS- 5)/2, $this->height, "4. RT/RW : ".$data["object_rt"]."/".$data["object_rw"], "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lbodyS , $this->height, "5. Kecamatan", "", 0, 'L');
		$pdf->Cell(($lbody3+$lbodyS- 5)/2, $this->height, ": ".$data["object_kecamatan_name"], "", 0, 'L');
		$pdf->Cell(($lbody3+$lbodyS- 5)/2, $this->height, "6. Kabupaten/Kota : ".$data["object_kota_name"], "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell($lbody1 , $this->height, "Perhitungan NJOP PBB", "", 0, 'L');
		$pdf->Cell($lbody3- 5, $this->height, ":", "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4 , $this->height + 2.5, "Uraian", "LTR", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4, $this->height, "Luas", "TR", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4, $this->height, "NJOP PBB/m2", "TR", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4, $this->height + 2.5, "Luas x NJOP PBB", "TR", 0, 'C');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln($this->height/2 +1);

		$pdf->SetFont('Arial', '', 5);
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4 , $this->height/2, "", "LR", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4, $this->height/2, "(Diisi luas tanah dan atau", "R", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4, $this->height/2, "(Diisi beradasarkan SPPT PBB tahun", "R", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4, $this->height/2, "", "R", 0, 'C');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln($this->height/2-1);
		
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4 , $this->height/2, "", "LBR", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4, $this->height/2, "bangunan yang haknya diperoleh)", "BR", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4, $this->height/2, "terjadinya perolehan hak / tahun ...)", "BR", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4, $this->height/2, "", "BR", 0, 'C');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln($this->height/2);

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4 , $this->height, "Tanah (bumi)", "LBR", 0, 'L');
		$pdf->Cell(3, $this->height, "7", "BR", 0, 'L');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4-3, $this->height, number_format($data["land_area"],2,",","."), "BR", 0, 'R');
		$pdf->Cell(4, $this->height, "9", "BR", 0, 'L');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4-4, $this->height, "Rp ".number_format($data["land_price_per_m"],2,",","."), "BR", 0, 'R');
		$pdf->Cell(4, $this->height, "11", "BR", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4-4, $this->height, "Rp ".number_format($data["land_total_price"],2,",","."), "BR", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4 , $this->height, "Bangunan", "LBR", 0, 'L');
		$pdf->Cell(3, $this->height, "8", "BR", 0, 'L');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4-3, $this->height, number_format($data["building_area"],2,",","."), "BR", 0, 'R');
		$pdf->Cell(4, $this->height, "10", "BR", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4-4, $this->height, "Rp ".number_format($data["building_price_per_m"],2,",","."), "BR", 0, 'R');
		$pdf->Cell(4, $this->height, "12", "BR", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4-4, $this->height, "Rp ".number_format($data["building_total_price"],2,",","."), "BR", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4 , $this->height, "", "", 0, 'L');
		$pdf->Cell(3, $this->height, "", "", 0, 'L');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4-3, $this->height,"", "", 0, 'R');
		$pdf->Cell(4, $this->height, "", "", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4-4, $this->height, "NJOP PBB :", "", 0, 'C');
		$pdf->Cell(4, $this->height, "13", "LBR", 0, 'C');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4-4, $this->height, "Rp ".number_format($data["total_price"],2,",","."), "BR", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(($lbody1 + ($lbody3)), 1, "", "LR", 0, 'L');
		$pdf->Ln(1);

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4 * 3 / 2 + 10 , $this->height, "15. Jenis perolehan hak atas tanah dan atau bangunan", 0, 'R');
		$this->kotak(1, 30, 1, "", $pdf);
		$this->kotak(1, 30, 1, "", $pdf);
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4 * 3 / 2 - 22.5, $this->height, "14. Harga transaksi, nilai pasar. ", 0, 'R');
		$pdf->Cell(($lbody1 + ($lbody3- 10))/4, $this->height, "Rp ".number_format($data["market_price"],2,",","."), "BLTR", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();
		
		$bigger = $data["market_price"];
		if ( $data["market_price"] < $data["total_price"]) {
			$bigger = $data["total_price"];
		}
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody1 + ($lbody3) - 10), $this->height, "16. Nomor Sertifikat : -", "", 0, 'L');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(($lbody1 + ($lbody3)), 1, "", "LBR", 0, 'L');
		$pdf->Ln(1);
		
		//C
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(5, $this->height, "C.", "LB", 0, 'L');
		$pdf->Cell(($lbody3) - 7.5, $this->height, "AKUMULASI PEROLEHAN NILAI SEBELUMNYA", "RB", 0, 'L');
		$pdf->Cell($lbody1 - 2.5, $this->height,"Rp ".number_format($bigger,2,",","."), "B", 0, 'R');
		$pdf->Cell(5, $this->height,"", "BR", 0, 'L');
		$pdf->Ln();
		
		//D
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(5, $this->height, "D.", "L", 0, 'L');
		$pdf->Cell(($lbody3) - 7.5, $this->height, "PENGHITUNGAN BPHTB (hanya diisi berdasarkan penghitungan wajib pajak)", "", 0, 'L');
		$pdf->Cell($lbody1 - 2.5, $this->height,"", "", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody3) - 11, $this->height, "1. Nilai Perolehan Objek Pajak (NPOP) memperhatikan nilai pada B.13, B.14 dan C", "", 0, 'L');
		$pdf->Cell(3.5, $this->height,"1.", "BLTR", 0, 'C');
		$pdf->Cell($lbody1 - 2.5, $this->height,"Rp ".number_format($data["npop"],2,",","."), "BLTR", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody3) - 11, $this->height, "2. Nilai Perolehan Objek Pajak Tidak Kena Pajak (NPOPTKP) memperhatikan nilai C", "", 0, 'L');
		$pdf->Cell(3.5, $this->height,"2.", "BLTR", 0, 'C');
		$pdf->Cell($lbody1 - 2.5, $this->height,"Rp ".number_format($data["npop_tkp"],2,",","."), "BLTR", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody3) - 31, $this->height, "3. Nilai Perolehan Objek Pajak Kena Pajak (NPOPKP)", "", 0, 'L');
		$pdf->SetFont('Arial', '', 5);
		$pdf->Cell(20, $this->height, "angka 1 - angka 2", "", 0, 'R');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(3.5, $this->height,"3.", "BLTR", 0, 'C');
		$pdf->Cell($lbody1 - 2.5, $this->height,"Rp ".number_format($data["npop_kp"],2,",","."), "BLTR", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody3) - 31, $this->height, "4. Bea Perolehan Hak atas Tanah dan Bangunan yang terutang", "", 0, 'L');
		$pdf->SetFont('Arial', '', 5);
		$pdf->Cell(20, $this->height, "5% x angka 3", "", 0, 'R');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(3.5, $this->height,"4.", "BLTR", 0, 'C');
		$pdf->Cell($lbody1 - 2.5, $this->height,"Rp ".number_format($data["bphtb_amt"],2,",","."), "BLTR", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(($lbody1 + ($lbody3)), 1, "", "LBR", 0, 'L');
		$pdf->Ln(1);
		
		//E
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(5, $this->height, "E.", "L", 0, 'L');
		$pdf->Cell(($lbody3) - 7.5, $this->height, "Jumlah Setoran Berdasarkan", "", 0, 'L');
		$pdf->Cell($lbody1 - 2.5, $this->height,"", "", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$this->kotak(1, 38, 1, "", $pdf);
		$pdf->Cell(($lbody3) - 12.5, $this->height, "a. Penghitungan Wajib Pajak", "", 0, 'L');
		$pdf->Cell($lbody1 - 2.5, $this->height,"", "", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$this->kotak(1, 38, 1, "", $pdf);
		$pdf->Cell(($lbody3) - 12.5, $this->height, "b. STPD BPHTB / SKPD ( KURANG BAYAR / SKPD", "", 0, 'L');
		$pdf->Cell($lbody1 - 2.5, $this->height,"", "", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(5, $this->height,"", "", 0, 'R');
		$pdf->Cell(($lbody3 - 12.5)/2 + 5, $this->height, "    KURANG BAYAR TAMBAHAN *)", "", 0, 'L');
		$pdf->Cell(($lbody3 - 12.5)/4 + 20, $this->height, "    Nomor : -", "", 0, 'L');
		$pdf->Cell(($lbody3 - 12.5)/4 - 25, $this->height, "    Tanggal : -", "", 0, 'L');
		$pdf->Cell($lbody1 - 2.5, $this->height,"", "", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$this->kotak(1, 38, 1, "", $pdf);
		$pdf->Cell(($lbody3 - 12.5)/2 , $this->height, "c. Pengurangan dihitung sendiri menjadi ", "", 0, 'L');
		//$diskon = str_split(sprintf("%03s",$data["add_disc_percent"]*100));
		
		if($data["add_disc_percent"] == 0) {
			$satu = "";
			$dua = "";
			$tiga = 0;
		}

		if($data["add_disc_percent"] == 0.25) {
			$satu = "";
			$dua = 2;
			$tiga = 5;
		}

		if($data["add_disc_percent"] == 0.5) {
			$satu = "";
			$dua = 5;
			$tiga = 0;
		}

		if($data["add_disc_percent"] == 1) {
			$satu = 1;
			$dua = 0;
			$tiga = 0;
		}
		
		$this->kotak(1, 38, 1, $satu, $pdf);
		$this->kotak(1, 38, 1, $dua, $pdf);
		$this->kotak(1, 38, 1, $tiga, $pdf);
		$pdf->Cell(($lbody3 - 12.5)/4 , $this->height, "% Berdasarkan Peraturan Walikota No. .... Tahun 2012", "", 0, 'L');
		$pdf->Cell($lbody1 + 14.8, $this->height,"", "", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$this->kotak(1, 38, 1, "", $pdf);
		$pdf->Cell(($lbody3) - 12.5, $this->height, "d. ..............................................", "", 0, 'L');
		$pdf->Cell($lbody1 - 2.5, $this->height,"", "", 0, 'R');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(($lbody1 + ($lbody3)), 1, "", "LBR", 0, 'L');
		$pdf->Ln(1);
		
		//F

		$total = number_format($data["bphtb_amt_final"],0,"","");
		$hrf = "select replace(f_terbilang('". $total . "','rp.'), '  ', ' ') as dengan_huruf";
		$output = $this->db->query($hrf);
		$result = $output->row_array();
		
		$huruf = $result['dengan_huruf'];
		
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4 + 20, $this->height, "JUMLAH YANG DISETORKAN (dengan angka)", "", 0, 'L');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4 * 3 - 20, $this->height,"(dengan huruf)", "", 0, 'L');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4 + 10, $this->height, "Rp ".number_format($data["bphtb_amt_final"],2,",","."), "BLTR", 0, 'R');
		$pdf->Cell(10, $this->height, "", "", 0, 'L');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4 * 3 - 20, $this->height,$huruf. "rupiah", "BLTR", 0, 'L');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();
		
		$pdf->Cell(5, $this->height, "", "L", 0, 'L');
		$pdf->SetFont('Arial', '', 5);
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4 + 10, $this->height, "(berdasarkan pehitungan D4 dan perolehan di E)", "", 0, 'C');
		$pdf->Cell(10, $this->height, "", "", 0, 'L');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4 * 3 - 20, $this->height,"", "", 0, 'L');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(($lbody1 + ($lbody3)), 1, "", "LBR", 0, 'L');
		$pdf->Ln(1);
		
		//G
		$pdf->Cell(1, $this->height, "", "L", 0, 'L');
		$pdf->SetFont('Arial', '', 5);
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4-8, $this->height,"............, tgl ...................", "R", 0, 'C');
		$pdf->Cell(1, $this->height, "", "", 0, 'R');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(1, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4-14, $this->height,"MENGETAHUI :", "", 0, 'C');
		$pdf->Cell(1, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4+14, $this->height,"DITERIMA OLEH :", "", 0, 'C');
		$pdf->Cell(1, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4+8, $this->height,"Telah diverivikasi", "", 0, 'C');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(1, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4-8, $this->height,"WAJIB PAJAK / PENYETOR", "R", 0, 'C');
		//$this->Cell(1, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4-10, $this->height,"PPAT / NOTARIS", "", 0, 'C');
		$pdf->Cell(1, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4+10, $this->height,"TEMPAT PEMBAYARAN PBHTB", "", 0, 'C');
		$pdf->Cell(1, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4+10, $this->height,strtoupper(getValByCode('INSTANSI_4'))." KABUPATEN ".strtoupper(getValByCode('ALAMAT_3')), "", 0, 'C');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln(3);

		$pdf->Cell(1, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4-8, $this->height,"", "R", 0, 'C');
		$pdf->Cell(1, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4-10, $this->height,"", "", 0, 'C');
		$pdf->SetFont('Arial', '', 5);
		$pdf->Cell(1, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4+10, $this->height,"Tanggal : .......................", "", 0, 'C');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(1, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4+10, $this->height,"", "", 0, 'C');
		$pdf->Cell(4, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(1, $this->height, "", "L", 0, 'L');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4-8, $this->height,"", "R", 0, 'C');
		$pdf->Cell(1, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4-10, $this->height,"", "", 0, 'C');
		$pdf->Cell(1, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4+10, $this->height,"", "", 0, 'C');
		$pdf->Cell(1, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4+10, $this->height,"", "", 0, 'C');
		$pdf->Cell(4, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(3, $this->height, "", "L", 0, 'L');
		$pdf->SetFont('Arial', '', 6);
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4-13, $this->height,$data["wp_name"], "B", 0, 'C');
		$pdf->Cell(3, $this->height, "", "R", 0, 'R');
		$pdf->Cell(3, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4-14, $this->height,"", "B", 0, 'C');
		$pdf->Cell(7, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4+2, $this->height,"", "B", 0, 'C');
		$pdf->Cell(9, $this->height, "", "", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4+4, $this->height,"", "B", 0, 'C');
		$pdf->Cell(6, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(3, $this->height, "", "LB", 0, 'L');
		$pdf->SetFont('Arial', '', 6);
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4-13, $this->height,"Nama lengkap dan tanda tangan", "B", 0, 'C');
		$pdf->Cell(3, $this->height, "", "RB", 0, 'R');
		$pdf->Cell(3, $this->height, "", "B", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4-14, $this->height,"Nama lengkap dan tanda tangan", "B", 0, 'C');
		$pdf->Cell(7, $this->height, "", "B", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4+2, $this->height,"Nama lengkap dan tanda tangan", "B", 0, 'C');
		$pdf->Cell(9, $this->height, "", "B", 0, 'R');
		$pdf->Cell(($lbody3 + $lbody1 - 10)/4+4, $this->height,"Nama lengkap dan tanda tangan", "B", 0, 'C');
		$pdf->Cell(6, $this->height,"", "BR", 0, 'L');
		$pdf->Ln();
		
		//H
		$pdf->Cell(2,1, "", "TL", 0, 'L');
		$pdf->Cell(33, 1,"", "R", 0, 'L');
		$pdf->Cell(($lbody3 + $lbody1 - 40), 1,"", "T", 0, 'L');
		$pdf->Cell(5, 1,"", "TR", 0, 'L');
		$pdf->Ln(1);

		$pdf->Cell(2, $this->height, "", "L", 0, 'L');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(33, $this->height,"Hanya diisi oleh ", "R", 0, 'L');
		$pdf->Cell(30, $this->height,"Nomor Dokumen : ", "", 0, 'L');
		$this->kotak(1, 38, 2, "", $pdf);
		$pdf->Cell(2, $this->height,"", "R", 0, 'L');
		$this->kotak(1, 38, 2, "", $pdf);
		$pdf->Cell(2, $this->height,"", "R", 0, 'L');
		$this->kotak(1, 38, 4, "", $pdf);
		$pdf->Cell(2, $this->height,"", "R", 0, 'L');
		$this->kotak(1, 38, 4, "", $pdf);
		$pdf->Cell(2, $this->height,"", "R", 0, 'L');
		$this->kotak(1, 38, 3, "", $pdf);
		$pdf->Cell(40.8, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(2, $this->height, "", "L", 0, 'L');
		$pdf->Cell(33, $this->height,"", "R", 0, 'L');
		$pdf->Cell(($lbody3 + $lbody1 - 40), $this->height,"", "", 0, 'L');
		$pdf->Cell(5, $this->height,"", "R", 0, 'L');
		$pdf->Ln(1);

		$pdf->Cell(2, $this->height, "", "L", 0, 'L');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(33, $this->height,"petugas yang berwenang", "R", 0, 'L');
		$pdf->Cell(30, $this->height,"NOP PBB baru : ", "", 0, 'L');
		$this->kotak(1, 38, 2, "", $pdf);
		$pdf->Cell(2, $this->height,"", "R", 0, 'L');
		$this->kotak(1, 38, 2, "", $pdf);
		$pdf->Cell(2, $this->height,"", "R", 0, 'L');
		$this->kotak(1, 38, 3, "", $pdf);
		$pdf->Cell(2, $this->height,"", "R", 0, 'L');
		$this->kotak(1, 38, 3, "", $pdf);
		$pdf->Cell(2, $this->height,"", "R", 0, 'L');
		$this->kotak(1, 38, 3, "", $pdf);
		$pdf->Cell(2, $this->height,"", "R", 0, 'L');
		$this->kotak(1, 38, 4, "", $pdf);
		$pdf->Cell(2, $this->height,"", "R", 0, 'L');
		$this->kotak(1, 38, 1, "", $pdf);
		$pdf->Cell(22, $this->height,"", "R", 0, 'L');
		$pdf->Ln();

		$pdf->Cell(2,1, "", "BL", 0, 'L');
		$pdf->Cell(33, 1,"", "BR", 0, 'L');
		$pdf->Cell(($lbody3 + $lbody1 - 40), 1,"", "B", 0, 'L');
		$pdf->Cell(5, 1,"", "BR", 0, 'L');
		$pdf->Ln(1);
		
		
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



