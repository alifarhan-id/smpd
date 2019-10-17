<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>LAPORAN HISTORY POTENSI PIUTANG JENIS-JENIS KETETAPAN TGL TAP</span>
        </li>
    </ul> 
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-2">Jenis Ketetapan</label>
                    <div class="col-md-3">   
                        <div class="input-group">
                            <div class="input-group">
                            <input id="form_ketetapan_id" type="text"  style="display:none;">
                            <input id="form_ketetapan_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Ketetapan">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVKetetapan('form_ketetapan_id','form_ketetapan_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                            </div>            
                        </div>
                    </div>
                    <label class="control-label col-md-2">Jenis Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group">
                            <input id="form_vat_id" type="text"  style="display:none;">
                            <input id="kode_ayat" name="kode_ayat" type="text"  style="display:none;">
                            <input id="form_vat_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Jenis Pajak">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVVat_type('form_vat_id','form_vat_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                            </div>            
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Periode Awal Tap</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="start_period" id="start_period">  
                        </div>
                    </div>
                    <label class="control-label col-md-2">Periode Akhir Tap</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="end_period" id="end_period">  
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Wilayah</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group">
                            <input id="form_business_area_id" type="text"  style="display:none;">
                            <input id="form_business_area_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Wilayah">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVBusinessArea('form_business_area_id','form_business_area_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                            </div>            
                        </div>
                    </div>
                    <label class="control-label col-md-2">Status Bayar</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select id="status" name="status" class="FormElement form-control" >
                                <option value="0">Semua</option>
                                <option value="1">Sudah Bayar</option>
                                <option value="2">Belum Bayar</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="row col-md-offset-2">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showData()">Tampilkan</button>
                    <button class="btn btn-success" type="button" onclick="toExcelPiutang()" id="excel">Tampilkan Excel</button>
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showDataRekap()">Tampilkan Rekap</button>
                    <button class="btn btn-success" type="button" onclick="toExcelRekap()" id="excel">Tampilkan Rekap Excel</button>
                </div>
            </div>
        </div>
        
        
    </div>
    <?php $this->load->view('lov/lov_vat_type'); ?>
    <?php $this->load->view('lov/lov_business_area'); ?>
    <?php $this->load->view('lov/lov_ketetapan'); ?>
    
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

<script type="text/javascript">
$ ("#gview_grid-table-history").hide();
$ ("#gview_grid-table-rekap").hide();

   
jQuery(function ($) {

    var grid_selector = "#grid-table-history";
    jQuery("#grid-table-history").jqGrid({
            url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_history_potensi_piutang_tgl_tap_controller/readData"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'No. ',name: 'nomor',width: 75, align: "left"},
                {label: 'Jenis Pajak',name: 'jenis_pajak',width: 200, align: "left"},
                {label: 'Ayat Pajak',name: 'ayat_pajak',width: 300, align: "left"},
                {label: 'Nama',name: 'wp_name',width: 300, align: "left"},
                {label: 'Merk Dagang',name: 'company_brand',width: 300, align: "left"},
                {label: 'NPWPD',name: 'npwpd',width: 200, align: "center"},
                {label: 'Alamat',name: 'brand_address',width: 250, align: "left"},
                {label: 'Masa Pajak',name: 'masa_pajak',width: 200, align: "center"},
                {label: 'Tanggal TAP',name: 'tgl_tap',width: 200, align: "center"},
                {label: 'No. Bayar',name: 'payment_key2',width: 200, align: "center"},
                {label: 'Pajak Terhutang',name: 'debt_vat_amt',width: 200, align: "right",summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:'.'} },
                {label: 'Kenaikan 25%',name: 'db_increasing_charge',width: 200, align: "right",summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:'.'}},
                {label: 'Kenaikan 2%',name: 'db_interest_charge',width: 200, align: "right",summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:'.'}},
                {label: 'Ketetapan Pajak Baru',name: 'debt_vat_amt',width: 200, align: "right",summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:'.'}},
                {label: 'Denda',name: 'total_penalty_amount',width: 200, align: "right",summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:'.'}},
                {label: 'Total Harus Dibayar',name: 'total',width: 200, align: "right",summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:'.'}},
                {label: 'Status Bayar',name: 'status',width: 200, align: "center"},
                {label: 'Tanggal Bayar',name: 'payment_date',width: 200, align: "center"},
                {label: 'Sisa',name: 'sisa',width: 200, align: "right",summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:'.'}},
                {label: 'Tanggal Pengukuhan',name: 'active_date_short',width: 200, align: "center"},
                {label: 'Tanggal Penutupan',name: 'last_satatus_date_short',width: 200, align: "center"},
                {label: 'Wilayah',name: 'wilayah',width: 200, align: "left"}
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
                var colSum = $grid.jqGrid('getCol', 'debt_vat_amt', false, 'sum');
                var colSum1 = $grid.jqGrid('getCol', 'db_increasing_charge', false, 'sum');
                var colSum2 = $grid.jqGrid('getCol', 'db_interest_charge', false, 'sum');
                var colSum3 = $grid.jqGrid('getCol', 'total_penalty_amount', false, 'sum');
                var colSum4 = $grid.jqGrid('getCol', 'total', false, 'sum');
                var colSum5 = $grid.jqGrid('getCol', 'sisa', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'debt_vat_amt': colSum });
                $grid.jqGrid('footerData', 'set', { 'db_increasing_charge': colSum1 });
                $grid.jqGrid('footerData', 'set', { 'db_interest_charge': colSum2 });
                $grid.jqGrid('footerData', 'set', { 'total_penalty_amount': colSum3 });   
                $grid.jqGrid('footerData', 'set', { 'total': colSum4 });
                $grid.jqGrid('footerData', 'set', { 'sisa': colSum5 });

                
            },
            caption: "LAPORAN HISTORY POTENSI HUTANG"
        });
});

jQuery(function ($) {

    jQuery("#grid-table-rekap").jqGrid({
        url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_history_potensi_piutang_tgl_tap_controller/readRekap"; ?>',
        datatype: "json",
        mtype: "POST",
        colModel: [
            {label: 'No. ',name: 'nomor',width: 75, align: "left"},
            {label: 'Bulan Penerbitan',name: 'code',width: 200, align: "left"},
            {label: 'Ketetapan',name: 'ketetapan',width: 300, summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},
            {label: 'Realisasi',name: 'realisasi',width: 300, summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},
            {label: 'Sisa',name: 'sisa',width: 300, summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},
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
            var colSum = $grid.jqGrid('getCol', 'ketetapan', false, 'sum');
            var colSum1 = $grid.jqGrid('getCol', 'realisasi', false, 'sum');
            var colSum2 = $grid.jqGrid('getCol', 'sisa', false, 'sum');
            $grid.jqGrid('footerData', 'set', { 'ketetapan': colSum });
            $grid.jqGrid('footerData', 'set', { 'realisasi': colSum1 });
            $grid.jqGrid('footerData', 'set', { 'sisa': colSum2 });
            
        },
        onSelectRow: function (rowid) {
            /*do something when selected*/

        },
        loadComplete: function () {                
           
        },
          
        caption: "LAPORAN REKAP SKPDKB / STPD"
    
    });

        
        
}); 

function showData(){
    $("#gview_grid-table-history").show();
    $("#gview_grid-table-rekap").hide();///or 'hidden' 
      

    var p_settlement_type_id = $('#form_ketetapan_id').val();
    var p_vat_type_id = $('#form_vat_id').val(); 
    var start_date = $('#start_period').val();
    var end_date = $('#end_period').val();
    var business_area = $('#form_business_area_id').val();
    var status_bayar = $('#status').val();

    if (p_settlement_type_id==''||start_date==''||end_date==''){
        swal('Informasi','Ayat Pajak, Periode Awal TAP, Periode Akhir TAP Harus Diisi','info');
        $ ("#gview_grid-table-history").hide();
        $ ("#gview_grid-table-rekap").hide();
        return;

    }

        jQuery(function($) {
        var grid_selector = "#grid-table-history";
        //var pager_selector = "#grid-pager-bpps2";

            jQuery("#grid-table-history").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."pelaporan.t_laporan_history_potensi_piutang_tgl_tap_controller/readData"; ?>',
                postData: {
                            p_settlement_type_id:p_settlement_type_id,
                            p_vat_type_id:p_vat_type_id,
                            start_date:start_date,
                            end_date:end_date,
                            p_business_area_id:business_area,
                            status_bayar:status_bayar
                        }

            });

            $("#grid-table-history").jqGrid("setCaption", "LAPORAN HISTORY POTENSI HUTANG");
            $("#grid-table-history").trigger("reloadGrid");
        });
}
function showDataRekap(){

    $("#gview_grid-table-history").hide();
    $("#gview_grid-table-rekap").show();
    var p_settlement_type_id = $('#form_ketetapan_id').val();
    var p_vat_type_id = $('#form_vat_id').val(); 
    var start_date = $('#start_period').val();
    var end_date = $('#end_period').val();
    var status_bayar = $('#status').val();

    if (p_settlement_type_id==''||start_date==''||end_date==''){
        swal('Informasi','Ayat Pajak, Periode Awal TAP, Periode Akhir TAP Harus Diisi','info');
        $ ("#gview_grid-table-history").hide();
        $ ("#gview_grid-table-rekap").hide();
        return;

    }

        jQuery(function($) {
        var grid_selector = "#grid-table-rekap";
        //var pager_selector = "#grid-pager-bpps2";

            jQuery("#grid-table-rekap").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."pelaporan.t_laporan_history_potensi_piutang_tgl_tap_controller/readRekap"; ?>',
                postData: {
                            p_settlement_type_id:p_settlement_type_id,
                            p_vat_type_id:p_vat_type_id,
                            start_date:start_date,
                            end_date:end_date,
                            status_bayar:status_bayar
                        }

            });

            $("#grid-table-rekap").jqGrid("setCaption", "LAPORAN REKAP SKPDKB / STPD");
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

    function toExcelPiutang() {
        if ($('#form_ketetapan_id').val()==''||$('#start_period').val()==''||$('#end_period').val()==''){
            swal('Informasi','Ayat Pajak, Periode Awal TAP, Periode Akhir TAP Harus Diisi','info');
            $ ("#gview_grid-table-history").hide();
            $ ("#gview_grid-table-rekap").hide();
            return;

        }
        // alert("Convert to Excel");
        var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_history_potensi_piutang_tgl_tap_controller/excel/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        url += "&p_settlement_type_id=" +  $('#form_ketetapan_id').val();
        //tipe_ayat = $('#form_vat_dtl_id').val();
        url += "&start_date=" +  $('#start_period').val();
        url += "&p_vat_type_id=" +  $('#form_vat_id').val();
        url += "&end_date=" +  $('#end_period').val();
        url += "&p_business_area_id=" + $('#form_business_area_id').val();
        url += "&status_bayar=" +  $('#status').val();


        window.location = url;
    }

    function toExcelRekap() {
        if ( $('#form_ketetapan_id').val()==''||$('#start_period').val()==''||$('#end_period').val()==''){
            swal('Informasi','Ayat Pajak, Periode Awal TAP, Periode Akhir TAP Harus Diisi','info');
            $ ("#gview_grid-table-history").hide();
            $ ("#gview_grid-table-rekap").hide();
            return;

        }
        var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_history_potensi_piutang_tgl_tap_controller/excelRekap/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        url += "&p_settlement_type_id=" +  $('#form_ketetapan_id').val();
        //tipe_ayat = $('#form_vat_dtl_id').val();
        url += "&start_date=" +  $('#start_period').val();
        url += "&p_vat_type_id=" +  $('#form_vat_id').val();
        url += "&end_date=" +  $('#end_period').val();
        url += "&status_bayar=" +  $('#status').val();


        window.location = url;
        
    }

</script>

<script>
function responsive_jqgrid(grid_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid('setGridWidth', $(".form-body").width());
        //$(pager_selector).jqGrid('setGridWidth', parent_column.width());

    }

function showLOVVat_type(id, code) {
    modal_lov_vat_show(id, code);
}
function showLOVBusinessArea(id, code) {
    modal_business_area_show(id, code);
}
function showLOVKetetapan(id, code) {
    modal_ketetapan_show(id, code);
}

</script>
