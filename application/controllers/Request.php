<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Request extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('id')  ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Request"; 
        $this->load->view('admin/request', $data); 
	}

    
	public function get_all_request()
	{   
		$request = $this->request_model->get_all_request();  
		 

		if( $request->num_rows() ){ 
			foreach( $request->result_array()  as $row ){ 
				$date = date('m/d/Y', strtotime($row['request_date']));
				$name = ucwords($row['lastname'] . "," . $row['firstname'] . " " . $row['middlename']  . " " . $row['suffix'] );
				$row['name'] = $name;
				$row['request_date'] = $date;
				$data['data'][] = $row;
			} 
		}else{
			$data['data'] = array();
		}
 
		
		echo json_encode($data); 
	
	}

    public function insert()
    {
        $data = array(
			'driver' => $this->input->post('driver'),
			'gasoline_type' => $this->input->post('gasoline_type'),
			'liter' => $this->input->post('liter'),
			'plate_number' => $this->input->post('plate_number'),
			'request_date' => $this->input->post('request_date'),
			'file_type' => $this->input->post('file_type'),
			'status' => "Pending", 
		);  

		$insert = $this->request_model->insert($data);
		if($insert){

			$data = array(
				'response' => true,
				'message'  => 'Data inserted successfully!',
			);
  
		}else{ 
			$data = array(
				'response' => false,
				'message'  => 'This value is already in the list.',
			);
		} 
		
        echo json_encode($data);
    }
 

	
	public function get_request($id)
	{ 

		$data = array(
			"id" => $id,
		);

		$data = $this->request_model->get_request($data);

		$driver = $this->driver_model->get_driver(['id' => $data['driver']]);
		$driver_name = $driver['lastname'] . ', ' . $driver['firstname'] . ' ' . $driver['middlename'] . ' ' . $driver['suffix'];
		
		$vehicle_type = $this->vehicle_type_model->get_vehicle_type(['id' => $data['driver']]);
		$plate_number = $vehicle_type['vehicle_type'] . ' (' . $vehicle_type['plate_number']  . ')';

		$data['driver_name'] = $driver_name;
		$data['vehicle'] = $plate_number;
 

		echo json_encode($data);
	}
	

	
	public function update($id)
	{ 
 
		
		$data = array(
			'id' => $id,
			'driver' => $this->input->post('driver'),
			'gasoline_type' => $this->input->post('gasoline_type'),
			'liter' => $this->input->post('liter'),
			'plate_number' => $this->input->post('plate_number'),
			'request_date' => $this->input->post('request_date'), 
		);  
        
		$update = $this->request_model->update($data);
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
		$this->trip_ticket_model->delete_using_request($id);
		$delete = $this->request_model->delete($id);

		$this->trip_ticket_model->delete_using_request($id);
        $this->receipt_model->delete($id);



		if($delete){  
			$data = array(
				'response' => true,
				'message'  => 'Data deleted successfully!',
			);
		}else{
			$data = array(
				'response' => false,
			);
		}

		echo json_encode($data);
	}
 
        
}
         