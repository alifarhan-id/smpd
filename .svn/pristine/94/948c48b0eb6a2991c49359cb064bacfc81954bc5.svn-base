<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>LAPORAN HISTORY POTENSI PIUTANG</span>
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
                            <input id="form_ketetapan_id" type="text"  style="display:none;">
                            <input id="form_ketetapan_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Jenis Ketetapan">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-period" onclick="showLOVKetetapan('form_ketetapan_id','form_ketetapan_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span> 
                        </div>
                    </div>
                    <label class="control-label col-md-2">Periode Tahun</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_year_period_id" type="text"  style="display:none;">
                            <input id="form_year_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Periode Tahun">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button"  onclick="showLOVYearPeriod('form_year_period_id','form_year_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Jenis Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_vat_id" type="text"  style="display:none;">
                            <input id="kode_ayat" type="text"  style="display:none;">
                            <input id="vat_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Jenis Pajak">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-period" onclick="showLOVVat_type('form_vat_id','vat_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span> 
                        </div>
                    </div>
                    <label class="control-label col-md-2">Periode Awal Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_finance_period_id" type="text"  style="display:none;">
                            <input id="form_finance_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Periode Awal">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-period" onclick="showLOVFinancePeriod('form_finance_period_id','form_finance_code', 'valid_from', 'valid_to')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span> 
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
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
                    <label class="control-label col-md-2">Periode Akhir Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_finance_period_id1" type="text"  style="display:none;">
                            <input id="form_finance_code1" readonly type="text" class="FormElement form-control" placeholder="Pilih Periode Akhir Pajak">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-period" onclick="showLOVFinancePeriod('form_finance_period_id1','form_finance_code1', 'valid_from', 'valid_to')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>  
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Tanggal Posisi</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="tgl_posisi" id="tgl_posisi">  
                        </div>
                    </div>
                    <label class="control-label col-md-2">Tanggal Bayar</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control" id="tgl_penerimaan">  
                            <span class="input-group-addon"> s/d </span>
                            <input type="text" class="form-control" id="tgl_penerimaan_last">             
                        </div>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showData()">Tampilkan Data</button>
                    <button class="btn btn-success" type="button" onclick="toExcelPiutang()" id="excel">Tampilkan Excel</button>
                </div>
            </div>
        </div>
        
        
    </div>
    <?php $this->load->view('lov/lov_vat_type'); ?>
    <?php $this->load->view('lov/lov_year_period'); ?>
    <?php $this->load->view('lov/lov_finance_period'); ?>
    <?php $this->load->view('lov/lov_ketetapan'); ?>
    
</div>
<div class="tab-content no-border">
    <div class="row">
        <div class="col-xs-12">
            <div id="gbox_grid-table" class="ui-jqgrid">
                <div id="gview_grid-table-history" class="ui-jqgrid-view table-responsive" role="grid">
                    <table id="grid-table-history"></table>               
                </div>
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
$ ("#gview_grid-table-history").hide();

   
jQuery(function ($) {
    var grid_selector = "#grid-table-history";
    jQuery("#grid-table-history").jqGrid({
            url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_history_potensi_piutang_controller/readData"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'No. ',name: 'nomor',width: 75, align: "left"},
                {label: 'Jenis Pajak',name: 'jenis_pajak',width: 200, align: "left"},
                {label: 'Ayat Pajak',name: 'ayat_pajak',width: 300, align: "left"},
                {label: 'Nama',name: 'wp_name',width: 300, align: "left"},
                {label: 'NPWPD',name: 'npwpd',width: 200, align: "center"},
                {label: 'Ketetapan',name: 'ketetapan',width: 250, align: "left"},
                {label: 'Masa Pajak',name: 'masa_pajak',width: 200, align: "left"},
                {label: 'Tanggal TAP',name: 'tgl_tap',width: 200, align: "center"},
                {label: 'Tgl. Jatuh Tempo',name: 'tgl_jth_tempo',width: 200, align: "center"},
                {label: 'Total Harus Bayar',name: 'total',width: 200, summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},
                {label: 'Status Bayar',name: 'status',width: 200, align: "center"},
                {label: 'Tanggal Bayar',name: 'payment_date_formated',width: 200, align: "center"}
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
                var colSum4 = $grid.jqGrid('getCol', 'total', false, 'sum');  
                $grid.jqGrid('footerData', 'set', { 'total': colSum4 });
                
            },
            caption: "LAPORAN HISTORY POTENSI HUTANG"
        });
});

function showData(){
    $("#gview_grid-table-history").show();
      

    var p_settlement_type_id = $('#form_ketetapan_id').val();
    var p_vat_type_id = $('#form_vat_id').val(); 
    var p_year_period_id = $('#form_year_period_id').val();
    var p_finance_period_id = $('#form_finance_period_id').val();
    var p_finance_period_id1 = $('#form_finance_period_id1').val();
    var tgl_penerimaan = $('#tgl_penerimaan').val();
    var tgl_penerimaan_last = $('#tgl_penerimaan_last').val();
    var tgl_posisi = $('#tgl_posisi').val();
    var status_bayar = $('#status').val();

    if (p_settlement_type_id==''||p_year_period_id==''||p_finance_period_id==''||p_finance_period_id1==''||status_bayar==''||tgl_posisi==''){
        swal('Informasi','Jenis Ketetapan, Periode Tahun, Periode Awal Pajak, Periode Akhir Pajak, dan Tanggal Posisi Harus Diisi','info');
        $ ("#gview_grid-table-history").hide();
        return;

    }

        jQuery(function($) {
        var grid_selector = "#grid-table-history";
        //var pager_selector = "#grid-pager-bpps2";

            jQuery("#grid-table-history").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."pelaporan.t_laporan_history_potensi_piutang_controller/readData"; ?>',
                postData: {
                            p_settlement_type_id:p_settlement_type_id,
                            p_vat_type_id:p_vat_type_id,
                            p_year_period_id:p_year_period_id,
                            p_finance_period_id:p_finance_period_id,
                            p_finance_period_id1:p_finance_period_id1,
                            tgl_penerimaan:tgl_penerimaan,
                            tgl_penerimaan_last:tgl_penerimaan_last,
                            tgl_posisi:tgl_posisi
                        }

            });

            $("#grid-table-history").jqGrid("setCaption", "LAPORAN HISTORY POTENSI HUTANG || PERIODE PAJAK : "+$('#form_finance_code').val()+" s.d. "+$('#form_finance_code1').val());
            $("#grid-table-history").trigger("reloadGrid");
        });
}

</script>

<script> 
    $('#tgl_posisi').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });
    $('#tgl_penerimaan').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'yyyy-mm-dd',
      todayBtn: 'linked',
      todayHighlight: true
    });
    $('#tgl_penerimaan_last').datepicker({ // mengambil dari class datepicker
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
        var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_history_potensi_piutang_controller/excel/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        url += "&p_settlement_type_id=" +  $('#form_ketetapan_id').val();
        //tipe_ayat = $('#form_vat_dtl_id').val();
        url += "&start_date=" +  $('#start_period').val();
        url += "&p_vat_type_id=" +  $('#form_vat_id').val();
        url += "&end_date=" +  $('#end_period').val();
        url += "&p_finance_period_id1=" + $('#form_business_area_id').val();
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
function showLOVYearPeriod(id, code) {
    modal_year_period_show(id, code);
}
function showLOVFinancePeriod(id, code) {
    if($('#form_year_period_id').val()==0 || $('#form_year_period_id').val()==''||$('#form_year_period_id').val()==null||$('#form_year_period_id').val()==undefined||$('#form_year_period_id').val()==false){

            swal('Peringatan', 'Periode Tahun Harus Diisi', 'error');
            return;
        }
    modal_finance_period_show(id, code, $('#form_year_period_id').val());
}
function showLOVKetetapan(id, code) {
    modal_ketetapan_show(id, code);
}

</script>
