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

    
    public function insert()
    {
        $data = array(
			'name' => trim($this->input->post('name')),
			'email' => trim($this->input->post('email')),
			'username' => trim($this->input->post('username')),
			'password' => md5(trim($this->input->post('password'))), 
			'role_type' => $this->input->post('role_type'), 
		);  
        
		$insert = $this->user_model->insert($data);
		if($insert){

			$data = array(
				'response' => true,
				'message'  => 'Data inserted successfully!',
			);
  
		}else{ 
			$data = array(
				'response' => false,
				'message'  => 'This value is already in the list.',
			);
		} 
 
		
        echo json_encode($data);
    }
 
 
        
}
         