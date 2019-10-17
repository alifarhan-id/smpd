<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>LAPORAN POSISI SURAT TEGURAN</span>
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
                    <label class="control-label col-md-2">Periode Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_finance_period_id" type="text"  style="display:none;">
                            <input id="form_finance_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Periode">
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
                    <label class="control-label col-md-2">Jenis Pajak</label>
                    <div class="col-md-3">
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
                    <label class="control-label col-md-2">Per Tanggal</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="tanggal" id="tanggal">                 
                        </div>
                    </div>
                    
                </div>                
                <div class="space-2"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-success" type="button" id="btn-search">Tampilkan Data</button>
                    <button class="btn btn-success" type="button" onclick="saveExcel()" id="excel">Tampilkan Excel</button>
                </div>
            </div>
        </div>
        
        
    </div>
    <?php $this->load->view('lov/lov_vat_type'); ?>
    <?php $this->load->view('lov/lov_year_period'); ?>
    <?php $this->load->view('lov/lov_finance_period'); ?>
</div>
<div class="tab-content no-border" id="table">
    <div class="row">
        <div class="col-xs-12">
            <div id="gbox_grid-table" class="ui-jqgrid">
                <div id="gview_grid-table" class="ui-jqgrid-view table-responsive" role="grid">
                    <table id="grid-table-teguran"></table>
                </div>
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#table').css('display', 'none');
    jQuery(function ($) {
        var grid_selector = "#grid-table-teguran";
        jQuery("#grid-table-teguran").jqGrid({
            url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_posisi_surat_teguran_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'Merk Dagang',name: 'company_brand',width: 200, align: "left"},
                {label: 'Alamat Merk Dagang',name: 'alamat_merk_dagang',width: 170, align: "left"},
                {label: 'NPWPD',name: 'npwpd',width: 150, align: "left"},
                {label: 'Surat Teguran 1',name: 'surat_teguran1',width: 120, align: "left"},
                {label: 'Surat Teguran 2',name: 'surat_teguran2',width: 120, align: "left"},
                {label: 'Surat Teguran 3',name: 'surat_teguran3',width: 300, align: "left"},
                {label: 'Per Tanggal',name: 'tgl_bayar',width: 150, align: "left"},
                {label: 'Setelah Tanggal',name: 'tgl_bayar2',width: 150, align: "left"}
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
            gridComplete: function() {
                
            },
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            loadComplete: function () {                
               
            },
              
            caption: "LAPORAN POSISI SURAT TEGURAN"
        });
        
    });    
</script>

<script> 
    $('#tanggal').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });
</script>

<script type="text/javascript">

    $("#btn-search").on('click', function() {
        var p_vat_type_id = $('#form_vat_id').val();
        var tanggal = $('#tanggal').val();
        var p_year_period_id = $('#form_year_period_id').val();
        var p_finance_period_id = $('#form_finance_period_id').val();
        var form_finance_code = $('#form_finance_code').val();
        var vat_code = $('#form_vat_code').val();
        //alert(tanggal);

        if(p_vat_type_id == "" || p_year_period_id == "" || p_finance_period_id == ""){
            swal ( "Oopss" ,  "Kolom Filter Tidak Boleh Kosong!" ,  "error" );

        }else{
            $('#table').css('display', '');
            jQuery(function($) {
                var grid_selector = "#grid-table-teguran";
                //var pager_selector = "#grid-pager-teguran";

                jQuery("#grid-table-teguran").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."pelaporan.t_laporan_posisi_surat_teguran_controller/read"; ?>',
                    postData: {p_vat_type_id: p_vat_type_id,
                                p_year_period_id: p_year_period_id,
                                p_finance_period_id: p_finance_period_id,
                                tanggal: tanggal
                            }

                });

                $("#grid-table-teguran").jqGrid("setCaption", "LAPORAN POSISI SURAT TEGURAN || JENIS PAJAK : "+ vat_code+" - PERIODE PAJAK : "+form_finance_code);
                $("#grid-table-teguran").trigger("reloadGrid");
            });
        }      

    });

    function saveExcel() {
        // alert("Convert to Excel");
        var p_vat_type_id = $('#form_vat_id').val();
        var tanggal = $('#tanggal').val();
        var p_year_period_id = $('#form_year_period_id').val();
        var p_finance_period_id = $('#form_finance_period_id').val();
        var form_finance_code = $('#form_finance_code').val();
        var vat_code = $('#form_vat_code').val();

        if(p_vat_type_id == "" || p_year_period_id == "" || p_finance_period_id == ""){
            swal ( "Oopss" ,  "Kolom Filter Tidak Boleh Kosong!" ,  "error" );

        }else{
           var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_posisi_surat_teguran_controller/excel/?"; ?>";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&p_vat_type_id=" + p_vat_type_id;
            url += "&tanggal=" + tanggal;
            url += "&p_year_period_id=" + p_year_period_id;
            url += "&p_finance_period_id=" + p_finance_period_id;
            url += "&form_finance_code=" + form_finance_code;
            url += "&vat_code=" + vat_code;
            window.location = url;
        }       
        
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

function showLOVFinancePeriod(id, code, start_date,end_date) {
    if ($('#form_year_period_id').val()=='' || $('#form_year_period_id').val()==0 ) {
        swal('Informasi','Periode Tahun Harus Diisi','info');
        return false;
    } else {
        //swal('Informasi', $('#form_year_period_id').val(),'info');

        modal_finance_period_show(id, code, $('#form_year_period_id').val(), start_date,end_date);
    }
    
}

function showLOVVat_type(id, code) {
    modal_lov_vat_show(id, code);
}

</script>
