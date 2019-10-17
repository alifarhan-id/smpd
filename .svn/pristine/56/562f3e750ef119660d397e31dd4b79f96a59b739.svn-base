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
            <span>Laporan Penerimaan Global Per Wp Per Wilayah</span>
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
                    <span class="caption-subject font-blue bold uppercase"> LAPORAN PENERIMAAN GLOBAL PER WP PER WILAYAH
                    </span>
                </div>
            </div>
            <!-- CONTENT  value="2015-09-01" -->
            
            
            <div class="form-body">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-2">Jenis Pajak
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="hidden" class="form-control required"  name="p_rqst_type_id" id="p_rqst_type_id" readonly>
                                <input type="text" class="form-control required" name="rqst_type_code" id="rqst_type_code" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Tanggal</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker1 required" required name="date_start_laporan" id="date_start_laporan"  >
                        </div>
                    </div>
                    <label class="control-label col-md-1">s/d</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker1 required" required name="date_end_laporan" id="date_end_laporan"  >
                        </div>
                    </div>
                </div>

                <div class="space-2"></div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-2">Wilayah
                        </label>
                        <div class="col-md-3">
                            <div id="comboWilayah"></div>
                            <!-- <select name='kode_wilayah' id='kode_wilayah' class='form-control required' required>
                                <option  value="">Select Value</option>
                                <option  value="GLTRW">Gili terawangan</option>
                                <option  value="GLMNO">Gili Meno</option>
                                <option  value="GLAIR">Gili Air</option>
                            </select> -->
                        </div>
                    </div>
                </div>

                <div class="space-2"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-danger" type="button" onclick="toExcel()" id="excel">Download Excel</button>
                    <button class="btn btn-primary" type="button" onclick="toPDF()" id="pdf">Download PDF</button>
                    <button class="btn btn-outline green" type="button" style="display: none" id="tampil">Tampilkan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('lov/lov_vat_type'); ?>

<script >
    //tanggal
    $('.datepicker1').datetimepicker({
        format: 'YYYY-MM-DD',
        // defaultDate: new Date()
    });

    $.ajax({
        url: "<?php echo base_url()."transaksi/business_area_combo"; ?>" ,
        type: "POST",
        data: {},
        success: function (data) {
            $("#comboWilayah").html(data);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    $("#btn-lov").on('click', function() {
        modal_lov_vat_show('p_rqst_type_id','rqst_type_code');
    });

    function toExcel(){
        var date_start_laporan        = $('#date_start_laporan').val();
        var date_end_laporan          = $('#date_end_laporan').val();
        var p_rqst_type_id            = $('#p_rqst_type_id').val();
        var rqst_type_code            = $('#rqst_type_code').val();
        var kode_wilayah              = $('#kode_wilayah').val();


        if( date_start_laporan == "" || date_end_laporan == ""  || p_rqst_type_id == "" || kode_wilayah == ""){
            swal ( "Oopss" ,  "Semua Harus Diisi" ,  "error" );
            return;
        }else{

            var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_global_per_wp_per_wilayah_controller/excel/?"; ?>";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&date_start_laporan=" + date_start_laporan;
            url += "&date_end_laporan=" + date_end_laporan;
            url += "&p_rqst_type_id=" + p_rqst_type_id;
            url += "&rqst_type_code=" + rqst_type_code;
            url += "&kode_wilayah=" + kode_wilayah;

            /*if (date_end_laporan < date_start_laporan){
                swal ( "Oopss" ,  "Tanggal awal harus lebih besar dari tanggal akhir" ,  "error" );
                return;
            }else{*/
                window.location = url;
            // }

        }
    }


    function toPDF(){
        var date_start_laporan        = $('#date_start_laporan').val();
        var date_end_laporan          = $('#date_end_laporan').val();
        var p_rqst_type_id            = $('#p_rqst_type_id').val();
        var rqst_type_code            = $('#rqst_type_code').val();
        var kode_wilayah              = $('#kode_wilayah').val();

        if(date_start_laporan == "" || date_end_laporan == ""  || p_rqst_type_id == "" || kode_wilayah == ""){
            swal ( "Oopss" ,  "Semua Harus Diisi" ,  "error" );
            return;
        }else{

            var url = "<?php echo base_url(); ?>"+"pdf_t_laporan_global_per_wp_per_wilayah/save_pdf?";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&date_start_laporan=" + date_start_laporan;
            url += "&date_end_laporan=" + date_end_laporan;
            url += "&p_rqst_type_id=" + p_rqst_type_id;
            url += "&rqst_type_code=" + rqst_type_code;
            url += "&kode_wilayah=" + kode_wilayah;

            /*if (date_end_laporan < date_start_laporan){
                swal ( "Oopss" ,  "Tanggal awal harus lebih besar dari tanggal akhir" ,  "error" );
                return;
            }else{*/
                openInNewTab(url);
            // }
        }



    }

    function openInNewTab(url) {
      window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');
    }

</script>