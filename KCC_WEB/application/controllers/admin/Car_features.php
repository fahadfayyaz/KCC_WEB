<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Car_features extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('car_features_model', 'features');
		
		if (! $this->session->userdata('is_logged_in') ) redirect('/admin','refresh');
	}

public function add()
	{

	
	if ($this->input->server('REQUEST_METHOD') == 'POST') {
		$this->form_validation->set_rules('car_feature_description', 'car_feature_description', 'required');
		if ($this->form_validation->run() == TRUE) {
			# code...

			$options = [
				'car_feature_description' => $this->input->post('car_feature_description')
			];
			$this->features->create($options);
			redirect('/admin/cars_for_sale','refresh');
	}
}
		$data['title'] = 'Add Car features';
		$data['mainContent'] = '/admin/car_features/add';
		$this->load->view('/admin/layout/master', $data);
	}
	
	public function edit($features_ID)
	{
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$options = array(
				'car_feature_description' => $this->input->post('car_feature_description')
			);
			$this->features->update($features_ID, $options);
			redirect('/admin/cars_for_sale','refresh');

		}
		$data['feature'] = $this->features->get_by($features_ID);
		$data['mainContent'] = '/admin/car_features/edit';
		$data['title'] = 'Edit Car Features';
		$this->load->view('/admin/layout/master', $data);
	}


}