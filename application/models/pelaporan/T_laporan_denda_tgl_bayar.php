<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_laporan_denda_tgl_bayar extends Abstract_model {

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
    

    function getData($p_vat_type_dtl_id, $start_date, $end_date){
        try {
            $sql="select  A .t_vat_setllement_id AS set_id,
                        e .npwd AS npwpd,
                        f.code AS masa_pajak,
                        to_char(due_date, 'dd-mm-yyyy')AS due_date_char, 
                        to_char(
                            settlement_date,
                            'dd-mm-yyyy'
                        )AS tgl_tap,
                        c .vat_code AS ayat_pajak,
                        d.vat_code AS jenis_pajak,
                        *
                    --sum(b.penalty_amt)
                    from t_payment_receipt a  , t_vat_penalty b,  p_vat_type_dtl c , 
                        p_vat_type d, t_vat_setllement e, p_finance_period f,
                        t_cust_account g
                    where a.t_vat_setllement_id = b.t_vat_setllement_id
                        and a.p_vat_type_dtl_id = c.p_vat_type_dtl_id
                        and c.p_vat_type_id = d.p_vat_type_id
                        and e.t_vat_setllement_id = a.t_vat_setllement_id
                        and f.p_finance_period_id = e.p_finance_period_id
                        and g.t_cust_account_id = e.t_cust_account_id
                        and a.payment_date between to_date('".$start_date."','yyyy-mm-dd') 
                            and (to_date('".$end_date."','yyyy-mm-dd')+1)";
            if ($p_vat_type_dtl_id!=''){
                $sql.="and decode(c.p_vat_type_id,7,d.code||c.code,d.penalty_code) = 
                    (select nomor_ayat from v_p_vat_type_dtl_rep where p_vat_type_dtl_id = ".$p_vat_type_dtl_id.")";
            }
            $sql.=" ORDER BY d.p_vat_type_id, ayat_pajak, wp_name,a.npwd, start_period";
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

    function getRekap($p_vat_type_dtl_id, $start_date, $end_date, $item){
        $items = array();
        try {
            for($i=0; $i<count($item); $i++) {
                $sql="select sum(NVL(b.penalty_amt,0)) as denda
                        from t_payment_receipt a  , t_vat_penalty b,  p_vat_type_dtl c , 
                            p_vat_type d, t_vat_setllement e, p_finance_period f,
                            t_cust_account g
                        where a.t_vat_setllement_id = b.t_vat_setllement_id
                            and a.p_vat_type_dtl_id = c.p_vat_type_dtl_id
                            and c.p_vat_type_id = d.p_vat_type_id
                            and e.t_vat_setllement_id = a.t_vat_setllement_id
                            and f.p_finance_period_id = e.p_finance_period_id
                            and g.t_cust_account_id = e.t_cust_account_id
                            and a.payment_date between to_date('".$start_date."','yyyy-mm-dd') 
                                and (to_date('".$end_date."','yyyy-mm-dd')+1)
                        and a.payment_date between to_date('".$item[$i]['start_date']."','yyyy-mm-dd') 
                and (to_date('".$item[$i]['end_date']."','yyyy-mm-dd')+1)";                  
                if ($p_vat_type_dtl_id!=''){
                    $sql.="and decode(c.p_vat_type_id,7,d.code||c.code,d.penalty_code) = (select nomor_ayat from v_p_vat_type_dtl_rep where p_vat_type_dtl_id = ".$p_vat_type_dtl_id.")";
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