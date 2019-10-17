<link href="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<div id="modal_lov_t_cust_acc_status_edit" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title">UBAH STATUS</span>
                </div>
            </div>


            <!-- modal body -->
            <div class="modal-body">
                <form role="form" id="form_update" name="form_update" method="post" >
                    
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" class="form-control" readonly name="t_cust_account_id" id="t_cust_account_id">
                    
                    <div class="form-group">
                        <br>
                        <div class="col-xs-4">
                            <label>Status</label>
                        </div>
                        <div class="col-xs-4">
                            <div id="combo"></div>
                        </div>
                    </div>
                    <div class="space-2"></div><br>
                    <div class="form-group">
                        <br>
                        <div class="col-xs-4">
                            <label>Alasan Perubahan</label>
                        </div>
                        <div class="col-xs-8">
                            <textarea class="form-control required " rows="3" cols="50" id="description" name="description"></textarea> 
                        </div>
                    </div>
                    <div class="space-2"></div><br><br><br>
                    <div class="form-group">
                        <br>
                        <div class="col-xs-4">
                            <label>Pertanggal</label>
                        </div>
                        <div class="col-xs-4">
                            <input type="text" class="form-control datepicker1 required" name="valid_to" id="valid_to" required >
                        </div>
                    </div>
                    

                    <!-- modal footer -->
                    <div class="modal-footer no-margin-top">
                        <div class="bootstrap-dialog-footer">

                            <div class="bootstrap-dialog-footer-buttons col-xs-7">                    
                                <br>
                                <button type="button" id="lov-btn-update" onClick="updateStatus()" id="btn-update" class="btn btn-sm btn-danger">Update</button>
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

    $('.datepicker1').datetimepicker({
        format: 'DD-MM-YYYY',
        // defaultDate: new Date()
    });

    $.ajax({
        url: "<?php echo base_url().'t_cust_acc_status_edit/load_combo_status/'; ?>" ,
        type: "POST",            
        data: {},
        success: function (data) {
            $( "#combo" ).html( data );
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    function updateStatus() {
        var t_cust_account_id = $('#t_cust_account_id').val();
        var description = $('#description').val();
        var p_account_status_id = $('#p_account_status_id').val();
        var valid_to = $('#valid_to').val();

        if(description == '' || t_cust_account_id == ''||p_account_status_id==''||valid_to==''){
            swal('Oopss','Harus Diisi Semua!','error');
        }else{
            $.ajax({
                url: '<?php echo WS_JQGRID."data_master.t_cust_account_update_status_controller/updateStatus"; ?>',
                type: "POST",
                dataType: "json",
                data: {
                   t_cust_account_id: t_cust_account_id,
                   description:description,
                   p_account_status_id:p_account_status_id,
                   valid_to:valid_to
                },
                success: function (data) {
                    
                    if(data.success){
                        //$('#btn-update').remove();
                        //$('#btn-update-close').remove();
                        $('#modal_lov_t_cust_acc_status_edit').modal('hide');
                        //$('body').removeClass('modal-open');
                        //$('.modal-backdrop').remove();
                        //loadContentWithParams( file_name , obj_summary_params );
                        if(data.message=="OK"){
                            $('#t_cust_account_id').val(null);
                            $('#description').val(null);
                            $('#p_account_status_id').val(null);
                            $('#valid_to').val(null);
                            swal('Informasi',data.message,'info');

                            jQuery(function($) {
                                var grid_selector = "#grid-table";

                                jQuery("#grid-table").jqGrid('setGridParam',{
                                    url: '<?php echo WS_JQGRID."data_master.t_cust_account_update_status_controller/read"; ?>',
                                    postData: {}
                                });
                                $("#grid-table").jqGrid("setCaption", "DAFTAR UBAH STATUS WP");
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

    function modal_lov_t_cust_acc_status_edit_show(t_cust_account_id) {
        $("#modal_lov_t_cust_acc_status_edit").bootgrid("destroy");
        modal_lov_t_cust_acc_status_edit_init(t_cust_account_id);

        $("#modal_lov_t_cust_acc_status_edit").modal({backdrop: 'static'});
    }

    function modal_lov_t_cust_acc_status_edit_init(t_cust_account_id) {

        $('#t_cust_account_id').val(t_cust_account_id);
        //$('#form_submitter_back_summary').val( JSON.stringify(form_submitter_back_summary) );

    }


    
</script>