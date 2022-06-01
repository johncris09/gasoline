<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Driver extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();   
        if ( !$this->session->userdata('id')  ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Driver"; 
        $this->load->view('admin/driver', $data); 
	}

	public function get_all_driver()
	{ 
		$driver = $this->driver_model->get_all_driver();  
		if( $driver->num_rows() ){
			foreach( $driver->result_array()  as $row ){ 
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
			'lastname' => trim($this->input->post('lastname')),
			'firstname' => trim($this->input->post('firstname')),
			'middlename' => trim($this->input->post('middlename')),
			'suffix' => trim($this->input->post('suffix')), 
		);  
        
		$insert = $this->driver_model->insert($data);
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
 
	public function get_driver($id)
	{ 

		$data = array(
			"id" => $id,
		);

		$data = $this->driver_model->get_driver($data);

		echo json_encode($data);
	}
	
	public function update($id)
	{ 
 
		
		$data = array(
			'id' => $id,
			'lastname' => trim($this->input->post('lastname')),
			'firstname' => trim($this->input->post('firstname')),
			'middlename' => trim($this->input->post('middlename')),
			'suffix' => trim($this->input->post('suffix')), 
		);  
        
		$update = $this->driver_model->update($data);
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
		$delete = $this->driver_model->delete($id);

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
         