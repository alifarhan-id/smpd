<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Migrasi Data Tuutap</span>
        </li>
    </ul>
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">                    
                    <span class="caption-subject font-blue bold uppercase"> Migrasi Data Tuutap
                    </span>
                </div>
            </div>
            <!-- CONTENT  value="2015-09-01" -->
            <div class="form-body">
                <div class="row col-md-offset-2">                    
                    <label class="control-label col-md-2">NPWD :</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="npwd" id="npwd">                 
                        </div>
                    </div>
                    <label class="control-label col-md-2">Tahun :</label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control numberformat" name="tahun" id="tahun" maxlength="4">                 
                        </div>
                    </div>
                    <button class="btn btn-primary" type="button" onclick="toTampil()">Cari</button>
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="tab-content no-border" id="table">
    <div class="row">
        <<div class="col-xs-12">
            <div id="gbox_grid-table" class="ui-jqgrid">
                <div id="gview_grid-table" class="ui-jqgrid-view table-responsive" role="grid">
                    <table id="grid-table"></table>
                    <div id="grid-pager"></div>
                </div>
            </div>            
        </div>
    </div>
    <div class="space-4"></div>  
    
</div>

<script type="text/javascript">
    $(".numberformat").number( true, 0 , '','');
    $(".numberformat").css("text-align", "left");

    var npwd 	= $('#npwd').val();
    var tahun   = $('#tahun').val();

    $('#table').css('display', 'none');
    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_restore_tuutap_controller/read"; ?>',
            //postData: { s_keyword :s_keyword },
            datatype: "json",
            mtype: "POST",
            colModel: [
            	{label: 'NPWPD',name: 'npwpd_gab',width: 120, align: "left"},
                {label: 'Nama',name: 'judul_gab',width: 100, align: "left"},
                {label: 'Tahun',name: 'periode_gab',width: 70, align: "left"},
                {label: 'Bulan',width: 180, align: "left",
                	formatter:function(cellvalue, options, rowObject) {

                        var bulan_text 	= rowObject['bulan_text'];
                        var thn_bln 	= rowObject['thn_bln'];
                        
                        return '<div>'+bulan_text+' ('+thn_bln+')</div>';

                    }
            	},
                {label: 'Tanggal Penetapan',name: 'tanggal_tap',width: 150, align: "left"},
                {label: 'Jumlah',name: 'jumlah_gab',width: 100, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'No Kohir',name: 'no_kohir',width: 100, align: "right"},
                {name: 'Cetak SKPD',width: 200, align: "center",
                    formatter:function(cellvalue, options, rowObject) {

                        var npwpd_gab 	= rowObject['npwpd_gab'];
                        var periode_gab = rowObject['periode_gab'];
                        var thn_bln 	= rowObject['thn_bln'];
                        var no_kohir 	= rowObject['no_kohir'];
                        
                        return '<button class="btn btn-xs btn-primary" type="button" onclick="doMigration(\''+npwpd_gab+'\',\''+periode_gab+'\',\''+thn_bln+'\',\''+no_kohir+'\')">Migrasikan Data</button>';

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
            
            
            caption: "DAFTAR TUUTAP"

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
        var npwd  = $('#npwd').val();
        var tahun = $('#tahun').val();
        
        if(npwd == ''){
            swal ( "Oopss" ,  "Kolom NPWPD Harus Diisi!" ,  "error" );
            return;
        }else{
            $('#table').css('display', '');
            jQuery(function($) {
                var grid_selector = "#grid-table";

                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."transaksi.t_restore_tuutap_controller/read"; ?>',
                    postData: {npwd:npwd, tahun:tahun}
                });
                $("#grid-table").jqGrid("setCaption", "DAFTAR TUUTAP");
                $("#grid-table").trigger("reloadGrid");
            });
        } 
    } 

    function doMigration(npwpd_gab,periode_gab,thn_bln,no_kohir){
    	var npwd     = $('#npwd').val();        
        var tahun    = $('#tahun').val();

        //alert(npwpd_gab+","+periode_gab+","+thn_bln+","+no_kohir);return;

    	swal({
           title: 'Apakah anda yakin untuk migrasikan data yang dipilih?',
              type: 'info',
              html: true,
              text: 'Anda Tidak Akan Bisa Mengembalikan Aksi Ini!',
             showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya",
          cancelButtonText: "Tidak",
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger'
        },
        function(){
            $.ajax({
                    url: '<?php echo WS_JQGRID."transaksi.t_restore_tuutap_controller/doMigration"; ?>',
                    type: "POST",
                    data: {npwpd_gab: npwpd_gab, periode_gab:periode_gab, thn_bln:thn_bln, no_kohir:no_kohir},
                    success: function (data) {
                        if(data.result == 1){
                            //alert('anggi//');return;

                            //swal('BPHTB telah diverifikasi dengan nomor : '+data.result);
                            swal({
                              position: 'center',
                              type: 'success',
                              title: 'Migrasi Data Berhasil',
                              showConfirmButton: false,
                              timer: 800
                            });

                            $('#table').css('display', '');
                            jQuery(function($) {
                                var grid_selector = "#grid-table";

                                jQuery("#grid-table").jqGrid('setGridParam',{
                                    url: '<?php echo WS_JQGRID."transaksi.t_restore_tuutap_controller/read"; ?>',
                                    postData: {npwd:npwd,
                                                tahun:tahun}
                                });
                                $("#grid-table").jqGrid("setCaption", "DAFTAR TUUTAP");
                                $("#grid-table").trigger("reloadGrid");
                            });

                            
                        }else{
                            swal({title: "Error!", text: 'Maaf, Gagal Migrasikan Data.', html: true, type: "error"});
                        }
                        // console.log(dt.product_name);
                    },
                    error: function (xhr, status, error) {
                        swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                    }
                });
           
        });
    }   
</script>
