<div id="modal_lov_legaldoc" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title"> DOKUMEN PENDUKUNG </span>
                </div>
            </div>

            
            
                <form role="form" id="form_legal" name="form_legal" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    <input type="hidden" id="legaldoc_params" name="legaldoc_params">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                    <!-- modal body -->
                     <div class="modal-body">
		                <div class="row">
		                    <div class="col-md-12">
		                        <div class="portlet light bordered">
		                            <div class="form-body">
		                                <div class="space-2"></div>
		                                <div class="row">
		                                    <label class="control-label col-md-3">Jenis Dokumen</label>
		                                    <div class="input-group col-md-7">
		                                        <input id="p_legal_doc_type_id" name="p_legal_doc_type_id" type="text"  style="display:none;">
		                                        <input id="legal_doc_desc" name="legal_doc_desc" readonly type="text" class="FormElement form-control" placeholder="Pilih Jenis Dokumen" required>
		                                        <span class="input-group-btn">
		                                            <button class="btn btn-success" type="button" onclick="showLOVLegalDocType('p_legal_doc_type_id','legal_doc_desc')">
		                                                <span class="fa fa-search bigger-110"></span>
		                                            </button>
		                                        </span>
		                                    </div>
		                                </div>
		                                <div class="space-2"></div>
			                            <div class="row">
		                                    <label class="control-label col-md-3">Upload File</label>
		                                    <div class="input-group col-md-7">
		                                    	<input type="file" id="filename" name="filename" required/>
		                                    </div>
			                            </div>
		                                <div class="space-2"></div>
		                                <div class="row">
		                                    <label class="control-label col-md-3">Deskripsi</label>
		                                    <div class="input-group col-md-7">
		                                        <textarea rows="5" class="form-control" id="deskripsi" name="deskripsi" ></textarea>   
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
		                        <button class="btn btn-sm green-jungle radius-4">
		                            <i class="ace-icon fa fa-check"></i>
		                            Submit
		                        </button>
		                        <button class="btn btn-danger btn-sm radius-4" data-dismiss="modal">
		                            <i class="fa fa-times"></i>
		                            Tutup
		                        </button>
		                    </div>
		                </div>
		            </div>
                </form>
           

            
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.end modal -->


<?php $this->load->view('lov/lov_p_legal_doc_type'); ?>

<script>    

    $(function() {
        /* submit */
        $("#form_legal").on('submit', (function (e) {
            e.preventDefault();   
            var data = new FormData(this);
            //console.log(data);
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo WS_JQGRID."transaksi.t_cust_order_legal_doc_controller/saveUpload"; ?>',
                data: data,
                timeout: 10000,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false, 
                success: function(data) {

                    if(data.success) {
                        // $('#grid-legal').bootgrid('reload');
                        $('#grid-table').trigger( 'reloadGrid' );
                        $('#p_legal_doc_type_id').val(1);
                        $('#filename').val('');
                        $('#deskripsi').val('');
                        $('#legal_doc_desc').val('');
                        $('#modal_lov_legaldoc').modal('hide');
                    }else{
                        swal("", data.message, "warning");
                    }
                   
                }
            });
            return false;
        }));
        
    });

    function modal_lov_legaldoc_show(params_legaldoc) {
        modal_lov_legaldoc_init(params_legaldoc);
        $("#modal_lov_legaldoc").modal({backdrop: 'static'});
    }

    function modal_lov_legaldoc_init(params_legaldoc) {

        $('#legaldoc_params').val( JSON.stringify(params_legaldoc) );
        $('#p_legal_doc_type_id').val(1);
        $('#filename').val('');
        $('#deskripsi').val('');
        $('#legal_doc_desc').val('');


    }

    function showLOVLegalDocType(id, code) {
        modal_p_legal_doc_type_show(id, code);
    } 


    
</script>