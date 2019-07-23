<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Car_models extends CI_Controller {

	public function index()
		{
			
			$this->load->model('car_models_model');
			//create array and assign function of brand model
			$data['models'] = $this->car_models_model->get_all();
	
			$data['mainContent'] = '/admin/car_models/index';
			$this->load->view('/admin/layout/master', $data);

			$data['title'] = 'Manage Car Models';

		}

public function add()
	{
	 	$this->load->model('car_models_model');
	
	if ($this->input->server('REQUEST_METHOD') == 'POST') {
		$this->form_validation->set_rules('model_code', 'model_code', 'required|is_unique[fnf110_carmodel.model_code]');
		$this->form_validation->set_rules('manufacturer_code', 'manufacturer_code', 'required');
		$this->form_validation->set_rules('model_name', 'model_name', 'required');
		if ($this->form_validation->run() == TRUE) {
			# code...

		$options = [
			'model_code' => $this->input->post('model_code'),
			'manufacturer_code' => $this->input->post('manufacturer_code'),
			'model_name' => $this->input->post('model_name')		

		];
		$this->car_models_model->create($options);
		redirect('/admin/car_models','refresh');
	}
}
		$data['title'] = 'Add Car Models';
		$data['mainContent'] = '/admin/car_models/add';
		$this->load->view('/admin/layout/master', $data);
	}
	
	public function edit($modelId)
	{
		$this->load->model('car_models_model');
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$options = [
			'model_code' => $this->input->post('model_code'),
			'manufacturer_code' => $this->input->post('manufacturer_code'),
			'model_name' => $this->input->post('model_name'),
			'status' => 'DEACTIVE'		
			];
			$this->car_models_model->update($modelId, $options);
			redirect('/admin/car_models','refresh');

		}
		$data['models'] = $this->car_models_model->get_by($modelId);
		$data['title'] = 'Edit Car Models';
		$data['mainContent'] = '/admin/car_models/edit';
		$this->load->view('/admin/layout/master', $data);
	}
public function delete($modelId)
	{	
		sleep(1);
		$this->load->model('car_models_model');
		$row = $this->car_models_model->get_by($modelId);
		$affected = $this->car_models_model->remove($modelId);
		echo 1;
			
	}
	public function status($modelId)
	{
		$this->load->model('car_models_model');
		$row = $this->car_models_model->get_by($modelId);

		$newStatus = ($row->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
		$options = [
			'status' => $newStatus
		];
		$this->car_models_model->update($modelId, $options);
		echo $newStatus;
	}
	public function activeall()
	{
		$this->load->model('car_models_model');
		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'ACTIVE'
				];
				$this->car_models_model->update($id, $options);
		  }
			echo 1;
	}

	public function deactiveall()
	{
		$this->load->model('car_models_model');
		  foreach ($this->input->get('checkall') as  $id) {
		  	$options = [
			'status' => 'DEACTIVE'
				];
			$this->car_models_model->update($id, $options); 
			
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