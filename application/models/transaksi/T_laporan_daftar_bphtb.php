<?php

/**
 * t_laporan_daftar_bphtb Model
 *
 */
class T_laporan_daftar_bphtb extends Abstract_model {

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

    function getExcel($start_date,$end_date){
        $sql = "SELECT a.*, to_char(a.creation_date,'yyyy-mm-dd') AS tgl_bphtb, b.order_no, kelurahan_wp.region_name AS kelurahan_wp_name, kecamatan_wp.region_name AS kecamatan_wp_name,
            kelurahan_op.region_name AS kelurahan_op_name, kecamatan_op.region_name AS kecamatan_op_name,
            doc_type.description AS nama_dokumen

            FROM t_bphtb_registration AS a
            LEFT JOIN t_customer_order AS b ON a.t_customer_order_id = b.t_customer_order_id
            LEFT JOIN p_region AS kelurahan_wp ON a.wp_p_region_id_kel = kelurahan_wp.p_region_id
            LEFT JOIN p_region AS kecamatan_wp ON a.wp_p_region_id_kec = kecamatan_wp.p_region_id
            LEFT JOIN p_region AS kelurahan_op ON a.object_p_region_id_kel = kelurahan_op.p_region_id
            LEFT JOIN p_region AS kecamatan_op ON a.object_p_region_id_kec = kecamatan_op.p_region_id
            LEFT JOIN p_bphtb_legal_doc_type AS doc_type ON a.p_bphtb_legal_doc_type_id = doc_type.p_bphtb_legal_doc_type_id";

        $sql .= " WHERE (trunc(a.creation_date) 
                            BETWEEN ? AND ?) ";

        $sql .= " ORDER BY a.registration_no ASC";

        $output = $this->db->query($sql, array($start_date,$end_date));
        $items = $output->result_array();

        if ($items == null || $items == '')
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

/* End of file p_bank.php */