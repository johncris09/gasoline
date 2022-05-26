
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?> 
    <style>
      .table-figures {
        border-collapse: collapse;
      }

      /* And this to your table's `td` elements. */
      .table-figures td {
        padding: 0; 
        margin: 0;
      }

            
    </style>
  </head>
  <body>
    <!-- .app -->
    <div class="app">
      <!--[if lt IE 10]>
      <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
      <![endif]-->
	  <?php $this->view('layout/header') ?> 
	  <?php $this->view('layout/aside') ?> 
      
      <!-- .app-main -->
      <main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <!-- page title stuff goes here -->
                <h1 class="page-title"> <?php echo $page_title; ?> </h1>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <!-- grid row -->
                <div class="row">    
                  <div class="col-xl-3 col-lg-6">
                      <div class="card l-bg-cherry">
                          <div class="card-statistic-3 p-4">
                              <div class="card-icon card-icon-large"><i class="fa fa-exclamation-circle"></i></div>
                              <div class="mb-4">
                                  <h5 class="card-title mb-0">Pending</h5>
                              </div>
                              <div class="row align-items-center mb-2 d-flex">
                                  <div class="col-8">
                                      <h2 class="d-flex align-items-center mb-0">
                                          <?php echo $pending; ?>
                                      </h2>
                                  </div> 
                              </div> 
                          </div>
                      </div> 
                  </div>
                  <div class="col-xl-3 col-lg-6">
                      <div class="card l-bg-blue-dark">
                          <div class="card-statistic-3 p-4">
                              <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                              <div class="mb-4">
                                  <h5 class="card-title mb-0">Approved</h5>
                              </div>
                              <div class="row align-items-center mb-2 d-flex">
                                  <div class="col-8">
                                      <h2 class="d-flex align-items-center mb-0">
                                          <?php echo $approved; ?>
                                      </h2>
                                  </div> 
                              </div> 
                          </div>
                      </div>
                  </div>
                </div><!-- /grid row -->
              </div><!-- /.page-section -->
            </div><!-- /.page-inner -->
          </div><!-- /.page -->
        </div><!-- /.wrapper -->
      </main><!-- /.app-main -->
    </div><!-- /.app -->
    <!-- BEGIN BASE JS -->
    
	<?php $this->view('layout/js') ?>  
  <script src="https://uselooper.com/assets/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery.print/jQuery.print.min.js"></script> 
  </body>
</html>