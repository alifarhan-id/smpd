<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Laporan Pembayaran Per Jenis Dan Masa Pajak</span>
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
                    <label class="control-label col-md-2">Tanggal Penerimaan</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control" id="start_period">  
                            <span class="input-group-addon"> s/d </span>
                            <input type="text" class="form-control" id="end_period">    
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="space-2"></div>
                    <label class="control-label col-md-2">Jenis WP</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select id="jenis_wp" name="jenis_wp" class="FormElement form-control" >
                                <option value="">--Pilih Jenis WP--</option>
                                <option value="1">Semua</option>
                                <option value="2">Hanya NPWPD Jabatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-2"></div>
                    <label class="control-label col-md-2">Wilayah WP</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div id="wilayah"></div>           
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
                {label: 'Uraian Jenis Pajak',name: 'ayat_pajak_2',width: 250, align: "left"},
                {label: 'Jenis Pajak',name: 'jenis_pajak',width: 200, align: "left"},

                {label: 'Aktif',name: 'aktif1',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Bayar',name: 'bayar1',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Nilai',name: 'nilai1',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},

                 {label: 'Aktif',name: 'aktif2',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Bayar',name: 'bayar2',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Nilai',name: 'nilai2',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},

                {label: 'Aktif',name: 'aktif3',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Bayar',name: 'bayar3',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Nilai',name: 'nilai3',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},

                {label: 'Aktif',name: 'aktif4',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Bayar',name: 'bayar4',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Nilai',name: 'nilai4',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
             
                {label: 'Aktif',name: 'aktif5',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Bayar',name: 'bayar5',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Nilai',name: 'nilai5',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
              
                {label: 'Aktif',name: 'aktif6',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Bayar',name: 'bayar6',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Nilai',name: 'nilai6',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
               
                {label: 'Aktif',name: 'aktif7',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Bayar',name: 'bayar7',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Nilai',name: 'nilai7',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                
                {label: 'Aktif',name: 'aktif8',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Bayar',name: 'bayar8',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Nilai',name: 'nilai8',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                
                {label: 'Aktif',name: 'aktif9',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Bayar',name: 'bayar9',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Nilai',name: 'nilai9',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                
                {label: 'Aktif',name: 'aktif10',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Bayar',name: 'bayar10',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Nilai',name: 'nilai10',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
               
                {label: 'Aktif',name: 'aktif11',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Bayar',name: 'bayar11',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Nilai',name: 'nilai11',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                
                {label: 'Aktif',name: 'aktif12',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Bayar',name: 'bayar12',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Nilai',name: 'nilai12',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}}

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
                var $grid = $('#grid-table-history');

                var colSum1 = $grid.jqGrid('getCol', 'aktif1', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'aktif1': colSum1 });  
                var colSum2 = $grid.jqGrid('getCol', 'bayar1', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'bayar1': colSum2 });   
                var colSum3 = $grid.jqGrid('getCol', 'nilai1', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'nilai1': colSum3 }); 

                var colSum4 = $grid.jqGrid('getCol', 'aktif2', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'aktif2': colSum4 });  
                var colSum5 = $grid.jqGrid('getCol', 'bayar2', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'bayar2': colSum5 });   
                var colSum6 = $grid.jqGrid('getCol', 'nilai2', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'nilai2': colSum6 });   

                var colSum7 = $grid.jqGrid('getCol', 'aktif3', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'aktif3': colSum7 });  
                var colSum8 = $grid.jqGrid('getCol', 'bayar3', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'bayar3': colSum8 });   
                var colSum9 = $grid.jqGrid('getCol', 'nilai3', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'nilai3': colSum9 });   

                var colSum10 = $grid.jqGrid('getCol', 'aktif4', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'aktif4': colSum10 });  
                var colSum11 = $grid.jqGrid('getCol', 'bayar4', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'bayar4': colSum11 });   
                var colSum12 = $grid.jqGrid('getCol', 'nilai4', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'nilai4': colSum12 });   

                var colSum13 = $grid.jqGrid('getCol', 'aktif5', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'aktif5': colSum13 });  
                var colSum14 = $grid.jqGrid('getCol', 'bayar5', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'bayar5': colSum14 });   
                var colSum15 = $grid.jqGrid('getCol', 'nilai5', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'nilai5': colSum15 });   

                var colSum16 = $grid.jqGrid('getCol', 'aktif6', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'aktif6': colSum16 });  
                var colSum17 = $grid.jqGrid('getCol', 'bayar6', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'bayar6': colSum17 });   
                var colSum18 = $grid.jqGrid('getCol', 'nilai6', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'nilai6': colSum18 });   

                var colSum19 = $grid.jqGrid('getCol', 'aktif7', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'aktif7': colSum19 });  
                var colSum20 = $grid.jqGrid('getCol', 'bayar7', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'bayar7': colSum20 });   
                var colSum21 = $grid.jqGrid('getCol', 'nilai7', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'nilai7': colSum21 });   

                var colSum22 = $grid.jqGrid('getCol', 'aktif8', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'aktif8': colSum22 });  
                var colSum23 = $grid.jqGrid('getCol', 'bayar8', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'bayar8': colSum23 });   
                var colSum24 = $grid.jqGrid('getCol', 'nilai8', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'nilai8': colSum24 });   

                var colSum25 = $grid.jqGrid('getCol', 'aktif9', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'aktif9': colSum25 });  
                var colSum26 = $grid.jqGrid('getCol', 'bayar9', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'bayar9': colSum26 });   
                var colSum27 = $grid.jqGrid('getCol', 'nilai9', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'nilai9': colSum27 });   

                var colSum28 = $grid.jqGrid('getCol', 'aktif10', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'aktif10': colSum28 });  
                var colSum29 = $grid.jqGrid('getCol', 'bayar10', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'bayar10': colSum29 });   
                var colSum30 = $grid.jqGrid('getCol', 'nilai10', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'nilai10': colSum30 });   

                var colSum31 = $grid.jqGrid('getCol', 'aktif11', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'aktif11': colSum31 });  
                var colSum32 = $grid.jqGrid('getCol', 'bayar11', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'bayar11': colSum32 });   
                var colSum33 = $grid.jqGrid('getCol', 'nilai11', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'nilai11': colSum33 });   

                var colSum34 = $grid.jqGrid('getCol', 'aktif12', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'aktif12': colSum34 });  
                var colSum35 = $grid.jqGrid('getCol', 'bayar12', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'bayar12': colSum35 });   
                var colSum36 = $grid.jqGrid('getCol', 'nilai12', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'nilai12': colSum36 });      
            },
            caption: "Laporan Pembayaran Per Jenis Dan Masa Pajak"
        });

        jQuery("#grid-table-history").jqGrid('setGroupHeaders', {
            useColSpanStyle: true, 
            groupHeaders:[
                {startColumnName: 'aktif1', numberOfColumns: 3, titleText: 'Januari'},
                {startColumnName: 'aktif2', numberOfColumns: 3, titleText: 'Februari'},
                {startColumnName: 'aktif3', numberOfColumns: 3, titleText: 'Maret'},
                {startColumnName: 'aktif4', numberOfColumns: 3, titleText: 'April'},
                {startColumnName: 'aktif5', numberOfColumns: 3, titleText: 'Mei'},
                {startColumnName: 'aktif6', numberOfColumns: 3, titleText: 'Juni'},
                {startColumnName: 'aktif7', numberOfColumns: 3, titleText: 'Juli'},
                {startColumnName: 'aktif8', numberOfColumns: 3, titleText: 'Agustus'},
                {startColumnName: 'aktif9', numberOfColumns: 3, titleText: 'September'},
                {startColumnName: 'aktif10', numberOfColumns: 3, titleText: 'Oktober'},
                {startColumnName: 'aktif11', numberOfColumns: 3, titleText: 'November'},
                {startColumnName: 'aktif12', numberOfColumns: 3, titleText: 'Desember'}
            ]
        });
    });

    function showData(){

        $("#gview_grid-table-history").show();

        var kode_wilayah = $('#kode_wilayah').val();

        var tgl_penerimaan  = $('#start_period').val();
        var tgl_penerimaan_last = $('#end_period').val();

        var npwpd_jabatan = $('#jenis_wp').val();
        var year_code = $('#form_year_code').val();
          

        if (kode_wilayah==''||year_code==''||npwpd_jabatan==''||tgl_penerimaan_last==''||tgl_penerimaan==''){
            swal('Informasi','Semua Harus Diisi','info');
            $ ("#gview_grid-table-history").hide();
            return;

        }

        jQuery(function($) {
            jQuery("#grid-table-history").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."pelaporan.t_laporan_pembayaran_per_bulan_per_ayat_controller/readData"; ?>',
                postData: {
                            kode_wilayah : kode_wilayah,
                            tgl_penerimaan  : tgl_penerimaan,
                            tgl_penerimaan_last : tgl_penerimaan_last,
                            npwpd_jabatan : npwpd_jabatan,
                            year_code : year_code
                        }

            });

            $("#grid-table-history").jqGrid("setCaption", "Laporan Pembayaran Per Jenis Dan Masa Pajak");
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

        var url = '<?php echo WS_JQGRID . "pelaporan.t_laporan_pembayaran_per_bulan_per_ayat_controller/readHTML?"; ?>';
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
        var npwpd_jabatan = $('#jenis_wp').val();
        var year_code = $('#form_year_code').val();

        if (kode_wilayah==''||tgl_penerimaan==''||tgl_penerimaan_last==''||npwpd_jabatan==''||year_code==''){
            swal('Informasi','Semua Harus Diisi','info');
            $ ("#gview_grid-table-history").hide();
            return;

        }
        // alert("Convert to Excel");
        var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_pembayaran_per_bulan_per_ayat_controller/excel/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        url += "&kode_wilayah=" +  kode_wilayah;
        url += "&tgl_penerimaan=" +  tgl_penerimaan;
        url += "&tgl_penerimaan_last=" +  tgl_penerimaan_last;
        url += "&npwpd_jabatan=" +  npwpd_jabatan;
        url += "&year_code=" +  year_code;


        window.location = url;
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
function showLovBUsinessArea(id, code) {
    modal_business_area_show(id, code);
}

</script>
