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
 
 
        
}
         