 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_skpd_pad_controller.php
* @version 07/05/2015 12:18:00
*/
class T_laporan_skpd_pad_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('p_vat_type_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');

        $p_year_period_id = getVarClean('p_year_period_id','int',0);
        $periode = getVarClean('form_finance_code','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_skpd_pad');
            $table = $ci->t_laporan_skpd_pad;
             
            $result = $table->getData($p_year_period_id,$periode);

            $count = count($result);
            for ($i=0; $i <$count ; $i++) { 
                $first_char = substr($result[$i]['rc_pad_jenis_pajak'], 0,1);
                if ($first_char == '#') {
                    $result[$i]['rc_pad_jenis_pajak_formated'] = substr($result[$i]['rc_pad_jenis_pajak'], 1);
                } else {
                    $result[$i]['rc_pad_jenis_pajak_formated'] = $result[$i]['rc_pad_jenis_pajak'];
                }
            }
            



            //count($result)

            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;

            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - 1; // do not put $limit*($page - 1)

           
            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['rows'] = $result;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
        

        
    }

    function excel() {
    
        $p_year_period_id = getVarClean('p_year_period_id','int',0);
        $p_finance_period_code = getVarClean('p_finance_period_code','str','');
        $form_finance_period_id = getVarClean('form_finance_period_id','int',0);
        $form_year_code = getVarClean('form_year_code','str','');
        $periode = $form_year_code."".$this->DateToString($p_finance_period_code);
        /*print_r($periode);
        exit;*/
            
        try{
            
            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_skpd_pad');
            $table = $ci->t_laporan_skpd_pad;

            $result =  $table->getData($p_year_period_id, $periode);
            //print_r($result); exit();

            startExcel("laporan_skpd_pad.xls");
        
            $output = '';

            /*$output .= '<p style="text-align: left;"><b>'.getValByCode('INSTANSI_1').'</b></p>';
            $output .= '<p style="text-align: left;"><b>'.strtoupper(getValByCode('INSTANSI_3')).'</b></p> ';
            $output .= '<p style="text-align: left;"><b>'.getValByCode('ALAMAT_6')." Telp.".getValByCode('ALAMAT_2')." Fax.".getValByCode('ALAMAT_4').'</b></p>';
            $output .= '<p style="text-align: left;"><b>TANJUNG - KODE POS : 83352</b></p>';
*/
            $output .= '<div><b>'.getValByCode('INSTANSI_1').'</div>';
            $output .= '<div><b>'.strtoupper(getValByCode('INSTANSI_3')).'</b></div> ';
            $output .= '<div><b>'.getValByCode('ALAMAT_6')." Telp.".getValByCode('ALAMAT_2')." Fax.".getValByCode('ALAMAT_4').'</b></div>';
            $output .= '<div><b>TANJUNG - KODE POS : 83352</b></div>';
            
            $output .= '<h2 style="text-align: center;">LAPORAN PERTANGGUNGJAWABAN BENDAHARA PENERIMAAN SKPD</h2>';
            $output .= '<h4 style="text-align: center;">(SPJ PENDAFTARAN - ADMINISTRATIF)</h4>';

            $output .= '<table>';
            $output .= '<tr style="text-align: ;">';
                $output .= '<th>  </th>';
                $output .= '<th style="text-align: left;"> SKPD </th>';
                $output .= '<th> : </th>';
                $output .= '<th style="text-align: left;"> '.getValByCode('INSTANSI_1').' </th>';
            $output .= '</tr>';
            $output .= '<tr style="text-align: center;">';
                $output .= '<th>  </th>';
                $output .= '<th style="text-align: left;"> Pengguna Anggaran/Kuasa Pengguna Anggaran </th>';
                $output .= '<th> : </th>';
                $output .= '<th style="text-align: left;"> H. Zulfadli,S.E </th>';
            $output .= '</tr>';
            $output .= '<tr style="text-align: center;">';
                $output .= '<th>  </th>';
                $output .= '<th style="text-align: left;"> Bendahara Penerimaan </th>';
                $output .= '<th> : </th>';
                $output .= '<th style="text-align: left;"> Dewi Cahyaning Candra </th>';
                $output .= '<th>  </th>';
                $output .= '<th>  </th>';
                $output .= '<th>  </th>';
                $output .= '<th>  </th>';
                $output .= '<th>  </th>';
                $output .= '<th>  </th>';
                $output .= '<th style="text-align: left;"> Bulan : '.$p_finance_period_code.' </th>';
            $output .= '</tr>';
            $output .= '</table>';

            $output .= '<br></br>';
            $output .= '<br></br>';

            $output .='<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px">
                        <tr class="Caption">';


            $output.='<th rowspan = 2>NO</th>';
            $output.='<th rowspan = 2>KODE REKENING</th>';
            $output.='<th rowspan = 2>URAIAN</th>';
            $output.='<th rowspan = 2>JUMLAH ANGGARAN</th>';
            //$output.='<th>NO KOHIR</th>';

            $output.='<th colspan = 3 align=center>Sampai dengan Bulan Lalu</th>';
            $output.='<th colspan = 3 align=center>Bulan Ini</th>';
            $output.='<th colspan = 4 align=center>Sampai dengan Bulan Ini</th>';
            $output.='</tr>';
                $output.='<tr class="Caption">';
                    $output.='<th align="center">Penerimaan</th>';
                    $output.='<th align="center">Penyetoran</th>';
                    $output.='<th align="center">Sisa</th>';
                    $output.='<th align="center">Penerimaan</th>';
                    $output.='<th align="center">Penyetoran</th>';
                    $output.='<th align="center">Sisa</th>';
                    $output.='<th align="center">Jumlah
                                                Anggaran
                                                yang
                                                Ter-Realisasi</th>';
                    $output.='<th align="center">Jumlah
                                                Anggaran
                                                yang Disetor
                                                </th>';
                    $output.='<th align="center">Sisa yang
                                                Belum
                                                Disetor</th>';
                    $output.='<th align="center">Sisa
                                                Anggaran yang
                                                Belum Ter-Realisasi
                                                Pelampauan
                                                Anggaran</th>';
                $output.='</tr>';
            $output.='</tr>';

            
            for ($i=0; $i <count($result) ; $i++) { 
                $output .= '<tr>';
                $first_char = substr($result[$i]['rc_pad_jenis_pajak'], 0,1);
                $output .= '<td>'.($i+1).'</td>';
                if ($first_char == '#') {
                    $output .= '<td align="left"><b>'.substr($result[$i]['rc_pad_jenis_pajak'],1).'</b></td>';
                    $output .= '<td><b>'.$result[$i]['jenis_penerimaan'].'</b></td>';
                    $output .= '<td align="right"><b>'.number_format($result[$i]['jml_anggaran'], 2, ',', '.').'</b></td>';
                    $output .= '<td align="right"><b>'.number_format($result[$i]['penerimaan_bln_lalu'], 2, ',', '.').'</b></td>';
                    $output .= '<td align="right"><b>'.number_format($result[$i]['setoran_bln_lalu'], 2, ',', '.').'</b></td>';
                    $output .= '<td align="right"><b>'.number_format($result[$i]['sisa_bln_lalu'], 2, ',', '.').'</b></td>';
                    $output .= '<td align="right"><b>'.number_format($result[$i]['penerimaan_bln_ini'], 2, ',', '.').'</b></td>';
                    $output .= '<td align="right"><b>'.number_format($result[$i]['setoran_bln_ini'], 2, ',', '.').'</b></td>';
                    $output .= '<td align="right"><b>'.number_format($result[$i]['sisa_bln_ini'], 2, ',', '.').'</b></td>';
                    $output .= '<td align="right"><b>'.number_format($result[$i]['jml_realisai'], 2, ',', '.').'</b></td>';
                    $output .= '<td align="right"><b>'.number_format($result[$i]['jml_setor'], 2, ',', '.').'</b></td>';
                    $output .= '<td align="right"><b>'.number_format($result[$i]['sisa_blm_setor'], 2, ',', '.').'</b></td>';
                    $output .= '<td align="right"><b>'.number_format($result[$i]['sisa_blm_realisasi'], 2, ',', '.').'</b></td>';
                }else{
                    $output .= '<td align="left">'.$result[$i]['rc_pad_jenis_pajak'].'</td>';
                    $output .= '<td>'.$result[$i]['jenis_penerimaan'].'</td>';
                    $output .= '<td align="right">'.number_format($result[$i]['jml_anggaran'], 2, ',', '.').'</td>';
                    $output .= '<td align="right">'.number_format($result[$i]['penerimaan_bln_lalu'], 2, ',', '.').'</td>';
                    $output .= '<td align="right">'.number_format($result[$i]['setoran_bln_lalu'], 2, ',', '.').'</td>';
                    $output .= '<td align="right">'.number_format($result[$i]['sisa_bln_lalu'], 2, ',', '.').'</td>';
                    $output .= '<td align="right">'.number_format($result[$i]['penerimaan_bln_ini'], 2, ',', '.').'</td>';
                    $output .= '<td align="right">'.number_format($result[$i]['setoran_bln_ini'], 2, ',', '.').'</td>';
                    $output .= '<td align="right">'.number_format($result[$i]['sisa_bln_ini'], 2, ',', '.').'</td>';
                    $output .= '<td align="right">'.number_format($result[$i]['jml_realisai'], 2, ',', '.').'</td>';
                    $output .= '<td align="right">'.number_format($result[$i]['jml_setor'], 2, ',', '.').'</td>';
                    $output .= '<td align="right">'.number_format($result[$i]['sisa_blm_setor'], 2, ',', '.').'</td>';
                    $output .= '<td align="right">'.number_format($result[$i]['sisa_blm_realisasi'], 2, ',', '.').'</td>';
                }
                
                
                $output.='</tr>';
                # code...
            }
            
            $output.='</table>';

            //print_r($item['avg_tap']); exit();
            
            echo $output;
                exit;
        } catch(Exception $e){
            echo $e->getMessage();
                exit;
        }


    }

    function DateToString($periode){
        $month = strtolower(substr($periode,0,strpos($periode, ' ')));
        $year = substr($periode,strpos($periode, ' '));
        //utk tahun 2016, 2015, 2014, 2013
        $arrmonth1 = array('januari' => '01', 
                            'februari' => '02',
                            'maret' => '03',
                            'april' => '04',
                            'mei' => '05',
                            'juni' => '06',
                            'juli' => '07',
                            'agustus' => '08',
                            'september' => '09',
                            'oktober' => '10',
                            'november' => '11',
                            'desember' => '12');

        // selain tahun 2016, 2015, 2014, 2013
        $arrmonth2 = array('january' => '01', 
                            'february' => '02',
                            'march' => '03',
                            'april' => '04',
                            'may' => '05',
                            'june' => '06',
                            'july' => '07',
                            'august' => '08',
                            'september' => '09',
                            'october' => '10',
                            'november' => '11',
                            'december' => '12');

        if((int)$year < 2017 && (int)$year > 2012){
            return $arrmonth1[$month];
        }else{
            return $arrmonth2[$month];
        }
        
    }

        
}

/* End of file t_laporan_skpd_pad_controller.php.php */
