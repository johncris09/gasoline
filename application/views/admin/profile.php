
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?>  
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
                <div class="page-section"> 
                  <div class="col-lg-12"> 
                    <div class="card"> 
                      <div class="card-body"> 
                          <h3 class="card-title"> <?php echo $page_title; ?></h3>
                          <form id="update-profile-form">
                            <small class=" text-danger">Note: * is requered</small>
                            <fieldset> 
                              <legend>Profile</legend>
                              <?php 
                                $user = $this->user_model->get_user(['id' => $_SESSION['id']]); 
                              ?>
                              <div class="form-group row">
                                  <input type="hidden" class="form-control" value="<?php echo $_SESSION['id'] ?>" name="id"  > 
                                <label for="name" class="col-sm-4 col-form-label">Name <abbr title="Required">*</abbr></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" value="<?php echo $user['name'] ?>" id="name" name="name" placeholder="Name" required> 
                                </div>
                              </div> 
                              <div class="form-group row"> 
                                <label for="email" class="col-sm-4 col-form-label">Email <abbr title="Required">*</abbr></label>
                                <div class="col-sm-8">
                                  <input type="email" class="form-control" value="<?php echo $user['email'] ?>" id="email" name="email" placeholder="Email" required> 
                                </div>
                              </div> 
                              <div class="form-group row"> 
                                <label for="username" class="col-sm-4 col-form-label">Username <abbr title="Required">*</abbr></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" value="<?php echo $user['username'] ?>" id="username" name="username" placeholder="Email" required> 
                                </div>
                              </div> 

                            </fieldset> 
                             
                            <button type="submit" class="btn btn-primary btn-block">  Save Changes</button>  
                          </form>
                      </div> 
                </div>

                
                   
            </div>
          </div>
        </div>
      </main>
    </div>
    <!-- BEGIN BASE JS -->
    
	<?php $this->view('layout/js') ?>  
  <script src="https://uselooper.com/assets/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery.print/jQuery.print.min.js"></script> 
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function() {   
      
      $('#update-profile-form').on('submit', function(e){
        e.preventDefault();
        var user_id = $('input[name="id"]').val();

        console.info(user_id);

        $.ajax({
          url: "<?php echo base_url() ?>profile/update/" + user_id,
          method: "POST",
          data: $("#update-profile-form").serialize(),
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
                  location.reload();
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