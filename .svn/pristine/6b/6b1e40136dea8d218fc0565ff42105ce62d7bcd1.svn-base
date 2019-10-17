<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Cetak SKPD Duplikat</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">                    
                    <span class="caption-subject font-blue bold uppercase"> Cetak SKPD Duplikat
                    </span>
                </div>
            </div>
            <!-- CONTENT  value="2015-09-01" -->
            <div class="form-body">
                <div class="row col-md-offset-3">                    
                    <label class="control-label col-md-2">Nama WP/ NPWD / No Kohir :</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="s_keyword" id="s_keyword">                 
                        </div>
                    </div>
                    <button class="btn btn-primary" type="button" onclick="toTampil()">Cari</button>
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="space-4"></div>  
<div class="tab-content no-border" id="table">
    <div class="row">
        <div class="col-xs-12">
            <div id="gbox_grid-table" class="ui-jqgrid">
                <div id="gview_grid-table" class="ui-jqgrid-view table-responsive" role="grid">
                    <table id="grid-table"></table>
                    <div id="grid-pager"></div>
                </div>
            </div>            
        </div>
    </div>
</div>
<div class="space-4"></div>  


<script type="text/javascript">
    var s_keyword = $('#s_keyword').val();
    $('#table').css('display', 'none');
    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_vat_setllement_cetak_skpd_controller/read"; ?>',
            //postData: { s_keyword :s_keyword },
            datatype: "json",
            mtype: "POST",
            colModel: [

                {label: 'Nama WP',name: 'wp_name',width: 220, align: "left"},
                {label: 'NPWPD',name: 'npwd',width: 120, align: "left"},
                {label: 'Periode',name: 'finance_period_code',width: 120, align: "left"},
                {label: 'Jenis Ketetapan',name: 'sett_code',width: 120, align: "left"},
                {label: 'Total Transaksi',name: 'total_trans_amount',width: 120, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'Total Pajak',name: 'total_vat_amount',width: 120, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'Denda',name: 'total_penalty_amount',width: 80, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'No Kohir',name: 'no_kohir',width: 80, align: "right"},
                {name: 'Cetak SKPD',width: 100, align: "center",
                    formatter:function(cellvalue, options, rowObject) {

                        var t_vat_setllement_id = rowObject['t_vat_setllement_id'];
                        
                        return '<button class="btn btn-xs btn-danger" type="button" onclick="showCetak('+t_vat_setllement_id+')">Cetak</button>';

                    }
                }               

               
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 5,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/
                

            },
            sortorder:'',
            pager: '#grid-pager',
            jsonReader: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            
            
            caption: "DAFTAR SKPD (Pelaporan Pajak)"

        });

        jQuery('#grid-table').jqGrid('navGrid', '#grid-pager',
            {   //navbar options
                edit: false,
                editicon: 'fa fa-pencil blue bigger-120',
                add: false,
                addicon: 'fa fa-plus-circle purple bigger-120',
                del: false,
                delicon: 'fa fa-trash-o red bigger-120',
                search: false,
                searchicon: 'fa fa-search orange bigger-120',
                refresh: false,
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
                
                editData : {
                    t_vat_setllement_id: function() {
                        return <?php echo $this->input->post('t_vat_setllement_id'); ?>;
                    }
                },
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
</script>

<script type="text/javascript">
    function toTampil(){
        var s_keyword = $('#s_keyword').val();
        
        if(s_keyword == ''){
            swal ( "Oopss" ,  "Kolom Pencarian Harus Diisi!" ,  "error" );
            return;
        }else{
            $('#table').css('display', '');
            jQuery(function($) {
                var grid_selector = "#grid-table";

                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."transaksi.t_vat_setllement_cetak_skpd_controller/read"; ?>',
                    postData: {s_keyword:s_keyword}
                });
                $("#grid-table").jqGrid("setCaption", "DAFTAR SKPD (Pelaporan Pajak)");
                $("#grid-table").trigger("reloadGrid");
            });
        } 
    }    
</script>

<script type="text/javascript">
    function showCetak(t_vat_setllement_id){
        var url = "<?php echo base_url(); ?>"+"cetak_formulir_skpd/pageCetak?";
        url += "t_vat_setllement_id=" + t_vat_setllement_id;

        openInNewTab(url);
        
    }

    function openInNewTab(url) {       
      window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');

    }
</script>