<div id="modal_lov_bphtb_delete" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title"> HAPUS BPHTB</span>
                </div>
            </div>


            <!-- modal body -->
            <div class="modal-body">
                <form role="form" id="form_reject" name="form_reject" method="post" >
                    
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    
                    <div class="form-group">
                        <br>
                        <div class="col-xs-3">
                            <label>Alasan Hapus</label>
                        </div>
                        <div class="col-xs-9">
                            <textarea class="form-control required " rows="3" cols="50" id="alasan" name="desc"></textarea> 
                        </div>
                    </div>
                    <input type="hidden" class="form-control" readonly name="t_bphtb_registration_id" id="t_bphtb_registration_id">
                    <!-- <input type="hidden" id="form_submitter_back_summary"> -->
                    <!-- modal footer -->
                    <div class="modal-footer no-margin-top">
                        <div class="bootstrap-dialog-footer">

                            <div class="bootstrap-dialog-footer-buttons col-xs-7">                    
                                <br>
                                <button type="button" id="lov-btn-reject" onClick="HapusBphtb()" id="btn-reject" class="btn btn-sm btn-danger">Hapus</button>
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

    function HapusBphtb() {
        var t_bphtb_registration_id = $('#t_bphtb_registration_id').val();
        var alasan = $('#alasan').val();

        if(alasan == '' || t_bphtb_registration_id == ''){
            swal('Oopss','Alasan Harus Diisi !','error');
        }else{

            $.ajax({
                url: '<?php echo WS_JQGRID."transaksi.t_bphtb_delete_list_controller/hapusBphtb"; ?>',
                type: "POST",
                dataType: "json",
                data: {
                   t_bphtb_registration_id: t_bphtb_registration_id,
                   alasan:alasan
                },
                success: function (data) {
                    
                    swal("", data.message, "warning");
                    
                    if(data.success){
                        /*$('#btn-reject').remove();
                        $('#btn-reject-close').remove();

                        setTimeout(function(){
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            //loadContentWithParams( file_name , obj_summary_params );
                            if(data.message=="OK"){
                                swal('Informasi',data.message,'info');
                                loadContentWithParams("transaksi.t_bphtb_delete_list", {});
                            }
                        },3000);*/
                        $('#modal_lov_bphtb_delete').modal('hide');
                        if(data.message=="OK"){
                            $('#t_bphtb_registration_id').val(null);
                            $('#alasan').val(null);
                            swal('Informasi',data.message,'info');

                            $('#gview_grid-table').show();
                            jQuery(function($) {
                                var grid_selector = "#grid-table";

                                jQuery("#grid-table").jqGrid('setGridParam',{
                                    url: '<?php echo WS_JQGRID."transaksi.t_bphtb_delete_list_controller/read_data"; ?>',
                                    postData:{}
                                });
                                $("#grid-table").jqGrid("setCaption", "DAFTAR BPHTB");
                                $("#grid-table").trigger("reloadGrid");
                            });
                            //loadContentWithParams("transaksi.t_bphtb_delete_list", {});
                        }else{
                            swal('Oopss',data.message,'error');
                        } 
                        
                    }else{
                        swal({title: "Error!", text: data.message, html: true, type: "error"});
                    }                
                },
                error: function (xhr, status, error) {
                    swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                }
            });
        }
    }

    function modal_lov_bphtb_delete_show(t_bphtb_registration_id) {

        modal_lov_bphtb_delete_init(t_bphtb_registration_id);

        $("#modal_lov_bphtb_delete").modal({backdrop: 'static'});
    }

    function modal_lov_bphtb_delete_init(t_bphtb_registration_id) {

        $('#t_bphtb_registration_id').val(t_bphtb_registration_id);
        //$('#form_submitter_back_summary').val( JSON.stringify(form_submitter_back_summary) );

    }


    
</script>