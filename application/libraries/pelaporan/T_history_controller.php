 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_history_controller.php
* @version 07/05/2015 12:18:00
*/
class T_history_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('t_vat_setllement_id', 'int', 0);
        $sord = getVarClean('sord', 'str', 'asc');
        $date_start_laporan = getVarClean('date_start_laporan','str','');
        $date_end_laporan = getVarClean('date_end_laporan','str','');
        $npwd = getVarClean('npwd','str','');
        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        if(($sidx = '' || $sidx == 0) && $date_start_laporan == '' && $date_end_laporan == '' && $npwd == '' && ($p_vat_type_id == '' || $p_vat_type_id == 0)){
            $ci = & get_instance();
            $ci->load->model('pelaporan/t_history');
            $table = $ci->t_history;
        }else{
            try {

                $ci = & get_instance();
                $ci->load->model('pelaporan/t_history');
                $table = $ci->t_history;
                 
                $result = $table->getData_history($npwd, $p_vat_type_id, $date_start_laporan, $date_end_laporan);


                
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

    function excel(){
        $date_start_laporan = getVarClean('date_start_laporan','str','');
        $date_end_laporan   = getVarClean('date_end_laporan','str','');
        $npwd               = getVarClean('npwd','str','');
        $p_vat_type_id      = getVarClean('p_vat_type_id','int',0);

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_history');
            $table = $ci->t_history;

            //echo "getBpps2($sidx, $tgl_penerimaan, $i_flag_setoran, $kode_bank, $status)";
            $result = $table->getData_history($npwd, $p_vat_type_id, $date_start_laporan, $date_end_laporan);

            startExcel("history.xls");
    
            
            echo '<table id="table-piutang" class="grid-table-container" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td valign="top">';

            echo '<table class="grid-table" border="0" cellspacing="0" cellpadding="0" width="900">
                            <tr>
                                <td class="th"><strong>HISTORY</strong></td> 
                            </tr>
                            </table>';
            
            echo '<table id="table-piutang-detil" class="Grid" border="1" cellspacing="0" cellpadding="3px" width="100%">
                        <tr >';

            echo '<th align="center" >NO</th>';
            echo '<th align="center" >NPWPD</th>';
            echo '<th align="center" >PERIODE</th>';
            echo '<th align="center" >TANGAL TAP</th>';
            echo '<th align="center" >Execute By</th>';
            echo '<th align="center" >Modification Type</th>';
            echo '<th align="center" >Modification Date</th>';
            echo '<th align="center" >Reason</th>';
            echo '</tr>';
            
            $no = 0;
            if ($result != 'no result'){
                foreach ($result as $item) {
                    echo '<tr><td align="center" >'.($no+1).'</td>';
                    echo '<td align="left" >'.$item['npwd'].'</td>';
                    echo '<td align="left" >'.$item['periode_code'].'</td>';
                    echo '<td align="left" >'.$item['type_code'].'</td>';
                    echo '<td align="left" >'.$item['settlement_date'].'</td>';
                    echo '<td align="left" >'.$item['modified_by'].'</td>';
                    echo '<td align="left" >'.$item['modification_type'].'</td>';
                    echo '<td align="left" >'.$item['alasan'].'</td>';
                    echo '</tr>';
                    $no++;
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

/* End of file T_history_controller.php.php */