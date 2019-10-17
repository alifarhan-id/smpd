<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>LAPORAN PEMBAYARAN WP PER 3 TAHUN BULANAN</span>
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
                    <label class="control-label col-md-2">Ayat Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_vat_dtl_id" type="text"  style="display:none;">
                            <input id="form_vat_dtl_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Ayat Pajak">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVTypeDtl('form_vat_dtl_id','form_vat_dtl_code')">
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
                    <label class="control-label col-md-2">Periode Bulan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_finance_period_id" type="text"  style="display:none;">
                            <input id="form_finance_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Periode Bulan">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-period" onclick="showLOVFinancePeriod('form_finance_period_id','form_finance_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>  
                        </div>
                    </div>
                </div>
                
                <div class="space-4"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showData()">Tampilkan Data</button>
                    <button class="btn btn-success" type="button" onclick="toExcel()" id="excel">Tampilkan Excel</button>
                </div>
            </div>
        </div>
        
        
    </div>
    <?php $this->load->view('lov/lov_vat_type'); ?>
    <?php $this->load->view('lov/lov_vat_type_dtl'); ?>
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

    jQuery(function($) {

        var grid_selector = "#grid-table-history";

        var tahun = $('#form_year_code').val();

        jQuery("#grid-table-history").jqGrid({
            url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_pembayaran_wp_per_3_tahun_bulanan_controller/readData"; ?>',
            datatype: "json",
            mtype: "POST",
            
            colModel: [
                {label: 'NPWPD',name: 'npwd',width: 150, align: "left",editable: false},
                {label: 'Ayat Pajak',name: 'vat_code',width: 200, align: "left"},   
                {label: 'Merk Dagang',name: 'company_brand',width: 250, align: "left"},
                {label: 'Alamat Merk Dagang',name: 'alamat',width: 350, align: "left"},  
                {label: 'Tgl. Pengukuhan',name: 'active_date',width: 200, align: "left"}, 
                {label: 'Masa Pajak',name: 'masa_pajak',width: 100, align: "left"},
                {name: 'jml',width: 150,summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},  
                {name: 'jml1',width: 150,summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},  
                {name: 'jml2',width: 150,summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"}
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
            caption: "LAPORAN PEMBAYARAN WP PER 3 TAHUN BULANAN"

        });

       

        

    });
</script>

<script type="text/javascript">

    function toExcel() {

        var p_vat_type_id = $('#form_vat_id').val(); 
        var p_vat_type_dtl_id = $('#form_vat_dtl_idss').val();
        var p_year_period_id = $('#form_year_period_id').val(); 
        var p_finance_period_id = $('#form_finance_period_id').val();
        var year_code = $('#form_year_code').val();
        var vat_code = $('#vat_code').val();
        if (p_vat_type_id==0||p_year_period_id==0||p_vat_type_dtl_id == 0 || p_finance_period_id == 0){
            swal('Informasi','Semua Harus Diisi','info');
            return;

        }
        
        var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_pembayaran_wp_per_3_tahun_bulanan_controller/excel/?"; ?>";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&p_finance_period_id="+p_finance_period_id;
            url += "&p_vat_type_id="+p_vat_type_id;      
            url += "&p_vat_type_dtl_id="+p_vat_type_dtl_id;
            url += "&year_code="+year_code;
            url += "&vat_code="+vat_code;

            //alert(url);
        window.location = url;
    }

    function showData(){
        $ ("#gview_grid-table-history").show();
        var p_vat_type_id = $('#form_vat_id').val(); 
        var p_vat_type_dtl_id = $('#form_vat_dtl_id').val();
        var p_year_period_id = $('#form_year_period_id').val(); 
        var p_finance_period_id = $('#form_finance_period_id').val();
        var tahun = $('#form_year_code').val();

        if (p_vat_type_id==0||p_year_period_id==0||p_vat_type_dtl_id == 0 || p_finance_period_id == 0){
            swal('Informasi','Semua Harus Diisi','info');
            $ ("#gview_grid-table-history").hide();
            return;
        }

        //tampilDatahistory(p_finance_period_id);

        jQuery(function($) {
            jQuery("#grid-table-history").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_pembayaran_wp_per_3_tahun_bulanan_controller/readData"; ?>',
                postData: { 
                        p_vat_type_id : p_vat_type_id,
                        p_vat_type_dtl_id : p_vat_type_dtl_id,
                        p_finance_period_id : p_finance_period_id
                    }

            });
            //var iPos = [9, 10, 11];// the position of the column
            var colModel = $("#grid-table-history").jqGrid("getGridParam", "colModel");

            $("#grid-table-history").jqGrid("setLabel", "jml", tahun-2);
            $("#grid-table-history").jqGrid("setLabel", "jml1", tahun-1);
            $("#grid-table-history").jqGrid("setLabel", "jml2", tahun);
            $("#grid-table-history").jqGrid("setCaption", "LAPORAN PEMBAYARAN WP PER 3 TAHUN BULANAN || JENIS PAJAK : "+$('#vat_code').val());
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

function showLOVTypeDtl(id, code) {
    if ($('#form_vat_id').val()=='' || $('#form_vat_id').val()==0 ) {
        swal('Informasi','Ayat Pajak Harus Diisi','info');
        return false;
    } else {
        //swal('Informasi', $('#form_year_period_id').val(),'info');

        modal_lov_vat_dtl_show(id, code,$('#form_vat_id').val());
    }
    
}

</script>
