<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_laporan_harian_denda extends Abstract_model {

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
    

    function getData($p_vat_type_id, $start_date, $end_date){
        try {
            $sql=" SELECT
                    skpdkb_no_kohir,
                    denda_no_kohir,
                    nama,
                    alamat,
                    npwpd,
                    to_char(
                        trunc(start_period),
                        'DD-MM-YYYY'
                    ) AS start_period_formated,
                    to_char(
                        trunc(end_period),
                        'DD-MM-YYYY'
                    ) AS end_period_formated,
                    no_kohir,
                    to_char(
                        trunc(tgl_masuk),
                        'DD-MM-YYYY'
                    ) AS tgl_masuk_formated,
                    to_char(
                        trunc(jatuh_tempo),
                        'DD-MM-YYYY'
                    ) AS jatuh_tempo_formated,
                    to_char(
                        trunc(tgl_bayar),
                        'DD-MM-YYYY'
                    ) AS tgl_bayar_formated,
                    skpdkb_amount,
                    to_char(
                        trunc(skpdkb_tgl_tap),
                        'DD-MM-YYYY'
                    ) AS skpdkb_tgl_tap_formated,
                    to_char(
                        trunc(skpdkb_tgl_bayar),
                        'DD-MM-YYYY'
                    ) AS skpdkb_tgl_bayar_formated,
                    denda_amount,
                    to_char(
                        trunc(denda_tgl_tap),
                        'DD-MM-YYYY'
                    ) AS denda_tgl_tap_formated,
                    to_char(
                        trunc(denda_tgl_bayar),
                        'DD-MM-YYYY'
                    ) AS denda_tgl_bayar_formated,
                    sptpd_amount,
                    payment_amount
                FROM sikp.f_laporan_harian_denda(".$p_vat_type_id.",2014,'".$start_date."','".$end_date."')
                ORDER BY nama,trunc(start_period) ASC";
            $query = $this->db->query($sql);

            $items = $query->result_array();
            // print_r($items);
            // exit();
            return $items;
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

/* End of file p_bank.php */