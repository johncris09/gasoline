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