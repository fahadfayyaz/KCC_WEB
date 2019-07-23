<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cars_for_sale_model extends CI_Model {

	public function create($options)
	{
		$this->db->insert('fnf110_carforsale', $options);
		return $this->db->insert_id();
	}

	public function get_all($limit = NULL, $offset = NULL)
	{
		$this->db->order_by('car_for_sale_id','desc');
		$query = $this->db->get('fnf110_carforsale', $limit, $offset);
		return $query->result();
	}
public function count_all()
	{
		$query = $this->db->get('fnf110_carforsale');
		return $query->num_rows();
	}

	public function get_by($saleId)
	{
		$this->db->where('car_for_sale_Id', $saleId);
		$query = $this->db->get('fnf110_carforsale');
		return $query->row();
	}

	public function update($saleId, $options)
	{
		$this->db->where('car_for_sale_Id', $saleId);
		$this->db->update('fnf110_carforsale', $options);
		return $this->db->affected_rows();	
	}

	public function remove($saleId)
	{
		$this->db->where('car_for_sale_Id', $saleId);
		$this->db->delete('fnf110_carforsale');
		return $this->db->affected_rows();
	}	

	public function get_modelname(){

		$this->db->where('model_code');
		$query = $this->db->get('fnf110_carmodel');
		return $query->row();

	}

	public function sale_array()
	{
		$sales = [];
		foreach ($this->get_all() as $key => $sale) {
			$sales[$sale->car_for_sale_Id] = $sale->model_code;
		}

		return $sales;
	}

// front end
	public function show_all()
	{
		$query = $this->db->get('fnf110_carforsale');
		return $query->result();
	}

	public function show_by($model_code)
	{
		$this->db->where('model_code', $model_code);
		$this->db->select('*');    
		$this->db->from('fnf110_carforsale');
		$this->db->join('fnf110_product_gallery', 'fnf110_carforsale.car_for_sale_Id = fnf110_product_gallery.product_id');
		$this->db->join('fnf110_carfeatures', 'fnf110_carforsale.car_for_sale_Id = fnf110_carfeatures.car_for_sale_Id');
		$query = $this->db->get();
		return $query->row();
	}
	public function show_all_by($manufacturer_name)
	{
		$this->db->where('status', 'ACTIVE');
		$this->db->where('manufacturer_name', $manufacturer_name);
		$query = $this->db->get('fnf110_carforsale');
		return $query->result();
	}

	public function latest_product()
	{
		$this->db->where('status', 'ACTIVE');
		$this->db->order_by('car_for_sale_Id', 'desc');
		$this->db->limit(5);
		$query = $this->db->get('fnf110_carforsale');
		return $query->result();
	}

	public function most_viewed()
	{
		$this->db->where('status', 'ACTIVE');
		$this->db->order_by('views', 'desc');
		$this->db->limit(5);
		$query = $this->db->get('fnf110_carforsale');
		return $query->result();
	}


public function update_views($saleId)
	{
		$this->db->set('views', 'views+1', FALSE);
		$this->db->where('car_for_sale_Id', $saleId);
		$this->db->update('fnf110_carforsale');
		return $this->db->affected_rows();

	}




}

/* End of file Brand_model.php */
/* Location: ./application/models/Brand_model.php */