<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

	public function validate_credentials($where)
	{
		$this->db->where($where);
		$query = $this->db->get('fnf110_member');
		if ($query->num_rows() > 0 ) 
		{
			return $query->row();
		}

		return FALSE;
		
	}	

	public function verify_password($old_password)
	{
		$member_id = $this->session->userdata('member_id');
		$where = [
			'id' => $member_id,
			'password' => $old_password
		];
		$this->db->where($where);
		$query = $this->db->get('fnf110_member');

		if ($query->num_rows() > 0 ) 
		{
			$this->db->where($where);
			$this->db->update('fnf110_member', [
				'password' => $this->input->post('retype_password')
			]);
			$affected = $this->db->affected_rows();
			if ($affected > 0 )
				return TRUE;

			return FALSE;
		}
	}
	public function update($where, $options = [])
	{
		$this->db->where($where);
		$this->db->update('fnf110_member', $options);
		return $this->db->affected_rows();	
	}		

}

/* End of file Member_model.php */
/* Location: ./application/models/Member_model.php */