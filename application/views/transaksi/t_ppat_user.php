<link href="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url();?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">PPAT</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Daftar PPAT</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-tabdrop">
            <ul class="nav nav-tabs">
                <li class="" id="tab-1">
                    <a data-toggle="tab"> PPAT </a>
                </li>
                <li id="tab-2" class="active">
                    <a data-toggle="tab"> PPAT USER  </a>
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


<input type="hidden" class="form-control" name="t_ppat_id" id="t_ppat_id" value="<?php echo $_POST['t_ppat_id'] ?>">

<script>



    $(function($) {
        $("#tab-1").on( "click", function() {

            loadContentWithParams("transaksi.t_ppat", {});
        });
    });

    $('.datepicker1').datetimepicker({
        format: 'YYYY-MM-DD',
        // defaultDate: new Date()
    });

    $(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";
        var t_ppat_id = $("#t_ppat_id").val();

        $("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_ppat_user_controller/crud"; ?>',
            datatype: "json",
            mtype: "POST",
            postData:{t_ppat_id:t_ppat_id},
            colModel: [
                {label: 'ID',name: 't_ppat_user_id', key: true, width: 35, sorttype: 'number', sortable: true, editable: true, hidden:true},
                {label: 'ID Parent',name: 't_ppat_id',   width: 35,  editable: false, hidden:true,
                    editoptions: {
                        size: 30,
                        value:t_ppat_id
                    }
                },
                {label: 'ppat name',name: 'ppat_name',   editable: true, hidden:true},
                {label: 'Email',name: 'email_address',   editable: true, hidden:true},
                {label: 'Username',name: 'user_name', width: 300, sortable: true, editable: true,
                    editoptions: {
                        size: 30
                    },
                    editrules: {required: true}
                },
                {label: 'Status',name: 'code', width: 200, sortable: true, editable: false,
                    editoptions: {
                        size: 30
                    },
                    editrules: {required: true}
                },
                {label: 'Password',name: 'user_pwd', width: 200, sortable: true, hidden:true, editable: true,
                    edittype: 'password',
                    editoptions: {
                        size: 30
                    },
                    editrules: {edithidden: true, required: true}
                },
                {label: 'Massa Berlaku',name: 'valid_from',width: 200, align: "left",editable: true, edittype : 'text', hidden : true, 
                    editrules : {edithidden : true, required: true},
                    editoptions: {
                         dataInit: function (element) {
                                $(element).datepicker({
                                    id: 'start_datePicker',
                                    autoclose: true,
                                    format: 'yyyy-mm-dd',
                                    orientation : 'top',
                                    todayHighlight : true,
                                     showOn: 'focus'
                                    //minDate :0
                                    
                                });
                            }
                    }
                },
                {label: 'Berlaku Sampai',name: 'valid_to',width: 200, align: "left",editable: true, edittype : 'text', hidden : true, 
                    editrules : {edithidden : true, required: false},
                    editoptions: {
                         dataInit: function (element) {
                                $(element).datepicker({
                                    id: 'start_datePicker',
                                    autoclose: true,
                                    format: 'yyyy-mm-dd',
                                    orientation : 'top',
                                    todayHighlight : true,
                                     showOn: 'focus'
                                    //minDate :0
                                    
                                });
                            }
                    }
                },
                {label: 'No. Handphone',name: 'mobile_no', width: 200, sortable: true, hidden:true, editable: true,
                    editoptions: {
                        size: 30
                    },
                    editrules: {edithidden: true,required: false}
                },
                {label: 'Deskripsi',name: 'description', width: 300, sortable: true, editable: true,
                    editoptions: {
                        size: 30
                    },
                    editrules: {required: false}
                },
                {label: 'Pengubah',name: 'updated_by', width: 213, sortable: true, hidden:false, editable: false,
                    editoptions: {
                        size: 30
                    },
                    editrules: {edithidden: true, required:true}
                },
                {label: 'Tanggal Ubah',name: 'updated_date', width: 200, sortable: true, hidden:false, editable: false,
                    editoptions: {
                        size: 30
                    },
                    editrules: {edithidden: true}
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

                setTimeout(function(){
                      $("#grid-table").setSelection($("#grid-table").getDataIDs()[0],true);
                },500);

            },
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '<?php echo WS_JQGRID."transaksi.t_ppat_user_controller/crud"; ?>',
            caption: "DAFTAR PPAT"

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
                editData: {
                    t_ppat_id: function() {
                        return <?php echo $this->input->post('t_ppat_id'); ?>;
                    }
                },
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

                    $("#tt_ppat_id").val('tes');

                    console.log(form[0][1]);
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