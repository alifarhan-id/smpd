<?php

/**
 * p_app_menu Model
 *
 */
class P_app_menu extends Abstract_model {

    public $table           = "p_app_menu";
    public $pkey            = "p_app_menu_id";
    public $alias           = "mn";

    public $fields          = array(
                                'p_app_menu_id'       => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'Menu ID'),
                                'parent_id'     => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Menu Parent'),
                                'p_application_id'     => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'ID Module'),

                                'code'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Title'),
                                'file_name'      => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'URL'),
                                //'menu_icon'     => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Icon'),
                                'listing_no'    => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Order'),
                                'description'     => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Description'),
								'is_active'  => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Status Active'),

                                'creation_date'  => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'  => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'    => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "mn.*";
    public $fromClause      = "p_app_menu mn";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            //$this->record['creation_date'] = date('Y-m-d');
            //$this->record['updated_date'] = date('Y-m-d');
            $this->record['creation_date'] = date('Y-m-d');
            $this->record['created_by'] = $userdata['app_user_name'];
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

            if(empty($this->record['parent_id']))
                unset($this->record['parent_id']);
        }else {
            //do something
            //example:
            //$this->record['updated_date'] = date('Y-m-d');
            //if false please throw new Exception
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];

            if(empty($this->record['parent_id']))
                unset($this->record['parent_id']);
        }
        return true;
    }

    function emptyChildren($p_app_menu_id) {
        $sql = "select count(1) as total from p_app_menu where parent_id = ?";

        $query = $this->db->query($sql, array($p_app_menu_id));
        $row = $query->row_array();

        return $row['total'] == 0;
    }


    function menuItems($p_application_id) {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        $sql = "select a.p_app_menu_id,
                (case when b.parent_id is null then 0 else b.parent_id end) as parent_id,
                b.code,
                b.file_name,
                b.listing_no
                from p_app_role_menu a
                left join p_app_menu b on a.p_app_menu_id = b.p_app_menu_id
                left join p_app_user_role c on a.p_app_role_id = c.p_app_role_id
                where c.p_app_user_id = ?
                and b.p_application_id = ?
                and b.is_active = 'Y'
                order by b.listing_no asc";

        $query = $this->db->query($sql, array($userdata['p_app_user_id'], $p_application_id));
        return $query->result();
    }


    function htmlp_app_menuideBar($p_application_id) {

        $ci =& get_instance();
        $ci->load->model('administration/p_application');
        $p_application = $ci->p_application;

        $app = $p_application->get($p_application_id);

        $root_id = 0;
        $html = array();
        $items = $this->menuItems($p_application_id);

        $children = array();
        foreach($items as $item) {
            $children[$item->parent_id][] = (array) $item;
        }

        $loop = !empty( $children[$root_id] );

        // initializing $parent as the root
        $parent = $root_id;
        $parent_stack = array();

        $html[] = '<li class="nav-item start active" data-source="dashboard">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title red"><strong>'.$app['code'].'</strong></span>
                        </a>
                   </li>';


        while ( $loop && ( ( $option = each( $children[$parent] ) ) || ( $parent > $root_id ) ) )
        {
              if ( $option === false )
              {
                      $parent = array_pop( $parent_stack );

                      // HTML for menu item containing childrens (close)
                      $html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 ) . '</ul>';
                      $html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ) . '</li>';
              }
              elseif ( !empty( $children[$option['value']['p_app_menu_id']] ) )
              {
                      $tab = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 );

                      $icon_parent = 'fa fa-folder-open';
                      /*if(!empty($option['value']['menu_icon'])) {
                            $icon_parent = $option['value']['menu_icon'];
                      }*/
                      // HTML for menu item containing childrens (open)
                      $html[] = sprintf(
                              '%1$s<li class="nav-item" title="%2$s">
                               <a href="javascript:;" class="nav-link nav-toggle">
                                  <i class="%3$s"></i>
                                  <span class="title">%4$s</span>
                                  <span class="arrow"></span>
                               </a>
                              ',
                              $tab,                                          // %1$s = tabulation
                              $option['value']['code'],                     // %2$s = title
                              $icon_parent,                                  // %3$s = icon
                              ucwords(strtolower($option['value']['code']))   // %4$s = menu
                      );
                      $html[] = $tab . "\t" . '<ul class="sub-menu">';

                      array_push( $parent_stack, $option['value']['parent_id'] );
                      $parent = $option['value']['p_app_menu_id'];
              }
              else {

                      $icon_leaf = 'fa fa-file';
                      /*if(!empty($option['value']['menu_icon'])) {
                            $icon_leaf = $option['value']['menu_icon'];
                      }*/

                      // HTML for menu item with no children (aka "leaf")
                      $html[] = sprintf(
                              '%1$s<li class="nav-item" title="%2$s" data-source="%3$s" menu-id="%4$s">
                                  <a href="javascript:;" class="nav-link">
                                      <i class="%5$s"></i>
                                      <span class="title">%6$s</span>
                                  </a>
                              </li>',
                              str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ),   // %1$s = tabulation
                              $option['value']['code'],                            // %2$s = title
                              $option['value']['file_name'],
                              $option['value']['p_app_menu_id'],                          // %3$s = url,
                              $icon_leaf,                                           // %4$s = icon,
                              ucwords(strtolower($option['value']['code']))                        // %5$s = menu
                      );
              }
        }

        return implode( "\r\n", $html );
    }

}

/* End of file p_app_menu.php */