<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	
public function __construct()
	{
		parent::__construct();
		if (! $this->session->userdata('is_logged_in') ) redirect('/admin','refresh');
		$this->load->model('customer_model', 'customer');
		if (! $this->session->userdata('is_logged_in') ) redirect('/admin','refresh');
	}

	public function index()
		{
	
		if ($this->input->get('q'))
		 		$this->db->like('customer_name', $this->input->get('q'), 'BOTH');

		$config['base_url'] = base_url() . '/admin/customer/index/';
		$config['total_rows'] = $this->customer->count_all();
		$config['per_page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : '15';
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;
		
		$this->pagination->initialize($config);
		
		if ($this->input->get('q'))
		 		$this->db->like('customer_name', $this->input->get('q'), 'BOTH');

		$data['customers'] = $this->customer->get_all($config['per_page'], $this->uri->segment(4));
		$data['title'] = 'Manage Customer';
		$data['mainContent'] = '/admin/customer/index';
		$this->load->view('/admin/layout/master', $data);

		}

public function add()
	{
	
	if ($this->input->server('REQUEST_METHOD') == 'POST') {
		$this->form_validation->set_rules('customer_name', 'customer_name', 'required|is_unique[fnf110_customers.customer_name]');
		$this->form_validation->set_rules('contact_no', 'contact_no', 'required');
		$this->form_validation->set_rules('email_address', 'email_address', 'required');
		if ($this->form_validation->run() == TRUE) {
			# code...

		$options = [
			'customer_name' => $this->input->post('customer_name'),
			'contact_no' => $this->input->post('contact_no'),
			'email_address' => $this->input->post('email_address'),
			'customer_details' => $this->input->post('customer_details')
		];
		$this->customer->create($options);
		redirect('/admin/customer','refresh');
	}
}
		$data['title'] = 'Add Customer';
		$data['mainContent'] = '/admin/customer/add';
		$this->load->view('/admin/layout/master', $data);
	}
	
	public function edit($customer_Id)
	{

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
		
		$options = [
			'customer_name' => $this->input->post('customer_name'),
			'contact_no' => $this->input->post('contact_no'),
			'email_address' => $this->input->post('email_address'),
			'customer_details' => $this->input->post('customer_details')
		];
			$this->customer->update($customer_Id, $options);
			redirect('/admin/customer','refresh');

		}
		$data['customers'] = $this->customer->get_by($customer_Id);
		$data['mainContent'] = '/admin/customer/edit';
		$data['title'] = 'Edit Customer';
		$this->load->view('/admin/layout/master', $data);
	}

	public function delete($customer_Id)
	{	
		sleep(1);
		$row = $this->customer->get_by($customer_Id);
		$affected = $this->customer->remove($customer_Id);
		echo 1;
			
	}
	

	public function delete_all()
	{
		$manufacturerIDs = $this->input->post('manufacturerIDs');
		foreach ($manufacturerIDs as $id) {
			echo $this->delete($id);
		}
	}

public function deactiveall()
	{
		$this->load->model('car_manufacturers_model');
		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'DEACTIVE'
				];
			$this->car_manufacturers_model->update($id, $options); 
			
		  }
		  echo 1;
	}

}