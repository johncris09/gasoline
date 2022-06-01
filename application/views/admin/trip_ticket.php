
<!DOCTYPE html>
<html lang="en">
  <head>

    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?> 
    <!-- <link  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link  href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  </head>
  <body>

  <div class="app">
      <!--[if lt IE 10]>
      <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
      <![endif]-->
	  <?php $this->view('layout/header') ?> 
	  <?php $this->view('layout/aside') ?> 
      
      <!-- .app-main -->
      <main class="app-main">
        <div class="wrapper">
          <div class="page">
            <div class="page-inner">
              <header class="page-title-bar">
                <h1 class="page-title"> <?php echo $page_title; ?> </h1>
              </header>
              
              <div class="page-section">  
                <!-- .card -->
                <div class="card card-fluid"> 
                  
                   
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h3 class="mr-auto p-3"><?php echo $page_title; ?> </h3>
                      <div class="btn-group" role="group">
                        <div id="buttons"></div>   
                      </div>
                    </div>
                  </div>
                  <div class="card-body"> 

                    <!-- Create New User Modal -->
                    <div class="modal fade" id="create-new-driver-modal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-md  ">
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


                    
                    <form   class="mb-4">
                      <div class="form-group row justify-content-center">
                        <div class="col-6 col-sm-6  col-md-6  col-lg-6 col-xl-6">
                          <label><strong>Approved Date</strong></label>
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
												<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<label>Driver </label>
													<select required="" class="form-control datatable-input" data-col-index="2">
														<option value="">Select</option>
													</select>
												</div>
												<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<label>Plate # </label>
													<select required="" class="form-control datatable-input" data-col-index="3">
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


                    <table id="trip-ticket-table" class="table table-striped " width="100%"> 
                      <thead> 
                        <tr>
                          <th>#</th>
                          <th>Approved Date</th> 
                           <th>Driver</th>
                           <th>Plate #</th>
                           <th>Passenger</th>
                           <th>Places To be Visited</th>
                           <th>Purpose</th>
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
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script>
      $(document).ready(function() { 
        var table = $('#trip-ticket-table').DataTable({
          "scrollY": 450,
          "scrollX": true,
          deferRender: true,
          ajax: {
            url: '<?php echo base_url(); ?>trip_ticket/get_all_trip_ticket',
            type: 'POST',
          },
          columns: [{
            data: 'id',
              render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }
            }, 
            { data: 'approved_date'  }, 
            { data: 'driver_name'  }, 
            { data: 'plate_number' }, 
            { data: 'authorized_passenger' }, 
            { data: 'place_to_be_visited' }, 
            { data: 'purpose' },  
            {
              data: 'id',
              render: function(data, type, row, meta) {
                return '\
                 <div class="dropdown d-inline-block">\
                    <button class="btn btn-icon btn-secondary" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>\
                    <div class="dropdown-menu dropdown-menu-right">\
                      <div class="dropdown-arrow"></div>\
                        <a href="<?php echo base_url();?>trip_ticket/view/'+row.request_id+'" class="dropdown-item" ><i class="fa fa-eye"></i> View Details</a>\
                      </div>\
                  </div>\
                '
              }
            },  
          ],
          initComplete: function() {
            var counter = 0;
            this.api().columns().every(function() {
              var column = this; 
              console.info([counter, column.header().textContent] )
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

        
        var buttons = new $.fn.dataTable.Buttons(table, {
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
            table.column(i).search(val ? val : '', true, true);
          });
          table.table().draw();
        }); 

        $('#kt_reset').on('click', function(e) {
            e.preventDefault(); 

            $('.datatable-input').each(function() {
                $(this).val('');  
                table.column($(this).data('col-index')).search('', false, false);
            }); 
  
            table.table().draw(); 
        });

        // Search by Date Range
        $('input[name="date-range-start"], input[name="date-range-end"]').change(function () {
            table.draw();
        }); 

         
      }); 
    </script>
  </body>
</html>