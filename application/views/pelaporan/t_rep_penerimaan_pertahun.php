<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Laporan Penerimaan Pertahun</span>
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
                <div class="space-2"></div>
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
                    <label class="control-label col-md-2">Status WP</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_account_status_id" type="text"  style="display:none;">
                            <input id="form_status_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Status WP">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button"  onclick="showAccStatus('form_account_status_id','form_status_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Tanggal Status</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="tgl_status" id="tgl_status">  
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
                    <button class="btn btn-success" type="button" onclick="toPDF()" id="excel">Tampilkan PDF</button>
                    <button class="btn btn-success" type="button" onclick="toExcel()" id="excel">Tampilkan Excel</button>
                </div>
            </div>
        </div>
        
        
    </div>
    <?php $this->load->view('lov/lov_vat_type'); ?>
    <?php $this->load->view('lov/lov_year_period'); ?>
    <?php $this->load->view('lov/lov_account_status'); ?>
    
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

    jQuery(function($) {

        var grid_selector = "#grid-table-history";

        jQuery("#grid-table-history").jqGrid({
            url: '<?php echo WS_JQGRID . "pelaporan.t_rep_penerimaan_pertahun_controller/readData"; ?>',
            datatype: "json",
            mtype: "POST",
            
            colModel: [
                {label: 'NPWPD',name: 'npwpd',width: 150, align: "left",editable: false},
                {label: 'Nama',name: 'nama',width: 150, align: "left"},   
                {label: 'Alamat',name: 'alamat',width: 200, align: "left"},
                {label: 'Realisasi Tanggal Bayar',name: 'tgl_realisasi',width: 150, align: "left"},  
                {label: 'Masa Pajak',name: 'masa_pajak',width: 200, align: "left"},
                {label: 'Jumlah',name: 'jml',width: 150,summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},   
                {label: 'Keterangan',name: 'ket',width: 200, align: "left"}
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: -1,
            rowList: [5,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            caption: "Laporan Penerimaan Pertahun"

        });

        

    });
</script>

<script type="text/javascript">

    function toExcel() {

        var p_vat_type_id = $('#form_vat_id').val(); 
        var p_year_period_id = $('#form_year_period_id').val();
        var p_account_status_id = $('#form_account_status_id').val(); 
        var status = $('#status').val();
        var tgl_status = $('#tgl_status').val();
        if (p_vat_type_id==0||p_year_period_id==0||p_account_status_id==''||status==''||tgl_status==''){
            swal('Informasi','Semua Harus Diisi','info');
            $ ("#gview_grid-table-history").hide();
            return;

        }
        
        var url = "<?php echo WS_JQGRID . "pelaporan.t_rep_penerimaan_pertahun_controller/excel/?"; ?>";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&p_year_period_id="+p_year_period_id;
            url += "&p_vat_type_id="+p_vat_type_id;      
            url += "&p_account_status_id="+p_account_status_id;
            url += "&status_bayar="+status;
            url += "&tgl_status="+tgl_status;

            //alert(url);
        window.location = url;
    }

    function toPDF(){
        var p_vat_type_id = $('#form_vat_id').val(); 
        var p_year_period_id = $('#form_year_period_id').val();
        var p_account_status_id = $('#form_account_status_id').val(); 
        var status = $('#status').val();
        var tgl_status = $('#tgl_status').val();
            var url = "<?php echo base_url(); ?>"+"cetak_rep_penerimaan_pertahun/pageCetak?";
                url += "p_vat_type_id="+p_vat_type_id;
                url += "&p_year_period_id="+p_year_period_id;
                url += "&p_account_status_id="+p_account_status_id;
                url += "&status_bayar="+status;
                url += "&tgl_status="+tgl_status;

        PopupCenter(url,"Laporan Penerimaan Denda Harian",500,500);
    }

    function showData(){
        $ ("#gview_grid-table-history").show();
        var p_vat_type_id = $('#form_vat_id').val(); 
        var p_year_period_id = $('#form_year_period_id').val();
        var p_account_status_id = $('#form_account_status_id').val(); 
        var status = $('#status').val();
        var tgl_status = $('#tgl_status').val();

        if (p_vat_type_id==0||p_year_period_id==0||p_account_status_id == 0 || status == '' || tgl_status == ''){
            swal('Informasi','Semua Harus Diisi','info');
            $ ("#gview_grid-table-history").hide();
            return;
        }

        //tampilDatahistory(p_finance_period_id);

        jQuery(function($) {
            jQuery("#grid-table-history").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID . "pelaporan.t_rep_penerimaan_pertahun_controller/readData"; ?>',
                postData: { 
                        p_vat_type_id : p_vat_type_id,
                        p_year_period_id : p_year_period_id,
                        p_account_status_id : p_account_status_id,
                        status_bayar : status,
                        tgl_status : tgl_status}

            });

            $("#grid-table-history").jqGrid("setCaption", "Laporan Penerimaan Pertahun");
            $("#grid-table-history").trigger("reloadGrid");
        });
    }

</script>

<script> 
    $('#tgl_status').datepicker({ // mengambil dari class datepicker
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

function showAccStatus(id, code) {
    modal_account_status_show(id, code);
}

</script>
