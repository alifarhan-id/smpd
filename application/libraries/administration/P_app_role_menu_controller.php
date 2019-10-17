<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class p_app_role_menu_controller
* @version 07/05/2015 12:18:00
*/
class P_app_role_menu_controller {

    function getTreeJson() {

        $ci = & get_instance();
        $ci->load->model('administration/p_app_menu');
        $tMenu = $ci->p_app_menu;

        $p_app_role_id = getVarClean('p_app_role_id','int',0);
        $p_application_id = getVarClean('p_application_id','int',0);

        $tMenu->setCriteria('mn.p_application_id = '.$p_application_id);
        $items = $tMenu->getAll(0,-1,'mn.listing_no','asc');

        $ci->load->model('administration/p_app_role_menu');
        $tRoleMenu = $ci->p_app_role_menu;

        $data = array();

        foreach($items as $item) {

            $menu_role_item = $tRoleMenu->getItem($p_app_role_id, $item['p_app_menu_id']);

            $code = '';
            $checked = false;

            if($menu_role_item == null) {
                $code = '0'.'.'.$item['p_app_menu_id'];
            }else {
                $code = $menu_role_item->p_app_role_id.'.'.$menu_role_item->p_app_menu_id;
                $checked = true;
            }

            if( $tMenu->emptyChildren($item['p_app_menu_id']) ) {
                $data[] = array(
                            'id' => $item['p_app_menu_id'],
                            'parentid' => empty($item['parent_id']) ? 0 : $item['parent_id'],
                            'text' => $item['code'],
                            'value' => $code,
                            'checked' => $checked,
                            'icon' => base_url('images/file-icon.png')
                          );
            }else {
                $data[] = array(
                            'id' => $item['p_app_menu_id'],
                            'parentid' => empty($item['parent_id']) ? 0 : $item['parent_id'],
                            'text' => $item['code'],
                            'value' => $code,
                            'checked' => $checked,
                            'icon' => base_url('images/folder-close.png')
                          );
            }

        }

        echo json_encode($data);
        exit;
    }


    function create() {

        $ci = & get_instance();
        $ci->load->model('administration/p_app_role_menu');
        $tRoleMenu = $ci->p_app_role_menu;

        $p_app_role_id = getVarClean('p_app_role_id','int',0);

        $items_checked = getVarClean('items_checked','str','');
        $items_unchecked = getVarClean('items_unchecked','str','');

        $data = array('success' => false, 'message' => '');

        try {

            if(empty($p_app_role_id)) throw new Exception('Role ID is Empty');

            if(strlen($items_checked) > 0) {
                $tRoleMenu->actionType = 'CREATE';
                $list_checked = explode(',',$items_checked);
                foreach($list_checked as $checked) {
                    $code = explode('.', $checked);
                    if($code[0] == 0)  { //have no role, then insert
                        $tRoleMenu->setRecord(
                            array('p_app_role_id' => $p_app_role_id,
                                  'p_app_menu_id' => $code[1])
                        );
                        $tRoleMenu->create();
                    }
                }
            }


            if(strlen($items_unchecked) > 0) {
                $list_unchecked = explode(',',$items_unchecked);
                foreach($list_unchecked as $unchecked) {
                    $code = explode('.', $unchecked);
                    if($code[0] != 0)  { //have role, then delete
                        //delete data from table
                        $tRoleMenu->deleteItem($code[0], $code[1]);
                    }
                }
            }

            $data['success'] = true;
            $data['message'] = 'Data updated succesfully';
            logging('set role menu');
        }catch(Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }
}

/* End of file p_app_role_menu_controller.php */