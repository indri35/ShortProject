    <!-- Start Content -->
    <div id="content">   
      <div class="container">
        <div class="page-content">
            <div class="row">
              <div class="col-md-4 col-md-offset-4" >
                <div class="call-action call-action-boxed call-action-style2 clearfix">
                  <h3 class="classic-title"><span><strong>Reset Password</strong></span></h3>
                  <?php echo form_open('UserPage/recover_password'); ?>
                  <form class="form-validate form-horizontal">
                    <div class="form-group">
                      <label for="email" class="control-label col-lg-3">Email </label>
                        <div class="col-lg-9">
                          <input class=" form-control" name="email" id="email" type="text" placeholder="" required><br/>
                        </div>
                    </div>    
                    <div class="row">
                      <div class="col-lg-offset-8 col-lg-4">
                        <button type="submit" class="btn-system btn-small">Submit</button>
                      </div>
                    </div>
                  </form>
                  <a href="<?php echo base_url() ?>UserPage/login" class="text-center">I already have a membership</a><br/>
                  <a href="<?php echo base_url() ?>UserPage/register" class="text-center">Register a new membership</a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>