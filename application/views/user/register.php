<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" >
            <div class="box">
                <hr>
                   <h2 class="intro-text text-center"><strong>Register Pemohon</strong></h2>
                <hr>
                  <?php echo form_open_multipart('UserPage/do_upload');?>
                      <input  name="hak_akses" type="hidden" value="1" required>
                      <div class="form-group form-horizontal">
                          <label for="nik" class="control-label col-lg-3">NIK <font color="red">*</font></label>
                          <div class="col-lg-9">
                              <input class=" form-control" name="nik" type="text" placeholder="Isikan NIK Pemohon." required>
                              <?php echo form_error('nik'); ?><br/>
                          </div>
                      </div>
                      <div class="form-group form-horizontal">
                          <label for="nama" class="control-label col-lg-3">Nama <font color="red">*</font></label>
                          <div class="col-lg-9">
                                <input class=" form-control" name="nama" type="text" placeholder="Isikan Nama Pemohon." required><br/>
                          </div>
                        </div>
                      <div class="form-group form-horizontal">
                          <label for="alamat" class="control-label col-lg-3">Alamat <font color="red">*</font></label>
                          <div class="col-lg-9">
                              <textarea class=" form-control" id="no_identitas" name="alamat" type="text" placeholder="Isikan Alamat Pemohon." required></textarea><br/>
                          </div>
                      </div>
                      <div class="form-group form-horizontal">
                          <label for="no_tlpn" class="control-label col-lg-3">No Telepon </label>
                          <div class="col-lg-9">
                              <input class=" form-control" name="no_tlpn" type="text" placeholder="Isikan No Telepon Pemohon."><br/>
                          </div>
                      </div>
                      <div class="form-group form-horizontal">
                          <label for="no_hp" class="control-label col-lg-3">No HP </label>
                          <div class="col-lg-9">
                              <input class=" form-control" name="no_hp" type="text" placeholder="Isikan No HP Pemohon."><br/>
                          </div>
                      </div>
                      <div class="form-group form-horizontal">
                          <label for="email" class="control-label col-lg-3">Email <font color="red">*</font></label>
                          <div class="col-lg-9">
                              <input class=" form-control" name="email" type="email" placeholder="Isikan Alamat Email Pemohon." required>
                              <?php echo form_error('email'); ?><br/>
                          </div>
                      </div>
                      <div class="form-group form-horizontal">
                          <label for="password" class="control-label col-lg-3">Password <font color="red">*</font></label>
                          <div class="col-lg-9">
                              <input class=" form-control" name="password" type="password" placeholder="Isikan Password Pemohon." required><br/>
                          </div>
                      </div>
                      <div class="form-group form-horizontal">
                          <label for="ktp" class="control-label col-lg-3">File KTP <font color="red">*</font></label>
                          <div class="col-lg-9">
                              <input type="file"  name="userfile" id="gamgam" required>
                              <font class="help-block">Upload ktp dengan format .jpg|.png</font>
                          </div>    
                      </div>
                      <div>
                        <input type="hidden" name="gambar_value" id="gamgum">
                      </div>
                      <div class="col-lg-offset-9 col-lg-3">
                        <input type="submit" class="btn btn-primary" onclick="coba()" value="Register" name="simpan">
                      </div>
                  <?php echo form_close(); ?>
                  <a href="<?php echo base_url() ?>UserPage/register" class="text-center">I already have a membership</a>
            </div>
        </div>
    </div>
</div>