<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct() {
        parent::__construct();
    }

    public function index() {

        if($this->session->userdata('logged_in')) {
            //go to default page
            redirect(base_url().'home');
			//redirect(base_url().'panel?p_application_id=1');
        }

        $data = array();
        $data['login_url'] = base_url()."auth/login";

        $this->load->view('auth/login-2', $data);
    }

    public function login() {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));

        if(empty($username) or empty($password)) {
            $this->session->set_flashdata('error_message','Username atau password harus diisi');
            redirect(base_url().'auth/index');
        }

        $sql = "select * from p_app_user where app_user_name = ? and is_employee = 'Y'";

        $query = $this->db->query($sql, array($username));
        $row = $query->row_array();

        $md5pass = md5(trim($password));

        if(count($row) == 0) {
            $this->session->set_flashdata('error_message','Maaf, Username atau password Anda salah');
            redirect(base_url().'auth/index');
        }

        if($row['p_user_status_id'] != 1) {
            $this->session->set_flashdata('error_message','Maaf, User yang bersangkutan sudah tidak aktif. Silahkan hubungi administrator.');
            redirect(base_url().'auth/index');
        }

        if( strcmp($md5pass, trim($row['user_pwd'])) != 0 ) {
            $this->session->set_flashdata('error_message','Username atau password Anda salah');
            redirect(base_url().'auth/index');
        }

        $userdata = array(
                        'p_app_user_id'     => $row['p_app_user_id'],
                        'app_user_name'     => $row['app_user_name'],
                        'email_address'     => $row['email_address'],
                        'full_name'         => $row['full_name'],
                        'is_ldap'           => 'NO',
                        'logged_in'         => true,
                        'location_name'     => null,
                        'location_code'     => null
                      );

        $this->session->set_userdata($userdata);
        redirect(base_url().'home');
		//redirect(base_url().'panel?p_application_id=1');
    }

    public function logout() {

        $userdata = array(
                        'p_app_user_id'               => '',
                        'app_user_name'             => '',
                        'email_address'            => '',
                        'full_name'        => '',
                        'logged_in'             => false,
                        'location_name'         => null,
                        'location_code'         => null
                      );

        $this->session->unset_userdata($userdata);
        $this->session->sess_destroy();
        redirect(base_url().'auth/index');
    }

}
