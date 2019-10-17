<div id="modal_finance_period" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog" style="width:700px;">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title"> Data Periode</span>
                </div>
            </div>
            <input type="hidden" id="modal_lov_p_finance_period_id_val" value="" />
            <input type="hidden" id="modal_lov_p_finance_period_code_val" value="" />
            <input type="hidden" id="modal_lov_p_year_period_val" value="" />
            <input type="hidden" id="modal_lov_start_date_val" value="" />
            <input type="hidden" id="modal_lov_end_date_val" value="" />

            <!-- modal body -->
            <div class="modal-body">
                <div>
                  <button type="button" class="btn btn-sm btn-success" id="modal_finance_period_btn_blank">
                    <span class="fa fa-pencil-square-o bigger-110" aria-hidden="true"></span> BLANK
                  </button>
                </div>
                <table id="modal_finance_period_grid_selection" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                     <th data-column-id="p_finance_period_id" data-sortable="false" data-visible="false">ID Period</th>
                     <th data-column-id="p_year_period_id" data-sortable="false" data-visible="false">ID Tahun</th>
                     <th data-header-align="center" data-align="center" data-formatter="opt-edit" data-sortable="false" data-width="100">Options</th>
                     <th data-column-id="code">Bulan</th>
                     <th data-column-id="description">Deskripsi</th> 
                     <th data-column-id="start_date" data-visible="false">start date</th>
                     <th data-column-id="end_date" data-visible="false">end date</th>
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
    $(function($) {
        $("#modal_finance_period_btn_blank").on('click', function() {
            $("#"+ $("#modal_lov_p_finance_period_id_val").val()).val("");
            $("#"+ $("#modal_lov_p_finance_period_code_val").val()).val("");
            $("#"+ $("#modal_lov_p_year_period_val").val()).val("");
            $("#"+ $("#modal_lov_start_date_val").val()).val("");
            $("#"+ $("#modal_lov_end_date_val").val()).val("");
            $("#modal_finance_period").modal("toggle");
        });
    });

    function modal_finance_period_show(the_id_field, the_code_field, id_parent, start_date, end_date) {
        modal_finance_period_set_field_value(the_id_field, the_code_field, id_parent, start_date, end_date);
        $("#modal_finance_period").modal({backdrop: 'static'});
        modal_finance_period_prepare_table(id_parent);
    }


    function modal_finance_period_set_field_value(the_id_field, the_code_field, id_parent, start_date, end_date) {
         $("#modal_lov_p_finance_period_id_val").val(the_id_field);
         $("#modal_lov_p_finance_period_code_val").val(the_code_field);
         $("#modal_lov_p_year_period_val").val(id_parent);
         $("#modal_lov_start_date_val").val(start_date);
         $("#modal_lov_end_date_val").val(end_date);
    }

    function modal_finance_period_set_value(the_id_val, the_code_val, id_parent, start_date, end_date) {
         $("#"+ $("#modal_lov_p_finance_period_id_val").val()).val(the_id_val);
         $("#"+ $("#modal_lov_p_finance_period_code_val").val()).val(the_code_val);     
         $("#"+ $("#modal_lov_p_year_period_val").val()).val(id_parent);
         $("#"+ $("#modal_lov_start_date_val").val()).val(start_date);     
         $("#"+ $("#modal_lov_end_date_val").val()).val(end_date);
         $("#modal_finance_period").modal("toggle");

         $("#"+ $("#modal_lov_p_finance_period_id_val").val()).change();
         $("#"+ $("#modal_lov_p_finance_period_code_val").val()).change();
         $("#"+ $("#modal_lov_p_year_period_val").val()).change();
         $("#"+ $("#modal_lov_start_date_val").val()).change();
         $("#"+ $("#modal_lov_end_date_val").val()).change();
    }

    function modal_finance_period_prepare_table(id_parent) {
        $("#modal_finance_period_grid_selection").bootgrid("destroy");

        $("#modal_finance_period_grid_selection").bootgrid({
             formatters: {
                "opt-edit" : function(col, row) {
                    return '<a href="javascript:;" title="Set Value" onclick="modal_finance_period_set_value(\''+ row.p_finance_period_id +'\', \''+ row.code +'\',\''+row.p_year_period_id+'\',\''+row.start_date_str+'\',\''+row.end_date_str+'\')" class="blue"><i class="fa fa-pencil-square-o bigger-130"></i></a>';
                },
                "status_display" : function(col, row) {
                    return '<i class="'+row.code+' bigger-140"></i>';
                }
             },
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
             url: '<?php echo WS_BOOTGRID."parameter.p_finance_period_controller/readLov?p_year_period_id="?>'+id_parent,

            

             selection: true,
             sorting:true
        });
        //alert(id_parent);

        $('.bootgrid-header span.glyphicon-search').removeClass('glyphicon-search')
        .html('<i class="fa fa-search"></i>');
    }
</script>