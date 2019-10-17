<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Surat Teguran</span>
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
                        <strong> SURAT TEGURAN </strong>
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

<?php $this->load->view('workflow/lov_submitter.php'); ?>
<?php $this->load->view('lov/lov_debt_excel.php'); ?>

<script>

$("#tab-1").on("click", function(event) {
    event.stopPropagation();
    loadContentWithParams("transaksi.t_penutupan_wp",{
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
    //alert(p_rqst_type_id);
    // t_vat_reg_employee_id = $('#t_vat_reg_employee_id').val() ;
    // t_vat_reg_dtl_restaurant_id = $('#t_vat_reg_dtl_restaurant_id').val() ;
    // t_license_letter_id = $('#t_license_letter_id').val() ;
    if(t_vat_registration_id == null || t_vat_registration_id == 0 || t_vat_registration_id == ""){
        swal('Peringatan','Isi Formulir Pendaftaran Terlebih Dahulu!','error');
        return false;
    }

    loadContentWithParams("transaksi_wf.t_cust_order_legal_doc_ver_ro", { //model yang ketiga
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


</script>


<script type="text/javascript">
    
    $.ajax({
        url: "<?php echo WS_JQGRID . "transaksi.t_debt_letter_controller/readro"; ?>" ,
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
                $('#t_debt_letter_id').val(data1.t_debt_letter_id); 
                $('#order_no').val(data1.order_no); 
                $('#finance_period_code').val(data1.finance_period_code); 
                $('#letter_type').val(data1.leter_type); 
                

                $('#letter_date').val(data1.letter_date);  
                $('#letter_no').val(data1.letter_no);
                $('#sequence_no').val(data1.sequence_no);  
                $('#sms_content').val(data1.sms_content);  
                
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
                            <input type="text" class="form-control" name="t_debt_letter_id" id="t_debt_letter_id" style="display:none;">   
                            <input type="text" class="form-control" name="order_no" id="order_no" readonly="true">                 
                        </div>
                    
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Periode</label>
                        <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="finance_period_code" id="finance_period_code" readonly="true">                 
                        </div>                 
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Jenis Surat</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="letter_type" id="letter_type" readonly="true">
                        </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Tanggal Surat</label>
                    <div class="input-group col-md-6">
                        <input type="text" class="form-control" name="letter_date" id="letter_date" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Surat Teguran Ke-</label>
                    <div class="input-group col-md-6">
                        <input type="text" class="form-control" name="sequence_no" id="sequence_no" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nomor Surat</label>
                    <div class="input-group col-md-6">
                        <input type="text" class="form-control" name="letter_no" id="letter_no" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">SMS Konten</label>
                    <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="sms_content" id="sms_content" readonly="true">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <div  class="col-sm-offset-3">
                    <button class="btn btn-danger" type="button" id="btn-sub" onclick="cetakExcel();">TAMPILKAN PDF / CETAK EXCEL</button>
                    <button class="btn btn-danger" type="button" id="btn-sub" onclick="toPDF();">CETAK PDF</button>
                    <button class="btn btn-danger" type="button" id="btn-sub" onclick="submitform();">SUBMIT</button>
                    <button class="btn btn-danger" type="button" id="btn-kel" onclick="backform();">SIMPAN</button>
                    <button class="btn btn-danger" type="button" id="btn-kel" onclick="backform();">BACK</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $("#btn-view-wp").on("click", function(event) {
        cusId = $('#t_customer_id').val();
        accId = $('#t_cust_account_id').val();

        loadContentWithParams("data_master.t_cust_account", {
            t_customer_id: cusId,
            t_cust_account_id: accId
        
        });

      // window.open(, "_blank");

        
    });

    params_back_summary = {};
    params_back_summary.ELEMENT_ID = $('#TEMP_ELEMENT_ID').val();
    params_back_summary.PROFILE_TYPE = $('#TEMP_PROFILE_TYPE').val();
    params_back_summary.P_W_DOC_TYPE_ID = $('#TEMP_P_W_DOC_TYPE_ID').val();
    params_back_summary.P_W_PROC_ID = $('#TEMP_P_W_PROC_ID').val();
    params_back_summary.USER_ID = $('#TEMP_USER_ID').val();
    params_back_summary.FSUMMARY = $('#TEMP_FSUMMARY').val();

    

    function toPDF(){
        var t_customer_order_id = $('#CURR_DOC_ID').val();

        if (t_customer_order_id==0){
            swal('Informasi','Semua Harus Diisi','info');
            return;
        }
        
        var url = "<?php echo base_url(); ?>"+"cetak_formulir_surat_teguran_pdf/pageCetak?";
            url += "t_customer_order_id="+t_customer_order_id;
        PopupCenter(url,"Cetak Surat Teguran",500,500);

    
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

    function cetakExcel(){
        modal_cetak_excel_show();
    }

       
</script>


