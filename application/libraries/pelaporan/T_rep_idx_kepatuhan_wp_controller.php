 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_rep_idx_kepatuhan_wp_controller
* @version 07/05/2015 12:18:00
*/
class T_rep_idx_kepatuhan_wp_controller {

    function readData(){
        $p_finance_period_id = getVarClean('p_finance_period_id','int',0);
        $jenis_pajak = getVarClean('jenis_pajak','str','');
        $tipe_patuh  = getVarClean('tipe_patuh','str','');
        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        try {
            $ci = &get_instance();
            $ci->load->model('pelaporan/t_rep_idx_kepatuhan_wp');
            $table = $ci->t_rep_idx_kepatuhan_wp;

            $jumlah_total = $table->getGrandTotal($p_finance_period_id);
        
            $total_patuh = $table->getTotalPerJenis('NULL',$p_finance_period_id,1);
            $total_kurang_patuh = $table->getTotalPerJenis('NULL',$p_finance_period_id,2);
            $total_tidak_patuh = $table->getTotalPerJenis('NULL',$p_finance_period_id,3);

            $prosentase_patuh = (int)$total_patuh / (int)$jumlah_total * 100;
            $prosentase_kurang_patuh = (int)$total_kurang_patuh / (int)$jumlah_total * 100;
            $prosentase_tidak_patuh = (int)$total_tidak_patuh / (int)$jumlah_total * 100;
            $total = array('total_patuh' => $total_patuh,
                            'total_kurang_patuh' => $total_kurang_patuh,
                            'total_tidak_patuh' => $total_tidak_patuh);

            $prosentase = array('prosentase_patuh' => $prosentase_patuh,
                                'prosentase_kurang_patuh' => $prosentase_kurang_patuh,
                                'prosentase_tidak_patuh' => $prosentase_tidak_patuh);

            $result = array('jumlah_total' => $jumlah_total,
                            'total' => $total,
                            'prosentase' => $prosentase
                            );
            print_r($result);
            exit();
            $data['rows'] = $result;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

    }
    

    function excel(){
        $sidx = getVarClean('p_vat_type_dtl_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');
        $p_vat_type_dtl_id = getVarClean('p_vat_type_dtl_id','int',0);

        $start_date = getVarClean('start_date','str','');
        $end_date  = getVarClean('end_date','str','');
        $status_bayar = getVarClean('status_bayar', 'str', '');

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_rep_idx_kepatuhan_wp');
            $table = $ci->t_rep_idx_kepatuhan_wp;

            $result = $table->getData($p_vat_type_dtl_id, $start_date, $end_date, $status_bayar);

            startExcel(date("dmy") . '_rep_idx_kepatuhan_wp.xls');
            echo '<html>';
            echo '<head><title>LAPORAN DENDA</title></head>';
            echo '<body>';
            echo '<h2>LAPORAN DENDA<h2/>';
            echo '<h2>PERIODE PENETAPAN : '.$start_date.' s.d. '.$end_date.'</h2>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th align="center">No</th>';
            echo '<th align="center">Jenis Pajak</th>';
            echo '<th align="center">Ayat Pajak</th>';
            echo '<th align="center">Nama</th>';
            echo '<th align="center">Merk Dagang</th>';
            echo '<th align="center">NPWPD</th>';
            echo '<th align="center">Masa Pajak</th>';
            echo '<th align="center">TGL TAP</th>';
            echo '<th align="center">Denda</th>';
            echo '<th align="center">STATUS BAYAR</th>';            
            echo '<th align="center">Tanggal Bayar</th>';
            echo '</tr>';
            
            $no = 0;
            $jumlahtemp = 0;    
            $total=0;

            $jumlah =0;
            $jumlah_realisasi =0;
            $jumlah_sisa =0;

            for ($i = 0; $i < count($result); $i++) {
                $temp = $result[$i]['total_penalty_amount'];
                $temp_sisa = $temp - $result[$i]['payment_amount'];
                $jumlah = $jumlah + $temp;
                $jumlah_realisasi = $jumlah_realisasi + $result[$i]['payment_amount'];
                $jumlah_sisa = $jumlah_sisa + $temp_sisa;
                echo '<tr><td align="center" >'.($i+1).'</td>';
                echo '<td align="left" >'.$result[$i]['jenis_pajak'].'</td>';
                echo '<td align="left" >'.$result[$i]['ayat_pajak'].'</td>';
                echo '<td align="left" >'.$result[$i]['wp_name'].'</td>';
                echo '<td align="left" >'.$result[$i]['company_brand'].'</td>';
                echo '<td align="left" >'.$result[$i]['npwpd'].'</td>';
                echo '<td align="left" >'.$result[$i]['masa_pajak'].'</td>';
                echo '<td align="left" >'.$result[$i]['tgl_tap'].'</td>';
                echo '<td align="right" >'.number_format($temp, 2, ',', '.').'</td>';
                
                if ($result[$i]['payment_date']=='') {
                    echo '<td align="left" >Belum Bayar</td>';
                }else{
                    echo '<td align="left" >Sudah Bayar</td>';
                }
                echo '<td align="left" >'.$result[$i]['payment_date'].'</td>';
                echo '</tr>';
            }


            echo '<tr><td align="center" colspan=8 >Jumlah</td>';
            echo '<td align="right">'.number_format($jumlah, 2, ',', '.').'</td>';
            echo '</tr>';

            echo '</table></br></br>';
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