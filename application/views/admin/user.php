
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
                      <h3 class="mr-auto p-3"><?php echo $page_title; ?> <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#create-new-user-modal"> <i class="fa fa-plus-circle"></i> Add New</button> </h3>
                      <div class="btn-group" role="group">
                        <div id="buttons"></div>   
                      </div>
                    </div>
                  </div>
                  <div class="card-body">  
                    
                    <!-- Create New User Modal -->
                    <div class="modal fade" id="create-new-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-md  ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Create New User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form id="create-new-user-form">
                            <div class="modal-body">  
                              <small class=" text-danger">Note: * is requered</small>
                              <fieldset> 
                                <div class="form-group">
                                  <label for="name">Name <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                  <label for="email">Email <span class="text-danger">*</span></label> 
                                  <input type="email" class="form-control" id="email" name="email" placeholder="e.g. johndoe@looper.com" required>
                                </div>
                                <div class="form-group">
                                  <label for="username">Username <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                  <label for="password">Password <span class="text-danger">*</span> </label> 
                                  <div class="input-group input-group-alt">
                                    <div class="input-group">
                                      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                      <button class="btn btn-secondary" type="button" id="toggle-password"> <i class="fa fa-eye"></i> Show</button>
                                    </div> 
                                  </div> 
                                </div>
                                <div class="form-group"> 
                                  <label for="role_type">Role Type <span class="text-danger">*</span></label> 
                                  <select class="custom-select d-block w-100" id="role_type"  name="role_type" required>
                                    <option value=""> Choose... </option> 
                                    <?php 
                                      foreach($this->config->item('role_type') as $key => $val){
                                        echo '
                                          <option value="'.$key.'">'.$val.'</option>
                                        '; 
                                      }
                                    ?>
                                  </select>
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

                    
                    <!-- Edit User Modal -->
                    <div class="modal fade" id="edit-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-md  ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form id="update-user-form">
                            <div class="modal-body">  
                              <small class=" text-danger">Note: * is requered</small>
                              <fieldset> 
                                <input type="hidden" name="id">
                                <div class="form-group">
                                  <label for="name">Name <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                  <label for="email">Email <span class="text-danger">*</span></label> 
                                  <input type="email" class="form-control" id="email" name="email" placeholder="e.g. johndoe@looper.com" required>
                                </div>
                                <div class="form-group">
                                  <label for="username">Username <span class="text-danger">*</span></label> 
                                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group"> 
                                  <label for="role_type">Role Type <span class="text-danger">*</span></label> 
                                  <select class="custom-select d-block w-100" id="role_type"  name="role_type" required>
                                    <option value=""> Choose... </option> 
                                    <?php 
                                      foreach($this->config->item('role_type') as $key => $val){
                                        echo '
                                          <option value="'.$key.'">'.$val.'</option>
                                        '; 
                                      }
                                    ?>
                                  </select>
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

                    
                    <table id="user-table" class="table table-striped " width="100%"> 
                      <thead> 
                        <tr>
                          <th>#</th>
                          <th>Name</th> 
                           <th>Username</th>
                           <th>Email</th>
                           <th>Role Type</th>
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
        

        var alert_class = "";
        var table = $('#user-table').DataTable({
          "scrollY": 450,
          "scrollX": true,
          deferRender: true,
          ajax: {
            url: '<?php echo base_url(); ?>user/get_all_user',
            type: 'POST',
          },
          columns: [{
            data: 'id',
              render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }
            }, 
            { data: 'name'  }, 
            { data: 'username' }, 
            { data: 'email' }, 
            { data: 'role_type' }, 
            
            {
              data: 'id',
              render: function(data, type, row, meta) {
                return '\
                 <div class="dropdown d-inline-block">\
                    <button class="btn btn-icon btn-secondary" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>\
                    <div class="dropdown-menu dropdown-menu-right">\
                      <div class="dropdown-arrow"></div>\
                        <button type="button" class="dropdown-item" data-user-id="'+row.id+'" id="edit-user-btn"  ><i class="fa fa-pencil-alt"></i> Edit</button>\
                        <button type="button" class="dropdown-item" data-user-id="'+row.id+'" id="delete-user-btn"><i class="fa fa-trash-alt"></i> Delete</button>\
                      </div>\
                  </div>\
                '
              }
            }, 

          ],
          columnDefs: [{
            targets: 4,
            render: function ( data, type, row ) {

              var status = "";
              if(data.toLowerCase() == "admin" ){ 
                alert_class = "primary"
              }else if( data.toLowerCase() == "user"  ){ 
                alert_class = "warning"
              }
 
              return '<span class="badge badge-'+alert_class+'">'+data+'</span></h1>'
              

            }
          }]
           
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
        
        $('#toggle-password').on('click', function(){
          var input = $('input[name="password"]');
          if (input.attr("type") === "password") {
            input.attr("type", "text");
            $('button#toggle-password').html(' <i class="fa fa-eye-slash"></i> Hide')
          } else {
            input.attr("type", "password");
            $('button#toggle-password').html(' <i class="fa fa-eye"></i> Show')
          }
        })


        

        $('#create-new-user-form').on('submit', function(e){
          e.preventDefault();

          $.ajax({
            url: "<?php echo base_url() ?>user/insert",
            method: "POST",
            data: $("#create-new-user-form").serialize(),
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
                      $("#create-new-user-form")[0].reset()
                      $('input[name="request_date"]').focus()

                      table.ajax.reload();
                      
                  });
              }  
            },
            error: function (xhr, status, error) {
                console.info(xhr.responseText);
            }
          });
        })
        
        $(document).on('click','#edit-user-btn', function(){ 
          
          // show modal
          $('#edit-user-modal').modal('show')

          var user_id = $(this).data('userId')

          $.ajax({
            url: "<?php echo base_url() ?>user/get_user/" + user_id,
            method: "POST",
            dataType: "json",
            success: function (data) { 

              $('#edit-user-modal input[name="id"]').val(data.id) 
              $('#edit-user-modal input[name="name"]').val(data.name) 
              $('#edit-user-modal input[name="email"]').val(data.email) 
              $('#edit-user-modal input[name="username"]').val(data.username) 
              $('#edit-user-modal select[name="role_type"]').val(data.role_type)  
            },
            error: function (xhr, status, error) {
                console.info(xhr.responseText);
            }
          });
        })


        
        $('#update-user-form').on('submit', function(e){
          e.preventDefault();

          
          var user_id = $('input[name="id"]').val(); 

          $.ajax({
            url: "<?php echo base_url() ?>user/update/" + user_id,
            method: "POST",
            data: $("#update-user-form").serialize(),
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
            
                      $('#edit-user-modal').modal('toggle');
                  });
              }  
            },
            error: function (xhr, status, error) {
                console.info(xhr.responseText);
            }
          });
        })
        

        // Delete User
        $(document).on('click','#delete-user-btn', function(e){
          e.preventDefault();
          var user_id = $(this).data('user-id')
 
          Swal.fire({
              title: "Are you sure?",
              text: "You won\"t be able to revert this!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonText: "Yes, delete it!"
          }).then(function(result) {
              if (result.value) { 
                $.ajax({
                  url: "<?php echo base_url() ?>user/delete/" + user_id,
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