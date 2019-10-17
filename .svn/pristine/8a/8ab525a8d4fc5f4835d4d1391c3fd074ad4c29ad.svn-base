<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_online extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->model('pendaftaran_online/register', 'm_po');
    }

    function index(){
        $this->load->view('pendaftaran_online/pendaftaran_online');
    }


    function check_user(){

        $username = $this->input->post('user_name');
        $cek = $this->m_po->cekUser($username);
        echo json_encode(array('cek_user' => $cek));

    }

    function submit_registration(){

        $post = $this->input->post();
        $submit_reg = $this->m_po->submit_reg($post);
        // print_r($submit_reg[0]->o_cust_order_id);

        if($submit_reg[0]->o_result_msg == 'OK'){
            $sub = $this->m_po->f_first_submit_engine($submit_reg[0]->o_cust_order_id);

            $return['message']= '['.$sub[0]->msg.'] Regitrasi berhasil dengan No. Order : '.$submit_reg[0]->o_cust_order_id;
            $return['success']= true;
            echo json_encode($return);
        }else{
            $return['message']='Registrasi gagal';
            $return['success']= false;
            echo json_encode($return);
        }

        exit;

    }

}