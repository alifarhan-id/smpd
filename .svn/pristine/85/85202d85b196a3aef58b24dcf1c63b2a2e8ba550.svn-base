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
            <span>Laporan SKPDKB PENELITIAN</span>
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
                    <span class="caption-subject font-blue bold uppercase"> Laporan SKPDKB PENELITIAN 
                    </span>
                </div>
            </div>
            <!-- CONTENT  value="2015-09-01" -->
            <div class="form-body">
                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Periode Tahun
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="hidden" class="form-control required" required name="p_year_period_id" id="p_year_period_id" readonly>
                                <input type="text" class="form-control required" name="year_code" required  id="year_code" readonly>
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-lov-period">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="space-2"></div>
                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Status
                        </label>
                        <div class="col-md-3">
                            <select id="status" class="form-control" name="status" >
                                <option  value="">SEMUA</option>
                                <option  value="1">SUDAH BAYAR</option>
                                <option  value="2">BELUM BAYAR</option>
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="space-2"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-primary" type="button" onclick="toTampil()">Tampilkan</button>
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
                   <!--  <div id="grid-pager"></div> -->
                </div>
            </div>            
        </div>
    </div>
</div>

<?php $this->load->view('lov/lov_year_period'); ?>

<script >

    $('#table').css('display', 'none');

    $("#btn-lov-vat").on('click', function() { 
        modal_lov_vat_show('p_vat_type_id','vat_code');        
    });

    $("#btn-lov-period").on('click', function() { 
        modal_year_period_show('p_year_period_id','year_code');        
    });
    
</script>


<script type="text/javascript">
    

    jQuery(function($) {
        var grid_selector = "#grid-table";
        //var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."pelaporan.t_skpdkb_penelitian_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'NPWPD',name: 'npwd',width: 150, align: "left"},
                {label: 'NAMA WP',name: 'wp_name',width: 230, align: "left"},
                {label: 'TGL KETETAPAN',name: 'tgl_tap',width: 150, align: "left"},
                {label: 'NO KWITANSI',name: 'receipt_no',width: 180, align: "left"},
                {label: 'PERIODE',name: 'code',width: 180, align: "left"},
                {label: 'NNILAI TRANSAKSI',name: 'total_vat_amount',width: 140, formatter:'integer', formatoptions: {prefix:"", thousandsSeparator:',', defaultValue:'0'},align: "right"}

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
            gridComplete: function() {
                
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
            caption: "Laporan SKPDKB PENELITIAN"

        });

        

    });

    function responsive_jqgrid(grid_selector, pager_selector) {
        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );
    }

    

    function toTampil(){
        var status        = $('#status').val();        
        var year_code          = $('#year_code').val();
        var year_id                = $('#p_year_period_id').val();

        
        if( year_code == "" &&  year_id == ""  ){            
            swal ( "Oopss" ,  "TahunHarus Di isi!" ,  "error" );
            return;
        }else{
            $('#table').css('display', '');
            jQuery(function($) {
                var grid_selector = "#grid-table";

                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."pelaporan.t_skpdkb_penelitian_controller/read"; ?>',
                    postData: {status:status,year_code:year_code,year_id:year_id}
                });
                $("#grid-table").jqGrid("setCaption", " Laporan SKPDKB PENELITIAN ");
                $("#grid-table").trigger("reloadGrid");
            });
            
            
        }
    }
</script>