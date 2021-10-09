<?php

class Login extends CI_Controller{

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('m_login');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('v_login');
	}

	public function proses_login()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());
			$this->load->view('v_login');
		}else{
			$this->m_login->proses_login($user,$pass);
		}
	}

	public function logout()
	{
		if ($this->session->userdata('level') == 'Anggota'){
			$this->session->unset_userdata('level');
		}else{
			$this->session->unset_userdata($sess);
		}
		$this->session->sess_destroy();
		redirect('');
	}
}