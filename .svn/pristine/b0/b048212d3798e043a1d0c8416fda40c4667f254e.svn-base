<?php

/**
 * t_laporan_rekap_bphtb_verifikasi Model
 *
 */
class T_laporan_rekap_bphtb_verifikasi extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = " reg_bphtb.t_bphtb_registration_id,
                                to_char(reg_bphtb.creation_date, 'YYYY-MM-DD') as creation_date,
                                registration_no,
                                wp_name,
                                reg_bphtb.p_bphtb_legal_doc_type_id,
                                bphtb_doc.description,
                                njop_pbb,
                                land_area,
                                land_total_price,
                                building_area,
                                building_total_price,
                                market_price,
                                bphtb_amt_final";
    public $fromClause      = "sikp.t_bphtb_registration reg_bphtb
                                LEFT JOIN p_bphtb_legal_doc_type bphtb_doc on bphtb_doc.p_bphtb_legal_doc_type_id = reg_bphtb.p_bphtb_legal_doc_type_id
                                LEFT JOIN t_customer_order cust_order ON cust_order.t_customer_order_id = reg_bphtb.t_customer_order_id 
                                LEFT JOIN t_payment_receipt_bphtb payment ON reg_bphtb.t_bphtb_registration_id = payment.t_bphtb_registration_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function getNomorValidasi(){
        try {
            
            $sql = "select 'V-'||nextval('nomor_validasi_seq')||'/BPHTB-DYJ/'||to_char(sysdate,'YYYY') as nomor_validasi from dual";

            $query = $this->db->query($sql);

            $items = $query->result_array();
            //print_r($items[0]['nomor_validasi']);exit();

            return $items[0]['nomor_validasi'];

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    function updateBPHTB($t_bphtb_registration_id,$nomor_validasi){
        try {

            $sql = "UPDATE t_bphtb_registration 
                    set status_verifikasi = 'Y', 
                    nomor_validasi = '".$nomor_validasi."' ,
                    tanggal_validasi = sysdate
                    WHERE t_bphtb_registration_id = ".$t_bphtb_registration_id;

            $query = $this->db->query($sql);

            //print_r($query);exit();           

            return $query;
            
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

/* End of file t_laporan_rekap_bphtb_verifikasi.php */