<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{


	public $table = 'user';
	
    public function __construct()
    {
        parent::__construct();
    }

    public function login($data)
    { 
        return $this->db->where($data)
			->get('user')
			->num_rows();
    }

	
    public function get_all_user()
    { 
        return $this->db 
			->get($this->table)
			->result_array();
    }




    public function get_user($data)
    {  
        $this->db->where($data);
        return $this->db->get('user')->result_array()[0];
    } 
 
 
    public function update($data)
    { 
        return $this->db->where('admin_id', $data['admin_id'])
            ->update('admin', $data);
    }

	
    public function insert_booking($data)
    { 
        $insert = $this->db->insert('user', $data);
        if(!$insert && $this->db->error()['code'] == 1062){
            return false;
        }else{
            return true;
        }
    }


	public function delete($id)
    { 
		return $this->db->delete('user', array('user_id' => $id)); 
    }
 
}