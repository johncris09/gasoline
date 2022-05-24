<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Login extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( $this->session->userdata('id')  ) { 
            redirect('dashboard'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Login"; 
        $this->load->view('login', $data); 
	}
 
    function login()
    {
        $user = array(
            'username' => $_POST['username'],
            'password' => md5($_POST['password'])
        ); 

		$login = $this->user_model->login($user);  

		if($login){
			$this->set_session($user);
			$data['response'] = true;
		}else{
			$data['response'] = false;
		}

		echo json_encode($data);
		 
    }

	
	
    private function set_session($data)
    {
        $user = $this->user_model->get_user($data);
        unset($user['password']); 
        $this->session->set_userdata($user);  
        $this->session->set_userdata('project_name','gasoline');  
    } 


  
        
}
         