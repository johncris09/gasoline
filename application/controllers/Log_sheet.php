<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Log_sheet extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();   
        if ( !$this->session->userdata('id')  ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Equipment Log Sheet"; 
        $this->load->view('admin/log_sheet', $data); 
	}

    
    function get_all_log_sheet()
    {
        
        if($_SESSION['role_type'] == 1){
            $log_sheet = $this->log_sheet_model->get_all_log_sheet();  
		}else{
			$office = array(
				'office' => $_SESSION['office'],
			);
			$log_sheet = $this->log_sheet_model->log_sheet_model_in_office($office);
		}




		if( $log_sheet->num_rows() ){ 
            foreach( $log_sheet->result_array()  as $row ){ 
                $row['driver_name'] = strtoupper($row['lastname'] . ', ' . $row['firstname']  . ' ' . $row['middlename'] . ' ' . $row['suffix'] ) ;
                $approved_date = date('m/d/Y', strtotime($row['approved_date']));
                $row['approved_date'] = $approved_date;
                $data['data'][] = $row; 
    
            } 
            
		}else{
			$data['data'] = array();
		} 
        echo json_encode($data); 



    }

    
    public function for_approval($request_id)
	{ 
        $data['page_title'] = "Equipment Log Sheet"; 
        $data['request'] = $this->request_model->get_request(['id' => $request_id]);
        $driver_id = $data['request']['driver'];
        $vehile_type_id = $data['request']['plate_number'];
        $driver = $this->driver_model->get_driver(['id' => $driver_id]);
        $data['driver_name'] = strtoupper( $driver['lastname'] . ", " . $driver['firstname']  . " " . $driver['middlename'] . " " . $driver['suffix'] );
        
        $data['vehicle_type'] = $this->vehicle_type_model->get_vehicle_type(['id' => $vehile_type_id]);
        $data['calculation'] = $this->calculation_model->get_all_calculation();

        $data['trip_ticket'] = $this->trip_ticket_model->get_trip_ticket(['request_id' => $request_id]);
        $data['receipt'] = $this->receipt_model->get_receipt(['request_id' => $request_id]);
        
        // check first if item already inserted
        $data['is_inserted'] = $this->trip_ticket_model->is_inserted(['request_id' => $request_id]);
        // var_dump($data['trip_ticket']);
        $this->load->view('admin/add_log_sheet', $data); 
	}

     


    
    public function view($request_id)
	{ 
        $data['page_title'] = "Equipment Log Sheet";  
        $data['request'] = $this->request_model->get_request(['id' => $request_id]);
        $driver_id = $data['request']['driver'];
        $vehile_type_id = $data['request']['plate_number'];
        $driver = $this->driver_model->get_driver(['id' => $driver_id]);
        $data['driver_name'] = strtoupper( $driver['lastname'] . ", " . $driver['firstname']  . " " . $driver['middlename'] . " " . $driver['suffix'] );
        
        $data['vehicle_type'] = $this->vehicle_type_model->get_vehicle_type(['id' => $vehile_type_id]);
        $data['calculation'] = $this->calculation_model->get_all_calculation();

        $data['trip_ticket'] = $this->trip_ticket_model->get_trip_ticket(['request_id' => $request_id]);
        $data['receipt'] = $this->receipt_model->get_receipt(['request_id' => $request_id]);

        if($_SESSION['role_type'] == 1){
            $this->load->view('admin/add_log_sheet', $data); 
		}else{
            $data['is_inserted'] = $this->trip_ticket_model->is_inserted(['request_id' => $request_id]);
            $this->load->view('user/add_log_sheet', $data);

		}
	} 


    public function insert()
    {  
        // check first if item already inserted
        $is_inserted = $this->trip_ticket_model->is_inserted(['request_id' => $this->input->post('request_id')]);

        if($is_inserted){ 
            // approved request
            $this->approved_request( $this->input->post('request_id') ); 
            $data = array(
                'response' => true,
                'message'  => 'Request Approved Successfully!',
            ); 

        }else{

            $data = array(
                'request_id' => trim($this->input->post('request_id')),
                'approved_date' => $this->input->post('date'),   
                'add_purchase_during_the_trip' => $this->input->post('add_purchase_during_the_trip'),
                'remark' => $this->input->post('remark'),
                'file_type' => $this->input->post('file_type'),
            ); 
            $insert = $this->trip_ticket_model->insert($data);

            if($insert){ 

                if($_SESSION['role_type'] == 1){ 
                    $data = array(
                        'response' => true,
                        'message'  => 'Data Inserted Successfully!',
                    );


                }else{
                    $data = array(
                        'response' => true,
                        'message'  => 'Request Sent Successfully!',
                    );
                }  
    
            }else{ 
                $data = array(
                    'response' => false,
                    'message'  => 'Something went wrong.',
                );
            }  
            
        } 
		
        echo json_encode($data);


    }


    

    // public function approved_request($request_id)
    // {  
	// 	$data = array(
	// 		'id' => $request_id,
	// 		'status' => "Approved", 
	// 	);  
        
	// 	$update = $this->request_model->update($data); 
	// } 
    
    
    public function update($trip_ticket_id)
    { 

        $data = array(
            'id' => $trip_ticket_id,
            'request_id' => trim($this->input->post('request_id')),
            'approved_date' => $this->input->post('date'),   
            'add_purchase_during_the_trip' => $this->input->post('add_purchase_during_the_trip'),
            'remark' => $this->input->post('remark'), 
        ); 

        
        
		$update = $this->trip_ticket_model->update($data);
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

    

    public function approved_request($request_id)
    {  
        // check first if item already inserted
        $is_inserted = $this->trip_ticket_model->is_inserted(['request_id' => $request_id]);
         
        if($is_inserted){

            $data = array(
            	'id' => $request_id,
            	'status' => "Approved", 
            );  
            
            $update = $this->request_model->update($data); 

            if($update){


            	$data = array(
            		'response' => true,
            		'message'  => 'Successfully Approved!',
            	);
    
            }else{ 
            	$data = array(
            		'response' => false,
            		'message'  => 'Something went wrong.',
            	);
            } 


        }else{
            $data = array(
                'response' => false,
                'message'  => 'To approve the request, create a Equipment Log Sheet first.',
            );
    
        } 
		
        echo json_encode($data);


	} 

    
    
    public function disapproved_request($request_id)
    {  
		$data = array(
			'id' => $request_id,
			'status' => "Pending", 
		);  
        
		$update = $this->request_model->update($data); 

        if($update){


			$data = array(
				'response' => true,
				'message'  => 'Successfully Disapproved!',
			);
  
		}else{ 
			$data = array(
				'response' => false,
				'message'  => 'Something went wrong.',
			);
		} 
 
		
        echo json_encode($data);


	}








    // where id = request id
	public function delete($id)
	{  
        $this->update_request_status($_POST['request_id']);
		$delete = $this->trip_ticket_model->delete_using_request($id);  
 
		if($delete){  
			$data = array(
				'response' => true,
				'message'  => 'Data Disapproved Successfully!',
			);
		}else{
			$data = array(
				'response' => false,
			);
		}

        
        $this->receipt_model->delete($id);

		echo json_encode($data);
	}

    function update_request_status($request_id)
    {
        $data = array(
			'id' => $request_id, 
            'status' => "Pending"
		);  
        
		$update = $this->request_model->update($data);
    }


    public function add($request_id)
	{   
        if($_SESSION['role_type'] == 2){ 
			$data['page_title'] = "Equipment Log Sheet"; 
            $data['request'] = $this->request_model->get_request(['id' => $request_id]);
            $driver_id = $data['request']['driver'];
            $vehile_type_id = $data['request']['plate_number'];
            $driver = $this->driver_model->get_driver(['id' => $driver_id]);
            $data['driver_name'] = strtoupper( $driver['lastname'] . ", " . $driver['firstname']  . " " . $driver['middlename'] . " " . $driver['suffix'] );
            
            $data['vehicle_type'] = $this->vehicle_type_model->get_vehicle_type(['id' => $vehile_type_id]);
            $data['calculation'] = $this->calculation_model->get_all_calculation();

            
            $data['is_inserted'] = $this->trip_ticket_model->is_inserted(['request_id' => $request_id]);
            

            $data['trip_ticket'] = $this->trip_ticket_model->get_trip_ticket(['request_id' => $request_id]); 
             
            $this->load->view('user/add_log_sheet', $data); 
			
		}else {
            show_404();
        }


	}






    



    
 
	   
}    
         