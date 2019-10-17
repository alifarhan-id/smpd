<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>DATA GEOLOGIS</span>
        </li> 
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                            <i class="blue"></i>
                            <strong> DATA GEOLOGIS </strong>
                        </a>
                    </li>
                    <li class="">
                        <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                            <i class="blue"></i>
                            <strong> DAFTAR FOTO OBJEK</strong>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-1"> NPWPD :
                        </label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <input type="text" class="form-control" name="s_keyword" id="s_keyword">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" id="search">
                                    Cari
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="t_cust_account_id" id="t_cust_account_id">
                <div class="row">
                     <div class="col-xs-12">
                        <div id="gbox_grid-table" class="ui-jqgrid">
                            <div id="gview_grid-table" class="" role="grid">
                                <table id="grid-table"></table>
                                <div id="grid-pager"></div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$("#tab-2").on("click", function(event) {

    event.stopPropagation();
    var grid = $('#grid-table');

    t_cust_account_id = grid.jqGrid ('getGridParam', 'selrow');
    id_cust_account = grid.jqGrid ('getCell', t_cust_account_id, 't_cust_account_id');

    //alert(" t_cust_account_id = "+id_cust_account);

    if(t_cust_account_id == null) {
        swal('Informasi','Silahkan pilih salah satu Customer','info');
        return false;
    }

    loadContentWithParams("data_master.t_pic_object", {
        t_cust_account_id: t_cust_account_id,
        
    });
});
</script>
<script>
    jQuery(function ($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."data_master.t_pic_gis_controller/read_data"; ?>',
            postData:{s_keyword : $('#s_keyword').val()},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Cust', name: 't_cust_account_id', key: true, width: 5, sorttype: 'number', editable: false, hidden: true},
                {label: 'NPWPD',name: 'npwd',width: 130,sorttype: 'text'},
                {label: 'Merk Dagang',name: 'company_brand',width: 250,sorttype: 'number'},
                {label: 'Alamat Merk Dagang',name: 'alamat',width: 300,sorttype: 'text'},
                {label: 'Tgl Registrasi',name: 'registration_date',width: 170,sorttype: 'text'},
                {label: 'Jenis Pajak',name: 'vat_code',width: 160,sorttype: 'text'}
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 10,
            rowList: [10, 20, 50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            pager: '#grid-pager',
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }

            },
            caption: "DATA CUSTOMER ACCOUNT"

        });
    });


    $('#search').on('click', function() {
        showData();
    });

    function showData(){
        jQuery(function($) {
            var grid_selector = "#grid-table";

            jQuery("#grid-table").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."data_master.t_pic_gis_controller/read_data"; ?>',
                postData:{s_keyword : $('#s_keyword').val()}
            });
            $("#grid-table").jqGrid("setCaption", "DATA CUSTOMER ACCOUNT");
            $("#grid-table").trigger("reloadGrid");
        });
    }

</script>