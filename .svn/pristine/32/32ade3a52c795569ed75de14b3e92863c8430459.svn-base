<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Data Izin dan Potensi</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">

        <div class="tab-content no-border">
            <div class="row" id="grid-tbl-letter">
                <div class="col-md-12">
                    <table id="grid-table"></table>
                    <div id="grid-pager"></div>
                </div>
            </div>
            <div class="space-4"></div>
            <div class="row" id="grid-tbl-employee">
                <div class="col-md-12">
                    <table id="grid-table1"></table>
                    <div id="grid-pager1"></div>
                </div>
            </div>
            <div class="space-4"></div>
            <div class="row" id="grid-tbl-restaurant">
                <div class="col-md-12">
                    <table id="grid-table2"></table>
                    <div id="grid-pager2"></div>
                </div>
            </div>
            <div class="space-4"></div>
            <div class="row" id="grid-tbl-restaurant">
                <div class="col-md-12">
                    <button class="btn btn-danger" type="button" onclick="toExcel()" id="excel">Tampilkan Excel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function toExcel() {
        // alert("Convert to Excel");
        var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_pembayaran_dan_perkembangan_jml_wp_controller/excel/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";

        window.location = url;
    }
</script>


<!--- GRID TABEL SURAT IZIN-->
<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    $(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        $("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."pelaporan.t_laporan_pembayaran_dan_perkembangan_jml_wp_controller/read"; ?>',
            datatype: "json",
            postData:{flag:1},
            mtype: "POST",
            colModel: [
                {label: 'Jenis Pajak',name: 'vat_code',width: 250, align: "left"},
                {label: 'Kategori',name: 'kategori',width: 250, align: "left", hidden:true},

                {label: 'NPWPD',name: 'o_jml_wp_daftar_akhir_tahun_kemarin',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'NPWPD Jabatan',name: 'o_jml_wp_jabatan_akhir_tahun_kemarin',width: 200, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'Jumlah',name: 'o_jml_wp_total_akhir_tahun_kemarin',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},

                {label: 'NPWPD',name: 'o_jml_wp_daftar_awal_tahun_hingga_sekarang',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'NPWPD Jabatan',name: 'o_jml_wp_jabatan_awal_tahun_hingga_sekarang',width: 200, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'Jumlah',name: 'o_jml_wp_total_awal_tahun_hingga_sekarang',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},

                {label: 'NPWPD',name: 'o_jml_wp_daftar_non_aktif_awal_tahun_hingga_sekarang',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'NPWPD Jabatan',name: 'o_jml_wp_jabatan_non_aktif_awal_tahun_hingga_sekarang',width: 200, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'Jumlah',name: 'o_jml_wp_total_non_aktif_awal_tahun_hingga_sekarang',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},

                {label: 'NPWPD',name: 'o_jml_wp_daftar_hingga_sekarang',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'NPWPD Jabatan',name: 'o_jml_wp_jabatan_hingga_sekarang',width: 200, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'Jumlah',name: 'o_jml_wp_total_hingga_sekarang',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"}

            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 10,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            footerrow: true,
            gridComplete: function() {
                var ids = jQuery("#grid-table").jqGrid('getDataIDs');
                var rowData = {};
                var rowId = {};
                for (var i = 0; i < ids.length; i++) 
                {
                    var rowId = ids[i];
                    var rowData = jQuery('#grid-table').jqGrid ('getRowData', rowId);

                   
                }
                var $grid = $('#grid-table');
                var colSum = $grid.jqGrid('getCol', 'o_jml_wp_daftar_akhir_tahun_kemarin', true, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_daftar_akhir_tahun_kemarin': colSum });

                var colSum1 = $grid.jqGrid('getCol', 'o_jml_wp_jabatan_akhir_tahun_kemarin', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_jabatan_akhir_tahun_kemarin': colSum1 });

                var colSum2 = $grid.jqGrid('getCol', 'o_jml_wp_total_akhir_tahun_kemarin', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_total_akhir_tahun_kemarin': colSum2 });


                var colSum3 = $grid.jqGrid('getCol', 'o_jml_wp_daftar_awal_tahun_hingga_sekarang', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_daftar_awal_tahun_hingga_sekarang': colSum3 });

                var colSum4 = $grid.jqGrid('getCol', 'o_jml_wp_jabatan_awal_tahun_hingga_sekarang', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_jabatan_awal_tahun_hingga_sekarang': colSum4 });
                
                var colSum5 = $grid.jqGrid('getCol', 'o_jml_wp_total_awal_tahun_hingga_sekarang', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_total_awal_tahun_hingga_sekarang': colSum5 });


                var colSum6 = $grid.jqGrid('getCol', 'o_jml_wp_daftar_non_aktif_awal_tahun_hingga_sekarang', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_daftar_non_aktif_awal_tahun_hingga_sekarang': colSum6 });

                var colSum7 = $grid.jqGrid('getCol', 'o_jml_wp_jabatan_non_aktif_awal_tahun_hingga_sekarang', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_jabatan_non_aktif_awal_tahun_hingga_sekarang': colSum7 });

                var colSum8 = $grid.jqGrid('getCol', 'o_jml_wp_total_awal_tahun_hingga_sekarang', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_total_awal_tahun_hingga_sekarang': colSum8 });


                var colSum9 = $grid.jqGrid('getCol', 'o_jml_wp_daftar_hingga_sekarang', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_daftar_hingga_sekarang': colSum9 });

                var colSum10 = $grid.jqGrid('getCol', 'o_jml_wp_jabatan_hingga_sekarang', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_jabatan_hingga_sekarang': colSum10 });
                
                var colSum11 = $grid.jqGrid('getCol', 'o_jml_wp_total_hingga_sekarang', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_total_hingga_sekarang': colSum11 });
            },

            caption: "PERKEMBANGAN JUMLAH WAJIB PAJAK HOTEL, RESTORAN, HIBURAN DAN PARKIR"

        });

        jQuery("#grid-table").jqGrid('setGroupHeaders', {
            useColSpanStyle: true, 
            groupHeaders:[
                {startColumnName: 'o_jml_wp_daftar_akhir_tahun_kemarin', numberOfColumns: 3, titleText: 'PER 31-12-'+(yyyy-1)},
                {startColumnName: 'o_jml_wp_daftar_awal_tahun_hingga_sekarang', numberOfColumns: 3, titleText: 'DAFTAR 01-01-'+yyyy+' s.d. '+dd+'-'+mm+'-'+yyyy},
                {startColumnName: 'o_jml_wp_daftar_non_aktif_awal_tahun_hingga_sekarang', numberOfColumns: 3, titleText: 'NON AKTIF 01-01-'+yyyy+' s.d. '+dd+'-'+mm+'-'+yyyy},
                {startColumnName: 'o_jml_wp_daftar_hingga_sekarang', numberOfColumns: 3, titleText: 'PER '+dd+'-'+mm+'-'+yyyy}
            ]
        });


    });
</script>

<!--- GRID TABEL POTENSI PEGAWAI-->
<script>
    $(function($) {
        var grid_selector = "#grid-table1";
        var pager_selector = "#grid-pager1";

        $("#grid-table1").jqGrid({
            url: '<?php echo WS_JQGRID."pelaporan.t_laporan_pembayaran_dan_perkembangan_jml_wp_controller/read"; ?>',
            datatype: "json",
            postData:{flag:2},
            mtype: "POST",
            colModel: [
                {label: 'Jenis Pajak',name: 'vat_code',width: 250, align: "left"},
                {label: 'Jumlah WP',name: 'o_jml_wp_non_npwpd_jabatan',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'Pembayaran',name: 'o_realisasi_non_npwpd_jabatan',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'Jumlah WP',name: 'o_jml_wp_npwpd_jabatan',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'Pembayaran',name: 'o_realisasi_npwpd_jabatan',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'Jumlah WP',name: 'jml_wp',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'Pembayaran',name: 'jml_payment',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"}
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 10,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            footerrow: true,
            gridComplete: function() {
                var $grid = $('#grid-table1');
                var colSum = $grid.jqGrid('getCol', 'o_jml_wp_non_npwpd_jabatan', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_non_npwpd_jabatan': colSum });

                var colSum1 = $grid.jqGrid('getCol', 'o_jml_wp_npwpd_jabatan', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_npwpd_jabatan': colSum1 });

                var colSum2 = $grid.jqGrid('getCol', 'jml_wp', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'jml_wp': colSum2 });

                var colSum3 = $grid.jqGrid('getCol', 'o_realisasi_non_npwpd_jabatan', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_realisasi_non_npwpd_jabatan': colSum3 });

                var colSum4 = $grid.jqGrid('getCol', 'o_realisasi_npwpd_jabatan', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_realisasi_npwpd_jabatan': colSum4 });

                var colSum5 = $grid.jqGrid('getCol', 'jml_payment', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'jml_payment': colSum5 });
            },
            
            caption: "RINCIAN PEMBAYARAN WAJIB PAJAK BARU PENGUKUHAN TAHUN 2017"

        });

        jQuery("#grid-table1").jqGrid('setGroupHeaders', {
            useColSpanStyle: true, 
            groupHeaders:[
                {startColumnName: 'o_jml_wp_non_npwpd_jabatan', numberOfColumns: 2, titleText: 'MENDAFTAR SENDIRI'},
                {startColumnName: 'o_jml_wp_npwpd_jabatan', numberOfColumns: 2, titleText: 'NPWPD JABATAN'},
                {startColumnName: 'jml_wp', numberOfColumns: 2, titleText: 'JUMLAH'}
            ]
        });

    });
</script>

<!--- GRID TABEL POTENSI PEGAWAI-->
<script>
    $(function($) {
        var grid_selector = "#grid-table2";
        var pager_selector = "#grid-pager2";

        $("#grid-table2").jqGrid({
            url: '<?php echo WS_JQGRID."pelaporan.t_laporan_pembayaran_dan_perkembangan_jml_wp_controller/read"; ?>',
            datatype: "json",
            postData:{flag:3},
            mtype: "POST",
            colModel: [
                {label: 'Jenis Pajak',name: 'vat_code',width: 250, align: "left"},
                {label: 'Yang Belum Bayar',name: 'o_jml_wp_blum_bayar',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'Seluruhnya',name: 'o_jml_wp_seluruhnya',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"},
                {label: 'Presentase',name: 'presentase',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},summaryTpl:"Jumlah: {0}",summaryType:"sum"}
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 10,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            footerrow: true,
            gridComplete: function() {
                var $grid = $('#grid-table2');
                var colSum = $grid.jqGrid('getCol', 'o_jml_wp_blum_bayar', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_blum_bayar': colSum });

                var colSum1 = $grid.jqGrid('getCol', 'o_jml_wp_seluruhnya', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'o_jml_wp_seluruhnya': colSum1 });

                var colSum2 = $grid.jqGrid('getCol', 'presentase', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'presentase': colSum/colSum1*100});
            },
            
            caption: "RINCIAN JUMLAH WAJIB PAJAK BARU PENGUKUHAN TAHUN 2017 YANG BELUM BAYAR"

        });

    });
</script>








