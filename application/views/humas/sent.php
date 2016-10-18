
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
                <br /> <br />
                <a class="btn btn-primary" href="<?= base_url() ?>humas/exportExcelRequest">Export to Excel (All Request)</a>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped dataTable text-center">
                  <thead>
                    <tr role="row">
                      <th>No</th>
                      <th>Kode berkas</th>
                      <th>Nama berkas</th>
                      <th>NIK pemohon</th>
                      <th>Tujuan permohonan</th>
                      <th>Detail pemohon</th>
                      <th>Berkas</th>
                      <th>Tanggal respon</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($sents->result() as $sent) { ?>
                    <tr role="row">
                      <td><?php echo $no ;?></td>
                      <td><?php echo $sent->kode_berkas;?></td>
                      <td><?php echo $sent->nama_berkas;?></td>
                      <td><?php echo $sent->nik_pemohon;?></td>
                      <td><?php echo $sent->kode_skpd;?></td>
                      <td><a href="<?= base_url() ?>humas/show/<?= $sent->nik_pemohon ?>/<?= $sent->no_req ?>" class="btn btn-success"> Detail</a></td>
                      <td><?php echo ($sent->berkas_upload==TRUE)? $sent->date_upload : '<button type="button" class="btn btn-success">Tanggapi</button>'; ?>
                      </td>
                      <td><?php echo ($sent->berkas_upload==TRUE)? '<i class="fa fa-fw fa-check"></i>' : '<i class="fa fa-fw fa-close"></i>'; ?></td>
                    <?php $no++; };?>
                  </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
