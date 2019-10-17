<?php

/**
 * T_history Model
 *
 */
class T_laporan_pembayaran_wp_baru extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = "d.vat_code,
                                B.npwpd AS npwd,
                                to_char (e.active_date,'dd-mm-yyyy') as active_date_short,
                                e.wp_name,
                                e.wp_address_name,
                                e.wp_address_no,
                                e.company_brand,
                                e.brand_address_name,
                                e.brand_address_no,
                                e.t_cust_account_id,
                                f_get_wilayah(e.npwd) as kode_wilayah ";
    public $fromClause      = "t_customer_order A
                                LEFT JOIN t_vat_registration B ON A .t_customer_order_id = B.t_customer_order_id
                                LEFT JOIN p_vat_type_dtl d ON b.p_vat_type_dtl_id = d.p_vat_type_dtl_id
                                left join t_cust_account e on e.npwd=b.npwpd";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function getData($status_pembayaran, $p_year_period_id, $p_vat_type_id){
        try {
            $sql="   SELECT sum (A.payment_amount) as payment_amount, B.* FROM  t_payment_receipt A,
                        (SELECT 
                                        d.vat_code,
                                        B.npwpd AS npwd,
                                        to_char (e.active_date,'dd-mm-yyyy') as active_date_short,
                                        e.wp_name,
                                        e.wp_address_name,
                                        e.wp_address_no,
                                        e.company_brand,
                                        e.brand_address_name,
                                        e.brand_address_no,
                                        e.t_cust_account_id,
                                        f_get_wilayah(e.npwd) as kode_wilayah,
                                        e.p_vat_type_id
                                    FROM
                                        t_customer_order A
                                    LEFT JOIN t_vat_registration B ON A .t_customer_order_id = B.t_customer_order_id

                                    LEFT JOIN p_vat_type_dtl d ON b.p_vat_type_dtl_id = d.p_vat_type_dtl_id
                                    left join t_cust_account e on e.npwd=b.npwpd
                                    WHERE p_rqst_type_id IN (1,2,3,4,5) 
                                    AND EXISTS (select 1 from t_payment_receipt where
                            t_cust_account_id = e.t_cust_account_id) and e.npwd is not null 
                                    and e.active_date between 
                                            (select start_date from p_year_period where p_year_period_id = 28)
                                        and
                                            (select end_date from p_year_period where p_year_period_id = 28)  
                                            ) B
                    WHERE A.t_cust_account_id = B.t_cust_account_id";
            if ($status_pembayaran == 1){
                $sql.=' AND EXISTS (select 1 from t_payment_receipt where t_cust_account_id = b.t_cust_account_id)';
            }else{
                $sql.=' and not EXISTS (select 1 from t_payment_receipt where t_cust_account_id = b.t_cust_account_id)';
            }
            if ($p_vat_type_id != ''){
                $sql.="and b.p_vat_type_id = ".$p_vat_type_id;
            }
            $sql.=" and b.npwd is not null 
                    and b.active_date_short between 
                            (select start_date from p_year_period where p_year_period_id = ".$p_year_period_id.")
                        and
                            (select end_date from p_year_period where p_year_period_id = ".$p_year_period_id.")";
            $sql.=" group by b.vat_code,
                    b.npwd  ,
                    b.active_date_short,
                    b.wp_name,
                    b.wp_address_name,
                    b.wp_address_no,
                    b.company_brand,
                    b.brand_address_name,
                    b.brand_address_no,
                    b.t_cust_account_id,
                    b.p_vat_type_id,
                    b.kode_wilayah";

            $query = $this->db->query($sql);
            /*die($sql);
            exit;*/
            $items = $query->result_array();

            if ($items == null || $items == '')
                $items = 'no result';
            // print_r($items);
            // exit();
            return $items;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

    }    

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            
            $this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            $this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];
            //if false please throw new Exception
        }
        return true;
    }

}

/* End of file T_history.php */