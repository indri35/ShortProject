
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Document list
            <small>SKPD </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Document list</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Document Request List</h3>
              <br /><br />
              <a class="btn btn-primary" href="<?= base_url() ?>skpd/create">Add Document</a>
            </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped dataTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode berkas</th>
                      <th>Tercatat pada</th>
                      <th>Nama berkas</th>
                      <th>Berkas</th>
                      <th>Kategori</th>
                      <th>Deskripsi</th>
                      <th>Kepemilikan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($document->result() as $doc) { ?>
                    <tr role="row">
                      <td><?php echo $no ;?></td>
                      <td><?php echo $doc->kode_berkas;?></td>
                      <td><?php echo $doc->upload_at;?></td>
                      <td> <?php echo $doc->nama_berkas;?></td>
                      <td> <?php echo $doc->berkas;?></td>
                      <td> <?php echo $doc->kategori;?></td>
                      <td> <?php echo $doc->deskripsi;?></td>
                      <td> <?php echo $doc->kode_skpd;?></td>
                      <td><a class="btn btn-primary" href="<?= base_url() ?>skpd/edit/<?= $doc->id ?>">Update</a>
                          <a class="btn btn-danger" href="<?= base_url() ?>skpd/delete/<?= $doc->id ?>" onClick="return doconfirm();">Delete</a></td>
                    <?php $no++; };?>
                  </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
