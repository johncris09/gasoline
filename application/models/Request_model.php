<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request_model extends CI_Model
{
	public $table = "request";
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_request()
    {   
        return $this->db
            ->select('request.*, driver.*, vehicle_type.*, request.id as request_id')
            ->where('request.driver = driver.id')
            ->where('request.plate_number = vehicle_type.id')
            ->order_by('request.request_date desc, request.id desc')
			->get('request`, driver, vehicle_type');
    }

    public function get_all_request_in_office($data)
    {   
        return $this->db
            ->select('request.*, driver.*, vehicle_type.*, request.id as request_id')
            ->where('request.driver = driver.id')
            ->where('request.plate_number = vehicle_type.id')
            ->where('vehicle_type.office', $data['office'])
            ->order_by('request.request_date', 'desc')
			->get('request`, driver, vehicle_type');
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

    public function num_of_pending()
    {
        return $this->db 
            ->where('status', 'pending')
			->get($this->table)
			->num_rows();
    }

    
    public function num_of_approved()
    {
        return $this->db 
            ->where('status', 'approved')
			->get($this->table)
			->num_rows();
    }

    
    public function get_request($data)
    {  
        $this->db->where($data); 
        
        $request =  $this->db->get($this->table);
        if($request->num_rows() > 0)
            return $request->result_array()[0];
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


}