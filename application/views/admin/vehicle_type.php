
<!DOCTYPE html>
<html lang="en">
  <head>

    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?> 
    
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
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      $(document).ready(function() { 

        
        var table = $('#vehicle-type-table').DataTable({
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
            {
              data: 'id',
              render: function(data, type, row, meta) {
                return '\
                 <div class="dropdown d-inline-block">\
                    <button class="btn btn-icon btn-secondary" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>\
                    <div class="dropdown-menu dropdown-menu-right">\
                      <div class="dropdown-arrow"></div>\
                        <button type="button" class="dropdown-item" data-vehicle-type-id="'+row.id+'" id="edit-vehicle-type-btn"  ><i class="fa fa-pencil-alt"></i> Edit</button>\
                        <button type="button" class="dropdown-item" data-vehicle-type-id="'+row.id+'" id="delete-vehicle-type-btn"><i class="fa fa-trash-alt"></i> Delete</button>\
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
              console.info([counter, column.header().textContent])
              switch(column.header().textContent) {
                case 'Barangay':
                  column.data().unique().sort().each(function(d, j) {
                    $('.datatable-input[data-col-index="' + counter + '"]').append('<option value="' + d + '">' + d + '</option>');
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

                      table.ajax.reload();
                      
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
                      table.ajax.reload();  

                      $('#edit-vehicle-type-modal').modal('toggle');
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
                      table.ajax.reload()
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