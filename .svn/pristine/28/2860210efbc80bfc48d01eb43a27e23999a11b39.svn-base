<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_rep_bpps2_controller
* @version 07/05/2015 12:18:00
*/
class T_rep_bpps2_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('p_vat_type_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');
        $tgl_penerimaan = getVarClean('tgl_penerimaan','str','');
        $i_flag_setoran = getVarClean('i_flag_setoran','int',0);
        $kode_bank = getVarClean('kode_bank','str','');
        $status = getVarClean('status','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('pelaporan/t_rep_bpps2');
            $table = $ci->t_rep_bpps2;
             
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

    function excel()
    {
        $sidx = getVarClean('p_vat_type_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');
        $tgl_penerimaan = getVarClean('tgl_penerimaan','str','');
        $i_flag_setoran = getVarClean('i_flag_setoran','int',0);
        $kode_bank = getVarClean('kode_bank','str','');
        $status = getVarClean('status','str','');

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_rep_bpps2');
            $table = $ci->t_rep_bpps2;

            //echo "getBpps2($sidx, $tgl_penerimaan, $i_flag_setoran, $kode_bank, $status)";
            $items = $table->getBpps2($sidx, $tgl_penerimaan, $i_flag_setoran, $kode_bank, $status);  
            
            //print_r($items);exit;
            
            startExcel(date("dmy") . '_LAPORAN_BPPS2.xls');
            echo '<html>';
            echo '<head><title>REP BPPS2</title></head>';
            echo '<body>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>No</th>';
            echo '<th>No Ayat</th>';
            echo '<th>Nama Ayat</th>';
            echo '<th>No Kohir</th>';
            echo '<th>No Bayar</th>';
            echo '<th>Nama WP</th>';
            echo '<th>Merk Dagang</th>';
            echo '<th>NPWPD</th>';
            echo '<th>Jumlah</th>';
            echo '<th>Masa Pajak</th>';
            echo '<th>TGL TAP</th>';
            echo '<th>Ket.</th>';
            echo '<th>Status</th>';
            echo '</tr>';


                
            $no = 0;
            $jumlahtemp = 0;    
            $total=0;
            if($items != 'no result'){
                foreach ($items as $item) {
                    echo '<tr>';
                    echo '<td>' . ($no+1) . '</td>';
                    echo '<td>' . $item['kode_jns_pajak'].$item['kode_ayat'] . '</td>';
                    echo '<td>' . $item['nama_ayat'] . '</td>';
                    echo '<td>' . $item['no_kohir'] . '</td>';
                    echo '<td>' . $item['payment_key'] . '</td>';
                    echo '<td>' . $item['wp_name'] . '</td>';
                    echo '<td>' . $item['brand_name'] . '</td>';
                    echo '<td>' . $item['npwpd'] . '</td>';
                    echo '<td align="right">' . number_format($item['jumlah_terima'],0,',','.') . '</td>';
                    echo '<td>' . $item['masa_pajak'] . '</td>';
                    echo '<td>' . $item['kd_tap'] . '</td>';
                    echo '<td>' . $item['keterangan'] . '</td>';
                    echo '<td>' . $item['status'] . '</td>';
                    echo '</tr>';

                    $jumlahtemp += $item['jumlah_terima'];
                    $total += $item['jumlah_terima'];

                    $ayat = $item['kode_ayat'];
                    if (!empty($items[$no+1])){
                        $ayatsesudah = $items[$no+1]['kode_ayat'];
                        if(($ayat != $ayatsesudah && count($items)>1)){
                            echo '<tr>';
                                echo '<td colspan=8 align="center">'."JUMLAH " . strtoupper($item['nama_ayat']).'</td>';
                                echo '<td align="right">'.number_format($jumlahtemp, 0, ',', '.').'</td>';
                            echo '</tr>';
                            $jumlahtemp = 0;
                            
                        }
                    }
                    
                    $no++;
                }
                echo '<tr>';
                echo '<td colspan=8 align="center">'."TOTAL " . strtoupper($item['jns_pajak']).'</td>';
                echo '<td align="right">'.number_format($total, 0, ',', '.').'</td>';
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