<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Record extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('id')  ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Voter's List"; 
        $this->load->view('admin/record', $data); 
	}

	public function get_all_record()
	{
		$record = $this->record_model->get_all_record(); 
		foreach( $record  as $row ){
			$row['name'] = ucwords($row['name']);
			$row['barangay'] = ucwords($row['barangay']);
			$row['purok'] = ($row['purok'] != null) ? ucwords($row['purok']) : '';
			$row['precinct'] = ($row['precinct'] != null) ? ucwords($row['precinct']) : '';
			$row['category'] = ($row['category'] != null) ? ucwords($row['category']) : '';
			$row['remarks'] = ($row['remarks'] != null) ? ucwords($row['remarks']) : '';
			$row['reason'] = ($row['reason'] != null) ? ucwords($row['reason']) : '';
			$data['data'][] = $row; 

		} 
		echo json_encode($data);

	
	}
 
        
}
         