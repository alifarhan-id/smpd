<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Pdf_rep_realisasi_harian_per_jenis_pajak2 extends CI_Controller{
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
        //$this->formCetak();
        $pdf = new FPDF('L','mm',array(215 ,330));
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

        $p_vat_type_id        = getVarClean('p_vat_type_id', 'int', 0);
        $p_year_period_id     = getVarClean('p_year_period_id', 'int', 0);
        $tgl_penerimaan       = getVarClean('tgl_penerimaan','str','');
        $tgl_penerimaan_last  = getVarClean('tgl_penerimaan_last', 'str', '');
        $jenis_setoran        = getVarClean('jenis_setoran', 'str', '');
        $jenis_laporan        = getVarClean('jenis_laporan', 'str', 'all');
        $year_date            = getVarClean('year_date', 'str', '');

        



        $param =  array('p_vat_type_id' =>$p_vat_type_id,
                        'p_year_period_id'=>$p_year_period_id,
                        'tgl_penerimaan'=>$tgl_penerimaan,
                        'tgl_penerimaan_last'=>$tgl_penerimaan_last,
                        'jenis_setoran'=>$jenis_setoran,
                        'jenis_laporan'=>$jenis_laporan,
                        'year_date'=>$year_date );
        //print_r($param);exit;

        $items = $this->getData($param);

        
        
        $pdf = new FPDF('L','mm',array(215 ,330));

        $pdf->AliasNbPages();
        $pdf->AddPage("L");
        $pdf->SetFont('Arial', '', 10);
        
        
        $tgl_penerimaan=str_replace("'", "",$tgl_penerimaan);
        $tgl_penerimaan_last=str_replace("'", "",$tgl_penerimaan_last);
        $this->kopSurat($pdf,$tgl_penerimaan,$tgl_penerimaan_last);
        $this->dataTable($pdf,$items);
        $this->ttd($pdf);

        $pdf->Output("","I");
    } 

    function kopSurat($pdf,$tgl_penerimaan,$tgl_penerimaan_last){
      $tahun  = date("Y", strtotime($tgl_penerimaan));

      $pdf->Image(getValByCode('LOGO'),15,13,25,25);
        
      $lheader = $this->lengthCell / 8;
      $lheader1 = $lheader * 1+8;
      $lheader3 = $lheader * 3+8;
      $lheader4 = $lheader * 4+16;
      
      $pdf->Cell($lheader1, $this->height, "", "LT", 0, 'L');
      $pdf->Cell($lheader3, $this->height, "", "TR", 0, 'L');
      $pdf->Cell($lheader3, $this->height, "", "T", 0, 'L');
      $pdf->Cell($lheader1, $this->height, "", "TR", 0, 'L');
      $pdf->Ln();
      $pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lheader3, $this->height, getValByCode('INSTANSI_1'), "R", 0, 'C');
      $pdf->Cell($lheader4, $this->height, "LAPORAN REALISASI HARIAN", "R", 0, 'C');
      $pdf->Ln();
      $pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lheader3, $this->height, getValByCode('INSTANSI_2'), "R", 0, 'C');
      $pdf->Cell($lheader4, $this->height, "PER JENIS PAJAK", "R", 0, 'C');
      $pdf->Ln();
      $pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lheader3, $this->height, getValByCode('ALAMAT_6'), "R", 0, 'C');
      $pdf->Cell($lheader4, $this->height, "Tahun " . $tahun, "R", 0, 'C');    
      $pdf->Ln();
      $pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lheader3, $this->height, "Telp. ".getValByCode('ALAMAT_2')." - ".getValByCode('ALAMAT_3'), "R", 0, 'C');
      if($tgl_penerimaan == $tgl_penerimaan_last)
        $pdf->Cell($lheader4, $this->height, "Tanggal Penerimaan " . $tgl_penerimaan, "R", 0, 'C');
      else 
        $pdf->Cell($lheader4, $this->height, "Tanggal Penerimaan : " . $tgl_penerimaan. " s/d ".$tgl_penerimaan_last, "R", 0, 'C');

      $pdf->Ln();
      $pdf->Cell($lheader1, $this->height, "", "LB", 0, 'L');
      $pdf->Cell($lheader3, $this->height, "", "BR", 0, 'L');
      $pdf->Cell($lheader3, $this->height, "", "B", 0, 'L');
      $pdf->Cell($lheader1, $this->height, "", "BR", 0, 'L');
      $pdf->Ln();
    }

    function dataTable($pdf,$data){
      $ltable = $this->lengthCell / 26;
      $ltable1 = $ltable * 1;
      $ltable2 = $ltable * 2;
      $ltable3 = $ltable * 3;
      $ltable4 = $ltable * 4;
      $ltable5 = $ltable * 5;
      $ltable22 = $ltable * 22;
      
      $pdf->Cell($ltable1, $this->height + 2, "NO.", "TBLR", 0, 'C');
      $pdf->Cell($ltable2+8, $this->height + 2, "NO. AYAT", "TBLR", 0, 'C');
      $pdf->Cell($ltable3+8, $this->height + 2, "NAMA AYAT", "TBLR", 0, 'C');
      //$pdf->Cell($ltable2, $this->height + 2, "NO. KOHIR", "TBLR", 0, 'C');
      $pdf->Cell($ltable5-($ltable3/3), $this->height + 2, "NAMA WP", "TBLR", 0, 'C');
      $pdf->Cell($ltable3, $this->height + 2, "NPWPD", "TBLR", 0, 'C');
      $pdf->Cell($ltable3-($ltable3/3)+6, $this->height + 2, "JUMLAH", "TBLR", 0, 'C');
      $pdf->Cell($ltable3+8, $this->height + 2, "MASA PAJAK", "TBLR", 0, 'C');
      $pdf->Cell($ltable2+1, $this->height + 2, "TGL TAP", "TBLR", 0, 'C');
      $pdf->Cell($ltable2*2-($ltable3/3)+1, $this->height + 2, "TGL BAYAR.", "TBLR", 0, 'C');
      $pdf->Cell($ltable3, $this->height + 2, "KETERANGAN", "TBLR", 0, 'C');
      $pdf->Ln();

      //isi kolom
      $pdf->SetWidths(array($ltable1, $ltable2+8, $ltable3+8, $ltable5-($ltable3/3), $ltable3, $ltable3-($ltable3/3)+6, $ltable3+8, $ltable2+1, $ltable2*2-($ltable3/3)+1,$ltable3));
      $pdf->SetAligns(array("C", "L", "L", "L", "L", "R", "L", "L", "L"));
      $no = 1;
      $jumlahperayat = array();
      $jumlahperwaktu = array();
      $jumlahtemp = 0;
      $i=0;
      $total=0;
      $temp = 0;
      if(!empty($data)){
        foreach($data as $item) {
          $pdf->RowMultiBorderWithHeight(array($no,
                              $item["kode_jns_pajak"]." ".$item["kode_ayat"],
                              $item["nama_ayat"],
                              //$item["no_kohir"],
                              $item["wp_name"],
                              $item["npwpd"],
                              number_format($item["jumlah_terima"], 0, ',', '.'),
                              $item["masa_pajak"],
                              $item["kd_tap"],
                              $item["payment_date"],
                              $item["code"]
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
                              'TBLR')
                              ,$this->height);
          $no++;
          $jumlahtemp += $item["jumlah_terima"];
          $total+= $item["jumlah_terima"];

          $ayat = $item["kode_ayat"];

          if ($i==count($data)-1){
            $ayatsesudah = $data[$i]["kode_ayat"];
          }else{
            $ayatsesudah = $data[$i+1]["kode_ayat"];
          }
          
            
          if(($ayat != $ayatsesudah&&count($data)>1)||empty($data[$i+1])){
            $jumlahperayat[] = $jumlahtemp;
            $pdf->Cell($ltable22+($ltable3/3)+32, $this->height + 2, "JUMLAH PAJAK ".$item["nama_ayat"], "TBLR", 0, 'C');
            $pdf->Cell($ltable4-($ltable3/3), $this->height + 2, number_format($jumlahtemp, 0, ',', '.'), "TBLR", 0, 'R');
            $pdf->Ln();
            $jumlahtemp = 0;
          }
          
          $temp++;
          $i++;
        }
        
        /*$pdf->Cell($ltable22+($ltable3/3)+32, $this->height + 2, "JUMLAH PAJAK ".$item["nama_ayat"], "TBLR", 0, 'C');
        $pdf->Cell($ltable4-($ltable3/3), $this->height + 2, number_format($jumlahtemp, 0, ',', '.'), "TBLR", 0, 'R');
        $pdf->Ln();*/
        $pdf->Cell($ltable22+($ltable3/3)+32, $this->height + 2, "TOTAL " . strtoupper($item["jns_pajak"]), "TBLR", 0, 'C');
        $pdf->Cell($ltable4-($ltable3/3), $this->height + 2, number_format($total, 0, ',', '.'), "TBLR", 0, 'R');
      }else{
        $pdf->Cell($ltable22+($ltable3/3)+32, $this->height + 2, "TOTAL ", "TBLR", 0, 'C');
        $pdf->Cell($ltable4-($ltable3/3), $this->height + 2, number_format($total, 0, ',', '.'), "TBLR", 0, 'R');
      }

      
    }

    function ttd($pdf){
      $pdf->Ln();
      $pdf->Ln();
      $pdf->Ln();
      $this->newLine();
      $this->newLine();
      $this->newLine();

      
      $pdf->SetAligns(array("C", "C"));
      $pdf->SetWidths(array(210, 120));
      $pdf->RowMultiBorderWithHeight( array("",getValByCode('ALAMAT_3').",". date("d F Y")."\n\n\n\n\n\n\n\n(....................................)"), array("",""), 5 );
    }

    function getData($param=array()){
      if($param['jenis_laporan']=='all'){
        $sql  = "select b.t_vat_setllement_id,c.code,
                    a.*,trunc(payment_date) 
                    from f_rep_bpps_piutang2new_mod_1(".$param['p_vat_type_id'].", ".$param['p_year_period_id'].", ". $param['tgl_penerimaan'].", ". $param['tgl_penerimaan_last'].",". $param['jenis_setoran'].") a
                    left join t_vat_setllement b on a.t_vat_setllement_id = b.t_vat_setllement_id
                    left join p_settlement_type c on c.p_settlement_type_id=b.p_settlement_type_id
                    order by kode_ayat, npwpd, masa_pajak";

      }else if($param['jenis_laporan'] == 'piutang'){
        $border= $param['year_date']-1;
        $sql  = "select *,trunc(payment_date) ,'' as code
                  from f_rep_bpps_piutang2new_mod_1(".$param['p_vat_type_id'].",". $param['p_year_period_id'].",". $param['tgl_penerimaan'].",". $param['tgl_penerimaan_last'].",". $param['jenis_setoran'].") rep
                WHERE
                  ( SUBSTRING(rep.masa_pajak,22,4) <". $param['year_date']."
                    AND 
                    (NOT (SUBSTRING(rep.masa_pajak,22,4) =". $border."
                    AND SUBSTRING(rep.masa_pajak,19,2) = 12))
                  )
                  OR
                  (
                    (SUBSTRING(rep.masa_pajak,22,4) =". $param['year_date']."
                    AND SUBSTRING(rep.masa_pajak,19,2) = 12)
                  )
                  OR
                  (
                    SUBSTRING(rep.masa_pajak,22,4) > ".$param['year_date']."
                  )
                  order by kode_ayat, npwpd, masa_pajak"; 
      }else if($param['jenis_laporan'] == 'murni'){
        $sql  = "select *,trunc(payment_date),'' as code 
                  from f_rep_bpps_piutang3new_mod_1(".$param['p_vat_type_id'].",". $param['p_year_period_id'].",". $param['tgl_penerimaan'].",". $param['tgl_penerimaan_last'].",". $param['jenis_setoran'].") rep
                WHERE
                  EXTRACT (YEAR FROM rep.settlement_date) = ".$param['year_date']."
                  order by kode_ayat, npwpd, masa_pajak";
      }

      //die($sql);

      $output = $this->db->query($sql);
      $items = $output->result_array();
      
            
       
     return $items;
    }


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