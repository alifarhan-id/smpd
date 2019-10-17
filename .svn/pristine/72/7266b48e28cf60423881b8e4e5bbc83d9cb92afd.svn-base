<?php

function check_login($ws = '') {
	$ci =& get_instance();

	if($ci->session->userdata('logged_in') == "") {
		if($ci->input->is_ajax_request()) { //request from Web Service (ws.php)
			throw new Exception('Sorry, Your login session has been expired. <br/> Please <a href="'.base_url().'auth/index">Login</a> first so that You can access this page. Thank You');
		}else {
			redirect('auth/logout');
		}
	}
	return true;
}

function permission_check($permission_name='') {

    $ci =& get_instance();
    $p_app_user_id = $ci->session->userdata('p_app_user_id');
	
	//sementara permission check nya di disable
	return;

    if(empty($permission_name)) return;

    $sql = "select a.p_app_user_id, a.p_app_role_id
            from p_app_user_role a
            left join permission_role b on a.p_app_role_id = b.p_app_role_id
            left join permissions c on b.permission_id = c.permission_id
            where a.p_app_user_id = ?
            and c.permission_name = ?";

    $query = $ci->db->query($sql, array($p_app_user_id, $permission_name));
    $row = $query->row_array();

    if($row == null) {
        if($ci->input->is_ajax_request()) { //request from Web Service (ws.php)
            header('Content-Type: application/json');
            echo json_encode(array('success' => false,
                                    'rows' => array(),
                                    'total' => 0,
                                    'message' => 'We\'re sorry. You don\'t have permission to access this request'));
            exit;
        }else {
            $ci->load->view('error_401');
        }
    }

}

?>