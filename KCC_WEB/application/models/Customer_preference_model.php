<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_preference_model extends CI_Model {

	public function create($options)
	{
		$this->db->insert('fnf110_customerpreferences', $options);
		return $this->db->insert_id();
	}

	public function get_all($limit = NULL, $offset = NULL)
	{
		$this->db->order_by('customer_preference_id','desc');
		$query = $this->db->get('fnf110_customerpreferences', $limit, $offset);
		return $query->result();
	}
public function count_all()
	{
		$query = $this->db->get('fnf110_customerpreferences');
		return $query->num_rows();
	}

	public function get_by($prefernceId)
	{
		$this->db->where('customer_preference_id', $prefernceId);
		$query = $this->db->get('fnf110_customerpreferences');
		return $query->row();
	}

	public function update($prefernceId, $options)
	{
		$this->db->where('customer_preference_id', $prefernceId);
		$this->db->update('fnf110_customerpreferences', $options);
		return $this->db->affected_rows();	
	}

	public function remove($prefernceId)
	{
		$this->db->where('customer_preference_id', $prefernceId);
		$this->db->delete('fnf110_customerpreferences');
		return $this->db->affected_rows();
	}


}

/* End of file Brand_model.php */
/* Location: ./application/models/Brand_model.php */