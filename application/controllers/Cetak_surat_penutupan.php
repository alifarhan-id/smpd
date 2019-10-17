<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_surat_penutupan extends CI_Controller{
	var $fontSize = 10;
    var $fontFam = 'Arial';
    var $yearId = 0;
    var $yearCode = "";
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

    function setCourier($pdf){
        $pdf->SetFont('Courier', 'B', 11);
    }

    function setTimes($pdf){
        $pdf->SetFont('Times', 'B', 11);
    }


	function pageCetak() {

        /**
         * Get Data
         */
        $t_customer_order_id = getVarClean('CURR_DOC_ID','int',0);

        $sql = "select 
                    c.wp_name,
                    c.wp_address_name || ' ' || nvl(wp_address_no,' ') as wp_address_name,
                    f.company_owner ,
                    c.company_brand,
                    c.npwd,
                    c.company_name,
                    c.address_name || ' ' || nvl(address_no,' ') as company_address,
                    f.address_name_owner ||nvl(address_no_owner,' ') as alamat_tinggal,
                    c.brand_address_name ||nvl(brand_address_no,' ') as alamat_pajak ,
                    c.brand_address_name || ' ' || nvl(brand_address_no,' ') as alamat_brand ,
                    type.p_vat_type_id,
                    type.vat_code,
                    a.order_no as reg_letter_no,
                    decode(c.p_vat_type_dtl_id,null,null,1,1,2,1,3,1,4,1,8,1,0) as klasifikasi,
                    nvl(d.vat_code,type.vat_code) as detail_jenis_pajak,
                    to_char (e.status_request_date,'dd-mm-yyyy') as status_request_date,
                    decode(e.reason_status_id,1,g.code,2,g.code,3,g.code,e.reason_description) as reason_code,
                    lpad (e.doc_no,5,'00000') as no_dokumen
            from t_cust_acc_status_modif e
            left join t_customer_order a on a.t_customer_order_id = e.t_customer_order_id
            left join   p_rqst_type b on a.p_rqst_type_id = b.p_rqst_type_id
            left join t_cust_account c on c.t_cust_account_id = e.t_cust_account_id
            left join   p_vat_type type on c.p_vat_type_id = type.p_vat_type_id
            left join p_vat_type_dtl d on c.p_vat_type_dtl_id = d.p_vat_type_dtl_id
            left join t_customer f on f.t_customer_id = c.t_customer_id
            left join p_reference_list g on g.p_reference_list_id = e.reason_status_id
            where a.t_customer_order_id =".$t_customer_order_id;

        $output = $this->db->query($sql);
        //echo $sql ; exit();
        $data = $output->row_array();


        $pdf = new FPDF();
        $startY = $pdf->GetY();
        $startX = $this->paperWSize-50;
        $lengthCell = $this->startX+20;
        $pdf->AliasNbPages();
        $pdf->AddPage("P");

        // Set margins
        $pdf->SetLeftMargin(17);
        $pdf->SetRightMargin(15);

        $lengthJudul1 = ($lengthCell * 1) / 6;
        $lengthJudul2 = ($lengthCell * 5) / 6;

        $pdf->Image(getValByCode('LOGO'), 15, 14, 25, 25);

        $pdf->Ln(6);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'C');
        $pdf->Cell($lengthJudul2, $this->height, getValByCode('INSTANSI_1'), "", 0, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Times', 'B', 18);
        $pdf->Cell($lengthJudul1, $this->height, "", "", 0, 'C');
        $pdf->Cell($lengthJudul2, $this->height, getValByCode('INSTANSI_2'), "", 0, 'C');
        $pdf->Ln(8);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell($lengthJudul1, $this->height, "", "B", 0, 'C');
        $pdf->Cell($lengthJudul2, $this->height, getValByCode('ALAMAT_5'), "B", 0, 'C');

        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell($lengthCell, $this->height, "SURAT PENCABUTAN DAN PENUTUPAN NPWPD", 0, 0, 'C');
        $pdf->Ln();
        
        $pdf->SetFont('Times', '', 11);
        $pdf->Cell($lengthCell, $this->height, "Nomor: 973/" . $data["reg_letter_no"]."/".str_ireplace('Pajak ','',$data['vat_code']) ."-TUP/Bapenda", 0, 0, 'C');
        // Body Atas
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell($lengthCell, $this->height, "                Berdasarkan Surat Permohonan Wajib Pajak Daerah / Berita Acara yang kami terima, dengan ini", 0, 0, 'L');
        $pdf->Ln();
        $pdf->Cell($lengthCell, $this->height, "dinyatakan bahwa:", 0, 0, 'L');

        // Form
        $pdf->Ln();
        $pdf->Ln();
        $formLen = $lengthCell / 3;
        $formLen1 = $formLen * 1;
        $formLen2 = $formLen * 2;
        $twelfth = $lengthCell / 12;
        $twelfth1 = $twelfth * 1;
        
        // Form 1. Wajib Pajak
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell($formLen1, $this->height, "1. Nama Orang/Pribadi/Penanggung", 0, 0, 'L');
        $pdf->SetFont('Times', '', 11);
        $pdf->Cell($twelfth1-12, $this->height, " : ", 0, 0, 'C');
        $pdf->Cell($formLen2 - $twelfth1, $this->height, $data["company_owner"], 0, 0, 'L');
        $pdf->Ln();
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell($formLen1, $this->height, "    Jawab", 0, 0, 'L');
        $pdf->SetFont('Times', '', 11);
        $pdf->Cell($twelfth1-12, $this->height, "", 0, 0, 'C');
        $pdf->Cell($formLen2 - $twelfth1, $this->height, "", 0, 0, 'L');
        
        // Form 2. Nama Badan/Perusahaan
        $pdf->Ln();
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell($formLen1, $this->height, "2. Nama Badan/Perusahaan", 0, 0, 'L');
        $pdf->SetFont('Times', '', 11);
        $pdf->Cell($twelfth1-12, $this->height, " : ", 0, 0, 'C');
        $pdf->Cell($formLen2 - $twelfth1, $this->height, $data["company_name"], 0, 0, 'L');
        
        
        // Form 3. NPWPD
        $pdf->Ln();
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell($formLen1, $this->height, "3. Nomor Pokok Wajib Pajak Daerah", 0, 0, 'L');
        $pdf->SetFont('Times', '', 11);
        $pdf->Cell($twelfth1-12, $this->height, " : ", 0, 0, 'C');

        $newstr = substr_replace($data["npwd"],'.', 2, 0);
        $newstr = substr_replace($newstr,'.', 10, 0);
        $newstr = substr_replace($newstr,'.', 13, 0);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell($formLen2 - $twelfth1, $this->height, $newstr, 0, 0, 'L');
        $pdf->Ln();
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell($formLen1, $this->height, "    (NPWPD)", 0, 0, 'L');    
        
        // Form 4. Alamat Wajib Pajak
        $pdf->Ln();
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell($formLen1, $this->height, "4. Alamat Wajib Pajak", 0, 0, 'L');
        $pdf->SetFont('Times', '', 11);
        $pdf->Cell($twelfth1-12, $this->height, " : ", 0, 0, 'C');
        $pdf->Cell($formLen2 - $twelfth1, $this->height, $data["wp_address_name"], '', 0, 'L');
    
        // Form 5. Alamat Badan/Perusahaan
        $pdf->Ln();
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell($formLen1, $this->height, "5. Alamat Badan/Perusahaan", 0, 0, 'L');
        $pdf->SetFont('Times', '', 11);
        $pdf->Cell($twelfth1-12, $this->height, " : ", 0, 0, 'C');
        $pdf->Cell($formLen2 - $twelfth1, $this->height, $data["company_address"], 0, 0, 'L');
    

        // Form 6. Jenis Pajak
        $pdf->Ln();
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell($formLen1, $this->height, "6. Jenis Pajak", 0, 0, 'L');
        $pdf->SetFont('Times', '', 11);
        $pdf->Cell($twelfth1-12, $this->height, " : ", 0, 0, 'C');
    

        // Form 8. Jenis Pajak -> Kotak Pilihan
        $kotakLen = ($formLen2 - $twelfth1) / 20;
        $kotakLen1 = $kotakLen * 1;
        $kotakLen3 = $kotakLen * 3;
        $kotakLen9 = $kotakLen * 9;
        
        $pdf->SetFont('Times', 'B', 11);
        
        $hotel = " ";
        $restoran = " ";
        $hiburan = " ";
        $parkir = " ";
        $ppj = " ";
        $bphtb = " ";
        
        switch($data["p_vat_type_id"]){
            case 1: $hotel = "X"; break;
            case 2: $restoran = "X"; break;
            case 3: $hiburan = "X"; break;
            case 4: $parkir = "X"; break;
            case 5: $ppj = "X"; break;
            case 6: $bphtb = "X"; break;
        }
        
        $bintang = " ";
        $melati = " ";
        $losmen = " ";
        $detail_bintang = array();
        $detail_melati = array();
        $detail_losmen = array();
        if(strpos(strtolower($data["detail_jenis_pajak"]), "bintang") !== false){ //HOTEL BINTANG X
            preg_match("/\d+/", $data["detail_jenis_pajak"], $detail_bintang);
            $bintang = "X";
            //$bintang = $detail_bintang[0];
        }
        else if(strpos(strtolower($data["detail_jenis_pajak"]), "melati") !== false){ //HOTEL MELATI X
            preg_match("/\d+/", $data["detail_jenis_pajak"], $detail_melati);
            //$melati = $detail_melati[0];
            $melati = "X";
        }
        else if(strpos(strtolower($data["detail_jenis_pajak"]), "rumah kos") !== false){ //HOTEL MELATI X
            preg_match("/\d+/", $data["detail_jenis_pajak"], $detail_losmen);
            //$losmen = $detail_losmen[0];
            $losmen = "X";
            $hotel=" ";
        }
        
        // switch($data["klasifikasi"]){
            // case 1: $bintang = "X"; break;
            // case 0: $melati = "X"; break;
        // }
        
        // if(is_null($data["klasifikasi"])){
            // $bintang = " ";
            // $melati = " ";
        // }
        
        // Form 6. Kewajiban Wajib Pajak -> Kotak Pilihan -> Baris 1
        $this->SetCourier($pdf);
        $pdf->Cell($kotakLen1, $this->height, "[$parkir]", "", 0, 'L');
        $this->setTimes($pdf);
        $pdf->Cell($kotakLen9, $this->height, " Pajak Parkir", "", 0, 'L');
        $this->SetCourier($pdf);
        $pdf->Cell($kotakLen1, $this->height, "[ ]", "", 0, 'L');
        $this->setTimes($pdf);
        $pdf->Cell($kotakLen9, $this->height, " Pajak Reklame", "", 0, 'L');
        
        // Form 6. Kewajiban Wajib Pajak -> Kotak Pilihan -> Baris 2
        $pdf->Ln();
        $pdf->Cell($formLen1 + $twelfth1-12, $this->height, "", 0, 0, 'L');
        $this->SetCourier($pdf);
        $pdf->Cell($kotakLen1, $this->height, "[$hiburan]", "", 0, 'L');
        $this->setTimes($pdf);
        $pdf->Cell($kotakLen9, $this->height, " Pajak Hiburan", "", 0, 'L');
        $this->SetCourier($pdf);
        $pdf->Cell($kotakLen1, $this->height, "[$ppj]", "", 0, 'L');
        $this->setTimes($pdf);
        $pdf->Cell($kotakLen9, $this->height, " Pajak Penerangan Jalan", "", 0, 'L');
        
        // Form 6. Kewajiban Wajib Pajak -> Kotak Pilihan -> Baris 3
        $pdf->Ln();
        $pdf->Cell($formLen1 + $twelfth1-12, $this->height, "", 0, 0, 'L');
        $this->SetCourier($pdf);
        $pdf->Cell($kotakLen1, $this->height, "[$restoran]", "", 0, 'L');
        $this->setTimes($pdf);
        $pdf->Cell($kotakLen9 * 2 + $kotakLen1, $this->height, " Pajak Restoran/Rumah Makan", "", 0, 'L');
        
        // Form 6. Kewajiban Wajib Pajak -> Kotak Pilihan -> Baris 4
        $pdf->Ln();
        $pdf->Cell($formLen1 + $twelfth1-12, $this->height, "", 0, 0, 'L');
        $this->SetCourier($pdf);
        $pdf->Cell($kotakLen1, $this->height, "[$hotel]", "", 0, 'L');
        $this->setTimes($pdf);
        $pdf->Cell($kotakLen9 + 8, $this->height, " Pajak Hotel: Klasifikasi: Bintang", "", 0, 'L');
        $this->SetCourier($pdf);
        $pdf->Cell($kotakLen1, $this->height, "[$bintang]", "", 0, 'L');
        $this->setTimes($pdf);
        $pdf->Cell($kotakLen3 - 3, $this->height, "  Melati", "", 0, 'L');
        $this->SetCourier($pdf);
        $pdf->Cell($kotakLen1, $this->height, "[$melati]", "", 0, 'L');
        
        // Form 6. Kewajiban Wajib Pajak -> Kotak Pilihan -> Baris 5
        $pdf->Ln();
        $pdf->Cell($formLen1 + $twelfth1-12, $this->height, "", 0, 0, 'L');
        $this->SetCourier($pdf);
        $pdf->Cell($kotakLen1, $this->height, "[$losmen]", "", 0, 'L');
        $this->setTimes($pdf);
        $pdf->Cell($kotakLen9 * 2 + $kotakLen1, $this->height, " Pajak Sewa Menyewa/Kontrak Rumah dan/atau", "", 0, 'L');
        $pdf->Ln();
        $pdf->Cell($formLen1 + $twelfth1, $this->height, "", 0, 0, 'L');
        $pdf->Cell($kotakLen1, $this->height, "", "", 0, 'L');
        $pdf->Cell($kotakLen9 * 2 + $kotakLen1, $this->height, " Bangunan", "", 0, 'L');
        
        // Body Bawah
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Times', '', 11);
        $pdf->SetWidths(array($lengthCell-5));
        $pdf->SetAligns(array("L"));
        $pdf->RowMultiBorderWithHeight(
            array("Terhitung mulai tanggal ".$data["status_request_date"]." telah mengajukan Penutupan dengan alasan ".$data["reason_code"]
            ),
            array(""
            ),
            $this->height
        );
        //$pdf->Cell($lengthCell, $this->height, "Terhitung mulai tanggal ".$data["status_request_date"]." telah mengajukan Penutupan dengan alasan ".$data["reason_code"], 0, 0, 'L');
        //$pdf->Ln();
        $pdf->Cell($lengthCell, $this->height, "                Dengan diterbitkannya surat ini, maka NPWPD Wajib Pajak tersebut telah dicabut dan", 0, 0, 'L');
        $pdf->Ln();
        $pdf->Cell($lengthCell, $this->height, "ditutup sehingga tidak lagi terdaftar sebagai Wajib Pajak Daerah Lombok Utara.", 0, 0, 'L');
        
        // Signature
        $pdf->Ln();
        $pdf->Ln();
        $sigLen = $lengthCell / 2;
        $sigLen1 = $sigLen * 1;
        $sigLen2 = $sigLen * 2;
        
        $pdf->Cell($sigLen1, $this->height, "", 0, 0, 'C');
        //$pdf->Cell($sigLen1, $this->height, "Bandung, 28 January 2015" , 0, 0, 'C');
        $pdf->Cell($sigLen1, $this->height, "Lombok Utara, " . date("j F Y"), 0, 0, 'C');
        $pdf->Ln();
        
        $pdf->Cell($sigLen1, $this->height, "", 0, 0, 'C');
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell($sigLen1, $this->height, "a.n. BUPATI LOMBOK UTARA", 0, 0, 'C');
        $pdf->Ln();
        
        $pdf->Cell($sigLen1, $this->height, "", 0, 0, 'C');
        $pdf->Cell($sigLen1, $this->height, "Kepala Badan Pendapatan Daerah", 0, 0, 'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        
        $pdf->Cell($sigLen1, $this->height, "", 0, 0, 'C');
        $pdf->Cell($sigLen1, $this->height, "Drs. PRIANA WIRASAPUTRA, MM", 0, 0, 'C');
        $pdf->Ln();
        
        $pdf->Cell($sigLen1, $this->height, "", 0, 0, 'C');
        $pdf->SetFont('Times', '', 11);
        $pdf->Cell($sigLen1, $this->height, "Pembina Utama Muda", 0, 0, 'C');
        $pdf->Ln();
        
        $pdf->Cell($sigLen1, $this->height, "", 0, 0, 'C');
        $pdf->Cell($sigLen1, $this->height, "NIP. 19600308 198503 1 007", 0, 0, 'C');
        
        // Tembusan
        
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        
        $pdf->SetFont('Times', 'BU', 10);
        $pdf->Cell($lengthCell / 10, $this->height, "Tembusan,", 0, 0, 'L');
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell($lengthCell - ($lengthCell / 10), $this->height, "disampaikan kepada Yth:", 0, 0, 'L');
        $pdf->Ln();
        
        $pdf->Cell($lengthCell, $this->height, "1. Bapak Bupati Lombok Utara (sebagai laporan);", 0, 0, 'L');
        $pdf->Ln();
        $pdf->Cell($lengthCell, $this->height, "2. Bapak Wakil Bupati Lombok Utara (sebagai laporan);", 0, 0, 'L');
        $pdf->Ln();
        $pdf->Cell($lengthCell, $this->height, "3. Bapak Sekretaris Daerah Lombok Utara (sebagai laporan);", 0, 0, 'L');
        $pdf->Ln();
        $pdf->Cell($lengthCell, $this->height, "4. Arsip.", 0, 0, 'L');
        $pdf->Ln();
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



