<div id="modal_lov_log" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title"> LOG AKTIFITAS </span>
                </div>
            </div>

            <!-- modal body -->
            <div class="modal-body">
                <form role="form" name="form_log" method="post" enctype="multipart/form-data"
                  accept-charset="utf-8">
                    <input type="hidden" id="log_params">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                    <div class="form-group">
                        <div class="col-xs-3">
                            <label>Aktifitas</label>
                        </div>
                        <div class="col-xs-9">
                            <input class="form-control required " type="text" id="activity" name="activity"/>
                        </div>
                    </div>
                    <br>    
                    <div class="form-group">
                        <br>
                        <div class="col-xs-3">
                            <label>Deskripsi</label>
                        </div>
                        <div class="col-xs-9">
                            <textarea class="form-control required" rows="3" cols="50" id="desc_log" name="desc_log"></textarea> 
                        </div>
                    </div>
                </form>
            </div>

            
            <!-- modal footer -->
            <div class="modal-footer no-margin-top">
                <div class="bootstrap-dialog-footer">

                    <div class="bootstrap-dialog-footer-buttons col-xs-7">                    
                        <br>
                        <button type="submit" class="btn btn-sm btn-primary" id="btn_submit">Submit</button>
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.end modal -->

<script>
    

    $(function() {
        /* submit */
        $('#btn_submit').on('click', function() {
            var log_params = $('#log_params').val();           
            var desc_log = $('textarea#desc_log').val();           
            var activity = $('#activity').val();  
            if(!activity){
                alert('Aktifitas Belum Diisi');
                return false;
            }

            if(!desc_log){
                alert('Deskripsi Belum Diisi');
                return false;
            }

            $.ajax({
                type: 'POST',
                datatype: "json",
                url: '<?php echo WS_JQGRID."workflow.wf_controller/save_log"; ?>',
                data: { params : log_params, desc_log: desc_log, activity: activity },
                timeout: 10000,
                success: function(data) {  
                    var response = JSON.parse(data);
                    if(response.success) {
                        $('#grid-table').trigger( 'reloadGrid' );
                        $('#modal_lov_log').modal('hide');
                    }else{
                        swal("", data.message, "warning");
                    }
                   
                }
            });
            return false;
        });
    });

    function modal_lov_log_show(params_log) {
        modal_lov_log_init(params_log);
        $("#modal_lov_log").modal({backdrop: 'static'});
    }

    function modal_lov_log_init(params_log) {

        $('#log_params').val( JSON.stringify(params_log) );
        $('#desc_log').val('');
        $('#activity').val('');

    }


    
</script>