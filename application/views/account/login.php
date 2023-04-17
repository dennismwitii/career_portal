<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include 'includes/header.php' ?>
<!--style="border-style: solid; border-color: blue;"-->
<div class="login-box" >
  
  <?php if(isset($message)): ?>
      <div class="alert alert-<?php echo $message_type ?>">
        <p><?php echo $message ?></p>
      </div>
    <?php endif; ?>

    <?php if(!empty($this->session->flashdata('message'))): ?>
      <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>">
        <p><?php echo $this->session->flashdata('message') ?></p>
      </div>
    <?php endif; ?>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <div class="login-logo">
    <!--<img src="<?php echo $url->assets ?>/img/logo.jpg" alt="TSC" class="brand-image img-circle elevation-3"
           style="opacity: .8">-->
       <img src="logo.jpg" alt="logo" align="center" width="150" height= "130">
  </div>
  <p class="login-box-msg"><b>Teachers Service Commission</b></p>
  <p class="login-box-msg">Secretariat Recruitment Portal</p>
      <!--<p class="login-box-msg"><?php echo lang('sign_in_session') ?></p>-->

      <?php echo form_open('/login/check', ['method' => 'POST', 'autocomplete' => 'off']); ?> 
      <div class="input-group mb-3">
          <input type="text" name="username" required class="form-control" placeholder="<?php echo lang('username_or_email') ?>" value="<?php echo post('username') ?>" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <?php echo form_error('username', '<span style="display:block" class="error invalid-feedback">', '</span>'); ?>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" required class="form-control" placeholder="<?php echo lang('user_password') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <?php echo form_error('password', '<span style="display:block" class="error invalid-feedback">', '</span>'); ?>
        </div>

      <?php if (setting('google_recaptcha_enabled') == '1'): ?>
        
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      
      <div class="form-group">
        <div class="g-recaptcha" data-sitekey="<?php echo setting('google_recaptcha_sitekey') ?>"></div>
        <?php echo form_error('g-recaptcha-response', '<span style="display:block" class="error invalid-feedback">', '</span>'); ?>
      </div>

      <?php endif ?>

      <div class="row">
        <div class="col-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" <?php echo post('remember_me')?'checked':'' ?> name="remember_me" /> <?php echo lang('remember_me') ?>
            </label>
          </div>
        </div>
        <!-- /.col -->

        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo lang('signin') ?></button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close(); ?>


      <p class="mb-1">
        <a href="<?php echo url('login/forget?username='.post('username')) ?>"><?php echo lang('forget_password_?') ?></a><br>
      </p>
      <p class="mb-0">
        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<!-- /.login-box -->


<?php include 'includes/footer.php' ?>
