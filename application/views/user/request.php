    <div class="container">
        <div class="row">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Request</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th></th>
                      <th>Kode Berkas</th>
                      <th>Tanggal Upload</th>
                      <th>Nama Berkas</th>
                      <th>Kategori</th>
                      <th>Deskripsi Berkas</th>
                      <th>SKPD</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($request->result() as $row){ 
                        ?>
                        <tr>
                            <td><?= $i ?></td>    
                            <td><?php echo $row->tujuan_permohonan_info; ?></td>
                            <td><?php echo $row->nik_pemohon; ?></td>
                            <td><?php echo $row->request_at; ?></td>
                            <td><?php echo $row->kode_berkas; ?></td>
                            <td><?php echo $row->nama_berkas; ?></td>
                            <td><?php echo $row->kode_skpd; ?></td>
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
