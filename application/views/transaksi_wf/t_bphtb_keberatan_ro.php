<!--breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Keberatan BPHTB</span>
        </li>
    </ul>
</div>
<div class="space-4"></div>
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
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                        <i class="blue"></i>
                        <strong>Keberatan BPHTB</strong>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet blue box menu-panel">
                        <div class="portlet-title">
                            <div class="caption">DETAIL FORMULIR KEBERATAN BPHTB</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">   
                            <div class="form-horizontal">
                                <div class="row">
                                    <!-- start subject -->
                                    <!-- <div class="form-group">
                                        <label class="control-label col-md-2" id="keterangan-kurang-bayar">  </label>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="control-label col-md-2">No Order
                                        </label>
                                        <div class="col-md-3">
                                            <input id="" class="form-control" tabindex="2" value="<?php echo $this->input->post('order_no'); ?>" readonly maxlength="14" name="order_no">
                                            <input type="hidden" id="t_customer_order_id" value="<?php echo $this->input->post('t_customer_order_id'); ?>" />
                                            <input type="hidden" id="p_rqst_type_id" value="<?php echo $this->input->post('p_rqst_type_id'); ?>" />
                                            <input type="hidden" id="t_vat_registration_id" value="<?php echo $this->input->post('t_vat_registration_id'); ?>" />
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Jenis Permohonan 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" readonly maxlength="32" name="p_rqst_type_code" id="p_rqst_type_code">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Tanggal Pendaftaran 
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" readonly maxlength="32" name="status_request_date" id="status_request_date">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">NOP 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" readonly maxlength="32" name="njop_pbb" id="njop_pbb">
                                            <input type="hidden" id="t_bphtb_registration_id" value="<?php echo $this->input->post('t_bphtb_registration_id'); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Nama WP
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control formatRight" readonly maxlength="32" name="wp_name" id="wp_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 ">  Total Pajak Sebelumnya
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <!-- <span class="input-group-addon">Rp.</span> -->
                                                <input type="text" class="form-control priceformat" readonly maxlength="16" readonly  name="bphtb_amt_final_sebelumnya" id="bphtb_amt_final_sebelumnya">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 ">  Total Pajak yang Diajukan
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <!-- <span class="input-group-addon">Rp.</span> -->
                                                <input type="text" class="form-control priceformat" readonly maxlength="16" readonly  name="bphtb_amt_final_keberatan" id="bphtb_amt_final_keberatan">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Alasan
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control formatRight" readonly maxlength="20" name="alasan" id="alasan">
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-5 col-md-12">
                                                <a class="btn green" id="print_tri" style="DISPLAY: none" onclick="cetak_tri()" > CETAK SPTPD/SKPDKB/SKPDN                                                   
                                                </a>
                                                
                                                <a href="javascript:;" style="DISPLAY: none" class="btn green" id="print_formulir" onclick="cetak_formulir()" > CETAK FORMULIR     
                                                </a>

                                                <a href="javascript:;" style="DISPLAY: none" class="btn green" id="print_sp" onclick="cetak_sp()" > CETAK SURAT PENOLAKAN
                                                </a>
                                                
                                                <a href="javascript:;" class="btn green" id="submitter"  onClick="submitform()" > SUBMIT
                                                </a>
                                                
                                                <a href="javascript:;" style="DISPLAY: none" class="btn green" id="Add"  > SIMPAN
                                                </a>
                                                
                                                <a href="javascript:;" style="DISPLAY: none" class="btn green" id="Update"  > SIMPAN
                                                </a>
                                                
                                                <a href="javascript:;" style="DISPLAY: none" class="btn green" id="Delete"  > HAPUS
                                                </a>
                                                
                                                <a href="javascript:;" style="DISPLAY: none" class="btn  green " id="Cancel"> BATAL                                                   
                                                </a>
                                                <button class="btn btn-danger" type="button" id="btn-kem" onclick="backform();">KEMBALI</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Objek -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('workflow/lov_submitter.php'); ?>
<script>
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
<script>

    $.ajax({
        url: '<?php echo WS_JQGRID."transaksi_wf.t_bphtb_keberatan_ro_controller/read"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            id: $('#t_customer_order_id').val()
        },
        success: function (data) {
            if(data.success){
                var dt = data.items;
                if(dt != null){
                    $('#order_no').val(dt.order_no);
                    $('#t_customer_order_id').val(dt.t_customer_order_id);
                    $('#p_rqst_type_id').val(dt.p_rqst_type_id);
                    $('#t_vat_registration_id').val(dt.t_vat_registration_id);
                    $('#p_rqst_type_code').val(dt.p_rqst_type_code);
                    $('#status_request_date').val(dt.status_request_date);
                    $('#njop_pbb').val(dt.njop_pbb);
                    $('#t_bphtb_registration_id').val(dt.t_bphtb_registration_id);
                    $('#wp_name').val(dt.wp_name);
                    $('#bphtb_amt_final_sebelumnya').val(dt.bphtb_amt_final_sebelumnya);
                    $('#bphtb_amt_final_keberatan').val(dt.bphtb_amt_final_keberatan);
                    $('#alasan').val(dt.alasan);
                }
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    function openInNewTab(url) {
        window.open(url, 'No Payment', 'left=0,top=0,width=500,height=500,toolbar=no,scrollbars=yes,resizable=yes');
    }

    function cetak_formulir(){
        //alert(pejabat);
        var idd = $('#t_customer_order_id').val();
        var vatId = $('#p_rqst_type_id').val();
        var params = "t_customer_order_id="+idd;
        if(vatId == 3){
            url = "<?php echo base_url(); ?>"+"cetak_formulir_hiburan_pdf/pageCetak?"+params;
            openInNewTab(url);
        }else if(vatId == 1){ 
            url = "<?php echo base_url(); ?>"+"cetak_formulir_hotel_pdf/pageCetak?"+params;
            openInNewTab(url);
        }else if(vatId == 4){
            url = "<?php echo base_url(); ?>"+"cetak_formulir_parkir_pdf/pageCetak?"+params;
            openInNewTab(url);
        }else if(vatId == 5){
            url = "<?php echo base_url(); ?>"+"cetak_formulir_ppj_pdf/pageCetak?"+params;
            openInNewTab(url);
        }else if(vatId == 2){
            url = "<?php echo base_url(); ?>"+"cetak_formulir_restoran_pdf/pageCetak?"+params;
            openInNewTab(url);
        }else{
            //alert("Formulir Kosong");
            swal ( "Informasi" ,  "Formulir Kosong" ,  "info" );
        }
    }

    function cetak_sp(){
       //return popup("../report/surat_penolakan_pdf.php");
        url = "<?php echo base_url(); ?>"+"surat_penolakan_pdf/pageCetak";
        openInNewTab(url);
    }

    function cetak_tri(){
        //alert('masuk');
        var cet = document.getElementById('t_vat_registrationFormHidden1').value;
        var idd = $('#t_customer_order_id').val();
        var vatId = $('#p_rqst_type_id').val();
        //var params = "t_customer_order_id="+idd;
        var params = "t_customer_order_id=2";
       
        if (cet == 1){              
            if(vatId == 3){
                url = "<?php echo base_url(); ?>"+"cetak_sptpd_hiburan_pdf/pageCetak?"+params;
                openInNewTab(url);
            }else if(vatId == 1){ 
                url = "<?php echo base_url(); ?>"+"cetak_sptpd_hotel_pdf/pageCetak?"+params;
                openInNewTab(url);
            }else if(vatId == 4){
                url = "<?php echo base_url(); ?>"+"cetak_sptpd_parkir_pdf/pageCetak?"+params;
                openInNewTab(url);
            }else if(vatId == 5){
                url = "<?php echo base_url(); ?>"+"cetak_sptpd_ppj_pdf/pageCetak?"+params;
                openInNewTab(url);
            }else if(vatId == 2){
                url = "<?php echo base_url(); ?>"+"cetak_sptpd_restoran_pdf/pageCetak?"+params;
                openInNewTab(url);
            }else{
                //alert("Formulir Kosong");
                swal ( "Informasi" ,  "Formulir Kosong" ,  "info" );
            }
        }else if(cet == 2){
            url = "<?php echo base_url(); ?>"+"cetak_formulir_skpdkb_pdf/pageCetak?"+params;
            openInNewTab(url);
            //return popup("../report/cetak_formulir_skpdkb_pdf.php"+urlLink);        
        }else{
            url = "<?php echo base_url(); ?>"+"cetak_formulir_skpdn_pdf/pageCetak?"+params;
            openInNewTab(url);
            //return popup("../report/cetak_formulir_skpdn_pdf.php"+urlLink);
        }
    }

    $('#printWisnu').on('click', function(event){
        printLaporan(2);
    });

    $('#print').on('click', function(event){
        printLaporan(1);
    });

</script>

<!-- Action