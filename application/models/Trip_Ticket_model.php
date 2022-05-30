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

    
}