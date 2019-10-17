<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Sistem Manajemen Pajak Daerah</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <?php $this->load->view('template/scripts');?>
        <?php $this->load->view('template/styles');?>
        <!-- for electron.io shakes -->
        <script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
    </head>

   <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md page-header-fixed page-sidebar-fixed" style="background-color: #ffffff !important;">
<!-- breadcrumb -->
<!-- end breadcrumb -->

<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">

        <div class="tab-content no-border">
            <!-- <div class="row">
                <div class="col-xs-12">
                   <table id="grid-table"></table>
                   <div id="grid-pager"></div>
                </div>
            </div> -->
            <div style="text-align: center;"><img src="<?php echo base_url(); ?>assets/image/logo-2.png" width="50px" height="" alt=""></div>
            <div style="text-align: center; color: #696969; font-weight: bold; font-size: 20px;">PEMERINTAH KABUPATEN LOMBOK UTARA</div>
            <div style="text-align: center; color: #696969; font-weight: bold; font-size: 20px;">BADAN PENDAPATAN DAERAH</div>
            <hr>
            <div class="row">  
                <div class="col-xs-12">
                        <table id="grid-table" align="center"></table>  
                    
                      
                    <!-- <div id="gbox_grid-table" class="ui-jqgrid">
                        <div id="gview_grid-table" class="ui-jqgrid-view table-responsive" role="grid">
                                       
                        </div>
                    </div>  -->
                </div>   
            </div>
            <div class="space-4"></div>
            <div class="row">  
                <div class="col-xs-12">
                    <div>
                        
                    </div>
                    <table id="grid-table-triwulan"></table> 
                    <!-- <div id="gbox_grid-table-triwulan" class="ui-jqgrid">
                        <div id="gview_grid-table-triwulan" class="ui-jqgrid-view table-responsive" role="grid">
                                          
                        </div>
                    </div>  -->
                </div>   
            </div>
            <div class="space-4"></div>
            <div class="row">  
                <div class="col-xs-12">
                    <div>
                        
                    </div>
                    <table id="grid-table-pajak"></table>
                    <!-- <div id="gbox_grid-table-pajak" class="ui-jqgrid">
                        <div id="gview_grid-table-pajak" class="ui-jqgrid-view table-responsive" role="grid">
                                           
                        </div>
                    </div>  -->
                </div>   
            </div>
            <div class="space-4"></div>
            <div class="row">  
                <div class="col-xs-12">
                    <div>
                        
                    </div>
                    <table id="grid-table-dtl-pajak"></table>  
                    <!-- <div id="gbox_grid-table-dtl-pajak" class="ui-jqgrid">
                        <div id="gview_grid-table-dtl-pajak" class="ui-jqgrid-view table-responsive" role="grid">
                                        
                        </div>
                    </div> --> 
                </div>   
            </div>
        </div>
    </div>
</div>


<script>
/**----------------------grid table------------------------------*/
    jQuery(function($) {
        var grid_selector = "#grid-table";

        jQuery("#grid-table").jqGrid({
            url: "<?php echo base_url(); ?>"+"target_realisasi_dash/target_realisasi/",
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Year', name: 'p_year_period_id', width: 3, hidden: true},
                {label: 'Tahun',name: 'year_code',width: 80, align: "left"},
                {label: 'Target',name: 'target_amt',width: 250, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Realisasi',name: 'realisasi_amt',width: 250, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Persentase (%)',name: 'percentage',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Selisih',name: 'selisih',width: 250, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Persentase Selisih (%)',name: 'percentage_selisih',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}}
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
            //memanggil controller jqgrid yang ada di controller read
            caption: "Daftar Target VS Realisasi"

        });

    });
/**----------------------end grid table------------------------------*/

/**----------------------grid table triwulan------------------------------*/
    jQuery(function($) {
        var grid_selector = "#grid-table-triwulan";

        jQuery("#grid-table-triwulan").jqGrid({
            url: "<?php echo base_url(); ?>"+"target_realisasi_dash/target_realisasi/",
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Bulan', name: 'p_year_period_id', width: 5, hidden: true},
                {label: 'Bulan',name: 'year_code',width: 40, align: "left"},
                {label: 'Target',name: 'target_amt',width: 90, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Realisasi',name: 'realisasi_amt',width: 90, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Persentase (%)',name: 'percentage',width: 60, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Selisih',name: 'selisih',width: 90, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Persentase Selisih (%)',name: 'percentage_selisih',width: 60, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}}
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
            //memanggil controller jqgrid yang ada di controller read
            caption: "Daftar Target VS Realisasi Per Bulan"

        });

    });
/**----------------------end grid table triwulan------------------------------*/


/**----------------------grid table pajak------------------------------*/
    jQuery(function($) {
        var grid_selector = "#grid-table-pajak";

        jQuery("#grid-table-pajak").jqGrid({
            url: "<?php echo base_url(); ?>"+"target_realisasi_dash/target_realisasi/",
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Bulan', name: 'p_year_period_id', width: 5, hidden: true},
                {label: 'Jenis Pajak',name: 'year_code',width: 75, align: "left"},
                {label: 'Target Bulan ',name: 'target_amt',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Realisasi',name: 'realisasi_amt',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Persentase (%)',name: 'percentage',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Selisih',name: 'selisih',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Persentase Selisih (%)',name: 'percentage_selisih',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}}
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
            //memanggil controller jqgrid yang ada di controller read
            caption: "Daftar Target VS Realisasi Per Jenis Pajak Bulan"

        });

    });
/**----------------------end grid table pajak------------------------------*/


/**----------------------grid table detail pajak------------------------------*/
    jQuery(function($) {
        var grid_selector = "#grid-table-dtl-pajak";

        jQuery("#grid-table-dtl-pajak").jqGrid({
            url: "<?php echo base_url(); ?>"+"target_realisasi_dash/target_realisasi/",
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Bulan', name: 'p_year_period_id', width: 5, hidden: true},
                {label: 'Jenis Pajak',name: 'year_code',width: 75, align: "left"},
                {label: 'Target ',name: 'target_amt',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Realisasi',name: 'realisasi_amt',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Persentase (%)',name: 'percentage',width: 100, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Selisih',name: 'selisih',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'Persentase Selisih (%)',name: 'percentage_selisih',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}}
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
            //memanggil controller jqgrid yang ada di controller read
            caption: "Daftar Target VS Realisasi Per Jenis Pajak"

        });

    });
/**----------------------end grid table detail pajak------------------------------*/

</script>

<?php $this->load->view('template/scripts.php'); ?>

</body>
</html>