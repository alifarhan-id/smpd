<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Master Ubah Register</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <label class="control-label col-md-4">Nama WP/ NPWD / No Kohir / No.Pembayaran :</label>
    <div class="col-md-3">   
        <div class="input-group">
            <div class="input-group">
            <input id="s_keyword" type="text" class="FormElement form-control">
            <span class="input-group-btn">
                <button class="btn btn-success" type="button" id="btn-search" onclick="showData()">Cari</button>
            </span>
            </div>            
        </div>
    </div>
</div>


<div class="space-2"></div>

<div class="tab-content no-border">
    <div class="row" id="tabel_id">
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

<script type="text/javascript">

    var s_keyword = $('#s_keyword').val();
    if (s_keyword == "" || s_keyword == 0 || s_keyword == false || s_keyword == undefined ||  s_keyword == null){
        $ ("#tabel_id").hide();
    }else{
        $ ("#tabel_id").show();
    }
    
</script>
 
<?php $this->load->view('lov/lov_ubah_register'); ?> 

<script>

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_vat_setllement_ro_modifikasi_ubah_register_controller/read"; ?>',
            postData: { s_keyword : $('#s_keyword').val()},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_vat_setllement_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID CUST', name: 't_customer_order_id',  width: 5, sorttype: 'number', hidden: true},
                {label: 'Nama Wajib Pajak',name: 'wp_name',width: 200, align: "left"},
                {label: 'NPWPD',name: 'npwd',width: 110, align: "left"},
                {label: 'Periode',name: 'finance_period_code',width: 150, align: "left"},
                {label: 'Jenis Ketetapan',name: 'sett_code',width: 120, align: "left",editable: false},
                {label: 'Total Transaksi',name: 'total_trans_amount',width: 120, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:'.'}},
                {label: 'Total Pajak',name:'total_vat_amount',width: 120, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:'.'}},
                {label: 'Denda',name:'total_penalty_amount',width: 120, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:'.'}},
                {label: 'No. Kohir',name: 'no_kohir',width: 100, align: "left",editable: false},
                {label: 'No. Bayar',name: 'payment_key',width: 100, align: "left",editable: false},
                {name: 'Ubah Data',width: 150, align: "center",
                    formatter:function(cellvalue, options, rowObject) {
                        var val = rowObject['t_vat_setllement_id'];
                        return '<a class="btn btn-danger btn-xs" href="#" onclick="showLOVUbahData('+val+')"><i class="fa fa-pencil"></i>Ubah Register</a>';

                    }
                }
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 7,
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

            },
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '<?php echo WS_JQGRID."transaksi.t_piutang_skpdkb_controller/read"; ?>',
            caption: "MASTER UBAH REGISTER"

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

    function showData(){
        var s_keyword = $('#s_keyword').val();

        if (s_keyword==''){
            swal('Informasi','Masukan Nama WP/ NPWD / No Kohir / No.Pembayaran','info');
            $ ("#tabel_id").hide();
            return;
        }else{
            $("#tabel_id").show();
        }

        jQuery(function($) {
            var grid_selector = "#grid-table-history";
            jQuery("#grid-table").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."transaksi.t_vat_setllement_ro_modifikasi_ubah_register_controller/read"; ?>',
                postData: { s_keyword : $('#s_keyword').val()}
            });
            $("#grid-table").trigger("reloadGrid");
        });
    }

</script>
<script>
    function showLOVUbahData(id) {
        modal_ubah_register_show(id);
    }
</script>