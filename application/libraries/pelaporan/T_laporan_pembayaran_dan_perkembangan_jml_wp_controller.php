 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_laporan_pembayaran_dan_perkembangan_jml_wp_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_pembayaran_dan_perkembangan_jml_wp_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('p_vat_type_dtl_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');
        $flag = getVarClean('flag','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_pembayaran_dan_perkembangan_jml_wp');
            $table = $ci->t_laporan_pembayaran_dan_perkembangan_jml_wp;
             
            $result = $table->getData($flag);

            if ($flag == 2){
                for($i=0; $i<count($result); $i++){
                    $result[$i]['jml_wp'] = $result[$i]['o_jml_wp_npwpd_jabatan'] + $result[$i]['o_jml_wp_non_npwpd_jabatan'];
                    $result[$i]['jml_payment'] = $result[$i]['o_realisasi_npwpd_jabatan'] + $result[$i]['o_realisasi_non_npwpd_jabatan'];
                }
            }

            if ($flag == 3){
                for($i=0; $i<count($result); $i++){
                    $result[$i]['presentase'] = $result[$i]['o_jml_wp_blum_bayar']/$result[$i]['o_jml_wp_seluruhnya']*100;
                }
            }


            
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

    function excel(){

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_pembayaran_dan_perkembangan_jml_wp');
            $table = $ci->t_laporan_pembayaran_dan_perkembangan_jml_wp;

            $data = $table->getData(1);

            startExcel(date("dmy") . 'pembayaran_dan_perkembangan_jumlah_wp.xls');
            echo '<html>';
            echo '<head><title>LAPORAN PERKEMBANGAN</title></head>';
            echo '<body>';
            echo  '<table border=0 class="Grid">'; 
            echo  '<tr border=0><th colspan = 14 align="center">PERKEMBANGAN JUMLAH WAJIB PAJAK</th></tr>';    
            echo  '<tr border=0><th colspan = 14 align="center">HOTEL, RESTORAN, HIBURAN DAN PARKIR</th></tr>';
            echo  '<tr border=0><th colspan = 14 align="center"></th></tr>';
            echo  '</table>';
            
            echo '<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px" width="100%">
                        <tr >';
            
            echo '<th align="center" rowspan=2>NO</th>';
            echo '<th align="center" rowspan=2>JENIS PAJAK</th>';
            echo '<th align="center" colspan=3>PER 31-12-'.(date("Y")-1).'</th>';
            echo '<th align="center" colspan=3>DAFTAR 01-01-'.date("Y").' s.d. '.date("d-m-Y").'</th>';
            echo '<th align="center" colspan=3>NON AKTIF 01-01-'.date("Y").' s.d. '.date("d-m-Y").'</th>';
            echo '<th align="center" colspan=3>PER '.date("d-m-Y").'</th></tr>';

            echo '<tr><th align="center">NPWPD</th>';
            echo '<th align="center">NPWPD JABATAN</th>';
            echo '<th align="center">JUMLAH</th>';
            echo '<th align="center">NPWPD</th>';
            echo '<th align="center">NPWPD JABATAN</th>';
            echo '<th align="center">JUMLAH</th>';
            echo '<th align="center">NPWPD</th>';
            echo '<th align="center">NPWPD JABATAN</th>';
            echo '<th align="center">JUMLAH</th>';
            echo '<th align="center">NPWPD</th>';
            echo '<th align="center">NPWPD JABATAN</th>';
            echo '<th align="center">JUMLAH</th></tr>';

            $total_o_jml_wp_daftar_akhir_tahun_kemarin = 0;
            $total_o_jml_wp_jabatan_akhir_tahun_kemarin= 0;
            $total_o_jml_wp_total_akhir_tahun_kemarin= 0;
            $total_o_jml_wp_daftar_awal_tahun_hingga_sekarang= 0;
            $total_o_jml_wp_jabatan_awal_tahun_hingga_sekarang= 0;
            $total_o_jml_wp_total_awal_tahun_hingga_sekarang= 0;
            $total_o_jml_wp_daftar_non_aktif_awal_tahun_hingga_sekarang= 0;
            $total_o_jml_wp_jabatan_non_aktif_awal_tahun_hingga_sekarang= 0;
            $total_o_jml_wp_total_non_aktif_awal_tahun_hingga_sekarang= 0;
            $total_o_jml_wp_daftar_hingga_sekarang= 0;
            $total_o_jml_wp_jabatan_hingga_sekarang= 0;
            $total_o_jml_wp_total_hingga_sekarang= 0;

            for ($i = 0; $i < count($data); $i++) {
                echo '<tr>';
                if($data[$i]['kategori']=='jenis'){
                    echo '<td align="center" >'.$data[$i]['p_vat_type_id'].'</th>';
                }else{
                    echo '<td align="center" ></th>';
                }
                echo '<td align="left" >'.$data[$i]['vat_code'].'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_daftar_akhir_tahun_kemarin'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_jabatan_akhir_tahun_kemarin'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_total_akhir_tahun_kemarin'], 0, ',', '.').'</th>';

                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_daftar_awal_tahun_hingga_sekarang'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_jabatan_awal_tahun_hingga_sekarang'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_total_awal_tahun_hingga_sekarang'], 0, ',', '.').'</th>';

                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_daftar_non_aktif_awal_tahun_hingga_sekarang'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_jabatan_non_aktif_awal_tahun_hingga_sekarang'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_total_non_aktif_awal_tahun_hingga_sekarang'], 0, ',', '.').'</th>';

                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_daftar_hingga_sekarang'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_jabatan_hingga_sekarang'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_total_hingga_sekarang'], 0, ',', '.').'</th></tr>';
                
                if($data[$i]['kategori']=='jenis'){
                    $total_o_jml_wp_daftar_akhir_tahun_kemarin += $data[$i]['o_jml_wp_daftar_akhir_tahun_kemarin'];
                    $total_o_jml_wp_jabatan_akhir_tahun_kemarin += $data[$i]['o_jml_wp_jabatan_akhir_tahun_kemarin'];
                    $total_o_jml_wp_total_akhir_tahun_kemarin+= $data[$i]['o_jml_wp_total_akhir_tahun_kemarin'];

                    $total_o_jml_wp_daftar_awal_tahun_hingga_sekarang+= $data[$i]['o_jml_wp_daftar_awal_tahun_hingga_sekarang'];
                    $total_o_jml_wp_jabatan_awal_tahun_hingga_sekarang+= $data[$i]['o_jml_wp_jabatan_awal_tahun_hingga_sekarang'];
                    $total_o_jml_wp_total_awal_tahun_hingga_sekarang+= $data[$i]['o_jml_wp_total_awal_tahun_hingga_sekarang'];

                    $total_o_jml_wp_daftar_non_aktif_awal_tahun_hingga_sekarang+= $data[$i]['o_jml_wp_daftar_non_aktif_awal_tahun_hingga_sekarang'];
                    $total_o_jml_wp_jabatan_non_aktif_awal_tahun_hingga_sekarang+= $data[$i]['o_jml_wp_jabatan_non_aktif_awal_tahun_hingga_sekarang'];
                    $total_o_jml_wp_total_non_aktif_awal_tahun_hingga_sekarang+= $data[$i]['o_jml_wp_total_non_aktif_awal_tahun_hingga_sekarang'];

                    $total_o_jml_wp_daftar_hingga_sekarang+= $data[$i]['o_jml_wp_daftar_hingga_sekarang'];
                    $total_o_jml_wp_jabatan_hingga_sekarang+= $data[$i]['o_jml_wp_jabatan_hingga_sekarang'];
                    $total_o_jml_wp_total_hingga_sekarang+= $data[$i]['o_jml_wp_total_hingga_sekarang'];
                }
            }
            echo '<td align="center" colspan=2>JUMLAH</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_daftar_akhir_tahun_kemarin, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_jabatan_akhir_tahun_kemarin, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_total_akhir_tahun_kemarin, 0, ',', '.').'</th>';
                                                      
            echo '<td align="right" >'.number_format($total_o_jml_wp_daftar_awal_tahun_hingga_sekarang, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_jabatan_awal_tahun_hingga_sekarang, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_total_awal_tahun_hingga_sekarang, 0, ',', '.').'</th>';
                                                      
            echo '<td align="right" >'.number_format($total_o_jml_wp_daftar_non_aktif_awal_tahun_hingga_sekarang, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_jabatan_non_aktif_awal_tahun_hingga_sekarang, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_total_non_aktif_awal_tahun_hingga_sekarang, 0, ',', '.').'</th>';
                                                      
            echo '<td align="right" >'.number_format($total_o_jml_wp_daftar_hingga_sekarang, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_jabatan_hingga_sekarang, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_total_hingga_sekarang, 0, ',', '.').'</th></tr></table>';

            echo '</br></br>';

            $data = $table->getData(2);

            echo '<table border=0 class="Grid">'; 
            echo '<tr border=0><th colspan = 8 align="center"></th></tr>';
            echo '<tr border=0><th colspan = 8 align="center"></th></tr>';
            echo '<tr border=0><th colspan = 8 align="center">RINCIAN PEMBAYARAN WAJIB PAJAK BARU PENGUKUHAN TAHUN '.date("Y").'</th></tr>';  
            echo '<tr border=0><th colspan = 8 align="center"></th></tr>';
            echo '</table>';
            
            echo '<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px" width="100%">
                        <tr >';

            echo '<th align="center" rowspan=2>NO</th>';
            echo '<th align="center" rowspan=2>JENIS PAJAK</th>';
            echo '<th align="center" colspan=2>MENDAFTAR SENDIRI</th>';
            echo '<th align="center" colspan=2>NPWPD JABATAN</th>';
            echo '<th align="center" colspan=2>JUMLAH</th></tr>';

            echo '<tr><th align="center">JUMLAH WP</th>';
            echo '<th align="center">PEMBAYRAN</th>';
            echo '<th align="center">JUMLAH WP</th>';
            echo '<th align="center">PEMBAYRAN</th>';
            echo '<th align="center">JUMLAH WP</th>';
            echo '<th align="center">PEMBAYARAN</th></tr>';


            $total_o_realisasi_non_npwpd_jabatan = 0;
            $total_o_jml_wp_non_npwpd_jabatan= 0;
            $total_o_realisasi_npwpd_jabatan= 0;
            $total_o_jml_wp_npwpd_jabatan= 0;

            for ($i = 0; $i < count($data); $i++) {
                echo '<tr>';
                if($data[$i]['kategori']=='jenis'){
                    echo '<td align="center" >'.$data[$i]['p_vat_type_id'].'</th>';
                }else{
                    echo '<td align="center" ></th>';
                }
                echo '<td align="left" >'.$data[$i]['vat_code'].'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_non_npwpd_jabatan'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_realisasi_non_npwpd_jabatan'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_npwpd_jabatan'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_realisasi_npwpd_jabatan'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_npwpd_jabatan']+$data[$i]['o_jml_wp_non_npwpd_jabatan'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_realisasi_npwpd_jabatan']+$data[$i]['o_realisasi_non_npwpd_jabatan'], 0, ',', '.').'</th></tr>';
                
                if($data[$i]['kategori']=='jenis'){
                    $total_o_realisasi_non_npwpd_jabatan += $data[$i]['o_realisasi_non_npwpd_jabatan'];
                    $total_o_jml_wp_non_npwpd_jabatan += $data[$i]['o_jml_wp_non_npwpd_jabatan'];
                    $total_o_realisasi_npwpd_jabatan+= $data[$i]['o_realisasi_npwpd_jabatan'];
                    $total_o_jml_wp_npwpd_jabatan+= $data[$i]['o_jml_wp_npwpd_jabatan'];
                }
            }
            echo '<td align="center" colspan=2>JUMLAH</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_non_npwpd_jabatan, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_realisasi_non_npwpd_jabatan, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_npwpd_jabatan, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_realisasi_npwpd_jabatan, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_npwpd_jabatan+$total_o_jml_wp_non_npwpd_jabatan, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_realisasi_npwpd_jabatan+$total_o_realisasi_non_npwpd_jabatan, 0, ',', '.').'</th></tr></table>';

            echo '</br></br>';

            $data = $table->getData(3);

            echo  '<table border=0 class="Grid">'; 
            echo  '<tr border=0><th colspan = 5 align="center"></th></tr>';
            echo  '<tr border=0><th colspan = 5 align="center"></th></tr>';
            echo  '<tr border=0><th colspan = 5 align="center">RINCIAN JUMLAH WAJIB PAJAK BARU PENGUKUHAN TAHUN '.date("Y").' YANG BELUM BAYAR</th></tr>'; 
            echo  '<tr border=0><th colspan = 5 align="center"></th></tr>';
            echo  '</table>';
            
            echo '<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px" width="100%">
                        <tr >';

            echo '<th align="center" >NO</th>';
            echo '<th align="center" >JENIS PAJAK</th>';
            echo '<th align="center" >YANG BELUM BAYAR</th>';
            echo '<th align="center" >SELURUHNYA</th>';
            echo '<th align="center" >PERSENTASE</th></tr>';

            $total_o_jml_wp_blum_bayar = 0;
            $total_o_jml_wp_seluruhnya= 0;

            for ($i = 0; $i < count($data); $i++) {
                echo '<tr>';
                if($data[$i]['kategori']=='jenis'){
                    echo '<td align="center" >'.$data[$i]['p_vat_type_id'].'</th>';
                }else{
                    echo '<td align="center" ></th>';
                }
                echo '<td align="left" >'.$data[$i]['vat_code'].'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_blum_bayar'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_seluruhnya'], 0, ',', '.').'</th>';
                echo '<td align="right" >'.number_format($data[$i]['o_jml_wp_blum_bayar']/$data[$i]['o_jml_wp_seluruhnya']*100, 2, ',', '.').' %</th></tr>';
                
                if($data[$i]['kategori']=='jenis'){
                    $total_o_jml_wp_blum_bayar += $data[$i]['o_jml_wp_blum_bayar'];
                    $total_o_jml_wp_seluruhnya += $data[$i]['o_jml_wp_seluruhnya'];
                }
            }
            echo '<td align="center" colspan=2>JUMLAH</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_blum_bayar, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_seluruhnya, 0, ',', '.').'</th>';
            echo '<td align="right" >'.number_format($total_o_jml_wp_blum_bayar/$total_o_jml_wp_seluruhnya*100, 2, ',', '.').' %</th></tr></table>';
    
            echo '</body>';
            echo '</html>';
            exit;

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }


    }
}

/* End of file Groups_controller.php */