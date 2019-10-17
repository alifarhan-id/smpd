<?php

/**
 * t_rep_bpps2 Model
 *
 */
class T_rep_lap_bpps_piutang2 extends Abstract_model {

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

    //data jenis laporan nya all Untuk View 1 
    function getJenisLapAll($param=array()){
        
            $sql = "select  *,
                            trunc(payment_date) ,
                            to_char(payment_date,'dd-mm-yyyy')as payment_date2 
                    from f_rep_bpps_piutang2new_mod_1(".
                                                        $param['p_vat_type_id'].", ".
                                                        $param['p_year_period_id'].", '".
                                                        $param['tgl_penerimaan']."', '".
                                                        $param['tgl_penerimaan_last']."', ".
                                                        $param['jenis_setoran'].") 
                    order by kode_ayat, npwpd, masa_pajak";
            
            $query = $this->db->query($sql);
            

            $items = $query->result_array();

            return $items;
    }

    //data jenis laporan nya all Untuk View 2 dan 3
    function getJenisLapAll2($param=array()){
        
            $sql = "select to_char(active_date,'dd-mm-yyyy') as active_date2,
                            *,
                            trunc(payment_date),
                            to_char(payment_date,'dd-mm-yyyy')as payment_date2   
                    from f_rep_bpps_piutang2new_mod_1(".
                                                        $param['p_vat_type_id'].", ".
                                                        $param['p_year_period_id'].", '".
                                                        $param['tgl_penerimaan']."', '".
                                                        $param['tgl_penerimaan_last']."', ".
                                                        $param['jenis_setoran'].") a
                    left join t_cust_account x 
                        on a.npwpd = x.npwd 
                    order by kode_ayat, npwpd, masa_pajak limit 3";
            
            $query = $this->db->query($sql);


            $items = $query->result_array();

            foreach ($items as $item) {
                $data[]=array(
                        "address"   => $item['address'],
                        "company_name"  => $item['company_name'],
                        "kode_jns_trans"    => $item['kode_jns_trans'],
                        "jns_trans"     => $item['jns_trans'],
                        "kode_jns_pajak"    => $item['kode_jns_pajak'],
                        "kode_ayat"     => $item['kode_ayat'],
                        "jns_pajak"     => $item['jns_pajak'],
                        "jns_ayat"          => $item['jns_ayat'],
                        "nama_ayat"     => $item['nama_ayat'],
                        "no_kohir"      => $item['no_kohir'],
                        "wp_name"           => $item['company_brand'],
                        "wp_address_name"   => $item['brand_address_name'],
                        "wp_address_no"     => $item['brand_address_no'],
                        "active_date2"      => $item['active_date2'],
                        "npwpd"         => $item['npwpd'],
                        "jumlah_terima" => $item['jumlah_terima'],
                        "masa_pajak"        => $item['masa_pajak'],
                        "kd_tap"            => $item['kd_tap'],
                        "keterangan"        => $item['keterangan'],
                        "payment_date"      => $item['payment_date'],
                        "jam"       => $item['jam']);
            }

            return $data;
    }

    //data jenis laporan nya piutang view table 1
    function getJenisLapPiutang($param=array()){
            $border    = $param['year_date']-1;
            $year_date = $param['year_date'];
            $sql = "select *,
                          trunc(payment_date),
                          to_char(payment_date,'dd-mm-yyyy')as payment_date2  
                        from f_rep_bpps_piutang2new_mod_1(".
                                                    $param['p_vat_type_id'].", ".
                                                    $param['p_year_period_id'].", '".
                                                    $param['tgl_penerimaan']."', '".
                                                    $param['tgl_penerimaan_last']."', ".
                                                    $param['jenis_setoran'].") rep
                   WHERE ( 
                            SUBSTRING(rep.masa_pajak,22,4) < $year_date
                            AND (NOT (SUBSTRING(rep.masa_pajak,22,4) = $border
                            AND SUBSTRING(rep.masa_pajak,19,2) = 12)) 
                        ) 
                        OR ( 
                            (SUBSTRING(rep.masa_pajak,22,4) = $year_date
                            AND SUBSTRING(rep.masa_pajak,19,2) = 12 ) ) 
                        OR ( SUBSTRING(rep.masa_pajak,22,4) > $year_date ) 
                    order by kode_ayat, npwpd, masa_pajak";
            $query = $this->db->query($sql);



            $items = $query->result_array();

            return $items;
    }

    //data jenis laporan nya piutang view table 2 dan 3
    function getJenisLapPiutang2($param=array()){
            $border    = $param['year_date']-1;
            $year_date = $param['year_date'];
            $sql = "select to_char(active_date,'dd-mm-yyyy') as active_date2,
                            *,
                            trunc(payment_date),
                            to_char(payment_date,'dd-mm-yyyy')as payment_date2 
                        from f_rep_bpps_piutang2new_mod_1(".
                                                    $param['p_vat_type_id'].", ".
                                                    $param['p_year_period_id'].", '".
                                                    $param['tgl_penerimaan']."', '".
                                                    $param['tgl_penerimaan_last']."', ".
                                                    $param['jenis_setoran'].") rep
                    left join t_cust_account x 
                        on rep.npwpd = x.npwd 
                   WHERE ( 
                            SUBSTRING(rep.masa_pajak,22,4) < $year_date
                            AND (NOT (SUBSTRING(rep.masa_pajak,22,4) =  $border
                            AND SUBSTRING(rep.masa_pajak,19,2) = 12)) 
                        ) 
                        OR ( 
                            (SUBSTRING(rep.masa_pajak,22,4) = $year_date
                            AND SUBSTRING(rep.masa_pajak,19,2) = 12) 
                            ) 
                        OR ( SUBSTRING(rep.masa_pajak,22,4) > $year_date ) 
                    order by kode_ayat, npwpd, masa_pajak limit 3";
            
            $query = $this->db->query($sql);

            $items = $query->result_array();

            foreach ($items as $item) {
                $data[]=array(
                        "address"   => $item['address'],
                        "company_name"  => $item['company_name'],
                        "kode_jns_trans"    => $item['kode_jns_trans'],
                        "jns_trans"     => $item['jns_trans'],
                        "kode_jns_pajak"    => $item['kode_jns_pajak'],
                        "kode_ayat"     => $item['kode_ayat'],
                        "jns_pajak"     => $item['jns_pajak'],
                        "jns_ayat"          => $item['jns_ayat'],
                        "nama_ayat"     => $item['nama_ayat'],
                        "no_kohir"      => $item['no_kohir'],
                        "wp_name"           => $item['company_brand'],
                        "wp_address_name"   => $item['brand_address_name'],
                        "wp_address_no"     => $item['brand_address_no'],
                        "active_date2"      => $item['active_date2'],
                        "npwpd"         => $item['npwpd'],
                        "jumlah_terima" => $item['jumlah_terima'],
                        "masa_pajak"        => $item['masa_pajak'],
                        "kd_tap"            => $item['kd_tap'],
                        "keterangan"        => $item['keterangan'],
                        "payment_date"      => $item['payment_date'],
                        "jam"       => $item['jam']);
            }

            return $data;
    }

    //data jenis laporan nya murni view 1 
    function getJenisLapMurni($param=array()){
        
            $sql = "select *,
                            trunc(payment_date),
                            to_char(payment_date,'dd-mm-yyyy')as payment_date2 
                        from f_rep_bpps_piutang3new_mod_1(".
                                                    $param['p_vat_type_id'].", ".
                                                    $param['p_year_period_id'].", '".
                                                    $param['tgl_penerimaan']."', '".
                                                    $param['tgl_penerimaan_last']."', ".
                                                    $param['jenis_setoran'].") rep
                    WHERE EXTRACT (YEAR FROM rep.settlement_date) = ".$param['year_date']." 
                    order by kode_ayat, npwpd,masa_pajak limit ";
            
            $query = $this->db->query($sql);

            $items = $query->result_array();

            return $items;
    }

    //data jenis laporan nya murni view 2 dan 3
    function getJenisLapMurni2($param=array()){
        
            $sql = "select to_char(active_date,'dd-mm-yyyy') as active_date2,
                            *,
                            trunc(payment_date) ,
                            to_char(payment_date,'dd-mm-yyyy')as payment_date2 
                        from f_rep_bpps_piutang3new_mod_1(".
                                                    $param['p_vat_type_id'].", ".
                                                    $param['p_year_period_id'].", '".
                                                    $param['tgl_penerimaan']."', '".
                                                    $param['tgl_penerimaan_last']."', ".
                                                    $param['jenis_setoran'].") a
                    left join t_cust_account x 
                        on a.npwpd = x.npwd 
                    WHERE EXTRACT (YEAR FROM a.settlement_date) = ".$param['year_date']." 
                    order by kode_ayat, npwpd,masa_pajak limit 3";
            //echo $sql;exit;
            $query = $this->db->query($sql);

            $items = $query->result_array();

            foreach ($items as $item) {
                $data[]=array(
                        "address"   => $item['address'],
                        "company_name"  => $item['company_name'],
                        "kode_jns_trans"    => $item['kode_jns_trans'],
                        "jns_trans"     => $item['jns_trans'],
                        "kode_jns_pajak"    => $item['kode_jns_pajak'],
                        "kode_ayat"     => $item['kode_ayat'],
                        "jns_pajak"     => $item['jns_pajak'],
                        "jns_ayat"          => $item['jns_ayat'],
                        "nama_ayat"     => $item['nama_ayat'],
                        "no_kohir"      => $item['no_kohir'],
                        "wp_name"           => $item['company_brand'],
                        "wp_address_name"   => $item['brand_address_name'],
                        "wp_address_no"     => $item['brand_address_no'],
                        "active_date2"      => $item['active_date2'],
                        "npwpd"         => $item['npwpd'],
                        "jumlah_terima" => $item['jumlah_terima'],
                        "masa_pajak"        => $item['masa_pajak'],
                        "kd_tap"            => $item['kd_tap'],
                        "keterangan"        => $item['keterangan'],
                        "payment_date"      => $item['payment_date'],
                        "jam"       => $item['jam']);
            }

            return $data;
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