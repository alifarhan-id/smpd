<?php

class Register extends CI_Model {


    function __construct() {
        parent::__construct();
    }

	function cekUser($username) {
		$qs = 0;
        $sql = "SELECT * FROM sikp.t_vat_registration WHERE wp_user_name = ? ";
        $qs = $this->db->query($sql, array($username));

        return $qs->num_rows();
	}

	function submit_reg($post){
		$result = array();
		$sql = "select * from f_ins_order_registration_new (  " . $post['jenis_permohonan'] . "," .
												            "'" . $post['description'] . "'," .
												            "'" . 'ADMIN' . "'," .
												            "'" . $post['wp_name_Name'] . "'," . //4
												            "'" . $post['wp_address_name_Name'] . "'," .
												            "'" . $post['wp_address_no_Name'] . "'," .
												            "'" . $post['wp_address_rt_Name'] . "'," .
												            "'" . $post['wp_address_rw_Name'] . "'," .
												            $post['p_wp_kelurahan'] . "," .
												            $post['p_wp_kecamatan'] . "," .
												            $post['p_wp_kota'] . "," .
												            "'" . $post['wp_phone_no_Name'] . "'," .
												            "'" . $post['wp_phone_no_Name'] . "'," .
												            "'" . $post['wp_fax_no_Name'] . "'," .
												            "'" . $post['wp_zip_code_Name'] . "'," .
												            "'" . $post['wp_email_Name'] . "'," .
												            "'" . $post['company_name_Name'] . "'," . //17
												            "'" . $post['address_name_Name'] . "'," .
												            "'" . $post['address_no_Name'] . "'," .
												            "'" . $post['address_rt_Name'] . "'," .
												            "'" . $post['address_rw_Name'] . "'," .
												            $post['p_kelurahan_code'] . "," .
												            $post['p_kecamatan_code'] . "," .
												            $post['p_kota_code'] . "," .
												            "'" . $post['phone_no_Name'] . "'," .
												            "'" . $post['phone_no_Name'] . "'," .
												            "'" . $post['fax_no_Name'] . "'," .
												            "'" . $post['zip_code_Name'] . "'," .
												            "'" . $post['company_brand_Name'] . "'," . //29
												            "'" . $post['brand_address_name_Name'] . "'," .
												            "'" . $post['brand_address_no_Name'] . "'," .
												            "'" . $post['brand_address_rt_Name'] . "'," .
												            "'" . $post['brand_address_rw_Name'] . "'," .
												            $post['p_brand_kelurahan'] . "," .
												            $post['p_brand_kecamatan'] . "," .
												            $post['p_brand_kota'] . "," .
												            "'" . $post['brand_phone_no_Name'] . "'," .
												            "'" . $post['brand_phone_no_Name'] . "'," .
												            "'" . $post['brand_fax_no_Name'] . "'," .
												            "'" . $post['brand_zip_code_Name'] . "'," .
												            "'" . $post['company_owner_Name'] . "'," . //41
												            $post['p_job_position_id'] . "," .
												            "'" . $post['address_name_owner_Name'] . "'," .
												            "'" . $post['address_no_owner_Name'] . "'," .
												            "'" . $post['address_rt_owner_Name'] . "'," .
												            "'" . $post['address_rw_owner_Name'] . "'," .
												            $post['p_kelurahan_own_code'] . "," .
												            $post['p_kecamatan_own_code'] . "," .
												            $post['p_kota_own_code'] . "," .
												            "'" . $post['phone_no_owner_Name'] . "'," .
												            "'" . $post['phone_no_owner_Name'] . "'," .
												            "'" . $post['fax_no_owner_Name'] . "'," .
												            "'" . $post['zip_code_owner_Name'] . "'," .
												            "'" . $post['email_owner_Name'] . "'," .
												            $post['p_vat_type_dtl_id'] . "," . //55
												            $post['p_vat_type_dtl_id'] . "," .
												            $post['p_vat_type_dtl_id'] . "," .
												            $post['p_vat_type_dtl_id'] . "," .
												            "'" . $post['InputUsername'] . "'," . //59
												            "'" . $post['InputPassword'] . "'," .
												            $post['p_private_question_id'] . "," .
												            "'" . $post['question_answer'] . "'," .
												            $post['p_private_question_id'] . "," .
												            "'" . $post['question_answer'] . "', " . 
												            " 1 ," .
												            " 1 ," .
												            " '1', " .
												            " 1," .
												            " '1' " .
												            " ) ;";

		$q = $this->db->query($sql);
		if($q->num_rows() > 0) $result = $q->result();
		return $result;
	}

	function f_first_submit_engine($o_cust_order_id){
		$sql_submit = "select o_result_code  as code, o_result_msg as msg ".
                                       "from f_first_submit_engine ( 500 , ".
                                       $o_cust_order_id.",".
                                       " 'ADMIN' ); ";
        $q = $this->db->query($sql_submit);
		if($q->num_rows() > 0) $result = $q->result();
		return $result;
	}
}
?>