
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Respond Request
        <small>Admin </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>humas/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() ?>humas/index">Request list</a></li>
        <li class="active">Respond Request</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-12 ">
	        <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Respond Request</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('humas/do_upload'); ?>
            <?php echo form_hidden('no_req',$this->uri->segment(3)); ?>
              <div class="box-body">
                <div class="form-group">
                  <label>Tanggal pemberian</label>
                  <input class="form-control" type="date" name="date_upload" value="<?php echo date("Y-m-d"); ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="dokumen">Document file <font color="red">*</font></label>
                  <div>
                      <input type="file"  name="userfile" id="gamgam" required>
                      <font class="help-block">Upload file dengan format .jpg .png.</font>
                  </div>    
                </div>
                <div>
                  <input type="hidden" name="gambar_value" id="gamgum">
                </div>
              </div><!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="coba()" value="Register" name="simpan">Submit</button>
              </div>
            <?php echo form_close();?>
          </div><!-- /.box -->
  	    </div>
  	  </div>
  	</section>
  </div>