    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" >
                <div class="box">
                    <div class="box-header">
                      <hr>
                        <h2 class="intro-text text-center"><strong>Profil Pemohon</strong></h2>
                      <hr>  
                    </div>
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
                      "col-lg-4"><b>KTP</b></p> <p class="col-lg-8">: 
                      <img id="myImg4" class="img-responsive img-border img-center " src="<?php echo base_url() ?>assets/ktp/<?php echo $this->session->userdata('ktp'); ?>" alt="" width=200px>

                        <!-- The Modal -->
                        <div id="myModal4" class="modal">
                          <span class="close4">×</span>
                          <img class="modal-content" id="img04">
                        </div>

                        <script>
                        // Get the modal
                        var modal = document.getElementById('myModal4');

                        // Get the image and insert it inside the modal - use its "alt" text as a caption
                        var img = document.getElementById('myImg4');
                        var modalImg = document.getElementById("img04");
                        img.onclick = function(){
                            modal.style.display = "block";
                            modalImg.src = this.src;
                            captionText.innerHTML = this.alt;
                        }

                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("close4")[0];

                        // When the user clicks on <span> (x), close the modal
                        span.onclick = function() {
                            modal.style.display = "none";
                        }
                        </script>
                      </p>
                    </li>
                    <li class="list-group-item col-lg-12">
                      <p class="text-center"><strong><a href="<?php echo base_url() ?>UserPage/edit_profil">EDIT PROFIL </a></strong></p>
                    </li>
                </div>
            </div>    
        </div>
    </div>
    <!-- /.container -->
