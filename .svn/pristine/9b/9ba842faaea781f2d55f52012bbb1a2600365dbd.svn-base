<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Pdf_lap_penerimaan_penyetoran extends CI_Controller{
    var $fontSize = 10;
    var $fontFam = 'Arial';
    var $yearId = 0;
    var $yearCode="";
    var $paperWSize = 356;
    var $paperHSize = 216;
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

    


    function save_pdf() {
        $period  = getVarClean('period', 'str', '');
        $finance_period_id  = getVarClean('finance_period_id', 'str', '');

        $param =  array('period' =>$period,
                        'finance_period_id'=>$finance_period_id);

        $_BORDER = 0;
        $_FONT = 'Times';
        $_FONTSIZE = 10;

        $pdf = new FPDF('L','mm',array(216 ,356));
        $pdf->AliasNbPages();
        $pdf->AddPage("Landscape",'Legal');
        $pdf->SetFont('helvetica', '', $_FONTSIZE);
        $pdf->SetRightMargin(5);
        $pdf->SetLeftMargin(9);
        $pdf->SetAutoPageBreak(false,0);

        $pdf->SetFont('Arial', '',12);
        //$pdf->SetWidths(array(200));

        $pdf->ln(1);
        $pdf->Cell(0, $this->height, getValByCode('INSTANSI_1'), "", 0, 'C');
        $pdf->Ln();
        $pdf->Cell(0, $this->height, "BUKU PENERIMAAN DAN PENYETORAN", "", 0, 'C');
        $pdf->Ln();
        $pdf->Cell(0, $this->height, "BENDAHARA PENERIMAAN", "", 0, 'C');
        $pdf->Ln();

        $pdf->Cell(0, $this->height, "SKPD     : ".getValByCode('INSTANSI_3'), "", 0, 'L');
        $pdf->Ln();
        $pdf->Cell(0, $this->height, "Periode  : ".$period, "", 0, 'L');
        $pdf->Ln();
        $pdf->Ln();


        $ltable = $this->lengthCell / 11;
        $ltable1 = $ltable * 1;
        $ltable2 = $ltable * 6;
        $ltable3 = $ltable * 3.5;
        $ltable4 = $ltable * 0.5;

        $pdf->SetFont('Arial', 'B', 8);

        $sepertiga = ($this->lengthCell - (($ltable1 * 2)+ ($ltable1 * 5.2) + ($ltable1 * 2.5)))/3;

        $pdf->SetWidths(array($ltable1, $ltable2, $ltable3, $ltable4));
        $pdf->SetAligns(array("C", "C", "C", "C", "C", "C"));
        
        $pdf->RowMultiBorderWithHeight(array("NO",
                                              "PENERIMAAN",
                                              "PENYETORAN",
                                              "Ket",
                                              ),
                                        array('TLR',
                                              'TBLR',
                                              'TBLR',
                                              'TLR'
                                              )
                                              ,$this->height);
        
        $lltable  = $ltable2 / 7;
        $lltable1 = $lltable * 0.5;
        $lltable2 = $lltable * 1;
        $lltable3 = $lltable * 1;
        $lltable4 = $lltable * 1.5;
        $lltable5 = $lltable * 2;
        $lltable6 = $lltable * 1;


        $llltable  = $ltable3 / 5;
        $llltable1 = $llltable * 1;
        $llltable2 = $llltable * 1;
        $llltable3 = $llltable * 1.5;
        $llltable4 = $llltable * 1.5;


        $pdf->SetWidths(array(
            $ltable1,
            $lltable1, 
            $lltable2,
            $lltable3,
            $lltable4,
            $lltable5,
            $lltable6,
            $llltable1,
            $llltable2,
            $llltable3,
            $llltable4,
            $ltable4
            ));
        $pdf->SetAligns(array("C", "C","C", "C", "C", "C", "C", "C", "C", "C", "C", "C"));
        
        $pdf->SetFont('Arial', '', 8);

        $pdf->RowMultiBorderWithHeight(array("",
                                              "TGL",
                                              "No Bukti",
                                              "Cara\nPembayaran",
                                              "Kode\nRekening",
                                              "Uraian",
                                              "Jumlah",
                                              "TGL",
                                              "Cara\nPenyetoran",
                                              "No STS",
                                              "Jumlah",
                                              ""
                                              ),
                                        array('BLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'BLR'
                                              )
                                              ,$this->height);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->RowMultiBorderWithHeight(array("1",
                                              "2",
                                              "3",
                                              "4",
                                              "5",
                                              "6",
                                              "7",
                                              "8",
                                              "",
                                              "9",
                                              "10",
                                              "11"
                                              ),
                                        array('TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR',
                                              'TBLR'
                                              )
                                              ,$this->height);
        $pdf->SetFont('Arial', '', 8);

        $no = 1;
        $dataPeriods = $this->getDataPeriod($param);
        $temp;
        $total;

        $pdf->SetAligns(array("C", "L","L", "L", "L", "L", "R", "L", "L", "L", "R", "L"));

        if (!empty($dataPeriods)){
          foreach ($dataPeriods as $dataPeriod) {

            $jml_penerimaan = $this->getJumlahPenerimaan($param,$dataPeriod['tgl']);
            $dataCategorys = $this->getDataCategory($param,$dataPeriod['tgl']);

            $temp = 1;
            
            foreach ($dataCategorys as $dataCategory){
              $jml_trima = null;
              if($temp == 1){
                  $jml_trima = number_format($jml_penerimaan['jml_penerimaan'],2,",",".");
              }

              $pdf->RowMultiBorderWithHeight(array($no++,
                                                    $dataPeriod['tgl'],
                                                    "",
                                                    "",
                                                    "",
                                                    $dataCategory['vat_code'],
                                                    $jml_trima,
                                                    "",
                                                    "",
                                                    "",
                                                    "",
                                                    ""
                                                    ),
                                              array('TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR'
                                                    )
                                                    ,$this->height);
                

                $dataUraians = $this->getDataUraian($param,$dataPeriod['tgl']);
                $total = 0;
                foreach ($dataUraians as $dataUraian){
                  $jml = number_format($dataUraian['payment_vat_amount'],2,",",".");
                  $pdf->RowMultiBorderWithHeight(array("",
                                                    "",
                                                    "",
                                                    "",
                                                    "",
                                                    $dataUraian['company_brand']." - ".$jml,
                                                    "",
                                                    "",
                                                    "",
                                                    "",
                                                    "",
                                                    ""
                                                    ),
                                              array('TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR'
                                                    )
                                                    ,$this->height);
                  $total +=$dataUraian['payment_vat_amount'];

                }
                 $total = number_format($total,2,",",".");
                $pdf->RowMultiBorderWithHeight(array("",
                                                    "",
                                                    "",
                                                    "",
                                                    "",
                                                    "Jumlah  \t- ".$total,
                                                    "",
                                                    "",
                                                    "",
                                                    "",
                                                    "",
                                                    ""
                                                    ),
                                              array('TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR',
                                                    'TBLR'
                                                    )
                                                    ,$this->height);
                  $total +=$total;
            }

          }
            
        }

        $pdf->Output();
    } 



    /*
    
    Function untuk mengambil data pdf dari database
    Start
    */

    function getDataPeriod($param = array()){
        $sql= "SELECT  to_char(payment_date,'yyyy-mm-dd') TGL ,a.finance_period_code
                 FROM t_payment_receipt a ,p_finance_period b
                 WHERE a.p_finance_period_id = b.p_finance_period_id
                 AND b.p_finance_period_id = ".$param['finance_period_id']."
                 AND to_char(payment_date,'yyyy-mm')  = to_char(b.start_date,'yyyy-mm')
              GROUP BY to_char(payment_date,'yyyy-mm-dd'),a.finance_period_code
                ";

        $output = $this->db->query($sql);
        $items = $output->result_array();

        return $items;
    } 

    function getJumlahPenerimaan($param = array(),$tgl){
        $sql= "SELECT sum(payment_vat_amount) jml_penerimaan
                    FROM t_payment_receipt 
                WHERE p_finance_period_id = ".$param['finance_period_id']." 
              AND to_char(payment_date,'yyyy-mm-dd') = '".$tgl."'"
                ;

        $output = $this->db->query($sql);
        $items = $output->row_array();

        return $items;
    }

    function getDataCategory($param = array(),$tgl){
        $sql= "SELECT  b.p_vat_type_id, c.vat_code
                  FROM t_payment_receipt a
                INNER JOIN p_vat_type_dtl b
                  ON a.p_vat_type_dtl_id = b.p_vat_type_dtl_id
                INNER JOIN p_vat_type c
                  ON b.p_vat_type_id = c.p_vat_type_id
                WHERE p_finance_period_id = ".$param['finance_period_id']."  
                  and to_char(payment_date,'yyyy-mm-dd') = '".$tgl."'
                group by b.p_vat_type_id, c.vat_code
                order by b.p_vat_type_id asc"
                ;

        $output = $this->db->query($sql);
        $items = $output->result_array();

        return $items;
    }

    function getDataUraian($param = array(),$tgl){
        $sql= "SELECT   t_payment_receipt_id,
                        b.t_cust_account_id,
                        p_vat_type_id,
                        company_brand ,
                        payment_vat_amount
              FROM t_payment_receipt a
              INNER JOIN t_cust_account b
              ON a.t_cust_account_id = b.t_cust_account_id
              WHERE p_finance_period_id = ".$param['finance_period_id']."   
              AND to_char(payment_date,'yyyy-mm-dd') = '".$tgl."'"
                ;

        $output = $this->db->query($sql);
        $items = $output->result_array();

        return $items;
    }

    // end get data

  function dateToString($date){
    if(empty($date)) return "";
    
    $monthname = array(0  => '-',
                       1  => 'Januari',
                       2  => 'Februari',
                       3  => 'Maret',
                       4  => 'April',
                       5  => 'Mei',
                       6  => 'Juni',
                       7  => 'Juli',
                       8  => 'Agustus',
                       9  => 'September',
                       10 => 'Oktober',
                       11 => 'November',
                       12 => 'Desember');    
    
    $pieces = explode('-', $date);
    
    return $pieces[2].'-'.$monthname[(int)$pieces[1]].'-'.$pieces[0];
  }

}