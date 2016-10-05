<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Sekretariat PPID – Pemerintah Kota Bogor<br/>JJl. Ir. H. Juanda Nomor 10-Bogor 16121<br/>
                    Copyright &copy; PPID Bogor 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/user/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/user/js/bootstrap.min.js"></script>

    <!-- DataTables -->
    <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- Select2 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.full.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    <!-- page script -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
        $('#request_at').datepicker({
                    format: "yyyy",
                    autoclose:true
                });
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

</body>

</html>