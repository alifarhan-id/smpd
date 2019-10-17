<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>SURAT TUGAS</span>
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
                            <strong>SURAT TUGAS</strong>
                        </a>
                    </li>
                    <!-- <li class="">
                        <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                            <i class="blue"></i>
                            <strong> AKUN ANGGARAN</strong>
                        </a>
                    </li> -->
                </ul>
            </div>
            
            <!-- CONTENT PORTLET -->
            <div class="form-body">
                <!-- <div class="form-horizontal">
                    <div class="form-group">
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
                </div> -->
                <div class="space-4"></div>
                <div class="row">
                     <div class="col-xs-12">
                        <button class="btn btn-danger" id="add-anggaran"> <i class="fa fa-plus"></i>Tambah</button>
                        <button class="btn btn-primary" id="save-pdf">Save to PDF</button>
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
<?php
    
    $url = base_url()."cetak_surat_tugas_pdf/pageCetak?p_assignment_letter_id=";
?>
<script>
$(function () {  
  CKEDITOR.replace( 'letter_body' );
  // CKEDITOR.config.width = 3000;
});


$.ajax({
    url: "<?php echo base_url().'transaksi/getComboNamaTugas/'; ?>" ,
    type: "POST",
    data: {},
    success: function (data) {
        $( "#comboNamaTugas" ).html( data );
    },
    error: function (xhr, status, error) {
        swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
    }
});

$('#update').css('display', 'none');
$('#delete').css('display', '');
$('#insert').css('display', '');

$("#tab-2").on("click", function(event) {

    event.stopPropagation();
    var grid = $('#grid-table');

    p_assignment_letter_id = grid.jqGrid ('getGridParam', 'selrow');
    id_budget_type = grid.jqGrid ('getCell', p_assignment_letter_id, 'p_assignment_letter_id');
    code = grid.jqGrid ('getGridParam', 'selrow');
    code_anggaran = grid.jqGrid ('getCell', code, 'code');

    //alert(" p_assignment_letter_id = "+id_budget_type);

    if(p_assignment_letter_id == null) {
        swal('Informasi','Silahkan pilih salah satu JENIS ANGGARAN !','info');
        return false;
    }

    loadContentWithParams("transaksi.p_budget_account", {
        p_assignment_letter_id: p_assignment_letter_id,
        code_anggaran: code_anggaran,
        
    });
});
</script>
<script>
    jQuery(function ($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.p_assignment_letter_controller/read"; ?>',
            postData:{s_keyword : $('#s_keyword').val()},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID type', name: 'p_assignment_letter_id', key: true, width: 5, sorttype: 'number', editable: false, hidden: true},
                {label: 'ID letter', name: 'p_assignment_type_id', width: 5, sorttype: 'number', editable: false, hidden: true},
                {label: 'No Surat',name: 'letter_no',width: 150,sorttype: 'text'},
                {label: 'Isi Surat',name: 'letter_body',width: 300,sorttype: 'text', hidden: true},
                {label: 'Jenis Surat Tugas',name: 'assignment_name',width: 200,sorttype: 'text'},
                {label: 'Tanggal',name: 'letter_date',width: 150,sorttype: 'text'},
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
                if(rowid != null){
                    setData_surat(rowid);

                    $('#update').css('display', '');
                    $('#delete').css('display', '');
                    $('#insert').css('display', 'none');
                }
            },
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }

                setTimeout(function(){
                      $("#grid-table").setSelection($("#grid-table").getDataIDs()[0],true);
                    },500);

            },
            caption: "DAFTAR SURAT TUGAS"

        });

        $('#grid-table').jqGrid('navGrid', '#grid-pager',
            {   //navbar options
                edit: false,
                editicon: 'fa fa-pencil blue bigger-120',
                add: false,
                addicon: 'fa fa-plus-circle purple bigger-120',
                del: false,
                delicon: 'fa fa-trash-o red bigger-120',
                search: true,
                searchicon: 'fa fa-search orange bigger-120',
                refresh: true,
                afterRefresh: function () {
                    // some code here
                    $("#detailsPlaceholder").hide();
                },

                refreshicon: 'fa fa-refresh green bigger-120',
                view: false,
                viewicon: 'fa fa-search-plus grey bigger-120'
            },

            {
                // options for the Edit Dialog
                closeAfterEdit: true,
                closeOnEscape:true,
                recreateForm: true,
                serializeEditData: serializeJSON,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);
                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = $.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
                    reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
                editData: {

                },
                //new record form
                serializeEditData: serializeJSON,
                closeAfterAdd: true,
                clearAfterAdd : true,
                closeOnEscape:true,
                recreateForm: true,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                viewPagerButtons: false,
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);

                    setTimeout(function() {
                        clearInputIcon();
                    },100);

                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = $.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }

                    $(".tinfo").html('<div class="ui-state-success">' + response.message + '</div>');
                    var tinfoel = $(".tinfo").show();
                    tinfoel.delay(3000).fadeOut();

                    clearInputIcon();
                    reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
                //delete record form
                serializeDelData: serializeJSON,
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    style_delete_form(form);

                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                onClick: function (e) {
                    //alert(1);
                },
                afterSubmit:function(response,postdata) {
                    var response = $.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }

                    reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
                //search form
                closeAfterSearch: false,
                recreateForm: true,
                afterShowSearch: function (e) {
                    var form = $(e[0]);
                    style_search_form(form);

                    form.closest('.ui-jqdialog').center();
                },
                afterRedraw: function () {
                    style_search_filters($(this));
                }
            },
            {
                //view record form
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                }
            }
        );
    });


    $('#search').on('click', function() {
        showData();
        //setClearVal();
    });

    function showData(){
        jQuery(function($) {
            var grid_selector = "#grid-table";

            jQuery("#grid-table").jqGrid('setGridParam',{
                url: '<?php echo WS_JQGRID."transaksi.p_assignment_letter_controller/read"; ?>',
                postData:{s_keyword : $('#s_keyword').val()}
            });
            $("#grid-table").jqGrid("setCaption", "DAFTAR JENIS ANGGARAN");
            $("#grid-table").trigger("reloadGrid");
            
        });
    }

</script>
<script type="text/javascript">
    function setData_surat(rowid){

        var p_assignment_letter_id = $('#grid-table').jqGrid('getCell', rowid, 'p_assignment_letter_id');
        var letter_no  = $('#grid-table').jqGrid('getCell', rowid, 'letter_no');
        var letter_body = $('#grid-table').jqGrid('getCell', rowid, 'letter_body');
        var letter_date = $('#grid-table').jqGrid('getCell', rowid, 'letter_date');
        var p_assignment_type_id = $('#grid-table').jqGrid('getCell', rowid, 'p_assignment_type_id');
        var description = $('#grid-table').jqGrid('getCell', rowid, 'description');

        $('#p_assignment_letter_id').val(p_assignment_letter_id);
        $('#letter_no').val(letter_no);
        // $('#letter_body').val(letter_body);
        CKEDITOR.instances.letter_body.setData(letter_body);
        $('#letter_date').val(letter_date);
        $('#description').val(description);
        $('#p_assignment_type_id').val(p_assignment_type_id);
    }

    $('#add-anggaran').on('click', function(event){
        $('#update').css('display', 'none');
        $('#delete').css('display', 'none');
        $('#insert').css('display', '');
        setClearVal();
        $('#grid-table').jqGrid('resetSelection');

    });

    function setClearVal(){
        $('#p_assignment_letter_id').val('');
        $('#letter_no').val('');
        // $('#letter_body').val('');
        CKEDITOR.instances.letter_body.setData('');
        $('#letter_date').val('');
        $('#description').val('');
        $('#p_assignment_type_id').val('');
    }
</script>
<script type="text/javascript">
    function cancel(){
        loadContentWithParams("transaksi.p_assignment_letter", {});
    }

    function insert(){
        var letter_no                  = $('#letter_no').val();
        var letter_body                = CKEDITOR.instances.letter_body.getData();
        var letter_date                = $('#letter_date').val();
        var description                = $('#description').val();
        var p_assignment_type_id       = $('#p_assignment_type_id').val();

        if(validasi() != true){
            var var_url = "<?php echo WS_JQGRID . "transaksi.p_assignment_letter_controller/insert"; ?>";

             $.ajax({
                url: var_url,
                type: "POST",
                dataType: "json",
                data: {
                    letter_no : letter_no,
                    letter_body : letter_body,
                    letter_date : letter_date,
                    p_assignment_type_id : p_assignment_type_id,
                    description : description,
                    "<?php echo $this->security->get_csrf_token_name(); ?>" : "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                success: function (data) {
                    if(data.rows=="sukses"){
                        swal('Informasi','Sukses Simpan Data','info');
                    loadContentWithParams("transaksi.p_assignment_letter", {});
                    }else{
                        swal('Informasi','Tolong Periksa Inputan Anda Kembali','info');
                    }
                    
                },
                error: function (xhr, status, error) {
                    swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                }
            });
        }
    }

    function update(){
        var p_assignment_letter_id     = $('#p_assignment_letter_id').val();
        var letter_no                  = $('#letter_no').val();
        var letter_body                = CKEDITOR.instances.letter_body.getData();
        var letter_date                = $('#letter_date').val();
        var description                = $('#description').val();
        var p_assignment_type_id       = $('#p_assignment_type_id').val();

        if(validasi() != true){
            var var_url = "<?php echo WS_JQGRID . "transaksi.p_assignment_letter_controller/update"; ?>";

             $.ajax({
                url: var_url,
                type: "POST",
                dataType: "json",
                data: {
                    p_assignment_letter_id : p_assignment_letter_id,
                    letter_no : letter_no,
                    letter_body : letter_body,
                    letter_date : letter_date,
                    p_assignment_type_id : p_assignment_type_id,
                    description : description,
                    "<?php echo $this->security->get_csrf_token_name(); ?>" : "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                success: function (data) {
                    if(data.rows=="sukses"){
                        swal('Informasi','Sukses Update Data','info');
                        loadContentWithParams("transaksi.p_assignment_letter", {});
                    }else{
                        swal('Informasi','Tolong Periksa Inputan Anda Kembali','info');
                    }
                    
                },
                error: function (xhr, status, error) {
                    swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                }
            });

        }
    }

    function hapus(){
        var p_assignment_letter_id           = $('#p_assignment_letter_id').val();

        var var_url = "<?php echo WS_JQGRID . "transaksi.p_assignment_letter_controller/delete/?"; ?>";
         var_url += "&id=" + p_assignment_letter_id;

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
                    loadContentWithParams("transaksi.p_assignment_letter", {});
                }else{
                    swal("Delete Failed!");
                }
                
            });
        }, 3000);

        });
    }

    function validasi(){
        var letter_no                  = $('#letter_no').val();
        var letter_body                = CKEDITOR.instances.letter_body.getData();
        var letter_date                = $('#letter_date').val();
        var p_assignment_type_id       = $('#p_assignment_type_id').val();

        if(letter_no == '' || letter_body == '' || letter_date == '' || (p_assignment_type_id == '' || p_assignment_type_id == 0)){
            swal('Oops','Field yang berwarna kuning harus diisi','error');
            return true;
        }
    }

    $('#save-pdf').on('click', function(){
        // alert('test');
        var letter_body  = CKEDITOR.instances.letter_body.getData();
        var p_assignment_letter_id  = $('#p_assignment_letter_id').val();

        if(letter_body == ''){
            swal('Oops','Anda belum memilih data yang akan dicetak','error');
            return;
        }else{

            window.open("<?php echo $url;?>"+p_assignment_letter_id,'savepdf','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=800,height=600');
        }

    });
</script>
<br>
<label class="control-label col-md-5"><b>INFORMASI SURAT TUGAS</b></label>
<div class="row">
    <div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="form-body">
                <input type="hidden" class="form-control" name="p_assignment_letter_id" id="p_assignment_letter_id" style="width: 560px;">  
                <div class="row">
                    <label class="control-label col-md-3">No Surat</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group">
                                <input type="text" class="form-control required" name="letter_no" id="letter_no" style="width: 560px;">                 
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Jenis Surat Tugas</label>
                    <div class="col-md-3">
                        <div id="comboNamaTugas"></div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Tanggal</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker required " name="letter_date" id="letter_date" maxlength="2">                 
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <label class="control-label col-md-3">Deskripsi</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control " name="description" id="description" style="width: 560px;">               
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <!-- <label class="control-label col-md-3">Isi Surat</label> -->
                    <div class="col-md-12">
                        <div class="input-group">
                            <!-- <input type="text" class="form-control" name="letter_body" id="letter_body">             -->
                            <textarea class="form-control" name="letter_body" id="letter_body"></textarea>             
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <a href="javascript:;" class="btn  green " id="insert" onclick="insert()"> Simpan
                        </a>
                        <a href="javascript:;" class="btn  green " id="update" onclick="update()"> Update
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
    $('.datepicker').datepicker({
        todayHighlight: true,
        format: "dd-mm-yyyy",
        autoclose: true
    });

    // $(function () {  
    //   CKEDITOR.replace( 'letter_body' );
    //   // CKEDITOR.config.width = 3000;
    // });

    
</script>