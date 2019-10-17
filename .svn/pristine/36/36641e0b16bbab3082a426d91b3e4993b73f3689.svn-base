<?php

/**
 * T_executive_summary_report_ver Model
 *
 */
class T_executive_summary_report_ver extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = "x.vat_code,y.year_code,z.code as period_code, a.*";
    public $fromClause      = "t_executive_summary a
                                left join p_vat_type x on x.p_vat_type_id= a.p_vat_type_id
                                left join p_year_period y on y.p_year_period_id= a.p_year_period_id
                                left join p_finance_period z on z.p_finance_period_id = a.p_finance_period_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function updateSummaryRoVer($penjelasan,$permasalahan,$kesimpulan,$saran,$t_executive_summary_id){

        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $user = $userdata['app_user_name'];

        $sql = "UPDATE t_executive_summary SET 
                permasalahan='$permasalahan', 
                penjelasan='$penjelasan', 
                kesimpulan='$kesimpulan' ,
                saran='$saran', 
                updated_date=current_timestamp,
                updated_by='$user' 
                WHERE  
                t_executive_summary_id = 
                $t_executive_summary_id";

        $query = $this->db->query($sql);

        return $query;
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            
            /*$this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);*/

        }else {
            //do something
            //example:
            /*$this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];*/
            //if false please throw new Exception
        }
        return true;
    }

}