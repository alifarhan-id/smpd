<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Realisasi Bulanan Berdasarkan Masa Pajak</span>
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
                    <div class="col-md-4">
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
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Periode Tahun</label>
                    <div class="col-md-4">
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
                <div class="space-2"></div>
                <div class="row">        
                    <label class="control-label col-md-2">Tanggal Penerimaan</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control" id="start_period">  
                            <span class="input-group-addon"> s/d </span>
                            <input type="text" class="form-control" id="end_period">    
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Wilayah WP</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div id="wilayah"></div>           
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Tanggal Bayar</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select id="tgl_bayar" name="tgl_bayar" class="FormElement form-control" >
                                <option value="">--Pilih Tanggal Bayar--</option>
                                <option value="1">Ya</option>
                                <option value="2">Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                
                <div class="space-4"></div>
                <div class="row col-md-offset-2">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showData()">Tampilkan</button>
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

    <div class="row">
        <div class="col-xs-12">
            <div id="tbl-bayar"></div>
        </div>
    </div>
</div>


<?php $this->load->view('lov/lov_year_period'); ?> 

<?php $this->load->view('lov/lov_business_area'); ?> 

<?php $this->load->view('lov/lov_vat_type'); ?>

<script type="text/javascript">
    $.ajax({
        url: "<?php echo base_url().'transaksi/business_area_combo/'; ?>" ,
        type: "POST",            
        success: function (data) {
            $( "#wilayah" ).html( data );
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
</script>

<script type="text/javascript">
$ ("#gview_grid-table-history").hide();

    jQuery(function ($) {

        var grid_selector = "#grid-table-history";

        jQuery("#grid-table-history").jqGrid({
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'Kode Rekening Pendapatan',name: 'rek_code',width: 150, align: "center"},
                {label: 'Uraian',name: 'nama_ayat',width: 200, align: "left"},
                {label: 'Objek Pajak',name: 'wp_name',width: 200, align: "left"},
                {label: 'Alamat',name: 'address_name',width: 200, align: "left"},
                {label: 'Tgl Pengukuhan',name: 'active_date2',width: 150, align: "center"},
                {label: 'NPWPD',name: 'npwpd',width: 150, align: "center",summaryTpl:"Jumlah Per Ayat",summaryType:"sum"},

                {label:'Sebelum Desember ',name: 'before_des',width: 150, summaryTpl:"{0}",summaryType:"sum", align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label:'Desember ',name: 'des_past',width: 150, summaryTpl:"{0}",summaryType:"sum", align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Januari',name: 'jan',width: 150, align: "right", summaryTpl:"{0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Februari',name: 'feb',width: 150, align: "right", summaryTpl:"{0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Maret',name: 'mar',width: 150, align: "right", summaryTpl:"{0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'April',name: 'apr',width: 150, align: "right", summaryTpl:"{0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Mei',name: 'mei',width: 150, align: "right", summaryTpl:"{0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Juni',name: 'jun',width: 150, align: "right", summaryTpl:"{0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Juli',name: 'jul',width: 150, align: "right", summaryTpl:"{0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Agustus',name: 'ags',width: 150, align: "right", summaryTpl:"{0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'September',name: 'sep',width: 150, align: "right", summaryTpl:"{0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Oktober',name: 'okt',width: 150, align: "right", summaryTpl:"{0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'November',name: 'nov',width: 150, align: "right", summaryTpl:"{0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label:'Desember ', name: 'after_nov',width: 150, align: "right", summaryTpl:"{0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},

                {label: 'Ketetapan Realisasi',name: 'jumlah_per_wp',width: 150, summaryTpl:"{0}",summaryType:"sum", align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Jumlah Bulan Bayar',name: 'jumlah_bulan_bayar',width: 150, align: "right",formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Rata-rata Ketetapan',name: 'avg_tap',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}}

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
                    groupField: ["nama_ayat"],
                    groupColumnShow: [true],
                    groupText: ["<b>{0}</b>"],
                    groupOrder: ["asc"],
                    groupSummary: [true], // will use the "summaryTpl" property of the respective column
                    groupCollapse: false,
                    groupDataSorted: true
                },
            gridComplete: function() {
                var $grid = $('#grid-table-history');

                var colSum1 = $grid.jqGrid('getCol', 'jan', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'jan': colSum1 });  
                var colSum2 = $grid.jqGrid('getCol', 'feb', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'feb': colSum2 });   
                var colSum3 = $grid.jqGrid('getCol', 'mar', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'mar': colSum3 });   

                var colSum4 = $grid.jqGrid('getCol', 'apr', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'apr': colSum4 });  
                var colSum5 = $grid.jqGrid('getCol', 'mei', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'mei': colSum5 });   
                var colSum6 = $grid.jqGrid('getCol', 'jun', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'jun': colSum6 }); 

                var colSum7 = $grid.jqGrid('getCol', 'jul', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'jul': colSum7 });  
                var colSum8 = $grid.jqGrid('getCol', 'ags', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'ags': colSum8 });   
                var colSum9 = $grid.jqGrid('getCol', 'sep', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'sep': colSum9 }); 

                var colSum10 = $grid.jqGrid('getCol', 'okt', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'okt': colSum10 });  
                var colSum12 = $grid.jqGrid('getCol', 'nov', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'nov': colSum12 });   
                var colSum13 = $grid.jqGrid('getCol', 'after_nov', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'after_nov': colSum13 }); 

                var colSum14 = $grid.jqGrid('getCol', 'des_past', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'des_past': colSum14 });  
                var colSum22 = $grid.jqGrid('getCol', 'before_des', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'before_des': colSum22 }); 

                var grandTotal = colSum1 + colSum2 + colSum3 + colSum4 + colSum5 + colSum6 + colSum7 + colSum8 + colSum9 + colSum10 + colSum12 + colSum13 + colSum14 + colSum22;

                $grid.jqGrid('footerData', 'set', { 'jumlah_per_wp': grandTotal }); 

            },
            caption: "Laporan Realisasi Bulanan Masa Pajak"
        });
    
        var year_code = $('#form_year_code').val();

        $("#grid-table-history").jqGrid("setLabel", "before_des", "Sebelum Desember "+year_code-1);
        jQuery("#grid-table-history").jqGrid('setGroupHeaders', {
            useColSpanStyle: true, 
            groupHeaders:[
                {startColumnName: 'before_des', numberOfColumns: 14, titleText: 'Realisasi Masa Pajak Bulan'}
            ]
        });
    });

    function showData(){

        $("#gview_grid-table-history").show();


        var kode_wilayah = $('#kode_wilayah').val();

        var tgl_penerimaan  = $('#start_period').val();
        var tgl_penerimaan_last = $('#end_period').val();

        var p_vat_type_id = $('#form_vat_id').val();
        var p_year_period_id = $('#form_year_period_id').val();

        var tgl_bayar = $('#tgl_bayar').val();
        var year_code = $('#form_year_code').val();

        //alert(year_code-1);

        if(kode_wilayah == 'semua'){
            kode_wilayah = "0";
        }
          

        if (kode_wilayah==''||year_code==''||tgl_bayar==''||tgl_penerimaan_last==''||tgl_penerimaan==''||p_year_period_id==''||p_vat_type_id==''){
            swal('Informasi','Semua Harus Diisi','info');
            $ ("#gview_grid-table-history").hide();
            return;

        }

        jQuery(function($) {
            jQuery("#grid-table-history").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."pelaporan.t_laporan_ketetapan_dan_realisasi_controller/read"; ?>',
                postData: {
                            kode_wilayah : kode_wilayah,
                            tgl_penerimaan  : tgl_penerimaan,
                            tgl_penerimaan_last : tgl_penerimaan_last,
                            p_year_period_id : p_year_period_id,
                            p_vat_type_id : p_vat_type_id,
                            tgl_bayar : tgl_bayar,
                            year_code : year_code
                        }

            });


            $("#grid-table-history").jqGrid("setCaption", "Laporan Realisasi Bulanan Masa Pajak");
            $("#grid-table-history").trigger("reloadGrid");
        });
       
        
    }





</script>

<script type="text/javascript">
    function showData1(){

        var kode_wilayah = $('#kode_wilayah').val();
        var tgl_penerimaan  = $('#start_period').val();
        var tgl_penerimaan_last = $('#end_period').val();
        var npwpd_jabatan = $('#jenis_wp').val();
        var year_code = $('#form_year_code').val();

        if (kode_wilayah==''||tgl_penerimaan==''||tgl_penerimaan_last==''||npwpd_jabatan==''||year_code==''){
            swal('Informasi','Semua Harus Diisi','info');
            $ ("#gview_grid-table-history").hide();
            return;

        }

        var url = '<?php echo WS_JQGRID . "pelaporan.t_laporan_ketetapan_dan_realisasi_controller/readHTML?"; ?>';
        url += 'kode_wilayah='+ kode_wilayah;
        url += '&tgl_penerimaan ='+ tgl_penerimaan;
        url += '&tgl_penerimaan_last='+ tgl_penerimaan_last;
        url += '&npwpd_jabatan='+ npwpd_jabatan;
        url += '&year_code='+ year_code;
        
        $.getJSON(url, function( items ) {
            document.getElementById('tbl-bayar').innerHTML = items.rows ;
        })
    }
</script>

<script> 
    $('#start_period').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });
    $('#end_period').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });
</script>

<script type="text/javascript">

    function toExcel() {

        var kode_wilayah = $('#kode_wilayah').val();
        var tgl_penerimaan  = $('#start_period').val();
        var tgl_penerimaan_last = $('#end_period').val();
        var p_vat_type_id = $('#form_vat_id').val();
        var p_year_period_id = $('#form_year_period_id').val();
        var year_code = $('#form_year_code').val();
        var tgl_bayar = $('#tgl_bayar').val();

        if(kode_wilayah == 'semua'){
            kode_wilayah = "0";
        }

        if (kode_wilayah==''||tgl_penerimaan==''||tgl_penerimaan_last==''||p_year_period_id==''||year_code==''||p_vat_type_id==''||tgl_bayar==''){
            swal('Informasi','Semua Harus Diisi','info');
            $ ("#gview_grid-table-history").hide();
            return;

        }
        // alert("Convert to Excel");
        var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_ketetapan_dan_realisasi_controller/excel/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        url += "&kode_wilayah=" +  kode_wilayah;
        url += "&tgl_penerimaan=" +  tgl_penerimaan;
        url += "&tgl_penerimaan_last=" +  tgl_penerimaan_last;
        url += "&p_year_period_id=" +  p_year_period_id;
        url += "&p_vat_type_id=" +  p_vat_type_id;
        url += "&year_code=" +  year_code;
        url += "&tgl_bayar=" +  tgl_bayar;


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
    function showLovBUsinessArea(id, code) {
        modal_business_area_show(id, code);
    }

</script>
