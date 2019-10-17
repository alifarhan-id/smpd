<?php

/**
 * T_history Model
 *
 */
class T_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = "a.t_vat_setllement_id as set_id,
                                a.npwd as npwpd ,
                                z.code as masa_pajak,
                                to_char(due_date,'dd-mm-yyyy')as due_date_char, 
                                to_char(settlement_date,'dd-mm-yyyy') as tgl_tap,
                                p.vat_code as ayat_pajak,
                                q.vat_code as jenis_pajak, 
                                *, 
                                (case when r.code is null then 'Tunai' else r.code end) as p_payment_type_code";
    public $fromClause      = "t_vat_setllement a 
                                left join t_cust_account x on x.t_cust_account_id=a.t_cust_account_id
                                left join t_payment_receipt y on y.t_vat_setllement_id=a.t_vat_setllement_id
                                left join p_finance_period z on z.p_finance_period_id = a.p_finance_period_id
                                left join p_vat_type_dtl p on p.p_vat_type_dtl_id = a.p_vat_type_dtl_id
                                left join p_vat_type q on q.p_vat_type_id = p.p_vat_type_id 
                                left join p_payment_type r on y.p_payment_type_id = r.p_payment_type_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function getData($p_settlement_type_id, $p_payment_type_id, $p_vat_type_id, $date_start_laporan, $date_end_laporan){
        try {
            $sql="select 
                (case when total_penalty_amount is null then
                    total_vat_amount+0.00 
                when total_vat_amount is null then
                    0.00 + total_penalty_amount
                else
                    total_vat_amount+total_penalty_amount
                end)
                    as total_bayar,
                (case when total_penalty_amount is null then
                    (total_vat_amount+0.00)- payment_amount
                when total_vat_amount is null then
                    (0.00 + total_penalty_amount)- payment_amount
                when payment_amount is null then
                    (total_vat_amount + total_penalty_amount)- 0.00
                else
                    (total_vat_amount + total_penalty_amount)- payment_amount
                end)
                    as sisa,
                a.t_vat_setllement_id as set_id,a.npwd as npwpd ,z.code as masa_pajak,
                to_char(due_date,'dd-mm-yyyy')as due_date_char, to_char(settlement_date,'dd-mm-yyyy') as tgl_tap,
                p.vat_code as ayat_pajak,q.vat_code as jenis_pajak, 
                *, (case when r.code is null then 'Tunai' else r.code end) as p_payment_type_code from t_vat_setllement a 
                left join t_cust_account x on x.t_cust_account_id=a.t_cust_account_id
                left join t_payment_receipt y on y.t_vat_setllement_id=a.t_vat_setllement_id
                left join p_finance_period z on z.p_finance_period_id = a.p_finance_period_id
                left join p_vat_type_dtl p on p.p_vat_type_dtl_id = a.p_vat_type_dtl_id
                left join p_vat_type q on q.p_vat_type_id = p.p_vat_type_id 
                left join p_payment_type r on y.p_payment_type_id = r.p_payment_type_id
                where p_settlement_type_id = ".$p_settlement_type_id."
                and trunc(y.payment_date) between to_date('".$date_start_laporan."','yyyy-mm-dd') 
                    and to_date('".$date_end_laporan."','yyyy-mm-dd')
                and case when ".$p_payment_type_id."= 0 then true
                         when ".$p_payment_type_id."= 2 and y.p_payment_type_id is null then TRUE
                         else y.p_payment_type_id = ".$p_payment_type_id."
                    end ";
            if ($p_vat_type_id !=''){
                $sql.="and a.p_vat_type_dtl_id in (select p_vat_type_dtl_id 
                        from p_vat_type_dtl where p_vat_type_id =".$p_vat_type_id.")";
            }
            $sql.="ORDER BY q.p_vat_type_id, ayat_pajak, wp_name, start_period";

            $query = $this->db->query($sql);
            /*die($sql);
            exit;*/
            $items = $query->result_array();
            //$items['total_bayar'] = $this->getTotalBayar($items['total_vat_amount'], $items['total_penalty_amount']);
            //$items['sisa'] = $this->getSisa($items['total_bayar'], $items['payment_amount']);
        
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