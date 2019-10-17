 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_rep_lap_tingkat_kepatuhan_wp_controller
* @version 07/05/2015 12:18:00
*/
class T_idx_kepatuhan_wp_controller {
 
    function excel(){
        $p_vat_type_id = getVarClean('p_vat_type_id','int',0);
        $p_year_period_id = getVarClean('p_year_period_id','int',0);
        $status  = getVarClean('status','int',0);
        $tahun = getVarClean('tahun','str', '');
        $pajak  = getVarClean('pajak','str', '');

        try {

            $ci = &get_instance();
            $ci->load->model('pelaporan/t_idx_kepatuhan_wp');
            $table = $ci->t_idx_kepatuhan_wp;
            // print_r($result);
            // exit();
            

            startExcel(date("dmy") . '_laporan_index_kepatuhan_wp_'.$tahun.'_'.str_replace(' ', '', $pajak).'.xls');
            echo '<html>';
            echo '<head><title>LAPORAN INDEX KEPATUHAN WP</title></head>';
            echo '<body>';
            echo "<div><h3> INDEX KEPATUHAN WAJIB PAJAK </h3></div>";   
            echo "<div><b>TAHUN PAJAK : ".$tahun."</b></div>"; 
            echo "<div><b>JENIS PAJAK : ".$pajak."</b></div>";

            echo '<br/> <h4> <u>I. RANKING BESAR </u></h4> 
                <table border="1">
                    <tr>
                        <th width="25">NO</th>
                        <th width="150">NAMA WP </th>
                        <th width="300">ALAMAT</th>
                        <th width="150">NPWPD</th>
                        <th width="150">RATA-RATA <br/> TGL BAYAR</th>
                        <th width="150">RATA-RATA <br/> PEMBAYARAN</th>
                    </tr>';
            $result = $table->getData($p_year_period_id, $p_vat_type_id, $status, 'b');   
            for($i=0; $i<count($result); $i++){
                echo '<tr>';
                    echo '<td>'.($i+1).'</td>';
                    echo '<td>'.$result[$i]['nama'].'</td>';
                    echo '<td>'.$result[$i]['alamat'].'</td>';
                    echo '<td>'.$result[$i]['npwpd'].'</td>';
                    echo '<td align="right">'.$result[$i]['rata_rata_tgl_byr'].'</td>';
                    echo '<td align="right">'.$result[$i]['rata_rata_pembayaran'].'</td>';
                echo '</tr>';
            }
            echo '</table>';

            echo '<br/><br/> <h4><u>II. RANKING MENENGAH </u></h4> 
                <table border="1">
                    <tr>
                        <th width="25">NO</th>
                        <th width="150">NAMA WP </th>
                        <th width="300">ALAMAT</th>
                        <th width="150">NPWPD</th>
                        <th width="150">RATA-RATA <br/> TGL BAYAR</th>
                        <th width="150">RATA-RATA <br/> PEMBAYARAN</th>
                    </tr>';
            $result = $table->getData($p_year_period_id, $p_vat_type_id, $status, 'm');           
            for($i=0; $i<count($result); $i++){
                echo '<tr>';
                    echo '<td>'.($i+1).'</td>';
                    echo '<td>'.$result[$i]['nama'].'</td>';
                    echo '<td>'.$result[$i]['alamat'].'</td>';
                    echo '<td>'.$result[$i]['npwpd'].'</td>';
                    echo '<td align="right">'.$result[$i]['rata_rata_tgl_byr'].'</td>';
                    echo '<td align="right">'.$result[$i]['rata_rata_pembayaran'].'</td>';
                echo '</tr>';
            }       
            echo '</table>';

            echo '<br/><br/> <h4><u>III. RANKING KECIL </u></h4> 
                <table border="1">
                    <tr>
                        <th width="25">NO</th>
                        <th width="150">NAMA WP </th>
                        <th width="300">ALAMAT</th>
                        <th width="150">NPWPD</th>
                        <th width="150">RATA-RATA <br/> TGL BAYAR</th>
                        <th width="150">RATA-RATA <br/> PEMBAYARAN</th>
                    </tr>';
            $result = $table->getData($p_year_period_id, $p_vat_type_id, $status, 'k');           
            for($i=0; $i<count($result); $i++){
                echo '<tr>';
                    echo '<td>'.($i+1).'</td>';
                    echo '<td>'.$result[$i]['nama'].'</td>';
                    echo '<td>'.$result[$i]['alamat'].'</td>';
                    echo '<td>'.$result[$i]['npwpd'].'</td>';
                    echo '<td align="right">'.$result[$i]['rata_rata_tgl_byr'].'</td>';
                    echo '<td align="right">'.$result[$i]['rata_rata_pembayaran'].'</td>';
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