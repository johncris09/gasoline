<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

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


	// Get a list of all bookings that haven't been authorized yet.
    public function get_all_bookonline()
    { 
        return $this->db 
			->where('user.barangay = barangay.barangay_id')
			->where('approved', 0)
            ->get('user, barangay')
            ->result_array();
    } 


	function get_bookonline($id)
	{
        $this->db->where('user_id', $id);
        return $this->db->get('user')->result_array()[0]; 
	}

	
    public function approved($data)
    { 
        return $this->db->where('user_id', $data['user_id'])
            ->update('user', $data);
    }

	

	// Get a list of all bookings that haven't been authorized yet.
    public function get_all_approved()
    { 
        return $this->db 
			->where('user.barangay = barangay.barangay_id')
			->where('approved', 1)
            ->get('user, barangay')
            ->result_array();
    } 

	public function total_bookonline()
	{
		return $this->db  
			->where('approved', 0)
            ->get('user')
			->num_rows();
            // ->result_array();
	}

	public function total_approved()
	{
		return $this->db  
			->where('approved', 1)
            ->get('user')
			->num_rows(); 
	}

	public function total_book_today()
	{
		return $this->db    
			->where('date(booking_date) = curdate()')
            ->get('user')
			->num_rows(); 
	}
 
    public function search_record($data)
    { 
        return $this->db->where($data)
			->get('user')
			->num_rows();
    }

	// get user profile base on session
	public function get_user_profile($data)
	{ 
		return $this->db->where($data)
			->get('user')
			->result_array()[0]; 
	}
    public function update_profile($data)
    { 
        return $this->db->where('user_id', $data['user_id'])
            ->update('user', $data);
    }


	// get oldest booking who are approved
	// and users that are not schedule
	public function get_oldest_booking()
	{
		return $this->db 
			->where('user.barangay = barangay.barangay_id')
			->where('approved', 1)
			->where('is_schedule', 0)
			->order_by("booking_date", "asc")
			->limit( $this->config->item('person_per_day'))
            ->get('user, barangay')
            ->result_array();
		
	}

	function get_booking_per_day()
	{
		return $this->db  
			->select('date(booking_date) as date, count(booking_date)   as value ') 
			->order_by("date(booking_date)", "asc") 
			->group_by('
			date(booking_date)')
            ->get('user')
            ->result_array(); 

	}

	function get_all_defer()
	{
		return $this->db 
			->where('user.barangay = barangay.barangay_id')
			->where('vaccination_status', 'defer')
            ->get('user, barangay')
            ->result_array();
		
	}

	function get_all_user_for_vital_sign()
	{
		return $this->db 
			->where('user.barangay = barangay.barangay_id')
			->where('approved', 1)
			->where('vaccination_status', 'consent')
            ->get('user, barangay')
            ->result_array();
	}

	function get_all_user_for_inoculation()
	{
		return $this->db 
			->where('user.barangay = barangay.barangay_id')
			->where('approved', 1)
			->where('vaccination_status', 'inoculation')
            ->get('user, barangay')
            ->result_array();
		
	}

	function get_all_user_for_postmonitoring()
	{
		return $this->db 
			->where('user.barangay = barangay.barangay_id')
			->where('approved', 1)
			->where('vaccination_status', 'post monitoring')
            ->get('user, barangay')
            ->result_array();
		
	}
}