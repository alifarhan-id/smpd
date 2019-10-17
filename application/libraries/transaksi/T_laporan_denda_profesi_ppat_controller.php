 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_denda_profesi_ppat_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_denda_profesi_ppat_controller {

    function readData(){
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','p_settlement_type_id');
        $sord = getVarClean('sord','str','desc');

        $p_finance_period_id = getVarClean('p_finance_period_id','int',0);
        $status_bayar = getVarClean('status_bayar', 'str', '');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_laporan_denda_profesi_ppat');
            $table = $ci->t_laporan_denda_profesi_ppat;

            $result = $table->getData($p_finance_period_id,$status_bayar);

            for ($i = 0; $i < count($result); $i++) {
                $result[$i]['nomor']=($i+1);
                if ($result[$i]['payment_date']=='') {
                    $result[$i]['status']='Belum Bayar';
                }else{
                    $result[$i]['status']='Sudah Bayar';
                }

            }

            $count = count($result);
            // echo $count; exit();

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

            //print_r($data); exit();
            
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
        

    }

    
    function excel(){

        $start_date = getVarClean('start_date','str','');
        $end_date  = getVarClean('end_date','str','');

        $p_finance_period_id = getVarClean('p_finance_period_id', 'int', 0);
        $status_bayar = getVarClean('status_bayar', 'str', '');

        try {

            $ci = &get_instance();
            $ci->load->model('transaksi/t_laporan_denda_profesi_ppat');
            $table = $ci->t_laporan_denda_profesi_ppat;

            $result = $table->getData($p_finance_period_id,$status_bayar);

            startExcel(date("dmy") . '_laporan_denda_profesi.xls');
            echo '<html>';
            echo '<head><title>LAPORAN DENDA PROFESI PPAT</title></head>';
            echo '<body>';
            echo '<h2>LAPORAN DENDA PROFESI PPAT<h2/>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th align="center" >NO</th>';
            echo '<th align="center" >NAMA PPAT</th>';
            echo '<th align="center" >ALAMAT</th>';
            echo '<th align="center" >NO. SK PENGUKUHAN PPAT/S</th>';
            echo '<th align="center" >TANGGAL KETETAPAN</th>';
            echo '<th align="center" >BULAN DENDA PROFESI</th>';
            echo '<th align="center" >DENDA ATAS AJB</th>';
            echo '<th align="center" >BULAN DENDA AJB</th>';
            echo '<th align="center" >JUMLAH DENDA</th>';
            echo '<th align="center" >NO. BAYAR</th>';
            echo '<th align="center" >STATUS BAYAR</th>';
            echo '<th align="center" >TANGGAL BAYAR</th>';
            echo '</tr>';

            for ($i = 0; $i < count($result); $i++) {
                echo '<tr><td align="center" >'.($i+1).'</td>';
                echo '<td align="left" >'.$result[$i]['ppat_name'].'</td>';
                echo '<td align="left" >'.$result[$i]['address_name'].'</td>';
                echo '<td align="left" >'.$result[$i]['no_sk'].'</td>';
                echo '<td align="left" >'.$result[$i]['tgl_tap'].'</td>';
                echo '<td align="left" >'.$result[$i]['bulan_denda_profesi'].'</td>';
                echo '<td align="left" >'.$result[$i]['sanksi_ajb_2'].'</td>';
                echo '<td align="left" >'.$result[$i]['bulan_ajb'].'</td>';
                echo '<td align="right" >'.number_format($result[$i]['total_vat_amount'], 2, ',', '.').'</td>';
                echo '<td align="left" >'.$result[$i]['payment_key'].'</td>';
                if ($result[$i]['payment_date']=='') {
                    echo '<td align="left" >Belum Bayar</td>';
                }else{
                    echo '<td align="left" >Sudah Bayar</td>';
                }
                echo '<td align="left" >'.$result[$i]['payment_date'].'</td>';
                echo '</tr>'; 
            }
            
            
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