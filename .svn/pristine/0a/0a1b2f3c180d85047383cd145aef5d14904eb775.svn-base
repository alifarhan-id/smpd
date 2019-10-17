<div id="modal_lov_reject" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title"> REJECT TRANSAKSI </span>
                </div>
            </div>


            <!-- modal body -->
            <div class="modal-body">
                <form role="form" id="form_reject" name="form_reject" method="post" >
                    
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    
                    <div class="form-group">
                        <br>
                        <div class="col-xs-3">
                            <label>Alasan Reject</label>
                        </div>
                        <div class="col-xs-9">
                            <textarea class="form-control" rows="3" cols="50" id="alasan" name="desc"></textarea> 
                        </div>
                    </div>
                    <input type="hidden" class="form-control" readonly name="t_vat_setllement_id" id="t_vat_setllement_id">
                    <input type="hidden" id="form_submitter_back_summary">
                    <!-- modal footer -->
                    <div class="modal-footer no-margin-top">
                        <div class="bootstrap-dialog-footer">

                            <div class="bootstrap-dialog-footer-buttons col-xs-7">                    
                                <br>
                                <button type="button" id="lov-btn-reject" onClick="rejectForm()" id="btn-reject" class="btn btn-sm btn-primary">Reject</button>
                                <button type="button" class="btn btn-sm btn-default" id="btn-reject-close" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.end modal -->

<script>    

    

    function rejectForm() {
        var t_vat_setllement_id = $('#t_vat_setllement_id').val();
        var alasan = $('#alasan').val();

        $.ajax({
            url: '<?php echo WS_JQGRID."workflow.wf_controller/reject_transaksi"; ?>',
            type: "POST",
            dataType: "json",
            data: {
               t_vat_setllement_id: t_vat_setllement_id,
               alasan:alasan
            },
            success: function (data) {
                
                swal("", data.message, "warning");
                
                if(data.success){
                    var obj_summary_params = JSON.parse( $('#form_submitter_back_summary').val() );
                    var file_name = obj_summary_params.FSUMMARY;
                    //loadContentWithParams( file_name , obj_summary_params );
                    delete obj_summary_params.FSUMMARY;
                    $('#btn-reject').remove();
                    $('#btn-reject-close').remove();

                    setTimeout(function(){
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        loadContentWithParams( file_name , obj_summary_params );
                    },3000);
                    
                }                   
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
        });
    }

    function modal_lov_reject_show(t_vat_setllement_id,form_submitter_back_summary) {

        modal_lov_reject_init(t_vat_setllement_id,form_submitter_back_summary);

        $("#modal_lov_reject").modal({backdrop: 'static'});
    }

    function modal_lov_reject_init(t_vat_setllement_id,form_submitter_back_summary) {

        $('#t_vat_setllement_id').val(t_vat_setllement_id);
        $('#form_submitter_back_summary').val( JSON.stringify(form_submitter_back_summary) );

    }


    
</script>