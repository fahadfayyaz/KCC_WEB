<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Car_manufacturers_model extends CI_Model {

	public function create($options)
	{
		$this->db->insert('fnf110_carmanufacturers', $options);
		return $this->db->insert_id();
	}


	public function get_by($manufacturer_ID)
	{
		$this->db->where('id', $manufacturer_ID);
		$query = $this->db->get('fnf110_carmanufacturers');
		return $query->row();
	}
	public function get_all($limit = NULL , $offset = NULL)
	{
		$query = $this->db->get('fnf110_carmanufacturers', $limit, $offset);
		return $query->result();
	}
	public function update($manufacturer_ID, $options)
	{
		$this->db->where('id', $manufacturer_ID);
		$this->db->update('fnf110_carmanufacturers', $options);
		return $this->db->affected_rows();	
	}

	public function remove($manufacturer_ID)
	{
		$this->db->where('id', $manufacturer_ID);
		$this->db->delete('fnf110_carmanufacturers');
		return $this->db->affected_rows();
	}	

public function count_all()
	{
		$query = $this->db->get('fnf110_carmanufacturers');
		return $query->num_rows();
	}
public function car_manufacturers_array()
	{
		$car_manufacturers = [];
		foreach ($this->get_all() as $key => $car_manufacturer) {
			$car_manufacturers[$car_manufacturer->id] = $car_manufacturer->id;
		}

		return $car_manufacturers;
	}


	/**** FRONTEND DEVELOPMENT ****/
	public function show_all()
	{
		$this->db->where('status', 'ACTIVE');
		$query = $this->db->get('fnf110_carmanufacturers');
		return $query->result();
	}

	public function show_by($manufacturer_name)
	{
		$this->db->where('manufacturer_name',$manufacturer_name);
		$query = $this->db->get('fnf110_carmanufacturers');
		return $query->row();
	}	

	

}

/* End of file Brand_model.php */
/* Location: ./application/models/Brand_model.php */



