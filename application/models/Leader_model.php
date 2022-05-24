<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leader_model extends CI_Model
{
	public $table = "leader";
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_leader()
    { 
        return $this->db
			// ->limit(10)
			->get($this->table)
			->result_array();
    }
}