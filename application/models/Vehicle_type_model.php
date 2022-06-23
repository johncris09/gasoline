<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vehicle_type_model extends CI_Model
{
	public $table = "vehicle_type";
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_vehicle_type()
    { 
        return $this->db
			// ->limit(10)
			->get($this->table);
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

    public function get_vehicle_type($data)
    {  
        $this->db->where($data);
        return $this->db->get($this->table)->result_array()[0];
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

    public function get_all_office()
    {
        return $this->db
            ->distinct()
            ->select('office')
            ->order_by('office', 'asc')
			->get($this->table)
            ->result_array();
        
    }
}