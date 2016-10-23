<!-- Start Page Banner -->
    <div class="page-banner" style="padding:40px 0; background: url(<?php echo base_url() ?>assets/user/margo/images/slide-02-bg.jpg) center #f9f9f9;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <?php if($req['jenis_request']=='perorangan')  {echo '<h2>Formulir Permohonan Informasi</h2><h3> oleh Perorangan</h3> ';}
                    elseif ($req['jenis_request']=='badan-hukum') {
                        echo '<h2>Formulir Permohonan Informasi</h2><h3> oleh Kelompok Berbadan Hukum</h3>';} 
                    else {echo '<h2>Formulir Permohonan Informasi</h2><h3> oleh Kelompok Tidak Berbadan Hukum</h3>';}
                    ?>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="<?php echo base_url() ?>">Home</a></li>
              <li>Detail Pemohon</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Banner --> 
<div id="content"> 
    <div class="container">
        <div class="page-content">
            <div class="row">
                <div class="call-action call-action-boxed call-action-style1 clearfix">
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
                                            <?php if($req['jenis_request']=='perorangan')  {?> <img src="<?php echo base_url(); ?>assets/ktp/<?php echo $req['file_pendukung']; ?>" > <?php ;}
                                            else {?> <img src="<?php echo base_url(); ?>assets/file_pendukung/<?php echo $req['file_pendukung']; ?>" >
                                            <?php ;} ?>
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
        </div>
    </div>
    <!-- /.container -->