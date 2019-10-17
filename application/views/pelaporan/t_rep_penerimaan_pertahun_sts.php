<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Laporan Posisi WP Belum Bayar</span>
        </li>
    </ul> 
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
                    <label class="control-label col-md-2">Jenis Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_vat_id" type="hidden">
                            <input id="form_vat_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Jenis Pajak">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVVat_type('form_vat_id','form_vat_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <label class="control-label col-md-2">Periode Tahun</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_year_period_id" type="hidden" name="form_year_period_id">
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
                    <label class="control-label col-md-2">Periode Piutang</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="start_piutang" id="start_piutang">                 
                        </div>
                    </div>
                    <label class="control-label col-md-2">s/d</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="end_piutang" id="end_piutang">                 
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Tanggal Status</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="tgl_status" id="tgl_status">
                        </div>
                    </div>
                    <label class="control-label col-md-2">Status WP</label>
                    <div class="col-md-3">                        
                        <div class="input-group">
                            <input id="form_account_status_id" type="hidden">
                            <input id="form_status_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Status WP">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button"  onclick="showAccStatus('form_account_status_id','form_status_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>           
                <div class="space-2"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-danger" type="button" id="btn-search" onclick="print_pdf_wp()">Download PDF</button>
                    <button class="btn btn-danger" type="button" onclick="excel_get_wp()" id="excel">Download Excel</button>
                </div>
            </div>
        </div>       
    </div>    
</div>
<?php $this->load->view('lov/lov_year_period'); ?>
<?php $this->load->view('lov/lov_vat_type'); ?>
<?php $this->load->view('lov/lov_account_status'); ?>


<script> 
    $('#tgl_penerimaan').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });

    $('#start_piutang').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });

    $('#end_piutang').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });

    $('#tgl_status').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });
</script>

<script type="text/javascript">
    function showAccStatus(id, code) {
        modal_account_status_show(id, code);
    }

    function showLOVVat_type(id, code) {
        modal_lov_vat_show(id, code);
    }

    function showLOVYearPeriod(id, code) {
        modal_year_period_show(id, code);
    }

    function excel_get_wp(){
        var p_vat_type_id       = $('#form_vat_id').val();        
        var p_year_period_id    = $('#form_year_period_id').val();
        var start_piutang       = $('#start_piutang').val();
        var end_piutang         = $('#end_piutang').val();
        var tgl_status          = $('#tgl_status').val();
        var p_account_status_id = $('#form_account_status_id').val();
        //alert(p_vat_type_id);

        if(p_vat_type_id == "" || p_year_period_id == ""){
            swal ( "Oopss" ,  "Kolom Filter Tidak Boleh Kosong!" ,  "error" );           
        }else{
            var url = "<?php echo WS_JQGRID . "pelaporan.t_rep_penerimaan_pertahun_sts_controller/excel/?"; ?>";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&p_vat_type_id=" + p_vat_type_id;
            url += "&p_year_period_id=" + p_year_period_id;
            url += "&start_piutang="+start_piutang;
            url += "&end_piutang="+end_piutang;
            url += "&tgl_status="+tgl_status;
            url += "&p_account_status_id="+p_account_status_id;
            //alert(url);

            /*if (end_piutang < start_piutang){
                swal ( "Oopss" ,  "Tanggal awal harus lebih besar dari tanggal akhir" ,  "error" );
                return;
            }else{*/
                window.location = url;
            // }
        }

    }

    function print_pdf_wp(){
        var p_vat_type_id       = $('#form_vat_id').val();        
        var p_year_period_id    = $('#form_year_period_id').val();
        var start_piutang       = $('#start_piutang').val();
        var end_piutang         = $('#end_piutang').val();
        var tgl_status          = $('#tgl_status').val();
        var p_account_status_id = $('#form_account_status_id').val();
        //alert(p_vat_type_id+" "+p_year_period_id+" "+start_piutang+" "+end_piutang+" "+tgl_status+" "+p_account_status_id);

        if(p_vat_type_id == "" || p_year_period_id == ""){
            swal ( "Oopss" ,  "Kolom Filter Tidak Boleh Kosong!" ,  "error" );           
        }else{
            var url = "<?php echo base_url(); ?>"+"pdf_lap_penerimaan_pertahun_sts/save_pdf_t_rep_penerimaan_pertahun_sts?";
            url += "p_vat_type_id=" + p_vat_type_id;
            url += "&p_year_period_id=" + p_year_period_id;
            url += "&start_piutang="+start_piutang ;
            url += "&end_piutang="+end_piutang ;
            url += "&tgl_status="+tgl_status ;
            url += "&p_account_status_id="+p_account_status_id ;
           // url += "&FLAG=1" ;

            /*if (end_piutang < start_piutang){
                swal ( "Oopss" ,  "Tanggal awal harus lebih besar dari tanggal akhir" ,  "error" );
                return;
            }else{*/
                openInNewTab(url);
            // }
            

        }


        
    }
    
    function openInNewTab(url) {
        // window.open("../report/cetak_rep_lap_harian_bdhr.php?tgl_penerimaan='" + tgl_penerimaan + "'&kabid=T"+ "&kode_bank="+kode_bank, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
      window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');
      // win.focus();
    }
</script>