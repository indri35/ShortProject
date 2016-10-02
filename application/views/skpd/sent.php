<?php 
$this->load->view('template_admin/header');
$this->load->view('template_admin/topside');
?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Sent request list
            <small>SKPD </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>skpd/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url() ?>skpd/index">Document list</a></li>
            <li class="active">Sent Request</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12 ">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Sent Request List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="dataTables_lenght" id="example1_lenght">
                        <label>
                          Show
                          <select name="example1_lenght" aria-controls="example1" class="form-control input-sm"></select>
                          entries
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-6" align="right">
                      <div id="example_filter" class="dataTables_filter">
                        <label>
                          Search :
                          <input type="search" class="form-control input-sm" placeholder aria-controls="example1">
                        </label>
                      </div>
                    </div>
                  </div>
                  <table id="example1" class="table table-bordered table-striped dataTable text-center" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No: activate to sort column ascending">No</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="NIK pemohon: activate to sort column ascending" >NIK pemohon</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="NIK pemohon: activate to sort column ascending">Tanggal permohonan</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="NIK pemohon: activate to sort column ascending">Kode berkas</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="NIK pemohon: activate to sort column ascending">Tanggal respon</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="NIK pemohon: activate to sort column ascending">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no=1;
                      foreach ($sents->result() as $sent) { ?>
                      <tr role="row">
                        <td><?php echo $no ;?></td>
                        <td><?php echo $sent->nik_pemohon;?></td>
                        <td><?php echo $sent->request_at;?></td>
                        <td> <?php echo $sent->kode_berkas;?></td>
                        <td><?php echo ($sent->response_at==TRUE)? $sent->response_at : '<button type="button" class="btn btn-success">Tanggapi</button>'; ?>
                        </td>
                        <td><?php echo ($sent->response_at==TRUE)? '<i class="fa fa-fw fa-check"></i>' : '<i class="fa fa-fw fa-close"></i>'; ?></td>
                      <?php $no++; };?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>NIK pemohon</th>
                        <th>Tanggal permohonan</th>
                        <th>Kode berkas</th>
                        <th>Tanggal respon</th>
                        <th>Status</th>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="row">
                    <div class="col-sm-5">
                      <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                      Showing
                      </div>
                    </div>
                    <div class="col-sm-7" align="right">
                      <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                      <ul class="pagination">
                      <li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li>
                      <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a>
                      </li>
                      <li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a>
                      </li>
                      </ul>
                      </div> 
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>
            </div>
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<!-- ./wrapper -->


<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js')?>"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url('assets/admin/')?>../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/admin/plugins/datatables//jquery.dataTables.min.js')?>">></script>
<script src="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.min.js')?>">></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/admin/plugins/fastclick/fastclick.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/admin/dist/js/app.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/admin/dist/js/demo.js')?>"></script>
<!-- page script -->
<script> 
<!-- FastClick -->

  $(function(){
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging":true,
      "LengthChange":false,
      "Searching":false,
      "ordering":true,
      "info":true,
      "autoWidth": false
    });
  });
</script>
<?php 
$this->load->view('template_admin/footer');
?>