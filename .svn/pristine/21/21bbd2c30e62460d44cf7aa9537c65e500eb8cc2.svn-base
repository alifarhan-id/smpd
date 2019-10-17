<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_laporan_penyampaian_surat_teguran_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_penyampaian_surat_teguran_controller { 
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sord = getVarClean('sord', 'str', 'asc');
        $p_finance_period_id = getVarClean('p_finance_period_id','int',0);
        $p_vat_type_id = getVarClean('p_vat_type_id', 'int', 0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {
            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_penyampaian_surat_teguran');
            $table = $ci->t_laporan_penyampaian_surat_teguran;
            //echo "tanggal=".$tanggal;
             
            $result = $table->getDataTeguran($p_vat_type_id,$p_finance_period_id);
            
            $temp = $result[0];
            $debt_amount =0;
            $j=0;
            $sebelum = 'Belum Bayar';
            $sesudah = 'Belum Bayar';
            $surat_teguran_1 = '-';
            $surat_teguran_2 = '-';
            $surat_teguran_3 = '-';
            $result_final = array();

            for ($i = 1; $i < count($result); $i++) {
                if($temp['npwpd']==$result[$i]['npwpd']){
                    //$temp = $result[$i];
                    if ($result[$i]['surat_teguran_1']=='1' && $result[$i]['surat_teguran_2']=='0'){
                        $surat_teguran_1 = $result[$i]['tgl_teg_1'];
                        $debt_amount =0;
                    }
                    if ($result[$i]['surat_teguran_2']=='1' && $result[$i]['surat_teguran_3']=='0'){
                        $surat_teguran_2 = $result[$i]['tgl_teg_2'];
                        $debt_amount =0;
                    }
                    if ($result[$i]['surat_teguran_3']=='1'){
                        $debt_amount =$result[$i]['debt_amount'];
                        $surat_teguran_3 = $result[$i]['tgl_teg_3'];
                        $debt_amount =0;
                    }
                }else{ 
                    $result_final[$i-1]['company_brand']= $result[$i-1]['company_brand'];
                    $result_final[$i-1]['alamat_merk_dagang']= $result[$i-1]['alamat_merk_dagang'];
                    $result_final[$i-1]['npwpd']= $result[$i-1]['npwpd'];
                    //$temp = $result[$i];
                    $result_final[$i-1]['surat_teguran1'] = $surat_teguran_1;
                    $result_final[$i-1]['surat_teguran2'] = $surat_teguran_2;
                    $result_final[$i-1]['surat_teguran3'] = $surat_teguran_3;
                    $result_final[$i-1]['tanggal']        = $result[$i-1]['tgl_bayar']; 
                    if ($result[$i-1]['tgl_bayar']=='-'){
                        $result_final[$i-1]['pokok'] = '-';
                        $result_final[$i-1]['denda'] = '-';
                    }else{
                        $result_final[$i-1]['pokok'] = $result[$i-1]['total_vat_amount']; 
                        $result_final[$i-1]['denda'] = $result[$i-1]['total_penalty_amount'];
                    }

                    //$temp = $result[$i];
                    $surat_teguran_1 = '-';
                    $surat_teguran_2 = '-';
                    $surat_teguran_3 = '-';

                    if ($result[$i]['surat_teguran_1']=='1' && $result[$i]['surat_teguran_2']=='0'){
                        $surat_teguran_1 = $result[$i]['tgl_teg_1'];
                        $debt_amount =0;
                    }
                    if ($result[$i]['surat_teguran_2']=='1' && $result[$i]['surat_teguran_3']=='0'){
                        $surat_teguran_2 = $result[$i]['tgl_teg_2'];
                        $debt_amount =0;
                    }
                    if ($result[$i]['surat_teguran_3']=='1'){
                        $debt_amount =$result[$i]['debt_amount'];
                        $surat_teguran_3 = $result[$i]['tgl_teg_3'];
                        $debt_amount =0;
                    }
                    $result[$i] ['surat_teguran_1']= $surat_teguran_1;
                    $result[$i] ['surat_teguran_2']= $surat_teguran_2;
                    $result[$i] ['surat_teguran_3']= $surat_teguran_3;
                    $temp = $result[$i];
                    $j=$j+1;
                }
            }

            //print_r($temp);exit;
           if ($j > 0){
                $result_final[$i-1]['company_brand'] = $temp['company_brand'];
                $result_final[$i-1]['alamat_merk_dagang'] = $temp['alamat_merk_dagang'];
                $result_final[$i-1]['npwpd'] = $temp['npwpd'];
                $result_final[$i-1]['surat_teguran1']=$temp['surat_teguran_1'];
                $result_final[$i-1]['surat_teguran2']=$temp['surat_teguran_2'];
                $result_final[$i-1]['surat_teguran3']=$temp['surat_teguran_3'];
                $result_final[$i-1]['surat_teguran3']=$result[$i-1]['tgl_bayar']; 
                if ($result[$i-1]['tgl_bayar']=='-'){
                    $result_final[$i-1]['pokok'] = '-';
                    $result_final[$i-1]['denda'] = '-';
                }else{
                    $result_final[$i-1]['pokok'] = $result[$i-1]['total_vat_amount']; 
                    $result_final[$i-1]['denda'] = $result[$i-1]['total_penalty_amount'];
                }
            }
            //print_r($result_final);exit();



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

            $data['rows'] = $result_final;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function excel(){        
        $p_finance_period_id = getVarClean('p_finance_period_id','int',0);
        $p_vat_type_id = getVarClean('p_vat_type_id', 'int', 0);
        $form_finance_code = getVarClean('form_finance_code', 'str', '');
        $vat_code = getVarClean('vat_code', 'str', '');
        //echo "tgl=".$tanggal." p_finance_period_id=".$p_finance_period_id." p_vat_type_id=".$p_vat_type_id; exit;
        try{
            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_penyampaian_surat_teguran');
            $table = $ci->t_laporan_penyampaian_surat_teguran;
             
            $result = $table->getDataTeguran($p_vat_type_id,$p_finance_period_id);
            //$items = $result;
            //print_r($result);exit;
            
            startExcel("laporan_posisi_status_teguran");
                        
            echo '<table id="table-piutang" class="grid-table-container" border="0" cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td valign="top">';

            echo '<table class="grid-table" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td colspan=12 align="center" class="th"><strong>DAFTAR PENYAMPAIAN SURAT TEGURAN '.$vat_code.'</strong></td> 
                            </tr>
                            </table>';
            
            echo  '<tr><td colspan=12>PERIODE PAJAK : '.$form_finance_code.'</tr>';
            //$tanggal = CCGetFromGet('date_end_laporan','31-12-2014');
            echo '<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px">
                        <tr >';


            echo '<th rowspan=3 align="center" >NO</th>';
            echo '<th rowspan=3 align="center" >OBJEK PAJAK</th>';
            echo '<th rowspan=3 align="center" >ALAMAT</th>';
            echo '<th rowspan=3 align="center" >NPWPD</th>';
            echo '<th colspan=3 align="center" >TANGGAL DITERIMA</th>';
            echo '<th colspan=3 align="center" >TINDAK LANJUT</th>';
            echo '<th rowspan=3 align="center" >PENERIMA</th>';
            echo '<th rowspan=3 align="center" >KET</th>';
            echo '</tr>';

            echo '<tr>';
            echo '<th colspan=3 align="center" >TEGURAN</th>';
            echo '<th colspan=3 align="center" >PEMBAYARAN</th>';
            echo '</tr>';

            echo '<th align="center" >I</th>';
            echo '<th align="center" >II</th>';
            echo '<th align="center" >III</th>';
            echo '<th align="center" >TANGGAL</th>';
            echo '<th align="center" >POKOK</th>';
            echo '<th align="center" >DENDA</th>';
            echo '</tr>';
            if($result != 'no result'){
                $temp = $result[0];
                $debt_amount =0;
                
                $j=0;
                $sebelum = 'Belum Bayar';
                $sesudah = 'Belum Bayar';
                $surat_teguran_1 = '-';
                $surat_teguran_2 = '-';
                $surat_teguran_3 = '-';
                for ($i = 1; $i < count($result); $i++) {
                    if($temp['npwpd']==$result[$i]['npwpd']){
                        if ($result[$i]['surat_teguran_1']=='1' && $result[$i]['surat_teguran_2']=='0'){
                            $surat_teguran_1 = $result[$i]['tgl_teg_1'];
                            $debt_amount =0;
                        }
                        if ($result[$i]['surat_teguran_2']=='1' && $result[$i]['surat_teguran_3']=='0'){
                            $surat_teguran_2 = $result[$i]['tgl_teg_2'];
                            $debt_amount =0;
                        }
                        if ($result[$i]['surat_teguran_3']=='1'){
                            $debt_amount =$result[$i]['debt_amount'];
                            $surat_teguran_3 = $result[$i]['tgl_teg_3'];
                            $debt_amount =0;
                        }
                    }else{
                        echo  '<tr>';
                        echo  '<td align="center">'.($j+1).'</td>';
                        echo  '<td align="left">'.$temp['company_brand'].'</td>';
                        echo  '<td align="left">'.$temp['alamat_merk_dagang'].'</td>';
                        echo  '<td align="center">'.$temp['npwpd'].'</td>';
                        echo  '<td align="center">'.$surat_teguran_1.'</td>';
                        echo  '<td align="center">'.$surat_teguran_2.'</td>';
                        echo  '<td align="center">'.$surat_teguran_3.'</td>'; 
                        echo  '<td align="center">'.$result[$i-1]['tgl_bayar'].'</td>'; 
                        if ($result[$i-1]['tgl_bayar']=='-'){
                            echo  '<td align="center">-</td>'; 
                            echo  '<td align="center">-</td>'; 
                        }else{
                            echo  '<td align="right">'.number_format($result[$i-1]['total_vat_amount'], 2, ',', '.').'</td>'; 
                            echo  '<td align="right">'.number_format($result[$i-1]['total_penalty_amount'], 2, ',', '.').'</td>';
                        }
                        echo  '<td align="center"></td>'; 
                        echo  '<td align="center"></td>'; 
                        echo  '</tr>';

                        $temp = $result[$i];
                        $surat_teguran_1 = '-';
                        $surat_teguran_2 = '-';
                        $surat_teguran_3 = '-';

                        if ($result[$i]['surat_teguran_1']=='1' && $result[$i]['surat_teguran_2']=='0'){
                            $surat_teguran_1 = $result[$i]['tgl_teg_1'];
                            $debt_amount =0;
                        }
                        if ($result[$i]['surat_teguran_2']=='1' && $result[$i]['surat_teguran_3']=='0'){
                            $surat_teguran_2 = $result[$i]['tgl_teg_2'];
                            $debt_amount =0;
                        }
                        if ($result[$i]['surat_teguran_3']=='1'){
                            $debt_amount =$result[$i]['debt_amount'];
                            $surat_teguran_3 = $result[$i]['tgl_teg_3'];
                            $debt_amount =0;
                        }
                        $j=$j+1;
                    }
                }
                if ($j > 0){
                    echo  '<tr>';
                    echo  '<td align="center">'.($j+1).'</td>';
                    echo  '<td align="left">'.$temp['company_brand'].'</td>';
                    echo  '<td align="left">'.$temp['alamat_merk_dagang'].'</td>';
                    echo  '<td align="center">'.$temp['npwpd'].'</td>';
                    echo  '<td align="center">'.$surat_teguran_1.'</td>';
                    echo  '<td align="center">'.$surat_teguran_2.'</td>';
                    echo  '<td align="center">'.$surat_teguran_3.'</td>'; 
                    echo  '<td align="center">'.$result[$i-1]['tgl_bayar'].'</td>'; 
                    if ($result[$i-1]['tgl_bayar']=='-'){
                            echo  '<td align="center">-</td>'; 
                            echo  '<td align="center">-</td>'; 
                        }else{
                            echo  '<td align="right">'.number_format($result[$i-1]['total_vat_amount'], 2, ',', '.').'</td>'; 
                            echo  '<td align="right">'.number_format($result[$i-1]['total_penalty_amount'], 2, ',', '.').'</td>';
                        }
                    echo  '<td align="center"></td>'; 
                    echo  '<td align="center"></td>'; 
                    echo  '</tr>';
                }
            }
            echo '</table>';
            exit;            

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        
        
    }

    
}

/* End of file T_laporan_penyampaian_surat_teguran_controller.php */