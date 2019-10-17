<?php

/**
 * Pembuatan schema Model
 *
 */
class T_bphtb_cetak_ulang_nota_pengurangan extends Abstract_model {

    public $table           = "t_bphtb_registration";
    public $pkey            = "t_bphtb_registration_id";
    public $alias           = "a";

    public $fields          = array();

    public $selectClause    = " a.*
                              ";

    public $fromClause      = "t_bphtb_registration a ";

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

    function getData($s_keyword){
        $sql = "SELECT c.order_no,
                        a.t_bphtb_registration_id, 
                        a.pilihan_lembar_cetak, 
                        b.t_customer_order_id, 
                        b.registration_no, 
                        b.wp_name, 
                        b.njop_pbb, 
                        b.wp_address_name, 
                        b.object_address_name, 
                        b.bphtb_amt_final, 
                        a.exemption_amount
                    FROM t_bphtb_exemption AS a 
                    INNER JOIN t_bphtb_registration AS b 
                       ON a.t_bphtb_registration_id = b.t_bphtb_registration_id
                    left join t_customer_order as c 
                       on a.t_customer_order_id = c.t_customer_order_id
                    WHERE ( upper(b.wp_name) LIKE upper('%".$s_keyword."%') OR 
                      upper(b.njop_pbb) LIKE upper('%".$s_keyword."%') OR
                      upper(b.registration_no) LIKE upper('%".$s_keyword."%')
                    )
                    AND a.pilihan_lembar_cetak is not null
                    ORDER BY trim(b.wp_name) ASC";
        $query = $this->db->query($sql);
        //exit;
        $items = $query->result_array();


        if ($items == null || $items == '')
            $items = 'no result';
        // print_r($items);
        // exit();
        return $items;
    }
}

