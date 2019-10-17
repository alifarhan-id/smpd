<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_pass_wp extends CI_Controller
{

    function __construct() {
        parent::__construct();
    }
    function load_combo_status_readonly (){
        check_login();
        $sql = "select * from p_user_status
                ";
        $query = $this->db->query($sql);
        $items = $query->result_array();
        $html = "";
        $html.="<select name='p_user_status_id' id='p_user_status_id' disabled='disabled' readonly  class='form-control '>";
        //$html.="<option value='' >Select Value</option>";
        foreach ($items as $data) {
          $html .=" <option value='" . $data['p_user_status_id'] . "'>" . $data['code'] . "</option>";
        }
        $html .= "</select>";

        echo $html;
        exit;
    }

}