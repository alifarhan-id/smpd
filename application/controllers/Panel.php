<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('administration/p_application');
    }

    function index() {
        check_login();
        if(!$this->p_application->allowAccessPanel($this->session->userdata('p_app_user_id'),$this->input->get('p_application_id'))) {
            redirect(base_url('home'));
            return;
        }

        $this->load->view('panel');
    }

}