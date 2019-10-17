<?php

/**
 * T_laporan_pembayaran_per_bulan_per_ayat Model
 *
 */
class T_laporan_pembayaran_per_bulan_per_ayat extends Abstract_model {

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
    

    function getDataPerJenis($p_vat_type_id, $start_date, $kode_wilayah, $npwpd_jabatan, $tgl_penerimaan, $tgl_penerimaan_last){
        try {
            $sql="SELECT 
                (select count(*) from t_cust_account where p_account_status_id = 1 
                and trunc(last_satatus_date) <= (select end_date from p_finance_period where start_date = to_date('".$start_date."','dd-mm-yyyy'))
                and p_vat_type_id = ".$p_vat_type_id."
                and case when '".$kode_wilayah."' = '0' then true 
                    when '".$kode_wilayah."' = 'lainnya' then f_get_wilayah2(npwd)='-' 
                    else '".$kode_wilayah."' = f_get_wilayah2(npwd) end
                and case when ".$npwpd_jabatan." = 1 then true else npwpd_jabatan='Y' end) as aktif,
                count(DISTINCT a.t_cust_account_id) as bayar,sum(payment_amount) as nilai
                FROM t_vat_setllement a
                    left join t_cust_account b on a.t_cust_account_id=b.t_cust_account_id
                    left join t_payment_receipt c on c.t_vat_setllement_id=a.t_vat_setllement_id
                WHERE p_account_status_id = 1 
                    and trunc(last_satatus_date) <= (select end_date from p_finance_period where start_date = to_date('".$start_date."','dd-mm-yyyy'))
                    and b.p_vat_type_id = ".$p_vat_type_id."
                    and c.t_payment_receipt_id is not null
                    and trunc(payment_date) between to_date('".$tgl_penerimaan."','dd-mm-yyyy') and to_date('".$tgl_penerimaan_last."','dd-mm-yyyy')
                    and case when ".$npwpd_jabatan." = 1 then true else npwpd_jabatan='Y' end
                    and case when '".$kode_wilayah."' = '0' then true 
                        when '".$kode_wilayah."' = 'lainnya' then f_get_wilayah2(b.npwd)='-' 
                        else '".$kode_wilayah."' = f_get_wilayah2(b.npwd) end
                    and a.p_finance_period_id = (select p_finance_period_id from p_finance_period where start_date = to_date('".$start_date."','dd-mm-yyyy'))";
            
			$query = $this->db->query($sql);
            
            $items = $query->row_array();
            // echo $items['aktif'];
            // exit();
            return $items;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

    }

    function getData($p_vat_type_dtl_id,$start_date, $kode_wilayah, $npwpd_jabatan, $tgl_penerimaan, $tgl_penerimaan_last){
        
            $sql = "select
                    (select count(*) from t_cust_account where p_account_status_id = 1 
                    and trunc(last_satatus_date) <= (select end_date from p_finance_period where start_date = to_date('".$start_date."','dd-mm-yyyy'))
                    and case when ".$p_vat_type_dtl_id." = 10 then p_vat_type_dtl_id in (9,10) 
                        when ".$p_vat_type_dtl_id." = 18 then p_vat_type_dtl_id in (18,20)
                        when ".$p_vat_type_dtl_id." = 13 then p_vat_type_dtl_id in (13,44) 
                        when ".$p_vat_type_dtl_id." = 31 then p_vat_type_dtl_id in (15,41,12,17,21,42,43,27,30,31) 
                        else p_vat_type_dtl_id = ".$p_vat_type_dtl_id."
                        end
                    and case when '".$kode_wilayah."' = '0' then true 
                        when '".$kode_wilayah."' = 'lainnya' then f_get_wilayah2(npwd)='-' 
                        else '".$kode_wilayah."' = f_get_wilayah2(npwd) end
                    and case when ".$npwpd_jabatan." = 1 then true else npwpd_jabatan='Y' end) as aktif,
                        count(DISTINCT a.t_cust_account_id) as bayar,sum(payment_amount) as nilai
                from t_vat_setllement a
                    left join t_cust_account b on a.t_cust_account_id=b.t_cust_account_id
                    left join t_payment_receipt c on c.t_vat_setllement_id=a.t_vat_setllement_id
                where p_account_status_id = 1 
                    and trunc(last_satatus_date) <= (select end_date from p_finance_period where start_date = to_date('".$start_date."','dd-mm-yyyy'))
                    and case when ".$p_vat_type_dtl_id." = 10 then b.p_vat_type_dtl_id in (9,10) 
                        when ".$p_vat_type_dtl_id." = 18 then b.p_vat_type_dtl_id in (18,20)
                        when ".$p_vat_type_dtl_id." = 13 then b.p_vat_type_dtl_id in (13,44) 
                        when ".$p_vat_type_dtl_id." = 31 then b.p_vat_type_dtl_id in (15,41,12,17,21,42,43,27,30,31) 
                        else b.p_vat_type_dtl_id = ".$p_vat_type_dtl_id."
                        end
                    and c.t_payment_receipt_id is not null
                    and trunc(payment_date) between to_date('".$tgl_penerimaan."','dd-mm-yyyy') and to_date('".$tgl_penerimaan_last."','dd-mm-yyyy')
                    and case when ".$npwpd_jabatan." = 1 then true else npwpd_jabatan='Y' end
                    and case when '".$kode_wilayah."' = '0' then true 
                        when '".$kode_wilayah."' = 'lainnya' then f_get_wilayah2(b.npwd)='-' 
                        else '".$kode_wilayah."' = f_get_wilayah2(b.npwd) end
                    and a.p_finance_period_id = (select p_finance_period_id from p_finance_period where start_date = to_date('".$start_date."','dd-mm-yyyy'))";
            
            $query = $this->db->query($sql);


            $items_date = $query->row_array();

            return $items_date;


    }

    function getAyat(){
        $items = array();
        try {
            $sql="select 
                    0 as aktif1, 0 as bayar1, 0 as nilai1, 
                    0 as aktif2, 0 as bayar2, 0 as nilai2, 
                    0 as aktif3, 0 as bayar3, 0 as nilai3, 
                    0 as aktif4, 0 as bayar4, 0 as nilai4, 
                    0 as aktif5, 0 as bayar5, 0 as nilai5, 
                    0 as aktif6, 0 as bayar6, 0 as nilai6, 
                    0 as aktif7, 0 as bayar7, 0 as nilai7, 
                    0 as aktif8, 0 as bayar8, 0 as nilai8, 
                    0 as aktif9, 0 as bayar9, 0 as nilai9, 
                    0 as aktif10, 0 as bayar10, 0 as nilai10, 
                    0 as aktif11, 0 as bayar11, 0 as nilai11, 
                    0 as aktif12, 0 as bayar12, 0 as nilai12, 
                    case when p_vat_type_dtl_id = 35 then 'RUMAH KOS' 
                        when p_vat_type_dtl_id = 18 then 'DISKOTIK/KLUB MALAM' 
                        when p_vat_type_dtl_id = 13 then 'PANTI PIJAT/SPA/REFLEKSI' 
                        when p_vat_type_dtl_id = 31 then 'HIBURAN INSIDENTIL' 
                        else ayat_pajak end as ayat_pajak_2,* 
                    from 
                    (select upper(b.vat_code) as jenis_pajak ,a.vat_code as ayat_pajak,a.p_vat_type_dtl_id,a.p_vat_type_id
                    from p_vat_type_dtl a
                    left join p_vat_type b on b.p_vat_type_id = a.p_vat_type_id
                    where a.p_vat_type_id in (1,2,3,4,5)
                        and a.p_vat_type_dtl_id not in (9,20,44,15,41,12,17,21,42,43,27,30)
                    ORDER BY a.p_vat_type_id,a.code)";                  
           
            $query = $this->db->query($sql);


            $items = $query->result_array();      
            
            
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