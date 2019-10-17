 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_pembayaran_wp_per_3_tahun_bulanan_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_pembayaran_wp_per_3_tahun_bulanan_controller {


    function readData(){

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','p_vat_type_id');
        $sord = getVarClean('sord','str','desc');

        $p_vat_type_dtl_id = getVarClean('p_vat_type_dtl_id', 'int', 0);
        $p_vat_type_id  = getVarClean('p_vat_type_id', 'int', 0);
        $p_finance_period_id  = getVarClean('p_finance_period_id', 'int', 0);
        $tahun  = getVarClean('tahun', 'int', 0);
        

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_pembayaran_wp_per_3_tahun_bulanan');
            $table = $ci->t_laporan_pembayaran_wp_per_3_tahun_bulanan;

            $result = $table->getData($p_vat_type_dtl_id,$p_vat_type_id);

            for ($i=0; $i < count($result) ; $i++) { 
                $result_jml = $table->getData1($p_vat_type_dtl_id,$result[$i]['t_cust_account_id'],$p_finance_period_id);
                for ($j=0; $j < count($result_jml) ; $j++) { 
                    if ($j == 0){
                        $result[$i]['jml'] = $result_jml[$j]['pajak'];
                   }
                    if ($j == 1){
                        $result[$i]['jml1'] = $result_jml[$j]['pajak'];
                    }
                    if ($j == 2){
                        $result[$i]['jml2'] = $result_jml[$j]['pajak'];
                    }
                    $result[$i]['masa_pajak'] = substr($result_jml[$j]['code'],0,-5);            
                }           
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
            // print_r($result);
            // exit();     

            
            
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
        

    }

    function excel(){

        $p_vat_type_dtl_id = getVarClean('p_vat_type_dtl_id', 'int', 0);
        $p_vat_type_id  = getVarClean('p_vat_type_id', 'int', 0);
        $vat_code = getVarClean('vat_code', 'str', '');
        $tahun  = getVarClean('year_code', 'str', '');
        $p_finance_period_id = getVarClean('p_finance_period_id', 'int', 0);

        try {
            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_pembayaran_wp_per_3_tahun_bulanan');
            $table = $ci->t_laporan_pembayaran_wp_per_3_tahun_bulanan;
            
            $result = $table->getData($p_vat_type_dtl_id,$p_vat_type_id);

            
            
            $output = '';

            startExcel(date("dmy") . '_laporan_pembayaran_wp_per_3_tahun_bulanan.xls');
            $output .= '<html>';
            $output .= '<head><title>LAPORAN DENDA</title></head>';
            $output .= '<body>';
               
    
            $output .='<table id="table-piutang" class="grid-table-container" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td valign="top">';

            $output .='<table class="grid-table" border="0" cellspacing="0" cellpadding="0" width="900">
                            <tr>
                                <td class="th" colspan = 9 ><strong>LAPORAN PEMBAYARAN WP PER 3 TAHUN BULANAN</strong></td> 
                            </tr>
                            </table>';
            
            $output .= '<h2>JENIS PAJAK : '.$vat_code.' </h2>';
            $output .='<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px" width="100%">
                <tr >';
            //$dbConn->close();

            $output .= '<th align="center" >NO</th>';
            $output .= '<th align="center" >AYAT PAJAK</th>';
            $output .= '<th align="center" >NPWPD</th>';
            $output .= '<th align="center" >NAMA MERK DAGANG</th>';
            $output .= '<th align="center" >ALAMAT MERK DAGANG</th>';
            $output .= '<th align="center" >TGL PENGUKUHAN</th>';
            $output .= '<th align="center" >MASA PAJAK</th>';
            $output .= '<th align="center" >'.($tahun-2).'</th>';
            $output .= '<th align="center" >'.($tahun-1).'</th>';
            $output .= '<th align="center" >'.$tahun.'</th>';
            $output .= '</tr>';

            if ($p_vat_type_dtl_id==''){
                $p_vat_type_dtl_id = 0;
            }

            for ($i=0; $i < count($result) ; $i++) { 
                $result_jml = $table->getData1($p_vat_type_dtl_id,$result[$i]['t_cust_account_id'],$p_finance_period_id);
                $output .=  '<tr><td>'.($i+1).'&nbsp</td>';
                $output .=  '<td>'.$result[$i]['vat_code'].'</td>';
                $output .=  '<td>'.$result[$i]['npwd'].'</td>';
                $output .=  '<td>'.$result[$i]['company_brand'].'</td>';
                $output .=  '<td>'.$result[$i]['alamat'].'</td>';
                $output .=  '<td>'.$result[$i]['active_date'].'</td>';
                
                for ($j=0; $j < count($result_jml) ; $j++) { 
                    if ($j == 0){
                        $result[$i]['jml'] = $result_jml[$j]['pajak'];
                   }
                    if ($j == 1){
                        $result[$i]['jml1'] = $result_jml[$j]['pajak'];
                    }
                    if ($j == 2){
                        $result[$i]['jml2'] = $result_jml[$j]['pajak'];
                    }
                    $result[$i]['masa_pajak'] = substr($result_jml[$j]['code'],0,-5);            
                }        
                $output .=  '<td>'.$result[$i]['masa_pajak'].'</td>';   
                $output .=  '<td align="right">'.number_format($result[$i]['jml'], 2, ',', '.').'</td>'; 
                $output .=  '<td align="right">'.number_format($result[$i]['jml1'], 2, ',', '.').'</td>'; 
                $output .=  '<td align="right">'.number_format($result[$i]['jml2'], 2, ',', '.').'</td>'; 
            }

            $output.= '</body>';
            $output.= '</html>';

            echo $output;
           exit();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

    }



}

/* End of file Groups_controller.php */