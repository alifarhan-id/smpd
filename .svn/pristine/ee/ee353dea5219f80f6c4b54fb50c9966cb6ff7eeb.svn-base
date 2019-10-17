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
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Status</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select id="status" name="status" class="FormElement form-control" >
                                <option value="">--Pilih Status--</option>
                                <option value="1">Patuh</option>
                                <option value="2">Kurang Patuh</option>
                                <option value="3">Tidak Patuh</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="row col-md-offset-2">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showData('umum')">Tampilkan Data Umum</button>
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showData('group')">Tampilkan Data Grup</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<?php $this->load->view('lov/lov_vat_type'); ?> 
<?php $this->load->view('lov/lov_year_period'); ?> 
<?php $this->load->view('lov/lov_finance_period'); ?> 

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
    function showData($cetak){

        var vat_id = $('#form_vat_id').val();
        var year_id = $('#form_year_period_id').val();
        var finance_id = $('#form_finance_period_id').val();
        var status = $('#status').val();

        var url = "<?php echo base_url(); ?>"+"cetak_rep_lap_kepatuhan_wp/pageCetak?";
            url += "p_vat_type_id="+vat_id;
            url += "&p_year_period_id="+year_id;
            url += "&p_finance_period_id="+finance_id;
            url += "&status="+status;
            url += "&cetak="+$cetak;
        PopupCenter(url,"Cetak Laporan Kepatuhan WP",500,500);

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
