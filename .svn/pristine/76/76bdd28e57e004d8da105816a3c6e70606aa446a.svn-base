<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>CETAK KARTU NPWPD UNTUK WP YANG SUDAH TERDAFTAR DI MPD</span>
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
                    <span class="caption-subject font-blue bold uppercase">CETAK KARTU NPWPD UNTUK WP YANG SUDAH TERDAFTAR DI MPD
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-3">NPWPD/Nama WP/Merk Dagang
                        </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="s_keyword" id="s_keyword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Tanggal Dokumen
                        </label>
                        <div class="col-md-3">
                            <input class="form-control datepicker" type="text" value=""
                                   id="tgl" name="tgl">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3">
                            <button class="btn btn-danger" id="cetak">Tampilkan</button>
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
<!--- lov -->
<script>

    function openInNewTab(url) {
        window.open(url, 'No Payment', 'left=0,top=0,width=500,height=500,toolbar=no,scrollbars=yes,resizable=yes');
    }

    function cetak_kartu_npwpd_v2(t_cust_account_id) {
        url = "<?php echo base_url(); ?>"+"cetak_kartu_npwpd_v2/pageCetak?t_cust_account_id="+t_cust_account_id;
        openInNewTab(url);
    }
</script>
<script>
//T_bphtb_delete_list_controller
    $('#gview_grid-table').hide();
    jQuery(function ($) {
            var grid_selector = "#grid-table";
            var pager_selector = "#grid-pager";

            jQuery("#grid-table").jqGrid({
                url: '',
                datatype: "json",
                mtype: "POST",
                colModel: [ 
                    {label: 'NPWPD',name: 'npwd',width: 150,sorttype: 'text'},
                    {label: 'NAMA WP',name: 'wp_name',width: 300,sorttype: 'text'}, 
                    {label: 'MERK DAGANG',name: 'company_brand',width: 200,sorttype: 'text'},
                    {label: 'ALAMAT MERK DAGANG',name: 'brand_address_name',width: 400,sorttype: 'text'},
                    {label: 'KARTU NPWPD',name: 'Options',width: 180, align: "center",
                        formatter:function(cellvalue, options, rowObject) {
                            var t_cust_account_id = rowObject['t_cust_account_id'];
                            return '<a class="btn btn-danger btn-xs" href="#" onClick="cetak_kartu_npwpd_v2('+t_cust_account_id+')">cetak_kartu_npwpd_v2</a>';
                        }
                    }
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
                pager: '#grid-pager',
                loadComplete: function (response) {
                    if(response.success == false) {
                        swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                    }

                },
                caption: "DAFTAR PENDAFTARAN WP"

            });
        });


    $('#cetak').on('click', function() {
        /*if($('#s_keyword').val() == ""){            
            swal ( "Oopss" ,  "Filter Harus Diisi !" ,  "error" );
        }else{*/
            $('#gview_grid-table').show();
            jQuery(function($) {
                var grid_selector = "#grid-table";

                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."pelaporan.t_cetak_kartu_npwpd_dr_t_cust_account_controller/readData"; ?>',
                    postData:{s_keyword : $('#s_keyword').val(),
                              tgl : $('#tgl').val()}
                });
                $("#grid-table").jqGrid("setCaption", "DAFTAR PENDAFTARAN WP");
                $("#grid-table").trigger("reloadGrid");
            });
        //}
    });

    $('.datepicker').datepicker({
        todayHighlight: true,
        format: "dd MM yyyy",
        autoclose: true
    });

</script>