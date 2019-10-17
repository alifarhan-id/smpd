<?php

/**
 * T_history Model
 *
 */
class T_laporan_pembayaran_wp_baru_summary extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = "case when extract(month from e.active_date) = 1 then 'Januari'
                                     when extract(month from e.active_date) = 2 then 'Februari'
                                     when extract(month from e.active_date) = 3 then 'Maret'
                                     when extract(month from e.active_date) = 4 then 'April'
                                     when extract(month from e.active_date) = 5 then 'Mei'
                                     when extract(month from e.active_date) = 6 then 'Juni'
                                     when extract(month from e.active_date) = 7 then 'Juli'
                                     when extract(month from e.active_date) = 8 then 'Agustus'
                                     when extract(month from e.active_date) = 9 then 'September'
                                     when extract(month from e.active_date) = 10 then 'Oktober'
                                     when extract(month from e.active_date) = 11 then 'November'
                                     when extract(month from e.active_date) = 12 then 'Desember'         
                                end as bulan, 
                                   extract(month from e.active_date) as bulan_num, 
                                   extract(year from e.active_date) as tahun,
                                   sum(f.payment_amount) as payment_amount";
    public $fromClause      = "t_customer_order a 
                                LEFT JOIN t_vat_registration B ON A .t_customer_order_id = B.t_customer_order_id 
                                LEFT JOIN p_vat_type_dtl d ON b.p_vat_type_dtl_id = d.p_vat_type_dtl_id 
                                left join t_cust_account e on e.npwd = b.npwpd
                                left join t_payment_receipt f on f.t_cust_account_id = e.t_cust_account_id ";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function getData($status_pembayaran, $p_year_period_id, $p_vat_type_id){
        try {
            $sql=" SELECT case when extract(month from e.active_date) = 1 then 'Januari'
                             when extract(month from e.active_date) = 2 then 'Februari'
                             when extract(month from e.active_date) = 3 then 'Maret'
                             when extract(month from e.active_date) = 4 then 'April'
                             when extract(month from e.active_date) = 5 then 'Mei'
                             when extract(month from e.active_date) = 6 then 'Juni'
                             when extract(month from e.active_date) = 7 then 'Juli'
                             when extract(month from e.active_date) = 8 then 'Agustus'
                             when extract(month from e.active_date) = 9 then 'September'
                             when extract(month from e.active_date) = 10 then 'Oktober'
                             when extract(month from e.active_date) = 11 then 'November'
                             when extract(month from e.active_date) = 12 then 'Desember'         
                        end as bulan, 
                           extract(month from e.active_date) as bulan_num, 
                           extract(year from e.active_date) as tahun,
                           sum(f.payment_amount) as payment_amount
                    FROM t_customer_order a 
                    LEFT JOIN t_vat_registration B ON A .t_customer_order_id = B.t_customer_order_id 
                    LEFT JOIN p_vat_type_dtl d ON b.p_vat_type_dtl_id = d.p_vat_type_dtl_id 
                    left join t_cust_account e on e.npwd = b.npwpd
                    left join t_payment_receipt f on f.t_cust_account_id = e.t_cust_account_id 
                    WHERE p_rqst_type_id IN (1,2,3,4,5)";
            if ($status_pembayaran == 1){
                $sql.=' AND EXISTS (select 1 from t_payment_receipt where t_cust_account_id = e.t_cust_account_id)';
            }else{
                $sql.=' and not EXISTS (select 1 from t_payment_receipt where t_cust_account_id = e.t_cust_account_id)';
            }
            if ($p_vat_type_id != ''){
                $sql.="and e.p_vat_type_id = ".$p_vat_type_id;
            }
            $sql.=" and e.npwd is not null 
                    and e.active_date between 
                            (select start_date from p_year_period where p_year_period_id = ".$p_year_period_id.")
                        and
                            (select end_date from p_year_period where p_year_period_id = ".$p_year_period_id.")
                    GROUP BY extract(month from e.active_date), extract(year from e.active_date)
                    ORDER BY extract(month from e.active_date) ASC";

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