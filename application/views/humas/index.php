
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="humas/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $sent->num_rows();?></h3>
                  <p>Request responded</p>
                </div>
                <div class="icon">
                  <i class="ion ion-paper-airplane"></i>
                </div>
                <a href="<?= base_url() ?>humas/sentRequest" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 ">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $pending->num_rows();?></h3>
                  <p>Request pending</p>
                </div>
                <div class="icon">
                  <i class="ion ion-email-unread"></i>
                </div>
                <a href="<?= base_url() ?>humas/pendingRequest" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $dokumen->num_rows();?></h3>
                  <p>Document list</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-document"></i>
                </div>
                <a href="<?= base_url() ?>humas/document" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $user->num_rows();?></h3>
                  <p>User list</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-person"></i>
                </div>
                <a href="<?= base_url() ?>humas/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->


              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Request responded</h3>
                </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped dataTable">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode berkas</th>
                          <th>Nama berkas</th>
                          <th>Tujuan permohonan</th>
                          <th>Detail pemohon</th>
                          <th>Tanggal respon</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=1;
                        foreach ($sent->result() as $s) { ?>
                        <tr role="row">
                          <td><?php echo $no ;?></td>
                          <td><?php echo $s->kode_berkas;?></td>
                          <td><?php echo $s->nama_berkas;?></td>
                          <td><?php echo $s->kode_skpd;?></td>
                          <td><a href="<?= base_url() ?>humas/show/<?= $s->nik_pemohon ?>/<?= $s->no_req ?>" class="btn btn-success"> Detail</a></td>
                          <td><?php echo ($s->berkas_upload==TRUE)? $s->berkas_upload : "<button type='button' class='btn btn-default'>".anchor('skpd/tanggapi/'.$s->no_req,'Tanggapi')."</button>"; ?>
                          </td>
                          <td><?php if ($s->berkas_upload==TRUE && $s->pesan_tolak==FALSE){echo '<i class="fa fa-fw fa-check"></i>';} 
                            elseif ($s->berkas_upload==FALSE && $req->pesan_tolak==FALSE) {
                               echo '<i class="fa fa-fw fa-close"></i>';}
                            elseif ($s->berkas_upload==FALSE && $s->pesan_tolak==TRUE) { echo 'Tolak'; }
                            ?></td>
                        </tr>
                        <?php $no++; };?>
                      </tbody>
                    </table>
                  </div>
                </div>


              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Request pending</h3>
                </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example3" class="table table-bordered table-striped dataTable">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode berkas</th>
                          <th>Nama berkas</th>
                          <th>Tujuan permohonan</th>
                          <th>Detail pemohon</th>
                          <th>Tanggal respon</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=1;
                        foreach ($pending->result() as $p) { ?>
                        <tr role="row">
                          <td><?php echo $no ;?></td>
                          <td><?php echo $p->kode_berkas;?></td>
                          <td><?php echo $p->nama_berkas;?></td>
                          <td><?php echo $p->kode_skpd;?></td>
                          <td><a href="<?= base_url() ?>humas/show/<?= $p->nik_pemohon ?>/<?= $p->no_req ?>" class="btn btn-info"> Detail</a></td>
                          <td>
                          <?php if (($p->berkas_upload==TRUE && $p->pesan_tolak==FALSE)){echo $p->date_upload;}
                         elseif($p->berkas_upload==FALSE && $p->pesan_tolak==FALSE){echo "<button type='button' class='btn btn-default'>".anchor('humas/tanggapi/'.$p->no_req,'Tanggapi')."</button>";}
                         elseif ($p->berkas_upload==FALSE && $p->pesan_tolak==TRUE) { echo $p->date_upload; } ?>
                          </td>
                          <td><?php if ($p->berkas_upload==TRUE && $p->pesan_tolak==FALSE){echo '<i class="fa fa-fw fa-check"></i>';} 
                            elseif ($p->berkas_upload==FALSE && $p->pesan_tolak==FALSE) {
                               echo '<i class="fa fa-fw fa-close"></i>';}
                            elseif ($p->berkas_upload==FALSE && $p->pesan_tolak==TRUE) { echo 'Tolak'; }
                            ?></td>
                        </tr>
                        <?php $no++; };?>
                      </tbody>
                    </table>
                </div>
              </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
