    <!-- Start Page Banner -->
    <div class="page-banner" style="padding:40px 0; background: url(<?php echo base_url() ?>assets/user/margo/images/slide-02-bg.jpg) center #f9f9f9;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Pengajuan Form Keberatan</h2>
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
              <div class="col-md-6 col-md-offset-3" >
                <div class="call-action call-action-boxed call-action-style2 clearfix">
                  <h3 class="classic-title"><span><strong>Upload <a href="<?php echo base_url() ?>UserPage/form_keberatan" target="_blank">Form Keberatan</a></strong></span></h3>
                  <?php echo form_open_multipart('UserPage/input_form_keberatan'); ?>
                  <div class="form-group form-horizontal">
                    <label for="form_keberatan" class="control-label col-lg-4">Form Keberatan <font color="red">*</font></label>
                    <div class="col-lg-8">
                      <input type="file"  name="userfile" id="gamgam" required>
                        <font class="help-block">Upload form keberatan dengan format .doc|.docx</font>
                    </div>    
                  </div>
                  <div>
                      <input type="hidden" name="gambar_value" id="gamgum">
                  </div>
                  <div>
                    <?php
                    //Kita akan melakukan looping terhadap variable $product yang telah dikirimkan melalui controller
                    foreach($request->result() as $row){
                  ?>
                  <input type="hidden"  value="<?php echo $row->no_req;?>" name="no_req" />                  
                  <?php
                    }    
                  ?>
                  </div>
                  <div class="col-lg-offset-9 col-lg-3">
                    <input type="submit" class="btn btn-primary" onclick="coba()" value="Upload" name="simpan">
                  </div>
                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>