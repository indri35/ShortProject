
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
                      <td><?php echo ($pen->berkas_upload==TRUE)? $pen->berkas_upload : "<button type='button' class='btn btn-default'>".anchor('skpd/tanggapi/'.$pen->no_req,'Tanggapi')."</button>"; ?>
                      </td>
                      <td><?php echo ($pen->berkas_upload==TRUE)? '<i class="fa fa-fw fa-check"></i>' : '<i class="fa fa-fw fa-close"></i>'; ?></td>
                    <?php $no++; };?>
                  </tbody>
                </table>
              </div>
            </div>
          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
