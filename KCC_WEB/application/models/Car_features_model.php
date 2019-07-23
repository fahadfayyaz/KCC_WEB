<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Car_features_model extends CI_Model {

	public function create($options)
	{
		$this->db->insert('fnf110_carfeatures', $options);
		return $this->db->insert_id();
	}
	public function get_by($feature_id)
	{
		$this->db->where('car_feature_id', $feature_id);
		$query = $this->db->get('fnf110_carfeatures');
		return $query->row();
	}
	public function get_all()
	{
		$query = $this->db->get('fnf110_carfeatures');
		return $query->result();
	}
	public function update($feature_id, $option)
	{
		$this->db->where('car_feature_id', $feature_id);
		$this->db->update('fnf110_carfeatures', $option);
		return $this->db->affected_rows();
	}

	public function spec_all($product_id)
	{
		$this->db->where('car_feature_id', $product_id);
		$query = $this->db->get('fnf110_carfeatures');
		if ($query->num_rows() > 0) 
			return $query->row();
		else
			return false;
	}

	public function feature_array()
	{
		$features = [];
		foreach ($this->get_all() as $key => $feature) {
			$features[$feature->car_feature_id] = $feature->car_feature_description;
		}

		return $features;
	}
}

/* End of file Product_specification_model.php */
/* Location: ./application/models/Product_specification_model.php */