<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>CETAK ULANG SURAT TEGURAN</span>
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
                    <span class="caption-subject font-blue bold uppercase">CETAK ULANG SURAT TEGURAN
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">Jenis Pajak
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="hidden" class="form-control required" maxlength="8" name="p_vat_type_id" id="p_vat_type_id" readonly>
                                <input type="text" class="form-control required" name="vat_code" id="vat_code" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-jenis-pajak">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Periode Tahun
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="hidden" class="form-control required" maxlength="8" name="p_year_period_id" id="p_year_period_id" readonly>
                                <input type="text" class="form-control required" name="year_code" id="year_code" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-year-period">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Periode Pajak
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="hidden" class="form-control required" maxlength="8" name="p_finance_period_id" id="p_finance_period_id" readonly>
                                <input type="text" class="form-control required" name="code" id="code" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-finance-period">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Surat Teguran ke
                        </label>
                        <div class="col-md-3">
                           <select name="surat_teguran" id="surat_teguran" class='form-control required'>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                           </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Pejabat Penanda
                        </label>
                        <div class="col-md-3">
                           <select name="pejabat" id="pejabat" class='form-control required'>
                               <option value="1">Drs. H. GUN GUN SUMARYANA</option>
                               <option value="2">H. SONI BAKHTIAR, S.Sos, M.Si.</option>
                               <option value="3">Drs. H. EMA SUMARNA, M. Si</option>
                           </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Jenis WP
                        </label>
                        <div class="col-md-3">
                           <select name="jenis_wp" id="jenis_wp" class='form-control required'>
                               <option value="1">Semua</option>
                               <option value="2">Non NPWPD Jabatan</option>
                               <option value="3">Hanya NPWPD Jabatan</option>
                           </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">No Surat
                        </label>
                        <div class="col-md-3">
                           <input type="text" class="form-control" name="no_surat" id="no_surat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Kecamatan
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="hidden" class="form-control" maxlength="8" name="wp_p_region_id_kec" id="wp_p_region_id_kec">
                                <input type="text" class="form-control" name="wp_kecamatan" id="wp_kecamatan">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-kec">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Kelurahan
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="hidden" class="form-control" maxlength="8" name="wp_p_region_id_kel" id="wp_p_region_id_kel">
                                <input type="text" class="form-control" name="wp_kelurahan" id="wp_kelurahan">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-kel">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-5">
                            <button class="btn btn-danger" id="cetakPDF">Tampilkan PDF</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                     <div class="col-xs-12">
                        <div id="gbox_grid-table" class="ui-jqgrid">
                            <div id="gview_grid-table" class="ui-jqgrid-view table-responsive" role="grid">
                                <table id="grid-table"></table>
                                <div id="grid-pager"></div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('lov/lov_vat_type'); ?>
<?php $this->load->view('lov/lov_year_period'); ?>
<?php $this->load->view('lov/lov_finance_period'); ?>
<?php $this->load->view('lov/lov_kec'); ?>
<?php $this->load->view('lov/lov_kel'); ?>
<!--- lov -->
<script>
    $("#btn-lov-jenis-pajak").on('click', function() {   
        modal_lov_vat_show('p_vat_type_id','vat_code');
    });

    $("#btn-lov-year-period").on('click', function() {   
        modal_year_period_show('p_year_period_id','year_code');
    });

    $("#btn-lov-finance-period").on('click', function() {   
        var periode = $('#p_year_period_id').val();
        if( periode == null || periode == ''){
            swal({title: "Error!", text: "Isi Periode Tahun Terlebih Dahulu", html: true, type: "error"});
             return;
        }
        modal_finance_period_show('p_finance_period_id','code', periode);
    });

    $("#btn-lov-kec").on('click', function() {  
        var kota = 749; 
        modal_lov_kecamatan_show('wp_p_region_id_kec','wp_kecamatan', kota);
    });

    $("#btn-lov-kel").on('click', function() {   
        var kec = $('#wp_p_region_id_kec').val();
        if( kec == null || kec == ''){
            swal({title: "Error!", text: "Isi Kecamatan Terlebih Dahulu", html: true, type: "error"});
             return;
        }
        modal_lov_kelurahan_show('wp_p_region_id_kel','wp_kelurahan', kec);
    });

    /*$('#p_vat_type_id').on('change', function() {
        $('#p_vat_type_id').val('');
        $('#vat_code').val('');
    });*/
</script>
<script>

    function openInNewTab(url) {
        window.open(url, 'No Payment', 'left=0,top=0,width=500,height=500,toolbar=no,scrollbars=yes,resizable=yes');
    }

    $('#cetakPDF').on('click', function() {
    
        p_year_period_id = $("#p_year_period_id").val();
        p_finance_period_id= $("#p_finance_period_id").val();
        sequence_no = $("#surat_teguran").val();
        pejabat = $("#pejabat").val();
        p_vat_type_id = $("#p_vat_type_id").val();
        jenis_wp = $("#jenis_wp").val();
        no_surat = $("#no_surat").val();
        p_region_id_kecamatan = $("#wp_p_region_id_kec").val();
        p_region_id_kelurahan = $("#wp_p_region_id_kel").val();
        if(p_year_period_id == "" || p_finance_period_id == "" || sequence_no == "" || p_vat_type_id == "" ) {
            swal('Oopss', 'Semua Filter Yang Berwarna Kuning Harus Diisi', 'error');
        }else {

            url = "<?php echo base_url(); ?>"+"cetak_ulang_formulir_surat_teguran_pdf/pageCetak?p_year_period_id=" + p_year_period_id + 
                         "&p_finance_period_id=" + p_finance_period_id+
                         "&sequence_no=" + sequence_no +
                         "&pejabat="+pejabat +
                         "&p_vat_type_id="+p_vat_type_id +
                         "&jenis_wp="+jenis_wp +
                         "&no_surat="+no_surat +
                         "&p_region_id_kecamatan="+p_region_id_kecamatan +
                         "&p_region_id_kelurahan="+p_region_id_kelurahan;
            openInNewTab(url);
        }
    });

</script>