<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url();?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Reconciliation</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Daftar Reconciliation</span>
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
                    <a data-toggle="tab"> Reconciliation </a>
                </li>
                <li id="tab-2">
                    <a data-toggle="tab"> Reconciliation Detail  </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active">
                    <table id="grid-table"></table>
                    <div id="grid-pager"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="space-4"></div>
<div class="tab-content no-border">
    <div class="row">
        <div class="col-md-7">
            <div class="portlet blue box menu-panel">
                <div class="portlet-title">
                    <div class="caption" >ADD Reconciliation</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">  
                    <form role="form" id="form_legal" name="form_legal" method="post" enctype="multipart/form-data" accept-charset="utf-8"> 
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="form-horizontal">
                            <div class="row">   
                                <div class="form-group">
                                    <label class="control-label col-md-3">Upload File</label>
                                    <div class="col-md-4">
                                        <input type="file" required name="uploadForm" id="uploadForm">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-3">
                                            <button class="btn btn-sm green-jungle radius-4">
                                                <i class="ace-icon fa fa-check"></i>
                                                Upload File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>

    

    $(function($) {
        $("#tab-2").on( "click", function() {
            var grid = $('#grid-table');
            selRowId = grid.jqGrid ('getGridParam', 'selrow');

            var t_reconciliation_file_id = grid.jqGrid ('getCell', selRowId, 't_reconciliation_file_id');

            if(selRowId == null) {
                swal("Informasi", "Silahkan Pilih Salah Satu Baris Data", "info");
                return false;
            }

            loadContentWithParams("transaksi.t_reconciliation_file_detail", {
                t_reconciliation_file_id: t_reconciliation_file_id
            });
        });
    });

    

    function readFile(t_reconciliation_file_id) {
        $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo WS_JQGRID."transaksi.t_reconciliation_file_controller/readFile"; ?>',
                data: {t_reconciliation_file_id:t_reconciliation_file_id},
                success: function(data) {
                    //console.log(data);
                    if(data.success) {
                        $("#grid-table").trigger("reloadGrid");
                        swal("Sukses", data.message, "info");
                    }else{
                        swal("", data.message, "warning");
                    }
                   
                }
            });
    }


    $(function() {
        /* submit */
        $("#form_legal").on('submit', (function (e) {

            e.preventDefault();   
            var data = new FormData(this);
            //console.log(data);
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo WS_JQGRID."transaksi.t_reconciliation_file_controller/create"; ?>',
                data: data,
                timeout: 10000,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false, 
                success: function(data) {
                    //console.log(data);
                    if(data.success) {
                        $("#uploadForm").val('');
                        $("#grid-table").trigger("reloadGrid");
                        swal("Sukses", data.message, "info");
                    }else{
                        swal("", data.message, "warning");
                    }
                   
                }
            });
            return false;
        }));
        
    });

    

</script>


<script>

    $(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        $("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_reconciliation_file_controller/crud"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID',name: 't_reconciliation_file_id', key: true, width: 35,  hidden:true},
                {label: 'Nama File',name: 'file_name', width: 285},
                {label: 'Tanggl File',name: 'file_date', width: 170},
                {label: 'Direktori File',name: 'file_dir', width: 188},
                {label: 'Total Transaksi',name: 'total_trans_record', width: 140,align: "right"},
                {label: 'Total Amount',name: 'total_amount', width: 170,align: "right", summaryTpl:"{0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Action',width: 120, align: "center",editable: false,
                    formatter: function(cellvalue, options, rowObject) {
                        return '<a href="#" class="btn btn-primary btn-xs" onclick="readFile('+rowObject['t_reconciliation_file_id']+');"> Baca File </a>';
                    }
                } ,
                {label: 'Action',width: 120, align: "center",editable: false,
                    formatter: function(cellvalue, options, rowObject) {
                        return '<a href="#" class="btn btn-success btn-xs" onclick=""> Reconsiliation </a>';
                    }
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
            shrinkToFit: false,
            multiboxonly: true,
            onSelectRow: function (rowid) {

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

                // setTimeout(function(){
                //       $("#grid-table").setSelection($("#grid-table").getDataIDs()[0],true);
                // },500);

            },
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '<?php echo WS_JQGRID."transaksi.t_reconciliation_file_controller/crud"; ?>',
            caption: "DAFTAR RECONCILIATION"

        });

        jQuery('#grid-table').jqGrid('navGrid', '#grid-pager',
            {   //navbar options
                edit: false,
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

    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );

    }

    



</script>