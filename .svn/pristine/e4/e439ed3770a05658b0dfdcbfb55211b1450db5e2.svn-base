 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan_controller.php
* @version 07/05/2015 12:18:00
*/
class T_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('t_vat_setllement_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');

        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);
        $p_settlement_type_id = getVarClean('p_settlement_type_id','int',0);
        $p_payment_type_id = getVarClean('p_payment_type_id','int',0);
        $date_start_laporan = getVarClean('date_start_laporan','str','');
        $date_end_laporan = getVarClean('date_end_laporan','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        if(($sidx = '' || $sidx == 0) && $date_start_laporan == '' && $date_end_laporan == '' && ($p_vat_type_id == '' || $p_vat_type_id == 0) && ($p_settlement_type_id == '' || $p_settlement_type_id == 0) && ($p_payment_type_id == '' || $p_payment_type_id == 0)){
            $ci = & get_instance();
            $ci->load->model('pelaporan/t_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan');
            $table = $ci->t_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan;
        }else{
            try {

                $ci = & get_instance();
                $ci->load->model('pelaporan/t_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan');
                $table = $ci->t_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan;
                 
                $result = $table->getData($p_settlement_type_id, $p_payment_type_id, $p_vat_type_id, $date_start_laporan, $date_end_laporan);


                
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

        
    }

    function readData(){
        /*$date_start_laporan = getVarClean('date_start_laporan', 'str', '');
        $date_end_laporan   = getVarClean('date_end_laporan', 'str', '');
        $p_vat_type_id = getVarClean('p_vat_type_id', 'str', '');
        $p_settlement_type_id   = getVarClean('p_settlement_type_id', 'str', '');
        $p_payment_type_id   = getVarClean('p_payment_type_id', 'str', '');*/
        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);
        $p_settlement_type_id = getVarClean('p_settlement_type_id','int',0);
        $p_payment_type_id = getVarClean('p_payment_type_id','int',0);
        $date_start_laporan = getVarClean('date_start_laporan','str','');
        $date_end_laporan = getVarClean('date_end_laporan','str','');
        $sidx = getVarClean('sidx','str','wp_name');
        $sord = getVarClean('sord','str','asc');
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',10);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        


        try {
            if (!empty($date_start_laporan)&&!empty($date_end_laporan)){
                $ci = & get_instance();
                $ci->load->model('pelaporan/t_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan');
                $table = $ci->t_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan;

                $req_param = array(
                    "sort_by" => $sidx,
                    "sord" => $sord,
                    "limit" => null,
                    "field" => null,
                    "where" => null,
                    "where_in" => null,
                    "where_not_in" => null,
                    "search" =>$_REQUEST['_search'],
                    "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                    "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                    "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
                );

                // Filter Table
                $req_param['where'] = array();


                $date_start_laporan = "'".$date_start_laporan."'";
                $date_end_laporan   = "'".$date_end_laporan."'";

                $table->setCriteria("p_settlement_type_id = ".$p_settlement_type_id);
                $table->setCriteria("trunc(y.payment_date) BETWEEN to_date(".$date_start_laporan.",'yyyy-mm-dd') 
                    and to_date(".$date_end_laporan.",'yyyy-mm-dd')");
                $table->setCriteria("case when ".$p_payment_type_id."=0 then true
                                         when ".$p_payment_type_id."=2 and y.p_payment_type_id is null then TRUE
                                         else y.p_payment_type_id = ".$p_payment_type_id."
                                    end ");
                if ($p_vat_type_id !=''){
                    $table->setCriteria("a.p_vat_type_dtl_id in (select p_vat_type_dtl_id 
                            from p_vat_type_dtl where p_vat_type_id =".$p_vat_type_id.")");
                }                     

                $table->setJQGridParam($req_param);
                $count = $table->countAll();

                if ($count > 0) $total_pages = ceil($count / $limit);
                else $total_pages = 1;

                if ($page > $total_pages) $page = $total_pages;
                $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

                $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
                );

                $table->setJQGridParam($req_param);

                if ($page == 0) $data['page'] = 1;
                else $data['page'] = $page;

                $data['total'] = $total_pages;
                $data['records'] = $count;

                $data['rows'] = $table->getAll(0, 0, 'wp_name', 'asc');
            }
            $data['success'] = true;
            return $data;
        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function excel(){
        $date_start_laporan = getVarClean('date_start_laporan', 'str', '');
        $date_end_laporan   = getVarClean('date_end_laporan', 'str', '');
        $p_vat_type_id = getVarClean('p_vat_type_id', 'str', '');
        $p_settlement_type_id   = getVarClean('p_settlement_type_id', 'str', '');
        $p_payment_type_id   = getVarClean('p_payment_type_id', 'str', '');

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan');
            $table = $ci->t_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan;

            $result = $table->getData($p_settlement_type_id, $p_payment_type_id, $p_vat_type_id, $date_start_laporan, $date_end_laporan);

            //startExcel(date("dmy") . '_laporan_pembayaran_berdasarkan_cara_bayar.xls');
            startExcel('laporan_pembayaran.xls');
            echo '<html>';
            echo '<head><title>LAPORAN PEMBAYARAN BERDASARKAN CARA BAYAR</title></head>';
            echo '<body>';
            echo '<h2>LAPORAN PEMBAYARAN BERDASARKAN CARA BAYAR<h2/>';
            echo '<h2>PERIODE PENETAPAN : '.$date_start_laporan.' s.d. '.$date_end_laporan.'</h2>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th align="center">NO</th>';
            echo '<th align="center">JENIS PAJAK</th>';
            echo '<th align="center">AYAT PAJAK</th>';
            echo '<th align="center">NAMA</th>';
            echo '<th align="center">NPWPD</th>';
            echo '<th align="center">MASA PAJAK</th>';
            echo '<th align="center">TGL TAP</th>';
            echo '<th align="center">TOTAL HARUS DIBAYAR</th>';
            echo '<th align="center">STATUS BAYAR</th>';            
            echo '<th align="center">CARA BAYAR</th>';           
            echo '<th align="center">TANGGAL BAYAR</th>';           
            echo '<th align="center">BESARNYA</th>';           
            echo '<th align="center">SISA</th>';
            echo '</tr>';
            
            $no = 0;
            $jumlahtemp = 0;    
            $total=0;

            $jumlah =0;
            $jumlah_realisasi =0;
            $jumlah_sisa =0;

            for ($i = 0; $i < count($result); $i++) {
                $temp = $result[$i]['total_vat_amount']+$result[$i]['total_penalty_amount'];
                $temp_sisa = $temp - $result[$i]['payment_amount'];
                $jumlah = $jumlah + $temp;
                $jumlah_realisasi = $jumlah_realisasi + $result[$i]['payment_amount'];
                $jumlah_sisa = $jumlah_sisa + $temp_sisa;

                echo '<tr><td align="center" >'.($i+1).'</td>';
                echo '<td align="left" >'.$result[$i]['jenis_pajak'].'</td>';
                echo '<td align="left" >'.$result[$i]['ayat_pajak'].'</td>';
                echo '<td align="left" >'.$result[$i]['wp_name'].'</td>';
                echo '<td align="left" >'.$result[$i]['npwpd'].'</td>';
                echo '<td align="left" >'.$result[$i]['masa_pajak'].'</td>';
                echo '<td align="left" >'.$result[$i]['tgl_tap'].'</td>';
                echo '<td align="right" >'.number_format($temp, 2, ',', '.').'</td>';
                
                if ($result[$i]['payment_date']=='') {
                    echo '<td align="left" >Belum Bayar</td>';
                }else{
                    echo '<td align="left" >Sudah Bayar</td>';
                }
                echo '<td align="left" >'.$result[$i]['p_payment_type_code'].'</td>';
                echo '<td align="left" >'.$result[$i]['payment_date'].'</td>';
                echo '<td align="right" >'.number_format($result[$i]['payment_amount'], 2, ',', '.').'</td>';
                echo '<td align="right" >'.number_format($temp-$result[$i]['payment_amount'], 2, ',', '.').'</td>';
                echo '</tr>';
            }


            echo '<tr><td align="center" colspan=7 >Jumlah</td>';
            echo '<td align="right">'.number_format($jumlah, 2, ',', '.').'</td>';
            echo '<td align="center" colspan=3 ></td>';
            echo '<td align="right">'.number_format($jumlah_realisasi, 2, ',', '.').'</td>';
            echo '<td align="right">'.number_format($jumlah_sisa, 2, ',', '.').'</td>';
            echo '</tr>';

            echo '</table></br></br>';

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
                        <td align="center" colspan=3 width="50%">KEPALA VERIFIKASI, OTORISASI DAN PEMBUKUAN</td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%">PAJAK PENDAFTARAN</td>
                        <td align="center" colspan=5 width="50%"></td>
                        <td align="center" colspan=3 width="50%">BIDANG PAJAK PENDAFTARAN</td>
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
                        <td align="center" colspan=3 width="50%">Drs. H. DEDEN SAEPULLOH, MM</td>
                     </tr>
                     <tr>
                        <td></td>
                        <td align="center" colspan=2 width="50%">NIP. 19700806 199101 1001</td>
                        <td align="center" colspan=5 width="50%"></td>
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
        
}

/* End of file t_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan_controller.php.php */