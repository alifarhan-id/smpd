<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Target VS Realisasi</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                        <i class="blue"></i>
                        <strong> Target VS Realisasi </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong> Per Bidang Pajak </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong> Per Jenis Pajak </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-4">
                        <i class="blue"></i>
                        <strong> Bulanan Per Jenis Pajak </strong>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-xs-12">
                   <table id="grid-table"></table>
                   <div id="grid-pager"></div>
                </div>
            </div>
            <hr>
            <div class="row">  
                <div class="col-xs-6">
                    <div DISPLAY: inline-block" id="container"></div>
                </div>  
                <div class="col-xs-6">
                    <div DISPLAY: inline-block" id="container2"></div>
                </div>  
            </div>
        </div>
    </div>
</div>


<script>
$("#tab-2").on("click", function(event) {

    event.stopPropagation();
    var grid = $('#grid-table');
    p_year_period_id = grid.jqGrid ('getGridParam', 'selrow');
    code = grid.jqGrid ('getCell', p_year_period_id, 'year_code');

    if(p_year_period_id == null) {
        swal('Informasi','Silahkan pilih salah satu tahun target','info');
        return false;
    }

    loadContentWithParams("pelaporan.t_target_realisasi_bidang", {
        p_year_period_id: p_year_period_id,
        code : code
    });
});
</script>
<script>
    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."pelaporan.t_target_realisasi_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Year', name: 'p_year_period_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Tahun',name: 'year_code',width: 75, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Target',name: 'target_amt',width: 150, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Realisasi',name: 'realisasi_amt',width: 150, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Persentase',name: 'persentase',width: 100, align: "right",editable: true,
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                },
                {label: 'Selisih',name: 'selisih',width: 150, align: "right",editable: true,
                    formatter: 'number', formatoptions: { decimalPlaces: 2 },
                    editoptions: {
                        size: 30,
                        maxlength:32
                    },
                    editrules: {required: true}
                },
                {label: 'Persentase Selisih',name: 'persen_selisih',width: 150, align: "right",editable: true,
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                }


                
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
            onSelectRow: function (rowid) {
                /*do something when selected*/
                var celValue = $('#grid-table').jqGrid('getCell', rowid, 'p_year_period_id'); 
                reloadChart(celValue);
                reloadChart2(celValue);

            },
            sortorder:'',
            pager: '#grid-pager',
            jsonReader: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }

                setTimeout(function(){
                  $("#grid-table").setSelection($("#grid-table").getDataIDs()[0],true);
                },500);

            },
            //memanggil controller jqgrid yang ada di controller read
            editurl: '<?php echo WS_JQGRID."pelaporan.t_target_realisasi_controller/read"; ?>',
            caption: "Daftar Target VS Realisasi"

        });

        jQuery('#grid-table').jqGrid('navGrid', '#grid-pager',
            {   //navbar options
                edit: false,
                editicon: 'fa fa-pencil blue bigger-120',
                add: false,
                addicon: 'fa fa-plus-circle purple bigger-120',
                del: false,
                delicon: 'fa fa-trash-o red bigger-120',
                search: true,
                searchicon: 'fa fa-search orange bigger-120',
                refresh: true,
                afterRefresh: function () {
                    // some code here
                    jQuery("#detailsPlaceholder").hide();
                },

                refreshicon: 'fa fa-refresh green bigger-120',
                view: false,
                viewicon: 'fa fa-search-plus grey bigger-120'
            },

            {
                // options for the Edit Dialog
                closeAfterEdit: true,
                closeOnEscape:true,
                recreateForm: true,
                serializeEditData: serializeJSON,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);

                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
                    return [true,"",response.responseText];
                }
            },
            
            {
                //new record form
                closeAfterAdd: false,
                clearAfterAdd : true,
                closeOnEscape:true,
                recreateForm: true,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                serializeEditData: serializeJSON,
                viewPagerButtons: false,
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);
                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }

                    $(".tinfo").html('<div class="ui-state-success">' + response.message + '</div>');
                    var tinfoel = $(".tinfo").show();
                    tinfoel.delay(3000).fadeOut();


                    return [true,"",response.responseText];
                }
            },
            {
                //delete record form
                serializeDelData: serializeJSON,
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    style_delete_form(form);

                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                onClick: function (e) {
                    //alert(1);
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
                    return [true,"",response.responseText];
                }
            },
            {
                //search form
                closeAfterSearch: false,
                recreateForm: true,
                afterShowSearch: function (e) {
                    var form = $(e[0]);
                    style_search_form(form);
                    form.closest('.ui-jqdialog').center();
                },
                afterRedraw: function () {
                    style_search_filters($(this));
                }
            },
            {
                //view record form
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                }
            }
        );

    });

    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );

    }

    function reloadChart(p_year_period_id) {
        $.getJSON( "<?php echo base_url('Target_realisasi/target_realisasi_tahun?p_year_period_id=')?>"+p_year_period_id, function( items ) {
                var target_amt = items[0][0];
                var realisasi_amt = items[0][1];
                var tahun = items[0][2];
                                Highcharts.setOptions({
                                        lang:{
                                                numericSymbols: [" Ribu"," Juta"," Milyar"," Triliun"," Biliun"," Seliun"]
                                        }
                                });
                $("#container").highcharts({
                                                chart: {
                                type: "column"
                        },
                        title: {
                                text: "Target vs Realisasi " + tahun
                        },
                        subtitle: {
                                text: "Bapenda Lombok Utara"
                        },
                        tooltip: {
                                
                        },
                        xAxis: {
                                categories: [tahun]
                        },
                        yAxis: {
                                title: {
                    text: ""
                }
                        },
                        plotOptions: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                        },
                        series: [
                        {showInLegend: true, name: "Target " + tahun, data: [target_amt]},
                        {showInLegend: true, name: "Realisasi " + tahun, data: [realisasi_amt]}
                        ]
                });
        });
    }

    function reloadChart2(p_year_period_id) {
        $.getJSON( "<?php echo base_url('Target_realisasi/t_target_realisasi_bulan_all?p_year_period_id=')?>"+p_year_period_id, function( items ) {
        //$.getJSON( "http://localhost/mpd/services/t_target_realisasi_bulan_all.php?p_year_period_id=28", function( items ) {
                var target_amount = [];
                var realisasi_amt = [];
                var vat_code = [];
                
                var jumlah = items.length;
                
                for(i = 0; i < jumlah; i++){
                        target_amount[i] = parseFloat(items[i][1]);
                        realisasi_amt[i] = parseFloat(items[i][2])+parseFloat(items[i][3])+parseFloat(items[i][4]);
                        vat_code[i] = items[i][0];
                }
                $("#container2").highcharts({
                        chart: {
                                type: "column"
                        },
                        title: {
                                text: "Target vs Realisasi Tahunan"
                        },
                        subtitle: {
                                text: "Bapenda Lombok Utara"
                        },
                        xAxis: {
                                categories: vat_code
                        },
                        yAxis: {
                                min: 0,
                                title: {
                                        text: ""
                                }
                        },
                        tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
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
                        {showInLegend: true, name: "Target", data: target_amount},
                        {showInLegend: true, name: "Realisasi", data: realisasi_amt}
                        ]
                });
        });
    }

    

</script>

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