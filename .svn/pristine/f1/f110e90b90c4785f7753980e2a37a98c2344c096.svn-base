<?php

/**
 * T_laporan_perkembangan_jumlah_wp Model
 *
 */
class T_laporan_perkembangan_jumlah_wp extends Abstract_model {

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

    function getDataWp($npwpd_jabatan, $p_finance_period_id){
        /*echo $npwpd_jabatan." ".$p_finance_period_id;
        exit();*/
        $sql = "select case when p_vat_type_dtl_id = 35 then 'RUMAH KOS' 
                        when p_vat_type_dtl_id = 18 then 'DISKOTIK/KLUB MALAM' 
                        when p_vat_type_dtl_id = 13 then 'PANTI PIJAT/SPA/REFLEKSI' 
                        when p_vat_type_dtl_id = 31 then 'HIBURAN INSIDENTIL' 
                        else ayat_pajak end as ayat_pajak_2,* 
            from 
            (select upper(b.vat_code) as jenis_pajak ,a.vat_code as ayat_pajak,a.p_vat_type_dtl_id,
            (select count(*) from t_cust_account x 
                where case when ".$npwpd_jabatan." = 1 then true 
                           else x.npwpd_jabatan = 'Y'
                      end
                    and case when A.p_vat_type_dtl_id = 10 then x.p_vat_type_dtl_id in (9,10) 
                         when A.p_vat_type_dtl_id = 18 then x.p_vat_type_dtl_id in (18,20) 
                         when A.p_vat_type_dtl_id = 13 then x.p_vat_type_dtl_id in (13,44) 
                         when A.p_vat_type_dtl_id = 31 then x.p_vat_type_dtl_id in (15,41,12,17,21,42,43,27,30,31) 
                         else A.p_vat_type_dtl_id = x.p_vat_type_dtl_id end
                    and x.p_account_status_id = 1 and
                            trunc(x.last_satatus_date) <= (select end_date from p_finance_period y where y.p_finance_period_id = ".$p_finance_period_id.")) as jumlah_aktif_sd_bulan_ini,

            (select count(*) from t_cust_account x 
                where case when ".$npwpd_jabatan." = 1 then true 
                           else x.npwpd_jabatan = 'Y'
                      end
                    and case when A.p_vat_type_dtl_id = 10 then x.p_vat_type_dtl_id in (9,10) 
                         when A.p_vat_type_dtl_id = 18 then x.p_vat_type_dtl_id in (18,20) 
                         when A.p_vat_type_dtl_id = 13 then x.p_vat_type_dtl_id in (13,44) 
                         when A.p_vat_type_dtl_id = 31 then x.p_vat_type_dtl_id in (15,41,12,17,21,42,43,27,30,31) 
                         else A.p_vat_type_dtl_id = x.p_vat_type_dtl_id end
                    and x.p_account_status_id != 1 and
                            trunc(x.last_satatus_date) <= (select end_date from p_finance_period y where y.p_finance_period_id = ".$p_finance_period_id.")) as jumlah_non_aktif_sd_bulan_ini,

            (select count(*) from t_cust_account x 
                where case when ".$npwpd_jabatan." = 1 then true 
                           else x.npwpd_jabatan = 'Y'
                      end
                    and case when A.p_vat_type_dtl_id = 10 then x.p_vat_type_dtl_id in (9,10) 
                         when A.p_vat_type_dtl_id = 18 then x.p_vat_type_dtl_id in (18,20) 
                         when A.p_vat_type_dtl_id = 13 then x.p_vat_type_dtl_id in (13,44) 
                         when A.p_vat_type_dtl_id = 31 then x.p_vat_type_dtl_id in (15,41,12,17,21,42,43,27,30,31) 
                         else A.p_vat_type_dtl_id = x.p_vat_type_dtl_id end
                    and x.p_account_status_id = 1 and
                            trunc(x.last_satatus_date) BETWEEN (select start_date from p_finance_period y where y.p_finance_period_id = ".$p_finance_period_id.") 
                                and (select end_date from p_finance_period y where y.p_finance_period_id = ".$p_finance_period_id.")) as jumlah_aktif_bulan_ini,

            (select count(*) from t_cust_account x 
                where case when ".$npwpd_jabatan." = 1 then true 
                           else x.npwpd_jabatan = 'Y'
                      end
                    and case when A.p_vat_type_dtl_id = 10 then x.p_vat_type_dtl_id in (9,10) 
                         when A.p_vat_type_dtl_id = 18 then x.p_vat_type_dtl_id in (18,20) 
                         when A.p_vat_type_dtl_id = 13 then x.p_vat_type_dtl_id in (13,44) 
                         when A.p_vat_type_dtl_id = 31 then x.p_vat_type_dtl_id in (15,41,12,17,21,42,43,27,30,31) 
                         else A.p_vat_type_dtl_id = x.p_vat_type_dtl_id end
                    and x.p_account_status_id != 1 and
                            trunc(x.last_satatus_date) BETWEEN (select start_date from p_finance_period y where y.p_finance_period_id = ".$p_finance_period_id.") 
                                and  (select end_date from p_finance_period y where y.p_finance_period_id = ".$p_finance_period_id.")) as jumlah_non_aktif_bulan_ini,

            (select count(*) from t_cust_account x 
                where case when ".$npwpd_jabatan." = 1 then true 
                           else x.npwpd_jabatan = 'Y'
                      end
                    and case when A.p_vat_type_dtl_id = 10 then x.p_vat_type_dtl_id in (9,10) 
                         when A.p_vat_type_dtl_id = 18 then x.p_vat_type_dtl_id in (18,20) 
                         when A.p_vat_type_dtl_id = 13 then x.p_vat_type_dtl_id in (13,44) 
                         when A.p_vat_type_dtl_id = 31 then x.p_vat_type_dtl_id in (15,41,12,17,21,42,43,27,30,31) 
                         else A.p_vat_type_dtl_id = x.p_vat_type_dtl_id end
                    and x.p_account_status_id = 1 and
                            trunc(x.last_satatus_date) <= (select end_date from p_finance_period z where z.end_date = 
                                (select start_date-1 from p_finance_period y where y.p_finance_period_id = ".$p_finance_period_id."))) as jumlah_aktif_sd_bulan_lalu,

            (select count(*) from t_cust_account x 
                where case when ".$npwpd_jabatan." = 1 then true 
                           else x.npwpd_jabatan = 'Y'
                      end
                    and case when A.p_vat_type_dtl_id = 10 then x.p_vat_type_dtl_id in (9,10) 
                         when A.p_vat_type_dtl_id = 18 then x.p_vat_type_dtl_id in (18,20) 
                         when A.p_vat_type_dtl_id = 13 then x.p_vat_type_dtl_id in (13,44) 
                         when A.p_vat_type_dtl_id = 31 then x.p_vat_type_dtl_id in (15,41,12,17,21,42,43,27,30,31) 
                         else A.p_vat_type_dtl_id = x.p_vat_type_dtl_id end
                    and x.p_account_status_id != 1 and
                            trunc(x.last_satatus_date) <= (select end_date from p_finance_period z where z.end_date = 
                                (select start_date-1 from p_finance_period y where y.p_finance_period_id = ".$p_finance_period_id."))) as jumlah_non_aktif_sd_bulan_lalu


            from p_vat_type_dtl a
            left join p_vat_type b on b.p_vat_type_id = a.p_vat_type_id
            where a.p_vat_type_id in (1,2,3,4,5)
                and a.p_vat_type_dtl_id not in (9,20,44,15,41,12,17,21,42,43,27,30)
            ORDER BY a.p_vat_type_id,a.code)";
        
        $output = $this->db->query($sql);
        //echo "vat_type->".$p_vat_type_id." tgl ->".$tgl_penerimaan." setoran->".$i_flag_setoran."kode bank -> ".$kode_bank." status->".$status;exit;

        $items = $output->result_array();
        //print_r($items); exit;

        if($items == null || $items == '')
            $items = 'no result';
        
        return $items;
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

/* End of file T_laporan_perkembangan_jumlah_wp.php */