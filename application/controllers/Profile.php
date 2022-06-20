<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Profile extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('id')  ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Profile"; 
        $this->load->view('admin/profile', $data); 
	}

	public function get_all_user()
	{ 
		$user = $this->user_model->get_all_user(); 

		if( $user->num_rows() ){
			foreach( $user->result_array()  as $row ){ 
				if($row['role_type'] == 1){
					$row['role_type'] = "Admin";
				}else if($row['role_type'] == 2){
					$row['role_type'] = "User";
				}
				$row['password'] = null;
				$data['data'][] = $row; 

			} 
			echo json_encode($data);
			
		}else{
			$data['data'] = array();
		} 
	}

     
	
        
}
         