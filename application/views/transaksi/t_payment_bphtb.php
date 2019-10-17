<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Pembayaran BPHTB</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-list font-blue"></i>
                    <span class="caption-subject font-blue bold uppercase"> Pembayaran BPHTB 
                    </span>
                </div>
            </div>
            <!-- CONTENT  value="2015-09-01" -->
            <div class="form-body">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-2">No Registrasi
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="no_registrasi" id="no_registrasi">
                                <input type="hidden" class="form-control" name="bit48" id="bit48">
                                <input type="hidden" class="form-control" name="nilai_pembayaran" id="nilai_pembayaran">
                                <span class="input-group-btn">
                                    <button class="btn btn-success"  type="button" id="btn-inquiry">
                                        Inquiry
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-2"></div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-2">
                            <div class="input-group">
                                <textarea rows="7" cols="70" class="form-control" readonly name="ta_data_register" id="ta_data_register"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-2"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-primary" style="display:none" type="button"  id="btn-bayar">Bayar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $("#btn-inquiry").on('click', function() {   
        var no_registrasi = $('#no_registrasi').val();
        $.ajax({
            url: '<?php echo WS_JQGRID."transaksi.t_payment_bphtb_controller/read_payment"; ?>',
            type: "POST",            
            data: {
                no_registrasi : no_registrasi
            },
            dataType: "json",
            success: function (data) {
                var code = data.code;
                var message = data.message;

                if (code != 00){
                    swal({title: "Error!", text: message, html: true, type: "error"});
                }else{
                    var bit48 = data.pieces[0];
                    var nilai_pembayaran = data.pieces1st[7];
                    var item = data.pieces2nd;
                    $('#bit48').val(bit48);
                    $('#nilai_pembayaran').val(nilai_pembayaran);
                    $('#ta_data_register').val(item);
                    $('#btn-bayar').css('display','');
                }
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
        });
       //console.log(no_registrasi);
    });

    $("#no_registrasi").keyup(function(){
        $('#bit48').val(null);
        $('#nilai_pembayaran').val(null);
        $('#ta_data_register').val(null);
        $('#btn-bayar').css('display','none');
    });


    $("#btn-bayar").on('click', function() {   
        var no_registrasi = $('#no_registrasi').val();
        var nilai_pembayaran = $('#nilai_pembayaran').val();
        var bit48 = $('#bit48').val();
        $.ajax({
            url: '<?php echo WS_JQGRID."transaksi.t_payment_bphtb_controller/payment"; ?>',
            type: "POST",            
            data: {
                no_registrasi : no_registrasi,
                nilai_pembayaran : nilai_pembayaran,
                bit48 : bit48
            },
            dataType: "json",
            success: function (data) {
                var code = data.code;
                var message = data.message;

                if (code != 00){
                    swal({title: "Error!", text: message, html: true, type: "error"});
                }else{
                    swal({title: "Info!", text: 'Data Berhasil Di Bayar', html: true, type: "info"});
                    $('#bit48').val(null);
                    $('#no_registrasi').val(null);
                    $('#nilai_pembayaran').val(null);
                    $('#ta_data_register').val(null);
                    $('#btn-bayar').css('display','none');
                }
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
        });
       //console.log(no_registrasi);
    });
</script>

