<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>LAPORAN PENCETAKAN HARIAN PENERIMAAN SPTPD</span>
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
                    <span class="caption-subject font-blue bold uppercase">LAPORAN PENCETAKAN HARIAN PENERIMAAN SPTPD
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">Tanggal
                        </label>
                        <div class="col-md-3">
                            <input class="form-control datepicker required " type="text" value=""
                                   id="date_start_laporan" name="date_start_laporan">
                        </div>
                        <label class=" contol-label col-xs-1"><span>s.d.</span></label>
                        <div class="col-md-3">
                            <input class="form-control datepicker required" type="text" value=""
                                   id="date_end_laporan" name="date_end_laporan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Jenis Pajak
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="hidden" class="form-control required " maxlength="8" name="p_vat_type_id" id="p_vat_type_id" readonly>
                                <input type="text" class="form-control required " name="vat_code" id="vat_code" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-jenis-pajak">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3">
                            <button class="btn btn-danger" id="cetakExcel">Download Excel</button>
                            <button class="btn btn-danger" id="cetakPDF" onclick="cetakPDF()">Download PDF</button>
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
<!--- lov -->
<script>

    $("#btn-lov-jenis-pajak").on('click', function() {   
        modal_lov_vat_show('p_vat_type_id','vat_code');
    });

    function openInNewTab(url) {
        window.open(url, 'No Payment', 'left=0,top=0,width=500,height=500,toolbar=no,scrollbars=yes,resizable=yes');
    }

    function cetakPDF() {
        var date_start_laporan      = $('#date_start_laporan').val();
        var date_end_laporan        = $('#date_end_laporan').val();
        var p_vat_type_id           = $('#p_vat_type_id').val();
        
        url = "<?php echo base_url(); ?>"+"print_laporan_harian_sptpd_pdf/pageCetak?date_start_laporan="+date_start_laporan+"&date_end_laporan="+date_end_laporan+"&p_vat_type_id="+p_vat_type_id;
        openInNewTab(url);
    }
</script>
<script>

    $('#cetakExcel').on('click', function() {
    
        var date_start_laporan      = $('#date_start_laporan').val();
        var date_end_laporan        = $('#date_end_laporan').val();
        var p_vat_type_id           = $('#p_vat_type_id').val();
        if(date_start_laporan == "" || date_end_laporan == "" || p_vat_type_id == '' || p_vat_type_id == 0){            
            swal ( "Oopss" ,  "Semua Filter Yang Berwarna Kuning Harus Diisi" ,  "error" );
        }else{
            if (date_end_laporan < date_start_laporan){
                swal ( "Oopss" ,  "Tanggal akhir harus lebih besar dari tanggal awal ! " ,  "error" );
                return;
            }else{
                var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_harian_sptpd_controller/excel/?"; ?>";
                url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
                url += "&date_start_laporan=" + date_start_laporan;
                url += "&date_end_laporan=" + date_end_laporan;
                url += "&p_vat_type_id=" + p_vat_type_id;
                //alert(url);
                window.location = url;
            }
        }
    });

    $('.datepicker').datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true
    });

</script>