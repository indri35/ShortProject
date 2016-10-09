
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Profile
            <small>Admin</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>skpd/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">Profile Admin</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered table-striped dataTable text-center">
                    <tr><th >Hak akses</th><td><?php if($profile['hak_akses']==1){echo 'User';} elseif($profile['hak_akses']==2){echo 'Admin humas';} else {echo 'Admin SKPD';} ?></td></tr>
                    <tr><th>Kode SKPD</th><td><?php echo $profile['kode_skpd'];?></td></tr>
                    <tr><th>NIK</th><td><?php echo $profile['nik'];?></td></tr>
                    <tr><th>Nama</th><td><?php echo $profile['nama'];?></td></tr>
                    <tr><th>Alamat</th><td><?php echo $profile['alamat'];?></td></tr>
                    <tr><th>No Telepon</th><td><?php echo $profile['no_tlpn'];?></td></tr>
                    <tr><th>No Handphone</th><td><?php echo $profile['no_hp'];?></td></tr>
                    <tr><th>Email</th><td><?php echo $profile['email'];?></td></tr>
                    <tr><th>password</th><td><?php echo $profile['password'];?></td></tr>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
