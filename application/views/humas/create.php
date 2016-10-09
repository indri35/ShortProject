
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
              <?php echo form_open('humas/store'); ?>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Hak akses</label>
                      <select type="text" name="hak_akses" class="form-control" placeholder="Hak Akses">
                        <option value="1">User</option>
                        <option value="2">Admin Humas</option>
                        <option value="3">Admin Skpd</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nama SKPD</label>
                      <select type="text" name="kode_skpd" class="form-control" placeholder="Nama SKPD">
                      <?php foreach ($skpd->result() as $s) { ?>
                        <option value="<?php echo $s->singkatan; ?>"><?php echo $s->nama; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>NIK</label>
                      <input type="text" name="nik" class="form-control"  placeholder="Ex. 0123456789">
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control"  placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control"  placeholder="Alamat">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>No. Telepon</label>
                      <input type="text" name="no_tlpn" class="form-control"  placeholder="Ex. 02665457">
                    </div>
                    <div class="form-group">
                      <label>No. Handphone</label>
                      <input type="text" name="no_hp" class="form-control"  placeholder="Ex. 085749654">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control"  placeholder="aaa@domain.com">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                  <button type="submit" class="btn btn-primary" >Submit</button>
                </div><!-- /.box-body -->
                </div>
                </div>
              <?php echo form_close();?>
            </div><!-- /.box -->
          </div>
        </section>
      </div>
