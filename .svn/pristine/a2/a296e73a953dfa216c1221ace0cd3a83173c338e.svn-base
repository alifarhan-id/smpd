<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_laporan_rekap_surat_teguran_per_bulan_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_rekap_surat_teguran_per_bulan_controller {
 
    function read() {       
        $p_year_period_id = getVarClean('p_year_period_id','int',0);
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

         $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
         
        try {
            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_rekap_surat_teguran_per_bulan');
            $table = $ci->t_laporan_rekap_surat_teguran_per_bulan;
             
            $result = $table->getDataRekap($p_year_period_id);
            //$items = $result;
            //print_r($result);exit;
           
            $array_baru = array();  
            $temp = 0; 
            $j=0;   
            $code ='';     

            //print_r($result);exit;
            for($i = 0;$i<count($result); $i++){

                if ($code != $result[$i]['code']){
                    $j = 0;
                    $temp++;
                }else{
                     $j++;
                }
                
                if ($code != $result[$i]['code']){
                    $array_baru[$temp-1]['code'] = $result[$i]['code'];
                    $code = $result[$i]['code'];
                    
                }
                $array_baru[$temp-1]['jml'.($j+1)] = $result[$i]['jml'];
            }

            //print_r($array_baru);exit();
            //$table->setJQGridParam($req_param);
            $count = count($array_baru);
            //count($result)

            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;

            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - 1; // do not put $limit*($page - 1)

           
            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['rows'] = $array_baru;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function excel(){        
        $p_year_period_id = getVarClean('p_year_period_id','int',0);
        
        //echo "tgl=".$tanggal." p_finance_period_id=".$p_finance_period_id." p_vat_type_id=".$p_vat_type_id; exit;
        try{
            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_rekap_surat_teguran_per_bulan');
            $table = $ci->t_laporan_rekap_surat_teguran_per_bulan;
             
            $result = $table->getDataRekap($p_year_period_id);
            //$items = $result;
            //print_r($result);exit;
            

            startExcel("rekap_skpdkb_jabatan.xls");
            echo '<html>';
            echo '<head><title>LAPORAN REKAP SURAT TEGURAN PER BULAN</title></head>';
            echo '<body>';
            echo '';    
            echo '<table id="table-piutang" class="grid-table-container" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td valign="top">';

            echo '<table class="grid-table" border="0" cellspacing="0" cellpadding="0" width="900">
                            <tr>
                                <td colspan=5 class="th"><strong>LAPORAN REKAP SURAT TEGURAN PERBULAN</strong></td> 
                            </tr>
                            <tr>
                            </table>';
            echo '<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px" width="100%">
                        <tr >';

            echo '<th rowspan=2 align="center" >NO</th>';
            echo '<th rowspan=2 align="center" >BULAN</th>';
            echo '<th colspan=3 align="center" >JUMLAH TEGURAN KE</th></tr>';
            echo '<tr><th align="center" >1</th>';
            echo '<th align="center" >2</th>';
            echo '<th align="center" >3</th>';
            echo '</tr>';
            if($result != 'no result'){
                $no = 1;
                for ($i = 0; $i < count($result); $i++) {
                    if($i != 0){
                        if ($result[$i]['code'] == $result[$i-1]['code'] && $i != 0){
                            echo '<td align="left" >'.$result[$i]['jml'].'</td>';
                        }else{
                            echo '<tr><td align="center" >'.($no++).'</td>';
                            echo '<td align="left" >'.$result[$i]['code'].'</td>';
                            echo '<td align="left" >'.$result[$i]['jml'].'</td>';
                        }
                    }else{
                        echo '<tr><td align="center" >'.($no++).'</td>';
                        echo '<td align="left" >'.$result[$i]['code'].'</td>';
                        echo '<td align="left" >'.$result[$i]['jml'].'</td>';
                        
                    }
                    
                }
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

/* End of file T_laporan_rekap_surat_teguran_per_bulan_controller.php */