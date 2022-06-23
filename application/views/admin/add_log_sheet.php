
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->view('layout/meta') ?>
	  <?php $this->view('layout/css') ?> 
    <style>
				
		<?php
			if(strtolower($request['status']) == "pending"){
        echo '
          .ribbon6 { 
            box-shadow: 0 0 0 3px #FF0000, 0px 21px 5px -18px rgba(0, 0, 0, 0.6) !important; 
            background: #FF0000 !important; 
          }
        '; 
			}
		?>  
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
        <div class="wrapper">
          <div class="page">
            <div class="page-inner">
              <header class="page-title-bar">
                <div class="d-flex flex-column flex-md-row">
                  <p class="lead">
                    <span class="font-weight-bold"><?php echo $page_title; ?></span> 
                    <span class="d-block text-muted">O.R #: <u> <?php echo $receipt['has_receipt'] ? $receipt['or_number'] : "" ; ?></u></span>
                  </p> 
                </div>
                <div class="col-lg-12">
                  <div class="ribbon">
                    <div class="wrap"> 
                      <span class="ribbon6  text-white" ><?php echo strtoupper( $request['status'] ) ?></span> 
                    </div> 
                    <div class="card"> 
                      <div class="card-body">
                        
                        <!-- Create Request Modal -->
                        <div class="modal fade" id="receipt-modal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                          <div class="modal-dialog modal-dialog-centered modal-md  ">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Receipt <i class="fas fa-receipt"></i> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form  id="<?php echo $receipt['has_receipt'] ? "update" : "create" ; ?>-receipt-form">
                                <div class="modal-body"> 
                                  <small class=" text-danger">Note: * is requered</small>
                                  <fieldset> 
                                    <div class="form-group">
                                      <input type="hidden" value="<?php echo $receipt['has_receipt'] ? $receipt['id'] : "" ?>" name="receipt_id">
                                      <input type="hidden" value="<?php echo $request['id']; ?>" name="request_id">
                                      <input type="hidden"  value="<?php echo $request['plate_number']; ?>" name="plate_number">
                                      <input type="hidden"  value="<?php echo $request['gasoline_type']; ?>" name="gasoline_type">
                                      <label for="receipt-date">Date <span class="text-danger">*</span></label> 
                                      <input type="date" class="form-control" value="<?php echo $receipt['has_receipt'] ? $receipt['date'] : "" ?>"  id="receipt-date" name="receipt_date"  required  placeholder="Request Date">
                                    </div>
                                    <div class="form-group">
                                      <label for="or-number">O.R. Number <span class="text-danger">*</span></label> 
                                      <input type="text" value="<?php echo $receipt['has_receipt'] ? $receipt['or_number'] : "" ?>" class="form-control" id="or-number" name="or_number"  placeholder="O.R. Number" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="liter">Liter <span class="text-danger">*</span></label> 
                                      <input type="number" step="0.01" value="<?php echo $receipt['has_receipt'] ? $receipt['liter'] : "" ?>" class="form-control sub-total" id="liter" name="liter"  placeholder="Liter" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="price-per-liter">Price per Liter <span class="text-danger">*</span></label> 
                                      <input type="number" step="0.01" value="<?php echo $receipt['has_receipt'] ? $receipt['price_per_liter'] : "" ?>" class="form-control  sub-total" id="price-per-liter" name="price_per_liter"  placeholder="00.00" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="amount">Amount <span class="text-danger">*</span></label> 
                                      <input type="text" value="<?php echo $receipt['has_receipt'] ? $receipt['amount'] : "" ?>" class="form-control readonly font-weight-bolder " style="color:red" id="amount" name="amount"  placeholder="00.00">
                                    </div>
                                  </fieldset> 
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary btn-block">Save changes</button>
                                </div>
                              </form>
                            </div> 
                          </div>
                        </div>
                          <h3 class="card-title"> <?php echo $page_title; ?> <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#receipt-modal"> <i class="fa fa-receipt"></i> Receipt</button> </h3>
                          <form id="<?php echo (strtolower($request['status']) == "approved") ? "update" : "create-new" ; ?>-log-sheet-form">
                            <small class=" text-danger">Note: * is requered</small>
                            <fieldset>  
                              <div class="form-group row">
                                <input type="hidden"  value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['id'] : "" ?>" name="trip_ticket_id">
                                <input type="hidden" name="request_id" value="<?php echo $request['id']; ?>" name="request_id">
                                <label for="date" class="col-sm-4 col-form-label">Date <abbr title="Required">*</abbr></label>
                                <div class="col-sm-8">
                                  <input type="date" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['approved_date'] : "" ?>" class="form-control" id="date" name="date" placeholder="Date" required>
                                  <small id="tf1Help" class="form-text text-muted"> <i class="fa fa-info-circle"></i> Request Date (<?php echo date("M d, Y", strtotime($request['request_date'])) ?>) .</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="driver" class="col-sm-4 col-form-label">Name of Driver of the Vehicle <abbr title="Required">*</abbr></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control readonly" id="driver" value="<?php echo $driver_name; ?>"   placeholder="Driver">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="plate-number" class="col-sm-4 col-form-label">Government Car to be used/Plate No. <abbr title="Required">*</abbr></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control readonly" id="plate-number"  value="<?php echo $vehicle_type['plate_number']; ?>"    placeholder="Plate Number">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="gasoline-type" class="col-sm-4 col-form-label">Gasoline Type</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control readonly" id="gasoline-type"  value="<?php echo $request['gasoline_type']; ?>"    placeholder="Gasoline Type">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="quantity-fuel" class="col-sm-4 col-form-label">Quantity Fuel</label>
                                <div class="col-sm-8">
                                  <input type="number"  step="0.01"  class="form-control"  value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['add_purchase_during_the_trip'] : "" ?>"  id="add-purchase-during-the-trip" name="add_purchase_during_the_trip"  placeholder="0">
                                </div>
                              </div> 
                              
                              <div class="form-group row">
                                <label for="remark" class="col-sm-4 col-form-label">Location</label>
                                <div class="col-sm-8">
                                  <textarea class="form-control" name="remark" required id="remark" cols="30" rows="2" placeholder="Location"><?php echo ( strtolower($request['status']) == "approved") ? trim($trip_ticket['remark']) : "" ?></textarea>
                                </div>
                              </div> 
                              <input type="hidden" value="<?php echo $request['file_type'] ?>"  class="form-control" name="file_type">
                              
                            </fieldset>
                            <hr> 
                            <hr> 
                            <div class="form-group row">
                              <div class="col-sm-10">
                                <?php 
                                  if( strtolower( $request['status'] ) == "approved"){
                                ?> 
                                    <button type="button" id="delete-btn" data-approved-id="<?php echo $trip_ticket['id'] ?>" data-request-id="<?php echo $request['id'] ?>"  class="btn btn-danger"> <i class="fa fa-trash"></i> Delete</button>
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-pen"></i> Update</button>
                                <?php
                                  }else{
                                ?>
                                    <a href="<?php echo base_url() ?>request" class="btn btn-danger"> <i class="fa fa-times"></i> Cancel</a>
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Approved</button>
                                <?php
                                  }
                                ?>
                              </div>
                            </div>
                          </form>
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
  <script src="https://uselooper.com/assets/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery.print/jQuery.print.min.js"></script> 
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function() {
      $('#receipt-modal').modal('show')
      function calculateTotal() {
        var total = 1;
        $(".sub-total").each(function(i, v) {
          if($(v).val() != "") total *= parseFloat($(v).val());
        })
        $('input[name="amount"]').val(total);
      }
      $("body").on('keyup', '.sub-total', function() {
        calculateTotal();
      });
      $("body").on('keyup', 'input[name="liter"]', function() {
        $('input[name="add_purchase_during_the_trip"]').val($(this).val())
      });
      $('#create-receipt-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
          url: "<?php echo base_url() ?>receipt/insert",
          method: "POST",
          data: $("#create-receipt-form").serialize(),
          dataType: "json",
          success: function(data) {
            if(!data.response) {
              Swal.fire({
                title: data.message,
                icon: "error",
                showCancelButton: true,
              })
            } else {
              Swal.fire({
                title: data.message,
                icon: "success",
                showCancelButton: true,
              }).then(function(result) {
                location.reload();
              });
            }
          },
          error: function(xhr, status, error) {
            console.info(xhr.responseText);
          }
        });
      })
      $('#update-receipt-form').on('submit', function(e) {
        e.preventDefault();
        var receipt_id = $('input[name="receipt_id"]').val();
        $.ajax({
          url: "<?php echo base_url() ?>receipt/update/" + receipt_id,
          method: "POST",
          data: $("#update-receipt-form").serialize(),
          dataType: "json",
          success: function(data) {
            if(!data.response) {
              Swal.fire({
                title: data.message,
                icon: "error",
                showCancelButton: true,
              })
            } else {
              Swal.fire({
                title: data.message,
                icon: "success",
                showCancelButton: true,
              }).then(function(result) {
                location.reload();
              });
            }
          },
          error: function(xhr, status, error) {
            console.info(xhr.responseText);
          }
        });
      })
      $(".readonly").on('keydown paste focus mousedown', function(e) {
        if(e.keyCode != 9) // ignore tab
          e.preventDefault();
      });
      $('#create-new-log-sheet-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
          url: "<?php echo base_url() ?>log_sheet/insert",
          method: "POST",
          data: $("#create-new-log-sheet-form").serialize(),
          dataType: "json",
          success: function(data) {
            console.info(data)
            if(!data.response) {
              Swal.fire({
                title: data.message,
                icon: "error",
                showCancelButton: true,
              })
            } else {
              Swal.fire({
                title: data.message,
                icon: "success",
                showCancelButton: true,
              }).then(function(result) {
                location.reload();
              });
            }
          },
          error: function(xhr, status, error) {
            console.info(xhr.responseText);
          }
        });
      })
      $('#update-log-sheet-form').on('submit', function(e) {
          e.preventDefault();
          var trip_ticket_id = $('input[name="trip_ticket_id"]').val();
          $.ajax({
            url: "<?php echo base_url() ?>log_sheet/update/" + trip_ticket_id,
            method: "POST",
            data: $("#update-log-sheet-form").serialize(),
            dataType: "json",
            success: function(data) {
              if(!data.response) {
                Swal.fire({
                  title: data.message,
                  icon: "error",
                  showCancelButton: true,
                })
              } else {
                Swal.fire({
                  title: data.message,
                  icon: "success",
                  showCancelButton: true,
                }).then(function(result) {
                  location.reload();
                });
              }
            },
            error: function(xhr, status, error) {
              console.info(xhr.responseText);
            }
          });
        })
        //  Disapproved Request
      $(document).on('click', '#delete-btn', function(e) {
        e.preventDefault();
        var approved_id = $(this).data('approved-id')
        var request_id = $(this).data('request-id')
        Swal.fire({
          title: "Are you sure?",
          text: "The receipt will be removed as well. You will not be able to undo this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
          if(result.value) {
            $.ajax({
              url: "<?php echo base_url() ?>trip_ticket/delete/" + approved_id,
              method: "post",
              data: {
                'request_id': request_id
              },
              dataType: "json",
              success: function(data) {
                if(!data.response) {
                  Swal.fire({
                    title: data.message,
                    icon: "error",
                    showCancelButton: true,
                  })
                } else {
                  Swal.fire({
                    title: 'Deleted!',
                    text: "Your file has been deleted.",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonText: "Ok"
                  })
                  location.reload();
                }
              },
              error: function(xhr, status, error) {
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