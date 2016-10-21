
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Document list
            <small>SKPD </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>humas/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Document list</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Document List</h3>
              <br /><br />
              <a class="btn btn-success" href="<?= base_url() ?>humas/createDoc">Add Document</a>
              <a class="btn btn-primary" href="<?= base_url() ?>humas/exportExcel">Export to Excel</a>
            </div><!-- /.box-header -->

            <?php if ($this->session->flashdata('something')) {
            echo "<div class='callout callout-danger lead'>
            <h4>". $this->session->flashdata('something') ." </h4>
            <p>File tidak sesuai sesuai format file yang diijinkan.</p>
            </div>" ; }?>

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
                    foreach ($docs->result() as $doc) { ?>
                    <tr role="row">
                      <td><?php echo $no ;?></td>
                      <td><?php echo $doc->kode_berkas;?></td>
                      <td><?php echo $doc->upload_at;?></td>
                      <td> <?php echo $doc->nama_berkas;?></td>
                      <td> <?php echo $doc->berkas;?></td>
                      <td> <?php echo $doc->kategori;?></td>
                      <td> <?php echo $doc->deskripsi;?></td>
                      <td> <?php echo $doc->kode_skpd;?></td>
                      <td><a class="btn btn-primary" href="<?= base_url() ?>humas/editt/<?= $doc->id ?>">Update</a>
                          <a class="btn btn-danger" href="<?= base_url() ?>humas/deletee/<?= $doc->id ?>" onClick="return doconfirm();">Delete</a></td>
                    <?php $no++; };?>
                  </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
