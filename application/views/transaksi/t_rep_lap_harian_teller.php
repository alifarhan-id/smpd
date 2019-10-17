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
            <span>Pembayaran Teller</span>
        </li>
    </ul>
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    
                    <span class="caption-subject font-blue bold uppercase"> Pembayaran Teller 
                    </span>
                </div>
            </div>
            <!-- CONTENT  value="2015-09-01" -->
            <div class="form-body">
                <div class="row col-md-offset-1">                    
                    <label class="control-label col-md-1">Tanggal</label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker1 required" name="tgl_penerimaan" id="tgl_penerimaan">                 
                        </div>
                    </div>
                    <label class="control-label col-md-2">Nama Teller</label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <select id="nama_teller" name="nama_teller" class="FormElement form-control" >
                                <option value="ESSYBKP">ESSYBKP</option>
                                <option value="HERIBKP">HERIBKP</option>
                                <option value="PAINCEBKP">PAINCEBKP</option>
                                <option value="MOBIL1">MOBIL1</option>
                                <option value="TINE">TINE</option>
                                <option value="DESI">DESI</option>
                            </select>
                        </div>
                    </div>                                   
                    <label class="control-label col-md-2">Cara Bayar</label>
                    <div class="col-md-2">
                        <div class="input-group">
                             <div id="payment_type"></div>                
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row col-md-offset-5">
                    <button class="btn btn-primary" type="button" onclick="toTampil()">Tampilkan</button>
                    <button class="btn btn-danger" type="button" onclick="toPDF()">Download PDF</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-content no-border" id="table">
    <div class="row">
        <div class="col-xs-12">
            <div id="gbox_grid-table" class="ui-jqgrid">
                <div id="gview_grid-table" class="ui-jqgrid-view table-responsive" role="grid">
                    <table id="grid-table"></table>
                    <!-- <div id="grid-pager"></div> -->
                </div>
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">

	//tanggal 
    $('.datepicker1').datetimepicker({
        format: 'DD-MM-YYYY',
        // defaultDate: new Date()
    });

	$.ajax({
        url: "<?php echo base_url().'transaksi/paymentType/'; ?>" ,
        type: "POST",
        success: function (data) {
            $( "#payment_type" ).html( data );
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
</script>

<script type="text/javascript">    
	$('#table').css('display', 'none');
    jQuery(function($) {
        var grid_selector = "#grid-table";
        //var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_rep_lap_harian_teller_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                //{label: 'ID',name: 't_bphtb_registration_id',hidden:true, width: 180, align: "center"},
                {label: 'kode_ayat',width: 80, align: "left",
                	formatter:function(cellvalue, options, rowObject) {

                        var dtl_code = rowObject['dtl_code'];
                        var vat_code = rowObject['vat_code'];
                        
                        return '<div>'+vat_code+dtl_code+'</div>';

                    }

            	},
                {label: 'Nama WP',name: 'wp_name',width: 250, align: "left"},
                {label: 'NPWPD',name: 'npwd',width: 150, align: "left"},
                {label: 'TGl Pembayaran',name: 'payment_date',width: 200, align: "left"},
                {label: 'Periode',name: 'finance_period_code',width: 130, align: "left"},
                {label: 'Ayat Pajak',name: 'ayat_pajak',width: 135, align: "left"},
                {label: 'Nomor Kohir',name: 'no_kohir',width: 100, align: "right"},
                {label: 'Nilai Denda',name:'denda',width: 100, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"},
                {label: 'Nilai Pajak',name: 'payment_vat_amount',width: 100, summaryTpl:"{0}",summaryType:"sum", formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"}

            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: -1,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            footerrow: true,
            grouping:true,
            groupingView: 
                    {
                        groupField: ["ayat_pajak"],
                        groupColumnShow: [true],
                        groupText: ["<b>{0}</b>"],
                        groupOrder: ["asc"],
                        groupSummary: [true], // will use the "summaryTpl" property of the respective column
                        groupCollapse: false,
                        groupDataSorted: true
                    },
            gridComplete: function() {
                var $grid = $('#grid-table');
                var colSum = $grid.jqGrid('getCol', 'payment_vat_amount', false, 'sum');
                var colSum_denda = $grid.jqGrid('getCol', 'denda', false, 'sum');
                $grid.jqGrid('footerData', 'set', { 'no_kohir':'Total Rp.', 'payment_vat_amount': colSum, 'denda':colSum_denda});
            },
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            sortorder:'',
            //pager: '#grid-pager',
            jsonReader: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }

            },
            caption: "Laporan Harian Teller"

        });

        

    });

    function responsive_jqgrid(grid_selector, pager_selector) {
        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );
    }

    

    function toTampil(){
        var tgl_penerimaan     = $('#tgl_penerimaan').val();        
        var nama_teller        = $('#nama_teller').val();
        var p_payment_type_id  = $('#p_payment_type_id').val();

        if(tgl_penerimaan == ""){            
            swal ( "Oopss" ,  "Kolom Tanggal Tidak Boleh Kosong!" ,  "error" );
        }else{            
            $('#table').css('display', '');
            jQuery(function($) {
                var grid_selector = "#grid-table";

                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."transaksi.t_rep_lap_harian_teller_controller/read"; ?>',
                    postData: {tgl_penerimaan:tgl_penerimaan,
                                nama_teller:nama_teller,
                                p_payment_type_id: p_payment_type_id}
                });
                $("#grid-table").jqGrid("setCaption", "Laporan Harian Teller || Nama Teller : "+nama_teller+" || Tanggal : "+tgl_penerimaan);
                $("#grid-table").trigger("reloadGrid");
            });
        
            
        }        
    
    }

    function toPDF(){
    	var tgl_penerimaan     = $('#tgl_penerimaan').val();        
        var nama_teller        = $('#nama_teller').val();
        var p_payment_type_id  = $('#p_payment_type_id').val();

        if(tgl_penerimaan == ""){            
            swal ( "Oopss" ,  "Kolom Tanggal Tidak Boleh Kosong!" ,  "error" );
        }else{            
            var url = "<?php echo base_url(); ?>"+"cetak_lap_harian_teller/pageCetak?";
            url += "tgl_penerimaan=" + tgl_penerimaan;
            url += "&nama_teller=" + nama_teller;
            url += "&p_payment_type_id=" + p_payment_type_id;

            openInNewTab(url);          
        }
    }

    function openInNewTab(url) {
      window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');
    }
</script>