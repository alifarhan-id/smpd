<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Nota_dinas_pengantar_penerbitan_npwpd extends CI_Controller{
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

        $date_start_laporan = getVarClean('date_start_laporan','str','');
        $date_end_laporan  = getVarClean('date_end_laporan','str','');
        $nilai = getVarClean('nilai', 'int', 0);
        $p_vat_type_id = getVarClean('p_vat_type_id', 'int', 0);
        $tgl = getVarClean("tgl",'str', "");

        if (empty($date_start_laporan) && empty($date_end_laporan) && empty($nilai)){
            echo "Data Tidak Ditemukan";
            exit;
        }

        $sql = "SELECT  COUNT (*)as jumlah , 
                        RTRIM(f_eja(COUNT (*)::VARCHAR)) as huruf
                FROM t_vat_registration a 
                left join p_vat_type_dtl b on a.p_vat_type_dtl_id=b.p_vat_type_dtl_id  
                left join t_customer_order c on a.t_customer_order_id = c. t_customer_order_id
                where trunc(a.creation_date) BETWEEN to_date('".$date_start_laporan."','dd-mm-yyyy') 
                    and to_date('".$date_end_laporan."','dd-mm-yyyy')
                and case when ".$p_vat_type_id."=0 then true
                        else a.p_vat_type_dtl_id in (select p_vat_type_dtl_id from p_vat_type_dtl where p_vat_type_id =".$p_vat_type_id.")
                    end 
                and case when ".$nilai."=0 then true
                        else c.p_order_status_id = ".$nilai."
                    end ";

        $output = $this->db->query($sql);
        $data = $output->row_array();
        /*print_r($data);
        exit;*/


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
        $pdf->Cell($lengthJudul2, $this->height, "Yth. Bapak Kepala Badan Pendapatan Daerah Kabupaten Lombok Utara", "", 0, 'L');
        $pdf->Ln(6);

        $pdf->Cell($lengthJudul1, $this->height, "Dari              :", "", 0, 'L');
        $pdf->Cell($lengthJudul2, $this->height, "Kepala Bidang Pajak Pendaftaran", "", 0, 'L');
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
        $pdf->Cell($lengthJudul2, $this->height, "973/               -Jakdaf/" . $this->romanNumerals(date("m")) . "/" . date("Y"), "", 0, 'L');
        $pdf->Ln(6);

        $pdf->Cell($lengthJudul1, $this->height, "Lampiran      :", "", 0, 'L');
        $pdf->Cell($lengthJudul2, $this->height, "1 (satu) berkas", "", 0, 'L');
        $pdf->Ln(6);

        $pdf->Cell($lengthJudul1, $this->height, "Perihal          :", "B", 0, 'L');
        $pdf->SetFont('Times', 'I', 12);
        $pdf->Cell($lengthJudul2, $this->height, "Permohonan Pengukuhan Wajib Pajak Daerah", "B", 0, 'L');
        $pdf->Ln(10);

        //Isi
        $date_start_laporan = getVarClean('date_start_laporan','str','');
        $date_end_laporan  = getVarClean('date_end_laporan','str','');
        $periode='';
        if ($date_start_laporan == $date_end_laporan){
            $periode=$date_start_laporan;
        }else{
            $periode=$date_start_laporan." s.d. ".$periode=$date_end_laporan;;
        }
        $pdf->SetFont('Times', '', 12);
        
        $pdf->SetWidths(array($lengthJudul1,10,$lengthJudul2-10));
        $pdf->SetAligns(array("J","J","J"));
        $pdf->RowMultiBorderWithHeight(
                array("",
                    "",
                    "Dipermaklumkan  dengan  hormat, sehubungan dengan permohonan pendaftaran"
                ),
                array("",
                    "",
                    ""
                ),
                $this->height
            );
        $pdf->SetWidths(array($lengthJudul1,$lengthJudul2));
        $pdf->SetAligns(array("J","J"));
        $pdf->RowMultiBorderWithHeight(
                array("",
                    "Wajib Pajak Daerah yang diterima pada tanggal ".$periode." sebagaimana terlampir, bersama ini kami sampaikan draft Surat Pengukuhan Wajib Pajak Daerah sebanyak ".$data["jumlah"]." (".$data["huruf"].") lembar untuk kiranya berkenan Bapak tandatangani."
                ),
                array("",
                    ""
                ),
                $this->height
            );
        $pdf->Ln(6);
        
        $pdf->SetWidths(array($lengthJudul1,10,$lengthJudul2-10));
        $pdf->SetAligns(array("J","J","J"));
        $pdf->RowMultiBorderWithHeight(
                array("",
                    "",
                    "Demikian kami sampaikan, atas perhatian dan perkenan Bapak dihaturkan terima"
                ),
                array("",
                    "",
                    ""
                ),
                $this->height
            );
        $pdf->SetWidths(array($lengthJudul1,$lengthJudul2));
        $pdf->SetAligns(array("J","J"));
        $pdf->RowMultiBorderWithHeight(
                array("",
                    "kasih."
                ),
                array("",
                    ""
                ),
                $this->height
            );
            
        $pdf->Ln(6);

        
        //TTD
        $lengWP1 = $lengthJudul2 * 1/3;
        $lengWP2 = $lengthJudul2 * 2/3;
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, "KEPALA BIDANG", "", "", 'C');
        $pdf->Ln();

        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, "PAJAK PENDAFTARAN,", "", "", 'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();

        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, "Drs. H. GUN GUN SUMARYANA", "", "", 'C');
        $pdf->Ln(6);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, "Pembina", "", "", 'C');
        $pdf->Ln(6);
        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'L');
        $pdf->Cell($lengWP1, $this->height, "", "", "", 'L');
        $pdf->Cell($lengWP2, $this->height, "NIP. 19700806 199101 1 001", "", "", 'C');
        $pdf->Ln(6);
        
        $pdf->Ln(6);
        $pdf->Ln(6);
        
        $pdf->SetFont('Times', 'BU', 12);
        $pdf->Cell(19, $this->height, "Tembusan ", "", 0, 'L');
        $pdf->SetFont('Times', 'U', 12);
        $pdf->Cell($lengthCell, $this->height, " disampaikan kepada Yth. :", "", 0, 'L');
        $pdf->Ln(6);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell($lengthCell, $this->height, "1. Sekretaris Badan Pendapatan Daerah;", "", 0, 'L');
        $pdf->Ln(6);
        $pdf->Cell($lengthCell, $this->height, "2. Kepala Bidang Perencanaan;", "", 0, 'L');
        $pdf->Ln(6);
        $pdf->Cell($lengthCell, $this->height, "3. Kepala Bidang Pengendalian; dan", "", 0, 'L');
        $pdf->Ln(6);
        $pdf->Cell($lengthCell, $this->height, "4. Para Kepala Seksi di lingkungan Bidang Pajak Pendaftaran.", "", 0, 'L');
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



