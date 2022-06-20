<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Receipt_model extends CI_Model
{
	public $table = "receipt";
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

    
    
    public function get_receipt($data)
    {  
        $this->db->where($data);
        $receipt =  $this->db->get($this->table);
        if($receipt->num_rows() > 0)
            return $receipt->result_array()[0];
        
    } 

    
    public function update($data)
    { 
        return $this->db
            ->where('id', $data['id'])
            ->update($this->table, $data);
    }
    
    
    public function view_summary($data)
    {   
        return $this->db
            ->where('receipt.plate_number = vehicle_type.id')
            ->where('date >= ', $data['from'])
            ->where('date <= ', $data['to']) 
            ->order_by('date', 'desc') 
			->get('receipt, vehicle_type');
    }



}