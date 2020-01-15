<header id="front">
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content modal-popup">
        <!-- <a href="#" class="close-link"><i class="icon_close_alt2"></i></a> -->
        <div class="text-center"><img class="site-logo img-fluid" src="<?php echo base_url(); ?>/assets/images/peso-logo.png"></div>        
        <div class="da-contact-message">
          <form id="login_form" role="form">  
            <div class="modal-body">
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="login_email" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" id="login_password" placeholder="Password">
              </div>
            </div>
            <div class="modal-footer">
              <div class="container">
                 <button class="btn btn-primary block" id="login_submit" type="submit">Login</button>
               
                <a class="btn btn-danger block" id="" href="<?php echo site_url(); ?>/FrontPage/Forgot">Forgot Password</a>

                <a class="btn btn-warning block" id="" href="<?php echo site_url(); ?>/FrontPage/Changepass">Change Password</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="container pt-4">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent px-0"><a class="text-white navbar-brand" href="<?php echo site_url(); ?>"><img class="site-logo" src="<?php echo base_url(); ?>/assets/images/legazpilogo.png"><img class="site-logo" src="<?php echo base_url(); ?>/assets/images/peso-logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#da-navbarNav" aria-controls="da-navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse text-uppercase" id="da-navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link smooth-scroll" href="<?php echo site_url(); ?>">Home</a></li>
          <li class="nav-item"><a class="nav-link smooth-scroll" href="<?php echo site_url(); ?>/FrontPage/JobSearch">Jobs</a></li>
          <li class="nav-item"><a class="nav-link smooth-scroll" href="<?php echo site_url(); ?>/FrontPage/About">About</a></li>
          <?php if ($this->session->userdata('is_logged_in') == true && $this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 ): ?>
            <li class="nav-item"><a class="nav-link smooth-scroll" href="<?php echo site_url(); ?>/Dashboard">Dashboard</a></li>
          <?php endif ?>
          <?php if ($this->session->userdata('is_logged_in') == true && $this->session->userdata('role') == 3): ?>
            <li class="nav-item"><a class="nav-link smooth-scroll text-success " href="<?php echo site_url(); ?>/FrontPage/Dashboard">Dashboard</a></li>
          <?php endif ?>
          <?php if ($this->session->userdata('is_logged_in') == true && $this->session->userdata('role') == 4): ?>
            <li class="nav-item"><a class="nav-link smooth-scroll text-success " href="<?php echo site_url(); ?>/FrontPage/Recomended">Recomended Job</a></li>
            <li class="nav-item"><a class="nav-link smooth-scroll text-success " href="<?php echo site_url(); ?>/FrontPage/MyAccount">My Account</a></li>
          <?php endif ?>
          <?php if ($this->session->userdata('is_logged_in') == false ): ?>
            <li class="nav-item"><a class="nav-link smooth-scroll" href="<?php echo site_url(); ?>/FrontPage/SignUp">Sign up</a></li>
            <li class="nav-item"><a class="nav-link smooth-scroll" data-toggle="modal" href="#login">Login</a></li>
          <?php endif?>
          <?php if ($this->session->userdata('is_logged_in') == true ): ?>
            <li class="nav-item"><a class="nav-link smooth-scroll text-danger" data-toggle="modal" href="<?php echo site_url(); ?>/Authentication/logout">Logout</a></li>
          <?php endif?>
        </ul>
      </div>
    </nav>
  </div>
</header>