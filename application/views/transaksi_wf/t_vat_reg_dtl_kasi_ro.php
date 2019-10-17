<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Data Izin dan Potensi</span>
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
                        <strong> FORMULIR PENDAFTARAN </strong>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong> DATA IZIN DAN POTENSI </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong> DOKUMEN PENDUKUNG </strong>
                    </a>
                </li>
                 <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-4">
                        <i class="blue"></i>
                        <strong> LOG AKTIFITAS </strong>
                    </a>
                </li>
            </ul>
        </div>

        <div class="space-4"></div>
    <!-- parameter untuk kembali ke workflow summary -->
    <input type="hidden" id="order_no" value="<?php echo $this->input->post('order_no'); ?>" />
    <input type="hidden" id="order_date" value="<?php echo $this->input->post('order_date'); ?>" />
    <input type="hidden" id="p_rqst_type_id" value="<?php echo $this->input->post('p_rqst_type_id'); ?>" />
    <input type="hidden" id="t_vat_registration_id" value="<?php echo $this->input->post('t_vat_registration_id'); ?>" />

    <input type="hidden" id="TEMP_ELEMENT_ID" value="<?php echo $this->input->post('ELEMENT_ID'); ?>" />
    <input type="hidden" id="TEMP_PROFILE_TYPE" value="<?php echo $this->input->post('PROFILE_TYPE'); ?>" />
    <input type="hidden" id="TEMP_P_W_DOC_TYPE_ID" value="<?php echo $this->input->post('P_W_DOC_TYPE_ID'); ?>" />
    <input type="hidden" id="TEMP_P_W_PROC_ID" value="<?php echo $this->input->post('P_W_PROC_ID'); ?>" />
    <input type="hidden" id="TEMP_USER_ID" value="<?php echo $this->input->post('USER_ID'); ?>" />
    <input type="hidden" id="TEMP_FSUMMARY" value="<?php echo $this->input->post('FSUMMARY'); ?>" />
    <!-- end type hidden -->

    <!-- paramater untuk kebutuhan submit dan status -->
    <input type="hidden" id="CURR_DOC_ID" value="<?php echo $this->input->post('CURR_DOC_ID'); ?>">
    <input type="hidden" id="CURR_DOC_TYPE_ID" value="<?php echo $this->input->post('CURR_DOC_TYPE_ID'); ?>">
    <input type="hidden" id="CURR_PROC_ID" value="<?php echo $this->input->post('CURR_PROC_ID'); ?>">
    <input type="hidden" id="CURR_CTL_ID" value="<?php echo $this->input->post('CURR_CTL_ID'); ?>">
    <input type="hidden" id="USER_ID_DOC" value="<?php echo $this->input->post('USER_ID_DOC'); ?>">
    <input type="hidden" id="USER_ID_DONOR" value="<?php echo $this->input->post('USER_ID_DONOR'); ?>">
    <input type="hidden" id="USER_ID_LOGIN" value="<?php echo $this->input->post('USER_ID_LOGIN'); ?>">
    <input type="hidden" id="USER_ID_TAKEN" value="<?php echo $this->input->post('USER_ID_TAKEN'); ?>">
    <input type="hidden" id="IS_CREATE_DOC" value="<?php echo $this->input->post('IS_CREATE_DOC'); ?>">
    <input type="hidden" id="IS_MANUAL" value="<?php echo $this->input->post('IS_MANUAL'); ?>">
    <input type="hidden" id="CURR_PROC_STATUS" value="<?php echo $this->input->post('CURR_PROC_STATUS'); ?>">
    <input type="hidden" id="CURR_DOC_STATUS" value="<?php echo $this->input->post('CURR_DOC_STATUS'); ?>">
    <input type="hidden" id="PREV_DOC_ID" value="<?php echo $this->input->post('PREV_DOC_ID'); ?>">
    <input type="hidden" id="PREV_DOC_TYPE_ID" value="<?php echo $this->input->post('PREV_DOC_TYPE_ID'); ?>">
    <input type="hidden" id="PREV_PROC_ID" value="<?php echo $this->input->post('PREV_PROC_ID'); ?>">
    <input type="hidden" id="PREV_CTL_ID" value="<?php echo $this->input->post('PREV_CTL_ID'); ?>">
    <input type="hidden" id="SLOT_1" value="<?php echo $this->input->post('SLOT_1'); ?>">
    <input type="hidden" id="SLOT_2" value="<?php echo $this->input->post('SLOT_2'); ?>">
    <input type="hidden" id="SLOT_3" value="<?php echo $this->input->post('SLOT_3'); ?>">
    <input type="hidden" id="SLOT_4" value="<?php echo $this->input->post('SLOT_4'); ?>">
    <input type="hidden" id="SLOT_5" value="<?php echo $this->input->post('SLOT_5'); ?>">
    <input type="hidden" id="MESSAGE" value="<?php echo $this->input->post('MESSAGE'); ?>">
    <input type="hidden" id="PROFILE_TYPE" value="<?php echo $this->input->post('PROFILE_TYPE'); ?>">
    <input type="hidden" id="ACTION_STATUS" value="<?php echo $this->input->post('ACTION_STATUS'); ?>">
    <!-- end type hidden -->

        <div class="tab-content no-border">
            <div class="row" id="grid-tbl-letter">
                <div class="col-md-12">
                    <table id="grid-table"></table>
                    <div id="grid-pager"></div>
                </div>
            </div>
            <div class="space-4"></div>
            <div class="row" id="grid-tbl-employee">
                <div class="col-md-12">
                    <table id="grid-table1"></table>
                    <div id="grid-pager1"></div>
                </div>
            </div>
            <div class="space-4"></div>
            <div class="row" id="grid-tbl-restaurant">
                <div class="col-md-12">
                    <table id="grid-table2"></table>
                    <div id="grid-pager2"></div>
                </div>
            </div>
            <div class="row" id="grid-tbl-hotel">
                <div class="col-md-12">
                    <table id="grid-table3"></table>
                    <div id="grid-pager3"></div>
                </div>
            </div>
            <div class="row" id="grid-tbl-hiburan">
                <div class="col-md-12">
                    <table id="grid-table4"></table>
                    <div id="grid-pager4"></div>
                </div>
            </div>
            <div class="row" id="grid-tbl-parkir">
                <div class="col-md-12">
                    <table id="grid-table5"></table>
                    <div id="grid-pager5"></div>
                </div>
            </div>
            <div class="row" id="grid-tbl-ppj">
                <div class="col-md-12">
                    <table id="grid-table6"></table>
                    <div id="grid-pager6"></div>
                </div>
            </div>
            <div class="row" id="grid-tbl-ppj-npl">
                <div class="col-md-12">
                    <table id="grid-table7"></table>
                    <div id="grid-pager7"></div>
                </div>
            </div>
            <div class="row" id="grid-tbl-hotel-srvc">
                <div class="col-md-12">
                    <table id="grid-table8"></table>
                    <div id="grid-pager8"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <input type="hidden" id="entertainment_desc_temp">
    <input type="hidden" id="service_type_desc_temp">
</div>

<script>
    //ketika semua halaman sudah diload

    /**
        Mengambil data Jenis Pajak (vat_code)
    **/
    $(function() {
        var t_vat_registration_id = <?php echo $this->input->post('t_vat_registration_id'); ?>;
        var p_rqst_type_id = <?php echo $this->input->post('p_rqst_type_id'); ?>;
        $.ajax({
            url: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_entertaintment_controller/readEnterDesc"; ?>',
            type: "POST",
            dataType: 'json',
            data: {t_vat_registration_id: t_vat_registration_id},
            success: function (data) {

                if(p_rqst_type_id == 1) {

                }else if(p_rqst_type_id == 2) {
                    $('#service_type_desc_temp').val(data.rows.vat_code);
                }else if(p_rqst_type_id == 3) { //hiburan
                    $('#entertainment_desc_temp').val(data.rows.vat_code);
                }else if(p_rqst_type_id == 4) {
                    
                }else if(p_rqst_type_id == 5) {
                    
                }
                
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
        });

    });
</script>


<script>
    var reqId =<?php echo $_POST['p_rqst_type_id'];?>;
    // alert(reqId);
    $("#grid-tbl-letter").show();
    $("#grid-tbl-employee").show();
    $("#grid-tbl-ppj").hide();
    $("#grid-tbl-ppj-npl").hide();
    $("#grid-tbl-hotel").hide();
    $("#grid-tbl-hiburan").hide();
    $("#grid-tbl-parkir").hide();
    $("#grid-tbl-hotel-srvc").hide();
    $("#grid-tbl-restaurant").hide();

    if (reqId==1){
        $("#grid-tbl-letter").show();
        $("#grid-tbl-employee").show();
        $("#grid-tbl-hotel-srvc").show();
        $("#grid-tbl-hotel").show();
        $("#grid-tbl-parkir").hide();
        $("#grid-tbl-restaurant").hide();
        $("#grid-tbl-hiburan").hide();
        $("#grid-tbl-ppj").hide();
        $("#grid-tbl-ppj-npl").hide();
    }  if (reqId==2){
        $("#grid-tbl-letter").show();
        $("#grid-tbl-employee").show();
        $("#grid-tbl-restaurant").show();
        $("#grid-tbl-hotel").hide();
        $("#grid-tbl-hiburan").hide();
        $("#grid-tbl-parkir").hide();
        $("#grid-tbl-ppj").hide();
        $("#grid-tbl-ppj-npl").hide();
        $("#grid-tbl-hotel-srvc").hide();
    }  if (reqId==3){
        $("#grid-tbl-letter").show();
        $("#grid-tbl-employee").show();
        $("#grid-tbl-hiburan").show();
        $("#grid-tbl-hotel").hide();
        $("#grid-tbl-parkir").hide();
        $("#grid-tbl-ppj").hide();
        $("#grid-tbl-ppj-npl").hide();
        $("#grid-tbl-hotel-srvc").hide();
        $("#grid-tbl-restaurant").hide();      
    }  
    if (reqId==4){
        $("#grid-tbl-letter").show();
        $("#grid-tbl-employee").show();
        $("#grid-tbl-parkir").show();
        $("#grid-tbl-hotel").hide();
        $("#grid-tbl-hiburan").hide();
        $("#grid-tbl-ppj").hide();
        $("#grid-tbl-ppj-npl").hide();
        $("#grid-tbl-hotel-srvc").hide();
        $("#grid-tbl-restaurant").hide();
    }  
    if (reqId==5){
        $("#grid-tbl-letter").show();
        $("#grid-tbl-employee").show();
        $("#grid-tbl-ppj").show();
        $("#grid-tbl-ppj-npl").show();
        $("#grid-tbl-hotel").hide();
        $("#grid-tbl-hiburan").hide();
        $("#grid-tbl-parkir").hide();
        $("#grid-tbl-hotel-srvc").hide();
        $("#grid-tbl-restaurant").hide();
    }


</script>

<script>
$("#tab-1").on("click", function(event) {
    event.stopPropagation();
    loadContentWithParams("transaksi_wf.t_vat_registration_kasi_ro", { //model yang ketiga
            t_customer_order_id: $( "#CURR_DOC_ID" ).val(),
            order_no: $('#order_no').val(),
            order_date:$('#order_date').val(),
            p_rqst_type_id: $("#p_rqst_type_id").val(),
            t_vat_registration_id: $( "#t_vat_registration_id" ).val(),
            ELEMENT_ID : $('#TEMP_ELEMENT_ID').val(),
            PROFILE_TYPE : $('#TEMP_PROFILE_TYPE').val(),
            P_W_DOC_TYPE_ID : $('#TEMP_P_W_DOC_TYPE_ID').val(),
            P_W_PROC_ID : $('#TEMP_P_W_PROC_ID').val(),
            USER_ID : $('#TEMP_USER_ID').val(),
            FSUMMARY : $('#TEMP_FSUMMARY').val(),
            CURR_DOC_ID : $('#CURR_DOC_ID').val(),
            CURR_DOC_TYPE_ID : $('#CURR_DOC_TYPE_ID').val(),
            CURR_PROC_ID : $('#CURR_PROC_ID').val(),
            CURR_CTL_ID : $('#CURR_CTL_ID').val(),
            USER_ID_DOC : $('#USER_ID_DOC').val(),
            USER_ID_DONOR : $('#USER_ID_DONOR').val(),
            USER_ID_LOGIN : $('#USER_ID_LOGIN').val(),
            USER_ID_TAKEN : $('#USER_ID_TAKEN').val(),
            IS_CREATE_DOC : $('#IS_CREATE_DOC').val(),
            IS_MANUAL : $('#IS_MANUAL').val(),
            CURR_PROC_STATUS : $('#CURR_PROC_STATUS').val(),
            CURR_DOC_STATUS : $('#CURR_DOC_STATUS').val(),
            PREV_DOC_ID : $('#PREV_DOC_ID').val(),
            PREV_DOC_TYPE_ID : $('#PREV_DOC_TYPE_ID').val(),
            PREV_PROC_ID : $('#PREV_PROC_ID').val(),
            PREV_CTL_ID : $('#PREV_CTL_ID').val(),
            SLOT_1 : $('#SLOT_1').val(),
            SLOT_2 : $('#SLOT_2').val(),
            SLOT_3 : $('#SLOT_3').val(),
            SLOT_4 : $('#SLOT_4').val(),
            SLOT_5 : $('#SLOT_5').val(),
            MESSAGE : $('#MESSAGE').val(),
            PROFILE_TYPE : $('#PROFILE_TYPE').val(),
            ACTION_STATUS : $('#ACTION_STATUS').val()
            
        });
});

$("#tab-3").on("click", function(event) {

    event.stopPropagation();
    loadContentWithParams("transaksi_wf.t_cust_order_legal_doc_kasi_ro", { //model yang ketiga
            t_customer_order_id: $( "#CURR_DOC_ID" ).val(),
            order_no: $('#order_no').val(),
            order_date:$('#order_date').val(),
            p_rqst_type_id: $("#p_rqst_type_id").val(),
            t_vat_registration_id: $( "#t_vat_registration_id" ).val(),
            ELEMENT_ID : $('#TEMP_ELEMENT_ID').val(),
            PROFILE_TYPE : $('#TEMP_PROFILE_TYPE').val(),
            P_W_DOC_TYPE_ID : $('#TEMP_P_W_DOC_TYPE_ID').val(),
            P_W_PROC_ID : $('#TEMP_P_W_PROC_ID').val(),
            USER_ID : $('#TEMP_USER_ID').val(),
            FSUMMARY : $('#TEMP_FSUMMARY').val(),
            CURR_DOC_ID : $('#CURR_DOC_ID').val(),
            CURR_DOC_TYPE_ID : $('#CURR_DOC_TYPE_ID').val(),
            CURR_PROC_ID : $('#CURR_PROC_ID').val(),
            CURR_CTL_ID : $('#CURR_CTL_ID').val(),
            USER_ID_DOC : $('#USER_ID_DOC').val(),
            USER_ID_DONOR : $('#USER_ID_DONOR').val(),
            USER_ID_LOGIN : $('#USER_ID_LOGIN').val(),
            USER_ID_TAKEN : $('#USER_ID_TAKEN').val(),
            IS_CREATE_DOC : $('#IS_CREATE_DOC').val(),
            IS_MANUAL : $('#IS_MANUAL').val(),
            CURR_PROC_STATUS : $('#CURR_PROC_STATUS').val(),
            CURR_DOC_STATUS : $('#CURR_DOC_STATUS').val(),
            PREV_DOC_ID : $('#PREV_DOC_ID').val(),
            PREV_DOC_TYPE_ID : $('#PREV_DOC_TYPE_ID').val(),
            PREV_PROC_ID : $('#PREV_PROC_ID').val(),
            PREV_CTL_ID : $('#PREV_CTL_ID').val(),
            SLOT_1 : $('#SLOT_1').val(),
            SLOT_2 : $('#SLOT_2').val(),
            SLOT_3 : $('#SLOT_3').val(),
            SLOT_4 : $('#SLOT_4').val(),
            SLOT_5 : $('#SLOT_5').val(),
            MESSAGE : $('#MESSAGE').val(),
            PROFILE_TYPE : $('#PROFILE_TYPE').val(),
            ACTION_STATUS : $('#ACTION_STATUS').val()
            
        });
});

$("#tab-4").on("click", function(event) {
        event.stopPropagation();
        loadContentWithParams("transaksi_wf.t_order_log_kronologis_kasi_ro", { //model yang ketiga
            t_customer_order_id: $( "#CURR_DOC_ID" ).val(),
            order_no: $('#order_no').val(),
            order_date:$('#order_date').val(),
            p_rqst_type_id: $("#p_rqst_type_id").val(),
            t_vat_registration_id: $( "#t_vat_registration_id" ).val(),
            ELEMENT_ID : $('#TEMP_ELEMENT_ID').val(),
            PROFILE_TYPE : $('#TEMP_PROFILE_TYPE').val(),
            P_W_DOC_TYPE_ID : $('#TEMP_P_W_DOC_TYPE_ID').val(),
            P_W_PROC_ID : $('#TEMP_P_W_PROC_ID').val(),
            USER_ID : $('#TEMP_USER_ID').val(),
            FSUMMARY : $('#TEMP_FSUMMARY').val(),
            CURR_DOC_ID : $('#CURR_DOC_ID').val(),
            CURR_DOC_TYPE_ID : $('#CURR_DOC_TYPE_ID').val(),
            CURR_PROC_ID : $('#CURR_PROC_ID').val(),
            CURR_CTL_ID : $('#CURR_CTL_ID').val(),
            USER_ID_DOC : $('#USER_ID_DOC').val(),
            USER_ID_DONOR : $('#USER_ID_DONOR').val(),
            USER_ID_LOGIN : $('#USER_ID_LOGIN').val(),
            USER_ID_TAKEN : $('#USER_ID_TAKEN').val(),
            IS_CREATE_DOC : $('#IS_CREATE_DOC').val(),
            IS_MANUAL : $('#IS_MANUAL').val(),
            CURR_PROC_STATUS : $('#CURR_PROC_STATUS').val(),
            CURR_DOC_STATUS : $('#CURR_DOC_STATUS').val(),
            PREV_DOC_ID : $('#PREV_DOC_ID').val(),
            PREV_DOC_TYPE_ID : $('#PREV_DOC_TYPE_ID').val(),
            PREV_PROC_ID : $('#PREV_PROC_ID').val(),
            PREV_CTL_ID : $('#PREV_CTL_ID').val(),
            SLOT_1 : $('#SLOT_1').val(),
            SLOT_2 : $('#SLOT_2').val(),
            SLOT_3 : $('#SLOT_3').val(),
            SLOT_4 : $('#SLOT_4').val(),
            SLOT_5 : $('#SLOT_5').val(),
            MESSAGE : $('#MESSAGE').val(),
            PROFILE_TYPE : $('#PROFILE_TYPE').val(),
            ACTION_STATUS : $('#ACTION_STATUS').val()
            
        });
    });

</script>

<?php $this->load->view('lov/lov_p_license_type'); ?>

<?php $this->load->view('lov/lov_p_pwr_classification'); ?>

<?php $this->load->view('lov/lov_p_room_type'); ?>

<?php $this->load->view('lov/lov_job_position'); ?>

<!--- GRID TABEL SURAT IZIN-->
<script>
    $(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        $("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_controller/crud"; ?>',
            datatype: "json",
            postData:{t_vat_registration_id:<?php echo $this->input->post('t_vat_registration_id'); ?>},
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_license_letter_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID', name: 't_vat_registration_id',  width: 5, sorttype: 'number', hidden: true, editable:true},
                {label: 'No. Surat',name: 'license_no',width: 250, align: "left",editable: true, editrules:{required:true}},
                {label: 'Jenis Surat',name: 'license_type_code',width: 150, align: "left",editable: false},
                {label: 'Jenis Surat',
                    name: 'p_license_type_id',
                    width: 100,
                    sortable: true,
                    editable: true,
                    hidden: true,
                    editrules: {edithidden: true, required:false},
                    edittype: 'custom',
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            // give the editor time to initialize
                            setTimeout( function() {
                                elm.append('<input id="form_p_license_type_id" type="text" style="display:none;" >'+
                                        '<input id="form_license_type_code" name="license_type_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Jenis Surat" required=true>'+
                                        '<button class="btn btn-success" type="button" onclick="showLOVLicenseType(\'form_p_license_type_id\',\'form_license_type_code\')">'+
                                        '   <span class="fa fa-search bigger-110"></span>'+
                                        '</button>');
                                $("#form_p_license_type_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {

                            if(oper === 'get') {
                                return $("#form_p_license_type_id").val();
                            } else if( oper === 'set') {
                                $("#form_p_license_type_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'license_type_code');
                                        $("#form_license_type_code").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                },
                {label: 'Berlaku Dari ',name: 'valid_from',width: 150, align: "left",editable: true,
                    editoptions: {
                         dataInit: function (element) {
                                $(element).datepicker({
                                    id: 'valid_fromPicker',
                                    autoclose: true,
                                    format: 'yyyy-mm-dd',
                                    orientation : 'top',
                                    todayHighlight : true,
                                    showOn: 'focus'
                                    //minDate :0
                                    
                                });
                            }
                    }
                },
                {label: 'Berlaku Sampai',name: 'valid_to',width: 250, align: "left",editable: true,
                    editoptions: {
                         dataInit: function (element) {
                                $(element).datepicker({
                                    id: 'valid_toPicker',
                                    autoclose: true,
                                    format: 'yyyy-mm-dd',
                                    orientation : 'top',
                                    todayHighlight : true,
                                    showOn: 'focus'
                                    //minDate :0
                                    
                                });
                            }
                    }
                },
                {label: 'Deskripsi',name: 'description',width: 150, align: "left",editable: true, edittype: 'textarea',
                    editoptions: {
                        size: 50,
                        maxlength:255
                    },
                    editrules: {required: false}
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
            //memanggil controller jqgrid yang ada di controller read
            editurl: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_controller/crud"; ?>',
            caption: "Daftar Surat Izin yang Dimiliki"

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
                    //reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
                editData : {
                    t_vat_registration_id: function() {
                        return <?php echo $this->input->post('t_vat_registration_id'); ?>;
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
                    setTimeout(function() {
                    clearInputRqstType();
                     },100);
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
                    clearInputRqstType();
                    //reloadTreeMenu();


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
</script>

<!--- GRID TABEL POTENSI PEGAWAI-->
<script>
    $(function($) {
        var grid_selector = "#grid-table1";
        var pager_selector = "#grid-pager1";

        $("#grid-table1").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_vat_reg_employee_controller/crud"; ?>',
            datatype: "json",
            postData:{t_vat_registration_id:<?php echo $this->input->post('t_vat_registration_id'); ?>},
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_vat_reg_employee_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID', name: 't_vat_registration_id',  width: 5, sorttype: 'number', hidden: true, editable:true},
                {label: 'Jabatan',name: 'jabatan',width: 150, align: "left",editable: false},
                {label: 'Jabatan',
                    name: 'p_job_position_id',
                    width: 100,
                    sortable: true,
                    editable: true,
                    hidden: true,
                    editrules: {edithidden: true, required:false},
                    edittype: 'custom',
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            // give the editor time to initialize
                            setTimeout( function() {
                                elm.append('<input id="form_p_job_position_id" type="text" style="display:none;" >'+
                                        '<input id="form_jabatan_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Jenis Jabatan" required=true>'+
                                        '<button class="btn btn-success" type="button" onclick="showLOVJobPosition(\'form_p_job_position_id\',\'form_jabatan_code\')">'+
                                        '   <span class="fa fa-search bigger-110"></span>'+
                                        '</button>');
                                $("#form_p_job_position_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {

                            if(oper === 'get') {
                                return $("#form_p_job_position_id").val();
                            } else if( oper === 'set') {
                                $("#form_p_job_position_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'jabatan');
                                        $("#form_jabatan_code").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                },
                {label: 'Jumlah Pegawai',name: 'employee_qty',width: 250, align: "right",editable: true,
                    editrules: {required: true},
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}
                },
                {label: 'Gaji Pegawai ',name: 'employee_salery',width: 150, align: "right",editable: true,
                    editrules: {required: true},
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}
                },
                {label: 'Deskripsi',name: 'description',width: 150, align: "left",editable: true, edittype: 'textarea',
                    editoptions: {
                        size: 50,
                        maxlength:255
                    },
                    editrules: {required: false}
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
            pager: '#grid-pager1',
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
            //memanggil controller jqgrid yang ada di controller read
            editurl: '<?php echo WS_JQGRID."transaksi.t_vat_reg_employee_controller/crud"; ?>',
            caption: "Daftar Potensi Pegawai"

        });

        jQuery('#grid-table1').jqGrid('navGrid', '#grid-pager1',
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
                    //reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
                editData : {
                    t_vat_registration_id: function() {
                        return <?php echo $this->input->post('t_vat_registration_id'); ?>;
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
                    setTimeout(function() {
                    clearInputRqstType();
                     },100);
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
                    clearInputRqstType();
                    //reloadTreeMenu();


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
</script>

<!--- GRID TABEL POTENSI RESTORAN-->
<script>
    $(function($) {
        var grid_selector = "#grid-table2";
        var pager_selector = "#grid-pager2";

        $("#grid-table2").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_restaurant_controller/crud"; ?>',
            datatype: "json",
            postData:{t_vat_registration_id:<?php echo $this->input->post('t_vat_registration_id'); ?>},
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_vat_reg_dtl_restaurant_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID', name: 't_vat_registration_id',  width: 5, sorttype: 'number', hidden: true, editable:true},
                {label: 'Jenis Pelayanan',name: 'service_type_desc',width: 150, align: "left",editable: true,
                    editoptions: {
                        readonly:true
                    },
                    editrules: {required: false}
                },
                {label: 'Jumlah Kursi',name: 'seat_qty',width: 150, align: "left",editable: true,
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'},
                    editrules: {required: true}
                },
                {label: 'Jumlah Meja ',name: 'table_qty',width: 150, align: "left",editable: true,
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'},
                    editrules: {required: true}
                },
                {label: 'Daya Tampung ',name: 'max_service_qty',width: 150, align: "left",editable: true,
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'},
                    editrules: {required: true}
                },
                {label: 'Jumlah pengunjung rata-rata per Bulan',name: 'avg_subscription',width: 250, align: "left",editable: true,
                    editoptions: {
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },
                    editrules: {required: true},
                    formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}
                    
                },
                {label: 'Deskripsi',name: 'description',width: 150, align: "left",editable: true, edittype: 'textarea',
                    editoptions: {
                        size: 50,
                        maxlength:255
                    },
                    editrules: {required: false}
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
            pager: '#grid-pager2',
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
            //memanggil controller jqgrid yang ada di controller read
            editurl: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_restaurant_controller/crud"; ?>',
            caption: "Daftar Pajak Restoran"

        });

        jQuery('#grid-table2').jqGrid('navGrid', '#grid-pager2',
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
                    //reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
                editData : {
                    t_vat_registration_id: function() {
                        return <?php echo $this->input->post('t_vat_registration_id'); ?>;
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
                    $('#service_type_desc').val($('#service_type_desc_temp').val());
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
                    clearInputRqstType();
                    //reloadTreeMenu();


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
</script>

<!--- GRID TABEL POTENSI HOTEL-->
<script>
    $(function($) {
        var grid_selector = "#grid-table3";
        var pager_selector = "#grid-pager3";

        $("#grid-table3").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_hotel_controller/crud"; ?>',
            datatype: "json",
            postData:{t_vat_registration_id:<?php echo $this->input->post('t_vat_registration_id'); ?>},
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_vat_reg_dtl_hotel_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID', name: 't_vat_registration_id',  width: 5, sorttype: 'number', hidden: true, editable:true},
                {label: 'Golongan Kamar',name: 'room_type_code',width: 150, align: "left",editable: false},
                {label: 'Golongan Kamar',
                    name: 'p_room_type_id',
                    width: 100,
                    sortable: true,
                    editable: true,
                    hidden: true,
                    editrules: {edithidden: true, required:true},
                    edittype: 'custom',
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            // give the editor time to initialize
                            setTimeout( function() {
                                elm.append('<input id="form_p_room_type_id" type="text" style="display:none;" >'+
                                        '<input id="form_room_type_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Golongan Kamar" required=true>'+
                                        '<button class="btn btn-success" type="button" onclick="showLOVRoomType(\'form_p_room_type_id\',\'form_room_type_code\')">'+
                                        '   <span class="fa fa-search bigger-110"></span>'+
                                        '</button>');
                                $("#form_p_room_type_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {

                            if(oper === 'get') {
                                return $("#form_p_room_type_id").val();
                            } else if( oper === 'set') {
                                $("#form_p_room_type_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'room_type_code');
                                        $("#form_room_type_code").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                },
                {label: 'Jumlah Kamar',name: 'room_qty',width: 250, align: "left",editable: true,editrules: {required: true},
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}
                },
                {label: 'Frekwensi Penggunaan Layanan',name: 'service_qty',width: 150, align: "left",editable: true,editrules: {required: true},
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}
                },
                {label: 'Tarif Kamar Weekend',name: 'service_charge_wd',width: 150, align: "left",editable: true,editrules: {required: true},
                    editoptions: {
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}
                },
                {label: 'Tarif non Weekend',name: 'service_charge_we',width: 150, align: "left",editable: true,editrules: {required: true},
                    editoptions: {
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}
                },
                {label: 'Deskripsi',name: 'description',width: 150, align: "left",editable: true, edittype: 'textarea',
                    editoptions: {
                        size: 50,
                        maxlength:255
                    },
                    editrules: {required: false}
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
            pager: '#grid-pager3',
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
            //memanggil controller jqgrid yang ada di controller read
            editurl: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_hotel_controller/crud"; ?>',
            caption: "Daftar Pajak Hotel"

        });

        jQuery('#grid-table3').jqGrid('navGrid', '#grid-pager3',
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
                    //reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
                editData : {
                    t_vat_registration_id: function() {
                        return <?php echo $this->input->post('t_vat_registration_id'); ?>;
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
                    setTimeout(function() {
                    clearInputRqstType();
                     },100);
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
                    clearInputRqstType();
                    //reloadTreeMenu();


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
</script>

<!--- GRID TABEL POTENSI HIBURAN-->
<script>
    $(function($) {
        var grid_selector = "#grid-table4";
        var pager_selector = "#grid-pager4";

        $("#grid-table4").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_entertaintment_controller/crud"; ?>',
            postData:{t_vat_registration_id:<?php echo $this->input->post('t_vat_registration_id'); ?>},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_vat_reg_dtl_entertaintment_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID', name: 't_vat_registration_id',  width: 5, sorttype: 'number', hidden: true, editable:true},
                {label: 'Jenis Hiburan',name: 'entertainment_desc',width: 150, align: "left",editable: true,
                    editoptions: {
                        readonly:true
                    }
                },
                {label: 'Tarif Weekend',name: 'service_charge_wd',width: 250, align: "left",editable: true,editrules: {required: true},
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}
                },
                {label: 'Tarif Non Weekend ',name: 'service_charge_we',width: 150, align: "left",editable: true,editrules: {required: true},
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}
                },
                {label: 'Jumlah Meja / Kursi',name: 'seat_qty',width: 250, align: "left",editable: true,editrules: {required: true},
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}
                },
                {label: 'Jumlah Ruangan',name: 'room_qty',width: 150, align: "left",editable: true,editrules: {required: true}
                },
                {label: 'Jumlah PL',name: 'clerk_qty',width: 250, align: "left",editable: true,editrules: {required: true},
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}
                },
                {label: 'Booking Jam',name: 'booking_hour',width: 150, align: "left",editable: true,
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}},
                {label: 'F & B',name: 'f_and_b',width: 250, align: "left",editable: true,
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}
                },
                {label: 'Porsi/Orang',name: 'portion_person',width: 250, align: "left",editable: true,
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'}
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
            shrinkToFit: false,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            sortorder:'',
            pager: '#grid-pager4',
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
            //memanggil controller jqgrid yang ada di controller read
            editurl: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_entertaintment_controller/crud"; ?>',
            caption: "Daftar Potensi Pajak Hiburan"

        });

        jQuery('#grid-table4').jqGrid('navGrid', '#grid-pager4',
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
                    //reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
                editData : {
                    t_vat_registration_id: function() {
                        return <?php echo $this->input->post('t_vat_registration_id'); ?>;
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
                    
                    $('#entertainment_desc').val($('#entertainment_desc_temp').val());
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
                    clearInputRqstType();
                    //reloadTreeMenu();


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
</script>

<!--- GRID TABEL POTENSI PARKIR-->
<script>
    $(function($) {
        var grid_selector = "#grid-table5";
        var pager_selector = "#grid-pager5";

        $("#grid-table5").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_parking_controller/crud"; ?>',
            datatype: "json",
            postData:{t_vat_registration_id:<?php echo $this->input->post('t_vat_registration_id'); ?>},
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_vat_reg_dtl_parking_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID', name: 't_vat_registration_id',  width: 5, sorttype: 'number', hidden: true, editable:true},
                {label: 'Klasifikasi Tempat Parkir',name: 'classification_desc',width: 150, align: "left",editable: false},
                {label: 'Luas Lahan Parkir',name: 'parking_size',width: 250, align: "left",editable: true,editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },editrules: {required: true}},
                {label: 'Daya Tampung',name: 'max_load_qty',width: 150, align: "left",editable: true,editrules: {required: true},
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    }
                },
                {label: 'Frekuensi Kendaraan Bermotor',name: 'avg_subscription_qty',width: 150, align: "left",editable: true,editrules: {required: true},
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    }
                },
                {label: 'Tarif Jam Pertama',name: 'first_service_charge',width: 150, align: "left",editable: true, hidden:true, editrules:{edithidden: true},
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    }
                },
                {label: 'Tarif Jam Pertama',name: 'next_service_charge',width: 150, align: "left",editable: true, hidden:true , editrules:{edithidden: true},
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    }
                },
                {label: 'Deskripsi',name: 'description',width: 150, align: "left",editable: true, hidden:true,edittype: 'textarea', 
                    editoptions: {
                        size: 50,
                        maxlength:255
                    },
                    editrules: {edithidden: true, required: false}
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
            pager: '#grid-pager5',
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
            //memanggil controller jqgrid yang ada di controller read
            editurl: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_parking_controller/crud"; ?>',
            caption: "Daftar Potensi Pajak Parkir"

        });

        jQuery('#grid-table5').jqGrid('navGrid', '#grid-pager5',
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
                    //reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
               editData : {
                    t_vat_registration_id: function() {
                        return <?php echo $this->input->post('t_vat_registration_id'); ?>;
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
                    setTimeout(function() {
                    clearInputRqstType();
                     },100);
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
                    clearInputRqstType();
                    //reloadTreeMenu();


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
</script>

<!--- GRID TABEL POTENSI PPJ PLN-->
<script>
    $(function($) {
        var grid_selector = "#grid-table6";
        var pager_selector = "#grid-pager6";

        $("#grid-table6").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_ppj_controller/crud"; ?>',
            datatype: "json",
            postData:{t_vat_registration_id:<?php echo $this->input->post('t_vat_registration_id'); ?>},
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_vat_reg_dtl_ppj_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID', name: 't_vat_registration_id',  width: 5, sorttype: 'number', hidden: true, editable:true},
                {label: 'Golongan',name: 'pwr_classification_desc',width: 150, align: "left",editable: false},
                {label: 'Golongan',
                    name: 'p_pwr_classification_id',
                    width: 100,
                    sortable: true,
                    editable: true,
                    hidden: true,
                    editrules: {edithidden: true, required:false},
                    edittype: 'custom',
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            // give the editor time to initialize
                            setTimeout( function() {
                                elm.append('<input id="form_p_pwr_classification_id" type="text" style="display:none;" >'+
                                        '<input id="form_pwr_classification_desc" name="pwr_classification_desc" readonly type="text" class="FormElement form-control" placeholder="Pilih Golongan" required=true>'+
                                        '<button class="btn btn-success" type="button" onclick="showLOVPwrClassification(\'form_p_pwr_classification_id\',\'form_pwr_classification_desc\')">'+
                                        '   <span class="fa fa-search bigger-110"></span>'+
                                        '</button>');
                                $("#form_p_pwr_classification_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {

                            if(oper === 'get') {
                                return $("#form_p_pwr_classification_id").val();
                            } else if( oper === 'set') {
                                $("#form_p_pwr_classification_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'pwr_classification_desc');
                                        $("#form_pwr_classification_desc").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                },
                {label: 'Kapasitas Daya',name: 'power_capacity',width: 250, align: "left",editable: true,
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'},editrules: {required: true}
                },
                {label: 'Harga Satuan',name: 'service_charge',width: 150, align: "left",editable: true,
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'},editrules: {required: true}
                },
                {label: 'Faktor Daya',name: 'power_factor',width: 250, align: "left",editable: true,
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'},editrules: {required: true}
                },
                {label: 'Deskripsi',name: 'description',width: 150, align: "left",editable: true, edittype: 'textarea',
                    editoptions: {
                        size: 50,
                        maxlength:255
                    },
                    editrules: {required: false}
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
            pager: '#grid-pager6',
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
            //memanggil controller jqgrid yang ada di controller read
            editurl: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_ppj_controller/crud"; ?>',
            caption: "Daftar Potensi Pajak PPJ PLN"

        });

        jQuery('#grid-table6').jqGrid('navGrid', '#grid-pager6',
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
                    //reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
               editData : {
                    t_vat_registration_id: function() {
                        return <?php echo $this->input->post('t_vat_registration_id'); ?>;
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
                    setTimeout(function() {
                    clearInputRqstType();
                     },100);
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
                    clearInputRqstType();
                    //reloadTreeMenu();


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
</script>

<!--- GRID TABEL POTENSI PPJ NON PLN-->
<script>
    $(function($) {
        var grid_selector = "#grid-table7";
        var pager_selector = "#grid-pager7";

        $("#grid-table7").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_ppj_non_pln_controller/crud"; ?>',
            datatype: "json",
            postData:{t_vat_registration_id:<?php echo $this->input->post('t_vat_registration_id'); ?>},
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_vat_reg_dtl_ppj_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID', name: 't_vat_registration_id',  width: 5, sorttype: 'number', hidden: true, editable:true},
                {label: 'Kapasitas Daya',name: 'power_capacity',width: 250, align: "left",editable: true,
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'},editrules: {required: true}
                },
                {label: 'Jumlah Pelanggan',name: 'owner_qty',width: 150, align: "left",editable: true,
                    editoptions:{
                        dataInit: function(element) {
                            $(element).keypress(function(e){
                                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                    return false;
                                 }
                            });
                        }
                    },formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:'.'},editrules: {required: true}
                },
                {label: 'Deskripsi',name: 'description',width: 150, align: "left",editable: true, edittype: 'textarea',
                    editoptions: {
                        size: 50,
                        maxlength:255
                    },
                    editrules: {required: false}
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
            pager: '#grid-pager7',
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
            //memanggil controller jqgrid yang ada di controller read
            editurl: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_ppj_non_pln_controller/crud"; ?>',
            caption: "Daftar Potensi Pajak PPJ NON PLN"

        });

        jQuery('#grid-table7').jqGrid('navGrid', '#grid-pager7',
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
                    //reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
                editData : {
                    t_vat_registration_id: function() {
                        return <?php echo $this->input->post('t_vat_registration_id'); ?>;
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
                    clearInputRqstType();
                    //reloadTreeMenu();


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
</script>

<!--- GRID TABEL POTENSI FASILITAS HOTEL-->
<script>
    $(function($) {
        var grid_selector = "#grid-table8";
        var pager_selector = "#grid-pager8";

        $("#grid-table8").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_hotel_srvc_controller/crud"; ?>',
            postData:{t_vat_registration_id:<?php echo $this->input->post('t_vat_registration_id'); ?>},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_vat_reg_dtl_hotel_srvc_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID', name: 't_vat_registration_id',  width: 5, sorttype: 'number', hidden: true, editable:true},
                {label: 'Fasilitas',name: 'services',width: 150, align: "left",editable: true,
                    editrules: {required: true}},
                {label: 'Deskripsi',name: 'description',width: 150, align: "left",editable: true, edittype: 'textarea',
                    editoptions: {
                        size: 50,
                        maxlength:255
                    },
                    editrules: {required: false}
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
            pager: '#grid-pager8',
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
            //memanggil controller jqgrid yang ada di controller read
            editurl: '<?php echo WS_JQGRID."transaksi.t_vat_reg_dtl_hotel_srvc_controller/crud"; ?>',
            caption: "Daftar Potensi Fasilitas Hotel"

        });

        jQuery('#grid-table8').jqGrid('navGrid', '#grid-pager8',
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
                    //reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
                editData : {
                    t_vat_registration_id: function() {
                        return <?php echo $this->input->post('t_vat_registration_id'); ?>;
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
                    setTimeout(function() {
                    clearInputRqstType();
                     },100);
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
                    clearInputRqstType();
                    //reloadTreeMenu();


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
</script>


<script type="text/javascript">
    function showLOVPwrClassification(id, code) {
        modal_p_pwr_classification_show(id, code);
    }
    function showLOVLicenseType(id, code) {
        modal_p_license_type_show(id, code);
    }
    function showLOVRoomType(id, code) {
        modal_p_room_type_show(id, code);
    }
    function showLOVJobPosition(id, code) {
        modal_job_position_show(id, code);
    }
</script>



