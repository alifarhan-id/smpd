
<!--  Modal Ubah Register -->
<div id="modal_restore" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog" style="width:700px;">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title">Restore</span>
                </div>
            </div>

            <!-- modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="form-body">
                                <input type="hidden" name="t_vat_setllement_id" id="t_vat_setllement_id">
                                <input type="hidden" name="p_vat_type_id" id="p_vat_type_id">
                                <input type="hidden" name="npwd" id="npwd">
                                <input type="hidden" name="date_start_laporan" id="date_start_laporan">
                                <input type="hidden" name="date_end_laporan" id="date_end_laporan">
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">Alasan Restore</label>
                                    <div class="input-group col-md-4">
                                        <textarea type="text" class="form-control" name="alasan" id="alasan" />
                                    </div>
                                </div>
                                
                            </div>  
                        </div>       
                    </div>   
                </div>               
            </div>

            <!-- modal footer -->
            <div class="modal-footer no-margin-top">
                <div class="bootstrap-dialog-footer">
                    <div class="bootstrap-dialog-footer-buttons">
                        <button class="btn btn-sm green-jungle radius-4" onclick="restore($('#t_vat_setllement_id').val(), $('#alasan').val())">
                            <i class="ace-icon fa fa-check"></i>
                            Restore
                        </button>
                        <button class="btn btn-danger btn-sm radius-4" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.end modal register-->
<script>
    function modal_restore_show(items){
        //alert (items[1]);
        $("#modal_restore").modal("toggle"); 
        $('#t_vat_setllement_id').val(items[0]);
        $('#p_vat_type_id').val(items[1]);
        $('#npwd').val(items[2]);
        $('#date_start_laporan').val(items[3]);
        $('#date_end_laporan').val(items[4]);


    }

    function restore($t_vat_setllement_id, $alasan){
        var t_vat_setllement_id = $('#t_vat_setllement_id').val();
        var alasan              = $('#alasan').val();
       
        var var_url = "<?php echo WS_JQGRID . "transaksi.t_restore_trans_controller/Restore/?"; ?>";
            var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            var_url += '&t_vat_setllement_id='+t_vat_setllement_id;
            var_url += '&alasan='+alasan;
            //alert(var_url);

        $.getJSON(var_url, function( items ) {
            swal('Informasi',items.rows.o_result_msg,'info'); 
            $("#modal_restore").modal("toggle");

            var p_vat_type_id       = $('#p_vat_type_id').val();
            var npwd                = $('#npwd').val();
            var date_start_laporan  = $('#date_start_laporan').val();
            var date_end_laporan    = $('#date_end_laporan').val();
            //alert(filter);
            $('#alasan').val('');
            
            $('#grid-table-restore').jqGrid('setGridParam', {
                url: '<?php echo WS_JQGRID . "transaksi.t_restore_trans_controller/read"; ?>',
                postData: {p_vat_type_id: p_vat_type_id, npwd : npwd, date_start_laporan : date_start_laporan, date_end_laporan:date_end_laporan}
            });

            $("#grid-table-restore").trigger("reloadGrid");
            })


    }

    
</script>