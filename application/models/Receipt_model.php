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

        return [
            'has_receipt' => 0,
        ];
        
    } 

    public function has_receipt($data)
    {
        return $this->db
            ->where($data)
            ->get($this->table)
            ->num_rows();
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

    
    public function delete($id)
    {
        return $this->db
            ->where('request_id', $id)
            ->delete($this->table);
    }

    public function office_usage_by_office($office)
    {
        
        return $this->db
            ->select('vehicle_type.office as office, sum(receipt.amount) as amount')
            ->where('receipt.plate_number = vehicle_type.id')
            ->where('vehicle_type.office', $office)
			->get('receipt, vehicle_type')
            ->result_array();

    }

    
    public function office_usage_by_office_and_date($data)
    {
        
        return $this->db
            ->select('vehicle_type.office as office, sum(receipt.amount) as amount')
            ->where('receipt.plate_number = vehicle_type.id')
            ->where('vehicle_type.office', $data['office'])
            ->where('receipt.date >= ', $data['from'])
            ->where('receipt.date <= ', $data['to']) 
			->get('receipt, vehicle_type')
            ->result_array();

    }




}