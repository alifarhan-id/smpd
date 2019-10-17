<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Laporan Perkembangan Jumlah WP</span>
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
                            <input id="form_year_period_id" type="hidden" name="form_year_period_id">
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
                            <input type="hidden" name="form_finance_period_id" id="form_finance_period_id">
                           <input id="form_finance_period_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Bulan">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-period" onclick="showLOVFinancePeriod('form_finance_period_id','form_finance_period_code', 'valid_from', 'valid_to')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Jenis WP</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select id="npwpd_jabatan" name="npwpd_jabatan" class="FormElement form-control" >
                                <option value="1">Semua</option>
                                <option value="2">Hanya NPWPD Jabatan</option>
                            </select>
                        </div>
                    </div>
                </div>             
                <div class="space-2"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-success" type="button" id="btn-search">Tampilkan Data</button>
                    <button class="btn btn-danger" type="button" onclick="excelwp()" id="excel">Tampilkan Excel</button>
                </div>
            </div>
        </div>       
    </div>    
</div>
<?php $this->load->view('lov/lov_year_period'); ?>
<?php $this->load->view('lov/lov_finance_period'); ?>  
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
            url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_perkembangan_jumlah_wp_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'Uraian Jenis Pajak',name: 'ayat_pajak_2',width: 170, align: "left"},
				{label: 'Jenis Pajak',name: 'jenis_pajak',width: 120, summaryTpl:"Total",summaryType:"sum",align: "left"},

				{label: 'Aktif',name: 'jumlah_aktif_sd_bulan_lalu',width: 100, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", defaultValue:'0'},align: "right"},

				{label: 'Non Aktif',name: 'jumlah_non_aktif_sd_bulan_lalu',width: 120, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", defaultValue:'0'},align: "right"},

				{label: 'Penerbitan NPWPD',name: 'jumlah_aktif_bulan_ini',width: 130, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", defaultValue:'0'},align: "right"},

				{label: 'Perubahan Status Non Aktif',name: 'jumlah_non_aktif_bulan_ini',width: 200, summaryTpl:"{0}",summaryType:"sum",formatter:'integer', formatoptions: {prefix:"", defaultValue:'0'}, align: "right"},

				{label: 'Aktif',name: 'jumlah_aktif_sd_bulan_ini',width: 100, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", defaultValue:'0'},align: "right"},

				{label: 'Non AKtif',name: 'jumlah_non_aktif_sd_bulan_ini',width: 120,summaryTpl:"{0}",summaryType:"sum",formatter:'integer', formatoptions: {prefix:"", defaultValue:'0'}, align: "right"}
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
                var col_aktif = $grid.jqGrid('getCol', 'jumlah_aktif_sd_bulan_lalu', false, 'sum');
                var col_non_aktif = $grid.jqGrid('getCol', 'jumlah_non_aktif_sd_bulan_lalu', false, 'sum');
                var col_penerbitan = $grid.jqGrid('getCol', 'jumlah_aktif_bulan_ini', false, 'sum');
                var col_perubahan = $grid.jqGrid('getCol', 'jumlah_non_aktif_bulan_ini', false, 'sum');
                var col_aktif2 = $grid.jqGrid('getCol', 'jumlah_aktif_sd_bulan_ini', false, 'sum');
                var col_non_aktif2 = $grid.jqGrid('getCol', 'jumlah_non_aktif_sd_bulan_ini', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 
                    'jenis_pajak':'Grand Total',
                    'jumlah_aktif_sd_bulan_lalu': col_aktif,
                    'jumlah_non_aktif_sd_bulan_lalu':col_non_aktif,
                	'jumlah_aktif_bulan_ini':col_penerbitan,
                	'jumlah_non_aktif_bulan_ini':col_perubahan,
                	'jumlah_aktif_sd_bulan_ini':col_aktif2,
                	'jumlah_non_aktif_sd_bulan_ini':col_non_aktif2

                 });
            },
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            loadComplete: function () {                
               
            },
              
            caption: "Laporan Harian"
        });
        $("#grid-table").jqGrid('setLabel','nomor_ayat','',{'text-align':'center'});
        jQuery("#grid-table").jqGrid('setGroupHeaders', {
  			useColSpanStyle: true, 
  			groupHeaders:[
				{startColumnName: 'jumlah_aktif_sd_bulan_lalu', numberOfColumns: 2, titleText: 'Jumlah S.D. Bulan Lalu'},
				{startColumnName: 'jumlah_aktif_bulan_ini', numberOfColumns: 2, titleText: 'Pemutakhiran Bulan Ini'},
				{startColumnName: 'jumlah_aktif_sd_bulan_ini', numberOfColumns: 2, titleText: 'Jumlah S.D. Bulan Ini'}
  			]
		});
        
    });    
</script>

<script type="text/javascript">
    $("#btn-search").on('click', function() {
        $('#table').css('display', '');
        var p_year_period_id = $('#form_year_period_id').val();
        var p_finance_period_id = $('#form_finance_period_id').val();
        var npwpd_jabatan = $('#npwpd_jabatan').val();
        //alert(p_year_period_id+" "+p_finance_period_id+" "+npwpd_jabatan);

        if(p_year_period_id == "" || p_finance_period_id == ""){
            swal ( "Oopss" ,  "Semua Filter Harus Diisi!" ,  "error" );  
        }else{
            jQuery(function($) {
                var grid_selector = "#grid-table";
                //var pager_selector = "#grid-pager-bpps2";

                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."pelaporan.t_laporan_perkembangan_jumlah_wp_controller/read"; ?>',
                    postData: {p_year_period_id: p_year_period_id,
                                p_finance_period_id: p_finance_period_id,
                                npwpd_jabatan: npwpd_jabatan
                            }

                });

                $("#grid-table").jqGrid("setCaption", "Laporan Perkembangan Jumlah WP");
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

    function excelwp(){
        var p_year_period_id = $('#form_year_period_id').val();
        var p_finance_period_id = $('#form_finance_period_id').val();
        var npwpd_jabatan = $('#npwpd_jabatan').val();
        alert(p_year_period_id+" "+p_finance_period_id+" "+npwpd_jabatan);

        if(p_year_period_id == "" || p_finance_period_id == ""){
            swal ( "Oopss" ,  "Semua Filter Harus Diisi!" ,  "error" );  
        }else{
            var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_perkembangan_jumlah_wp_controller/excel/?"; ?>";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&p_finance_period_id=" + p_finance_period_id;
            url += "&npwpd_jabatan=" + npwpd_jabatan;
            //alert(url);
            window.location = url;
        }
    } 

</script>