 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_denda_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_denda_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('p_vat_type_dtl_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');
        $tgl_penerimaan = getVarClean('tgl_penerimaan','str','');
        $i_flag_setoran = getVarClean('i_flag_setoran','int',0);
        $kode_bank = getVarClean('kode_bank','str','');
        $status = getVarClean('status','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_denda');
            $table = $ci->t_laporan_denda;
             
            $result = $table->getBpps2($sidx, $tgl_penerimaan, $i_flag_setoran, $kode_bank, $status);


            
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

    function readData(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','p_settlement_type_id');
        $sord = getVarClean('sord','str','desc');

        $p_vat_type_dtl_id = getVarClean('p_vat_type_dtl_id','int',0);
        $start_date = getVarClean('start_date','str','');
        $end_date  = getVarClean('end_date','str','');
        $status_bayar = getVarClean('status_bayar', 'str', '');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_denda');
            $table = $ci->t_laporan_denda;

            $result = $table->getData($p_vat_type_dtl_id, $start_date, $end_date, $status_bayar);

            $jumlah =0;
            $jumlah_realisasi =0;
            $jumlah_sisa =0;
            $jumlah_debt_vat_amt =0;
            $jumlah_db_increasing_charge =0;
            $jumlah_db_interest_charge =0;
            
            $jumlah_total_penalty_amount =0;

            for ($i = 0; $i < count($result); $i++) {
                $temp = $result[$i]['total_penalty_amount'];
                $temp_sisa = $temp - $result[$i]['payment_amount'];
                $jumlah = $jumlah + $temp;
                $jumlah_realisasi = $jumlah_realisasi + $result[$i]['payment_amount'];
                $jumlah_sisa = $jumlah_sisa + $temp_sisa;
                
                if ($result[$i]['payment_date']=='') {
                    $result[$i]['status']='Belum Bayar';
                }else{
                    $result[$i]['status']='Sudah Bayar';
                }
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

        $p_vat_type_dtl_id = getVarClean('p_vat_type_dtl_id','int',0);
        $start_date = getVarClean('start_date','str','');
        $end_date  = getVarClean('end_date','str','');
        $status_bayar = getVarClean('status_bayar', 'str', '');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_denda');
            $table = $ci->t_laporan_denda;
            $date = $table->getDate($start_date, $end_date);

            $result = $table->getRekap($p_vat_type_dtl_id, $start_date, $end_date, $status_bayar, $date);

            $jumlah =0;
            $count = count($date);
            
            // print_r($result);
            // exit();
            

            for ($i = 0; $i < $count; $i++) {
                $jumlah +=$result[$i]['denda'];
                $result[$i]['code'] = $date[$i]['code'];
                $result[$i]['nomor'] = $i+1; 
            }

            

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
        $sidx = getVarClean('p_vat_type_dtl_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');
        $p_vat_type_dtl_id = getVarClean('p_vat_type_dtl_id','int',0);

        $start_date = getVarClean('start_date','str','');
        $end_date  = getVarClean('end_date','str','');
        $status_bayar = getVarClean('status_bayar', 'str', '');

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_denda');
            $table = $ci->t_laporan_denda;

            $result = $table->getData($p_vat_type_dtl_id, $start_date, $end_date, $status_bayar);

            startExcel(date("dmy") . '_LAPORAN_DENDA.xls');
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

    function excelRekap(){
        $sidx = getVarClean('p_vat_type_dtl_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');
        $p_vat_type_dtl_id = getVarClean('p_vat_type_dtl_id','int',0);

        $start_date = getVarClean('start_date','str','');
        $end_date  = getVarClean('end_date','str','');

        $status_bayar = getVarClean('status_bayar', 'str', '');

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_denda');
            $table = $ci->t_laporan_denda;

            $date = $table->getDate($start_date, $end_date);

            $result = $table->getRekap($p_vat_type_dtl_id, $start_date, $end_date, $status_bayar,$date);

            startExcel(date("dmy") . '_LAPORAN_DENDA_REKAP.xls');
            echo '<table><tr><td colspan=6 align="center"><strong>LAPORAN REKAP DENDA<strong/></td></tr>';
            echo '<tr><td colspan=6 align="center"><strong>TAHUN '.substr($start_date,0,4).'</strong></td></tr>';
            echo '<tr><td colspan=6 align="center"><strong>PERIODE PENETAPAN'.$start_date.' SD '.$end_date.'</strong></td></tr>';
            echo '<tr><td colspan=6 align="center"></td></tr>';
            echo '<tr><td colspan=6 align="center"></td></tr></table>';

            echo'<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px" width="100%">
                        <tr >';

            echo '<th align="center" >NO</th>';
            echo '<th align="center" >BULAN PENERBITAN</th>';
            echo '<th align="center" >DENDA</th>';
            echo '<th align="center" >KETERANGAN</th>';
            echo '</tr>';
    
            
            $no = 0;
            $jumlahtemp = 0;    
            $total=0;

            $jumlah =0;

            for ($i = 0; $i < count($date); $i++) {
                echo '<tr ><td align="center" >'.($i+1).'</td>';
                echo '<td align="left" >'.$date[$i]['code'].'</td>';
                echo '<td align="right" >'.number_format($result[$i]['denda'], 2, ',', '.').'</td>';
                echo '<td align="left" ></td>';
                echo '</tr>';
                $jumlah +=$result[$i]['denda'];
            }


            echo '<tr><td align="center" colspan=2 >Jumlah</td>';
            echo '<td align="right">'.number_format($jumlah, 2, ',', '.').'</td>';
            echo '<td align="center"></td>';
            echo '</tr>';

            echo '</table>';
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