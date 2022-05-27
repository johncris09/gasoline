<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calculation_model extends CI_Model
{


	public $table = 'calculation';
	
    public function __construct()
    {
        parent::__construct();
    }
 
    public function get_all_calculation()
    { 
        return $this->db 
			->get($this->table)
			->result_array();
    }

 
}