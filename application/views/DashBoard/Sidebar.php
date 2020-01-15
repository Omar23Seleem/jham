    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">
          <a href="<?php echo site_url(); ?>">
          <img class="site-logo img-fluid" src="<?php echo base_url();?>assets/images/peso-logo.png" alt="">
        </a>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url()?>/Dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <?php if ($this->session->userdata('role') == 1): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url()?>/Dashboard/Admin">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Admin Account</span></a>
          </li>
      <?php endif ?>
      <!-- Nav Item - Charts -->
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url()?>/Dashboard/JobFair">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Recruitment</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url()?>/Dashboard/PostedJob">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Job Post</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url()?>/Dashboard/AppAccount">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>Applicant Accounts</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url()?>/Dashboard/EmpAccount">
          <i class="fas fa-fw fa-user"></i>
          <span>Employer Accounts</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url()?>/Dashboard/PendingJobPost">
          <i class="fas fa-fw fa-edit"></i>
          <span>Pending Job Post</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAcc" aria-expanded="true" aria-controls="collapseAcc">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Pending Accounts</span></a>
        </a>
        <div id="collapseAcc" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pending Accounts:</h6>
            <a class="collapse-item" href="<?php echo site_url()?>/Dashboard/Approval">Applicant</a>
            <a class="collapse-item" href="<?php echo site_url()?>/Dashboard/ApprovalEmp">Employer</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDeny" aria-expanded="true" aria-controls="collapseDeny">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Denied</span></a>
        </a>
        <div id="collapseDeny" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Denied:</h6>
            <a class="collapse-item" href="<?php echo site_url()?>/Dashboard/DeniedAccount">Applicant</a>
            <a class="collapse-item" href="<?php echo site_url()?>/Dashboard/DeniedAccountEmp">Employer</a>
            <a class="collapse-item" href="<?php echo site_url()?>/Dashboard/DeniedJob">Job Post</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

