
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User complain list
            <small>SKPD </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>skpd/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User complain</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">User Complain List</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped dataTable text-center">
                  <thead>
                    <tr role="row">
                      <th>No</th>
                      <th>NIK pemohon</th>
                      <th>Nama berkas</th>
                      <th>Detail pemohon</th>     
                      <th>Tanggal respon terakhir</th>
                      <th>Form keberatan</th>
                      <th>Tanggapi kembali</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($comp->result() as $com) { ?>
                    <tr role="row">
                      <td><?php echo $no ;?></td>
                      <td><?php echo $com->nik_pemohon;?></td>
                      <td><?php echo $com->nama_berkas;?></td>
                      <td><a href="<?= base_url() ?>skpd/show/<?= $com->nik_pemohon ?>/<?= $com->no_req ?>" class="btn btn-success"> Detail</a></td>
                      <td><?php echo $com->date_upload; ?></td>
                      <td><?php echo $com->form_keberatan;?></td>
                      <td><?php echo "<button type='button' class='btn btn-default'>".anchor('skpd/tanggapi_keberatan/'.$com->no_req,'Tanggapi')."</button>"; ?>
                          </td>
                    <?php $no++; };?>
                  </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
