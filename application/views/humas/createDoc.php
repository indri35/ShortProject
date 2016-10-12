
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
              <?php echo form_open_multipart('humas/doc_upload'); ?>
  
                <div class="box-body">
                    <div class="form-group">
                      <input class="form-control" type="hidden" name="upload_at" value="<?php echo date("Y-m-d"); ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Kode Berkas</label>
                      <input type="text" name="kode_berkas" class="form-control"  placeholder="BerkasSkpd123">
                    </div>
                    <div class="form-group">
                      <label>Nama Berkas</label>
                      <input type="text" name="nama_berkas" class="form-control"  placeholder="Berkas warga negara indonesia">
                    </div>
                    <div class="form-group">
                      <label>Kepemilikan Berkas</label>
                      <select type="text" name="kode_skpd" class="form-control" placeholder="Nama SKPD">
                      <?php foreach ($skpd->result() as $s) { ?>
                        <option value="<?php echo $s->singkatan; ?>"><?php echo $s->nama; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>kategori</label>
                      <input type="text" name="kategori" class="form-control"  placeholder="Masyarakat">
                    </div>
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <input type="text" name="deskripsi" class="form-control"  placeholder="berkas berisikan ...">
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
                  <button type="submit" class="btn btn-primary" onclick="coba()">Submit</button>
              </div><!-- /.box-body -->
            <?php echo form_close();?>
          </div><!-- /.box -->
        </div>
      </section>
    </div>
