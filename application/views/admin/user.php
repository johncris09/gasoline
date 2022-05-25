
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

                  
                   <div class="modal fade" id="create-new-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-md  ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Create New User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="">
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
                                      <input type="password" class="form-control" id="password" placeholder="Password">
                                      <button class="btn btn-secondary" type="button" id="toggle-password"> <i class="fa fa-eye"></i> Show</button>
                                    </div> 
                                  </div> 
                                </div>
                                <div class="form-group"> 
                                  <label for="role_type">Role Type <span class="text-danger">*</span></label> 
                                  <select class="custom-select d-block w-100" id="role_type"  name="role_type" required="">
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
  <script>
      $(document).ready(function() {
        
        $('#create-new-user-modal').modal('show')
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
                        <button type="button" class="dropdown-item" ><i class="fa fa-pencil-alt"></i> Edit</button>\
                        <button type="button" class="dropdown-item"><i class="fa fa-trash-alt"></i> Delete</button>\
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