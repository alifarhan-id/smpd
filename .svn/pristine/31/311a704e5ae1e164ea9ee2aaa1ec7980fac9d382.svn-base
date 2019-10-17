<?php

/**
 * Groups Model
 *
 */
class Wf extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array(
                            );

    public $selectClause    = "";
    public $fromClause      = "";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            //$this->record['created_date'] = date('Y-m-d');
            //$this->record['updated_date'] = date('Y-m-d');

            $this->record[$this->pkey] = $this->generate_id($this->table);
        }else {
            //do something
            //example:
            //$this->record['updated_date'] = date('Y-m-d');
            //if false please throw new Exception
        }
        return true;
    }

    public function getListInbox($user_name) {
        $sql = "select * from sikp.pack_task_profile.workflow_name('".$user_name."') as tbl (ty_task_profile)";
        $query = $this->db->query($sql);
        $rows = $query->result_array();

        return $rows;
    }

    public function getSummaryList($pdoc_type_id, $user_name) {
        $sql = "select *,ty_workflow_summary as element_id from sikp.pack_task_profile.workflow_summary_list(".$pdoc_type_id.",'".$user_name."') as tbl (ty_workflow_summary)
                where p_w_doc_type_id = ".$pdoc_type_id;

        $query = $this->db->query($sql);
        $rows = $query->result_array();

        return $rows;
    }

    public function bootgrid_countAll($param){

        $whereCondition = join(" AND ", $param['where']);
        if(!empty($whereCondition)) {
            $whereCondition = " WHERE ".$whereCondition;
        }

        if($param['search'] != null && $param['search'] === 'true'){
            $wh = "UPPER(".$param['search_field'].")";
            switch ($param['search_operator']) {
                case "bw": // begin with
                    $wh .= " LIKE UPPER('".$param['search_str']."%')";
                    break;
                case "ew": // end with
                    $wh .= " LIKE UPPER('%".$param['search_str']."')";
                    break;
                case "cn": // contain %param%
                    $wh .= " LIKE UPPER('%".$param['search_str']."%')";
                    break;
                case "eq": // equal =
                    if(is_numeric($param['search_str'])) {
                        $wh .= " = ".$param['search_str'];
                    } else {
                        $wh .= " = UPPER('".$param['search_str']."')";
                    }
                    break;
                case "ne": // not equal
                    if(is_numeric($param['search_str'])) {
                        $wh .= " <> ".$param['search_str'];
                    } else {
                        $wh .= " <> UPPER('".$param['search_str']."')";
                    }
                    break;
                case "lt":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " < ".$param['search_str'];
                    } else {
                        $wh .= " < '".$param['search_str']."'";
                    }
                    break;
                case "le":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " <= ".$param['search_str'];
                    } else {
                        $wh .= " <= '".$param['search_str']."'";
                    }
                    break;
                case "gt":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " > ".$param['search_str'];
                    } else {
                        $wh .= " > '".$param['search_str']."'";
                    }
                    break;
                case "ge":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " >= ".$param['search_str'];
                    } else {
                        $wh .= " >= '".$param['search_str']."'";
                    }
                    break;
                default :
                    $wh = "";
            }
        }

        if(!empty($wh)) {
            if($whereCondition != "" )
                $whereCondition .= " AND ".$wh;
            else
                $whereCondition = " WHERE ".$wh;
        }

        $sql = "select count(1) totalcount from (".$param['table']." ".$whereCondition.")";
        $query = $this->db->query($sql);
        $row = $query->row_array();

        $query->free_result();
        return $row['totalcount'];
    }


    public function bootgrid_getData($param){

        $param['table'] = str_replace("SELECT","",$param['table']);
        $this->db->select($param['table']);

        $whereCondition = '';
        $whereCondition = join(" AND ", $param['where']);
        if($param['search'] != null && $param['search'] === 'true'){
            $wh = "UPPER(".$param['search_field'].")";
            switch ($param['search_operator']) {
                case "bw": // begin with
                    $wh .= " LIKE UPPER('".$param['search_str']."%')";
                    break;
                case "ew": // end with
                    $wh .= " LIKE UPPER('%".$param['search_str']."')";
                    break;
                case "cn": // contain %param%
                    $wh .= " LIKE UPPER('%".$param['search_str']."%')";
                    break;
                case "eq": // equal =
                    if(is_numeric($param['search_str'])) {
                        $wh .= " = ".$param['search_str'];
                    } else {
                        $wh .= " = UPPER('".$param['search_str']."')";
                    }
                    break;
                case "ne": // not equal
                    if(is_numeric($param['search_str'])) {
                        $wh .= " <> ".$param['search_str'];
                    } else {
                        $wh .= " <> UPPER('".$param['search_str']."')";
                    }
                    break;
                case "lt":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " < ".$param['search_str'];
                    } else {
                        $wh .= " < '".$param['search_str']."'";
                    }
                    break;
                case "le":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " <= ".$param['search_str'];
                    } else {
                        $wh .= " <= '".$param['search_str']."'";
                    }
                    break;
                case "gt":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " > ".$param['search_str'];
                    } else {
                        $wh .= " > '".$param['search_str']."'";
                    }
                    break;
                case "ge":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " >= ".$param['search_str'];
                    } else {
                        $wh .= " >= '".$param['search_str']."'";
                    }
                    break;
                default :
                    $wh = "";
            }
        }

        if(!empty($wh)) {
            if($whereCondition != "" )
                $whereCondition .= " AND ".$wh;
            else
                $whereCondition = $wh;
        }

        if($whereCondition != "")
            $this->db->where($whereCondition, null, false);

        if(!empty($param['sort_by']))
            $this->db->order_by($param['sort_by'], $param['sord']);

        if($param['limit'] != null)
            $this->db->limit($param['limit']['end'], $param['limit']['start']);

//print_r($this->db->get_compiled_select());exit;
        $queryResult = $this->db->get();
        $items = $queryResult->result_array();

        return $items;
    }

    public function getMonitoring($id, $search, $tmp){
        $result = array();
        $sql = $this->db->query("SELECT * FROM TABLE(F_MONITOR_TIPRO(".$id.", '".$search."')) WHERE WF_MONITOR LIKE '".$tmp."%' ");
        if($sql->num_rows() > 0)
            $result = $sql->result();
        return $result;
    }
}

/* End of file Groups.php */