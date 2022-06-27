<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_sheet_model extends CI_Model
{
	public $table = "trip_ticket";
    public function __construct()
    {
        parent::__construct();
    } 

     
	
    public function get_all_log_sheet()
    { 
        return $this->db
            ->select('trip_ticket.*, request.*, driver.*, vehicle_type.*, trip_ticket.id as trip_ticket_id')
            ->where('request.driver = driver.id')
            ->where('request.plate_number = vehicle_type.id')
            ->where('trip_ticket.request_id = request.id')
            ->where('trip_ticket.file_type', 'log_sheet')
            ->order_by('trip_ticket.approved_date', 'desc')
			->get('request`, driver, vehicle_type, trip_ticket');
    }

    
    
	
    public function log_sheet_model_in_office($data)
    { 
        return $this->db
            ->select('trip_ticket.*, request.*, driver.*, vehicle_type.*, trip_ticket.id as trip_ticket_id')
            ->where('request.driver = driver.id')
            ->where('request.plate_number = vehicle_type.id')
            ->where('trip_ticket.request_id = request.id')
            ->where('trip_ticket.file_type', 'log_sheet')
            ->where('office', $data['office'])
            ->order_by('trip_ticket.approved_date', 'desc')
			->get('request`, driver, vehicle_type, trip_ticket');
    }


}