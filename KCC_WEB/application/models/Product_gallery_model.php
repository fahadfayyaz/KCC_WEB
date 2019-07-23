<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_gallery_model extends CI_Model {

	 public function create($product_id)
	 {
	 	$this->db->where('product_id', $product_id);
		//$this->db->limit(4);
	 	$query = $this->db->get('fnf110_product_gallery');
	 	return $query->result();
	 }
}

/* End of file Product_gallery_model.php */
/* Location: ./application/models/Product_gallery_model.php */