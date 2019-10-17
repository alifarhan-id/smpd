<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>JENIS ANGGARAN</span>
        </li> 
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                            <i class="blue"></i>
                            <strong>JENIS ANGGARAN</strong>
                        </a>
                    </li>
                    <li class="">
                        <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                            <i class="blue"></i>
                            <strong> AKUN ANGGARAN</strong>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <!-- <label class="control-label col-md-1"> NPWPD :
                        </label> -->
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
                <input type="hidden" name="t_cust_account_id" id="t_cust_account_id">
                <div class="row">
                     <div class="col-xs-12">
                        <button class="btn btn-danger" id="add-anggaran"> <i class="fa fa-plus"></i>Tambah</button>
                        <div id="gbox_grid-table" class="ui-jqgrid">
                            <div id="gview_grid-table" class="" role="grid">
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
<script>
$("#tab-2").on("click", function(event) {

    event.stopPropagation();
    var grid = $('#grid-table');

    p_budget_type_id = grid.jqGrid ('getGridParam', 'selrow');
    id_budget_type = grid.jqGrid ('getCell', p_budget_type_id, 'p_budget_type_id');
    code = grid.jqGrid ('getGridParam', 'selrow');
    code_anggaran = grid.jqGrid ('getCell', code, 'code');

    //alert(" p_budget_type_id = "+id_budget_type);

    if(p_budget_type_id == null) {
        swal('Informasi','Silahkan pilih salah satu JENIS ANGGARAN !','info');
        return false;
    }

    loadContentWithParams("parameter.p_budget_account", {
        p_budget_type_id: p_budget_type_id,
        code_anggaran: code_anggaran,
        
    });
});
</script>
<script>
    jQuery(function ($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."parameter.p_budget_type_controller/read"; ?>',
            postData:{s_keyword : $('#s_keyword').val()},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID Anggaran', name: 'p_budget_type_id', key: true, width: 5, sorttype: 'number', editable: false, hidden: true},
                {label: 'Jenis Anggaran',name: 'code',width: 300,sorttype: 'text'},
                {label: 'No Urut',name: 'listing_no',width: 50,sorttype: 'number'},
                {label: 'Deskripsi',name: 'description',width: 300,sorttype: 'text'}
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 5,
            rowList: [5, 10, 20],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            pager: '#grid-pager',
            onSelectRow: function (rowid) {
                /*do something when selected*/
                //alert(rowid);
                setData_anggaran(rowid);

                $('#update').css('display', '');
                $('#delete').css('display', '');
                $('#insert').css('display', 'none');
            },
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }

                setTimeout(function(){
                      $("#grid-table").setSelection($("#grid-table").getDataIDs()[0],true);
                    },500);

            },
            caption: "DAFTAR JENIS ANGGARAN"

        });
    });


    $('#search').on('click', function() {
        showData();
    });

    function showData(){
        jQuery(function($) {
            var grid_selector = "#grid-table";

            jQuery("#grid-table").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."parameter.p_budget_type_controller/read"; ?>',
                postData:{s_keyword : $('#s_keyword').val()}
            });
            $("#grid-table").jqGrid("setCaption", "DAFTAR JENIS ANGGARAN");
            $("#grid-table").trigger("reloadGrid");
        });
    }

</script>
<script type="text/javascript">
    function setData_anggaran(rowid){
        var p_budget_type_id = $('#grid-table').jqGrid('getCell', rowid, 'p_budget_type_id');
        var code = $('#grid-table').jqGrid('getCell', rowid, 'code');
        var listing_no = $('#grid-table').jqGrid('getCell', rowid, 'listing_no');
        var description = $('#grid-table').jqGrid('getCell', rowid, 'description');

        $('#p_budget_type_id').val(p_budget_type_id);
        $('#code').val(code);
        $('#listing_no').val(listing_no);
        $('#description').val(description);
    }

    $('#add-anggaran').on('click', function(event){
        $('#update').css('display', 'none');
        $('#delete').css('display', 'none');
        $('#insert').css('display', '');

        $('#p_budget_type_id').val('');
        $('#code').val('');
        $('#listing_no').val('');
        $('#description').val('');

        $('#grid-table').jqGrid('resetSelection');

    });
</script>
<script type="text/javascript">
    function cancel(){
        loadContentWithParams("parameter.p_budget_type", {});
    }

    function insert(){
        var code                       = $('#code').val();
        var listing_no                 = $('#listing_no').val();
        var description                = $('#description').val();

        if(validasi() != true){
            var var_url = "<?php echo WS_JQGRID . "parameter.p_budget_type_controller/insert/?"; ?>";
            var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";

             var_url += "&code=" + code;
             var_url += "&listing_no=" + listing_no;
             var_url += "&description=" + description;

             //alert(t_cust_account_id);

             $.getJSON(var_url, function( items ) {
                if(items.rows=="sukses"){
                    swal('Informasi','Sukses Simpan Data','info');
                    loadContentWithParams("parameter.p_budget_type", {});
                }else{
                    swal('Informasi','Tolong Periksa Inputan Anda Kembali','info');
                }
            })
        }
    }

    function update(){
        var p_budget_type_id           = $('#p_budget_type_id').val();
        var code                       = $('#code').val();
        var listing_no                 = $('#listing_no').val();
        var description                = $('#description').val();

        if(validasi() != true){
            var var_url = "<?php echo WS_JQGRID . "parameter.p_budget_type_controller/update/?"; ?>";
            var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";

             var_url += "&p_budget_type_id=" + p_budget_type_id;
             var_url += "&code=" + code;
             var_url += "&listing_no=" + listing_no;
             var_url += "&description=" + description;

             $.getJSON(var_url, function( items ) {
                if(items.rows=="sukses"){
                    swal('Informasi','Sukses Update Data','info');
                    loadContentWithParams("parameter.p_budget_type", {});
                }else{
                    swal('Informasi','Tolong Periksa Inputan Anda Kembali','info');
                }
            })
        }
    }

    function hapus(){
        var p_budget_type_id           = $('#p_budget_type_id').val();

        var var_url = "<?php echo WS_JQGRID . "parameter.p_budget_type_controller/delete/?"; ?>";
         var_url += "&id=" + p_budget_type_id;

        swal({
          title: "Apakah anda Ingin Menghapus Data Ini?",
          text: "",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(){
            setTimeout(function(){
            $.getJSON(var_url, function( items ) {
                if(items.rows=="sukses"){
                    swal("Delete finished!");
                    loadContentWithParams("parameter.p_budget_type", {});
                }else{
                    swal("Delete Failed!");
                }
                
            });
        }, 3000);

        });
    }

    function validasi(){
        var code                  = $('#code').val();
        var listing_no            = $('#listing_no').val();

        if(code == '' || listing_no == ''){
            swal('Oops','Field yang berwarna kuning harus diisi','error');
            return true;
        }
    }
</script>
<br>
<label class="control-label col-md-5"><b>INFORMASI JENIS ANGGARAN</b></label>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <input type="hidden" class="form-control" name="p_budget_type_id" id="p_budget_type_id" style="width: 560px;">  
                <div class="row">
                    <label class="control-label col-md-3">Jenis Anggaran </label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group">
                                <input type="text" class="form-control required" name="code" id="code" style="width: 560px;">                 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">No Urut</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control required " name="listing_no" id="listing_no" style="width: 560px;" maxlength="2">                 
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Deskripsi</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <textarea class="form-control" name="description" id="description" rows="5" style="width: 560px;"></textarea>                 
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <a href="javascript:;" class="btn  green " id="insert" onclick="insert()"> Simpan
                        </a>
                        <a href="javascript:;" class="btn  green " id="update" onclick="update()"> Simpan
                        </a>
                        <a href="javascript:;" class="btn  green " id="delete" onclick="hapus()"> Hapus
                        </a>
                        <a href="javascript:;" class="btn  green " id="cancel" onclick="cancel()"> Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>       
    </div>   
</div>