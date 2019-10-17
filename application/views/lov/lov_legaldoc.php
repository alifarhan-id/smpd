<div id="modal_lov_legaldoc" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title"> DOKUMEN PENDUKUNG </span>
                </div>
            </div>

            <!-- modal body -->
            <div class="modal-body">
                <form role="form" id="form_legal" name="form_legal" method="post" enctype="multipart/form-data"
                  accept-charset="utf-8">
                    <input type="hidden" id="legaldoc_params" name="legaldoc_params">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="form-group">
                                <div class="col-xs-3">
                                    <label>Jenis Dokumen</label>
                                </div>
                                <div class="col-xs-7">
                                    <select class="form-control" name="p_legal_doc_type_id" id="p_legal_doc_type_id"></select>
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <br>
                                <div class="col-xs-3">
                                    <label>File Upload</label>
                                </div>
                                <div class="col-xs-9">
                                    <input type="file" id="filename" name="filename"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <br>
                                <div class="col-xs-3">
                                    <label>Description</label>
                                </div>
                                <div class="col-xs-9">
                                    <textarea class="form-control" rows="3" cols="50" id="desc" name="desc"></textarea> 
                                </div>
                            </div>
                    <!-- modal footer -->
                    <div class="modal-footer no-margin-top">
                        <div class="bootstrap-dialog-footer">

                            <div class="bootstrap-dialog-footer-buttons col-xs-7">                    
                                <br>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.end modal -->

<script>    

    $(function() {
        /* submit */
        $("#form_legal").on('submit', (function (e) {
            e.preventDefault();   
            var data = new FormData(this);
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo WS_JQGRID."workflow.wf_controller/save_legaldoc"; ?>',
                data: data,
                timeout: 10000,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false, 
                success: function(data) {
                    if(data.success) {
                        // $('#grid-legal').bootgrid('reload');
                        $('#grid-table').trigger( 'reloadGrid' );
                        $('#p_legal_doc_type_id').val(1);
                        $('#filename').val('');
                        $('#desc').val('');
                        $('#modal_lov_legaldoc').modal('hide');
                    }else{
                        swal("", data.message, "warning");
                    }
                   
                }
            });
            return false;
        }));
        
    });

    function modal_lov_legaldoc_show(params_legaldoc) {
        modal_lov_legaldoc_init(params_legaldoc);
        $("#modal_lov_legaldoc").modal({backdrop: 'static'});
    }

    function modal_lov_legaldoc_init(params_legaldoc) {

        $('#legaldoc_params').val( JSON.stringify(params_legaldoc) );
        $('#p_legal_doc_type_id').val(1);
        $('#filename').val('');
        $('#desc').val('');

        /*init status dokumen wf*/
        $.ajax({
            type: 'POST',
            datatype: "json",
            url: '<?php echo WS_JQGRID."workflow.wf_controller/doc_type"; ?>',
            timeout: 10000,
            success: function(data) {
                var response = JSON.parse(data);
                $("#p_legal_doc_type_id").html( response.opt_status );
            }
        });

    }


    
</script>