<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('id') ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Dashboard"; 
		$data['pending'] = $this->request_model->num_of_pending();
		$data['approved'] = $this->request_model->num_of_approved();


		$office = $this->vehicle_type_model->get_all_office();  

		foreach($office as $row){
			
			$office_usage_by_office = $this->receipt_model->office_usage_by_office($row['office']);
			foreach($office_usage_by_office  as $j){
				$data['office_usage'][] = array(
					'office' => $row['office'],
					'amount' => ($j['amount'] == NULL) ? 0 : $j['amount'],
				);
			} 
		}

        $this->load->view('admin/dashboard', $data);   
	}

	
    public function signout()
    { 
        
        $all_sessions = $this->session->all_userdata();
        // unset all sessions
        foreach ($all_sessions as $key => $val) {
            $this->session->unset_userdata($key);
        } 
		redirect('login');
    } 

	function barangay_population_chart()
	{
		$data = [];
		$data['table'] = '
			<tr class="text-center">
				<th>#</th>
				<th>Barangay</th>
				<th>Population</th>
			</tr>
		';
		$counter = 0;
		$barangay = $this->barangay_model->get_all_barangay(); 
		foreach( $barangay  as $row ){
			$row['barangay'] = ucwords($row['barangay']); 
			$data['label'][] = $row['barangay'];  
			$data['data'][] = $this->record_model->population_by_barangay($row['barangay']); 
			$data['backgroundColor'][] = 'rgba('.rand(0,255).','.rand(0,255).','.rand(0,255).',0.7)';
			$data['borderColor'][] = 'rgba('.rand(0,255).','.rand(0,255).','.rand(0,255).',0.7)';

			$data['table'] .='<tr>
					<td class="text-center">'.$counter + 1 .'</td>
					<td>'.$row["barangay"].'</td>
					<td class="text-center">'.$data["data"][($counter)].'</td>
				</tr>
			';

			$counter++;

		} 
		echo json_encode($data);



	}

	public function get_office_usage_by_date()
	{ 
		 
		$office = $this->vehicle_type_model->get_all_office();  
		$total = 0;
		foreach($office as $row){
			

			$filter = array(
				'office' => $row['office'],
				'from' => date('Y-m-d', strtotime($_POST['from'])) ,
				'to' => date('Y-m-d', strtotime($_POST['to'])) ,
			);


			$office_usage_by_office_and_date = $this->receipt_model->office_usage_by_office_and_date($filter);
			foreach($office_usage_by_office_and_date  as $j){ 
				$data['office_usage'][] = array(
					'office' => $row['office'],
					'amount' => ($j['amount'] == NULL) ? 0 : $j['amount'],
				);
				$total+=$j['amount'];
			} 
		} 

		$data['total'] = $total;
		$data['from'] = date('M d, Y', strtotime($_POST['from']));
		$data['to'] = date('M d, Y', strtotime($_POST['to']));
		
		echo json_encode($data);
	}
        
}
         