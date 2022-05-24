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
			->get($this->table)
			->result_array();
    }
}