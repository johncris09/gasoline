
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
                <h1 class="page-title"> <?php echo $page_title; ?> </h1>
                <div class="page-section">
                <div class="d-xl-none">
                  <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
                </div><!-- .card --> 
                <div class="col-lg-12">
                  <div class="ribbon">
                    <div class="wrap"> 
                      <span class="ribbon6 text-white " ><?php echo strtoupper( $request['status'] ) ?></span> 
                    </div> 
                    <div class="card"> 
                      <div class="card-body">
                        
                        <h3 class="card-title"> <?php echo $page_title; ?> </h3>
                          <form id="create-new-trip-ticket-form">
                            <small class=" text-danger">Note: * is requered</small>
                            <fieldset>
                              <legend>TO BE FILLED BY THE ADMINISTRATIVE OFFICIAL AUTHORIZING OFFICIAL TRAVEL</legend>
                              <div class="form-group row">
                                <input type="hidden" name="request_id" value="<?php echo $request['id']; ?>" name="request_id">
                                <label for="date" class="col-sm-4 col-form-label">Date <abbr title="Required">*</abbr></label>
                                <div class="col-sm-8">
                                  <input type="date" class="form-control readonly" id="date" name="date" placeholder="Date">
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
                                <label for="authorized_passenger" class="col-sm-4 col-form-label">Name(s) of authorized Passenger(s) </label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="authorized_passenger" name="authorized_passenger"  placeholder="Name(s) of authorized Passenger(s)">
                                </div>
                              </div>  
                              <div class="form-group row">
                                <label for="place_to_be_visited" class="col-sm-4 col-form-label">Place or Places to be Visited/Inspected</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="place_to_be_visited" name="place_to_be_visited"  placeholder="Place or Places to be Visited/Inspected">
                                </div>
                              </div>   
                              <div class="form-group row">
                                <label for="purpose" class="col-sm-4 col-form-label">Purposes</label>
                                <div class="col-sm-8">
                                  <textarea class="form-control" name="purpose" id="purpose" cols="30" rows="2" placeholder="Purposes"></textarea>
                                </div>
                              </div>   
                              <div class="form-group row">
                                <label for="authorize-person" class="col-sm-4 col-form-label">Authorize Person <abbr title="Required">*</abbr></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="authorize-person" name="authorize_person"  placeholder="Authorize Person" required>
                                </div>
                              </div>

                            </fieldset> 
                            
                            <hr>

                            
                            <fieldset>
                              <legend>TO BE FILLED BY THE DRIVER</legend>
                              <div class="form-group row">
                                <label for="departure-time-from-office" class="col-sm-4 col-form-label">Time of Departure from Office/Garage <span class="badge badge-danger">AM/PM</span> </label>
                                <div class="col-sm-8">
                                  <input type="time" class="form-control" id="departure-time-from-office" name="departure_time_from_office"  placeholder="Time of Departure from Office/Garage">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="arrival-time-at-per" class="col-sm-4 col-form-label">Time of Arrival at (Per No. 5 above)  <span class="badge badge-danger">AM/PM</span></label>
                                <div class="col-sm-8">
                                  <input type="time" class="form-control" id="arrival-time-at-per" name="arrival_time_at_per"  placeholder="Time of Arrival at (Per No. 5 above) ">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="departure-time-from-per-four" class="col-sm-4 col-form-label"> Time of Departure from (Per No. 4) <span class="badge badge-danger">AM/PM</span></label>
                                <div class="col-sm-8">
                                  <input type="time" class="form-control" id="departure-time-from-per-four" name="departure_time_from_per_four"  placeholder="Time of Departure from (Per No. 4)">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="arrival-time-back-to-office" class="col-sm-4 col-form-label"> Time of Arrival back to Office/Garage <span class="badge badge-danger">AM/PM</span></label>
                                <div class="col-sm-8">
                                  <input type="time" class="form-control" id="arrival-time-back-to-office" name="arrival_time_back_to_office"  placeholder="Time of Arrival back to Office/Garage">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="approximate-distance-tavel" class="col-sm-4 col-form-label">Approximate Distance Traveled (to and from) <span class="badge badge-danger">Kms</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control readonly" id="approximate-distance-tavel" name="approximate_distance_tavel"  placeholder="Approximate Distance Traveled (to and from)">
                                  <small id="tf1Help" class="form-text text-muted"> <i class="fa fa-info-circle"></i> Automated Calculation.</small>
                                </div>
                              </div>
                              <fieldset>
                                <legend>Gasoline Issued, Purchased & consumed</legend>
                                
                                <div class="form-group row">
                                  <label for="tank-balance" class="col-sm-4 col-form-label pl-5"> Balance in Tank  <span class="badge badge-danger">Liters</span></label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control readonly" id="tank-balance" name="tank_balance"  placeholder="Balance in Tank">
                                  <small id="tf1Help" class="form-text text-muted"> <i class="fa fa-info-circle"></i> Automated Calculation.</small>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="issued-office-from-stock" class="col-sm-4 col-form-label pl-5"> Issued by Office from Stock  <span class="badge badge-danger">Liters</span></label>
                                  <div class="col-sm-8">
                                    <input type="number" class="form-control" id="issued-office-from-stock" name="issued_office_from_stock"  placeholder="Issued by Office from Stock">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="add-purchase-during-the-trip" class="col-sm-4 col-form-label pl-5"> Add: Purchase during the trip  <span class="badge badge-danger">Liters</span></label>
                                  <div class="col-sm-8">
                                    <div class="input-group input-group-alt">
                                    <input type="number" class="form-control" id="add-purchase-during-the-trip" name="add_purchase_during_the_trip"  placeholder="Add: Purchase during the trip">
                                      <div class="input-group-prepend"> 
                                        <select class="custom-select" id="select-calculation" required>
                                          <option value=""> Select Calculation </option> 
                                          <?php 
                                            foreach($calculation as $row){
                                              echo '
                                                <option data-times="'.$row['times'].'" data-tank-balance="'.$row['tank_balance'].'" value="'.$row['id'].'">'.strtoupper($row['vehicle_type']). ' * ' . $row['times'] .' </option> 
                                              ';
                                            }
                                          ?> 
                                        </select>
                                        <button type="button" id="calculate-btn" class="btn btn-primary">Calculate</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="total" class="col-sm-4 col-form-label pl-5"> <strong>TOTAL</strong>  <span class="badge badge-danger">Liters</span></label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control readonly" id="total" name="total"  placeholder="TOTAL">
                                    <small id="tf1Help" class="form-text text-muted"> <i class="fa fa-info-circle"></i> Automated Calculation.</small>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="deduct-used-during-the-trip" class="col-sm-4 col-form-label pl-5">Deduct used during the trip(to and from)    <span class="badge badge-danger">Liters</span></label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control readonly" id="deduct-used-during-the-trip" name="deduct_used_during_the_trip"  placeholder="Deduct used during the trip(to and from)">
                                    <small id="tf1Help" class="form-text text-muted"> <i class="fa fa-info-circle"></i> Automated Calculation.</small>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="tank-balance-at-the-end-of-trip" class="col-sm-4 col-form-label pl-5">Balance in Tank at the end of trip  <span class="badge badge-danger">Liters</span> </label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control readonly" id="tank-balance-at-the-end-of-trip" name="tank_balance_at_the_end_of_trip"  placeholder="Balance in Tank at the end of trip ">
                                    <small id="tf1Help" class="form-text text-muted"> <i class="fa fa-info-circle"></i> Automated Calculation.</small>
                                  </div>
                                </div>  
                              </fieldset>
                              <div class="form-group row">
                                <label for="gear-oil-issued-or-purchased" class="col-sm-4 col-form-label">Gear Oil Issued/Purchased  <span class="badge badge-danger">Liters/Qts.</span> </label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="gear-oil-issued-or-purchased" name="gear_oil_issued_or_purchased"  placeholder="Gear Oil Issued/Purchased">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="lubricating-oil-issued-purchased" class="col-sm-4 col-form-label">Lubricating Oil/Issued/Purchased    <span class="badge badge-danger">Liters/Qts.</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="lubricating-oil-issued-purchased" name="lubricating_oil_issued_purchased"  placeholder="Lubricating Oil/Issued/Purchased">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="grease-issued-purchased" class="col-sm-4 col-form-label">Grease Issued/Purchased <span class="badge badge-danger">Liters/Qts.</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="grease-issued-purchased" name="grease_issued_purchased"  placeholder="Grease Issued/Purchased">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="brake-fluid-issued-purchased" class="col-sm-4 col-form-label">Brake fluid Issued/Purchased <span class="badge badge-danger">Liters/Qts.</span>  </label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="brake-fluid-issued-purchased" name="brake_fluid_issued_purchased"  placeholder="Brake fluid Issued/Purchased">
                                </div>
                              </div>  
                              <fieldset>
                                <legend>Speedometer Readings, if any </legend>
                                
                                <div class="form-group row">
                                  <label for="at-the-beginning-of-trip" class="col-sm-4 col-form-label pl-5">at the beginning of trip  <span class="badge badge-danger">Miles/Kms.</span> </label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="at-the-beginning-of-trip" name="at_the_beginning_of_trip" placeholder="at the beginning of trip">
                                  </div>
                                </div>   
                                <div class="form-group row">
                                  <label for="at-the-end-of-trip" class="col-sm-4 col-form-label pl-5">at the end of trip   <span class="badge badge-danger">Miles/Kms.</span>  </label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="at-the-end-of-trip" name="at_the_end_of_trip"  placeholder="at the end of trip">
                                  </div>
                                </div>     
                                <div class="form-group row">
                                  <label for="distance-traveled" class="col-sm-4 col-form-label pl-5">Distance Traveled (Per No. 5 above) <span class="badge badge-danger">Miles/Kms.</span> </label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="distance-traveled" name="distance_traveled"  placeholder="Distance Traveled (Per No. 5 above)">
                                  </div>
                                </div>   
                              </fieldset>  
                              <div class="form-group row">
                                <label for="remark" class="col-sm-4 col-form-label">Remarks</label>
                                <div class="col-sm-8">
                                  <textarea class="form-control" name="remark" id="remark" cols="30" rows="2" placeholder="Remarks"></textarea>
                                </div>
                              </div>
                            </fieldset> 
                            <div class="form-group row">
                              <div class="col-sm-10">
                                <a href="<?php echo base_url() ?>request" class="btn btn-danger"> <i class="fa fa-times"></i> Cancel</a>
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Approved</button>
                              </div>
                            </div>
                          </form>
                      </div><!-- /.card-body -->
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
  <script src="https://uselooper.com/assets/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery.print/jQuery.print.min.js"></script> 
  <script>
    $(document).ready(function() {  
      $(".readonly").on('keydown paste focus mousedown', function(e){
        if(e.keyCode != 9) // ignore tab
          e.preventDefault();
      });

      $('#calculate-btn').on('click', function(){ 

        if($('#select-calculation').val() !== ""  && $('#add-purchase-during-the-trip').val() !== "" ){
          var tank_balance = $('#select-calculation').find(':selected').data('tank-balance')
          var times = $('#select-calculation').find(':selected').data('times')
          var add_purchase_trip = $('input[name="add_purchase_during_the_trip"]').val()

          $('#approximate-distance-tavel').val(add_purchase_trip * times)
          $('#tank-balance').val(tank_balance)

          var total = parseFloat( $('#tank-balance').val() ) + parseFloat( ($('#issued-office-from-stock').val() == "") ? 0 :  $('#issued-office-from-stock').val() )   + parseFloat( $('#add-purchase-during-the-trip').val());

          $('#total').val(total)
          
          $('#deduct-used-during-the-trip').val(add_purchase_trip)
          $('#tank-balance-at-the-end-of-trip').val(tank_balance)

        }else{
          alert("Please Select A Calculation or Add Purchase during trip")
        } 
      })


    }); 


  </script>
  </body>
</html>