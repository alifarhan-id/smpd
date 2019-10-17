<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_history_skpdkb extends Abstract_model {

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
    

    function getData($p_finance_period_id){
        try {
            $sql="SELECT
                 t_vat.npwd as npwpd,
                    to_char(t_vat.settlement_date,'dd-mm-yyyy') as ketetapan_baru,
                    to_char(h_vat.settlement_date,'dd-mm-yyyy') as ketetapan_lama,
                    t_vat.start_period,
                    t_vat.end_period,
                    t_vat.total_vat_amount as jumlah,
                    h_vat.total_vat_amount as jumlah_lama,
                    a.*,
                    b.code as masa_pajak,
                    to_char(c.payment_date,'dd-mm-yyyy') as payment_date,
                    d.vat_code as ayat_pajak, 0 as nomor, '' as status
                FROM
                     t_vat_setllement t_vat,
                     h_vat_setllement h_vat,
                     t_cust_account a,
                     p_finance_period b ,
                     t_payment_receipt c,
                     p_vat_type_dtl d
                WHERE
                    h_vat.p_settlement_type_id in(4,5)
                    and t_vat.p_settlement_type_id =1
                    and t_vat.p_finance_period_id = h_vat.p_finance_period_id
                    and t_vat.t_cust_account_id = h_vat.t_cust_account_id
                    and t_vat.p_finance_period_id = ".$p_finance_period_id."
                    and a.t_cust_account_id= t_vat.t_cust_account_id
                    and b.p_finance_period_id = t_vat.p_finance_period_id
                    and t_vat.t_vat_setllement_id=c.t_vat_setllement_id (+)
                    and upper(h_vat.modification_type) = 'DELETE'
                    and d.p_vat_type_dtl_id=t_vat.p_vat_type_dtl_id
                    order by wp_name ASC, t_vat.start_period DESC";
            $query = $this->db->query($sql);

            $items = $query->result_array();
            // print_r($items);
            // exit();
            return $items;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

    }

    function getDate($start_date, $end_date){
        
            $sql = "SELECT code,to_char(start_date,'yyyy-mm-dd') as start_date,
            to_char(end_date,'yyyy-mm-dd') as end_date 
            FROM p_finance_period where  
            start_date between to_date('".$start_date."','yyyy-mm-dd') 
                and to_date('".$end_date."','yyyy-mm-dd')
            or
            end_date between to_date('".$start_date."','yyyy-mm-dd') 
                and to_date('".$end_date."','yyyy-mm-dd')
            ORDER BY start_date";
            
            $query = $this->db->query($sql);


            $items_date = $query->result_array();

            return $items_date;


    }

    function getRekap($p_vat_type_dtl_id, $start_date, $end_date, $status_bayar, $item){
        $items = array();
        try {
            for($i=0; $i<count($item); $i++) {
                $sql="select sum(NVL(a.total_penalty_amount,0)) as denda, '' as code, 0 as nomor
                        from t_vat_setllement a 
                        left join t_payment_receipt y on y.t_vat_setllement_id=a.t_vat_setllement_id
                        left join t_cust_account x on x.t_cust_account_id=a.t_cust_account_id
                        left join p_settlement_type r on r.p_settlement_type_id=a.p_settlement_type_id
                        where a.p_settlement_type_id = 7
                        and a.settlement_date between to_date('".$start_date."','yyyy-mm-dd') 
                            and (to_date('".$end_date."','yyyy-mm-dd')+1)
                        and a.settlement_date between to_date('".$item[$i]['start_date']."','yyyy-mm-dd') 
                            and (to_date('".$item[$i]['end_date']."','yyyy-mm-dd')+1)
                        and a.p_vat_type_dtl_id not in (11, 15, 41, 12, 42, 43, 30, 17, 21, 27, 31)
                        and x.p_account_status_id = 1";                   
                if ($p_vat_type_dtl_id!=''){
                    $sql.="and a.p_vat_type_dtl_id =".$p_vat_type_dtl_id;
                }
                if ($status_bayar==2){
                    $sql.="and receipt_no is not null";
                }
                if ($status_bayar==3){
                    $sql.="and receipt_no is null";
                }

                $query = $this->db->query($sql);


                $items [] = $query->row_array();      
            }
            
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

/* End of file p_bank.php */