
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add User
            <small>for Admin</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>humas/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url() ?>humas/user">User list</a></li>
            <li class="active">Add User</li>
          </ol>
        </section>
      
        <section class="content">
          <div class="box">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Add User</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <?php echo form_open_multipart('skpd/updatee'); ?>
              <?php echo form_hidden('id',$this->uri->segment(3)); ?>
              <?php echo form_hidden('kode_skpd',$this->session->userdata('kode_skpd')); ?>
                <div class="box-body">
                    <div class="form-group">
                      <input class="form-control" type="hidden" name="upload_at" value="<?php echo date("Y-m-d"); ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Kode Berkas</label>
                      <input type="text" name="kode_berkas" value="<?php echo $docs['kode_berkas']; ?>" class="form-control"  placeholder="BerkasSkpd123">
                    </div>
                    <div class="form-group">
                      <label>Nama Berkas</label>
                      <input type="text" name="nama_berkas" value="<?php echo $docs['nama_berkas']; ?>" class="form-control"  placeholder="Berkas warga negara indonesia">
                    </div>
                    <div class="form-group">
                      <label>Berkas</label>
                      <input type="text" value="<?php echo $docs['berkas']; ?>" class="form-control"  readonly>
                    </div>
                    <div class="form-group">
                      <label>kategori</label>
                      <input type="text" name="kategori" value="<?php echo $docs['kategori']; ?>" class="form-control"  placeholder="Masyarakat">
                    </div>
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <input type="text" name="deskripsi" value="<?php echo $docs['deskripsi']; ?>" class="form-control"  placeholder="berkas berisikan ...">
                    </div>
                    <div class="form-group">
                    <label for="dokumen">Document file <font color="red">*</font></label>
                    <div>
                        <input type="file"  name="userfile" id="gamgam">
                        <font class="help-block">Upload file dengan format .jpg .png .xls .doc .pdf. <br />
                        Pastikan nama file <strong>berbeda dengan nama file sebelumnya.</strong></font>
                    </div>    
                  </div>
                  <div>
                    <input type="hidden" name="gambar_value" id="gamgum">
                  </div>
                  <button type="submit" class="btn btn-primary" onclick="coba()">Update</button>
              </div><!-- /.box-body -->
            <?php echo form_close();?>
          </div><!-- /.box -->
        </div>
      </section>
    </div>
