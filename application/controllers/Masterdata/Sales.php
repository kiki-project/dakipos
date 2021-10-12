<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mod_adm');
		$this->load->model('Main');
		$this->load->model('Masterdata/Mod_sales');
		$this->load->helper('string');
	}
	public function index()
	{
		
		$src = $this->input->post('src');
		$data = $this->main_data();
		$data['src'] = $src;
		if (!empty($src) OR $src != '') {
			$data['data'] 	= $this->Mod_sales->get_sales_limit_src($data['pg']['limit'],$data['pg']['offset'],$src)->result();
		}else{
			$data['data'] 	= $this->Mod_sales->get_sales_limit($data['pg']['limit'],$data['pg']['offset'])->result();
		}

		$this->Main->content($data['module']['name'],'masterdata/sales', $data);
	}
	function main_data(){
		$role_id = $this->session->userdata('role_id');

		$offset = $this->uri->segment(2);
		$data['total'] = $this->Mod_sales->get_sales_total()->row_array();
		$path = base_url().$this->path();
	
		$data['pg'] = $this->Main->pagination($offset,$data['total']['row'],$path);
		$data['module'] = $this->Mod_adm->get_module_by_kode('SALES')->row_array();
		$data['rm'] 	= $this->Mod_adm->get_role_module_rel($role_id,$data['module']['id'])->row_array();	
		return $data;
	}
	function path(){
		$data = $this->Mod_adm->get_module_by_kode('SALES')->row_array();
		return $data['path'];
	}
	function edit(){
		$kode = $this->uri->segment(2);
		$data = $this->main_data();
		$data['data'] 			= $this->Mod_sales->cek_sales($kode)->row_array();
		$data['cek'] 			= $this->Mod_sales->get_sales_lskode($data['module']['code'])->row_array();
		$data['sales']	 		= $this->Mod_adm->get_sales()->result();
		$data['wilayah']	 	= $this->Mod_adm->get_regions()->result();
		$data['sub_wilayah']	= $this->Mod_adm->get_region_sub()->result();
		
		if (empty($data['data'])) {
			$data['kode'] = $this->Main->generate_code($data['module']['code'],$data['module']['code_length'],$data['cek']['kode']);
			$data['action'] = 'Create';
			$data['submit'] = 'Simpan';
		}else{
			$data['kode'] = $kode;
			$data['action'] = 'Edit';
			$data['submit'] = 'Update';
		}
		
		if ($data['rm']['edit'] != 'None') {
			$this->Main->content($data['module']['name'],'masterdata/edit_sales', $data);
		}else{
			$this->Main->content_error($data['module']['name'],'masterdata/edit_sales', $data);
		}
	}
	function insert(){
		$submit = $this->uri->segment(2);
		$kode 	= $this->input->post('kode');
		$cek 	= $this->Mod_sales->cek_sales($kode)->row_array();
		$created = $this->session->userdata('user_id');

		$data_main = array(
			'kode'	=> $kode, 
			'name' 	=> $this->input->post('name'), 
			'alamat' 	=> $this->input->post('alamat'), 
			'telepon' 	=> $this->input->post('telepon'), 
			'fax' 		=> $this->input->post('fax'), 
			'kota' 		=> $this->input->post('kota'), 
			'provinsi' 	=> $this->input->post('provinsi'), 
			'negara' 	=> $this->input->post('negara'), 
			'kode_pos' 	=> $this->input->post('kode_pos'), 
			'email' 	=> $this->input->post('email'), 
			'kontak' 	=> $this->input->post('kontak'), 
			'no_rek' 	=> $this->input->post('no_rek'), 
			'rek_name' 	=> $this->input->post('rek_name'), 
			'bank' 				=> $this->input->post('bank'), 
			'description' 		=> $this->input->post('description'), 
			'sistem_komisi' 		=> $this->input->post('sistem_komisi'), 
			'type_komisi' 			=> str_replace(',', '', $this->input->post('type_komisi')), 
			'nilai_komisi' 				=> str_replace(',', '', $this->input->post('nilai_komisi')), 
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),  
		);

		if ($submit == 'Update') {
				$data_b = array(
					'updated_at' 	=> date('Y-m-d H:i:s'),
					'updated_by' 	=> $created,
				);
				$data = array_merge($data_main, $data_b);
			$this->Mod_sales->update_sales($data,$cek['id']);
				$err = 0;

		}else{

			if (empty($cek)) {
				$data_b = array(
					'created_at' 	=> date('Y-m-d H:i:s'),
					'updated_at' 	=> date('Y-m-d H:i:s'),
					'created_by' 	=> $created,
					'updated_by' 	=> $created,
				);
				$data = array_merge($data_b, $data_main);

			$this->Mod_sales->insert_sales($data);
				$err = 0;
			}else{
				$err = 1;
			}
		}
		echo json_encode($err);
	}
	function delete(){
		$id = $this->uri->segment(2);
		$this->Mod_sales->delete_sales($id);
		redirect(base_url().$this->path());
	}

}
?>