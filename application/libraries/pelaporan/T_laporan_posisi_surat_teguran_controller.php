<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_posisi_surat_teguran_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_posisi_surat_teguran_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sord = getVarClean('sord', 'str', 'asc');
        $tanggal = getVarClean('tanggal','str','');
        $p_finance_period_id = getVarClean('p_finance_period_id','int',0);
        $p_vat_type_id = getVarClean('p_vat_type_id', 'int', 0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {
            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_posisi_surat_teguran');
            $table = $ci->t_laporan_posisi_surat_teguran;
            //echo "tanggal=".$tanggal;
             
            $result = $table->getLaporanPosisi($p_vat_type_id,$p_finance_period_id,$tanggal);
            //$items = $result;
            //print_r($result);exit;
            $temp = $result[0];
            $result_final=null;
            $sebelum = 'Belum Bayar';
            $sesudah = 'Belum Bayar';
            for ($i = 1; $i < count($result); $i++) {
                if($temp['npwpd']==$result[$i]['npwpd']){
                    $temp = $result[$i];
                    if ($temp['surat_teguran_1']=='1'){
                        $temp['surat_teguran1'] = 'Terbit ('.$temp['tgl_teg_1'].')';
                        $debt_amount =0;
                    }
                    if ($temp['surat_teguran_2']=='1'){
                        $temp['surat_teguran2'] = 'Terbit ('.$temp['tgl_teg_2'].')';
                        $debt_amount =0;
                    }
                    if ($temp['surat_teguran_3']=='1'){
                        $debt_amount =$temp['debt_amount'];
                        $temp['surat_teguran3'] = 'Terbit ('.$temp['tgl_teg_3'].') (Rp. '.number_format($debt_amount, 2, ',', '.').')';
                        $debt_amount =0;
                        
                    }
                        

                }else{
                    $result_final [] = $temp;
                    $temp = $result[$i];
                    if ($temp['surat_teguran_1']=='1'){
                        $temp['surat_teguran1'] = 'Terbit ('.$temp['tgl_teg_1'].')';
                        $debt_amount =0;
                    }
                    if ($temp['surat_teguran_2']=='1'){
                        $temp['surat_teguran2'] = 'Terbit ('.$temp['tgl_teg_2'].')';
                        $debt_amount =0;
                    }
                    if ($temp['surat_teguran_3']=='1'){
                        $debt_amount =$temp['debt_amount'];
                        $temp['surat_teguran3'] = 'Terbit ('.$temp['tgl_teg_3'].') (Rp. '.number_format($debt_amount, 2, ',', '.').')';
                        $debt_amount =0;
                        
                    }
                    
                }
            }
            if (count($result_final) > 0){
                $result_final [] = $temp;
            }
            //echo "result final -> ";
            //print_r($result_final); exit;

            
            

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
        $tanggal = getVarClean('tanggal','str','');
        $p_finance_period_id = getVarClean('p_finance_period_id','int',0);
        $p_vat_type_id = getVarClean('p_vat_type_id', 'int', 0);
        $form_finance_code = getVarClean('form_finance_code', 'str', '');
        $vat_code = getVarClean('vat_code', 'str', '');
        //echo "tgl=".$tanggal." p_finance_period_id=".$p_finance_period_id." p_vat_type_id=".$p_vat_type_id; exit;
        try{
            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_posisi_surat_teguran');
            $table = $ci->t_laporan_posisi_surat_teguran;
             
            $result = $table->getLaporanPosisi($p_vat_type_id,$p_finance_period_id,$tanggal);
            //$items = $result;
            //print_r($result);exit;
            
            $temp = $result[0];
            $result_final=null;
            $sebelum = 'Belum Bayar';
            $sesudah = 'Belum Bayar';
            for ($i = 1; $i < count($result); $i++) {
                if($temp['npwpd']==$result[$i]['npwpd']){
                    $temp = $result[$i];
                    if ($temp['surat_teguran_1']=='1'){
                        $temp['surat_teguran1'] = 'Terbit ('.$temp['tgl_teg_1'].')';
                        $debt_amount =0;
                    }
                    if ($temp['surat_teguran_2']=='1'){
                        $temp['surat_teguran2'] = 'Terbit ('.$temp['tgl_teg_2'].')';
                        $debt_amount =0;
                    }
                    if ($temp['surat_teguran_3']=='1'){
                        $debt_amount =$temp['debt_amount'];
                        $temp['surat_teguran3'] = 'Terbit ('.$temp['tgl_teg_3'].') (Rp. '.number_format($debt_amount, 2, ',', '.').')';
                        $debt_amount =0;
                    }
                }else{
                    $result_final [] = $temp;
                    $temp = $result[$i];
                    if ($temp['surat_teguran_1']=='1'){
                        $temp['surat_teguran1'] = 'Terbit ('.$temp['tgl_teg_1'].')';
                        $debt_amount =0;
                    }
                    if ($temp['surat_teguran_2']=='1'){
                        $temp['surat_teguran2'] = 'Terbit ('.$temp['tgl_teg_2'].')';
                        $debt_amount =0;
                    }
                    if ($temp['surat_teguran_3']=='1'){
                        $debt_amount =$temp['debt_amount'];
                        $temp['surat_teguran3'] = 'Terbit ('.$temp['tgl_teg_3'].') (Rp. '.number_format($debt_amount, 2, ',', '.').')';
                        $debt_amount =0;
                    }
                }
            }
            if (count($result_final) > 0){
                $result_final [] = $temp;
            }
            // echo "result final -> ";
            // print_r($result_final); exit;

            startExcel(date("dmy") . '_LAPORAN_POSISI_SURAT_TEGURAN.xls');
            echo '<html>';
            echo '<head><title>REP POSISI SURAT TEGURAN</title></head>';
            echo '<body>';
            echo '';
            echo '<h2>LAPORAN POSISI SURAT TEGURAN<h2/>';
            echo '<h3>JENIS PAJAK : '.$vat_code.'<br/>';
            echo 'PERIODE PAJAK : '.$form_finance_code.'<br/>';    
            echo '<table border="1" widht="100%">';
            echo '<tr>';
            echo '<th>NO</th>';
            echo '<th>MERK DAGANG</th>';
            echo '<th>ALAMAT MERK DAGANG</th>';
            echo '<th>NPWPD</th>';
            echo '<th>SURAT TEGURAN 1</th>';
            echo '<th>SURAT TEGURAN 2</th>';
            echo '<th>SURAT TEGURAN 3</th>';
            echo '<th>PER TANGGAL '.$tanggal.'</th>';
            echo '<th>SETELAH TANGGAL '.$tanggal.'</th>';
            echo '</tr>';
            $i=1;
            if($result != 'no result'){
                foreach ($result_final as $item) {
                    echo '<tr>';
                    echo '<td align="center">'.($i++).'</td>';
                    echo '<td align="left">'.$item['company_brand'].'</td>';
                    echo '<td align="left">'.$item['alamat_merk_dagang'].'</td>';
                    echo '<td align="center">'.$item['npwpd'].'</td>';
                    echo '<td align="center">'.$item['surat_teguran1'].'</td>';
                    echo '<td align="center">'.$item['surat_teguran2'].'</td>';
                    echo '<td align="center">'.$item['surat_teguran3'].'</td>'; 
                    echo '<td align="center">'.$item['tgl_bayar'].'</td>'; 
                    echo '<td align="center">'.$item['tgl_bayar2'].'</td>'; 
                    echo '</tr>';
                }
            }
            echo'</table>';
            exit;

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        
        
    }

    
}

/* End of file t_laporan_posisi_surat_teguran_controller.php */