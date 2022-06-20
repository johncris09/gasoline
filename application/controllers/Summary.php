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

    
    public function view()
	{   
        $date = array(
            'from' => date('Y-m-d', strtotime($_GET['from'])),
            'to' => date('Y-m-d', strtotime($_GET['to'])),
        );
        $view_summary = $this->receipt_model->view_summary($date); 
        
        
        if($view_summary->num_rows() > 0 ){
            $data['summary'] = $view_summary->result_array();
            $data['page_title'] = "View Summary";
            $this->load->view('admin/view_summary', $data);
        }else{
            echo '
                <script>
                    alert("No Record Found");
                    location.href="../report"
                </script>
            ';
        } 
         
    }
 
      
}    
         