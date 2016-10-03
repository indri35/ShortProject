<?php 
$this->load->view('template_admin/header');
$this->load->view('template_admin/topside');
?>

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
                <?php echo form_open('skpd/update'); ?>
                <?php echo form_hidden('id',$this->uri->segment(3)); ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label>NIK pemohon</label>
                      <?php echo form_input('nik_pemohon', $reqs['nik_pemohon'],array('class'=>'form-control','readonly'=>'true')); ?>
                    </div>
                    <div class="form-group">
                      <label>Tanggal permohonan</label>
                      <?php echo form_input('request_at', $reqs['request_at'],array('class'=>'form-control', 'readonly'=>'true')); ?>
                    </div>
                    <input type="hidden" name="response_at" value="<?php echo date("Y-m-d"); ?>">
                    <div class="form-group">
                      <label for="exampleInputFile">File request</label>
                      <input type="file" id="exampleInputFile">
                      <p class="help-block">File .pdf,.jpg, .png .xlxs, .docx.</p>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                <?php echo form_close();?>
              </div><!-- /.box -->
	    </div>
	  </div>
	</section>
</div>


<?php 
$this->load->view('template_admin/footer');
?>