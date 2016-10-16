    <!-- Start Page Banner -->
    <div class="page-banner" style="padding:40px 0; background: url(<?php echo base_url() ?>assets/user/margo/images/slide-02-bg.jpg) center #f9f9f9;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Daftar Permohonan Saya</h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="<?php echo base_url() ?>">Home</a></li>
              <li>Permohonan Saya</li>
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
              <div class="tabs-section">
                <!-- Nav Tabs -->
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-desktop"></i>Semua Daftar Permohonan</a></li>
                  <li><a href="#tab-2" data-toggle="tab"><i class="fa fa-check"></i>Permohonan yang Telah Ditanggapi</a></li>
                  <li><a href="#tab-3" data-toggle="tab"><i class="fa fa-close"></i>Permohonan yang Belum Ditanggapi</a></li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                  <!-- Tab Content 1 -->
                  <div class="tab-pane fade in active" id="tab-1">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th></th>
                        <th>Tujuan Permohonan Informasi</th>
                        <th>Kode Berkas</th>
                        <th>Nama Berkas</th>
                        <th>Kode SKPD</th>
                        <th>Tanggal Request</th>
                        <th>Detail</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php 
                              $i = 1;
                              foreach($request_all->result() as $row){ 
                          ?>

                          <tr>
                              <td><?= $i ?></td>    
                              <td><?php echo $row->tujuan_permohonan_info; ?></td>
                              <td><?php echo $row->kode_berkas; ?></td>
                              <td><?php echo $row->nama_berkas; ?></td>
                              <td><?php echo $row->kode_skpd; ?></td>
                              <td><?php echo $row->request_at; ?></td>
                              <td><a href="<?php echo base_url() ?>UserPage/request_detail/<?= $row->no_req ?>" class="btn btn-info btn-xs">Detail</a></td></td>
                          </tr>
                          <?php
                              $i++; }
                          ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- Tab Content 2 -->
                  <div class="tab-pane fade" id="tab-2">
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th></th>
                        <th>Tujuan Permohonan Informasi</th>
                        <th>Kode Berkas</th>
                        <th>Nama Berkas</th>
                        <th>Kode SKPD</th>
                        <th>Tanggal Request</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php 
                              $i = 1;
                              foreach($request_ditanggapi->result() as $row){ 
                          ?>

                          <tr>
                              <td><?= $i ?></td>    
                              <td><?php echo $row->tujuan_permohonan_info; ?></td>
                              <td><?php echo $row->kode_berkas; ?></td>
                              <td><?php echo $row->nama_berkas; ?></td>
                              <td><?php echo $row->kode_skpd; ?></td>
                              <td><?php echo $row->request_at; ?></td>
                              <td><a href="<?php echo base_url() ?>assets/user/img/<?php echo $row->berkas_upload; ?> " download class="btn btn-success btn-xs">Download</a>&nbsp<a href="<?php echo base_url() ?>UserPage/request_detail/<?= $row->no_req ?>" class="btn btn-info btn-xs">Detail</a></td>
                          </tr>
                          <?php
                              $i++; }
                          ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- Tab Content 3 -->
                  <div class="tab-pane fade" id="tab-3">
                    <table id="example3" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th></th>
                        <th>Tujuan Permohonan Informasi</th>
                        <th>Kode Berkas</th>
                        <th>Nama Berkas</th>
                        <th>Kode SKPD</th>
                        <th>Tanggal Request</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php 
                              $i = 1;
                              foreach($request_belum_ditanggapi->result() as $row){ 
                          ?>

                          <tr>
                              <td><?= $i ?></td>    
                              <td><?php echo $row->tujuan_permohonan_info; ?></td>
                              <td><?php echo $row->kode_berkas; ?></td>
                              <td><?php echo $row->nama_berkas; ?></td>
                              <td><?php echo $row->kode_skpd; ?></td>
                              <td><?php echo $row->request_at; ?></td>
                              <td><a href="<?php echo base_url() ?>UserPage/upload_form_keberatan/<?= $row->no_req ?>" class="btn btn-warning btn-ms">Ajukan Keberatan</a>&nbsp<a href="<?php echo base_url() ?>UserPage/request_detail/<?= $row->no_req ?>" class="btn btn-info btn-xs">Detail</a></td>
                          </tr>
                          <?php
                              $i++; }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- End Tab Panels -->
              </div>
            </div>
        </div>
      </div>
    </div>
    <!-- /.container -->
