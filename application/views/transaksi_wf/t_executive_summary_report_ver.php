<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Detail Executive Summary</span>
            <i class="fa fa-circle"></i>
        </li>
        
    </ul>
</div>
<div class="space-4"></div>
    <!-- parameter untuk kembali ke workflow summary -->
    <input type="hidden" id="t_vat_setllement_id" value="<?php echo $this->input->post('t_vat_setllement_id'); ?>" />
    <input type="hidden" id="npwd" value="<?php echo $this->input->post('npwd'); ?>" />
    <input type="hidden" id="t_cust_account_id" value="<?php echo $this->input->post('t_cust_account_id'); ?>" />
    <input type="hidden" id="order_no" value="<?php echo $this->input->post('order_no'); ?>" />
    <input type="hidden" id="registration_date" value="<?php echo $this->input->post('registration_date'); ?>" />
    <input type="hidden" id="t_executive_summary_id" value="<?php echo $this->input->post('t_executive_summary_id'); ?>" />
    <input type="hidden" id="p_vat_type_id" value="<?php echo $this->input->post('p_vat_type_id'); ?>" />
    <input type="hidden" id="finance_period_code" value="<?php echo $this->input->post('finance_period_code'); ?>" />
    <input type="hidden" id="p_finance_period_id" value="<?php echo $this->input->post('p_finance_period_id'); ?>" />
    
    <input type="hidden" id="t_vat_registration_id" value="<?php echo $this->input->post('t_vat_registration_id'); ?>" />
    <input type="hidden" id="p_rqst_type_id" value="<?php echo $this->input->post('p_rqst_type_id'); ?>" />
    <input type="hidden" id="rqst_type_code" value="<?php echo $this->input->post('rqst_type_code'); ?>" />


    <input type="hidden" class="form-control" name="t_customer_order_id" id="t_customer_order_id"/>

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

<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" class="back" id="tab-1">
                        <i class="blue"></i>
                        <strong> Executive Summary</strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong> Dokumen Pendukung </strong>
                    </a>
                </li>

                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong> Data Log AKtifitas </strong>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-2">Periode Tahun</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_year_period_id" type="hidden" name="form_year_period_id">
                            <input id="form_year_code" readonly disabled type="text" class="FormElement form-control" placeholder="Pilih Periode Tahun">
                            
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Jenis Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_vat_id" type="text"  style="display:none;">
                            <input id="kode_ayat" name="kode_ayat" type="text"  style="display:none;">
                            <input id="form_vat_code" readonly disabled type="text" class="FormElement form-control" placeholder="Pilih Jenis Pajak">
                            
                        </div>
                    </div>                    
                </div>
                <div class="space-2"></div>
                <div class="row" id="row-periode">
                    <label class="control-label col-md-2">Periode</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select id="periode" name="periode" class="FormElement form-control" readonly disabled>
                                <option value="1">Per Bulan</option>
                                <option value="2">Per Triwulan</option>
                                <option value="3">Per Semester</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Bulan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="hidden" name="form_finance_period_id" id="form_finance_period_id_">
                           <input id="form_finance_period_code" readonly disabled type="text" class="FormElement form-control" placeholder="Pilih Bulan">
                            
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row" id="row-triwulan">
                    <label class="control-label col-md-2">Triwulan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select id="triwulan" name="triwulan" class="FormElement form-control" readonly disabled >
                                <option selected="1" value="">I</option>
                                <option value="2">II</option>
                                <option value="3">III</option>
                                <option value="3">IV</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row" id="row-semester">
                    <label class="control-label col-md-2">Semester</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select id="semester" name="semester" class="FormElement form-control" readonly disabled >
                                <option selected="1" value="">I</option>
                                <option value="2">II</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row" style="display: none">
                    <label class="control-label col-md-2">Ayat Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group">
                                <input id="form_vat_dtl_id" type="text"  style="display:none;">
                                <input id="kode_ayat" name="kode_ayat" type="text"  style="display:none;">
                                <input id="form_vat_code" readonly disabled type="text" class="FormElement form-control" placeholder="Pilih Ayat Pajak">
                            
                            </div>            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>      
    </div>    
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-2">Penjelasan</label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <div class="col-md-12">
                                <textarea style="background-color: orange" rows="4" cols="500" class="form-control" maxlength="256"  name="penjelasan" id="penjelasan"></textarea>
                            </div>         
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Permasalahan</label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <div class="col-md-12">
                                <textarea style="background-color: orange" rows="4" cols="500" class="form-control" maxlength="256"  name="permasalahan" id="permasalahan"></textarea>
                            </div>         
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Kesimpulan</label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <div class="col-md-12">
                                <textarea style="background-color: orange" rows="4" cols="500" class="form-control" maxlength="256"  name="kesimpulan" id="kesimpulan"></textarea>
                            </div>         
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Saran</label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <div class="col-md-12">
                                <textarea style="background-color: orange" rows="4" cols="500" class="form-control" maxlength="256"  name="saran" id="saran"></textarea>
                            </div>         
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row col-md-offset-5">
                    <button class="btn btn-success" type="button" id="submit" onclick="">Submit</button>
                    <button class="btn btn-success" type="button" onclick="update()" id="update">Simpan</button>
                    <button class="btn btn-success" type="button" onclick="backform()" id="back">Kembali</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('workflow/lov_submitter.php'); ?>

<script type="text/javascript">
    var t_customer_order_id = "<?php echo $_POST['CURR_DOC_ID']; ?>";

    //var t_customer_order_id= 506636;
    if(t_customer_order_id!=null || t_customer_order_id!=''){
        $.ajax({
            url: '<?php echo WS_JQGRID."transaksi_wf.t_executive_summary_report_ver_controller/read"; ?>',
            type: "POST",
            dataType: "json",
            data: {
                
                t_customer_order_id: t_customer_order_id
            },
            success: function (data) {
                if(data.success){
                    var dt = data.rows[0];
                    //alert(dt.p_bphtb_legal_doc_type_id);return;
                    $('#form_year_code').val(dt.year_code);                    
                    $('#form_vat_code').val(dt.vat_code);
                    $('#form_finance_period_code').val(dt.period_code);
                    $('#t_executive_summary_id').val(dt.t_executive_summary_id);
                    $('#form_year_period_id').val(dt.p_year_period_id);
                    $('#form_vat_id').val(dt.p_vat_type_id);
                    $('#periode').val(dt.period_type);                    
                    $('#form_finance_period_id').val(dt.p_finance_period_id);
                    $('#triwulan').val(dt.triwulan);
                    $('#semester').val(dt.semester);
                    $('#penjelasan').val(dt.penjelasan);
                    $('#permasalahan').val(dt.permasalahan);
                    $('#kesimpulan').val(dt.kesimpulan);
                    $('#saran').val(dt.saran);
                    $('#t_customer_order_id').val(dt.t_customer_order_id);

                    
                    if(dt.triwulan == 0){
                        $('#row-triwulan').css('display', 'none');
                    };
                    if(dt.semester == 0){
                        $('#row-semester').css('display', 'none');
                    };

                }
                // console.log(dt.product_name);
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
        });
    }

</script>

<script type="text/javascript">
    function update(){

        var penjelasan              = $('#penjelasan').val();
        var permasalahan            = $('#permasalahan').val();
        var kesimpulan              = $('#kesimpulan').val();
        var saran                   = $('#saran').val();
        var t_executive_summary_id  = $('#t_executive_summary_id').val();

        $.ajax({
            url     : "<?php echo WS_JQGRID . "transaksi_wf.t_executive_summary_report_ver_controller/update"; ?>" ,
            type    : "POST", 
            datatype: "json",           
            data    :{
                        penjelasan: penjelasan,
                        permasalahan :permasalahan,
                        kesimpulan :kesimpulan,
                        saran :saran,
                        t_executive_summary_id :t_executive_summary_id
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
</script>

<script type="text/javascript">
    /* parameter kembali ke workflow summary */
    params_back_summary = {};
    params_back_summary.ELEMENT_ID = $('#TEMP_ELEMENT_ID').val();
    params_back_summary.PROFILE_TYPE = $('#TEMP_PROFILE_TYPE').val();
    params_back_summary.P_W_DOC_TYPE_ID = $('#TEMP_P_W_DOC_TYPE_ID').val();
    params_back_summary.P_W_PROC_ID = $('#TEMP_P_W_PROC_ID').val();
    params_back_summary.USER_ID = $('#TEMP_USER_ID').val();
    params_back_summary.FSUMMARY = $('#TEMP_FSUMMARY').val();
    /* end parameter */ 

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

<script type="text/javascript">
    $('#tab-2').on('click', function(event){
        event.stopPropagation();
        var idelement;
        //alert($('#t_customer_order_id').val());return;

        if (idelement = $('#t_customer_order_id'))
        {
            
            //console.log(idelement);
            var pid=idelement.val();
            //console.log($('#t_customer_order_id').val());
            var req_code=$('#rqst_type_code').val();
            var id_req=$('#p_rqst_type_id').val();
            var id_vat=$('#t_bphtb_registration_id').val();
            //alert(pid);return;
            if (pid != 0)
            {
                //loadContentWithParams('transaksi_wf.t_cust_order_legal_doc_ro', {t_bphtb_registration_id:id_vat,rqst_type_code:req_code,p_rqst_type_id:id_req,t_customer_order_id:pid});

                loadContentWithParams("transaksi_wf.t_cust_order_legal_doc_ro_ver_executive_summary", { //model yang ketiga
                    t_executive_summary_id:$('#t_executive_summary_id').val(),
                    p_vat_type_id:$('#p_vat_type_id').val(),
                    t_vat_setllement_id:$('#t_vat_setllement_id').val(),
                    npwd:$('#npwd').val(),
                    t_cust_account_id:$('#t_cust_account_id').val(),
                    finance_period_code:$('#finance_period_code').val(),
                    p_finance_period_id:$('#p_finance_period_id').val(),
                    t_customer_order_id:$( "#CURR_DOC_ID" ).val(),
                    order_no:$('#order_no').val(),
                    p_rqst_type_id:$('#p_rqst_type_id').val(),
                    rqst_type_code:$('#rqst_type_code').val(),
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
                //alert(t_customer_order_id);return;

            
            } else {
                swal({title: "Error!", text: "Pilih salah satu ORDER!", html: true, type: "error"});
            }
        } else {
            swal({title: "Error!", text: "Pilih salah satu ORDER!!!", html: true, type: "error"});
        }
    });

    $("#tab-3").on("click", function(event) {
        event.stopPropagation();
        loadContentWithParams("transaksi_wf.t_order_log_kronologis_ver_executive_summary", { //model yang ketiga
            t_executive_summary_id:$('#t_executive_summary_id').val(),
            p_vat_type_id:$('#p_vat_type_id').val(),
            t_vat_setllement_id:$('#t_vat_setllement_id').val(),
            npwd:$('#npwd').val(),
            t_cust_account_id:$('#t_cust_account_id').val(),
            finance_period_code:$('#finance_period_code').val(),
            p_finance_period_id:$('#p_finance_period_id').val(),
            t_customer_order_id:$( "#CURR_DOC_ID" ).val(),
            order_no:$('#order_no').val(),
            p_rqst_type_id:$('#p_rqst_type_id').val(),
            rqst_type_code:$('#rqst_type_code').val(),
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
