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
            <span>Pembayaran Denda Profesi</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->

<div class="space-4"></div>
<div class="row">
    <label class="control-label col-md-2"> Nomor Bayar :</label>
    <div class="col-md-4">   
        <div class="input-group">
            <input id="s_keyword" type="text" class="FormElement form-control">
            <span class="input-group-btn">
                <button class="btn btn-success" type="button" id="btn-search" onclick="showData()">Cari</button>
            </span>          
        </div>
    </div>
</div>

<div class="space-4"></div>
<div class="row" id="tabel_id">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <!-- CONTENT  value="2015-09-01" -->
            <div class="form-body">
                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Nama
                        </label>
                        <div class="col-md-7 col-md-offset-2">
                            <div class="input-group col-md-7">
                                <input type="hidden" class="form-control" readonly name="t_ppat_id" id="t_ppat_id" >
                                <input type="hidden" class="form-control" readonly name="t_customer_order_id" id="t_customer_order_id" >
                                <input type="hidden" class="form-control" readonly name="t_vat_setllement_id" id="t_vat_setllement_id" >
                                <input type="text" class="form-control" name="ppat_name"   id="ppat_name"  readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Alamat
                        </label>
                        <div class="col-md-7 col-md-offset-2">
                            <div class="input-group col-md-7">
                                <textarea rows="3" cols="50" class="form-control" readonly maxlength="256"  name="address_name" id="address_name"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">No. SK Pengukuhan PPAT/S
                        </label>
                        <div class="col-md-7 col-md-offset-2">
                            <div class="input-group col-md-7">
                                <input type="text" class="form-control" name="no_sk" readonly  id="no_sk" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Denda Atas Pelaporan Bulan</label>
                        <div class="col-md-7 col-md-offset-2">
                            <div class="input-group col-md-7">
                                <input type="text" class="form-control " name="total_vat_amount"   id="total_vat_amount" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2 col-md-offset-2">Tahun</label>
                        <div class="col-md-7">
                            <div class="input-group col-md-7">
                                <input type="hidden" class="form-control "  name="p_year_period_id" id="p_year_period_id" readonly>
                                <input type="text" class="form-control " name="year_code"   id="year_code" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2 col-md-offset-2">Bulan</label>
                        <div class="col-md-7">
                            <div class="input-group col-md-7">
                                <input type="hidden" class="form-control "  name="p_finance_period_id" id="p_finance_period_id" readonly>
                                <input type="text" class="form-control " name="finance_period_code"   id="finance_period_code" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Denda atas AJB yang ditandatangani sebelum pembayaran BPHTB</label>
                        <div class="col-md-7 col-md-offset-2">
                            <div class="input-group col-md-7">
                                <input type="text" class="form-control " name="sanksi_ajb"   id="sanksi_ajb" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2 col-md-offset-2">Tahun</label>
                        <div class="col-md-7">
                            <div class="input-group col-md-7">
                                <input type="hidden" class="form-control "  name="p_year_period_id_ajb" id="p_year_period_id_ajb" readonly>
                                <input type="text" class="form-control " name="year_code_ajb"  id="year_code_ajb" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2 col-md-offset-2">Bulan</label>
                        <div class="col-md-7">
                            <div class="input-group col-md-7">
                                <input type="hidden" class="form-control "  name="p_finance_period_id_ajb" id="p_finance_period_id_ajb" readonly>
                                <input type="text" class="form-control " name="finance_period_code_ajb"   id="finance_period_code_ajb" readonly>
                                <span class="input-group-btn">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-primary" type="button"  onclick="flagPayment( $('#t_customer_order_id').val())">Flag Payment</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    var s_keyword = $('#s_keyword').val();
    if (s_keyword == "" || s_keyword == 0 || s_keyword == false || s_keyword == undefined ||  s_keyword == null){
        $ ("#tabel_id").hide();
    }else{
        $ ("#tabel_id").show();
    }
    
    $("#total_vat_amount").number(true,0,'.',',');
    $("#sanksi_ajb").number(true,0,'.',',');
</script>

<script type="text/javascript">
    function showData(){

        var s_keyword = $('#s_keyword').val();

        if (s_keyword == "" || s_keyword == 0 || s_keyword == false || s_keyword == undefined ||  s_keyword == null){
            $ ("#tabel_id").hide();
            swal('Peringatan', 'Masukan Nomor Bayar Terlebih Dahulu', 'error');
            return;
        }
        $ ("#tabel_id").show();
        var url = "<?php echo WS_JQGRID."transaksi.t_vat_setllement_ppat_payment_controller/readData/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        url += "&s_keyword=" + s_keyword;

        $.getJSON(url, function( items ) {
            var data = items.rows;

            $('#t_ppat_id').val(data.t_ppat_id);
            $('#t_customer_order_id').val(data.t_customer_order_id);
            $('#t_vat_setllement_id').val(data.t_vat_setllement_id);
            $('#ppat_name').val(data.ppat_name);
            $('#address_name').val(data.address_name);
            $('#no_sk').val(data.no_sk);
            $('#total_vat_amount').val(data.total_vat_amount);
            $('#year_code').val(data.year_period_code_denda_profesi);
            $('#finance_period_code').val(data.finance_period_code_denda_profesi);
            $('#sanksi_ajb').val(data.sanksi_ajb);
            $('#year_code_ajb').val(data.year_period_code_sanksi_ajb);
            $('#finance_period_code_ajb').val(data.finance_period_code_sanksi_ajb);
        }) 
    }

    function flagPayment(id){

        var var_url = "<?php echo WS_JQGRID."transaksi.t_vat_setllement_ppat_payment_controller/updateDataFlag/?";?>";
            var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            var_url += "&t_customer_order_id=" + id;

        swal({
          title: "Konfirmasi Flag Payment",
          text: "Apakah Anda Yakin Untuk Menambahkan Flag Payment? ",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes",
          closeOnConfirm: false,
          showLoaderOnConfirm: true
        },
        function(){
          //swal("Deleted!", "Your imaginary file has been deleted.", "success");
            setTimeout(function(){
                $.getJSON(var_url, function( items ) {
                    swal('Informasi',items.rows.f_payment_manual_ppat, 'info');
                    loadContentWithParams("transaksi.t_vat_setllement_ppat_payment", {});
                });
            }, 2000);
        });
    }
</script>


