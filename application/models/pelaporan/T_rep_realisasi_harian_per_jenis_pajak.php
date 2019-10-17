<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_rep_realisasi_harian_per_jenis_pajak extends Abstract_model {

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

    //data jenis laporan nya all 
    function getJenisLapAll($param=array()){
        
            $sql = "select d.brand_address_name, 
                            d.brand_address_no, 
                            d.company_brand, 
                            b.t_vat_setllement_id,
                            c.code,  
                            a.*,
                            trunc(payment_date) 
                    from f_rep_bpps_piutang2new_mod_1(".
                                                        $param['p_vat_type_id'].", ".
                                                        $param['p_year_period_id'].", ".
                                                        $param['tgl_penerimaan'].", ".
                                                        $param['tgl_penerimaan_last'].", ".
                                                        $param['jenis_setoran'].") a
                    left join t_vat_setllement b 
                        on a.t_vat_setllement_id = b.t_vat_setllement_id
                    left join p_settlement_type c 
                        on c.p_settlement_type_id=b.p_settlement_type_id
                    left join t_cust_account d 
                        on d.t_cust_account_id=b.t_cust_account_id
                    order by kode_jns_trans, kode_jns_pajak, kode_ayat";
            
            $query = $this->db->query($sql);


            $items = $query->result_array();

            return $items;
    }

    //data jenis laporan nya piutang 
    function getJenisLapPiutang($param=array()){
        
            $sql = "select *,
                            trunc(payment_date),
                            '' as code 
                        from f_rep_bpps_piutang(".
                                                    $param_arr['p_vat_type_id'].", ".
                                                    $param_arr['p_year_period_id'].", ".
                                                    $param_arr['tgl_penerimaan'].", ".
                                                    $param_arr['tgl_penerimaan_last'].", ".
                                                    $param_arr['jenis_setoran'].") rep
                    WHERE
                     EXTRACT (YEAR FROM rep.settlement_date) < ".$param_arr['year_date']."
                order by kode_jns_trans, kode_jns_pajak, kode_ayat";
            
            $query = $this->db->query($sql);

            $items = $query->result_array();

            return $items;
    }

    //data jenis laporan nya murni 
    function getJenisLapMurni($param=array()){
        
            $sql = "select *,
                            trunc(payment_date),
                            '' as code 
                        from f_rep_bpps_piutang(".
                                                    $param_arr['p_vat_type_id'].", ".
                                                    $param_arr['p_year_period_id'].", ".
                                                    $param_arr['tgl_penerimaan'].", ".
                                                    $param_arr['tgl_penerimaan_last'].", ".
                                                    $param_arr['jenis_setoran'].") rep
                    WHERE
                     EXTRACT (YEAR FROM rep.settlement_date) = ".$param_arr['year_date']."
                order by kode_jns_trans, kode_jns_pajak, kode_ayat";
            
            $query = $this->db->query($sql);

            $items = $query->result_array();

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

/* End of file p_bank.php */