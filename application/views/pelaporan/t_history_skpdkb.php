<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Laporan History SKPDKB Jabatan</span>
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
                            <div class="input-group">
                            <input id="form_year_period_id" type="text"  style="display:none;">
                            <input id="form_year_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Periode Tahun">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVYearPeriod('form_year_period_id','form_year_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                            </div>            
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Periode Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group">
                            <input id="form_finance_period_id" type="text"  style="display:none;">
                            <input id="form_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Periode Pajak">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVFinancePeriod('form_finance_period_id','form_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="row col-md-offset-2">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showData()">Tampilkan Data</button>
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
            </div>            
        </div>
    </div>
</div>

<?php $this->load->view('lov/lov_year_period'); ?> 
<?php $this->load->view('lov/lov_finance_period'); ?> 

<script type="text/javascript">
$ ("#gview_grid-table-history").hide();

   
jQuery(function ($) {

    var grid_selector = "#grid-table-history";
    jQuery("#grid-table-history").jqGrid({
            url: '<?php echo WS_JQGRID . "pelaporan.t_history_skpdkb_controller/readData"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'No. ',name: 'nomor',width: 75, align: "left"},
                {label: 'NPWPD',name: 'npwpd',width: 200, align: "center"},
                {label: 'Nama',name: 'wp_name',width: 270, align: "left"},
                {label: 'Ayat Pajak',name: 'ayat_pajak',width: 300, align: "left"},
                {label: 'Alamat',name: 'wp_address_name',width: 300, align: "left"},
                {label: 'Masa Pajak',name: 'masa_pajak',width: 200, align: "left"},
                {label: 'Tanggal TAP Lama',name: 'ketetapan_lama',width: 200, align: "center"},
                {label: 'Tanggal TAP Baru',name: 'ketetapan_baru',width: 200, align: "center"},
                {label: 'Jumlah Pajak Lama',name: 'jumlah_lama',width: 200, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Jumlah Pajak Baru',name: 'jumlah',width: 200, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
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
            caption: "Laporan History SKPDKB Jabatan"
        });
});



function showData(){
    $("#gview_grid-table-history").show();
      

    var p_finance_period_id = $('#form_finance_period_id').val();
    var p_year_period_id = $('#form_year_period_id').val(); 

    if (p_finance_period_id==''||p_year_period_id==''){
        swal('Informasi','Semua Harus Diisi','info');
        $ ("#gview_grid-table-history").hide();
        $ ("#gview_grid-table-rekap").hide();
        return;

    }

        jQuery(function($) {
        var grid_selector = "#grid-table-history";
        //var pager_selector = "#grid-pager-bpps2";

            jQuery("#grid-table-history").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."pelaporan.t_history_skpdkb_controller/readData"; ?>',
                postData: {
                            p_year_period_id:p_year_period_id,
                            p_finance_period_id:p_finance_period_id
                        }

            });

            $("#grid-table-history").jqGrid("setCaption", "Laporan History SKPDKB Jabatan");
            $("#grid-table-history").trigger("reloadGrid");
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
    if ($('#form_year_period_id').val() == 0 || $('#form_year_period_id').val() == '' || $('#form_year_period_id').val() == null || $('#form_year_period_id').val() == undefined || $('#form_year_period_id').val() == false){
        swal('Peringatan', 'Periode Tahun Harus Diisi', 'error');
        return;
    }
    modal_finance_period_show(id, code,$('#form_year_period_id').val());
}
</script>
