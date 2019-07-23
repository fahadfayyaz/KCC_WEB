<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Cars_sold extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (! $this->session->userdata('is_logged_in') ) redirect('/admin','refresh');
		$this->load->model('customer_model', 'customer');
		$this->load->model('cars_for_sale_model', 'sale');
		$this->load->model('carssold_model', 'sold');

	}

	
	public function index()
		{
			
			//create array and assign function of brand model
			if ($this->input->get('q'))
		 		$this->db->like('car_for_sale_id', $this->input->get('q'), 'BOTH');

		$config['base_url'] = base_url() . 'admin/cars_sold/index';
		$config['total_rows'] = $this->sold->count_all();
		$config['per_page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : '15';
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;
		
		$this->pagination->initialize($config);
		
		if ($this->input->get('q'))
		 		$this->db->like('car_for_sale_id', $this->input->get('q'), 'BOTH');

			$data['solds'] = $this->sold->get_all($config['per_page'], $this->uri->segment(4));
			$data['customers_array'] = $this->customer->customers_array();
			$data['customers'] = $this->customer->get_all();
			//$data['get_modelname'] = $this->sold->get_modelname(); 
			$data['sale_array'] = $this->sale->sale_array();
			$data['title'] = 'Manage Cars Sold';
			$data['mainContent'] = '/admin/cars_sold/index';
			$this->load->view('/admin/layout/master', $data);


		}

public function add()
	{
	
	if ($this->input->server('REQUEST_METHOD') == 'POST') {

		$this->form_validation->set_rules('car_for_sale_Id', 'car_for_sale_Id', 'required');
		$this->form_validation->set_rules('customer_id', 'customer_id', 'required');
		//$this->form_validation->set_rules('car_img', 'car_img', 'required');

		$this->form_validation->set_rules('agreed_price', 'agreed_price', 'required');
		$this->form_validation->set_rules('date_sold', 'date_sold', 'required');
		$this->form_validation->set_rules('monthly_payment_amount', 'monthly_payment_amount', 'required');
		$this->form_validation->set_rules('monthly_payment_date', 'monthly_payment_date', 'required');
		$this->form_validation->set_rules('other_details', 'other_details', 'required');
		if ($this->form_validation->run() == TRUE ) 
			{
					$options = [
						'car_for_sale_id' => $this->input->post('car_for_sale_Id'),
						'customer_id' => $this->input->post('customer_id'),
						'agreed_price' => $this->input->post('agreed_price'),
						'date_sold' => $this->input->post('date_sold'),
						'monthly_payment_amount' => $this->input->post('monthly_payment_amount'),
						'monthly_payment_date' => $this->input->post('monthly_payment_date'),
						'other_details' => $this->input->post('other_details')
					];

					$this->sold->create($options);
					redirect('/admin/cars_sold','refresh');
				
			}
}		
		$data['customers'] = $this->customer->get_all();
		$data['sales'] = $this->sale->get_all();
		$data['title'] = 'Add Cars Sold';
		$data['mainContent'] = '/admin/cars_sold/add';
		$this->load->view('/admin/layout/master', $data);
	}
	
	public function edit($Sold_Id)
	{
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
		{
			
			$options = [
						'car_for_sale_id' => $this->input->post('car_for_sale_id'),
						'customer_id' => $this->input->post('customer_id'),
						'agreed_price' => $this->input->post('agreed_price'),
						'date_sold' => $this->input->post('date_sold'),
						'monthly_payment_amount' => $this->input->post('monthly_payment_amount'),
						'monthly_payment_date' => $this->input->post('monthly_payment_date'),
						'other_details' => $this->input->post('other_details')
					];
			$affected = $this->sold->update($Sold_Id, $options);

			if ($affected) 
			{
					
				redirect('/admin/cars_sold','refresh');
			}
		}

		$data['sold'] = $this->sold->get_by($Sold_Id);
		$data['customer'] = $this->customer->get_all();
		$data['sale'] = $this->sale->get_all();
		$data['title'] = 'Edit Cars Sold';
		$data['mainContent'] = '/admin/cars_sold/edit';
		$this->load->view('/admin/layout/master', $data);
	}

	public function delete($Sold_Id)
	{

		sleep(1);
		$this->sold->get_by($Sold_Id);
		$this->sold->remove($Sold_Id);
		// if ($affected) {
		// 	//unlink('./uploads/' . $currentImage);
		// 	echo 1;
		// }
		echo 1;
	}
	
	public function status($SaleId)
	{
		
		$row = $this->sold->get_by($SaleId);

		$newStatus = ($row->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
		$options = [
			'status' => $newStatus
		];
		$this->sold->update($SaleId, $options);
		echo $newStatus;
	}
		


	public function activeall()
	{
		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'ACTIVE'
				];
				$this->sold->update($id, $options);
		  }
			echo 1;
	}

	public function deactiveall()
	{

		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'DEACTIVE'
				];
			$this->sold->update($id, $options); 
			
		  }
		  echo 1;
	}
	
}