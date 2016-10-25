
    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Profile
            <small>for SKPD</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>skpd"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Profile</li>
          </ol>
        </section>
      
        <section class="content">
          <div class="box">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Edit Profile</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <?php echo form_open_multipart('skpd/edit_profile_data');?>
              <?php echo form_hidden('id',$this->session->userdata('id')); ?>
                <div class="box-body">
                    <div class="form-group">
                      <input class="form-control" type="hidden" name="upload_at" value="<?php echo date("Y-m-d"); ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Kode SKPD</label>
                      <input type="text" name="kode_skpd" class="form-control"  value="<?php echo $profile['kode_skpd']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>NIK</label>
                      <input type="text" name="nik" class="form-control"  value="<?php echo $profile['nik']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control"  value="<?php echo $profile['nama']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control"  value="<?php echo $profile['alamat']; ?>">
                    </div>
                    <div class="form-group">
                      <label>No. Telepon</label>
                      <input type="text" name="no_tlpn" class="form-control"  value="<?php echo $profile['no_tlpn']; ?>">
                    </div>
                    <div class="form-group">
                      <label>No. Handphone</label>
                      <input type="text" name="no_hp" class="form-control"  value="<?php echo $profile['no_hp']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control"  value="<?php echo $profile['email']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="dokumen">Document file <font color="red">*</font></label>
                    <div>
                        <input type="file"  name="userfile" id="gamgam" required>
                        <font class="help-block">Upload file dengan format .jpg .png .xls .doc .pdf.</font>
                    </div>    
                  </div>
                  <div>
                    <input type="hidden" name="gambar_value" id="gamgum">
                  </div>
                  <button type="submit" class="btn btn-primary" onclick="coba()">Perbaharui</button>
              </div><!-- /.box-body -->
            <?php echo form_close();?>
          </div><!-- /.box -->
        </div>
      </section>
    </div>
