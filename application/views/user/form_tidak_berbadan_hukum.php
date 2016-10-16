    <!-- Start Page Banner -->
    <div class="page-banner" style="padding:40px 0; background: url(<?php echo base_url() ?>assets/user/margo/images/slide-02-bg.jpg) center #f9f9f9;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Formulir Permohonan Informasi</h2>
            <h3>oleh Tidak Berbadan Hukum</strong></h3>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="<?php echo base_url() ?>">Home</a></li>
              <li>Permohonan Tidak Berbadan Hukum</li>
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
                    <div class="col-lg-6">
                        <h3 class="classic-title"><span><strong>Data Diri Pemohon</strong></span></h3>   
                        <?php echo form_open_multipart('UserPage/input_form_berbadan_hukum');?>
                        <div class="form-group form-horizontal">
                            <label for="nik" class="control-label col-lg-3">NIK</label>
                            <div class="col-lg-9">
                                <input class=" form-control" type="text" value="<?php echo $this->session->userdata('nik'); ?>" disabled><br/>
                            </div>
                        </div>
                        <div class="form-group form-horizontal">
                            <label for="nama" class="control-label col-lg-3">Nama </label>
                            <div class="col-lg-9">
                                <input class=" form-control" type="text" value="<?php echo $this->session->userdata('nama'); ?>" disabled><br/>
                            </div>
                        </div>
                        <div class="form-group form-horizontal">
                            <label for="alamat" class="control-label col-lg-3">Alamat </label>
                            <div class="col-lg-9">
                                <textarea class=" form-control" type="text" disabled><?php echo $this->session->userdata('alamat'); ?></textarea><br/>
                            </div>
                        </div>
                        <div class="form-group form-horizontal">
                            <label for="no_tlpn" class="control-label col-lg-3">No Telepon </label>
                            <div class="col-lg-9">
                                <input class=" form-control" type="text" value="<?php echo $this->session->userdata('no_tlpn'); ?>" disabled><br/>
                            </div>
                        </div>
                        <div class="form-group form-horizontal">
                            <label for="no_hp" class="control-label col-lg-3">No HP </label>
                            <div class="col-lg-9">
                                <input class=" form-control" type="text" value="<?php echo $this->session->userdata('no_hp'); ?>" disabled><br/>
                            </div>
                        </div>
                        <div class="form-group form-horizontal">
                            <label for="email" class="control-label col-lg-3">Email </label>
                            <div class="col-lg-9">
                                <input class=" form-control" type="text" value="<?php echo $this->session->userdata('email'); ?>" disabled><br/>
                            </div>
                        </div>
                        <font>Cara memperoleh informasi dan bentuk informasi yang diserahkan, akan dijelaskan kemudian melalui email. Jika terdapat kesalahan pada data pribadi silahkan lakukan perubahan data pribadi.<br/><br/></font>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="classic-title"><span><strong>Detail Permohonan Berkas</strong></span></h3>
                        <div class="form-group form-horizontal">
                            <label for="tujuan_permohonan_info" class="control-label col-lg-4">Tujuan Permohonan Informasi <font color="red">*</font></label>
                            <div class="col-lg-8">
                                <textarea class=" form-control" name="tujuan_permohonan_info" type="text" placeholder="Tujuan Permohonan Informasi." required></textarea><br/>
                            </div>
                        </div>
                        <div class="form-group form-horizontal">
                            <label for="ktp" class="control-label col-lg-4">Dokumen TTD Seluruh Anggota <font color="red">*</font></label>
                            <div class="col-lg-8">
                                <input type="file"  name="userfile" id="gamgam" required>
                                <font class="help-block">Upload file dengan format .pdf|.png|.jpg.</font>
                            </div>    
                        </div>
                        <div>
                            <input type="hidden" name="gambar_value" id="gamgum">
                        </div>
                        <div class="form-group form-horizontal">
                            <label class="control-label col-lg-4">Dokumen</label>
                            <div class="col-lg-8">
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select Kode Dokumen" name="dokumen[]"style="width: 100%;">
                                    <?php 
                                        foreach($dokumen->result() as $row){ 
                                    ?>
                                    <option><?php echo $row->kode_berkas; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select><br/>
                            </div>
                        </div>
                        <font class="help-block"><a href="<?php echo base_url() ?>UserPage/dokumen" target="_blank">Lihat Daftar Dokumen.</a></font>
                                        
                        <font><br/>Informasi yang Saya peroleh akan Saya gunakan sesuai dengan ketentuan perundang-undangan yang berlaku.<br/> </font>
                            <div class="col-lg-offset-8 col-lg-4">
                                <br/>Bogor, 
                                    <?php
                                        echo date("d-m-Y") . "<br>";
                                    ?>
                                Pemohon Informasi: 
                                <br/>
                                <br/>
                                <br/>(<?php echo $this->session->userdata('nama'); ?>)</font>
                                <input class=" form-control" type="hidden" name="nik_pemohon" value="<?php echo $this->session->userdata('nik'); ?>" >
                                <input class=" form-control" type="hidden" name="jenis_request" value="bukan-badan-hukum" >
                                <input class=" form-control" type="hidden" name="request_at" value="<?php echo date("Y-m-d"); ?>" >
                            <div class="col-lg-offset-9 col-lg-3">
                                <input type="submit" class="btn btn-primary" onclick="coba()" value="Submit" name="simpan">
                            </div>
                            <?php echo form_close(); ?>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <!-- /.container -->