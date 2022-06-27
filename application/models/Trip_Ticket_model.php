<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trip_ticket_model extends CI_Model
{
	public $table = "trip_ticket";
    public function __construct()
    {
        parent::__construct();
    } 

    
    
    public function insert($data)
    {
        
        $insert = $this->db->insert($this->table, $data);
        if(!$insert && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return true;
        }
    }

    
	
    public function get_all_trip_ticket()
    { 
        return $this->db
            ->select('trip_ticket.*, request.*, driver.*, vehicle_type.*, trip_ticket.id as trip_ticket_id')
            ->where('request.driver = driver.id')
            ->where('request.plate_number = vehicle_type.id')
            ->where('trip_ticket.request_id = request.id')
            ->where('trip_ticket.file_type', 'trip_ticket')
            ->order_by('trip_ticket.approved_date', 'desc')
			->get('request`, driver, vehicle_type, trip_ticket');
    }

    
    public function get_all_trip_ticket_in_office($data)
    { 
        return $this->db
            ->select('trip_ticket.*, request.*, driver.*, vehicle_type.*, trip_ticket.id as trip_ticket_id')
            ->where('request.driver = driver.id')
            ->where('request.plate_number = vehicle_type.id')
            ->where('trip_ticket.request_id = request.id')
            ->where('trip_ticket.file_type', 'trip_ticket')
            ->where('vehicle_type.office', $data['office'])
            ->order_by('trip_ticket.approved_date', 'desc')
			->get('request`, driver, vehicle_type, trip_ticket');
    }




    
    public function get_trip_ticket($data)
    {  
        $this->db->where($data);
        $trip_ticket =  $this->db->get($this->table);
        if($trip_ticket->num_rows() > 0)
            return $trip_ticket->result_array()[0];
        return [];
        
    } 
    
    public function update($data)
    { 
        return $this->db
            ->where('id', $data['id'])
            ->update($this->table, $data);
    }

    
    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }


    
    
    public function delete_using_request($id)
    {
        return $this->db
            ->where('request_id', $id)
            ->delete($this->table);
    } 
    
    public function view_report($data)
    {   
        return $this->db
            ->distinct()
            ->select('request.driver, request.plate_number, driver.*, vehicle_type.id as vehicle_type_id, vehicle_type.plate_number as plate_number')
            // ->select('request.*, driver.*, vehicle_type.*, trip_ticket.*, vehicle_type.id as vehicle_type_id')
            ->where('request.plate_number = vehicle_type.id')
            ->where('request.driver = driver.id')
            ->where('trip_ticket.request_id = request.id')
            ->where('approved_date >= ', $data['from'])
            ->where('approved_date <= ', $data['to']) 
            ->order_by('trip_ticket.approved_date', 'desc') 
			->get('trip_ticket , request, vehicle_type, driver');
    }
    
    public function report_by_driver_plate_number($data)
    {
        return $this->db
            ->select('request.*, driver.*, vehicle_type.*, trip_ticket.*, vehicle_type.id as vehicle_type_id')
            ->where('request.plate_number = vehicle_type.id')
            ->where('request.driver = driver.id')
            ->where('trip_ticket.request_id = request.id') 
            ->where('request.driver', $data['driver'])
            ->where('request.plate_number', $data['vehicle_type_id'])
            ->where('approved_date >= ', $data['from'])
            ->where('approved_date <= ', $data['to']) 
            ->order_by('trip_ticket.approved_date', 'desc') 
			->get('trip_ticket , request, vehicle_type, driver')
            ->result_array();



    }


    public function is_inserted($data)
    {
        $this->db->where($data);
        $trip_ticket =  $this->db->get($this->table);
        if($trip_ticket->num_rows() > 0)
            return true;
        return false;
        
    }
}