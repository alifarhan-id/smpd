<?php

/**
 * T_history Model
 *
 */
class T_laporan_pembayaran_wp_per_3_tahun extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = " 0 as pajak, 
                                0 as pajak1, 
                                0 as pajak2, 
                                '' as masa_pajak, 
                                a.* ";
    public $fromClause      = "";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }
    
    function getData($p_year_period_id, $p_vat_type_id){
        try {
            $sql="select 0 as pajak, 0 as pajak1, 0 as pajak2, '' as masa_pajak, 
                        a.* 
                    from (SELECT DISTINCT (a.npwd),a.t_cust_account_id,c.company_brand,c.brand_address_name||' '||c.brand_address_no as alamat,
                                to_char(active_date,'dd-mm-yyyy') as active_date
                                from t_vat_setllement a, t_payment_receipt b, t_cust_account c
                                where a.t_vat_setllement_id = b.t_vat_setllement_id
                                    and a.npwd != '' 
                                    and a.p_vat_type_dtl_id in
                                        (select p_vat_type_dtl_id from p_vat_type_dtl 
                                        where p_vat_type_id = ".$p_vat_type_id.")
                                    and a.start_period > to_date ('31-12-2012','dd-mm-yyyy')
                                and c.t_cust_account_id=a.t_cust_account_id
                                order by c.company_brand,a.npwd) a, p_year_period b
                                where p_year_period_id = ".$p_year_period_id;

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

    function getPajak($p_year_period_id, $t_cust_account_id){
        try {
            $data = array();
            $sql="select c.npwd,
                        c.wp_name,
                        a.p_finance_period_id,
                        a.code,
                        case when a.p_finance_period_id=192 then sum(nvl(total_vat_amount,0)) else max(nvl(total_vat_amount,0)) end as pajak,
                        e.code as ketetapan,
                        d.p_year_period_id, 
                        d.year_code 
                    from p_finance_period a
                        left join t_cust_account c on c.t_cust_account_id = ".$t_cust_account_id." 
                        left join t_vat_setllement b on b.p_finance_period_id = a.p_finance_period_id and b.t_cust_account_id = c.t_cust_account_id and p_settlement_type_id in (1,4,6) and b.p_vat_type_dtl_id not in (11,27,14,15)
                        left join p_year_period d on d.p_year_period_id = a.p_year_period_id
                        left join p_settlement_type e on e.p_settlement_type_id=b.p_settlement_type_id
                        where a. p_year_period_id in (
                        SELECT
                        p_year_period_id
                        FROM
                        p_year_period
                        WHERE
                        start_date >= (
                                SELECT
                                start_date - '2 years' :: INTERVAL
                            FROM
                                p_year_period
                        WHERE
                            p_year_period_id =  ".$p_year_period_id." 
                        )
                       AND start_date <= (
                            SELECT
                            start_date
                        FROM
                            p_year_period
                        WHERE
                                p_year_period_id = ".$p_year_period_id." 
                        )and start_date > '2012-12-31'
                        )
                        group by 
                            c.npwd,
                            c.wp_name,
                            a.p_finance_period_id,
                            a.code,e.code,
                            d.p_year_period_id, 
                            d.year_code
                        ORDER BY a.start_date";

            $query = $this->db->query($sql);
            /*die($sql);
            exit;*/
            //echo json_encode( $arr );
            $items = $query->result_array();

            if ($items == null || $items == '')
                $items = 'no result';
           /* print_r($data);
             exit();*/
            return $items;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    function getYear($p_year_period_id){
        try {
            $sql="select year_code from p_year_period where p_year_period_id = ".$p_year_period_id;

            $query = $this->db->query($sql);
            /*die($query);
            exit;*/
            $items = $query->result();

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