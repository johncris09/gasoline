
<!DOCTYPE html>
<html lang="en">
  <head>

    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?> 
    <!-- <link  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link  href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/datatable/css/buttons.dataTables.min.css">
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
                      <h3 class="mr-auto p-3"><?php echo $page_title; ?> <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#create-new-driver-modal"> <i class="fa fa-plus-circle"></i> Add New</button></h3>
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
          </div>
        </div>
      </main>
    </div>
    <!-- BEGIN BASE JS -->
    
	<?php $this->view('layout/js') ?> 
  <script src="<?php  echo base_url(); ?>assets/vendor/datatable/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/dataTables.buttons.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatable/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      $(document).ready(function() { 
        var table = $('#driver-table').DataTable({
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

                      table.ajax.reload();
                      
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
                      table.ajax.reload(); 
            
                      $('#edit-driver-modal').modal('toggle');
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