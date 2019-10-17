<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_rep_bpps2 extends Abstract_model {

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

    function getBpps2($p_vat_type_id, $tgl_penerimaan, $i_flag_setoran, $kode_bank, $status){
        $sql = "select b.payment_key, a.*, kode_jns_pajak||kode_ayat as no_ayat 
                    from sikp.f_rep_bpps_mod_4(?, 0, ?,?,?,?) a 
                    left join sikp.t_vat_setllement b 
                    on b.t_vat_setllement_id=a.t_vat_setllement_id 
                    order by kode_jns_trans, kode_jns_pajak, kode_ayat";
        //return $sql;
        $output = $this->db->query($sql, array($p_vat_type_id, $tgl_penerimaan, $i_flag_setoran, $kode_bank, $status));
        //echo "vat_type->".$p_vat_type_id." tgl ->".$tgl_penerimaan." setoran->".$i_flag_setoran."kode bank -> ".$kode_bank." status->".$status;exit;
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