<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_target_vs_realisasi extends CI_Controller
{

    function __construct() {
        parent::__construct();

        // check_login();
        
    }

    public function index(){
        $mode = getVarClean('mode', 'str', 'target');

        if($mode=='bidang'){
            $this->load->view('pelaporan/dashboard_t_target_realisasi_bidang');
        }else if($mode=='jenis'){
            $this->load->view('pelaporan/dashboard_t_target_realisasi_jenis');
        }else if($mode=='jenis_bulan'){
            $this->load->view('pelaporan/dashboard_t_target_realisasi_jenis_bulan');
        }else if($mode=='target'){
            $this->load->view('pelaporan/dashboard_t_target_realisasi');
        }else if($mode=='triwulan'){
            $this->load->view('pelaporan/dashboard_t_target_realisasi_view_triwulan');
        }
        
    }

    public function target_realisasi(){
        $this->load->view('pelaporan/dashboard_t_target_realisasi');
    }

    public function dash1(){
        $this->load->view('pelaporan/dashboard_t_target_realisasi_jenis');
    }

    public function dash2(){
        $this->load->view('pelaporan/dashboard_t_target_realisasi_perjenis_bulanan');
    }

    public function dash3(){
        $this->load->view('pelaporan/dashboard_t_target_realisasi_perjenis_bulanan_v2');
    }

    public function target_realisasi_triwulan(){
        $this->load->view('pelaporan/dashboard_t_target_realisasi_view_triwulan');
    }

    public function target_realisasi_perjenis_pajak_perbulan(){
        $_POST["p_year_period_id"]=28;//$this->get_p_year_period_id();
        $_POST["p_vat_type_id"]=1;
        $_POST["p_vat_group_id"]=2;

        $this->load->view('pelaporan/dashboard_t_target_realisasi_jenis_bulan');
    }

    public function get_p_year_period_id() {

        $sql = "select p_year_period_id from p_year_period where trunc(sysdate) between start_date and end_date";

        $query = $this->db->query($sql, array());
        $result = $query->row_array();
        //echo base_url();exit;
        return $result['p_year_period_id'];
    }

}
