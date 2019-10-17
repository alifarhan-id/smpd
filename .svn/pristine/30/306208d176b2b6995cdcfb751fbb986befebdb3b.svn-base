<?php

/**
 * Icons Model
 *
 */
class T_target_realisasi extends Abstract_model {

    public $table           = "v_target_realisasi_updated";
    public $pkey            = "p_year_period_id";
    public $alias           = "vt";

    public $fields          = array(
                                'p_year_period_id'             => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Icon'),
                                'year_code'           => array('nullable' => false, 'type' => 'str', 'unique' => true, 'display' => 'Icon Code'),
                                'target_amt'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Icon Description'),
                                 'realisasi_amt'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Icon Description')
                            );

    public $selectClause    = "vt.*, round((realisasi_amt/target_amt*100), 2) as persentase, 
    (realisasi_amt-target_amt) as selisih, 
    round(((realisasi_amt/target_amt*100)-100), 2) as persen_selisih";
    public $fromClause      = "v_target_realisasi_updated vt";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function getItemPerJenis($year_id, $group_id){
        $sql = "(SELECT t_revenue_target_id, p_year_period_id, p_vat_type_id, vat_code, year_code, target_amount, realisasi_amt ,round((realisasi_amt/target_amount*100), 2) as persentase, (realisasi_amt-target_amount )as selisih, round(((realisasi_amt/target_amount*100)-100), 2) as persen_selisih
            FROM v_revenue_target_vs_realisasi
            WHERE p_year_period_id = ?
            and p_vat_group_id= ?
            ORDER BY p_vat_type_id)
            UNION
            (SELECT
                '999',
                ?
                ,
                MAX (p_vat_type_id),
                'DENDA',
                '',
                0,
                SUM (round(jml_sd_hari_ini)),0,0,0
            FROM
                sikp.f_rep_lap_harian_bdhr_baru (?)
            where nomor_ayat IN('140701','140702','140703','140707')
            and p_vat_group_id = ?)";

        $query = $this->db->query($sql, array($year_id, $group_id, $year_id, $year_id, $group_id));
        $items = $query->result_array();
        return $items;
    }

    function getItemPerBidang($year_id) {
        $sql = "SELECT max(t_revenue_target_id) as t_revenue_target_id, 
                            max(p_year_period_id) as p_year_period_id, 
                            p_vat_group_id, group_code, max(year_code) as year_code, 
                            sum(target_amount) as target_amount, sum(realisasi_amt) as realisasi_amt,
                            round((sum(realisasi_amt)/sum(target_amount)*100), 2) as persentase, 
                            (sum(realisasi_amt)-sum(target_amount) )as selisih, 
                            round(((sum(realisasi_amt)/sum(target_amount)*100)-100), 2) as persen_selisih
                FROM v_revenue_target_vs_realisasi
                WHERE p_year_period_id = ? GROUP BY p_vat_group_id,group_code ";

        $query = $this->db->query($sql, array($year_id));
        $items = $query->result_array();
        return $items;

    }

    function getItemPerBulan($year_id, $type_id) {
        $sql = "SELECT
                    MAX(p_finance_period_id) as p_finance_period_id,
                    MAX(p_year_period_id) as p_year_period_id,
                    to_char(MAX(start_date),'dd-mm-yyyy') as start_date,
                    to_char(MAX(end_date),'dd-mm-yyyy') as end_date,
                    MAX(p_vat_type_id) as p_vat_type_id,
                    MAX(bulan) as bulan,
                    ROUND(SUM (target_amount)) as target_amount,
                    ROUND(SUM (realisasi_amt)) as realisasi_amt,
                    MAX (penalty_amt) as penalty_amt,
                    ROUND(SUM (debt_amt)) as debt_amt,
                    MAX (denda_pokok) as denda_pokok,
                    MAX (denda_piutang) as denda_piutang,
                    round(((max(denda_pokok)+max(denda_piutang)+sum(realisasi_amt+debt_amt))/sum(target_amount)*100), 2) as persentase,
                    max(denda_pokok)+max(denda_piutang)+sum(realisasi_amt+debt_amt) as total
                FROM
                    f_target_vs_real_monthly_new3_mark_ii(
                    ?,?
                    )
                GROUP BY p_finance_period_id

                ORDER BY MAX(start_date) ASC";

        $query = $this->db->query($sql, array($year_id, $type_id));
        $items = $query->result_array();
        return $items;

    }

    function getItemPerBulanDetail($year_id, $type_id, $finance_id) {
        $sql = "(SELECT
                    MAX(target.p_finance_period_id) as p_finance_period_id,
                    MAX(target.p_year_period_id) as p_year_period_id,
                    to_char(MAX(target.start_date),'dd-mm-yyyy') as start_date,
                    to_char(MAX(target.end_date),'dd-mm-yyyy') as end_date,
                    MAX(target.p_vat_type_id) as p_vat_type_id,
                    MAX(target.bulan) as bulan,
                    ROUND(SUM (target.target_amount)) as target_amount,
                    ROUND(SUM (target.realisasi_amt)) as realisasi_amt,
                    ROUND(SUM (target.penalty_amt)) as penalty_amt,
                    ROUND(SUM (target.debt_amt)) as debt_amt,
                    MAX(dtl.vat_code) as ayat,
                    round((sum(realisasi_amt+debt_amt)/sum(target_amount)*100), 2) as persentase,
                    sum(realisasi_amt+debt_amt) as total
                FROM
                    f_target_vs_real_monthly_new3_mark_ii(?,?) target,
                    p_vat_type_dtl dtl
                WHERE
                    dtl.p_vat_type_dtl_id = target.p_vat_type_dtl_id
                    AND (target.p_finance_period_id = ".$finance_id." or ".$finance_id." is null)
                GROUP BY target.p_vat_type_dtl_id

                ORDER BY MAX(dtl.vat_code) ASC)
                UNION
                (select 999,
                    ?,
                    '',
                    '',
                    0,
                    '',
                    0,
                    f_get_total_denda_ayat_mod_1(?,".$finance_id.",?) as jumlah,
                    0,
                    0,
                    'DENDA', 0, 0)";

        $query = $this->db->query($sql, array($year_id, $type_id, $year_id, $year_id, $type_id));
        $items = $query->result_array();
        return $items;

    }

    function getItemPerBulanTmp($t_revenue_target_id) {
        $sql = "SELECT * 
                FROM v_revenue_target_vs_realisasi_month
                WHERE t_revenue_target_id = ?";

        $query = $this->db->query($sql, array($t_revenue_target_id));
        $items = $query->result_array();
        return $items;

    }

}

/* End of file Icons.php */