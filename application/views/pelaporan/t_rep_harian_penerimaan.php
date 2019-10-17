<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Laporan Pencetakan Harian Penerimaan</span>
        </li>
    </ul> 
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row col-md-offset-2">                    
                    <label class="control-label col-md-2">Tanggal</label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="start_date" id="start_date" required="">                 
                        </div>
                    </div>
                    <label class="control-label col-md-1">s/d</label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="end_date" id="end_date" required="">                 
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row col-md-offset-4">                   
                    <button class="btn btn-danger" type="button" onclick="pdf_summary()" id="pdf">Tampilkan Summary</button>
                    <button class="btn btn-danger" type="button" onclick="pdf_detail()" id="pdf">Tampilkan Detail</button>                    
                </div>                
                <div class="space-2"></div>
                
            </div>
        </div>       
    </div>    
</div>



<script> 
    $('#start_date').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });

    $('#end_date').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });
</script>


<script>
    function pdf_summary(){
        var start_date  = $('#start_date').val();        
        var end_date    = $('#end_date').val();

        if(start_date == "" && end_date == ""){
            swal ( "Oopss" ,  "Kolom Filter Tidak Boleh Kosong!" ,  "error" );           
        }else{
            url = '<?php echo base_url(); ?>'+'pdf_lap_harian_penerimaan_summary/save_pdf_t_rep_harian_penerimaan_summary/'+start_date+'/'+end_date;
            openInNewTab(url);
        }        
    }

    function pdf_detail(){
        var start_date  = $('#start_date').val();        
        var end_date    = $('#end_date').val();

        if(start_date == "" && end_date == ""){
            swal ( "Oopss" ,  "Kolom Filter Tidak Boleh Kosong!" ,  "error" );           
        }else{
            url = '<?php echo base_url(); ?>'+'pdf_lap_harian_penerimaan_detail/save_pdf_t_rep_harian_penerimaan_detail/'+start_date+'/'+end_date;
            openInNewTab(url);
        }        
    }
    
    function openInNewTab(url) {
        // window.open("../report/cetak_rep_lap_harian_bdhr.php?tgl_penerimaan='" + tgl_penerimaan + "'&kabid=T"+ "&kode_bank="+kode_bank, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
      window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');
      // win.focus();
    }



</script>
