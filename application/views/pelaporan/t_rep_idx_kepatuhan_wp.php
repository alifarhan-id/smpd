<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Laporan Kepatuhan Wajib Pajak</span>
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
                <div class="space-4"></div>
                <div class="row col-md-offset-2">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showDataDetail()">Tampilkan Data Detail</button>
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showDataGeneral()">Tampilkan Data General</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<div class="tab-content no-border">
    <div class="row">
        <div class="col-xs-12">
            <div id="gbox_grid-table" class="ui-jqgrid">
                <div id="gview_grid-table-general" class="ui-jqgrid-view table-responsive" role="grid">
                    <table id="grid-table-general"></table>               
                </div>
                <div id="gview_grid-table-detail" class="ui-jqgrid-view table-responsive" role="grid">
                    <table id="grid-table-detail"></table>              
                </div>
            </div>            
        </div>
    </div>
    <div class="row">  
        <div class="col-xs-12">
            <div DISPLAY: inline-block" id="container"></div>
        </div>  
    </div>
</div>

<?php $this->load->view('lov/lov_year_period'); ?> 
<?php $this->load->view('lov/lov_finance_period'); ?>

<script>
    var urlJS = "<?php echo base_url(); ?>assets/js/highcharts.js";

    if (!isScriptAlreadyIncluded(urlJS)){
      // DOM: Create the script element
        var jsElm = document.createElement("script");
        // set the type attribute
        jsElm.type = "application/javascript";
        // make the script element load file
        jsElm.src = urlJS;
        // finally insert the element to the body element in order to load the script
        document.body.appendChild(jsElm);
    }

    function isScriptAlreadyIncluded(src){
        var scripts = document.getElementsByTagName("script");
        for(var i = 0; i < scripts.length; i++) 
           if(scripts[i].getAttribute('src') == src) return true;
        return false;
    }
</script>

<script type="text/javascript">
    $ ("#gview_grid-table-general").hide();
    $ ("#gview_grid-table-detail").hide();

    jQuery(function($) {

        var grid_selector = "#grid-table-general";

        jQuery("#grid-table-general").jqGrid({
            url: "<?php echo base_url(); ?>"+"kepatuhan_wp/tampilDataGeneral/",
            datatype: "json",
            mtype: "POST",
            
            colModel: [
                {label: 'Kriteria',name: 'kriteria',width: 150, align: "left",editable: false},
                {label: 'Jumlah',name: 'jumlah',width: 150,summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},   
                {label: 'Prosentase',name: 'prosentase',width: 200, summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"}
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 5,
            rowList: [5,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            footerrow: true,
            gridComplete: function() {
                var $grid = $('#grid-table-general');
                var colSum4 = $grid.jqGrid('getCol', 'jumlah', false, 'sum');  
                $grid.jqGrid('footerData', 'set', { 'jumlah': colSum4 });
                
            },
            caption: "Laporan Kepatuhan Wajib Pajak (Umum)"

        });

        

    });

    

        
    jQuery(function($) {

        var grid_selector = "#grid-table-detail";

        jQuery("#grid-table-detail").jqGrid({
            url: "<?php echo base_url(); ?>"+"kepatuhan_wp/tampilDataDetail/",
            datatype: "json",
            mtype: "POST",
            
            colModel: [
                {label: 'Kriteria',name: 'kriteria',width: 150, align: "left",editable: false},
                {label: 'Jumlah',name: 'jumlah1',width: 150,summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},   
                {label: 'Prosentase',name: 'persen1',width: 200, summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},
                {label: 'Jumlah',name: 'jumlah2',width: 150,summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},   
                {label: 'Prosentase',name: 'persen2',width: 200, summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},
                {label: 'Jumlah',name: 'jumlah3',width: 150,summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},   
                {label: 'Prosentase',name: 'persen3',width: 200, summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},
                {label: 'Jumlah',name: 'jumlah4',width: 150,summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"},   
                {label: 'Prosentase',name: 'persen4',width: 200, summaryTpl:"Jumlah: {0}",summaryType:"sum",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}, align: "right"}
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 5,
            rowList: [5,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            footerrow: true,
            gridComplete: function() {
                var $grid = $('#grid-table-detail');
                var colSum1 = $grid.jqGrid('getCol', 'jumlah1', false, 'sum');  
                $grid.jqGrid('footerData', 'set', { 'jumlah1': colSum1 });
                var colSum2 = $grid.jqGrid('getCol', 'jumlah2', false, 'sum');  
                $grid.jqGrid('footerData', 'set', { 'jumlah2': colSum2 });
                var colSum3 = $grid.jqGrid('getCol', 'jumlah3', false, 'sum');  
                $grid.jqGrid('footerData', 'set', { 'jumlah3': colSum3 });
                var colSum4 = $grid.jqGrid('getCol', 'jumlah4', false, 'sum');  
                $grid.jqGrid('footerData', 'set', { 'jumlah4': colSum4 });
                
            },
            caption: "Laporan Kepatuhan Wajib Pajak (Detail)"

        });
        jQuery("#grid-table-detail").jqGrid('setGroupHeaders', {
            useColSpanStyle: true, 
            groupHeaders:[
                {startColumnName: 'jumlah1', numberOfColumns: 2, titleText: 'Hotel'},
                {startColumnName: 'jumlah2', numberOfColumns: 2, titleText: 'Restoran'},
                {startColumnName: 'jumlah3', numberOfColumns: 2, titleText: 'Hiburan'},
                {startColumnName: 'jumlah4', numberOfColumns: 2, titleText: 'Parkir'}
            ]
        });

        

    });

   
</script> 

<script type="text/javascript">
    

    function showDataGeneral(){

        $("#gview_grid-table-general").show();
        $ ("#gview_grid-table-detail").hide();

        var p_finance_period_id = $('#form_finance_period_id').val();
        var p_year_period_id = $('#form_year_period_id').val(); 

        if (p_finance_period_id==''||p_year_period_id==''){
            swal('Informasi','Semua Harus Diisi','info');
            $ ("#gview_grid-table-general").hide();
            $ ("#gview_grid-table-detail").hide();
            return;
        }

        //tampilDataGeneral(p_finance_period_id);

        jQuery(function($) {
            jQuery("#grid-table-general").jqGrid('setGridParam',{
                url: '<?php echo base_url(); ?>'+'kepatuhan_wp/tampilDataGeneral/',
                postData: { p_finance_period_id : p_finance_period_id}

            });

            $("#grid-table-general").jqGrid("setCaption", "Laporan Kepatuhan Wajib Pajak (Umum)");
            $("#grid-table-general").trigger("reloadGrid");
        });
        reloadChart(p_finance_period_id);
        


    }

    function showDataDetail(){

        $("#gview_grid-table-detail").show();
        $ ("#gview_grid-table-general").hide();

        var p_finance_period_id = $('#form_finance_period_id').val();
        var finance_code = $('#form_code').val();
        var p_year_period_id = $('#form_year_period_id').val(); 

        if (p_finance_period_id==''||p_year_period_id==''){
            swal('Informasi','Semua Harus Diisi','info');
            $ ("#gview_grid-table-detail").hide();
            $ ("#gview_grid-table-general").hide();
            return;
        }

        jQuery(function($) {
        var grid_selector = "#grid-table-detail";
        //var pager_selector = "#grid-pager-bpps2";

            jQuery("#grid-table-detail").jqGrid('setGridParam',{
                url: '<?php echo base_url(); ?>'+'kepatuhan_wp/tampilDataDetail/',
                postData: { p_finance_period_id : p_finance_period_id}

            });


            $("#grid-table-detail").jqGrid("setCaption", "Laporan Kepatuhan Wajib Pajak (Detail)");
            $("#grid-table-detail").trigger("reloadGrid");
        });


        //tampilDataDetail(p_finance_period_id);
        reloadChart2(p_finance_period_id, finance_code);
        

    }

</script>


<script> 
    function reloadChart(p_finance_period_id) {
        var var_url = "<?php echo base_url(); ?>"+"kepatuhan_wp/tampilDataGeneral?p_finance_period_id="+p_finance_period_id;
        $.getJSON( var_url, function( items ) {
            // alert(items[0][0]);
            // return;
            
            var jumlah = [];
            var prosentase = [];
            var kriteria = [];
            
            var jumlah = items.length;
            
            for(i = 0; i < jumlah; i++){
                    kriteria[i] = items[i][0];
                    jumlah[i] = items[i][1];
                    prosentase[i] = items[i][2];
            }

            // alert(kriteria);
            // return;
    
            $("#container").highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                            text: "Persentase Kepatuhan Wajib Pajak"
                    },
                    tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Kepatuhan',
                        colorByPoint: true,
                        data: [
                            {name: items[0][0],y: items[0][2]},
                            {name: items[1][0],y: items[1][2]},
                            {name: items[2][0],y: items[2][2]}
                        ]
                    }]
            });
        });
    }

    function reloadChart2(p_finance_period_id, finance_code){
        var var_url = "<?php echo base_url(); ?>"+"kepatuhan_wp/tampilDataDetail?p_finance_period_id="+p_finance_period_id;
        $.getJSON( var_url, function( items ) {

            var kriteria = [];
            var data_patuh = [];
            var data_kurang_patuh = []; 
            var data_tidak_patuh = [];
            for (var i=0; i<items.length; i++){
                for(var j=0; j < items[i].length; j++){
                    kriteria = items[i][j];
                }
            }
            

            $("#container").highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik Kepatuhan WP'
                },
                subtitle: {
                    text: 'Periode Pajak '+ finance_code
                },
                xAxis: {
                    categories: [
                        'Hotel',
                        'Restoran',
                        'Hiburan',
                        'Parkir'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah WP'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [
                    {
                        name: items[0][0],
                        data: [items[0][1], items[0][3], items[0][5], items[0][7]]

                    }, 
                    {
                        name: items[1][0],
                        data: [items[1][1], items[1][3], items[1][5], items[1][7]]

                    }, 
                    {
                        name: items[2][0],
                        data: [items[2][1], items[2][3], items[2][5], items[2][7]]

                    }
                ]
            });
        });

        
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
function showLOVFinancePeriod(id, code) {
    if ($('#form_year_period_id').val() == 0 || $('#form_year_period_id').val() == '' || $('#form_year_period_id').val() == null || $('#form_year_period_id').val() == undefined || $('#form_year_period_id').val() == false){
        swal('Peringatan', 'Periode Tahun Harus Diisi', 'error');
        return;
    }
    modal_finance_period_show(id, code,$('#form_year_period_id').val());
}
</script>


