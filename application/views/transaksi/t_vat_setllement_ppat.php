<link href="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Surat Tagihan Denda Profesi</span>
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
                    <span class="caption-subject font-blue bold uppercase"> Pelaporan Surat Tagihan Denda Profesi
                    </span>
                </div>
            </div>
            <!-- CONTENT  value="2015-09-01" -->
            <div class="form-body">
                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Nama
                        </label>
                        <div class="col-md-4 col-md-offset-2">
                            <div class="input-group ">
                                <input type="hidden" class="form-control required" required name="t_ppat_id" id="t_ppat_id" >
                                <input type="text" class="form-control required" name="ppat_name" required  id="ppat_name" >
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-name">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Alamat
                        </label>
                        <div class="col-md-7 col-md-offset-2">
                            <div class="input-group col-md-7">
                                <textarea rows="3" cols="50" class="form-control required" required maxlength="256"  name="address_name" id="address_name"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">No. SK Pengukuhan PPAT/S
                        </label>
                        <div class="col-md-7 col-md-offset-2">
                            <div class="input-group col-md-7">
                                <input type="text" class="form-control required" name="no_sk" required  id="no_sk" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Denda Atas Pelaporan Bulan</label>
                        <label class="control-label col-md-2">Tahun</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="hidden" class="form-control "  name="p_year_period_id" id="p_year_period_id" readonly>
                                <input type="text" class="form-control " name="year_code"   id="year_code" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-period">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2 col-md-offset-2">Bulan</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="hidden" class="form-control "  name="p_finance_period_id" id="p_finance_period_id" readonly>
                                <input type="text" class="form-control " name="finance_period_code"   id="finance_period_code" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-bulan">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Denda atas AJB yang ditandatangani sebelum pembayaran BPHTB</label>
                        <div class="col-md-7 col-md-offset-2">
                            <div class="input-group col-md-7">
                                <input type="text" class="form-control " name="sanksi_ajb"   id="sanksi_ajb">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2 col-md-offset-2">Tahun</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="hidden" class="form-control "  name="p_year_period_id_ajb" id="p_year_period_id_ajb" readonly>
                                <input type="text" class="form-control " name="year_code_ajb"  id="year_code_ajb" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-period-ajb">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2 col-md-offset-2">Bulan</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="hidden" class="form-control "  name="p_finance_period_id_ajb" id="p_finance_period_id_ajb" readonly>
                                <input type="text" class="form-control " name="finance_period_code_ajb"   id="finance_period_code_ajb" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-bulan-ajb">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2" style="display: none"></div>

                <div class="row" style="display: none">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Dibuat Oleh</label>
                        <div class="col-md-3 col-md-offset-2">
                            <div class="input-group">
                                <input type="text" class="form-control sesionName" name="created_by" value="ADMIN"  id="created_by" readonly>
                            </div>
                        </div>
                        <label class="control-label col-md-2">Tanggal</label>
                        <div class="col-md-3 ">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="creation_date"   id="creation_date" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2" style="display: none"></div>
                <div class="row" style="display: none">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Diubah Oleh</label>
                        <div class="col-md-3 col-md-offset-2">
                            <div class="input-group">
                                <input type="text" class="form-control sesionName" name="updated_by" value="ADMIN"  id="updated_by" readonly>
                            </div>
                        </div>
                        <label class="control-label col-md-2">Tanggal</label>
                        <div class="col-md-3 ">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="updated_date"   id="updated_date" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-primary" type="button"  onclick="toSubmit()">Submit</button>
                    <button style="display: none" class="btn btn-primary" type="button" onclick="toSave()">Simpan</button>
                    <button style="display: none" class="btn btn-primary" type="button" onclick="toUpdate()">Simpan</button>
                    <button style="display: none" class="btn btn-primary" type="button" onclick="toDelete()">Hapus</button>
                    <button style="display: none" class="btn btn-primary " type="button" onclick="toCancel()">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('lov/lov_year_period'); ?>
<?php $this->load->view('lov/lov_finance_period'); ?> 
<?php $this->load->view('lov/lov_ppat'); ?> 

<script >
    //tanggal 
    $('.datepicker1').datetimepicker({
        format: 'YYYY-MM-DD',
        // defaultDate: new Date()
    });

    $('.datepicker').datetimepicker({
        format: 'DD-MMM-YYYY',
         defaultDate: new Date()
    });

    $("#p_year_period_id").on('change', function() { 
        $('#p_finance_period_id').val('');
        $('#finance_period_code').val('');
    });


    $("#btn-lov-period").on('click', function() { 
        modal_year_period_show('p_year_period_id','year_code');        
    });

    $("#btn-lov-bulan").on('click', function() { 
        var tahun_id =$('#p_year_period_id').val();
        if (tahun_id==null||tahun_id==0){
            swal('Informasi','Periode Tahun Harus Diisi','info');
            return ;
        }else{
            modal_finance_period_show('p_finance_period_id', 'finance_period_code',tahun_id , '','');  
        }
             
    });


    $("#p_year_period_id_ajb").on('change', function() { 
        $('#p_finance_period_id_ajb').val('');
        $('#finance_period_code_ajb').val('');
    });

    $("#btn-lov-period-ajb").on('click', function() { 
        modal_year_period_show('p_year_period_id_ajb','year_code_ajb');        
    });

    $("#btn-lov-bulan-ajb").on('click', function() { 
        var tahun_id =$('#p_year_period_id_ajb').val();
        if (tahun_id==null||tahun_id==0){
            swal('Informasi','Periode Tahun Harus Diisi','info');
            return;
        }else{
            modal_finance_period_show('p_finance_period_id_ajb', 'finance_period_code_ajb',tahun_id , '','');  
        }
             
    });

    $("#btn-lov-name").on('click', function() { 
        modal_lov_ppat_show('t_ppat_id','ppat_name','address_name');        
    });

    
</script>



<script>
    function toSubmit(){
        var t_ppat_id               = $('#t_ppat_id').val();
        var ppat_name               = $('#ppat_name').val();
        var address_name            = $('#address_name').val();
        var no_sk                   = $('#no_sk').val();
        var p_finance_period_id     = $('#p_finance_period_id').val();
        var sanksi_ajb              = $('#sanksi_ajb').val();
        //var created_by              = $('#created_by').val();
        var p_finance_period_id_ajb = $('#p_finance_period_id_ajb').val();


        if ((t_ppat_id==''||ppat_name=='')&&address_name==''&&no_sk==''){
            swal ( "Oopss" ,  "Nama,Alamat Dan No SK wajib Diisi" ,  "error" );
            return;
        }

        if (p_finance_period_id==''&&p_finance_period_id_ajb==''){
            swal ( "Oopss" ,  "Harap isi Denda atas Pelaporan Bulan atau Denda atas AJB atau isi keduanya" ,  "error" );
            return;
        }

        if (p_finance_period_id_ajb=='' && sanksi_ajb!=''){
            swal ( "Oopss" ,  "Jika mengisi denda AJB, harap isi Tahun dan Bulan denda AJB" ,  "error" );
            return;
        }

        if (p_finance_period_id_ajb!='' && sanksi_ajb==''){
            swal ( "Oopss" ,  "Jika Mengisi Tahun Dan Bulan AJB Harap ISI Denda AJB" ,  "error" );
            return;
        }


        var var_url = "<?php echo WS_JQGRID . "transaksi.t_vat_setllement_ppat_controller/submit/?"; ?>";
        var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";

        var_url += "&t_ppat_id=" + t_ppat_id;
        var_url += "&ppat_name=" + ppat_name;
        var_url += "&address_name=" + address_name;
        var_url += "&no_sk=" + no_sk;
        var_url += "&p_finance_period_id=" + p_finance_period_id;
        var_url += "&sanksi_ajb=" + sanksi_ajb;
        //var_url += "&created_by=" + created_by;
        var_url += "&p_finance_period_id_ajb=" + p_finance_period_id_ajb;
        //alert(var_url);
            
            
            
        $.getJSON(var_url, function( items ) {
            if(items.rows.o_cust_order_id!=""||items.rows.o_cust_order_id!=null){
                showDenda(items.rows.o_cust_order_id);      
            }

            if(items.rows.o_cust_order_id_ajb!=""||items.rows.o_cust_order_id_ajb!=null){
                showDenda(items.rows.o_cust_order_id_ajb);
            }

            swal('Informasi',items.rows.o_mess,'info');

            //jika berhasil from di set kosong 
            if(items.rows.o_cust_order_id_ajb!=""||items.rows.o_cust_order_id!=null){
                $('#t_ppat_id').val('');
                $('#ppat_name').val('');
                $('#address_name').val('');
                $('#no_sk').val('');
                $('#p_year_period_id').val('');
                $('#year_code').val('');
                $('#p_finance_period_id').val('');
                $('#finance_period_code').val('');
                $('#sanksi_ajb').val('');
                $('#p_year_period_id_ajb').val('');
                $('#year_code_ajb').val('');
                $('#p_finance_period_id_ajb').val('');
                $('#finance_period_code_ajb').val('');
            }
            
        })
    }

    function showDenda(id){

        if (id!=null){
            var url = "<?php echo base_url(); ?>"+"cetak_formulir_surat_tagihan_denda_profesi/save_pdf?";
            url += "t_customer_order_id=" + id;
            openInNewTab(url);
        }

        
    }


    function openInNewTab(url) {
      window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');
    }

</script>
