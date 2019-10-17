<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Laporan Status Surat Teguran</span>
        </li>
    </ul> 
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row">
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
                    <label class="control-label col-md-2">Periode Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="hidden" name="form_finance_period_id" id="form_finance_period_id">
                           <input id="form_finance_period_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Bulan">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-period" onclick="showLOVFinancePeriod('form_finance_period_id','form_finance_period_code', 'valid_from', 'valid_to')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">                    
                    <label class="control-label col-md-2">Jenis Pajak</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input id="form_vat_id" type="hidden"  name="form_vat_id">
                            <input id="form_vat_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Jenis Pajak">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showLOVVat_type('form_vat_id','form_vat_code')">
                                    <span class="fa fa-search bigger-110"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <label class="control-label col-md-2">Status</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select id="status" name="status" class="FormElement form-control" >
                                <option selected="" value="">GLOBAL</option>
                                <option value="1">BELUM BAYAR</option>
                                <option value="2">SUDAH BAYAR</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="space-2"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-success" type="button" id="btn-search">Tampilkan</button>
                    <button class="btn btn-danger" type="button" id="btn-excel" onclick="toExcel()">Download Excel</button>
                </div>
            </div>
        </div>
        
        
    </div>
    <?php $this->load->view('lov/lov_year_period'); ?>
    <?php $this->load->view('lov/lov_finance_period'); ?>   
    <?php $this->load->view('lov/lov_vat_type'); ?>
</div>
<div class="tab-content no-border" id="table">
    <div class="row">
        <div class="col-xs-12">
            <div id="gbox_grid-table" class="ui-jqgrid">
                <div id="gview_grid-table" class="ui-jqgrid-view table-responsive" role="grid">
                    <table id="grid-table"></table>
                </div>
            </div>            
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#table').css('display', 'none');
    jQuery(function ($) {
        var grid_selector = "#grid-table";
        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID . "pelaporan.t_rep_sisa_piutang_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'Merk Dagang',name: 'company_brand',width: 230, align: "left"},
                {label: 'Alamat Merk Dagang',name: 'alamat_merk_dagang',width: 350, align: "left"},
                {label: 'NPWPD',name: 'npwpd',width: 150, align: "left"},
                {label: 'SPTPD',name: 'f_amount',width: 150,summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'STPD',name: 'f_penalty',width: 150, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'SPTPD',name: 'f_teg1_amount',width: 150,summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'STPD',name: 'f_teg1_penalty',width: 150, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'SPTPD',name: 'f_teg2_amount',width: 150,summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'STPD',name: 'f_teg2_penalty',width: 150, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'SPTPD',name: 'f_teg3_amount',width: 150,summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'STPD',name: 'f_teg3_penalty',width: 150, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'Aksi',width: 150, 
                formatter:function(cellvalue, options, rowObject) {
                    var kolom_aksi = rowObject['f_action_sts'];
                    var output = '<div>'+kolom_aksi+'</div>';
                    if(!isNaN(kolom_aksi)){
                        kolom_aksi=kolom_aksi.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        output = '<div style="text-align:right;">'+kolom_aksi+'</div>';
                    }                        
                    return output ;
                }
            }

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
            gridComplete: function() {
                                
            },
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            loadComplete: function () {                
               
            },
              
            caption: "LAPORAN STATUS SURAT TEGURAN"
        });
        //$("#grid-table").jqGrid('setLabel','nomor_ayat','',{'text-align':'center'});
        jQuery("#grid-table").jqGrid('setGroupHeaders', {
            useColSpanStyle: true, 
            groupHeaders:[
                {startColumnName: 'f_teg1_amount', numberOfColumns: 2, titleText: 'TEGURAN I'},
                {startColumnName: 'f_teg2_amount', numberOfColumns: 2, titleText: 'TEGURAN II'},
                {startColumnName: 'f_teg3_amount', numberOfColumns: 2, titleText: 'TEGURAN III'}
            ]
        });
        
    });    
</script>


<script type="text/javascript">
    $("#btn-search").on('click', function() {
        var p_year_period_id = $('#form_year_period_id').val();
        var p_finance_period_id = $('#form_finance_period_id').val();
        var status = $('#status').val();
        var p_vat_type_id = $('#form_vat_id').val();
        var jenis_pajak = $('#form_vat_code').val();
        var periode_pajak = $('#form_finance_period_code').val();
        //alert(p_year_period_id+" "+p_finance_period_id+" "+status+" "+p_vat_type_id);

        if(p_year_period_id == "" && p_finance_period_id == "" && p_vat_type_id == ""){
            swal ( "Oopss" ,  "Filter Harus Diisi!" ,  "error" );  
        }else{
            $('#table').css('display', '');
            jQuery(function($) {
                var grid_selector = "#grid-table";
                //var pager_selector = "#grid-pager-bpps2";

                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."pelaporan.t_rep_sisa_piutang_controller/read"; ?>',
                    postData: {p_year_period_id: p_year_period_id,
                                p_finance_period_id: p_finance_period_id,
                                status: status,
                                p_vat_type_id: p_vat_type_id,
                                jenis_pajak:jenis_pajak,
                                periode_pajak: periode_pajak
                            }

                });

                $("#grid-table").jqGrid("setCaption", "PERIODE");
                $("#grid-table").trigger("reloadGrid");
            });
        }

    });
</script>

<script type="text/javascript">
    $(".priceformat").number( true, 0 , '.',','); /* price number format */
    $(".priceformat").css("text-align", "right");

    function showLOVVat_type(id, code) {
        modal_lov_vat_show(id, code);
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

    function responsive_jqgrid(grid_selector, pager_selector) {
        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );
    }

    function toExcel() {
        // alert("Convert to Excel");
        var p_year_period_id = $('#form_year_period_id').val();
        var p_finance_period_id = $('#form_finance_period_id').val();
        var status = $('#status').val();
        var p_vat_type_id = $('#form_vat_id').val();
        var jenis_pajak = $('#form_vat_code').val();
        var periode_pajak = $('#form_finance_period_code').val();

        if(p_year_period_id == "" && p_finance_period_id == "" && p_vat_type_id == ""){
            swal ( "Oopss" ,  "Filter Harus Diisi!" ,  "error" );  
        }else{
            var url = '<?php echo WS_JQGRID . "pelaporan.t_rep_sisa_piutang_controller/excel?"; ?>';
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
            url += "&p_year_period_id=" + p_year_period_id;
            url += "&p_finance_period_id=" + p_finance_period_id;
            url += "&status=" + status;
            url += "&p_vat_type_id=" + p_vat_type_id;
            url += "&jenis_pajak=" + jenis_pajak;
            url += "&periode_pajak=" + periode_pajak;
            //alert(url);
            window.location = url;
        }
    }
</script>
