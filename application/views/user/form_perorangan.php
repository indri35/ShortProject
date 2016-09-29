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
                                        <label for="nama1" class="control-label col-lg-3">NIK <font color="red">*</font></label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" id="alamat" name="alamat" type="text" placeholder="Isikan NIK Pemohon." required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nama1" class="control-label col-lg-3">Nama <font color="red">*</font></label>
                                        <div class="col-lg-9">
                                             <input class=" form-control" id="kontak" name="kontak" type="text" placeholder="Isikan Nama Pemohon." required>
                                        </div>
                                     </div>
                                    <div class="form-group ">
                                        <label for="nama1" class="control-label col-lg-3">Alamat <font color="red">*</font></label>
                                        <div class="col-lg-9">
                                            <textarea class=" form-control" id="no_identitas" name="no_identitas" type="text" placeholder="Isikan Alamat Pemohon." required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nama1" class="control-label col-lg-3">No Telepon </label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" id="no_identitas" name="no_identitas" type="text" placeholder="Isikan No Telepon Pemohon.">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nama1" class="control-label col-lg-3">No HP </label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" id="no_identitas" name="no_hp" type="text" placeholder="Isikan No HP Pemohon.">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nama1" class="control-label col-lg-3">Email <font color="red">*</font></label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" id="no_identitas" name="email" type="email" placeholder="Isikan Alamat Email Pemohon." required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nama1" class="control-label col-lg-3">Tujuan Permohonan Informasi <font color="red">*</font></label>
                                        <div class="col-lg-9">
                                            <textarea class=" form-control" id="no_identitas" name="email" type="email" placeholder="Tujuan Permohonan Informasi." required></textarea>
                                        </div>
                                    </div>
                                    <font>Cara memperoleh informasi dan bentuk informasi yang diserahkan, akan dijelaskan kemudian melalui email.<br/><br/></font>
                                    <strong>
                                        <font color="#ff6600">File-File Pendukung <br/><br/></font>
                                    </strong>
                                    <div class="form-group">
                                        <label for="nama1" class="control-label col-lg-3">File KTP <font color="red">*</font></label>
                                        <div class="col-lg-9">
                                            <input id="alamat" type="file"  name="userfile" id="gamgam" required>
                                            <font class="help-block">Upload file dengan format.</font>
                                        </div>    
                                    </div>
                                    <font>Informasi yang Saya peroleh akan Saya gunakan sesuai dengan ketentuan perundang-undangan yang berlaku.<br/> 
                                    <br/>Surabaya,</font> 
                                        <?php
                                            echo date("d-m-Y") . "<br>";
                                        ?>
                                    <font>
                                    <br/>Pemohon Informasi: 
                                    <br/>
                                    <br/>
                                    <br/>(...............................)
                                </div>
                                <div class="col-lg-6">
                                    <strong>
                                        <font color="#ff6600">Detail Permohonan Berkas<br/><br/></font>
                                    </strong>
                                <div class="form-group ">
                                    <label for="nama1" class="control-label col-lg-3">NIK <font color="red">*</font></label>
                                    <div class="col-lg-9">
                                        <input class=" form-control" id="alamat" name="alamat" type="text" placeholder="Isikan NIK Pemohon." required>
                                    </div>
                                </div>
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