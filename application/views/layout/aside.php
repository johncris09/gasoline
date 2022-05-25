
      <aside class="app-aside app-aside-expand-md app-aside-light">
        <!-- .aside-content -->
        <div class="aside-content">
          <!-- .aside-header -->
          <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="<?php echo base_url(); ?>/assets/images/avatars/profile.jpg" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span class="account-name"><?php echo $_SESSION['name']; ?></span></span></button> <!-- /.btn-account -->
            <!-- .dropdown-aside -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
              <!-- dropdown-items -->
              <div class="pb-3">
                <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                </div><!-- /dropdown-items -->
            </div><!-- /.dropdown-aside -->
          </header><!-- /.aside-header -->
          <!-- .aside-menu -->
          <div class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu">
              <!-- .menu -->
              <ul class="menu">
                <!-- .menu-item -->
                <li class="menu-item">
                  <a href="<?php echo base_url() ?>dashboard" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
                </li> 
                <li class="menu-item">
                  <a href="<?php echo base_url() ?>request" class="menu-link"><span class="menu-icon fa fa-question-circle"></span> <span class="menu-text">Request</span></a>
                </li> 
                <li class="menu-item">
                  <a href="<?php echo base_url() ?>pending" class="menu-link"><span class="menu-icon fa fa-exclamation-circle"></span> <span class="menu-text">Pending</span></a>
                </li> 
                <li class="menu-item">
                  <a href="<?php echo base_url() ?>request" class="menu-link"><span class="menu-icon fa fa-check-circle"></span> <span class="menu-text">Apporved</span></a>
                </li> 
                <li class="menu-header">Data</li>
                <li class="menu-item">
                  <a href="<?php echo base_url() ?>driver" class="menu-link"><span class="menu-icon fa fa-motorcycle"></span> <span class="menu-text">Driver</span></a>
                </li> 
                <li class="menu-item">
                  <a href="<?php echo base_url() ?>vehicle_type" class="menu-link"><span class="menu-icon fa fa-truck"></span> <span class="menu-text">Type of Vehicle</span></a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo base_url() ?>user" class="menu-link"><span class="menu-icon fa fa-user"></span> <span class="menu-text">User</span></a>
                </li>
              </ul><!-- /.menu -->
            </nav><!-- /.stacked-menu -->
          </div><!-- /.aside-menu -->
          <!-- Skin changer -->
          <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
          </footer><!-- /Skin changer -->
        </div><!-- /.aside-content -->
      </aside><!-- /.app-aside -->