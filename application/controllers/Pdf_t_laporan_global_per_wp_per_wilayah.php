<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Pdf_t_laporan_global_per_wp_per_wilayah extends CI_Controller{
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

        $start_date            = getVarClean('date_start_laporan', 'str', '');
        $end_date              = getVarClean('date_end_laporan', 'str', '');
        $p_rqst_type_id        = getVarClean('p_rqst_type_id','int',0);
        $rqst_type_code        = getVarClean('rqst_type_code','str','');
        $kode_wilayah          = getVarClean('kode_wilayah','str','');



        $param =  array('date_start' =>$start_date,
                        'date_end'=>$end_date,
                        'p_rqst_type_id'=>$p_rqst_type_id,
                      'kode_wilayah'=>$kode_wilayah);

        $items = $this->getDataPDF($param);

        $_BORDER = 0;
        $_FONT = 'Times';
        $_FONTSIZE = 10;


        $pdf = new FPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage("Landscape",'');
        $pdf->SetFont('helvetica', '', $_FONTSIZE);
        $pdf->SetRightMargin(5);
        $pdf->SetLeftMargin(9);
        $pdf->SetAutoPageBreak(false,0);

        $pdf->SetFont('helvetica', '',12);
        $pdf->SetWidths(array(200));
        $pdf->ln(1);
        $pdf->RowMultiBorderWithHeight(array("Penerimaan Global per WP"),array('',''),6);
        $pdf->SetWidths(array(30,200));
        $pdf->ln(4);


        $pdf->RowMultiBorderWithHeight(array("Jenis Pajak",": ".$rqst_type_code),array('',''),6);
        $pdf->RowMultiBorderWithHeight(array("Tanggal",": ".$this->dateToString($param['date_start'])." s/d ".$this->dateToString($param['date_end'])),array('',''),6);


        $pdf->SetFont('helvetica', '',8);
        $pdf->ln(2);
        $pdf->SetWidths(array(10,45,50,23,25,18,50,25,23));
        $pdf->SetAligns(Array('C','C','C','C','C','C','C','C'));
        $pdf->RowMultiBorderWithHeight(array("NO","NAMA WP","ALAMAT","NPWPD","BESARNYA","JML SSPD","NAMA AYAT","PENGUKUHAN","KETERANGAN"),array('LTB','LTB','LTB','LTB','LTB','LTB','LTB','LTB','LTBR'),6);
        $pdf->SetFont('helvetica', '',8);

        $no =1;
        $pdf->SetAligns(Array('C','L','L','R','R','R','L'));

        $jumlah =0;
        $jumlah_wp=0;
        if (!empty($items)){
          foreach ($items as $item) {

            $pdf->RowMultiBorderWithHeight(array($no,
                              $item['nama_wp'],
                              $item['alamat_new'],
                              $item['npwpd'],

                              'Rp. '.number_format($item['amount'], 2, ',', '.'),
                              $item['tot_sspd'],
                              $item['jenis_pajak'],
                              $item['active_date'],
                              $item['kode_wilayah']
                              ),array('LB','LB','LB','LB','LB','LB','LB','LBR'),6);

            $jumlah += $item['amount'];
            $jumlah_wp += $item['tot_sspd'];
            $no++;
          }
        }


        $pdf->SetAligns(Array('C','R','R','R','R','L'));
        $pdf->SetWidths(array(128,25,18));
        $pdf->RowMultiBorderWithHeight(array('Jumlah','Rp. '.number_format($jumlah, 2, ',', '.'),number_format($jumlah_wp, 0, ',', '.')),array('LB','LB','LBR'),6);

        $pdf->SetWidths(array(123,50));
        $pdf->SetAligns('L');
        $pdf->ln(5);
        $pdf->SetWidtHs(array(200,70));
        $pdf->SetAligns(array("C", "C","C","C","C"));
        $pdf->RowMultiBorderWithHeight(array("","KEPALA SEKSI VERIFIKASI OTORISASI DAN PEMBUKUAN\n\n\n\n\n(".getValByCode('TTD_KEPSEK_VER_OTOBUK').")\n(NIP ".getValByCode('NIP_KEPSEK_VER_OTOBUK').")"),array("",""),5);
        
        $pdf->Output("","I");
    } 



    /*
    
    Function untuk mengambil data pdf dari database
    Start
    */

    function getDataPDF($param = array()){
         /*$sql = "SELECT a.*, 
                        f_get_wilayah(b.npwd) as kode_wilayah , 
                        to_char(b.active_date,'dd-mm-yyyy') as active_date,
                        b.brand_address_name ||' '|| nvl(b.brand_address_no,'') as alamat_new
                FROM    sikp.f_laporan_global_wp2(".
                                                    $param['p_rqst_type_id'].",'".
                                                    $param['date_start']."', '".
                                                    $param['date_end']."') a
                LEFT JOIN t_cust_account b on a.npwpd = b.npwd
                WHERE f_get_wilayah_id(b.npwd) = ".$param['kode_wilayah']. " 
                ORDER BY jenis_pajak,TRIM(company_brand)
                  ";*/

        $sql = "SELECT a.*, 
                        f_get_wilayah2(b.npwd) as kode_wilayah , 
                        to_char(b.active_date,'dd-mm-yyyy') as active_date,
                        b.brand_address_name ||' '|| nvl(b.brand_address_no,'') as alamat_new
                FROM    sikp.f_laporan_global_wp2(".
                                                    $param['p_rqst_type_id'].",'".
                                                    $param['date_start']."', '".
                                                    $param['date_end']."') a
                LEFT JOIN t_cust_account b on a.npwpd = b.npwd
                WHERE case when '".$param['kode_wilayah']."' = '0' then true 
                            when '".$param['kode_wilayah']."' = 'lainnya' then f_get_wilayah2(b.npwd)='-' 
                            else '".$param['kode_wilayah']."' = f_get_wilayah2(b.npwd) end
                ORDER BY jenis_pajak,TRIM(company_brand)
                  ";

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