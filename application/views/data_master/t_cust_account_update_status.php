<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Ubah Status Wajib Pajak</span>
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
                    <span class="caption-subject font-blue bold uppercase">Modifikasi Status WP
                    </span>
                </div>
            </div>
            <!-- CONTENT  value="2015-09-01" -->
            <div class="form-body">
                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Nama WP/ NPWD 
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control required" name="s_keyword" required  id="s_keyword" >
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" onclick="toTampil()">Cari</button>
                                </span>
                            </div>
                        </div>
                    </div>
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

<?php $this->load->view('lov/lov_t_cust_acc_status_edit'); ?>

<script >

    $('#table').css('display', 'none');
    
    function changeStatus(t_cust_account_id){
        modal_lov_t_cust_acc_status_edit_show(t_cust_account_id);
    }
</script>


<script type="text/javascript">
    
    jQuery(function($) {
        var grid_selector = "#grid-table";
        //var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."data_master.t_cust_account_update_status_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'NAMA WP',name: 'wp_name',width: 230, align: "left"},
                {label: 'NPWPD',name: 'npwd',width: 150, align: "left"},
                {label: 'JENIS PAJAK',name: 'jenis_pajak',width: 150, align: "left"},
                {label: 'STATUS ACTIVE',name: 'status_wp',width: 180, align: "left"},
                {label: 'TGL STATUS',name: 'last_satatus_date',width: 180, align: "left"},
                {label: 'UBAH STATUS WP',width: 163,align: "center",
                    formatter:function(cellvalue, options, rowObject) {
                        var t_cust_account_id = rowObject['t_cust_account_id'];
                            return '<a class="btn btn-primary btn-xs" href="#" onclick="changeStatus('+t_cust_account_id+');">Ubah Status</a>';
                        
                    }
                }

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
            footerrow: false,
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

                setTimeout(function(){
                      $("#grid-table").setSelection($("#grid-table").getDataIDs()[0],true);
                },500);

            },
            caption: "DAFTAR UBAH STATUS WP"

        });

        

    });

    

    function responsive_jqgrid(grid_selector, pager_selector) {
        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );
    }

    

    function toTampil(){
        var s_keyword        = $('#s_keyword').val();        
        
        if( s_keyword ==""){            
            swal ( "Oopss" ,  "TahunHarus Di isi!" ,  "error" );
            return;
        }else{
            $('#table').css('display', '');
            jQuery(function($) {
                var grid_selector = "#grid-table";

                jQuery("#grid-table").jqGrid('setGridParam',{
                    url: '<?php echo WS_JQGRID."data_master.t_cust_account_update_status_controller/read"; ?>',
                    postData: {s_keyword:s_keyword}
                });
                $("#grid-table").jqGrid("setCaption", "DAFTAR UBAH STATUS WP");
                $("#grid-table").trigger("reloadGrid");
            });
            
            
        }
    }
</script>