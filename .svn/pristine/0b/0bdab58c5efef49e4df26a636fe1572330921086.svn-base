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
                    <li class="">
                        <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                            <i class="blue"></i>
                            <strong>JENIS ANGGARAN</strong>
                        </a>
                    </li>
                    <li class="active">
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
                        <button class="btn btn-danger" id="add-pic"> <i class="fa fa-plus"></i>Tambah</button>
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
<?php $this->load->view('lov/lov_coa'); ?>
<script>
$("#tab-1").on("click", function(event) {

    event.stopPropagation();
    var grid = $('#grid-table');

    loadContentWithParams("parameter.p_budget_type", {});
});
</script>
<script>
    jQuery(function ($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";
        var code_anggaran = "<?php echo $this->input->post('code_anggaran') ?>";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."parameter.p_budget_account_controller/read"; ?>',
            postData:{s_keyword : $('#s_keyword').val(),
                        p_budget_type_id : <?php echo $this->input->post('p_budget_type_id'); ?>},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 'p_budget_account_id', key: true, width: 5, sorttype: 'number', editable: false, hidden: true},
                {label: 'Kode Anggaran',name: 'coa_name',width: 300,sorttype: 'text', hidden:true},
                {label: 'Kode Anggaran',name: 'coa_code',width: 300,sorttype: 'text', hidden:true},
                {label: 'Kode Anggaran',name: 'coa_code1',width: 300,sorttype: 'text'},
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
                setData_akun(rowid);

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
            caption: "DAFTAR AKUN ANGGARAN || JENIS ANGGARAN : "+code_anggaran

        });
    });


    $('#search').on('click', function() {
        showData();
    });

    function showData(){
        jQuery(function($) {
            var grid_selector = "#grid-table";
            var code_anggaran = "<?php echo $this->input->post('code_anggaran') ?>";

            jQuery("#grid-table").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."parameter.p_budget_account_controller/read"; ?>',
                postData:{s_keyword : $('#s_keyword').val(),
                        p_budget_type_id : <?php echo $this->input->post('p_budget_type_id'); ?>}
            });
            $("#grid-table").jqGrid("setCaption", "DAFTAR AKUN ANGGARAN || JENIS ANGGARAN : "+code_anggaran);
            $("#grid-table").trigger("reloadGrid");
        });
    }

</script>
<script type="text/javascript">
    function setData_akun(rowid){
        //var t_cust_account_id = $('#grid-table').jqGrid('getCell', rowid, 't_cust_account_id');
        var coa_id = $('#grid-table').jqGrid('getCell', rowid, 'coa_id');
        var coa_code = $('#grid-table').jqGrid('getCell', rowid, 'coa_code');
        var coa_name = $('#grid-table').jqGrid('getCell', rowid, 'coa_name');
        var description = $('#grid-table').jqGrid('getCell', rowid, 'description');

        $('#coa_id').val(coa_id);
        $('#coa_code').val(coa_code);
        $('#coa_name').val(coa_name);
        $('#description').val(description);
        $('#p_budget_account_id').val(rowid);
    }

    $('#add-pic').on('click', function(event){
        $('#update').css('display', 'none');
        $('#delete').css('display', 'none');
        $('#insert').css('display', '');

        $('#coa_id').val('');
        $('#coa_id').val('');
        $('#coa_code').val('');
        $('#coa_name').val('');
        $('#description').val('');

        $('#grid-table').jqGrid('resetSelection');

    });

    
</script>
<script type="text/javascript">
    function cancel(){
        var p_budget_type_id = <?php echo $this->input->post('p_budget_type_id'); ?>;
        var code_anggaran = '<?php echo $this->input->post('code_anggaran'); ?>';
        
        loadContentWithParams("parameter.p_budget_account", { 
                        p_budget_type_id : p_budget_type_id, 
                        code_anggaran : code_anggaran
                    });
    }

    function insert(){
        //var t_cust_account_id          = <?php //echo $this->input->post('t_cust_account_id'); ?>;
        //var coa_id                   = $('#coa_id').val();
        var p_budget_type_id         = <?php echo $this->input->post('p_budget_type_id'); ?>;
        var coa_code                 = $('#coa_code').val();
        var description              = $('#description').val();

        var p_budget_type_id = <?php echo $this->input->post('p_budget_type_id'); ?>;
        var code_anggaran = '<?php echo $this->input->post('code_anggaran'); ?>';

        if(validasi() != true){
            var var_url = "<?php echo WS_JQGRID . "parameter.p_budget_account_controller/insert/?"; ?>";
            var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";

             var_url += "&p_budget_type_id=" + p_budget_type_id;
             //var_url += "&coa_id=" + coa_id;
             var_url += "&coa_code=" + coa_code;
             var_url += "&description=" + description;

             $.getJSON(var_url, function( items ) {
                if(items.rows=="sukses"){
                    swal('Informasi','Sukses Simpan Data','info');
                    loadContentWithParams("parameter.p_budget_account", { 
                        p_budget_type_id : p_budget_type_id, 
                        code_anggaran : code_anggaran
                    });
                }else{
                    swal('Informasi','Tolong Periksa Inputan Anda Kembali','info');
                }
            })
        }
    }

    function update(){
        //var t_cust_account_id          = <?php //echo $this->input->post('t_cust_account_id'); ?>;
        var p_budget_account_id = $('#p_budget_account_id').val();
        var coa_code = $('#coa_code').val();
        var coa_name = $('#coa_name').val();
        var description = $('#description').val();

        var p_budget_type_id = <?php echo $this->input->post('p_budget_type_id'); ?>;
        var code_anggaran = '<?php echo $this->input->post('code_anggaran'); ?>';

        if(validasi() != true){
            var var_url = "<?php echo WS_JQGRID . "parameter.p_budget_account_controller/update/?"; ?>";
            var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";

            var_url += "&p_budget_account_id=" + p_budget_account_id; 
            var_url += "&description=" + description;
            var_url += "&coa_code=" + coa_code;

             $.getJSON(var_url, function( items ) {
                if(items.rows=="sukses"){
                    swal('Informasi','Sukses Update Data','info');
                    
                    loadContentWithParams("parameter.p_budget_account", { 
                        p_budget_type_id : p_budget_type_id, 
                        code_anggaran : code_anggaran
                    });
                }else{
                    swal('Informasi','Tolong Periksa Inputan Anda Kembali','info');
                }
            })
        }
    }

    function hapus(){
        var p_budget_account_id                     = $('#p_budget_account_id').val();

        var p_budget_type_id = <?php echo $this->input->post('p_budget_type_id'); ?>;
        var code_anggaran = '<?php echo $this->input->post('code_anggaran'); ?>';

        var var_url = "<?php echo WS_JQGRID . "parameter.p_budget_account_controller/delete/?"; ?>";
         var_url += "&id=" + p_budget_account_id;

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
                    loadContentWithParams("parameter.p_budget_account", { 
                        p_budget_type_id : p_budget_type_id, 
                        code_anggaran : code_anggaran
                    });
                }else{
                    swal("Delete Failed!");
                }
                
            });
        }, 3000);

        });
    }

    function validasi(){
        //var t_cust_account_id          = <?php echo $this->input->post('t_cust_account_id'); ?>;
        var coa_id                  = $('#coa_id').val();
        var coa_code                   = $('#coa_code').val();
        var coa_name                     = $('#coa_name').val();

        if(t_cust_account_id == '' || coa_id == '' || coa_code == '' || coa_name == ''){
            swal('Oops','Tolong Periksa Inputan Anda Kembali','error');
            return true;
        }
    }
</script>
<br>
<label class="control-label col-md-5"><b>INFORMASI AKUN ANGGARAN</b></label>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <input type="hidden" class="form-control" name="p_budget_account_id" id="p_budget_account_id" value="">
                <div class="row">
                    <label class="control-label col-md-3">Jenis Anggaran </label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="hidden" class="form-control required" maxlength="8" name="coa_id" id="coa_id" readonly>
                            <input type="text" class="form-control required" name="coa_code" id="coa_code" readonly>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" id="btn-lov-coa" onclick="showLOVCoa('coa_id', 'coa_code','coa_name')">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Nama Anggaran </label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="coa_name" id="coa_name" style="width: 560px;" readonly="">                 
                            </div>
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
<script type="text/javascript">
    function showLOVCoa(id,code,name){   
        modal_coa_show(id,code,name);
       // alert($('#coa_name').val());
    }
</script>