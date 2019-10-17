<?php

/**
 * Icons Model
 *
 */
class T_bphtb_ubah_register_list extends Abstract_model {

    public $table           = "t_bphtb_registration";
    public $pkey            = "";
    public $alias           = "a";

    public $fields          = array();

    public $selectClause    = "a.*";
    public $fromClause      = "t_bphtb_registration a
                                LEFT join t_payment_receipt_bphtb b on a.t_bphtb_registration_id = b.t_bphtb_registration_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            

        }else {
            //do something
            
        }
        return true;
    }

    function getRegister($t_vat_setllement_id){
        $sql = "select a.t_vat_setllement_id, a.npwd,a.no_kohir, a.is_settled,a.total_trans_amount,
                a.total_vat_amount,to_char(payment_date,'dd-mm-yyyy') as payment_date,
                p_cg_terminal_id,case when kode_bank = '110' then 1 else 2 end as is_bjb,
                b.receipt_no,b.payment_amount,b.payment_vat_amount,b.penalty_amount
                from t_vat_setllement a
                LEFT JOIN t_payment_receipt b on a.t_vat_setllement_id = b.t_vat_setllement_id
                where a.t_vat_setllement_id=".$t_vat_setllement_id;
       
        $query = $this->db->query($sql);
        $item =$query->row_array();
        return $item;
    }

    function ubahFlag($t_bphtb_registration_id, $alasan){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $uname = $userdata['app_user_name'];

        $sql = "select f_unflag_bphtb from 
            f_unflag_bphtb(".$t_bphtb_registration_id.",'".$alasan."','".$uname."')";

        $query = $this->db->query($sql);

        $item =$query->row_array();
        return $item;
    }
    
}