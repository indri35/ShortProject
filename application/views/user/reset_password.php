<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" >
            <div class="box">
                <p class="login-box-msg text-center">Reset Password</p>
                  <?php echo form_open('UserPage/update_password'); ?>
                  <form class="form-validate form-horizontal">
                  <?php
                    //Kita akan melakukan looping terhadap variable $product yang telah dikirimkan melalui controller
                    foreach($listTable->result() as $detail){
                  ?>
                  <input type="hidden"  value="<?php echo $detail->reset_pass;?>" name="reset_pass" />                  
                  <?php
                    }    
                  ?>
                      <div class="form-group">
                          <label for="email" class="control-label col-lg-3">Password </label>
                          <div class="col-lg-9">
                              <input class=" form-control" name="password" id="password" type="password" placeholder="" required><br/>
                          </div>
                      </div> 
                      <div class="form-group">
                          <label for="cpassword" class="control-label col-lg-3">Confirm Password </label>
                          <div class="col-lg-9">
                              <input class=" form-control" name="cpassword" id="cpassword" type="password" placeholder="" required><br/>
                          </div>
                      </div>    
                      <div class="row">
                          <div class="col-lg-offset-8 col-lg-4">
                              <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                          </div>
                      </div>
                  </form>
                  <a href="<?php echo base_url() ?>UserPage/register" class="text-center">Register a new membership</a>
            </div>
        </div>
    </div>
</div>