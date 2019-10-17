<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_per_bulan extends CI_Controller
{

    function __construct() {
        parent::__construct();
    }


    function showData($p_finance_period_id,$p_vat_type_id) {
        check_login();

        // $p_finance_period_id = getVarClean('p_finance_period_id','int',0);
        // $p_vat_type_id = getVarClean('p_vat_type_id','int',0);

        $sql = "select to_char(i,'dd') as tanggal,nvl(realisasi_harian,0) as realisasi 
                from (select i::date from generate_series((select start_date from p_finance_period where p_finance_period_id=$p_finance_period_id), 
                  (select end_date from p_finance_period where p_finance_period_id=$p_finance_period_id), '1 day'::interval) i) as hari
                left join 
                    (select 
                        trunc(b.payment_date)as tanggal_bayar,
                        sum(b.payment_amount) as realisasi_harian 
                        from t_vat_setllement a
                        left join t_payment_receipt b on a.t_vat_setllement_id=b.t_vat_setllement_id
                        where a.p_vat_type_dtl_id in (select p_vat_type_dtl_id from p_vat_type_dtl where p_vat_type_id=$p_vat_type_id)
                        and b.t_vat_setllement_id is not null
                        and b.payment_date 
                            BETWEEN 
                                (select start_date from p_finance_period where p_finance_period_id=$p_finance_period_id)
                            and 
                                (select end_date from p_finance_period where p_finance_period_id=$p_finance_period_id)
                        GROUP BY tanggal_bayar
                        ORDER BY tanggal_bayar) pembayaran
                    ON pembayaran.tanggal_bayar=hari.i";

        $query = $this->db->query($sql);
        $result = $query->result_array();
        //print_r($result);exit;
        return $result;
    }

    function showDataWP($p_finance_period_id,$p_vat_type_id) {
        check_login();

        // $p_finance_period_id = getVarClean('p_finance_period_id','int',0);
        // $p_vat_type_id = getVarClean('p_vat_type_id','int',0);

        $sql = "select to_char(i,'dd') as tanggal,nvl(realisasi_harian,0) as realisasi 
                from (select i::date from generate_series((select start_date from p_finance_period where p_finance_period_id=$p_finance_period_id), 
                  (select end_date from p_finance_period where p_finance_period_id=$p_finance_period_id), '1 day'::interval) i) as hari
                left join 
                    (select 
                        trunc(b.payment_date)as tanggal_bayar,
                        count(b.payment_amount) as realisasi_harian 
                        from t_vat_setllement a
                        left join t_payment_receipt b on a.t_vat_setllement_id=b.t_vat_setllement_id
                        where a.p_vat_type_dtl_id in (select p_vat_type_dtl_id from p_vat_type_dtl where p_vat_type_id=$p_vat_type_id)
                        and b.t_vat_setllement_id is not null
                        and b.payment_date 
                            BETWEEN 
                                (select start_date from p_finance_period where p_finance_period_id=$p_finance_period_id)
                            and 
                                (select end_date from p_finance_period where p_finance_period_id=$p_finance_period_id)
                        GROUP BY tanggal_bayar
                        ORDER BY tanggal_bayar) pembayaran
                    ON pembayaran.tanggal_bayar=hari.i";

        $query = $this->db->query($sql);
        $result = $query->result_array();
        //print_r($result);exit;
        return $result;
    }

    function showData1() {
        check_login();

        $p_finance_period_id = getVarClean('p_finance_period_id','int',0);

        $data_hotel = $this->showData($p_finance_period_id, 1);
        $data_restoran = $this->showData($p_finance_period_id, 2);
        $data_parkir = $this->showData($p_finance_period_id, 5);
        $data_hiburan = $this->showData($p_finance_period_id, 4);

        $tgl = array();
        $rls_hotel = array();
        $rls_restoran = array();
        $rls_hiburan = array();
        $rls_parkir = array();

        $realisasi = array();
        $tanggal = array();
        for ($i=0; $i <count($data_hotel) ; $i++) { 
            $tgl[$i]= $data_hotel[$i]['tanggal'];
            $rls_hotel[$i]= $data_hotel[$i]['realisasi'];
            $rls_restoran[$i]= $data_restoran[$i]['realisasi'];
            $rls_hiburan[$i]= $data_hiburan[$i]['realisasi'];
            $rls_parkir[$i]= $data_parkir[$i]['realisasi'];

        }

        $tanggal = array(
                            0 => $tgl,
                            1 => $tgl,
                            2 => $tgl,
                            3 => $tgl
                    );

        $realisasi = array(
                            0 => $rls_hotel,
                            1 => $rls_restoran,
                            2 => $rls_hiburan,
                            3 => $rls_parkir
                    );
        
        // print_r($realisasi);exit;
        $vat_code = array('PAJAK HOTEL', 'PAJAK RESTORAN', 'PAJAK HIBURAN', 'PAJAK PARKIR');
        $s_result ="[";
        for ($i=0;$i<count($vat_code);$i++){
            $s_result = $s_result . '["'.$vat_code[$i].'",';
            for ($j=0; $j < count($tanggal[$i]) ; $j++) { 
                $s_result .= $realisasi[$i][$j]. ',';
                

            }

            for ($j=0; $j < count($tanggal[$i]) ; $j++) { 
                $s_result .= '"'.$tanggal[$i][$j]. '",';
                

            }
            $s_result .= '],';

        }

        $s_result = substr($s_result, 0, -1)  ;  
        $s_result = str_replace(',]', ']', $s_result)  ; 
        $s_result = $s_result . "]";
        echo $s_result;
        exit;
        
    }

    function showData2() {
        check_login();

        $p_finance_period_id = getVarClean('p_finance_period_id','int',0);

        $data_hotel = $this->showDataWP($p_finance_period_id, 1);
        $data_restoran = $this->showDataWP($p_finance_period_id, 2);
        $data_parkir = $this->showDataWP($p_finance_period_id, 5);
        $data_hiburan = $this->showDataWP($p_finance_period_id, 4);

        $tgl = array();
        $rls_hotel = array();
        $rls_restoran = array();
        $rls_hiburan = array();
        $rls_parkir = array();

        $realisasi = array();
        $tanggal = array();
        for ($i=0; $i <count($data_hotel) ; $i++) { 
            $tgl[$i]= $data_hotel[$i]['tanggal'];
            $rls_hotel[$i]= $data_hotel[$i]['realisasi'];
            $rls_restoran[$i]= $data_restoran[$i]['realisasi'];
            $rls_hiburan[$i]= $data_hiburan[$i]['realisasi'];
            $rls_parkir[$i]= $data_parkir[$i]['realisasi'];

        }

        $tanggal = array(
                            0 => $tgl,
                            1 => $tgl,
                            2 => $tgl,
                            3 => $tgl
                    );

        $realisasi = array(
                            0 => $rls_hotel,
                            1 => $rls_restoran,
                            2 => $rls_hiburan,
                            3 => $rls_parkir
                    );
        
        // print_r($realisasi);exit;
        $vat_code = array('PAJAK HOTEL', 'PAJAK RESTORAN', 'PAJAK HIBURAN', 'PAJAK PARKIR');
        $s_result ="[";
        for ($i=0;$i<count($vat_code);$i++){
            $s_result = $s_result . '["'.$vat_code[$i].'",';
            for ($j=0; $j < count($tanggal[$i]) ; $j++) { 
                $s_result .= $realisasi[$i][$j]. ',';
                

            }

            for ($j=0; $j < count($tanggal[$i]) ; $j++) { 
                $s_result .= '"'.$tanggal[$i][$j]. '",';
                

            }
            $s_result .= '],';

        }

        $s_result = substr($s_result, 0, -1)  ;  
        $s_result = str_replace(',]', ']', $s_result)  ; 
        $s_result = $s_result . "]";
        echo $s_result;
        exit;
        
    }
    

}