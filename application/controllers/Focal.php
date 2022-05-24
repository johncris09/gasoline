<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Focal extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('id')  ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Focal"; 
        $this->load->view('admin/focal', $data); 
	}

	public function get_all_focal()
	{
		$focal = $this->focal_model->get_all_focal(); 
		foreach( $focal  as $row ){
			$row['name'] = ucwords($row['name']);
			$row['barangay'] = ucwords($row['barangay']);
			$row['birthdate'] = ($row['birthdate'] != null) ? ucwords($row['birthdate']) : '';
			$row['position'] = ($row['position'] != null) ? ucwords($row['position']) : ''; 
			$data['data'][] = $row; 

		} 
		echo json_encode($data);

	
	}
 
        
}
         