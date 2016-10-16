    <!-- Start Page Banner -->
    <div class="page-banner" style="padding:40px 0; background: url(<?php echo base_url() ?>assets/user/margo/images/slide-02-bg.jpg) center #f9f9f9;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Hello <b><a  href="<?php echo base_url() ?>UserPage/profil/"><?php echo $this->session->userdata('nama'); ?></b></a></h2>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="<?php echo base_url() ?>">Home</a></li>
              <li>Profil</li>
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
              <div class="col-md-6 col-md-offset-3" >
                <div class="call-action call-action-boxed call-action-style2 clearfix">
                  <h3 class="classic-title"><span><strong>Data Diri Pemohon</strong></span></h3>
                    <li class="list-group-item col-lg-12">
                      <p class =
                      "col-lg-4"><b>NIK</b></p> <p class="col-lg-8">: <?php echo $this->session->userdata('nik'); ?></p>
                    </li>
                    <li class="list-group-item col-lg-12">
                      <p class =
                      "col-lg-4"><b>Nama</b></p> <p class="col-lg-8">: <?php echo $this->session->userdata('nama'); ?></p>
                    </li>
                    <li class="list-group-item col-lg-12">
                      <p class =
                      "col-lg-4"><b>Alamat</b></p> <p class="col-lg-8">: <?php echo $this->session->userdata('alamat'); ?></p>
                    </li>
                    <li class="list-group-item col-lg-12">
                      <p class =
                      "col-lg-4"><b>No Telepon</b></p> <p class="col-lg-8">: <?php echo $this->session->userdata('no_tlpn'); ?></p>
                    </li>
                    <li class="list-group-item col-lg-12">
                      <p class =
                      "col-lg-4"><b>No HP</b></p> <p class="col-lg-8">: <?php echo $this->session->userdata('no_hp'); ?></p>
                    </li>
                    <li class="list-group-item col-lg-12">
                      <p class =
                      "col-lg-4"><b>Email</b></p> <p class="col-lg-8">: <?php echo $this->session->userdata('email'); ?></p>
                    </li>
                    <link href="<?php echo base_url() ?>assets/user/css/modal-image-about.css" rel="stylesheet">
                    <li class="list-group-item col-lg-12">
                      <p class =
                      "col-lg-4"><b>KTP</b></p> <p class="col-lg-8">
                      <a href="<?php echo base_url() ?>assets/ktp/<?php echo $this->session->userdata('ktp'); ?>" class="lightbox">
                        <img alt="" src="<?php echo base_url() ?>assets/ktp/<?php echo $this->session->userdata('ktp'); ?>"> 
                      </a>
                      </p>
                    </li>
                    <li class="list-group-item col-lg-12">
                      <p class="text-center"><strong><a href="<?php echo base_url() ?>UserPage/edit_profil">EDIT PROFIL </a></strong></p>
                    </li>
                </div>
              </div>
            </div>
        </div>    
      </div>
    </div>
    <!-- /.container -->
