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
        $data['office'] = $this->vehicle_type_model->get_all_office();
        $this->load->view('admin/user', $data); 
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

    
    public function insert()
    {
        $data = array(
			'name' => trim($this->input->post('name')),
			'email' => trim($this->input->post('email')),
			'username' => trim($this->input->post('username')),
			'password' => md5(trim($this->input->post('password'))), 
			'role_type' => $this->input->post('role_type'), 
			'office' => $this->input->post('office'), 
		);  
        
		$insert = $this->user_model->insert($data);
		if($insert){

			$data = array(
				'response' => true,
				'message'  => 'Data Inserted Successfully!',
			);
  
		}else{ 
			$data = array(
				'response' => false,
				'message'  => 'Something went wrong.',
			);
		} 
 
		
        echo json_encode($data);
    }
 
	public function get_user($id)
	{ 

		$data = array(
			"id" => $id,
		);

		$data = $this->user_model->get_user($data);
		unset($data['password']); //remove password from array 

		echo json_encode($data);
	}
	
	public function update($id)
	{ 
 
		
		$data = array(
			'id' => $id,
			'name' => trim($this->input->post('name')),
			'email' => trim($this->input->post('email')),
			'username' => trim($this->input->post('username')),
			'role_type' => $this->input->post('role_type'), 
			'office' => $this->input->post('office'), 
		);  
        
		$update = $this->user_model->update($data);
		if($update){

			$data = array(
				'response' => true,
				'message'  => 'Data Updated Successfully!',
			);
  
		}else{ 
			$data = array(
				'response' => false,
				'message'  => 'Something went wrong.',
			);
		} 



		echo json_encode($data);
	}
	
	
	public function update_password($id)
	{ 
 
		
		$data = array(
			'id' => $id,
			'password' => trim($this->input->post('password')), 
		);  
        
		$update = $this->user_model->update($data);
		if($update){

			$data = array(
				'response' => true,
				'message'  => 'Password has been changed successfully!',
			);
  
		}else{ 
			$data = array(
				'response' => false,
				'message'  => 'Something went wrong.',
			);
		} 



		echo json_encode($data);
	}
	



	public function delete($id)
	{  
		$delete = $this->user_model->delete($id);

		if($delete){  
			$data = array(
				'response' => true,
				'message'  => 'Data Deleted Successfully!',
			);
		}else{
			$data = array(
				'response' => false,
			);
		}

		echo json_encode($data);
	}
		
}
         