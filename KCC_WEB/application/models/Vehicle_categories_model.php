<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_categories_model extends CI_Model {

	public function create($options)
	{
		$this->db->insert('fnf110_vehiclecategories', $options);
		return $this->db->insert_id();
	}

	public function get_all()
	{
		$query = $this->db->get('fnf110_vehiclecategories');
		return $query->result();
	}

	public function get_by($category_id)
	{
		$this->db->where('id', $category_id);
		$query = $this->db->get('fnf110_vehiclecategories');
		return $query->row();
	}

	public function update($category_id, $options)
	{
		$this->db->where('id', $category_id);
		$this->db->update('fnf110_vehiclecategories', $options);
		return $this->db->affected_rows();	
	}

	public function remove($category_id)
	{
		$this->db->where('id', $category_id);
		$this->db->delete('fnf110_vehiclecategories');
		return $this->db->affected_rows();
	}	
	public function count_all()
	{
		$query = $this->db->get('fnf110_vehiclecategories');
		return $query->num_rows();
	}

public function Vehicle_categories_array()
	{
		$vehicle_categories = [];
		foreach ($this->get_all() as $key => $Vehicle_category) {
			$vehicle_categories[$Vehicle_category->id] = $Vehicle_category->id;
		}

		return $vehicle_categories;
	}
}

/* End of file Brand_model.php */
/* Location: ./application/models/Brand_model.php */