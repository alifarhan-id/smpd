<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Target VS Realisasi</span>
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
                        <strong> Provinsi </strong>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong> Kota/Kabupaten </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong> Kecamatan&Kelurahan </strong>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-xs-12">
                   <table id="grid-table"></table>
                   <div id="grid-pager"></div>
                </div>
            </div>
            <hr>
            <div class="row">  
                <div class="col-xs-6">
                    <div DISPLAY: inline-block" id="container"></div>
                </div>  
                <div class="col-xs-6">
                    <div DISPLAY: inline-block" id="container2"></div>
                </div>  
            </div>
        </div>
    </div>
</div>


<script>
$("#tab-1").on("click", function(event) {
    event.stopPropagation();
    loadContentWithParams("parameter.p_provinsi",{});
});
$("#tab-3").on("click", function(event) {

    event.stopPropagation();
    var grid = $('#grid-table');
    p_region_id = grid.jqGrid ('getGridParam', 'selrow');
    region_name = grid.jqGrid ('getCell', p_region_id, 'region_name');
    parent_id = <?php echo $this->input->post('p_region_id'); ?>;

    if(p_region_id == null) {
        swal('Informasi','Silahkan pilih salah satu kota','info');
        return false;
    }

    loadContentWithParams("parameter.p_region", {
        p_region_id: p_region_id,
        region_name : region_name,
        parent_id : parent_id
    });
});
</script>
<?php $this->load->view('lov/lov_business_area'); ?>

<script>
    $(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        $("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."parameter.p_kota_controller/crud"; ?>',
            datatype: "json",
            postData: { 
                parent_id : <?php echo $this->input->post('p_region_id'); ?>
            },
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 'p_region_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Parent ID', name: 'parent_id', width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Kode Regional',name: 'region_code',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:255
                    },
                    editrules: {required: false}
                },
                {label: 'Regional',name: 'region_name',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:255
                    }
                },
                {label: 'Kode Wilayah',name: 'business_area_name',width: 150, align: "left",editable: false},
                {label: 'Kode Wilayah',
                    name: 'p_business_area_id',
                    width: 250,
                    sortable: true,
                    editable: true,
                    hidden: true,
                    editrules: {edithidden: true, required:false},
                    edittype: 'custom',
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            // give the editor time to initialize
                            setTimeout( function() {
                                elm.append('<input id="form_business_area_id" type="text" style="display:none;" >'+
                                        '<input id="form_business_area_code" readonly type="text" class="FormElement form-control" placeholder="Pilih Kode Wilayah" required=true>'+
                                        '<button class="btn btn-success" type="button" onclick="showLOVBusinessArea(\'form_business_area_id\',\'form_business_area_code\')">'+
                                        '   <span class="fa fa-search bigger-110"></span>'+
                                        '</button>');
                                $("#form_business_area_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {

                            if(oper === 'get') {
                                return $("#form_business_area_id").val();
                            } else if( oper === 'set') {
                                $("#form_business_area_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'code');
                                        $("#form_business_area_code").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                },
                {label: 'Level',name: 'p_region_level_id',width: 200, align: "left",editable: false, hidden:true
                },
                {label: 'Kode Pos',name: 'postal_code',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:255
                    },
                    editrules: {required: false}
                },
                {label: 'Kode Wilayah Nasional',name: 'nasional_code',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:255
                    },
                    editrules: {required: false}
                },
                {label: 'Deskripsi',name: 'description',width: 150, align: "left",editable: true, edittype: 'textarea',
                    editoptions: {
                        size: 30,
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

            },
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '<?php echo WS_JQGRID."parameter.p_kota_controller/crud"; ?>',
            postData: { 
                p_region_id : <?php echo $this->input->post('p_region_id'); ?>
            },
            caption: "Daftar Regional"

        });

        jQuery('#grid-table').jqGrid('navGrid', '#grid-pager',
            {   //navbar options
                edit: true,
                editicon: 'fa fa-pencil blue bigger-120',
                add: true,
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
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
                    return [true,"",response.responseText];
                }
            },
            {
                editData : {
                    parent_id: function() {
                        return <?php echo $this->input->post('p_region_id'); ?>;
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
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);
                    setTimeout(function() {
                    clearInputBusinessArea();
                     },100);
                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }

                    $(".tinfo").html('<div class="ui-state-success">' + response.message + '</div>');
                    var tinfoel = $(".tinfo").show();
                    tinfoel.delay(3000).fadeOut();


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

/**
 * [showLOVBusinessArea called by input menu_icon to show List Of Value (LOV) of icon]
 * @param  {[type]} id   [description]
 * @param  {[type]} code [description]
 * @return {[type]}      [description]
 */
function showLOVBusinessArea(id, code) {
    modal_business_area_show(id, code);
}

/**
 * [clearInputBusinessArea called by beforeShowForm method to clean input of menu_icon]
 * @return {[type]} [description]
 */
function clearInputBusinessArea() {
    $('#form_business_area_id').val('');
    $('#form_business_area_code').val('');
}
</script>