<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver_model extends CI_Model
{
	public $table = "driver";
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_driver()
    { 
        return $this->db 
			->get($this->table)
			->result_array();
    }
}