<div id="modal_lov_t_vat_setllement_ro_new" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title">UBAH NILAI DENDA</span>
                </div>
            </div>


            <!-- modal body -->
            <div class="modal-body">
                <form role="form" id="form_update" name="form_update" method="post" >
                    
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" class="form-control" readonly name="t_vat_setllement_id" id="t_vat_setllement_id">
                    
                    <div class="form-group">
                        <br>
                        <div class="col-xs-4">
                            <label>Nilai Denda</label>
                        </div>
                        <div class="col-xs-4">
                            <input type="text" class="form-control priceformat required" name="nilai_denda" id="nilai_denda" required >
                        </div>
                    </div>
                    <div class="space-2"></div><br>
                    <div class="form-group">
                        <br>
                        <div class="col-xs-4">
                            <label>Jenis Perubahan</label>
                        </div>
                        <div class="col-xs-4">
                            <select  name="flag_piutang" id="flag_piutang" class="form-control required" required>
                                <option value='0' >Ubah Nilai</option>
                                <option value='1' >Jadikan Ketetapan Denda</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-2"></div><br>
                    <div class="form-group">
                        <br>
                        <div class="col-xs-4">
                            <label>Deskripsi</label>
                        </div>
                        <div class="col-xs-8">
                            <textarea class="form-control required " rows="3" cols="50" id="description" name="description"></textarea> 
                        </div>
                    </div>
                    
                    
                    

                    <!-- modal footer -->
                    <div class="modal-footer no-margin-top">
                        <div class="bootstrap-dialog-footer">

                            <div class="bootstrap-dialog-footer-buttons col-xs-7">                    
                                <br>
                                <button type="button" id="lov-btn-update" onClick="updateDenda()" id="btn-update" class="btn btn-sm btn-danger">Update</button>
                                <button type="button" class="btn btn-sm btn-default" id="btn-update-close" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.end modal -->

<script> 
    $(".priceformat").number( true, 0 , '.',','); /* price number format */
    $(".priceformat").css("text-align", "right");
    function updateDenda() {
        var t_vat_setllement_id = $('#t_vat_setllement_id').val();
        var description = $('#description').val();
        var flag_piutang = $('#flag_piutang').val();
        var nilai_denda = $('#nilai_denda').val();

        if(description == '' || t_vat_setllement_id == ''||flag_piutang==''||nilai_denda==''){
            swal('Oopss','Harus Diisi Semua!','error');
        }else{
            $.ajax({
                url: '<?php echo WS_JQGRID."transaksi.t_vat_setllement_ro_new_controller/updateDenda"; ?>',
                type: "POST",
                dataType: "json",
                data: {
                   t_vat_setllement_id: t_vat_setllement_id,
                   description:description,
                   flag_piutang:flag_piutang,
                   nilai_denda:nilai_denda
                },
                success: function (data) {
                    
                    if(data.success){
                        $('#modal_lov_t_vat_setllement_ro_new').modal('hide');
                        if(data.message=="OK"){
                            $('#t_vat_setllement_id').val(null);
                            $('#description').val(null);
                            $('#flag_piutang').val(null);
                            $('#nilai_denda').val(null);
                            swal('Informasi',data.message,'info');

                            jQuery(function($) {
                                var grid_selector = "#grid-table";

                                jQuery("#grid-table").jqGrid('setGridParam',{
                                    url: '<?php echo WS_JQGRID."transaksi.t_vat_setllement_ro_new_controller/read"; ?>',
                                    postData: {}
                                });
                                $("#grid-table").jqGrid("setCaption", "DAFTAR SSPD/SPTPD(Pelaporan Pajak)");
                                $("#grid-table").trigger("reloadGrid");
                            });
                            //loadContentWithParams("data_master.t_cust_account_update_status", {});
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

    function modal_lov_t_vat_setllement_ro_new_show(t_vat_setllement_id) {
        $("#modal_lov_t_vat_setllement_ro_new").bootgrid("destroy");
        modal_lov_t_vat_setllement_ro_new_init(t_vat_setllement_id);

        $("#modal_lov_t_vat_setllement_ro_new").modal({backdrop: 'static'});
    }

    function modal_lov_t_vat_setllement_ro_new_init(t_vat_setllement_id) {

        $('#t_vat_setllement_id').val(t_vat_setllement_id);
        //$('#form_submitter_back_summary').val( JSON.stringify(form_submitter_back_summary) );

    }


    
</script>