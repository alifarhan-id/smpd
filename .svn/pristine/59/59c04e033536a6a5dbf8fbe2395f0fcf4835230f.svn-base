<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>LAPORAN SKPD</span>
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
                    <span class="caption-subject font-blue bold uppercase">LAPORAN SKPD
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <div class="form-horizontal">
                    <div class="form-group">
                    <label class="control-label col-md-2">Periode Tahun</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_year_period_id" type="text"  style="display:none;" onchange="setPeriodeBulan(this.value);">
                            <input id="form_year_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Periode Tahun">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button"  onclick="showLOVYearPeriod('form_year_period_id','form_year_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Periode Bulan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_finance_period_id" type="text"  style="display:none;">
                            <input id="form_finance_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Periode Bulan">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-period" onclick="showLOVFinancePeriod('form_finance_period_id','form_finance_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>  
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                        <div class="col-md-offset-3">
                            <!--<button class="btn btn-danger" id="cetak">Tampilkan</button>-->
                            <button class="btn btn-danger" id="cetakExcel">Cetak Excel</button>
                            <button class="btn btn-danger" id="cetakPDF" onclick="cetakPDF()">Cetak PDF</button>
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
    <?php $this->load->view('lov/lov_year_period'); ?>
    <?php $this->load->view('lov/lov_finance_period'); ?>
<!--- lov -->
<script>
    function setPeriodeBulan(id){
        $('#form_finance_period_id').val('');
        $('#form_finance_code').val('');
    }
    function showLOVYearPeriod(id, code) {
        modal_year_period_show(id, code);
    }

    function showLOVFinancePeriod(id, code) {
        if($('#form_year_period_id').val()==0 || $('#form_year_period_id').val()==''||$('#form_year_period_id').val()==null||$('#form_year_period_id').val()==undefined||$('#form_year_period_id').val()==false){

                swal('Peringatan', 'Periode Tahun Harus Diisi', 'error');
                return;
            }
        modal_finance_period_show(id, code, $('#form_year_period_id').val());
    }

    function openInNewTab(url) {
        window.open(url, 'No Payment', 'left=0,top=0,width=500,height=500,toolbar=no,scrollbars=yes,resizable=yes');
    }

    function cetakPDF() {
        var form_finance_period_id      = $('#form_finance_period_id').val();
        var form_finance_code      = $('#form_finance_code').val();
        var form_year_period_id  = $('#form_year_period_id').val();
        var form_year_code  = $('#form_year_code').val();
        //alert(form_finance_period_id+" "+form_finance_code);
        if((form_year_period_id == "" || form_year_period_id == 0) || (form_finance_period_id == "" || form_finance_period_id == 0)){            
            swal ( "Oopss" ,  "Semua Filter Harus Diisi" ,  "error" );
        }else{
            url = "<?php echo base_url(); ?>"+"pdf_lap_tanggungjawab_bendahara_skpd/pageCetak?p_year_period_id="+form_year_period_id+"&p_finance_period_code="+form_finance_code+"&form_finance_period_id="+form_finance_period_id+"&form_year_code="+form_year_code;
            openInNewTab(url);
        }
    }
</script>
<script>
//T_bphtb_delete_list_controller
    $('#gview_grid-table').hide();
    jQuery(function ($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."pelaporan.t_monitoring_pendaftaran_new_per_tanggal_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [ 
                {label: 'NO ORDER',name: 'nomor_order',width: 120,sorttype: 'text'},
                {label: 'NPWPD',name: 'npwpd',width: 150,sorttype: 'text'}, 
                {label: 'NAMA WP',name: 'nama',width: 200,sorttype: 'text'},
                {label: 'ALAMAT',name: 'alamat',width: 250,sorttype: 'text'},
                {label: 'TANGGAL DIBUAT ',name: 'tanggal_dibuat',width: 150,sorttype: 'text'},
                {label: 'VERIFIKASI PENDAFTARAN WP',name: 'verifikasi_pendaftaran_wp',width: 250,sorttype: 'text'},
                {label: 'DISPOSISI BAP',name: 'disposisi_bap',width: 200,sorttype: 'text'},
                {label: 'BERITA ACARA PEMERIKSAAN',name: 'berita_acara_pemeriksaan',width: 250,sorttype: 'text'},
                {label: 'DRAFT PENGUKUHAN',name: 'draft_pengukuhan',width: 200,sorttype: 'text'},
                {label: 'APPROVAL KASI PENDAFTARAN DAN PENDATAAN',name: 'approval_kasi_pendaftaran_dan_pendataan',width: 370,sorttype: 'text'},
                {label: 'APPROVAL KABID PAJAK PENDAFTARAN',name: 'approval_kabid_pajak_pendaftaran',width: 280,sorttype: 'text'},
                {label: 'APPROVAL KADIS PELAYANAN PAJAK',name: 'approval_kadis_pelayanan_pajak',width: 280,sorttype: 'text'},
                {label: 'PENYERAHAN SURAT PENGUKUHAN',name: 'penyerahan_surat_pengukuhan',width: 280,sorttype: 'text'},
                {label: 'DURASI S/D PENGUKUHAN',name: 'durasi_sd_pengukuhan',width: 200,align: 'right',formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}},
                {label: 'DURASI S/D PENYERAHAN',name: 'durasi_sd_penyerahan',width: 200,align: 'right',formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}}
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 10,
            rowList: [10, 20, 50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            footerrow: false,
            //pager: '#grid-pager',
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }
            },
            caption: "INFORMASI MONITORING"
        });
    });


    $('#cetak').on('click', function() {
       // showData();
    });

    function showData(){
        var date_start_laporan = $('#date_start_laporan').val();
        var date_end_laporan = $('#date_end_laporan').val();
        var newdatestart = date_start_laporan.split("-").reverse().join("-");
        var newdateend = date_end_laporan.split("-").reverse().join("-");

        if(newdatestart > newdateend){
            swal('Informasi','Periksa Kembali inputan Tanggal', 'info');
        }else if(date_start_laporan == '' || date_end_laporan == ''){
            swal('Informasi','Filter Yang Berwarna Kuning Harus Diisi', 'info');
        }else{
            $('#gview_grid-table').show();
            jQuery(function($) {
                var grid_selector = "#grid-table";

                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."pelaporan.t_monitoring_pendaftaran_new_per_tanggal_controller/read"; ?>',
                    postData:{date_start_laporan : date_start_laporan,
                          date_end_laporan : date_end_laporan,
                          p_vat_type_id : $('#p_vat_type_id').val(),
                          nilai : $('#nilai').val()}
                });
                $("#grid-table").jqGrid("setCaption", "INFORMASI MONITORING");
                $("#grid-table").trigger("reloadGrid");
            });
        }
    }

    $('#cetakExcel').on('click', function() {
    
        var form_finance_period_id      = $('#form_finance_period_id').val();
        var form_finance_code      = $('#form_finance_code').val();
        var form_year_period_id  = $('#form_year_period_id').val();
        var form_year_code  = $('#form_year_code').val();
        //alert(form_finance_period_id+" "+form_finance_code);

        if((form_year_period_id == "" || form_year_period_id == 0) || (form_finance_period_id == "" || form_finance_period_id == 0)){            
            swal ( "Oopss" ,  "Semua Filter Harus Diisi" ,  "error" );
        }else{
            var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_skpd_pad_controller/excel/?"; ?>";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&p_year_period_id=" + form_year_period_id;
            url += "&p_finance_period_code=" + form_finance_code;
            url += "&form_finance_period_id=" + form_finance_period_id;
            url += "&form_year_code=" + form_year_code;
                //alert(url);
            window.location = url;
        }
    });

    /*$('.datepicker').datepicker({
        todayHighlight: true,
        format: "dd-mm-yyyy",
        autoclose: true
    });*/

</script>