<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Pendaftaran Wajib Pajak</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                        <i class="blue"></i>
                        <strong> PENDAFTARAN WAJIB PAJAK </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong> DOKUMEN PENDUKUNG </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong> LOG AKTIVITAS </strong>
                    </a>
                </li>
            </ul>
        </div>

        <!-- parameter untuk kembali ke workflow summary -->
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

        
    </div>
</div>

<script>

$("#tab-1").on("click", function(event) {
    event.stopPropagation();
    loadContentWithParams("transaksi.t_penutupan_wp_ver",{
        t_customer_order_id: $( "#CURR_DOC_ID" ).val(),
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

$("#tab-2").on("click", function(event) {
    event.stopPropagation();
    //alert(p_rqst_type_id);
    // t_vat_reg_employee_id = $('#t_vat_reg_employee_id').val() ;
    // t_vat_reg_dtl_restaurant_id = $('#t_vat_reg_dtl_restaurant_id').val() ;
    // t_license_letter_id = $('#t_license_letter_id').val() ;

    loadContentWithParams("transaksi_wf.t_cust_order_legal_doc_ver", { //model yang ketiga
        t_customer_order_id: $( "#CURR_DOC_ID" ).val(),
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
        loadContentWithParams("transaksi_wf.t_order_log_kronologis_ver", { //model yang ketiga
            t_customer_order_id: $( "#CURR_DOC_ID" ).val(),
            order_no: $('#order_no').val(),
            order_date:$('#registration_date').val(),
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


<script type="text/javascript">
    $.ajax({
        url: "<?php echo base_url().'transaksi/hotel_grade_combo/'; ?>" ,
        type: "POST",            
        data: {},
        success: function (data) {
            $( "#hotelGrade" ).html( data );
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    $.ajax({
        url: "<?php echo base_url().'transaksi/enter_type_combo/'; ?>" ,
        type: "POST",            
        data: {},
        success: function (data) {
            $( "#entType" ).html( data );
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
    
    $.ajax({
        url: "<?php echo WS_JQGRID . "transaksi.t_penutupan_wp_controller/readro"; ?>" ,
        type: "POST", 
        datatype: "json",           
        data: {
            t_customer_order_id : "<?php echo $this->input->post('CURR_DOC_ID'); ?>"
        },
        success: function (data) {
            var data1 = data.rows;
            //alert(data.rows.order_no);

           if(data1.t_customer_order_id){

                $('#t_customer_id').val(data1.t_customer_id); 
                $('#t_cust_account_id').val(data1.t_cust_account_id); 
                $('#t_cust_acc_status_modif_id').val(data1.t_cust_acc_status_modif_id); 
                $('#order_no').val(data1.order_no); 
                $('#status_request_date').val(data1.status_request_date); 
                $('#p_rqst_type_code').val(data1.p_rqst_type_code); 
                

                $('#wp_name').val(data1.wp_name);  
                $('#wp_address_name').val(data1.wp_address_name);
                $('#company_brand').val(data1.company_brand);  
                $('#npwpd').val(data1.npwd);  
                $('#p_vat_type_code').val(data1.p_vat_type_code);
                $('#p_account_status_curr').val(data1.p_account_status_curr);  
                $('#p_account_status_mut').val(data1.p_account_status_mut);
                $('#reason_code').val(data1.reason_code);           
                $('#reason_description').val(data1.reason_description);
                $('#doc_no').val(data1.doc_no);  
                $('#bap_employee_name_1').val(data1.bap_employee_name_1);  
                $('#bap_employee_no_1').val(data1.bap_employee_no_1);
                $('#bap_employee_job_pos_1').val(data1.bap_employee_job_pos_1);  
                $('#bap_employee_name_2').val(data1.bap_employee_name_2);
                $('#bap_employee_no_2').val(data1.bap_employee_no_2);           
                $('#bap_employee_job_pos_2').val(data1.bap_employee_job_pos_2);
                
           }
            
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });


</script>


<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-3">Nomor Order</label>                
                        <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="t_customer_id" id="t_customer_id" style="display:none;">   
                            <input type="text" class="form-control" name="t_cust_account_id" id="t_cust_account_id" style="display:none;">   
                            <input type="text" class="form-control" name="t_cust_acc_status_modif_id" id="t_cust_acc_status_modif_id" style="display:none;"> 
                            <input type="text" class="form-control" name="order_no" id="order_no" readonly="true">                 
                        </div>
                    
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Tanggal Pendaftaran</label>
                        <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="status_request_date" id="status_request_date" readonly="true">                 
                        </div>                 
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Jenis Permohonan</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="p_rqst_type_code" id="p_rqst_type_code" readonly="true">
                        </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3"></label>
                    <div class="input-group col-md-6">
                        <div id="hotelGrade"></div>
                        <div id="entType"></div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nomor Order</label>
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
                    <label class="control-label col-md-3">Status WP Saat Ini</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="p_account_status_curr" id="p_account_status_curr" readonly="true">
                            <span class="input-group-addon">Status Permintaan Perubahan</span>
                            <input type="text" class="form-control" name="p_account_status_mut" id="p_account_status_mut" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Alasan Penutupan</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="reason_code" id="reason_code" readonly="true"> 
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Keterangan</label>
                    <div class="input-group col-md-6">
                        <textarea class="form-control" name="reason_description" id="reason_description" readonly="true"></textarea>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nomor BAP</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="doc_no" id="doc_no">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nama Petugas 1</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="bap_employee_name_1" id="bap_employee_name_1">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">NIP Petugas 1</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="bap_employee_no_1" id="bap_employee_no_1">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Jabatan Petugas 1</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="bap_employee_job_pos_1" id="bap_employee_job_pos_1">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nama Petugas 2</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="bap_employee_name_2" id="bap_employee_name_2">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">NIP Petugas 2</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="bap_employee_no_2" id="bap_employee_no_2">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Jabatan Petugas 2</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="bap_employee_job_pos_2" id="bap_employee_job_pos_2">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <div  class="col-sm-offset-3">
                    <button class="btn btn-danger" type="button" id="btn-sub" onclick="submitform();">SUBMIT</button>
                    <button class="btn btn-danger" type="button" id="btn-sub" onclick="save();">SIMPAN</button>
                    <button class="btn btn-danger" type="button" id="btn-kel" onclick="backform();">KEMBALI</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('workflow/lov_submitter.php'); ?>

<script type="text/javascript">

    $("#btn-view-wp").on("click", function(event) {
        cusId = $('#t_customer_id').val();
        accId = $('#t_cust_account_id').val();

        //modal_view_wp_show();

        loadContentWithParams("data_master.t_cust_account", {
            t_customer_id: cusId,
            t_cust_account_id: accId
        
        });
        
    });

    params_back_summary = {};
    params_back_summary.ELEMENT_ID = $('#TEMP_ELEMENT_ID').val();
    params_back_summary.PROFILE_TYPE = $('#TEMP_PROFILE_TYPE').val();
    params_back_summary.P_W_DOC_TYPE_ID = $('#TEMP_P_W_DOC_TYPE_ID').val();
    params_back_summary.P_W_PROC_ID = $('#TEMP_P_W_PROC_ID').val();
    params_back_summary.USER_ID = $('#TEMP_USER_ID').val();
    params_back_summary.FSUMMARY = $('#TEMP_FSUMMARY').val();

    function save(){

        var doc_no = $('#doc_no').val(); 
        var bap_employee_no_1 = $('#bap_employee_no_1').val(); 
        var bap_employee_no_2 = $('#bap_employee_no_2').val(); 
        var bap_employee_job_pos_1 = $('#bap_employee_job_pos_1').val(); 
        var bap_employee_job_pos_2 = $('#bap_employee_job_pos_2').val(); 
        var bap_employee_name_1 = $('#bap_employee_name_1').val(); 
        var bap_employee_name_2 = $('#bap_employee_name_2').val(); 
        var t_cust_acc_status_modif_id = $('#t_cust_acc_status_modif_id').val();

        //alert (bap_employee_no_1);return;

        $.ajax({
            url     : "<?php echo WS_JQGRID . "transaksi.t_penutupan_wp_controller/update"; ?>" ,
            type    : "POST", 
            datatype: "json",           
            data    :{
                        doc_no : doc_no, 
                        bap_employee_no_1 : bap_employee_no_1, 
                        bap_employee_no_2 : bap_employee_no_2, 
                        bap_employee_job_pos_1 : bap_employee_job_pos_1, 
                        bap_employee_job_pos_2 : bap_employee_job_pos_2, 
                        bap_employee_name_1 : bap_employee_name_1, 
                        bap_employee_name_2 : bap_employee_name_2, 
                        t_cust_acc_status_modif_id : t_cust_acc_status_modif_id
                    },
            success: function (data) {
                var data1 = data.rows;
                if (data1 == true){
                    swal('Informasi', 'Data Berhasil Disimpan', 'info');
                    return;
                }else{
                    swal('Peringatan', 'Data Gagal Disimpan', 'error');
                    return;
                }
                //alert(data.rows.order_no);
               
                
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
        });


    }

     /*ketika tombol cancel diklik, maka kembali ke summary*/
    function backform(){
        loadContentWithParams( $('#TEMP_FSUMMARY').val() , params_back_summary );
    };

    /* cek jika tipe view */
    if (  $('#ACTION_STATUS').val() == 'VIEW' ) {
        $('#form_customer_order_btn_submit').remove();
        $('#form_customer_order_btn_save').remove();
        $('#add_legal_doc').hide();
        $('#add_log').hide();
    }

    function submitform(){
        var params_submit = {};
        
        params_submit.CURR_DOC_ID         = $('#CURR_DOC_ID').val();  
        params_submit.CURR_DOC_TYPE_ID    = $('#CURR_DOC_TYPE_ID').val();
        params_submit.CURR_PROC_ID        = $('#CURR_PROC_ID').val();
        params_submit.CURR_CTL_ID         = $('#CURR_CTL_ID').val();
        params_submit.USER_ID_DOC         = $('#USER_ID_DOC').val();
        params_submit.USER_ID_DONOR       = $('#USER_ID_DONOR').val();
        params_submit.USER_ID_LOGIN       = $('#USER_ID_LOGIN').val();
        params_submit.USER_ID_TAKEN       = $('#USER_ID_TAKEN').val();
        params_submit.IS_CREATE_DOC       = $('#IS_CREATE_DOC').val();
        params_submit.IS_MANUAL           = $('#IS_MANUAL').val();
        params_submit.CURR_PROC_STATUS    = $('#CURR_PROC_STATUS').val();
        params_submit.CURR_DOC_STATUS     = $('#CURR_DOC_STATUS').val();
        params_submit.PREV_DOC_ID         = $('#PREV_DOC_ID').val();
        params_submit.PREV_DOC_TYPE_ID    = $('#PREV_DOC_TYPE_ID').val();
        params_submit.PREV_PROC_ID        = $('#PREV_PROC_ID').val();
        params_submit.PREV_CTL_ID         = $('#PREV_CTL_ID').val();
        params_submit.SLOT_1              = $('#SLOT_1').val();    
        params_submit.SLOT_2              = $('#SLOT_2').val(); 
        params_submit.SLOT_3              = $('#SLOT_3').val();    
        params_submit.SLOT_4              = $('#SLOT_4').val();  
        params_submit.SLOT_5              = $('#SLOT_5').val();    
        params_submit.MESSAGE             = $('#MESSAGE').val();    
        params_submit.PROFILE_TYPE        = $('#PROFILE_TYPE').val();
        params_submit.ACTION_STATUS       = $('#ACTION_STATUS').val();

        if (  $('#ACTION_STATUS').val() != 'VIEW' ) {
            modal_lov_submitter_show(params_submit, params_back_summary); 
        } else {
            loadContentWithParams( $('#TEMP_FSUMMARY').val() , params_back_summary );
        }
    }
</script>


