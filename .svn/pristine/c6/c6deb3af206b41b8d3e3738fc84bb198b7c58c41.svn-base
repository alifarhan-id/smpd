<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Data Master Wajib Pajak</span>
        </li>
    </ul> 
</div>

<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs">  
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                        <i class="blue"></i>
                        <strong> Customer  </strong>
                    </a>
                </li>              
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong> Customer Account </strong>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong> History Log & Transaksi  </strong>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-xs-12">
                    <div id="gbox_grid-table" class="ui-jqgrid">
                        <div id="gview_grid-table" class="ui-jqgrid-view table-responsive" role="grid">
                            <input type="hidden" name="t_customer_id" id="t_customer_id">
                            <input type="hidden" name="t_cust_account_id" id="t_cust_account_id">
                            <input type="hidden" name="t_vat_setllement_id" id="t_vat_setllement_id">
                            <table id="grid-table-trans"></table>
                            <div id="grid-pager"></div>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('lov/lov_v_cust_acc_dtl_trans'); ?>
<script type="text/javascript">
    $('#t_customer_id').val("<?php echo $_POST['t_customer_id'] ?>");
    $('#t_cust_account_id').val("<?php echo $_POST['t_cust_account_id'] ?>");

    $("#tab-2").on("click", function(event) {
        event.stopPropagation();
        /*t_customer_id = $("#t_customer_id").val();
        t_cust_account_id = $("#t_cust_account_id").val();
        //alert(t_customer_id+ " " +t_cust_account_id);*/
        loadContentWithParams("data_master.t_cust_account", { //model yang ketiga
            t_cust_account_id: $('#t_cust_account_id').val(),
            t_customer_id: $('#t_customer_id').val(), 
            
        });
    });

    $("#tab-1").on("click", function(event) {
        event.stopPropagation();
        loadContentWithParams("data_master.t_customer",{
        t_customer_id: $('#t_customer_id').val(),
    });

    //alert("t_customer_id = "+$('#t_customer_id').val());
    });
</script>



<script type="text/javascript">
    
    jQuery(function ($) {
        var grid_selector = "#grid-table-trans";
        var pager_selector = "#grid-pager";
        jQuery("#grid-table-trans").jqGrid({
            url: '<?php echo WS_JQGRID . "data_master.t_trans_histories_controller/read"; ?>',
            postData: { t_cust_account_id : <?php echo $this->input->post('t_cust_account_id'); ?>, t_customer_id : <?php echo $this->input->post('t_customer_id'); ?>},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Customer', name: 't_customer_id',width: 5, sorttype: 'number',hidden: true},
                {label: 'ID Cust Account', name: 't_cust_account_id',width: 5, sorttype: 'number',hidden: true},
                {label: 'ID Vat Setllement', name: 't_vat_setllement_id',width: 5, sorttype: 'number',hidden: true},
                {label: 'NPWPD',name: 'npwd',width: 120, align: "left"},
                {label: 'Nama Badan',name: 'company_name',width: 150, align: "left"},
                {label: 'Jenis Ketetapan',name: 'type_code',width: 150, align: "left"},
                {label: 'Ayat Pajak',name: 'vat_code',width: 250, align: "left"},
                {label: 'Periode Pelaporan',name: 'periode_pelaporan',width: 180, align: "left"},
                {label: 'Periode Transaksi',name: 'periode_transaksi',width: 250, align: "left"},
                {label: 'Tgl. Pelaporan',name: 'tgl_pelaporan',width: 180, align: "left"},
                {label: 'Tgl. Jatuh tempo',name: 'jatuh_tempo',width: 150,align: "left"},
                {label: 'No Kohir',name: 'no_kohir',width: 150, align: "left"},
                {label: 'Total Transaksi',name: 'total_transaksi',width: 150, formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},align: "right"},
                {label: 'Total Pajak',name: 'total_pajak',width: 150, formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},align: "right"},
                {label: 'Pajak Terhutang',name: 'debt_vat_amt',width: 150, formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},align: "right"},
                {label: '25%',name: 'kenaikan',width: 150, formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},align: "right"},
                {label: '20%',name: 'kenaikan1',width: 150, formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},align: "right"},
                {label: 'Total Denda',name: 'total_denda',width: 150, formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},align: "right"},
                {label: 'Total Harus Bayar',name: 'total_hrs_bayar',width: 150, formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},align: "right"},
                {name: 'Pilihan',width: 200, align: "center",
                    formatter:function(cellvalue, options, rowObject) {

                        var t_vat_setllement_id = rowObject['t_vat_setllement_id'];
                        var t_cust_account_id = rowObject['t_cust_account_id'];
                        //<?php //$this->load->view('v_cust_acc_dtl_trans'); ?>
                        //var url = '<?php //$this->load->view('v_cust_acc_dtl_trans'); ?>';*/
                        
                        return '<a href="#" onclick="show_v_cust_acc_dtl_trans('+t_vat_setllement_id+', '+t_cust_account_id+')">Lihat Transaksi</a>';

                    }
                },
                {label: 'No. Kwitansi',name: 'kuitansi_pembayaran',width: 200, align: "left"},
                {label: 'Tgl. Pembayaran',name: 'tgl_pembayaran',width: 200, align: "left"},
                {label: 'Nilai Pembayaran',name: 'payment_amount',width: 150, formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},align: "right"}
            ],
            height: '100%',
            autowidth: false,
            viewrecords: true,
            rowNum: 5,
            rowList: [10, 20, 50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            footerrow: true,
            
            gridComplete: function() {
                
            },
            onSelectRow: function (rowid) {
                /*do something when selected*/
                
                $('#t_vat_setllement_id').val($('#grid-table-trans').jqGrid('getCell', rowid, 't_vat_setllement_id'));


            },
            sortorder:'',
            pager: '#grid-pager',
            jsonReader: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function () {
                setTimeout(function(){
                  $("#grid-table-trans").setSelection($("#grid-table-trans").getDataIDs()[0],true);
                },500);            
               
            },
              
            caption: "HISTORY TRANSAKSI WAJIB PAJAK"
        });

        jQuery('#grid-table-trans').jqGrid('navGrid', '#grid-pager',
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
                editData : {
                    t_cust_account_id: function() {
                        return <?php echo $this->input->post('t_cust_account_id'); ?>;
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

        
        jQuery("#grid-table-trans").jqGrid('setGroupHeaders', {
            useColSpanStyle: true, 
            groupHeaders:[
                {startColumnName: 'kenaikan', numberOfColumns: 2, titleText: 'Sanksi Adm.'},
                {startColumnName: 'type_code', numberOfColumns: 10, titleText: 'Pelaporan Pajak'},
                {startColumnName: 'total_denda', numberOfColumns: 5, titleText: 'Pembayaran'}
            ]
        });
        
    });    
</script>



<script type="text/javascript">    

    function cetak_excel() {
        // alert("Convert to Excel");
        var t_cust_account_id = $('#t_cust_account_id').val();

        var url = "<?php echo WS_JQGRID . "data_master.t_trans_histories_controller/excel/?"; ?>";
         url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&t_cust_account_id="+t_cust_account_id;
        window.location = url;
    }

    



</script>

<script>
    function responsive_jqgrid(grid_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );

    }

    function show_v_cust_acc_dtl_trans(t_vat_setllement_id, t_cust_account_id) {
        modal_v_cust_dtl_show(t_vat_setllement_id,t_cust_account_id);
        
    }
</script>


<div class="space-2"></div>
<div class="row col-md-offset-5">
    <button class="btn btn-danger" type="button" onclick="cetak_excel()" id="excel">Download Excel</button>
</div>
