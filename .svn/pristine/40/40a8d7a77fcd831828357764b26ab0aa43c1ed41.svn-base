<!--breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>SPTPD (Pelaporan Pajak)</span>
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
                        <strong>SPTPD (Pelaporan Pajak)</strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong>DATA POTENSI</strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong>DATA LOG AKTIFITAS</strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-4">
                        <i class="blue"></i>
                        <strong>DOKUMEN PENDUKUNG</strong>
                    </a>
                </li>
            </ul>
        </div>
        <div class="form-body">
            <button class="btn btn-primary" type="button" id="btn-reject" onClick="rejectform();">Reject</button>
            <button class="btn btn-success" type="button" id="btn-submit" onClick="submitform();">Submit</button>
            <button class="btn btn-danger"  type="button" id="btn-kem"    onClick="backform();">KEMBALI</button>
            <div class="space-2"></div>
            <div class="row">
                <div class="col-md-12 ">
                    <table id="grid-table"></table>
                    <div id="grid-pager"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet blue box menu-panel">
            <div class="portlet-title">
                <div class="caption">INFORMASI</div>
                <div class="tools">
                    <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="form-horizontal">
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-4">No Order
                            </label>
                            <div class="col-md-5">
                                <input id="order_no" class="form-control"  readonly  name="order_no">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Jenis Pajak
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" readonly  name="jenis_pajak" id="jenis_pajak">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">NPWPD
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" readonly  name="npwd" id="npwd">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Nama WP
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" readonly name="wp_name" id="wp_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Alamt WP
                            </label>
                            <div class="col-md-5">
                                <div class="input-group ">
                                    <textarea rows="4" cols="50" class="form-control" readonly maxlength="256"  name="wp_address_name" id="wp_address_name"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Periode
                            </label>
                            <div class="col-md-5">
                                <div class="input-group ">
                                    <input type="text" class="form-control" readonly   name="finance_period_code" id="finance_period_code">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Masa Pajak
                            </label>
                            <div class="col-md-5">
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="start_period" readonly id="start_period">
                                    <span class="input-group-addon"> s/d </span>
                                    <input type="text" class="form-control"  readonly name="end_period" id="end_period">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Total Transaksi
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control priceformat" readonly name="total_trans_amount" id="total_trans_amount">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Total Pakak
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control priceformat" readonly name="total_vat_amount" id="total_vat_amount">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Tanggal Jatuh Tempo
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control " readonly name="due_date" id="due_date">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Dasar Pengenaan
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control priceformat" readonly name="debt_vat_amt" id="debt_vat_amt">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Pajak yang Terutang
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control priceformat" readonly name="terutang" id="terutang">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Kompensasi kelebihan dari tahun sebelumnya
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control priceformat" readonly name="cr_adjustment" id="cr_adjustment">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Setoran yang dilakukan
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control priceformat" readonly name="cr_payment" id="cr_payment">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Lain-lain
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control priceformat" readonly name="cr_others" id="cr_others">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">STP (Pokok)
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control priceformat" readonly name="cr_stp" id="cr_stp">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Bunga (Pasal 65 ayat(2))
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control priceformat" readonly name="db_interest_charge" id="db_interest_charge">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Kenaikan (Pasal 65 ayat (3))
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control priceformat" readonly name="db_increasing_charge" id="db_increasing_charge">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Anomali ?
                            </label>
                            <div class="col-md-5">
                                <select  name="is_anomali" id="is_anomali" class="form-control required">
                                    <option value='N' >TIDAK</option>
                                    <option value='Y' >YA</option>
                                </select>

                                <input type="hidden" class="form-control " readonly name="t_customer_order_id" id="t_customer_order_id">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Nomor Kohir
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control required" readonly name="no_kohir" id="no_kohir">

                                <button class="btn btn-danger" type="button" style="DISPLAY: none" id="btn-gen" onclick="">Generate Code</button>
                            </div>

                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-5 col-md-7">

                                    <input type="hidden" class="form-control " readonly name="payment_key" id="payment_key">

                                    <a class="btn green" id="print_pembayaran" onClick="printPembayaran();"> Print No Pembayaran
                                    </a>

                                    <a href="javascript:;" style="DISPLAY: none" class="btn green" id="Update"  > SIMPAN
                                    </a>

                                    <input type="hidden" class="form-control " readonly name="t_vat_setllement_id" id="t_vat_setllement_id">

                                    <input type="hidden" class="form-control " readonly name="t_cust_account_id" id="t_cust_account_id">
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".priceformat").number( true, 0 , '.',','); /* price number format */
    $(".priceformat").css("text-align", "right");
</script>

<!-- script untuk workflow -->
<?php $this->load->view('workflow/lov_submitter_non_reject_and_send_back.php'); ?>
<?php $this->load->view('workflow/lov_reject.php'); ?>
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

    function rejectform(){

        var t_vat_setllement_id = $('#t_vat_setllement_id').val();

        modal_lov_reject_show(t_vat_setllement_id, params_back_summary);
    }

</script>
<!-- /script untuk workflow -->

<!-- script untuk table -->

<script>

   var nilai; // variabel global untuk pengecekan kolom Cetak SPTPD/SKPDKB/SKPDN
   var is_ada; // variabel global untuk pengecekan kolom Cetak SPTPD


    jQuery(function($) {
        var grid_selector = "#grid-table";

        jQuery("#grid-table").jqGrid(
            {
            url: '<?php echo WS_JQGRID."transaksi_wf.t_vat_setllement_ro_otobuk_controller/read"; ?>',
            postData:{t_customer_order_id:"<?php echo $_POST['CURR_DOC_ID']; ?>"},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {name: 'Detail',width: 200, align: "left",
                    formatter:function(cellvalue, options, rowObject) {
                        var t_vat_setllement_id = rowObject['t_vat_setllement_id'];
                        var npwd = rowObject['npwd'];
                        var t_cust_account_id = rowObject['t_cust_account_id'];
                        var finance_period_code = rowObject['finance_period_code'];
                        var p_finance_period_id = rowObject['p_finance_period_id'];
                        var t_customer_order_id = rowObject['t_customer_order_id'];
                        var order_no = rowObject['order_no'];
                        var p_rqst_type_id = rowObject['p_rqst_type_id'];
                        var rqst_type_code = rowObject['rqst_type_code'];


                        return '<button class="btn btn-xs btn-danger"  type="button" id="btn-det" onClick="detail('+
                                    t_vat_setllement_id+',\''+
                                    npwd+'\','+
                                    t_cust_account_id+',\''+
                                    finance_period_code+'\','+
                                    p_finance_period_id+','+
                                    t_customer_order_id+',\''+
                                    order_no+'\','+
                                    p_rqst_type_id+',\''+
                                    rqst_type_code+'\''
                                    +');">Detail</button>';



                    }
                },
                {name: 'Document',width: 200, align: "left",
                    formatter:function(cellvalue, options, rowObject) {

                        var t_vat_setllement_id = rowObject['t_vat_setllement_id'];
                        var npwd = rowObject['npwd'];
                        var t_cust_account_id = rowObject['t_cust_account_id'];
                        var finance_period_code = rowObject['finance_period_code'];
                        var p_finance_period_id = rowObject['p_finance_period_id'];
                        var t_customer_order_id = rowObject['t_customer_order_id'];
                        var order_no = rowObject['order_no'];
                        var p_rqst_type_id = rowObject['p_rqst_type_id'];
                        var rqst_type_code = rowObject['rqst_type_code'];

                        //t_sptpd_legal_doc_ro_otobuk

                        return '<button class="btn btn-xs btn-danger"  type="button" id="btn-doc" onClick="docPendukung('+
                                    t_vat_setllement_id+',\''+
                                    npwd+'\','+
                                    t_cust_account_id+',\''+
                                    finance_period_code+'\','+
                                    p_finance_period_id+','+
                                    t_customer_order_id+',\''+
                                    order_no+'\','+
                                    p_rqst_type_id+',\''+
                                    rqst_type_code+'\''
                                    +');">Document</button>';


                    }
                },
                {label: 'NPWPD',name: 'npwd',width: 180, align: "left"},
                {label: 'Periode',name: 'finance_period_code',width: 180, align: "left"},
                {label: 'No. Order',name: 'order_no',width: 150, align: "left"},
                {label: 'Total Transaksi ',name: 'total_trans_amount',width: 180, align: "right",formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'}},
                {label: 'Total Pajak ',name: 'total_vat_amount',width: 150, align: "right",formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'}},
                {label: 'Cetak SPTPD/SKPDKB/SKPDN ',width: 380, align: "left",
                    formatter:function(cellvalue, options, rowObject) {
                        //console.log(nilai);
                        if (nilai == 1){
                            return '<button class="btn btn-xs btn-danger"  type="button" id="btn-kem" onClick="return cetak1('+rowObject['p_rqst_type_id']+','+rowObject['t_vat_setllement_id']+');">Cetak</button>';
                        }else if(nilai == 2 || nilai == 4){
                            return '<button class="btn btn-xs btn-danger"  type="button" id="btn-kem" onClick="return cetak2('+rowObject['t_vat_setllement_id']+');">Cetak</button>';
                        }else{
                            return '<button class="btn btn-xs btn-danger"  type="button" id="btn-kem" onClick="return cetak3('+rowObject['t_vat_setllement_id']+');">Cetak</button>';
                        }
                    }
                },
                {label: 'Cetak STPD',width: 150, align: "left",
                    formatter:function(cellvalue, options, rowObject) {
                        if (is_ada > 0){
                            return '<button class="btn btn-xs btn-danger"  type="button" id="btn-kem" onClick="cetakStpd('+rowObject['t_vat_setllement_id']+');">Cetak</button>';
                        }else{
                            return "";
                        }

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
            shrinkToFit: true,
            multiboxonly: true,
            footerrow: false,
            userDataOnFooter : true,
            gridComplete: function() {

            },
            grouping: true,
                groupingView : {
                                },
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            sortorder:'',
            jsonReader: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            beforeProcessing: function (data) {
                //untuk mengambil data p_settlement_type_id yang di gunakan untuk kolom Cetak SPTPD/SKPDKB/SKPDN
                // yang di tampung di dalam variabel global yang di berinama nilai
                $.ajax({
                    url: '<?php echo WS_JQGRID."transaksi_wf.t_vat_setllement_ro_otobuk_controller/read_type_setllement"; ?>',
                    type: "POST",
                    dataType: "json",
                    data: {
                       t_customer_order_id: "<?php echo $_POST['CURR_DOC_ID']; ?>"
                    },
                    success: function (data) {
                        if(data.success){
                            nilai = data.items.p_settlement_type_id;
                        }
                    },
                    error: function (xhr, status, error) {
                        swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                    }
                });

                //untuk mengambil data jumlah dari table t_vat_penalty yang di gunakan untuk kolom Cetak SPTPD
                // yang di tampung di dalam variabel global yang di berinama is_ada

                $.ajax({
                    url: '<?php echo WS_JQGRID."transaksi_wf.t_vat_setllement_ro_otobuk_controller/read_count_setllement"; ?>',
                    type: "POST",
                    dataType: "json",
                    data: {
                       t_vat_setllement_id: data.rows[0].t_vat_setllement_id
                    },
                    success: function (data) {
                        if(data.success){
                            is_ada = data.items.ada;
                        }
                    },
                    error: function (xhr, status, error) {
                        swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                    }
                });

            },
            loadComplete: function (response) {
                setTimeout(function(){
                    $("#grid-table").setSelection($("#grid-table").getDataIDs()[0],true);
                },500);
                // ============================Untuk Form
                // untuk mengisi data from nya
                $.ajax({
                    url: '<?php echo WS_JQGRID."transaksi_wf.t_vat_setllement_ro_otobuk_controller/read_setllement"; ?>',
                    type: "POST",
                    dataType: "json",
                    data: {
                       t_vat_setllement_id: response.rows[0].t_vat_setllement_id
                    },
                    success: function (data) {
                        if(data.success){
                            var dt = data.items;
                            if (dt != null || dt != ''){
                                $('#order_no').val(dt.order_no);
                                $('#jenis_pajak').val(dt.jenis_pajak);
                                $('#npwd').val(dt.npwd);
                                $('#wp_name').val(dt.wp_name);
                                $('#wp_address_name').val(dt.wp_address_name);
                                $('#finance_period_code').val(dt.finance_period_code);
                                $('#start_period').val(dt.start_period);
                                $('#end_period').val(dt.end_period);
                                $('#total_trans_amount').val(dt.total_trans_amount);
                                $('#total_vat_amount').val(dt.total_vat_amount);
                                $('#due_date').val(dt.due_date);
                                $('#debt_vat_amt').val(dt.debt_vat_amt);
                                $('#terutang').val(dt.terutang);
                                $('#terutang').val(dt.terutang);
                                $('#cr_adjustment').val(dt.cr_adjustment);
                                $('#cr_payment').val(dt.cr_payment);
                                $('#cr_others').val(dt.cr_others);
                                $('#cr_stp').val(dt.cr_stp);
                                $('#db_interest_charge').val(dt.db_interest_charge);
                                $('#db_increasing_charge').val(dt.db_increasing_charge);
                                $('#is_anomali').val(dt.is_anomali);
                                $('#t_customer_order_id').val(dt.t_customer_order_id);
                                $('#no_kohir').val(dt.no_kohir);
                                $('#payment_key').val(dt.payment_key);
                                $('#t_vat_setllement_id').val(dt.t_vat_setllement_id);
                                $('#t_cust_account_id').val(dt.t_cust_account_id);
                            }
                        }
                    },
                    error: function (xhr, status, error) {
                        swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                    }
                });

                // ============================ End Untuk Form

                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }

            },
            caption: "DAFTAR SPTPD (Pelaporan Pajak)"

        });




    });
</script>

<!-- /script untuk table -->



<!-- Action Button -->

<script>
    function detail(t_vat_setllement_id,
                    npwd,
                    t_cust_account_id,
                    finance_period_code,
                    p_finance_period_id,
                    t_customer_order_id,
                    order_no,
                    p_rqst_type_id,
                    rqst_type_code){

        loadContentWithParams("transaksi_wf.t_vat_setllement_dtl_ro_otobuk", {
                    t_vat_setllement_id:t_vat_setllement_id,
                    npwd:npwd,
                    t_cust_account_id:t_cust_account_id,
                    finance_period_code:finance_period_code,
                    p_finance_period_id:p_finance_period_id,
                    t_customer_order_id: t_customer_order_id,
                    order_no:order_no,
                    p_rqst_type_id: p_rqst_type_id,
                    rqst_type_code:rqst_type_code,
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
                    ACTION_STATUS : $('#ACTION_STATUS').val()});
    }

    function docPendukung(t_vat_setllement_id,
                    npwd,
                    t_cust_account_id,
                    finance_period_code,
                    p_finance_period_id,
                    t_customer_order_id,
                    order_no,
                    p_rqst_type_id,
                    rqst_type_code){

        loadContentWithParams("transaksi_wf.t_sptpd_legal_doc_ro_otobuk", {
                    t_vat_setllement_id:t_vat_setllement_id,
                    npwd:npwd,
                    t_cust_account_id:t_cust_account_id,
                    finance_period_code:finance_period_code,
                    p_finance_period_id:p_finance_period_id,
                    t_customer_order_id: t_customer_order_id,
                    order_no:order_no,
                    p_rqst_type_id: p_rqst_type_id,
                    rqst_type_code:rqst_type_code,
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
                    ACTION_STATUS : $('#ACTION_STATUS').val()});
    }


    function cetak1(p_rqst_type_id,t_vat_setllement_id){
        //alert('cetak1 '+p_rqst_type_id+" - "+t_vat_setllement_id);

        var url = "<?php echo base_url(); ?>";

        var urlLink = "?t_vat_setllement_id="+t_vat_setllement_id;
        if(p_rqst_type_id == 9){
            url += "cetak_sptpd_hiburan_pdf/pageCetak"+urlLink;
        }else if(p_rqst_type_id == 7){
            url += "cetak_sptpd_hotel_pdf/pageCetak"+urlLink;
        }else if(p_rqst_type_id == 10){
            url += "cetak_sptpd_parkir_pdf/pageCetak"+urlLink;
        }else if(p_rqst_type_id == 11){
            url += "cetak_sptpd_ppj_pdf/pageCetak"+urlLink;
        }else if(p_rqst_type_id == 8){
            url += "cetak_sptpd_restoran_pdf/pageCetak"+urlLink;
        }else{
            swal({title: "Error!", text: "Formulir Kosong!", html: true, type: "error"});
        }

        openInNewTab(url);
    }

    function cetak2(t_vat_setllement_id){
        //alert('cetak2 '+p_rqst_type_id);
        //belum
        var url = "<?php echo base_url(); ?>"+"cetak_formulir_skpdkb_pdf/pageCetak?t_vat_setllement_id="+t_vat_setllement_id;
        openInNewTab(url);
    }

    function cetak3(t_vat_setllement_id){
        //alert('cetak3 '+p_rqst_type_id);
        //belum
        var url = "<?php echo base_url(); ?>"+"cetak_formulir_skpdn_pdf/pageCetak?t_vat_setllement_id="+t_vat_setllement_id;
        openInNewTab(url);
    }

    function cetakStpd(t_vat_setllement_id){
        var url = "<?php echo base_url(); ?>"+"cetak_formulir_stpd_pdf/pageCetak?t_vat_setllement_id="+t_vat_setllement_id;
        openInNewTab(url);
    }

    function printPembayaran(){
        //alert('bayar');
        var no_kohir = $('#no_kohir').val();
        if(no_kohir!=null || no_kohir!="") {
            var t_vat_setllement_id = $('#t_vat_setllement_id').val();
            var no_kohir = $('#no_kohir').val();
            $.ajax({
                url: '<?php echo WS_JQGRID."transaksi_wf.t_vat_setllement_ro_otobuk_controller/update_no_kohir"; ?>',
                type: "POST",
                dataType: "json",
                data: {
                   t_vat_setllement_id: t_vat_setllement_id,no_kohir:no_kohir
                },
                success: function (data) {
                    if(data.success){
                        var dt = data.items.payment_key;
                        $('#payment_key').val(dt);
                    }
                },
                error: function (xhr, status, error) {
                    swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                }
            });
        }else{
            var t_customer_order_id = $('#t_customer_order_id').val();
            $.ajax({
                url: '<?php echo WS_JQGRID."transaksi_wf.t_vat_setllement_ro_otobuk_controller/generate_kohir"; ?>',
                type: "POST",
                dataType: "json",
                data: {
                   t_customer_order_id: t_customer_order_id
                },
                success: function (data) {
                    if(data.success){
                        var dt = data.items.f_generate_kohir;
                        $('#no_kohir').val(dt);

                        var t_vat_setllement_id = $('#t_vat_setllement_id').val();
                        var no_kohir = $('#no_kohir').val();
                        $.ajax({
                            url: '<?php echo WS_JQGRID."transaksi_wf.t_vat_setllement_ro_otobuk_controller/update_no_kohir"; ?>',
                            type: "POST",
                            dataType: "json",
                            data: {
                               t_vat_setllement_id: t_vat_setllement_id,no_kohir:no_kohir
                            },
                            success: function (data) {
                                if(data.success){
                                    var dt = data.items.payment_key;
                                    $('#payment_key').val(dt);
                                }
                            },
                            error: function (xhr, status, error) {
                                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                            }
                        });
                    }
                },
                error: function (xhr, status, error) {
                    swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                }
            });
        }

        var is_anomali = $('#is_anomali').val();
        var t_vat_setllement_id = $('#t_vat_setllement_id').val();

        $.ajax({
            url: '<?php echo WS_JQGRID."transaksi_wf.t_vat_setllement_ro_otobuk_controller/update_t_vat_setllement"; ?>',
            type: "POST",
            dataType: "json",
            data: {
               t_vat_setllement_id: t_vat_setllement_id,is_anomali:is_anomali
            },
            success: function (data) {
                if(data.success){
                    var dt = data.item;
                }
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
        });

        var payment_key = $('#payment_key').val();

        if (payment_key!=null || payment_key!=""){
            var url = "<?php echo base_url(); ?>"+"cetak_no_bayar/pageCetak?no_bayar="+payment_key;
            openInNewTab(url);
        }else{
            swal({title: "Error!", text: "Formulir Kosong!", html: true, type: "error"});
        }
    }

    function openInNewTab(url) {
      window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');
    }

</script>


<!-- End Action Button -->


<script>
    $("#tab-2").on("click", function(event) {
        event.stopPropagation();
        loadContentWithParams("transaksi_wf.data_potensi_ro_otobuk", { //model yang ketiga
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

    $("#tab-3").on("click", function(event) {
        event.stopPropagation();
        loadContentWithParams("transaksi_wf.t_order_log_kronologis_otobuk", { //model yang ketiga
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

    $("#tab-4").on("click", function(event) {
        event.stopPropagation();
        loadContentWithParams("transaksi_wf.t_sptpd_legal_doc_ro_otobuk_v2", { //model yang ketiga
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