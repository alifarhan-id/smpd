<?php

/**
 * T_rep_lap_bpps_terakhir_bayar Model
 *
 */
class T_rep_lap_bpps_terakhir_bayar extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = "0 as nomor, *,trunc(payment_date) , (kode_jns_pajak||' '||kode_ayat) as no_ayat ";
    public $fromClause      = "f_rep_bpps_piutang2new_rm_masuk_resto%s";

    public $refs            = array();

    function __construct($p_vat_type_id = '') {
        $this->fromClause = sprintf($this->fromClause, "($p_vat_type_id, 4, '01-01-2010', to_char(sysdate,'dd-mm-yyyy'), 1)");
        parent::__construct();
    }
    

    function getData($p_vat_type_id){
        try {
            $tgl_penerimaan = "'01-01-2010'";
            $i_flag_setoran = 1;
            $p_year_period_id = 4;

            $sql="select 0 as nomor, *,trunc(payment_date) , (kode_jns_pajak||' '||kode_ayat) as no_ayat
                    from f_rep_bpps_piutang2new_rm_masuk_resto($p_vat_type_id, $p_year_period_id, $tgl_penerimaan, to_char(sysdate,'dd-mm-yyyy'), $i_flag_setoran) 
                    order by p_vat_type_dtl_id, wp_name,npwpd, payment_date";
            $query = $this->db->query($sql);
            // print_r($sql);
            // exit();

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