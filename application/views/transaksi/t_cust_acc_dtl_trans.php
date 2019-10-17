<link href="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Transaksi Harian WP</span>
            <i class="fa fa-circle"></i>
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
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" class="back" id="tab-0">
                        <i class="blue"></i>
                        <strong>Transaksi Harian WP</strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                        <i class="blue"></i>
                        <strong>Transaksi Bulanan WP</strong>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet blue box menu-panel">
                        <div class="portlet-title">
                            <div class="caption">Transaksi Harian WP</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">   
                            <div class="form-horizontal">
                                <div class="row">                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-2">NPWPD
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control required" name="t_cust_account_id" id="t_cust_account_id" readonly>
                                                <input type="text" class="form-control required" name="npwd" id="npwd" readonly>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success" type="button" id="btn-lov-npwd">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Tgl. Transaksi
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control required datepicker1" required maxlength="32" name="trans_date" id="trans_date" onfocusout="checkNull(this);">
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <a href="javascript:;" class="btn btn-success" id="btn-find">Cari</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row changeNone">
    <div class="col-md-12 ">
        <table id="grid-table"></table>
        <div id="grid-pager"></div>
    </div>
</div>

<div class="space-4"></div>

<div class="tab-content no-border changeNone">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet green box menu-panel">
                <div class="portlet-title">
                    <div class="caption" id="captionDetail">INFORMASI TRANSAKSI HARIAN WP (MANUAL INPUT)</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">   
                    <div class="form-horizontal">
                        <div class="row">   
                            <div class="form-group">
                                <label class="control-label col-md-2">No Faktur</label>
                                <div class="col-md-3">
                                    <input type="text" maxlength="32" class="form-control required" required  name="bill_no" id="bill_no">
                                </div>

                                <input type="hidden"  name="t_cust_acc_dtl_trans_id" id="t_cust_acc_dtl_trans_id">
                                <input type="hidden"  name="service_desc" id="service_desc">
                                <input type="hidden"  name="vat_charge" id="vat_charge">
                                <input type="hidden"  name="description" id="description">
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Nilai Transaksi</label>
                                <div class="col-md-3">
                                    <input type="text" maxlength="12" class="form-control required numberformat" required  name="service_charge" id="service_charge">
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-9">
                                        <a href="javascript:;" class="btn btn-danger" id="btn-tambah">Tambah</a>
                                        <a href="javascript:;" class="btn btn-success" id="btn-simpan">Simpan</a>
                                        <a href="javascript:;" class="btn btn-success" id="btn-hapus">Hapus</a>
                                        <a href="javascript:;" class="btn btn-success" id="btn-cetak">Cetak</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tab-content no-border changeNone">
    <div class="row">
        <div class="col-md-7">
            <div class="portlet red box menu-panel">
                <div class="portlet-title">
                    <div class="caption" >INFORMASI TRANSAKSI HARIAN WP (MANUAL OTOMATIS)</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">  
                    <form role="form" id="form_legal" name="form_legal" method="post" enctype="multipart/form-data" accept-charset="utf-8"> 
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="form_t_cust_account_id" id="form_t_cust_account_id">
                        <input type="hidden" name="form_trans_date" id="form_trans_date">
                        <div class="form-horizontal">
                            <div class="row">   
                                <div class="form-group">
                                    <label class="control-label col-md-3">Upload File Excel</label>
                                    <div class="col-md-4">
                                        <input type="file" required name="uploadForm" id="uploadForm">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-3">
                                            <button class="btn btn-sm green-jungle radius-4">
                                                <i class="ace-icon fa fa-check"></i>
                                                Upload File Excel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('lov/lov_npwd'); ?>

<script>

    $('.changeNone').css('display','none');
    $('#btn-simpan').css('display','');
    $('#btn-hapus').css('display','none');
    $('#btn-cetak').css('display','none');
    $('#btn-tambah').css('display','none');
    $('#captionDetail').text('INFORMASI TRANSAKSI HARIAN WP (MANUAL INPUT)');

    $(".numberformat").css("text-align", "right");

    function checkNull(param){
        var data = param.value;
        if (data==null || data=='')
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!

            var yyyy = today.getFullYear();
            if(dd<10){
                dd='0'+dd;
            } 
            if(mm<10){
                mm='0'+mm;
            } 
            var today = yyyy+'-'+mm+'-'+dd;
            param.value=today;
    }  

    $.ajax({
            url: '<?php echo WS_JQGRID."transaksi.t_cust_acc_dtl_trans_controller/fisrtLoad_NPWD"; ?>',
            type: "POST",
            dataType: "json",
            data: {
            },
            success: function (data) {
                if(data.success){
                    var dt = data.rows;
                    //console.log(dt);
                    $('#t_cust_account_id').val(dt.t_cust_account_id);
                    $('#npwd').val(dt.npwd);
                }
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
        });

    $('.datepicker1').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: new Date()
    });
    

    $('#btn-lov-npwd').on('click',function(){
        modal_lov_npwd_show('t_cust_account_id','npwd');
    });

    $('#btn-find').on('click',function(){
        var t_cust_account_id = $('#t_cust_account_id').val();
        var trans_date = $('#trans_date').val();
        if (t_cust_account_id==''||trans_date==''){
            swal({title: "Error!", text: 'Parameter Harus Di ISI', html: true, type: "error"});
        }else{
            $('.changeNone').css('display','');
            jQuery(function($) {
                var grid_selector = "#grid-table";
                
                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."transaksi.t_cust_acc_dtl_trans_controller/read"; ?>',
                    postData: {t_cust_account_id:t_cust_account_id,trans_date:trans_date}
                });
                $("#grid-table").jqGrid("setCaption", "DAFTAR TRANSAKSI HARIAN WP");
                $("#grid-table").trigger("reloadGrid");
            }); 
        }
        
    });

    $('#btn-tambah').on('click',function(){
        $('#t_cust_acc_dtl_trans_id').val(null);
        $('#bill_no').val(null);
        $('#service_desc').val(null);
        $('#service_charge').val(null);
        $('#vat_charge').val(null);
        $('#description').val(null);

        $('#btn-simpan').css('display','');
        $('#btn-hapus').css('display','none');
        $('#btn-tambah').css('display','none');
        $('#btn-cetak').css('display','none');
        $('#captionDetail').text('ADD INFORMASI TRANSAKSI HARIAN WP (MANUAL INPUT)');
    });

    $('#btn-cetak').on('click',function(){
        toPDF();
    });

    $('#btn-simpan').on('click',function(){
        var t_cust_account_id = $('#t_cust_account_id').val();
        var trans_date = $('#trans_date').val();
        var bill_no = $('#bill_no').val();
        var service_charge = $('#service_charge').val();
        var description = $('#description').val();
        var t_cust_account_id = $('#t_cust_account_id').val();
        var trans_date = $('#trans_date').val();

        $.ajax({
            url: '<?php echo WS_JQGRID."transaksi.t_cust_acc_dtl_trans_controller/insert_data"; ?>',
            type: "POST",
            dataType: "json",
            data: {
                t_cust_account_id:t_cust_account_id,
                trans_date:trans_date,
                bill_no:bill_no,
                service_charge:service_charge,
                description: description
            },
            success: function (data) {
                if(data.success){
                    var t_cust_account_id = $('#t_cust_account_id').val();
                    var trans_date = $('#trans_date').val();
                    var dt = data.rows;
                    jQuery(function($) {
                        var grid_selector = "#grid-table";

                        jQuery("#grid-table").jqGrid('setGridParam',{
                            url: '<?php echo WS_JQGRID."transaksi.t_cust_acc_dtl_trans_controller/read"; ?>',
                            postData: {t_cust_account_id:t_cust_account_id,trans_date:trans_date}
                        });
                        $("#grid-table").jqGrid("setCaption", "DAFTAR TRANSAKSI HARIAN WP");
                        $("#grid-table").trigger("reloadGrid");
                    });
                }
                swal("Insert!", "success", "success");
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
        });
    });

    $('#btn-hapus').on('click',function(){
        swal({
              title: "Apakah anda Ingin Menghapus Data Ini?",
              text: "",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
            },
            function(){
                //(function(){
                var t_cust_acc_dtl_trans_id = $('#t_cust_acc_dtl_trans_id').val();
                $.ajax({
                    url: '<?php echo WS_JQGRID."transaksi.t_cust_acc_dtl_trans_controller/delete_data"; ?>',
                    type: "POST",
                    dataType: "json",
                    data: {
                        t_cust_acc_dtl_trans_id:t_cust_acc_dtl_trans_id
                    },
                    success: function (data) {
                        $('#t_cust_acc_dtl_trans_id').val(null);
                        $('#bill_no').val(null);
                        $('#service_desc').val(null);
                        $('#service_charge').val(null);
                        $('#vat_charge').val(null);
                        $('#description').val(null);

                        $('#btn-simpan').css('display','');
                        $('#btn-hapus').css('display','none');
                        $('#btn-tambah').css('display','none');
                        $('#btn-cetak').css('display','none');
                        $('#captionDetail').text('ADD INFORMASI TRANSAKSI HARIAN WP (MANUAL INPUT)');
                        if(data.success){
                            var t_cust_account_id = $('#t_cust_account_id').val();
                            var trans_date = $('#trans_date').val();
                            var dt = data.rows;
                            jQuery(function($) {
                                var grid_selector = "#grid-table";

                                jQuery("#grid-table").jqGrid('setGridParam',{
                                    url: '<?php echo WS_JQGRID."transaksi.t_cust_acc_dtl_trans_controller/read"; ?>',
                                    postData: {t_cust_account_id:t_cust_account_id,trans_date:trans_date}
                                });
                                $("#grid-table").jqGrid("setCaption", "DAFTAR TRANSAKSI HARIAN WP");
                                $("#grid-table").trigger("reloadGrid");
                            });
                        }


                        swal("Deleted!", "success", "success");
                    },
                    error: function (xhr, status, error) {
                        swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                    }
                });
           
        });
    });

    $(function() {
        /* submit */
        $("#form_legal").on('submit', (function (e) {
            var t_cust_account_id = $('#t_cust_account_id').val();
            var trans_date = $('#trans_date').val();

            $('#form_t_cust_account_id').val(t_cust_account_id);
            $('#form_trans_date').val(trans_date);

            e.preventDefault();   
            var data = new FormData(this);
            console.log(data);
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo WS_JQGRID."transaksi.t_cust_acc_dtl_trans_controller/saveUpload"; ?>',
                data: data,
                timeout: 10000,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false, 
                success: function(data) {
                    console.log(data);
                    if(data.success) {
                        swal("Sukses", data.message, "info");


                    }else{
                        swal("", data.message, "warning");
                    }
                   
                }
            });
            return false;
        }));
        
    });

    $('#tab-1').on('click',function(event){
        event.stopPropagation();
        loadContentWithParams("transaksi.t_cust_acc_dtl_trans_month", {
            trans_date:$('#trans_date').val(),
            npwd:$('#npwd').val(),
            t_cust_account_id:$('#t_cust_account_id').val()
        });
    });

</script>

<script>

    
    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_cust_acc_dtl_trans_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'id',name: 't_cust_acc_dtl_trans_id',width: 200, align: "left",hidden:true},
                {label: 'No. Faktur',name: 'bill_no',width: 200, align: "left"},
                {label: 'Nama Transaksi',name: 'service_desc',width: 200, align: "left"},
                {label: 'Nilai Transaksi',name: 'service_charge',width: 200, formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},align: "right"},
                {label: 'Nilai Pajak ',name: 'vat_charge',width: 200, formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},align: "right"},
                {label: 'Deskripsi',name: 'description',width: 200, align: "left"}

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
            footerrow: false,
            gridComplete: function() {
            },
            onSelectRow: function (rowid) {
                /*do something when selected*/
                setForm(rowid);
                $('#btn-simpan').css('display','none');
                $('#btn-hapus').css('display','');
                $('#btn-tambah').css('display','');
                $('#btn-cetak').css('display','');

                $('#captionDetail').text('INFORMASI TRANSAKSI HARIAN WP (MANUAL INPUT)');
            },
            sortorder:'',
            //pager: '#grid-pager',
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
            caption: "  DAFTAR TRANSAKSI HARIAN WP"

        });



    });
    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );

    }

    function setForm(rowid){
        var t_cust_acc_dtl_trans_id = $('#grid-table').jqGrid('getCell', rowid, 't_cust_acc_dtl_trans_id');
        var bill_no = $('#grid-table').jqGrid('getCell', rowid, 'bill_no');
        var service_desc = $('#grid-table').jqGrid('getCell', rowid, 'service_desc');
        var service_charge = $('#grid-table').jqGrid('getCell', rowid, 'service_charge');
        var vat_charge = $('#grid-table').jqGrid('getCell', rowid, 'vat_charge');
        var description = $('#grid-table').jqGrid('getCell', rowid, 'description');
        
        $('#t_cust_acc_dtl_trans_id').val(t_cust_acc_dtl_trans_id);
        $('#bill_no').val(bill_no);
        $('#service_desc').val(service_desc);
        $('#service_charge').val(service_charge);
        $('#vat_charge').val(vat_charge);
        $('#description').val(description);
    }

</script>

<script >
    function toPDF(){

        var t_cust_account_id   = $('#t_cust_account_id').val();
        var trans_date          = $('#trans_date').val();

        if(t_cust_account_id == "" || trans_date == ""  ){
            swal ( "Oopss" ,  "NPWPD Dan Tgl Transaksi Harus Terisi!" ,  "error" );
             return;
        }else{

            var url = "<?php echo base_url(); ?>"+"cetak_trans_harian_pdf/save_pdf?";
            url += "t_cust_account_id=" + t_cust_account_id;
            url += "&trans_date=" + trans_date;

            openInNewTab(url);
            
        }
    }

    function openInNewTab(url) {
      window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');
    }
</script>