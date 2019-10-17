<!-- Modal Hapus Transaksi -->
<div id="modal_hapus_trans" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog" style="width:700px;">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title">Hapus BPHTB</span>
                </div>
            </div>

            <!-- modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="form-body">
                                <div class="row">
                                    <input type="hidden" name="t_bphtb_registration_id" id="t_bphtb_registration_id">
                                    <label class="control-label col-md-3">Alasan Unflag</label>
                                    <div class="input-group col-md-7">
                                            <textarea class="form-control" id="alasan_hapus" name="alasan_hapus" required></textarea>
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
                        <button class="btn btn-sm green-jungle radius-4" onclick="ubahData()">
                            <i class="ace-icon fa fa-check"></i>
                            Hapus
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

    function modal_ubah_flag_show(id){
        //alert(i_mode);
        $("#modal_hapus_trans").modal("toggle");
        $('#t_bphtb_registration_id').val(id);
        
    }
</script>

<script>
     function ubahData(){
        
        t_bphtb_registration_id = $('#t_bphtb_registration_id').val();
        alasan = $('#alasan_hapus').val(); 


        if (alasan == 0 || alasan == null || alasan == undefined || alasan == ''){
            swal('Peringatan','Alasan Harus Diisi', 'error');  
            return;
        }
        var var_url = "<?php echo WS_JQGRID . "transaksi.t_bphtb_ubah_register_list_controller/updateDataFlag/?"; ?>";
            var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            var_url += '&t_bphtb_registration_id='+t_bphtb_registration_id;
            var_url += '&alasan='+alasan;

        $.getJSON(var_url, function( items ) {
                swal('Informasi',items.rows.f_unflag_bphtb,'info');  

                jQuery(function($) {
                    jQuery("#grid-table").jqGrid('setGridParam',{
                        url: '<?php echo WS_JQGRID."transaksi.t_bphtb_ubah_register_list_controller/read"; ?>',
                        postData: { s_keyword : $('#s_keyword').val()}
                    });
                    $("#grid-table").trigger("reloadGrid");
                });
            }) 

        

        //alert(var_url+"\n"+keyword+"\n"+alasan+"\n"+flag_piutang+"\n"+pesan_keyword);

    }
</script>