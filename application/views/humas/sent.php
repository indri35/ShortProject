
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Sent request list
            <small>SKPD </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>humas/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url() ?>humas/index">Document list</a></li>
            <li class="active">Sent Request</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">Sent Request List</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped dataTable text-center">
                  <thead>
                    <tr role="row">
                      <th>No</th>
                      <th >NIK pemohon</th>
                      <th>Tanggal permohonan</th>
                      <th>Tanggal respon</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($sents->result() as $sent) { ?>
                    <tr role="row">
                      <td><?php echo $no ;?></td>
                      <td><?php echo $sent->nik_pemohon;?></td>
                      <td><?php echo $sent->request_at;?></td>
                      <td><?php echo ($sent->response_at==TRUE)? $sent->response_at : '<button type="button" class="btn btn-success">Tanggapi</button>'; ?>
                      </td>
                      <td><?php echo ($sent->response_at==TRUE)? '<i class="fa fa-fw fa-check"></i>' : '<i class="fa fa-fw fa-close"></i>'; ?></td>
                    <?php $no++; };?>
                  </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->