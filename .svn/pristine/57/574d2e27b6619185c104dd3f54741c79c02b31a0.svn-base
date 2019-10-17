<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Laporan Harian BDHR</span>
        </li>
    </ul> 
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">                    
                    <label class="control-label col-md-2">Tanggal Penerimaan</label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="tgl_penerimaan" id="tgl_penerimaan" required="">                 
                        </div>
                    </div>
                    <label class="control-label col-md-2">Bank Penerimaan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select id="kode_bank" name="kode_bank" class="FormElement form-control" >
                                <option selected="" value="">Semua</option>
                                <option value="0000">BENDAHARA PENERIMA</option>
                                <option value="110">BJB</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-danger" type="button" onclick="print_pdf()" id="pdf">Tampilkan</button>
                    </div>
                </div>                
                <div class="space-2"></div>
                
            </div>
        </div>       
    </div>    
</div>



<script> 
    $('#tgl_penerimaan').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });
</script>


<script>
    function print_pdf(){
        var tgl_penerimaan  = $('#tgl_penerimaan').val();        
        var kode_bank       = $('#kode_bank').val();
        if(tgl_penerimaan == ""){
            swal ( "Oopss" ,  "Kolom Tanggal Tidak Boleh Kosong!" ,  "error" );           
        }else{
            url = '<?php echo base_url(); ?>'+'pdf_lap_bdhr/save_pdf_t_rep_lap_bdhr/'+tgl_penerimaan+'/'+kode_bank;
            openInNewTab(url);

        }


        
    }
    
    function openInNewTab(url) {
        // window.open("../report/cetak_rep_lap_harian_bdhr.php?tgl_penerimaan='" + tgl_penerimaan + "'&kabid=T"+ "&kode_bank="+kode_bank, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
      window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');
      // win.focus();
    }

</script>
