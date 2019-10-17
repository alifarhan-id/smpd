<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>LAPORAN PEMBAYARAN WP BEDASARKAN CARA BAYAR DAN JENIS KETETAPAN</span>
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
                    <span class="caption-subject font-blue bold uppercase"> LAPORAN PEMBAYARAN WP BEDASARKAN CARA BAYAR DAN JENIS KETETAPAN
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">Jenis Ketetapan
                        </label>
                        <div class="col-md-3">
                           <div id="comboJenisKetetapan"></div>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" class="form-control required" name="p_settlement_type_id" id="p_settlement_type_id">
                        </div>
                    </div>
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
                        <label class="control-label col-md-2">Periode Awal Tap
                        </label>
                        <div class="col-md-3">
                            <input class="form-control datepicker required" type="text" value=""
                                   id="date_start_laporan" name="date_start_laporan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Periode Akhir Tap
                        </label>
                        <div class="col-md-3">
                            <input class="form-control datepicker required" type="text" value=""
                                   id="date_end_laporan" name="date_end_laporan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Cara Bayar
                        </label>
                        <div class="col-md-3">
                           <div id="comboCaraBayar"></div>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" class="form-control required" name="p_payment_type_id" id="p_payment_type_id">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-5">
                            <button class="btn btn-danger" id="cetak">Tampilkan</button>
                            <button class="btn btn-danger" id="cetakExcel">Tampilkan Excel</button>
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
<!--- lov -->
<script>
    $("#btn-lov-jenis-pajak").on('click', function() {   
        modal_lov_vat_show('p_vat_type_id','vat_code');
    });

    /*$('#p_vat_type_id').on('change', function() {
        $('#p_vat_type_id').val('');
        $('#vat_code').val('');
    });*/
</script>
<script>

    $.ajax({
            url: "<?php echo base_url().'Laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan/comboBoxJenisKetetapan/'; ?>" ,
            type: "POST",            
            data: {},
            success: function (data) {
                $( "#comboJenisKetetapan" ).html( data );
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
    });

    $.ajax({
            url: "<?php echo base_url().'Laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan/comboBoxCaraBayar/'; ?>" ,
            type: "POST",            
            data: {},
            success: function (data) {
                $( "#comboCaraBayar" ).html( data );
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
    });

    $('#gview_grid-table').hide();
    jQuery(function ($) {
            var grid_selector = "#grid-table";
            var pager_selector = "#grid-pager";

            jQuery("#grid-table").jqGrid({
                url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan_controller/read"; ?>',
                datatype: "json",
                mtype: "POST",
                colModel: [
                    {label: 'JENIS PAJAK',name: 'jenis_pajak',width: 150,sorttype: 'text'},
                    {label: 'AYAT PAJAK',name: 'ayat_pajak',width: 150,sorttype: 'text'},
                    {label: 'NAMA',name: 'wp_name',width: 250,sorttype: 'text'},
                    {label: 'NPWPD',name: 'npwpd', width: 120,sorttype: 'text'},
                    {label: 'MASA PAJAK',name: 'masa_pajak',width: 150,sorttype: 'text'},
                    {label: 'TGL TAP',name: 'tgl_tap',width: 100,sorttype: 'text'},
                    {label: 'TOTAL PEMBAYARAN',name: 'total_bayar', width: 170, align: "right",summaryTpl:"Jumlah: {0}",summaryType: 'sum',formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}
                    },
                    {label: 'STATUS BAYAR',width: 150,sorttype: 'text',
                        formatter:function(cellvalue, options, rowObject) {
                            var payment_date = rowObject['payment_date'];
                            var status = '';
                            if(payment_date == ''){
                                status = 'Belum Bayar'; 
                            }else{
                                status = 'Sudah Bayar';
                            }
                            
                            return '<div>'+status+'</div>';

                        }},
                    {label: 'CARA BAYAR',name: 'p_payment_type_code',width: 100,sorttype: 'text'},
                    {label: 'TANGGAL BAYAR',name: 'payment_date',width: 150,sorttype: 'text'},
                    {label: 'BESARNYA',name: 'payment_amount',width: 150, align: "right",summaryTpl:"Jumlah: ",
                        summaryType: 'sum' ,formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}
                    },
                    {label: 'SISA',name: 'sisa',width: 150, align: "right",summaryTpl:"Jumlah: {0}",summaryType: 'sum',formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}
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

                    var colSum1 = $grid.jqGrid('getCol', 'total_bayar', false, 'sum');
                    var colSum2 = $grid.jqGrid('getCol', 'payment_amount', false, 'sum');
                    var colSum3 = $grid.jqGrid('getCol', 'sisa', false, 'sum');

                    $grid.jqGrid('footerData', 'set', { tgl_tap : 'JUMLAH  ', 'total_bayar' : colSum1 , 'payment_amount': colSum2 , 'sisa' : colSum3 });
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
        //var p_vat_type_id = $('#p_vat_type_id').val();
        //var p_settlement_type_id = $('#p_settlement_type_id').val();
        var date_start_laporan = $('#date_start_laporan').val();
        var date_end_laporan = $('#date_end_laporan').val();
        if(date_start_laporan == "" || date_end_laporan == ""){            
            swal ( "Oopss" ,  "Kolom Tanggal Tidak Boleh Kosong!" ,  "error" );
        }else{
            if (date_end_laporan < date_start_laporan){
                swal ( "Oopss" ,  "Tanggal akhir harus lebih besar dari tanggal awal !" ,  "error" );
                return;
            }else{
                $('#gview_grid-table').show();
                jQuery(function($) {
                    var grid_selector = "#grid-table";

                    jQuery("#grid-table").jqGrid('setGridParam',{
                        url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan_controller/read"; ?>',
                        postData:{p_vat_type_id : $('#p_vat_type_id').val(),
                                  p_settlement_type_id : $('#p_settlement_type_id').val(),
                                  date_start_laporan : $('#date_start_laporan').val(),
                                  date_end_laporan : $('#date_end_laporan').val(),
                                  p_payment_type_id : $('#p_payment_type_id').val()}
                    });
                    $("#grid-table").jqGrid("setCaption", "LAPORAN PEMBAYARAN (PERIODE PENETAPAN : "+date_start_laporan+" s.d "+date_end_laporan+")");
                    $("#grid-table").trigger("reloadGrid");
                });
            }
        }
        //$("#grid-table").trigger("reloadGrid");

    //}
    });

    $('#cetakExcel').on('click', function() {
    
        var date_start_laporan      = $('#date_start_laporan').val();
        var date_end_laporan        = $('#date_end_laporan').val();
        var p_vat_type_id           = $('#p_vat_type_id').val();
        var p_payment_type_id       = $('#p_payment_type_id').val();
        var p_settlement_type_id    = $('#p_settlement_type_id').val();
        if(date_start_laporan == "" || date_end_laporan == ""){            
            swal ( "Oopss" ,  "Kolom Tanggal Tidak Boleh Kosong!" ,  "error" );
        }else{
            if (date_end_laporan < date_start_laporan){
                swal ( "Oopss" ,  "Tanggal akhir harus lebih besar dari tanggal awal ! " ,  "error" );
                return;
            }else{
                var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_pembayaran_berdasarkan_cara_bayar_dan_ketetapan_controller/excel/?"; ?>";
                url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
                url += "&date_start_laporan=" + date_start_laporan;
                url += "&date_end_laporan=" + date_end_laporan;
                url += "&p_vat_type_id=" + p_vat_type_id;
                url += "&p_payment_type_id=" + p_payment_type_id;
                url += "&p_settlement_type_id=" + p_settlement_type_id;
                //alert(url);
                window.location = url;
            }
        }
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