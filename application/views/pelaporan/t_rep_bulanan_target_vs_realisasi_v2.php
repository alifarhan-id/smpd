<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Laporan Bulanan Target VS Realisasi (Dengan Denda)</span>
        </li>
    </ul> 
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-3">Periode Tahun</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_year_period_id" type="hidden" name="form_year_period_id">
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
                    <label class="control-label col-md-3">Bulan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="hidden" name="form_finance_period_id_start" id="form_finance_period_id_start">
                           <input id="date_awal" readonly type="text" class="FormElement form-control" placeholder="Pilih Bulan">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-period" onclick="showLOVFinancePeriod('form_finance_period_id_start','date_awal', 'valid_from', 'valid_to')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <label class="control-label col-md-1"> s.d</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="hidden" name="form_finance_period_id_end" id="form_finance_period_id_end">
                           <input id="date_akhir" readonly type="text" class="FormElement form-control" placeholder="Pilih Bulan">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-period" onclick="showLOVFinancePeriod('form_finance_period_id_end','date_akhir', 'valid_from', 'valid_to')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="space-2"></div>
                <div class="row col-md-offset-5">
                    <button class="btn btn-success" type="button" id="btn-search">Tampilkan</button>
                </div>
            </div>
        </div>
        
        
    </div>
    <?php $this->load->view('lov/lov_year_period'); ?>
    <?php $this->load->view('lov/lov_finance_period'); ?>   
    
</div>
<div class="tab-content no-border" id="table">
    <div class="row">
        <div class="col-xs-12">
            <div id="gbox_grid-table" class="ui-jqgrid">
                <div id="gview_grid-table" class="ui-jqgrid-view table-responsive" role="grid">
                    <table id="grid-table"></table>
                </div>
            </div>            
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#table').css('display', 'none');
    jQuery(function ($) {
        var grid_selector = "#grid-table";
        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID . "pelaporan.t_rep_bulanan_target_vs_realisasi_v2_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Pajak', name: 'p_vat_type_dtl_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Ayat Pajak',name: 'ayat',width: 270, align: "left"},
                {label: 'Jenis Pajak',name: 'jenis_pajak',width: 200, summaryTpl:"Total",summaryType:"sum",align: "left"},
                {label: 'Target',name: 'target',width: 200, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'Realisasi',name: 'realisasiDanPiutang',width: 200,summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'Keterangan Selisih',name: 'selisih',width: 200, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"}
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
            groupingView: 
                    {
                        groupField: ["jenis_pajak"],
                        groupColumnShow: [true],
                        groupText: ["<b>{0}</b>"],
                        groupOrder: ["asc"],
                        groupSummary: [true], // will use the "summaryTpl" property of the respective column
                        groupCollapse: false,
                        groupDataSorted: true
                    },
            gridComplete: function() {
                var $grid = $('#grid-table');
                var col_target = $grid.jqGrid('getCol', 'target', false, 'sum');
                var col_realisasiDanPiutang = $grid.jqGrid('getCol', 'realisasiDanPiutang', false, 'sum');
                var col_selisih = $grid.jqGrid('getCol', 'selisih', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'jenis_pajak': 'Grand Total',
                                                    'target': col_target,
                                                    'realisasiDanPiutang':col_realisasiDanPiutang,
                                                    'selisih':col_selisih

                 });
                
            },
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            loadComplete: function () {                
               
            },
              
            caption: "LAPORAN TARGET DAN REALISASI"
        });
        
    });    
</script>

<script type="text/javascript">
    $("#btn-search").on('click', function() {

        var p_year_period_id = $('#form_year_period_id').val();
        var p_finance_period_id_start = $('#form_finance_period_id_start').val();
        var p_finance_period_id_end = $('#form_finance_period_id_end').val();

        var tahun_periode = $('#form_year_code').val();
        var date_awal = $('#date_awal').val();
        var date_akhir = $('#date_akhir').val();
        //alert(p_year_period_id+" "+p_finance_period_id_start);

        if(p_year_period_id == "" || p_finance_period_id_start == ""){
            swal ( "Oopss" ,  "Semua Filter Harus Diisi!" ,  "error" );  
        }else{
            $('#table').css('display', '');
            jQuery(function($) {
                var grid_selector = "#grid-table";
                //var pager_selector = "#grid-pager-bpps2";

                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."pelaporan.t_rep_bulanan_target_vs_realisasi_v2_controller/read"; ?>',
                    postData: {p_year_period_id: p_year_period_id,
                                p_finance_period_id_start: p_finance_period_id_start,
                                p_finance_period_id_end: p_finance_period_id_end,
                                tahun_periode: tahun_periode,
                                date_awal: date_awal,
                                date_akhir: date_akhir
                            }

                });

                $("#grid-table").jqGrid("setCaption", "PERIODE");
                $("#grid-table").trigger("reloadGrid");
            });
        }

    });
</script>

<script type="text/javascript">
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

</script>