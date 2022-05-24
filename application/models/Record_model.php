<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Record_model extends CI_Model
{
	public $table = "voters_list";
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_record()
    { 
        return $this->db
			// ->limit(10)
			->get($this->table)
			->result_array();
    }

    function population_by_barangay($barangay)
    {
        
        return $this->db 
            ->where('barangay', $barangay)
			->get($this->table)
			->num_rows();
    }
 
    


}