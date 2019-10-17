<?php defined('BASEPATH') OR exit('No direct script access allowed');

class T_rep_laporan_wp_detil extends CI_Controller{
	function __construct() {
        parent::__construct();
    }

    function t_rep_wp_detil(){
    	check_login();

    	$sql = "SELECT COUNT(*) FROM (SELECT
		        	CASE
		        WHEN cust_account.p_account_status_id = 1 THEN
		        	'1'
		        ELSE
		        	'2'
		        END AS status,
		         vat_type.vat_code,
		         COUNT (*) AS jumlah
		        FROM
		        	t_cust_account cust_account
		        LEFT JOIN p_vat_type vat_type ON vat_type.p_vat_type_id = cust_account.p_vat_type_id
		        WHERE
		        	CASE
		        WHEN cust_account.p_account_status_id = 1 THEN
		        	'1'
		        ELSE
		        	'2'
		        END =  1
		        GROUP BY
		        	vat_type.vat_code,
		        	CASE
		        WHEN cust_account.p_account_status_id = 1 THEN
		        	'1'
		        ELSE
		        	'2'
		        END) cnt;

		        SELECT
		        	CASE
		        WHEN cust_account.p_account_status_id = 1 THEN
		        	'1'
		        ELSE
		        	'2'
		        END AS status,
		         vat_type.vat_code,
		         COUNT (*) AS jumlah
		        FROM
		        	t_cust_account cust_account
		        LEFT JOIN p_vat_type vat_type ON vat_type.p_vat_type_id = cust_account.p_vat_type_id
		        WHERE
		        	CASE
		        WHEN cust_account.p_account_status_id = 1 THEN
		        	'1'
		        ELSE
		        	'2'
		        END =  1
		        GROUP BY
		        	vat_type.vat_code,
		        	CASE
		        WHEN cust_account.p_account_status_id = 1 THEN
		        	'1'
		        ELSE
		        	'2'
		        END";

        $query = $this->db->query($sql);
        $result = $query->result_array();
        //print_r($result);exit;
        $s_result ="[";
        for ($i=0;$i<count($result);$i++){
        	$s_result = $s_result . '["'.$result[$i]['status'].'","'.$result[$i]['vat_code'].'","'.$result[$i]['jumlah'].'"],';
        }
        $s_result = substr($s_result, 0, -1)  ;      

        $s_result = $s_result . "]";
        echo $s_result;
        exit;
    }
}