    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                        <h2 class="intro-text text-center"><strong>Formulir Permohonan Informasi oleh Kelompok Berbadan Hukum</strong></h2>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <div class="panel-body">
                                <div class="col-lg-6">
                                    <strong>
                                        <font color="#ff6600">Identitas Pemohon<br/><br/></font>
                                    </strong>
                                    
                                    <div class="form-group form-horizontal">
                                        <label for="nik" class="control-label col-lg-3">NIK</label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" type="text" value="" disabled><br/>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal">
                                        <label for="nama" class="control-label col-lg-3">Nama </label>
                                        <div class="col-lg-9">
                                             <input class=" form-control" type="text" value="" disabled><br/>
                                        </div>
                                     </div>
                                    <div class="form-group form-horizontal">
                                        <label for="alamat" class="control-label col-lg-3">Alamat </label>
                                        <div class="col-lg-9">
                                            <textarea class=" form-control" type="text" placeholder="" disabled></textarea><br/>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal">
                                        <label for="no_tlpn" class="control-label col-lg-3">No Telepon </label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" type="text" value="" disabled><br/>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal">
                                        <label for="no_hp" class="control-label col-lg-3">No HP </label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" type="text" value="" disabled><br/>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal">
                                        <label for="email" class="control-label col-lg-3">Email </label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" type="text" value="" disabled><br/>
                                        </div>
                                    </div>
                                    <font>Cara memperoleh informasi dan bentuk informasi yang diserahkan, akan dijelaskan kemudian melalui email. Jika terdapat kesalahan pada data pribadi silahkan lakukan perubahan data pribadi.<br/><br/></font>
                                </div>
                                <div class="col-lg-6">
                                    <strong>
                                        <font color="#ff6600">Detail Permohonan Berkas<br/><br/></font>
                                    </strong>
                                    <div class="form-group form-horizontal">
                                        <label for="tujuan_permohonan_info" class="control-label col-lg-3">Tujuan Permohonan Informasi </label>
                                        <div class="col-lg-9">
                                            <textarea class=" form-control" name="tujuan_permohonan_info" type="text" placeholder="Tujuan Permohonan Informasi." disabled></textarea><br/>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal">
                                        <label for="ktp" class="control-label col-lg-3">Dokumen Akta</label>
                                        <div class="col-lg-9">
                                            FILE
                                            <font class="help-block">Upload file dengan format .gif|.png|.jpg.</font>
                                        </div>    
                                    </div>
                                    <div>
                                        <input type="hidden" name="gambar_value" id="gamgum">
                                    </div>
                                    <div class="form-group form-horizontal">
                                        <label class="control-label col-lg-3">Dokumen</label>
                                        <div class="col-lg-9">
                                            <select class="form-control select2" multiple="multiple" data-placeholder="Select Kode Dokumen" name="dokumen[]" style="width: 100%;" disabled>
                                            </select><br/>
                                        </div>
                                    </div>
                                    <div class="row"></div>
                                    <font><br/>Informasi yang Saya peroleh akan Saya gunakan sesuai dengan ketentuan perundang-undangan yang berlaku.<br/> 
                                        <br/>Bogor, 
                                            <?php
                                                echo date("d-m-Y") . "<br>";
                                            ?>
                                        <br/>Pemohon Informasi: 
                                        <br/>
                                        <br/>
                                        <br/>(<?php echo $this->session->userdata('nama'); ?>)</font>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->