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
		foreach( $driver  as $row ){ 
			$data['data'][] = $row; 

		} 
		echo json_encode($data);

	
	}
 
        
}
         