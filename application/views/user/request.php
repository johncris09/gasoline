
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/dataTables.select.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?php echo base_url() ?>assets/javascript/bootstrap-datepicker.min.js"></script>
  
  <script>
    
                                      
      var alert_class = "";
      var icon = "";
      $(document).ready(function() { 
            
        $(".readonly").on('keydown paste focus mousedown', function(e){
            if(e.keyCode != 9) // ignore tab
                e.preventDefault();
        });
            
        // tigger button
        $('input[name="plate-number"], input[name="driver-name"]').on('click', function(e){
          $(this).next('button').click()
        });

        

        var request_table = $('#request-table').DataTable({
          "scrollY": 450,
          "scrollX": true,
          deferRender: true,
          ajax: {
            url: '<?php echo base_url(); ?>request/get_all_request',
            type: 'POST',
          },
          columns: [{
            data: 'request_id',
              render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }
            },  
            { data: 'request_date' }, 
            { data: 'plate_number'  },
            { data: 'name' }, 
            { data: 'gasoline_type' },  
            { data: 'liter' }, 
            { data: 'status'}, 
            {
              data: 'request_id',
              render: function(data, type, row, meta) { 
                var button = '\
                 <div class="dropdown d-inline-block">\
                    <button class="btn btn-icon btn-secondary" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>\
                    <div class="dropdown-menu dropdown-menu-right">\
                      <div class="dropdown-arrow"></div>\
                      <button type="button" class="dropdown-item" data-request-id="'+row.request_id+'" id="edit-request-btn"  ><i class="fa fa-pencil-alt"></i> Edit</button>\
                      <button type="button" class="dropdown-item" data-status="'+row.status+'" data-request-id="'+row.request_id+'" id="delete-request-btn"><i class="fa fa-trash-alt"></i> Delete</button>';

                if( row.status.toLowerCase() == "pending" ){ 
                  
                  if( row.file_type.toLowerCase() == "log_sheet" ){
                    button += '<div class="dropdown-divider"></div>\
                        <a href="<?php echo base_url() ?>log_sheet/add/'+data+'" class="dropdown-item"><i class="fa fa-arrow-circle-right"></i> To Equipment Log Sheet</a>\
                      </div>\
                    </div>'
                  }else{
                    button += '<div class="dropdown-divider"></div>\
                        <a href="<?php echo base_url() ?>trip_ticket/add/'+data+'" class="dropdown-item"><i class="fa fa-arrow-circle-right"></i> To Trip Ticket</a>\
                      </div>\
                    </div>'
                  }


                }
                else{

                  
                  if( row.file_type.toLowerCase() == "log_sheet" ){
                    button += '<div class="dropdown-divider"></div>\
                        <a href="<?php echo base_url() ?>log_sheet/view/'+data+'" class="dropdown-item"><i class="fa fa-arrow-circle-right"></i> To Equipment Log Sheet</a>\
                      </div>\
                    </div>'
                  }else{
                    button += '<div class="dropdown-divider"></div>\
                        <a href="<?php echo base_url() ?>trip_ticket/view/'+data+'" class="dropdown-item"><i class="fa fa-arrow-circle-right"></i> To Trip Ticket</a>\
                      </div>\
                    </div>'
                  }

                  
                }
                
                return button;
              }
            }, 

          ],
          columnDefs: [{
            targets: 6,
            render: function ( data, type, row ) { 

              var status = "";
              if(data.toLowerCase() == "pending" ){
                icon = "exclamation-circle"
                alert_class = "danger"
              }else if( data.toLowerCase() == "approved"  ){
                icon = "check"
                alert_class = "primary"
              }
 
              return '<span class="badge badge-'+alert_class+'"><i class="fa fa-'+icon+'"></i> '+data+'</span></h1>'
              

            }
          }],
          initComplete: function() {
            var counter = 0;
            this.api().columns().every(function() {
              var column = this; 
              switch ( column.header().textContent ) {
                case 'Driver':
                  column.data().unique().sort().each(function(d, j) {
                      $('.datatable-input[data-col-index="'+counter+'"]').append('<option value="' + d + '">' + d + '</option>');
                  });
                  break;
                case 'Plate #':
                  column.data().unique().sort().each(function(d, j) {
                      $('.datatable-input[data-col-index="'+counter+'"]').append('<option value="' + d + '">' + d + '</option>');
                  });
                  break;
                case 'Status':
                  column.data().unique().sort().each(function(d, j) {
                      $('.datatable-input[data-col-index="'+counter+'"]').append('<option value="' + d + '">' + d + '</option>');
                  });
                  break; 
              }
              counter++
            });
          },
        });
        var buttons = new $.fn.dataTable.Buttons(request_table, {
          buttons: [{
            extend: 'excel',
            text: '<i class="fas fa-file-excel"></i>',
          }, {
            extend: 'print',
            text: '<i class="fas fa-print"></i>',
            autoPrint: false,
          }, {
            extend: 'colvis',
            collectionLayout: 'fixed columns',
            collectionTitle: 'Column visibility control'
          }],
        }).container().appendTo($('#buttons'));
        $('.dt-button').removeClass("dt-button");
        $('.dt-buttons>   button').addClass("btn btn-primary");



            
        
        $.fn.dataTable.ext.search.push(
          function (settings, data, dataIndex) {
            var min       = $('input[name="date-range-start"]').datepicker('getDate');
            var max       = $('input[name="date-range-end"]').datepicker('getDate');
            var startDate = new Date(data[1]);
            // console.info(startDate);
            if (min == null && max == null) return true;
            if (min == null && startDate <= max) return true;
            if (max == null && startDate >= min) return true;
            if (startDate <= max && startDate >= min) return true;
            return false;
          }
        );

        $('input[name="date-range-start"]').datepicker({ onSelect: function () { request_table.draw(); }, changeMonth: true, changeYear: true });
        $('input[name="date-range-end"]').datepicker({ onSelect: function () { request_table.draw(); }, changeMonth: true, changeYear: true });


        $('#date-range').datepicker({
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>',
            },
            dateFormat: 'yyyy/mm/dd',
        });

        


        
        $('#kt_search').on('click', function(e) {
          e.preventDefault();
          var params = {};
          $('.datatable-input').each(function() {
              var i = $(this).data('col-index');
              
              if (params[i]) {
                  params[i] += '|' + $(this).val();
              }
              else {
                  params[i] = $(this).val();
              }
              
          }); 

          $.each(params, function(i, val) { 
            // apply search params to datatable
            request_table.column(i).search(val ? val : '', true, true);
          });
          request_table.table().draw();
        }); 

        $('#kt_reset').on('click', function(e) {
            e.preventDefault(); 

            $('.datatable-input').each(function() {
                $(this).val('');  
                request_table.column($(this).data('col-index')).search('', false, false);
            }); 
  
            request_table.table().draw(); 
        });

        // Search by Date Range
        $('input[name="date-range-start"], input[name="date-range-end"]').change(function () {
            request_table.draw();
        });
        

        
        var vehicle_type_table = $('#vehicle-type-table').DataTable({
          "scrollY": 350,
          "scrollX": true,
          deferRender: true,
          ajax: {
            url: '<?php echo base_url(); ?>vehicle_type/get_all_vehicle_type',
            type: 'POST',
          },
          columns: [{
            data: 'id',
              render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }
            }, 
            { data: 'office'  }, 
            { data: 'vehicle_type' }, 
            { data: 'plate_number' }, 
            {
              data: 'id',
              render: function(data, type, row, meta) {
                return '\
                 <div class="dropdown d-inline-block">\
                    <button class="btn btn-icon btn-secondary" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>\
                    <div class="dropdown-menu dropdown-menu-right">\
                      <div class="dropdown-arrow"></div>\
                        <button type="button" class="dropdown-item" data-vehicle-type-id="'+row.id+'" id="edit-vehicle-type-btn"  ><i class="fa fa-pencil-alt"></i> Edit</button>\
                        <button type="button" class="dropdown-item"  data-vehicle-type-id="'+row.id+'" id="delete-vehicle-type-btn"><i class="fa fa-trash-alt"></i> Delete</button>\
                      </div>\
                  </div>\
                '
              }
            },
          ],  
          select: true,
        });
 
        $('#vehicle-type-table tbody').on( 'click', 'tr td:not(:last-child)', function () {
            $(this).toggleClass('selected');
            var pos = vehicle_type_table.row(this).index();
            var row = vehicle_type_table.row(pos).data();
            
            $('input[name="plate_number"]').val(row.id)
            $('input[name="plate-number"]').val( row.vehicle_type + " (" + row.plate_number + ")" )
            
            $('#vehicle-type-modal').modal('toggle'); 
            $('#create-request-modal').css('overflow-y', 'auto');

        } );


        
        $('#create-new-vehicle-type-form').on('submit', function(e){
          e.preventDefault();

          $.ajax({
            url: "<?php echo base_url() ?>vehicle_type/insert",
            method: "POST",
            data: $("#create-new-vehicle-type-form").serialize(),
            dataType: "json",
            success: function (data) {

              if(!data.response){ 
                  Swal.fire({
                      title: data.message,
                      icon: "error",
                      showCancelButton: true, 
                  })
              }else{ 
                  Swal.fire({
                      title: data.message,
                      icon: "success",
                      showCancelButton: true, 
                  }).then(function(result) {
                      $("#create-new-vehicle-type-form")[0].reset()
                      $('input[name="office"]').focus()

                      vehicle_type_table.ajax.reload();
                      
                  });
              }  
            },
            error: function (xhr, status, error) {
                console.info(xhr.responseText);
            }
          });
        })

        
        $(document).on('click','#edit-vehicle-type-btn', function(){ 
          
          // show modal
          $('#edit-vehicle-type-modal').modal('show')

          var vehicle_type_id = $(this).data('vehicle-type-id')

          $.ajax({
            url: "<?php echo base_url() ?>vehicle_type/get_vehicle_type/" + vehicle_type_id,
            method: "POST",
            dataType: "json",
            success: function (data) { 
              console.info(data)

              $('#edit-vehicle-type-modal input[name="id"]').val(data.id) 
              $('#edit-vehicle-type-modal input[name="office"]').val(data.office) 
              $('#edit-vehicle-type-modal input[name="vehicle_type"]').val(data.vehicle_type) 
              $('#edit-vehicle-type-modal input[name="plate_number"]').val(data.plate_number) 
               
            },
            error: function (xhr, status, error) {
                console.info(xhr.responseText);
            }
          });
        })

        
        
        $('#update-vehicle-type-modal').on('submit', function(e){
          e.preventDefault();

          
          var vehicle_type_id = $('input[name="id"]').val(); 

          $.ajax({
            url: "<?php echo base_url() ?>vehicle_type/update/" + vehicle_type_id,
            method: "POST",
            data: $("#update-vehicle-type-modal").serialize(),
            dataType: "json",
            success: function (data) {  
              if(!data.response){ 
                  Swal.fire({
                      title: data.message,
                      icon: "error",
                      showCancelButton: true, 
                  })
              }else{ 
                  Swal.fire({
                      title: data.message,
                      icon: "success",
                      showCancelButton: true, 
                  }).then(function(result) {
                      vehicle_type_table.ajax.reload();  

                      $('#edit-vehicle-type-modal').modal('toggle');  
                      $('#create-request-modal').css('overflow-y', 'auto');
                  });
              }  
            },
            error: function (xhr, status, error) {
                console.info(xhr.responseText);
            }
          });
        })
        

        // Delete vehicle Type
        $(document).on('click','#delete-vehicle-type-btn', function(e){
          e.preventDefault();
          var vehicle_type_id = $(this).data('vehicle-type-id')
 
          Swal.fire({
              title: "Are you sure?",
              text: "You won\"t be able to revert this!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonText: "Yes, delete it!"
          }).then(function(result) {
              if (result.value) { 
                $.ajax({
                  url: "<?php echo base_url() ?>vehicle_type/delete/" + vehicle_type_id,
                  method: "post",
                  dataType: "json",
                  success: function (data) {  
                    if(!data.response){ 
                      Swal.fire({
                        title: data.message,
                        icon: "error",
                        showCancelButton: true, 
                      })
                    }else{ 
                      Swal.fire({
                        title: 'Deleted!',
                        text: "Your file has been deleted.",
                        icon: "success",
                        showCancelButton: true, 
                        confirmButtonText: "Ok"
                      })
                      vehicle_type_table.ajax.reload()
                    }  
                  },
                  error: function (xhr, status, error) { 
                      console.info(xhr.responseText);
                  }
              });

                  
              }
          }); 
        })






        var driver_table = $('#driver-table').DataTable({
          "scrollY": 350,
          "scrollX": true,
          deferRender: true,
          ajax: {
            url: '<?php echo base_url(); ?>driver/get_all_driver', 
            type: 'POST',
          },
          columns: [{
            data: 'id',
              render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }
            }, 
            { data: 'lastname'  }, 
            { data: 'firstname' }, 
            { data: 'middlename' }, 
            { data: 'suffix' },  
            {
              data: 'id',
              render: function(data, type, row, meta) {
                return '\
                 <div class="dropdown d-inline-block">\
                    <button class="btn btn-icon btn-secondary" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>\
                    <div class="dropdown-menu dropdown-menu-right">\
                      <div class="dropdown-arrow"></div>\
                        <button type="button" class="dropdown-item" data-driver-id="'+row.id+'" id="edit-driver-btn"  ><i class="fa fa-pencil-alt"></i> Edit</button>\
                        <button type="button" class="dropdown-item" data-driver-id="'+row.id+'" id="delete-driver-btn"><i class="fa fa-trash-alt"></i> Delete</button>\
                      </div>\
                  </div>\
                '
              }
            },  
          ],
          select: true,
        });

        
        $('#driver-table tbody').on( 'click', 'tr td:not(:last-child)', function () {
            $(this).toggleClass('selected');
            var driver = driver_table.row(this).index();
            var row = driver_table.row(driver).data();

            console.info(row)
            
            $('input[name="driver"]').val(row.id)
            $('input[name="driver-name"]').val( (row.lastname + ", " + row.firstname + " " + row.middlename + " " +  row.suffix).toUpperCase() )
            
            $('#driver-modal').modal('toggle');
            
            $('#create-request-modal').css('overflow-y', 'auto');

        } );

        
        $('#create-new-driver-form').on('submit', function(e){
          e.preventDefault();

          $.ajax({
            url: "<?php echo base_url() ?>driver/insert",
            method: "POST",
            data: $("#create-new-driver-form").serialize(),
            dataType: "json",
            success: function (data) {

              if(!data.response){ 
                  Swal.fire({
                      title: data.message,
                      icon: "error",
                      showCancelButton: true, 
                  })
              }else{ 
                  Swal.fire({
                      title: data.message,
                      icon: "success",
                      showCancelButton: true, 
                  }).then(function(result) {
                      $("#create-new-driver-form")[0].reset()
                      $('input[name="lastname"]').focus()

                      driver_table.ajax.reload();
                      
                  });
              }  
            },
            error: function (xhr, status, error) {
                console.info(xhr.responseText);
            }
          });
        })

        $(document).on('click','#edit-driver-btn', function(){ 
          
          // show modal
          $('#edit-driver-modal').modal('show')

          var driver_id = $(this).data('driver-id')

          $.ajax({
            url: "<?php echo base_url() ?>driver/get_driver/" + driver_id,
            method: "POST",
            dataType: "json",
            success: function (data) { 
              console.info(data)

              $('#edit-driver-modal input[name="id"]').val(data.id) 
              $('#edit-driver-modal input[name="lastname"]').val(data.lastname) 
              $('#edit-driver-modal input[name="firstname"]').val(data.firstname) 
              $('#edit-driver-modal input[name="middlename"]').val(data.middlename) 
              $('#edit-driver-modal input[name="suffix"]').val(data.suffix) 
            },
            error: function (xhr, status, error) {
                console.info(xhr.responseText);
            }
          });
        })

        $('#update-driver-form').on('submit', function(e){
          e.preventDefault();

          
          var driver_id = $('input[name="id"]').val(); 

          $.ajax({
            url: "<?php echo base_url() ?>driver/update/" + driver_id,
            method: "POST",
            data: $("#update-driver-form").serialize(),
            dataType: "json",
            success: function (data) {  
              if(!data.response){ 
                  Swal.fire({
                      title: data.message,
                      icon: "error",
                      showCancelButton: true, 
                  })
              }else{ 
                  Swal.fire({
                      title: data.message,
                      icon: "success",
                      showCancelButton: true, 
                  }).then(function(result) {
                      driver_table.ajax.reload(); 
            
                      $('#edit-driver-modal').modal('toggle');
                      $('#create-request-modal').css('overflow-y', 'auto');
                  });
              }  
            },
            error: function (xhr, status, error) {
                console.info(xhr.responseText);
            }
          });
        })
        

        // Delete Driver
        $(document).on('click','#delete-driver-btn', function(e){
          e.preventDefault();
          var driver_id = $(this).data('driver-id')
 
          Swal.fire({
              title: "Are you sure?",
              text: "You won\"t be able to revert this!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonText: "Yes, delete it!"
          }).then(function(result) {
              if (result.value) { 
                $.ajax({
                  url: "<?php echo base_url() ?>driver/delete/" + driver_id,
                  method: "post",
                  dataType: "json",
                  success: function (data) {  
                    if(!data.response){ 
                      Swal.fire({
                        title: data.message,
                        icon: "error",
                        showCancelButton: true, 
                      })
                    }else{ 
                      Swal.fire({
                        title: 'Deleted!',
                        text: "Your file has been deleted.",
                        icon: "success",
                        showCancelButton: true, 
                        confirmButtonText: "Ok"
                      })
                      driver_table.ajax.reload()
                    }  
                  },
                  error: function (xhr, status, error) { 
                      console.info(xhr.responseText);
                  }
              });

                  
              }
          }); 
        })


        
        

        $('#create-new-request-form').on('submit', function(e){
          e.preventDefault();

          $.ajax({
            url: "<?php echo base_url() ?>request/insert",
            method: "POST",
            data: $("#create-new-request-form").serialize(),
            dataType: "json",
            success: function (data) { 
              
                if(!data.response){ 
                    Swal.fire({
                        title: data.message,
                        icon: "error",
                        showCancelButton: true, 
                    })
                }else{ 
                    Swal.fire({
                        title: data.message,
                        icon: "success",
                        showCancelButton: true, 
                    }).then(function(result) {
                        $("#create-new-request-form")[0].reset()
                        $('input[name="request_date"]').focus()

                        request_table.ajax.reload();
                        
                    });
                }  
            },
            error: function (xhr, status, error) {
                console.info(xhr.responseText);
            }
          });
        })

        
        $(document).on('click','#edit-request-btn', function(){ 
          console.info(1)
          
          // show modal
          $('#edit-request-modal').modal('show') 

          var request_id = $(this).data('request-id')


          $.ajax({
            url: "<?php echo base_url() ?>request/get_request/" + request_id,
            method: "POST",
            dataType: "json",
            success: function (data) {  

              $('input[name="request_id"]').val(data.id)
              $('input[name="request_date"]').val(data.request_date) 
              $('input[name="plate_number"]').val(data.plate_number)
              $('input[name="plate-number"]').val(data.vehicle)
              $('input[name="driver"]').val(data.driver)
              $('input[name="driver-name"]').val(data.driver_name)
              $('select[name="gasoline_type"]').val(data.gasoline_type)
              $('input[name="liter"]').val(data.liter) 
            },
            error: function (xhr, status, error) {
                console.info(xhr.responseText);
            }
          });
        })

        
        $('#update-request-form').on('submit', function(e){
          e.preventDefault();

          
          var request_id = $('input[name="request_id"]').val(); 

          $.ajax({
            url: "<?php echo base_url() ?>request/update/" + request_id,
            method: "POST",
            data: $("#update-request-form").serialize(),
            dataType: "json",
            success: function (data) {  
              if(!data.response){ 
                  Swal.fire({
                      title: data.message,
                      icon: "error",
                      showCancelButton: true, 
                  })
              }else{ 
                  Swal.fire({
                      title: data.message,
                      icon: "success",
                      showCancelButton: true, 
                  }).then(function(result) {
                      request_table.ajax.reload(); 
            
                      $('#edit-request-modal').modal('toggle');
                      $('#create-request-modal').css('overflow-y', 'auto');
                  });
              }  
            },
            error: function (xhr, status, error) {
                console.info(xhr.responseText);
            }
          });
        })


        
        // Delete Request
        $(document).on('click','#delete-request-btn', function(e){
          e.preventDefault();
          var request_id = $(this).data('request-id')
 
          Swal.fire({
              title: "Are you sure?",
              text: "You won\"t be able to revert this!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonText: "Yes, delete it!"
          }).then(function(result) {
              if (result.value) { 
                $.ajax({
                  url: "<?php echo base_url() ?>request/delete/" + request_id,
                  method: "post",
                  dataType: "json",
                  success: function (data) {  
                    if(!data.response){ 
                      Swal.fire({
                        title: data.message,
                        icon: "error",
                        showCancelButton: true, 
                      })
                    }else{ 
                      Swal.fire({
                        title: 'Deleted!',
                        text: "Your file has been deleted.",
                        icon: "success",
                        showCancelButton: true, 
                        confirmButtonText: "Ok"
                      })
                      request_table.ajax.reload()
                    }  
                  },
                  error: function (xhr, status, error) { 
                      console.info(xhr.responseText);
                  }
              });

                  
              }
          }); 
        })



        
      }); 
    </script>
  </body>
</html>