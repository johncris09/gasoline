<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangay_model extends CI_Model
{
	public $table = "barangay";
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_barangay()
    { 
        return $this->db
			// ->limit(10)
			->get($this->table)
			->result_array();
    }
 
    


}