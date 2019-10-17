<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>SKPDKB JABATAN MANUAL</span>
        </li>
    </ul> 
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="form-body" id="grid-pager">
                <div class="row">
                    <label class="control-label col-md-3">NPWPD</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input id="form_cust_account_id" type="text"  style="display:none;">
                            <input id="form_npwpd" readonly type="text" class="FormElement form-control" placeholder="Pilih NPWPD">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVCustAcc('form_cust_account_id','form_npwpd', 'company_brand', 'form_vat_type_id','form_vat_code', 'form_vat_dtl_id','form_vat_dtl_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nama</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control" name="company_brand" id="company_brand" readonly style="width: 410px">                 
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Periode Tahun</label>
                    <div class="col-md-5">
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
                    <label class="control-label col-md-3">Periode</label>
                    <div class="col-md-5">
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
                <div class="row">
                    <label class="control-label col-md-3">Masa Pajak</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control" id="valid_from">  
                            <label class="control-label col-md-3">s/d</label>    
                            <input type="text" class="form-control" id="valid_to">             
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Ayat Pajak</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input id="form_vat_type_id" type="text"  style="display:none;">
                            <input id="form_vat_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Ayat Pajak">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVVatType('form_vat_type_id','form_vat_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Tipe Ayat</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input id="form_vat_dtl_id" type="text"  style="display:none;">
                            <input id="form_vat_dtl_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Tipe Ayat">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVTypeDtl('form_vat_dtl_id','form_vat_dtl_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Kelas</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input id="form_class_id" type="text"  style="display:none;">
                            <input id="form_class_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Kelas">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVClass('form_class_id','form_class_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Jumlah Omset</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control" style="text-align: right;" name="total_trans_amount" id="total_trans_amount">                 
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Jumlah Kamar/Kursi Terjual</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control" style="text-align: right;" name="qty_room_sold" id="qty_room_sold">                 
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row col-md-offset-3">
                    <button class="btn btn-success" type="submit" id="btn-submit" onclick="save()">Simpan</button>
                </div>
            </div>
        </div>
        
        
    </div>
    <?php $this->load->view('lov/lov_cust_account'); ?>
    <?php $this->load->view('lov/lov_year_period'); ?>
    <?php $this->load->view('lov/lov_finance_period'); ?>
    <?php $this->load->view('lov/lov_vat_type'); ?>
    <?php $this->load->view('lov/lov_vat_type_dtl'); ?>
    <?php $this->load->view('lov/lov_ayat_class'); ?>
    
</div>


<!-- <script type="text/javascript">
    
    jQuery(function ($) {
        var grid_selector = "#grid-table-piutang";
        jQuery("#grid-table-piutang").jqGrid({
            colModel: [
                {label: 'Periode',name: 'period',width: 150, align: "left"},
                {label: 'Status',name: 'vat_code',width: 150, align: "left"},

            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: -1,
            rowList: [10, 20, 50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            caption: "Informasi Pajak Belum Bayar"
        });
        
    });    
</script> -->
<script>
    $("#total_trans_amount").number(true,0,'.',',');
    $("#qty_room_sold").number(true,0,'.',',');
</script>

<script> 
    $('#valid_from').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });
    $('#valid_to').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });
</script>

<script type="text/javascript">

    

    function save(){

        var cust_acc_id = $('#form_cust_account_id').val();
        var npwpd = $('#form_npwpd').val();
        var nama = $('#company_brand').val();        
        var year_period = $('#form_year_period_id').val();
        var finance_period = $('#form_finance_period_id').val();
        var ayat = $('#form_vat_id').val();
        var tipe_ayat = $('#form_vat_dtl_id').val();
        var kelas = $('#form_class_id').val();    
        var jml_omset = $('#total_trans_amount').val();
        var jml_kamar = $('#qty_room_sold').val();    
        var start_period = $('#valid_from').val();
        var end_period = $('#valid_to').val();
        //alert(tipe_ayat);return;
        if (cust_acc_id == "" || cust_acc_id == 0 || cust_acc_id == false || cust_acc_id == undefined ||  cust_acc_id == null){
            swal('Informasi',"NPWPD harus diisi",'info'); 
            return;
        }
        if (finance_period == "" || finance_period == 0 || finance_period == false || finance_period == undefined ||  finance_period == null){
            swal('Informasi',"Periode Pelaporan Pajak harus diisi",'info'); 
            return;
        }
        if (tipe_ayat == "" || tipe_ayat == 0 || tipe_ayat == false || tipe_ayat == undefined ||  tipe_ayat == null){
            swal('Informasi',"Tipe Ayat harus diisi",'info'); 
            return;
        }
        if (jml_omset == "" || jml_omset == 0 || jml_omset == false || jml_omset == undefined ||  jml_omset == null){
            swal('Informasi',"Jumlah Omset harus diisi",'info'); 
            return;
        }
        if (jml_kamar == "" || jml_kamar == 0 || jml_kamar == false || jml_kamar == undefined ||  jml_kamar == null){
            jml_kamar = 0;
        }



        var var_url = "<?php echo WS_JQGRID . "transaksi.t_vat_setllement_manual_skpdkb_jabatan_controller/insertUpdate/?"; ?>";
        var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        var_url += "&t_cust_account_id=" + cust_acc_id;
        var_url += "&p_finance_period_id=" + finance_period;
        var_url += "&npwd=" + npwpd;
        var_url += "&start_date=" + start_period;
        var_url += "&end_date=" + end_period;
        var_url += "&qty_room_sold=" + jml_kamar;
        var_url += "&trans_amount=" + jml_omset;
        var_url += "&p_vat_type_dtl_id=" + tipe_ayat;
        var_url += "&p_vat_type_dtl_cls_id=" + kelas;

        //window.location = var_url;
        
        $.getJSON(var_url, function( items ) {
                
            //swal('Informasi',items.rows.o_mess,'info'); 
            if(items.rows.o_cust_order_id == 0||items.rows.o_cust_order_id == "0" || items.rows.o_cust_order_id == ""){
                swal('Informasi',items.rows.o_mess,'info');               
                      
           }else{
                swal('Informasi',items.rows.o_mess,'info'); 
                url = '<?php echo base_url(); ?>'+'cetak_formulir_skpdkb_jabatan_v2/pageCetak?t_customer_order_id='+items.rows.o_cust_order_id;
                openInNewTab(url);

           }

            


        })
        
    }

</script>

<script>
function responsive_jqgrid(grid_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid('setGridWidth', $(".form-body").width());
        //$(pager_selector).jqGrid('setGridWidth', parent_column.width());

    }

function showLOVCustAcc(id, code, name, id_vat, vat_code, id_dtl, vat_dtl) {
    modal_cust_account_show(id, code, name, id_vat, vat_code, id_dtl, vat_dtl);
}
function showLOVYearPeriod(id, code) {

    modal_year_period_show(id, code);
}
function showLOVFinancePeriod(id, code, start_date,end_date) {
    if ($('#form_year_period_id').val()=='' || $('#form_year_period_id').val()==0 ) {
        swal('Informasi','Periode Tahun Harus Diisi','info');
        return false;
    } else {
        //swal('Informasi', $('#form_year_period_id').val(),'info');

        modal_finance_period_show(id, code, $('#form_year_period_id').val(), start_date,end_date);
    }
    
}
function showLOVVatType(id, code) {
    modal_lov_vat_show(id, code);
}
function showLOVTypeDtl(id, code) {
    if ($('#form_vat_type_id').val()=='' || $('#form_vat_type_id').val()==0 ) {
        swal('Informasi','Ayat Pajak Harus Diisi','info');
        return false;
    } else {
        //swal('Informasi', $('#form_year_period_id').val(),'info');

        modal_lov_vat_dtl_show(id, code,$('#form_vat_type_id').val());
    }
    
}
function showLOVClass(id, code, parent) {
    if ($('#form_vat_dtl_id').val()=='' || $('#form_vat_dtl_id').val()==0 ) {
        swal('Informasi','Tipe Pajak Harus Diisi','info');
        return false;
    } else {
        //swal('Informasi', $('#form_year_period_id').val(),'info');

        modal_vat_type_dtl_cls_show(id, code,$('#form_vat_dtl_id').val());
    }
}
    
function openInNewTab(url) {
    // window.open("../report/cetak_rep_lap_harian_bdhr.php?tgl_penerimaan='" + tgl_penerimaan + "'&kabid=T"+ "&kode_bank="+kode_bank, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
  window.open(url, 'No Payment', 'left=0,top=0,width=500,height=500,toolbar=no,scrollbars=yes,resizable=yes');
  // win.focus();
}

</script>
