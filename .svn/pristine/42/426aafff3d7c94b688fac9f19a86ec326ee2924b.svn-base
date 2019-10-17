<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class T_rep_lap_harian_teller_controller
* @version 07/05/2015 12:18:00
*/
class T_rep_lap_harian_teller_controller {

	function read(){
		$tgl_penerimaan 	= getVarClean('tgl_penerimaan','str','');
		$nama_teller		= getVarClean('nama_teller','str','');
		$p_payment_type_id	= getVarClean('p_payment_type_id','int',0);
		$page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {
        	if(!empty($tgl_penerimaan)){
        		$ci = & get_instance();
                $ci->load->model('transaksi/t_rep_lap_harian_teller');
                $table = $ci->t_rep_lap_harian_teller;

                $table->setCriteria("f.t_vat_setllement_id = a.t_vat_setllement_id");
                $table->setCriteria("f.p_vat_type_dtl_id = c.p_vat_type_dtl_id");
                $table->setCriteria("a.t_cust_account_id = d.t_cust_account_id");
                $table->setCriteria("( upper(f.p_cg_terminal_id) LIKE upper('%".$nama_teller."%')
						)");
                $table->setCriteria("trunc(f.payment_date) = '".$tgl_penerimaan."'");
                $table->setCriteria("vat.p_vat_type_id = c.p_vat_type_id");
                $table->setCriteria("case when ".$p_payment_type_id."=0 then true
								 when ".$p_payment_type_id."=2 and p_payment_type_id is null then TRUE
								 else p_payment_type_id = ".$p_payment_type_id."
							end");

                $count = $table->countAll();

                if ($count > 0) $total_pages = ceil($count / $limit);
                else $total_pages = 1;

                if ($page > $total_pages) $page = $total_pages;
                $start = $limit * $page - ($limit); // do not put $limit*($page - 1)
               

                if ($page == 0) $data['page'] = 1;
                else $data['page'] = $page;

                $data['total'] = $total_pages;
                $data['records'] = $count;

                $data['rows'] = $table->getAll(0, 0, 'c.vat_code', 'asc');
        	}
        	$data['success'] = true;
            return $data;
        } catch (Exception $e) {
        	$data['message'] = $e->getMessage();
        }
        return $data;

	}
}