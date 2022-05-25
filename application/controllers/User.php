<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('id')  ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "User"; 
        $this->load->view('admin/user', $data); 
	}

	public function get_all_user()
	{ 
		$user = $this->user_model->get_all_user(); 
		foreach( $user  as $row ){ 
            if($row['role_type'] == 1){
                $row['role_type'] = "Admin";
            }else if($row['role_type'] == 2){
                $row['role_type'] = "User";
            }
            $row['password'] = null;
			$data['data'][] = $row; 

		} 
		echo json_encode($data); 
	
	}
 
        
}
         