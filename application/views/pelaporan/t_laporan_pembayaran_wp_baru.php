<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>LAPORAN PEMBAYARAN WP BARU</span>
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
                    <span class="caption-subject font-blue bold uppercase"> LAPORAN PEMBAYARAN WP BARU
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">Jenis Pajak
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="hidden" class="form-control" maxlength="8" name="p_vat_type_id" id="p_vat_type_id" readonly>
                                <input type="text" class="form-control" name="vat_code" id="vat_code" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-jenis-pajak">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Tahun
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="hidden" class="form-control required" maxlength="8" name="p_year_period_id" id="p_year_period_id" readonly>
                                <input type="text" class="form-control required" name="year_code" id="year_code" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-year-period">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Status Pembayaran
                        </label>
                        <div class="col-md-3">
                           <select id= "status_pembayaran" name= "status_pembayaran" class='form-control required'>
                               <option value="1">Sudah Bayar</option>
                               <option value="2">Belum Bayar</option>
                           </select>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-5">
                            <button class="btn btn-danger" id="cetak">Tampilkan</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                     <div class="col-xs-12">
                        <div id="gbox_grid-table" class="ui-jqgrid">
                            <div id="gview_grid-table" class="ui-jqgrid-view table-responsive" role="grid">
                                <table id="grid-table"></table>
                                <div id="grid-pager"></div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('lov/lov_vat_type'); ?>
<?php $this->load->view('lov/lov_year_period'); ?>
<!--- lov -->
<script>
    $("#btn-lov-jenis-pajak").on('click', function() {   
        modal_lov_vat_show('p_vat_type_id','vat_code');
    });

    $("#btn-lov-year-period").on('click', function() {   
        modal_year_period_show('p_year_period_id','year_code');
    });
</script>
<script>

    $('#gview_grid-table').hide();
    jQuery(function ($) {
            var grid_selector = "#grid-table";
            var pager_selector = "#grid-pager";

            jQuery("#grid-table").jqGrid({
                url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_pembayaran_wp_baru_controller/read"; ?>',
                datatype: "json",
                mtype: "POST",
                colModel: [
                    {label: 'TANGGAL PENGUKUHAN',name: 'active_date_short',width: 200,sorttype: 'text'},
                    {label: 'NPWPD',name: 'npwd', width: 120,sorttype: 'text'},
                    {label: 'NAMA WP',name: 'wp_name',width: 280,sorttype: 'text'},
                    {label: 'ALAMAT WP',name: 'wp_address_name',width: 300,sorttype: 'text'},
                    {label: 'NAMA MERK DAGANG',name: 'company_brand',width: 200,sorttype: 'text'},
                    {label: 'ALAMAT MERK DAGANG',name: 'brand_address_name', width: 300,sorttype: 'text'},
                    {label: 'AYAT PAJAK',name : 'vat_code',width: 200,sorttype: 'text'},
                    {label: 'WILAYAH',name: 'kode_wilayah',width: 200,sorttype: 'text'},
                    {label: 'BESARNYA',name: 'payment_amount',width: 150, align: "right",summaryTpl:"Jumlah: ",
                        summaryType: 'sum',formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}
                    }
                ],
                height: '100%',
                autowidth: false,
                viewrecords: true,
                rowNum: -1,
                rowList: [10, 20, 50],
                rownumbers: true, // show row numbers
                rownumWidth: 35, // the width of the row numbers columns
                altRows: true,
                shrinkToFit: false,
                multiboxonly: true,
                footerrow: true,
                gridComplete: function() {
                    var $grid = $('#grid-table');

                    var colSum2 = $grid.jqGrid('getCol', 'payment_amount', false, 'sum');
                    $grid.jqGrid('footerData', 'set', { kode_wilayah : 'JUMLAH ', 'payment_amount': colSum2 });
                },
                loadComplete: function (response) {
                    if(response.success == false) {
                        swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                    }

                },
                caption: "LAPORAN PEMBAYARAN"

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


    $('#cetak').on('click', function() {
    //function showData(){
        //alert('masuk');
        var p_year_period_id = $('#p_year_period_id').val();
        var year_code = $('#year_code').val();
        if(p_year_period_id == "" || year_code == ""){            
            swal ( "Oopss" ,  "Tahun Harus Diisi !" ,  "error" );
        }else{
            $('#gview_grid-table').show();
            jQuery(function($) {
                var grid_selector = "#grid-table";

                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_pembayaran_wp_baru_controller/read"; ?>',
                    postData:{p_vat_type_id : $('#p_vat_type_id').val(),
                              p_year_period_id : $('#p_year_period_id').val(),
                              status_pembayaran : $('#status_pembayaran').val()}
                });
                if($('#status_pembayaran').val() == "1"){
                    $("#grid-table").jqGrid("setCaption", "DAFTAR WP BARU DENGAN STATUS BAYAR : SUDAH PERNAH BAYAR");
                }else{
                    $("#grid-table").jqGrid("setCaption", "DAFTAR WP BARU DENGAN STATUS BAYAR : BELUM PERNAH BAYAR");
                }
                $("#grid-table").trigger("reloadGrid");
            });
        }
        //$("#grid-table").trigger("reloadGrid");

    //}
    });

    
    $('.datepicker').datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true
    });

    function currencyFormat (num) {
        return num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }

</script>