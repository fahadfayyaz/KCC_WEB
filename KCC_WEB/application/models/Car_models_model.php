<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Car_models_model extends CI_Model {

	public function create($options)
	{
		$this->db->insert('fnf110_carmodel', $options);
		return $this->db->insert_id();
	}

	public function get_all()
	{
		$query = $this->db->get('fnf110_carmodel');
		return $query->result();
	}

	public function get_by($model_id)
	{
		$this->db->where('id', $model_id);
		$query = $this->db->get('fnf110_carmodel');
		return $query->row();
	}

	public function update($model_id, $options)
	{
		$this->db->where('id', $model_id);
		$this->db->update('fnf110_carmodel', $options);
		return $this->db->affected_rows();	
	}

	public function remove($model_id)
	{
		$this->db->where('id', $model_id);
		$this->db->delete('fnf110_carmodel');
		return $this->db->affected_rows();
	}	
public function count_all()
	{
		$query = $this->db->get('fnf110_carmodel');
		return $query->num_rows();
	}
public function carmodels_array()
	{
		$carmodels = [];
		foreach ($this->get_all() as $key => $carmodel) {
			$carmodels[$carmodel->id] = $carmodel->model_name;
		}

		return $carmodels;
	}
}

/* End of file Brand_model.php */
/* Location: ./application/models/Brand_model.php */