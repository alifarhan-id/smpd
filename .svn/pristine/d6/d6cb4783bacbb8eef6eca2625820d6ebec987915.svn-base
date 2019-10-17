<?php

/**
 * T_cust_account_update_status Model
 *
 */
class T_pic_gis extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = " a.t_cust_account_id, 
                                a.t_customer_id, 
                                a.npwd, 
                                a.p_vat_type_id, 
                                a.t_vat_registration_id, 
                                a.t_customer_order_id,
                                a.registration_date, 
                                a.company_name, 
                                a.company_brand, 
                                a.address_name, 
                                a.address_no, 
                                a.address_rt, 
                                a.address_rw, 
                                a.p_region_id_kelurahan, 
                                a.p_region_id_kecamatan, 
                                a.p_region_id, 
                                a.phone_no, 
                                a.mobile_no, 
                                a.fax_no, 
                                a.zip_code, 
                                a.creation_date, 
                                a.created_by, 
                                a.updated_date, 
                                a.updated_by,
                                b.vat_code,
                                c.registration_date AS vat_registration_date,
                                d.order_no, d. order_date,
                                e.region_name AS nama_kota,
                                f.region_name AS nama_kecamatan,
                                g.region_name AS nama_kelurahan,
                                a.brand_address_name ||' '||a.brand_address_no as alamat";
    public $fromClause      = " t_cust_account a
                                LEFT JOIN p_vat_type b ON a.p_vat_type_id = b.p_vat_type_id
                                LEFT JOIN t_vat_registration c ON a.t_vat_registration_id = c.t_vat_registration_id
                                LEFT JOIN t_customer_order d ON a.t_customer_order_id = d.t_customer_order_id
                                LEFT JOIN p_region e ON a.p_region_id = e.p_region_id
                                LEFT JOIN p_region f ON a.p_region_id_kecamatan = f.p_region_id
                                LEFT JOIN p_region g ON a.p_region_id_kelurahan = g.p_region_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    public function getDataPicObject($t_cust_account_id){
        try {
            $sql = 'select 
                    t_pic_gis.pic_id as pic_id,
                    t_pic_gis.file_name as file_name, 
                    t_pic_gis.longitude as "Longitude", 
                    t_pic_gis.latitude as "Latitude", 
                    t_pic_gis.creation_date as "Uploaded", 
                    t_pic_gis.updated_by as "Uploader",
                    t_pic_gis.id_tipe_lokasi as "Tipe",
                    lokasi.ikon_file as "Ikon",
                    t_pic_gis."NPWPD" as "NPWPD",
                    t_cust_acc.wp_name as "Name",
                    t_cust_acc.wp_address_name as "Alamat",
                    t_pic_gis.status as "Editable"
                                  
                    FROM 
                    sikp.tb_pic_gis t_pic_gis
                    left join sikp.tipe_lokasi as lokasi on lokasi.id_tipe_lokasi = t_pic_gis.id_tipe_lokasi
                    left join sikp.t_cust_account as t_cust_acc on t_cust_acc.npwd = t_pic_gis."NPWPD"

                    where t_cust_acc.t_cust_account_id = '.$t_cust_account_id.'
                    order by pic_id ASC';
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

    function insert($param = array()){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $userdata = '\''.$userdata['app_user_name'].'\'';
        $date = date('Y-m-d');

        /*$sql = 'INSERT INTO tb_pic_gis(
                                        "NPWPD",
                                        created_by, 
                                        updated_by, 
                                        creation_date, 
                                        updated_date, 
                                        latitude, 
                                        longitude, 
                                        file_name
                                        ) 
                                VALUES(
                                        (select npwd from t_cust_account where t_cust_account_id = '.$param['t_cust_account_id'].'),
                                        '.$userdata.', 
                                        '.$userdata.', 
                                        '.$date.', 
                                        '.$date.', 
                                        '.$param['latitude'].', 
                                        '.$param['longitude'].', 
                                        null
                                        )';*/
        $sql = "select npwd from t_cust_account where t_cust_account_id = ".$param['t_cust_account_id'];
        $query = $this->db->query($sql);
        $result = $query->row_array();
        /*print_r($result);
        exit;*/

        $data =  array('latitude' =>$param['latitude'],
                        'longitude'=>$param['longitude'],
                        '"NPWPD"'=>$result['npwd'],
                        'created_by'=>$userdata,
                        'creation_date'=>$date,
                        'file_name'=>'tes',
                        'updated_by'=>$userdata,
                        'updated_date'=>$date);

        //$query = $this->db->query($sql);
        $this->db->insert('tb_pic_gis',$data);
        $item = 'sukses';

        return $item;
    }

    function update($param = array()){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $userdata = $userdata['app_user_name'];
        $updated_date = date('Y-m-d');

        $data =  array('latitude' =>$param['latitude'],
                        'longitude'=>$param['longitude'],
                        'pic_id'=>$param['pic_id'],
                        'file_name'=>null);

        $this->db->where('pic_id', $param['pic_id']);
        $this->db->update('sikp.tb_pic_gis', $data);
        $item = 'sukses';

        return $item;
    }

    function delete($id){
        $ci =& get_instance();

        $this->db->delete('sikp.tb_pic_gis', array('pic_id' => $id));
        $item = 'sukses';
        return $item;
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            /*$this->record['creation_date'] = date('Y-m-d');
            $this->record['created_by'] = $userdata['app_user_name'];*/
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];
            
            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];
            //if false please throw new Exception
        }
        return true;
    }

    function updateStatus($t_cust_account_id,$description,$p_account_status_id,$valid_to){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $sql = "SELECT f_update_acc_status(".$t_cust_account_id.",".$p_account_status_id.",'".$description."','".$valid_to."', '".$userdata['app_user_name']."')";
        //return $sql;
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data['f_update_acc_status'];
    }

}

/* End of file T_cust_account_update_status.php */