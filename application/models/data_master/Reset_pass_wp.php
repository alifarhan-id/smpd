<?php

/**
 * Reset_pass_wp Model
 *
 */
class Reset_pass_wp extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = " b.p_app_user_id,
                                app_user_name,
                                a.origin_password,
                                c.company_brand,
                                c.wp_email as email_address,
                                b.p_user_status_id,
                                b.description,
                                ip_address_v4,
                                ip_address_v6,
                                to_char(expired_user,'DD-MON-YYYY') AS expired_user,
                                to_char(expired_pwd,'DD-MON-YYYY') AS expired_pwd,
                                last_login_time,
                                fail_login_trial, to_char(b.creation_date,'DD-MON-YYYY') AS creation_date,
                                b.created_by,
                                to_char(b.updated_date,'DD-MON-YYYY') AS updated_date,
                                b.updated_by,
                                is_employee ,
                                c.npwd,
                                d.vat_code ayat_pajak";
    public $fromClause      = "t_customer_user a
                                left join p_app_user b
                                    on a.p_app_user_id=b.p_app_user_id
                                left join t_cust_account c
                                    on a.t_customer_id = c.t_customer_id
                                left join p_vat_type_dtl d
                                    on c.p_vat_type_dtl_id = d.p_vat_type_dtl_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            /*$this->record['creation_date'] = date('Y-m-d');
            $this->record['created_by'] = $userdata['app_user_name'];*/
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];
            //if false please throw new Exception
        }
        return true;
    }

    function reset_pass($p_app_user_id = 0){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $sql = "select f_reset_pass_wp(".$p_app_user_id.",'".$userdata['app_user_name']."') as new_pass";
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data['new_pass'];
    }

    function get_pass(){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $sql = "SELECT a.t_customer_user_id as NO,
                        c.npwd as NPWPD,
                        c.wp_name NAMA_WP,
                        a.user_name USERNAME,
                        a.origin_password as PASSWORD,
                        b.company_owner as NAMA_PEMILIK,
                        b.email_address as EMAIL,
                        c.company_brand MEREK_DAGANG,
                        e.vat_code as JENIS_PAJAK

                        from sikp.t_customer_user a
                        left join t_customer b on b.t_customer_id = a.t_customer_id
                        left join t_cust_account c on c.t_customer_id = a.t_customer_id
                        left join p_app_user d on a.p_app_user_id = d.p_app_user_id
                        left join p_vat_type_dtl e on c.p_vat_type_dtl_id = e.p_vat_type_dtl_id
                        where c.p_account_status_id = 1
                        order by a.t_customer_user_id asc";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }

}

/* End of file Reset_pass_wp.php */