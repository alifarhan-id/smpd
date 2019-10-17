<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class t_laporan_daftar_bphtb_controller
* @version 07/05/2015 12:18:00
*/
class T_rep_lap_bpps_piutang2_controller {

    function read()
    {
        $p_vat_type_id        = getVarClean('p_vat_type_id', 'int', 0);
        $p_year_period_id     = getVarClean('p_year_period_id', 'int', 0);
        $tgl_penerimaan       = getVarClean('tgl_penerimaan','str','');
        $tgl_penerimaan_last  = getVarClean('tgl_penerimaan_last', 'str', '');
        $jenis_setoran        = getVarClean('jenis_setoran', 'str', '');
        $jenis_laporan        = getVarClean('jenis_laporan', 'str', 'all');
        $year_date            = getVarClean('year_date', 'str', '');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {
            if (!empty($p_vat_type_id)&&!empty($p_year_period_id)&&!empty($tgl_penerimaan_last)&&!empty($jenis_setoran)&&!empty($tgl_penerimaan)&&!empty($jenis_laporan)&&!empty($year_date)){
            	$ci = & get_instance();
                $ci->load->model('pelaporan/t_rep_lap_bpps_piutang2');
                $table = $ci->t_rep_lap_bpps_piutang2;

                $param =  array('p_vat_type_id' =>$p_vat_type_id,
	                        'p_year_period_id'=>$p_year_period_id,
	                        'tgl_penerimaan'=>$tgl_penerimaan,
	                        'tgl_penerimaan_last'=>$tgl_penerimaan_last,
	                        'jenis_setoran'=>$jenis_setoran,
	                        'jenis_laporan'=>$jenis_laporan,
	                        'year_date'=>$year_date );

	           // print_r($param);exit;
	            if ($jenis_laporan=='all'){
	            	$items = $table->getJenisLapAll($param);
	            }else  if ($jenis_laporan=='piutang'){
	            	$items = $table->getJenisLapPiutang($param);
	            }else  if ($jenis_laporan=='murni'){
	            	$items = $table->getJenisLapMurni($param);
	            }

                //$count = $table->countAll();

                /*if ($count > 0) $total_pages = ceil($count / $limit);
                else $total_pages = 1;

                if ($page > $total_pages) $page = $total_pages;
                $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

                

                if ($page == 0) $data['page'] = 1;
                else $data['page'] = $page;*/

                $data['total'] = 0;//$total_pages;
                $data['records'] = 0;//$count;

                $data['rows'] = $items;
                
            }
            $data['success'] = true;
            return $data;
        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;    
    }

    function read2()
    {
        $p_vat_type_id        = getVarClean('p_vat_type_id', 'int', 0);
        $p_year_period_id     = getVarClean('p_year_period_id', 'int', 0);
        $tgl_penerimaan       = getVarClean('tgl_penerimaan','str','');
        $tgl_penerimaan_last  = getVarClean('tgl_penerimaan_last', 'str', '');
        $jenis_setoran        = getVarClean('jenis_setoran', 'str', '');
        $jenis_laporan        = getVarClean('jenis_laporan', 'str', 'all');
        $year_date            = getVarClean('year_date', 'str', '');
        
        $data = array('rows' => array(), 'model' => array(),'jenis_laporan'=>$jenis_laporan,'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {
            if (!empty($p_vat_type_id)&&!empty($p_year_period_id)&&!empty($tgl_penerimaan_last)&&!empty($jenis_setoran)&&!empty($tgl_penerimaan)&&!empty($jenis_laporan)&&!empty($year_date)){
            	$ci = & get_instance();
                $ci->load->model('pelaporan/t_rep_lap_bpps_piutang2');
                $table = $ci->t_rep_lap_bpps_piutang2;

                $param =  array('p_vat_type_id' =>$p_vat_type_id,
	                        'p_year_period_id'=>$p_year_period_id,
	                        'tgl_penerimaan'=>$tgl_penerimaan,
	                        'tgl_penerimaan_last'=>$tgl_penerimaan_last,
	                        'jenis_setoran'=>$jenis_setoran,
	                        'jenis_laporan'=>$jenis_laporan,
	                        'year_date'=>$year_date );

	            
	            if ($jenis_laporan=='all'){
	            	$items = $table->getJenisLapAll2($param);
	            }else  if ($jenis_laporan=='piutang'){
	            	$items = $table->getJenisLapPiutang2($param);
	            }else  if ($jenis_laporan=='murni'){
	            	$items = $table->getJenisLapMurni2($param);
	            }

                $new_data =array();
                $temp_npwpd = '';
                $counter =0;
                $x=1;
                $before=$items[0];


                //print_r($items);exit;
                if($jenis_laporan=='all'){

                    $bulan = array('model' =>  array('before_desember'=>'SEBELUM DESEMBER',
                                                     'desember_old'=>'DESEMBER',
                                                     'januari'=>'JANUARI',
                                                     'februari'=>'FEBRUARI',
                                                     'maret'=>'MARET',
                                                     'april'=>'APRIL',
                                                     'mei'=>'MEI',
                                                     'juni'=>'JUNI',
                                                     'juli'=>'JULI', 
                                                     'agustus'=>'AGUSTUS', 
                                                     'september'=>'SEPTEMBER',
                                                     'oktober'=>'OKTOBER',
                                                     'november'=>'NOVEMBER',
                                                     'affter_november'=>'SETELAH NOVEMBER' ), 
                                    'nama' =>  array(-1=>'before_desember',0=>'desember_old',1=>'januari',
                                                    2=>'februari',3=>'maret',4=>'april',
                                                    5=>'mei',6=>'juni',7=>'juli', 
                                                    8=>'agustus', 9=>'september',10=>'oktober',
                                                    11=>'november',12=>'affter_november' ), 
                                    'jumlah'=>array(-1=>0,0=>0,1=>0,
                                                    2=>0,3=>0,4=>0,
                                                    5=>0,6=>0,7=>0,
                                                    8=>0,9=>0,10=>0,
                                                    11=>0 ,12=>0)
                                );

                    for($i=0;$i<count($items);$i++){

                        $bln = ltrim(substr($items[$i]["masa_pajak"],-7,2),'0');
                        $thn = substr($items[$i]["masa_pajak"],-4,4);

                        if ($thn == $year_date && $bln != 12){
                            $bulan['jumlah'][$bln]=$bulan['jumlah'][$bln]+$items[$i]["jumlah_terima"];
                        }else{
                            if ($thn == ($year_date - 1) && $bln == 12){
                                $bulan['jumlah'][0]=$bulan['jumlah'][0]+$items[$i]["jumlah_terima"];
                            }else{
                                if ($thn < $year_date){
                                    $bulan['jumlah'][-1]=$bulan['jumlah'][-1]+$items[$i]["jumlah_terima"];
                                }else{
                                    if (($thn == $year_date && $bln == 12)||($thn > $year_date)){
                                        $bulan['jumlah'][12]=$bulan['jumlah'][13]+$items[$i]["jumlah_terima"];
                                    }
                                }
                            }
                        }
                        

                        if($x==count($items))
                            $x=0;

                        if ($before['npwpd']!=$items[$x]['npwpd']||count($items)==1){
                            $temp_jumlah =0;
                            $new_data [$counter]['no_ayat'] = $items[$i]["kode_jns_pajak"]." ".$items[$i]["kode_ayat"];
                            $new_data [$counter]['jns_pajak'] = $items[$i]["jns_pajak"];
                            $new_data [$counter]['nama_ayat'] = $items[$i]["nama_ayat"];
                            $new_data [$counter]['wp_name'] = $items[$i]["wp_name"];
                            $new_data [$counter]['npwpd'] = $items[$i]["npwpd"];
                            $new_data [$counter]['address'] = $items[$i]["address"];
                             for($j=-1;$j<count($bulan['nama'])-1;$j++){
                                $new_data [$counter][$bulan['nama'][$j]] = $bulan['jumlah'][$j];
                                $temp_jumlah += $bulan['jumlah'][$j];
                                $bulan['jumlah'][$j] = 0;
                            }
                            $new_data [$counter]['jumlah'] = $temp_jumlah;
                            $counter++;
                        }
                        $before = $items[$x];
                        $x++;
                    }
                }else if($jenis_laporan=='piutang'){

                    $bulan = array( 'model' =>  array('before_desember'=>'SEBELUM DESEMBER',
                                                     'desember_old'=>'DESEMBER',
                                                     'januari'=>'JANUARI',
                                                     'februari'=>'FEBRUARI',
                                                     'maret'=>'MARET',
                                                     'april'=>'APRIL',
                                                     'mei'=>'MEI',
                                                     'juni'=>'JUNI',
                                                     'juli'=>'JULI', 
                                                     'agustus'=>'AGUSTUS', 
                                                     'september'=>'SEPTEMBER',
                                                     'oktober'=>'OKTOBER',
                                                     'november'=>'NOVEMBER',
                                                     'desember'=>'DESEMBER' ), 
                                    'nama' =>  array(-1=>'before_desember',0=>'desember_old',1=>'januari',
                                                    2=>'februari',3=>'maret',4=>'april',
                                                    5=>'mei',6=>'juni',7=>'juli', 
                                                    8=>'agustus', 9=>'september',10=>'oktober',
                                                    11=>'november',12=>'desember' ), 
                                    'jumlah'=>array(-1=>0,0=>0,1=>0,
                                                    2=>0,3=>0,4=>0,
                                                    5=>0,6=>0,7=>0,
                                                    8=>0,9=>0,10=>0,
                                                    11=>0 ,12=>0)
                                );

                    for($i=0;$i<count($items);$i++){

                        $bln = ltrim(substr($items[$i]["masa_pajak"],-7,2),'0');
                        $thn = substr($items[$i]["masa_pajak"],-4,4);

                        if ($thn == ($year_date-1) && $bln != 12){
                            $bulan['jumlah'][$bln]=$bulan['jumlah'][$bln]+$items[$i]["jumlah_terima"];
                        }else{
                            if ($thn == ($year_date - 2) && $bln == 12){
                                $bulan['jumlah'][0]=$bulan['jumlah'][0]+$items[$i]["jumlah_terima"];
                            }else{
                                if ($thn < $year_date){
                                    $bulan['jumlah'][-1]=$bulan['jumlah'][-1]+$items[$i]["jumlah_terima"];
                                }else{
                                    if (($thn == $year_date && $bln == 12)){
                                        $bulan['jumlah'][12]=$bulan['jumlah'][13]+$items[$i]["jumlah_terima"];
                                    }
                                }
                            }
                        }
                        if($x==count($items))
                            $x=0;

                        if ($before['npwpd']!=$items[$x]['npwpd']||count($items)==1){
                            $temp_jumlah =0;
                            $new_data [$counter]['no_ayat'] = $items[$i]["kode_jns_pajak"]." ".$items[$i]["kode_ayat"];
                            $new_data [$counter]['jns_pajak'] = $items[$i]["jns_pajak"];
                            $new_data [$counter]['nama_ayat'] = $items[$i]["nama_ayat"];
                            $new_data [$counter]['wp_name'] = $items[$i]["wp_name"];
                            $new_data [$counter]['npwpd'] = $items[$i]["npwpd"];
                            $new_data [$counter]['address'] = $items[$i]["address"];
                            for($j=-1;$j<count($bulan['nama'])-1;$j++){
                                $new_data [$counter][$bulan['nama'][$j]] = $bulan['jumlah'][$j];
                                $temp_jumlah += $bulan['jumlah'][$j];
                                $bulan['jumlah'][$j] = 0;
                            }
                            $new_data [$counter]['jumlah'] = $temp_jumlah;
                            $counter++;
                        }
                        $before = $items[$x];
                        $x++;
                    }
                }else if($jenis_laporan=='murni'){

                    $bulan = array('model' =>  array('desember_old'=>'DESEMBER',
                                                     'januari'=>'JANUARI',
                                                     'februari'=>'FEBRUARI',
                                                     'maret'=>'MARET',
                                                     'april'=>'APRIL',
                                                     'mei'=>'MEI',
                                                     'juni'=>'JUNI',
                                                     'juli'=>'JULI', 
                                                     'agustus'=>'AGUSTUS', 
                                                     'september'=>'SEPTEMBER',
                                                     'oktober'=>'OKTOBER',
                                                     'november'=>'NOVEMBER'), 
                                    'nama' =>  array(0=>'desember_old',1=>'januari',2=>'februari',
                                                    3=>'maret',4=>'april',5=>'mei',
                                                    6=>'juni',7=>'juli', 8=>'agustus', 
                                                    9=>'september',10=>'oktober',11=>'november' ), 
                                    'jumlah'=>array(0=>0,1=>0,2=>0,
                                                    3=>0,4=>0,5=>0,
                                                    6=>0,7=>0,8=>0,
                                                    9=>0,10=>0,11=>0 )
                                );

                    for($i=0;$i<count($items);$i++){

                        $bln = ltrim(substr($items[$i]["masa_pajak"],-7,2),'0');
                        $thn = substr($items[$i]["masa_pajak"],-4,4);

                        if ($bln==12)
                            $bln =0;
                        $bulan['jumlah'][$bln]=$bulan['jumlah'][$bln]+$items[$i]["jumlah_terima"];

                        if($x==count($items))
                            $x=0;

                        if ($before['npwpd']!=$items[$x]['npwpd']||count($items)==1){
                            $temp_jumlah =0;
                            $new_data [$counter]['no_ayat'] = $items[$i]["kode_jns_pajak"]." ".$items[$i]["kode_ayat"];
                            $new_data [$counter]['jns_pajak'] = $items[$i]["jns_pajak"];
                            $new_data [$counter]['nama_ayat'] = $items[$i]["nama_ayat"];
                            $new_data [$counter]['wp_name'] = $items[$i]["wp_name"];
                            $new_data [$counter]['npwpd'] = $items[$i]["npwpd"];
                            $new_data [$counter]['address'] = $items[$i]["address"];

                            for($j=0;$j<count($bulan['nama']);$j++){
                                $new_data [$counter][$bulan['nama'][$j]] = $bulan['jumlah'][$j];
                                $temp_jumlah += $bulan['jumlah'][$j];
                                $bulan['jumlah'][$j] = 0;
                            }

                            $new_data [$counter]['jumlah'] = $temp_jumlah;
                            $counter++;
                        }
                        $before = $items[$x];
                        $x++;
                    }

                } 

                $label = array();
                $label['no_ayat']['label']='NO AYAT';
                $label['no_ayat']['name']='no_ayat';
                $label['jns_pajak']['label']='JENIS PAJAK';
                $label['jns_pajak']['name']='jns_pajak';
                $label['wp_name']['label']='NAMA WP';
                $label['wp_name']['name']='wp_name';
                $label['nama_ayat']['label']='NAMA AYAT';
                $label['nama_ayat']['name']='nama_ayat';
                $label['npwpd']['label']='NPWPD';
                $label['npwpd']['name']='npwpd';
                $label['address']['label']='ALAMAT';
                $label['address']['name']='address';
                $label['jumlah']['label']='JUMLAH';
                $label['jumlah']['name']='jumlah';
                

                if ($jenis_laporan=='murni'){
                    $jumlah = count($bulan['model']);
                    $conter = 0;
                }else{
                    $jumlah = count($bulan['model'])-1;
                    $conter = -1;
                }

                for($i=$conter;$i<$jumlah;$i++){
                    $thn = $year_date;
                    
                    if ($jenis_laporan=='all'){
                        if ($i==0||$i==-1)
                            $thn = $year_date-1;
                    }else  if ($jenis_laporan=='piutang'){
                        $thn = $year_date-1;
                        if ($i==0||$i==-1)
                            $thn = $year_date-2;

                        if ($i==12)
                            $thn = $year_date;
                    }else  if ($jenis_laporan=='murni'){
                        if ($i==0)
                            $thn = $year_date-1;
                    }
                    
                    if ($jenis_laporan=='piutang' && $i==$jumlah-1){
                        $nama = $bulan['nama'][$i];
                        $label['affter_november']['label']=$bulan['model'][$nama]." ".$thn;
                    }else{
                        $nama = $bulan['nama'][$i];
                        $label[$nama]['label']=$bulan['model'][$nama]." ".$thn;
                    }
                    
                    $label[$nama]['name']=$nama;
                }


                $data['model'] =$label;

                //print_r($new_data);exit;

                $data['total'] = 0;//$total_pages;
                $data['records'] = 0;//$count;

                $data['rows'] = $new_data;
                
            }
            $data['success'] = true;
            return $data;
        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;  
    }

    function read3()
    {
        $p_vat_type_id        = getVarClean('p_vat_type_id', 'int', 0);
        $p_year_period_id     = getVarClean('p_year_period_id', 'int', 0);
        $tgl_penerimaan       = getVarClean('tgl_penerimaan','str','');
        $tgl_penerimaan_last  = getVarClean('tgl_penerimaan_last', 'str', '');
        $jenis_setoran        = getVarClean('jenis_setoran', 'str', '');
        $jenis_laporan        = getVarClean('jenis_laporan', 'str', 'all');
        $year_date            = getVarClean('year_date', 'str', '');
        
        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        
        try {
            if (!empty($p_vat_type_id)&&!empty($p_year_period_id)&&!empty($tgl_penerimaan_last)&&!empty($jenis_setoran)&&!empty($tgl_penerimaan)&&!empty($jenis_laporan)&&!empty($year_date)){
                $ci = & get_instance();
                $ci->load->model('pelaporan/t_rep_lap_bpps_piutang2');
                $table = $ci->t_rep_lap_bpps_piutang2;

                $param =  array('p_vat_type_id' =>$p_vat_type_id,
                            'p_year_period_id'=>$p_year_period_id,
                            'tgl_penerimaan'=>$tgl_penerimaan,
                            'tgl_penerimaan_last'=>$tgl_penerimaan_last,
                            'jenis_setoran'=>$jenis_setoran,
                            'jenis_laporan'=>$jenis_laporan,
                            'year_date'=>$year_date );

               
                if ($jenis_laporan=='all'){
                    $items = $table->getJenisLapAll2($param);
                }else  if ($jenis_laporan=='piutang'){
                    $items = $table->getJenisLapPiutang2($param);
                }else  if ($jenis_laporan=='murni'){
                    $items = $table->getJenisLapMurni2($param);
                }

                
                $new_data =array();
                $temp_npwpd = '';
                $counter =0;
                $x=1;
                $before=$items[0];


                //print_r($items);exit;
                if($jenis_laporan=='all'){

                    $bulan = array('nama' =>  array(-1=>'SEBELUM DESEMBER',0=>'DESEMBER',1=>'JANUARI',2=>'FEBRUARI',3=>'MARET',4=>'APRIL',5=>'MEI',6=>'JUNI',7=>'JULI', 8=>'AGUSTUS', 9=>'SEPTEMBER',10=>'OKTOBER',11=>'NOVEMBER',12=>'SETELAH NOVEMBER' ), 
                                'jumlah'=>array(-1=>0,0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0 ,12=>0));

                    for($i=0;$i<count($items);$i++){

                        $bln = ltrim(substr($items[$i]["masa_pajak"],-7,2),'0');
                        $thn = substr($items[$i]["masa_pajak"],-4,4);

                        if ($thn == $year_date && $bln != 12){
                            $bulan['jumlah'][$bln]=$bulan['jumlah'][$bln]+$items[$i]["jumlah_terima"];
                        }else{
                            if ($thn == ($year_date - 1) && $bln == 12){
                                $bulan['jumlah'][0]=$bulan['jumlah'][0]+$items[$i]["jumlah_terima"];
                            }else{
                                if ($thn < $year_date){
                                    $bulan['jumlah'][-1]=$bulan['jumlah'][-1]+$items[$i]["jumlah_terima"];
                                }else{
                                    if (($thn == $year_date && $bln == 12)||($thn > $year_date)){
                                        $bulan['jumlah'][12]=$bulan['jumlah'][13]+$items[$i]["jumlah_terima"];
                                    }
                                }
                            }
                        }
                        

                        if($x==count($items))
                            $x=0;

                        if ($before['npwpd']!=$items[$x]['npwpd']||count($items)==1){
                            //echo $before['npwpd'].' - '.$items[$i]['npwpd'].' =====================';
                             for($j=-1;$j<count($bulan['nama'])-1;$j++){
                                $thn = $year_date;
                                if ($j==0||$j==-1)
                                    $thn = $year_date-1;

                                $new_data [$counter]['no_ayat'] = $items[$i]["kode_jns_pajak"]." ".$items[$i]["kode_ayat"];
                                $new_data [$counter]['jns_pajak'] = $items[$i]["jns_pajak"];
                                $new_data [$counter]['nama_ayat'] = $items[$i]["nama_ayat"];
                                $new_data [$counter]['wp_name'] = $items[$i]["wp_name"];
                                $new_data [$counter]['npwpd'] = $items[$i]["npwpd"];
                                $new_data [$counter]['address'] = $items[$i]["address"];
                                $new_data [$counter]['bulan'] = $bulan['nama'][$j]." ".$thn;
                                $new_data [$counter]['jumlah'] = $bulan['jumlah'][$j];
                                $bulan['jumlah'][$j] = 0;
                                $counter++;
                            }
                        }
                        $before = $items[$x];
                        $x++;
                    }

                }else if($jenis_laporan=='piutang'){

                    $bulan = array('nama' =>  array(-1=>'SEBELUM DESEMBER',0=>'DESEMBER',1=>'JANUARI',2=>'FEBRUARI',3=>'MARET',4=>'APRIL',5=>'MEI',6=>'JUNI',7=>'JULI', 8=>'AGUSTUS', 9=>'SEPTEMBER',10=>'OKTOBER',11=>'NOVEMBER',12=>'DESEMBER' ), 
                                'jumlah'=>array(-1=>0,0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0 ,12=>0));

                    for($i=0;$i<count($items);$i++){

                        $bln = ltrim(substr($items[$i]["masa_pajak"],-7,2),'0');
                        $thn = substr($items[$i]["masa_pajak"],-4,4);

                        if ($thn == ($year_date-1) && $bln != 12){
                            $bulan['jumlah'][$bln]=$bulan['jumlah'][$bln]+$items[$i]["jumlah_terima"];
                        }else{
                            if ($thn == ($year_date - 2) && $bln == 12){
                                $bulan['jumlah'][0]=$bulan['jumlah'][0]+$items[$i]["jumlah_terima"];
                            }else{
                                if ($thn < $year_date){
                                    $bulan['jumlah'][-1]=$bulan['jumlah'][-1]+$items[$i]["jumlah_terima"];
                                }else{
                                    if (($thn == $year_date && $bln == 12)){
                                        $bulan['jumlah'][12]=$bulan['jumlah'][13]+$items[$i]["jumlah_terima"];
                                    }
                                }
                            }
                        }
                        

                        if($x==count($items))
                            $x=0;

                        if ($before['npwpd']!=$items[$x]['npwpd']||count($items)==1){
                            //echo $before['npwpd'].' - '.$items[$i]['npwpd'].' =====================';
                             for($j=-1;$j<count($bulan['nama'])-1;$j++){
                                $thn = $year_date-1;
                                if ($j==0||$j==-1)
                                    $thn = $year_date-2;

                                if ($j==12)
                                    $thn = $year_date;

                                $new_data [$counter]['no_ayat'] = $items[$i]["kode_jns_pajak"]." ".$items[$i]["kode_ayat"];
                                $new_data [$counter]['jns_pajak'] = $items[$i]["jns_pajak"];
                                $new_data [$counter]['nama_ayat'] = $items[$i]["nama_ayat"];
                                $new_data [$counter]['wp_name'] = $items[$i]["wp_name"];
                                $new_data [$counter]['npwpd'] = $items[$i]["npwpd"];
                                $new_data [$counter]['address'] = $items[$i]["address"];
                                $new_data [$counter]['bulan'] = $bulan['nama'][$j]." ".$thn;
                                $new_data [$counter]['jumlah'] = $bulan['jumlah'][$j];
                                $bulan['jumlah'][$j] = 0;
                                $counter++;
                            }
                        }
                        $before = $items[$x];
                        $x++;
                    }
                }else if($jenis_laporan=='murni'){

                    $bulan = array('nama' =>  array(0=>'DESEMBER',1=>'JANUARI',2=>'FEBRUARI',3=>'MARET',4=>'APRIL',5=>'MEI',6=>'JUNI',7=>'JULI', 8=>'AGUSTUS', 9=>'SEPTEMBER',10=>'OKTOBER',11=>'NOVEMBER' ), 
                                'jumlah'=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0 ));

                    for($i=0;$i<count($items);$i++){

                        $bln = ltrim(substr($items[$i]["masa_pajak"],-7,2),'0');
                        $thn = substr($items[$i]["masa_pajak"],-4,4);

                        if ($bln==12)
                            $bln =0;
                        $bulan['jumlah'][$bln]=$bulan['jumlah'][$bln]+$items[$i]["jumlah_terima"];

                        if($x==count($items))
                            $x=0;

                        if ($before['npwpd']!=$items[$x]['npwpd']||count($items)==1){
                            //echo $before['npwpd'].' - '.$items[$i]['npwpd'].' =====================';
                             for($j=0;$j<count($bulan['nama']);$j++){
                                $thn = $year_date;
                                if ($j==0)
                                    $thn = $year_date-1;

                                $new_data [$counter]['no_ayat'] = $items[$i]["kode_jns_pajak"]." ".$items[$i]["kode_ayat"];
                                $new_data [$counter]['jns_pajak'] = $items[$i]["jns_pajak"];
                                $new_data [$counter]['nama_ayat'] = $items[$i]["nama_ayat"];
                                $new_data [$counter]['wp_name'] = $items[$i]["wp_name"];
                                $new_data [$counter]['npwpd'] = $items[$i]["npwpd"];
                                $new_data [$counter]['address'] = $items[$i]["address"];
                                $new_data [$counter]['bulan'] = $bulan['nama'][$j]." ".$thn;
                                $new_data [$counter]['jumlah'] = $bulan['jumlah'][$j];
                                $bulan['jumlah'][$j] = 0;
                                $counter++;
                            }
                        }
                        $before = $items[$x];
                        $x++;
                    }

                } 

                $data['total'] = 0;//$total_pages;
                $data['records'] = 0;//$count;

                $data['rows'] = $new_data;
                
            }
            $data['success'] = true;
            return $data;
        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;    
    }

    
}

/* End of file Groups_controller.php */