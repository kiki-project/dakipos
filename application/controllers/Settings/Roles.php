<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {
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
		$data['roles'] 	= $this->Mod_adm->get_role()->result();
		$this->Main->content('Roles Management','settings/role', $data);
	}
	function path(){
		$data = 'roles-management/';
		return $data;
	}
	function path_rm(){
		$data = 'role-module/'.$this->uri->segment(2);
		return $data;
	}
	function role_module(){
		$data['modules'] 	= $this->Mod_adm->get_modules()->result();
		$data['role'] 	= $this->Mod_adm->get_role_by_id($this->uri->segment(2))->row_array();
		$this->Main->content('Roles Module','settings/role_module', $data);

	}
	function insert_role(){
		$created 	= $this->session->userdata('user_id');
		$role_id 	= $this->input->post('role_id');
		$name 		= $this->input->post('name');
		$desc 		= $this->input->post('desc');
		$submit 	= $this->input->post('submit');

		if ($submit == 'Simpan') {
		
			$data = array(
					'name' 			=> $name,  
					'description' 	=> $desc,  
					'created_at' 	=> date('Y-m-d H:i:s'),
					'updated_at' 	=> date('Y-m-d H:i:s'),
					'created_by' 	=> $created,
					'updated_by' 	=> $created,
				);
			$alert = $this->Main->alert_success('Data berhasil disimpan!');
			$this->session->set_flashdata('msg', $alert);
			$this->Mod_adm->insert_roles($data);
		}elseif ($submit == 'Update') {
			# code...
			$data = array(
					'name' 			=> $name,  
					'description' 	=> $desc,  
					'updated_at' 	=> date('Y-m-d H:i:s'),
					'updated_by' 	=> $created,
				);
			$alert = $this->Main->alert_success('Data berhasil diupdate!');
			$this->session->set_flashdata('msg', $alert);
			$this->Mod_adm->update_roles($data,$role_id);
		}else{
			$alert = $this->Main->alert_danger('Maaf! Terjadi kesalahan');
			$this->session->set_flashdata('msg', $alert);
		}
		redirect(base_url().$this->path());
	}
	function insert_role_module(){
		$role_id 	= $this->input->post('role_id');
		$module_id 	= $this->input->post('module_id');
		$cek 		= $this->Mod_adm->get_role_module_rel($role_id,$module_id)->row_array();
		$data = array(
					'role_id' 	=> $role_id, 
					'module_id' => $module_id, 
					'access' 	=> $this->input->post('access'), 
					'list' 		=> $this->input->post('list'), 
					'edit' 		=> $this->input->post('edit'), 
					'delete' 	=> $this->input->post('delete'), 
				);
		if (!empty($cek)) {
			$this->Mod_adm->update_role_module($data,$cek['id']);
		}else{
			$this->Mod_adm->insert_role_module($data);
		}
		redirect(base_url().$this->path_rm());
	}
	function delete_role(){
		$role_id = $this->uri->segment(2);

		$this->Mod_adm->delete_roles($role_id);
		$this->Mod_adm->delete_role_modules($role_id);

		$alert = $this->Main->alert_success('Success! Data berhasil dihapus');
		$this->session->set_flashdata('msg', $alert);
		redirect(base_url().$this->path());
	}

	function json_get_role_module(){
		$role_id 	= $this->input->post('role_id');
		$module_id 	= $this->input->post('module_id');
		$data 		= $this->Mod_adm->get_role_module_rel($role_id,$module_id)->row_array();
		echo json_encode($data);
	}
	function json_get_role(){
		$role_id 	= $this->input->post('role_id');
		$data 		= $this->Mod_adm->get_role_by_id($role_id)->row_array();
		echo json_encode($data);
	}
	function set_rows(){
		$path = $this->uri->segment(2);
		$row = $this->input->post('row');
		$this->session->set_userdata('per_page', $row);
		redirect(base_url().$path);
	}

}
