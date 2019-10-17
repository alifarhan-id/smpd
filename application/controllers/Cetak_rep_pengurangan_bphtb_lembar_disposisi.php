<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_rep_pengurangan_bphtb_lembar_disposisi extends CI_Controller{

	var $fontSize = 10;
    var $fontFam = 'Arial';
    var $yearId = 0;
    var $yearCode="";
    // var $paperWSize = 210;
    // var $paperHSize = 297;
    var $height = 5;
    var $currX;
    var $currY;
    var $widths;
    var $aligns;

    function __construct() {
        parent::__construct();
        //$this->formCetak();

		$size = array(216 ,356);
		$this->DefPageSize = $size;
		$this->CurPageSize = $size;
		$this->startY = 0;
		$this->startX = 0;
		$this->lengthCell = $size[0]-30;
    }

    function newLine(){
        $pdf = new FPDF('P');
        $pdf->Cell($this->lengthCell, $this->height, "", "", 0, 'L');
		$pdf->Ln();
    }
	
	
	function pageCetak() {
		
		$t_bphtb_registration_id = getVarClean('t_bphtb_registration_id','int',0);

		$sql="";
		if ($t_bphtb_registration_id != 0) {
			$sql = "select j.t_bphtb_exemption_id, j.exemption_amount, j.dasar_pengurang, j.analisa_penguranan, j.jenis_pensiunan, j.jenis_perolehan_hak, j.sk_bpn_no, to_char(j.tanggal_sk,'DD-MM-YYYY') as tanggal_sk, 
				j.pilihan_lembar_cetak, j.opsi_a2, j.opsi_a2_keterangan, j.opsi_b7, j.opsi_b7_keterangan, j.keterangan_opsi_c, j.keterangan_opsi_c_gono_gini,
				to_char(j.tanggal_berita_acara,'DD-MM-YYYY') as tanggal_berita_acara, j.pemeriksa_id, j.administrator_id,
				j.nomor_berita_acara, j.nomor_notaris,
				k.pemeriksa_nama as nama_pemeriksa, k.pemeriksa_nip as nip_pemeriksa, k.pemeriksa_jabatan as jabatan_pemeriksa,
				l.pemeriksa_nama as nama_operator, l.pemeriksa_nip as nip_operator, l.pemeriksa_jabatan as jabatan_operator,
				a.*,
				cust_order.p_rqst_type_id,
				b.region_name as wp_kota,
				c.region_name as wp_kecamatan,
				d.region_name as wp_kelurahan,
				e.region_name as object_region,
				f.region_name as object_kecamatan,
				g.region_name as object_kelurahan,
				h.description as doc_name

				from t_bphtb_exemption as j
				left join t_bphtb_registration as a  on j.t_bphtb_registration_id = a.t_bphtb_registration_id
				left join p_region as b
					on a.wp_p_region_id = b.p_region_id
				left join p_region as c
					on a.wp_p_region_id_kec = c.p_region_id
				left join p_region as d
					on a.wp_p_region_id_kel = d.p_region_id
				left join p_region as e
					on a.object_p_region_id = e.p_region_id
				left join p_region as f
					on a.object_p_region_id_kec = f.p_region_id
				left join p_region as g
					on a.object_p_region_id_kel = g.p_region_id
				left join p_bphtb_legal_doc_type as h
					on a.p_bphtb_legal_doc_type_id = h.p_bphtb_legal_doc_type_id
				left join t_customer_order as cust_order
					on cust_order.t_customer_order_id = a.t_customer_order_id
				left join t_bphtb_exemption_pemeriksa as k
				   on j.pemeriksa_id = k.t_bphtb_exemption_pemeriksa_id
				left join t_bphtb_exemption_pemeriksa as l
					on j.administrator_id = l.t_bphtb_exemption_pemeriksa_id
				where j.t_bphtb_registration_id = $t_bphtb_registration_id";
			
		}
		//echo ($sql);exit;
		$query = $this->db->query($sql);
		$data = $query->row_array();

		

		$pdf = new FPDF('P');


		
		$pdf->AliasNbPages();
		$pdf->AddPage("P");		

		$pdf->SetFont("Arial", "B", 12);
		$pdf->Cell($this->lengthCell, $this->height, "", "", 0, "C");
		$pdf->Ln();
		$pdf->Cell($this->lengthCell, $this->height, "LEMBAR DISPOSISI", "", 0, "C");
		$pdf->Ln();
		//$pdf->SetFont("Arial", "B", 13);
		$pdf->Cell($this->lengthCell, $this->height, "PERSETUJUAN", "", 0, "C");
		$pdf->Ln();
		//$pdf->SetFont("Arial", "B", 14);
		$pdf->Cell($this->lengthCell, $this->height, "KERINGANAN BPHTB", "", 0, "C");
		$pdf->Ln();
		$pdf->Ln();

		$this->newLine();
		
		$pdf->SetFont("Arial", "B", 8);
		$lbody = $this->lengthCell / 20;
		$lbody1 = $lbody * 1;
		$lbody4 = $lbody * 4;
		$lbody10 = $lbody * 15;

		$pdf->SetAligns(array("L", "L"));
		$pdf->SetWidths(array($lbody1, $this->lengthCell-$lbody1));
		$pdf->RowMultiBorderWithHeight(
			array
			(	
				"I",
				"PEMOHON :"
			),
			array
			(
				"TBL",
				"TBR"
			),
			$this->height);

		//$pdf->SetAligns(array("L", "L"));
		//$pdf->SetWidths(array($lbody1, $this->lengthCell-$lbody1));
		$pdf->RowMultiBorderWithHeight(
			array
			(	
				"",
				"Subjek Pajak"
			),
			array
			(
				"L",
				"R"
			),
			$this->height);
		
		
		$this->barisBaru_long($pdf,"", "1 Nama Wajib Pajak", ": " . $data["wp_name"]);
		$this->barisBaru_long($pdf,"", "2 ".$data['opsi_a2'], ": ".$data['opsi_a2_keterangan']);
		$this->barisBaru_long($pdf,"", "3 Alamat Wajib Pajak", ": " . $data["wp_address_name"]);
		$this->barisBaru_long($pdf,"", "4 RT/RW", ": RT. " . $data["wp_rt"] . "/RW. " .  $data["wp_rw"]);
		$this->barisBaru_long($pdf,"", "5 Kelurahan/Desa", ": " . $data["wp_kelurahan"]);
		$this->barisBaru_long($pdf,"", "6 Kecamatan", ": " . $data["wp_kecamatan"]);
		$this->barisBaru_long($pdf,"", "7 Kabupaten/Kota", ": " . $data["wp_kota"]);
		$this->barisBaru_long($pdf,"", "", "" . "");

		$pdf->SetFont("Arial", "B", 8);
		$pdf->SetAligns(array("L", "L"));
		$pdf->SetWidths(array($lbody1, $this->lengthCell-$lbody1));
		$pdf->RowMultiBorderWithHeight(
			array
			(	
				"",
				"Objek Pajak"
			),
			array
			(
				"TL",
				"TR"
			),
			$this->height);
		$this->barisBaru_long($pdf,"", "1 Nomor Objek Pajak (NOP) PBB ", ": " . $data["njop_pbb"]);
		$this->barisBaru_long($pdf,"", "2 Letak tanah atau bangunan", ": " . $data["object_address_name"]);
		$this->barisBaru_long($pdf,"", "3 Luas Tanah", ": " . $data["land_area"]." m2");
		$this->barisBaru_long($pdf,"", "4 Luas Bangunan", ": " . $data["building_area"]." m2");
		$this->barisBaru_long($pdf,"", "5 RT/RW", ": RT. ".trim($data["object_rt"])."/RW. " . $data["object_rw"]);
		$this->barisBaru_long($pdf,"", "6 Kelurahan/Desa", ": " . $data["object_kelurahan"]);
		$this->barisBaru_long($pdf,"", "7 Kecamatan", ": " . $data["object_kecamatan"]);
		$this->barisBaru_long($pdf,"", "8 Kabupaten/Kota", ": " . $data["object_region"]);
		$this->barisBaru_long($pdf,"", "", "" . "");

		$pdf->SetFont("Arial", "B", 8);
		$pdf->SetAligns(array("L", "L"));
		$pdf->SetWidths(array($lbody1,$lbody1+$lbody4, $this->lengthCell-$lbody1-$lbody4-$lbody1));
		$pdf->RowMultiBorderWithHeight(
			array
			(	
				"",
				"STATUS PENGURANGAN",": ".$data["jenis_perolehan_hak"]
			),
			array
			(
				"TL","T",
				"TR"
			),
			$this->height);
		
		$this->barisBaru($pdf, "", "", "" . "");

		$pdf->SetFont("Arial", "B", 8);
		$pdf->SetAligns(array("L", "L"));
		$pdf->SetWidths(array($lbody1, $this->lengthCell-$lbody1));
		$pdf->RowMultiBorderWithHeight(
			array
			(	
				"II",
				"DASAR PENGURANGAN :"
			),
			array
			(
				"TL",
				"TR"
			),
			$this->height);

		$pdf->SetFont("Arial", "", 8);
		$pdf->SetAligns(array("L", "J"));
		$pdf->SetWidths(array($lbody1, $this->lengthCell-$lbody1));
		$pdf->RowMultiBorderWithHeight(
			array
			(	
				"",
				$data['dasar_pengurang']
				/*"Secara normatif berdasarkan Pasal 17 Ayat 3 huruf b Angka 6 Peraturan Walikota No. 393 Tahun 2012 Wajib Pajak dan penanggung pajak orang pribadi Veteran, Pegawai Negeri Sipil (PNS), Tentara Nasional Indonesia (TNI), Polisi Republik Indonesia (Polri), Pensiunan PNS, Purnawirawan TNI, Purnawirawan Polri atau janda/duda-nya yang memperoleh hak atas tanah dan/atau bangunan rumah dinas Pemerintah, sebesar 50% (lima puluh persen) yang dibuktikan dengan akta maupun keterangan sesuai dengan ketentuan pelepasan hak atas tanah dan/atau bangunan rumah dinas Pemerintah dimaksud. Di luar wajib pajak atau penanggung pajak dimaksud tidak memperoleh  hak keringanan atau pengurangan"*/
			),
			array
			(
				"L",
				"R"
			),
			$this->height);
		
		$this->barisBaru($pdf, "", "", "" . "");

		$pdf->SetFont("Arial", "B", 8);
		$pdf->SetAligns(array("L", "L"));
		$pdf->SetWidths(array($lbody1, $this->lengthCell-$lbody1));
		$pdf->RowMultiBorderWithHeight(
			array
			(	
				"III",
				"ANALISA PERMOHONAN PENGURANGAN UNTUK :"
			),
			array
			(
				"TL",
				"TR"
			),
			$this->height);	
		$pdf->SetFont("Arial", "", 8);
		$pdf->SetAligns(array("L", "J"));
		$pdf->SetWidths(array($lbody1, $this->lengthCell-$lbody1));
		$pdf->RowMultiBorderWithHeight(
			array
			(	
				"",
				$data['analisa_penguranan']
				/*"Setelah diteliti secara administratif Permohonan Pengurangan "."Rumah Dinas"." untuk Tanah dan Bangunan sebagaimana yang diajukan oleh Pemohon dapat dipertimbangkan"*/
			),
			array
			(
				"L",
				"R"
			),
			$this->height);	
		$this->barisBaru($pdf, "", "", "" . "");

		$pdf->SetFont("Arial", "B", 8);
		$pdf->SetAligns(array("L", "L"));
		$pdf->SetWidths(array($lbody1, $this->lengthCell-$lbody1));
		$pdf->RowMultiBorderWithHeight(
			array
			(	
				"IV",
				"SETUJU PENGURANGAN"
			),
			array
			(
				"TL",
				"TR"
			),
			$this->height);	
		$persen_pengurangan = ceil($data["bphtb_discount"]/$data["bphtb_amt"] * 100);
		$pdf->SetFont("Arial", "", 8);
		$pdf->SetAligns(array("L", "J", "C"));
		$pdf->SetWidths(array($lbody1, ($this->lengthCell-$lbody1)/2-$lbody1,($this->lengthCell-$lbody1)/2+$lbody1));
		$pdf->RowMultiBorderWithHeight(
			array
			(	
				"",
				"Paraf :",
				$persen_pengurangan."% \n\n"."(".$this->numbertell($persen_pengurangan)." Persen )"
			),
			array
			(
				"LB","B",
				"RB"
			),
			$this->height);	
		$pdf->Output();
	}

	function barisBaru($pdf,$section, $field, $data){

		$pdf->SetFont("Arial", "", 8);
		$lbody = $this->lengthCell / 20;
		$lbody1 = $lbody * 1;
		$lbody4 = $lbody * 4;
		$lbody15 = $lbody * 15;
		
		$pdf->Cell($lbody1, $this->height, "$section", "L", 0, "L");
		$pdf->Cell($lbody4, $this->height, "$field", "", 0, "L");
		
		$pdf->SetWidths(array($lbody15));
		$pdf->SetAligns(array("L"));
		$pdf->RowMultiBorderWithHeight(array($data), array("R"), $this->height);
	}

		

	function barisBaru_long($pdf,$section, $field, $data){
		$pdf->SetFont("Arial", "", 8);
		$lbody = $this->lengthCell / 20;
		$lbody1 = $lbody * 1;
		$lbody4 = $lbody * 4;
		$lbody15 = $lbody * 15;
		
		$pdf->Cell($lbody1, $this->height, "$section", "L", 0, "L");
		$pdf->Cell($lbody4+$lbody1, $this->height, "$field", "", 0, "L");
		
		$pdf->SetWidths(array($lbody15-$lbody1));
		$pdf->SetAligns(array("L"));
		$pdf->RowMultiBorderWithHeight(array($data), array("R"), $this->height);
	}


	function numbertell($x){
        $abil = array(
        "",
        "Satu", "Dua", "Tiga",
        "Empat", "Lima", "Enam",
        "Tujuh", "Delapan", "Sembilan",
        "Sepuluh", "Sebelas"
        );
        if ($x < 12)
        return " ".$abil[$x];
        elseif ($x<20)
        return $this->numbertell($x-10)." Belas";
        elseif ($x<100)
        return $this->numbertell($x/10)." Puluh".$this->numbertell($x%10);
        elseif ($x<200)
        return " Seratus".$this->numbertell($x-100);
        elseif ($x<1000)
        return $this->numbertell($x/100)." Ratus".$this->numbertell($x % 100);
        elseif ($x<2000)
        return " Seribu".$this->numbertell($x-1000);
        elseif ($x<1000000)
        return $this->numbertell($x/1000)." Ribu".$this->numbertell($x%1000);
        elseif ($x<1000000000)
        return $this->numbertell($x/1000000)." Juta".$this->numbertell($x%1000000);
        elseif ($x<1000000000000)
        return $this->numbertell($x/1000000000)." Milyar".$this->numbertell($x%1000000000);
        elseif ($x<1000000000000000)
        return $this->numbertell($x/1000000000000)." Trilyun".$this->numbertell($x%1000000000000);
    }

	

	

}



