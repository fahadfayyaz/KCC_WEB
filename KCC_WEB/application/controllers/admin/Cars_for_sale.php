<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Cars_for_sale extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (! $this->session->userdata('is_logged_in') ) redirect('/admin','refresh');
		$this->load->model('car_manufacturers_model', 'manufacturer');
		$this->load->model('vehicle_categories_model', 'categories');
		$this->load->model('car_models_model', 'model');
		$this->load->model('car_features_model', 'feature');

	}

	
	public function index()
		{
			
			$this->load->model('cars_for_sale_model');
			//create array and assign function of brand model
			if ($this->input->get('q'))
		 		$this->db->like('model_code', $this->input->get('q'), 'BOTH');

		$config['base_url'] = base_url() . 'admin/cars_for_sale/index';
		$config['total_rows'] = $this->cars_for_sale_model->count_all();
		$config['per_page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : '15';
		$config['uri_segment'] = 4;
		$config['num_links'] = 3;
		
		$this->pagination->initialize($config);
		
		if ($this->input->get('q'))
		 		$this->db->like('model_code', $this->input->get('q'), 'BOTH');

			$data['sales'] = $this->cars_for_sale_model->get_all($config['per_page'], $this->uri->segment(4));
			$data['carmodels_array'] = $this->model->carmodels_array();
			$data['carmodels'] = $this->model->get_all();
			//$data['get_modelname'] = $this->cars_for_sale_model->get_modelname(); 
			$data['manufacturer_array'] = $this->manufacturer->car_manufacturers_array();
			$data['categories_array'] = $this->categories->Vehicle_categories_array();
			$data['title'] = 'Manage Cars For Sale';
			$data['mainContent'] = '/admin/cars_for_sale/index';
			$this->load->view('/admin/layout/master', $data);


		}

	public function add()
	{
	 	$this->load->model('cars_for_sale_model');
	
	if ($this->input->server('REQUEST_METHOD') == 'POST') {

		$this->form_validation->set_rules('manufacturer_name', 'manufacturer_name', 'required');
		$this->form_validation->set_rules('model_name', 'model_name', 'required');
		//$this->form_validation->set_rules('car_img', 'car_img', 'required');

		$this->form_validation->set_rules('vehicle_category_code', 'vehicle_category_code', 'required');
		$this->form_validation->set_rules('asking_price', 'asking_price', 'required');
		$this->form_validation->set_rules('current_mileage', 'current_mileage', 'required');
		$this->form_validation->set_rules('date_acqired', 'date_acqired', 'required');
		$this->form_validation->set_rules('registration_year', 'registration_year', 'required');
		$this->form_validation->set_rules('other_car_details', 'other_car_details', 'required');
		if ($this->form_validation->run() == TRUE ) 
			{

				$fileUpload = [];
				$hasFileUploaded = FALSE;

				$preferences = [
					'upload_path' => './uploads/',
					'allowed_types' => 'jpg|jpeg|gif|png',
					'encrypt_name'=> TRUE
				];

				$this->upload->initialize($preferences);

				if ( ! $this->upload->do_upload('car_img')){
					$data['error'] = $this->upload->display_errors();
				}
				else{
					$fileUpload = $this->upload->data();
					$hasFileUploaded = TRUE;
				}

				if ($hasFileUploaded) 
				{
					$options = [
						'manufacturer_name' => $this->input->post('manufacturer_name'),
						'model_code' => $this->input->post('model_name'),
						'car_img' => $fileUpload['file_name'],
						'vehicle_category_code' => $this->input->post('vehicle_category_code'),
						'asking_price' => $this->input->post('asking_price'),
						'current_mileage' => $this->input->post('current_mileage'),
						'date_acqired' => $this->input->post('date_acqired'),
						'registration_year' => $this->input->post('registration_year'),
						'other_car_details' => $this->input->post('other_car_details'),
						'status' => 'DEACTIVE'
					];

					$this->cars_for_sale_model->create($options);
					redirect('/admin/cars_for_sale','refresh');
				}
			}
}		
		$data['manufacturers'] = $this->manufacturer->get_all();
		$data['categorieses'] = $this->categories->get_all();
		$data['carmodels'] = $this->model->get_all();
		$data['title'] = 'Add Car For Sale';
		$data['mainContent'] = '/admin/cars_for_sale/add';
		$this->load->view('/admin/layout/master', $data);
	}
	
	public function edit($SaleId)
	{
		$this->load->model('cars_for_sale_model');
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
		{
			$fileUpload = [];
			$hasFileUploaded = FALSE;

			$preferences = [
				'upload_path' => './uploads/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'encrypt_name'=> TRUE
			];

			$this->upload->initialize($preferences);

			if ( ! $this->upload->do_upload('car_img')){
				$data['error'] = $this->upload->display_errors();
			}
			else{
				$fileUpload = $this->upload->data();
				$hasFileUploaded = TRUE;
			}
			$options = [
						'manufacturer_name' => $this->input->post('manufacturer_name'),
						'model_code' => $this->input->post('model_code'),
						'car_img' => $fileUpload['file_name'],
						'vehicle_category_code' => $this->input->post('vehicle_category_code'),
						'asking_price' => $this->input->post('asking_price'),
						'current_mileage' => $this->input->post('current_mileage'),
						'date_acqired' => $this->input->post('date_acqired'),
						'registration_year' => $this->input->post('registration_year'),
						'other_car_details' => $this->input->post('other_car_details'),
						'status' => 'DEACTIVE'
					];
			$affected = $this->cars_for_sale_model->update($SaleId, $options);

			if ($affected) 
			{
				if ($hasFileUploaded) 
					if (file_exists('./uploads/' . $this->input->post('img_url')))
						unlink('./uploads/' . $this->input->post('img_url'));
					
				redirect('/admin/cars_for_sale','refresh');
			}
		}

		$data['sale'] = $this->cars_for_sale_model->get_by($SaleId);
		$data['manufacturer'] = $this->manufacturer->get_all();
		$data['categoriese'] = $this->categories->get_all();
		$data['carmodels'] = $this->model->get_all();
		
		$data['title'] = 'Edit Car For Sale';
		$data['mainContent'] = '/admin/cars_for_sale/edit';
		$this->load->view('/admin/layout/master', $data);
	}

	public function delete($SaleId)
	{

		sleep(1);
		$this->load->model('cars_for_sale_model');

		$row = $this->cars_for_sale_model->get_by($SaleId);
		$currentImage = $row->car_img;

		$affected = $this->cars_for_sale_model->remove($SaleId);
		if ($affected) {
			//unlink('./uploads/' . $currentImage);
			echo 1;
		}
	}
	
	public function status($SaleId)
	{
		
		$this->load->model('cars_for_sale_model');
		$row = $this->cars_for_sale_model->get_by($SaleId);

		$newStatus = ($row->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
		$options = [
			'status' => $newStatus
		];
		$this->cars_for_sale_model->update($SaleId, $options);
		echo $newStatus;
	}
		


	public function activeall()
	{
		$this->load->model('cars_for_sale_model');
		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'ACTIVE'
				];
				$this->cars_for_sale_model->update($id, $options);
		  }
			echo 1;
	}

	public function deactiveall()
	{
		$this->load->model('cars_for_sale_model');
		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'DEACTIVE'
				];
			$this->cars_for_sale_model->update($id, $options); 
			
		  }
		  echo 1;
	}
	
}