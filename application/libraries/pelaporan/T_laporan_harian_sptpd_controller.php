 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_harian_sptpd_controller
* @version 07/05/2015 12:18:00
*/
class T_laporan_harian_sptpd_controller {

    function excel(){
        $sidx = getVarClean('p_vat_type_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');

        $date_start_laporan = getVarClean('date_start_laporan','str','');
        $date_end_laporan  = getVarClean('date_end_laporan','str','');
        $p_vat_type_id = getVarClean('p_vat_type_id', 'int', 0);

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_harian_sptpd');
            $table = $ci->t_laporan_harian_sptpd;

            $param_arr =  array('p_vat_type_id' => $p_vat_type_id,
                                'date_start_laporan' => $date_start_laporan,
                                'date_end_laporan' => $date_end_laporan);

            $data = $table->getData($param_arr);
            /*print_r($data);
            exit;*/

            startExcel(date("dmy") . '_laporan_harian_sptpd.xls');
            $output = '';

            $output .='<div><h3> LAPORAN PENCETAKAN HARIAN PENERIMAAN SPTPD </h3></div>';
            $output .='<div><b>Tanggal : '.$this->dateToString($param_arr['date_start_laporan']).' s.d '.$this->dateToString($param_arr['date_end_laporan']).'</b></div><br/>';

            $no =1;
            $jumlah_omzet = 0;
            $jumlah_ketetapan = 0;

            $output .= '<table border="1">';
            $output .= '<tr>
                            <th>NO</th>
                            <th>TANGGAL</th>    
                            <th>AYAT PAJAK</th>
                            <th>NAMA</th>
                            <th>ALAMAT</th>
                            <th>NPWPD</th>
                            <th>KOHIR</th>
                            <th>MASA PAJAK</th>
                            <th>JENIS</th>
                            <th>OMZET</th>
                            <th>KETETAPAN</th>
                            <th>VOP</th>
                        </tr>';
            
            for ($i = 0; $i < count($data); $i++) {
                $output.= "<tr>
                        <td>".$no."</td> 
                        <td>".$data[$i]['date_settle_formated']."</td>
                        <td>".$data[$i]['ayat_code'].".".$data[$i]['ayat_code_dtl']."</td>
                        <td>".$data[$i]['nama']."</td>
                        <td>".$data[$i]['alamat']."</td>
                        <td>".$data[$i]['npwpd']."</td>
                        <td>".$data[$i]['kohir']."</td>
                        <td>".$data[$i]['start_period_formated']." s.d ".$data[$i]['end_period_formated']."</td>
                        <td>".$data[$i]['jenis']."</td>
                        <td align='right'>".number_format($data[$i]['omzet'], 2, ',', '.')."</td>
                        <td align='right'>".number_format($data[$i]['ketetapan'],0,',', '.')."</td>
                        <td>".$data[$i]['created_by']."</td>
                    </tr>";
                $jumlah_omzet += $data[$i]['omzet'];
                $jumlah_ketetapan += $data[$i]['ketetapan'];
                $no++;
            }


            $output.= '<tr>
                    <td colspan="9" align="center"> <b>JUMLAH </b></td>
                    <td align="right"> <b>'.number_format($jumlah_omzet, 2, ",", ".").' </b></td>
                    <td align="right"> <b>'.number_format($jumlah_ketetapan, 2, ",", ".").' </b></td>
                    <td></td>
                </tr>';
            $output.= "</table>";

            echo $output;
            exit;

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }


    }

    function dateToString($date){
        if(empty($date)) return "";
        
        $monthname = array(0  => '-',
                           1  => 'Januari',
                           2  => 'Februari',
                           3  => 'Maret',
                           4  => 'April',
                           5  => 'Mei',
                           6  => 'Juni',
                           7  => 'Juli',
                           8  => 'Agustus',
                           9  => 'September',
                           10 => 'Oktober',
                           11 => 'November',
                           12 => 'Desember');    
        
        $pieces = explode('-', $date);
        
        return $pieces[2].' '.$monthname[(int)$pieces[1]].' '.$pieces[0];
    }

}

/* End of file Groups_controller.php */