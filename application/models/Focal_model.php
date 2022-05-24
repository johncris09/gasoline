<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Focal_model extends CI_Model
{
	public $table = "focal";
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_focal()
    { 
        return $this->db
			// ->limit(10)
			->get($this->table)
			->result_array();
    }
}