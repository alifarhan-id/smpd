 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_monitoring_pendaftaran_new_per_tanggal_controller
* @version 07/05/2015 12:18:00
*/
class T_monitoring_pendaftaran_new_per_tanggal_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_vat_registration_id');
        $sord = getVarClean('sord','str','desc');

        $date_start_laporan = getVarClean('date_start_laporan','str','');
        $date_end_laporan  = getVarClean('date_end_laporan','str','');
        $nilai = getVarClean('nilai', 'int', 0);
        $p_vat_type_id = getVarClean('p_vat_type_id', 'int', 0);


        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        if(($sidx = '' || $sidx == 0) && $date_start_laporan == '' && $date_end_laporan == '' && ($p_vat_type_id == '' || $p_vat_type_id == 0) && ($nilai == '' || $nilai == 0)){
            $ci = & get_instance();
            $ci->load->model('pelaporan/t_monitoring_pendaftaran_new_per_tanggal');
            $table = $ci->t_monitoring_pendaftaran_new_per_tanggal;

            $data['success'] = true;
        }else{
            try {

                $ci = & get_instance();
                $ci->load->model('pelaporan/t_monitoring_pendaftaran_new_per_tanggal');
                $table = $ci->t_monitoring_pendaftaran_new_per_tanggal;
                
                $param_arr =  array('p_vat_type_id' => $p_vat_type_id,
                                    'date_start_laporan' => $date_start_laporan,
                                    'date_end_laporan' => $date_end_laporan,
                                    'nilai' => $nilai);

                $result = $table->getDataView($param_arr);

                $temp_arr = array();
                $data_arr = array();
                $header_arr = array();
                $result_arr = array();

                for ($i=0; $i < count($result); $i++) { 
                    $temp_arr[$i] = explode("|",$result[$i]['replace']);
                }

                for ($i=0; $i < count($temp_arr); $i++) {
                    for ($j=0; $j < count($temp_arr[$i]); $j++) { 
                        if ($i == 0) {
                            $header_arr[$j] = strtolower(str_replace(" ","_",$temp_arr[$i][$j]));  
                        }else{
                            break;
                        }
                    }
                }

                for ($i=0; $i < count($temp_arr)-1; $i++) {
                    for ($j=0; $j < count($temp_arr[$i]); $j++) { 
                        $nama = strtolower(str_replace(" ","_",$header_arr[$j]));
                        $data_arr[$i][$nama] = $temp_arr[$i+1][$j];
                    }
                }

                $data['rows'] = $data_arr;
                $data['success'] = true;
            }catch (Exception $e) {
                $data['message'] = $e->getMessage();
            }
        }

        //print_r($data);
        // exit;
        return $data;
    }

    function excel(){
        $sidx = getVarClean('p_vat_type_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');

        $date_start_laporan = getVarClean('date_start_laporan','str','');
        $date_end_laporan  = getVarClean('date_end_laporan','str','');
        $nilai = getVarClean('nilai', 'int', 0);
        $p_vat_type_id = getVarClean('p_vat_type_id', 'int', 0);

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_monitoring_pendaftaran_new_per_tanggal');
            $table = $ci->t_monitoring_pendaftaran_new_per_tanggal;

            $param_arr =  array('p_vat_type_id' => $p_vat_type_id,
                                'date_start_laporan' => $date_start_laporan,
                                'date_end_laporan' => $date_end_laporan,
                                'nilai' => $nilai);

            $data = $table->getData($param_arr);
            /*print_r($data);
            exit;*/

            startExcel(date("dmy") . '_pendaftaran_wp.xls');
            $output = '';

            $output .='<table id="table-piutang" class="grid-table-container" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top">';
            $output .='<table>';

            $output .= '<tr><td class="th" align="center" colspan=8><h1><strong>DAFTAR PERMOHONAN</strong></td></tr>';
            $output .= '<tr><td class="th" align="center" colspan=8><h1><strong>PENDAFTARAN WAJIB PAJAK DAERAH</strong></td></tr>';
            $output .= '</table></br>';
            
            $output .='<table>';
            $output .= '<tr></tr>';
            $output .= '<tr></tr>';

            $output .= '<tr><td colspan=2>TANGGAL </td><td>: '.$date_start_laporan.' s.d. '.$date_end_laporan.' </td></tr>';
            //$output .= '<tr><td colspan=2>JENIS TARGET </td><td>: PENERBITAN NPWPD 7 HARI KERJA</td></tr>';
            $output .= '<tr></tr>';
            $output .= '</table></br>';
            $tanggal = getVarClean('date_end_laporan','str','31-12-2014');
            $output .='<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px" width="100%">
                        <tr >';

            $output.='<th align="center" >NO</th>';
            $output.='<th align="center" >NAMA WAJIB PAJAK</th>';
            $output.='<th align="center" >NAMA PENANGGUNG PAJAK</th>';
            $output.='<th align="center" >MERK DAGANG</th>';
            $output.='<th align="center" >ALAMAT USAHA</th>';
            $output.='<th align="center" >WILAYAH</th>';
            $output.='<th align="center" >JENIS PAJAK</th>';
            $output.='<th align="center" >NPWPD</th>';
            $output.='</tr>';
            
            for ($i = 0; $i < count($data); $i++) {
                $output.='<tr><td align="center" >'.($i+1).'</td>';
                $output.='<td align="left" >'.$data[$i]['wp_name'].'</td>';
                if ($data[$i]['company_owner'] == $data[$i]['wp_name']){
                    $output.='<td align="left" >-</td>';
                }else{
                    $output.='<td align="left" >'.$data[$i]['company_owner'].'</td>';
                }
                //$output.='<td align="left" >'.$data[$i]['company_owner'].'</td>';
                $output.='<td align="left" >'.$data[$i]['company_brand'].'</td>';
                $output.='<td align="left" >'.$data[$i]['brand_address_name'].' '.$data[$i]['brand_address_no'].'</td>';
                $output.='<td align="left" ></td>';
                $output.='<td align="left" >'.$data[$i]['vat_code'].'</td>';
                $output.='<td align="left" >'.$data[$i]['npwpd'].'</td></tr>';
            }


            $output.='</table>';
    
            $output .='<table width=100% border=0>';

            $output.='<tr></tr>';
            $output.='<tr></tr>';
            $output .= '<tr >
                            <td width=50% align="center" colspan=5>
                                 
                            </td>
                            <td width=50% align="center" colspan=3>
                                KEPALA BIDANG 
                            </td>
                        </tr>';
            $output .= '<tr >
                            <td width=50% align="center" colspan=5>
                                
                            </td>
                            <td width=50% align="center" colspan=3>
                                PAJAK PENDAFTARAN,
                            </td>
                        </tr>';
            $output .= '<tr >
                            <td width=50% align="center" colspan=5>
                                 
                            </td>
                            <td width=50% align="center" colspan=3>
                                 
                            </td>
                        </tr>';
            $output .= '<tr >
                            <td width=50% align="center" colspan=5>
                                
                            </td>
                            <td width=50% align="center" colspan=3>
                                
                            </td>
                        </tr>';
            $output .= '<tr >
                            <td width=50% align="center" colspan=5>
                                
                            </td>
                            <td width=50% align="center" colspan=3>
                                Drs. H. GUN GUN SUMARYANA
                            </td>
                        </tr>';
            $output .= '<tr >
                            <td width=50% align="center" colspan=5>
                                
                            </td>
                            <td width=50% align="center" colspan=3>
                                Pembina
                            </td>
                        </tr>';
            $output .= '<tr >
                            <td width=50% align="center" colspan=5>
                                
                            </td>
                            <td width=50% align="center" colspan=3>
                                NIP. 19700806 199101 1 001
                            </td>
                        </tr>';


            $output.='</table>';

            echo $output;
            exit;

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }


    }

}

/* End of file Groups_controller.php */