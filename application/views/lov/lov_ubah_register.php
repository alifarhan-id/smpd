
<!--  Modal Ubah Register -->
<div id="modal_ubah_register" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog" style="width:700px;">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title">Ubah Register</span>
                </div>
            </div>

            <!-- modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="form-body">
                                <input type="hidden" name="t_vat_setllement_id" id="t_vat_setllement_id">
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">NPWPD</label>
                                    <div class="input-group col-md-4">
                                        <input type="text" class="form-control" name="npwpd" id="npwpd" readonly>
                                    </div>
                                </div>
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">Nomor Kohir</label>
                                    <div class="input-group col-md-4">
                                            <input type="text" class="form-control" name="no_kohir" id="no_kohir" readonly>
                                    </div>
                                </div>
                            </div>  
                        </div>       
                    </div>   
                </div>
                <label class="control-label col-md-5"><b>Data Pelaporan</b></label>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="form-body">
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">Jumlah Omset</label>
                                    <div class="input-group col-md-7">
                                        <input type="text" class="form-control" id="total_trans_amount" name="total_trans_amount" required>
                                    </div>
                                </div>
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">Nilai Pajak</label>
                                    <div class="input-group col-md-7">
                                            <input type="text" class="form-control" id="total_vat_amount" name="total_vat_amount" required>
                                    </div>
                                </div>
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">Ubah Flag Register</label>
                                    <div class="input-group col-md-7">
                                            <select class="form-control" id="is_settled" name="is_settled">
                                                <option value="Y">Sudah Register</option>
                                                <option value="N">Belum Register</option>
                                            </select> 
                                    </div>
                                </div>
                            </div>  
                        </div>       
                    </div>   
                </div>
                <label class="control-label col-md-5"><b>Data Register</b></label>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="form-body">
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">Total Bayar</label>
                                    <div class="input-group col-md-7">
                                        <input type="text" class="form-control" id="payment_amount" name="payment_amount" required>
                                    </div>
                                </div>
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">Total Harus Bayar</label>
                                    <div class="input-group col-md-7">
                                            <input type="text" class="form-control" id="payment_vat_amount" name="payment_vat_amount" required>
                                    </div>
                                </div>
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">Total Denda</label>
                                    <div class="input-group col-md-7">
                                            <input type="text" class="form-control" id="penalty_amount" name="penalty_amount" required>
                                    </div>
                                </div>
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">No. Register</label>
                                    <div class="input-group col-md-7">
                                            <input type="text" class="form-control" id="receipt_no" name="receipt_no" required>
                                    </div>
                                </div>
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">Tanggal Bayar</label>
                                    <div class="input-group col-md-7">
                                            <input type="text" class="form-control" id="payment_date" name="payment_date" required>
                                    </div>
                                </div>
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">Bank/BKP</label>
                                    <div class="input-group col-md-7">
                                        <select class="form-control" id="is_bjb" name="is_bjb">
                                            <option value="1">BJB</option>
                                            <option value="2">BKP</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">Nama Kasir</label>
                                    <div class="input-group col-md-7">
                                            <input type="text" class="form-control" id="p_cg_terminal_id" name="p_cg_terminal_id" required>
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
                        <button class="btn btn-sm green-jungle radius-4" onclick="ubahData($('#t_vat_setllement_id').val())">
                            <i class="ace-icon fa fa-check"></i>
                            Simpan
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
    function modal_ubah_register_show(id){
        $("#modal_ubah_register").modal("toggle"); 
        $(function() {
            $.ajax({
                url: '<?php echo WS_JQGRID."transaksi.t_vat_setllement_ro_modifikasi_ubah_register_controller/readDataRegister"; ?>',
                type: "POST",
                dataType: 'json',
                data: {t_vat_setllement_id:id},
                success: function (data) {
                    $('#t_vat_setllement_id').val(data.rows.t_vat_setllement_id); 
                    $('#npwpd').val(data.rows.npwd);  
                    $('#no_kohir').val(data.rows.no_kohir); 
                },
                error: function (xhr, status, error) {
                    swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                }
            });
        });
    }

    function ubahData($t_vat_setllement_id){
        var total_trans_amount = $('#total_trans_amount').val(); 
        var total_vat_amount = $('#total_vat_amount').val(); 
        var is_settled = $('#is_settled').val(); 
        var receipt_no = $('#receipt_no').val(); 
        var payment_amount = $('#payment_amount').val(); 
        var payment_vat_amount = $('#payment_vat_amount').val();
        var payment_date = $('#payment_date').val();
        var is_bjb = $('#is_bjb').val();
        var p_cg_terminal_id = $('#p_cg_terminal_id').val();
        var penalty_amount = $('#penalty_amount').val();

        var var_url = "<?php echo WS_JQGRID . "transaksi.t_vat_setllement_ro_modifikasi_ubah_register_controller/updateDataRegister/?"; ?>";
            var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            var_url += '&t_vat_setllement_id='+$t_vat_setllement_id;
            var_url += '&total_trans_amount='+total_trans_amount;
            var_url += '&is_settled='+is_settled;
            var_url += '&receipt_no='+receipt_no;
            var_url += '&payment_amount='+$payment_amount;
            var_url += '&payment_vat_amount='+$payment_vat_amount;
            var_url += '&payment_date='+payment_date;
            var_url += '&is_bjb='+is_bjb;
            var_url += '&p_cg_terminal_id='+p_cg_terminal_id;
            var_url += '&penalty_amount='+$penalty_amount;

        $.getJSON(var_url, function( items ) {
                swal('Informasi',items.rows.msg,'info');  
            }) 
    }

    $('#payment_date').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });
</script>