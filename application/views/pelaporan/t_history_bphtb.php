<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>History</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-list font-blue"></i>
                    <span class="caption-subject font-blue bold uppercase"> History
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">NOP/Nama WP
                        </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" maxlength="64" name="s_keyword" id="s_keyword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Tanggal Perubahan
                        </label>
                        <div class="col-md-3">
                            <input class="form-control datepicker" type="text" value=""
                                   id="date_start_laporan" name="date_start_laporan">
                        </div>
                        <label class=" contol-label col-xs-1"><span>s.d.</span></label>
                        <div class="col-md-3">
                            <input class="form-control datepicker" type="text" value=""
                                   id="date_end_laporan" name="date_end_laporan">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-1">
                            <button class="btn btn-danger" id="search-history"> <i class="fa fa-search"></i>Cari</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 ">
                        <table id="grid-table"></table>
                        <div id="grid-pager"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $("#search-history").on('click', function() {
        var s_keyword              = $('#s_keyword').val();  
        var date_start_laporan     = $('#date_start_laporan').val();  
        var date_end_laporan       = $('#date_end_laporan').val();  
        //alert(date_end_laporan);

        if(date_end_laporan < date_start_laporan){
            swal ( "Oopss" ,  "Tanggal tidak boleh lebih kecil dari tanggal start!" ,  "error" );
        }else if(date_start_laporan == '' && date_end_laporan == '' && s_keyword == ''){
            swal ( "Oopss" ,  "Filter Tidak Boleh Kosong!" ,  "error" );
        }else if(date_start_laporan == '' && date_end_laporan != ''){
            swal ( "Oopss" ,  "Kolom Tanggal Harus Diisi Keduanya!" ,  "error" );
        }else if (date_start_laporan != '' && date_end_laporan == ''){
            swal ( "Oopss" ,  "Kolom Tanggal Harus Diisi Keduanya!" ,  "error" );
        }else{
            //var url = '<?php echo WS_JQGRID . "pelaporan.t_history_bphtb_controller/read"; ?>';
            //loadData(url, s_keyword, date_start_laporan, date_end_laporan);

            jQuery("#grid-table").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."pelaporan.t_history_bphtb_controller/read"; ?>',
                postData : {s_keyword: s_keyword, 
                                date_start_laporan: date_start_laporan, 
                                date_end_laporan: date_end_laporan}

            });

            $('#grid-table').jqGrid('setCaption', 'History Log');
            $("#grid-table").trigger("reloadGrid");
        }

    });

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'NOP',name: 'njop_pbb',width: 150,sorttype: 'text'},
                {label: 'Nama WP',name: 'wp_name',width: 200,sorttype: 'text'},
                {label: 'Alamat WP',name: 'wp_address_name',width: 250,sorttype: 'text'},
                {label: 'Alamat Objek Pajak',name: 'object_address_name',width: 250,sorttype: 'text'},
                {label: 'Execute By',name: 'modified_by', width: 100,sorttype: 'text'},
                {label: 'Modification Type',name: 'modification_type',width: 150,sorttype: 'text'},
                {label: 'Modification Date',name: 'modification_date',width: 150,sorttype: 'text'},
                {label: 'Reason',name: 'alasan',width: 200,sorttype: 'text'}

            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: -1,
            rowList: [10, 20, 50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            loadComplete: function (response) {
                /*if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }*/

            },
            //memanggil controller jqgrid yang ada di controller crud
            //editurl: '<?php echo WS_JQGRID."pelaporan.t_bphtb_registration_list_controller/read"; ?>',
            caption: "History Log"

        });

        jQuery('#grid-table').jqGrid('navGrid', '#grid-pager',
            {   //navbar options
                edit: false,
                editicon: 'fa fa-pencil blue bigger-120',
                add: false,
                addicon: 'fa fa-plus-circle purple bigger-120',
                del: false,
                delicon: 'fa fa-trash-o red bigger-120',
                search: false,
                searchicon: 'fa fa-search orange bigger-120',
                refresh: false,
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
    
    function PopupCenter(id){
        alert(id);
    }

    $('.datepicker').datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true
    });

</script>