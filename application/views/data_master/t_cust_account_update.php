<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Data Master Perubahan Nama Wajib Pajak</span>
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
$('#t_customer_id').val("<?php echo $_POST['t_customer_id'] ?>");
$('#t_cust_account_id').val("<?php echo $_POST['t_cust_account_id'] ?>");

$("#tab-1").on("click", function(event) {
    event.stopPropagation();
    
    loadContentWithParams("data_master.t_customer_update",{
        t_customer_id: $('#t_customer_id').val(),
    });

    //alert("t_customer_id = "+$('#t_customer_id').val());
});



/*$("#tab-3").on("click", function(event) {

    event.stopPropagation();
    
    loadContentWithParams("data_master.t_trans_histories", { //model yang ketiga
        t_cust_account_id: $('#t_cust_account_id').val(),
        t_customer_id: $('#t_customer_id').val(),

        
    });
});*/
</script>

<script>

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."data_master.t_cust_account_update_controller/read"; ?>',
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
                {label: 'ID Pajak', name: 'p_vat_type_id',width: 5, hidden: true},
                {label: 'ID Pajak Detail', name: 'p_vat_type_dtl_id',width: 5, hidden: true},
                {label: 'Company Name', name: 'company_name',width: 5, hidden: true},
                {label: 'Company Brand', name: 'company_brand',width: 5, hidden: true},
                {label: 'Address Name', name: 'address_name',width: 5, hidden: true},
                {label: 'Address No', name: 'address_no',width: 5, hidden: true},
                {label: 'Address RT', name: 'address_rt',width: 5, hidden: true},
                {label: 'Address RW', name: 'address_rw',width: 5, hidden: true},
                {label: 'ID Region', name: 'p_region_id',width: 5, hidden: true},
                {label: 'ID Kecamatan', name: 'p_region_id_kecamatan',width: 5, hidden: true},
                {label: 'ID Kelurahan', name: 'p_region_id_kelurahan',width: 5, hidden: true},
                {label: 'Company Name', name: 'company_name',width: 5, hidden: true},
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
                {label: 'ID Kota WP', name: 'wp_p_region_id',width: 5, hidden: true},
                {label: 'ID Kecamatan WP', name: 'wp_p_region_id_kecamatan',width: 5, hidden: true},
                {label: 'ID Kelurahan WP', name: 'wp_p_region_id_kelurahan',width: 5, hidden: true},
                {label: 'WP Kota', name: 'wp_kota',width: 5, hidden: true},
                {label: 'WP Kelurahan', name: 'wp_kelurahan',width: 5, hidden: true},
                {label: 'WP Kecamatan', name: 'wp_kecamatan',width: 5, hidden: true},
                {label: 'Brand Kota', name: 'brand_kota',width: 5, hidden: true},
                {label: 'ID Kota Brand', name: 'brand_p_region_id',width: 5, hidden: true},
                {label: 'Brand Kelurahan', name: 'brand_kelurahan',width: 5, hidden: true},
                {label: 'ID Kelurahan Brand', name: 'brand_p_region_id_kel',width: 5, hidden: true},
                {label: 'Brand Kecamatan', name: 'brand_kecamatan',width: 5, hidden: true},
                {label: 'ID Kecamatan Brand', name: 'brand_p_region_id_kec',width: 5, hidden: true},
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
                {label: 'Last Status Date', name: 'last_satatus_date',width: 5, hidden: true},
                {label: 'ID Region Per', name: 'p_region_id_per', width: 5, hidden: true},
                {label: 'ID Job Position', name: 'p_job_position_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Company Owner', name: 'company_owner',width: 5, hidden: true},
                {label: 'Nama Jabatan', name: 'nama_jabatan',width: 5, hidden: true},
                {label: 'Alamat', name: 'address_name_owner',width: 5, hidden: true},
                {label: 'No', name: 'address_no_owner',width: 5, hidden: true},
                {label: 'RT', name: 'address_rt_owner',width: 5, hidden: true},
                {label: 'RW', name: 'address_rw_owner',width: 5, hidden: true},                
                {label: 'Nama Kota Owner', name: 'nama_kota_owner',width: 5, hidden: true},
                {label: 'ID Kota Owner', name: 'p_region_id_per',width: 5, hidden: true},
                {label: 'Nama Kecamatan Owner', name: 'nama_kecamatan_owner',width: 5, hidden: true},
                {label: 'ID Kecamatan Owner', name: 'p_region_id_kec_owner',width: 5, hidden: true},
                {label: 'Nama kelurahan Owner', name: 'nama_kelurahan_owner',width: 5, hidden: true},
                {label: 'ID Kelurahan Owner', name: 'p_region_id_kel_owner',width: 5, hidden: true},
                {label: 'No Telepon', name: 'phone_no_owner',width: 5, hidden: true},
                {label: 'Fax', name: 'fax_no_owner',width: 5, hidden: true},
                {label: 'HP', name: 'mobile_no_owner',width: 5, hidden: true},
                {label: 'Email', name: 'email_address',width: 5, hidden: true},
                {label: 'Zip Code', name: 'zip_code_owner',width: 5, hidden: true},

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
            editurl: '<?php echo WS_JQGRID."data_master.t_cust_account_update_controller/read"; ?>',
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
        
        $('#npwd').val($('#grid-table').jqGrid('getCell', rowid, 'npwd'));
        $('#form_vat_id').val($('#grid-table').jqGrid('getCell', rowid, 'p_vat_type_id'));
        $('#form_vat_code').val($('#grid-table').jqGrid('getCell', rowid, 'vat_code'));
        $('#form_vat_dtl_id').val($('#grid-table').jqGrid('getCell', rowid, 'p_vat_type_dtl_id'));
        $('#form_vat_dtl_code').val($('#grid-table').jqGrid('getCell', rowid, 'nama_ayat'));
        $('#registration_date').val($('#grid-table').jqGrid('getCell', rowid, 'registration_date'));
        $('#activation_no').val($('#grid-table').jqGrid('getCell', rowid, 'activation_no'));
        $('#active_date').val($('#grid-table').jqGrid('getCell', rowid, 'active_date'));
        $('#status_code').val($('#grid-table').jqGrid('getCell', rowid, 'status_code'));
        $('#last_satatus_date').val($('#grid-table').jqGrid('getCell', rowid, 'last_satatus_date'));

        /* Keterangan Perusahaan/Badan */
        $('#company_name').val($('#grid-table').jqGrid('getCell', rowid, 'company_name'));
        $('#address_name').val($('#grid-table').jqGrid('getCell', rowid, 'address_name'));
        $('#address_no').val($('#grid-table').jqGrid('getCell', rowid, 'address_no'));
        $('#address_rt').val($('#grid-table').jqGrid('getCell', rowid, 'address_rt'));
        $('#address_rw').val($('#grid-table').jqGrid('getCell', rowid, 'address_rw'));
        $('#p_region_id_perusahaan').val($('#grid-table').jqGrid('getCell', rowid, 'p_region_id'));
        $('#nama_kota').val($('#grid-table').jqGrid('getCell', rowid, 'nama_kota'));
        $('#p_region_id_kecamatan').val($('#grid-table').jqGrid('getCell', rowid, 'p_region_id_kecamatan'));
        $('#nama_kecamatan').val($('#grid-table').jqGrid('getCell', rowid, 'nama_kecamatan'));
        $('#p_region_id_kelurahan').val($('#grid-table').jqGrid('getCell', rowid, 'p_region_id_kelurahan'));
        $('#nama_kelurahan').val($('#grid-table').jqGrid('getCell', rowid, 'nama_kelurahan'));
        $('#phone_no').val($('#grid-table').jqGrid('getCell', rowid, 'phone_no'));
        $('#fax_no').val($('#grid-table').jqGrid('getCell', rowid, 'fax_no'));
        $('#zip_code').val($('#grid-table').jqGrid('getCell', rowid, 'zip_code'));

        /* Keterangan Merk Dagang */
        $('#company_brand').val($('#grid-table').jqGrid('getCell', rowid, 'company_brand'));
        $('#brand_address_name').val($('#grid-table').jqGrid('getCell', rowid, 'brand_address_name'));
        $('#brand_address_no').val($('#grid-table').jqGrid('getCell', rowid, 'brand_address_no'));
        $('#brand_address_rt').val($('#grid-table').jqGrid('getCell', rowid, 'brand_address_rt'));
        $('#brand_address_rw').val($('#grid-table').jqGrid('getCell', rowid, 'brand_address_rw'));
        $('#p_region_id_dagang').val($('#grid-table').jqGrid('getCell', rowid, 'brand_p_region_id'));
        $('#nama_kota_dagang').val($('#grid-table').jqGrid('getCell', rowid, 'brand_kota'));
        $('#p_region_id_kecamatan_dagang').val($('#grid-table').jqGrid('getCell', rowid, 'brand_p_region_id_kec'));
        $('#nama_kecamatan_dagang').val($('#grid-table').jqGrid('getCell', rowid, 'brand_kecamatan'));
        $('#p_region_id_kelurahan_dagang').val($('#grid-table').jqGrid('getCell', rowid, 'brand_p_region_id_kel'));
        $('#nama_kelurahan_dagang').val($('#grid-table').jqGrid('getCell', rowid, 'brand_kelurahan'));
        $('#brand_phone_no').val($('#grid-table').jqGrid('getCell', rowid, 'brand_phone_no'));
        $('#brand_mobile_no').val($('#grid-table').jqGrid('getCell', rowid, 'brand_mobile_no'));
        $('#brand_fax_no').val($('#grid-table').jqGrid('getCell', rowid, 'brand_fax_no'));
        $('#brand_zip_code').val($('#grid-table').jqGrid('getCell', rowid, 'brand_zip_code'));

        /* Keterangan Wajib Pajak */
        $('#wp_name').val($('#grid-table').jqGrid('getCell', rowid, 'wp_name'));
        $('#wp_address_name').val($('#grid-table').jqGrid('getCell', rowid, 'wp_address_name'));
        $('#wp_address_no').val($('#grid-table').jqGrid('getCell', rowid, 'wp_address_no'));
        $('#wp_address_rt').val($('#grid-table').jqGrid('getCell', rowid, 'wp_address_rt'));
        $('#wp_address_rw').val($('#grid-table').jqGrid('getCell', rowid, 'wp_address_rw'));
        $('#p_region_id_wp').val($('#grid-table').jqGrid('getCell', rowid, 'wp_p_region_id'));
        $('#nama_kota_wp').val($('#grid-table').jqGrid('getCell', rowid, 'wp_kota'));
        $('#p_region_id_kecamatan_wp').val($('#grid-table').jqGrid('getCell', rowid, 'wp_p_region_id_kecamatan'));
        $('#nama_kecamatan_wp').val($('#grid-table').jqGrid('getCell', rowid, 'wp_kecamatan'));
        $('#p_region_id_kelurahan_wp').val($('#grid-table').jqGrid('getCell', rowid, 'wp_p_region_id_kelurahan'));
        $('#nama_kelurahan_wp').val($('#grid-table').jqGrid('getCell', rowid, 'wp_kelurahan'));
        $('#wp_phone_no').val($('#grid-table').jqGrid('getCell', rowid, 'wp_phone_no'));
        $('#wp_fax_no').val($('#grid-table').jqGrid('getCell', rowid, 'wp_fax_no'));
        $('#wp_mobile_no').val($('#grid-table').jqGrid('getCell', rowid, 'wp_mobile_no'));
        $('#wp_zip_code').val($('#grid-table').jqGrid('getCell', rowid, 'wp_zip_code'));
        $('#wp_email').val($('#grid-table').jqGrid('getCell', rowid, 'wp_email'));
        
        /* Keterangan Pemilik Atau Pengelola */
        $('#company_owner').val($('#grid-table').jqGrid('getCell', rowid, 'company_owner'));
        $('#p_job_position_id').val($('#grid-table').jqGrid('getCell', rowid, 'p_job_position_id'));
        $('#nama_jabatan').val($('#grid-table').jqGrid('getCell', rowid, 'nama_jabatan'));
        $('#address_name_owner').val($('#grid-table').jqGrid('getCell', rowid, 'address_name_owner')); 
        $('#address_no_owner').val($('#grid-table').jqGrid('getCell', rowid, 'address_no_owner'));
        $('#address_rt_owner').val($('#grid-table').jqGrid('getCell', rowid, 'address_rt_owner'));
        $('#address_rw_owner').val($('#grid-table').jqGrid('getCell', rowid, 'address_rw_owner'));
        $('#p_region_id_owner').val($('#grid-table').jqGrid('getCell', rowid, 'p_region_id_per'));
        $('#nama_kota_owner').val($('#grid-table').jqGrid('getCell', rowid, 'nama_kota_owner'));
        $('#p_region_id_kecamatan_owner').val($('#grid-table').jqGrid('getCell', rowid, 'p_region_id_kec_owner'));
        $('#nama_kecamatan_owner').val($('#grid-table').jqGrid('getCell', rowid, 'nama_kecamatan_owner'));
        $('#p_region_id_kelurahan_owner').val($('#grid-table').jqGrid('getCell', rowid, 'p_region_id_kel_owner'));
        $('#nama_kelurahan_owner').val($('#grid-table').jqGrid('getCell', rowid, 'nama_kelurahan_owner')); 
        $('#phone_no_owner').val($('#grid-table').jqGrid('getCell', rowid, 'phone_no_owner'));
        $('#fax_no_owner').val($('#grid-table').jqGrid('getCell', rowid, 'fax_no_owner'));
        $('#mobile_no_owner').val($('#grid-table').jqGrid('getCell', rowid, 'mobile_no_owner'));
        $('#email_address').val($('#grid-table').jqGrid('getCell', rowid, 'email_address'));
        $('#zip_code').val($('#grid-table').jqGrid('getCell', rowid, 'zip_code'));



    }

</script>
<?php $this->load->view('lov/lov_vat_type'); ?>
<?php $this->load->view('lov/lov_kota'); ?>
<?php $this->load->view('lov/lov_kec'); ?>
<?php $this->load->view('lov/lov_kel'); ?>
<?php $this->load->view('lov/lov_vat_type_dtl'); ?>
<?php $this->load->view('lov/lov_job_position'); ?>

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
                                <input type="text" class="form-control required" name="npwd" id="npwd" style="width: 560px;">                 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <input id="form_vat_id" type="text" style="display:none;">
                    <label class="control-label col-md-3">Jenis Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="vat_code" id="form_vat_code" readonly style="width: 560px; " >
                            <span class="input-group-btn">
                                <!-- <button class="btn btn-success" type="button" onclick="showLOVVat_type('form_vat_id','form_vat_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button> -->
                            </span>                 
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <input id="form_vat_dtl_id" type="text" style="display:none;">
                    <label class="control-label col-md-3">Nama Ayat</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="FormElement form-control" name="nama_ayat" id="form_vat_dtl_code" readonly style="width: 560px; " >
                            <span class="input-group-btn">
                                <!-- <button class="btn btn-success" type="button" onclick="showLOVVatTypeDtl('form_vat_dtl_id','form_vat_dtl_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button> -->
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Tgl Registrasi</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="registration_date" id="registration_date" style="width: 560px;" readonly>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Pengukuhan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control required" name="activation_no" id="activation_no" required>                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">Tgl</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="active_date" id="active_date" readonly>                            
                        </div>
                    </div>
                    
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Status</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="status_code" id="status_code" readonly>
                        </div>
                    </div>
                
                
                    <label class="control-label col-md-1">Tgl</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="last_satatus_date" id="last_satatus_date" readonly>
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
                            <input type="text" class="form-control required" name="company_name" id="company_name" style="width: 560px;" required>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Alamat Badan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control required" name="address_name" id="address_name" style="width: 560px;" required>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control required" name="address_no" id="address_no" required>                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RT</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="address_rt" id="address_rt" >                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RW</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="address_rw" id="address_rw" >                            
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">                
                    <label class="control-label col-md-3">Kota/Kabupaten</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="p_region_id_perusahaan" name="p_region_id_perusahaan" type="text"  style="display:none;">
                            <input type="text" class="FormElement form-control required" name="nama_kota" id="nama_kota" required readonly>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-kota-perusahaan">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Kecamatan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="p_region_id_kecamatan" name="p_region_id_kecamatan" type="text"  style="display:none;">
                            <input type="text" class="form-control required" name="nama_kecamatan" id="nama_kecamatan" readonly required>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-kecamatan-perusahaan">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>               
                
                    <label class="control-label col-md-1">Kelurahan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="p_region_id_kelurahan" name="p_region_id_kelurahan" type="text"  style="display:none;">
                            <input type="text" class="form-control required" name="nama_kelurahan" id="nama_kelurahan" required readonly >
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-kelurahan-perusahaan">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Tlp</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="phone_no" id="phone_no" >
                        </div>
                    </div>
                    <label class="control-label col-md-1">No Seluler</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="mobile_no" id="mobile_no" >
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Fax</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="fax_no" id="fax_no" >
                        </div>
                    </div>
                    <label class="control-label col-md-1">Kode Pos</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="zip_code" id="zip_code" >
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
                            <input type="text" class="form-control required" name="company_brand" id="company_brand" style="width: 560px;" required>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Alamat</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control required" name="brand_address_name" id="brand_address_name" style="width: 560px;" required>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control required" name="brand_address_no" id="brand_address_no" required>                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RT</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_address_rt" id="brand_address_rt" >                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RW</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_address_rw" id="brand_address_rw" >                            
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">                
                    <label class="control-label col-md-3">Kota/Kabupaten</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="p_region_id_dagang" name="p_region_id_dagang" type="text"  style="display:none;">
                            <input type="text" class="FormElement form-control required" name="nama_kota_dagang" id="nama_kota_dagang" required readonly>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-kota-dagang">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Kecamatan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="p_region_id_kecamatan_dagang" name="p_region_id_kecamatan_dagang" type="text"  style="display:none;">
                            <input type="text" class="form-control required" name="nama_kecamatan_dagang" id="nama_kecamatan_dagang" readonly required>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-kecamatan-dagang">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>               
                
                    <label class="control-label col-md-1">Kelurahan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="p_region_id_kelurahan_dagang" name="p_region_id_kelurahan_dagang" type="text"  style="display:none;">
                            <input type="text" class="form-control required" name="nama_kelurahan_dagang" id="nama_kelurahan_dagang" required readonly >
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-kelurahan-dagang">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Tlp</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_phone_no" id="brand_phone_no" >
                        </div>
                    </div>
                    <label class="control-label col-md-1">No Seluler</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_mobile_no" id="brand_mobile_no" >
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Fax</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_fax_no" id="brand_fax_no" >
                        </div>
                    </div>
                    <label class="control-label col-md-1">Kode Pos</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="brand_zip_code" id="brand_zip_code" >
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
                            <input type="text" class="form-control required" name="wp_name" id="wp_name" style="width: 560px;" required>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Alamat Wajib Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control required" name="wp_address_name" id="wp_address_name" style="width: 560px;" required>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control required" name="wp_address_no" id="wp_address_no" required>                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RT</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_address_rt" id="wp_address_rt" >                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RW</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_address_rw" id="wp_address_rw" >                            
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">                
                    <label class="control-label col-md-3">Kota/Kabupaten</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="p_region_id_wp" name="p_region_id_wp" type="text"  style="display:none;">
                            <input type="text" class="FormElement form-control required" name="nama_kota_wp" id="nama_kota_wp" required readonly>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-kota-wp">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Kecamatan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="p_region_id_kecamatan_wp" name="p_region_id_kecamatan_wp" type="text"  style="display:none;">
                            <input type="text" class="form-control required" name="nama_kecamatan_wp" id="nama_kecamatan_wp" readonly required>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-kecamatan-wp">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>               
                
                    <label class="control-label col-md-1">Kelurahan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="p_region_id_kelurahan_wp" name="p_region_id_kelurahan_wp" type="text"  style="display:none;">
                            <input type="text" class="form-control required" name="nama_kelurahan_wp" id="nama_kelurahan_wp" required readonly >
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-kelurahan-wp">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Tlp</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_phone_no" id="wp_phone_no" >
                        </div>
                    </div>
                    <label class="control-label col-md-1">No Seluler</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control required" name="wp_mobile_no" id="wp_mobile_no" required>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Fax</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_fax_no" id="wp_fax_no" >
                        </div>
                    </div>
                    <label class="control-label col-md-1">Kode Pos</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_zip_code" id="wp_zip_code" >
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Email</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="wp_email" id="wp_email" >
                        </div>
                    </div>
                    <label class="control-label col-md-2">Tanggal Penerimaan</label>
                    
                </div>
            </div>  
        </div>       
    </div>   
</div>

<label class="control-label col-md-5"><b>Keterangan Pemilik Atau Pengelola</b></label>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nama Pemilik/Pengelola</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control required" name="company_owner" id="company_owner" style="width: 560px;" required>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Jabatan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="p_job_position_id" name="p_job_position_id" type="text"  style="display:none;">
                            <input type="text" class="form-control required" name="nama_jabatan" id="nama_jabatan" style="width: 560px;" required readonly>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-job_position">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Alamat</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control required" name="address_name_owner" id="address_name_owner" style="width: 560px;" required>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control required" name="address_no_owner" id="address_no_owner" required>                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RT</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="address_rt_owner" id="address_rt_owner" >                            
                        </div>
                    </div>
                    <label class="control-label col-sm-1">RW</label>
                    <div class="col-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="address_rw_owner" id="address_rw_owner" >                            
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">                
                    <label class="control-label col-md-3">Kota/Kabupaten</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="p_region_id_owner" name="p_region_id_owner" type="text"  style="display:none;">
                            <input type="text" class="FormElement form-control required" name="nama_kota_owner" id="nama_kota_owner" required readonly>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-kota-owner">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Kecamatan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="p_region_id_kecamatan_owner" name="p_region_id_kecamatan_owner" type="text"  style="display:none;">
                            <input type="text" class="form-control required" name="nama_kecamatan_owner" id="nama_kecamatan_owner" readonly required>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-kecamatan-owner">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>               
                
                    <label class="control-label col-md-1">Kelurahan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="p_region_id_kelurahan_owner" name="p_region_id_kelurahan_owner" type="text"  style="display:none;">
                            <input type="text" class="form-control required" name="nama_kelurahan_owner" id="nama_kelurahan_owner" required readonly >
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-kelurahan-owner">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Tlp</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="phone_no_owner" id="phone_no_owner" >
                        </div>
                    </div>
                    <label class="control-label col-md-1">No Seluler</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control required" name="mobile_no_owner" id="mobile_no_owner" required>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Fax</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="fax_no_owner" id="fax_no_owner" >
                        </div>
                    </div>
                    <label class="control-label col-md-1">Kode Pos</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="zip_code_owner" id="zip_code_owner" >
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Email</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="email_address" id="email_address" style="width: 560px;">
                        </div>
                    </div>
                </div>
            </div>  
        </div>       
    </div>   
</div>
<div class="space-2"></div>
<div class="row col-md-offset-5">
    <a href="javascript:;" class="btn green" id="update">Simpan                                                   
    </a>
    <a href="javascript:;" class="btn green" id="batal">Batal                                                   
    </a>
</div>


<script type="text/javascript">
    $("#btn-lov-kota-perusahaan").on('click', function() {   
        modal_lov_kota_show('p_region_id_perusahaan','nama_kota');
    });

    $('#p_region_id_perusahaan').on('change', function() {
        $('#p_region_id_kecamatan').val('');
        $('#nama_kecamatan').val('');
        $('#p_region_id_kelurahan').val('');
        $('#nama_kelurahan').val('');
    });

    $("#btn-lov-kecamatan-perusahaan").on('click', function() { 
        var kota = $('#p_region_id_perusahaan').val(); 
        //alert(kota);
        if( kota == null || kota == ''){
            swal({title: "Error!", text: "Isi Kota/Kabupaten Terlebih Dahulu", html: true, type: "error"});
            return;
        }
         modal_lov_kecamatan_show('p_region_id_kecamatan','nama_kecamatan',kota);
        
    });

    $('#p_region_id_kecamatan').on('change', function() {
        $('#p_region_id_kelurahan').val('');
        $('#nama_kelurahan').val('');
    });

    $("#btn-lov-kelurahan-perusahaan").on('click', function() { 
        var kec = $('#p_region_id_kecamatan').val();
        if( kec == null || kec == ''){
            swal({title: "Error!", text: "Isi Kecamatan Terlebih Dahulu", html: true, type: "error"});
             return;
        }
        modal_lov_kelurahan_show('p_region_id_kelurahan','nama_kelurahan',kec);
    });

    $("#btn-lov-kota-dagang").on('click', function() {   
        modal_lov_kota_show('p_region_id_dagang','nama_kota_dagang');
    });

    $('#p_region_id_dagang').on('change', function() {
        $('#p_region_id_kecamatan_dagang').val('');
        $('#nama_kecamatan_dagang').val('');
        $('#p_region_id_kelurahan_dagang').val('');
        $('#nama_kelurahan_dagang').val('');
    });

    $("#btn-lov-kecamatan-dagang").on('click', function() { 
        var kota_dagang = $('#p_region_id_dagang').val(); 
        //alert(kota);
        if( kota_dagang == null || kota_dagang == ''){
            swal({title: "Error!", text: "Isi Kota/Kabupaten Terlebih Dahulu", html: true, type: "error"});
            return;
        }
         modal_lov_kecamatan_show('p_region_id_kecamatan_dagang','nama_kecamatan_dagang',kota_dagang);
        
    });

    $('#p_region_id_kecamatan_dagang').on('change', function() {
        $('#p_region_id_kelurahan_dagang').val('');
        $('#nama_kelurahan_dagang').val('');
    });

    $("#btn-lov-kelurahan-dagang").on('click', function() { 
        var kec_dagang = $('#p_region_id_kecamatan_dagang').val();
        if( kec_dagang == null || kec_dagang == ''){
            swal({title: "Error!", text: "Isi Kecamatan Terlebih Dahulu", html: true, type: "error"});
             return;
        }
        modal_lov_kelurahan_show('p_region_id_kelurahan_dagang','nama_kelurahan_dagang',kec_dagang);
    });

    $("#btn-lov-kota-wp").on('click', function() {   
        modal_lov_kota_show('p_region_id_wp','nama_kota_wp');
    });

    $('#p_region_id_wp').on('change', function() {
        $('#p_region_id_kecamatan_wp').val('');
        $('#nama_kecamatan_wp').val('');
        $('#p_region_id_kelurahan_wp').val('');
        $('#nama_kelurahan_wp').val('');
    });

    $("#btn-lov-kecamatan-wp").on('click', function() { 
        var kota_wp = $('#p_region_id_wp').val(); 
        //alert(kota);
        if( kota_wp == null || kota_wp == ''){
            swal({title: "Error!", text: "Isi Kota/Kabupaten Terlebih Dahulu", html: true, type: "error"});
            return;
        }
         modal_lov_kecamatan_show('p_region_id_kecamatan_wp','nama_kecamatan_wp',kota_wp);
        
    });

    $('#p_region_id_kecamatan_wp').on('change', function() {
        $('#p_region_id_kelurahan_wp').val('');
        $('#nama_kelurahan_wp').val('');
    });

    $("#btn-lov-kelurahan-wp").on('click', function() { 
        var kec_wp = $('#p_region_id_kecamatan_wp').val();
        if( kec_wp == null || kec_wp == ''){
            swal({title: "Error!", text: "Isi Kecamatan Terlebih Dahulu", html: true, type: "error"});
             return;
        }
        modal_lov_kelurahan_show('p_region_id_kelurahan_wp','nama_kelurahan_wp',kec_wp);
    });
    //--
    $("#btn-lov-kota-owner").on('click', function() {   
        modal_lov_kota_show('p_region_id_owner','nama_kota_owner');
    });

    $('#p_region_id_owner').on('change', function() {
        $('#p_region_id_kecamatan_owner').val('');
        $('#nama_kecamatan_owner').val('');
        $('#p_region_id_kelurahan_owner').val('');
        $('#nama_kelurahan_owner').val('');
    });

    $("#btn-lov-kecamatan-owner").on('click', function() { 
        var kota_owner = $('#p_region_id_owner').val(); 
        //alert(kota);
        if( kota_owner == null || kota_owner == ''){
            swal({title: "Error!", text: "Isi Kota/Kabupaten Terlebih Dahulu", html: true, type: "error"});
            return;
        }
         modal_lov_kecamatan_show('p_region_id_kecamatan_owner','nama_kecamatan_owner',kota_owner);
        
    });

    $('#p_region_id_kecamatan_owner').on('change', function() {
        $('#p_region_id_kelurahan_owner').val('');
        $('#nama_kelurahan_owner').val('');
    });

    $("#btn-lov-kelurahan-owner").on('click', function() { 
        var kec_owner = $('#p_region_id_kecamatan_owner').val();
        if( kec_owner == null || kec_owner == ''){
            swal({title: "Error!", text: "Isi Kecamatan Terlebih Dahulu", html: true, type: "error"});
             return;
        }
        modal_lov_kelurahan_show('p_region_id_kelurahan_owner','nama_kelurahan_owner',kec_owner);
    });

    $("#btn-lov-job_position").on('click', function() {   
        modal_job_position_show('p_job_position_id','nama_jabatan');
    });

    $('#update').on('click', function (event){
        save();
    });

    $('#batal').on('click', function (event){
        loadContentWithParams("data_master.t_cust_account_update", {
            t_customer_id: $('#t_customer_id').val(),
            t_cust_account_id: $('#t_cust_account_id').val(),
        
        });
    });

    function save(){
        var t_cust_account_id           = $('#t_cust_account_id').val();
        var t_customer_id               = $('#t_customer_id').val();
        var npwd                        = $('#npwd').val();
        var p_vat_type_id               = $('#form_vat_id').val();
        var p_vat_type_dtl_id           = $('#form_vat_dtl_id').val();
        var activation_no               = $('#activation_no').val();
        var company_name                = $('#company_name').val();
        var address_name                = $('#address_name').val();
        var address_no                  = $('#address_no').val();
        var address_rt                  = $('#address_rt').val();
        var address_rw                  = $('#address_rw').val();
        var p_region_id                 = $('#p_region_id_perusahaan').val();
        var p_region_id_kecamatan       = $('#p_region_id_kecamatan').val();
        var p_region_id_kelurahan       = $('#p_region_id_kelurahan').val();
        var phone_no                    = $('#phone_no').val();
        var mobile_no                   = $('#mobile_no').val();
        var fax_no                      = $('#fax_no').val();
        var zip_code                    = $('#zip_code').val();
        var company_brand               = $('#company_brand').val();
        var brand_address_name          = $('#brand_address_name').val();
        var brand_address_no            = $('#brand_address_no').val();
        var brand_address_rt            = $('#brand_address_rt').val();
        var brand_address_rw            = $('#brand_address_rw').val();
        var brand_p_region_id           = $('#p_region_id_dagang').val();
        var brand_p_region_id_kec       = $('#p_region_id_kecamatan_dagang').val();
        var brand_p_region_id_kel       = $('#p_region_id_kelurahan_dagang').val();
        var brand_phone_no              = $('#brand_phone_no').val();
        var brand_mobile_no             = $('#brand_mobile_no').val();
        var brand_fax_no                = $('#brand_fax_no').val();
        var brand_zip_code              = $('#brand_zip_code').val();
        var wp_name                     = $('#wp_name').val();
        var wp_address_name             = $('#wp_address_name').val();
        var wp_address_no               = $('#wp_address_no').val();
        var wp_address_rt               = $('#wp_address_rt').val();
        var wp_address_rw               = $('#wp_address_rw').val();
        var wp_p_region_id              = $('#p_region_id_wp').val();
        var wp_p_region_id_kecamatan    = $('#p_region_id_kecamatan_wp').val();
        var wp_p_region_id_kelurahan    = $('#p_region_id_kelurahan_wp').val();
        var wp_phone_no                 = $('#wp_phone_no').val();
        var wp_mobile_no                = $('#wp_mobile_no').val();
        var wp_email                    = $('#wp_email').val();
        var wp_fax_no                   = $('#wp_fax_no').val();
        var wp_zip_code                 = $('#wp_zip_code').val();
        var company_owner               = $('#company_owner').val();
        var p_job_position_id           = $('#p_job_position_id').val();
        var address_name_owner          = $('#address_name_owner').val();
        var address_no_owner            = $('#address_no_owner').val();
        var address_rt_owner            = $('#address_rt_owner').val();
        var address_rw_owner            = $('#address_rw_owner').val();
        var p_region_id_owner           = $('#p_region_id_owner').val();
        var p_region_id_kec_owner       = $('#p_region_id_kecamatan_owner').val();
        var p_region_id_kel_owner       = $('#p_region_id_kelurahan_owner').val();
        var phone_no_owner              = $('#phone_no_owner').val();
        var fax_no_owner                = $('#fax_no_owner').val();
        var mobile_no_owner             = $('#mobile_no_owner').val();
        var email_address               = $('#email_address').val();
        var zip_code_owner              = $('#zip_code_owner').val();

        var var_url = "<?php echo WS_JQGRID . "data_master.t_cust_account_update_controller/update/?"; ?>";

        var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";

        var_url += "&t_cust_account_id=" + t_cust_account_id;
        var_url += "&t_customer_id=" + t_customer_id;
        var_url += "&npwd=" + npwd;
        var_url += "&p_vat_type_id=" + p_vat_type_id;
        var_url += "&p_vat_type_dtl_id=" + p_vat_type_dtl_id;
        var_url += "&activation_no=" + activation_no;
        var_url += "&company_name=" + company_name;
        var_url += "&address_name=" + address_name;
        var_url += "&address_no=" + address_no;
        var_url += "&address_rt=" + address_rt;
        var_url += "&address_rw=" + address_rw;
        var_url += "&p_region_id=" + p_region_id;
        var_url += "&p_region_id_kecamatan=" + p_region_id_kecamatan;
        var_url += "&p_region_id_kelurahan=" + p_region_id_kelurahan;
        var_url += "&phone_no=" + phone_no;
        var_url += "&mobile_no=" + mobile_no;
        var_url += "&fax_no=" + fax_no;
        var_url += "&zip_code=" + zip_code;

        var_url += "&company_brand=" + company_brand;
        var_url += "&brand_address_name=" + brand_address_name;
        var_url += "&brand_address_no=" + brand_address_no;
        var_url += "&brand_address_rt=" + brand_address_rt;
        var_url += "&brand_address_rw=" + brand_address_rw;
        var_url += "&brand_p_region_id=" + brand_p_region_id;
        var_url += "&brand_p_region_id_kec=" + brand_p_region_id_kec;
        var_url += "&brand_p_region_id_kel=" + brand_p_region_id_kel;
        var_url += "&brand_phone_no=" + brand_phone_no;
        var_url += "&brand_mobile_no=" + brand_mobile_no;
        var_url += "&brand_fax_no=" + brand_fax_no;
        var_url += "&brand_zip_code=" + brand_zip_code;

        var_url += "&wp_name=" + wp_name;
        var_url += "&wp_address_name=" + wp_address_name;
        var_url += "&wp_address_no=" + wp_address_no;
        var_url += "&wp_address_rt=" + wp_address_rt;
        var_url += "&wp_address_rw=" + wp_address_rw;
        var_url += "&wp_p_region_id=" + wp_p_region_id;
        var_url += "&wp_p_region_id_kecamatan=" + wp_p_region_id_kecamatan;
        var_url += "&wp_p_region_id_kelurahan=" + wp_p_region_id_kelurahan;
        var_url += "&wp_phone_no=" + wp_phone_no;
        var_url += "&wp_mobile_no=" + wp_mobile_no;
        var_url += "&wp_email=" + wp_email;
        var_url += "&wp_fax_no=" + wp_fax_no;
        var_url += "&wp_zip_code=" + wp_zip_code;

        var_url += "&company_owner=" + company_owner;
        var_url += "&p_job_position_id=" + p_job_position_id;
        var_url += "&address_name_owner=" + address_name_owner;
        var_url += "&address_no_owner=" + address_no_owner;
        var_url += "&address_rt_owner=" + address_rt_owner;
        var_url += "&address_rw_owner=" + address_rw_owner;
        var_url += "&p_region_id_owner=" + p_region_id_owner;
        var_url += "&p_region_id_kec_owner=" + p_region_id_kec_owner;
        var_url += "&p_region_id_kel_owner=" + p_region_id_kel_owner;
        var_url += "&phone_no_owner=" + phone_no_owner;
        var_url += "&fax_no_owner=" + fax_no_owner;
        var_url += "&mobile_no_owner=" + mobile_no_owner;
        var_url += "&email_address=" + email_address;
        var_url += "&zip_code_owner=" + zip_code_owner;

        $.getJSON(var_url, function() {
            loadContentWithParams("data_master.t_cust_account_update", {
                t_customer_id: $('#t_customer_id').val(),
                t_cust_account_id: $('#t_cust_account_id').val(),
            
            });
            
        })


    }
</script>     