<div id="modal_v_cust" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog" style="width:700px;">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title"> Detail Transaksi </span>
                </div>
            </div>

            <!-- modal body -->
            <div class="modal-body">
                
                <table id="modal_v_cust_grid_selection" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                     <th data-header-align="center" data-column-id="trans_date">Tgl Transaksi</th>
                     <th data-column-id="bill_no">No Transaksi</th>
                     <th data-column-id="service_desc">Nama Transaksi</th>
                     <th data-column-id="service_charge">Nilai Transaksi</th>
                     <th data-column-id="vat_charge">Nilai Pajak</th>
                  </tr>
                </thead>
                </table>
            </div>

            <!-- modal footer -->
            <div class="modal-footer no-margin-top">
                <div class="bootstrap-dialog-footer">
                    <div class="bootstrap-dialog-footer-buttons">
                        <button class="btn btn-danger btn-sm radius-4" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.end modal -->

<script>
    

    function modal_v_cust_dtl_show(t_vat_setllement_id, t_cust_account_id) {
        
        $("#modal_v_cust").modal({backdrop: 'static'});
        modal_v_cust_prepare_table(t_vat_setllement_id, t_cust_account_id);
    }
    

    function modal_v_cust_prepare_table(t_vat_setllement_id, t_cust_account_id) {
        $("#modal_v_cust_grid_selection").bootgrid("destroy");
        $("#modal_v_cust_grid_selection").bootgrid({             
             rowCount:[5,10],
             ajax: true,
             requestHandler:function(request) {
                if(request.sort) {
                    var sortby = Object.keys(request.sort)[0];
                    request.dir = request.sort[sortby];

                    delete request.sort;
                    request.sort = sortby;
                }
                return request;
             },
             responseHandler:function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }
                return response;
             },
             
             url: '<?php echo WS_BOOTGRID."data_master.v_cust_acc_dtl_trans_controller/readLov"; ?>',
             post:{t_vat_setllement_id:t_vat_setllement_id,t_cust_account_id:t_cust_account_id},
             
             selection: true,
             sorting:true
        });

        $('.bootgrid-header span.glyphicon-search').removeClass('glyphicon-search')
        .html('<i class="fa fa-search"></i>');
    }
</script>