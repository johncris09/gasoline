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
		foreach( $vehicle_type  as $row ){
			// $row['name'] = ucwords($row['name']);
			// $row['barangay'] = ucwords($row['barangay']);
			// $row['purok'] = ($row['purok'] != null) ? ucwords($row['purok']) : '';
			// $row['precinct'] = ($row['precinct'] != null) ? ucwords($row['precinct']) : ''; 
			$data['data'][] = $row; 

		} 
		echo json_encode($data);

	
	}
 
        
}
         