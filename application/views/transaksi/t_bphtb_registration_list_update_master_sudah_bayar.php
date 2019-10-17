<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Daftar BPHTB Sudah Bayar</span>
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
                    <i class=" icon-list font-blue"></i>
                    <span class="caption-subject font-blue bold uppercase"> Daftar BPHTB Sudah Bayar
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <button class="btn btn-success" id="detail-bphtb" disabled=""> <i class="fa fa-newspaper-o"></i>Detail BPHTB</button>
                

                <div class="row">
                    <div class="col-md-12 ">
                        <table id="grid-table"></table>
                        <div id="grid-pager"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    /*$('#add-bphtb').on('click', function(event){
        loadContentWithParams('transaksi.t_bphtb_registration', {FLAG:'Add',id:0});
    });*/

    $('#detail-bphtb').on('click', function(event){
        var grid = $('#grid-table');
        var rowid = grid.jqGrid ('getGridParam', 'selrow');
        var id = grid.jqGrid ('getCell', rowid, 't_bphtb_registration_id');
        //alert(id);
        loadContentWithParams('transaksi.t_bphtb_registration_master_plus', {FLAG:'Sudah Bayar',id:id});

    });


    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_bphtb_registration_list_update_master_controller/readSudahBayar"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_bphtb_registration_id',  width: 5, sorttype: 'number', hidden: true},
				{name: 'Cetak Kuitansi',width: 5, align: "center",
                    formatter:function(cellvalue, options, rowObject) {
                        var val = rowObject['registration_no'];
                        var url = '<?php echo base_url(); ?>'+'cetak_duplikat_kwitansi_bphtb/save_pdf?registration_no='+val;
                        return '<a class="btn btn-primary btn-xs" href="#" onclick="PopupCenter(\''+url+'\',\'Cetak Kuitansi BPHTB\',500,500);"><i class="fa fa-print"></i>Cetak Kuitansi</a>';

                    }
                },
				{name: 'Cetak Verifikasi',width: 5, align: "center",
                    formatter:function(cellvalue, options, rowObject) {
                        var val = rowObject['t_bphtb_registration_id'];
                        var url = '<?php echo base_url(); ?>'+'cetak_rep_bphtb/pageCetak?t_bphtb_registration_id='+val;
                        return '<a class="btn btn-success btn-xs" href="#" onclick="PopupCenter(\''+url+'\',\'Cetak Verifikasi\',500,500);"><i class="fa fa-print"></i>Cetak Verifikasi</a>';

                    }
                },
                {label: 'Nama Wajib Pajak', name: 'wp_name',  width: 10, sorttype: 'text', hidden: false},
                {label: 'No Order', name: 'order_no',  width: 7, sorttype: 'text', hidden: true},
				{label: 'No Registrasi', name: 'registration_no',  width: 7, sorttype: 'text', hidden: false},
				{label: 'No Kwuitansi', name: 'receipt_no',  width: 7, sorttype: 'text', hidden: false}
               
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
                $('#detail-bphtb').prop( "disabled", false );
                

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
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '<?php echo WS_JQGRID."transaksi.t_bphtb_registration_list_update_master_controller/readSudahBayar"; ?>',
            caption: "Daftar BPHTB Sudah Bayar"

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

</script>