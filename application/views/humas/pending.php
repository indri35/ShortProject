
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Document request list
            <small>SKPD </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>humas/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url() ?>humas/index">Document list</a></li>
            <li class="active">Pending request</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">Document Request List</h3>
                <br /> <br />
                <a class="btn btn-primary" href="<?= base_url() ?>humas/exportExcelRequest">Export to Excel (All Request)</a>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped dataTable">
                  <thead>
                    <tr role="row">
                      <th>No</th>
                      <th>Kode berkas</th>
                      <th>Nama berkas</th>
                      <th>NIK pemohon</th>
                      <th>Tujuan permohonan</th>
                      <th>Berkas</th>
                      <th>Detail pemohon</th>
                      <th>Tanggal respon</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($pending->result() as $pen) { ?>
                    <tr role="row">
                      <td><?php echo $no ;?></td>
                      <td><?php echo $pen->kode_berkas;?></td>
                      <td><?php echo $pen->nama_berkas;?></td>
                      <td><?php echo $pen->nik_pemohon;?></td>
                      <td><?php echo $pen->kode_skpd;?></td>
                      <td><a href="<?= base_url() ?>humas/show/<?= $pen->nik_pemohon ?>/<?= $pen->no_req ?>" class="btn btn-info"> Detail</a></td>
                      <td><?php if (($pen->berkas_upload==TRUE && $pen->pesan_tolak==FALSE)){echo $pen->date_upload;}
                         elseif($pen->berkas_upload==FALSE && $pen->pesan_tolak==FALSE){echo "<a href='../humas/tanggapi/$pen->no_req' class='btn btn-success'>Tanggapi</a>";}
                         elseif ($pen->berkas_upload==FALSE && $pen->pesan_tolak==TRUE) { echo $pen->date_upload; } ?>
                      </td>
                      <td><?php if ($pen->berkas_upload==TRUE && $pen->pesan_tolak==FALSE){echo '<i class="fa fa-fw fa-check"></i>';} 
                            elseif ($pen->berkas_upload==FALSE && $pen->pesan_tolak==FALSE) {
                               echo '<i class="fa fa-fw fa-close"></i>';}
                            elseif ($pen->berkas_upload==FALSE && $pen->pesan_tolak==TRUE) { echo 'Tolak'; }
                            ?></td>
                    <?php $no++; };?>
                  </tbody>
                </table>
              </div>
            </div>
          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
