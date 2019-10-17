<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>CETAK ULANG NOTA PENGURANGAN BPHTB</span>
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
                    <span class="caption-subject font-blue bold uppercase"> CETAK ULANG NOTA PENGURANGAN BPHTB
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

    function openInNewTab(url) {
        window.open(url, 'No Payment', 'left=0,top=0,width=500,height=500,toolbar=no,scrollbars=yes,resizable=yes');
    }

    function cetak_lembar_perhitungan(params, lembar_cetak) {

        //var lembar_cetak = document.getElementById(lembar_cetak).value;
            
        if(lembar_cetak == 4 || lembar_cetak == 7) {
            url = "<?php echo base_url(); ?>"+"cetak_rep_pengurangan_bphtb_gono_gini/pageCetak?t_bphtb_registration_id="+params;
            openInNewTab(url);
        }else {
            url = "<?php echo base_url(); ?>"+"cetak_rep_pengurangan_bphtb/pageCetak?t_bphtb_registration_id="+params;
            openInNewTab(url);
        }
    }

    function cetak_lembar_disposisi(params, lembar_cetak) {
        url = "<?php echo base_url(); ?>"+"cetak_rep_pengurangan_bphtb_lembar_disposisi/pageCetak?t_bphtb_registration_id="+params;
        openInNewTab(url);
    }

    function cetak_berita_acara(params, lembar_cetak) {
        //var lembar_cetak = document.getElementById(lembar_cetak).value;
        if(lembar_cetak == 2 || lembar_cetak == 3 || lembar_cetak == 4 || lembar_cetak == 7) {
            url = "<?php echo base_url(); ?>"+"cetak_rep_pengurangan_bphtb_berita_acara/pageCetak?t_bphtb_registration_id="+params;
            openInNewTab(url);
        }else {
            url = "<?php echo base_url(); ?>"+"cetak_rep_pengurangan_bphtb_berita_acara_v2/pageCetak?t_bphtb_registration_id="+params;
            openInNewTab(url);
        }
    }

    function cetak_nota_dinas(params, lembar_cetak, pejabat) {
        //alert(pejabat);
        url = "<?php echo base_url(); ?>"+"cetak_rep_pengurangan_bphtb_nota_dinas/pageCetak?t_bphtb_registration_id="+params+"&pejabat="+pejabat;
        openInNewTab(url);
    }

    function cetak_keputusan_kadis(params, lembar_cetak) {
        url = "<?php echo base_url(); ?>"+"cetak_rep_pengurangan_bphtb_surat_keputusan/pageCetak?t_bphtb_registration_id="+params;
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
                    {label: 'NAMA WP',name: 'wp_name',width: 300,sorttype: 'text'},  
                    {label: 'No Registrasi',name: 'registration_no',width: 150,sorttype: 'text',  align: "right"},
                    {label: 'NOP',name: 'njop_pbb',width: 200,sorttype: 'number'},
                    {label: 'Alamat WP',name: 'wp_address_name',width: 400,sorttype: 'text'},
                    {label: 'Alamat Objek Pajak',name: 'object_address_name',width: 400,sorttype: 'text'},
                    {label: 'Total Pajak',name: 'bphtb_amt_final',width: 150, align: "right",formatter:'currency', formatoptions: {prefix:"", thousandsSeparator:','}
                    },
                    {label: 'Cetak 1',name: 'Options',width: 180, align: "center",
                        formatter:function(cellvalue, options, rowObject) {
                            var t_bphtb_registration_id = rowObject['t_bphtb_registration_id'];
                            var lembar_cetak = rowObject['pilihan_lembar_cetak'];
                            return '<a class="btn btn-primary btn-xs" href="#" onClick="cetak_lembar_perhitungan('+t_bphtb_registration_id+','+lembar_cetak+')">Lembar Perhitungan</a>';
                        }
                    },
                    {label: 'Cetak 2',name: 'Options',width: 170, align: "center",
                        formatter:function(cellvalue, options, rowObject) {
                            var t_bphtb_registration_id = rowObject['t_bphtb_registration_id'];
                            var lembar_cetak = rowObject['pilihan_lembar_cetak'];
                            return '<a class="btn btn-primary btn-xs" href="#" onClick="cetak_lembar_disposisi('+t_bphtb_registration_id+','+lembar_cetak+')">Lembar Disposisi</a>';
                        }
                    },
                    {label: 'Cetak 3',name: 'Options',width: 160, align: "center",
                        formatter:function(cellvalue, options, rowObject) {
                            var t_bphtb_registration_id = rowObject['t_bphtb_registration_id'];
                            var lembar_cetak = rowObject['pilihan_lembar_cetak'];
                            return '<a class="btn btn-primary btn-xs" href="#" onClick="cetak_berita_acara('+t_bphtb_registration_id+','+lembar_cetak+')">Berita Acara</a>';
                        }
                    },
                    {label: 'Cetak 4',name: 'Options',width: 250, align: "center",
                        formatter:function(cellvalue, options, rowObject) {
                            var t_bphtb_registration_id = rowObject['t_bphtb_registration_id'];
                            var lembar_cetak = rowObject['pilihan_lembar_cetak'];
                            return '<div><a class="btn btn-primary btn-xs" href="#" onClick="cetak_nota_dinas('+t_bphtb_registration_id+','+lembar_cetak+',1)">Nota Dinas KASI</a><a class="btn btn-primary btn-xs" href="#" onClick="cetak_nota_dinas('+t_bphtb_registration_id+','+lembar_cetak+',2)">Nota Dinas KABID</a></div>';
                        }
                    },
                    {label: 'Cetak 5',name: 'Options',width: 170, align: "center",
                        formatter:function(cellvalue, options, rowObject) {
                            var t_bphtb_registration_id = rowObject['t_bphtb_registration_id'];
                            var lembar_cetak = rowObject['pilihan_lembar_cetak'];
                            return '<a class="btn btn-primary btn-xs" href="#" onClick="cetak_keputusan_kadis('+t_bphtb_registration_id+','+lembar_cetak+')">Keputusan Kadis</a>';
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
                caption: "DAFTAR BPHTB PENGURANGAN"

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
                    url: '<?php echo WS_JQGRID."transaksi.t_bphtb_cetak_ulang_nota_pengurangan_controller/read_data"; ?>',
                    postData:{s_keyword : $('#s_keyword').val()}
                });
                $("#grid-table").jqGrid("setCaption", "DAFTAR BPHTB PENGURANGAN");
                $("#grid-table").trigger("reloadGrid");
            });
        }
    });

</script>