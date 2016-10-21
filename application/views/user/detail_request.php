    <?php 
        foreach($request_detail->result() as $row){ 
    ?>
    <!-- Start Page Banner -->
    <div class="page-banner" style="padding:40px 0; background: url(<?php echo base_url() ?>assets/user/margo/images/slide-02-bg.jpg) center #f9f9f9;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Daftar Permohonan Saya</h2>
            <p>Detail Permohonan Nomor <strong><?php echo $row->no_req; ?></strong></p>
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
              <div class="call-action call-action-boxed call-action-style1 clearfix">
                <div class="col-lg-12">
                  <div class="panel-body">
                      <div class="col-lg-12">
                        <h3 class="classic-title"><span><strong>Detail Permohonan Berkas</strong></span></h3>
                            <li class="list-group-item col-lg-12">
                              <p class ="col-lg-4"><b>Jenis Permohonan</b></p> <p class="col-lg-8">: <?php echo $row->jenis_request; ?></p>
                            </li>
                            <li class="list-group-item col-lg-12">
                              <p class ="col-lg-4"><b>SKPD Tujuan</b></p> <p class="col-lg-8">: <?php echo $row->kode_skpd; ?></p>
                            </li>
                            <li class="list-group-item col-lg-12">
                              <p class ="col-lg-4"><b>Tujuan Permohonan Informasi</b></p> <p class="col-lg-8">: <?php echo $row->tujuan_permohonan_info; ?></p>
                            </li>
                            <li class="list-group-item col-lg-12">
                              <p class ="col-lg-4"><b>Kode Berkas</b></p> <p class="col-lg-8">: <?php echo $row->kode_berkas; ?></p>
                            </li>
                            <li class="list-group-item col-lg-12">
                              <p class ="col-lg-4"><b>Nama Berkas</b></p> <p class="col-lg-8">: <?php echo $row->nama_berkas; ?></p>
                            </li>
                            <li class="list-group-item col-lg-12">
                              <p class ="col-lg-4"><b>Deskripsi Berkas</b></p> <p class="col-lg-8">: <?php echo $row->deskripsi_berkas; ?></p>
                            </li>
                            <li class="list-group-item col-lg-12">
                              <p class ="col-lg-4"><b>Kategori Berkas</b></p> <p class="col-lg-8">: <?php echo $row->kategori_berkas; ?></p>
                            </li>
                            <li class="list-group-item col-lg-12">
                              <p class ="col-lg-4"><b>Dokumen <?php if($row->jenis_request=='perorangan')  {echo 'KTP ';}
                                  elseif ($row->jenis_request=='badan-hukum') {
                                      echo 'Akta';} 
                                  else {echo 'Dokumen TTD Seluruh Anggota ';}
                                       ?></b></p> <p class="col-lg-8">: <?php echo $row->file_pendukung; ?></p>
                            </li>
                            <li class="list-group-item col-lg-12">
                              <p class ="col-lg-4"><b>Tanggal Permohonan</b></p> <p class="col-lg-8">: <?php echo $row->request_at; ?></p>
                            </li>
                            <li class="list-group-item col-lg-12">
                              <p class ="col-lg-4"><b>Tanggal Tanggapan</b></p> <p class="col-lg-8">: <?php if($row->date_upload==NULL)  {echo 'Permohonan Belum Ditanggapi ';}
                                  else { echo $row->date_upload ;}
                                       ?>
                            </li>
                            <li class="list-group-item col-lg-12">
                              <p class ="col-lg-4"><b>Berkas Tanggapan</b></p> <p class="col-lg-8">: <?php if($row->berkas_upload==NULL)  {echo 'Berkas Belum Tersedia ';}
                                  else { echo $row->berkas_upload ;}
                                       ?>
                            </li>
                            <li class="list-group-item col-lg-12">
                              <p class ="col-lg-4"><b>Action</b></p> <p class="col-lg-8">: 
                              <?php if($row->berkas_upload==NULL) {
                              ?>
                              <a href="<?php echo base_url() ?>UserPage/upload_form_keberatan/<?= $row->no_req ?>" class="btn btn-warning btn-ms">Ajukan Keberatan</a></p>
                              <?php 
                                ;} else {
                              ?>
                              <a href="<?php echo base_url() ?>assets/dokumen/<?php echo $row->berkas_upload; ?>" download class="btn btn-success btn-ms">Download Berkas</a>&nbsp<a href="<?php echo base_url() ?>UserPage/upload_form_keberatan/<?= $row->no_req ?>" class="btn btn-warning btn-ms">Ajukan Keberatan</a></p>
                              <?php
                                ;}
                              ?>
                            </li>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <?php
        }
    ?>
    <!-- /.container -->