<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_payments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (! $this->session->userdata('is_logged_in') ) redirect('/admin','refresh');
		$this->load->model('customer_model', 'customer');
		$this->load->model('customer_payments_model', 'payment');
		$this->load->model('carssold_model', 'sold');
		$this->load->model('payment_status_model', 'paystatus');

	}

	
	public function index()
		{
			
			//create array and assign function of brand model
			if ($this->input->get('q'))
		 		$this->db->like('customer_id', $this->input->get('q'), 'BOTH');

		$config['base_url'] = base_url() . 'admin/customer_payments/index';
		$config['total_rows'] = $this->sold->count_all();
		$config['per_page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : '15';
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;
		
		$this->pagination->initialize($config);
		
		if ($this->input->get('q'))
		 		$this->db->like('customer_id', $this->input->get('q'), 'BOTH');

			$data['payments'] = $this->payment->get_all($config['per_page'], $this->uri->segment(4));
			$data['payment_status_array'] = $this->paystatus->payment_status_array();
			$data['customers_array'] = $this->customer->customers_array();
			$data['sold_array'] = $this->sold->sold_array();
			$data['title'] = 'Manage Customers Payment';
			$data['mainContent'] = '/admin/customer_payments/index';
			$this->load->view('/admin/layout/master', $data);


		}

public function add()
	{
	
	if ($this->input->server('REQUEST_METHOD') == 'POST') {

		$this->form_validation->set_rules('car_sold_id', 'car_sold_id', 'required');
		$this->form_validation->set_rules('customer_id', 'customer_id', 'required');
		//$this->form_validation->set_rules('car_img', 'car_img', 'required');

		$this->form_validation->set_rules('payment_status_code', 'payment_status_code', 'required');
		$this->form_validation->set_rules('customer_payment_date_due', 'customer_payment_date_due', 'required');
		$this->form_validation->set_rules('customer_payment_date_made', 'customer_payment_date_made', 'required');
		$this->form_validation->set_rules('actual_payment_amount', 'actual_payment_amount', 'required');
		if ($this->form_validation->run() == TRUE ) 
			{
					$options = [
						'car_sold_id' => $this->input->post('car_sold_id'),
						'customer_id' => $this->input->post('customer_id'),
						'payment_status_code' => $this->input->post('payment_status_code'),
						'customer_payment_date_due' => $this->input->post('customer_payment_date_due'),
						'customer_payment_date_made' => $this->input->post('customer_payment_date_made'),
						'actual_payment_amount' => $this->input->post('actual_payment_amount')
						
					];

					$this->payment->create($options);
					redirect('/admin/customer_payments','refresh');
				
			}
}		

		$data['payments'] = $this->payment->get_all();
		$data['customers'] = $this->customer->get_all();
		$data['statuses'] = $this->paystatus->get_all();
		$data['solds'] = $this->sold->get_all();
		$data['title'] = 'Add Customer Payment';
		$data['mainContent'] = '/admin/customer_payments/add';
		$this->load->view('/admin/layout/master', $data);
	}
	
	public function edit($Sold_Id)
	{
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
		{
				$options = [
						'car_sold_id' => $this->input->post('car_sold_id'),
						'customer_id' => $this->input->post('customer_id'),
						'payment_status_code' => $this->input->post('payment_status_code'),
						'customer_payment_date_due' => $this->input->post('customer_payment_date_due'),
						'customer_payment_date_made' => $this->input->post('customer_payment_date_made'),
						'actual_payment_amount' => $this->input->post('actual_payment_amount')
						
					];
			$affected = $this->payment->update($Sold_Id, $options);

			if ($affected) 
			{
					
				redirect('/admin/customer_payments','refresh');
			}
		}
		$data['payment'] = $this->payment->get_by($Sold_Id);
		// $data['payment1'] = $this->payment->get_all($Sold_Id);
		$data['sold'] = $this->sold->get_all($Sold_Id);
		$data['status'] = $this->paystatus->get_all($Sold_Id);
		$data['customer'] = $this->customer->get_all();
		$data['title'] = 'Edit Customer Payment';
		$data['mainContent'] = '/admin/customer_payments/edit';
		$this->load->view('/admin/layout/master', $data);
	}

	public function delete($Sold_Id)
	{

		sleep(1);
		$this->payment->get_by($Sold_Id);
		$this->payment->remove($Sold_Id);
		// if ($affected) {
		// 	//unlink('./uploads/' . $currentImage);
		// 	echo 1;
		// }
		echo 1;
	}
	
	public function status($SaleId)
	{
		
		$row = $this->payment->get_by($SaleId);

		$newStatus = ($row->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
		$options = [
			'status' => $newStatus
		];
		$this->payment->update($SaleId, $options);
		echo $newStatus;
	}
		


	public function activeall()
	{
		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'ACTIVE'
				];
				$this->payment->update($id, $options);
		  }
			echo 1;
	}

	public function deactiveall()
	{

		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'DEACTIVE'
				];
			$this->payment->update($id, $options); 
			
		  }
		  echo 1;
	}
	
}