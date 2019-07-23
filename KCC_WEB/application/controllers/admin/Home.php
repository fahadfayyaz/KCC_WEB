<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_model', 'member');
	}

	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('/admin/auth/login', $data);
	}

	public function validate()
	{
		$where = [
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
		];

		$query = $this->member->validate_credentials($where);
		if ($query) 
		{
			$data = [
				'fullname' => $query->fullname,
				'email' => $query->email,
				'member_id' => $query->id,
				'is_logged_in' => TRUE,
			];
			
			$this->session->set_userdata( $data );
			redirect('/admin/car_manufacturers','refresh');
		}
		else
		{
			$this->session->set_flashdata('message', 'Invalid Email or Password');
			redirect('/admin/home','refresh');
		}
	}


	public function change_password()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('old_password', 'Old Password' , 'required');
			$this->form_validation->set_rules('new_password', 'NewPassword ' , 'required');
			$this->form_validation->set_rules('retype_password', 'Retype Password', 'required');
			if ($this->form_validation->run()==TRUE) {
				$old_password = $this->input->post('old_password');
				if ($this->member->verify_password($old_password))
					$data['message'] = "Your password has been changed!";
				else
					$data['message'] = "Oppsss! Something went wrong";

			}
		}
		$data['title'] = "Change Password";
		$data['mainContent'] = '/admin/auth/change_password';
		$this->load->view('/admin/layout/master', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/admin','refresh');
	}


	public function forgot_password()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
		{
			$email = $this->input->post('email');
			$hashKey = random_string('alnum', 50);
			$html = $this->load->view('admin/auth/email_template', ['token' => $hashKey], TRUE);
			$row = $this->member->validate_credentials(['email' => $email]);
			if ($row) 
			{	

				$config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.mailtrap.io',
				  'smtp_port' => 2525,
				  'smtp_user' => '069aa9061a932f',
				  'smtp_pass' => 'b55abea6fb52d1',
				  'mailtype' => 'html',
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
				);

				$this->email->initialize($config);
				$this->email->from('m.fahadmun@gmail.com', 'Karachi Car Collection');
				$this->email->to($email);			
				$this->email->message($html);
				$this->email->send();

				$this->member->update(['email' => $email], ['hash_key' => $hashKey]);
				$data['message'] = "Your password request has been sent";
			}
		}
		else
		{
			$data['message'] = "Email is not valid!";
		}
	
		$data['title'] = "Forgot Password";
		$this->load->view('/admin/auth/forgot_password', $data);
	}

	public function reset($token)
	{
		$where = ['hash_key' => $token];
		$row = $this->member->validate_credentials($where);
		
		if (! $row) show_error("Token has been expired!");
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
		{
			$affected = $this->member->update(['id' => $row->id], [ 
				'password' => $this->input->post('retype_password'),
				'hash_key' => NULL
			]);

			if ($affected > 0 ) {
				redirect('/admin','refresh');
			}
		}
		
		$data['title'] = "New Password";
		$this->load->view('/admin/auth/reset', $data);
	}
}
