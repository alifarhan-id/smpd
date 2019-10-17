<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>HAPUS BPHTB</span>
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
                    <span class="caption-subject font-blue bold uppercase"> HAPUS BPHTB
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-3"> Nama WP/ NOP / No Registrasi :
                        </label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <input type="text" class="form-control" name="s_keyword" id="s_keyword">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" id="search">
                                    Cari
                                </span>
                            </div>
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
<?php $this->load->view('lov/lov_t_bphtb_delete'); ?>
<!--- lov -->
<script>
    function viewFormHapus(t_bphtb_registration_id) {

        modal_lov_bphtb_delete_show(t_bphtb_registration_id);
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
                    {label: 'NAMA WP',name: 'wp_name',width: 300,sorttype: 'text'},  
                    {label: 'No Registrasi',name: 'registration_no',width: 150,sorttype: 'text',  align: "right"},
                    {label: 'NOP',name: 'njop_pbb',width: 200,sorttype: 'number'},
                    {label: 'Alamat WP',name: 'wp_address_name',width: 400,sorttype: 'text'},
                    {label: 'Alamat Objek Pajak',name: 'object_address_name',width: 400,sorttype: 'text'},
                    {label: 'Total Pajak',name: 'bphtb_amt_final',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}
                    },
                    {label: 'Hapus BPHTB',name: 'Options',width: 200, align: "center",
                        formatter:function(cellvalue, options, rowObject) {
                            var t_bphtb_registration_id = rowObject['t_bphtb_registration_id'];
                            var t_customer_order_id = rowObject['t_customer_order_id'];
                            return '<a class="btn btn-danger btn-xs" href="#" onClick="viewFormHapus('+t_bphtb_registration_id+')">Hapus</a>';
                        }
                    }
                ],
                height: '100%',
                autowidth: true,
                viewrecords: true,
                rowNum: -1,
                rowList: [10, 20, 50],
                rownumbers: true, // show row numbers
                rownumWidth: 35, // the width of the row numbers columns
                altRows: true,
                shrinkToFit: false,
                multiboxonly: true,
                footerrow: true,
                loadComplete: function (response) {
                    if(response.success == false) {
                        swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                    }

                },
                caption: "DAFTAR BPHTB"

            });
        });


    $('#search').on('click', function() {
        if($('#s_keyword').val() == ""){            
            swal ( "Oopss" ,  "Filter Harus Diisi !" ,  "error" );
        }else{
            $('#gview_grid-table').show();
            jQuery(function($) {
                var grid_selector = "#grid-table";

                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."transaksi.t_bphtb_delete_list_controller/read_data"; ?>',
                    postData:{s_keyword : $('#s_keyword').val()}
                });
                $("#grid-table").jqGrid("setCaption", "DAFTAR BPHTB");
                $("#grid-table").trigger("reloadGrid");
            });
        }
    });

</script>