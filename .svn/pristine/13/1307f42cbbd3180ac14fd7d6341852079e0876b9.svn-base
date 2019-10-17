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
            <span>Daftar Workflow</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <table id="grid-table"></table>
        <div id="grid-pager"></div>
    </div>
</div>

<?php 
    $this->load->view('lov/lov_document_type.php');
    $this->load->view('lov/lov_procedure.php');
?>
<script>
    function showLovDocType(id, code) {
        modal_lov_document_type_show(id,code);
    }

    function showLovProc(id, code) {
        modal_lov_procedure_show(id,code);
    }

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."workflow.workflow_list_controller/crud"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 'p_workflow_id', key: true, width: 35, sorttype: 'number', sortable: true, editable: true, hidden:true},
                {
                    label: 'Nama Workflow',
                    name: 'doc_name', 
                    width: 200, 
                    sortable: true, 
                    editable: true,
                    editoptions: {
                        size: 50,
                        maxlength:64
                    },
                    editrules: {required: true}
                },                
                {
                    label: 'Nama Workflow Tercetak', 
                    name: 'display_name', 
                    width: 200, 
                    sortable: true, 
                    editable: true,
                    editoptions: {
                        size: 50,
                        maxlength:96
                    },
                    editrules: {edithidden: true, required:true}
                }, 
                {
                    label: 'Jenis Dokumen', 
                    name: 'document_type_code', 
                    width: 120, 
                    align: "left",  
                    editable: false
                }, 
                {
                    label: 'Jenis Dokumen',
                    name: 'p_document_type_id', 
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
                                elm.append('<input id="form_p_document_type_id" type="text"  class="FormElement form-control jqgrid" style="display:none;">'+
                                        '<input id="form_p_document_type_code" disabled type="text" class="FormElement form-control jqgrid-required">'+    
                                        '<button class="btn btn-success" type="button" onclick="showLovDocType(\'form_p_document_type_id\',\'form_p_document_type_code\')">'+
                                        '<span class="fa fa-search"></span>'+
                                        '</button>');
                                $("#form_p_document_type_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);
                            
                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {
                            
                            if(oper === 'get') {
                                return $("#form_p_document_type_id").val();
                            } else if( oper === 'set') {
                                $("#form_p_document_type_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'document_type_code');
                                        $("#form_p_document_type_code").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                },
                {
                    label: 'Pekerjaan Awal', 
                    name: 'procedure_code', 
                    width: 120, 
                    align: "left",  
                    editable: false
                },   
                {
                    label: 'Pekerjaan Awal',
                    name: 'p_procedure_id_start', 
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
                                elm.append('<input id="form_p_procedure_id" type="text"  style="display:none;">'+
                                        '<input id="form_p_procedure_code" disabled type="text" class="FormElement form-control jqgrid-required">'+
                                        '<button class="btn btn-success" type="button" onclick="showLovProc(\'form_p_procedure_id\',\'form_p_procedure_code\')">'+
                                        '<span class="fa fa-search"></span>'+
                                        '</button>');
                                $("#form_p_procedure_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);
                            
                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {
                            
                            if(oper === 'get') {
                                return $("#form_p_procedure_id").val();
                            } else if( oper === 'set') {
                                $("#form_p_procedure_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'procedure_code');
                                        $("#form_p_procedure_code").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                }, 
                {
                    label: 'Aktif ?',
                    name: 'is_active',
                    width: 100,
                    sortable: true,
                    // align: 'center',
                    editable: true,
                    edittype: 'select',
                    formatter: 'select',
                    editrules: {edithidden: true, required:true},
                    editoptions: {value: {'Y': 'YES', 'N': 'NO'}}
                },
                {
                    label: 'Deskripsi',
                    name: 'description', 
                    width: 200, 
                    sortable: true, 
                    hidden:true, 
                    editable: true,
                    editoptions: {
                                    size: 50,
                                    maxlength:128
                    },
                    editrules: {edithidden: true, required:false}
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
            editurl: '<?php echo WS_JQGRID."workflow.workflow_list_controller/crud"; ?>',
            caption: "Daftar Workflow"

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

                    setTimeout( function() {
                        $('#form_p_procedure_id').val('');
                        $('#form_p_procedure_code').val('');    
                        $('#form_p_document_type_id').val('');    
                        $('#form_p_document_type_code').val('');    
                    }, 100);
                    
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

                    $("#form_p_document_type_id").val("");
                    $("#form_p_document_type_code").val("");

                    $("#form_p_procedure_id").val("");
                    $("#form_p_procedure_code").val("");
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

</script>