<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Message Inbox</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <input type="hidden" name="t_customer_id" id="t_customer_id">
        <input type="hidden" name="t_cust_account_id" id="t_cust_account_id">
        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-12">
                    <table id="grid-table"></table>
                    <div id="grid-pager"></div>
                </div>
            </div>
            <div class="space-4"></div>  
            
        </div>
    </div>
</div>

<?php $this->load->view('lov/lov_reply_inbox_wp'); ?>

<script>

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_message_inbox_controller/read"; ?>',
            //postData: { t_customer_id : $('#t_customer_id').val() },
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_message_inbox_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},       
                {label: 'Diterima',name: 'creation_date',width: 150, align: "left"},
                {label: 'Pengirim',name: 'wp_name',width: 200, align: "left"},
                {label: 'Jenis Pesan',name: 'message_type',width: 200, align: "left"},
                {label: 'Status',name: 'status_view',width: 200, align: "left"},
                {label: 'Isi',name: 'message_body',width: 200, align: "left", hidden: true}
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
                //alert(rowid);
                setDataInbox(rowid);

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
            caption: "Daftar Inbox"

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
                
                editData : {},
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

    function setDataInbox(rowid){
        var wp_name = $('#grid-table').jqGrid('getCell', rowid, 'wp_name');
        var message_type = $('#grid-table').jqGrid('getCell', rowid, 'message_type');
        var message_body = $('#grid-table').jqGrid('getCell', rowid, 'message_body');
        message_body = message_body.replace(".<br>", ".\n");
        message_body = message_body.replace("<br>", "\n");


        $('#t_inbox_id').val(rowid);
        $('#message_type').val(message_type);
        $('#wp_name').val(wp_name);
        $('#message_body').val(message_body);
        

    }

    function deleteData(id){

        var var_url = "<?php echo WS_JQGRID."transaksi.t_message_inbox_controller/hapus/?";?>";
        var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        var_url += "&t_message_inbox_id=" + id;

        swal({
          title: "Konfirmasi",
          text: "Apa Anda yakin untuk menghapus data yang dipilih ? ",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya, Hapus!",
          cancelButtonText:"Batal",
          closeOnConfirm: false,
          showLoaderOnConfirm: true
        },
        function(){
          //swal("Deleted!", "Your imaginary file has been deleted.", "success");
            setTimeout(function(){
                $.getJSON(var_url, function( items ) {
                    if(items.rows==true){
                        swal("Informasi", "Data Telah Dihapus", "info");
                        loadContentWithParams("transaksi.t_message_inbox_bphtb", {});
                        return;
                    }else{
                        swal("Peringatan", "Data Gagal Dihapus", "error");
                        loadContentWithParams("transaksi.t_message_inbox_bphtb", {});
                        return;
                    }
                    
                });
            }, 2000);
        });
    }

</script>
<br>
<label class="control-label col-md-2"><b>Informasi Inbox</b></label>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-3">Jenis Pesan</label>                
                        <div class="input-group col-md-5">
                            <input type="hidden" class="form-control" name="t_inbox_id" id="t_inbox_id" readonly="true">      
                            <input type="text" class="form-control" name="message_type" id="message_type" readonly="true">                 
                        </div>
                    
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Pengirim</label>
                        <div class="input-group col-md-5">
                            <input type="text" class="form-control" name="wp_name" id="wp_name" readonly="true">                 
                        </div>                 
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Isi Pesan</label>
                    <div class="input-group col-md-7">
                        <textarea class="form-control" name="message_body" id="message_body" readonly="true" rows="5"></textarea>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <div class="col-sm-offset-3">
                        <button class="btn btn-success" type="button" id="btn-add" onclick="showLovReply($('#t_inbox_id').val())">Balas</button>
                        <button class="btn btn-danger" type="button" id="btn-del" onclick="deleteData($('#t_inbox_id').val())">Hapus</button>
                    </div>
                 
                </div> 
            </div>
        </div>       
    </div>   
</div>

<script type="text/javascript">
    function showLovReply(id){
        modal_ubah_flag_show_wp(id);
    }
    
</script>
