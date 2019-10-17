<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_formulir_surat_tagihan_denda_profesi extends CI_Controller{
    var $fontSize = 10;
    var $fontFam = 'Arial';
    var $yearId = 0;
    var $yearCode="";
    var $paperWSize = 215;
    var $paperHSize = 330;
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

    function newLine(){
        $pdf = new FPDF();
        $pdf->Cell($this->lengthCell, $this->height, "", "", 0, 'L');
        $pdf->Ln();
    }

    function save_pdf() {
      $pdf = new FPDF('P','mm',array($this->paperWSize, $this->paperHSize));

      $pdf->AliasNbPages();
      $pdf->AddPage("P");
      $this->showPdf($pdf);
      $pdf->Output();
      
    } 

    function showPdf($pdf){
      $t_customer_order_id = getVarClean('t_customer_order_id', 'int', 0);
      $data = $this->getData($t_customer_order_id);

      $this->kopSurat($pdf,$data);
      $this->tujuan($pdf,$data);
      $this->isiSurat($pdf,$data);
      $this->penutupSurat($pdf,$data);
      
      
    }

    function kopSurat($pdf,$data){
      $pdf->SetFont('Arial', '', 8);
        
      $pdf->Image(getValByCode('LOGO'),15,12,25,25);
      
      $lheader = $this->lengthCell / 8;
      $lheader1 = $lheader * 1;
      $lheader2 = $lheader * 2;
      $lheader3 = $lheader * 3;
      $lheader4 = $lheader * 4;
      
      $pdf->Cell($lheader1, $this->height, "", "LT", 0, 'L');
      $pdf->Cell($lheader3, $this->height, "", "TR", 0, 'L');
      $pdf->Cell($lheader2, $this->height, "", "TR", 0, 'C');
      $pdf->Cell($lheader2, $this->height, "", "TR", 0, 'C');
      $pdf->Ln();
      
      $pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lheader3, $this->height, getValByCode('INSTANSI_1'), "R", 0, 'C');
      $pdf->SetFont('Arial', '', 12);
      $pdf->Cell($lheader2, $this->height, "Surat Tagihan", "R", 0, 'C');
      $pdf->SetFont('Arial', '', 7);
      $pdf->Cell($lheader2, $this->height, "", "R", 0, 'C');
      $pdf->Ln();
      
      $pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lheader3, $this->height, getValByCode('INSTANSI_2'), "R", 0, 'C');
      $pdf->SetFont('Arial', '', 12);
      $pdf->Cell($lheader2, $this->height, "Denda Profesi", "R", 0, 'C');
      $pdf->SetFont('Arial', '', 7);
      $pdf->Cell($lheader2, $this->height, "No. Urut", "R", 0, 'C');
      $pdf->Ln();
      
      $periode=explode(" ", preg_replace('/\s+/', ' ',$data["finance_period_code"]));
      
      $pdf->Cell($lheader1, $this->height + 2, "", "L", 0, 'L');
      $pdf->Cell($lheader3, $this->height + 2, getValByCode('ALAMAT_6'), "R", 0, 'C');
      $pdf->Cell(12, $this->height + 2,"Bulan" , "", 0, 'L');
      //$pdf->SetFont('Arial', '', 8);
      $pdf->Cell($lheader2-12, $this->height + 2, ": ".$periode[0], "R", 0, 'L');
      //$pdf->Cell($lheader1 + 3, $this->height + 2, ": " . $periode[0], "R", 0, 'L');
      $pdf->SetFont('Arial', '', 7);
      $pdf->Cell($lheader2, $this->height + 2, "", "R", 0, 'C');
      $pdf->Ln($this->height-4);
      // No Urut
      $pdf->Cell(3, $this->height, "", "", 0, 'C');
      $pdf->Cell($lheader2 + $lheader4 + 1.5, $this->height, "", "R", 0, 'C');

      $no_urt = str_split($data["payment_key"]);
      $this->kotak($pdf,1, 34, 1, $no_urt[0]);
      $this->kotak($pdf,1, 34, 1, $no_urt[1]);
      $this->kotak($pdf,1, 34, 1, $no_urt[2]);
      $this->kotak($pdf,1, 34, 1, $no_urt[3]);
      $this->kotak($pdf,1, 34, 1, $no_urt[4]);
      $this->kotak($pdf,1, 34, 1, $no_urt[5]);
      $this->kotak($pdf,1, 34, 1, $no_urt[6]);
      $pdf->Ln();

      $pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lheader3, $this->height, "Telp. ".getValByCode('ALAMAT_2')." - ".getValByCode('ALAMAT_3'), "R", 0, 'C');
      $pdf->Cell(12, $this->height + 2,"Tahun" , "", 0, 'L');
      //$pdf->SetFont('Arial', '', 8);
      $pdf->Cell($lheader2-12, $this->height + 2, ": ".$periode[1], "R", 0, 'L');
      //$pdf->Cell($lheader1, $this->height, ": " . $periode[1], "R", 0, 'L');
      $pdf->SetFont('Arial', '', 10);
      $pdf->Cell($lheader2, $this->height, "", "R", 0, 'C');
      $pdf->Ln();
      
      $pdf->Cell($lheader1, $this->height, "", "LB", 0, 'L');
      $pdf->Cell($lheader3, $this->height, "", "BR", 0, 'L');
      $pdf->Cell($lheader2, $this->height, "", "BR", 0, 'L');
      $pdf->Cell($lheader2, $this->height, "", "BR", 0, 'L');
    }

    function tujuan($pdf,$data){
      $lbody = $this->lengthCell / 4;
      $lbody1 = $lbody * 1;
      $lbody2 = $lbody * 2;
      $lbody3 = $lbody * 3;
      
      $pdf->SetFont('Arial', '', 10);
      $pdf->Ln();
      $pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'L');
      $pdf->Ln();
      
      $pdf->Cell(5, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody1 - 5, $this->height, "Nama", "", 0, 'L');
      $pdf->Cell($lbody3, $this->height, ": " . $data["ppat_name"], "R", 0, 'L');
      $pdf->Ln();
      
      $pdf->Cell(5, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody1 - 5, $this->height, "Alamat", "", 0, 'L');
      $pdf->Cell($lbody3, $this->height, ": " . $data["address_name"], "R", 0, 'L');
      $pdf->Ln();
      
      $pdf->Cell(5, $this->height + 2, "", "L", 0, 'L');
      $pdf->Cell($lbody1 - 5, $this->height + 2, "No SK Pengukuhan", "", 0, 'L');
      $pdf->Cell($lbody3, $this->height, ": " . $data["no_sk"], "R", 0, 'L');
      $pdf->Ln();
      $pdf->Cell(5, $this->height + 2, "", "L", 0, 'L');
      $pdf->Cell($lbody1 - 5, $this->height + 2, "PPAT/S", "", 0, 'L');
      $pdf->Cell($lbody3, $this->height, "", "R", 0, 'L');
      $pdf->Ln();
      
      $pdf->SetWidths(array(5, $lbody1 - 5, $lbody3-5,5));
      $pdf->SetAligns(array("L",  "L", "L","C"));
      if($data["sanksi_ajb"]!=''){      
        $pdf->RowMultiBorderWithHeight(
          array("",
            "Denda Atas AJB yang ditandatangani sebelum pembayaran BPHTB",
            ": ".$data["sanksi_ajb"],
            ""
          ),
          array("LB",
            "B",
            "B",
            "BR"
          ),
          $this->height
        );
      }else{
        $pdf->RowMultiBorderWithHeight(
          array("",
            "Denda Atas Pelaporan Bulan",
            ": ".$data["finance_period_code"],
            ""
          ),
          array("BL",
            "B",
            "B",
            "BR"
          ),
          $this->height
        );
      }
    }

    function isiSurat($pdf,$data){
      $lbody = $this->lengthCell / 4;
      $lbody1 = $lbody * 1;
      $lbody2 = $lbody * 2;
      $lbody3 = $lbody * 3;


      $pdf->SetWidths(array(5, 5, $this->lengthCell-15,5));
      $pdf->SetAligns(array("L",  "L", "J","C"));
      $pdf->RowMultiBorderWithHeight(
        array("",
          "I.",
          "Berdasarkan Pasal 49 ayat (".substr($data["payment_key"],2,1).") Peraturan Daerah Nomor 20 Tahun 2011, telah dilakukan penelitian dan/atau keterangan lain atas pelaksanaan kewajiban :",
          ""
        ),
        array("L",
          "",
          "",
          "R"
        ),
        $this->height
      );
      
      $pdf->SetWidths(array(5,5, $lbody1 - 10, $lbody3-5,5));
      $pdf->SetAligns(array("L",  "L", "J", "J","C"));
      $pdf->RowMultiBorderWithHeight(
        array("",
          "",
          "\nAyat Denda\n ",
          "\n: ",
          ""
        ),
        array("L",
          "",
          "",
          "",
          "R"
        ),
        $this->height
      );
      
      $pdf->Ln($this->height-15);
      $pdf->Cell(4+$lbody1, $this->height, "", "", 0, 'C');
      $this->kotak($pdf,1, 34, 1, '4');
      $this->kotak($pdf,1, 34, 1, '1');
      $this->kotak($pdf,1, 34, 1, '4');
      $this->kotak($pdf,1, 34, 1, '2');
      $this->kotak($pdf,1, 34, 1, '5');
      $pdf->Ln();
      $pdf->Ln();
      
      $pdf->SetWidths(array(5, 5, $this->lengthCell-15,5));
      $pdf->SetAligns(array("L",  "L", "J","C"));
      if($data["sanksi_ajb"]!=''){
        $pdf->RowMultiBorderWithHeight(
          array("",
            "",
            "Denda Profesi PPAT/S atas AJB yang ditandatangani sebelum Pembayaran Bea Perolehan Hak Atas Tanah dan/atau Bangunan",
            ""
          ),
          array("L",
            "",
            "",
            "R"
          ),
          $this->height
        );
      }else{
        $pdf->RowMultiBorderWithHeight(
          array("",
            "",
            "Denda Profesi PPAT/S atas keterlambatan pelaporan pembuatan akta perolehan hak atas tanah dan/atau bangunan",
            ""
          ),
          array("L",
            "",
            "",
            "R"
          ),
          $this->height
        );
      }
      
      $pdf->RowMultiBorderWithHeight(
        array("",
          "",
          "",
          ""
        ),
        array("L",
          "",
          "",
          "R"
        ),
        $this->height
      );
      
      $pdf->RowMultiBorderWithHeight(
        array("",
          "II.",
          "Dari Penelitian dan/atau pemeriksaan lain tersebut di atas, perhitungan jumlah yang masih harus dibayar adalah sebagai berikut:",
          ""
        ),
        array("L",
          "",
          "",
          "R"
        ),
        $this->height
      );
      
      $pdf->SetWidths(array(10, 5, $this->lengthCell-60,40,5));
      $pdf->SetAligns(array("L",  "L", "J","R","C"));
      $pdf->RowMultiBorderWithHeight(
        array("",
          "1.",
          "Denda yang dikenakan",
          "Rp. ". number_format($data['total_vat_amount'],0,",","."),
          ""
        ),
        array("BL",
          "B",
          "B",
          "B",
          "BR"
        ),
        $this->height
      );
      
      $pdf->RowMultiBorderWithHeight(
        array("",
          "",
          "",
          "",
          ""
        ),
        array("L",
          "",
          "",
          "",
          "R"
        ),
        $this->height
      );

      $pdf->SetWidths(array(10, $lbody1 - 10, $lbody3-5,5));
      $pdf->SetAligns(array("L",  "L", "J","C"));
      $pdf->RowMultiBorderWithHeight(
        array("",
          "Dengan Huruf",
          $data['dengan_huruf'],
          ""
        ),
        array("L",
          "",
          "BLTR",
          "R"
        ),
        $this->height
      );
      
      $pdf->RowMultiBorderWithHeight(
        array("",
          "",
          "",
          ""
        ),
        array("BL",
          "B",
          "B",
          "BR"
        ),
        $this->height
      );
    }

    function penutupSurat($pdf,$data){
      $lbody = $this->lengthCell / 4;
      $lbody1 = $lbody * 1;
      $lbody2 = $lbody * 2;
      $lbody3 = $lbody * 3;

      $pdf->SetWidths(array(5, $lbody1 - 5+ $lbody3-5,5));
      $pdf->SetAligns(array("L", "J","C"));
      $pdf->SetFont('Arial', 'U', 10);
      $pdf->RowMultiBorderWithHeight(
        array("",
          "PERHATIAN :",
          ""
        ),
        array("L",
          "",
          "R"
        ),
        $this->height
      );
      
      $pdf->SetFont('Arial', '', 10);
      $pdf->RowMultiBorderWithHeight(
        array("",
          "Harap penyetoran dilakukan melalui Kas Daerah dengan menggunakan Surat Setoran (SSPD)",
          ""
        ),
        array("L",
          "",
          "R"
        ),
        $this->height+10
      );
      
      $pdf->SetWidths(array($lbody2+20,$lbody2 - 25,5));
      $pdf->SetAligns(array("J","C","C"));
      $pdf->RowMultiBorderWithHeight(
        array("",
          getValByCode('ALAMAT_3').", ".date("d-m-Y")."\n".
          "a.n. KEPALA ".getValByCode('INSTANSI_2')."\n".
          "Kepala Bidang Pajak Pendaftaran\n\n\n\n".
          "Drs. H. GUN GUN SUMARYANA\n".
          "Pembina\n".
          "NIP. 19700806 199101 1 001",
          ""
        ),
        array("L",
          "",
          "R"
        ),
        $this->height
      );
      
      $pdf->SetWidths(array($this->lengthCell));
      $pdf->SetAligns(array("C"));
      $pdf->RowMultiBorderWithHeight(
        array(""
        ),
        array("LR"
        ),
        $this->height
      );

      $pdf->SetWidths(array($this->lengthCell));
      $pdf->SetAligns(array("C"));
      $pdf->SetFont('Arial', '', 8);
      $pdf->RowMultiBorderWithHeight(
        array("\nGunting disini\n".
          "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\n \n "
        ),
        array("TB"
        ),
        $this->height-3
      );
      
      $pdf->SetWidths(array(5, $lbody1 - 5, $lbody3-5,5));
      $pdf->SetAligns(array("L", "L", "J","C"));
      $pdf->SetFont('Arial','' , 10);
      $pdf->RowMultiBorderWithHeight(
        array("",
          "Nama",
          ": ".$data['ppat_name'],
          ""
        ),
        array("L",
          "",
          "",
          "R"
        ),
        $this->height
      );
      $pdf->RowMultiBorderWithHeight(
        array("",
          "Alamat",
          ": ".$data['address_name'],
          ""
        ),
        array("L",
          "",
          "",
          "R"
        ),
        $this->height
      );
      $pdf->RowMultiBorderWithHeight(
        array("",
          "No. SK Pengukuhan PPAT/S",
          ": ".$data['no_sk'],
          ""
        ),
        array("BL",
          "B",
          "B",
          "BR"
        ),
        $this->height
      );
    }

    function kotak($pdf,$pembilang, $penyebut, $jumlahKotak, $isi){
      $lkotak = $pembilang / $penyebut * $this->lengthCell;
      for($i = 0; $i < $jumlahKotak; $i++){
        $pdf->Cell($lkotak, $this->height, $isi, "TBLR", 0, 'C');
      }
    }

    function getData($t_customer_order_id){
      $sql = "select a.*,
                  replace(f_terbilang(to_char(nvl(a.total_vat_amount,0)),'IDR'), '   ', ' ') as dengan_huruf,
                  f.code as finance_period_code
              from t_vat_setllement_ppat a
              left join p_finance_period f 
                on f.p_finance_period_id = a.p_finance_period_id
              where a.t_customer_order_id = ".$t_customer_order_id;

      $output = $this->db->query($sql);
      $items = $output->result_array();

      return $items[0];

    }

}

