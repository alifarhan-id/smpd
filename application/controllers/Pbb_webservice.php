<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pbb_webservice extends CI_Controller
{

    function __construct() {
        parent::__construct();
    }

    function get_sppt (){

        $data = array('result' => array(
                        'nop'                       => '',
                        'thn_pajak_sppt'            =>'',
                        'nm_wp_sppt'                =>'',
                        'jln_wp_sppt'               =>'',
                        'rw_wp_sppt'                =>'',
                        'rt_wp_sppt'                =>'',
                        'kelurahan_wp_sppt'         =>'',
                        'kota_wp_sppt'              =>'',
                        'nm_kecamatan'              =>'',
                        'kd_kls_tanah'              =>'',
                        'luas_bumi_sppt'            =>0,
                        'luas_bng_sppt'             =>0,
                        'njop_bumi_sppt'            =>0,
                        'njop_bng_sppt'             =>0,
                        'njop_sppt'                 =>0,
                        'njoptkp_sppt'              =>0,
                        'pbb_terhutang_sppt'        =>0,
                        'pbb_yg_harus_dibayar_sppt' =>0,
                        'status_pembayaran_sppt'    =>0
            ),
            'success' => false,
            'message' => '');
        try {

            $db_pbb = $this->load->database('pbb_sismiop', TRUE);
            $nop = $this->input->get('nop');
            $year = $this->input->get('year', date('Y'));

            $sql = "select a.kd_propinsi||a.kd_dati2||a.kd_kecamatan||a.kd_kelurahan||a.kd_blok||a.no_urut||a.kd_jns_op as nop,
                    a.thn_pajak_sppt,
                    a.nm_wp_sppt,
                    a.jln_wp_sppt,
                    a.rw_wp_sppt,
                    a.rt_wp_sppt,
                    a.kelurahan_wp_sppt,
                    a.kota_wp_sppt,
                    b.nm_kecamatan,
                    a.kd_kls_tanah,
                    a.luas_bumi_sppt,
                    a.luas_bng_sppt,
                    a.njop_bumi_sppt,
                    a.njop_bng_sppt,
                    a.njop_sppt,
                    a.njoptkp_sppt,
                    a.pbb_terhutang_sppt,
                    a.pbb_yg_harus_dibayar_sppt,
                    a.status_pembayaran_sppt
                    from sppt a
                    left join ref_kecamatan b on a. kd_kecamatan = b.kd_kecamatan
                    where a.thn_pajak_sppt = ?
                    and (a.kd_propinsi||a.kd_dati2||a.kd_kecamatan||a.kd_kelurahan||a.kd_blok||a.no_urut||a.kd_jns_op) = ?";

            $query = $db_pbb->query($sql, array($year, $nop));
            $result = $query->row_array();

            if(!empty($result)) $data['result'] = $result;
            $data['success'] = true;

        }catch(Exception $e) {
            $data['message'] = $e->getMessage();
        }

        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

}