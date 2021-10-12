<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mod_adm');
		$this->load->model('Main');
		$this->load->helper('string');
	}
	public function index()
	{	
		$role_id = $this->session->userdata('role_id');
		$data['module'] = $this->Mod_adm->get_module_by_kode('DASHBOARDS')->row_array();
		$data['rm'] 	= $this->Mod_adm->get_role_module_rel($role_id,$data['module']['id'])->row_array();
		$this->Main->content($data['module']['name'],'dashboard/index', $data);
	}

}
