<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>CETAK ULANG DOKUMEN PENDAFTARAN</span>
        </li>
    </ul> 
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-2">NPWPD/Nama WP/Objek Pajak</label>
                        <div class="input-group col-md-3">
                            <input type="text" class="form-control" name="s_keyword" id="s_keyword">  
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Tanggal Dokumen</label>
                        <div class="input-group col-md-3">
                            <input type="text" class="form-control" name="tgl_doc" id="tgl_doc">  
                        </div>
                </div>
                <div class="space-4"></div>
                <div class="row col-md-offset-2">
                    <button class="btn btn-success" type="button" id="btn-search" onclick="showData()">Tampilkan Data</button>
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
                    <div id="grid-pager"></div>               
                </div>
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
$ ("#gview_grid-table-history").hide();

   
jQuery(function ($) {
    var grid_selector = "#grid-table-history";
    jQuery("#grid-table-history").jqGrid({
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID',name: 't_vat_registration_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID',name: 't_customer_order_id', width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'ID',name: 't_cust_account_id', width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'NPWPD',name: 'npwpd',width: 160, align: "center"},
                {label: 'Nama',name: 'wp_name',width: 250, align: "left"},
                {label: 'Alamat WP',name: 'wp_address_name',width: 250, align: "left"},
                {label: 'Objek Pajak',name: 'company_brand',width: 250, align: "left"},
                {label: 'Alamat',name: 'brand_address_name',width: 250, align: "left"},
                {name: 'Plihan Cetak Dokumen',width: 1500, align: "center",
                    formatter:function(cellvalue, options, rowObject) {
                        var val = rowObject['t_customer_order_id'];
                        var tgl = $('#tgl_doc').val();
                        var t_cust_account_id = rowObject['t_cust_account_id'];

                        var url1 = '<?php echo base_url(); ?>'+'cetak_berita_acara_pemeriksaan_pdf/pageCetak?t_customer_order_id='+val;
                        var url2 = '<?php echo base_url(); ?>'+'nota_dinas_pdf/pageCetak?CURR_DOC_ID='+val;
                        var url3 = '<?php echo base_url(); ?>'+'cetak_surat_pengukuhan_pdf/pageCetak?CURR_DOC_ID='+val;
                        var url4 = '<?php echo base_url(); ?>'+'cetak_formulir_tanda_terima_pengukuhan_pdf/save_pdf?t_customer_order_id='+val+'&tgl='+tgl;
                        var url5 = '<?php echo base_url(); ?>'+'cetak_kartu_npwpd/pageCetak?t_customer_order_id='+val;
                        var url6 = '<?php echo base_url(); ?>'+'cetak_kartu_npwpd_v2/pageCetak?t_customer_order_id='+val+'&t_cust_account_id='+t_cust_account_id;
                        var url7 = '<?php echo base_url(); ?>'+'cetak_surat_pengukuhan_npwpd_jabatan/pageCetak?CURR_DOC_ID='+val+'&tgl='+tgl;
                        var url8 = '<?php echo base_url(); ?>'+'cetak_form_pemutakhiran_data_npwpd_jabatan/pageCetak?t_customer_order_id='+val+'&tgl='+tgl;



                        var btn1 = '<a class="btn btn-danger btn-xs" href="#" onclick="PopupCenter(\''+url1+'\',\'BAP\',500,500);"><i class="fa fa-print"></i>Cetak BAP</a>';
                        var btn2 = ' <a class="btn btn-danger btn-xs" href="#" onclick="PopupCenter(\''+url2+'\',\'Nota Dinas\',500,500);"><i class="fa fa-print"></i>Cetak Nota Dinas</a>'
                        var btn3 = ' <a class="btn btn-danger btn-xs" href="#" onclick="PopupCenter(\''+url3+'\',\'Pengukuhan\',500,500);"><i class="fa fa-print"></i>Cetak Pengukuhan</a>';
                        var btn4 = ' <a class="btn btn-danger btn-xs" href="#" onclick="PopupCenter(\''+url4+'\',\'Tanda Terima\',500,500);"><i class="fa fa-print"></i>Cetak Tanda Terima</a>'
                        var btn5 = ' <a class="btn btn-danger btn-xs" href="#" onclick="PopupCenter(\''+url5+'\',\'Kartu NPWPD\',500,500);"><i class="fa fa-print"></i>Cetak Kartu NPWPD</a>';
                        var btn6 = ' <a class="btn btn-danger btn-xs" href="#" onclick="PopupCenter(\''+url6+'\',\'Kartu NPWPD V2\',500,500);"><i class="fa fa-print"></i>Cetak Kartu NPWPD V2</a>'
                        var btn7 = ' <a class="btn btn-danger btn-xs" href="#" onclick="PopupCenter(\''+url7+'\',\'Pengukuhan NPWPD Jabatan\',500,500);"><i class="fa fa-print"></i>Cetak Pengukuhan NPWPD Jabatan</a>';
                        var btn8 = ' <a class="btn btn-danger btn-xs" href="#" onclick="PopupCenter(\''+url8+'\',\'Form Pemutakhiran Data\',500,500);"><i class="fa fa-print"></i>Cetak Form Pemutakhiran Data</a>'
                        return btn1 + btn2 + btn3 + btn4 + btn5 + btn6 + btn7 + btn8;


                    }
                }
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 20,
            rowList: [10, 20, 50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
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
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }

            },
            caption: " DAFTAR PENDAFTARAN WP "
        });

        jQuery('#grid-table-history').jqGrid('navGrid', '#grid-pager',
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

function showData(){
    $("#gview_grid-table-history").show();
      

    var s_keyword = $('#s_keyword').val();
    var tgl_doc = $('#tgl_doc').val();



        jQuery(function($) {
        var grid_selector = "#grid-table-history";
        //var pager_selector = "#grid-pager-bpps2";

            jQuery("#grid-table-history").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."pelaporan.t_cetak_ulang_dokumen_pendaftaran_controller/readData"; ?>',
                postData: {
                            s_keyword:s_keyword,
                            tgl_doc:tgl_doc
                        }

            });
            $("#grid-table-history").trigger("reloadGrid");
        });

        //alert(s_keyword); 
}

</script>

<script> 
    $('#tgl_doc').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });
    $('#tgl_penerimaan').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'yyyy-mm-dd',
      todayBtn: 'linked',
      todayHighlight: true
    });
    $('#tgl_penerimaan_last').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'yyyy-mm-dd',
      todayBtn: 'linked',
      todayHighlight: true
    });
</script>


<script>
    function responsive_jqgrid(grid_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid('setGridWidth', $(".form-body").width());
        //$(pager_selector).jqGrid('setGridWidth', parent_column.width());

    }


</script>
