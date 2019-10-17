<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Nota_dinas_pdf extends CI_Controller{
	var $fontSize = 10;
    var $fontFam = 'Arial';
    var $yearId = 0;
    var $yearCode = "";
    var $paperWSize = 210;
    var $paperHSize = 297;
    var $height = 6;
    var $currX;
    var $currY;
    var $widths;
    var $aligns;

	function __construct() {
        parent::__construct();
        //$this->formCetak();
        $pdf = new FPDF();
        $this->startY = $pdf->GetY();
        $this->startX = $this->paperWSize-50;
        $this->lengthCell = $this->startX+20;
    }

    function newLine(){
        $pdf = new FPDF('P', 'mm', array(203.2,330.2));
        $pdf->Cell($this->lengthCell, $this->height, "", "", 0, 'L');
        $pdf->Ln();
    }

    


	function pageCetak() {

        /**
         * Get Data
         */
        $t_customer_order_id = getVarClean('CURR_DOC_ID','int',0);

        $sql = "select *, b.vat_code from t_vat_registration a, p_vat_type_dtl b ".
	            "where a.t_customer_order_id = ? ".
	            "and a.p_vat_type_dtl_id = b.p_vat_type_dtl_id";

        $output = $this->db->query($sql, array($t_customer_order_id));
        $data = $output->row_array();


        $pdf = new FPDF('P', 'mm', array(210,330));
        $startY = $pdf->GetY();
        $startX = $this->paperWSize-50;
        $lengthCell = $this->startX+20;
        $pdf->AliasNbPages();
        $pdf->AddPage("P");

        $lengthJudul1 = ($lengthCell * 1) / 6;
        $lengthJudul2 = ($lengthCell * 5) / 6;

        $pdf->Image(getValByCode('LOGO'), 15, 14, 25, 25);

        $pdf->Ln(6);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'C');
        $pdf->Cell($lengthJudul2, $this->height, getValByCode('INSTANSI_1'), "", 0, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Times', 'B', 22);
        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'C');
        $pdf->Cell($lengthJudul2, $this->height, getValByCode('INSTANSI_2'), "", 0, 'C');
        $pdf->Ln(8);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell($lengthJudul1, $this->height, "", "B", 0, 'C');
        $pdf->Cell($lengthJudul2, $this->height, getValByCode('ALAMAT_5'), "B", 0, 'C');

        $pdf->Ln(10);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell($lengthCell, $this->height, "NOTA DINAS", "", 0, 'C');
        $pdf->Ln(10);

        //header nota
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell($lengthJudul1, $this->height, "Kepada         :", "", 0, 'L');
        $pdf->Cell($lengthJudul2, $this->height, "Yth. Bapak Kepala Dinas Pelayanan Pajak Kabupan Lombok Utara", "", 0, 'L');
        $pdf->Ln(6);

        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengthJudul2, $this->height, "Melalui Kepala Bidang Pajak Pendaftaran", "", 0, 'L');
        $pdf->Ln(6);

        $pdf->Cell($lengthJudul1, $this->height, "Dari              :", "", 0, 'L');
        $pdf->Cell($lengthJudul2, $this->height, "Kepala Seksi Pendaftaran dan Pendataan", "", 0, 'L');
        $pdf->Ln(6);

		$tgl = getVarClean('tgl', 'str','');
        $pdf->Cell($lengthJudul1, $this->height, "Tanggal        :", "", 0, 'L');
        if ($tgl == ''){
			$pdf->Cell($lengthJudul2, $this->height, date('d F Y'), "", 0, 'L');
		}else{
			$pdf->Cell($lengthJudul2, $this->height, $tgl, "", 0, 'L');
		}
        $pdf->Ln(6);

        $pdf->Cell($lengthJudul1, $this->height, "Nomor          :", "", 0, 'L');
        $pdf->Cell($lengthJudul2, $this->height, "973/               -Dafda/" . $this->romanNumerals(date("m")) . "/" . date("Y"), "", 0, 'L');
        $pdf->Ln(6);

        $pdf->Cell($lengthJudul1, $this->height, "Lampiran      :", "", 0, 'L');
        $pdf->Cell($lengthJudul2, $this->height, "1 (satu) berkas", "", 0, 'L');
        $pdf->Ln(6);

        $pdf->Cell($lengthJudul1, $this->height, "Perihal          :", "B", 0, 'L');
        $pdf->SetFont('Times', 'I', 12);
        $pdf->Cell($lengthJudul2, $this->height, "Permohonan Pemberian NPWPD dan Pengukuhan Wajib Pajak Daerah", "B", 0, 'L');
        $pdf->Ln(10);

        //Isi
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->MultiCell($lengthJudul2, $this->height, "Dipermaklumkan dengan hormat, berdasarkan pasal 60 Peraturan Daerah Kabupaten Lombok Utara Nomor 20 Tahun 2011 tentang Pajak Daerah disebutkan bahwa Wajib Pajak yang telah mendaftarkan diri dan melaporkan usahanya serta memenuhi persyaratan (terlampir) sesuai ketentuan peraturan perundang-undangan perpajakan daerah wajib mendaftarkan diri dan melaporkan usahanya dengan menggunakan SPTPD dan diberikan NPWPD.", "", 'J');
        $pdf->Ln(6);

        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        if ($tgl == ''){
			$pdf->MultiCell($lengthJudul2, $this->height, "Perlu disampaikan bahwa pada tanggal " . date('d F Y') . ", telah diterima surat permohonan menjadi wajib pajak daerah dengan identitas pemohon sebagai berikut : ", "", 'J');
		}else{
			$pdf->MultiCell($lengthJudul2, $this->height, "Perlu disampaikan bahwa pada tanggal ".$tgl.", telah diterima surat permohonan menjadi wajib pajak daerah dengan identitas pemohon sebagai berikut : ", "", 'J');
		}
		$pdf->Ln(6);

        //data wajib pajak
        $lengWP1 = $lengthJudul2 * 1/3;
        $lengWP2 = $lengthJudul2 * 2/3;
        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "Nama Merk Dagang", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, ": ".$data["company_brand"], "", "", 'L');
        $pdf->Ln(5);

        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "Penanggung Jawab", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, ": ".$data["company_owner"], "", "", 'L');
        $pdf->Ln(5);

        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "Alamat", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, ": ".$data["address_name_owner"]. " " . $data["address_no_owner"], "", "", 'L');
        $pdf->Ln(5);

        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "Jenis Usaha", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, ": ".$data["vat_code"], "", "", 'L');
        $pdf->Ln(5);

        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "Alamat Usaha", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, ": ".$data["brand_address_name"] . " ".$data["brand_address_no"], "", "", 'L');
        $pdf->Ln();

        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->MultiCell($lengthJudul2, $this->height, "Sehubungan dengan permohonan tersebut diatas mohon kiranya Bapak berkenan untuk memberikan NPWPD dan mengukuhkan sebagai Wajib Pajak Daerah Kabupaten Lombok Utara.", "", 'J');
        $pdf->Ln();

        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->MultiCell($lengthJudul2, $this->height, "Demikian permohonan kami sampaikan, atas perhatian Bapak kami mengucapkan terima kasih, serta mohon arahan lebih lanjut.", "", 'J');
        $pdf->Ln();

        //TTD
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, "KEPALA SEKSI", "", "", 'C');
        $pdf->Ln();

        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, "PENDAFTARAN DAN PENDATAAN", "", "", 'C');
        $pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();

        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, getValByCode('KASI_DAFDA'), "", "", 'C');
        $pdf->Ln(6);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, "Penata Tingkat I", "", "", 'C');
        $pdf->Ln(6);
        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, "NIP. ".getValByCode('NIP_KASI_DAFDA'), "", "", 'C');
        $pdf->Ln(6);

        $pdf->Output();

	}

    function romanNumerals($num){
		$n = intval($num);
		$res = '';

		/*** roman_numerals array  ***/
		$roman_numerals = array(
			'M'  => 1000,
			'CM' => 900,
			'D'  => 500,
			'CD' => 400,
			'C'  => 100,
			'XC' => 90,
			'L'  => 50,
			'XL' => 40,
			'X'  => 10,
			'IX' => 9,
			'V'  => 5,
			'IV' => 4,
			'I'  => 1);

		foreach ($roman_numerals as $roman => $number){
			/*** divide to get  matches ***/
			$matches = intval($n / $number);

			/*** assign the roman char * $matches ***/
			$res .= str_repeat($roman, $matches);

			/*** substract from the number ***/
			$n = $n % $number;
		}

		/*** return the res ***/
		return $res;
	}

}



