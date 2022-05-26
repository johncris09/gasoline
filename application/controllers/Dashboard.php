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
        
}
         