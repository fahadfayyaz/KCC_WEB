<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

	public function create($options)
	{
		$this->db->insert('fnf110_customers', $options);
		return $this->db->insert_id();
	}

	public function get_all()
	{
		$query = $this->db->get('fnf110_customers');
		return $query->result();
	}
public function count_all()
	{
		$query = $this->db->get('fnf110_customers');
		return $query->num_rows();
	}

	public function get_by($customer_Id)
	{
		$this->db->where('customer_id', $customer_Id);
		$query = $this->db->get('fnf110_customers');
		return $query->row();
	}

	public function update($customer_Id, $options)
	{
		$this->db->where('customer_id', $customer_Id);
		$this->db->update('fnf110_customers', $options);
		return $this->db->affected_rows();	
	}

	public function remove($customer_Id)
	{
		$this->db->where('customer_id', $customer_Id);
		$this->db->delete('fnf110_customers');
		return $this->db->affected_rows();
	}	

public function customers_array()
	{
		$customers = [];
		foreach ($this->get_all() as $key => $customer) {
			$customers[$customer->customer_id] = $customer->customer_name;
		}

		return $customers;
	}


}




/* End of file Brand_model.php */
/* Location: ./application/models/Brand_model.php */