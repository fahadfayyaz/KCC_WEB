
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Car_manufacturers extends CI_controller{

public function __construct(){


	parent:: __construct();
	$this->load->model('car_manufacturers_model','manufacturer');
	$this->load->model('cars_for_sale_model','sales');


		}
	
	public function detail($manufacturer_name){

		$row = $this->manufacturer->show_by($manufacturer_name);
		if (!$row) show_404();

		$this->db->where([
			'manufacturer_name' => $row->manufacturer_name
		]);
		$data['sales'] = $this->sales->show_all();
		$data['title'] = $row->manufacturer_name;
		$this->load->view('car_manufacturers/detail', $data);

}



}

