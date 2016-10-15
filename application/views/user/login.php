    <!-- Start Content -->
    <div id="content">   
      <div class="container">
        <div class="page-content">
            <div class="row">
              <div class="col-md-4 col-md-offset-4" >
                <div class="call-action call-action-boxed call-action-style2 clearfix">
                  <h3 class="classic-title"><span><strong>Login Pemohon</strong></span></h3>
                  <h3 class="text-center"><?php echo validation_errors(); ?></h3>
                  <?php echo form_open('loginverify'); ?>
                  <form class="form-validate form-horizontal">
                    <div class="form-group">
                      <label for="email" class="control-label col-lg-3">Email </label>
                      <div class="col-lg-9">
                        <input class=" form-control" name="email" id="email" type="text" placeholder="" required><br/>
                      </div>
                    </div>    
                    <div class="form-group">
                      <label for="password" class="control-label col-lg-3">Password </label>
                      <div class="col-lg-9">
                        <input class=" form-control" name="password" id="password" type="password" placeholder="" required><br/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-8">
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox"> Remember Me
                          </label>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                      </div>
                    </div>
                  </form>
                  <a href="<?php echo base_url() ?>UserPage/recover">I forgot my password</a><br>
                  <a href="<?php echo base_url() ?>UserPage/register" class="text-center">Register a new membership</a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>