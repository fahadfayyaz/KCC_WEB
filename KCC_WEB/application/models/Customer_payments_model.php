<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_payments_model extends CI_Model {

	public function create($options)
	{
		$this->db->insert('fnf110_customerpayments', $options);
		return $this->db->insert_id();
	}

	public function get_all($limit = NULL, $offset = NULL)
	{
		$this->db->order_by('customer_payment_id','desc');
		$query = $this->db->get('fnf110_customerpayments', $limit, $offset);
		return $query->result();
	}
public function count_all()
	{
		$query = $this->db->get('fnf110_customerpayments');
		return $query->num_rows();
	}

	public function get_by($paymentId)
	{
		$this->db->where('customer_payment_id', $paymentId);
		$query = $this->db->get('fnf110_customerpayments');
		return $query->row();
	}

	public function update($paymentId, $options)
	{
		$this->db->where('customer_payment_id', $paymentId);
		$this->db->update('fnf110_customerpayments', $options);
		return $this->db->affected_rows();	
	}

	public function remove($paymentId)
	{
		$this->db->where('customer_payment_id', $paymentId);
		$this->db->delete('fnf110_customerpayments');
		return $this->db->affected_rows();
	}


}

/* End of file Brand_model.php */
/* Location: ./application/models/Brand_model.php */