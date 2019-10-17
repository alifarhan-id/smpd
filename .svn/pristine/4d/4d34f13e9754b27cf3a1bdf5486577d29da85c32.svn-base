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
                                    <form class="form-horizontal" id="sample-form">
                                        <input id="form_t_customer_order_id" name="t_customer_order_id" type="text" value="<?php echo $this->input->post('CURR_DOC_ID'); ?>" style="display:none;">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                        <div class="form-group">
                                            <label class="control-label col-md-3"> Nama Dokumen: </label>
                                                <div class="input-group col-md-4">
                                                    <input type="text" class="form-control" disabled id="doc_name" name="doc_name" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3"> No Order: </label>
                                                <div class="input-group col-md-4">
                                                    <input type="text" class="form-control" disabled id="order_no" name="order_no" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3"> Tanggal Order: </label>
                                                <div class="input-group col-md-4">
                                                    <input type="text" class="form-control" disabled id="order_date" name="order_date" />
                                                </div>
                                        </div>

                                    </form>
                                      
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
            
            $("#order_no").val( items.order_no );
            $("#doc_name").val( items.doc_name );
            $("#order_date").val( items.order_date );

        }
    });

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

</script>