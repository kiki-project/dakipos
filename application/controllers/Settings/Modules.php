<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modules extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mod_adm');
		$this->load->model('Main');
		$this->load->helper('string');
	}
	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		
		if ($user_id == 1) {
			$data['rm']['access'] = 'Enabled';
		}else{
			$data['rm']['access'] = 'Disabled';
		}

		$data['module'] 	= $this->Mod_adm->get_modules()->result();
		$this->Main->content('Modules','settings/module', $data);
	}

}
