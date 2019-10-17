<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>EXECUTIVE SUMMARY</span>
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
                    <span class="caption-subject font-blue bold uppercase">EXECUTIVE SUMMARY
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">Tahun
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
                        <label class="control-label col-md-2">Periode
                        </label>
                        <div class="col-md-3">
                           <select id= "period_type" name= "period_type" class='form-control required'>
                               <option value="">- Pilih Periode -</option>
                               <option value="1">Per Bulan</option>
                               <option value="2">Per Triwulan</option>
                               <option value="3">Per Semester</option>
                           </select>
                        </div>
                    </div>
                    <div class="form-group" id="bulan">
                        <label class="control-label col-md-2">Bulan
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
                    <div class="form-group" id="triwulan">
                        <label class="control-label col-md-2">Triwulan
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <select id= "triwulan_wp" name= "triwulan_wp" class='form-control required'>
                                   <option value="">- Pilih Triwulan -</option>
                                   <option value="1">I</option>
                                   <option value="2">II</option>
                                   <option value="3">III</option>
                                   <option value="4">IV</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="semester">
                        <label class="control-label col-md-2">Semester
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <select id= "semester_wp" name= "semester_wp" class='form-control required'>
                                   <option value="">- Pilih Semester -</option>
                                   <option value="1">I</option>
                                   <option value="2">II</option>
                               </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3">
                            <button class="btn btn-danger" id="cetakPDF" onclick="showForm()">Buat Laporan</button>
                        </div>
                    </div>
                </div>

                <div class="row" id="formLaporan" style="display: none;">
                     <div class="col-md-12">
                        <div class="portlet blue box menu-panel">
                            <div class="portlet-title">
                                <div class="caption">FORM LAPORAN EXECUTIVE SUMMARY</div>
                            </div>
                            <div class="portlet-body">   
                                <div class="form-horizontal">
                                    <div class="row">
                                        <!-- start subject -->
                                        <div class="form-group">
                                            <label class="control-label col-md-2 " id="alasan-text">   Penjelasan</label>
                                            <div class="col-md-4">
                                                <textarea class="form-control" name="penjelasan" id="penjelasan" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2 " id="alasan-text">Permasalahan</label>
                                            <div class="col-md-4">
                                                <textarea class="form-control" name="permasalahan" id="permasalahan" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2" id="alasan-text">Kesimpulan</label>
                                            <div class="col-md-4">
                                                <textarea class="form-control" name="kesimpulan" id="kesimpulan" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2 " id="alasan-text">Saran</label>
                                            <div class="col-md-4">
                                                <textarea class="form-control" name="saran" id="saran" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-2 col-md-9">
                                                    <button type="submit" class="btn  green " id="btn-save" onclick="save()"> Simpan                    
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Objek -->
                                    </div>
                                </div>
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

<script type="text/javascript">
    
    $('#bulan').hide();
    $('#triwulan').hide();
    $('#semester').hide();

    $('#period_type').on('change', function() {

        var period_type = $('#period_type').val();

        if(period_type == 1){
            $('#bulan').show();
            $('#triwulan').hide();
            $('#semester').hide();
        }else if(period_type == 2){
            $('#bulan').hide();
            $('#triwulan').show();
            $('#semester').hide();
        }else if(period_type == 3){
            $('#bulan').hide();
            $('#triwulan').hide();
            $('#semester').show();
        }
    });
</script>
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
            swal({title: "Error!", text: "Isi Tahun Terlebih Dahulu", html: true, type: "error"});
             return;
        }
        modal_finance_period_show('p_finance_period_id','code', periode);
    });

    function openInNewTab(url) {
        window.open(url, 'No Payment', 'left=0,top=0,width=500,height=500,toolbar=no,scrollbars=yes,resizable=yes');
    }

    function showForm() {
        document.getElementById('formLaporan').style.display = '';
    }

    function save(){
        var p_year_period_id = $('#p_year_period_id').val();
        var p_vat_type_id = $('#p_vat_type_id').val();
        var period_type = $('#period_type').val();
        var p_finance_period_id = $('#p_finance_period_id').val();
        var triwulan = $('#triwulan_wp').val();
        var semester = $('#semester_wp').val();
        var penjelasan = $('#penjelasan').val();
        var permasalahan = $('#permasalahan').val();
        var kesimpulan = $('#kesimpulan').val();
        var saran = $('#saran').val();

        if (p_year_period_id=='' || p_year_period_id == undefined || p_year_period_id == false) {
            swal('Peringatan', 'Periode Tahun Harus Diisi', 'error');
            return;
        }
        if (p_vat_type_id=='' || p_vat_type_id == undefined || p_vat_type_id == false) {
            swal('Peringatan', 'Jenis Pajak Harus Diisi', 'error');
            return;
        }
        if (period_type=='' || period_type == undefined || period_type == false) {
            swal('Peringatan', 'Periode Harus Diisi', 'error');
            return;
        }
        if (period_type == 1) {
            triwulan = '0';
            semester = '0';
            if (p_finance_period_id=='' || p_finance_period_id == undefined || p_finance_period_id == false) {
                swal('Peringatan', 'Bulan Harus Diisi', 'error');
                return;
            }
        } else if (period_type == 2) {
            bulan = '0';
            semester = '0';
            if (triwulan=='' || triwulan == undefined || triwulan == false) {
                swal('Peringatan', 'Triwulan Harus Diisi', 'error');
                return;
            }
        } else if (period_type == 3) {
            triwulan = '0';
            bulan = '0';
            if (semester=='' || semester == undefined || semester == false) {
                swal('Peringatan', 'Semester Harus Diisi', 'error');
                return;
            }
        }
        
        if (penjelasan=='' || penjelasan == undefined || penjelasan == false) {
            swal('Peringatan', 'Penjelasan Harus Diisi', 'error');
            return;
        }
        if (permasalahan=='' || permasalahan == undefined || permasalahan == false) {
            swal('Peringatan', 'Permasalahan Harus Diisi', 'error');
            return;
        }
        if (kesimpulan=='' || kesimpulan == undefined || kesimpulan == false) {
            swal('Peringatan', 'Kesimpulan Harus Diisi', 'error');
            return;
        }
        if (saran=='' || saran == undefined || saran == false) {
            swal('Peringatan', 'Saran Harus Diisi', 'error');
            return;
        }




        var var_url = "<?php echo WS_JQGRID . "transaksi.t_executive_summary_report_controller/insertUpdate/?"; ?>";
            var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            var_url += "&p_year_period_id=" + p_year_period_id;
            var_url += "&p_vat_type_id=" + p_vat_type_id;
            var_url += "&period_type=" + period_type;
            var_url += "&p_finance_period_id=" + p_finance_period_id;
            var_url += "&triwulan=" + triwulan;
            var_url += "&semester=" + semester;
            var_url += "&penjelasan=" + penjelasan;
            var_url += "&permasalahan=" + permasalahan;
            var_url += "&kesimpulan=" + kesimpulan;
            var_url += "&saran=" + saran;

            $.getJSON(var_url, function( items ) {
                if (items.rows.o_result_code == 0 ){
                    swal("Informasi", items.rows.o_result_msg, "info");
                    return;
                } else{
                    swal("Peringatan", items.rows.o_result_msg, "error");
                    return;
                }

            });



    }
</script>