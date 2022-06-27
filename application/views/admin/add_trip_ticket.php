
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
                <!-- <h1 class="page-title"> <?php echo $page_title; ?> </h1> 
                <div class="page-section">
                <div class="d-xl-none">
                  <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
                </div> -->
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
                          <form id="<?php echo (strtolower($request['status']) == "approved") ? "update" : (($is_inserted) ? "update" : "create-new") ; ?>-trip-ticket-form">
                            <small class=" text-danger">Note: * is requered</small>
                            <fieldset> 
                              <legend>TO BE FILLED BY THE ADMINISTRATIVE OFFICIAL AUTHORIZING OFFICIAL TRAVEL</legend>
                              <div class="form-group row">
                                <input type="hidden"  value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['id'] : (($is_inserted) ? $trip_ticket['id'] : "")  ?>" name="trip_ticket_id">
                                <input type="hidden" name="request_id" value="<?php echo $request['id']; ?>" name="request_id">
                                <label for="date" class="col-sm-4 col-form-label">Date <abbr title="Required">*</abbr></label>
                                <div class="col-sm-8">
                                  <input type="date" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['approved_date'] : (($is_inserted) ? $trip_ticket['approved_date'] : "")  ?>" class="form-control" id="date" name="date" placeholder="Date" required>
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
                                <label for="authorized_passenger" class="col-sm-4 col-form-label">Name(s) of authorized Passenger(s) </label>
                                <div class="col-sm-8">
                                  <input type="text" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['authorized_passenger'] : (($is_inserted) ? $trip_ticket['authorized_passenger'] : "") ?>" class="form-control" id="authorized_passenger" name="authorized_passenger"  placeholder="Name(s) of authorized Passenger(s)">
                                </div>
                              </div>  
                              <div class="form-group row">
                                <label for="place_to_be_visited" class="col-sm-4 col-form-label">Place or Places to be Visited/Inspected</label>
                                <div class="col-sm-8">
                                  <input type="text" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['place_to_be_visited'] : (($is_inserted) ? $trip_ticket['place_to_be_visited'] : "") ?>" class="form-control" id="place_to_be_visited" name="place_to_be_visited"  placeholder="Place or Places to be Visited/Inspected">
                                </div>
                              </div>   
                              <div class="form-group row">
                                <label for="purpose" class="col-sm-4 col-form-label">Purposes</label>
                                <div class="col-sm-8">
                                  <textarea class="form-control" name="purpose" id="purpose" cols="30" rows="2" placeholder="Purposes"><?php echo ( strtolower($request['status']) == "approved") ? trim($trip_ticket['purpose']) : (($is_inserted) ? $trip_ticket['purpose'] : "") ?></textarea>
                                </div>
                              </div>  
                            </fieldset>  
                            <hr> 
                            <fieldset>
                              <legend>TO BE FILLED BY THE DRIVER</legend>
                              <div class="form-group row">
                                <label for="departure-time-from-office" class="col-sm-4 col-form-label">Time of Departure from Office/Garage <span class="badge badge-danger">AM/PM</span> </label>
                                <div class="col-sm-8">
                                  <input type="time" class="form-control" id="departure-time-from-office" value="<?php echo ( strtolower($request['status']) == "approved") ?  (($trip_ticket['departure_time_from_office'] == "00:00:00") ? "" : $trip_ticket['departure_time_from_office'] ) : (($is_inserted) ? (($trip_ticket['departure_time_from_office'] == "00:00:00") ? "" : $trip_ticket['departure_time_from_office'] )  : "") ?>"  name="departure_time_from_office"  placeholder="Time of Departure from Office/Garage">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="arrival-time-at-per" class="col-sm-4 col-form-label">Time of Arrival at (Per No. 5 above)  <span class="badge badge-danger">AM/PM</span></label>
                                <div class="col-sm-8">
                                  <input type="time" class="form-control" id="arrival-time-at-per" name="arrival_time_at_per" value="<?php echo ( strtolower($request['status']) == "approved") ?  (($trip_ticket['arrival_time_at_per'] == "00:00:00") ? "" : $trip_ticket['arrival_time_at_per'] ) : (($is_inserted) ? (($trip_ticket['arrival_time_at_per'] == "00:00:00") ? "" : $trip_ticket['arrival_time_at_per'] )  : "") ?>"  placeholder="Time of Arrival at (Per No. 5 above) ">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="departure-time-from-per-four" class="col-sm-4 col-form-label"> Time of Departure from (Per No. 4) <span class="badge badge-danger">AM/PM</span></label>
                                <div class="col-sm-8">
                                  <input type="time" class="form-control" id="departure-time-from-per-four" value="<?php echo ( strtolower($request['status']) == "approved") ?  (($trip_ticket['departure_time_from_per_four'] == "00:00:00") ? "" : $trip_ticket['departure_time_from_per_four'] ) : (($is_inserted) ? (($trip_ticket['departure_time_from_per_four'] == "00:00:00") ? "" : $trip_ticket['departure_time_from_per_four'] )  : "") ?>"  name="departure_time_from_per_four"  placeholder="Time of Departure from (Per No. 4)">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="arrival-time-back-to-office" class="col-sm-4 col-form-label"> Time of Arrival back to Office/Garage <span class="badge badge-danger">AM/PM</span></label>
                                <div class="col-sm-8">
                                  <input type="time" class="form-control" id="arrival-time-back-to-office" value="<?php echo ( strtolower($request['status']) == "approved") ?  (($trip_ticket['arrival_time_back_to_office'] == "00:00:00") ? "" : $trip_ticket['arrival_time_back_to_office'] ) : (($is_inserted) ? (($trip_ticket['arrival_time_back_to_office'] == "00:00:00") ? "" : $trip_ticket['arrival_time_back_to_office'] )  : "") ?>"  name="arrival_time_back_to_office"  placeholder="Time of Arrival back to Office/Garage">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="approximate-distance-tavel" class="col-sm-4 col-form-label">Approximate Distance Traveled (to and from) <span class="badge badge-danger">Kms</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control readonly" id="approximate-distance-tavel" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['approximate_distance_tavel'] : (($is_inserted) ? $trip_ticket['approximate_distance_tavel'] : "") ?>"  name="approximate_distance_tavel"  placeholder="Approximate Distance Traveled (to and from)">
                                  <small id="tf1Help" class="form-text text-muted"> <i class="fa fa-info-circle"></i> Automated Calculation.</small>
                                </div>
                              </div>
                              <fieldset>
                                <legend>Gasoline Issued, Purchased & consumed</legend>
                                
                                <div class="form-group row">
                                  <label for="tank-balance" class="col-sm-4 col-form-label pl-5"> Balance in Tank  <span class="badge badge-danger">Liters</span></label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control readonly" id="tank-balance" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['tank_balance'] : (($is_inserted) ? $trip_ticket['tank_balance'] : "") ?>"  name="tank_balance"  placeholder="Balance in Tank">
                                  <small id="tf1Help" class="form-text text-muted"> <i class="fa fa-info-circle"></i> Automated Calculation.</small>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="issued-office-from-stock" class="col-sm-4 col-form-label pl-5"> Issued by Office from Stock  <span class="badge badge-danger">Liters</span></label>
                                  <div class="col-sm-8">
                                    <input type="number" class="form-control" id="issued-office-from-stock" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['issued_office_from_stock'] :  (($is_inserted) ? $trip_ticket['issued_office_from_stock'] : "") ?>"  name="issued_office_from_stock"  placeholder="Issued by Office from Stock">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="add-purchase-during-the-trip" class="col-sm-4 col-form-label pl-5"> Add: Purchase during the trip  <span class="badge badge-danger">Liters</span></label>
                                  <div class="col-sm-8">
                                    <div class="input-group input-group-alt">
                                    <input type="number"  step="0.01" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['add_purchase_during_the_trip'] : (($is_inserted) ? $trip_ticket['add_purchase_during_the_trip'] : "") ?>" class="form-control" id="add-purchase-during-the-trip" name="add_purchase_during_the_trip"  placeholder="Add: Purchase during the trip">
                                      <div class="input-group-prepend"> 
                                        <select class="custom-select" id="select-calculation" name="select_calculation" required>
                                          <option value=""> Select Calculation </option> 
                                          <?php 
                                            foreach($calculation as $row){
                                              $selected = '';
                                              if($row['id'] == $trip_ticket['calculation']){
                                                $selected = "selected";
                                              }else{
                                                $selected = "";
                                              }
                                              echo '
                                                <option '.$selected.' data-times="'.$row['times'].'" data-tank-balance="'.$row['tank_balance'].'" value="'.$row['id'].'">'.strtoupper($row['vehicle_type']). ' * ' . $row['times'] .' </option> 
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
                                    <input type="text" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['total'] :  (($is_inserted) ? $trip_ticket['total'] : "") ?>" class="form-control readonly" id="total" name="total"  placeholder="TOTAL">
                                    <small id="tf1Help"  class="form-text text-muted"> <i class="fa fa-info-circle"></i> Automated Calculation.</small>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="deduct-used-during-the-trip" class="col-sm-4 col-form-label pl-5">Deduct used during the trip(to and from)    <span class="badge badge-danger">Liters</span></label>
                                  <div class="col-sm-8">
                                    <input type="text" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['deduct_used_during_the_trip'] : (($is_inserted) ? $trip_ticket['deduct_used_during_the_trip'] : "") ?>"  class="form-control readonly" id="deduct-used-during-the-trip" name="deduct_used_during_the_trip"  placeholder="Deduct used during the trip(to and from)">
                                    <small id="tf1Help" class="form-text text-muted"> <i class="fa fa-info-circle"></i> Automated Calculation.</small>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="tank-balance-at-the-end-of-trip" class="col-sm-4 col-form-label pl-5">Balance in Tank at the end of trip  <span class="badge badge-danger">Liters</span> </label>
                                  <div class="col-sm-8">
                                    <input type="text" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['tank_balance_at_the_end_of_trip'] : (($is_inserted) ? $trip_ticket['tank_balance_at_the_end_of_trip'] : "") ?>" class="form-control readonly" id="tank-balance-at-the-end-of-trip" name="tank_balance_at_the_end_of_trip"  placeholder="Balance in Tank at the end of trip ">
                                    <small id="tf1Help" class="form-text text-muted"> <i class="fa fa-info-circle"></i> Automated Calculation.</small>
                                  </div>
                                </div>  
                              </fieldset>
                              <div class="form-group row">
                                <label for="gear-oil-issued-or-purchased" class="col-sm-4 col-form-label">Gear Oil Issued/Purchased  <span class="badge badge-danger">Liters/Qts.</span> </label>
                                <div class="col-sm-8">
                                  <input type="text" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['gear_oil_issued_or_purchased'] : (($is_inserted) ? $trip_ticket['gear_oil_issued_or_purchased'] : "") ?>" class="form-control" id="gear-oil-issued-or-purchased" name="gear_oil_issued_or_purchased"  placeholder="Gear Oil Issued/Purchased">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="lubricating-oil-issued-purchased" class="col-sm-4 col-form-label">Lubricating Oil/Issued/Purchased    <span class="badge badge-danger">Liters/Qts.</span></label>
                                <div class="col-sm-8">
                                  <input type="text" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['lubricating_oil_issued_purchased'] : (($is_inserted) ? $trip_ticket['lubricating_oil_issued_purchased'] : "") ?>" class="form-control" id="lubricating-oil-issued-purchased" name="lubricating_oil_issued_purchased"  placeholder="Lubricating Oil/Issued/Purchased">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="grease-issued-purchased" class="col-sm-4 col-form-label">Grease Issued/Purchased <span class="badge badge-danger">Liters/Qts.</span></label>
                                <div class="col-sm-8">
                                  <input type="text" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['grease_issued_purchased'] : (($is_inserted) ? $trip_ticket['grease_issued_purchased'] : "") ?>" class="form-control" id="grease-issued-purchased" name="grease_issued_purchased"  placeholder="Grease Issued/Purchased">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="brake-fluid-issued-purchased" class="col-sm-4 col-form-label">Brake fluid Issued/Purchased <span class="badge badge-danger">Liters/Qts.</span>  </label>
                                <div class="col-sm-8">
                                  <input type="text" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['brake_fluid_issued_purchased'] :  (($is_inserted) ? $trip_ticket['brake_fluid_issued_purchased'] : "") ?>" class="form-control" id="brake-fluid-issued-purchased" name="brake_fluid_issued_purchased"  placeholder="Brake fluid Issued/Purchased">
                                </div>
                              </div>  
                              <fieldset>
                                <legend>Speedometer Readings, if any </legend>
                                
                                <div class="form-group row">
                                  <label for="at-the-beginning-of-trip" class="col-sm-4 col-form-label pl-5">at the beginning of trip  <span class="badge badge-danger">Miles/Kms.</span> </label>
                                  <div class="col-sm-8">
                                    <input type="text" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['at_the_beginning_of_trip'] : (($is_inserted) ? $trip_ticket['at_the_beginning_of_trip'] : "") ?>" class="form-control" id="at-the-beginning-of-trip" name="at_the_beginning_of_trip" placeholder="at the beginning of trip">
                                  </div>
                                </div>   
                                <div class="form-group row">
                                  <label for="at-the-end-of-trip" class="col-sm-4 col-form-label pl-5">at the end of trip   <span class="badge badge-danger">Miles/Kms.</span>  </label>
                                  <div class="col-sm-8">
                                    <input type="text" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['at_the_end_of_trip'] : (($is_inserted) ? $trip_ticket['at_the_end_of_trip'] : "") ?>" class="form-control" id="at-the-end-of-trip" name="at_the_end_of_trip"  placeholder="at the end of trip">
                                  </div>
                                </div>     
                                <div class="form-group row">
                                  <label for="distance-traveled" class="col-sm-4 col-form-label pl-5">Distance Traveled (Per No. 5 above) <span class="badge badge-danger">Miles/Kms.</span> </label>
                                  <div class="col-sm-8">
                                    <input type="text" value="<?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['distance_traveled'] : (($is_inserted) ? $trip_ticket['distance_traveled'] : "") ?>" class="form-control" id="distance-traveled" name="distance_traveled"  placeholder="Distance Traveled (Per No. 5 above)">
                                  </div>
                                </div>   
                              </fieldset>  
                              <div class="form-group row">
                                <label for="remark" class="col-sm-4 col-form-label">Remarks</label>
                                <div class="col-sm-8">
                                  <textarea class="form-control" name="remark" id="remark" cols="30" rows="2" placeholder="Remarks"><?php echo ( strtolower($request['status']) == "approved") ? $trip_ticket['remark'] :  (($is_inserted) ? $trip_ticket['remark'] : "") ?></textarea>
                                </div>
                              </div>
                            </fieldset> 
                            <hr>
                            <div class="form-group row">
                              <div class="col-sm-12 text-right">

                                <?php  
                                  if( strtolower( $request['status'] ) == "approved"){
                                ?> 
                                    <button type="button" id="delete-btn" data-approved-id="<?php echo $trip_ticket['id'] ?>" data-request-id="<?php echo $request['id'] ?>"  class="btn btn-danger"> <i class="fa fa-trash"></i> Delete</button>
                                    <button type="submit" class="btn btn-warning"> <i class="fa fa-pen"></i> Update</button>
                                    <button type="button" id="disapproved-btn" class="btn btn-danger"> <i class="fa fa-times"></i> Disapproved</button>
                                <?php
                                  }else{
                                ?>
                                    <a href="<?php echo base_url() ?>request" class="btn btn-danger"> <i class="fa fa-times"></i> Cancel</a>
                                <?php 
                                    if($is_inserted){
                                ?> 
                                      <button type="submit"  class="btn btn-warning"> <i class="fa fa-pen"></i> Update</button>
                                <?php 
                                    }else{
                                ?>
                                      <button type="submit" class="btn btn-warning"> <i class="fa fa-folder-plus"></i> Save</button>
                                <?php
                                    }
                                ?>
                                    <button type="button" id="approved-btn" class="btn btn-primary"> <i class="fa fa-check"></i> Approved</button>
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
    <!-- BEGIN BASE JS -->
    
	<?php $this->view('layout/js') ?>  
  <script src="https://uselooper.com/assets/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery.print/jQuery.print.min.js"></script> 
  <script src="<?php echo base_url() ?>assets/javascript/sweetalert.js"></script>
  <script src="<?php echo base_url() ?>assets/javascript/add_trip_ticket.js"></script>  
  
  </body>
</html>