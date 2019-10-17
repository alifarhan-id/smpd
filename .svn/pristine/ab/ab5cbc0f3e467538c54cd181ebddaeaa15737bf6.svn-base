<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Sistem Manajemen Pajak Daerah</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
              type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
              type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
              type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
              type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"
              rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>assets/global/css/components-md.css" rel="stylesheet" id="style_components"
              type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url(); ?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/layouts/layout/css/themes/light2.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url(); ?>assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME LAYOUT STYLES -->

        <!-- jqgrid -->
        <link href="<?php echo base_url(); ?>assets/jqgrid/css/ui.jqgrid-bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/jqgrid.custom.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootgrid/jquery.bootgrid.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootgrid.custom.css"/>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.gif"/>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/swal/sweetalert.css"/>
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

       <!--  <style>
            .jqx-tree {border:none !important;}
            #paneltree-menu {border:none !important;}
            .logo-cam {
                position:fixed;
                top:12px;
                left:255px;
                z-index:15;
            }
            label {
                display: inline !important;
            }
        </style> -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css"/>

    </head>
    <!-- END HEAD -->

    <body style="overflow-x: hidden;">
        <div class="page-container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="portlet light bordered" id="form_wizard_1">
                         <div class="portlet-title">
                             <div class="caption">
                                 <i class=" icon-layers font-red"></i>
                                 <span class="caption-subject font-red bold uppercase"> Pendaftaran Wajib Pajak Online -
                                     <span class="step-title"> Step 1 of 2 </span>
                                 </span>
                             </div>
                         </div>
                         <div class="portlet-body form">
                             <form class="form-horizontal" action="#" id="submit_form" method="POST">
                                 <div class="form-wizard">
                                     <div class="form-body">
                                         <ul class="nav nav-pills nav-justified steps">
                                             <li>
                                                 <a href="#tab1" data-toggle="tab" class="step">
                                                     <span class="number"> 1 </span>
                                                     <span class="desc">
                                                         <i class="fa fa-check"></i> Permintaan Pelanggan </span>
                                                 </a>
                                             </li>
                                             <li>
                                                 <a href="#tab2" data-toggle="tab" class="step">
                                                     <span class="number"> 2 </span>
                                                     <span class="desc">
                                                         <i class="fa fa-check"></i> Formulir Pendaftaran </span>
                                                 </a>
                                             </li>
                                         </ul>
                                         <div id="bar" class="progress progress-striped active" role="progressbar">
                                             <div class="progress-bar progress-bar-success"> </div>
                                         </div>
                                         <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                                <!--- TAB 1 -->
                                                <br>
                                                <div class="col-md-offset-1 col-md-10">
                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <div class="form-group">
                                                        <label for="form_control"><b>User Name</b></label>
                                                        <input type="text" name="InputUsername" id="FormInputUsername" class="form-control" placeholder="User Name" required />
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="button" onclick="checkUser()" name="CheckUserAvailable" class="btn btn-primary"> Cek Ketersediaan</button>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Password</b></label>
                                                        <input type="password" name="InputPassword" id="FormInputPassword" class="form-control" placeholder="Password" required>
                                                    </div>

                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Pertanyaan Lupa Password</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" name="question_pwd" id="FormInputquestion_pwd" class="form-control" placeholder="Pertanyaan Lupa Password" readonly="" required>                                
                                                                <input type="hidden" class="form-control" name="p_private_question_id" id="FormInputp_private_question_id">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovQuestion('FormInputp_private_question_id','FormInputquestion_pwd')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="form_control"><b>Jawaban Lupa Password</b></label>
                                                        <input type="text" name="question_answer" id="FormInputquestion_answer" class="form-control" placeholder="Jawaban Lupa Password" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Email</b></label>
                                                        <input type="text" name="user_email" id="FormInputuser_email" class="form-control" placeholder="Email" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>No. HP</b></label>
                                                        <input type="text"  name="user_hp" id="FormInputuser_hp" class="form-control" placeholder="No. HP" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Jenis Permohonan</b></label>
                                                        <select class="form-control" name="jenis_permohonan" id="FormInputjenis_permohonan" required>
                                                            <option value="0"></option>
                                                            <option value="1">PENDAFTARAN PAJAK HOTEL</option>
                                                            <option value="2">PENDAFTARAN PAJAK RESTORAN</option>
                                                            <option value="5">PENDAFTARAN PAJAK PPJ</option>
                                                            <option value="4">PENDAFTARAN PAJAK PARKIR</option>
                                                            <option value="3">PENDAFTARAN PAJAK HIBURAN</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Deskripsi</b></label>
                                                        <textarea name="description" id="FormInputdescription" class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                  
                                             </div>
                                             <div class="tab-pane" id="tab2">
                                                 <!--- TAB 2 -->
                                                <br>
                                                <div class="col-md-offset-1 col-md-10">

                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Detail Jenis Permohonan</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="type_dtl" id="FormInputtype_dtl" class="form-control" placeholder="Detail Jenis Permohonan" required>                                
                                                                <input type="hidden" class="form-control" name="p_vat_type_dtl_id" id="FormInputp_vat_type_dtl_id">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovJenisPermohonan('FormInputp_vat_type_dtl_id','FormInputtype_dtl', 'FormInputjenis_permohonan')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Nama Wajib Pajak</b></label>
                                                        <input type="text" name="wp_name_Name" id="t_vat_registrationFormwp_name" class="form-control" placeholder="Nama Wajib Pajak" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Alamat Wajib Pajak</b></label>
                                                        <input type="text" name="wp_address_name_Name" id="t_vat_registrationFormwp_address_name" class="form-control" placeholder="Alamat Wajib Pajak" required>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3" style="margin-left: 1px; margin-right: 36px;">
                                                             <div class="form-group">
                                                                <label for="form_control"><b>No.</b></label>
                                                                <input type="text" name="wp_address_no_Name" id="t_vat_registrationFormwp_address_no" class="form-control" placeholder="No." required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" style="margin-right: 35px;">
                                                             <div class="form-group">
                                                                <label for="form_control"><b>RT</b></label>
                                                                <input type="text" name="wp_address_rt_Name" id="t_vat_registrationFormwp_address_rt" class="form-control" placeholder="RT" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                             <div class="form-group">
                                                                <label for="form_control"><b>RW</b></label>
                                                                <input type="text" name="wp_address_rw_Name" id="t_vat_registrationFormwp_address_rw" class="form-control" placeholder="RW" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Kota/Kabupaten</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="wp_kota" id="FormInputwp_kota" class="form-control" placeholder="Kota/Kabupaten" required>
                                                                <input type="hidden" class="form-control" name="p_wp_kota" id="FormInputp_wp_kota">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovKota('FormInputp_wp_kota','FormInputwp_kota')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Kecamatan</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="wp_kecamatan" id="FormInputwp_kecamatan" class="form-control" placeholder="Kecamatan" required>
                                                                <input type="hidden" class="form-control" name="p_wp_kecamatan" id="FormInputp_wp_kecamatan">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovKecamatan('FormInputp_wp_kecamatan','FormInputwp_kecamatan', 'FormInputp_wp_kota')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Kelurahan</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="wp_kelurahan" id="FormInputwp_kelurahan" class="form-control" placeholder="Kelurahan" required>
                                                                <input type="hidden" class="form-control" name="p_wp_kelurahan" id="FormInputp_wp_kelurahan">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovKelurahan('FormInputp_wp_kelurahan','FormInputwp_kelurahan', 'FormInputp_wp_kecamatan')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Nomor Telepone</b></label>
                                                        <input type="text" name="wp_phone_no_Name" id="t_vat_registrationFormwp_phone_no" class="form-control" placeholder="Nomor Telepone" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Nomor Fax</b></label>
                                                        <input type="text" name="wp_fax_no_Name" id="t_vat_registrationFormwp_fax_no" class="form-control" placeholder="Nomor Fax">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Kode Pos</b></label>
                                                        <input type="text" name="wp_zip_code_Name" id="t_vat_registrationFormwp_zip_code" class="form-control" placeholder="Kode Pos" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Email</b></label>
                                                        <input type="text" name="wp_email_Name" id="t_vat_registrationFormwp_email" class="form-control" placeholder="Email" required>
                                                    </div>

                                                    <!-- Perusahaan/Badan -->
                                                    <!-- <hr> -->
                                                    <br>
                                                    <center><h4>Perusahaan/Badan</h4></center>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Nama Perusahaan/Badan</b></label>
                                                        <input type="text" name="company_name_Name" id="t_vat_registrationFormcompany_name" class="form-control" placeholder="Nama Perusahaan/Badan" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-primary" onclick="copyToBadanUsaha()"> Copy </button>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Alamat</b></label>
                                                        <input type="text" name="address_name_Name" id="t_vat_registrationFormaddress_name" class="form-control" placeholder="Alamat Perusahaan/Badan" required>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3" style="margin-left: 1px; margin-right: 36px;">
                                                             <div class="form-group">
                                                                <label for="form_control"><b>No.</b></label>
                                                                <input type="text" name="address_no_Name" id="t_vat_registrationFormaddress_no" class="form-control" placeholder="No." required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" style="margin-right: 35px;">
                                                             <div class="form-group">
                                                                <label for="form_control"><b>RT</b></label>
                                                                <input type="text" name="address_rt_Name" id="t_vat_registrationFormaddress_rt" class="form-control" placeholder="RT" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                             <div class="form-group">
                                                                <label for="form_control"><b>RW</b></label>
                                                                <input type="text" name="address_rw_Name" id="t_vat_registrationFormaddress_rw" class="form-control" placeholder="RW" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   

                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Kota/Kabupaten</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="kota_code" id="FormInputkota_code" class="form-control" placeholder="Kota/Kabupaten" required>
                                                                <input type="hidden" class="form-control" name="p_kota_code" id="FormInputp_kota_code">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovKota('FormInputp_kota_code','FormInputkota_code')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Kecamatan</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="kecamatan_code" id="FormInputkecamatan_code" class="form-control" placeholder="Kecamatan" required>
                                                                <input type="hidden" class="form-control" name="p_kecamatan_code" id="FormInputp_kecamatan_code">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovKecamatan('FormInputp_kecamatan_code','FormInputkecamatan_code', 'FormInputp_kota_code')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Kelurahan</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="kelurahan_code" id="FormInputkelurahan_code" class="form-control" placeholder="Kelurahan" required>
                                                                <input type="hidden" class="form-control" name="p_kelurahan_code" id="FormInputp_kelurahan_code">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovKelurahan('FormInputp_kelurahan_code','FormInputkelurahan_code', 'FormInputp_kecamatan_code')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Nomor Telepone</b></label>
                                                        <input type="text" name="phone_no_Name" id="t_vat_registrationFormphone_no" class="form-control" placeholder="Nomor Telepone" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Nomor Fax</b></label>
                                                        <input type="text" name="fax_no_Name" id="t_vat_registrationFormfax_no" class="form-control" placeholder="Nomor Fax">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Kode Pos</b></label>
                                                        <input type="text" name="zip_code_Name" id="t_vat_registrationFormzip_code" class="form-control" placeholder="Kode Pos" required>
                                                    </div>

                                                    <!-- Merk Usaha -->
                                                    <!-- <hr> -->
                                                    <br>
                                                    <center><h4>Merk Usaha</h4></center>
                                                    
                                                    <div class="form-group">
                                                        <label for="form_control"><b>Nama Merk Usaha</b></label>
                                                        <input type="text" name="company_brand_Name" id="t_vat_registrationFormcompany_brand" class="form-control" placeholder="Nama Merk Usaha" required>
                                                    </div>         

                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-primary" onclick="copyToBrand()"> Copy </button>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Alamat</b></label>
                                                        <input type="text" name="brand_address_name_Name" id="t_vat_registrationFormbrand_address_name" class="form-control" placeholder="Alamat Merk Usaha" required>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3" style="margin-left: 1px; margin-right: 36px;">
                                                             <div class="form-group">
                                                                <label for="form_control"><b>No.</b></label>
                                                                <input type="text" name="brand_address_no_Name" id="t_vat_registrationFormbrand_address_no" class="form-control" placeholder="No." required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" style="margin-right: 35px;">
                                                             <div class="form-group">
                                                                <label for="form_control"><b>RT</b></label>
                                                                <input type="text" name="brand_address_rt_Name" id="t_vat_registrationFormbrand_address_rt" class="form-control" placeholder="RT" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                             <div class="form-group">
                                                                <label for="form_control"><b>RW</b></label>
                                                                <input type="text" name="brand_address_rw_Name" id="t_vat_registrationFormbrand_address_rw" class="form-control" placeholder="RW" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   

                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Kota/Kabupaten</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="brand_kota" id="FormInputbrand_kota" class="form-control" placeholder="Kota/Kabupaten" required>
                                                                <input type="hidden" class="form-control" name="p_brand_kota" id="FormInputp_brand_kota">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovKota('FormInputp_brand_kota','FormInputbrand_kota')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Kecamatan</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="brand_kecamatan" id="FormInputbrand_kecamatan" class="form-control" placeholder="Kecamatan" required>
                                                                <input type="hidden" class="form-control" name="p_brand_kecamatan" id="FormInputp_brand_kecamatan">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovKecamatan('FormInputp_brand_kecamatan','FormInputbrand_kecamatan', 'FormInputp_brand_kota')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Kelurahan</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="brand_kelurahan" id="FormInputbrand_kelurahan" class="form-control" placeholder="Kelurahan" required>
                                                                <input type="hidden" class="form-control" name="p_brand_kelurahan" id="FormInputp_brand_kelurahan">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovKelurahan('FormInputp_brand_kelurahan','FormInputbrand_kelurahan', 'FormInputp_brand_kecamatan')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Nomor Telepone</b></label>
                                                        <input type="text" name="brand_phone_no_Name" id="t_vat_registrationFormbrand_phone_no" class="form-control" placeholder="Nomor Telepone" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Nomor Fax</b></label>
                                                        <input type="text" name="brand_fax_no_Name" id="t_vat_registrationFormbrand_fax_no" class="form-control" placeholder="Nomor Fax">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Kode Pos</b></label>
                                                        <input type="text"  name="brand_zip_code_Name" id="t_vat_registrationFormbrand_zip_code" class="form-control" placeholder="Kode Pos" required>
                                                    </div>

                                                    <!-- Pemilik/Pengelola -->
                                                    <!-- <hr> -->
                                                    <br>
                                                    <center><h4>Pemilik/Pengelola</h4></center>
                                                    
                                                    <div class="form-group">
                                                        <label for="form_control"><b>Nama Pemilik/Pengelola</b></label>
                                                        <input type="text" name="company_owner_Name" id="t_vat_registrationFormcompany_owner" class="form-control" placeholder="Nama Pemilik/Pengelola" required>
                                                    </div>         

                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Jabatan</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="job_position_code_Name" id="t_vat_registrationFormjob_position_code" class="form-control" placeholder="Jabatan" required>
                                                                <input type="hidden" class="form-control" name="p_job_position_id" id="t_vat_registrationFormp_job_position_id">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovJob('t_vat_registrationFormp_job_position_id','t_vat_registrationFormjob_position_code')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-primary" onclick="copyToOwner()"> Copy </button>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Alamat</b></label>
                                                        <input type="text" name="address_name_owner_Name" id="t_vat_registrationFormaddress_name_owner" class="form-control" placeholder="Alamat Pemilik/Pengelola" required>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3" style="margin-left: 1px; margin-right: 36px;">
                                                             <div class="form-group">
                                                                <label for="form_control"><b>No.</b></label>
                                                                <input type="text" name="address_no_owner_Name" id="t_vat_registrationFormaddress_no_owner" class="form-control" placeholder="No." required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" style="margin-right: 35px;">
                                                             <div class="form-group">
                                                                <label for="form_control"><b>RT</b></label>
                                                                <input type="text" name="address_rt_owner_Name" id="t_vat_registrationFormaddress_rt_owner" class="form-control" placeholder="RT" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                             <div class="form-group">
                                                                <label for="form_control"><b>RW</b></label>
                                                                <input type="text" name="address_rw_owner_Name" id="t_vat_registrationFormaddress_rw_owner" class="form-control" placeholder="RW" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Kota/Kabupaten</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="kota_own_code" id="FormInputkota_own_code" class="form-control" placeholder="Kota/Kabupaten" required>
                                                                <input type="hidden" class="form-control" name="p_kota_own_code" id="FormInputp_kota_own_code">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovKota('FormInputp_kota_own_code','FormInputkota_own_code')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Kecamatan</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="kecamatan_own_code" id="FormInputkecamatan_own_code" class="form-control" placeholder="Kecamatan" required>
                                                                <input type="hidden" class="form-control" name="p_kecamatan_own_code" id="FormInputp_kecamatan_own_code">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovKecamatan('FormInputp_kecamatan_own_code','FormInputkecamatan_own_code', 'FormInputp_kota_own_code')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label for="form_control" class="form-group" style="margin-bottom: 5px !important;"><b>Kelurahan</b></label>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">                                                                
                                                                <input type="text" readonly="" name="kelurahan_own_code" id="FormInputkelurahan_own_code" class="form-control" placeholder="Kelurahan" required>
                                                                <input type="hidden" class="form-control" name="p_kelurahan_own_code" id="FormInputp_kelurahan_own_code">
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" onclick="showLovKelurahan('FormInputp_kelurahan_own_code','FormInputkelurahan_own_code', 'FormInputp_kecamatan_own_code')"> PILIH </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Nomor Telepone</b></label>
                                                        <input type="text" name="phone_no_owner_Name" id="t_vat_registrationFormphone_no_owner" class="form-control" placeholder="Nomor Telepone" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Nomor Fax</b></label>
                                                        <input type="text" name="fax_no_owner_Name" id="t_vat_registrationFormfax_no_owner" class="form-control" placeholder="Nomor Fax">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Kode Pos</b></label>
                                                        <input type="text" name="zip_code_owner_Name" id="t_vat_registrationFormzip_code_owner" class="form-control" placeholder="Kode Pos" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form_control"><b>Email</b></label>
                                                        <input type="text" name="email_owner_Name" id="t_vat_registrationFormemail_owner" class="form-control" placeholder="Email" required>
                                                    </div>

                                                </div>
                                                  
                                             </div>
                                             
                                         </div>
                                     </div>

                                     <div>
                                         <div class="row">
                                             <div class="col-md-12">
                                             <center>
                                                 <a href="javascript:;" class="btn default button-previous">
                                                     <i class="fa fa-angle-left"></i> Back </a>
                                                 <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                     <i class="fa fa-angle-right"></i>
                                                 </a>
                                                 <button type="submit" class="btn green button-submit"><i class="fa fa-check"></i> Submit</button>
                                                 <!-- <a href="javascript:;" class="btn green button-submit"> Submit
                                                     <i class="fa fa-check"></i>
                                                 </a> -->
                                             </center>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                </div>
            </div>
        </div>


    <!-- BEGIN CORE PLUGINS -->
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/global/scripts/app.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->

    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <!-- begin jqgrid -->


    <!-- begin swal -->
    <script src="<?php echo base_url(); ?>assets/swal/sweetalert.min.js"></script>
    <!-- end swal -->

    <script src="<?php echo base_url(); ?>assets/bootgrid/jquery.bootgrid.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.number.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script> -->
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

    <?php 
        $this->load->view('lov/lov_p_private_question.php');
        $this->load->view('lov/lov_kota.php');
        $this->load->view('lov/lov_kec.php');
        $this->load->view('lov/lov_kel.php');
        $this->load->view('lov/lov_vat_type_dtl.php');
        $this->load->view('lov/lov_job_position.php');
    ?>

    <script type="text/javascript">
        $('.button-submit').hide();
        $('.button-previous').hide();

        $(function() {
            var csfrData = {};
            csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
            $.ajaxSetup({
                data: csfrData,
                cache: false
            });
        });

        function showLovQuestion(id, name){
            modal_private_question_show(id, name);
        }

        function showLovKota(id, name){
            modal_lov_kota_show(id, name);
        }

        function showLovJob(id, name){
            modal_job_position_show(id, name);
        }

        function showLovKecamatan(id, name, parentId){
            var parId = $('#'+parentId).val();
            if (parId=='' || parId==0 ) {
                swal('Informasi','Kota/Kabupaten Belum Diisi','info');
                return false;
            }
            modal_lov_kecamatan_show(id, name, parId);
        }

        function showLovKelurahan(id, name, parentId){
            var parId = $('#'+parentId).val();
            if (parId=='' || parId==0 ) {
                swal('Informasi','Kecamatan Belum Diisi','info');
                return false;
            }
            modal_lov_kelurahan_show(id, name, parId);
        }

        function showLovJenisPermohonan(id, name, parentId){
            var parId = $('#'+parentId).val();
            if (parId=='' || parId==0 ) {
                swal('Informasi','Jenis Permohonan Belum Dipilih','info');
                return false;
            }
            modal_lov_vat_dtl_show(id, name, parId);
        }

        function checkUser(){
            var uname = $('#FormInputUsername').val();
            if (uname=='' || uname==0 ) {
                swal('Informasi','Username Belum Diisi','info');
                return false;
            }

            if(uname.length < 8){
                swal('Informasi','Username Minimal 8 Karakter','info');
                return false;
            }

            $.ajax({
                type:'post',
                dataType: "json",
                url: '<?php echo site_url('pendaftaran_online/check_user');?>',
                data: {'user_name' : uname},
                success: function(data){
                    
                    if(data.cek_user ==  0){
                        swal('Informasi','Username Dapat Dipakai','success');
                        return false;   
                    }else{
                        swal('Informasi','Username Sudah Dipakai','info');
                        $('#FormInputUsername').val('');
                        return false;
                    }
                }
            });
            
        }

        function submitform(url, postData){
            // Send the data using post
                $.ajax({
                    url: url,
                    type: "POST",
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData:false,
                    data: postData,
                    success: function (data) {
                        if(data.success){
                            swal('Informasi',data.message,'success');
                        }else{
                            swal('Informasi',data.message,'info');
                        }

                    },
                    error: function (xhr, status, error) {
                        swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                    }
                });
        }


        function copyToBadanUsaha(){
            $('#t_vat_registrationFormaddress_name').val($('#t_vat_registrationFormwp_address_name').val());
            $('#t_vat_registrationFormaddress_no').val($('#t_vat_registrationFormwp_address_no').val());
            $('#t_vat_registrationFormaddress_rt').val($('#t_vat_registrationFormwp_address_rt').val());
            $('#t_vat_registrationFormaddress_rw').val($('#t_vat_registrationFormwp_address_rw').val());
            $('#FormInputkota_code').val($('#FormInputwp_kota').val());
            $('#FormInputp_kota_code').val($('#FormInputp_wp_kota').val());
            $('#FormInputkecamatan_code').val($('#FormInputwp_kecamatan').val());
            $('#FormInputp_kecamatan_code').val($('#FormInputp_wp_kecamatan').val());
            $('#FormInputkelurahan_code').val($('#FormInputwp_kelurahan').val());
            $('#FormInputp_kelurahan_code').val($('#FormInputp_wp_kelurahan').val());
            $('#t_vat_registrationFormphone_no').val($('#t_vat_registrationFormwp_phone_no').val());
            $('#t_vat_registrationFormfax_no').val($('#t_vat_registrationFormwp_fax_no').val());
            $('#t_vat_registrationFormzip_code').val($('#t_vat_registrationFormwp_zip_code').val());
        }
        function copyToBrand(){
            $('#t_vat_registrationFormbrand_address_name').val($('#t_vat_registrationFormaddress_name').val());
            $('#t_vat_registrationFormbrand_address_no').val($('#t_vat_registrationFormaddress_no').val());
            $('#t_vat_registrationFormbrand_address_rt').val($('#t_vat_registrationFormaddress_rt').val());
            $('#t_vat_registrationFormbrand_address_rw').val($('#t_vat_registrationFormaddress_rw').val());
            $('#FormInputbrand_kota').val($('#FormInputkota_code').val());
            $('#FormInputp_brand_kota').val($('#FormInputp_kota_code').val());
            $('#FormInputbrand_kecamatan').val($('#FormInputkecamatan_code').val());
            $('#FormInputp_brand_kecamatan').val($('#FormInputp_kecamatan_code').val());
            $('#FormInputbrand_kelurahan').val($('#FormInputkelurahan_code').val());
            $('#FormInputp_brand_kelurahan').val($('#FormInputp_kelurahan_code').val());
            $('#t_vat_registrationFormbrand_phone_no').val($('#t_vat_registrationFormphone_no').val());
            $('#t_vat_registrationFormbrand_fax_no').val($('#t_vat_registrationFormfax_no').val());
            $('#t_vat_registrationFormbrand_zip_code').val($('#t_vat_registrationFormzip_code').val());
        }
        function copyToOwner(){
            $('#t_vat_registrationFormaddress_name_owner').val($('#t_vat_registrationFormbrand_address_name').val());
            $('#t_vat_registrationFormaddress_no_owner').val($('#t_vat_registrationFormbrand_address_no').val());
            $('#t_vat_registrationFormaddress_rt_owner').val($('#t_vat_registrationFormbrand_address_rt').val());
            $('#t_vat_registrationFormaddress_rw_owner').val($('#t_vat_registrationFormbrand_address_rw').val());
            $('#FormInputkota_own_code').val($('#FormInputbrand_kota').val());
            $('#FormInputp_kota_own_code').val($('#FormInputp_brand_kota').val());
            $('#FormInputkecamatan_own_code').val($('#FormInputbrand_kecamatan').val());
            $('#FormInputp_kecamatan_own_code').val($('#FormInputp_brand_kecamatan').val());
            $('#FormInputkelurahan_own_code').val($('#FormInputbrand_kelurahan').val());
            $('#FormInputp_kelurahan_own_code').val($('#FormInputp_brand_kelurahan').val());
            $('#t_vat_registrationFormphone_no_owner').val($('#t_vat_registrationFormbrand_phone_no').val());
            $('#t_vat_registrationFormfax_no_owner').val($('#t_vat_registrationFormbrand_fax_no').val());
            $('#t_vat_registrationFormzip_code_owner').val($('#t_vat_registrationFormbrand_zip_code').val());
        }

        var FormWizard = function () {
            return {
                //main function to initiate the module
                init: function () {
                    if (!jQuery().bootstrapWizard) {
                        return;
                    }


                    var form = $('#submit_form');
                    var error = $('.alert-danger', form);
                    var success = $('.alert-success', form);

                    form.validate({
                        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                        errorElement: 'span', //default input error message container
                        errorClass: 'help-block help-block-error', // default input error message class
                        focusInvalid: false, // do not focus the last invalid input
                        rules: {},

                        messages: { // custom messages for radio buttons and checkboxes
                            'payment[]': {
                                required: "Please select at least one option",
                                minlength: jQuery.validator.format("Please select at least one option")
                            }
                        },

                        errorPlacement: function (error, element) { // render error placement for each input type
                            if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                                error.insertAfter("#form_gender_error");
                            } else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
                                error.insertAfter("#form_payment_error");
                            } else {
                                error.insertAfter(element); // for other inputs, just perform default behavior
                            }
                        },

                        invalidHandler: function (event, validator) { //display error alert on form submit
                            success.hide();
                            error.show();
                            App.scrollTo(error, -200);
                        },

                        highlight: function (element) { // hightlight error inputs
                            $(element)
                                .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                        },

                        unhighlight: function (element) { // revert the change done by hightlight
                            $(element)
                                .closest('.form-group').removeClass('has-error'); // set error class to the control group
                        },

                        success: function (label) {
                            if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                                label
                                    .closest('.form-group').removeClass('has-error').addClass('has-success');
                                label.remove(); // remove error label here
                            } else { // display success icon for other inputs
                                label
                                    .addClass('valid') // mark the current input as valid and display OK icon
                                    .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                            }
                        },

                        submitHandler: function (form) {
                            success.show();
                            error.hide();

                            /*if (form.valid() == true) {
                                alert('tes');
                                return false;
                                form.submit();
                            }*/


                            //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax

                        }

                    });


                    var handleTitle = function (tab, navigation, index) {
                        var total = navigation.find('li').length;
                        var current = index + 1;
                        // set wizard title
                        $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
                        // set done steps
                        jQuery('li', $('#form_wizard_1')).removeClass("done");
                        var li_list = navigation.find('li');
                        for (var i = 0; i < index; i++) {
                            jQuery(li_list[i]).addClass("done");
                        }

                        if (current == 1) {
                            $('#form_wizard_1').find('.button-previous').hide();
                        } else {
                            $('#form_wizard_1').find('.button-previous').show();
                        }

                        if (current >= total) {
                            $('#form_wizard_1').find('.button-next').hide();
                            $('#form_wizard_1').find('.button-submit').show();
                        } else {
                            $('#form_wizard_1').find('.button-next').show();
                            $('#form_wizard_1').find('.button-submit').hide();


                        }
                        //App.scrollTo($('.page-title'));
                    };

                    // default form wizard
                    $('#form_wizard_1').bootstrapWizard({
                        'nextSelector': '.button-next',
                        'previousSelector': '.button-previous',
                        onTabClick: function (tab, navigation, index, clickedIndex) {
                            return false;

                            success.hide();
                            error.hide();
                            if (form.valid() == false) {
                                return false;
                            }

                            handleTitle(tab, navigation, clickedIndex);
                        },
                        onNext: function (tab, navigation, index) {
                            success.hide();
                            error.hide();

                            if (form.valid() == false) {
                                return false;
                            }

                            handleTitle(tab, navigation, index);
                        },
                        onPrevious: function (tab, navigation, index) {
                            success.hide();
                            error.hide();

                            handleTitle(tab, navigation, index);
                        },
                        onTabShow: function (tab, navigation, index) {
                            var total = navigation.find('li').length;
                            var current = index + 1;
                            var $percent = (current / total) * 100;
                            $('#form_wizard_1').find('.progress-bar').css({
                                width: $percent + '%'
                            });
                        }
                    });

                    $('#form_wizard_1').find('.button-previous').hide();
                    $('#form_wizard_1 .button-submit').click(function () {
                        
                    }).hide();


                }

            };

        }();


        jQuery(document).ready(function () {
            FormWizard.init();


            $('#submit_form').on('submit', (function (e) {
                var uname = $('#FormInputUsername').val();
                if(!$("#submit_form").valid()) {
                    return false;
                }
                
                if(uname.length < 8){
                    swal('Informasi','Username Minimal 8 Karakter','info');
                    $('#form_wizard_1').bootstrapWizard('previous');
                    return false;
                }

                e.preventDefault();

                var postData = new FormData(this),
                    urlSubmit = "<?php echo site_url('pendaftaran_online/submit_registration');?>";

                $.ajax({
                    type:'post',
                    dataType: "json",
                    url: '<?php echo site_url('pendaftaran_online/check_user');?>',
                    data: {'user_name' : uname},
                    success: function(data){                        
                        if(data.cek_user ==  0){
                            submitform(urlSubmit, postData);   
                        }else{
                            swal('Informasi','Username Sudah Dipakai','info');
                            $('#FormInputUsername').val('');
                            $('#form_wizard_1').bootstrapWizard('previous');
                            return false;
                        }
                    }
                });

                
            }));

        });
     </script>   
    </body>
</html>