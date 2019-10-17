<!-- breadcrumb -->
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
<!-- end breadcrumb -->
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
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong> Customer Account </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong> History Log & Transaksi  </strong>
                    </a>
                </li>
            </ul>
        </div>
        <input type="hidden" name="t_customer_id" id="t_customer_id">
        <input type="hidden" name="t_cust_account_id" id="t_cust_account_id">
        <div class="tab-content no-border">
            <div class="row">
                <div class="col-xs-12">
                   <table id="grid-table"></table>
                   <div id="grid-pager"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$("#tab-1").on("click", function(event) {
    event.stopPropagation();
    
    loadContentWithParams("data_master.t_customer",{
        t_customer_id: $('#t_customer_id').val(),
    });

    //alert("t_customer_id = "+$('#t_customer_id').val());
});

$('#t_customer_id').val("<?php echo $_POST['t_customer_id'] ?>");
$('#t_cust_account_id').val("<?php echo $_POST['t_cust_account_id'] ?>");

$("#tab-3").on("click", function(event) {

    event.stopPropagation();
    
    loadContentWithParams("data_master.t_trans_histories", { //model yang ketiga
        t_cust_account_id: $('#t_cust_account_id').val(),
        t_customer_id: $('#t_customer_id').val(),

        
    });
});
</script>

<script>

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."data_master.t_cust_account_controller/read"; ?>',
            postData: { t_cust_account_id : <?php echo $this->input->post('t_cust_account_id'); ?>, t_customer_id : <?php echo $this->input->post('t_customer_id'); ?>},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Cust Account', name: 't_cust_account_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID Customer', name: 't_customer_id',width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'NPWPD',name: 'npwd',width: 150, align: "left"},
                {label: 'Tgl Registrasi',name: 'registration_date',width: 150, align: "left"},
                {label: 'Jenis Pajak',name: 'vat_code',width: 150, align: "left"},
                //hide fields
                {label: 'Company Name', name: 'company_name',width: 5, hidden: true},
                {label: 'Company Brand', name: 'company_brand',width: 5, hidden: true},
                {label: 'Address Name', name: 'address_name',width: 5, hidden: true},
                {label: 'Address No', name: 'address_no',width: 5, hidden: true},
                {label: 'Address RT', name: 'address_rt',width: 5, hidden: true},
                {label: 'Address RW', name: 'address_rw',width: 5, hidden: true},
                {label: 'Phone Number', name: 'phone_no',width: 5, hidden: true},
                {label: 'Mobile Number', name: 'mobile_no',width: 5, hidden: true},
                {label: 'Fax Number', name: 'fax_no',width: 5, hidden: true},
                {label: 'Kode Pos', name: 'zip_code',width: 5, hidden: true},
                {label: 'Tanggal Registrasi Pajak', name: 'vat_registration_date',width: 5, hidden: true},
                {label: 'Order Number', name: 'order_no',width: 5, hidden: true},
                {label: 'Order Date', name: 'order_date',width: 5, hidden: true},
                {label: 'Kota', name: 'nama_kota',width: 5, hidden: true},
                {label: 'Kecamatan', name: 'nama_kecamatan',width: 5, hidden: true},
                {label: 'Kelurahan', name: 'nama_kelurahan',width: 5, hidden: true},
                {label: 'WP Name', name: 'wp_name',width: 5, hidden: true},
                {label: 'Alamat WP', name: 'wp_address_name',width: 5, hidden: true},
                {label: 'No Alamat WP', name: 'wp_address_no',width: 5, hidden: true},
                {label: 'RT Alamat WP', name: 'wp_address_rt',width: 5, hidden: true},
                {label: 'RW Alamat WP', name: 'wp_address_rw',width: 5, hidden: true},
                {label: 'WP Kota', name: 'wp_kota',width: 5, hidden: true},
                {label: 'WP Kelurahan', name: 'wp_kelurahan',width: 5, hidden: true},
                {label: 'WP Kecamatan', name: 'wp_kecamatan',width: 5, hidden: true},
                {label: 'Brand Kota', name: 'brand_kota',width: 5, hidden: true},
                {label: 'Brand Kelurahan', name: 'brand_kelurahan',width: 5, hidden: true},
                {label: 'Brand Kecamatan', name: 'brand_kecamatan',width: 5, hidden: true},
                {label: 'WP Phone Number', name: 'wp_phone_no',width: 5, hidden: true},
                {label: 'WP Mobile Number', name: 'wp_mobile_no',width: 5, hidden: true},
                {label: 'WP Fax Number', name: 'wp_fax_no',width: 5, hidden: true},
                {label: 'WP Zip Code', name: 'wp_zip_code',width: 5, hidden: true},
                {label: 'WP Email', name: 'wp_email',width: 5, hidden: true},
                {label: 'Brand Alamat', name: 'brand_address_name',width: 5, hidden: true},
                {label: 'Brand Alamat No', name: 'brand_address_no',width: 5, hidden: true},
                {label: 'Brand Alamat RT', name: 'brand_address_rt',width: 5, hidden: true},
                {label: 'Brand Alamat RW', name: 'brand_address_rw',width: 5, hidden: true},
                {label: 'Brand Tlp', name: 'brand_phone_no',width: 5, hidden: true},
                {label: 'Brand HP', name: 'brand_mobile_no',width: 5, hidden: true},
                {label: 'Brand Fax Number', name: 'brand_fax_no',width: 5, hidden: true},
                {label: 'Brand Kode Pos', name: 'brand_zip_code',width: 5, hidden: true},
                {label: 'No Aktifasi', name: 'activation_no',width: 5, hidden: true},
                {label: 'Nama Ayat', name: 'nama_ayat',width: 5, hidden: true},
                {label: 'Status Code', name: 'status_code',width: 5, hidden: true},
                {label: 'Tgl Aktif', name: 'active_date',width: 5, hidden: true},
                {label: 'Last Status Date', name: 'last_satatus_date',width: 5, hidden: true}


            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 5,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/
                setCustomer_account(rowid);

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
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '<?php echo WS_JQGRID."data_master.t_cust_account_controller/read"; ?>',
            caption: "Data Customer Account"

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
                    /*t_customer_id: function() {
                        return <?php //echo $this->input->post('t_customer_id'); ?>;
                    }*/
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

    function setCustomer_account(rowid){
        /*$('#t_customer_id').val($('#grid-table').jqGrid('getCell', rowid, 't_customer_id'));
        $('#t_cust_account_id').val($('#grid-table').jqGrid('getCell', rowid, 't_cust_account_id'));*/
        $('#npwd').val($('#grid-table').jqGrid('getCell', rowid, 'npwd'));
        $('#vat_code').val($('#grid-table').jqGrid('getCell', rowid, 'vat_code'));
        $('#nama_ayat').val($('#grid-table').jqGrid('getCell', rowid, 'nama_ayat'));
        $('#registration_date').val($('#grid-table').jqGrid('getCell', rowid, 'registration_date'));
        $('#activation_no').val($('#grid-table').jqGrid('getCell', rowid, 'activation_no'));
        $('#active_date').val($('#grid-table').jqGrid('getCell', rowid, 'active_date'));
        $('#status_code').val($('#grid-table').jqGrid('getCell', rowid, 'status_code'));
        $('#last_satatus_date').val($('#grid-table').jqGrid('getCell', rowid, 'last_satatus_date'));
        $('#company_name').val($('#grid-table').jqGrid('getCell', rowid, 'company_name'));
        $('#address_name').val($('#grid-table').jqGrid('getCell', rowid, 'address_name'));
        $('#address_no').val($('#grid-table').jqGrid('getCell', rowid, 'address_no'));
        $('#address_rt').val($('#grid-table').jqGrid('getCell', rowid, 'address_rt'));
        $('#address_rw').val($('#grid-table').jqGrid('getCell', rowid, 'address_rw'));
        $('#nama_kota').val($('#grid-table').jqGrid('getCell', rowid, 'nama_kota'));
        $('#nama_kecamatan').val($('#grid-table').jqGrid('getCell', rowid, 'nama_kecamatan'));
        $('#nama_kelurahan').val($('#grid-table').jqGrid('getCell', rowid, 'nama_kelurahan'));
        $('#phone_no').val($('#grid-table').jqGrid('getCell', rowid, 'phone_no'));
        $('#fax_no').val($('#grid-table').jqGrid('getCell', rowid, 'fax_no'));
        $('#zip_code').val($('#grid-table').jqGrid('getCell', rowid, 'zip_code'));
        $('#company_brand').val($('#grid-table').jqGrid('getCell', rowid, 'company_brand'));
        $('#brand_address_name').val($('#grid-table').jqGrid('getCell', rowid, 'brand_address_name'));
        $('#brand_address_no').val($('#grid-table').jqGrid('getCell', rowid, 'brand_address_no'));
        $('#brand_address_rt').val($('#grid-table').jqGrid('getCell', rowid, 'brand_address_rt'));
        $('#brand_address_rw').val($('#grid-table').jqGrid('getCell', rowid, 'brand_address_rw'));
        $('#brand_kota').val($('#grid-table').jqGrid('getCell', rowid, 'brand_kota'));
        $('#brand_kecamatan').val($('#grid-table').jqGrid('getCell', rowid, 'brand_kecamatan'));
        $('#brand_kelurahan').val($('#grid-table').jqGrid('getCell', rowid, 'brand_kelurahan'));
        $('#brand_phone_no').val($('#grid-table').jqGrid('getCell', rowid, 'brand_phone_no'));
        $('#brand_mobile_no').val($('#grid-table').jqGrid('getCell', rowid, 'brand_mobile_no'));
        $('#brand_fax_no').val($('#grid-table').jqGrid('getCell', rowid, 'brand_fax_no'));
        $('#brand_zip_code').val($('#grid-table').jqGrid('getCell', rowid, 'brand_zip_code'));
        $('#wp_name').val($('#grid-table').jqGrid('getCell', rowid, 'wp_name'));
        $('#wp_address_name').val($('#grid-table').jqGrid('getCell', rowid, 'wp_address_name'));
        $('#wp_address_no').val($('#grid-table').jqGrid('getCell', rowid, 'wp_address_no'));
        $('#wp_address_rt').val($('#grid-table').jqGrid('getCell', rowid, 'wp_address_rt'));
        $('#wp_address_rw').val($('#grid-table').jqGrid('getCell', rowid, 'wp_address_rw'));
        $('#wp_kota').val($('#grid-table').jqGrid('getCell', rowid, 'wp_kota'));
        $('#wp_kecamatan').val($('#grid-table').jqGrid('getCell', rowid, 'wp_kecamatan'));
        $('#wp_kelurahan').val($('#grid-table').jqGrid('getCell', rowid, 'wp_kelurahan'));
        $('#wp_phone_no').val($('#grid-table').jqGrid('getCell', rowid, 'wp_phone_no'));
        $('#wp_fax_no').val($('#grid-table').jqGrid('getCell', rowid, 'wp_fax_no'));
        $('#wp_mobile_no').val($('#grid-table').jqGrid('getCell', rowid, 'wp_mobile_no'));
        $('#wp_zip_code').val($('#grid-table').jqGrid('getCell', rowid, 'wp_zip_code'));
        $('#wp_email').val($('#grid-table').jqGrid('getCell', rowid, 'wp_email'));



    }

</script>
<br>
<label class="control-label col-md-5"><b>Informasi Customer Account</b></label>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-3">NPWPD</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="npwd" id="npwd" style="width: 560px;" readonly="true">                 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Jenis Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="vat_code" id="vat_code" style="width: 560px;" readonly="true">                 
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nama Ayat</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama_ayat" id="nama_ayat" style="width: 560px;" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Tgl Registrasi</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="registration_date" id="registration_date" style="width: 560px;" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Pengukuhan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="activation_no" id="activation_no" readonly="true">                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">Tgl</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="active_date" id="active_date" readonly="true">                            
                        </div>
                    </div>
                    
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Status</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="status_code" id="status_code" readonly="true">
                        </div>
                    </div>
                
                
                    <label class="control-label col-md-1">Tgl</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="last_satatus_date" id="last_satatus_date" readonly="true">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<label class="control-label col-md-5"><b>Keterangan Perusahaan atau Badan</b></label>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">               
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nama Badan/Perusahaan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="company_name" id="company_name" style="width: 560px;" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Alamat Badan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="address_name" id="address_name" style="width: 560px;" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="address_no" id="address_no" readonly="true">                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RT</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="address_rt" id="address_rt" readonly="true">                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RW</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="address_rw" id="address_rw" readonly="true">                            
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">                
                    <label class="control-label col-md-3">Kota/Kabupaten</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama_kota" id="nama_kota" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Kecamatan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama_kecamatan" id="nama_kecamatan" readonly="true">
                        </div>
                    </div>               
                
                    <label class="control-label col-md-1">Kelurahan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama_kelurahan" id="nama_kelurahan" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Tlp</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="phone_no" id="phone_no" readonly="true">
                        </div>
                    </div>
                    <label class="control-label col-md-1">No Seluler</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="mobile_no" id="mobile_no" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Fax</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="fax_no" id="fax_no" readonly="true">
                        </div>
                    </div>
                    <label class="control-label col-md-1">Kode Pos</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="zip_code" id="zip_code" readonly="true">
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
</div>

<label class="control-label col-md-5"><b>Keterangan Merk Dagang</b></label>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nama Merk Dagang</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="company_brand" id="company_brand" style="width: 560px;" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Alamat</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_address_name" id="brand_address_name" style="width: 560px;" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_address_no" id="brand_address_no" readonly="true">                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RT</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_address_rt" id="brand_address_rt" readonly="true">                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RW</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_address_rw" id="brand_address_rw" readonly="true">                            
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">                
                    <label class="control-label col-md-3">Kota/Kabupaten</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_kota" id="brand_kota" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Kecamatan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_kecamatan" id="brand_kecamatan" readonly="true">
                        </div>
                    </div>               
                
                    <label class="control-label col-md-1">Kelurahan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_kelurahan" id="brand_kelurahan" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Tlp</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_phone_no" id="brand_phone_no" readonly="true">
                        </div>
                    </div>
                    <label class="control-label col-md-1">No Seluler</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_mobile_no" id="brand_mobile_no" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Fax</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_fax_no" id="brand_fax_no" readonly="true">
                        </div>
                    </div>
                    <label class="control-label col-md-1">Kode Pos</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_zip_code" id="brand_zip_code" readonly="true">
                        </div>
                    </div>
                </div>
            </div>  
        </div>       
    </div>   
</div>

<label class="control-label col-md-5"><b>Keterangan Wajib Pajak</b></label>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nama Wajib Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_name" id="wp_name" style="width: 560px;" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Alamat Wajib Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_address_name" id="wp_address_name" style="width: 560px;" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_address_no" id="wp_address_no" readonly="true">                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RT</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_address_rt" id="wp_address_rt" readonly="true">                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RW</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_address_rw" id="wp_address_rw" readonly="true">                            
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">                
                    <label class="control-label col-md-3">Kota/Kabupaten</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_kota" id="wp_kota" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Kecamatan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_kecamatan" id="wp_kecamatan" readonly="true">
                        </div>
                    </div>               
                
                    <label class="control-label col-md-1">Kelurahan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_kelurahan" id="wp_kelurahan" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Tlp</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_phone_no" id="wp_phone_no" readonly="true">
                        </div>
                    </div>
                    <label class="control-label col-md-1">No Seluler</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_mobile_no" id="wp_mobile_no" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Fax</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_fax_no" id="wp_fax_no" readonly="true">
                        </div>
                    </div>
                    <label class="control-label col-md-1">Kode Pos</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_zip_code" id="wp_zip_code" readonly="true">
                        </div>
                    </div>
                </div>
            </div>  
        </div>       
    </div>   
</div>