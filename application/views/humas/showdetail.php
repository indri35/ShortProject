    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                        <h2 class="intro-text text-center"><strong><?php if($req['jenis_request']=='perorangan')  {echo 'Formulir Permohonan Informasi oleh Perorangan ';}
                        elseif ($req['jenis_request']=='badan-hukum') {
                            echo 'Formulir Permohonan Informasi oleh Kelompok Berbadan Hukum';} 
                        else {echo 'Formulir Permohonan Informasi oleh Kelompok Tidak Berbadan Hukum';}
                        ?>
                        </strong></h2>
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
                                            <input class=" form-control" type="text" value="<?php echo $data['nik']; ?>" disabled><br/>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal">
                                        <label for="nama" class="control-label col-lg-3">Nama </label>
                                        <div class="col-lg-9">
                                             <input class=" form-control" type="text" value="<?php echo $data['nama']; ?>" disabled><br/>
                                        </div>
                                     </div>
                                    <div class="form-group form-horizontal">
                                        <label for="alamat" class="control-label col-lg-3">Alamat </label>
                                        <div class="col-lg-9">
                                            <textarea class=" form-control" type="text" disabled><?php echo $data['alamat']; ?></textarea><br/>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal">
                                        <label for="no_tlpn" class="control-label col-lg-3">No Telepon </label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" type="text" value="<?php echo $data['no_tlpn']; ?>" disabled><br/>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal">
                                        <label for="no_hp" class="control-label col-lg-3">No HP </label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" type="text" value="<?php echo $data['no_hp']; ?>" disabled><br/>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal">
                                        <label for="email" class="control-label col-lg-3">Email </label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" type="text" value="<?php echo $data['email']; ?>" disabled><br/>
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
                                            <textarea class=" form-control" name="tujuan_permohonan_info" type="text" value="<?php echo $req['nik_pemohon']; ?>" disabled><?php echo $req['tujuan_permohonan_info']; ?></textarea><br/>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal">
                                        <label for="ktp" class="control-label col-lg-3">Dokumen <?php if($req['jenis_request']=='perorangan')  {echo 'KTP ';}
                                            elseif ($req['jenis_request']=='badan-hukum') {
                                                echo 'Akta';} 
                                            else {echo 'TTD Seluruh Anggota ';}
                                            ?></label>
                                        <div class="col-lg-9">
                                            <img src="<?php echo base_url(); ?>assets/dokumen/<?php echo $data['ktp']; ?>" >
                                        </div>    
                                    </div>
                                    <div>
                                        <input type="hidden" name="gambar_value" id="gamgum">
                                    </div>
                                    <br />
                                    <div class="form-group form-horizontal">
                                        <label class="control-label col-lg-3">Dokumen</label>
                                        <div class="col-lg-9">
                                            <input class=" form-control" type="text" value="<?php echo $req['nama_berkas']; ?>" disabled><br/><br/>
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
                                        <br/>(<?php echo $data['nama']; ?>)</font>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->