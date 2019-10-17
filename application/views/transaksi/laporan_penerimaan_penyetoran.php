<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Buku Penerimaan dan Penyetoran</span>
        </li>
    </ul>
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">                    
                    <span class="caption-subject font-blue bold uppercase">Buku Penerimaan dan Penyetoran
                    </span>
                </div>
            </div>
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-2">Periode Tahun</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_year_period_id" type="text"  style="display:none;">
                            <input id="form_year_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Periode Tahun">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button"  onclick="showLOVYearPeriod('form_year_period_id','form_year_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Periode</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_finance_period_id" type="text"  style="display:none;">
                            <input id="form_finance_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Periode">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-period" onclick="showLOVFinancePeriod('form_finance_period_id','form_finance_code', 'valid_from', 'valid_to')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="space-2"></div>
                <div class="row col-md-offset-3">
                    <button class="btn btn-primary" type="button" onclick="toPDF()">PDF</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php $this->load->view('lov/lov_year_period'); ?>    
    <?php $this->load->view('lov/lov_finance_period'); ?>
<script>
    function showLOVYearPeriod(id, code) {
        modal_year_period_show(id, code);
    }

    function showLOVFinancePeriod(id, code, start_date,end_date) {
        if ($('#form_year_period_id').val()=='' || $('#form_year_period_id').val()==0 ) {
            swal('Informasi','Periode Tahun Harus Diisi','info');
            return false;
        } else {
            modal_finance_period_show(id, code, $('#form_year_period_id').val(), start_date,end_date);
        } 
    }

    function toPDF(){
        if ($('#form_finance_period_id').val()=='' || $('#form_finance_period_id').val()==0 ) {
            swal('Informasi','Periode Harus Diisi','info');
            return false;
        } else {
            var url = "<?php echo base_url(); ?>"+"pdf_lap_penerimaan_penyetoran/save_pdf?";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&period=" + $('#form_finance_code').val();
            url += "&finance_period_id=" + $('#form_finance_period_id').val();
            openInNewTab(url);
        }
    }

    function openInNewTab(url) {
        window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');
    }
</script>