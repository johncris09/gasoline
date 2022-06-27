
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  </head>
  <body>
    <!-- .app -->
    <div class="app">
      <!--[if lt IE 10]>
      <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
      <![endif]-->
	  <?php $this->view('layout/header') ?> 
	  <?php $this->view('layout/aside') ?> 
      
    <main class="app-main">
        <div class="wrapper">
          <div class="page">
            <div class="page-inner">
              <header class="page-title-bar">
                <h1 class="page-title"> <?php echo $page_title; ?> </h1>
              </header>
              
              <div class="page-section">  
                <div class="card card-fluid">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h3 class="mr-auto p-3"><?php echo $page_title; ?> </h3> 
                    </div>
                  </div>
                  <div class="card-body">   
                  <form method="get" action="<?php echo base_url() ?>summary/view"  class="mb-4">
                      <div class="form-group row justify-content-center">
                        <div class="col-6 col-sm-6  col-md-6  col-lg-6 col-xl-6">
                          <label><strong>Date Range</strong></label>
                          <div class="input-daterange input-group" id="date-range">
                            <input type="text" class="form-control datatable-input"
                              name="from" autocomplete="off" placeholder="From" required=""  />
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="la la-ellipsis-h"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control datatable-input"
                              name="to" autocomplete="off"  placeholder="To"  required=""  /> 
                          </div>
                        </div> 
                      </div>  
                      <div class="form-group row justify-content-center"> 
                          <button class="btn btn-primary btn-primary--icon" id="kt_search">
                            <span>
                              <i class="la la-search"></i>
                              <span>Create Summary</span>
                            </span>
                          </button> 
                      </div> 
                    </form>
                    <hr> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    
	<?php $this->view('layout/js') ?>  
  <script src="https://uselooper.com/assets/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery.print/jQuery.print.min.js"></script>
  <script src="<?php echo base_url() ?>assets/javascript/bootstrap-datepicker.min.js"></script> 
  <script src="<?php echo base_url() ?>assets/javascript/report.js"></script>

  <script> 
      $(document).ready(function() {
             
        $('#date-range').datepicker({
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>',
            },
            dateFormat: 'yyyy/mm/dd',
        });  
        
      }); 
    </script>
  </body>
</html>