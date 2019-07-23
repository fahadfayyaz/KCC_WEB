<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_categories extends CI_Controller {

public function index()
		{
		$this->load->model('vehicle_categories_model');

		if ($this->input->get('q'))
		 		$this->db->like('vehicle_category_code', $this->input->get('q'), 'BOTH');

		$config['base_url'] = base_url() . '/admin/vehicle_categories/index/';
		$config['total_rows'] = $this->vehicle_categories_model->count_all();
		$config['per_page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : '15';
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;
		
		$this->pagination->initialize($config);
		
		if ($this->input->get('q'))
		 		$this->db->like('vehicle_category_code', $this->input->get('q'), 'BOTH');

		$data['categories'] = $this->vehicle_categories_model->get_all($config['per_page'], $this->uri->segment(4));
		$data['title'] = 'Manage Vehicle categories';
		$data['mainContent'] = '/admin/vehicle_categories/index';
		$this->load->view('/admin/layout/master', $data);

		}

public function add()
	{
	 	$this->load->model('vehicle_categories_model');
	
	if ($this->input->server('REQUEST_METHOD') == 'POST') {
		$this->form_validation->set_rules('vehicle_category_code', 'vehicle_category_code', 'required');
		$this->form_validation->set_rules('vehicle_category_description', 'vehicle_category_description', 'required');
		if ($this->form_validation->run() == TRUE) {
			# code...

		$options = [
			'vehicle_category_code' => $this->input->post('vehicle_category_code'),
			'vehicle_category_description' => $this->input->post('vehicle_category_description'),
			'status' => 'DEACTIVE'
						

		];
		$this->vehicle_categories_model->create($options);
		redirect('/admin/vehicle_categories','refresh');
	}
}
		$data['title'] = 'Add Vehicle Categories';
		$data['mainContent'] = '/admin/vehicle_categories/add';
		$this->load->view('/admin/layout/master', $data);
	}
	
	public function edit($categoryCode)
	{
		$this->load->model('vehicle_categories_model');
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$options = [
				'vehicle_category_code' => $this->input->post('vehicle_category_code'),
				'vehicle_category_description' => $this->input->post('vehicle_category_description'),
				'status' => 'DEACTIVE'
			
			];
			$this->vehicle_categories_model->update($categoryCode, $options);
			redirect('/admin/vehicle_categories','refresh');

		}
		$data['categories'] = $this->vehicle_categories_model->get_by($categoryCode);
		$data['mainContent'] = '/admin/vehicle_categories/edit';
		$this->load->view('/admin/layout/master', $data);
	}


public function delete($categoryCode)
	{	
		sleep(1);
		$this->load->model('vehicle_categories_model');
		$row = $this->vehicle_categories_model->get_by($categoryCode);
		$affected = $this->vehicle_categories_model->remove($categoryCode);
		echo 1;
			
	}
	public function status($categoryCode)
	{
		$this->load->model('vehicle_categories_model');
		$row = $this->vehicle_categories_model->get_by($categoryCode);

		$newStatus = ($row->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
		$options = [
			'status' => $newStatus
		];
		$this->vehicle_categories_model->update($categoryCode, $options);
		echo $newStatus;
	}
	public function activeall()
	{
		$this->load->model('vehicle_categories_model');
		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'ACTIVE'
				];
				$this->vehicle_categories_model->update($id, $options);
		  }
			echo 1;
	}

	public function deactiveall()
	{
		$this->load->model('vehicle_categories_model');
		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'DEACTIVE'
				];
			$this->vehicle_categories_model->update($id, $options); 
			
		  }
		  echo 1;
	}

	public function delete_all()
	{
		$manufacturerIDs = $this->input->post('manufacturerIDs');
		foreach ($manufacturerIDs as $id) {
			echo $this->delete($id);
		}
}

}