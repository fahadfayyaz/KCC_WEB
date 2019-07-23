<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_preference extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (! $this->session->userdata('is_logged_in') ) redirect('/admin','refresh');
		$this->load->model('customer_model', 'customer');
		$this->load->model('customer_preference_model', 'preference');
		$this->load->model('car_features_model', 'feature');

	}

	
	public function index()
		{
			
			//create array and assign function of brand model
			if ($this->input->get('q'))
		 		$this->db->like('customer_id', $this->input->get('q'), 'BOTH');

		$config['base_url'] = base_url() . 'admin/customer_preference/index';
		$config['total_rows'] = $this->preference->count_all();
		$config['per_page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : '15';
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;
		
		$this->pagination->initialize($config);
		
		if ($this->input->get('q'))
		 		$this->db->like('customer_id', $this->input->get('q'), 'BOTH');

			$data['preferences'] = $this->preference->get_all($config['per_page'], $this->uri->segment(4));
			$data['customers_array'] = $this->customer->customers_array();
			$data['feature_array'] = $this->feature->feature_array();
			$data['title'] = 'Manage Customers Preferences';
			$data['mainContent'] = '/admin/customer_preference/index';
			$this->load->view('/admin/layout/master', $data);


		}

public function add()
	{
	
	if ($this->input->server('REQUEST_METHOD') == 'POST') {

		$this->form_validation->set_rules('car_feature_id', 'car_feature_id', 'required');
		$this->form_validation->set_rules('customer_id', 'customer_id', 'required');
		//$this->form_validation->set_rules('car_img', 'car_img', 'required');

		$this->form_validation->set_rules('customer_preference_details', 'customer_preference_details', 'required');
		
		if ($this->form_validation->run() == TRUE ) 
			{
					$options = [
						'car_feature_id' => $this->input->post('car_feature_id'),
						'customer_id' => $this->input->post('customer_id'),
						'customer_preference_details' => $this->input->post('customer_preference_details')
						
					];

					$this->preference->create($options);
					redirect('/admin/customer_preference','refresh');
				
			}
}		

		$data['preferences'] = $this->preference->get_all();
		$data['customers'] = $this->customer->get_all();
		$data['features'] = $this->feature->get_all();
		$data['title'] = 'Add Customer Preference';
		$data['mainContent'] = '/admin/customer_preference/add';
		$this->load->view('/admin/layout/master', $data);
	}
	
	public function edit($preference_Id)
	{
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
		{
				$options = [
						'car_feature_id' => $this->input->post('car_feature_id'),
						'customer_id' => $this->input->post('customer_id'),
						'customer_preference_details' => $this->input->post('customer_preference_details')
						
					];
			$affected = $this->preference->update($preference_Id, $options);

			if ($affected) 
			{
					
				redirect('/admin/customer_preference','refresh');
			}
		}
		$data['preference'] = $this->preference->get_by($preference_Id);
		$data['features'] = $this->feature->get_all($preference_Id);
		$data['customer'] = $this->customer->get_all();
		$data['title'] = 'Edit Customer Preferences';
		$data['mainContent'] = '/admin/customer_preference/edit';
		$this->load->view('/admin/layout/master', $data);
	}

	public function delete($preference_Id)
	{

		sleep(1);
		$this->preference->get_by($preference_Id);
		$this->preference->remove($preference_Id);
		// if ($affected) {
		// 	//unlink('./uploads/' . $currentImage);
		// 	echo 1;
		// }
		echo 1;
	}
	
	public function status($preference_Id)
	{
		
		$row = $this->preference->get_by($preference_Id);

		$newStatus = ($row->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
		$options = [
			'status' => $newStatus
		];
		$this->preference->update($preference_Id, $options);
		echo $newStatus;
	}
		


	public function activeall()
	{
		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'ACTIVE'
				];
				$this->preference->update($id, $options);
		  }
			echo 1;
	}

	public function deactiveall()
	{

		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'DEACTIVE'
				];
			$this->preference->update($id, $options); 
			
		  }
		  echo 1;
	}
	
}