
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Respond Request
        <small>SKPD </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>skpd/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() ?>skpd/index">Request list</a></li>
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
            <?php echo form_open_multipart('skpd/do_upload'); ?>
            <?php echo form_hidden('no_req',$this->uri->segment(3)); ?>
              <div class="box-body">
                <div class="form-group">
                  <label>Tanggal pemberian</label>
                  <input class="form-control" type="date" name="date_upload" value="<?php echo date("Y-m-d"); ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Gunakan file yang sudah ada</label>
                  <select type="text" name="doc" class="form-control">
                  <option value="NULL">Select document..</option>
                  <?php foreach ($doc->result() as $d) { ?>
                    <option value="<?php echo $d->berkas; ?>"><?php echo $d->berkas; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <h4><strong>Atau upload file baru </strong></h4> 
                <div class="form-group">
                  <label for="dokumen">Document file <font color="red">*</font></label>
                  <div>
                      <input type="file"  name="userfile" id="gamgam">
                      <font class="help-block">Upload file dengan format .jpg .png .xls .doc .pdf.</font>
                  </div>    
                </div>
                <div>
                  <input type="hidden" name="gambar_value" id="gamgum" required>
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
