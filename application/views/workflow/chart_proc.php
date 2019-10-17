<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url();?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Workflow</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Aliran Workflow</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-tabdrop">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab"> Aliran Workflow </a>
                </li>
            </ul>
            <input type="hidden" id="tab_chart_proc_id" value="">
            <input type="hidden" id="tab_chart_proc_code" value="">
            <div class="tab-content">
                <div class="row">
                    <div class="col-md-12">
                        <table id="grid-table"></table>
                        <div id="grid-pager"></div>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="row">
                    <div class="col-sm-3" id="detailsPlaceholder" style="display:none">
                        <table id="jqGridDetailPrev"></table>
                        <div id="jqGridDetailsPagerPrev"></div>
                    </div>

                    <div class="col-sm-1"></div>

                    <div class="col-sm-7" id="detailsPlaceholderNext" style="display:none;">
                        <table id="jqGridDetailNext"></table>
                        <div id="jqGridDetailsPagerNext"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<?php 
    $this->load->view('lov/lov_procedure.php');
?>
<script>
    function showLovProc(id, code) {
        modal_lov_procedure_show(id,code);
    }

    function showDaemon(idd) {        
        var code = $("#jqGridDetailNext").jqGrid ('getCell', idd, 'doc_name');
        loadContentWithParams("workflow.chart_proc_daemon", {
            p_w_chart_proc_id: idd,
            workflow_name : code
        });
    }

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."workflow.chart_proc_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 'p_workflow_id', key: true, width: 35, sorttype: 'number', sortable: true, editable: true, hidden:true},
                {
                    label: 'Nama Dokumen',
                    name: 'ldocument', 
                    width: 200, 
                    sortable: true, 
                    editable: true
                }, 
                {
                    label: 'Nama Workflow', 
                    name: 'lworkflow', 
                    width: 200, 
                    sortable: true, 
                    editable: true
                },                
                {
                    label: 'Aktif?', 
                    name: 'lactive', 
                    width: 60, 
                    sortable: true, 
                    editable: true
                }, 
                {
                    label: 'Jumlah Transisi', 
                    name: 'cabang', 
                    width: 60, 
                    sortable: true, 
                    editable: true
                }
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 10,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/
                var grid_id = jQuery("#jqGridDetailPrev");
                if (rowid != null) {
                    grid_id.jqGrid('setGridParam', {
                        url: '<?php echo WS_JQGRID."workflow.chart_proc_prev_controller/crud"; ?>',
                        datatype: 'json',
                        postData: {p_workflow_id: rowid},
                        userData: {row: rowid}
                    });
                    grid_id.jqGrid('setCaption', 'Aliran Prosedur');
                    jQuery("#detailsPlaceholder").show();
                    jQuery("#detailsPlaceholderNext").hide();
                    jQuery("#jqGridDetailPrev").trigger("reloadGrid");
                }

            },
            sortorder:'',
            pager: '#grid-pager',
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
            //memanggil controller jqgrid yang ada di controller crud
            caption: "Aliran Workflow"

        });

        jQuery('#grid-table').jqGrid('navGrid', '#grid-pager',
            {   //navbar options
                edit: false,
                editicon: 'fa fa-pencil blue bigger-120',
                add: false,
                addicon: 'fa fa-plus-circle purple bigger-120',
                del: false,
                delicon: 'fa fa-trash-o red bigger-120',
                search: true,
                searchicon: 'fa fa-search orange bigger-120',
                refresh: true,
                afterRefresh: function () {
                    // some code here
                    jQuery("#detailsPlaceholderNext").hide();
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

    function serializeJSON(postdata) {
        var items;
        if(postdata.oper != 'del') {
            items = JSON.stringify(postdata, function(key,value){
                if (typeof value === 'function') {
                    return value();
                } else {
                  return value;
                }
            });
        }else {
            items = postdata.id;
        }

        var jsondata = {items:items, oper:postdata.oper, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'};
        return jsondata;
    }

    function style_edit_form(form) {

        //update buttons classes
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-primary');
        buttons.eq(1).addClass('btn-danger');


    }

    function style_delete_form(form) {
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-danger');
        buttons.eq(1).addClass('btn-default');
    }

    function style_search_filters(form) {
        form.find('.delete-rule').val('X');
        form.find('.add-rule').addClass('btn btn-xs btn-primary');
        form.find('.add-group').addClass('btn btn-xs btn-success');
        form.find('.delete-group').addClass('btn btn-xs btn-danger');
    }

    function style_search_form(form) {
        var dialog = form.closest('.ui-jqdialog');
        var buttons = dialog.find('.EditTable')
        buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'fa fa-retweet');
        buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'fa fa-comment-o');
        buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-success').find('.ui-icon').attr('class', 'fa fa-search');
    }

    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );

    }

    //-----------------------------------------jqGridDetailPrev------------------------------------------------//
    jQuery("#jqGridDetailPrev").jqGrid({
        datatype: "json",
        mtype: "POST",
        colModel: [
            {
                label: 'P_WORKFLOW_ID',
                name: 'p_workflow_id',
                width: 35,
                sorttype: 'number',
                sortable: true,
                editable: false,
                hidden: true
            },            
            {
                label: 'Prosedur Sebelum', 
                name: 'proc_display_prev', 
                width: 330, 
                align: "left",  
                editable: false
            },   
            {
                label: 'Pekerjaan Sebelum',
                name: 'p_procedure_id_prev', 
                width: 200, 
                sortable: true, 
                key: true,
                editable: true,
                hidden: true,
                editrules: {edithidden: true, number:true, required:true},
                edittype: 'custom',
                editoptions: {
                    "custom_element":function( value  , options) {                            
                        var elm = $('<span></span>');
                        
                        // give the editor time to initialize
                        setTimeout( function() {
                            elm.append('<input id="form_p_procedure_id_prev" type="text"  style="display:none;">'+
                                    '<input id="form_p_procedure_code" disabled type="text" class="FormElement form-control jqgrid-required">'+
                                    '<button class="btn btn-success" type="button" onclick="showLovProc(\'form_p_procedure_id_prev\',\'form_p_procedure_code\')">'+
                                    '   <span class="fa fa-search"></span>'+
                                    '</button>');
                            $("#form_p_procedure_id_prev").val(value);
                            elm.parent().removeClass('jqgrid-required');
                        }, 100);
                        
                        return elm;
                    },
                    "custom_value":function( element, oper, gridval) {
                        
                        if(oper === 'get') {
                            return $("#form_p_procedure_id_prev").val();
                        } else if( oper === 'set') {
                            $("#form_p_procedure_id_prev").val(gridval);
                            var gridId = this.id;
                            // give the editor time to set display
                            setTimeout(function(){
                                var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                if(selectedRowId != null) {
                                    var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'proc_display_prev');
                                    $("#form_p_procedure_code").val( code_display );
                                }
                            },100);
                        }
                    }
                }
            },
            {
                label: 'Prosedur Sesudah', 
                name: 'pekerjaan_next', 
                width: 250, 
                align: "left",  
                editable: false,
                hidden: true
            },   
            {
                label: 'Pekerjaan Sesudah',
                name: 'p_procedure_id_next', 
                width: 200, 
                sortable: true, 
                editable: true,
                hidden: true,
                editrules: {edithidden: true, number:true},
                edittype: 'custom',
                editoptions: {
                    "custom_element":function( value  , options) {                            
                        var elm = $('<span></span>');
                        
                        // give the editor time to initialize
                        setTimeout( function() {
                            elm.append('<input id="form_p_procedure_id_next" type="text"  style="display:none;">'+
                                    '<input id="form_pekerjaan_next" disabled type="text" class="FormElement form-control jqgrid">'+
                                    '<button class="btn btn-success" type="button" onclick="showLovProc(\'form_p_procedure_id_next\',\'form_pekerjaan_next\')">'+
                                    '   <span class="fa fa-search"></span>'+
                                    '</button>');
                            $("#form_p_procedure_id_next").val(value);
                            elm.parent().removeClass('jqgrid-required');
                        }, 100);
                        
                        return elm;
                    },
                    "custom_value":function( element, oper, gridval) {
                        
                        if(oper === 'get') {
                            return $("#form_p_procedure_id_next").val();
                        } else if( oper === 'set') {
                            $("#form_p_procedure_id_next").val(gridval);
                            var gridId = this.id;
                            // give the editor time to set display
                            setTimeout(function(){
                                var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                if(selectedRowId != null) {
                                    var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'pekerjaan_next');
                                    $("#form_pekerjaan_next").val( code_display );
                                }
                            },100);
                        }
                    }
                }
            },
            {
                label: 'Alternate (Dispatcher)', 
                name: 'pekerjaan_alt', 
                width: 250, 
                align: "left",  
                editable: false,
                hidden: true
            },   
            {
                label: 'Alternate (Dispatcher)',
                name: 'p_procedure_id_alt', 
                width: 200, 
                sortable: true, 
                editable: true,
                hidden: true,
                editrules: {edithidden: true, number:true},
                edittype: 'custom',
                editoptions: {
                    "custom_element":function( value  , options) {                            
                        var elm = $('<span></span>');
                        
                        // give the editor time to initialize
                        setTimeout( function() {
                            elm.append('<input id="form_p_procedure_id_alt" type="text"  style="display:none;">'+
                                    '<input id="form_pekerjaan_alt" disabled type="text" class="FormElement form-control jqgrid">'+
                                    '<button class="btn btn-success" type="button" onclick="showLovProc(\'form_p_procedure_id_alt\',\'form_pekerjaan_alt\')">'+
                                    '   <span class="fa fa-search"></span>'+
                                    '</button>');
                            $("#form_p_procedure_id_alt").val(value);
                            elm.parent().removeClass('jqgrid-required');
                        }, 100);
                        
                        return elm;
                    },
                    "custom_value":function( element, oper, gridval) {
                        
                        if(oper === 'get') {
                            return $("#form_p_procedure_id_alt").val();
                        } else if( oper === 'set') {
                            $("#form_p_procedure_id_alt").val(gridval);
                            var gridId = this.id;
                            // give the editor time to set display
                            setTimeout(function(){
                                var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                if(selectedRowId != null) {
                                    var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'pekerjaan_alt');
                                    $("#form_pekerjaan_alt").val( code_display );
                                }
                            },100);
                        }
                    }
                }
            }, 
            {
                label: 'Level Pembatalan Workflow',
                name: 'importance_level',
                width: 100,
                sortable: true,
                editable: true,
                edittype: 'select',
                formatter: 'select',
                editrules: {edithidden: true, required:true},
                editoptions: {value: {'O': 'OPSIONAL', 'M': 'WAJIB'}},
                hidden: true
            },
            {
                label: 'Fungsi Init',
                name: 'f_init',
                width: 300,
                align: "left",
                sortable: true,
                editable: true,
                editoptions: {
                    size: 55,
                    maxlength:64
                },
                editrules: {edithidden: true},
                hidden: true
            },
            {
                label: 'No.',
                name: 'sequence_no',
                width: 70,
                align: "center",
                sortable: true,
                editable: true,
                sorttype: 'number',
                editoptions: {
                    size: 10,
                    maxlength:5
                },
                editrules: {edithidden: true, required: false},
                hidden: true
            },
            {
                label: 'Mulai Berlaku',
                name: 'valid_from',
                width: 250,
                editable: true,
                editrules: {edithidden: true, required: true},
                edittype:"text",
                editoptions: {
                    // dataInit is the client-side event that fires upon initializing the toolbar search field for a column
                    // use it to place a third party control to customize the toolbar
                    dataInit: function (element) {
                       $(element).datepicker({
                            autoclose: true,
                            format: 'yyyy-mm-dd',
                            orientation : 'bottom'
                        });
                    }
                },
                hidden: true
            },
            {
                label: 'Akhir Berlaku',
                name: 'valid_to',
                width: 250,
                editable: true,
                editrules: {edithidden: true},
                edittype:"text",                
                editoptions: {
                    // dataInit is the client-side event that fires upon initializing the toolbar search field for a column
                    // use it to place a third party control to customize the toolbar
                    dataInit: function (element) {
                       $(element).datepicker({
                            autoclose: true,
                            format: 'yyyy-mm-dd',
                            orientation : 'bottom'
                        });
                    }
                },
                hidden: true
            }
        ],
        height: '100%',
        autowidth: true,
        viewrecords: false,
        rowNum: 10,
        rowList: [10,20,50],
        rownumbers: true, // show row numbers
        rownumWidth: 35, // the width of the row numbers columns
        altRows: true,
        shrinkToFit: true,
        multiboxonly: true,
        onSelectRow: function (rowid) {
            /*do something when selected*/
            var pw_id = $('#jqGridDetailPrev').jqGrid('getCell', rowid, 'p_workflow_id');
            var dis_prev = $('#jqGridDetailPrev').jqGrid('getCell', rowid, 'proc_display_prev');
            var grid_id = jQuery("#jqGridDetailNext");
            if (rowid != null) {
                grid_id.jqGrid('setGridParam', {
                    url: '<?php echo WS_JQGRID."workflow.chart_proc_next_controller/crud"; ?>',
                    datatype: 'json',
                    postData: {
                                p_procedure_id_prev: rowid, 
                                proc_display_prev: dis_prev, 
                                p_workflow_id: pw_id
                    },
                    userData: {row: rowid}
                });
                grid_id.jqGrid('setCaption', 'Aliran Prosedur Sesudah');
                jQuery("#detailsPlaceholderNext").show();
                jQuery("#jqGridDetailNext").trigger("reloadGrid");
            }

        },
        sortorder:'',
        pager: '#jqGridDetailsPagerPrev',
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
        //memanggil controller jqgrid yang ada di controller crud
        editurl: '<?php echo WS_JQGRID."workflow.chart_proc_prev_controller/crud"; ?>',
        caption: "Aliran Prosedur"

    });

    jQuery('#jqGridDetailPrev').jqGrid('navGrid', '#jqGridDetailsPagerPrev',
        {   //navbar options
            edit: false,
            editicon: 'fa fa-pencil blue bigger-120',
            add: true,
            addicon: 'fa fa-plus-circle purple bigger-120',
            del: false,
            delicon: 'fa fa-trash-o red bigger-120',
            search: true,
            searchicon: 'fa fa-search orange bigger-120',
            refresh: true,
            afterRefresh: function () {
                // some code here
                jQuery("#detailsPlaceholderNext").hide();
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
            editData: {
                p_workflow_id: function () {
                    var data = jQuery("#jqGridDetailPrev").jqGrid('getGridParam', 'postData');
                    var p_workflow_id = data.p_workflow_id;
                    return p_workflow_id;
                }
            },
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
                setTimeout( function() {  
                    $('#form_p_procedure_id_prev').val('');
                    $('#form_p_procedure_id_next').val('');
                    $('#form_p_procedure_id_alt').val('');
                    $('#form_p_procedure_code').val('');
                    $('#form_pekerjaan_next').val('');
                    $('#form_pekerjaan_alt').val('');
                }, 150);
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

    //-------------------------------------jqGridDetailNext------------------------------------------------//
    jQuery("#jqGridDetailNext").jqGrid({
        datatype: "json",
        mtype: "POST",
        colModel: [
            {
                label: 'ID',
                name: 'p_w_chart_proc_id_next',                
                width: 35,
                key: true,
                sorttype: 'number',
                sortable: true,
                editable: true,
                hidden: true
            },
            {
                label: 'IDD',
                name: 'p_w_chart_proc_id',                
                width: 35,
                key: true,
                sorttype: 'number',
                sortable: true,
                editable: true,
                hidden: true
            },
            {
                label: 'Daemon',
                name: 'p_w_chart_proc_id_next',
                width: 150, 
                align: "center",
                editable: false,
                formatter: function(cellvalue, options, rowObject) {
                    return '<a href="#" onclick="showDaemon('+cellvalue+');"> <i class="ace-icon fa fa-folder bigger-130"></i> </a>';
                }
            },
            {
                label: 'Nama Dokumen',
                name: 'doc_name',                
                width: 35,
                sortable: true,
                editable: false,
                hidden: true
            },
            {
                label: 'P_WORKFLOW_ID',
                name: 'p_workflow_id',                
                width: 35,
                sorttype: 'number',
                sortable: true,
                editable: false,
                hidden: true
            },            
            {
                label: 'Prosedur Sebelum', 
                name: 'proc_display_prev', 
                width: 300, 
                align: "left",  
                editable: false,
                hidden: true
            },   
            {
                label: 'Pekerjaan Sebelum',
                name: 'p_procedure_id_prev', 
                width: 200, 
                sortable: true, 
                editable: true,
                hidden: true,
                editrules: {edithidden: true, number:true, required:true},
                edittype: 'custom',
                editoptions: {
                    "custom_element":function( value  , options) {                            
                        var elm = $('<span></span>');
                        
                        // give the editor time to initialize
                        setTimeout( function() {
                            elm.append('<input id="form_p_procedure_id_prev" type="text"  style="display:none;">'+
                                    '<input id="form_p_procedure_code" disabled type="text" class="FormElement form-control jqgrid-required">'+
                                    '<button id="btn-lov" class="btn btn-success" type="button" onclick="showLovProc(\'form_p_procedure_id_prev\',\'form_p_procedure_code\')">'+
                                    '   <span class="fa fa-search"></span>'+
                                    '</button>');
                            $("#form_p_procedure_id_prev").val(value);
                            elm.parent().removeClass('jqgrid-required');
                        }, 100);
                        
                        return elm;
                    },
                    "custom_value":function( element, oper, gridval) {
                        
                        if(oper === 'get') {
                            return $("#form_p_procedure_id_prev").val();
                        } else if( oper === 'set') {
                            $("#form_p_procedure_id_prev").val(gridval);
                            var gridId = this.id;
                            // give the editor time to set display
                            setTimeout(function(){
                                var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                if(selectedRowId != null) {
                                    var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'proc_display_prev');
                                    $("#form_p_procedure_code").val( code_display );
                                }
                            },100);
                        }
                    }
                }
            },
            {
                label: 'Prosedur Sesudah', 
                name: 'proc_display_next', 
                width: 350, 
                align: "left",  
                editable: false
            },   
            {
                label: 'Pekerjaan Sesudah',
                name: 'p_procedure_id_next', 
                width: 200, 
                sortable: true,                 
                editable: true,
                hidden: true,
                editrules: {edithidden: true, number:true},
                edittype: 'custom',
                editoptions: {
                    "custom_element":function( value  , options) {                            
                        var elm = $('<span></span>');
                        
                        // give the editor time to initialize
                        setTimeout( function() {
                            elm.append('<input id="form_p_procedure_id_next" type="text"  style="display:none;">'+
                                    '<input id="form_pekerjaan_next" disabled type="text" class="FormElement form-control jqgrid" >'+
                                    '<button class="btn btn-success" type="button" onclick="showLovProc(\'form_p_procedure_id_next\',\'form_pekerjaan_next\')">'+
                                    '   <span class="fa fa-search"></span>'+
                                    '</button>');
                            $("#form_p_procedure_id_next").val(value);
                            elm.parent().removeClass('jqgrid-required');
                        }, 100);
                        
                        return elm;
                    },
                    "custom_value":function( element, oper, gridval) {
                        
                        if(oper === 'get') {
                            return $("#form_p_procedure_id_next").val();
                        } else if( oper === 'set') {
                            $("#form_p_procedure_id_next").val(gridval);
                            var gridId = this.id;
                            // give the editor time to set display
                            setTimeout(function(){
                                var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                if(selectedRowId != null) {
                                    var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'pekerjaan_next');
                                    $("#form_pekerjaan_next").val( code_display );
                                }
                            },100);
                        }
                    }
                }
            },
            {
                label: 'Alternate (Dispatcher)', 
                name: 'pekerjaan_alt', 
                width: 250, 
                align: "left",  
                editable: false,
                hidden: true
            },   
            {
                label: 'Alternate (Dispatcher)',
                name: 'p_procedure_id_alt', 
                width: 200, 
                sortable: true, 
                editable: true,
                hidden: true,
                editrules: {edithidden: true, number:true},
                edittype: 'custom',
                editoptions: {
                    "custom_element":function( value  , options) {                            
                        var elm = $('<span></span>');
                        
                        // give the editor time to initialize
                        setTimeout( function() {
                            elm.append('<input id="form_p_procedure_id_alt" type="text"  style="display:none;">'+
                                    '<input id="form_pekerjaan_alt" disabled type="text" class="FormElement form-control jqgrid">'+
                                    '<button class="btn btn-success" type="button" onclick="showLovProc(\'form_p_procedure_id_alt\',\'form_pekerjaan_alt\')">'+
                                    '   <span class="fa fa-search"></span>'+
                                    '</button>');
                            $("#form_p_procedure_id_alt").val(value);
                            elm.parent().removeClass('jqgrid-required');
                        }, 100);
                        
                        return elm;
                    },
                    "custom_value":function( element, oper, gridval) {
                        
                        if(oper === 'get') {
                            return $("#form_p_procedure_id_alt").val();
                        } else if( oper === 'set') {
                            $("#form_p_procedure_id_alt").val(gridval);
                            var gridId = this.id;
                            // give the editor time to set display
                            setTimeout(function(){
                                var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                if(selectedRowId != null) {
                                    var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'pekerjaan_alt');
                                    $("#form_pekerjaan_alt").val( code_display );
                                }
                            },100);
                        }
                    }
                }
            }, 
            {
                label: 'Level Pembatalan Workflow',
                name: 'importance_level',
                width: 100,
                sortable: true,
                editable: true,
                edittype: 'select',
                formatter: 'select',
                editrules: {edithidden: true, required:true},
                editoptions: {value: {'O': 'OPSIONAL', 'M': 'WAJIB'}},
                hidden: true
            },
            {
                label: 'Fungsi Init',
                name: 'f_init',
                width: 300,
                align: "left",
                sortable: true,
                editable: true,
                editoptions: {
                    size: 55,
                    maxlength:64
                },
                editrules: {edithidden: true},
                hidden: true
            },
            {
                label: 'No.',
                name: 'sequence_no',
                width: 70,
                align: "center",
                sortable: true,
                editable: true,
                sorttype: 'number',
                editoptions: {
                    size: 10,
                    maxlength:5
                },
                editrules: {edithidden: true, required: false},
                hidden: true
            },
            {
                label: 'Init Sub?', 
                name: 'linitchild', 
                width: 250, 
                align: "left",  
                editable: false
            }, 
            {
                label: 'Valid?', 
                name: 'lvalid', 
                width: 250, 
                align: "left",  
                editable: false
            }, 
            {
                label: 'Mulai Berlaku',
                name: 'valid_from',
                width: 250,
                editable: true,
                editrules: {edithidden: true, required: true},
                edittype:"text",
                editoptions: {
                    // dataInit is the client-side event that fires upon initializing the toolbar search field for a column
                    // use it to place a third party control to customize the toolbar
                    dataInit: function (element) {
                       $(element).datepicker({
                            autoclose: true,
                            format: 'yyyy-mm-dd',
                            orientation : 'bottom'
                        });
                    }
                }
            },
            {
                label: 'Akhir Berlaku',
                name: 'valid_to',
                width: 250,
                editable: true,
                editrules: {edithidden: true},
                edittype:"text",
                editoptions: {
                    // dataInit is the client-side event that fires upon initializing the toolbar search field for a column
                    // use it to place a third party control to customize the toolbar
                    dataInit: function (element) {
                       $(element).datepicker({
                            autoclose: true,
                            format: 'yyyy-mm-dd',
                            orientation : 'bottom'
                        });
                    }
                }
            }
        ],
        height: '100%',
        // autowidth: true,
        width: 700,
        viewrecords: false,
        rowNum: 10,
        rowList: [10,20,50],
        rownumbers: true, // show row numbers
        rownumWidth: 35, // the width of the row numbers columns
        altRows: true,
        shrinkToFit: true,
        multiboxonly: true,
        onSelectRow: function (rowid) {
            /*do something when selected*/

        },
        sortorder:'',
        pager: '#jqGridDetailsPagerNext',
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
        //memanggil controller jqgrid yang ada di controller crud
        editurl: '<?php echo WS_JQGRID."workflow.chart_proc_next_controller/crud"; ?>',
        caption: "Aliran Prosedur Sesudah"

    });

    jQuery('#jqGridDetailNext').jqGrid('navGrid', '#jqGridDetailsPagerNext',
        {   //navbar options
            edit: true,
            editicon: 'fa fa-pencil blue bigger-120',
            add: false,
            addicon: 'fa fa-plus-circle purple bigger-120',
            del: true,
            delicon: 'fa fa-trash-o red bigger-120',
            search: true,
            searchicon: 'fa fa-search orange bigger-120',
            refresh: true,
            afterRefresh: function () {
                // some code here
            },

            refreshicon: 'fa fa-refresh green bigger-120',
            view: false,
            viewicon: 'fa fa-search-plus grey bigger-120'
        },

        {
            // options for the Edit Dialog
            editData: {
                p_workflow_id: function () {
                    var data = jQuery("#jqGridDetailNext").jqGrid('getGridParam', 'postData');
                    var p_workflow_id = data.p_workflow_id;
                    return p_workflow_id;
                }
            },
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

                setTimeout( function() {                    
                    var selectedRowId = $("#jqGridDetailPrev").jqGrid ('getGridParam', 'selrow');
                    var proc_id = $("#jqGridDetailPrev").jqGrid('getCell', selectedRowId, 'p_procedure_id_prev');
                    var dis_prev = $("#jqGridDetailPrev").jqGrid('getCell', selectedRowId, 'proc_display_prev');

                    var selectedRowIdNext = $("#jqGridDetailNext").jqGrid ('getGridParam', 'selrow');
                    var procNextId = $("#jqGridDetailNext").jqGrid('getCell', selectedRowIdNext, 'p_procedure_id_next');
                    var procNext = $("#jqGridDetailNext").jqGrid('getCell', selectedRowIdNext, 'proc_display_next');
                    
                    $("#jqGridDetailNext").jqGrid('getCell', selectedRowIdNext, 'p_procedure_id_next');

                    $("#form_p_procedure_id_prev").val(proc_id);
                    $("#form_p_procedure_code").val(dis_prev);

                    if(!procNextId){
                        $("#form_p_procedure_id_next").val("");
                        $("#form_pekerjaan_next").val("");
                    }else{
                        $("#form_p_procedure_id_next").val(procNextId);
                        $("#form_pekerjaan_next").val(procNext);
                    }

                    $("#form_p_procedure_id_alt").val("");
                    $("#form_pekerjaan_alt").val("");
                    $('#btn-lov').hide();
                }, 150);

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
            editData: {
                p_workflow_id: function () {
                    var data = jQuery("#jqGridDetailNext").jqGrid('getGridParam', 'postData');
                    var p_workflow_id = data.p_workflow_id;
                    return p_workflow_id;
                }
            },
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

                setTimeout( function() {                    
                    var selectedRowId = $("#jqGridDetailPrev").jqGrid ('getGridParam', 'selrow');
                    var proc_id = $("#jqGridDetailPrev").jqGrid('getCell', selectedRowId, 'p_procedure_id_prev');
                    var dis_prev = $("#jqGridDetailPrev").jqGrid('getCell', selectedRowId, 'proc_display_prev');

                    $("#form_p_procedure_id_prev").val(proc_id);
                    $("#form_p_procedure_code").val(dis_prev);

                    $("#form_p_procedure_id_next").val("");
                    $("#form_pekerjaan_next").val("");

                    $("#form_p_procedure_id_alt").val("");
                    $("#form_pekerjaan_alt").val("");
                }, 150);
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

                //code
                jQuery("#jqGridDetailPrev").trigger("reloadGrid");
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

</script>