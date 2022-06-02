<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Report extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();   
        if ( !$this->session->userdata('id')  ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Report"; 
        $this->load->view('admin/report', $data); 
	}

    public function view()
	{  
        $date = array(
            'from' => date('Y-m-d', strtotime($_GET['from'])),
            'to' => date('Y-m-d', strtotime($_GET['to'])),
        );
        $view_report = $this->trip_ticket_model->view_report($date);
        
        
        if($view_report->num_rows() > 0 ){
            $data['report'] = $view_report;
            $data['page_title'] = "Report";
            $this->load->view('admin/view_report', $data);
        }else{
            echo '
                <script>
                    alert("No Record Found");
                    location.href="../report"
                </script>
            ';
        }








        // if($view_report->num_rows() > 0 ){
        //     $counter = 0;
        //     foreach($view_report->result_array() as $row){ 

        //         $driver_plate_number = array(
        //             'driver' => $driver_id = $row['driver'],
        //             'vehicle_type_id' => $row['vehicle_type_id']
        //         );

        //         $data['view_report'][] = $row; 
                
        //         // $data['view_report']['report_by_driver_plate_number'][] = $this->trip_ticket_model->report_by_driver_plate_number($driver_plate_number);
        //         $report_by_driver_plate_number = $this->trip_ticket_model->report_by_driver_plate_number($driver_plate_number);
        //         foreach($report_by_driver_plate_number as $j){
        //             $data['view_report'][$counter]['driver'][] =['add' => $j['add_purchase_during_the_trip']];

        //         }
        //         $counter++;
        //     }

        //     echo json_encode($data);
        //     // var_dump($data);
        // }else{
            
        // }
        // // var_dump($data['report']->result_array());
        // // $this->load->view('admin/view_report', $data);

        // $report = array(
        //     array(),
        //     array(),
        // );

        // var_dump($report);
	}
 
 
      
}    
         