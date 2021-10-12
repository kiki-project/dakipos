<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mod_adm');
		$this->load->model('Main');
		$this->load->helper('string');
	}
	public function index()
	{

	}
	function profile(){
		$this->Main->content('Profile','users/profile', '');
	}
	function path(){
		$data = $this->Mod_adm->get_module_by_kode('USERS')->row_array();
		return $data['path'];
	}
	function user_list(){
		$role_id = $this->session->userdata('role_id');
		$data['module'] = $this->Mod_adm->get_module_by_kode('USERS')->row_array();
		$data['role'] 	= $this->Mod_adm->get_role()->result();
		$data['users'] 	= $this->Mod_adm->get_users()->result();
		$data['rm'] 	= $this->Mod_adm->get_role_module_rel($role_id,$data['module']['id'])->row_array();
		$this->Main->content($data['module']['name'],'users/user', $data);
	}
	function insert_user(){
		$created = $this->session->userdata('user_id');

		$user_id 	= $this->input->post('user_id');
		$role_id 	= $this->input->post('role_id');
		$name 		= $this->input->post('name');
		$user 		= $this->input->post('user_name');
		$report_to 	= $this->input->post('report_to');
		$pass 		= $this->input->post('password');
		$repass 	= $this->input->post('confirm_password');
		$submit 	= $this->input->post('submit');

		$cek 	= $this->Mod_adm->get_users_by_username($user)->result();
		if ($submit == 'Simpan') {
			if (!empty($cek)) {
					$alert = $this->Main->alert_danger('Maaf! Terjadi kesalahan');
					$this->session->set_flashdata('msg', $alert);
				redirect(base_url().$this->path());
			}else{
				if ($pass == $repass) {
					$data = array(
									'name' 		=> $name, 
									'user_name' => $user, 
									'password' 	=> md5($pass), 
									'role_id' 	=> $role_id,
									'report_to' => $report_to,
									'created_at' => date('Y-m-d H:i:s'),
									'updated_at' => date('Y-m-d H:i:s'),
									'created_by' => $created,
									'updated_by' => $created,
								);
					$this->Mod_adm->insert_user($data);
					$alert = $this->Main->alert_success('Success! Data berhasil disimpan');
					$this->session->set_flashdata('msg', $alert);
					redirect(base_url().$this->path());
				}else{
					$alert = $this->Main->alert_danger('Maaf! Terjadi kesalahan');
					$this->session->set_flashdata('msg', $alert);
					redirect(base_url().$this->path());
				}
			}
		}elseif ($submit == 'Update') {
			if (!empty($cek)) {
					$data = array(
									'name' 		=> $name, 
									'role_id' 	=> $role_id,
									'report_to' => $report_to,
									'updated_at' => date('Y-m-d H:i:s'),
									'updated_by' => $created,
								);
					$this->Mod_adm->update_user($data,$user_id);
					$alert = $this->Main->alert_success('Success! Data berhasil diupdate');
					$this->session->set_flashdata('msg', $alert);
					redirect(base_url().$this->path());
			}else{
					$data = array(
									'name' 		=> $name, 
									'user_name' => $user, 
									'role_id' 	=> $role_id,
									'report_to' => $report_to,
									'updated_at' => date('Y-m-d H:i:s'),
									'updated_by' => $created,
								);
					$this->Mod_adm->update_user($data,$user_id);
					$alert = $this->Main->alert_success('Success! Data berhasil diupdate');
					$this->session->set_flashdata('msg', $alert);
					redirect(base_url().$this->path());
			}
		}elseif ($submit == 'Reset Password') {
			
				if ($pass == $repass) {
					$data = array(
									'password' 	=> md5($pass), 
									'updated_at' => date('Y-m-d H:i:s'),
									'updated_by' => $created,
								);
					$alert = $this->Main->alert_success('Success! Reset Password berhasil');
					$this->session->set_flashdata('msg', $alert);
					$this->Mod_adm->update_user($data,$user_id);
					redirect(base_url().$this->path());
				}else{
					$alert = $this->Main->alert_danger('Maaf! Terjadi kesalahan');
					$this->session->set_flashdata('msg', $alert);
					redirect(base_url().$this->path());
				}
		}else{
					$alert = $this->Main->alert_danger('Maaf! Terjadi kesalahan');
					$this->session->set_flashdata('msg', $alert);
					redirect(base_url().$this->path());
		}
	}
	function delete_user(){
		$user_id = $this->uri->segment(2);

		$this->Mod_adm->delete_user($user_id);

		$alert = $this->Main->alert_success('Success! Data berhasil dihapus');
		$this->session->set_flashdata('msg', $alert);
		redirect(base_url().$this->path());
	}
	function json_cek_user(){
		$user = $this->input->post('user_name');
		$data 	= $this->Mod_adm->get_users_by_username($user)->result();
		if (!empty($data)) {
			$return = 1;
		}else{
			$return = 0;
		}
		echo json_encode($return);
	}
	function json_get_user(){
		$user_id = $this->input->post('id');
		$data 	= $this->Mod_adm->get_users_by_id($user_id)->row_array();
		echo json_encode($data);
	}

}
