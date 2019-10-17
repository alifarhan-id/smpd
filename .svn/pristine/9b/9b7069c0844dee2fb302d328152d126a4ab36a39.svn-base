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



<input type="hidden" id="trans_date" value="<?php echo $this->input->post('trans_date'); ?>" />
<input type="hidden" id="npwd" value="<?php echo $this->input->post('npwd'); ?>" />
<input type="hidden" id="t_cust_account_id" value="<?php echo $this->input->post('t_cust_account_id'); ?>" />

<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" class="back" id="tab-0">
                        <i class="blue"></i>
                        <strong>Transaksi Harian WP</strong>
                    </a>
                </li>
                <li class="active">
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
                    <div class="row">
                        <div class="col-md-12 ">
                            <a href="javascript:;" class="btn btn-success" id="btn-cetak">Cetak</a>
                        </div>
                        
                        <div class="space-4"></div>
                        <div class="col-md-12 ">
                            <table id="grid-table"></table>
                            <div id="grid-pager"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>

    $('#tab-0').on('click',function(event){
        event.stopPropagation();
        loadContentWithParams("transaksi.t_cust_acc_dtl_trans", {
            trans_date:$('#trans_date').val(),
            npwd:$('#npwd').val(),
            t_cust_account_id:$('#t_cust_account_id').val()
        });
    });

    $('#btn-cetak').on('click',function(){
        toPDF();
    });

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_cust_acc_dtl_trans_month_controller/read"; ?>',
            datatype: "json",
            postData:{ t_cust_account_id:$('#t_cust_account_id').val()},
            mtype: "POST",
            colModel: [
                {label: 'Tanggal Transaksi',name: 'trans_date_txt',width: 200, align: "left"},
                {label: 'Nilai Transaksi',name: 'service_charge',width: 200, formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},align: "right"},
                {label: 'Nilai Pajak ',name: 'vat_charge',width: 200, formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},align: "right"}

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
            caption: "  DAFTAR TRANSAKSI BULANAN WP"

        });



    });
    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );

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

            var url = "<?php echo base_url(); ?>"+"cetak_trans_bulanan_pdf/save_pdf?";
            url += "t_cust_account_id=" + t_cust_account_id;
            url += "&trans_date=" + trans_date;

            openInNewTab(url);
            
        }
    }

    function openInNewTab(url) {
      window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');
    }
</script>