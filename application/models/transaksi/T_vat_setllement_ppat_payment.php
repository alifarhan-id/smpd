<?php

/**
 * T_vat_setllement_ppat_payment Model
 *
 */
class T_vat_setllement_ppat_payment extends Abstract_model {

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

    function getData($s_keyword){
        $sql = "select a.*,
                    case when sanksi_ajb is not null then '-' else a.p_finance_period_id::VARCHAR end as p_finance_period_id_denda_profesi,
                    case when sanksi_ajb is null then '-' else a.p_finance_period_id::VARCHAR end as p_finance_period_id_sanksi_ajb,
                    case when sanksi_ajb is not null then '-' else b.code end as finance_period_code_denda_profesi,
                    case when sanksi_ajb is null then '-' else b.code end as finance_period_code_sanksi_ajb,
                    case when sanksi_ajb is not null then '-' else c.year_code end as year_period_code_denda_profesi,
                    case when sanksi_ajb is null then '-' else c.year_code end as year_period_code_sanksi_ajb,
                    total_vat_amount,nvl(sanksi_ajb,'-')as sanksi_ajb,ppat_name,address_name,no_sk
                    from t_vat_setllement_ppat a
                    left join p_finance_period b on a.p_finance_period_id=b.p_finance_period_id
                    left join p_year_period c on c.p_year_period_id=b.p_year_period_id
                    where payment_key  = '$s_keyword'";
       
        $query = $this->db->query($sql);
        $item =$query->row_array();
        return $item;
    }

    function ubahFlag($t_customer_order_id){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $uname = $userdata['app_user_name'];

        $sql = "select sikp.f_payment_manual_ppat(".$t_customer_order_id.",'".$uname."')";

        $query = $this->db->query($sql);

        $item =$query->row_array();
        return $item;
    }
    
}