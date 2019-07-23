<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cars_for_sale extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cars_for_sale_model','sales');
		$this->load->model('car_manufacturers_model','manufacturer');
		$this->load->model('product_gallery_model','gallery');
		
	}

public function index()
	{	if ($this->input->get('asking_price')) 
		{
			$priceItem = explode('-', $this->input->get('asking_price'));
			$this->db->where('asking_price >=', $priceItem[0]);
			$this->db->where('asking_price <=', $priceItem[1]);
		}

		if ($this->input->get('registration_year')) 
			$this->db->like('registration_year', $this->input->get('registration_year'), 'BOTH');

		if ($this->input->get('s'))
			$this->db->like('model_code', $this->input->get('s'), 'BOTH');
		
		$data['sales'] = $this->sales->show_all();
		$data['manufacturer'] = $this->manufacturer->show_all();
		
		$data['title'] = "wait for a while";
		$this->load->view('cars_for_sale/index', $data);
	}
	public function detail($model_code)
	{
		$row = $this->sales->show_by($model_code);
		//$this->sales->update_views($row->car_for_sale_Id);


		//$data['relatedProducts'] = $this->sale->show_all();
		$data['car_manufacturers_array'] = $this->manufacturer->car_manufacturers_array();
		$data['sale'] = $row;
		$this->load->view('cars_for_sale/detail', $data);
	}
}