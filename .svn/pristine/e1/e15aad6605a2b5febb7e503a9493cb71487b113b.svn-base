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

$("#tab-2").on("click", function(event) {
        event.stopPropagation();
        loadContentWithParams("transaksi_wf.t_penutupan_wp_ver_piutang_legal_doc", { //model yang ketiga
            t_customer_order_id: $( "#CURR_DOC_ID" ).val(),
            p_rqst_type_code: $('#p_rqst_type_code').val(),
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
        loadContentWithParams("transaksi_wf.t_penutupan_wp_ver_piutang_log_kronologis", { //model yang ketiga
            t_customer_order_id: $( "#CURR_DOC_ID" ).val(),
            p_rqst_type_code: $('#p_rqst_type_code').val(),
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
        url: "<?php echo base_url().'transaksi/rest_grade_combo/'; ?>" ,
        type: "POST",            
        data: {},
        success: function (data) {
            $( "#restGrade" ).html( data );
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    $.ajax({
        url: "<?php echo base_url().'transaksi/parking_grade_combo/'; ?>" ,
        type: "POST",            
        data: {},
        success: function (data) {
            $( "#parkingGrade" ).html( data );
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
        url: "<?php echo WS_JQGRID . "transaksi_wf.t_penutupan_wp_ver_piutang_controller/readro"; ?>" ,
        type: "POST", 
        datatype: "json",           
        data: {
            id : $('#CURR_DOC_ID').val()
        },
        success: function (data) {
            var data1 = data.rows;
            //alert(data.rows.order_no);
            //if(data1.t_customer_order_id){
            if(data1 != null){

                $('#t_customer_id').val(data1.t_customer_id); 
                $('#t_cust_account_id').val(data1.t_cust_account_id); 
                $('#order_no').val(data1.order_no); 
                $('#status_request_date').val(data1.status_request_date); 
                $('#p_rqst_type_code').val(data1.p_rqst_type_code); 
                $('#reason_status_id').val(data1.reason_status_id);
                $('#p_account_status_id').val(data1.p_account_status_id);
                $('#t_customer_order_id').val(data1.t_customer_order_id);
                $('#t_cust_acc_status_modif_id').val(data1.t_cust_acc_status_modif_id);

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
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-3">Nomor Order</label>                
                        <div class="input-group col-md-6">
                            <input type="hidden" class="form-control" name="t_customer_order_id" id="t_customer_order_id">   
                            <input type="text" class="form-control" name="order_no" id="order_no" readonly="true">                 
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
                    <label class="control-label col-md-3">Tanggal Pendaftaran</label>
                        <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="status_request_date" id="status_request_date" readonly="true">                 
                        </div>                 
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3"></label>
                    <div class="input-group col-md-6">
                        <div id="hotelGrade"></div>
                        <div id="restGrade"></div>
                        <div id="entType"></div>
                        <div id="parkingGrade"></div>
                        <input type="hidden" class="form-control" name="t_cust_acc_status_modif_id" id="t_cust_acc_status_modif_id"> 
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
                            <input type="hidden" class="form-control" name="t_customer_id" id="t_customer_id"> 
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
                        <input type="hidden" class="form-control" name="t_cust_account_id" id="t_cust_account_id"> 
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
                            <input type="hidden" class="form-control" name="p_account_status_id" id="p_account_status_id" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Alasan Penutupan</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="reason_code" id="reason_code" readonly="true"> 
                            <input type="hidden" class="form-control" name="reason_status_id" id="reason_status_id" readonly="true"> 
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
                            <input type="text" class="form-control" name="doc_no" id="doc_no" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nama Petugas 1</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="bap_employee_name_1" id="bap_employee_name_1" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">NIP Petugas 1</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="bap_employee_no_1" id="bap_employee_no_1" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Jabatan Petugas 1</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="bap_employee_job_pos_1" id="bap_employee_job_pos_1" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nama Petugas 2</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="bap_employee_name_2" id="bap_employee_name_2" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">NIP Petugas 2</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="bap_employee_no_2" id="bap_employee_no_2" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Jabatan Petugas 2</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="bap_employee_job_pos_2" id="bap_employee_job_pos_2" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <div  class="col-sm-offset-3">
                    <button class="btn btn-danger" type="button" id="btn-sub" onclick="setWpInactive()">SET WP INACTIVE</button>
                    <button class="btn btn-danger" type="button" id="btn-sub" onclick="showPiutang()">TAMPILKAN DATA PIUTANG</button>
                    <button class="btn btn-danger" type="button" id="btn-sub" onclick="submitform();">SUBMIT</button>
                    <button class="btn btn-danger" type="button" id="btn-kel" onclick="backform()">KEMBALI</button>
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

    /*function cetakFormulir(){
        var url = "<?php echo base_url().'cetak_surat_penutupan/pageCetak?CURR_DOC_ID='?>"+$('#CURR_DOC_ID').val();
        PopupCenter(url,"Laporan Penerimaan Denda Harian",500,500);
    }

    function cetakNota(){
        var url = "<?php echo base_url().'nota_dinas_penutupan/pageCetak?CURR_DOC_ID='?>"+$('#CURR_DOC_ID').val();
        PopupCenter(url,"Laporan Penerimaan Denda Harian",500,500);
    }*/

    params_back_summary = {};
    params_back_summary.ELEMENT_ID = $('#TEMP_ELEMENT_ID').val();
    params_back_summary.PROFILE_TYPE = $('#TEMP_PROFILE_TYPE').val();
    params_back_summary.P_W_DOC_TYPE_ID = $('#TEMP_P_W_DOC_TYPE_ID').val();
    params_back_summary.P_W_PROC_ID = $('#TEMP_P_W_PROC_ID').val();
    params_back_summary.USER_ID = $('#TEMP_USER_ID').val();
    params_back_summary.FSUMMARY = $('#TEMP_FSUMMARY').val();


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

    function openInNewTab(url) {
        window.open(url, 'No Payment', 'left=0,top=0,width=500,height=500,toolbar=no,scrollbars=yes,resizable=yes');
    }

    function showPiutang(){
        /*url = "<?php echo base_url(); ?>"+"transaksi_wf.t_laporan_piutang_pajak_berdasarkan_npwpd_ro?"+$( "#npwpd" ).val();
        openInNewTab(url);*/
        loadContentWithParams("transaksi_wf.t_laporan_piutang_pajak_berdasarkan_npwpd_ro", { 
            npwd: $( "#npwpd" ).val()
        });
    }

    function setWpInactive(){
        var t_cust_account_id      = $('#t_cust_account_id').val();

        var url = "<?php echo WS_JQGRID . "transaksi_wf.t_penutupan_wp_ver_piutang_controller/setWpInactive/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        url += "&t_cust_account_id=" + t_cust_account_id;

        $.getJSON(url, function( items ) {
            //alert(items.rows[0].f_update_acc_status);
            if(items.rows[0].f_update_acc_status=="OK"){
                swal('Informasi','Sukses Update Status','info');
            }else{
                swal('Oopss','Gagal Update Status','error');
            }
        })
    }
</script>


