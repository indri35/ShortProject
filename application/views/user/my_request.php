    <div class="container">
        <div class="row">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Request Saya</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th></th>
                      <th>Tujuan Permohonan Informasi</th>
                      <th>Kode Berkas</th>
                      <th>Nama Berkas</th>
                      <th>Kode SKPD</th>
                      <th>Tanggal Request</th>
                      <th>Tanggal Respon</th>
                      <th>Berkas</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($my_request->result() as $row){ 
                        ?>
                        <tr>
                            <td><?= $i ?></td>    
                            <td><?php echo $row->tujuan_permohonan_info; ?></td>
                            <td><?php echo $row->kode_berkas; ?></td>
                            <td><?php echo $row->nama_berkas; ?></td>
                            <td><?php echo $row->kode_skpd; ?></td>
                            <td><?php echo $row->request_at; ?></td>
                            <td><?php echo $row->date_upload; ?></td>
                            <td><a href="<?php echo base_url() ?>assets/user/img/<?php echo $row->berkas_upload; ?>"><?php echo $row->berkas_upload; ?></a></td>
                        </tr>
                        <?php
                            $i++; }
                        ?>
                    </tbody>
                  </table>
                </div>
            <!-- /.box-body -->
            </div>
        </div>
    </div>
    <!-- /.container -->
