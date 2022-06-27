
<!DOCTYPE html>
<html lang="en">
  <head>

    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?> 
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/datatable/css/buttons.dataTables.min.css">
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
                      <h3 class="mr-auto p-3"><?php echo $page_title; ?> <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#create-new-vehicle-type-modal"> <i class="fa fa-plus-circle"></i> Add New</button> </h3>
                      <div class="btn-group" role="group">
                        <div id="buttons"></div>   
                      </div>
                    </div>
                  </div>
                  <div class="card-body">  
                    
                    <!-- Create New Vehicle Type Modal -->
                    <div class="modal fade" id="create-new-vehicle-type-modal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-md  ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Create New Vehicle Type</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form id="create-new-vehicle-type-form">
                            <div class="modal-body">  
                              <small class=" text-danger">Note: * is requered</small>
                              <fieldset> 
                                <div class="form-group">
                                  <label for="office">Office <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="office" name="office" placeholder="Office" required>
                                </div> 
                                <div class="form-group">
                                  <label for="vehicle-type">Vehicle Type <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="vehicle-type" name="vehicle_type" placeholder="Vehicle Type" required>
                                </div> 
                                <div class="form-group">
                                  <label for="plate-number">Plate Number <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="plate-number" name="plate_number" placeholder="Plate Number">
                                </div> 
                              </fieldset> 
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Save changes</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                        </div> 
                      </div>
                    </div> 

                    
                    <!-- Edit Vehicle Type Modal -->
                    <div class="modal fade" id="edit-vehicle-type-modal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-md  ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Vehicle Type</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form id="update-vehicle-type-modal">
                            <div class="modal-body">  
                              <small class=" text-danger">Note: * is requered</small>
                              <fieldset> 
                                <div class="form-group">
                                  <input type="hidden" name="id">
                                  <label for="office">Office <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="office" name="office" placeholder="Office" required>
                                </div> 
                                <div class="form-group">
                                  <label for="vehicle-type">Vehicle Type <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="vehicle-type" name="vehicle_type" placeholder="Vehicle Type" required>
                                </div> 
                                <div class="form-group">
                                  <label for="plate-number">Plate Number <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="plate-number" name="plate_number" placeholder="Plate Number">
                                </div> 
                              </fieldset> 
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Save changes</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                        </div> 
                      </div>
                    </div> 


                    <table id="vehicle-type-table" class="table table-striped " width="100%"> 
                      <thead> 
                        <tr>
                          <th>#</th>
                          <th>Office</th>
                           <th>Vehicle Type</th>
                          <th>Plate Number</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <!-- BEGIN BASE JS -->
    
	<?php $this->view('layout/js') ?> 
  <script src="<?php  echo base_url(); ?>assets/vendor/datatable/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/dataTables.buttons.min.js"> </script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/buttons.colVis.min.js"></script>
  <script src="<?php echo base_url() ?>assets/javascript/sweetalert.js"></script>
  <script src="<?php echo base_url() ?>assets/javascript/vehicle_type.js"></script>
    
  </body>
</html>