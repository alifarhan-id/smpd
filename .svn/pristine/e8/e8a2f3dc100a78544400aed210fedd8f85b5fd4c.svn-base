<div class="page-bar">
    <ul class="page-breadcrumb">
        <li> 
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>CETAK ULANG REKAP SURAT TEGURAN </span>
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
                    <span class="caption-subject font-blue bold uppercase">CETAK ULANG REKAP SURAT TEGURAN 
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
</script>
<script>

    function openInNewTab(url) {
        window.open(url, 'No Payment', 'left=0,top=0,width=500,height=500,toolbar=no,scrollbars=yes,resizable=yes');
    }

    $('#cetakPDF').on('click', function() {
    
        p_year_period_id = $("#p_year_period_id").val();
        p_finance_period_id= $("#p_finance_period_id").val();
        sequence_no = $("#surat_teguran").val();
        p_vat_type_id = $("#p_vat_type_id").val();
        if(p_year_period_id == "" || p_finance_period_id == "" || sequence_no == "" || p_vat_type_id == "" ) {
            swal('Oopss', 'Semua Filter Harus Diisi', 'error');
        }else {

            url = "<?php echo base_url(); ?>"+"view_ulang_daftar_surat_teguran_pdf/pageCetak?p_year_period_id=" + p_year_period_id + 
                         "&p_finance_period_id=" + p_finance_period_id+
                         "&sequence_no=" + sequence_no +
                         "&p_vat_type_id="+p_vat_type_id;
            openInNewTab(url);
        }
    });

</script>