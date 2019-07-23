<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_status_model extends CI_Model {

	public function create($options)
	{
		$this->db->insert('fnf110_paymentstatus', $options);
		return $this->db->insert_id();
	}

	public function get_all()
	{
		$query = $this->db->get('fnf110_paymentstatus');
		return $query->result();
	}
	
	public function count_all()
	{
		$query = $this->db->get('fnf110_paymentstatus');
		return $query->num_rows();
	}

	public function get_by($statusId)
	{
		$this->db->where('payment_status_code', $statusId);
		$query = $this->db->get('fnf110_paymentstatus');
		return $query->row();
	}	
	public function payment_status_array()
	{
		$statuses = [];
		foreach ($this->get_all() as $key => $status) {
			$statuses[$status->payment_status_code] = $status->payment_status_description;
		}

		
			return $statuses;
		
	}

}

/* End of file Brand_model.php payment_status_code */
/* Location: ./application/models/Brand_model.php */