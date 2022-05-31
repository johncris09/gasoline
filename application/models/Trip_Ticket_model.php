<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trip_Ticket_model extends CI_Model
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
            ->order_by('trip_ticket.approved_date', 'desc')
			->get('request`, driver, vehicle_type, trip_ticket')
			->result_array(); 
    }



    
    public function get_trip_ticket($data)
    {  
        $this->db->where($data);
        $trip_ticket =  $this->db->get($this->table);
        if($trip_ticket->num_rows() > 0)
            return $trip_ticket->result_array()[0];
        
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

    


}