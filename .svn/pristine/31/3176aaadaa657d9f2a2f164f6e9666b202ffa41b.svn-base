<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>LAPORAN DENDA TGL TAP</span>
        </li>
    </ul> 
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-2">Ayat Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group">
                            <input id="form_vat_dtl_id" type="text"  style="display:none;">
                            <input id="kode_ayat" name="kode_ayat" type="text"  style="display:none;">
                            <input id="form_vat_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Ayat Pajak">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVVat_type('form_vat_dtl_id','form_vat_code',7)">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                            </div>            
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Periode Awal Bayar</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="start_period" id="start_period">  
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Periode Akhir Bayar</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="end_period" id="end_period">  
                        </div>
                    </div>
                </div>    
                <div class="space-4"></div>
                <div class="row col-md-offset-2">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showData()">Tampilkan</button>
                    <button class="btn btn-success" type="button" onclick="toExcel()" id="excel">Tampilkan Excel</button>
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showDataRekap()">Tampilkan Rekap</button>
                    <button class="btn btn-success" type="button" onclick="toExcelRekap()" id="excel">Tampilkan Rekap Excel</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<div class="tab-content no-border">
    <div class="row">
        <div class="col-xs-12">
            <div id="gbox_grid-table" class="ui-jqgrid">
                <div id="gview_grid-table-history" class="ui-jqgrid-view table-responsive" role="grid">
                    <table id="grid-table-history"></table>               
                </div>
                <div id="gview_grid-table-rekap" class="ui-jqgrid-view table-responsive" role="grid">  <table id="grid-table-rekap"></table>
                </div>
            </div>            
        </div>
    </div>
</div>


<?php $this->load->view('lov/lov_vat_type_dtl'); ?> 

<script type="text/javascript">
$ ("#gview_grid-table-history").hide();
$ ("#gview_grid-table-rekap").hide();

   
jQuery(function ($) {

    var grid_selector = "#grid-table-history";
    jQuery("#grid-table-history").jqGrid({
            url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_denda_tgl_bayar_controller/readData"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'No. ',name: 'nomor',width: 75, align: "left"},
                {label: 'Jenis Pajak',name: 'jenis_pajak',width: 200, align: "left"},
                {label: 'Ayat Pajak',name: 'ayat_pajak',width: 300, align: "left"},
                {label: 'Nama Wajib Pajak',name: 'wp_name',width: 300, align: "left"},
                {label: 'Merk Dagang',name: 'company_brand',width: 300, align: "left"},
                {label: 'NPWPD',name: 'npwpd',width: 200, align: "center"},
                {label: 'Masa Pajak',name: 'masa_pajak',width: 200, align: "left"},
                {label: 'Tanggal TAP',name: 'tgl_tap',width: 200, align: "center"},
                {label: 'Total Denda',name: 'total_penalty_amount',width: 200, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Status Bayar',name: 'status',width: 200, align: "left"},
                {label: 'Tanggal Bayar',name: 'payment_date',width: 200, align: "center"}
            ],
            height: '100%',
            autowidth: false,
            viewrecords: true,
            rowNum: -1,
            rowList: [10, 20, 50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            footerrow: true,
            grouping:true,
            gridComplete: function() {
                var $grid = $('#grid-table-history');
                var colSum3 = $grid.jqGrid('getCol', 'total_penalty_amount', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'total_penalty_amount': colSum3 });   
            },
            caption: "LAPORAN DENDA TGL BAYAR"
        });
});

jQuery(function ($) {

    jQuery("#grid-table-rekap").jqGrid({
        url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_denda_tgl_bayar_controller/readRekap"; ?>',
        datatype: "json",
        mtype: "POST",
        colModel: [
            {label: 'No. ',name: 'nomor',width: 75, align: "left"},
            {label: 'Bulan Penerbitan',name: 'code',width: 200, align: "left"},
            {label: 'Denda',name: 'denda',width: 300, summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},
            {label: 'Keterangan',name: '',width: 200, align: "left"}
        ],
        height: '100%',
        autowidth: false,
        viewrecords: true,
        rowNum: -1,
        rowList: [10, 20, 50],
        rownumbers: true, // show row numbers
        rownumWidth: 35, // the width of the row numbers columns
        altRows: true,
        shrinkToFit: false,
        multiboxonly: true,
        footerrow: true,
        grouping:true,
        gridComplete: function() {
            var $grid = $('#grid-table-rekap');
            var colSum = $grid.jqGrid('getCol', 'denda', false, 'sum');
            $grid.jqGrid('footerData', 'set', { 'denda': colSum });
            
        },
        onSelectRow: function (rowid) {
            /*do something when selected*/

        },
        loadComplete: function () {                
           
        },
          
        caption: "LAPORAN REKAP DENDA TGL BAYAR"
    
    });

        
        
}); 

function showData(){
    $("#gview_grid-table-history").show();
    $("#gview_grid-table-rekap").hide();///or 'hidden' 
      

    var p_settlement_type_id = $('#form_ketetapan_id').val();
    var p_vat_type_dtl_id = $('#form_vat_dtl_id').val(); 
    var start_date = $('#start_period').val();
    var end_date = $('#end_period').val();
    var status_bayar = $('#status').val();

    if (p_settlement_type_id==''||start_date==''||end_date==''||status_bayar==''){
        swal('Informasi','Semua Harus Diisi','info');
        $ ("#gview_grid-table-history").hide();
        $ ("#gview_grid-table-rekap").hide();
        return;

    }

        jQuery(function($) {
        var grid_selector = "#grid-table-history";
        //var pager_selector = "#grid-pager-bpps2";

            jQuery("#grid-table-history").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."pelaporan.t_laporan_denda_tgl_bayar_controller/readData"; ?>',
                postData: {
                            p_settlement_type_id:p_settlement_type_id,
                            p_vat_type_dtl_id:p_vat_type_dtl_id,
                            start_date:start_date,
                            end_date:end_date,
                            status_bayar:status_bayar
                        }

            });

            $("#grid-table-history").jqGrid("setCaption", "LAPORAN DENDA TGL BAYAR || PERIODE PEMBAYARAN : "+start_date+" s.d. "+end_date);
            $("#grid-table-history").trigger("reloadGrid");
        });
}
function showDataRekap(){

    $("#gview_grid-table-history").hide();
    $("#gview_grid-table-rekap").show();
    var p_vat_type_dtl_id = $('#form_vat_dtl_id').val(); 
    var start_date = $('#start_period').val();
    var end_date = $('#end_period').val();

    if (p_vat_type_dtl_id==''||start_date==''||end_date==''){
        swal('Informasi','Semua Harus Diisi','info');
        $ ("#gview_grid-table-history").hide();
        $ ("#gview_grid-table-rekap").hide();
        return;

    }

        jQuery(function($) {
        var grid_selector = "#grid-table-rekap";
        //var pager_selector = "#grid-pager-bpps2";

            jQuery("#grid-table-rekap").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."pelaporan.t_laporan_denda_tgl_bayar_controller/readRekap"; ?>',
                postData: {
                            p_vat_type_dtl_id:p_vat_type_dtl_id,
                            start_date:start_date,
                            end_date:end_date
                        }

            });

            $("#grid-table-rekap").jqGrid("setCaption", "LAPORAN REKAP DENDA TGL BAYAR || PERIODE PEMBAYARAN : "+start_date+" s.d. "+end_date);
            $("#grid-table-rekap").trigger("reloadGrid");
        });
}
</script>

<script> 
    $('#start_period').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'yyyy-mm-dd',
      todayBtn: 'linked',
      todayHighlight: true
    });
    $('#end_period').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'yyyy-mm-dd',
      todayBtn: 'linked',
      todayHighlight: true
    });
</script>

<script type="text/javascript">

    function toExcel() {
        if ($('#form_vat_dtl_id').val()==''||$('#start_period').val()==''||$('#end_period').val()==''){
            swal('Informasi','Semua Harus Diisi','info');
            $ ("#gview_grid-table-history").hide();
            $ ("#gview_grid-table-rekap").hide();
            return;

        }
        // alert("Convert to Excel");
        var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_denda_tgl_bayar_controller/excel/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        //tipe_ayat = $('#form_vat_dtl_id').val();
        url += "&start_date=" +  $('#start_period').val();
        url += "&p_vat_type_dtl_id=" +  $('#form_vat_dtl_id').val();
        url += "&end_date=" +  $('#end_period').val();


        window.location = url;
    }

    function toExcelRekap() {
        if ( $('#form_vat_dtl_id').val()==''||$('#start_period').val()==''||$('#end_period').val()==''){
            swal('Informasi','Ayat Pajak, Periode Awal Bayar, Periode Akhir Bayar Harus Diisi','info');
            $ ("#gview_grid-table-history").hide();
            $ ("#gview_grid-table-rekap").hide();
            return;

        }
        var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_denda_tgl_bayar_controller/excelRekap/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        //tipe_ayat = $('#form_vat_dtl_id').val();
        url += "&start_date=" +  $('#start_period').val();
        url += "&p_vat_type_dtl_id=" +  $('#form_vat_dtl_id').val();
        url += "&end_date=" +  $('#end_period').val();


        window.location = url;
        
    }

</script>

<script>
function responsive_jqgrid(grid_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid('setGridWidth', $(".form-body").width());
        //$(pager_selector).jqGrid('setGridWidth', parent_column.width());

    }

function showLOVVat_type(id, code,parent) {
    modal_lov_vat_dtl_show(id, code,parent);
}
</script>
