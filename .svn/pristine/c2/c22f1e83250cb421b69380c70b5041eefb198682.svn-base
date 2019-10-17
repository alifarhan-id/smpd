<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>BPPS</span>
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
                            <input id="form_vat_id" type="text"  style="display:none;">
                            <input id="kode_ayat" name="kode_ayat" type="text"  style="display:none;">
                            <input id="form_vat_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Jenis Pajak">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVVat_type('form_vat_id','form_vat_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <label class="control-label col-md-2">Tanggal Penerimaan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="tgl_penerimaan" id="tgl_penerimaan">                 
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Bank Penerimaan</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select id="kode_bank" name="kode_bank" class="FormElement form-control" >
                                <option selected="" value="">Semua</option>
                                <option value="0000">BENDAHARA PENERIMA</option>
                                <option value="110">BANK NTB</option>
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-md-2">Status</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select id="status" name="status" class="FormElement form-control" >
                                <option selected="" value="">Semua</option>
                                <option value="1">ACTIVE</option>
                                <option value="2">NON-ACTIVE</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-2">Jenis Setoran</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select id="i_flag_setoran" name="i_flag_setoran" class="FormElement form-control" >
                                <option value="1" selected="">Pokok</option>
                                <option value="2">Denda</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-success" type="button" id="btn-search">Tampilkan Data</button>
                    <button class="btn btn-danger" type="button" onclick="toExcelBpps2()" id="excel">Tampilkan Excel</button>
                </div>
            </div>
        </div>
        
        
    </div>
    <?php $this->load->view('lov/lov_vat_type'); ?>
    
</div>
<div class="tab-content no-border" id="table">
    <div class="row">
        <div class="col-xs-12">
            <div id="gbox_grid-table" class="ui-jqgrid">
                <div id="gview_grid-table" class="ui-jqgrid-view table-responsive" role="grid">
                    <table id="grid-table-bpps2"></table>
                </div>
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#table').css('display', 'none');
    jQuery(function ($) {
        var grid_selector = "#grid-table-bpps2";
        jQuery("#grid-table-bpps2").jqGrid({
            url: '<?php echo WS_JQGRID . "pelaporan.t_rep_bpps2_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'No Ayat',name: 'no_ayat',width: 120, align: "left"},
                {label: 'Nama Ayat',name: 'nama_ayat',width: 150, align: "left"},
                {label: 'No Kohir',name: 'no_kohir',width: 150, align: "left"},
                {label: 'No Bayar',name: 'payment_key',width: 170, align: "left"},
                {label: 'Nama WP',name: 'wp_name',width: 180, align: "left"},
                {label: 'Merk Dagang',name: 'brand_name',width: 180, align: "left"},
                {label: 'NPWPD',name: 'npwpd',width: 180, align: "left", summaryTpl:"Total" ,summaryType:"sum"},
                {label: 'Jumlah',name: 'jumlah_terima',width: 150, summaryTpl:"{0}",summaryType:"sum", formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','},align: "right"},
                {label: 'Masa Pajak',name: 'masa_pajak',width: 150, align: "left"},
                {label: 'TGL TAP',name: 'kd_tap',width: 150, align: "left"},
                {label: 'Ket.',name: 'keterangan',width: 80, align: "left"},
                {label: 'Status',name: 'status',width: 100, align: "left"}
            ],
            height: '100%',
            autowidth: false,
            viewrecords: true,
            rowNum: -1,
            rowList: [10, 20, 50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            footerrow: true,
            grouping:true,
            groupingView: 
                    {
                        groupField: ["nama_ayat"],
                        groupColumnShow: [true],
                        groupText: ["<b>{0}</b>"],
                        groupOrder: ["asc"],
                        groupSummary: [true], // will use the "summaryTpl" property of the respective column
                        groupCollapse: false,
                        groupDataSorted: true
                    },
            gridComplete: function() {
                var $grid = $('#grid-table-bpps2');
                var colSum = $grid.jqGrid('getCol', 'jumlah_terima', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'npwpd':'Grand Total', 'jumlah_terima': colSum });
            },
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            loadComplete: function () {                
               
            },
              
            caption: "BPPS2"
        });
        
    });    
</script>

<script> 
    $('#tgl_penerimaan').datepicker({ // mengambil dari class datepicker
      autoclose: true,
      format : 'dd-mm-yyyy',
      todayBtn: 'linked',
      todayHighlight: true
    });
</script>

<script type="text/javascript">

    $("#btn-search").on('click', function() {

        //var p_vat_type_id = $('#form_vat_id').val();
        var p_vat_type_id = $('#form_vat_id').val();
        var tgl_penerimaan = $('#tgl_penerimaan').val();        
        var kode_bank = $('#kode_bank').val();
        var status = $('#status').val();
        var i_flag_setoran = $('#i_flag_setoran').val();
        if(tgl_penerimaan == ""){
            swal ( "Oopss" ,  "Kolom Tanggal Tidak Boleh Kosong!" ,  "error" );  
        }else if(p_vat_type_id ==  ""){
            swal ( "Oopss" ,  "Filter Harus Dipilih!" ,  "error" );         
        }else{
            $('#table').css('display', '');
            jQuery(function($) {
                var grid_selector = "#grid-table-bpps2";
                //var pager_selector = "#grid-pager-bpps2";

                jQuery("#grid-table-bpps2").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."pelaporan.t_rep_bpps2_controller/read"; ?>',
                    postData: {p_vat_type_id: p_vat_type_id,
                                tgl_penerimaan: tgl_penerimaan,
                                i_flag_setoran: i_flag_setoran,
                                kode_bank: kode_bank,
                                status: status
                            }

                });

                $("#grid-table-bpps2").jqGrid("setCaption", "BPPS");
                $("#grid-table-bpps2").trigger("reloadGrid");
            });
        }

    });

    function toExcelBpps2() {
        // alert("Convert to Excel");
        var p_vat_type_id = $('#form_vat_id').val();
        var tgl_penerimaan = $('#tgl_penerimaan').val();
        var kode_bank = $('#kode_bank').val();
        var status = $('#status').val();
        var i_flag_setoran = $('#i_flag_setoran').val();

        if(tgl_penerimaan == ""){
            swal ( "Oopss" ,  "Kolom Tanggal Tidak Boleh Kosong!" ,  "error" );
        }else if(p_vat_type_id ==  ""){
            swal ( "Oopss" ,  "Filter Harus Dipilih!" ,  "error" );                
        }else{
            var url = "<?php echo WS_JQGRID . "pelaporan.t_rep_bpps2_controller/excel/?"; ?>";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&p_vat_type_id=" + p_vat_type_id;
            url += "&tgl_penerimaan=" + tgl_penerimaan;
            url += "&i_flag_setoran=" + i_flag_setoran;
            url += "&kode_bank=" + kode_bank;
            url += "&status=" + status;
            //alert(url);
            window.location = url;
        }
    }

</script>

<script>
function responsive_jqgrid(grid_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid('setGridWidth', $(".form-body").width());
        //$(pager_selector).jqGrid('setGridWidth', parent_column.width());

    }

function showLOVVat_type(id, code) {
    modal_lov_vat_show(id, code);
}

</script>
