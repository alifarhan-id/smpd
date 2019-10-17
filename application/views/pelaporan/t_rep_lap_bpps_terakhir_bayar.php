<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>LAPORAN TERAKHIR BAYAR PER JENIS PAJAK</span>
        </li>
    </ul> 
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-2">Jenis Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group">
                            <input id="form_vat_type_id" type="text"  style="display:none;">
                            <input id="form_vat_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Jenis Pajak">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVVatType('form_vat_type_id','form_vat_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                            </div>            
                        </div>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="row col-md-offset-2">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showData()">Tampilkan Data</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<div class="tab-content no-border">
    <div class="row">
        <div class="col-xs-12">
            <div id="gbox_grid-table" class="ui-jqgrid">
                <div id="gview_grid-table-history" class="ui-jqgrid-view table-responsive" role="grid">
                    <table id="grid-table-history"></table>    
                    <div id="grid-pager-history"></div>           
                </div>
            </div>            
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div id="tbl-bayar"></div>
        </div>
    </div>
</div>

<?php $this->load->view('lov/lov_vat_type'); ?> 

<script type="text/javascript">
    $('#gview_grid-table-history').hide();
    
        jQuery(function ($) {
            var grid_selector = "#grid-table-history";
            jQuery("#grid-table-history").jqGrid({
                url: '<?php echo WS_JQGRID . "pelaporan.t_rep_lap_bpps_terakhir_bayar_controller/readData"; ?>',
                datatype: "json",
                postData:{p_vat_type_id : $('#form_vat_type_id').val()},
                mtype: "POST",
                colModel: [
                    {label: 'No. Ayat',name: 'no_ayat',width: 200, align: "left"},
                    {label: 'No. Kohir',name: 'no_kohir',width: 300, align: "left"},
                    {label: 'Nama Wajib Pajak',name: 'wp_name',width: 300, align: "left"},
                    {label: 'NPWPD',name: 'npwpd',width: 200, align: "center"},
                    {label: 'Alamat',name: 'address',width: 300, align: "left"},
                    {label: 'Pembayaran Terakhir',name: 'jumlah_terima',width: 200, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                    {label: 'Tanggal Bayar Terakhir',name: 'payment_date',width: 200, align: "left"},
                    {label: 'Masa Pajak',name: 'masa_pajak',width: 200, align: "center"}
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
                caption: "LAPORAN TERAKHIR BAYAR PER JENIS PAJAK"

            });

            jQuery('#grid-table-history').jqGrid('navGrid', '#grid-pager-history',
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

    function showData(){
        $('#gview_grid-table-history').show();

        jQuery(function($) {
        var grid_selector = "#grid-table-history";
        //var pager_selector = "#grid-pager-bpps2";

            jQuery("#grid-table-history").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID . "pelaporan.t_rep_lap_bpps_terakhir_bayar_controller/readData"; ?>',
                postData: {
                            p_vat_type_id : $('#form_vat_type_id').val()
                        }

            });
            $("#grid-table-history").trigger("reloadGrid");
        });

    }
    
</script>


<script type="text/javascript">
    function showData1(){
        var p_vat_type_id = $('#form_vat_type_id').val();
        var url = '<?php echo WS_JQGRID . "pelaporan.t_rep_lap_bpps_terakhir_bayar_controller/readHTML?"; ?>';
        url += "p_vat_type_id="+p_vat_type_id;
        
        $.getJSON(url, function( items ) {
            document.getElementById('tbl-bayar').innerHTML = items.rows ;
        })
    }
</script>

<script>
function responsive_jqgrid(grid_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid('setGridWidth', $(".form-body").width());
        //$(pager_selector).jqGrid('setGridWidth', parent_column.width());

    }

function showLOVVatType(id, code) {
    modal_lov_vat_show(id, code);
}
</script>
