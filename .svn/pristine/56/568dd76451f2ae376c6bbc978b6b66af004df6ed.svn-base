<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Dokumen Pendukung</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                        <i class="blue"></i>
                        <strong> PERMINTAAN PELANGGAN </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong> FORMULIR PENDAFTARAN </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong> DATA IZIN DAN POTENSI </strong>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-4">
                        <i class="blue"></i>
                        <strong> DOKUMEN PENDUKUNG </strong>
                    </a>
                </li>
            </ul>
        </div>



        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-danger" type="submit" id="btn-submit" onclick="cetak()"><i class="fa fa-print"></i>  Cetak Tanda Terima</button>
                    <button class="btn btn-primary" type="submit" id="btn-lov-upload"><i class="fa fa-plus"></i>  Tambah Data</button>
                </div>
            </div>

            <div class="space-2"></div>
            <div class="row">
                <div class="col-md-12">
                    <table id="grid-table"></table>
                    <div id="grid-pager"></div>
                </div>
            </div>

            
            
        </div>
    </div>
</div>

<script type="text/javascript">
    function cetak(){

        var t_customer_order_id = <?php echo $_POST['t_customer_order_id'];?>;

        var url = "<?php echo base_url(); ?>"+"cetak_formulir_tanda_terima_pdf/pageCetak?t_customer_order_id="+t_customer_order_id;

        PopupCenter(url,"Kartu Tanda Terima",500,500);
    } 

    $("#btn-lov-upload").on("click", function(event) {
        var params_legaldoc = {};
        params_legaldoc.code = "TAMBAH LOG AKTIFITAS";
        params_legaldoc.CURR_DOC_ID         = <?php echo $this->input->post('t_customer_order_id'); ?>;  
        params_legaldoc.CURR_DOC_TYPE_ID    = $('#CURR_DOC_TYPE_ID').val();
        params_legaldoc.CURR_PROC_ID        = $('#CURR_PROC_ID').val();
        params_legaldoc.CURR_CTL_ID         = $('#CURR_CTL_ID').val();
        params_legaldoc.USER_ID_DOC         = $('#USER_ID_DOC').val();
        params_legaldoc.USER_ID_DONOR       = $('#USER_ID_DONOR').val();
        params_legaldoc.USER_ID_LOGIN       = $('#USER_ID_LOGIN').val();
        params_legaldoc.USER_ID_TAKEN       = $('#USER_ID_TAKEN').val();
        params_legaldoc.IS_CREATE_DOC       = $('#IS_CREATE_DOC').val();
        params_legaldoc.IS_MANUAL           = $('#IS_MANUAL').val();
        params_legaldoc.CURR_PROC_STATUS    = $('#CURR_PROC_STATUS').val();
        params_legaldoc.CURR_DOC_STATUS     = $('#CURR_DOC_STATUS').val();
        params_legaldoc.PREV_DOC_ID         = $('#PREV_DOC_ID').val();
        params_legaldoc.PREV_DOC_TYPE_ID    = $('#PREV_DOC_TYPE_ID').val();
        params_legaldoc.PREV_PROC_ID        = $('#PREV_PROC_ID').val();
        params_legaldoc.PREV_CTL_ID         = $('#PREV_CTL_ID').val();
        params_legaldoc.SLOT_1              = $('#SLOT_1').val();    
        params_legaldoc.SLOT_2              = $('#SLOT_2').val(); 
        params_legaldoc.SLOT_3              = $('#SLOT_3').val();    
        params_legaldoc.SLOT_4              = $('#SLOT_4').val();  
        params_legaldoc.SLOT_5              = $('#SLOT_5').val();    
        params_legaldoc.MESSAGE             = $('#MESSAGE').val();    
        params_legaldoc.PROFILE_TYPE        = $('#PROFILE_TYPE').val();
        params_legaldoc.ACTION_STATUS       = $('#ACTION_STATUS').val();

        modal_lov_legaldoc_show(params_legaldoc);
    });

</script>

<script>
    $("#tab-1").on("click", function(event) {
        event.stopPropagation();
        loadContentWithParams("transaksi.t_customer_order",{});
    });

    $("#tab-3").on("click", function(event) {
        event.stopPropagation();
        t_vat_registration_id = <?php echo $_POST['t_vat_registration_id'];?> ;
        p_rqst_type_id = <?php echo $_POST['p_rqst_type_id'];?> ;
        t_customer_order_id = <?php echo $_POST['t_customer_order_id'];?> ;
        order_no = <?php echo $_POST['order_no'];?> ;
        order_date = order_date = '<?php echo $this->input->post('order_date'); ?>' ;
        //alert(p_rqst_type_id);
        // t_vat_reg_employee_id = $('#t_vat_reg_employee_id').val() ;
        // t_vat_reg_dtl_restaurant_id = $('#t_vat_reg_dtl_restaurant_id').val() ;
        // t_license_letter_id = $('#t_license_letter_id').val() ;
        if(t_vat_registration_id == null || t_vat_registration_id == 0 || t_vat_registration_id == ""){
            swal('Peringatan','Isi Formulir Pendaftaran Terlebih Dahulu!','error');
            return false;
        }

        loadContentWithParams("transaksi.t_vat_reg_dtl", { //model yang ketiga
            t_customer_order_id: t_customer_order_id,
            order_no:order_no,
            order_date:order_date,
            p_rqst_type_id: p_rqst_type_id,
            t_vat_registration_id: t_vat_registration_id
            
        });
    });

    $("#tab-2").on("click", function(event) {

        event.stopPropagation();
        var grid = $('#grid-table');
        t_customer_order_id = <?php echo $_POST['t_customer_order_id'];?>;
        t_vat_registration_id = <?php echo $_POST['t_vat_registration_id'];?> ;
        p_rqst_type_id = <?php echo $_POST['p_rqst_type_id'];?> ;
        order_no = <?php echo $_POST['order_no'];?> ;
        order_date = '<?php echo $_POST['order_date'];?>' ;
        
        if(t_customer_order_id == null) {
            swal('Informasi','Silahkan pilih salah satu Permintaan Pelanggan','info');
            return false;
        }


        loadContentWithParams("transaksi.t_vat_registration", {
            t_customer_order_id: t_customer_order_id,
            order_no:order_no,
            order_date:order_date,
            p_rqst_type_id:p_rqst_type_id,
            t_vat_registration_id:t_vat_registration_id
        });
    });
</script>



<?php $this->load->view('lov/lov_upload_file'); ?>



<script>
    $(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        $("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."transaksi.t_cust_order_legal_doc_controller/crud"; ?>',
            datatype: "json",
            postData:{t_customer_order_id:<?php echo $this->input->post('t_customer_order_id'); ?>},
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 't_cust_order_legal_doc_id', key: true, width: 5, sorttype: 'number', hidden: true},
                {label: 'ID', name: 't_customer_order_id',  width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Jenis Dokumen',name: 'legal_doc_desc',width: 150, align: "left",editable: false},
                {label: 'ID Dokumen',name: 'p_legal_doc_type_id',width: 150, align: "left",editable: false, hidden:true},

                {label: 'Nama File',name: 'file_name',width: 150, align: "left",editable: true, edittype:'file',
                    editoptions:{
                        enctype:'multipart/form-data'
                    }
                },
                {label: 'Deskripsi',name: 'description',width: 150, align: "left",editable: true, edittype: 'textarea',
                    editoptions: {
                        size: 50,
                        maxlength:255
                    },
                    editrules: {required: false}
                }
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 10,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/

                //alert($('#form_p_legal_doc_type_code').val());

            },
            sortorder:'',
            pager: '#grid-pager',
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
            //memanggil controller jqgrid yang ada di controller read
            editurl: '<?php echo WS_JQGRID."transaksi.t_cust_order_legal_doc_controller/crud"; ?>',
            caption: "Daftar Dokumen Pendukung"

        });

        jQuery('#grid-table').jqGrid('navGrid', '#grid-pager',
            {   //navbar options
                edit: false,
                editicon: 'fa fa-pencil blue bigger-120',
                add: false,
                addicon: 'fa fa-plus-circle purple bigger-120',
                del: true,
                delicon: 'fa fa-trash-o red bigger-120',
                search: true,
                searchicon: 'fa fa-search orange bigger-120',
                refresh: true,
                afterRefresh: function () {
                    // some code here
                    jQuery("#detailsPlaceholder").hide();
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
                //serializeEditData: serializeJSON,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    console.log(form);
                    form.attr('enctype','multipart/form-data');
                    style_edit_form(form);
                    

                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);

                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
                    //reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
               
                editData : {
                    t_customer_order_id: function() {
                        return <?php echo $this->input->post('t_customer_order_id'); ?>;
                    }
                },
                //new record form
                closeAfterAdd: false,
                clearAfterAdd : true,
                closeOnEscape:true,
                recreateForm: true,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                serializeEditData: serializeJSON,
                viewPagerButtons: false,
                onInitializeForm: function(e, form) {
                    var form = $(e[0]);
                    form.attr('enctype','multipart/form-data');
                },
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    form.attr('enctype','multipart/form-data');
                    console.log(form);
                    style_edit_form(form);

                   
                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var formData = new FormData($(this)[0]);
                    var response = jQuery.parseJSON(response.responseText);
                    console.log(formData);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }

                    $(".tinfo").html('<div class="ui-state-success">' + response.message + '</div>');
                    var tinfoel = $(".tinfo").show();
                    tinfoel.delay(3000).fadeOut();
                    //clearInputLegalDocType();
                    uploadFile(response,postdata);
                    //reloadTreeMenu();


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
                    var response = jQuery.parseJSON(response.responseText);
                    //console.log(response.rows);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
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
</script>



