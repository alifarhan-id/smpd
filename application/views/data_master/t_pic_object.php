<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>DATA GEOLOGIS</span>
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
                            <strong> DATA GEOLOGIS </strong>
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                            <i class="blue"></i>
                            <strong> DAFTAR FOTO OBJEK</strong>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <input type="hidden" name="t_cust_account_id" id="t_cust_account_id" value="<?php echo $this->input->post('t_cust_account_id'); ?>">
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
<script>
$("#tab-1").on("click", function(event) {

    event.stopPropagation();
    var grid = $('#grid-table');

    //t_customer_id = $('#t_customer_id').val();
    //alert("t_customer_id = "+id_customer+" t_cust_account_id = "+id_cust_account);

    loadContentWithParams("data_master.t_pic_gis", {});
});
</script>
<!--- lov -->
<script>
    jQuery(function ($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."data_master.t_pic_gis_controller/readPicObject"; ?>',
            postData:{t_cust_account_id : <?php echo $this->input->post('t_cust_account_id'); ?>},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'pic_id',name: 'pic_id', key: true, width: 5, sorttype: 'number', editable: false, hidden: true},
                {label: 'Longitude',name: 'longitude',width: 300,sorttype: 'text'},
                {label: 'Latitude',name: 'latitude',width: 300,sorttype: 'number'},
                {label: 'Alamat Objek',name: 'alamat',width: 410,sorttype: 'text'}
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: -1,
            rowList: [10, 20, 50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/
                //alert(rowid);
                setData_geologis(rowid);

                $('#update').css('display', '');
                $('#delete').css('display', '');
                $('#insert').css('display', 'none');
            },
            //pager: '#grid-pager',
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }
                setTimeout(function(){
                      $("#grid-table").setSelection($("#grid-table").getDataIDs()[0],true);
                    },500);

            },
            caption: "DATA CUSTOMER ACCOUNT"

        });
    });


    $('#search').on('click', function() {
        showData();
    });

    function showData(){
        jQuery(function($) {
            var grid_selector = "#grid-table";

            jQuery("#grid-table").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."data_master.t_pic_gis_controller/readPicObject"; ?>',
                postData:{t_cust_account_id : <?php echo $this->input->post('t_cust_account_id'); ?>}
            });
            $("#grid-table").jqGrid("setCaption", "DATA CUSTOMER ACCOUNT");
            $("#grid-table").trigger("reloadGrid");
        });
    }

</script>
<script type="text/javascript">
    function setData_geologis(rowid){
        var t_cust_account_id = $('#grid-table').jqGrid('getCell', rowid, 't_cust_account_id');
        var longitude = $('#grid-table').jqGrid('getCell', rowid, 'longitude');
        var latitude = $('#grid-table').jqGrid('getCell', rowid, 'latitude');
        var pic_id = $('#grid-table').jqGrid('getCell', rowid, 'pic_id');

        $('#longitude').val(longitude);
        $('#latitude').val(latitude);
        $('#pic_id').val(pic_id);
    }

    $('#add-pic').on('click', function(event){
        $('#update').css('display', 'none');
        $('#delete').css('display', 'none');
        $('#insert').css('display', '');

        $('#t_cust_account_id').val('');
        $('#longitude').val('');
        $('#latitude').val('');

        $('#grid-table').jqGrid('resetSelection');

    });
</script>
<script type="text/javascript">
    function cancel(){
        loadContentWithParams("data_master.t_pic_object", 
                    {t_cust_account_id : <?php echo $this->input->post('t_cust_account_id'); ?>});
    }

    function insert(){
        var t_cust_account_id          = <?php echo $this->input->post('t_cust_account_id'); ?>;
        var longitude                  = $('#longitude').val();
        var latitude                   = $('#latitude').val();

        if(validasi() != true){
            var var_url = "<?php echo WS_JQGRID . "data_master.t_pic_gis_controller/insert/?"; ?>";
            var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";

             var_url += "&t_cust_account_id=" + t_cust_account_id;
             var_url += "&longitude=" + longitude;
             var_url += "&latitude=" + latitude;

             //alert(t_cust_account_id);

             $.getJSON(var_url, function( items ) {
                if(items.rows=="sukses"){
                    swal('Informasi','Sukses Simpan Data','info');
                    loadContentWithParams("data_master.t_pic_object", 
                        {t_cust_account_id : <?php echo $this->input->post('t_cust_account_id'); ?>});
                }else{
                    swal('Informasi','Tolong Periksa Inputan Anda Kembali','info');
                }
            })
        }
    }

    function update(){
        var t_cust_account_id          = <?php echo $this->input->post('t_cust_account_id'); ?>;
        var longitude                  = $('#longitude').val();
        var latitude                   = $('#latitude').val();
        var pic_id                     = $('#pic_id').val();

        if(validasi() != true){
            var var_url = "<?php echo WS_JQGRID . "data_master.t_pic_gis_controller/update/?"; ?>";
            var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";

             var_url += "&t_cust_account_id=" + t_cust_account_id;
             var_url += "&longitude=" + longitude;
             var_url += "&latitude=" + latitude;
             var_url += "&pic_id=" + pic_id;

             $.getJSON(var_url, function( items ) {
                if(items.rows=="sukses"){
                    swal('Informasi','Sukses Update Data','info');
                    loadContentWithParams("data_master.t_pic_object", 
                        {t_cust_account_id : <?php echo $this->input->post('t_cust_account_id'); ?>});
                }else{
                    swal('Informasi','Tolong Periksa Inputan Anda Kembali','info');
                }
            })
        }
    }

    function hapus(){
        var pic_id                     = $('#pic_id').val();

        var var_url = "<?php echo WS_JQGRID . "data_master.t_pic_gis_controller/delete/?"; ?>";
         var_url += "&id=" + pic_id;

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
                    loadContentWithParams("data_master.t_pic_object", 
                    {t_cust_account_id : <?php echo $this->input->post('t_cust_account_id'); ?>});
                }else{
                    swal("Delete Failed!");
                }
                
            });
        }, 3000);

        });
    }

    function validasi(){
        var t_cust_account_id          = <?php echo $this->input->post('t_cust_account_id'); ?>;
        var longitude                  = $('#longitude').val();
        var latitude                   = $('#latitude').val();
        var pic_id                     = $('#pic_id').val();

        if(t_cust_account_id == '' || longitude == '' || latitude == '' || pic_id == ''){
            swal('Oops','Tolong Periksa Inputan Anda Kembali','error');
            return true;
        }
    }
</script>
<br>
<label class="control-label col-md-5"><b>INFORMASI DATA GEOLOGIS</b></label>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <input type="hidden" class="form-control" name="t_cust_account_id" id="t_cust_account_id" value="<?php echo $this->input->post('t_cust_account_id'); ?>" style="width: 560px;"> 
                <input type="hidden" class="form-control" name="pic_id" id="pic_id" style="width: 560px;">  
                <div class="row">
                    <label class="control-label col-md-3">Longitude</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group">
                                <input type="text" class="form-control required" name="longitude" id="longitude" style="width: 560px;">                 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Latitude</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control required " name="latitude" id="latitude" style="width: 560px;">                 
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