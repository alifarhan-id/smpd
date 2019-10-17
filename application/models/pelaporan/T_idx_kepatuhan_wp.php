<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_idx_kepatuhan_wp extends Abstract_model {

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
    

    function getData($p_year_period_id, $p_vat_type_id, $status, $rangking){
        try {
            $sql = "select max(rata_rata_pembayaran), max(rata_rata_pembayaran) / 3 , max(rata_rata_pembayaran) - (max(rata_rata_pembayaran) / 3) as batas_atas, max(rata_rata_pembayaran) - (max(rata_rata_pembayaran) / 3) - (max(rata_rata_pembayaran) / 3) batas_tengah from f_rep_index_kepatuhan(".$p_year_period_id.", ".$p_vat_type_id.", ".$status.")";
            $query = $this->db->query($sql);
            $arrBatas = $query->row_array();

            $sql="select * from f_rep_index_kepatuhan(".$p_year_period_id.", ".$p_vat_type_id.", ".$status.")";
            if($rangking == 'b'){ // BESAR
                $sql .= "where rata_rata_pembayaran > ".$arrBatas['batas_atas']." order by rata_rata_pembayaran desc, rata_rata_tgl_byr asc";
            }elseif ($rangking == 'm') { //MENENGAH
                $sql .= "where rata_rata_pembayaran <= ".$arrBatas['batas_atas']." and rata_rata_pembayaran >= ".$arrBatas['batas_tengah']." order by rata_rata_pembayaran desc, rata_rata_tgl_byr asc";
            }elseif ($rangking == 'k') { //KECIL
                $sql .= "where rata_rata_pembayaran < ".$arrBatas['batas_tengah']." order by rata_rata_pembayaran desc, rata_rata_tgl_byr asc";
            }
            $query = $this->db->query($sql);

            $items = $query->result_array();
            // print_r($sql);
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