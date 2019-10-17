 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_history_potensi_piutang_tgl_tap_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_history_potensi_piutang_tgl_tap_controller {

    function readData(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','p_settlement_type_id');
        $sord = getVarClean('sord','str','desc');

        $p_settlement_type_id = getVarClean('p_settlement_type_id','int',0);
        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);

        $start_date = getVarClean('start_date','str','');
        $end_date  = getVarClean('end_date','str','');

        $business_area = getVarClean('p_business_area_id', 'int', 0);
        $status_bayar = getVarClean('status_bayar', 'str', '');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_history_potensi_piutang_tgl_tap');
            $table = $ci->t_laporan_history_potensi_piutang_tgl_tap;

            $result = $table->getData($p_settlement_type_id, $p_vat_type_id, $start_date, $end_date, $business_area, $status_bayar);

            $jumlah =0;
            $jumlah_realisasi =0;
            $jumlah_sisa =0;
            $jumlah_debt_vat_amt =0;
            $jumlah_db_increasing_charge =0;
            $jumlah_db_interest_charge =0;
            
            $jumlah_total_penalty_amount =0;

            for ($i = 0; $i < count($result); $i++) {
                $temp = $result[$i]['total_vat_amount']+$result[$i]['total_penalty_amount'];
                if ($p_settlement_type_id == 6){
                    $temp_sisa = $result[$i]['debt_vat_amt'] + $result[$i]['db_increasing_charge'] - $result[$i]['payment_amount'];
                }else{
                    $temp_sisa = $temp - $result[$i]['payment_amount'];
                }

                if ($p_settlement_type_id == 6){
                    $result[$i]['debt_vat_amt'] = $result[$i]['debt_vat_amt']-$result[$i]['cr_payment'];
                }else{
                    if ($p_settlement_type_id != 4){
                        $result[$i]['debt_vat_amt'] = $result[$i]['total_vat_amount'];
                    }
                }

                $result[$i]['total'] = $result[$i]['debt_vat_amt']+$result[$i]['db_increasing_charge']+$result[$i]['db_interest_charge']+$result[$i]['total_penalty_amount'];
                if ($result[$i]['payment_date']=='') {
                    $result[$i]['status']='Belum Bayar';
                }else{
                    $result[$i]['status']='Sudah Bayar';
                }

                if ($p_settlement_type_id == 6){
                    $result[$i]['sisa'] = $result[$i]['debt_vat_amt'] + $result[$i]['db_increasing_charge'] - $result[$i]['payment_amount'];
                }else{
                    $result[$i]['sisa'] = $temp - $result[$i]['payment_amount'];
                }

                if ($result[$i]['p_account_status_id']==1) {
                    $result[$i]['last_satatus_date_short'] = '';
                }else{
                    $result[$i]['last_satatus_date_short']=$result[$i]['last_satatus_date_short'];
                }

                $jumlah = $jumlah + $temp;
                $jumlah_realisasi = $jumlah_realisasi + $result[$i]['payment_vat_amount'];
                $jumlah_sisa = $jumlah_sisa + $temp_sisa;

                $jumlah_debt_vat_amt =$jumlah_debt_vat_amt+$result[$i]['debt_vat_amt'];
                $jumlah_db_increasing_charge =$jumlah_db_increasing_charge+$result[$i]['db_increasing_charge'];
                $jumlah_db_interest_charge =$jumlah_db_interest_charge+$result[$i]['db_interest_charge'];
                $jumlah_total_penalty_amount =$jumlah_total_penalty_amount+$result[$i]['total_penalty_amount'];

                $result[$i]['nomor'] = $i+1; 

            }

            $count = count($result);

            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;


            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

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

    function readRekap(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','p_settlement_type_id');
        $sord = getVarClean('sord','str','desc');

        $p_settlement_type_id = getVarClean('p_settlement_type_id','int',0);
        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);
        $start_date = getVarClean('start_date','str','');
        $end_date  = getVarClean('end_date','str','');
        $status_bayar = getVarClean('status_bayar', 'str', '');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_history_potensi_piutang_tgl_tap');
            $table = $ci->t_laporan_history_potensi_piutang_tgl_tap;
            $date = $table->getDate($start_date, $end_date);

            $result = $table->getRekap($p_settlement_type_id, $p_vat_type_id, $start_date, $end_date, $status_bayar);

            $jumlah =0;
            $jumlah_realisasi =0;
            $jumlah_sisa =0;
            $count = count($date);
            
            
            

            for ($i = 0; $i < $count; $i++) {
                $jumlah +=$result[$i]['ketetapan'];

            }

            
            //  print_r($result);
            // exit();
            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;


            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

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
        $sidx = getVarClean('p_vat_type_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');
        $p_settlement_type_id = getVarClean('p_settlement_type_id','int',0);
        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);

        $start_date = getVarClean('start_date','str','');
        $end_date  = getVarClean('end_date','str','');

        $business_area = getVarClean('p_business_area_id', 'int', 0);
        $status_bayar = getVarClean('status_bayar', 'str', '');

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_history_potensi_piutang_tgl_tap');
            $table = $ci->t_laporan_history_potensi_piutang_tgl_tap;

            $result = $table->getData($p_settlement_type_id, $p_vat_type_id, $start_date, $end_date, $business_area, $status_bayar);

            startExcel(date("dmy") . '_LAPORAN_HISTORYTAP.xls');
            echo '<html>';
            echo '<head><title>LAPORAN HISTORY POTENSI PIUTANG TGL TAP</title></head>';
            echo '<body>';
            echo '<h2>LAPORAN HISTORY POTENSI PIUTANG<h2/>';
            echo '<h2>PERIODE PENETAPAN : '.$start_date.' s.d. '.$end_date.'</h2>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th rowspan=2>No</th>';
            echo '<th rowspan=2>Jenis Pajak</th>';
            echo '<th rowspan=2>Ayat Pajak</th>';
            echo '<th rowspan=2>Nama</th>';
            echo '<th rowspan=2>Merk Dagang</th>';
            echo '<th rowspan=2>NPWPD</th>';
            echo '<th rowspan=2>Alamat</th>';
            echo '<th rowspan=2>Masa Pajak</th>';
            echo '<th rowspan=2>TGL TAP</th>';
            echo '<th rowspan=2>No Bayar</th>';
            echo '<th rowspan=2>Pajak Terhutang</th>';
            echo '<th rowspan=2>Kenaikan 25%</th>';
            echo '<th rowspan=2>Kenaikan 2%</th>';
            echo '<th rowspan=2>Ketetapan Pajak Baru</th>';
            echo '<th rowspan=2>Denda</th>';
            echo '<th rowspan=2>Total Harus Dibayar</th>';
            if ($status_bayar!=3){
                echo '<th colspan=2 align="center" >STATUS BAYAR</th>';
            }
            echo '<th rowspan=2>Tanggal Bayar</th>';
            echo '<th rowspan=2>Sisa</th>';
            echo '<th rowspan=2>Tanggal Pengukuhan</th>';
            echo '<th rowspan=2>Tanggal Penutupan</th>';
            echo '<th rowspan=2>Wilayah</th>';
            echo '</tr>';

            if ($status_bayar!=3){
                echo '<tr>';
                echo '<th align="center" >SUDAH BAYAR</th>';
                echo '<th align="center" >BELUM BAYAR</th>';
                echo '</tr>';
            }else{
                echo '<tr></tr>';
            }
            
            $no = 0;
            $jumlahtemp = 0;    
            $total=0;

            $jumlah =0;
            $jumlah_realisasi =0;
            $jumlah_sisa =0;
            $jumlah_debt_vat_amt =0;
            $jumlah_db_increasing_charge =0;
            $jumlah_db_interest_charge =0;
            
            $jumlah_total_penalty_amount =0;
            $jumlah_belum_bayar = 0;
            $jumlah_sudah_bayar = 0;

            for ($i = 0; $i < count($result); $i++) {
                $temp = $result[$i]['total_vat_amount']+$result[$i]['total_penalty_amount'];
                if ($p_settlement_type_id == 6){
                    $temp_sisa = $result[$i]['debt_vat_amt'] + $result[$i]['db_increasing_charge'] - $result[$i]['payment_amount'];
                }else{
                    $temp_sisa = $temp - $result[$i]['payment_amount'];
                }

                

                if ($p_settlement_type_id == 6){
                    $result[$i]['debt_vat_amt'] = $result[$i]['debt_vat_amt']-$result[$i]['cr_payment'];
                }else{
                    if ($p_settlement_type_id != 4){
                        $result[$i]['debt_vat_amt'] = $result[$i]['total_vat_amount'];
                    }
                }

                $result[$i]['total'] = number_format($result[$i]['debt_vat_amt']+$result[$i]['db_increasing_charge']+$result[$i]['db_interest_charge']+$result[$i]['total_penalty_amount'], 2, ',', '.');
                if ($result[$i]['payment_date']=='') {
                    $result[$i]['status']='Belum Bayar';
                }else{
                    $result[$i]['status']='Sudah Bayar';
                }

                if ($p_settlement_type_id == 6){
                    $result[$i]['sisa'] = number_format($result[$i]['debt_vat_amt'] + $result[$i]['db_increasing_charge'] - $result[$i]['payment_amount'], 2, ',', '.');
                }else{
                    $result[$i]['sisa'] = number_format($temp - $result[$i]['payment_amount'], 2, ',', '.').'</td>';
                }

                if ($result[$i]['p_account_status_id']==1) {
                    $result[$i]['last_satatus_date_short'] = '';
                }else{
                    $result[$i]['last_satatus_date_short']=$result[$i]['last_satatus_date_short'];
                }

                $jumlah = $jumlah + $temp;
                $jumlah_realisasi = $jumlah_realisasi + $result[$i]['payment_vat_amount'];
                $jumlah_sisa = $jumlah_sisa + $temp_sisa;

                $jumlah_debt_vat_amt =$jumlah_debt_vat_amt+$result[$i]['debt_vat_amt'];
                $jumlah_db_increasing_charge =$jumlah_db_increasing_charge+$result[$i]['db_increasing_charge'];
                $jumlah_db_interest_charge =$jumlah_db_interest_charge+$result[$i]['db_interest_charge'];
                $jumlah_total_penalty_amount =$jumlah_total_penalty_amount+$result[$i]['total_penalty_amount'];


                echo '<tr>';
                echo '<td>' . ($i+1) . '</td>';
                echo '<td>' . $result[$i]['jenis_pajak'] . '</td>';
                echo '<td>' . $result[$i]['ayat_pajak'] . '</td>';
                echo '<td>' . $result[$i]['wp_name'] . '</td>';
                echo '<td>' . $result[$i]['company_brand'] . '</td>';
                echo '<td>' . $result[$i]['npwpd'] . '</td>';
                echo '<td>' . $result[$i]['brand_address'] . '</td>';
                echo '<td>' . $result[$i]['masa_pajak'] . '</td>';
                echo '<td>' . $result[$i]['tgl_tap'] . '</td>';
                echo '<td align="right">' . $result[$i]['payment_key2']  . '</td>';
                echo '<td>' . number_format($result[$i]['debt_vat_amt'], 2, ',', '.') . '</td>';
                echo '<td>' . number_format($result[$i]['db_increasing_charge'], 2, ',', '.') . '</td>';
                echo '<td>' . number_format($result[$i]['db_interest_charge'], 2, ',', '.') . '</td>';
                echo '<td>' . number_format($result[$i]['debt_vat_amt'], 2, ',', '.') . '</td>';
                echo '<td>' . number_format($result[$i]['total_penalty_amount'], 2, ',', '.') . '</td>';
                echo '<td>' . $result[$i]['total'] . '</td>';
                if ($status_bayar!=3){
                    if ($result[$i]['payment_date']=='') {
                        echo '<td align="right" >'.number_format(0, 2, ',', '.').'</td>';
                        echo '<td align="right" >'.number_format($result[$i]['debt_vat_amt']+$result[$i]['db_increasing_charge']+$result[$i]['db_interest_charge']+$result[$i]['total_penalty_amount'], 2, ',', '.').'</td>';
                        $jumlah_belum_bayar = $jumlah_belum_bayar + $result[$i]['debt_vat_amt']+$result[$i]['db_increasing_charge']+$result[$i]['db_interest_charge']+$result[$i]['total_penalty_amount'];
                    }else{
                        echo '<td align="right" >'.number_format($result[$i]['payment_amount'], 2, ',', '.').'</td>';
                        echo '<td align="right" >'.number_format(0, 2, ',', '.').'</td>';
                        $jumlah_sudah_bayar = $jumlah_sudah_bayar + $result[$i]['payment_amount'];
                    }
                }
                echo '<td>' . $result[$i]['payment_date']  . '</td>';
                echo '<td>' . $result[$i]['sisa'] . '</td>';
                echo '<td>' . $result[$i]['active_date_short'] . '</td>';
                echo '<td>' . $result[$i]['last_satatus_date_short'] . '</td>';
                echo '<td>' . $result[$i]['wilayah'] . '</td>';
                echo '</tr>';
            }


            echo '<tr>';
            echo '<td colspan=10 align="center">Jumlah</td>';
            echo '<td align="right">'.number_format($jumlah_debt_vat_amt, 2, ',', '.').'</td>';
            echo '<td align="right">'.number_format($jumlah_db_increasing_charge, 2, ',', '.').'</td>';
            echo '<td align="right">'.number_format($jumlah_db_interest_charge, 2, ',', '.').'</td>';
            echo '<td align="right">'.number_format($jumlah_debt_vat_amt+$jumlah_db_increasing_charge+$jumlah_db_interest_charge, 2, ',', '.').'</td>';
            echo '<td align="right">'.number_format($jumlah_total_penalty_amount, 2, ',', '.').'</td>';
            echo '<td align="right">'.number_format($jumlah_debt_vat_amt+$jumlah_db_increasing_charge+$jumlah_db_interest_charge+$jumlah_total_penalty_amount, 2, ',', '.').'</td>';
            if ($status_bayar!=3){
                echo '<td align="right">'.number_format($jumlah_sudah_bayar, 2, ',', '.').'</td>';
                echo '<td align="right">'.number_format($jumlah_belum_bayar, 2, ',', '.').'</td>';
            }
            echo '<td align="center"></td>';
            //echo '<td align="right">'.number_format($jumlah_realisasi, 2, ',', '.').'</td>';
            echo '<td align="right">'.number_format($jumlah_sisa, 2, ',', '.').'</td>';
            echo '</tr>';

            echo '</table><br><br>';
            echo '<table width="100%">';
            echo '<tr>
                        <td align="center" width="50%"></td>
                     </tr>
                     <tr>
                        <td align="center" width="50%"></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%">Mengetahui,</td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%"></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%">KEPALA BIDANG</td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%">KASI PENYELESAIAN PIUTANG</td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%">PAJAK PENDAFTARAN</td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%"></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%"></td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%"></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%"></td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%"></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%"></td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%"></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%">Drs, H. GUN GUN SUMARYANA</td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%">DIN KAMADIATINI S.IP.,MM</td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%">NIP. 19700806 199101 1001</td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%">NIP. 19710320 199803 2006</td>
                     </tr>
                     ';
            echo '</table>';
            echo '</body>';
            echo '</html>';
            exit;

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }


    }

    function excelRekap(){
        $sidx = getVarClean('p_vat_type_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');
        $p_settlement_type_id = getVarClean('p_settlement_type_id','int',0);
        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);

        $start_date = getVarClean('start_date','str','');
        $end_date  = getVarClean('end_date','str','');

        $status_bayar = getVarClean('status_bayar', 'str', '');

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_history_potensi_piutang_tgl_tap');
            $table = $ci->t_laporan_history_potensi_piutang_tgl_tap;

            $date = $table->getDate($start_date, $end_date);

            $result = $table->getRekap($p_settlement_type_id, $p_vat_type_id, $start_date, $end_date, $status_bayar);

            startExcel(date("dmy") . '_LAPORAN_HISTORYTAPREKAP.xls');
            echo '<table><tr><td colspan=6 align="center"><strong>LAPORAN PENERBITAN<strong/></td></tr>';
            echo '<tr><td colspan=6 align="center"><strong>TAHUN '.substr($start_date,0,4).'</strong></td></tr>';
            echo '<tr><td colspan=6 align="center"><strong>PERIODE '.$start_date.' SD '.$end_date.'</strong></td></tr>';
            echo '<tr><td colspan=6 align="center"></td></tr>';
            echo '<tr><td colspan=6 align="center"></td></tr></table>';

            echo'<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px" width="100%">
                        <tr >';

            echo '<th align="center" >NO</th>';
            echo '<th align="center" >BULAN PENERBITAN</th>';
            echo '<th align="center" >KETETAPAN</th>';
            echo '<th align="center" >REALISASI</th>';
            echo '<th align="center" >SISA</th>';
            echo '<th align="center" >KETERANGAN</th>';
            echo '</tr>';
    
            
            $no = 0;
            $jumlahtemp = 0;    
            $total=0;

            $jumlah =0;
            $jumlah_relisasi =0;

            $jumlah_sisa =0;

            for ($i = 0; $i < count($date); $i++) {
                echo '<tr ><td align="center" >'.($i+1).'</td>';
                echo '<td align="left" >'.$date[$i]['code'].'</td>';
                echo '<td align="right" >'.number_format($result[$i]['ketetapan'], 2, ',', '.').'</td>';
                echo '<td align="right" >'.number_format($result[$i]['realisasi'], 2, ',', '.').'</td>';
                echo '<td align="right" >'.number_format($result[$i]['ketetapan']-$result[$i]['realisasi'], 2, ',', '.').'</td>';
                echo '<td align="left" ></td>';
                echo '</tr>';
                $jumlah +=$result[$i]['ketetapan'];
                $jumlah_relisasi += $result[$i]['realisasi'];
                $jumlah_sisa += ($result[$i]['ketetapan']-$result[$i]['realisasi']);
            }


            echo '<tr><td align="center" colspan=2 >Jumlah</td>';
            echo '<td align="right">'.number_format($jumlah, 2, ',', '.').'</td>';
            echo '<td align="right">'.number_format($jumlah_relisasi, 2, ',', '.').'</td>';
            echo '<td align="right">'.number_format($jumlah_sisa, 2, ',', '.').'</td>';
            echo '<td align="center"></td>';
            echo '</tr>';

            echo '</table>';

            echo '<table width="100%">';
            echo '<tr>
                <td align="center" width="50%"></td>
             </tr>
             <tr>
                <td align="center" width="50%"></td>
             </tr>
             <tr>
                <td colspan=3></td>
                <td align="center" colspan=3 width="50%">KEPALA VERIFIKASI, OTORISASI DAN PEMBUKUAN</td>
             </tr>
             <tr>
                <td colspan=3></td>
                <td align="center" colspan=3 width="50%">BIDANG PAJAK PENDAFTARAN</td>
             </tr>
             <tr>
                <td colspan=3></td>
                <td align="center" colspan=3 width="50%"></td>
             </tr>
             <tr>
                <td colspan=3></td>
                <td align="center" colspan=3 width="50%"></td>
             </tr>
             <tr>
                <td colspan=3></td>
                <td align="center" colspan=3 width="50%"></td>
             </tr>
             <tr>
                <td colspan=3></td>
                <td align="center" colspan=3 width="50%">Drs. H. DEDEN SAEPULLOH, MM</td>
             </tr>
             <tr>
                <td colspan=3></td>
                <td align="center" colspan=3 width="50%">NIP. 19681210 199010 1001</td>
             </tr>
             ';
            echo '</table>';
            echo '</body>';
            echo '</html>';
            exit;

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }


    }

    function readKetetapan(){
        

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',5);

        $sort = getVarClean('sort','str','p_vat_type_id');
        $dir  = getVarClean('dir','str','asc');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_history_potensi_piutang_tgl_tap');
            $table = $ci->t_laporan_history_potensi_piutang_tgl_tap;

            $start = ($start-1) * $limit;
            $items = $table->getOptKetetapan();
            $totalcount = count($items);

            $data['rows'] = $items;
            $data['success'] = true;
            $data['total'] = $totalcount;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;       
    }
}

/* End of file Groups_controller.php */