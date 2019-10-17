<?php

/**
 * T_history Model
 *
 */
class T_laporan_pembayaran_dan_perkembangan_jml_wp extends Abstract_model {

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

    function getData($flag){
        try {
            $sql = "";
            if($flag == 1){
                $sql="SELECT * FROM f_perkembangan_jumlah_wp_all()";
            }elseif ($flag==2) {
                $sql="SELECT 0 as jml_wp, 0 as jml_payment, * FROM f_pembayaran_wp_baru_all()"; 
            }else{
                $sql="SELECT 0 as presentase , * FROM f_jumlah_wp_belum_bayar_all()";
            }
            
            
            
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

/* End of file T_history.php */