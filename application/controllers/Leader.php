<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Leader extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('id')  ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Leaders"; 
        $this->load->view('admin/leader', $data); 
	}

	public function get_all_leader()
	{
		$leader = $this->leader_model->get_all_leader(); 
		foreach( $leader  as $row ){
			$row['name'] = ucwords($row['name']);
			$row['barangay'] = ucwords($row['barangay']);
			$row['purok'] = ($row['purok'] != null) ? ucwords($row['purok']) : '';
			$row['precinct'] = ($row['precinct'] != null) ? ucwords($row['precinct']) : ''; 
			$data['data'][] = $row; 

		} 
		echo json_encode($data);

	
	}
 
        
}
         