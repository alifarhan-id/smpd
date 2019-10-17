<?php

/**
 * t_laporan_permohonan_bphtb_pengurangan Model
 *
 */
class T_laporan_permohonan_bphtb_pengurangan extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = " pengurangan.updated_by,
                                a.receipt_no, 
                                b.njop_pbb, 
                                to_char(a.payment_date, 'YYYY-MM-DD') AS payment_date, 
                                to_char(b.creation_date, 'YYYY-MM-DD') AS creation_date, 
                                b.t_ppat_id,
                                b.wp_name, b.wp_address_name, 
                                kelurahan.region_name AS kelurahan_name, 
                                kecamatan.region_name AS kecamatan_name, 
                                kota.region_name AS kota_name, 
                                b.object_address_name, 
                                object_kelurahan.region_name AS object_kelurahan_name, 
                                object_kecamatan.region_name AS object_kecamatan_name, 
                                object_kota.region_name AS object_kota_name, 
                                b.land_area, 
                                b.building_area, 
                                b.land_total_price, 
                                a.payment_amount, 
                                b.verificated_by ,
                                pengurangan.keterangan_opsi_c,
                                (building_total_price+land_total_price) as njop,
                                b.bphtb_amt_final, 
                                b.bphtb_discount,
                                bphtb_amt";
    public $fromClause      = "t_bphtb_registration AS b
                                LEFT JOIN t_payment_receipt_bphtb AS a 
                                    ON a.t_bphtb_registration_id = b.t_bphtb_registration_id
                                LEFT JOIN p_region AS kelurahan 
                                    ON b.wp_p_region_id_kel = kelurahan.p_region_id
                                LEFT JOIN p_region AS kecamatan 
                                    ON b.wp_p_region_id_kec = kecamatan.p_region_id
                                LEFT JOIN p_region AS kota 
                                    ON b.wp_p_region_id = kota.p_region_id
                                LEFT JOIN p_region AS object_kelurahan 
                                    ON b.object_p_region_id_kel = object_kelurahan.p_region_id
                                LEFT JOIN p_region AS object_kecamatan 
                                    ON b.object_p_region_id_kec = object_kecamatan.p_region_id
                                LEFT JOIN p_region AS object_kota 
                                    ON b.object_p_region_id = object_kota.p_region_id
                                LEFT JOIN t_bphtb_exemption AS pengurangan 
                                    ON b.t_bphtb_registration_id = pengurangan.t_bphtb_registration_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
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