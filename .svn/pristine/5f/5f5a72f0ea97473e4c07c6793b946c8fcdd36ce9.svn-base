<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_laporan_perkembangan_jumlah_wp_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_perkembangan_jumlah_wp_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);        
        $npwpd_jabatan = getVarClean('npwpd_jabatan','str','');
        $p_finance_period_id = getVarClean('p_finance_period_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        if(!empty($p_finance_period_id)){
            try {

                $ci = & get_instance();
                $ci->load->model('pelaporan/t_laporan_perkembangan_jumlah_wp');
                $table = $ci->t_laporan_perkembangan_jumlah_wp;
                 
                $result = $table->getDataWp($npwpd_jabatan, $p_finance_period_id);

                for($i=0;$i<count($result);$i++){
                    $result[$i]['jumlah_aktif_sd_bulan_ini'] = $result[$i]['jumlah_aktif_sd_bulan_ini'] - $result[$i]['jumlah_non_aktif_bulan_ini'];

                }

                //print_r($result);exit();


                
                //$table->setJQGridParam($req_param);
                $count = count($result);
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



        
    }

    function excel(){
        $npwpd_jabatan = getVarClean('npwpd_jabatan','str','');
        $p_finance_period_id = getVarClean('p_finance_period_id','int',0);

        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_perkembangan_jumlah_wp');
            $table = $ci->t_laporan_perkembangan_jumlah_wp;
             
            $result = $table->getDataWp($npwpd_jabatan, $p_finance_period_id);
            //print_r($result);exit();

            startExcel("laporan_perkembangan_jumlah_wajib_pajak.xls");
            echo '<html>';
            echo '<head><title>Laporan Perkembangan Jumlah Wajib Pajak</title></head>';
            echo '<body>';
            echo '<h2 style="color:black;" align="center">LAPORAN PERKEMBANGAN JUMLAH WAJIB PAJAK</h2>';
            echo '<h2 style="color:black;" align="center">HOTEL, RESTORAN, HIBURAN, PARKIR DAN PAJAK PENERANGAN JALAN</h2>';
            echo '<br>';
            //$tanggal = CCGetFromGet('date_end_laporan','31-12-2014');
            echo '<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px" width="100%">
                        <tr >';

            echo '<th align="center" rowspan=2 >NO</th>';
            echo '<th align="center" rowspan=2 >URAIAN JENIS PAJAK</th>';
            echo '<th align="center" colspan=2 >JUMLAH S.D. BULAN LALU</th>';
            echo '<th align="center" colspan=2 >PEMUTAKHIRAN DATA BULAN INI</th>';
            echo '<th align="center" colspan=2 >JUMLAH S.D. BULAN INI</th>';
            echo '<th align="center" rowspan=2 >KETERANGAN</th>';
            echo '</tr>';
            echo '<tr>';
            echo '<th align="center" >AKTIF</th>';
            echo '<th align="center" >NON AKTIF</th>';
            echo '<th align="center" >PENERBITAN NPWPD</th>';
            echo '<th align="center" >PERUBAHAN STATUS NON AKTIF</th>';
            echo '<th align="center" >AKTIF</th>';
            echo '<th align="center" >NON AKTIF</th>';
            echo '</tr>';

            $j = 0;
            $total_aktif_sd_bulan_lalu = 0;
            $total_non_aktif_sd_bulan_lalu = 0;
            $total_aktif_bulan_ini = 0;
            $total_non_aktif_bulan_ini = 0;
            $total_aktif_sd_bulan_ini = 0;
            $total_non_aktif_sd_bulan_ini = 0;
            //$jenis = $result[$i]['jenis_pajak'];
            if($result == 'no result'){
                for ($i = 0; $i < count($result); $i++) {
                    if($i == 0){
                        echo '<tr><td align="center" ><b>'.($j+1).'</b></td>';
                        echo '<td align="left" ><b>'.$result[$i]['jenis_pajak'].'</b></td>';
                        
                        $j++;
                    }else{
                        if($result[$i]['jenis_pajak'] != $result[$i-1]['jenis_pajak']){
                            echo '<tr><td align="center" ><b>'.($j+1).'</b></td>';
                            echo '<td align="left" ><b>'.$result[$i]['jenis_pajak'].'</b></td>';
                            $j++;
                        }

                    }
                    if($result[$i]['jenis_pajak'] == 'PAJAK PARKIR' || $result[$i]['jenis_pajak'] == 'PAJAK PPJ'){
                        echo '<td align="right" >'.$result[$i]['jumlah_aktif_sd_bulan_lalu'].'</td>';
                        echo '<td align="right" >'.$result[$i]['jumlah_non_aktif_sd_bulan_lalu'].'</td>';
                        echo '<td align="right" >'.$result[$i]['jumlah_aktif_bulan_ini'].'</td>';
                        echo '<td align="right" >'.$result[$i]['jumlah_non_aktif_bulan_ini'].'</td>';
                        echo '<td align="right" >'.$result[$i]['jumlah_aktif_sd_bulan_ini'].'</td>';
                        echo '<td align="right" >'.$result[$i]['jumlah_non_aktif_sd_bulan_ini'].'</td>';
                        echo '<td align="left" ></td>';
                    }
                    echo '</tr>';
     
                    if($result[$i]['jenis_pajak'] != 'PAJAK PARKIR' && $result[$i]['jenis_pajak'] != 'PAJAK PPJ'){
                        echo '<tr><td align="center" ></td>';
                        echo '<td align="left" >- '.$result[$i]['ayat_pajak_2'].'</td>';
                        echo '<td align="right" >'.$result[$i]['jumlah_aktif_sd_bulan_lalu'].'</td>';
                        echo '<td align="right" >'.$result[$i]['jumlah_non_aktif_sd_bulan_lalu'].'</td>';
                        echo '<td align="right" >'.$result[$i]['jumlah_aktif_bulan_ini'].'</td>';
                        echo '<td align="right" >'.$result[$i]['jumlah_non_aktif_bulan_ini'].'</td>';
                        echo '<td align="right" >'.$result[$i]['jumlah_aktif_sd_bulan_ini'].'</td>';
                        echo '<td align="right" >'.$result[$i]['jumlah_non_aktif_sd_bulan_ini'].'</td>';
                        echo '<td align="left" ></td>';
                        echo '</tr>';
                    }
                    $total_aktif_sd_bulan_lalu = $total_aktif_sd_bulan_lalu + $result[$i]['jumlah_aktif_sd_bulan_lalu'];
                    $total_non_aktif_sd_bulan_lalu = $total_non_aktif_sd_bulan_lalu + $result[$i]['jumlah_non_aktif_sd_bulan_lalu'];
                    $total_aktif_bulan_ini = $total_aktif_bulan_ini + $result[$i]['jumlah_aktif_bulan_ini'];
                    $total_non_aktif_bulan_ini = $total_non_aktif_bulan_ini + $result[$i]['jumlah_non_aktif_bulan_ini'];
                    $total_aktif_sd_bulan_ini = $total_aktif_sd_bulan_ini + $result[$i]['jumlah_aktif_sd_bulan_ini'];
                    $total_non_aktif_sd_bulan_ini = $total_non_aktif_sd_bulan_ini + $result[$i]['jumlah_non_aktif_sd_bulan_ini'];
                }
            }
            echo '<tr><td align="center" ></td>';
            echo '<td align="left" ><b>JUMLAH</b></td>';
            echo '<td align="right" >'.$total_aktif_sd_bulan_lalu.'</td>';
            echo '<td align="right" >'.$total_non_aktif_sd_bulan_lalu.'</td>';
            echo '<td align="right" >'.$total_aktif_bulan_ini.'</td>';
            echo '<td align="right" >'.$total_non_aktif_bulan_ini.'</td>';
            echo '<td align="right" >'.$total_aktif_sd_bulan_ini.'</td>';
            echo '<td align="right" >'.$total_non_aktif_sd_bulan_ini.'</td>';
            echo '<td align="left" ></td>';
            echo '</tr>';

            echo '</table>';
            exit();

            
        } catch (Exception $e) {
            
        }
        

    }
}

/* End of file T_laporan_perkembangan_jumlah_wp_controller.php */