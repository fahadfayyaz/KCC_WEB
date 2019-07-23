<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Carssold_model extends CI_Model {

	public function create($options)
	{
		$this->db->insert('fnf110_carssold', $options);
		return $this->db->insert_id();
	}

	public function get_all($limit = NULL, $offset = NULL)
	{
		$this->db->order_by('car_sold_id','desc');
		$query = $this->db->get('fnf110_carssold', $limit, $offset);
		return $query->result();
	}
public function count_all()
	{
		$query = $this->db->get('fnf110_carssold');
		return $query->num_rows();
	}

	public function get_by($soldId)
	{
		$this->db->where('car_sold_id', $soldId);
		$query = $this->db->get('fnf110_carssold');
		return $query->row();
	}

	public function update($soldId, $options)
	{
		$this->db->where('car_sold_id', $soldId);
		$this->db->update('fnf110_carssold', $options);
		return $this->db->affected_rows();	
	}

	public function remove($soldId)
	{
		$this->db->where('car_sold_id', $soldId);
		$this->db->delete('fnf110_carssold');
		return $this->db->affected_rows();
	}	

public function sold_array()
	{
		$solds = [];
		foreach ($this->get_all() as $key => $sold) {
			$solds[$sold->car_sold_id] = $sold->car_sold_id;
		}

		return $solds;
	}

}

/* End of file Brand_model.php */
/* Location: ./application/models/Brand_model.php */