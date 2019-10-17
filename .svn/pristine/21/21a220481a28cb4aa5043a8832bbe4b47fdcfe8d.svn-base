<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Entri NPWPD Jabatan</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">





<?php $this->load->view('lov/lov_kota'); ?>
<?php $this->load->view('lov/lov_kec'); ?>
<?php $this->load->view('lov/lov_kel'); ?>
<?php $this->load->view('lov/lov_vat_type_dtl'); ?>
<?php $this->load->view('lov/lov_p_rqst_type'); ?>


<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="space-2"></div>
                <div class="row">
                    <input type="hidden" class="form-control required" name="t_vat_registration_id" id="t_vat_registration_id">
                    <input type="hidden" class="form-control required" name="company_additional_addr" id="company_additional_addr">
                    <label class="control-label col-md-3">Nama Objek Pajak</label>
                    <div class="input-group col-md-5">
                        <input type="text" class="form-control required" name="company_brand" id="company_brand">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Jenis Pajak</label>
                    <div class="input-group col-md-4">
                        <input id="p_rqst_type_id" type="text"  style="display:none;">
                        <input id="type_code" readonly type="text" class="FormElement form-control required" placeholder="Pilih Jenis Pajak">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" onclick="showLOVRqstType('p_rqst_type_id','type_code')">
                                <span class="fa fa-search bigger-110"></span>
                             </button>
                        </span>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Ayat Pajak</label>
                    <div class="input-group col-md-4">
                        <input id="p_vat_type_dtl_id" type="text"  style="display:none;">
                        <input id="vat_code" readonly type="text" class="FormElement form-control required" placeholder="Pilih Ayat Pajak">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" onclick="showLOVVatTypeDtl('p_vat_type_dtl_id','vat_code')">
                                <span class="fa fa-search bigger-110"></span>
                             </button>
                        </span>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">                
                    <label class="control-label col-md-3">Kota/Kabupaten</label>
                    <div class="input-group col-md-4">
                            <input id="brand_p_region_id" type="text"  style="display:none;">
                            <input id="kota" readonly type="text" class="FormElement form-control required" placeholder="Pilih Kota/Kabupaten">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVKota('brand_p_region_id','kota')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Kecamatan</label>
                    <div class="input-group col-md-4">
                            <input id="brand_p_region_id_kec" type="text"  style="display:none;">
                            <input id="kecamatan" readonly type="text" class="FormElement form-control required" placeholder="Pilih Kecamatan">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVKec('brand_p_region_id_kec','kecamatan', $('#brand_p_region_id').val())">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                    </div>               
                </div>

                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Kelurahan</label>
                    <div class="input-group col-md-4">
                        <input id="brand_p_region_id_kel" type="text"  style="display:none;">
                        <input id="kelurahan" readonly type="text" class="FormElement form-control required" placeholder="Pilih Kelurahan">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" onclick="showLOVKel('brand_p_region_id_kel','kelurahan',$('#brand_p_region_id_kec').val())">
                                <span class="fa fa-search bigger-110"></span>
                             </button>
                        </span>
                    </div>
                </div>


                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Alamat Wajib Pajak</label>
                    <div class="input-group col-md-4">
                            <textarea class="form-control required" name="brand_address_name" id="brand_address_name"></textarea>
                        </div>
                </div>

                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nomor Lokasi</label>
                    <div class="input-group col-md-2">
                            <input type="text" class="form-control required" name="brand_address_no" id="brand_address_no">
                    </div>
                </div>

                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">RT/RW</label>
                        <div class="input-group col-md-2">
                            <input type="text" class="form-control" name="brand_address_rt" id="brand_address_rt" maxlength="5">        
                            <span class="input-group-addon"> / </span> 
                            <input type="text" class="form-control" name="brand_address_rw" id="brand_address_rw" maxlength="5">                            
                        </div>
                </div>


                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No. Telepon</label>
                    <div class="input-group col-md-4">
                            <input type="text" class="form-control" name="brand_phone_no" id="brand_phone_no">
                            <span class="input-group-addon">No. Seluler </span>
                            <input type="text" class="form-control" name="brand_mobile_no" id="brand_mobile_no">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No. Fax</label>
                    <div class="input-group col-md-4">
                            <input type="text" class="form-control" name="brand_fax_no" id="brand_fax_no">
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Kode Pos</label>
                    <div class="input-group col-md-2">
                            <input type="text" class="form-control" name="brand_zip_code" id="brand_zip_code" maxlength="6">
                    </div>
                </div>


                <div class="space-2"></div>
                <div class="row">
                    <div class="col-sm-offset-3">
                        <button class="btn btn-success" type="button" id="btn-submit" onclick="submit()">Submit</button>
                        <button class="btn btn-success" type="button" id="btn-cancel">Batal</button>
                    </div>
                 
                </div> 
            </div>  
        </div>       
    </div>   
</div>


<script type="text/javascript">
    function showLOVKota(id, code) {
        modal_lov_kota_show(id, code);
    }
    function showLOVKec(id, code, parent) {
        if (parent=='' || parent==0 ) {
            swal('Informasi','Kota Harus Diisi','info');
            return false;
        } else {
            modal_lov_kecamatan_show(id, code, parent);
        }
        
    }
    function showLOVKel(id, code, parent) {
        if (parent=='' || parent==0 ) {
            swal('Informasi','Kecamatan Harus Diisi','info');
            return false;
        } else {
            modal_lov_kelurahan_show(id, code, parent);
        }
    }
    function showLOVJabatan(id, code) {
        modal_job_position_show(id, code);
    }
    function showLOVVatTypeDtl(id, code) {
        if ($('#p_rqst_type_id').val()=='' || $('#p_rqst_type_id').val()==0 ) {
            swal('Informasi','Jenis Pajak Harus Diisi','info');
            return false;
        } else {
            modal_lov_vat_dtl_show(id, code,$('#p_rqst_type_id').val());
        }
    }
    function showLOVVatType(id, code) {
        modal_lov_vat_show(id, code);
    }
    function showLOVRqstType(id, code) {
        modal_p_rqst_type_show(id, code);
    }
</script>

<script type="text/javascript">
    function submit(){

        var company_brand = $('#company_brand').val();
        var company_additional_addr = $('#company_additional_addr').val();
        var brand_address_name = $('#brand_address_name').val();
        var brand_address_no = $('#brand_address_no').val();
        var brand_address_rt = $('#brand_address_rt').val();
        var brand_address_rw = $('#brand_address_rw').val();
        var brand_p_region_id_kel = $('#brand_p_region_id_kel').val();
        var brand_p_region_id_kec = $('#brand_p_region_id_kec').val();
        var brand_p_region_id = $('#brand_p_region_id').val();
        var brand_phone_no = $('#brand_phone_no').val();
        var brand_mobile_no = $('#brand_mobile_no').val();
        var brand_fax_no = $('#brand_fax_no').val();
        var brand_zip_code = $('#brand_zip_code').val();
        var p_rqst_type_id = $('#p_rqst_type_id').val();
        var p_vat_type_dtl_id = $('#p_vat_type_dtl_id').val();

        if (brand_mobile_no == "" || brand_mobile_no == 0 || brand_mobile_no == false || brand_mobile_no == undefined ||  brand_mobile_no == null){
            brand_mobile_no = "-"; 
        }
        if (brand_phone_no == "" || brand_phone_no == 0 || brand_phone_no == false || brand_phone_no == undefined ||  brand_phone_no == null){
            brand_phone_no = "-"; 
        }
        if (brand_zip_code == "" || brand_zip_code == 0 || brand_zip_code == false || brand_zip_code == undefined ||  brand_zip_code == null){
            brand_zip_code = "-"; 
        }
        if (brand_address_rt == "" || brand_address_rt == 0 || brand_address_rt == false || brand_address_rt == undefined ||  brand_address_rt == null){
            brand_address_rt = "-";
        }

        if (company_brand == "" || company_brand == 0 || company_brand == false || company_brand == undefined ||  company_brand == null){
            swal('Informasi',"Nama Objek Pajak harus diisi",'info'); 
            return;
        }
        if (brand_address_name == "" || brand_address_name == 0 || brand_address_name == false || brand_address_name == undefined ||  brand_address_name == null){
            swal('Informasi',"Alamat Objek Pajak harus diisi",'info'); 
            return;
        }
        if (brand_address_no == "" || brand_address_no == 0 || brand_address_no == false || brand_address_no == undefined ||  brand_address_no == null){
            swal('Informasi',"Nomor Lokasi harus diisi",'info'); 
            return;
        }
        if (brand_p_region_id_kel == "" || brand_p_region_id_kel == 0 || brand_p_region_id_kel == false || brand_p_region_id_kel == undefined ||  brand_p_region_id_kel == null){
            swal('Informasi',"Kelurahan harus diisi",'info'); 
            return;
        }
        if (brand_p_region_id_kec == "" || brand_p_region_id_kec == 0 || brand_p_region_id_kec == false || brand_p_region_id_kec == undefined ||  brand_p_region_id_kec == null){
            swal('Informasi',"Kecamatan harus diisi",'info'); 
            return;
        }
        if (brand_p_region_id == "" || brand_p_region_id == 0 || brand_p_region_id == false || brand_p_region_id == undefined ||  brand_p_region_id == null){
            swal('Informasi',"Kota harus diisi",'info'); 
            return;
        }
        if (p_rqst_type_id == "" || p_rqst_type_id == 0 || p_rqst_type_id == false || p_rqst_type_id == undefined ||  p_rqst_type_id == null){
            swal('Informasi',"Jenis Pajak harus diisi",'info'); 
            return;
        }
        if (p_vat_type_dtl_id == "" || p_vat_type_dtl_id == 0 || p_vat_type_dtl_id == false || p_vat_type_dtl_id == undefined ||  p_vat_type_dtl_id == null){
            swal('Informasi',"Ayat Pajak harus diisi",'info'); 
            return;
        }

        var var_url = "<?php echo WS_JQGRID . "transaksi.t_vat_registration_npwpd_jabatan_controller/insertUpdate/?"; ?>";
            var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            var_url += "&company_brand="+company_brand;
            var_url += "&company_additional_addr="+company_additional_addr;
            var_url += "&brand_address_name="+brand_address_name;
            var_url += "&brand_address_no="+brand_address_no;
            var_url += "&brand_address_rt="+brand_address_rt;
            var_url += "&brand_address_rw="+brand_address_rw;
            var_url += "&brand_p_region_id_kel="+brand_p_region_id_kel;
            var_url += "&brand_p_region_id_kec="+brand_p_region_id_kec;
            var_url += "&brand_p_region_id="+brand_p_region_id;
            var_url += "&brand_phone_no="+brand_phone_no;
            var_url += "&brand_mobile_no="+brand_mobile_no;
            var_url += "&brand_fax_no="+brand_fax_no;
            var_url += "&brand_zip_code="+brand_zip_code;
            var_url += "&p_rqst_type_id="+p_rqst_type_id;
            var_url += "&p_vat_type_dtl_id="+p_vat_type_dtl_id;

            $.getJSON(var_url, function( items ) {

                var t_customer_order_id = items.rows.v_customer_order_id;
                var url = "<?php echo base_url(); ?>"+"cetak_surat_pengukuhan_npwpd_jabatan/pageCetak?CURR_DOC_ID="+t_customer_order_id;
                var url1 = "<?php echo base_url(); ?>"+"cetak_form_pemutakhiran_data_npwpd_jabatan/pageCetak?t_customer_order_id="+t_customer_order_id;

                if (items.rows.v_customer_order_id > 0 ){
                    PopupCenter(url1,"Kartu NPWPD",500,500);
                    PopupCenter(url,"Kartu NPWPD Jabatan",500,500);
                } else {
                    swal('Peringatan','Gagal','error');  
                    return;
                }

                


                
            });
    }

    $("#btn-cancel").on("click", function(event) {
        event.stopPropagation();
        loadContentWithParams("transaksi.t_vat_registration_npwpd_jabatan", {});
    });
</script>


