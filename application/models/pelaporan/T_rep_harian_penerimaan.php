<?php

/**
 * t_rep_harian_penerimaan Model
 *
 */
class T_rep_harian_penerimaan extends Abstract_model {

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

    function getLap_penerimaan($start_date, $end_date){
        $sql = "select * from f_rep_harian_murni(?, ?) order by nomor_ayat";
        //return $sql;
        $output = $this->db->query($sql, array($start_date, $end_date));
        //echo "vat_type->".$p_vat_type_id." tgl ->".$tgl_penerimaan." setoran->".$i_flag_setoran."kode bank -> ".$kode_bank." status->".$status;exit;
        $items = $output->result_array();

        if ($items == null || $items == '')
            $items = 'no result';
        
        return $items;
    }

}

/* End of file t_rep_harian_penerimaan.php */