<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mod_adm');
		$this->load->helper('string');
	}
	public function index()
	{
		$this->load->view('login');
	}
	function login()
	{
		$this->load->view('login');
	}

	function cek_login(){
		$user = $this->input->post('user_name');
		$pass = md5($this->input->post('password'));
		
		$data = $this->Mod_adm->cek_login($user,$pass)->row_array();

		if ($data) {
			$this->session->set_userdata('user_id', $data['id']);
			$this->session->set_userdata('name', $data['name']);
			$this->session->set_userdata('user_name', $data['user_name']);
			$this->session->set_userdata('role_name', $data['role_name']);
			$this->session->set_userdata('role_id', $data['role_id']);
			$this->session->set_userdata('dept', $data['dept']);
			if ($data['role'] == 1) {
				# code...
				redirect(base_url().'dashboards');
			}else{
				redirect(base_url());
			}
		}else{
			$alert = '<div class="alert alert-danger" role="alert">
					  username atau password salah!
					</div>';
			$this->session->set_flashdata('msg', $alert);
			redirect(base_url().'login');

		}
	}
	function logout(){
		session_destroy();
		redirect(base_url().'login');

	}

}
