<!-- Start Page Banner -->
    <div class="page-banner" style="padding:40px 0; background: url(<?php echo base_url() ?>assets/user/margo/images/slide-02-bg.jpg) center #f9f9f9;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Hello <b><a  href="<?php echo base_url() ?>UserPage/profil/"><?php echo $this->session->userdata('nama'); ?></b></a></h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="<?php echo base_url() ?>">Home</a></li>
              <li>Edit Data Diri</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Banner -->
    <!-- Start Content -->
    <div id="content">   
      <div class="container">
        <div class="page-content">
            <div class="row">
              <div class="col-md-10 col-md-offset-1" >
                <div class="call-action call-action-boxed call-action-style2 clearfix">
                  <h3 class="classic-title"><span><strong>Edit Data Diri</strong></span></h3>
                  <?php echo form_open_multipart('UserPage/edit_profil_data');?>
                    <input  name="id" type="hidden" value="<?php echo $this->session->userdata('id'); ?>" required>
                    <div class="form-group form-horizontal">
                      <label for="nik" class="control-label col-lg-2">NIK <font color="red">*</font></label>
                      <div class="col-lg-10">
                        <input class=" form-control" name="dnik" type="text" value="<?php echo $this->session->userdata('nik'); ?>" required><br/>
                      </div>
                    </div>
                    <div class="form-group form-horizontal">
                      <label for="nama" class="control-label col-lg-2">Nama <font color="red">*</font></label>
                      <div class="col-lg-10">
                        <input class=" form-control" name="dnama" type="text" value="<?php echo $this->session->userdata('nama'); ?>" required><br/>
                      </div>
                    </div>
                    <div class="form-group form-horizontal">
                      <label for="alamat" class="control-label col-lg-2">Alamat <font color="red">*</font></label>
                      <div class="col-lg-10">
                        <input class=" form-control" size="60px" name="dalamat" type="text" value="<?php echo $this->session->userdata('alamat'); ?>" required><br/>
                      </div>
                    </div>
                    <div class="form-group form-horizontal">
                      <label for="no_tlpn" class="control-label col-lg-2">No Telepon </label>
                      <div class="col-lg-10">
                        <input class=" form-control" name="dno_tlpn" type="text" value="<?php echo $this->session->userdata('no_tlpn'); ?>"><br/>
                      </div>
                    </div>
                    <div class="form-group form-horizontal">
                      <label for="no_hp" class="control-label col-lg-2">No HP </label>
                      <div class="col-lg-10">
                        <input class=" form-control" name="dno_hp" type="text" value="<?php echo $this->session->userdata('no_hp'); ?>"><br/>
                      </div>
                    </div>
                    <div class="form-group form-horizontal">
                      <label for="email" class="control-label col-lg-2">Email <font color="red">*</font></label>
                      <div class="col-lg-10">
                        <input class=" form-control" name="demail" type="email" value="<?php echo $this->session->userdata('email'); ?>" required><br/>
                      </div>
                    </div>
                    <div class="form-group form-horizontal">
                      <label for="ktp" class="control-label col-lg-2">File KTP <font color="red">*</font></label>
                      <div class="col-lg-10">
                        <input type="file"  name="userfile" required>
                        <font class="help-block">Reupload ktp dengan format .jpg|.png, nama file adalah sesuai nik (cth:1050241708900001.jpg)</font>
                      </div>    
                    </div>
                    <div class="col-lg-offset-10 col-lg-2">
                      <input type="submit" class="btn btn-primary" value="Ubah Profil" name="simpan">
                    </div>
                    <?php echo form_close(); ?>
                    <a href="<?php echo base_url() ?>UserPage/profil"><i class="fa fa-arrow-left fa-3x"></i></a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>