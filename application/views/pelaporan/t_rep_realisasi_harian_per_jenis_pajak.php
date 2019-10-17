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
            <span>Laporan HARIAN PER JENIS PAJAK</span>
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
                    <span class="caption-subject font-blue bold uppercase"> Laporan HARIAN PER JENIS PAJAK
                    </span>
                </div>
            </div>
            <!-- CONTENT  value="2015-09-01" -->
            <div class="form-body">
                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Jenis Pajak
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="hidden" class="form-control required" required name="p_vat_type_id"  id="p_vat_type_id" readonly>
                                <input type="text" class="form-control required" required name="vat_code" id="vat_code" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-vat">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="space-2"></div>
                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Periode Tahun
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="hidden" class="form-control required" required name="p_year_period_id" id="p_year_period_id" readonly>
                                <input type="text" class="form-control required" name="year_code" required  id="year_code" readonly>
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
                    <label class="control-label col-md-2">Tanggal Penerimaan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker1 required" name="tgl_penerimaan" id="tgl_penerimaan" required >                 
                        </div>
                    </div>
                    <label class="control-label col-md-1">s/d</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker1 required" name="tgl_penerimaan_last" id="tgl_penerimaan_last" required >
                        </div>
                    </div>
                </div> 
                <div class="space-2"></div>
                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Jenis Setoran
                        </label>
                        <div class="col-md-3">
                            <select id="jenis_setoran" class="form-control required" name="jenis_setoran" required>
                                <option  value="">Pilih</option>
                                <option  value="1">POKOK</option>
                                <option  value="2">DENDA</option>
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="space-2"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-danger" type="button" onclick="toExcel()" >Download Excel</button>
                    <button class="btn btn-primary" type="button" onclick="toPDF()">Download PDF</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('lov/lov_vat_type'); ?>
<?php $this->load->view('lov/lov_year_period'); ?>

<script >
    //tanggal 
    $('.datepicker1').datetimepicker({
        format: 'DD-MM-YYYY',
        // defaultDate: new Date()
    });

    $('#table').css('display', 'none');

    $("#btn-lov-vat").on('click', function() { 
        modal_lov_vat_show('p_vat_type_id','vat_code');        
    });

    $("#btn-lov-period").on('click', function() { 
        modal_year_period_show('p_year_period_id','year_code');        
    });
    
</script>


<script>
    function toPDF(){
        var p_vat_type_id       = $('#p_vat_type_id').val();
        var p_year_period_id    = $('#p_year_period_id').val();
        var tgl_penerimaan      = $('#tgl_penerimaan').val();
        var tgl_penerimaan_last = $('#tgl_penerimaan_last').val();
        var jenis_setoran       = $('#jenis_setoran').val();        

        if(p_vat_type_id == "" || p_year_period_id == ""||tgl_penerimaan == ""||tgl_penerimaan_last == ""||jenis_setoran == "")
        {
            swal ( "Oopss" ,  "Semua Harus Terisi!" ,  "error" );
        }else
        {
            
            var url = "<?php echo base_url(); ?>"+"pdf_rep_realisasi_harian_per_jenis_pajak2/save_pdf?";
            url += "p_vat_type_id=" + p_vat_type_id;
            url += "&p_year_period_id=" + p_year_period_id;
            url += "&tgl_penerimaan='" + tgl_penerimaan;
            url += "'&tgl_penerimaan_last='" + tgl_penerimaan_last;
            url += "'&jenis_setoran=" + jenis_setoran;

            /*if (tgl_penerimaan_last < tgl_penerimaan){
                swal ( "Oopss" ,  "Tanggal akhir harus lebih besar atau sama dari tanggal awal" ,  "error" );
                return;
            }else{*/
                openInNewTab(url);
            //}
            
        }
    }
    

    function openInNewTab(url) {
      window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');
    }
</script>


<script>
    function toExcel(){
        var p_vat_type_id       = $('#p_vat_type_id').val();
        var p_year_period_id    = $('#p_year_period_id').val();
        var tgl_penerimaan      = $('#tgl_penerimaan').val();
        var tgl_penerimaan_last = $('#tgl_penerimaan_last').val();
        var jenis_setoran       = $('#jenis_setoran').val(); 
        var year_code       = $('#year_code').val(); 
        
        if(p_vat_type_id == "" || p_year_period_id == ""||tgl_penerimaan == ""||tgl_penerimaan_last == ""||jenis_setoran == ""){            
            swal ( "Oopss" ,  "Tidak Boleh Ada Kosong!" ,  "error" );
        }else{
            var url = "<?php echo WS_JQGRID . "pelaporan.t_rep_realisasi_harian_per_jenis_pajak_controller/excel/?"; ?>";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&p_vat_type_id=" + p_vat_type_id;
            url += "&p_year_period_id=" + p_year_period_id;
            url += "&tgl_penerimaan='" + tgl_penerimaan;
            url += "'&tgl_penerimaan_last='" + tgl_penerimaan_last;
            url += "'&jenis_setoran=" + jenis_setoran;
            url += "&year_date=" + year_code;

           /* if (tgl_penerimaan_last < tgl_penerimaan){
                swal ( "Oopss" ,  "Tanggal awal harus lebih besar dari tanggal akhir" ,  "error" );
                return;
            }else{*/
                window.location = url;
            // }
            
        }
    }
</script>