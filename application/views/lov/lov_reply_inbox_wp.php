<!-- Modal Hapus Transaksi -->
<div id="modal_hapus_trans" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog" style="width:700px;">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title">Balas Inbox</span>
                </div>
            </div>

            <!-- modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="form-body">
                                <div class="row">
                                    <input type="hidden" name="t_message_inbox_id" id="t_message_inbox_id">
                                    <input type="hidden" name="t_ppat_id" id="t_ppat_id">
                                    <label class="control-label col-md-3">Jenis Pesan</label>
                                    <div class="input-group col-md-5">
                                            <div id="messType"></div>
                                    </div>
                                </div>
                                <div class="space-2"></div>
                                <div class="row">
                                    <input type="hidden" name="t_bphtb_registration_id" id="t_bphtb_registration_id">
                                    <label class="control-label col-md-3">Isi Pesan</label>
                                    <div class="input-group col-md-7">
                                        <textarea rows="5" class="form-control required" name="message_reply" id="message_reply"></textarea> 
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
                        <button class="btn btn-sm green-jungle radius-4" onclick="balas()">
                            <i class="ace-icon fa fa-check"></i>
                            Kirim
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
</div><!-- /.end modal hapus transaksi-->



<script>

    $.ajax({
        url: "<?php echo base_url().'transaksi/message_type_combo/'; ?>" ,
        type: "POST",            
        data: {},
        success: function (data) {
            $( "#messType" ).html( data );
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    function modal_ubah_flag_show_wp(id){
        //alert(i_mode);
        $("#modal_hapus_trans").modal("toggle");
        $('#t_message_inbox_id').val(id);
        
    }
</script>

<script>
     function balas(){
        
        t_message_inbox_id = $('#t_message_inbox_id').val();
        message_reply = $('#message_reply').val(); 


        if (message_reply == 0 || message_reply == null || message_reply == undefined || message_reply == ''){
            swal('Peringatan','Isi Pesan Harus Diisi', 'error');  
            return;
        }
        var var_url = "<?php echo WS_JQGRID . "transaksi.t_message_inbox_controller/balas/?"; ?>";
            var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            var_url += '&t_message_inbox_id='+t_message_inbox_id;
            var_url += '&message_body='+message_reply;

        $.getJSON(var_url, function( items ) {
            var pesan = items.rows.pesan;
            var json = JSON.parse(pesan);
            swal('Informasi',json.message,'info'); 
            return; 
        }) 

        

        //alert(var_url+"\n"+keyword+"\n"+alasan+"\n"+flag_piutang+"\n"+pesan_keyword);

    }
</script>