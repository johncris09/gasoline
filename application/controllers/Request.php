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
		foreach( $request  as $row ){
            $date = date('m/d/Y', strtotime($row['request_date']));
            $name = ucwords($row['lastname'] . "," . $row['firstname'] . " " . $row['middlename']  . " " . $row['suffix'] );
			$row['name'] = $name;
            $row['request_date'] = $date;
			$data['data'][] = $row;
		} 
		echo json_encode($data); 
	
	}
 
 
        
}
         