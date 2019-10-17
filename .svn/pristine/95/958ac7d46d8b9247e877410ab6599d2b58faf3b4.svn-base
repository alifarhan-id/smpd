<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Pdf_laporan_rekap_bphtb extends CI_Controller{
    var $fontSize = 10;
    var $fontFam = 'Arial';
    var $yearId = 0;
    var $yearCode="";
    var $paperWSize = 216;
    var $paperHSize = 356;
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
        $this->startX = $this->paperWSize-72;
        $this->lengthCell = $this->startX+20;
    }

    function newLine(){
        $pdf = new FPDF();
        $pdf->Cell($this->lengthCell, $this->height, "", "", 0, 'L');
        $pdf->Ln();
    }

    


    function save_pdf() {

        $start_date_laporan        = getVarClean('date_start_laporan', 'str', '');
        $end_date_laporan          = getVarClean('date_end_laporan', 'str', '');
        $filter_lap                = getVarClean('filter_lap','str','');



        $param =  array('start_date' =>$start_date_laporan,
                        'end_date'=>$end_date_laporan,
                        'filter_lap'=>$filter_lap);
        //print_r($param);

        $items = $this->getDataPDF($param);

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

        $pdf->SetFont('helvetica', '',12);

        $textFilter = '';
        if(!empty($filter_lap)) {
          if($filter_lap== 1) //sudah bayar
            $textFilter = '(Sudah Bayar)';
          if($filter_lap == 2) //belum bayar
            $textFilter = 'YANG BELUM ADA KONFIRMASI LEBIH LANJUT OLEH PEMOHON';
          if($filter_lap == 3) //belum bayar
            $textFilter = '(Nihil)';
        }

        $pdf->SetFont('helvetica', '',12);
        $pdf->SetWidths(array(300));
        $pdf->ln(1);
        $pdf->RowMultiBorderWithHeight(array("DAFTAR NOTA VERIFIKASI BPHTB ".$textFilter),array('',''),6);
        $pdf->SetWidths(array(40,200));
        $pdf->ln(4);
        $pdf->RowMultiBorderWithHeight(array("TANGGAL",": ".$this->dateToString($start_date_laporan, "-")." s/d ".$this->dateToString($end_date_laporan, "-")),array('',''),6);


        $pdf->SetFont('helvetica', '',9);
        $pdf->ln(2);
        $pdf->SetWidths(array(10,24,20,15,40,18,22,25,20,61,61,27));
        $pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C'));
        $pdf->SetWidths(array(10,24,23,37,30,35,18,28,24,28,25,40,18,18,18,18,18));
        $pdf->SetFont('arial', '',7);
        $pdf->RowMultiBorderWithHeight(array("NO","TANGGAL","NO.REGISTRASI","NAMA WP","JENIS TRANSAKSI","NOP","LT / LB","HARGA TANAH / m2 (Rp)","HARGA BANGUNAN / m2 (Rp)","TOTAL NJOP (Rp)","HARGA PASAR / TRANSAKSI / LELANG (Rp)","NILAI PAJAK YANG HARUS DIBAYAR(Rp)"),array('LTB','LTB','LBT','LTB','TLB','TLB','TLB','TLB','TLB','TLBR'),5);
        $pdf->SetFont('arial', '',8);
        $no =1;
        $pdf->SetAligns(Array('C','L','L','L','L','L','R','R','R','R','R','R','R','R','R','R','R','R'));
        $jumlah =0;
        $jumlah=0;
        $total_nilai_pajak = 0;
        $nilai_njop = 0;


        if (!empty($items)){
          foreach ($items as $item) {
            $nilai_njop = $item['building_total_price'] +  $item['land_total_price'] ;
    
            $pdf->RowMultiBorderWithHeight(array($no,
                              $this->dateToString($item['creation_date']),
                              $item['registration_no'],
                              $item['wp_name'],
                              $item['description'],
                              $item['njop_pbb'],
                              number_format($item['land_area'],0,",",".")." / ".number_format($item['building_area'],0,",","."),
                              number_format($item['land_price_per_m'],2,",","."),
                              number_format($item['building_price_per_m'],2,",","."),
                              number_format($nilai_njop,2,",","."),
                              number_format($item['market_price'],2,",","."),
                              number_format($item['bphtb_amt_final'],2,",",".")
                              ),array('LB','LB','LB','LB','LB','LB','LB','LB','LB','LB','LB','LBR'),6);
            //$jumlah+=$item['amount'];
          //  $jumlah_wp+=$dbConn->f("jumlah_wp");
            $total_nilai_pajak += $item['bphtb_amt_final'];
            $no++;
          }
        }

        $pdf->SetWidths(array(282,40));
        $pdf->SetAligns(Array('C','R'));
        $pdf->SetFont('arial', 'B',8);
        $pdf->RowMultiBorderWithHeight(array("TOTAL", number_format($total_nilai_pajak,2,",",".")), array('LB','LBR'), 6);

        $pdf->ln(12);
  
        $pdf->SetAligns(array("C", "C"));
        $pdf->SetWidths(array(169, 163));
        if (date (strtotime($param['start_date'])) < date (strtotime('01-06-2015'))){
          $pdf->RowMultiBorderWithHeight( array("Mengetahui, \n Kepala Seksi Penyelesaian Piutang \n\n\n\n\n\n\n\n RACHMAT SATIADI, S.IP, M.Si \n ","\n Admin Penerimaan BPHTB"."\n\n\n\n\n\n\n\n INDRA WISNU, SE. \n"), array("",""), 4 );
          $pdf->RowMultiBorderWithHeight( array("(NIP : 19691104.199803.1.007)","(NIP : 19731031.2009.1.1001)"), array("",""), 1 );
        }else{
          $pdf->RowMultiBorderWithHeight( array("Mengetahui, \n Kepala Seksi Penyelesaian Piutang \n\n\n\n\n\n\n\n DIN KAMADIANTINI S.IP, MM \n ","\n Admin Penerimaan BPHTB"."\n\n\n\n\n\n\n\n INDRA WISNU, SE. \n  "), array("",""), 4 );
          $pdf->RowMultiBorderWithHeight( array("(NIP : 19710320.199803.2.006)","(NIP : 19731031.2009.1.1001)"), array("",""), 1 );
        }

        $pdf->Output("","I");
    } 



    /*
    
    Function untuk mengambil data pdf dari database
    Start
    */

    function getDataPDF($param = array()){
        $whereClause='cust_order.p_order_status_id <> 1';

        if(!empty($param['start_date']) && !empty($param['end_date'])){
          $whereClause.=" AND (trunc(reg_bphtb.creation_date) BETWEEN '".$param['start_date']."'";
          $whereClause.=" AND '".$param['end_date']."')";
        }else if(!empty($param['start_date'])&&empty($param['end_date'])){
          $whereClause.=" AND trunc(reg_bphtb.creation_date) >= '".$param['start_date']."'";
        }else if(empty($param['start_date'])&&!empty($param['end_date'])){
          $whereClause.=" AND trunc(reg_bphtb.creation_date) <= '".$param['end_date']."'";
        }

        if(!empty($param['filter_lap'])) {
          
          if($param['filter_lap'] == 1) { //sudah bayar 
            $whereClause.= " AND (payment.receipt_no is not null or payment.receipt_no <> '') ";
            $whereClause.= " AND ( bphtb_amt_final > 0 ) ";
          }
          if($param['filter_lap'] == 2) { //belum bayar
            $whereClause.= " AND ( payment.receipt_no is null or payment.receipt_no = '') ";
            $whereClause.= " AND ( bphtb_amt_final > 0 ) ";
          }
          if($param['filter_lap'] == 3) //nihil
            $whereClause.= " AND ( bphtb_amt_final < 1 ) ";
        }

        $sql = "SELECT
                    to_char(reg_bphtb.creation_date, 'YYYY-MM-DD') as creation_date,
                    registration_no,
                    wp_name,
                    reg_bphtb.p_bphtb_legal_doc_type_id,
                    bphtb_doc.description,
                    njop_pbb,
                    land_area,
                    land_total_price,
                    building_area,
                    building_total_price,
                    market_price,
                    bphtb_amt_final,
                    land_price_per_m,
                    building_price_per_m
                  FROM
                    sikp.t_bphtb_registration reg_bphtb
                  LEFT JOIN p_bphtb_legal_doc_type bphtb_doc 
                    on bphtb_doc.p_bphtb_legal_doc_type_id = reg_bphtb.p_bphtb_legal_doc_type_id
                  LEFT JOIN t_customer_order cust_order 
                    ON cust_order.t_customer_order_id = reg_bphtb.t_customer_order_id 
                  LEFT JOIN t_payment_receipt_bphtb payment 
                    ON reg_bphtb.t_bphtb_registration_id = payment.t_bphtb_registration_id 
                  ";

        if(!empty($whereClause))
            $sql.= " WHERE ".$whereClause;

        $sql.= " order by trunc(reg_bphtb.creation_date) ASC,upper(wp_name) ASC ";

        //echo $sql;exit;
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