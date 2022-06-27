<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Receipt extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();   
        if ( !$this->session->userdata('id')  ) { 
            redirect('login'); 
        }
    }

    
    public function insert()
    {  
        $data = array(
            'date' => $this->input->post('receipt_date'),
            'request_id' => trim($this->input->post('request_id')),
            'or_number' => trim($this->input->post('or_number')),
            'plate_number' => $this->input->post('plate_number'),
            'gasoline_type' => $this->input->post('gasoline_type'), 
            'liter' => trim($this->input->post('liter')),
            'price_per_liter' => trim($this->input->post('price_per_liter')),
            'amount' => trim($this->input->post('amount')),
            'has_receipt' => 1,
            
        ); 


		$insert = $this->receipt_model->insert($data);

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

    
    public function update($receipt_id)
    { 
 
        $data = array(
            'id' => $this->input->post('receipt_id'),
            'date' => $this->input->post('receipt_date'),
            'request_id' => trim($this->input->post('request_id')),
            'or_number' => trim($this->input->post('or_number')),
            'plate_number' => $this->input->post('plate_number'),
            'gasoline_type' => $this->input->post('gasoline_type'), 
            'liter' => trim($this->input->post('liter')),
            'price_per_liter' => trim($this->input->post('price_per_liter')),
            'amount' => trim($this->input->post('amount')),
        );  

		$update = $this->receipt_model->update($data);
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

	   
}    
         