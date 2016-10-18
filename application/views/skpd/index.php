
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
            <div class="col-lg-3">
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
            <div class="col-lg-3 ">
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
                <a href="<?= base_url() ?>skpd/document" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $complain->num_rows();?></h3>
                  <p>User complain</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-times"></i>
                </div>
                <a href="<?= base_url() ?>skpd/complain" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Document Request List</h3>
              </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped" >
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIK pemohon</th>
                        <th>Kode berkas</th>
                        <th>Nama berkas</th>
                        <th>Detail pemohon</th>
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
                        <td><?php echo $req->kode_berkas;?></td>
                        <td><?php echo $req->nama_berkas;?></td>
                        <td><a href="<?= base_url() ?>skpd/show/<?= $req->nik_pemohon ?>/<?= $req->no_req ?>" class="btn btn-info"> Detail</a></td>
                        <td><?php if (($req->berkas_upload==TRUE && $req->pesan_tolak==FALSE)){echo $req->date_upload;}
                         elseif($req->berkas_upload==FALSE && $req->pesan_tolak==FALSE){echo "<button type='button' class='btn btn-default'>".anchor('skpd/tanggapi/'.$req->no_req,'Tanggapi')."</button> | <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal$req->no_req' >Tolak</button> ";}
                         elseif ($req->berkas_upload==FALSE && $req->pesan_tolak==TRUE) { echo $req->date_upload; } 
                          ?>
                        </td>
                          <!-- Modal -->
                          <div class="modal fade" id="myModal<?php echo $req->no_req;?>" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Tolak Request</h4>
                                </div>
                                <form id="tolak-form" action="<?= base_url() ?>/skpd/tolak/" method="post">
                                <div class="modal-body">
                                  <div class="form-group">
                                    <input type="hidden" name="no_req" id="no_req" value="<?php echo $req->no_req; ?>" />
                                  </div>
                                  <div class="form-group">
                                    <label>Tanggal</label>
                                    <input class="form-control" type="date" name="date_upload" value="<?php echo date("Y-m-d"); ?>" readonly>
                                  </div>
                                  <div class="form-group">
                                  <label>Pesan</label>
                                    <textarea class="form-control" type="text" name="pesan" placeholder="Tinggalkan pesan untuk pemohon.."></textarea>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button id="tolak-submit" type="submit" class="btn btn-default">Submit</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                        <td><?php if ($req->berkas_upload==TRUE && $req->pesan_tolak==FALSE){echo '<i class="fa fa-fw fa-check"></i>';} 
                            elseif ($req->berkas_upload==FALSE && $req->pesan_tolak==FALSE) {
                               echo '<i class="fa fa-fw fa-close"></i>';}
                            elseif ($req->berkas_upload==FALSE && $req->pesan_tolak==TRUE) { echo 'Tolak'; }
                            ?>
                        </td>
                      </tr>
                      <?php $no++; };?>
                    </tbody>
                  </table>
                </div> 
              </div>
            </section>
          </div>
          <script>
          $(function(){
             $('tolak-form').on('submit', function(e){
                  e.preventDefault();
                  $.ajax({
                      url: "<?= base_url() ?>/skpd/tolak",
                      type: "POST",
                      data: $("tolak-form").serialize(),
                      success: function(data){
                          alert("Successfully submitted.")
                      }
                  });
             }); 
          });
        </script>
        
