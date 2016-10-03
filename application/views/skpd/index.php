
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php
                  echo $request->num_rows();?></h3>
                  <p>New Request</p>
                </div>
                <div class="icon">
                  <i class="ion ion-email-unread"></i>
                </div>
                <a href="<?= base_url() ?>skpd/pendingRequest" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 ">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $sent->num_rows();?></h3>
                  <p>Request sent</p>
                </div>
                <div class="icon">
                  <i class="ion ion-paper-airplane"></i>
                </div>
                <a href="<?= base_url() ?>skpd/sentRequest" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $dokumen->num_rows();?></h3>
                  <p>Document list</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-document"></i>
                </div>
                <a href="<?= base_url() ?>skpd/document" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Document Request List</h3>
              </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped text-center" >
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIK pemohon</th>
                        <th>Tanggal permohonan</th>
                        <th>Tanggal respon</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no=1;
                      foreach ($all->result() as $req) { ?>
                      <tr role="row">
                        <td><?php echo $no ;?></td>
                        <td><?php echo $req->nik_pemohon;?></td>
                        <td><?php echo $req->request_at;?></td>
                        <td><?php echo ($req->response_at==TRUE)? $req->response_at : "<button type='button' class='btn btn-default'>".anchor('skpd/tanggapi/'.$req->id,'Tanggapi')."</button>"; ?>
                          
                        </td>
                        <td><?php echo ($req->response_at==TRUE)? '<i class="fa fa-fw fa-check"></i>' : '<i class="fa fa-fw fa-close"></i>'; ?></td>
                      </tr>
                      <?php $no++; };?>
                    </tbody>
                  </table>
                </div> 
              </div>
            </section>
          </div>
        
