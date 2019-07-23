<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_gallery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (! $this->session->userdata('is_logged_in') ) redirect('/admin','refresh');
		$this->load->model('product_gallery_model', 'gallery');
	}

	public function add($product_id)
	{
		$data = [
			'upload_path' => './uploads/',
			'allowed_types' => 'gif|jpg|jpeg|png',
			'encrypt_name' => TRUE
		];
		$this->upload->initialize($data);
		if ($this->upload->do_upload('file')) 
		{
			$file = $this->upload->data();
			$options = array(
				'product_id' => $product_id,
				'gallery_img' => $file['file_name'], 
			);
			$this->gallery->create($options);
			redirect('/admin/cars_for_sale', 'refresh');	
		}
		
		$data['title'] = 'Add Gallery';
		$data['mainContent'] = '/admin/product_gallery/add';
		$this->load->view('/admin/layout/master', $data);
	}
}
