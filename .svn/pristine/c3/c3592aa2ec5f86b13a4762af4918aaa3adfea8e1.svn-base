<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Laporan Rekap Surat Terguran PerBulan</span>
        </li>
    </ul> 
</div>
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <div class="row col-md-offset-2">
                    <label class="control-label col-md-3">Periode Tahun</label>
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
                </div>
                <div class="space-2"></div>
                                
                <div class="space-2"></div>
                <div class="row col-md-offset-4">
                    <button class="btn btn-success" type="button" id="btn-search">Tampilkan</button>
                    <button class="btn btn-danger" type="button" id="btn-exce" onclick="excel()">Cetak Excel</button>
                </div>
            </div>
        </div>
        
        
    </div>
    <?php $this->load->view('lov/lov_year_period'); ?>  
    
</div>
<div class="tab-content no-border" id="table">
    <div class="row">
        <div class="col-xs-6">
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
            url: '<?php echo WS_JQGRID . "pelaporan.t_laporan_rekap_surat_teguran_per_bulan_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Customer Order', name: 't_customer_order_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Bulan',name: 'code',width: 190, align: "left"},
                {label: '1',name: 'jml1',width: 100, align: "left"},
                {label: '2',name: 'jml2',width: 100,align: "left"},
                {label: '3',name: 'jml3',width: 100,align: "left"}
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
           
            gridComplete: function() {
                
                
            },
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            loadComplete: function () {                
               
            },
              
            caption: "LAPORAN REKAP SURAT TEGURAN PER BULAN"
        });
        jQuery("#grid-table").jqGrid('setGroupHeaders', {
            useColSpanStyle: true, 
            groupHeaders:[
                {startColumnName: 'jml1', numberOfColumns: 3, titleText: 'Jumlah Teguran Ke'}
            ]
        });
        
    });    
</script>

<script type="text/javascript">
    $("#btn-search").on('click', function() {

        var p_year_period_id = $('#form_year_period_id').val();
        
        //alert(p_year_period_id+" "+p_finance_period_id_start);

        if(p_year_period_id == ""){
            swal ( "Oopss" ,  "Filter Harus Diisi!" ,  "error" );  
        }else{
            $('#table').css('display', '');
            jQuery(function($) {
                var grid_selector = "#grid-table";
                //var pager_selector = "#grid-pager-bpps2";

                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."pelaporan.t_laporan_rekap_surat_teguran_per_bulan_controller/read"; ?>',
                    postData: {p_year_period_id: p_year_period_id}

                });

                $("#grid-table").jqGrid("setCaption", "LAPORAN REKAP SURAT TEGURAN PER BULAN");
                $("#grid-table").trigger("reloadGrid");
            });
        }

    });
</script>

<script type="text/javascript">
    function excel(){
        var p_year_period_id = $('#form_year_period_id').val();
        //alert(p_year_period_id);      

        if(p_year_period_id == "" || p_year_period_id == 0){
            swal ( "Oopss" ,  "Filter Tidak Boleh Kosong!" ,  "error" );

        }else{
           var url = "<?php echo WS_JQGRID . "pelaporan.t_laporan_rekap_surat_teguran_per_bulan_controller/excel/?"; ?>";
            url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";            
            url += "&p_year_period_id=" + p_year_period_id;
            
            window.location = url;
        }
    }
    function showLOVYearPeriod(id, code) {
        modal_year_period_show(id, code);
    }
</script>