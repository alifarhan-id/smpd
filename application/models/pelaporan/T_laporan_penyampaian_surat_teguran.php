<?php

/**
 * T_laporan_penyampaian_surat_teguran Model
 *
 */
class T_laporan_penyampaian_surat_teguran extends Abstract_model {

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

    function getDataTeguran($p_vat_type_id, $p_finance_period_id){
        /*echo $npwpd_jabatan." ".$p_finance_period_id;
        exit();*/
        $sql = "select b.company_brand,regexp_replace(b.brand_address_name, '\r|\n', '', 'g')||' '||b.brand_address_no as alamat_merk_dagang,a.* ,
            c.total_vat_amount,c.total_penalty_amount
            from f_penyampaian_surat_teguran_fase_2(?,?,'') a
            left join t_cust_account b on a.npwpd = b.npwd
            left join t_vat_setllement c on a.t_vat_setllement_id = c.t_vat_setllement_id
            ORDER BY company_brand,npwpd, surat_teguran_3,surat_teguran_2,surat_teguran_1";
        
        $output = $this->db->query($sql, array($p_vat_type_id, $p_finance_period_id));
        //echo "vat_type->".$p_vat_type_id." tgl ->".$tgl_penerimaan." setoran->".$i_flag_setoran."kode bank -> ".$kode_bank." status->".$status;exit;

        $items = $output->result_array();
        //print_r($items); exit;
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

/* End of file T_laporan_penyampaian_surat_teguran.php */