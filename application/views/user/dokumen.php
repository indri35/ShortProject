    <!-- Start Page Banner -->
    <div class="page-banner" style="padding:40px 0; background: url(<?php echo base_url() ?>assets/user/margo/images/slide-02-bg.jpg) center #f9f9f9;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Daftar Dokumen</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="<?php echo base_url() ?>">Home</a></li>
              <li>Daftar Dokumen</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Banner --> 

    <!-- Start Content -->
    <div id="content">   
      <div class="container">
        <div class="page-content">
          <div class="row">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th>Kode Berkas</th>
                    <th>Tanggal Upload</th>
                    <th>Nama Berkas</th>
                    <th>Kategori</th>
                    <th>Deskripsi Berkas</th>
                    <th>SKPD</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach($dokumen->result() as $row){ 
                  ?>
                    <tr>
                      <td><?= $i ?></td>    
                      <td><?php echo $row->kode_berkas; ?></td>
                      <td><?php echo $row->upload_at; ?></td>
                      <td><?php echo $row->nama_berkas; ?></td>
                      <td><?php echo $row->kategori; ?></td>
                      <td><?php echo $row->deskripsi; ?></td>
                      <td><?php echo $row->kode_skpd; ?></td>
                    </tr>
                  <?php
                  $i++; }
                  ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container -->
