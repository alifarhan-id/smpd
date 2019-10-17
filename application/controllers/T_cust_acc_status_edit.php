<?php defined('BASEPATH') OR exit('No direct script access allowed');

class T_cust_acc_status_edit extends CI_Controller
{

    function __construct() {
        parent::__construct();
    }

    function load_combo_status (){
        check_login();
        $sql = "select * from p_account_status
                    where p_account_status_id in (1,5,3)
                ";
        $query = $this->db->query($sql);
        $items = $query->result_array();
        $html = "";
        $html.="<select name='p_account_status_id' id='p_account_status_id' required  class='form-control required'>";
        $html.="<option value='' >Select Value</option>";
        foreach ($items as $data) {
          $html .=" <option value='" . $data['p_account_status_id'] . "'>" . $data['code'] . "</option>";
        }
        $html .= "</select>";

        echo $html;
        exit;
    }

}