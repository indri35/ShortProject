
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
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped dataTable text-center">
                  <thead>
                    <tr role="row">
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
                    foreach ($pending->result() as $pen) { ?>
                    <tr role="row">
                      <td><?php echo $no ;?></td>
                      <td><?php echo $pen->nik_pemohon;?></td>
                      <td><?php echo $pen->request_at;?></td>
                      <td><?php echo ($pen->response_at==TRUE)? $req->response_at : '<button type="button" class="btn btn-success">Tanggapi</button>'; ?>
                      </td>
                      <td><?php echo ($pen->response_at==TRUE)? '<i class="fa fa-fw fa-check"></i>' : '<i class="fa fa-fw fa-close"></i>'; ?></td>
                    <?php $no++; };?>
                  </tbody>
                </table>
              </div>
            </div>
          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
