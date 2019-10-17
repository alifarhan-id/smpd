<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Sistem Manajemen Pajak Daerah</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <?php $this->load->view('template/scripts');?>
        <?php $this->load->view('template/styles');?>
        <!-- for electron.io shakes -->
        <script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
    </head>

   <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md page-header-fixed page-sidebar-fixed" style="background-color: #64D76B !important;">
<!-- breadcrumb -->
<!-- end breadcrumb -->

<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">

        <div class="tab-content no-border">
            <!-- <div class="row">
                <div class="col-xs-12">
                   <table id="grid-table"></table>
                   <div id="grid-pager"></div>
                </div>
            </div> -->
            <div style="text-align: center;"><img src="<?php echo base_url(); ?>assets/image/logo-2.png" width="50px" height="" alt=""></div>
            <div style="text-align: center; color: #ffffff; font-weight: bold; font-size: 20px;">PEMERINTAH KABUPATEN LOMBOK UTARA</div>
            <div style="text-align: center; color: #ffffff; font-weight: bold; font-size: 20px;">BADAN PENDAPATAN DAERAH</div>
            <hr>

            <div class="tab-content no-border">
            <div class="row">
                <div class="col-xs-12">
                   <table id="grid-table-hotel"></table>
                   <div id="grid-pager-hotel"></div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12">
                   <table id="grid-table-restoran"></table>
                   <div id="grid-pager-restoran"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                   <table id="grid-table-hiburan"></table>
                   <div id="grid-pager-hiburan"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                   <table id="grid-table-parkir"></table>
                   <div id="grid-pager-parkir"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                   <table id="grid-table-ppj"></table>
                   <div id="grid-pager-ppj"></div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


<script>
    //hotel
    jQuery(function($) {
        var grid_selector = "#grid-table-hotel";
        var pager_selector = "#grid-pager-hotel";

        jQuery("#grid-table-hotel").jqGrid({
            url: '<?php echo WS_JQGRID."pelaporan.t_target_realisasi_controller/readPerBulan"; ?>',
            postData: { 
                p_year_period_id : <?php echo $this->input->post('p_year_period_id'); ?>,
                p_vat_group_id : <?php echo $this->input->post('p_vat_group_id'); ?>,
                p_vat_type_id : 1},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Tahun', name: 'p_year_period_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID Bulan', name: 'p_finance_period_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID Type', name: 'p_vat_type_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Bulan',name: 'bulan',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Target',name: 'target_amount',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Pokok',name: 'realisasi_amt',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Denda Pokok',name: 'denda_pokok',width: 200, align: "right",editable: true, formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Denda Piutang',name: 'denda_piutang',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Piutang',name: 'debt_amt',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Total',name: 'total',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Persentase',name: 'persentase',width: 150, align: "right",editable: true,
                    editoptions: {
                        rows: 2,
                        cols:50
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
            shrinkToFit: true,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            sortorder:'',
            pager: '#grid-pager-hotel',
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
            //memanggil controller jqgrid yang ada di controller readPerBidang
            editurl: '<?php echo WS_JQGRID."pelaporan.t_target_realisasi_controller/readPerBulan"; ?>',
            caption: "Daftar Target VS Realisasi Pajak Hotel"

        });

        jQuery('#grid-table-hotel').jqGrid('navGrid', '#grid-pager-hotel',
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
                editData : {
                    p_year_period_id: function() {
                        return <?php echo $this->input->post('p_year_period_id'); ?>;
                    },
                    p_vat_group_id: function() {
                        return <?php echo $this->input->post('p_vat_group_id'); ?>;
                    },
                    p_vat_type_id: function() {
                        return 1;
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

    //restoran
    jQuery(function($) {
        var grid_selector = "#grid-table-restoran";
        var pager_selector = "#grid-pager-restoran";

        jQuery("#grid-table-restoran").jqGrid({
            url: '<?php echo WS_JQGRID."pelaporan.t_target_realisasi_controller/readPerBulan"; ?>',
            postData: { 
                p_year_period_id : <?php echo $this->input->post('p_year_period_id'); ?>,
                p_vat_group_id : <?php echo $this->input->post('p_vat_group_id'); ?>,
                p_vat_type_id : 2},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Tahun', name: 'p_year_period_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID Bulan', name: 'p_finance_period_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID Type', name: 'p_vat_type_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Bulan',name: 'bulan',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Target',name: 'target_amount',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Pokok',name: 'realisasi_amt',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Denda Pokok',name: 'denda_pokok',width: 200, align: "right",editable: true, formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Denda Piutang',name: 'denda_piutang',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Piutang',name: 'debt_amt',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Total',name: 'total',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Persentase',name: 'persentase',width: 150, align: "right",editable: true,
                    editoptions: {
                        rows: 2,
                        cols:50
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
            shrinkToFit: true,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            sortorder:'',
            pager: '#grid-pager-restoran',
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
            //memanggil controller jqgrid yang ada di controller readPerBidang
            editurl: '<?php echo WS_JQGRID."pelaporan.t_target_realisasi_controller/readPerBulan"; ?>',
            caption: "Daftar Target VS Realisasi Pajak Restoran"

        });

        jQuery('#grid-table-restoran').jqGrid('navGrid', '#grid-pager-restoran',
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
                editData : {
                    p_year_period_id: function() {
                        return <?php echo $this->input->post('p_year_period_id'); ?>;
                    },
                    p_vat_group_id: function() {
                        return <?php echo $this->input->post('p_vat_group_id'); ?>;
                    },
                    p_vat_type_id: function() {
                        return 2;
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

    //hiburan
    jQuery(function($) {
        var grid_selector = "#grid-table-hiburan";
        var pager_selector = "#grid-pager-hiburan";

        jQuery("#grid-table-hiburan").jqGrid({
            url: '<?php echo WS_JQGRID."pelaporan.t_target_realisasi_controller/readPerBulan"; ?>',
            postData: { 
                p_year_period_id : <?php echo $this->input->post('p_year_period_id'); ?>,
                p_vat_group_id : <?php echo $this->input->post('p_vat_group_id'); ?>,
                p_vat_type_id : 3},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Tahun', name: 'p_year_period_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID Bulan', name: 'p_finance_period_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID Type', name: 'p_vat_type_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Bulan',name: 'bulan',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Target',name: 'target_amount',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Pokok',name: 'realisasi_amt',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Denda Pokok',name: 'denda_pokok',width: 200, align: "right",editable: true, formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Denda Piutang',name: 'denda_piutang',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Piutang',name: 'debt_amt',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Total',name: 'total',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Persentase',name: 'persentase',width: 150, align: "right",editable: true,
                    editoptions: {
                        rows: 2,
                        cols:50
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
            shrinkToFit: true,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            sortorder:'',
            pager: '#grid-pager-hiburan',
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
            //memanggil controller jqgrid yang ada di controller readPerBidang
            editurl: '<?php echo WS_JQGRID."pelaporan.t_target_realisasi_controller/readPerBulan"; ?>',
            caption: "Daftar Target VS Realisasi Pajak Hiburan"

        });

        jQuery('#grid-table-hiburan').jqGrid('navGrid', '#grid-pager-hiburan',
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
                editData : {
                    p_year_period_id: function() {
                        return <?php echo $this->input->post('p_year_period_id'); ?>;
                    },
                    p_vat_group_id: function() {
                        return <?php echo $this->input->post('p_vat_group_id'); ?>;
                    },
                    p_vat_type_id: function() {
                        return 3;
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

    //parkir
    jQuery(function($) {
        var grid_selector = "#grid-table-parkir";
        var pager_selector = "#grid-pager-parkir";

        jQuery("#grid-table-parkir").jqGrid({
            url: '<?php echo WS_JQGRID."pelaporan.t_target_realisasi_controller/readPerBulan"; ?>',
            postData: { 
                p_year_period_id : <?php echo $this->input->post('p_year_period_id'); ?>,
                p_vat_group_id : <?php echo $this->input->post('p_vat_group_id'); ?>,
                p_vat_type_id : 4},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Tahun', name: 'p_year_period_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID Bulan', name: 'p_finance_period_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID Type', name: 'p_vat_type_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Bulan',name: 'bulan',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Target',name: 'target_amount',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Pokok',name: 'realisasi_amt',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Denda Pokok',name: 'denda_pokok',width: 200, align: "right",editable: true, formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Denda Piutang',name: 'denda_piutang',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Piutang',name: 'debt_amt',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Total',name: 'total',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Persentase',name: 'persentase',width: 150, align: "right",editable: true,
                    editoptions: {
                        rows: 2,
                        cols:50
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
            //memanggil controller jqgrid yang ada di controller readPerBidang
            editurl: '<?php echo WS_JQGRID."pelaporan.t_target_realisasi_controller/readPerBulan"; ?>',
            caption: "Daftar Target VS Realisasi Pajak Parkir"

        });

        jQuery('#grid-table-parkir').jqGrid('navGrid', '#grid-pager',
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
                editData : {
                    p_year_period_id: function() {
                        return <?php echo $this->input->post('p_year_period_id'); ?>;
                    },
                    p_vat_group_id: function() {
                        return <?php echo $this->input->post('p_vat_group_id'); ?>;
                    },
                    p_vat_type_id: function() {
                        return 4;
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

    //ppj
    jQuery(function($) {
        var grid_selector = "#grid-table-ppj";
        var pager_selector = "#grid-pager-ppj";

        jQuery("#grid-table-ppj").jqGrid({
            url: '<?php echo WS_JQGRID."pelaporan.t_target_realisasi_controller/readPerBulan"; ?>',
            postData: { 
                p_year_period_id : <?php echo $this->input->post('p_year_period_id'); ?>,
                p_vat_group_id : <?php echo $this->input->post('p_vat_group_id'); ?>,
                p_vat_type_id : 5},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Tahun', name: 'p_year_period_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID Bulan', name: 'p_finance_period_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID Type', name: 'p_vat_type_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Bulan',name: 'bulan',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Target',name: 'target_amount',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Pokok',name: 'realisasi_amt',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Denda Pokok',name: 'denda_pokok',width: 200, align: "right",editable: true, formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Denda Piutang',name: 'denda_piutang',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Piutang',name: 'debt_amt',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Total',name: 'total',width: 200, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Persentase',name: 'persentase',width: 150, align: "right",editable: true,
                    editoptions: {
                        rows: 2,
                        cols:50
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
            //memanggil controller jqgrid yang ada di controller readPerBidang
            editurl: '<?php echo WS_JQGRID."pelaporan.t_target_realisasi_controller/readPerBulan"; ?>',
            caption: "Daftar Target VS Realisasi PPJ"

        });

        jQuery('#grid-table-ppj').jqGrid('navGrid', '#grid-pager',
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
                editData : {
                    p_year_period_id: function() {
                        return <?php echo $this->input->post('p_year_period_id'); ?>;
                    },
                    p_vat_group_id: function() {
                        return <?php echo $this->input->post('p_vat_group_id'); ?>;
                    },
                    p_vat_type_id: function() {
                        return 5;
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

</body>
</html>