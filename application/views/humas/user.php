
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User list
            <small>SKPD </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Document list</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User List</h3>
              <br /><br />
              <a class="btn btn-primary" href="<?= base_url() ?>humas/create">Add User</a>
            </div><!-- /.box-header --> 
              <div class="box-body">

                <table id="example1" class="table table-bordered table-striped dataTable text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Hak akses</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>No. Telpon</th>
                      <th>No. Handphone</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($users->result() as $user) { ?>
                    <tr role="row">
                      <td><?php echo $no ;?></td>
                      <td><?php if($user->hak_akses==1){echo 'User';}
                      elseif ($user->hak_akses==2){echo 'Admin Humas';}
                      else echo 'Admin SKPD';?>
                      </td>
                      <td><?php echo $user->nik;?></td>
                      <td> <?php echo $user->nama;?></td>
                      <td> <?php echo $user->alamat;?></td>
                      <td> <?php echo $user->no_tlpn;?></td>
                      <td> <?php echo $user->no_hp;?></td>
                      <td> <?php echo $user->email;?></td>
                      <td><a class="btn btn-primary" href="<?= base_url() ?>humas/edit/<?= $user->id ?>">Update</a>
                          <a class="btn btn-danger" href="<?= base_url() ?>humas/delete/<?= $user->id ?>" onClick="return doconfirm();">Delete</a>
                      </td>
                    <?php $no++; };?>
                  </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
