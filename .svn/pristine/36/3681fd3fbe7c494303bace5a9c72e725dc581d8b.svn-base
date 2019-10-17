
<!--  Modal Ubah Ayat -->
<div id="modal_ubah_ayat" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog" style="width:700px;">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title">Pilih Jenis Pajak</span>
                </div>
            </div>

            <!-- modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="form-body">
                                <div class="space-2"></div>
                                <div class="row">
                                    <label class="control-label col-md-3">Jenis Pajak</label>
                                    <div class="input-group col-md-7">
                                        <input type="hidden" id="CURR_DOC_ID" value="<?php echo $this->input->post('CURR_DOC_ID'); ?>">
                                        <input id="p_vat_type_id" type="text"  style="display:none;">
                                        <input id="vat_code" readonly type="text" class="FormElement form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="button" onclick="showLOVVatType('p_vat_type_id','vat_code')">
                                                <span class="fa fa-search bigger-110"></span>
                                            </button>
                                        </span>
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
                        <button class="btn btn-sm green-jungle radius-4" onclick="toExcel()">
                            <i class="ace-icon fa fa-check"></i>
                            Cetak Excel
                        </button>
                        <button class="btn btn-sm green-jungle radius-4" onclick="viewPDF()">
                            <i class="ace-icon fa fa-check"></i>
                            View PDF
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
</div><!-- /.end modal ayat-->



<?php $this->load->view('lov/lov_vat_type'); ?>


<script>
    function modal_cetak_excel_show(){
        //alert(i_mode);
        $("#modal_ubah_ayat").modal("toggle"); 
               
    }

    function toExcel(){
        //alert($('#CURR_DOC_ID').val());
        var vat_id = $('#p_vat_type_id').val();
        var t_customer_order_id = $('#CURR_DOC_ID').val();

        if (vat_id==0||t_customer_order_id==0){
            swal('Informasi','Semua Harus Diisi','info');
            return;
        }
        
        var url = "<?php echo WS_JQGRID . "transaksi.t_debt_letter_controller/excel/?"; ?>";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&p_vat_type_id="+vat_id;
            url += "&t_customer_order_id="+t_customer_order_id;
        window.location = url;
    }

    function viewPDF(){

        var t_customer_order_id = $('#CURR_DOC_ID').val();
        var p_vat_type_id = $('#p_vat_type_id').val();

        if (t_customer_order_id==0){
            swal('Informasi','Semua Harus Diisi','info');
            return;
        }
        
        var url = "<?php echo base_url(); ?>"+"view_daftar_surat_teguran_pdf/pageCetak?";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&p_vat_type_id="+p_vat_type_id;
            url += "&t_customer_order_id="+t_customer_order_id;
            //alert(url);
        PopupCenter(url,"Cetak Surat Teguran",500,500);


    }


</script>


<script>
    function showLOVVatType(id, code) {
        modal_lov_vat_show(id, code);
    }
</script>