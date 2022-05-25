
<!DOCTYPE html>
<html lang="en">
  <head>

    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?> 
    <!-- <link  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link  href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
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

                    <div class="modal fade" id="create-request-modal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg  ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Create new Request</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="">
                            <div class="modal-body">  
                              <small class=" text-danger">Note: * is requered</small>
                              <fieldset> 
                                <div class="form-group">
                                  <label for="tf1">Request Date <span class="text-danger">*</span></label> 
                                  <input type="date" class="form-control" id="tf1" aria-describedby="tf1Help" placeholder="Request Date">
                                </div>
                                <div class="form-group">
                                  <label for="tf2">Plate Number <span class="text-danger">*</span> </label> 
                                  <div class="input-group input-group-alt">
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="pi8" placeholder="Plate Number">
                                      <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#vehicle-type-modal" > <i class="oi oi-magnifying-glass"></i> Search Plate Number</button>
                                    </div> 
                                  </div> 
                                </div>
                                <div class="form-group">
                                  <label for="tf2">Driver's Name <span class="text-danger">*</span></label> 
                                  <div class="input-group input-group-alt">
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="pi8" placeholder="Driver's name">
                                      <button class="btn btn-secondary" type="button" > <i class="oi oi-magnifying-glass"></i> Search Driver's Name</button>
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



                    <table id="request-table" class="table table-striped " width="100%"> 
                      <thead> 
                        <tr>
                          <th>#</th>
                          <th>Request Date</th> 
                          <th>Plate #</th> 
                          <th>Driver</th> 
                           <th>Gasoline Type</th>
                           <th>Liters</th> 
                           <th>Status</th> 
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
    
    
	<?php $this->view('layout/js') ?> 
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
  <script>


      var alert_class = "";
      $(document).ready(function() { 

        $('#create-request-modal').modal('show')


        var table = $('#request-table').DataTable({
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
            { data: 'liters' }, 
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
 
         
      }); 
    </script>
  </body>
</html>