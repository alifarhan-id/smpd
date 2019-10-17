<?php

/**
 * T_laporan_pembayaran_wp_per_3_tahun_bulanan Model
 *
 */
class T_laporan_pembayaran_wp_per_3_tahun_bulanan extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = "";
    public $fromClause      = "";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }
    

    function getData($p_vat_type_dtl_id,$p_vat_type_id){
        
            $sql ="(select DISTINCT (c.npwd), c.t_cust_account_id,c.company_brand,regexp_replace(c.brand_address_name, '\r|\n', '', 'g')||' '||regexp_replace(c.brand_address_no, '\r|\n', '', 'g') as alamat,
            to_char(active_date,'dd-mm-yyyy') as active_date,
            c.p_vat_type_dtl_id, vat_code, 0 as jml, 0 as jml1, 0 as jml2, '' as masa_pajak
            from t_cust_account c
            left join p_vat_type_dtl d on d.p_vat_type_dtl_id=c.p_vat_type_dtl_id
            where (case 
                        when ".$p_vat_type_dtl_id." = 0 then true
                        when ".$p_vat_type_dtl_id." = 10 then c.p_vat_type_dtl_id in (10,9) 
                        else c.p_vat_type_dtl_id = ".$p_vat_type_dtl_id." 
                    end)
            and ".$p_vat_type_id." = c.p_vat_type_id 
            and c.p_account_status_id = 1
            )
            union
            (select DISTINCT (c.npwd),c.t_cust_account_id,c.company_brand,regexp_replace(c.brand_address_name, '\r|\n', '', 'g')||' '||regexp_replace(c.brand_address_no, '\r|\n', '', 'g') as alamat,
            to_char(active_date,'dd-mm-yyyy') as active_date,
            c.p_vat_type_dtl_id, vat_code, 0 as jml, 0 as jml1, 0 as jml2, '' as masa_pajak
            from t_cust_account c
            left join p_vat_type_dtl d on d.p_vat_type_dtl_id=c.p_vat_type_dtl_id
            where (case 
                        when ".$p_vat_type_dtl_id." = 0 then true
                        when ".$p_vat_type_dtl_id." = 10 then c.p_vat_type_dtl_id in (10,9) 
                        else c.p_vat_type_dtl_id = ".$p_vat_type_dtl_id." 
                    end)
            and ".$p_vat_type_id." = c.p_vat_type_id 
            and c.p_account_status_id != 1
            and (
                    (
                        select start_date
                        from t_payment_receipt x
                        left join p_finance_period y on x.p_finance_period_id = y.p_finance_period_id
                        where x.t_cust_account_id = c.t_cust_account_id
                        ORDER BY y.start_date desc
                        limit 1
                    ) >= to_date('01-01-2014')
                )
            )
            order by p_vat_type_dtl_id,company_brand,npwd ";
            
            $query = $this->db->query($sql);
           

            $items_date = $query->result_array();
            // print_r($items_date);
            // exit();
            return $items_date;


    }

        function getData1($p_vat_type_dtl_id,$t_cust_account_id,$p_finance_period_id){
        
            $sql ="SELECT c.npwd,c.wp_name,a.p_finance_period_id,a.code,sum(nvl(total_vat_amount,0)) as pajak
                    from p_finance_period a
                    left join t_cust_account c on c.t_cust_account_id = $t_cust_account_id
                    left join t_vat_setllement b on b.p_finance_period_id = a.p_finance_period_id and b.t_cust_account_id = c.t_cust_account_id and p_settlement_type_id in (1,4,6) and b.p_vat_type_dtl_id not in (27,15)
                    where a. p_finance_period_id in (
                    SELECT
                        p_finance_period_id
                    FROM
                        p_finance_period
                    WHERE
                        start_date = (select start_date
                                                    from p_finance_period 
                                                    where p_finance_period_id = $p_finance_period_id)
                    or 
                        start_date = (select start_date - '1 years' :: INTERVAL
                                                    from p_finance_period 
                                                    where p_finance_period_id = $p_finance_period_id)
                    OR
                        start_date = (select start_date - '2 years' :: INTERVAL 
                                                    from p_finance_period 
                                                    where p_finance_period_id = $p_finance_period_id)
                    )
                    and 
                    ( case 
                            when $p_vat_type_dtl_id = 0  then TRUE 
                            when $p_vat_type_dtl_id = 10 then b.p_vat_type_dtl_id in (10,9)
                            else c.p_vat_type_dtl_id = $p_vat_type_dtl_id end
                    )

                    group by 
                    c.npwd,c.wp_name,a.p_finance_period_id,a.code
                    ORDER BY a.start_date;  ";
            
            $query = $this->db->query($sql);
            // print_r($sql);
            // exit();

            $items_date = $query->result_array();

            return $items_date;


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

/* End of file p_bank.php */