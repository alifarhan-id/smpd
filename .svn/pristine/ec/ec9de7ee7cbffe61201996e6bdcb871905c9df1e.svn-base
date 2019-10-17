<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Piutang SKPDKB Tambahan</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->

<div class="space-4"></div>
<div class="row">
    <div class="col-md-1">Filter :</div>
    <div class="col-md-3">
        <select name="status_bayar" id="status_bayar" class="form-control">
            <option value="all">Semua</option>
            <option value="belum_bayar" selected>Belum Bayar</option>
            <option value="sudah_bayar">Sudah Bayar</option>
        </select>
    </div>
</div>


<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <table id="grid-table"></table>
        <div id="grid-pager"></div>
    </div>
</div>


<script>
    $('#status_bayar').change(function() {

        $("#grid-table").jqGrid('setGridParam', {
            url: '<?php echo WS_JQGRID."transaksi.t_piutang_skpdkb_tambahan_controller/read"; ?>',
            postData: {status_bayar: $(this).val()}
        });
        $("#grid-table").trigger("reloadGrid");
    });
</script>

<script>

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_piutang_skpdkb_tambahan_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_vat_setllement_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID CUST', name: 't_customer_order_id',  width: 5, sorttype: 'number', hidden: true},
				{label: 'receipt no',name: 'receipt_no', hidden: true ,width: 20, align: "left"},
				{label: 'Status Bayar',width: 163,align: "center",
                    formatter:function(cellvalue, options, rowObject) {
                        var receipt_no = rowObject['receipt_no'];
                        if(receipt_no == '' || receipt_no == null) return '<span class="red"><strong>Belum Bayar</strong></span>';
						return '<span class="green"><strong>Sudah Bayar</strong></span>';
                    }
                },
                {label: 'Merk Dagang',name: 'company_brand_name',width: 250, align: "left"},
                {label: 'NPWPD',name: 'npwd',width: 170, align: "left"},
                {label: 'Periode',name: 'code',width: 200, align: "left"},
                {label: 'No. Kohir',name: 'no_kohir',width: 200, align: "left",editable: false},
                {label: 'No. Bayar',name: 'payment_key',width: 200, align: "left",editable: false},
                {label: 'Total Transaksi',name: 'total_trans_amount',width: 200, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:'.'}},
                {label: 'Total Pajak',name:'total_vat_amount',width: 200, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:'.'}},
                {name: 'Options',width: 200, align: "center",
                    formatter:function(cellvalue, options, rowObject) {
                        var val = rowObject['t_customer_order_id'];
                        var url = '<?php echo base_url(); ?>'+'cetak_formulir_skpdkb_tambahan/pageCetak?t_vat_setllement_id='+rowObject['t_vat_setllement_id'];
                        return '<a class="btn btn-danger btn-xs" href="#" onclick="PopupCenter(\''+url+'\',\'SKPDKB Tambahan\',500,500);"><i class="fa fa-print"></i>Print</a>';

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
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '<?php echo WS_JQGRID."transaksi.t_piutang_skpdkb_tambahan_controller/read"; ?>',
            caption: "Piutang SKPDKB Tambahan"

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

    function print_pdf(t_cust_order_id){
        if(t_cust_order_id == ""){
            swal ( "Oopss" ,  "Kolom Tanggal Tidak Boleh Kosong!" ,  "error" );           
        }else{
            url = '<?php echo base_url(); ?>'+'cetak_formulir_skpdkb_tambahan/pageCetak?t_cust_order_id='+t_cust_order_id;
            openInNewTab(url);

        }


        
    }

    function openInNewTab(url) {
        // window.open("../report/cetak_rep_lap_harian_bdhr.php?tgl_penerimaan='" + tgl_penerimaan + "'&kabid=T"+ "&kode_bank="+kode_bank, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
        window.open(url, 'No Payment', 'left=0,top=0,width=500,height=500,toolbar=no,scrollbars=yes,resizable=yes');
      // win.focus();
    }

</script>