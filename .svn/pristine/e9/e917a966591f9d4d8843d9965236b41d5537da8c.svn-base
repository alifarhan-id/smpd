<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>LAPORAN DENDA PROFESI PPAT</span>
        </li>
    </ul> 
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
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
                    <label class="control-label col-md-2">Periode Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_finance_period_id" type="text"  style="display:none;">
                            <input id="form_finance_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Periode Pajak">
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
                </div>
                <div class="space-4"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showData()">Tampilkan Data</button>
                    <button class="btn btn-success" type="button" onclick="toExcelPiutang()" id="excel">Tampilkan Excel</button>
                </div>
            </div>
        </div>
        
        
    </div>
    <?php $this->load->view('lov/lov_year_period'); ?>
    <?php $this->load->view('lov/lov_finance_period'); ?>
    
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
            url: '<?php echo WS_JQGRID . "transaksi.t_laporan_denda_profesi_ppat_controller/readData"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID. ',name: 't_customer_order_id',width: 75, align: "left"},
                {label: 'Nama PPAT',name: 'ppat_name',width: 200, align: "left"},
                {label: 'Alamat PPAT',name: 'address_name',width: 300, align: "left"},
                {label: 'No. SK Pengukuhan PPAT/S',name: 'no_sk',width: 300, align: "left"},
                {label: 'Tanggal Ketetapan',name: 'tgl_tap',width: 200, align: "center"},
                {label: 'Bulan Denda Profesi',name: 'bulan_denda_profesi',width: 250, align: "left"},
                {label: 'Denda Atas AJB',name: 'sanksi_ajb_2',width: 200, align: "left"},
                {label: 'Bulan Denda AJB',name: 'bulan_ajb',width: 200, align: "center"},
                {label: 'No. Bayar',name: 'payment_key',width: 200, align: "center"},
                {label: 'Jumlah Denda',name: 'total_vat_amount',width: 200, summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},
                {label: 'Status Bayar',name: 'status',width: 200, align: "center"},
                {label: 'Tanggal Bayar',name: 'payment_date',width: 200, align: "center"},
                {name: 'Options',width: 200, align: "center",
                    formatter:function(cellvalue, options, rowObject) {
                        var val = rowObject['t_customer_order_id'];
                        var url = '<?php echo base_url(); ?>'+'cetak_formulir_surat_tagihan_denda_profesi/save_pdf?t_customer_order_id='+val;
                        return '<a class="btn btn-danger btn-xs" href="#" onclick="PopupCenter(\''+url+'\',\'SKPDKB Jabatan\',500,500);"><i class="fa fa-print"></i>Cetak</a>';

                    }
                }
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
            caption: "LAPORAN DENDA PROFESI PPAT"
        });
});

function showData(){
    $("#gview_grid-table-history").show();
      

    var p_year_period_id = $('#form_year_period_id').val();
    var p_finance_period_id = $('#form_finance_period_id').val();
    var status_bayar = $('#status').val();

    if (p_year_period_id==''||p_finance_period_id==''||status_bayar==''){
        swal('Informasi','Semua Harus Diisi','info');
        $ ("#gview_grid-table-history").hide();
        return;

    }

        jQuery(function($) {
        var grid_selector = "#grid-table-history";
        //var pager_selector = "#grid-pager-bpps2";

            jQuery("#grid-table-history").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."transaksi.t_laporan_denda_profesi_ppat_controller/readData"; ?>',
                postData: {
                            p_year_period_id:p_year_period_id,
                            p_finance_period_id:p_finance_period_id,
                            status_bayar:status_bayar
                        }

            });
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
        if ($('#form_year_period_id').val()==''||$('#form_finance_period_id').val()==''||$('#status').val()==''){
            swal('Informasi','Semua Harus Diisi','info');
            $ ("#gview_grid-table-history").hide();
            $ ("#gview_grid-table-rekap").hide();
            return;

        }
        // alert("Convert to Excel");
        var url = "<?php echo WS_JQGRID . "transaksi.t_laporan_denda_profesi_ppat_controller/excel/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        url += "&p_finance_period_id=" + $('#form_finance_period_id').val();
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

</script>
