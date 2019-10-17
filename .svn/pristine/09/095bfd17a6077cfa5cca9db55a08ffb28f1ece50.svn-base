<link href="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<div id="modal_lov_t_vat_setllement_manual_skpdkb_lb" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title">INFORMASI PELAPORAN PAJAK MANUAL SKPDKB</span>
                </div>
            </div>


            <!-- modal body -->
            <div class="modal-body">
                <form role="form" id="form_tambah" name="form_tambah" method="post">
                    <div class="row">   
                        <label class="control-label col-md-3">NPWPD</label>
                        <div class="col-md-7">
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
                        <div class="col-md-7">
                            <div class="input-group">
                                <input id="company_brand" readonly type="text" class="FormElement form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="space-2"></div>
                    <div class="row">
                        <label class="control-label col-md-3">Periode Tahun</label>
                        <div class="col-md-7">
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
                        <div class="col-md-7">
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
                        <div class="col-md-7">
                            <div class="input-group">
                                <input type="text" class="form-control" id="valid_from">
                                <span class="input-group-addon"> s/d </span>
                                <input type="text" class="form-control" id="valid_to">
                            </div>
                        </div>
                    </div>
                    <div class="space-2"></div>
                    <div class="row">
                        <label class="control-label col-md-3">Ayat Pajak</label>
                        <div class="col-md-7">
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
                        <div class="col-md-7">
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
                        <div class="col-md-7">
                            <div class="input-group">
                                <input id="form_class_id" type="text"  style="display:none;">
                                <input id="form_class_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Kelas">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-class" name="btn-lov-class">
                                        <span class="fa fa-search bigger-110"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="space-2"></div>
                    <div class="row">
                        <label class="control-label col-md-3">Jumlah Omset</label>
                        <div class="col-md-7">
                            <div class="input-group" >
                                <input type="text" class="form-control priceformat" name="lov_total_trans_amount" id="lov_total_trans_amount">
                            </div>
                        </div>
                    </div>
                    <div class="space-2"></div>
                    <div class="row">
                        <label class="control-label col-md-3">Jumlah Kamar/Kursi Terjual</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <input type="text" class="form-control priceformat" name="qty_room_sold" id="qty_room_sold">
                            </div>
                        </div>
                    </div>
                   
                    <!-- modal footer -->
                    <div class="modal-footer no-margin-top">
                        <div class="bootstrap-dialog-footer">

                            <div class="bootstrap-dialog-footer-buttons col-xs-8">                    
                                <br>
                                <button type="button" id="lov-btn-update" onClick="saveData()" id="btn-update" class="btn btn-sm btn-primary">Submit</button>
                                <button type="button" class="btn btn-sm btn-default" id="btn-update-close" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.end modal -->
<?php $this->load->view('lov/lov_cust_account'); ?>
<?php $this->load->view('lov/lov_year_period'); ?>
<?php $this->load->view('lov/lov_finance_period'); ?>
<?php $this->load->view('lov/lov_vat_type'); ?>
<?php $this->load->view('lov/lov_vat_type_dtl'); ?>
<?php $this->load->view('lov/lov_ayat_class'); ?>

<script>
    $(".priceformat").number( true, 0 , '.',','); /* price number format */
    $(".priceformat").css("text-align", "right");

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

    $('#btn-lov-class').on('click', function() {
        //alert( $('#form_vat_dtl_id').val());
        if ($('#form_vat_dtl_id').val()=='' || $('#form_vat_dtl_id').val()==0 ) {
            swal('Informasi','Tipe Pajak Harus Diisi','info');
            return false;
        } else {
             modal_vat_type_dtl_cls_show('form_class_id','form_class_code',$('#form_vat_dtl_id').val());
        }
    });

    $('#form_vat_dtl_id').on('change', function() {
        $('#form_class_id').val('');
        $('#form_class_code').val('');
    });
</script>

<script type="text/javascript">
    function saveData(){
        var cusAccId              = $('#form_cust_account_id').val();
        var Period                = $('#form_finance_period_id').val();
        var yearPeriod            = $('#form_year_period_id').val();
        var npwd                  = $('#form_npwpd').val();
        var ms_start              = $('#valid_from').val();
        var ms_end                = $('#valid_to').val();
        var kamar                 = $('#qty_room_sold').val();
        var tot                   = $('#lov_total_trans_amount').val();
        var p_vat_type_dtl_id     = $('#form_vat_dtl_id').val();
        var p_vat_type_dtl_cls_id = $('#form_class_id').val();

        //alert(cusAccId+","+Period+","+yearPeriod+","+npwd+","+ms_start+","+ms_end+","+kamar+","+tot+","+p_vat_type_dtl_id+","+p_vat_type_dtl_cls_id);return;

        
        if(cusAccId == 0 || cusAccId == ''){
            swal('Oopss','NPWPD Harus Diisi!','error');
        }else{
            $.ajax({
                url: '<?php echo WS_JQGRID."transaksi.t_vat_setllement_edit_lb_controller/submit"; ?>',
                type: "POST",
                data: {
                    cusAccId: cusAccId,
                    Period: Period,
                    yearPeriod: yearPeriod,
                    npwd: npwd,
                    ms_start: ms_start,
                    ms_end: ms_end,
                    kamar: kamar,
                    tot: tot,
                    p_vat_type_dtl_id: p_vat_type_dtl_id,
                    p_vat_type_dtl_cls_id: p_vat_type_dtl_cls_id
                },
                success: function (data) {                    
                    if(data.success){
                        var dt = data.items;

                        var t_vat_setllement_id = dt.t_vat_setllement_id;
                        var msg = dt.msg;

                        if(t_vat_setllement_id != 0){
                            swal({title: "Informasi!", text: msg, html: true, type: "info"});
                            reset();

                            $('#modal_lov_t_vat_setllement_manual_skpdkb_lb').modal('hide');
                            cetak(t_vat_setllement_id);
                        }else{
                            swal({title: "Error!", text: msg, html: true, type: "error"});
                        }
                        //alert(dt.t_vat_setllement_id);return;
                        
                        
                    }else{
                        swal({title: "Error!", text: data.message, html: true, type: "error"});
                    }                 
                },
                error: function (xhr, status, error) {
                    swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                }
            });
        }


    }


    function cetak(t_vat_setllement_id){
        var url = "<?php echo base_url(); ?>"+"cetak_formulir_skpdkb_lb_pdf/pageCetak?";
        url += "t_vat_setllement_id=" + t_vat_setllement_id;

        openInNewTab(url);
    }

    function openInNewTab(url) {
      window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');
    }

    function reset(){
        $('#form_cust_account_id').val(null);
        $('#form_npwpd').val(null);
        $('#company_brand').val(null);
        $('#form_year_period_id').val(null);
        $('#form_year_code').val(null);
        $('#form_finance_period_id').val(null);
        $('#form_finance_code').val(null);
        $('#valid_from').val(null);
        $('#valid_to').val(null);
        $('#form_vat_type_id').val(null);
        $('#form_vat_code').val(null);
        $('#form_vat_dtl_id').val(null);
        $('#form_vat_dtl_code').val(null);
        $('#form_class_id').val(null);
        $('#form_class_code').val(null);
        $('#lov_total_trans_amount').val(null);
        $('#qty_room_sold').val(null);
    }
</script>

<script type="text/javascript">
    function modal_lov_skpdkblb_show() {
        $("#modal_lov_t_vat_setllement_manual_skpdkb_lb").bootgrid("destroy");
        modal_lov_skpdkblb_init();

        $("#modal_lov_t_vat_setllement_manual_skpdkb_lb").modal({backdrop: 'static'});
    }

    function modal_lov_skpdkblb_init(t_cust_account_id) {

        //$('#t_cust_account_id').val(t_cust_account_id);
        //$('#form_submitter_back_summary').val( JSON.stringify(form_submitter_back_summary) );

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
</script>

