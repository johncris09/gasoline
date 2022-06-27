
<!DOCTYPE html>
<html lang="en">
  <head>

    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?> 
    <!-- <link  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link  href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/datatable/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
            
      #vehicle-type-table tbody{
          cursor: pointer;
      }

      #driver-table tbody{
          cursor: pointer; 
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
                <!-- .card -->
                <div class="card card-fluid"> 
                  <!-- <div class="card-header"> </div> -->
                   
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h3 class="mr-auto p-3"><?php echo $page_title; ?> <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#create-request-modal"> <i class="fa fa-plus-circle"></i> Add New</button> </h3>
                      <div class="btn-group" role="group">
                        <div id="buttons"></div>   
                      </div>
                    </div>
                  </div>
                  <div class="card-body">  
                    <form   class="mb-4">
                      <div class="form-group row justify-content-center">
                        <div class="col-6 col-sm-6  col-md-6  col-lg-6 col-xl-6">
                          <label><strong>Request Date</strong></label>
                          <div class="input-daterange input-group" id="date-range">
                            <input type="text" class="form-control datatable-input"
                              name="date-range-start" autocomplete="off" placeholder="From" required=""  />
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="la la-ellipsis-h"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control datatable-input"
                              name="date-range-end" autocomplete="off"  placeholder="To"  required=""  /> 
                          </div>
                        </div> 
                      </div>
                      
                      <div class="form-group row">
												<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
													<label>Driver </label>
													<select required="" class="form-control datatable-input" data-col-index="3">
														<option value="">Select</option>
													</select>
												</div>
												<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
													<label>Plate # </label>
													<select required="" class="form-control datatable-input" data-col-index="2">
														<option value="">Select</option>
													</select>
												</div>
												<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
													<label>Status </label>
													<select required="" class="form-control datatable-input" data-col-index="6">
														<option value="">Select</option>
													</select>
												</div>  
											</div>
                      <div class="form-group row justify-content-center"> 
                          <button class="btn btn-primary btn-primary--icon" id="kt_search">
                            <span>
                              <i class="la la-search"></i>
                              <span>Search</span>
                            </span>
                          </button>&#160;&#160; 
                          <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                            <span>
                              <i class="la la-close"></i>
                              <span>Reset</span>
                            </span>
                          </button> 
                      </div> 
                    </form> 

                    <hr>
                    <table id="request-table" class="table table-striped " width="100%"> 
                      <thead> 
                        <tr>
                          <th>#</th>
                          <th>Request Date</th> 
                          <th>Plate #</th> 
                          <th>Driver</th> 
                           <th>Gasoline Type</th>
                           <th>Liter</th> 
                           <th>Status</th> 
                           <th>Action</th> 
                        </tr>
                      </thead>
                    </table>

                    <!-- Create Request Modal -->
                    <div class="modal fade" id="create-request-modal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                      <div class="modal-dialog modal-dialog-centered modal-lg  ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Create New Request</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form  id="create-new-request-form">
                            <div class="modal-body">  
                              <small class=" text-danger">Note: * is requered</small>
                              <fieldset> 
                                <div class="form-group">
                                  <label for="request-date">Request Date <span class="text-danger">*</span></label> 
                                  <input type="date" class="form-control" id="request-date" name="request_date"  required  placeholder="Request Date">
                                </div>
                                <div class="form-group">
                                  <label for="plate-number">Plate Number <span class="text-danger">*</span> </label> 
                                  <div class="input-group input-group-alt">
                                    <div class="input-group">
                                      <input type="hidden" name="plate_number">
                                      <input type="text" class="form-control readonly" name="plate-number" placeholder="Plate Number" autocomplete="off" required>
                                      <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#vehicle-type-modal" > <i class="oi oi-magnifying-glass"></i> Search Plate Number</button>
                                    </div> 
                                  </div> 
                                </div>
                                <div class="form-group">
                                  <label for="driver">Driver's Name <span class="text-danger">*</span></label> 
                                  <div class="input-group input-group-alt">
                                    <div class="input-group"> 
                                      <input type="hidden" name="driver">  
                                      <input type="text" class="form-control readonly" name="driver-name" placeholder="Driver's Name" autocomplete="off" required>
                                      <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#driver-modal"  > <i class="oi oi-magnifying-glass"></i> Search Driver's Name</button>
                                    </div> 
                                  </div> 
                                </div>
                                <div class="form-group"> 
                                  <label for="">Gasoline Type <span class="text-danger">*</span></label> 
                                  <select class="custom-select d-block w-100" name="gasoline_type" required="">
                                    <option value=""> Choose... </option> 
                                    <?php 
                                      foreach($this->config->item('gasoline_type') as $row){
                                        echo '
                                          <option value="'.$row.'">'.$row.'</option>
                                        '; 
                                      }
                                    ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="liter">Liter <span class="text-danger">*</span></label> 
                                  <input type="number" step="0.01" class="form-control" id="liter" name="liter"  placeholder="Liter">
                                </div>
                                <h4 class="card-title"> File Type </h4>
                                <div class="form-group">
                                  <div class="custom-control custom-radio">
                                    <input id="trip-ticket" name="file_type" type="radio"  value="trip_ticket" class="custom-control-input"   required=""> 
                                    <label class="custom-control-label" for="trip-ticket">Driver's Trip Ticket</label>
                                  </div>
                                  <div class="custom-control custom-radio">
                                    <input id="log-sheet" name="file_type" type="radio" value="log_sheet"  class="custom-control-input" required=""> 
                                    <label class="custom-control-label" for="log-sheet">Equipment Log Sheet</label>
                                  </div> 
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

                    
                    <!-- Edit Request Modal -->
                    <div class="modal fade" id="edit-request-modal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg  ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Request</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form  id="update-request-form">
                            <div class="modal-body">  
                              <small class=" text-danger">Note: * is requered</small>
                              <fieldset> 
                                <div class="form-group">
                                  <input type="hidden" name="request_id">
                                  <label for="request-date">Request Date <span class="text-danger">*</span></label> 
                                  <input type="date" class="form-control" id="request-date" name="request_date"  required  placeholder="Request Date">
                                </div>
                                <div class="form-group">
                                  <label for="plate-number">Plate Number <span class="text-danger">*</span> </label> 
                                  <div class="input-group input-group-alt">
                                    <div class="input-group">
                                      <input type="hidden" name="plate_number">
                                      <input type="text" class="form-control readonly" name="plate-number" placeholder="Plate Number" autocomplete="off" required>
                                      <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#vehicle-type-modal" > <i class="oi oi-magnifying-glass"></i> Search Plate Number</button>
                                    </div> 
                                  </div> 
                                </div>
                                <div class="form-group">
                                  <label for="driver">Driver's Name <span class="text-danger">*</span></label> 
                                  <div class="input-group input-group-alt">
                                    <div class="input-group"> 
                                      <input type="hidden" name="driver">  
                                      <input type="text" class="form-control readonly" name="driver-name" placeholder="Driver's Name" autocomplete="off" required>
                                      <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#driver-modal"  > <i class="oi oi-magnifying-glass"></i> Search Driver's Name</button>
                                    </div> 
                                  </div> 
                                </div>
                                <div class="form-group"> 
                                  <label for="">Gasoline Type <span class="text-danger">*</span></label> 
                                  <select class="custom-select d-block w-100" name="gasoline_type" required="">
                                    <option value=""> Choose... </option> 
                                    <?php 
                                      foreach($this->config->item('gasoline_type') as $row){
                                        echo '
                                          <option value="'.$row.'">'.$row.'</option>
                                        '; 
                                      }
                                    ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="liter" name="liter">Liter <span class="text-danger">*</span></label> 
                                  <input type="number" class="form-control" id="liter" name="liter"  placeholder="Liter">
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



                    <!-- Vehicle Type Modal -->
                    <div class="modal fade" id="vehicle-type-modal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg  ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Vehicle Type <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#create-new-vehicle-type-modal"> <i class="fa fa-plus-circle"></i> Add New</button></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div> 
                          <div class="modal-body">
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



                    
                    <!-- Driver Modal -->
                    <div class="modal fade" id="driver-modal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                      <div class="modal-dialog modal-dialog-centered modal-lg  ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Driver  <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#create-new-driver-modal"> <i class="fa fa-plus-circle"></i> Add New</button></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div> 
                          <div class="modal-body">
                            <table id="driver-table" class="table table-striped " width="100%"> 
                              <thead> 
                                <tr>
                                  <th>#</th>
                                  <th>Last Name</th> 
                                  <th>First Name</th>
                                  <th>Middle Name</th>
                                  <th>Suffix</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                            </table>
                          </div>
                        </div> 
                      </div>
                    </div>

                    
                    <!-- Create New User Modal -->
                    <div class="modal fade" id="create-new-driver-modal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable ">
                      modal-dialog 
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Create New Driver</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form id="create-new-driver-form">
                            <div class="modal-body">  
                              <small class=" text-danger">Note: * is requered</small>
                              <fieldset> 
                                <div class="form-group">
                                  <label for="lastname">Last Name <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                  <label for="firstname">First Name <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                  <label for="middlename">Middle Name </label> 
                                  <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name" >
                                </div>
                                <div class="form-group">
                                  <label for="suffix">Suffix </label> 
                                  <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Suffix" >
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

                    
                    <!-- Edit Driver Modal -->
                    <div class="modal fade" id="edit-driver-modal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-md  ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Driver</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form id="update-driver-form">
                            <div class="modal-body">  
                              <small class=" text-danger">Note: * is requered</small>
                              <fieldset> 
                                <div class="form-group">
                                  <input type="hidden" name="id">
                                  <label for="lastname">Last Name <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                  <label for="firstname">First Name <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                  <label for="middlename">Middle Name </label> 
                                  <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name" >
                                </div>
                                <div class="form-group">
                                  <label for="suffix">Suffix </label> 
                                  <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Suffix" >
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

                    

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    
    
	<?php $this->view('layout/js') ?> 
  <script src="<?php  echo base_url(); ?>assets/vendor/datatable/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/dataTables.buttons.min.js"> </script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/buttons.colVis.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url() ?>assets/javascript/sweetalert.js"></script>
  <script src="<?php echo base_url() ?>assets/javascript/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url() ?>assets/javascript/user/request.js"></script>
  
    
  </body>
</html>