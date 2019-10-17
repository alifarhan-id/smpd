<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_laporan_denda extends Abstract_model {

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
    

    function getData($p_vat_type_dtl_id, $start_date, $end_date, $status_bayar){
        try {
            $sql="select a.t_vat_setllement_id as set_id,a.npwd as npwpd ,z.code as masa_pajak,
                    to_char(due_date,'dd-mm-yyyy')as due_date_char, to_char(settlement_date,'dd-mm-yyyy') as tgl_tap,
                    p.vat_code as ayat_pajak,q.vat_code as jenis_pajak, 
                    * from t_vat_setllement a
                    left join t_cust_account x on x.t_cust_account_id=a.t_cust_account_id
                    left join t_payment_receipt y on y.t_vat_setllement_id=a.t_vat_setllement_id
                    left join p_finance_period z on z.p_finance_period_id = a.p_finance_period_id
                    left join p_vat_type_dtl p on p.p_vat_type_dtl_id = a.p_vat_type_dtl_id
                    left join p_vat_type q on q.p_vat_type_id = p.p_vat_type_id 
                    left join p_settlement_type r on r.p_settlement_type_id=a.p_settlement_type_id
                    where a.p_settlement_type_id = 7
                    and a.settlement_date between to_date('".$start_date."','yyyy-mm-dd') 
                        and (to_date('".$end_date."','yyyy-mm-dd')+1)
                    and a.p_vat_type_dtl_id not in (11, 15, 41, 12, 42, 43, 30, 17, 21, 27, 31)
                    and x.p_account_status_id = 1
                    and nvl(a.total_penalty_amount,0) > 0";
        if ($p_vat_type_dtl_id!=''){
            $sql.="and a.p_vat_type_dtl_id =".$p_vat_type_dtl_id;
        }
        if ($status_bayar==2){
            $sql.="and receipt_no is not null ORDER BY wp_name";
        }else{
            if ($status_bayar==3){
                $sql.="and receipt_no is null ORDER BY wp_name";
            }else{
                $sql.="ORDER BY q.p_vat_type_id, ayat_pajak, wp_name,a.npwd, start_period";
            }
        }
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