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
            ->where('request.driver = driver.id')
            ->where('request.plate_number = vehicle_type.id')
			->get('request`, driver, vehicle_type')
			->result_array();
    }
}