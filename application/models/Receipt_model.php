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
 

}