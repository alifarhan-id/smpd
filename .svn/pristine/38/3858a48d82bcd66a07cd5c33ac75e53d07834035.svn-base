<?php

/**
 * Icons Model
 *
 */
class P_region extends Abstract_model {

    public $table           = "p_region";
    public $pkey            = "p_region_id";
    public $alias           = "a";

    public $fields          = array(
                                'p_region_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Region'),
                                'region_name'           => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'Regional'),
                                'p_region_level_id'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'ID Regional level'),
                                'p_business_area_id'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'ID Bisnis'),
                                'business_area_name'           => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'Wilayah'),
                                'parent_id'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'ID Parent'),
                                'description'           => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'Deskripsi'),
                                'region_code'           => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'Kode Regional'),
                                'postal_code'           => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'Kode Postal'),
                                'nasional_code'           => array('nullable' => true, 'type' => 'str', 'unique' => true, 'display' => 'Kode Nasional'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "a.*, business_area_name";
    public $fromClause      = "p_region a left join p_business_area b on a.p_business_area_id = b.p_business_area_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function getLevel(){

        try {
            $sql = "SELECT * FROM p_region_level";
            $query = $this->db->query($sql);

            $items = $query->result_array();
            echo '<select>';
            foreach($items  as $item ){
                echo '<option value="'.$item['p_region_level_id'].'">'.$item['level_name'].'</option>';
            }
            echo '</select>';
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    function getKodeWilayah(){
        $sql = "select p_business_area_id, code, business_area_name
                    from p_business_area";

        $query = $this->db->query($sql);
        $items = $query->result_array();
        return $items;
    }

    function emptyChildren($p_region_id) {
        $sql = "select count(1) as total from p_region where parent_id = ?";

        $query = $this->db->query($sql, array($p_region_id));
        $row = $query->row_array();

        return $row['total'] == 0;
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
            $this->record['p_region_level_id'] = (int)$this->record['p_region_level_id'];
            $this->record['p_business_area_id'] = (int)$this->record['p_business_area_id'];
            
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

    

}

/* End of file Icons.php */