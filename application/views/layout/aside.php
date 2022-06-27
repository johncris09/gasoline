
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
                <a class="dropdown-item" href="<?php echo base_url() ?>profile"><span class="dropdown-icon oi oi-person"></span> Profile</a> 
                <a class="dropdown-item" href="<?php echo base_url() ?>dashboard/signout"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                </div><!-- /dropdown-items -->
            </div><!-- /.dropdown-aside -->
          </header><!-- /.aside-header --> 

          <div class="aside-menu overflow-hidden"> 
            <nav id="stacked-menu" class="stacked-menu"> 
              <?php 
                if($_SESSION['role_type'] == 1){ 
              ?>
                  <ul class="menu"> 
                    <li class="menu-item">
                      <a href="<?php echo base_url() ?>dashboard" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
                    </li> 
                    <li class="menu-item">
                      <a href="<?php echo base_url() ?>request" class="menu-link"><span class="menu-icon fa fa-question-circle"></span> <span class="menu-text">Request</span></a>
                    </li> 
                    <li class="menu-item">
                      <a href="<?php echo base_url() ?>trip_ticket" class="menu-link"><span class="menu-icon fa fa-gas-pump"></span> <span class="menu-text">Trip Ticket</span></a>
                    </li> 
                    <li class="menu-item">
                      <a href="<?php echo base_url() ?>log_sheet" class="menu-link"><span class="menu-icon fa fa-gas-pump"></span> <span class="menu-text">Equipment Log Sheet</span></a>
                    </li> 
                    <li class="menu-item">
                      <a href="<?php echo base_url() ?>report" class="menu-link"><span class="menu-icon fa fa-chart-pie"></span> <span class="menu-text">Report</span></a>
                    </li> 
                    <li class="menu-item">
                      <a href="<?php echo base_url() ?>summary" class="menu-link"><span class="menu-icon fa fa-list-alt"></span> <span class="menu-text">Summary</span></a>
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
                  </ul> 


              <?php
                }else{
              ?>
                  <ul class="menu"> 
                    <li class="menu-item">
                      <a href="<?php echo base_url() ?>dashboard" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
                    </li>
                    <li class="menu-item">
                      <a href="<?php echo base_url() ?>request" class="menu-link"><span class="menu-icon fa fa-question-circle"></span> <span class="menu-text">Request</span></a>
                    </li> 
                    <li class="menu-item">
                      <a href="<?php echo base_url() ?>trip_ticket" class="menu-link"><span class="menu-icon fa fa-gas-pump"></span> <span class="menu-text">Trip Ticket</span></a>
                    </li> 
                    <li class="menu-item">
                      <a href="<?php echo base_url() ?>log_sheet" class="menu-link"><span class="menu-icon fa fa-gas-pump"></span> <span class="menu-text">Equipment Log Sheet</span></a>
                    </li> 
                  </ul> 
              <?php
                }
              ?>
              
            </nav>
          </div>

          <!-- Skin changer -->
          <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
          </footer><!-- /Skin changer -->
        </div><!-- /.aside-content -->
      </aside><!-- /.app-aside -->