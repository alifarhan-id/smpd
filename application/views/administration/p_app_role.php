<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Role</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a
                        href="javascript:;"
                        data-toggle="tab"
                        aria-expanded="true"
                        id="tab-1">
                        <i class="blue"></i>
                        <strong> Role </strong>
                    </a>
                </li>
                <li class="">
                    <a
                        href="javascript:;"
                        data-toggle="tab"
                        aria-expanded="true"
                        id="tab-2">
                        <i class="blue"></i>
                        <strong> Module </strong>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-12">
                    <table id="grid-table"></table>
                    <div id="grid-pager"></div>
                </div>
            </div>
            <div class="space-4"></div>
            <hr>
            <div class="row" id="detail_placeholder" style="display:none;">
                <div class="col-xs-12">
                    <table id="grid-table-detail"></table>
                    <div id="grid-pager-detail"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$("#tab-2").on("click", function(event) {

    event.stopPropagation();
    var grid = $('#grid-table');
    p_app_role_id = grid.jqGrid ('getGridParam', 'selrow');
    code = grid.jqGrid ('getCell', p_app_role_id, 'code');

    if(p_app_role_id == null) {
        swal('Informasi','Silahkan pilih salah satu module','info');
        return false;
    }

    loadContentWithParams("administration.p_application_role", {
        p_app_role_id: p_app_role_id,
        code : code
    });
});
</script>

<script>
    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."administration.p_app_role_controller/crud"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 'p_app_role_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Role Name',name: 'code',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:32,
                    },
                    editrules: {required: true}
                },
                {label: 'Description',name: 'description',width: 200, align: "left",editable: true,
                    edittype:'textarea',
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                }/*,
                {label: 'Status Aktif',name: 'is_active',width: 120, align: "left",editable: true, edittype: 'select', hidden:true,
                    editrules: {edithidden: true, required: false},
                    editoptions: {
                    value: "Y:AKTIF;N:TIDAK AKTIF",
                    dataInit: function(elem) {
                        $(elem).width(150);  // set the width which you need
                    }
                }},
                {label: 'Status Aktif', name: 'status_active', width: 120, align: "left", editable: false}*/
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 10,
            rowList: [10, 20],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/
				var celValue = $('#grid-table').jqGrid('getCell', rowid, 'p_app_role_id');
                var celCode = $('#grid-table').jqGrid('getCell', rowid, 'code');

                var grid_detail = $("#grid-table-detail");
                if (rowid != null) {
                    grid_detail.jqGrid('setGridParam', {
                        url: '<?php echo WS_JQGRID."administration.p_app_user_role_controller/showUserList"; ?>',
                        postData: {p_app_role_id: rowid}
                    });
                    var strCaption = 'Permission Role :: ' + celCode;
                    grid_detail.jqGrid('setCaption', strCaption);
                    $("#grid-table-detail").trigger("reloadGrid");
                    $("#detail_placeholder").show();

                    responsive_jqgrid('#grid-table-detail', '#grid-pager-detail');
                }

            },
            sortorder:'',
            pager: '#grid-pager' ,
            jsoncruder: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }

            },
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '<?php echo WS_JQGRID."administration.p_app_role_controller/crud"; ?>',
            caption: "Role"

        });

        jQuery('#grid-table').jqGrid('navGrid', '#grid-pager',
            {   //navbar options
                edit: true,
                editicon: 'fa fa-pencil blue bigger-120',
                add: true,
                addicon: 'fa fa-plus-circle purple bigger-120',
                del: true,
                delicon: 'fa fa-trash-o red bigger-120',
                search: true,
                searchicon: 'fa fa-search orange bigger-120',
                refresh: true,
                afterRefresh: function () {
                    // some code here
                    jQuery("#detailsPlaceholder").hide();
                },

                refreshicon: 'fa fa-refresh green bigger-120',
                view: false,
                viewicon: 'fa fa-search-plus grey bigger-120'
            },

            {
                // options for the Edit Dialog
                closeAfterEdit: true,
                closeOnEscape:true,
                recreateForm: true,
                serializeEditData: serializeJSON,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);

                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
                    return [true,"",response.responseText];
                }
            },
            {
                //new record form
                closeAfterAdd: false,
                clearAfterAdd : true,
                closeOnEscape:true,
                recreateForm: true,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                serializeEditData: serializeJSON,
                viewPagerButtons: false,
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);
                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }

                    $(".tinfo").html('<div class="ui-state-success">' + response.message + '</div>');
                    var tinfoel = $(".tinfo").show();
                    tinfoel.delay(3000).fadeOut();

                    return [true,"",response.responseText];
                }
            },
            {
                //delete record form
                serializeDelData: serializeJSON,
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    style_delete_form(form);
                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                onClick: function (e) {
                    //alert(1);
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
                    return [true,"",response.responseText];
                }
            },
            {
                //search form
                closeAfterSearch: false,
                recreateForm: true,
                afterShowSearch: function (e) {
                    var form = $(e[0]);
                    style_search_form(form);

                    form.closest('.ui-jqdialog').center();
                },
                afterRedraw: function () {
                    style_search_filters($(this));
                }
            },
            {
                //view record form
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                }
            }
        );

    });

	/**
     * ---------------------------------------------------------------------
     * |  jqgrid table detail
     * ---------------------------------------------------------------------
     */
    $("#grid-table-detail").jqGrid({
        url: '<?php echo WS_JQGRID."administration.p_app_user_role_controller/showUserList"; ?>',
        datatype: "json",
        mtype: "POST",
        colModel: [
            {label: 'ID', key:true, name: 'p_app_user_role_id', width: 5, sorttype: 'number', editable: true, hidden: true},
            {label: 'User ID',  name: 'p_app_user_id', width: 5, sorttype: 'number',editable: false, hidden: true},
            {label: 'Username', name: 'app_user_name', width: 200, align: "left", editable: false},
            {label: 'Full Name', name: 'full_name', width: 200, align: "left", editable: false},
            {label: 'User Status', name: 'user_status', width: 200, align: "left", editable: false},

        ],
        height: '100%',
        width:500,
        autowidth: true,
        viewrecords: true,
        rowNum: 10,
        rowList: [10,20,50],
        rownumbers: true, // show row numbers
        rownumWidth: 35, // the width of the row numbers columns
        altRows: true,
        shrinkToFit: true,
        onSelectRow: function (rowid) {
            /*do something when selected*/
        },
        sortorder:'',
        pager: '#grid-pager-detail',
        jsonReader: {
            root: 'rows',
            id: 'id',
            repeatitems: false
        },
        loadComplete: function (response) {
            if(response.success == false) {
                swal({title: 'Attention', text: response.message, html: true, type: "warning"});
            }

        },
        caption: "User"

    });

    $('#grid-table-detail').jqGrid('navGrid', '#grid-pager-detail',
        {   //navbar options
            edit: false,
            editicon: 'fa fa-pencil blue bigger-110',
            add: false,
            addicon: 'fa fa-plus-circle purple bigger-110',
            del: false,
            delicon: 'fa fa-trash-o red bigger-110',
            search: true,
            searchicon: 'fa fa-search orange bigger-110',
            refresh: true,
            afterRefresh: function () {
                // some code here
            },

            refreshicon: 'fa fa-refresh green bigger-110',
            view: false,
            viewicon: 'fa fa-search-plus grey bigger-110'
        },

        {
            editData: {
                p_app_role_id: function() {
                    var selRowId =  $("#grid-table").jqGrid ('getGridParam', 'selrow');
                    var p_app_role_id = $("#grid-table").jqGrid('getCell', selRowId, 'p_app_role_id');
                    return p_app_role_id;
                }
            },
            // options for the Edit Dialog
            serializeEditData: serializeJSON,
            closeAfterEdit: true,
            closeOnEscape:true,
            recreateForm: true,
            viewPagerButtons: true,
            width: 'auto',
            errorTextFormat: function (data) {
                return 'Error: ' + data.responseText
            },

            beforeShowForm: function (e, form) {
                var form = $(e[0]);
                style_edit_form(form);
            },
            afterShowForm: function(form) {
                form.closest('.ui-jqdialog').center();
            },
            afterSubmit:function(response,postdata) {
                var response = $.parseJSON(response.responseText);
                if(response.success == false) {
                    return [false,response.message,response.responseText];
                }
                return [true,"",response.responseText];
            }

        },
        {
            //new record form
            serializeEditData: serializeJSON,
            closeAfterAdd: true,
            clearAfterAdd : true,
            closeOnEscape:true,
            recreateForm: true,
            width: 'auto',
            errorTextFormat: function (data) {
                return 'Error: ' + data.responseText
            },
            viewPagerButtons: false,
            beforeShowForm: function (e, form) {
                var form = $(e[0]);
                style_edit_form(form);
            },
            afterShowForm: function(form) {
                form.closest('.ui-jqdialog').center();
            },
            afterSubmit:function(response,postdata) {
                var response = $.parseJSON(response.responseText);
                if(response.success == false) {
                    return [false,response.message,response.responseText];
                }

                $(".tinfo").html('<div class="ui-state-success">' + response.message + '</div>');
                var tinfoel = $(".tinfo").show();
                tinfoel.delay(3000).fadeOut();

                return [true,"",response.responseText];
            }
        },
        {
            //delete record form
            serializeDelData: serializeJSON,
            recreateForm: true,
            beforeShowForm: function (e) {
                var form = $(e[0]);
                style_delete_form(form);
            },
            afterShowForm: function(form) {
                form.closest('.ui-jqdialog').center();
            },
            onClick: function (e) {
                //alert(1);
            },
            afterSubmit:function(response,postdata) {
                var response = $.parseJSON(response.responseText);
                if(response.success == false) {
                    return [false,response.message,response.responseText];
                }
                return [true,"",response.responseText];
            }
        },
        {
            //search form
            closeAfterSearch: false,
            recreateForm: true,
            afterShowSearch: function (e) {
                var form = $(e[0]);
                style_search_form(form);
                form.closest('.ui-jqdialog').center();
            },
            afterRedraw: function () {
                style_search_filters($(this));
            }
        },
        {
            //view record form
            recreateForm: true,
            beforeShowForm: function (e) {
                var form = $(e[0]);
            }
        }
    );

    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );

    }

</script>