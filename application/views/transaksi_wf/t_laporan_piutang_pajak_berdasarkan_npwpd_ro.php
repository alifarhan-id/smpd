<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>LAPORAN PENCETAKAN HARIAN PENERIMAAN SPTPD</span>
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
                    <span class="caption-subject font-blue bold uppercase"> LAPORAN PENCETAKAN HARIAN PENERIMAAN SPTPD
                    </span>
                </div>
            </div>
                <div class="row">
                     <div class="col-xs-12">
                        <div id="gbox_grid-table" class="ui-jqgrid">
                            <div id="gview_grid-table" role="grid">
                                <table id="grid-table"></table>
                                <div id="grid-pager"></div>
                                <button class="btn btn-danger" type="button" id="btn-kel" onclick="backform()">KEMBALI</button>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function backform(){
        loadContentWithParams("transaksi_wf.t_penutupan_wp_ver_piutang", { 
            npwd: $( "#npwpd" ).val()
        });
    };

    //$('#gview_grid-table').hide();
    jQuery(function ($) {
            var grid_selector = "#grid-table";
            var pager_selector = "#grid-pager";
            var npwd = "<?php echo $_POST['npwd'] ?>";
            //alert(npwd);
            jQuery("#grid-table").jqGrid({
                url: '<?php echo WS_JQGRID . "transaksi_wf.t_penutupan_wp_ver_piutang_controller/readShowPiutang"; ?>',
                datatype: "json",          
                postData: {
                    npwd: npwd
                },
                mtype: "POST",
                colModel: [
                    {label: 'NPWPD',name: 'npwd',width: 120,sorttype: 'text'},
                    {label: 'NAMA WP',name: 'wp_name',width: 200,sorttype: 'text'},
                    {label: 'MASA PAJAK',name: 'periode_bayar',width: 200,sorttype: 'text'},
                    {label: 'TGL TAP',name: 'tgl_tap_formated',width: 120,sorttype: 'text'},
                    {label: 'NO KOHIR',name: 'no_kohir',width: 150,sorttype: 'text'},
                    {label: 'BESARNYA (Rp)',name: 'nilai_piutang',width: 150, align: "right",summaryTpl:"Jumlah: ",
                        summaryType: 'sum',formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}
                    },
                    {label: 'REALISASI PIUTANG (Rp)',name: 'realisasi_piutang',width: 200, align: "right",summaryTpl:"Jumlah: ",
                        summaryType: 'sum',formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}
                    },
                    {label: 'TGL BAYAR',name: 'tgl_bayar',width: 150,sorttype: 'text'},
                    {label: 'SISA PIUTANG (Rp)',name: 'sisa_piutang',width: 150, align: "right",summaryTpl:"Jumlah: ",
                        summaryType: 'sum',formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}
                    },
                    {label: 'KETERANGAN',name: 'keterangan',width: 150,sorttype: 'text'}
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
                footerrow: true,
                gridComplete: function() {
                    var $grid = $('#grid-table');

                    var colSum2 = $grid.jqGrid('getCol', 'payment_amount', false, 'sum');
                    $grid.jqGrid('footerData', 'set', { bulan : 'JUMLAH ', 'payment_amount': colSum2 });
                },
                loadComplete: function (response) {
                    if(response.success == false) {
                        swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                    }

                },
                caption: "  DAFTAR PIUTANG (2002-2012)"

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
    
    jQuery("#grid-table").jqGrid('setGridParam',{
        url: '<?php echo WS_JQGRID."transaksi_wf.t_penutupan_wp_ver_piutang_controller/readShowPiutang"; ?>',
        postData: {npwd: "<?php echo $_POST['npwd'] ?>"}
    });
    $("#grid-table").jqGrid("setCaption", " DAFTAR PIUTANG (2002-2012)");
    $("#grid-table").trigger("reloadGrid");

    function currencyFormat (num) {
        return num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }

</script>