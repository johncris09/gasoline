<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Trip_ticket extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();   
        if ( !$this->session->userdata('id')  ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Trip Ticket"; 
        $this->load->view('admin/trip_ticket', $data); 
	}

    function get_all_trip_ticket()
    {
        $trip_ticket = $this->trip_ticket_model->get_all_trip_ticket();  


		if( $trip_ticket->num_rows() ){ 
            foreach( $trip_ticket->result_array()  as $row ){ 
                $row['driver_name'] = strtoupper($row['lastname'] . ', ' . $row['firstname']  . ' ' . $row['middlename'] . ' ' . $row['suffix'] ) ;
                $approved_date = date('m/d/Y', strtotime($row['approved_date']));
                $row['approved_date'] = $approved_date;
                $data['data'][] = $row; 
    
            } 
            
		}else{
			$data['data'] = array();
		} 
        echo json_encode($data); 



    }
	
    public function for_approval($request_id)
	{ 
        $data['page_title'] = "Driver's Trip Ticket"; 
        $data['request'] = $this->request_model->get_request(['id' => $request_id]);
        $driver_id = $data['request']['driver'];
        $vehile_type_id = $data['request']['plate_number'];
        $driver = $this->driver_model->get_driver(['id' => $driver_id]);
        $data['driver_name'] = strtoupper( $driver['lastname'] . ", " . $driver['firstname']  . " " . $driver['middlename'] . " " . $driver['suffix'] );
        
        $data['vehicle_type'] = $this->vehicle_type_model->get_vehicle_type(['id' => $vehile_type_id]);
        $data['calculation'] = $this->calculation_model->get_all_calculation();

        $data['trip_ticket'] = $this->trip_ticket_model->get_trip_ticket(['request_id' => $request_id]);
 
        $this->load->view('admin/add_trip_ticket', $data); 
	}

    public function view($request_id)
	{ 
        $data['page_title'] = "Driver's Trip Ticket"; 
        $data['request'] = $this->request_model->get_request(['id' => $request_id]);
        $driver_id = $data['request']['driver'];
        $vehile_type_id = $data['request']['plate_number'];
        $driver = $this->driver_model->get_driver(['id' => $driver_id]);
        $data['driver_name'] = strtoupper( $driver['lastname'] . ", " . $driver['firstname']  . " " . $driver['middlename'] . " " . $driver['suffix'] );
        
        $data['vehicle_type'] = $this->vehicle_type_model->get_vehicle_type(['id' => $vehile_type_id]);
        $data['calculation'] = $this->calculation_model->get_all_calculation();

        $data['trip_ticket'] = $this->trip_ticket_model->get_trip_ticket(['request_id' => $request_id]);
 
        $this->load->view('admin/add_trip_ticket', $data); 
	}


    

    public function insert()
    { 

        $data = array(
            'request_id' => trim($this->input->post('request_id')),
            'approved_date' => $this->input->post('date'),  
            'authorized_passenger' => trim($this->input->post('authorized_passenger')),
            'place_to_be_visited' => trim($this->input->post('place_to_be_visited')),
            'purpose' => trim($this->input->post('purpose')), 
            'authorize_person' => trim($this->input->post('authorize_person')),
            'departure_time_from_office' => $this->input->post('departure_time_from_office'),
            'arrival_time_at_per' => $this->input->post('arrival_time_at_per'),
            'departure_time_from_per_four' => $this->input->post('departure_time_from_per_four'),
            'arrival_time_back_to_office' => $this->input->post('arrival_time_back_to_office'),
            'approximate_distance_tavel' => $this->input->post('approximate_distance_tavel'),
            'tank_balance' => $this->input->post('tank_balance'),
            'issued_office_from_stock' => $this->input->post('issued_office_from_stock'),
            'add_purchase_during_the_trip' => $this->input->post('add_purchase_during_the_trip'),
            'calculation' => $this->input->post('select_calculation'),
            'total' => $this->input->post('total'),
            'deduct_used_during_the_trip' => $this->input->post('deduct_used_during_the_trip'),
            'tank_balance_at_the_end_of_trip' => $this->input->post('tank_balance_at_the_end_of_trip'),
            'gear_oil_issued_or_purchased' => $this->input->post('gear_oil_issued_or_purchased'),
            'lubricating_oil_issued_purchased' => $this->input->post('lubricating_oil_issued_purchased'),
            'grease_issued_purchased' => $this->input->post('grease_issued_purchased'),
            'brake_fluid_issued_purchased' => $this->input->post('brake_fluid_issued_purchased'),
            'at_the_beginning_of_trip' => $this->input->post('at_the_beginning_of_trip'),
            'at_the_end_of_trip' => $this->input->post('at_the_end_of_trip'),
            'distance_traveled' => $this->input->post('distance_traveled'),
            'remark' => $this->input->post('remark'), 
        );
        
        
		$insert = $this->trip_ticket_model->insert($data);
		if($insert){
            
            // approved request
            $this->approved_request($data['request_id']);

			$data = array(
				'response' => true,
				'message'  => 'Data inserted successfully!',
			);
  
		}else{ 
			$data = array(
				'response' => false,
				'message'  => 'Something went wrong.',
			);
		} 
 
		
        echo json_encode($data);


    }

    public function approved_request($request_id)
    {  
		$data = array(
			'id' => $request_id,
			'status' => "Approved", 
		);  
        
		$update = $this->request_model->update($data); 
	} 

    
    public function update($trip_ticket_id)
    { 

        $data = array(
            'id' => $trip_ticket_id,
            'approved_date' => $this->input->post('date'),  
            'authorized_passenger' => trim($this->input->post('authorized_passenger')),
            'place_to_be_visited' => trim($this->input->post('place_to_be_visited')),
            'purpose' => trim($this->input->post('purpose')), 
            'authorize_person' => trim($this->input->post('authorize_person')),
            'departure_time_from_office' => $this->input->post('departure_time_from_office'),
            'arrival_time_at_per' => $this->input->post('arrival_time_at_per'),
            'departure_time_from_per_four' => $this->input->post('departure_time_from_per_four'),
            'arrival_time_back_to_office' => $this->input->post('arrival_time_back_to_office'),
            'approximate_distance_tavel' => $this->input->post('approximate_distance_tavel'),
            'tank_balance' => $this->input->post('tank_balance'),
            'issued_office_from_stock' => $this->input->post('issued_office_from_stock'),
            'add_purchase_during_the_trip' => $this->input->post('add_purchase_during_the_trip'),
            'calculation' => $this->input->post('select_calculation'),
            'total' => $this->input->post('total'),
            'deduct_used_during_the_trip' => $this->input->post('deduct_used_during_the_trip'),
            'tank_balance_at_the_end_of_trip' => $this->input->post('tank_balance_at_the_end_of_trip'),
            'gear_oil_issued_or_purchased' => $this->input->post('gear_oil_issued_or_purchased'),
            'lubricating_oil_issued_purchased' => $this->input->post('lubricating_oil_issued_purchased'),
            'grease_issued_purchased' => $this->input->post('grease_issued_purchased'),
            'brake_fluid_issued_purchased' => $this->input->post('brake_fluid_issued_purchased'),
            'at_the_beginning_of_trip' => $this->input->post('at_the_beginning_of_trip'),
            'at_the_end_of_trip' => $this->input->post('at_the_end_of_trip'),
            'distance_traveled' => $this->input->post('distance_traveled'),
            'remark' => $this->input->post('remark'), 
        );
        
        
		$update = $this->trip_ticket_model->update($data);
		if($update){


			$data = array(
				'response' => true,
				'message'  => 'Data updated successfully!',
			);
  
		}else{ 
			$data = array(
				'response' => false,
				'message'  => 'Something went wrong.',
			);
		} 
 
		
        echo json_encode($data);


    }

    
	public function delete($id)
	{  
        $this->update_request_status($_POST['request_id']);
		$delete = $this->trip_ticket_model->delete($id);

		if($delete){  
			$data = array(
				'response' => true,
				'message'  => 'Data disapproved successfully!',
			);
		}else{
			$data = array(
				'response' => false,
			);
		}

		echo json_encode($data);
	}

    function update_request_status($request_id)
    {
        $data = array(
			'id' => $request_id, 
            'status' => "Pending"
		);  
        
		$update = $this->request_model->update($data);
    }




	   
}    
         