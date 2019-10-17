<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>HASIL TAPPING</span>
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
                        <strong> SPTPD (Pelaporan Pajak) </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong> DETAIL SPTPD (Pelaporan Pajak) </strong>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong> HASIL TAPPING </strong>
                    </a>
                </li>
            </ul>
        </div>

         <div class="space-4"></div>
    <!-- parameter untuk kembali ke workflow summary -->
    <input type="hidden" id="t_vat_setllement_id" value="<?php echo $this->input->post('t_vat_setllement_id'); ?>" />
     <input type="hidden" id="npwd" value="<?php echo $this->input->post('npwd'); ?>" />
    <input type="hidden" id="t_cust_account_id" value="<?php echo $this->input->post('t_cust_account_id'); ?>" />
    <input type="hidden" id="finance_period_code" value="<?php echo $this->input->post('finance_period_code'); ?>" />
    <input type="hidden" id="p_finance_period_id" value="<?php echo $this->input->post('p_finance_period_id'); ?>" />
    <input type="hidden" id="t_customer_order_id" value="<?php echo $this->input->post('t_customer_order_id'); ?>" />
    <input type="hidden" id="order_no" value="<?php echo $this->input->post('order_no'); ?>" />
    <input type="hidden" id="p_rqst_type_id" value="<?php echo $this->input->post('p_rqst_type_id'); ?>" />
    <input type="hidden" id="rqst_type_code" value="<?php echo $this->input->post('rqst_type_code'); ?>" />

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
            <div class="row">
                <div class="col-md-12">
                    <table id="grid-table"></table>
                    <!-- <div id="grid-pager"></div> -->
                </div>
            </div>
            
        </div>
    </div>
</div>


<script>
    $(function($) {
        var grid_selector = "#grid-table";
        //var pager_selector = "#grid-pager";

        $("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi_wf.t_vat_setllement_dtl_ro_otobuk_tapping_controller/read"; ?>',
            datatype: "json",
            postData:{t_vat_setllement_id:<?php echo $this->input->post('t_vat_setllement_id'); ?>},
            mtype: "POST",
            colModel: [
                {label: 'TANGGAL', name: 'tanggal', width: 200,align: "left"},
                {label: 'JUMLAH RECEIPT',name: 'jml_receipt',width: 150, summaryTpl:"{0}",summaryType:"sum",formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},              
                {label: 'SUB TOTAL',name: 'sub_total',width: 150, summaryTpl:"{0}",summaryType:"sum",formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},  
                {label: 'CHARGE',name: 'charge',width: 150, summaryTpl:"{0}",summaryType:"sum",formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},  
                {label: 'TAX',name: 'tax',width: 150, summaryTpl:"{0}",summaryType:"sum",formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},   
                {label: 'TOTAL',name: 'total',width: 150, summaryTpl:"{0}",summaryType:"sum",formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"}
                ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: -1,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            footerrow: true,
            gridComplete: function() {
                var $grid = $('#grid-table');
                var jml_receipt = $grid.jqGrid('getCol', 'jml_receipt', false, 'sum');
                var sub_total = $grid.jqGrid('getCol', 'sub_total', false, 'sum');
                var charge = $grid.jqGrid('getCol', 'charge', false, 'sum');
                var tax = $grid.jqGrid('getCol', 'tax', false, 'sum');
                var total = $grid.jqGrid('getCol', 'total', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'tanggal':'TOTAL',
                                                    'jml_receipt': jml_receipt,
                                                    'sub_total':sub_total,
                                                    'charge': charge,
                                                    'tax': tax,
                                                    'total': total

                });
                 
            },
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
                setTimeout(function(){
                    $("#grid-table").setSelection($("#grid-table").getDataIDs()[0],true);
                },500);            
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }

            },
            caption: "HASIL TAPPING"

        });

        
    });
</script>

<script type="text/javascript">
     /* cek jika tipe view */
    if (  $('#ACTION_STATUS').val() == 'VIEW' ) {
        $('#btn-tambah').hide();
    }
    $("#tab-1").on("click", function(event) {
        event.stopPropagation();
        loadContentWithParams("transaksi_wf.t_vat_setllement_ro_otobuk", { //model yang ketiga
                t_vat_setllement_id:$('#t_vat_setllement_id').val(),
                    npwd:$('#npwd').val(),
                    t_cust_account_id:$('#t_cust_account_id').val(),
                    finance_period_code:$('#finance_period_code').val(),
                    p_finance_period_id:$('#p_finance_period_id').val(),
                    t_customer_order_id:$('#t_customer_order_id').val(),
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

    $("#tab-2").on("click", function(event) {
        event.stopPropagation();
        loadContentWithParams("transaksi_wf.t_vat_setllement_dtl_ro_otobuk", { //model yang ketiga
                t_vat_setllement_id:$('#t_vat_setllement_id').val(),
                    npwd:$('#npwd').val(),
                    t_cust_account_id:$('#t_cust_account_id').val(),
                    finance_period_code:$('#finance_period_code').val(),
                    p_finance_period_id:$('#p_finance_period_id').val(),
                    t_customer_order_id:$('#t_customer_order_id').val(),
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

