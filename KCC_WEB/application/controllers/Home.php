<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Car_manufacturers_model', 'manufacturer');
		$this->load->model('cars_for_sale_model', 'sales');
	}

	public function index()
	{
		$this->load->view('index');
	}
}
