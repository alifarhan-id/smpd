<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Penutupan Wajib Pajak</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <input type="hidden" name="t_customer_id" id="t_customer_id">
        <input type="hidden" name="t_cust_account_id" id="t_cust_account_id">
        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-12">
                    <table id="grid-table"></table>
                    <div id="grid-pager"></div>
                </div>
            </div>
            <div class="space-4"></div>  
            
        </div>
    </div>
</div>



<script>
    
    
</script>

<script>

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_penutupan_wp_controller/read"; ?>',
            //postData: { t_customer_id : $('#t_customer_id').val() },
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_customer_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID Cust', name: 't_cust_acc_status_modif_id', key: true, width: 5, sorttype: 'number', editable: false, hidden: true},
                
                {label: 'Nomor Order',name: 'order_no',width: 150, align: "left",editable: false},
                

                {label: 'Nomor Dokumen',name: 'no_dokumen',width: 200, align: "left",editable: false},

                {label: 'Nama WP',name: 'wp_name',width: 200, align: "left",editable: false},

                {label: 'NPWPD',name: 'npwd',width: 200, align: "left",editable: false},

                {label: 'Alasan Penutupan',name: 'reason_code',width: 200, align: "left",editable: false},

                {label: 'Tgl. Permintaan',name: 'status_request_date',width: 200, align: "left",editable: false},

                {label: 'Status yang Diinginkan',name: 'p_account_status_mut',width: 200, align: "left",editable: false},
                {label: 'Keterangan',name: 'reason_description',width: 200, align: "left",editable: false, hidden:true},
                {label: 'Jenis Pajak',name: 'p_vat_type_code',width: 200, align: "left",editable: false, hidden:true},
                {label: 'Alamat',name: 'wp_address_name',width: 200, align: "left",editable: false, hidden:true},
                {label: 'Merk Dagang',name: 'company_brand',width: 200, align: "left",editable: false, hidden:true}
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 5,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/
                //alert(rowid);
                setDaftar_customer(rowid);

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
            caption: "Daftar Customer"

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
                
                editData : {
                    t_customer_id: function() {
                        return <?php echo $this->input->post('t_customer_id'); ?>;
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

    function setDaftar_customer(rowid){
        var order_no = $('#grid-table').jqGrid('getCell', rowid, 'order_no');
        var no_dokumen = $('#grid-table').jqGrid('getCell', rowid, 'no_dokumen');
        var wp_name = $('#grid-table').jqGrid('getCell', rowid, 'wp_name');
        var npwd = $('#grid-table').jqGrid('getCell', rowid, 'npwd');
        var wp_address_name = $('#grid-table').jqGrid('getCell', rowid, 'wp_address_name');
        var p_vat_type_code = $('#grid-table').jqGrid('getCell', rowid, 'p_vat_type_code');
        var company_brand = $('#grid-table').jqGrid('getCell', rowid, 'company_brand');
        var reason_description = $('#grid-table').jqGrid('getCell', rowid, 'reason_description');
        var p_vat_type_code = $('#grid-table').jqGrid('getCell', rowid, 'p_vat_type_code');
        var kelurahan = $('#grid-table').jqGrid('getCell', rowid, 'kelurahan');
        var kecamatan = $('#grid-table').jqGrid('getCell', rowid, 'kecamatan');
        var phone_no_owner = $('#grid-table').jqGrid('getCell', rowid, 'phone_no_owner');
        var fax_no_owner = $('#grid-table').jqGrid('getCell', rowid, 'fax_no_owner');
        var mobile_no_owner = $('#grid-table').jqGrid('getCell', rowid, 'mobile_no_owner');
        var email_address = $('#grid-table').jqGrid('getCell', rowid, 'email_address');
        var zip_code_owner = $('#grid-table').jqGrid('getCell', rowid, 'zip_code_owner');

        $('#order_no').val(order_no);
        $('#no_dokumen').val(no_dokumen);
        $('#wp_name').val(wp_name);
        $('#p_vat_type_code').val(p_vat_type_code);
        $('#npwpd').val(npwd);
        $('#wp_address_name').val(wp_address_name);
        $('#p_vat_type_code').val(p_vat_type_code);
        $('#company_brand').val(company_brand);
        $('#reason_description').val(reason_description);

    }

</script>
<br>
<label class="control-label col-md-2"><b>Daftar Customer</b></label>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-3">Nomor Order</label>                
                        <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="order_no" id="order_no" readonly="true">                 
                        </div>
                    
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nomor Dokumen</label>
                        <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="no_dokumen" id="no_dokumen" readonly="true">                 
                        </div>                 
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nama Wajib Pajak</label>
                    <div class="input-group col-md-6">
                        <input type="text" class="form-control" name="wp_name" id="wp_name" readonly="true">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" id="btn-view-wp">
                                View Detail WP
                             </button>
                        </span>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">NPWPD</label>
                    <div class="input-group col-md-6">
                        <input type="text" class="form-control" name="npwpd" id="npwpd" readonly="true">
                        <span class="input-group-addon">Jenis Pajak</span>
                            <input type="text" class="form-control" name="p_vat_type_code" id="p_vat_type_code" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Alamat Wajib Pajak</label>
                    <div class="input-group col-md-6">
                        <textarea class="form-control" name="wp_address_name" id="wp_address_name" readonly="true"></textarea>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Merk Dagang</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="company_brand" id="company_brand" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Status WP</label>
                    <div class="input-group col-md-6">
                        <input id="p_account_status_id" type="text"  style="display:none;">
                        <input id="p_account_status_mut" readonly type="text" class="FormElement form-control" placeholder="Pilih Status WP">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" onclick="showLOVStatus('p_account_status_id','p_account_status_mut')">
                                <span class="fa fa-search bigger-110"></span>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Alasan Penutupan</label>
                    <div class="input-group col-md-6">
                        <input id="reason_status_id" type="text"  style="display:none;">
                        <input id="reason_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Alasan Penutupan">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" onclick="showLOVReason('reason_status_id','reason_code')">
                                <span class="fa fa-search bigger-110"></span>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Keterangan</label>
                    <div class="input-group col-md-6">
                        <textarea class="form-control" name="reason_description" id="reason_description" readonly="true"></textarea>
                    </div>
                </div>
            </div>
        </div>       
    </div>   
</div>

<script type="text/javascript">
    function showLOVStatus(id,code){

    }

    function showLOVReason(id, code){

    }
    
</script>
