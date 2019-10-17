<?php

/**
 * T_laporan_penerimaan_bphtb Model
 *
 */
class T_laporan_penerimaan_bphtb_pengurangan_v2 extends Abstract_model {

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

    function getExcel($param = array()){

        $whereClause='';
        $criteria = array();
         
        if(!empty($param['start_date'])&&!empty($param['end_date'])){
            $criteria[] = " (trunc(a.payment_date) BETWEEN '".$param['start_date']."' AND '".$param['end_date']."') ";

        }else if(!empty($param['start_date'])&&empty($param['end_date'])){
            $criteria[] = " trunc(a.payment_date) >= '".$param['start_date']."' ";

        }else if(empty($param['start_date'])&&!empty($param['end_date'])){
            $criteria[] = " trunc(a.payment_date) <= '".$param['end_date']."' ";
        }

        if(!empty($param['receipt_no'])) {
            $criteria[] = " a.receipt_no ILIKE '%".$param['receipt_no']."%' ";
        }

        if(!empty($param['njop_pbb'])) {
            $criteria[] = " b.njop_pbb = '".$param['njop_pbb']."' ";
        }

        if(!empty($param['wp_name'])) {
            $criteria[] = " b.wp_name ILIKE '%".$param['wp_name']."%' ";
        }


        if(!empty($param['p_region_id_kecamatan'])) {
            $criteria[] = " b.wp_p_region_id_kec = ".$param['p_region_id_kecamatan'];
        }
        
        if(!empty($param['p_region_id_kelurahan'])) {
            $criteria[] = " b.wp_p_region_id_kel = ".$param['p_region_id_kelurahan'];
        }

        if($param['p_bphtb_legal_doc_type_id'] != 0) {
            $criteria[] = " b.p_bphtb_legal_doc_type_id = ".$param['p_bphtb_legal_doc_type_id'];
        }
        
        $criteria[] = " pengurangan.t_bphtb_exemption_id is not null "; 

        $whereClause = join(" AND ", $criteria);
        $sql="SELECT pengurangan.updated_by,
                        b.verificated_by,
                        a.receipt_no, 
                        b.njop_pbb, 
                        to_char(a.payment_date, 'YYYY-MM-DD') AS payment_date, 
                        to_char(b.creation_date, 'YYYY-MM-DD') AS creation_date,
                        b.wp_name, 
                        b.wp_address_name, 
                        kelurahan.region_name AS kelurahan_name, 
                        kecamatan.region_name AS kecamatan_name, 
                        b.land_area, 
                        b.building_area, 
                        b.land_total_price, 
                        a.payment_amount,
                        npop,
                        npop_tkp,
                        npop_kp,
                        bphtb_amt,
                        bphtb_discount/bphtb_amt*100 as bphtb_discount,
                        bphtb_amt_final
                FROM t_payment_receipt_bphtb AS a
                    LEFT JOIN t_bphtb_registration AS b 
                ON a.t_bphtb_registration_id = b.t_bphtb_registration_id
                    LEFT JOIN p_region AS kelurahan 
                ON b.wp_p_region_id_kel = kelurahan.p_region_id
                    LEFT JOIN p_region AS kecamatan 
                ON b.wp_p_region_id_kec = kecamatan.p_region_id
                    LEFT JOIN t_bphtb_exemption AS pengurangan 
                ON b.t_bphtb_registration_id = pengurangan.t_bphtb_registration_id";
        if(!empty($whereClause))
            $sql.= " WHERE ".$whereClause;
        $sql.= " ORDER BY a.receipt_no ASC";

       // return $sql;

        $output = $this->db->query($sql);
        $items = $output->result_array();
        
        return $items;
    }

    function getDoc($p_bphtb_legal_doc_type_id){
        $sql = "SELECT * from p_bphtb_legal_doc_type 
                where p_bphtb_legal_doc_type_id = ".$p_bphtb_legal_doc_type_id;

       // return $sql;

        $output = $this->db->query($sql);
        $items = $output->result_array();
        
        return $items[0]['description'];
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