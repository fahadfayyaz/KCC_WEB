<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Car_manufacturers extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		if (! $this->session->userdata('is_logged_in') ) redirect('/admin','refresh');
	}

	public function index()
		{
	

		$this->load->model('car_manufacturers_model');
		if ($this->input->get('q'))
		 		$this->db->like('manufacturer_name', $this->input->get('q'), 'BOTH');

		$config['base_url'] = base_url() . '/admin/car_manufacturers/index/';
		$config['total_rows'] = $this->car_manufacturers_model->count_all();
		$config['per_page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : '15';
		$config['uri_segment'] = 4;
		$config['num_links'] = 3;
		
		$this->pagination->initialize($config);
		
		if ($this->input->get('q'))
		 		$this->db->like('manufacturer_name', $this->input->get('q'), 'BOTH');

		$data['manufacturers'] = $this->car_manufacturers_model->get_all($config['per_page'], $this->uri->segment(4));
		$data['title'] = 'Manage Car Manufacturers';
		$data['mainContent'] = '/admin/car_manufacturers/index';
		$this->load->view('/admin/layout/master', $data);

		}

public function add()
	{
	 	$this->load->model('car_manufacturers_model');
	
	if ($this->input->server('REQUEST_METHOD') == 'POST') {
		$this->form_validation->set_rules('manufacturer_name', 'manufacturer_name', 'required|is_unique[fnf110_carmanufacturers.manufacturer_name]');
		$this->form_validation->set_rules('manufacturer_Details', 'manufacturer_Details', 'required');
		if ($this->form_validation->run() == TRUE) {
			# code...

		$options = array(
			'manufacturer_name' => $this->input->post('manufacturer_name'),
			'manufacturer_Details' => $this->input->post('manufacturer_Details'),
			'status' => 'DEACTIVE'
						

		);
		$this->car_manufacturers_model->create($options);
		redirect('/admin/car_manufacturers','refresh');
	}
}
		$data['title'] = 'Add Car Manufacturers';
		$data['mainContent'] = '/admin/car_manufacturers/add';
		$this->load->view('/admin/layout/master', $data);
	}
	
	public function edit($manufacturer_Id)
	{
		$this->load->model('car_manufacturers_model');
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$options = array(
				'manufacturer_name' => $this->input->post('manufacturer_name'),
				'manufacturer_Details' => $this->input->post('manufacturer_Details')
			
			);
			$this->car_manufacturers_model->update($manufacturer_Id, $options);
			redirect('/admin/car_manufacturers','refresh');

		}
		$data['manufacturers'] = $this->car_manufacturers_model->get_by($manufacturer_Id);
		$data['mainContent'] = '/admin/car_manufacturers/edit';
		$data['title'] = 'Edit Car Manufacturers';
		$this->load->view('/admin/layout/master', $data);
	}

	public function delete($manufacturer_Id)
	{	
		// sleep(1);
		$this->load->model('car_manufacturers_model');
		$row = $this->car_manufacturers_model->get_by($manufacturer_Id);
		$affected = $this->car_manufacturers_model->remove($manufacturer_Id);
		echo 1;
			
	}
	public function status($manufacturer_Id)
	{
		$this->load->model('car_manufacturers_model');
		$row = $this->car_manufacturers_model->get_by($manufacturer_Id);

		$newStatus = ($row->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
		$options = [
			'status' => $newStatus
		];
		$this->car_manufacturers_model->update($manufacturer_Id, $options);
		echo $newStatus;
	}
	public function activeall()
	{
		$this->load->model('car_manufacturers_model');
		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'ACTIVE'
				];
				$this->car_manufacturers_model->update($id, $options);
		  }
			echo 1;
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

	public function delete_all()
	{
		$manufacturerIDs = $this->input->post('manufacturerIDs');
		foreach ($manufacturerIDs as $id) {
			echo $this->delete($id);
		}
}
}