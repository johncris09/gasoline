<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Vehicle_type extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('id')  ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Vehicle type"; 
        $this->load->view('admin/vehicle_type', $data); 
	}

	public function get_all_vehicle_type()
	{ 
		$vehicle_type = $this->vehicle_type_model->get_all_vehicle_type();  

		if( $vehicle_type->num_rows() ){
			foreach( $vehicle_type->result_array()  as $row ){
				$data['data'][] = $row; 
	
			} 
			echo json_encode($data); 
			
		}else{
			$data['data'] = array();
		} 

	}

	
    
    public function insert()
    {
        $data = array(
			'office' => trim($this->input->post('office')),
			'vehicle_type' => trim($this->input->post('vehicle_type')),
			'plate_number' => trim($this->input->post('plate_number')), 
		);  
        
		$insert = $this->vehicle_type_model->insert($data);
		if($insert){

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
 
	public function get_vehicle_type($id)
	{ 

		$data = array(
			"id" => $id,
		); 
		$data = $this->vehicle_type_model->get_vehicle_type($data); 

		echo json_encode($data);
	}
	
	public function update($id)
	{ 
 
		
		$data = array(
			'id' => $id,
			'office' => trim($this->input->post('office')),
			'vehicle_type' => trim($this->input->post('vehicle_type')),
			'plate_number' => trim($this->input->post('plate_number')),  
		);  
        
		$update = $this->vehicle_type_model->update($data);
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
		$delete = $this->vehicle_type_model->delete($id);

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
         