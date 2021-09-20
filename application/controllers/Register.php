<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->load->model('M_account'); //call model
	}

	public function index()
	{
		$data['title'] = 'Register Page';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('account/v_register');
		$this->load->view('templates/auth_footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'NAME', 'required');
		$this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
		$this->form_validation->set_rules('password', 'PASSWORD', 'required');
		$this->form_validation->set_rules('password_conf', 'PASSWORD', 'required|matches[password]');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Register Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('account/v_register');
			$this->load->view('templates/auth_footer');
		} else {
			$config['upload_path']          = './assets/img/profile/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 4000;
			$config['max_width']            = 4024;
			$config['max_height']           = 4068;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('userfile')) {
				echo "gagal";
			} else {
				$image = $this->upload->data();
				$image = $image['file_name'];
				$name = $this->input->post('name', TRUE);
				$email = $this->input->post('email');
				$password = md5($this->input->post('password'));

				$data = array(
					'name' => $name,
					'email' => $email,
					'password' => $password,
					'image' => $image
				);
				$this->M_account->save($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please login</div>');
				redirect('home');
			}
		}
	}
}
