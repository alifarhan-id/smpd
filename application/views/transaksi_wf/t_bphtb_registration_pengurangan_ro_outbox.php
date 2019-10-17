<!--breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Formulir Pengurangan BPHTB</span>
            <i class="fa fa-circle"></i>
        </li>
        
    </ul>
</div>
<div class="space-4"></div>
    <!-- parameter untuk kembali ke workflow summary -->
    <input type="hidden" id="TEMP_ELEMENT_ID" value="<?php echo $this->input->post('ELEMENT_ID'); ?>" />
    <input type="hidden" id="TEMP_PROFILE_TYPE" value="<?php echo $this->input->post('PROFILE_TYPE'); ?>" />
    <input type="hidden" id="TEMP_P_W_DOC_TYPE_ID" value="<?php echo $this->input->post('P_W_DOC_TYPE_ID'); ?>" />
    <input type="hidden" id="TEMP_P_W_PROC_ID" value="<?php echo $this->input->post('P_W_PROC_ID'); ?>" />
    <input type="hidden" id="TEMP_USER_ID" value="<?php echo $this->input->post('USER_ID'); ?>" />
    <input type="hidden" id="TEMP_FSUMMARY" value="<?php echo $this->input->post('FSUMMARY'); ?>" />
    <!-- end type hidden -->

    <!-- paramater untuk kebutuhan submit dan status -->
    <input type="hidden" id="CURR_DOC_ID" value="<?php echo $this->input->post('CURR_DOC_ID'); ?>">
    <input type="hidden" id="CURR_DOC_TYPE_ID" value="<?php echo $this->input->post('CURR_DOC_TYPE_ID'); ?>">
    <input type="hidden" id="CURR_PROC_ID" value="<?php echo $this->input->post('CURR_PROC_ID'); ?>">
    <input type="hidden" id="CURR_CTL_ID" value="<?php echo $this->input->post('CURR_CTL_ID'); ?>">
    <input type="hidden" id="USER_ID_DOC" value="<?php echo $this->input->post('USER_ID_DOC'); ?>">
    <input type="hidden" id="USER_ID_DONOR" value="<?php echo $this->input->post('USER_ID_DONOR'); ?>">
    <input type="hidden" id="USER_ID_LOGIN" value="<?php echo $this->input->post('USER_ID_LOGIN'); ?>">
    <input type="hidden" id="USER_ID_TAKEN" value="<?php echo $this->input->post('USER_ID_TAKEN'); ?>">
    <input type="hidden" id="IS_CREATE_DOC" value="<?php echo $this->input->post('IS_CREATE_DOC'); ?>">
    <input type="hidden" id="IS_MANUAL" value="<?php echo $this->input->post('IS_MANUAL'); ?>">
    <input type="hidden" id="CURR_PROC_STATUS" value="<?php echo $this->input->post('CURR_PROC_STATUS'); ?>">
    <input type="hidden" id="CURR_DOC_STATUS" value="<?php echo $this->input->post('CURR_DOC_STATUS'); ?>">
    <input type="hidden" id="PREV_DOC_ID" value="<?php echo $this->input->post('PREV_DOC_ID'); ?>">
    <input type="hidden" id="PREV_DOC_TYPE_ID" value="<?php echo $this->input->post('PREV_DOC_TYPE_ID'); ?>">
    <input type="hidden" id="PREV_PROC_ID" value="<?php echo $this->input->post('PREV_PROC_ID'); ?>">
    <input type="hidden" id="PREV_CTL_ID" value="<?php echo $this->input->post('PREV_CTL_ID'); ?>">
    <input type="hidden" id="SLOT_1" value="<?php echo $this->input->post('SLOT_1'); ?>">
    <input type="hidden" id="SLOT_2" value="<?php echo $this->input->post('SLOT_2'); ?>">
    <input type="hidden" id="SLOT_3" value="<?php echo $this->input->post('SLOT_3'); ?>">
    <input type="hidden" id="SLOT_4" value="<?php echo $this->input->post('SLOT_4'); ?>">
    <input type="hidden" id="SLOT_5" value="<?php echo $this->input->post('SLOT_5'); ?>">
    <input type="hidden" id="MESSAGE" value="<?php echo $this->input->post('MESSAGE'); ?>">
    <input type="hidden" id="PROFILE_TYPE" value="<?php echo $this->input->post('PROFILE_TYPE'); ?>">
    <input type="hidden" id="ACTION_STATUS" value="<?php echo $this->input->post('ACTION_STATUS'); ?>">
    <!-- end type hidden -->
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" class="back" id="tab-0">
                        <i class="blue"></i>
                        <strong> Formulir Pengurangan BPHTB</strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                        <i class="blue"></i>
                        <strong> Dokumen Pendukung </strong>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet blue box menu-panel">
                        <div class="portlet-title">
                            <div class="caption">Informasi Formulir Pengurangan BPHTB</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">   
                            <div class="form-horizontal">
                                <div class="row">
                                    <!-- start subject -->
                                    <div class="form-group">
                                        <label class="control-label col-md-2" id="keterangan-kurang-bayar">  </label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2"> A. Subjek Pajak </label>
                                        <label class="control-label col-md-4" style="text-align: left !important;" id="subject_pajak" name="subject_pajak"></label>

                                    </div>
                                    <div class="form-group" style="display: none">
                                        <label class="control-label col-md-2">No Registrasi
                                        </label>
                                        <div class="col-md-3">
                                            <input type="hidden" class="form-control" name="registration_no" id="registration_no" readonly>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Nama
                                        </label>
                                        <div class="col-md-3">
                                            <input type="hidden" class="form-control" name="t_bphtb_registration_id" id="t_bphtb_registration_id">
                                            <input type="text" class="form-control" maxlength="64" name="wp_name" id="wp_name" readonly>
                                            <input type="hidden" class="form-control" name="p_bphtb_type_id" id="p_bphtb_type_id">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">NPWP
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" maxlength="32" name="npwp" id="npwp" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Alamat
                                        </label>
                                        <div class="col-md-4">
                                            <textarea rows="4" cols="50" class="form-control" maxlength="256"  name="wp_address_name" id="wp_address_name" readonly></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">No Telp
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" maxlength="32" name="phone_no" id="phone_no" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">No Hp
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control formatRight" maxlength="32" name="mobile_phone_no" id="mobile_phone_no" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">RT/RW
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <input type="text" class="form-control" maxlength="10" name="wp_rt" id="wp_rt" readonly>
                                                <span class="input-group-addon"> / </span>
                                                <input type="text" class="form-control" maxlength="10" name="wp_rw" id="wp_rw" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Kota/Kabupaten
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control required" maxlength="8" name="wp_p_region_id" id="wp_p_region_id" readonly>
                                                <input type="text" class="form-control" name="wp_kota" id="wp_kota" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Kecamatan
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control" name="wp_p_region_id_kec" maxlength="8" id="wp_p_region_id_kec" readonly>
                                                <input type="text" class="form-control" name="wp_kecamatan" id="wp_kecamatan" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Kelurahan
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control required" name="wp_p_region_id_kel" maxlength="8" id="wp_p_region_id_kel" readonly>
                                                <input type="text" class="form-control" name="wp_kelurahan" id="wp_kelurahan" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End subject -->

                                    <!-- start Objek -->
                                    <div class="form-group">
                                        <label class="control-label col-md-2 " > B. Objek Pajak </label>
                                        <label class="control-label col-md-4" style="text-align: left !important;" id="objek_pajak" name="objek_pajak"></label>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-2">No Objek Pajak
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" maxlength="48" name="njop_pbb" id="njop_pbb" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Letak Tanah dan atau Bangunan
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" maxlength="128" name="object_letak_tanah" id="object_letak_tanah" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-2">RT/RW
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <input type="text" class="form-control" maxlength="10" name="object_rt" id="object_rt" readonly>
                                                <span class="input-group-addon"> / </span>
                                                <input type="text" class="form-control" maxlength="10" name="object_rw" id="object_rw" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Kota/Kabupaten
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="object_kota" id="object_kota" readonly>
                                                <input type="hidden" class="form-control" maxlength="10" name="object_p_region_id" id="object_p_region_id" readonly>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">kecamatan
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control" maxlength="10" name="object_p_region_id_kec" id="object_p_region_id_kec" readonly>
                                                <input type="text" class="form-control" name="object_kecamatan" id="object_kecamatan" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Kelurahan
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control" maxlength="10" name="object_p_region_id_kel" id="object_p_region_id_kel" readonly>
                                                <input type="text" class="form-control" name="object_kelurahan" id="object_kelurahan" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Dokumen Pendukung 
                                        </label>
                                        <div class="col-md-3">
                                           <div id="comboDocPendukung"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" maxlength="100" name="bphtb_legal_doc_description" id="bphtb_legal_doc_description" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="hidden" class="form-control" name="nilai_doc" id="nilai_doc">
                                        </div>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 ">  Bea Perolehan Hak atas Tanah dan Bangunan yang terutang
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" class="form-control priceformat" maxlength="16"  name="bphtb_amt" id="bphtb_amt" readonly value="0" onfocus="changeNull(this)" onfocusout="changeZero(this)">
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="form-group" >
                                        <label class="control-label col-md-2 ">  Potongan
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" class="form-control priceformat" maxlength="16"  name="bphtb_discount" id="bphtb_discount" readonly value="0" onfocus="changeNull(this)" onfocusout="changeZero(this)">
                                            </div> 
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="description" id="description" readonly>
                                        </div>
                                        
                                    </div>

                                    <div id="div-harus-bayar" class="form-group" style="display: none">
                                        <label class="control-label col-md-2 " class="control-label col-md-2 ">Bea Perolehan Hak atas Tanah dan Bangunan yang harus dibayar </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="bphtb_amt_final_old" id="bphtb_amt_final_old" readonly>
                                        </div>
                                    </div>

                                    <div id="div-pembayaran-sebelumnya" class="form-group" style="display: none">
                                        <label class="control-label col-md-2 " class="control-label col-md-2 ">Nilai Pajak yang sudah dibayar </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="prev_payment_amount" id="prev_payment_amount" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 " id="total-bayar-text" class="control-label col-md-2 ">Bea Perolehan Hak atas Tanah dan Bangunan yang harus dibayar </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" class="form-control priceformat" maxlength="16" name="bphtb_amt_final" id="bphtb_amt_final" readonly>
                                            </div> 
                                        </div>
                                        
                                    </div>
                                    <div class="form-group" >
                                        <label class="control-label col-md-5 " ><b><font color="green"> DATA DIBAWAH INI KHUSUS UNTUK LEMBAR CETAKAN :</font></b>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 " > PILIH LEMBAR CETAKAN UNTUK  </label>
                                        <div class="col-md-3 ">
                                            <select name="pilih_lembar_cetak" id="pilih_lembar_cetak" class="form-control" readonly disabled>
                                                <option value='' >-- Pilih Lembar Cetakan --</option>
                                                <option value='1' >Waris</option>
                                                <option value='2' >Fasos</option>
                                                <option value='3' >Rumah Dinas</option>
                                                <option value='4' >Waris Gono Gini</option>
                                                <option value='5' >Hibah</option>
                                                <option value='6' >Peralihan Hak Baru</option>
                                                <option value='7' >Harta Bersama</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 " > C. Lembar Perhitungan </label>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Pilih Untuk A2
                                        </label>
                                        <div class="col-md-3">
                                             <select  name="opsi_a2" id="opsi_a2" class="form-control" readonly disabled>
                                             </select>
                                            <input type="hidden" class="form-control" name="a2_val" id="a2_val">
                                        </div>
                                        <label class="control-label col-md-2">Keterangan A2
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="opsi_a2_keterangan" id="opsi_a2_keterangan" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Pilih Untuk B7
                                        </label>
                                        <div class="col-md-3">
                                             <select  name="opsi_b7" id="opsi_b7" class="form-control" readonly disabled>
                                             </select>
                                            <input type="hidden" class="form-control" name="b7_val" id="b7_val">
                                        </div>
                                        <label class="control-label col-md-2">Keterangan B7
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="opsi_b7_keterangan" id="opsi_b7_keterangan" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Keterangan Opsi C
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="keterangan_opsi_c" id="keterangan_opsi_c" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Tanggal SK
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="tgl_sk" id="tgl_sk" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Nomor Notaris
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="nomor_notaris" id="nomor_notaris" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group" id="keterangan-gono-gini" >
                                        <label class="control-label col-md-2"><font color="green">Keterangan Opsi C Khusus Gono-Gini/Harta Bersama :
                                        </font></label>
                                        <div class="col-md-4">
                                            <textarea rows="4" cols="50" class="form-control" maxlength="256"  name="keterangan_opsi_c_gono_gini" id="keterangan_opsi_c_gono_gini" readonly></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 " > D. Lembar Berita Acara </label>                                        
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Nomor Berita Acara
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="nomor_berita_acara" id="nomor_berita_acara" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Tanggal Berita Acara
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="tgl_berita_acara" id="tgl_berita_acara" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Petugas Administrator
                                        </label>
                                        <div class="col-md-3">
                                            <div id="administrator"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Petugas Penerima
                                        </label>
                                        <div class="col-md-3">
                                            <div id="pemeriksa"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 " > E. Lembar Disposisi </label>                                        
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">DASAR PENGURANGAN (LEMBAR DISPOSISI) :
                                        </label>
                                        <div class="col-md-7">
                                            <textarea rows="5" cols="100" class="form-control" maxlength="256"  name="dasar_pengurang" id="dasar_pengurang" readonly></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">ANALISA PERMOHONAN PENGURANGAN (LEMBAR DISPOSISI) :
                                        </label>
                                        <div class="col-md-7">
                                            <textarea rows="5" cols="100" class="form-control" maxlength="256"  name="analisa_pengurangan" id="analisa_pengurangan" readonly></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group" style="">
                                        <label class="control-label col-md-5"><font color="red">*sebelum cetak harap tekan tombol "SIMPAN" terlebih dahulu
                                        </font></label>
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="javascript:;" class="btn btn-danger" id="perhitungan" style="display: none"> CETAK LEMBAR KENDALI</a>

                                                <a href="javascript:;" class="btn btn-danger" id="perhitungan" onclick="cetakPdf('perhitungan')"> LEMBAR PERHITUNGAN (1)</a>        
                                               <a href="javascript:;" class="btn btn-danger " id="disposisi" onclick="cetakPdf('disposisi')">LEMBAR DISPOSISI (2)</a>

                                                <a href="javascript:;" class="btn  btn-danger " id="acara" onclick="cetakPdf('acara')">BERITA ACARA (3)</a>

                                                <a href="javascript:;" class="btn  btn-danger " id="kasi" onclick="cetakPdf('1')">NOTA DINAS KASI (4)</a>

                                                <a href="javascript:;" class="btn  btn-danger " id="kabid" onclick="cetakPdf('2')">NOTA DINAS KABID (4)</a>

                                                <a href="javascript:;" class="btn  btn-danger " id="kadis"onclick="cetakPdf('kadis')">KEPUTUSAN KADIS (5)</a>

                                                <a href="javascript:;" onclick="backform()" class="btn  green " id="submit">KEMBALI</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Objek -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('lov/lov_kota'); ?>
<?php $this->load->view('lov/lov_kec'); ?>
<?php $this->load->view('lov/lov_kel'); ?>
<!-- First Load -->
<script type="text/javascript">
    var lembar_cetak = $('#pilih_lembar_cetak').val();
    //alert(lembar_cetak);
    // $("#opsi_a2").html("");
    // $("#opsi_b7").html("");

    //$('#p_bphtb_legal_doc_type_id').disabled();
    


    var a2_val = $("#a2_val").val();
    var b7_val = $("#b7_val").val();

    var arrA2Option = getArrOptA2(lembar_cetak);
    var arrB7Option = getArrOptB7(lembar_cetak);

    for (i = 0; i < arrA2Option.length; i++){
        $('<option/>').val(arrA2Option[i]).html(arrA2Option[i]).appendTo('#opsi_a2');
    }

    for (i = 0; i < arrB7Option.length; i++){
        $('<option/>').val(arrB7Option[i]).html(arrB7Option[i]).appendTo('#opsi_b7');
    }

    $("#opsi_a2").val(a2_val);
    $("#opsi_b7").val(b7_val);

    if(lembar_cetak == '4' || lembar_cetak == '7') { //gono-gini
        $("#keterangan-gono-gini").css('display','');
    }else {
        $("#keterangan-gono-gini").css('display','none');
    }

    function getValueData(){
        selected_val = $("#pilih_lembar_cetak").val();
        var arrA2Option = getArrOptA2(selected_val);
        var arrB7Option = getArrOptB7(selected_val);

        $("#opsi_a2").html("");
        $("#opsi_b7").html("");

        if(selected_val == '4' || selected_val == '7') { //gono-gini
            $("#keterangan-gono-gini").css('display','');

        }else {
            $("#keterangan_opsi_c_gono_gini").html("");
            $("#keterangan-gono-gini").css('display','none');
        }

        for (i = 0; i < arrA2Option.length; i++){
            $('<option/>').val(arrA2Option[i]).html(arrA2Option[i]).appendTo('#opsi_a2');
        }

        for (i = 0; i < arrB7Option.length; i++){
            $('<option/>').val(arrB7Option[i]).html(arrB7Option[i]).appendTo('#opsi_b7');
        }

        /*analisa pengurangan*/
        $("#analisa_pengurangan").html("");
        if(selected_val != "") {
            if(selected_val == '4' || selected_val == '6' || selected_val == '7'){
                $("#analisa_pengurangan").html("Setelah diteliti secara administratif Permohonan Pengurangan Waris untuk Tanah dan Bangunan sebagaimana yang diajukan oleh Pemohon dapat dipertimbangkan");            
            }else{
                $("#analisa_pengurangan").html("Setelah diteliti secara administratif Permohonan Pengurangan "+ $("#pilih_lembar_cetak option:selected").text() +" untuk Tanah dan Bangunan sebagaimana yang diajukan oleh Pemohon dapat dipertimbangkan");
            }
        }
        
        $("#dasar_pengurang").html("");
        if(selected_val != "") {
            $("#dasar_pengurang").html(getDasarPengurangan(selected_val));
        }



    }

    function getArrOptA2(lembar_cetak) {                
        if(lembar_cetak == '1')
                return ['Ahli Waris'];
        if(lembar_cetak == '2')
                return ['Fasilitas Untuk'];
        if(lembar_cetak == '3')
                return ['Janda PNS','Duda PNS','Janda Pensiunan PNS','Duda Pensiunan PNS','Janda TNI/POLRI','Duda TNI/POLRI','PNS','Pensiunan PNS','TNI/POLRI','Pensiunan TNI/POLRI'];
        if(lembar_cetak == '4')
                return ['Ahli Waris'];
        if(lembar_cetak == '5')
                return ['Anak Dari','Orang Tua Dari'];
        if(lembar_cetak == '6')
                return ['Penerima Hibah Dari'];
        if(lembar_cetak == '7')
                return ['Ahli Waris'];
        return [];
    }

    function getArrOptB7(lembar_cetak) {                
        if(lembar_cetak == '1')
                return ['SHM No','SK Kepala Kantor Pertanahan','Letter C', 'HGB No', 'Surat Keterangan'];
        if(lembar_cetak == '2')
                return ['SHM No','SK Kepala Kantor Pertanahan','Letter C', 'HGB No', 'Surat Keterangan'];
        if(lembar_cetak == '3')
                return ['SHM No','SK Kepala Kantor Pertanahan','Letter C', 'HGB No', 'Surat Keterangan'];
        if(lembar_cetak == '4')
                return ['SHM No','SK Kepala Kantor Pertanahan','Letter C', 'HGB No', 'Surat Keterangan'];
        if(lembar_cetak == '5')
                return ['SHM No','SK Kepala Kantor Pertanahan','Letter C', 'HGB No', 'Surat Keterangan'];
        if(lembar_cetak == '6')
                return ['SK Kepala Kantor Pertanahan', 'HGB No', 'Surat Keterangan'];
        if(lembar_cetak == '7')
                return ['SHM No','SK Kepala Kantor Pertanahan','Letter C', 'HGB No', 'Surat Keterangan'];
        
        return [];
    }

    function getDasarPengurangan(lembar_cetak) {
                        
        if(lembar_cetak == '1') {
                return 'Secara normatif, berdasarkan Pasal 17 Ayat 3 huruf a angka 4 Peraturan Walikota Nomor 308 Tahun 2013 bahwa Pemberian pengurangan dan keringanan dapat diberikan kepada Wajib Pajak orang pribadi yang menerima waris dari orang pribadi yang mempunyai hubungan keluarga sedarah dalam garis keturunan lurus satu derajat ke atas atau satu derajat ke bawah, sebesar 50% (lima puluh persen) yang didukung oleh bukti keterangan waris yang berdasarkan ketentuan yang berlaku. Di luar garis keturunan tersebut tidak memperoleh hak keringanan atau pengurangan';
        }
        if(lembar_cetak == '2') {
                return 'Secara normatif, berdasarkan Pasal 20 Ayat 3 huruf c Peraturan Walikota Nomor 308 Tahun 2013 bahwa Pemberian pengurangan dan keringanan dapat diberikan berdasarkan pertimbangan atau keadaan tertentu yaitu Tanah dan/atau bangunan yang digunakan untuk tujuan tertentu yaitu untuk kepentingan sosial atau pendidikan yang semata-mata tidak bertujuan mencari keuntungan antara lain untuk Pemberdayaan Masyarakat Miskin dan Penyantunan Anak Terlantar, panti jompo, rumah yatim piatu, sekolah yang tidak ditujukan mencari keuntungan, rumah sakit swasta milik institusi pelayanan sosial masyarakat';
        }
        if(lembar_cetak == '3') {
                return 'Secara normatif berdasarkan Pasal 17 Ayat 3 huruf b Angka 6 Peraturan Walikota No 308 Tahun 2013 Wajib Pajak atau penanggung pajak orang pribadi Veteran, Pegawai Negeri Sipil (PNS), Tentara Nasional Indonesia (TNI), Polisi Republik Indonesia (Polri), Pensiunan PNS, Purnawirawan TNI, Purnawirawan Polri atau janda/duda-nya yang memperoleh hak atas tanah dan/atau bangunan rumah dinas Pemerintah, sebesar 50% (lima puluh persen) yang dibuktikan dengan Akta maupun keterangan sesuai dengan ketentuan pelepasan hak atas tanah dan/atau bangunan rumah dinas Pemerintah dimaksud. Di luar wajib pajak atau penanggung pajak dimaksud tidak memperoleh hak keringanan atau pengurangan';
        }
        if(lembar_cetak == '4') {
                return 'Secara normatif, berdasarkan Pasal 17 Ayat 3 huruf a angka 4 Peraturan Walikota Nomor 308 Tahun 2013 bahwa Pemberian pengurangan dan keringanan dapat diberikan kepada Wajib Pajak orang pribadi yang menerima waris dari orang pribadi yang mempunyai hubungan keluarga sedarah dalam garis keturunan lurus satu derajat ke atas atau satu derajat ke bawah, sebesar 50% (lima puluh persen) yang didukung oleh bukti keterangan waris yang berdasarkan ketentuan yang berlaku. Di luar garis keturunan tersebut tidak memperoleh hak keringanan atau pengurangan';
        }
        if(lembar_cetak == '5') {
                return 'Secara normatif, berdasarkan Pasal 17 Ayat 3 huruf a angka 4 Peraturan Walikota Nomor 308 Tahun 2013 bahwa Pemberian pengurangan dan keringanan dapat diberikan kepada Wajib Pajak orang pribadi yang menerima waris dari orang pribadi yang mempunyai hubungan keluarga sedarah dalam garis keturunan lurus satu derajat ke atas atau satu derajat ke bawah, sebesar 50% (lima puluh persen) yang didukung oleh bukti keterangan waris yang berdasarkan ketentuan yang berlaku. Di luar garis keturunan tersebut tidak memperoleh hak keringanan atau pengurangan';
        }
        if(lembar_cetak == '6') {
                return 'Pemberian pengurangan dan keringanan dapat diberikan kepada Wajib Pajak atau penanggung pajak badan yang memperoleh hak baru selain Hak Pengelolaan dan telah menguasai tanan dan/atau bangunan secara fisik lebih dari 20 (dua puluh) tahun yang dibuktikan dengan surat pernyataan Wajib Pajak atau penanggung pajak dan keterangan dari Pejabat Pemerintah Daerah setempat, diberikan pengurangan sebersar 50% ( lima puluh persen ).';
        }
                                if(lembar_cetak == '7') {
                return 'Secara normatif, berdasarkan Pasal 17 Ayat 3 huruf a angka 4 Peraturan Walikota Nomor 308 Tahun 2013 bahwa Pemberian pengurangan dan keringanan dapat diberikan kepada Wajib Pajak orang pribadi yang menerima waris dari orang pribadi yang mempunyai hubungan keluarga sedarah dalam garis keturunan lurus satu derajat ke atas atau satu derajat ke bawah, sebesar 50% (lima puluh persen) yang didukung oleh bukti keterangan waris yang berdasarkan ketentuan yang berlaku. Di luar garis keturunan tersebut tidak memperoleh hak keringanan atau pengurangan';
        }
        return '';
    }




</script>

<script>


    $(".priceformat").number( true, 0 , '.',','); /* price number format */
    $(".priceformat").css("text-align", "right");

    $(".numberformat").number( true, 0 , '.','.');
    $(".numberformat").css("text-align", "right");
    $(".formatRight").css("text-align", "right");

    $.ajax({
            url: "<?php echo base_url().'bphtb_registration/load_combo_dok_pendukung/'; ?>" ,
            type: "POST",            
            data: {},
            success: function (data) {
                $( "#comboDocPendukung" ).html( data );
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
    });

    $.ajax({
        url: "<?php echo base_url().'bphtb_registration/petugas_administrator_combo/'; ?>" ,
        type: "POST",
        success: function (data) {
            $( "#administrator" ).html( data );

        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    $.ajax({
        url: "<?php echo base_url().'bphtb_registration/petugas_pemeriksa_combo/'; ?>" ,
        type: "POST",
        success: function (data) {
            $( "#pemeriksa" ).html( data );
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });


    t_customer_order_id = "<?php echo $_POST['CURR_DOC_ID']; ?>";

    $.ajax({
            url: '<?php echo WS_JQGRID."transaksi_wf.t_bphtb_registration_pengurangan_controller/read"; ?>',
            type: "POST",
            dataType: "json",
            data: {
                t_customer_order_id: t_customer_order_id
            },
            success: function (data) {
                if(data.success){
                    var dt = data.rows[0];

                    //alert(dt.pemeriksa_id);

                    $('#t_bphtb_registration_id').val(dt.t_bphtb_registration_id);
                    $('#wp_name').val(dt.wp_name);
                    $('#npwp').val(dt.npwp);
                    $('#wp_address_name').val(dt.wp_address_name);
                    $('#wp_rt').val(dt.wp_rt);
                    $('#wp_rw').val(dt.wp_rw);
                    $('#wp_p_region_id').val(dt.wp_p_region_id);
                    $('#wp_kota').val(dt.wp_kota);
                    $('#wp_p_region_id_kec').val(dt.wp_p_region_id_kec);
                    $('#wp_kecamatan').val(dt.wp_kecamatan);
                    $('#wp_p_region_id_kel').val(dt.wp_p_region_id_kel);
                    $('#wp_kelurahan').val(dt.wp_kelurahan);
                    $('#phone_no').val(dt.phone_no);
                    $('#mobile_phone_no').val(dt.mobile_phone_no);
                    $('#njop_pbb').val(dt.njop_pbb);
                    $('#object_letak_tanah').val(dt.object_address_name);
                    $('#object_rt').val(dt.object_rt);
                    $('#object_rw').val(dt.object_rw);
                    $('#object_p_region_id').val(dt.object_p_region_id);
                    $('#object_kota').val(dt.object_region);
                    $('#object_p_region_id_kec').val(dt.object_p_region_id_kec);
                    $('#object_kecamatan').val(dt.object_kecamatan);
                    $('#object_p_region_id_kel').val(dt.object_p_region_id_kel);
                    $('#object_kelurahan').val(dt.object_kelurahan);
                    $('#p_bphtb_legal_doc_type_id').val(dt.p_bphtb_legal_doc_type_id);
                    $('#land_area').val(dt.land_area);
                    $('#land_price_per_m').val(dt.land_price_per_m);
                    $('#land_total_price').val(dt.land_total_price);
                    $('#building_area').val(dt.building_area);
                    $('#building_price_per_m').val(dt.building_price_per_m);
                    $('#building_total_price').val(dt.building_total_price);
                    $('#market_price').val(dt.market_price);
                    $('#npop').val(dt.npop);
                    $('#npop_tkp').val(dt.npop_tkp);
                    $('#npop_kp').val(dt.npop_kp);
                    $('#bphtb_amt').val(dt.bphtb_amt);
                    $('#bphtb_discount').val(dt.bphtb_discount);
                    $('#bphtb_amt_final').val(dt.bphtb_amt_final);
                    $('#description').val(dt.description);
                    $('#jenis_harga_bphtb').val(dt.jenis_harga_bphtb);
                    $('#bphtb_legal_doc_description').val(dt.bphtb_legal_doc_description);
                    $('#add_disc_percent').val(dt.add_disc_percent);
                    $('#add_discount').val(dt.add_discount);
                    $('#total_price').val(Number($('#land_total_price').val())+Number($('#building_total_price').val()));
                    if(dt.check_potongan == 'Y'){
                        $('#check_potongan').attr('checked', true);
                    };
                    $('#land_area_real').val(dt.land_area_real);
                    $('#land_price_real').val(dt.land_price_real);
                    $('#building_area_real').val(dt.building_area_real);
                    $('#building_price_real').val(dt.building_price_real);
                    $('#pilih_lembar_cetak').val(dt.pilihan_lembar_cetak);

                    $('#opsi_a2').val(dt.opsi_a2);
                    $('#opsi_a2_keterangan').val(dt.opsi_a2_keterangan);
                    $('#opsi_b7').val(dt.opsi_b7);
                    $('#opsi_b7_keterangan').val(dt.opsi_b7_keterangan);
                    $('#keterangan_opsi_c').val(dt.keterangan_opsi_c);
                    $('#tgl_sk').val(dt.tanggal_sk);
                    $('#nomor_notaris').val(dt.nomor_notaris);
                    $('#nomor_berita_acara').val(dt.nomor_berita_acara);
                    $('#keterangan_opsi_c_gono_gini').val(dt.keterangan_opsi_c);
                    $('#tgl_berita_acara').val(dt.tanggal_berita_acara);
                    $('#administrator_id').val(dt.administrator_id);
                    $('#pemeriksa_id').val(dt.pemeriksa_id);
                    $('#dasar_pengurang').val(dt.dasar_pengurang);
                    $('#analisa_pengurangan').val(dt.analisa_penguranan);

                    $('#p_bphtb_legal_doc_type_id').attr('disabled', true);
                    $('#administrator_id').attr('disabled', true);
                    $('#pemeriksa_id').attr('disabled', true);

                    selected_val = $("#pilih_lembar_cetak").val();
                    var arrA2Option = getArrOptA2(selected_val);
                    var arrB7Option = getArrOptB7(selected_val);

                    $("#opsi_a2").html("");
                    $("#opsi_b7").html("");

                    if(selected_val == '4' || selected_val == '7') { //gono-gini
                        $("#keterangan-gono-gini").css('display','');

                    }else {
                        $("#keterangan_opsi_c_gono_gini").html("");
                        $("#keterangan-gono-gini").css('display','none');
                    }

                    for (i = 0; i < arrA2Option.length; i++){
                        $('<option/>').val(arrA2Option[i]).html(arrA2Option[i]).appendTo('#opsi_a2');
                    }

                    for (i = 0; i < arrB7Option.length; i++){
                        $('<option/>').val(arrB7Option[i]).html(arrB7Option[i]).appendTo('#opsi_b7');
                    }

                    /*analisa pengurangan*/
                    $("#analisa_pengurangan").html("");
                    if(selected_val != "") {
                        if(selected_val == '4' || selected_val == '6' || selected_val == '7'){
                            $("#analisa_pengurangan").html("Setelah diteliti secara administratif Permohonan Pengurangan Waris untuk Tanah dan Bangunan sebagaimana yang diajukan oleh Pemohon dapat dipertimbangkan");            
                        }else{
                            $("#analisa_pengurangan").html("Setelah diteliti secara administratif Permohonan Pengurangan "+ $("#pilih_lembar_cetak option:selected").text() +" untuk Tanah dan Bangunan sebagaimana yang diajukan oleh Pemohon dapat dipertimbangkan");
                        }
                    }
                    
                    $("#dasar_pengurang").html("");
                    if(selected_val != "") {
                        $("#dasar_pengurang").html(getDasarPengurangan(selected_val));
                    }
                    
                   
                }
                // console.log(dt.product_name);
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
    });

    

//alert($('#pilih_lembar_cetak').val());
</script>
<!-- /First Load -->

<!-- LOV -->
<script>
    $("#btn-lov-kota-subjek").on('click', function() {   
        modal_lov_kota_show('wp_p_region_id','wp_kota');
    });

    $('#wp_p_region_id').on('change', function() {
        $('#wp_p_region_id_kec').val('');
        $('#wp_kecamatan').val('');
        $('#wp_p_region_id_kel').val('');
        $('#wp_kelurahan').val('');
    });

    $("#btn-lov-kecamatan-subjek").on('click', function() { 
        var kota = $('#wp_p_region_id').val(); 
        //alert(kota);
        if( kota == null || kota == ''){
            swal({title: "Error!", text: "Isi Kota/Kabupaten Terlebih Dahulu", html: true, type: "error"});
            return;
        }
         modal_lov_kecamatan_show('wp_p_region_id_kec','wp_kecamatan',kota);
        
    });

    $('#wp_p_region_id_kec').on('change', function() {
        $('#wp_p_region_id_kel').val('');
        $('#wp_kelurahan').val('');
    });

    $("#btn-lov-kelurahan-subjek").on('click', function() { 
        var kec = $('#wp_p_region_id_kec').val();
        if( kec == null || kec == ''){
            swal({title: "Error!", text: "Isi Kecamatan Terlebih Dahulu", html: true, type: "error"});
             return;
        }
        modal_lov_kelurahan_show('wp_p_region_id_kel','wp_kelurahan',kec);
    });



    $("#btn-lov-kota-objek").on('click', function() {   
        modal_lov_kota_show('object_p_region_id','object_kota');
    });

    $('#object_p_region_id').on('change', function() {
        $('#object_p_region_id_kec').val('');
        $('#object_kecamatan').val('');
        $('#object_p_region_id_kel').val('');
        $('#object_kelurahan').val('');
    });

    $("#btn-lov-kecamatan-objek").on('click', function() { 
        var kota = $('#object_p_region_id').val(); 
        //alert(kota);
        if( kota == null || kota == ''){
            swal({title: "Error!", text: "Isi Kota/Kabupaten Terlebih Dahulu", html: true, type: "error"});
            return;
        }
         modal_lov_kecamatan_show('object_p_region_id_kec','object_kecamatan',kota);
        
    });

    $('#object_p_region_id_kec').on('change', function() {
        $('#object_p_region_id_kel').val('');
        $('#object_kelurahan').val('');
    });

    $("#btn-lov-kelurahan-objek").on('click', function() { 
        var kec = $('#object_p_region_id_kec').val();
        if( kec == null || kec == ''){
            swal({title: "Error!", text: "Isi Kecamatan Terlebih Dahulu", html: true, type: "error"});
             return;
        }
        modal_lov_kelurahan_show('object_p_region_id_kel','object_kelurahan',kec);
    });
</script>
<!-- /LOV -->

<!-- PERHITUNGAN -->

<script>
    function ReplaceNumberWithCommas(yourNumber) {
        var n = yourNumber.toString().split(".");
        n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return n.join(".");
    }


    function hitungNPOPKP(){        
        var npotkp = $('#npop_tkp').val().replace(/,/g ,''); 
        if(npotkp=='' || npotkp=='undefined'){
                npotkp=0;
        }
        var npokp = $('#npop').val().replace(/,/g ,''); 
        if(npokp=='' || npokp=='undefined'){
                npokp=0;
        }
        var add_discount = $('#add_discount').val().replace(/,/g ,''); 
        if(add_discount=='' || add_discount=='undefined'){
            add_discount=0;
        }
        if((parseFloat(npokp)-parseFloat(npotkp)-parseFloat(add_discount)) < 0){
            $('#npop_kp').val(ReplaceNumberWithCommas(0));
        }else{
            var result =ReplaceNumberWithCommas(parseFloat(npokp)-parseFloat(npotkp)-parseFloat(add_discount));
            $('#npop_kp').val(result);
        }
        hitungTerutang($('#npop_kp').val().replace(/,/g ,''));
    }


    function hitungTerutang(nilai){ 
      var terutang = Math.ceil(nilai/100*5);
      $('#bphtb_amt').val(ReplaceNumberWithCommas(terutang));
      hitungPembayaran();
    }


    function hitungPembayaran(){
        var jumlah= $('#bphtb_amt').val().replace(/,/g ,'');
        var diskon= $('#bphtb_discount').val().replace(/,/g ,''); 
        if(jumlah=='' || jumlah=='undefined'){
            jumlah=0;
        }

        if(diskon=='' || diskon=='undefined'){
            diskon=0;
        }
        var p_bphtb_type_id = $('#p_bphtb_type_id').val();
        var bphtb_amt_final = $('#bphtb_amt_final').val(); 
        if(p_bphtb_type_id != 3) {
            if(bphtb_amt_final < 0){
                $('#bphtb_amt_final').val(0);
            }else{
                var result = ReplaceNumberWithCommas(parseInt(jumlah)-parseInt(diskon));
                $('#bphtb_amt_final').val(result);
            }
        }else {
            var bphtb_amt_final_old = $('#bphtb_amt_final_old').val(); 
            if(bphtb_amt_final_old < 0){
                $('#bphtb_amt_final_old').val(0); 
            }else{
                var result = ReplaceNumberWithCommas(parseInt(jumlah)-parseInt(diskon));
                $('#bphtb_amt_final_old').val(result); 
            }

            var payment_amount = $('#prev_payment_amount').val().replace(/,/g ,'');
            var nilai_pajak_harus_bayar = $('#bphtb_amt_final_old').val().replace(/,/g ,'');

            var result = ReplaceNumberWithCommas(parseInt(nilai_pajak_harus_bayar)-parseInt(payment_amount));
            $('#bphtb_amt_final').val(result);

        }
    }

    function getNPOP(){
        var waris = $('#potongan_waris').val();
        var res = waris.split("/"); 
        var market_price =$('#market_price').val().replace(/,/g ,'');
        var total_price =$('#total_price').val().replace(/,/g ,'');
        var total_p  = ReplaceNumberWithCommas(total_price*(res[0]/res[1]));
        var market_p = ReplaceNumberWithCommas(market_price*(res[0]/res[1]));

        if(parseFloat(total_price)>parseFloat(market_price)){
            var components = total_p.toString().split(".");
            $('#npop').val(components[0]);
        }else{
            var components = market_p.toString().split(".");
            $('#npop').val(components[0]);
        }    
        var npotkp_cons = $('#nilai_doc').val();
        if(npotkp_cons==''){
            npotkp_cons=0;
        }
        if(npotkp_cons >= 0 && npotkp_cons != ''){
            var npop = $('#npop').val();
            var result = ReplaceNumberWithCommas(Math.ceil((npop).replace(/,/g ,'')*npotkp_cons*res[0]/res[1]));
            $('#npop').val(result);

        }
        var npop = $('#npop').val().replace(/,/g ,'');
        var persen_kurang = $('#add_disc_percent').val()/100;
        if(persen_kurang==''){
                persen_kurang=0;
        }
        var result =ReplaceNumberWithCommas(Math.ceil(npop*persen_kurang));
        $('#add_discount').val(result);
        hitungNPOPKP();
    }

    function hitungTotalTanah(){
      var hasil                 = 0;
      var r_tot_p               = 0;
      var r_l_tot_p             = 0;
      var land_area             = $('#land_area').val(); 
      var land_price_per_m      = $('#land_price_per_m').val();
      var land_total_price      = $('#land_total_price').val().replace(/,/g ,''); 
      var building_total_price  = $('#building_total_price').val().replace(/,/g ,''); 

      if(land_area!=0||land_price_per_m!=0){
        hasil = parseFloat(land_area.replace(/,/g ,''))*parseFloat(land_price_per_m.replace(/,/g ,''));
      }
      
      r_l_tot_p =  ReplaceNumberWithCommas(hasil);
      $('#land_total_price').val(r_l_tot_p);

      r_tot_p = ReplaceNumberWithCommas(parseFloat(r_l_tot_p.replace(/,/g ,''))+parseFloat(building_total_price));
      $('#total_price').val(r_tot_p);

      getNPOP();
      hitungNPOPKP();
    }

    function hitungTotalBangunan(){
        var hasil                = 0;
        var result               = 0;
        var building_area        = $('#building_area').val();   
        var building_price_per_m = $('#building_price_per_m').val(); 
        var building_total_price = $('#building_total_price').val();
        var land_total_price     = $('#land_total_price').val(); 

        if (building_area != 0 || building_price_per_m != 0){
            hasil = parseFloat(building_area.replace(/,/g ,'')) * parseFloat(building_price_per_m.replace(/,/g ,''));
        }
        hasil = ReplaceNumberWithCommas(hasil);
        $('#building_total_price').val(hasil);

        result = ReplaceNumberWithCommas(parseFloat(land_total_price.replace(/,/g ,'')) + parseFloat(hasil.replace(/,/g ,'')));
        $('#total_price').val(result); 

        getNPOP();   
    }

</script>

<!-- /PERHITUNGAN -->

<!-- Function Pendukung -->

<script>

    function getdok(dok){
        //alert(dok.value);
        var id = dok.value;
        $.ajax({
            url: "<?php echo base_url().'bphtb_registration/call_service_doc'; ?>" ,
            type: "POST",            
            data: {
                id : id
            },
            dataType: "json",
            success: function (data) {
                var dt = data[0];
                console.log (dt);
                
                var total_price = $('#total_price').val().replace(/,/g ,'');
                var market_price = $('#market_price').val().replace(/,/g ,'');

                var doc_cons = dt.doc_cons;
                var npoptkp = dt.npoptkp;
                
                if(doc_cons > 0 && doc_cons != '' ){
                    var npop = $('#npop').val().replace(/,/g ,'');
                    var result = ReplaceNumberWithCommas(doc_cons*(npop).replace(/,/g ,''));

                    $('#npop_tkp').val(result);
                    $('#nilai_doc').val(doc_cons);

                    if(parseFloat(total_price)>parseFloat(market_price)){
                        result = ReplaceNumberWithCommas(Math.ceil(total_price*doc_cons));
                        $('#npop').val(result);
                    }else{
                        result = ReplaceNumberWithCommas(Math.ceil(market_price*doc_cons));
                        $('#npop').val(result);
                    }

                }else{
                    if(parseFloat(total_price)>parseFloat(market_price)){
                        var result = ReplaceNumberWithCommas(Math.ceil(total_price));
                        $('#npop').val(result);
                    }else{
                        var result = ReplaceNumberWithCommas(Math.ceil(market_price));
                        $('#npop').val(result);
                    }
                    $('#nilai_doc').val(null);
                } 
                $('#npop_tkp').val(ReplaceNumberWithCommas(npoptkp));
                hitungNPOPKP();
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                $('#npop_tkp').val(0);
                hitungNPOPKP();
            }
        });
    }

    function setNormalValue(){

        $(".priceformat").each(function(){
            var thisVal = $(this).val();
            if(thisVal!=0){
                $(this).val(thisVal.replace(/,/g ,''))
            }
        });
    }
    
</script>

<!-- /Function Pendukung -->

<!-- Action -->

<script>

    $('#njop_pbb').on('change', function() {
        var njop_pbb = $('#njop_pbb').val();
        if(njop_pbb != "") {
            var result = njop_pbb.replace(/[^0-9]/g,'');
            $('#njop_pbb').val(result);
        }
    });

    $('#potongan_waris').on('change', function() {  
        getNPOP();
    });

    $('#bphtb_discount').on('change', function() {
        hitungPembayaran();
    });    
    
</script>

<script type="text/javascript">
    function printLaporan(){
        //alert(pejabat);
        var params          = $('#t_bphtb_registration_id').val();
        var p_bphtb_type_id = $('#p_bphtb_type_id').val();

        if(p_bphtb_type_id == 3) {
           url = '<?php echo base_url(); ?>'+'cetak_rep_bphtb_kb/pageCetak/'+params;
            openInNewTab(url);
            /*window.open("../report/cetak_rep_bphtb_kb.php?t_bphtb_registration_id="+params, "_blank", "toolbar=0,location=0,menubar=0");*/
        }else {
            url = '<?php echo base_url(); ?>'+'cetak_rep_bphtb/pageCetak/'+params;
            openInNewTab(url);
            //window.open("../report/cetak_rep_bphtb.php?t_bphtb_registration_id="+params, "_blank", "toolbar=0,location=0,menubar=0");
        }
    }

    function openInNewTab(url) {    
        window.open(url, '_blank', 'location=yes,height=570,width=820,scrollbars=yes,status=yes');
    }

    function cetakPdf(aksi){
        var lembar_cetak = $('#lembar_cetak').val();
        var params       = $('#t_bphtb_registration_id').val();
        var url          = "<?php echo base_url(); ?>";
        //alert(params);return;

        if(aksi == 'perhitungan'){
            if(lembar_cetak == '4' || lembar_cetak == '7'){    
                url += "cetak_rep_pengurangan_bphtb_gono_gini/pageCetak_perhitungan?";
                url += "t_bphtb_registration_id=" + params;                    
            }else{
                url += "cetak_rep_pengurangan_bphtb/pageCetak?";
                url += "t_bphtb_registration_id=" + params;
            }
        }else if(aksi == 'disposisi'){
            url += "cetak_rep_pengurangan_bphtb_lembar_disposisi/pageCetak?";
            url += "t_bphtb_registration_id=" + params;

        }else if(aksi == 'acara'){
            if(lembar_cetak == '2' || lembar_cetak == '3' || lembar_cetak == '4' || lembar_cetak == '7') {
            url += "cetak_rep_pengurangan_bphtb_berita_acara/pageCetak?";
            url += "t_bphtb_registration_id=" + params;
            }else {                    
            url += "cetak_rep_pengurangan_bphtb_berita_acara_v2/pageCetak?";
            url += "t_bphtb_registration_id=" + params;
            
            }
        }else if(aksi == '1'){
            var pejabat = 1;

            url += "cetak_rep_pengurangan_bphtb_nota_dinas/pageCetak?";
            url += "t_bphtb_registration_id=" + params + "&pejabat=" + pejabat;
        }else if(aksi == '2'){
            var pejabat = 2;

            url += "cetak_rep_pengurangan_bphtb_nota_dinas/pageCetak?";
            url += "t_bphtb_registration_id=" + params + "&pejabat=" + pejabat;

        }else if(aksi == 'kadis'){
            url += "cetak_rep_pengurangan_bphtb_surat_keputusan/pageCetak?";
            url += "t_bphtb_registration_id=" + params;
        }

            PopupCenter(url,"Cetak PDF ",500,500);
        //}

        
    }
</script>

<script type="text/javascript">

    params_back_summary = {};
    params_back_summary.ELEMENT_ID = $('#TEMP_ELEMENT_ID').val();
    params_back_summary.PROFILE_TYPE = $('#TEMP_PROFILE_TYPE').val();
    params_back_summary.P_W_DOC_TYPE_ID = $('#TEMP_P_W_DOC_TYPE_ID').val();
    params_back_summary.P_W_PROC_ID = $('#TEMP_P_W_PROC_ID').val();
    params_back_summary.USER_ID = $('#TEMP_USER_ID').val();
    params_back_summary.FSUMMARY = $('#TEMP_FSUMMARY').val();

    function backform(){
        loadContentWithParams( $('#TEMP_FSUMMARY').val() , params_back_summary );


    };

    function changeNull(param){
        //alert (param);
        var data = param.value;
        if (data==0)
            param.value=null;
    }

    function changeZero(param){
        var data = param.value;
        if (data==null || data=='')
            param.value=0;
    }
</script>

<script type="text/javascript">
    $('#tab-1').on('click', function(event){
        var idelement;

        if (idelement = $('#t_customer_order_id'))
        {
            
            //console.log(idelement);
            var pid=idelement.val();
            //console.log($('#t_customer_order_id').val());
            var req_code=$('#rqst_type_code').val();
            var id_req=$('#p_rqst_type_id').val();
            var id_vat=$('#t_bphtb_registration_id').val();
            if (pid != 0)
            {
                //loadContentWithParams('transaksi_wf.t_cust_order_legal_doc_ro', {t_bphtb_registration_id:id_vat,rqst_type_code:req_code,p_rqst_type_id:id_req,t_customer_order_id:pid});

                loadContentWithParams("transaksi_wf.t_cust_order_legal_doc_ro_outbox", { //model yang ketiga
                t_customer_order_id: $( "#CURR_DOC_ID" ).val(),
                t_bphtb_registration_id:$('#t_bphtb_registration_id').val(),
                rqst_type_code:$('#rqst_type_code').val(),
                order_no: $('#order_no').val(),
                order_date:$('#registration_date').val(),
                p_rqst_type_id: $("#p_rqst_type_id").val(),
                t_vat_registration_id: $( "#t_vat_registration_id" ).val(),
                ELEMENT_ID : $('#TEMP_ELEMENT_ID').val(),
                PROFILE_TYPE : $('#TEMP_PROFILE_TYPE').val(),
                P_W_DOC_TYPE_ID : $('#TEMP_P_W_DOC_TYPE_ID').val(),
                P_W_PROC_ID : $('#TEMP_P_W_PROC_ID').val(),
                USER_ID : $('#TEMP_USER_ID').val(),
                FSUMMARY : $('#TEMP_FSUMMARY').val(),
                CURR_DOC_ID : $('#CURR_DOC_ID').val(),
                CURR_DOC_TYPE_ID : $('#CURR_DOC_TYPE_ID').val(),
                CURR_PROC_ID : $('#CURR_PROC_ID').val(),
                CURR_CTL_ID : $('#CURR_CTL_ID').val(),
                USER_ID_DOC : $('#USER_ID_DOC').val(),
                USER_ID_DONOR : $('#USER_ID_DONOR').val(),
                USER_ID_LOGIN : $('#USER_ID_LOGIN').val(),
                USER_ID_TAKEN : $('#USER_ID_TAKEN').val(),
                IS_CREATE_DOC : $('#IS_CREATE_DOC').val(),
                IS_MANUAL : $('#IS_MANUAL').val(),
                CURR_PROC_STATUS : $('#CURR_PROC_STATUS').val(),
                CURR_DOC_STATUS : $('#CURR_DOC_STATUS').val(),
                PREV_DOC_ID : $('#PREV_DOC_ID').val(),
                PREV_DOC_TYPE_ID : $('#PREV_DOC_TYPE_ID').val(),
                PREV_PROC_ID : $('#PREV_PROC_ID').val(),
                PREV_CTL_ID : $('#PREV_CTL_ID').val(),
                SLOT_1 : $('#SLOT_1').val(),
                SLOT_2 : $('#SLOT_2').val(),
                SLOT_3 : $('#SLOT_3').val(),
                SLOT_4 : $('#SLOT_4').val(),
                SLOT_5 : $('#SLOT_5').val(),
                MESSAGE : $('#MESSAGE').val(),
                PROFILE_TYPE : $('#PROFILE_TYPE').val(),
                ACTION_STATUS : $('#ACTION_STATUS').val()});
            } else {
                swal({title: "Error!", text: "Pilih salah satu ORDER!", html: true, type: "error"});
            }
        } else {
            swal({title: "Error!", text: "Pilih salah satu ORDER!!!", html: true, type: "error"});
        }
    });
</script>

<!-- Action -->