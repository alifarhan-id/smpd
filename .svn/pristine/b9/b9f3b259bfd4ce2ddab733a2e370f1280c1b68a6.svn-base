<?php

/**
 * Chart_proc Model
 *
 */
class Data_potensi_ro_otobuk extends Abstract_model {

	public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = "";
    public $fromClause      = "";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

	function potensi_pegawai($t_cust_account_id){
		try {
            $sql = "SELECT * FROM v_cust_acc_employee WHERE t_cust_account_id = ".$t_cust_account_id;
           
            $query = $this->db->query($sql);

            $items = $query->result_array();

            if ($items == null || $items == '')
                $items = 'no result';
            // print_r($items);
            // exit();
            return $items;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

	}

	function data_pajak($p_vat_type_id, $t_cust_account_id){
		try {
			if($p_vat_type_id == '1'){
				$sql = "SELECT t_cacc_dtl_hotel_id, t_cust_account_id, a.p_room_type_id, room_qty, service_qty, service_charge_wd, service_charge_we,
					valid_from, valid_to, a.description, a.creation_date, a.created_by,
					a.updated_date , a.updated_by, b.code AS room_type_code 
					FROM t_cacc_dtl_hotel a 
					INNER JOIN p_room_type b ON
					a.p_room_type_id = b.p_room_type_id";
			}elseif ($p_vat_type_id == '2') {
				$sql = "SELECT * FROM t_cacc_dtl_restaurant";
			}elseif ($p_vat_type_id == '3') {
				$sql = "SELECT * FROM t_cacc_dtl_entertaintment";
			}elseif ($p_vat_type_id == '4') {
				$sql = "SELECT * FROM t_acc_dtl_parking";
			}else{
				$sql = "SELECT * FROM t_cacc_dtl_ppj";
			}

			$sql .= " WHERE t_cust_account_id = ".$t_cust_account_id;
			$query = $this->db->query($sql);

            $items = $query->result_array();

            return $items;

		} catch (Exception $e) {
			echo $e->getMessage();
            exit;
		}
	}

	function data_log_otobuk($t_customer_order_id){
		try {
			$sql = "SELECT * FROM v_t_nwo_log_kronologis WHERE t_customer_order_id = ".$t_customer_order_id;

			$query = $this->db->query($sql);

            $items = $query->result_array();

            return $items;
		} catch (Exception $e) {
			echo $e->getMessage();
            exit;
		}
	}

	function get_vat_type($t_cust_account_id){
		try {
			$sql = "SELECT p_vat_type_id FROM t_cust_account WHERE t_cust_account_id = ".$t_cust_account_id;

			$query = $this->db->query($sql);
			$items = $query->result_array();

			//print_r($items);exit();

			return $items[0]['p_vat_type_id'];
		} catch (Exception $e) {
			echo $e->getMessage();
            exit;
		}
	}
}