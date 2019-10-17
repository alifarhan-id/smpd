<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_laporan_history_potensi_piutang_tgl_tap extends Abstract_model {

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

    function getOptKetetapan(){
        try {
            $sql = "SELECT p_settlement_type_id, code
                        FROM p_settlement_type
                        order by p_settlement_type_id";
            $query = $this->db->query($sql);

            $items = $query->result_array();
            return $items;
            exit();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

    }

    

    function getData($p_settlement_type_id, $p_vat_type_id, $start_date, $end_date, $business_area, $status_bayar){
        try {
            $sql = "SELECT f_get_wilayah(a.npwd)as wilayah,
                    to_char(last_satatus_date,'dd-mm-yyyy') as last_satatus_date_short , 
                    to_char(active_date ,'dd-mm-yyyy') as active_date_short,
                    a.t_vat_setllement_id as set_id,a.npwd as npwpd ,z.code as masa_pajak,
                    to_char(due_date,'dd-mm-yyyy')as due_date_char, to_char(settlement_date,'dd-mm-yyyy') as tgl_tap,
                    p.vat_code as ayat_pajak,q.vat_code as jenis_pajak,a.payment_key as payment_key2,  (brand_address_name||' '||replace(brand_address_no, '-', '')) as brand_address, 0 as total, '' as status, 0 as sisa , 0 as nomor,
                    * from t_vat_setllement a
                    left join t_cust_account x on x.t_cust_account_id=a.t_cust_account_id
                    left join t_payment_receipt y on y.t_vat_setllement_id=a.t_vat_setllement_id
                    left join p_finance_period z on z.p_finance_period_id = a.p_finance_period_id
                    left join p_vat_type_dtl p on p.p_vat_type_dtl_id = a.p_vat_type_dtl_id
                    left join p_vat_type q on q.p_vat_type_id = p.p_vat_type_id 
                    where p_settlement_type_id = ".$p_settlement_type_id." 
                    and a.settlement_date between to_date('".$start_date."','yyyy-mm-dd') 
                        and (to_date('".$end_date."','yyyy-mm-dd')+1)
                    ";
            if ($p_vat_type_id!='' || $p_vat_type_id!=0){
                $sql.="and a.p_vat_type_dtl_id in (select p_vat_type_dtl_id 
                        from p_vat_type_dtl where p_vat_type_id =".$p_vat_type_id.")";
            }
            if ($business_area!=0){
                $sql.=" and f_get_wilayah_id(a.npwd) =".$business_area." ";
            }
            if ( $status_bayar==2){
                $sql.="and receipt_no is not null ORDER BY q.p_vat_type_id, ayat_pajak, company_brand, start_period";
            }else{
                if ( $status_bayar==3){
                    $sql.="and receipt_no is null ORDER BY q.p_vat_type_id, ayat_pajak, company_brand, start_period";
                }else{
                    $sql.="ORDER BY q.p_vat_type_id, ayat_pajak, company_brand, start_period";
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

    function getRekap($p_settlement_type_id, $p_vat_type_id, $start_date, $end_date, $status_bayar){
        try {
            
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


            $items = array();


            
            for($i=0; $i<count($items_date); $i++) {
                    $sql="SELECT sum(y.payment_vat_amount) as realisasi, $i+1 as nomor,
                    sum(a.total_vat_amount) as ketetapan, (sum(a.total_vat_amount)-sum(y.payment_vat_amount)) as sisa, '".$items_date[$i]['code']."' as code
                    from t_vat_setllement a
                    left join t_payment_receipt y on y.t_vat_setllement_id=a.t_vat_setllement_id
                    left join t_cust_account x on x.t_cust_account_id=a.t_cust_account_id
                    where p_settlement_type_id = ".$p_settlement_type_id." 
                    and trunc(settlement_date) between to_date('".$items_date[$i]['start_date']."','yyyy-mm-dd') 
                        and (to_date('".$items_date[$i]['end_date']."','yyyy-mm-dd'))
                ";
                
                
                    
                if ($p_vat_type_id!=''){
                    $sql.="and a.p_vat_type_dtl_id in (select p_vat_type_dtl_id 
                            from p_vat_type_dtl where p_vat_type_id =".$p_vat_type_id.")";
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
            

            // print_r($sql);
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

/* End of file p_bank.php */