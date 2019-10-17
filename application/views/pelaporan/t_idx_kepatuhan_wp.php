<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Laporan Tingkat Kepatuhan WP</span>
        </li>
    </ul> 
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-2">Jenis Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
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
                    </div>
                </div>
                <div class="space-2"></div>
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
                <div class="space-4"></div>
                <div class="row col-md-offset-2">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showData()">Cetak PDF</button>
                    <button class="btn btn-success" type="button" id="btn-search" onclick="toExcel()">Download Excel</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<?php $this->load->view('lov/lov_vat_type'); ?> 
<?php $this->load->view('lov/lov_year_period'); ?> 

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
    function showData(){

        var vat_id = $('#form_vat_id').val();
        var year_id = $('#form_year_period_id').val();
        var year_code = $('#form_year_code').val();
        var vat_code = $('#vat_code').val();

        if (vat_id==''||year_id==''){
            swal('Informasi','Semua Harus Diisi','info');
            return;
        }


        var url = "<?php echo base_url(); ?>"+"cetak_idx_kepatuhan_wp/pageCetak?";
            url += "p_vat_type_id="+vat_id;
            url += "&p_year_period_id="+year_id;
            url += "&status=1"; 
            url += "&tahun="+year_code;
            url += "&pajak="+vat_code;
        PopupCenter(url,"Cetak Laporan Kepatuhan WP",500,500);

    }

    function toExcel(){

        var vat_id = $('#form_vat_id').val();
        var year_id = $('#form_year_period_id').val();
        var year_code = $('#form_year_code').val();
        var vat_code = $('#vat_code').val();

        if (vat_id==''||year_id==''){
            swal('Informasi','Semua Harus Diisi','info');
            return;
        }
        
        var url = "<?php echo WS_JQGRID . "pelaporan.t_idx_kepatuhan_wp_controller/excel/?"; ?>";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&p_vat_type_id="+vat_id;
            url += "&p_year_period_id="+year_id;
            url += "&status=1"; 
            url += "&tahun="+year_code;
            url += "&pajak="+vat_code;

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
    if ($('#form_year_period_id').val() == 0 || $('#form_year_period_id').val() == '' || $('#form_year_period_id').val() == null || $('#form_year_period_id').val() == undefined || $('#form_year_period_id').val() == false){
        swal('Peringatan', 'Periode Tahun Harus Diisi', 'error');
        return;
    }
    modal_finance_period_show(id, code,$('#form_year_period_id').val());
}
</script>
