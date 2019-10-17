<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>LAPORAN PENERIMAAN PAJAK</span>
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
                    <label class="control-label col-md-2">Tanggal</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control" id="start_date_laporan">  
                            <span class="input-group-addon"> s/d </span>
                            <input type="text" class="form-control" id="end_date_laporan">     
                        </div>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="row col-md-offset-2">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="toPDF()">Tampilkan PDF</button>
                    <button class="btn btn-success" type="button" onclick="toExcel()" id="excel">Tampilkan Excel</button>
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


<?php $this->load->view('lov/lov_vat_type'); ?> 

<script> 
    $('#start_date_laporan').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'yyyy-mm-dd',
      todayBtn: 'linked',
      todayHighlight: true
    });
    $('#end_date_laporan').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'yyyy-mm-dd',
      todayBtn: 'linked',
      todayHighlight: true
    });
</script>

<script type="text/javascript">

    function toExcel() {
        var p_vat_type_id = $('#form_vat_id').val();
        var vat_code = $('#vat_code').val();
        var start_date = $('#start_date_laporan').val();
        var end_date = $('#end_date_laporan').val();
        if (p_vat_type_id==''||start_date==''||end_date==''){
            swal('Peringatan','Semua Harus Diisi','error');
            return;

        }
        // alert("Convert to Excel");
        var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_penerimaan_pajak_controller/excel/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        url += "&p_vat_type_id=" +  p_vat_type_id;
        //tipe_ayat = $('#form_vat_dtl_id').val();
        url += "&start_date=" +  start_date;
        url += "&end_date=" +  end_date;
        url += "&vat_code=" +  vat_code;
        url += "&jenis_tahun=bayar";


        window.location = url;
    }

    function toPDF(){
        var p_vat_type_id = $('#form_vat_id').val();
		var vat_code = $('#vat_code').val();
        var start_date = $('#start_date_laporan').val();
        var end_date = $('#end_date_laporan').val();
        var url = "<?php echo base_url(); ?>"+"cetak_laporan_penerimaan_pajak/pageCetak?";
            url += "p_vat_type_id="+p_vat_type_id;
			url += "&vat_code="+vat_code;
            url += "&start_date="+start_date;
            url += "&end_date="+end_date;
            url += "&jenis_tahun=bayar";

        PopupCenter(url,"Laporan Penerimaan Pajak",500,500);
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
</script>
