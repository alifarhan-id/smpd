<?php

/**
 * Pembuatan schema Model
 *
 */
class T_bphtb_registration_list_expired extends Abstract_model {

    public $table           = "t_bphtb_registration_expired";
    public $pkey            = "t_bphtb_registration_id";
    public $alias           = "regis";

    public $fields          = array();

    public $selectClause    = " cust_order.*,
                                regis.*, 
                                to_char(regis.verification_date,'dd-mm-yyyy') as tgl_verifikasi";

    public $fromClause      = " t_bphtb_registration_expired regis
                                LEFT JOIN t_customer_order cust_order 
                                on regis.t_customer_order_id = cust_order.t_customer_order_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {
        $ci =& get_instance();

        if($this->actionType == 'CREATE') {

        }else {
            /*$this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];*/
        }
        return true;
    }

    function getDetailBphtb($id = 0){
        $sql = "select a.*,
                b.region_name as wp_kota,
                c.region_name as wp_kecamatan,
                d.region_name as wp_kelurahan,
                e.region_name as object_region,
                f.region_name as object_kecamatan,
                g.region_name as object_kelurahan,
                h.description as doc_name

                from t_bphtb_registration_expired as a 
                left join p_region as b
                    on a.wp_p_region_id = b.p_region_id
                left join p_region as c
                    on a.wp_p_region_id_kec = c.p_region_id
                left join p_region as d
                    on a.wp_p_region_id_kel = d.p_region_id
                left join p_region as e
                    on a.object_p_region_id = e.p_region_id
                left join p_region as f
                    on a.object_p_region_id_kec = f.p_region_id
                left join p_region as g
                    on a.object_p_region_id_kel = g.p_region_id
                left join p_bphtb_legal_doc_type as h
                    on a.p_bphtb_legal_doc_type_id = h.p_bphtb_legal_doc_type_id
                where a.t_bphtb_registration_id = ".$id;
        $query = $this->db->query($sql);
        //exit;
        return $query->row_array();
    }

    function restore($t_bphtb_registration_id){

        $sql = "SELECT * FROM sikp.f_restore_bphtb_expired ($t_bphtb_registration_id)";
        //return $sql;                                            
        $query = $this->db->query($sql);
        $item = $query->row_array();
        
        return $item;      
    }

    function getOrderStatus($t_bphtb_registration_id){
        $sql = "SELECT b.p_order_status_id
                    FROM t_bphtb_exemption AS a
                    LEFT JOIN t_customer_order AS b ON a.t_customer_order_id = b.t_customer_order_id
                    WHERE a.t_bphtb_registration_id =".$t_bphtb_registration_id;
        $query = $this->db->query($sql);
        $item = $query->row_array();
        
            
        return $item;
    }

    function getJumlahProductOrder($t_customer_order_id){
        $sql = "SELECT count(*) AS jml 
                FROM t_product_order_control 
                WHERE doc_id = ".$t_customer_order_id."
                AND p_w_doc_type_id = 505";
        $query = $this->db->query($sql);
        $item = $query->row_array();
        
            
        return $item;
    }

    
}

