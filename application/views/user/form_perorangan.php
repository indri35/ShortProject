    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                        <h2 class="intro-text text-center"><strong>Formulir Permohonan Informasi oleh Perorangan</strong></h2>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal " id="form-edit-profil" method="post">
                                <div class="col-lg-6">
                                    <strong>
                                        <font color="#ff6600">Identitas Pemohon<br/><br/></font>
                                    </strong>
                                    <div class="form-group ">
                                        <label for="nik" class="control-label col-lg-3">NIK</label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" type="text" value="<?php echo $this->session->userdata('nik'); ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nama" class="control-label col-lg-3">Nama </label>
                                        <div class="col-lg-9">
                                             <input class=" form-control" type="text" value="<?php echo $this->session->userdata('nama'); ?>" disabled>
                                        </div>
                                     </div>
                                    <div class="form-group ">
                                        <label for="alamat" class="control-label col-lg-3">Alamat </label>
                                        <div class="col-lg-9">
                                            <textarea class=" form-control" type="text" placeholder="<?php echo $this->session->userdata('alamat'); ?>" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="no_tlpn" class="control-label col-lg-3">No Telepon </label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" type="text" value="<?php echo $this->session->userdata('no_tlpn'); ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="no_hp" class="control-label col-lg-3">No HP </label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" type="text" value="<?php echo $this->session->userdata('no_hp'); ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Email <font color="red">*</font></label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" type="text" value="<?php echo $this->session->userdata('email'); ?>" disabled>
                                        </div>
                                    </div>
                                    <font>Cara memperoleh informasi dan bentuk informasi yang diserahkan, akan dijelaskan kemudian melalui email. Jika terdapat kesalahan pada data pribadi silahkan lakukan perubahan data pribadi.<br/><br/></font>
                                </div>
                                <div class="col-lg-6">
                                    <strong>
                                        <font color="#ff6600">Detail Permohonan Berkas<br/><br/></font>
                                    </strong>
                                    <div class="form-group ">
                                        <label for="tujuan_permohonan_info" class="control-label col-lg-3">Tujuan Permohonan Informasi <font color="red">*</font></label>
                                        <div class="col-lg-9">
                                            <textarea class=" form-control" name="tujuan_permohonan_info" type="text" placeholder="Tujuan Permohonan Informasi." required></textarea>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                    <label for="nama1" class="control-label col-lg-3">NIK <font color="red">*</font></label>
                                    <div class="col-lg-9">
                                        <input class=" form-control" id="alamat" name="alamat" type="text" placeholder="Isikan NIK Pemohon." required>
                                    </div>
                                </div>
                                <font>Informasi yang Saya peroleh akan Saya gunakan sesuai dengan ketentuan perundang-undangan yang berlaku.<br/> 
                                    <br/>Surabaya, 
                                        <?php
                                            echo date("d-m-Y") . "<br>";
                                        ?>
                                    <br/>Pemohon Informasi: 
                                    <br/>
                                    <br/>
                                    <br/>(<?php echo $this->session->userdata('nama'); ?>)</font>
                                <div class="col-lg-offset-3 col-lg-9">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->