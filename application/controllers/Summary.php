<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Summary extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();   
        if ( !$this->session->userdata('id')  ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Summary"; 
        $this->load->view('admin/summary', $data); 
	}
 
      
}    
         