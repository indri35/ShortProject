
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Document request list
            <small>SKPD </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>skpd/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url() ?>skpd/index">Document list</a></li>
            <li class="active">Pending request</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">Document Request List</h3>
                <br /> <br />
                <a class="btn btn-primary" href="<?= base_url() ?>skpd/exportExcelReq">Export to Excel (All Request)</a>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped dataTable">
                  <thead>
                    <tr role="row">
                      <th>No</th>
                      <th>NIK pemohon</th>
                      <th>Nama berkas</th>
                      <th>Tanggal respon</th>
                      <th>Detail pemohon</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($pending->result() as $pen) { ?>
                    <tr role="row">
                      <td><?php echo $no ;?></td>
                      <td><?php echo $pen->nik_pemohon;?></td>
                      <td><?php echo $pen->nama_berkas;?></td>
                      <td><a href="<?= base_url() ?>skpd/show/<?= $pen->nik_pemohon ?>/<?= $pen->no_req ?>" class="btn btn-info"> Detail</a></td>
                     <td><?php if (($pen->berkas_upload==TRUE && $pen->pesan_tolak==FALSE)){echo $pen->date_upload;}
                       elseif($pen->berkas_upload==FALSE && $pen->pesan_tolak==FALSE){echo "<a href='../skpd/tanggapi/$pen->no_req' class='btn btn-success'>Tanggapi</a> <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal$pen->no_req' >Tolak</button> ";}
                      elseif ($pen->berkas_upload==FALSE && $pen->pesan_tolak==TRUE) { echo $pen->date_upload; } 
                        ?> 
                      </td>
                      <!-- Modal -->
                          <div class="modal fade" id="myModal<?php echo $pen->no_req;?>" role="dialog">
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
                                    <input type="hidden" name="no_req" id="no_req" value="<?php echo $pen->no_req; ?>" />
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
                      <td><?php if ($pen->berkas_upload==TRUE && $pen->pesan_tolak==FALSE){echo '<i class="fa fa-fw fa-check"></i>';} 
                            elseif ($pen->berkas_upload==FALSE && $pen->pesan_tolak==FALSE) {
                               echo '<i class="fa fa-fw fa-close"></i>';}
                            elseif ($pen->berkas_upload==FALSE && $pen->pesan_tolak==TRUE) { echo 'Tolak'; }
                            ?>
                      </td>
                    <?php $no++; };?>
                  </tbody>
                </table>
              </div>
            </div>
          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
