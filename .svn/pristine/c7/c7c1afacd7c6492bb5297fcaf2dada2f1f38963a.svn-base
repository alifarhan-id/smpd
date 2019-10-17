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
                        <strong> SPTPD (Pelaporan Pajak) </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
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

    <div class="col-xs-12">
        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-12">
                    <table id="grid-table"></table>
                    <div id="grid-pager"></div>
                </div>
            </div>
            <div class="space-4"></div>  
            <div class="row">
                <div class="col-md-12" align="center">
                    <button class="btn btn-success" onclick="submitform()">SUBMIT</button>
                    <button class="btn btn-success" onclick="backform()">BACK</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('workflow/lov_submitter.php'); ?>
<?php $this->load->view('lov/lov_debt_excel.php'); ?>

<script>


$("#tab-2").on("click", function(event) {
    event.stopPropagation();
    //alert(p_rqst_type_id);
    // t_vat_reg_employee_id = $('#t_vat_reg_employee_id').val() ;
    // t_vat_reg_dtl_restaurant_id = $('#t_vat_reg_dtl_restaurant_id').val() ;
    // t_license_letter_id = $('#t_license_letter_id').val() ;


    loadContentWithParams("transaksi_wf.t_order_log_kronologis_setllement_ro", { //model yang ketiga
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

    function showDetail(rowid){

        var t_vat_setllement_id = $("#grid-table").jqGrid ('getCell', rowid, 't_vat_setllement_id');
        var t_cust_account_id = $("#grid-table").jqGrid ('getCell', rowid, 't_cust_account_id');
        var p_finance_period_id = $("#grid-table").jqGrid ('getCell', rowid, 'p_finance_period_id');
        var npwd = $("#grid-table").jqGrid ('getCell', rowid, 'npwd');
        var finance_period_code = $("#grid-table").jqGrid ('getCell', rowid, 'finance_period_code');
        var order_no = $("#grid-table").jqGrid ('getCell', rowid, 'order_no');
        var rqst_type_code = $("#grid-table").jqGrid ('getCell', rowid, 'rqst_type_code');
        var p_rqst_type_id = $("#grid-table").jqGrid ('getCell', rowid, 'p_rqst_type_id');

        loadContentWithParams("transaksi_wf.t_vat_setllement_dtl_ro", { //model yang ketiga
            t_vat_setllement_id : t_vat_setllement_id,
            t_cust_account_id:t_cust_account_id,
            p_finance_period_id:p_finance_period_id,
            npwd:npwd,
            finance_period_code:finance_period_code,
            order_no:order_no,
            rqst_type_code:rqst_type_code,
            p_rqst_type_id:p_rqst_type_id,  
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
    } 

    function showDokumen(){
        loadContentWithParams("transaksi_wf.t_cust_order_legal_doc_setllement_ro", { //model yang ketiga
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
    } 

    function payment(){

        var var_url = "<?php echo WS_JQGRID . "transaksi.t_vat_setllement_ro_controller/flagPayment/?"; ?>";
        var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        var_url += "&t_customer_order_id=" + $('#CURR_DOC_ID').val();

        $.getJSON(var_url, function( items ) {   
            swal('Informasi',items.rows.f_payment_manual,'info'); 
        });

    }

    function printRegister(){

        var var_url = "<?php echo WS_JQGRID . "transaksi.t_vat_setllement_ro_controller/cetakRegister/?"; ?>";
        var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        var_url += "&t_customer_order_id=" + $('#CURR_DOC_ID').val();

        $.getJSON(var_url, function( items ) {   
            swal('Informasi','Nomor Penerimaan : '+items.rows.f_print_register,'info'); 
        });

    }


</script>

<script type="text/javascript">
    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_vat_setllement_ro_controller/read"; ?>',
            postData: { t_customer_order_id : $('#CURR_DOC_ID').val() },
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_customer_order_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID Cust', name: 't_vat_setllement_id',  width: 5, sorttype: 'number', editable: false, hidden: true},
                {label: 'ID Cust', name: 'p_finance_period_id',  width: 5, sorttype: 'number', editable: false, hidden: true},
                {label: 'ID Cust', name: 't_cust_account_id',  width: 5, sorttype: 'number', editable: false, hidden: true},
                {label: 'ID Cust', name: 'p_vat_type_id',  width: 5, sorttype: 'number', editable: false, hidden: true},
                {label: 'ID Cust', name: 'p_rqst_type_id',  width: 5, sorttype: 'number', editable: false, hidden: true},
                {label: 'ID Cust', name: 'rqst_type_code',  width: 5, editable: false, hidden: true},
                {label: 'Detail',name: 'detail',width: 120, align: "center",editable: false,
                    formatter: function(cellvalue, options, rowObject) {
                        var rowId = rowObject['t_customer_order_id'];
                        return '<a href="#" onclick="showDetail('+rowId+');"> <i class="fa fa-list bigger-120"></i> </a>';
                    }
                },
                {label: 'Dokumen',name: 'dokumen',width: 120, align: "center",editable: false,
                    formatter: function(cellvalue, options, rowObject) {
                        return '<a href="#" onclick="showDokumen();"> <i class="fa fa-folder bigger-120"></i> </a>';
                    }
                },
                {label: 'Nama WP',name: 'wp_name',width: 200, align: "left",editable: false},

                {label: 'NPWPD',name: 'npwd',width: 200, align: "center",editable: false},

                {label: 'No. Kohir',name: 'no_kohir',width: 200, align: "center",editable: false},

                {label: 'No. Order',name: 'order_no',width: 200, align: "center",editable: false},

                {label: 'Periode',name: 'finance_period_code',width: 200, align: "left",editable: false},
                {label: 'Total Transaksi',name: 'total_trans_amount',width: 200, align: "right",editable: false},
                {label: 'Total Pajak',name: 'total_vat_amount',width: 200, align: "right",editable: false},
                {label: 'Denda',name: 'total_penalty_amount',width: 200, align: "right",editable: false},
                {label: 'Total',name: 'total_total',width: 200, align: "left",editable: false},
                {label: 'Flag Payment',name: 'flag',width: 200, align: "center",editable: false,
                    formatter: function(cellvalue, options, rowObject) {
                        return '<button class="btn btn-xs btn-danger" onclick="payment();"> Flag Payment </button>';
                    }
                },
                {label: 'Cetak Register',name: 'cetak',width: 200, align: "center",editable: false,
                    formatter: function(cellvalue, options, rowObject) {
                        return '<button class="btn btn-xs btn-danger" onclick="printRegister();"> Cetak Register </button>';
                    }
                }
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 5,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/
                //alert(rowid);

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
            caption: "Daftar Customer"

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
                    t_customer_id: function() {
                        return <?php echo $this->input->post('t_customer_id'); ?>;
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
</script>





<script type="text/javascript">


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


