    <!-- Start Content -->
    <div id="content">   
      <div class="container">
        <div class="page-content">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="call-action call-action-boxed call-action-style2 clearfix">
                  <h3 class="classic-title"><span><strong>Register Pemohon</strong></span></h3>
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
                          <input type="file"  name="userfile" required>
                            <font class="help-block">Upload ktp dengan format .jpg|.png, nama file adalah sesuai nik (cth:1050241708900001.jpg)</font>
                        </div>    
                      </div>
                      <div class="col-lg-offset-9 col-lg-3">
                        <input type="submit" class="btn btn-primary" value="Register" name="simpan">
                      </div>
                  <?php echo form_close(); ?>
                  <a href="<?php echo base_url() ?>UserPage/login" class="text-center">I already have a membership</a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>