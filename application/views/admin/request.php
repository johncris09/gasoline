
<!DOCTYPE html>
<html lang="en">
  <head>

    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?> 
    <!-- <link  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link  href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
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
                            <label><strong>Date Range</strong></label>
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
                    <div class="modal fade" id="create-request-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                      <input type="text" class="form-control readonly" id="plate-number" placeholder="Plate Number" autocomplete="off" required>
                                      <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#vehicle-type-modal" > <i class="oi oi-magnifying-glass"></i> Search Plate Number</button>
                                    </div> 
                                  </div> 
                                </div>
                                <div class="form-group">
                                  <label for="driver">Driver's Name <span class="text-danger">*</span></label> 
                                  <div class="input-group input-group-alt">
                                    <div class="input-group"> 
                                      <input type="hidden" name="driver">  
                                      <input type="text" class="form-control readonly" id="driver" placeholder="Driver's Name" autocomplete="off" required>
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
                            <h5 class="modal-title">Vehicle Type</h5>
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
                                </tr>
                              </thead>
                            </table> 
                          </div>
                        </div> 
                      </div>
                    </div>

                    
                    <!-- Driver Modal -->
                    <div class="modal fade" id="driver-modal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg  ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Driver</h5>
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
                                </tr>
                              </thead>
                            </table>
                          </div>
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
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  
  <script>
    
  
      var alert_class = "";
      var icon = "";
      $(document).ready(function() {
            
        $(".readonly").on('keydown paste focus mousedown', function(e){
            if(e.keyCode != 9) // ignore tab
                e.preventDefault();
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
            data: 'id',
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
              data: 'id',
              render: function(data, type, row, meta) {
                return '\
                 <div class="dropdown d-inline-block">\
                    <button class="btn btn-icon btn-secondary" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>\
                    <div class="dropdown-menu dropdown-menu-right">\
                      <div class="dropdown-arrow"></div>\
                      <button type="button" class="dropdown-item" ><i class="fa fa-pencil-alt"></i> Edit</button>\
                      <button type="button" class="dropdown-item"><i class="fa fa-trash-alt"></i> Delete</button>\
                      <div class="dropdown-divider"></div>\
                      <button type="button" class="dropdown-item"><i class="fa fa-check-circle"></i> Approved</button>\
                    </div>\
                  </div>\
                '
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
          }]
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
          "scrollY": 450,
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
          ],  
          
          select: true,
        });

        $('#vehicle-type-table tbody').on( 'click', 'tr', function () {
            $(this).toggleClass('selected');
            var pos = vehicle_type_table.row(this).index();
            var row = vehicle_type_table.row(pos).data();
            
            $('input[name="plate_number"]').val(row.id)
            $('#plate-number').val( row.vehicle_type + " (" + row.plate_number + ")" )
            
            $('#vehicle-type-modal').modal('toggle');

        } );

        var driver_table = $('#driver-table').DataTable({
          "scrollY": 450,
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
          ],
          select: true,
        });

        
        $('#driver-table tbody').on( 'click', 'tr', function () {
            $(this).toggleClass('selected');
            var pos = driver_table.row(this).index();
            var row = driver_table.row(pos).data();

            console.info(row)
            
            $('input[name="driver"]').val(row.id)
            $('#driver').val( (row.lastname + ", " + row.firstname + " " + row.middlename + " " +  row.suffix).toUpperCase() )
            
            $('#driver-modal').modal('toggle');

        } );
        
        

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

        
      }); 
    </script>
  </body>
</html>