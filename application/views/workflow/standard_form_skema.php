<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url();?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Workflow</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Standard Form</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->

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

<div class="row">
    <div class="col-md-12">
      <div class="portlet light bordered" id="form_wizard_1">
             <div class="portlet-title">
                 <div class="caption">
                     <i class=" icon-layers font-red"></i>
                     <span class="caption-subject font-red bold uppercase"> Standard Form -
                         <span class="step-title"> Step 1 of 3 </span>
                     </span>
                 </div>
             </div>
             <div class="portlet-body form">
                 <form class="form-horizontal" action="#" id="submit_form" method="POST">
                     <div class="form-wizard">
                         <div class="form-body">
                             <ul class="nav nav-pills nav-justified steps">
                                 <li>
                                     <a href="#tab1" data-toggle="tab" class="step">
                                         <span class="number"> 1 </span>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Form Permohonan </span>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#tab2" data-toggle="tab" class="step">
                                         <span class="number"> 2 </span>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Log Aktifitas </span>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#tab3" data-toggle="tab" class="step active">
                                         <span class="number"> 3 </span>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Dokumen Pendukung </span>
                                     </a>
                                 </li>
                             </ul>
                             <div id="bar" class="progress progress-striped active" role="progressbar">
                                 <div class="progress-bar progress-bar-success"> </div>
                             </div>
                             <div class="tab-content">
                                 <div class="tab-pane active" id="tab1">
                                        <!--- TAB 1 -->
                                        <div class="tabbable-custom ">
                                            <ul class="nav nav-tabs ">
                                                <li class="active">
                                                    <a href="#tab_1_1" data-toggle="tab"> Skema Diskon </a>
                                                </li>
                                                <li class="">
                                                    <a href="#tab_1_2" data-toggle="tab"> Data Fastel </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_4" data-toggle="tab"> Trend & Tagihan</a>
                                                </li>
                                                <li class="">
                                                    <a href="#tab_1_3" data-toggle="tab"> Contract </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_1_1">
                                                    <form role="form" id="form-data-contract_schema" method="post" class="form-horizontal">

                                                        <h4>Info Skema</h4>
                                                        <hr>
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Schema ID" name="schema_id" id="info_schema_id" class="form-control " readonly>
                                                            </div>
                                                            <div class="col-md-6">

                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Account Number" name="account_num" id="info_account_num" class="form-control " readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Customer Name" name="customer_name" id="info_customer_name" class="form-control " readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Start Date" name="start_dat" id="info_start_dat" class="form-control required" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="End Date" name="end_dat" id="info_end_dat" class="form-control required" required>
                                                            </div>
                                                        </div>

                                                        <h4>Skema Diskon</h4>
                                                        <hr>
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Skema Diskon" name="skema_disc" id="info_discount_description" class="form-control required" required>
                                                                <input type="hidden" placeholder="Skema Diskon" name="discount_code" id="info_discount_code" class="form-control required">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="input-group-btn">
                                                                 <?php if($this->input->post('PROFILE_TYPE') == 'INBOX'): ?>
                                                                 <button class="btn btn-success" type="button" id="submit_form1" >
                                                                   Simpan
                                                                 </button>
                                                                <?php endif;?>
                                                               </span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                              <div class="col-md-12" id="table-skema-pembayaran">

                                                              </div>
                                                        </div>
                                                    </form>

                                                </div>
                                                <div class="tab-pane " id="tab_1_4">
                                                 <div class="row">
                                                      <div class="col-md-12">
                                                          <h4> Trend & Tagihan </h4>
                                                      </div>
                                                      <div class="col-md-12" id="table-trend-info2">
                                                    </div>
                                                  </div>
                                                 </div>
                                                <div class="tab-pane " id="tab_1_3">
                                                 <form role="form" id="form-upload-contract" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                                                  <input type="hidden" id="modal_lov_contract_schema_id" name="schema_id">
                                                    <input type="hidden" id="modal_lov_contract_discount_code" name="discount_code">
                                                    <input type="hidden" id="modal_lov_contract_p_business_schem_id" name="p_business_schem_id">
                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <h4>Upload Kontrak</h4>
                                                        <hr>
                                                    <div class="input-group col-md-4">
                                                       <input type="file" name="file_upload_contract" id="file_upload_contract" />
                                                       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                       <span class="input-group-btn btn-right">
                                                            <input type="submit" id="submit_contract" class="btn green-haze" value="Upload">
                                                       </span>
                                                    </div>
                                                    <div class="input-group col-md-8">
                                                        <div class="portlet">
                                                            <div class="portlet-body">
                                                                <div class="table-scrollable">
                                                                    <table class="table table-hover table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th> # </th>
                                                                                <th> File Name </th>
                                                                                <th> Action </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="body_tbl_kontrak">
                                                                            
                                                                       
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                             
                                                         </div>
                                                    </div>
                                                </form>
                                                        <hr>
                                                    <form role="form" id="form-data-contract" method="post" class="form-horizontal">
                                                        <input type="hidden" id="modal_lov_contract_schema_id" name="schema_id">
                                                        <input type="hidden" id="modal_lov_contract_discount_code" name="discount_code">
                                                        <input type="hidden" id="modal_lov_contract_p_business_schem_id" name="p_business_schem_id">
                                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                        <h4>Input Data Kontrak</h4>
                                                        <hr>
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Nomor" name="nomor1" id="kontrak_nomor1" class="form-control required" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Nomor" name="nomor2" id="kontrak_nomor2" class="form-control required" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Hari" name="hari" id="kontrak_hari" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Tanggal" name="tanggal" id="kontrak_tanggal" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Bulan" name="bulan" id="kontrak_bulan" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Tahun" name="tahun" id="kontrak_tahun" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="Bertempat Di" name="lokasi" id="kontrak_lokasi" class="form-control">
                                                            </div>
                                                        </div>

                                                        <h4>PT.Telkom Indonesia</h4>
                                                        <hr>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="Alamat" name="alamat_t" id="kontrak_alamat_t" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Nama (Perwakilan)" name="nama_t" id="kontrak_nama_t" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Jabatan" name="jabatan_t" id="kontrak_jabatan_t" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Nomor Rekening" name="rek_no" id="kontrak_rek_no" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Atas Nama" name="rek_name" id="kontrak_rek_name" class="form-control">
                                                            </div>
                                                        </div>

                                                        <h4>Customer</h4>
                                                        <hr>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="Nama Perusahaan" name="nama_pt" id="kontrak_nama_pt" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="Alamat" name="alamat_c" id="kontrak_alamat_c" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Nama (Perwakilan)" name="nama_c" id="kontrak_nama_c" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Jabatan" name="jabatan_c" id="kontrak_jabatan_c" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <input type="text" placeholder="Alamat Pengiriman Invoice" name="alamat_inv" id="kontrak_alamat_inv" class="form-control">
                                                            </div>
                                                        </div>

                                                        <h4>Program</h4>
                                                        <hr>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <input type="number" placeholder="Program" name="program" id="kontrak_program" class="form-control">
                                                            </div>
                                                        </div>

                                                        <?php if($this->input->post('PROFILE_TYPE') == 'INBOX'): ?>

                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <button type="button" id="save-contract" class="btn btn-success btn-block"> Simpan Kontrak </button>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>

                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <button type="button" id="download-contract" class="btn btn-success btn-block"> Download Kontrak </button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                                <div class="tab-pane " id="tab_1_2">
                                                         <div class="row">
                                                          <div class="col-md-12">
                                                              <table id="grid-table-fastel"></table>
                                                              <div id="grid-pager-fastel"></div>
                                                          </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                 </div>
                                 <div class="tab-pane" id="tab2">
                                     <!--- TAB 2 -->
                                    <div style="padding-bottom: 10px">
                                        <a id="add_log" class="btn btn-white btn-sm btn-round">
                                            <i class="ace-icon fa fa-plus green"></i>
                                            Add Log Aktifitas
                                        </a>
                                    </div>
                                    <table id="grid-log" class="table table-striped table-bordered table-hover">
                                        <thead>
                                          <tr>
                                                <th data-column-id="t_customer_order_id" data-visible="false">ID</th>
                                                <th data-column-id="log_date" data-width="100" data-header-align="center" data-align="center">Tanggal</th>
                                                <th data-column-id="log_hour" data-width="100" data-header-align="center" data-align="center">Jam</th>
                                                <th data-column-id="activity">Aktifitas</th>
                                          </tr>
                                        </thead>
                                    </table>

                                 </div>

                                 <div class="tab-pane" id="tab3">
                                      <!--- TAB 3 -->
                                    <div style="padding-bottom: 10px">
                                        <a id="add_legal_doc" class="btn btn-white btn-sm btn-round">
                                            <i class="ace-icon fa fa-plus green"></i>
                                            Add Dokumen Pendukung
                                        </a>
                                    </div>

                                    <table id="grid-legal" class="table table-striped table-bordered table-hover">
                                        <thead>
                                          <tr>
                                                <th data-column-id="t_cust_order_legal_doc_id" data-visible="false">ID</th>
                                                <th data-column-id="legal_doc_desc" data-width="150">Jenis Dokumen</th>
                                                <th data-column-id="origin" data-formatter="origin" data-width="200">Nama File</th>
                                                <th data-column-id="description">Keterangan</th>
                                                <th data-column-id="action" data-formatter="action" data-width="100" data-sortable="false"data-header-align="center" data-align="center">Aksi</th>
                                          </tr>
                                        </thead>
                                    </table>
                                 </div>
                             </div>
                         </div>

                         <div class="form-actions">
                             <div class="row">
                                 <div class="col-md-offset-3 col-md-9">
                                     <a href="javascript:;" class="btn default button-previous">
                                         <i class="fa fa-angle-left"></i> Back </a>
                                     <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                         <i class="fa fa-angle-right"></i>
                                     </a>
                                     <a href="javascript:;" class="btn green button-submit"> Submit
                                         <i class="fa fa-check"></i>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
    </div>
</div>

<?php
    $this->load->view('workflow/lov_submitter.php');
    $this->load->view('lov/lov_legaldoc.php');
    $this->load->view('lov/lov_log.php');
?>
<?php $this->load->view('lov/lov_trendinfo_detail.php'); ?>

<script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
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

    var handleTitle = function(tab, navigation, index) {
        var total = navigation.find('li').length;
        var current = index + 1;
        // set wizard title
        $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
        // set done steps
        jQuery('li', $('#form_wizard_1')).removeClass("done");
        var li_list = navigation.find('li');
        for (var i = 0; i < index; i++) {
            jQuery(li_list[i]).addClass("done");
        }

        if (current == 1) {
            $('#form_wizard_1').find('.button-previous').hide();
        } else {
            $('#form_wizard_1').find('.button-previous').show();
        }

        if (current >= total) {
            $('#form_wizard_1').find('.button-next').hide();
            $('#form_wizard_1').find('.button-submit').show();

        } else {
            $('#form_wizard_1').find('.button-next').show();
            $('#form_wizard_1').find('.button-submit').hide();
        }
        //Metronic.scrollTo($('.page-title'));
    }

    // default form wizard
    $('#form_wizard_1').bootstrapWizard({
        'nextSelector': '.button-next',
        'previousSelector': '.button-previous',
        onTabClick: function (tab, navigation, index, clickedIndex) {
            return false;
            /*
            success.hide();
            error.hide();
            if (form.valid() == false) {
                return false;
            }
            handleTitle(tab, navigation, clickedIndex);
            */
        },
        onNext: function (tab, navigation, index) {
            /*
            success.hide();
            error.hide();

            if (form.valid() == false) {
                return false;
            }
            */
            handleTitle(tab, navigation, index);
        },
        onPrevious: function (tab, navigation, index) {
            /*
            success.hide();
            error.hide();
            */
            handleTitle(tab, navigation, index);
        },
        onTabShow: function (tab, navigation, index) {
            var total = navigation.find('li').length;
            var current = index + 1;
            var $percent = (current / total) * 100;
            $('#form_wizard_1').find('.progress-bar').css({
                width: $percent + '%'
            });
        }
    });

    $('#form_wizard_1').find('.button-previous').hide();
    $('#form_wizard_1 .button-submit').click(function () {
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
    }).hide();

    /*ketika link 'workflow summary' diklik, maka kembali ke summary */
    $("a").on('click', function(e) {
        var txt = $(e.target).text();
        if( txt.toLowerCase() == 'workflow summary' ) {
            loadContentWithParams( $('#TEMP_FSUMMARY').val() , params_back_summary );
        }
    });

    /*ketika tombol cancel diklik, maka kembali ke summary*/
    $("#form_customer_order_btn_cancel").on('click', function() {
        loadContentWithParams( $('#TEMP_FSUMMARY').val() , params_back_summary );
    });

    /* cek jika tipe view */
    if (  $('#ACTION_STATUS').val() == 'VIEW' ) {
        $('#form_customer_order_btn_submit').remove();
        $('#form_customer_order_btn_save').remove();
        $('#add_legal_doc').hide();
        $('#add_log').hide();
    }

    $("#add_legal_doc").on('click',function(){
        var params_legaldoc = {};
        params_legaldoc.code = "TAMBAH LOG AKTIFITAS";
        params_legaldoc.CURR_DOC_ID         = $('#CURR_DOC_ID').val();
        params_legaldoc.CURR_DOC_TYPE_ID    = $('#CURR_DOC_TYPE_ID').val();
        params_legaldoc.CURR_PROC_ID        = $('#CURR_PROC_ID').val();
        params_legaldoc.CURR_CTL_ID         = $('#CURR_CTL_ID').val();
        params_legaldoc.USER_ID_DOC         = $('#USER_ID_DOC').val();
        params_legaldoc.USER_ID_DONOR       = $('#USER_ID_DONOR').val();
        params_legaldoc.USER_ID_LOGIN       = $('#USER_ID_LOGIN').val();
        params_legaldoc.USER_ID_TAKEN       = $('#USER_ID_TAKEN').val();
        params_legaldoc.IS_CREATE_DOC       = $('#IS_CREATE_DOC').val();
        params_legaldoc.IS_MANUAL           = $('#IS_MANUAL').val();
        params_legaldoc.CURR_PROC_STATUS    = $('#CURR_PROC_STATUS').val();
        params_legaldoc.CURR_DOC_STATUS     = $('#CURR_DOC_STATUS').val();
        params_legaldoc.PREV_DOC_ID         = $('#PREV_DOC_ID').val();
        params_legaldoc.PREV_DOC_TYPE_ID    = $('#PREV_DOC_TYPE_ID').val();
        params_legaldoc.PREV_PROC_ID        = $('#PREV_PROC_ID').val();
        params_legaldoc.PREV_CTL_ID         = $('#PREV_CTL_ID').val();
        params_legaldoc.SLOT_1              = $('#SLOT_1').val();
        params_legaldoc.SLOT_2              = $('#SLOT_2').val();
        params_legaldoc.SLOT_3              = $('#SLOT_3').val();
        params_legaldoc.SLOT_4              = $('#SLOT_4').val();
        params_legaldoc.SLOT_5              = $('#SLOT_5').val();
        params_legaldoc.MESSAGE             = $('#MESSAGE').val();
        params_legaldoc.PROFILE_TYPE        = $('#PROFILE_TYPE').val();
        params_legaldoc.ACTION_STATUS       = $('#ACTION_STATUS').val();

        modal_lov_legaldoc_show(params_legaldoc);
    });

    $("#grid-legal").bootgrid({
        ajax: true,
        post: function ()
        {
            return {
                "t_customer_order_id": $("#CURR_DOC_ID").val()
            };
        },
        url: '<?php echo WS_JQGRID."workflow.wf_controller/getLegalDoc"; ?>',
        navigation:0,
        formatters: {
            "origin": function(column, row)
            {
                return "<a href=\"<?php echo base_url(); ?>"+row.file_folder+"/"+row.file_name+"\">"+row.origin_file_name+"</a> ";
            },
            "action": function(column, row)
            {
                if (  $('#ACTION_STATUS').val() == 'VIEW' ) {
                    return '<button type="button" class="btn btn-xs btn-default command-delete"><span class="ace-icon glyphicon glyphicon-trash"></span></button>';
                }else{
                    return '<button type="button" class="btn btn-xs btn-danger command-delete" onclick="deleteLegal('+ row.t_cust_order_legal_doc_id +')"><span class="ace-icon glyphicon glyphicon-trash"></span></button>'
                }
            }

        }
    });

    $("#add_log").on('click',function(){
        var params_log = {};
        params_log.code = "TAMBAH LOG AKTIFITAS";
        params_log.CURR_DOC_ID         = $('#CURR_DOC_ID').val();
        params_log.CURR_DOC_TYPE_ID    = $('#CURR_DOC_TYPE_ID').val();
        params_log.CURR_PROC_ID        = $('#CURR_PROC_ID').val();
        params_log.CURR_CTL_ID         = $('#CURR_CTL_ID').val();
        params_log.USER_ID_DOC         = $('#USER_ID_DOC').val();
        params_log.USER_ID_DONOR       = $('#USER_ID_DONOR').val();
        params_log.USER_ID_LOGIN       = $('#USER_ID_LOGIN').val();
        params_log.USER_ID_TAKEN       = $('#USER_ID_TAKEN').val();
        params_log.IS_CREATE_DOC       = $('#IS_CREATE_DOC').val();
        params_log.IS_MANUAL           = $('#IS_MANUAL').val();
        params_log.CURR_PROC_STATUS    = $('#CURR_PROC_STATUS').val();
        params_log.CURR_DOC_STATUS     = $('#CURR_DOC_STATUS').val();
        params_log.PREV_DOC_ID         = $('#PREV_DOC_ID').val();
        params_log.PREV_DOC_TYPE_ID    = $('#PREV_DOC_TYPE_ID').val();
        params_log.PREV_PROC_ID        = $('#PREV_PROC_ID').val();
        params_log.PREV_CTL_ID         = $('#PREV_CTL_ID').val();
        params_log.SLOT_1              = $('#SLOT_1').val();
        params_log.SLOT_2              = $('#SLOT_2').val();
        params_log.SLOT_3              = $('#SLOT_3').val();
        params_log.SLOT_4              = $('#SLOT_4').val();
        params_log.SLOT_5              = $('#SLOT_5').val();
        params_log.MESSAGE             = $('#MESSAGE').val();
        params_log.PROFILE_TYPE        = $('#PROFILE_TYPE').val();
        params_log.ACTION_STATUS       = $('#ACTION_STATUS').val();

        modal_lov_log_show(params_log);
    });

     $("#grid-log").bootgrid({
        ajax: true,
        post: function ()
        {
            return {
                "t_customer_order_id": $("#CURR_DOC_ID").val()
            };
        },
        url: '<?php echo WS_JQGRID."workflow.wf_controller/getLogKronologi"; ?>',
        navigation:0
    });

    function deleteLegal(idd){
        /*delete table legal doc*/
        var c = confirm('Apakah anda yakin akan menghapus data ini?');

        if(c){
            $.ajax({
                type: 'POST',
                datatype: "json",
                url: '<?php echo WS_JQGRID."workflow.wf_controller/delete_legaldoc";?>',
                timeout: 10000,
                data: { t_cust_order_legal_doc_id : idd},
                success: function(data) {
                     $('#grid-legal').bootgrid('reload');
                }
            });
            return false;

        }else{
            return false;
        }
    }


    function loadTableSkemaPembayaran(trend) {
        var schema_id = $('#info_schema_id').val();

        $.ajax({
          url: "<?php echo WS_JQGRID.'schema.sc_schema_controller/getTableSkemaPembayaran2'; ?>",
          type: "POST",
          data: { schema_id: schema_id, trend:trend, form:'contract'},
          success: function (data) {
              $('#table-skema-pembayaran').html(data);

              <?php if($this->input->post('PROFILE_TYPE') == 'OUTBOX'): ?>
                $(".pilih-simulasi").hide();
              <?php endif; ?>
          },
          error: function (xhr, status, error) {
              swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
              return false;
          }
        });
    }

    function pilih_diskon(code, name, bs_scheme){
        $('#info_discount_code').val(code);
        $('#info_discount_description').val(name);
        $('#modal_lov_contract_p_business_schem_id').val(bs_scheme);
    }
    function check_date(date1, date2, program){
        
        if(date1 > date2 ){
            return 'Tanggal Berakhir Tidak Boleh Kurang Dari Tanggal Mulai !';
        }else{

        }
/* 
        if(program == 'COSTCAP'){

        }
        if() */
    }

    $(function(){
        $('#submit_form1').click(function(){

            start_dat = $('#info_start_dat').val();
            end_dat = $('#info_end_dat').val();
            discount_code = $('#info_discount_code').val();
            schema_id = $('#info_schema_id').val();
            if(start_dat >= end_dat ){
                swal({title: 'Info', text: 'Tanggal Mulai tidak boleh lebih dari atau sama dengan tanggal berakhir', html: true, type: "info"});
            }else{
             $.ajax({
                type: "POST",
                url: "<?php echo WS_JQGRID.'schema.input_data_contract_controller/submit_skema_diskon'; ?>",
                data: { start_dat:start_dat,end_dat:end_dat,discount_code:discount_code, schema_id:schema_id  },
                success: function (data) {

                    $("#modal_lov_contract_schema_id").val(schema_id);
                    $("#modal_lov_contract_discount_code").val(discount_code);

                }
             });
            }
        });
    
    $("#form-upload-contract").on('submit', (function (e) {
          e.preventDefault();
          var data = new FormData(this);

          $.ajax({
            type: 'POST',
            dataType: "json",
            url: '<?php echo WS_JQGRID."schema.sc_schema_controller/uploadContract"; ?>',
            data: data,
            timeout: 10000,
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            success: function(response) {
              if(response.success) {

                  $('#file_upload_contract').val('');
                  load_upd_contract( $("#modal_lov_contract_schema_id").val());
                  swal({title: 'Info', text: response.message, html: true, type: "info"});

              }else{
                  swal({title: 'Attention', text: response.message, html: true, type: "warning"});
              }
            }

          });

          return false;
      }));
        $("#form-upload-fastel").on('submit', (function (e) {
                  e.preventDefault();
                  var data = new FormData(this);

                  $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: '<?php echo WS_JQGRID."schema.fastel_controller/uploadFastel"; ?>',
                    data: data,
                    timeout: 10000,
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false,
                    success: function(response) {
                      if(response.success) {

                          $('#file_upload_fastel').val('');

                          swal({title: 'Info', text: response.message, html: true, type: "info"});
                          modal_lov_upload_fastel_hide();
                          $('#grid-table-fastel').trigger("reloadGrid");

                      }else{
                          swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                      }
                    }

                  });

                  return false;
              }));

        $("#save-contract").click(function() {

            var schema_id = $("#modal_lov_contract_schema_id").val();
            var nomor1 = $("#kontrak_nomor1").val();
            var nomor2 = $("#kontrak_nomor2").val();
            var hari = $("#kontrak_hari").val();
            var tanggal = $("#kontrak_tanggal").val();
            var bulan = $("#kontrak_bulan").val();
            var tahun = $("#kontrak_tahun").val();
            var lokasi = $("#kontrak_lokasi").val();
            var alamat_t = $("#kontrak_alamat_t").val();
            var alamat_c = $("#kontrak_alamat_c").val();
            var nama_t = $("#kontrak_nama_t").val();
            var nama_c = $("#kontrak_nama_c").val();
            var rek_no = $("#kontrak_rek_no").val();
            var rek_name = $("#kontrak_rek_name").val();
            var jabatan_t = $("#kontrak_jabatan_t").val();
            var jabatan_c = $("#kontrak_jabatan_c").val();
            var nama_pt = $("#kontrak_nama_pt").val();
            var alamat_inv = $("#kontrak_alamat_inv").val();
            var program = $("#kontrak_program").val();

            $.ajax({
                type: "POST",
                datatype: "json",
                url: "<?php echo WS_JQGRID.'schema.sc_schema_controller/saveDataContract'; ?>",
                data: {
                    schema_id: schema_id,
                    nomor1: nomor1,
                    nomor2: nomor2,
                    hari: hari,
                    tanggal: tanggal,
                    bulan: bulan,
                    tahun: tahun,
                    lokasi: lokasi,
                    alamat_t: alamat_t,
                    alamat_c: alamat_c,
                    nama_t: nama_t,
                    nama_c: nama_c,
                    rek_no: rek_no,
                    rek_name: rek_name,
                    jabatan_t: jabatan_t,
                    jabatan_c: jabatan_c,
                    nama_pt: nama_pt,
                    alamat_inv: alamat_inv,
                    program: program
                },
                success: function (response) {
                    response = jQuery.parseJSON(response);
                    if(response.success) {
                        swal({title: 'Success', text: response.message, html: true, type: "success"});
                        $("#download-contract").show();
                    }else {
                        swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                    }
                }
             });

        });

        $("#download-contract").click(function() {
            var discount_code = $("#modal_lov_contract_discount_code").val();
            var schema_id = $("#modal_lov_contract_schema_id").val();
            var customer_name = $("#info_customer_name").val();

            location.href = '<?php echo WS_JQGRID.'schema.sc_schema_controller/downloadContract?discount_code='; ?>'+discount_code+"&schema_id="+schema_id+"&customer_name="+customer_name;
        });


        $('#info_start_dat').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#info_end_dat').datepicker({
            format: 'yyyy-mm-dd'
        });

        /* mengisi form customer order */
        $.ajax({
            type: 'POST',
            datatype: "json",
            url: '<?php echo WS_JQGRID."workflow.wf_controller/grid_customer_order"; ?>',
            data: { t_customer_order_id : $("#CURR_DOC_ID").val(),
                    p_w_proc_id : $('#TEMP_P_W_PROC_ID').val(),
                    page:1,
                    rows:1
            },
            timeout: 10000,
            success: function(data) {

                var response = JSON.parse( data );
                var items = response[0];

                $("#info_schema_id").val(items.schema_id);
                $("#info_account_num").val(items.account_num);
                $("#info_customer_name").val(items.customer_name);
                $("#info_start_dat").datepicker('setDate', items.start_date);
                $("#info_end_dat").datepicker('setDate', items.end_date);
                $("#info_discount_code").val(items.discount_id);
                $("#info_discount_description").val(items.disc_description);


                /**
                 * set data kontrak
                 */
                $("#modal_lov_contract_schema_id").val(items.schema_id);
                $("#modal_lov_contract_discount_code").val(items.discount_id);
                $("#modal_lov_contract_p_business_schem_id").val(items.p_business_schem_id);

                trend = items.trend;
                loadTableSkemaPembayaran(trend);
                loadTableFastel(items.schema_id);
                loadDataContract(items.schema_id);
                loadTableTrendInfo(items.schema_id);
                load_upd_contract(items.schema_id);

                checkContractExist(items.schema_id);
            }
        });

    });

    function checkContractExist(schema_id) {
        $.ajax({
            type: "POST",
            datatype: "json",
            url: "<?php echo WS_JQGRID.'schema.sc_schema_controller/contract_exist'; ?>",
            data: { schema_id: schema_id  },
            success: function (data) {
                var items = jQuery.parseJSON(data);
                if( items.exist ) {
                    $("#download-contract").show();
                }else {
                    $("#download-contract").hide();
                }
            }
        });
    }
    function download_c(c_id, filename){
        schema_id = $("#modal_lov_contract_schema_id").val();
         location.href = '<?php echo './application/third_party/upload_contract/'; ?>'+filename;
    }
    function delete_c(c_id, filename){
        schema_id = $("#modal_lov_contract_schema_id").val();
        $.ajax({
              url: "<?php echo WS_JQGRID.'schema.sc_schema_controller/del_down_c'; ?>",
              type: "POST",
              data: { schema_id: schema_id, c_id:c_id, filename:filename },
              success: function (data) {
                  load_upd_contract( $("#modal_lov_contract_schema_id").val());
              },
              error: function (xhr, status, error) {
                  swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                  return false;
              }
          });
    }
    function load_upd_contract(schema_id) {
         
        $('#body_tbl_kontrak').html('');
          $.ajax({
              url: "<?php echo WS_JQGRID.'schema.sc_schema_controller/get_contract_uploaded'; ?>",
              type: "POST",
              data: { schema_id: schema_id, is_del:1 },
              success: function (data) {
                  $('#body_tbl_kontrak').html(data);
              },
              error: function (xhr, status, error) {
                  swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                  return false;
              }
          });
      }
    function loadTableTrendInfo(schema_id) {
         

          $.ajax({
              url: "<?php echo WS_JQGRID.'schema.sc_schema_controller/getTableTrendInfo'; ?>",
              type: "POST",
              data: { schema_id: schema_id },
              success: function (data) {
                  $('#table-trend-info2').html(data);
              },
              error: function (xhr, status, error) {
                  swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                  return false;
              }
          });
      }

    function loadDataContract(schema_id) {

        $.ajax({
            type: 'POST',
            datatype: "json",
            url: "<?php echo WS_JQGRID.'schema.sc_schema_controller/getDataContract'; ?>",
            data: {
                schema_id : schema_id
            },
            timeout: 10000,
            success: function(data) {

                var data = jQuery.parseJSON(data);
                var items = data.items;

                if(items != null) {

                    $("#kontrak_nomor1").val(items.nomor1);
                    $("#kontrak_nomor2").val(items.nomor2);
                    $("#kontrak_hari").val(items.hari);
                    $("#kontrak_tanggal").val(items.tanggal);
                    $("#kontrak_bulan").val(items.bulan);
                    $("#kontrak_tahun").val(items.tahun);
                    $("#kontrak_lokasi").val(items.lokasi);
                    $("#kontrak_alamat_t").val(items.alamat_t);
                    $("#kontrak_alamat_c").val(items.alamat_c);
                    $("#kontrak_nama_t").val(items.nama_t);
                    $("#kontrak_nama_c").val(items.nama_c);
                    $("#kontrak_rek_no").val(items.rek_no);
                    $("#kontrak_rek_name").val(items.rek_name);
                    $("#kontrak_jabatan_t").val(items.jabatan_t);
                    $("#kontrak_jabatan_c").val(items.jabatan_c);
                    $("#kontrak_nama_pt").val(items.nama_pt);
                    $("#kontrak_alamat_inv").val(items.alamat_inv);
                    $("#kontrak_program").val(items.program);
                }
            }
        });
    }

    function loadTableFastel(schema_id) {
        var grid_selector = "#grid-table-fastel";
        var pager_selector = "#grid-pager-fastel";

        jQuery("#grid-table-fastel").jqGrid({
            url: '<?php echo WS_JQGRID."schema.fastel_controller/crud"; ?>',
            postData: {schema_id: schema_id},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 'fastel_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Nomor Fastel',name: 'p_notel',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Amount(IDR)',name: 'amount',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Location',name: 'location',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Status',name: 'status',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Action',name: 'action',width: 150, align: "left",editable: true,hidden:true,
                    formatter:  function(cellvalue, options, rowobject){
                      return '<a class="btn btn-xs btn-danger" onclick="delete_fastel('+cellvalue+')" href="javascript:;"><i class="icon-trash"></i></a>';
                      // return '<i class="btn red btn-xs fa fa-trash-o fa-1x" onclick="delete_fastel('+cellvalue+')"></i>';
                    }
                },
            ],
            height: '100%',
            autowidth: false,
            width:600,
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
            pager: '#grid-pager-fastel',
            jsonReader: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }
                responsive_jqgrid('#grid-table-fastel', '#grid-pager-fastel');
            },
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '<?php echo WS_JQGRID."schema.fastel_controller/crud"; ?>',
            caption: "Fastel"

        });

        jQuery('#grid-table-fastel').jqGrid('navGrid', '#grid-pager-fastel',
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
                serializeDelData: serializeJSON,
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                }
            }
        );

    }

    function serializeJSON(postdata) {
        var items;
        if(postdata.oper != 'del') {
            items = JSON.stringify(postdata, function(key,value){
                if (typeof value === 'function') {
                    return value();
                } else {
                  return value;
                }
            });
        }else {
            items = postdata.id;
        }

        var jsondata = {items:items, oper:postdata.oper, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'};
        return jsondata;
    }

    function style_edit_form(form) {

        //update buttons classes
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-primary');
        buttons.eq(1).addClass('btn-danger');


    }

    function style_delete_form(form) {
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-danger');
        buttons.eq(1).addClass('btn-default');
    }

    function style_search_filters(form) {
        form.find('.delete-rule').val('X');
        form.find('.add-rule').addClass('btn btn-xs btn-primary');
        form.find('.add-group').addClass('btn btn-xs btn-success');
        form.find('.delete-group').addClass('btn btn-xs btn-danger');
    }

    function style_search_form(form) {
        var dialog = form.closest('.ui-jqdialog');
        var buttons = dialog.find('.EditTable')
        buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'fa fa-retweet');
        buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'fa fa-comment-o');
        buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-success').find('.ui-icon').attr('class', 'fa fa-search');
    }

    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".tab-pane").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );

    }

</script>