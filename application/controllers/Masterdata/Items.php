<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mod_adm');
		$this->load->model('Main');
		$this->load->helper('string');
	}
	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$this->Mod_adm->deleted_price_units_rel($user_id);
		$this->Mod_adm->deleted_new($user_id);
		
		$src = $this->input->post('src');
		$data = $this->main_data();
		$data['src'] = $src;
		if (!empty($src) OR $src != '') {
			$data['data'] 	= $this->Mod_adm->get_items_limit_src($data['pg']['limit'],$data['pg']['offset'],$src)->result();
		}else{
			$data['data'] 	= $this->Mod_adm->get_items_limit($data['pg']['limit'],$data['pg']['offset'])->result();
		}
		
		$this->Main->content($data['module']['name'],'masterdata/item', $data);
	}
	function main_data(){
		$role_id = $this->session->userdata('role_id');

		$offset = $this->uri->segment(2);
		$data['total'] = $this->Mod_adm->get_items_total()->row_array();
		$path = base_url().$this->path();
	
		$data['pg'] = $this->Main->pagination($offset,$data['total']['row'],$path);
		$data['module'] = $this->Mod_adm->get_module_by_kode('ITEMS')->row_array();
		$data['rm'] 	= $this->Mod_adm->get_role_module_rel($role_id,$data['module']['id'])->row_array();	
		return $data;
	}
	function path(){
		$data = $this->Mod_adm->get_module_by_kode('ITEMS')->row_array();
		return $data['path'];
	}
	function insert_item_types(){
		$cek 	= $this->input->post('cb_item_types');
		$submit = $this->uri->segment(2);
		if ($submit == 'hapus') {
			if (!empty($cek)) {
				foreach ($cek as $id) {
			 		$this->Mod_adm->deleted_item_types($id);
					}
			}
		}elseif ($submit == 'simpan') {
			$kode 	= $this->input->post('kode');
			$cek_kode = $this->Mod_adm->cek_item_types($kode)->result();
			$data = array(
					'kode' => $kode, 
					'description' => $this->input->post('desc'), 
				);
			if (!empty($kode) AND empty($cek_kode)) {
				$this->Mod_adm->insert_item_types($data);
			}
		}
		echo json_encode($submit);
	}
	function insert_item_brands(){
		$cek 	= $this->input->post('cb_item_brands');
		$submit = $this->uri->segment(2);
		if ($submit == 'hapus') {
			if (!empty($cek)) {
				foreach ($cek as $id) {
			 		$this->Mod_adm->deleted_item_brands($id);
					}
			}
		}elseif ($submit == 'simpan') {
			$kode 	= $this->input->post('kode');
			$cek_kode = $this->Mod_adm->cek_item_brands($kode)->result();
			$data = array(
					'kode' => $kode, 
					'description' => $this->input->post('desc'), 
				);
			if (!empty($kode) AND empty($cek_kode)) {
				$this->Mod_adm->insert_item_brands($data);
			}
		}
		echo json_encode($submit);
	}
	function insert_item_units(){
		$cek 	= $this->input->post('cb_item_units');
		$submit = $this->uri->segment(2);
		if ($submit == 'hapus') {
			if (!empty($cek)) {
				foreach ($cek as $id) {
			 		$this->Mod_adm->deleted_item_units($id);
					}
			}
		}elseif ($submit == 'simpan') {
			$kode 	= $this->input->post('kode');
			$cek_kode = $this->Mod_adm->cek_item_units($kode)->result();
			$data = array(
					'kode' => $kode, 
					'description' => $this->input->post('desc'), 
				);
			if (!empty($kode) AND empty($cek_kode)) {
				$this->Mod_adm->insert_item_units($data);
			}
		}
		echo json_encode($submit);
	}
	function insert(){
		$created = $this->session->userdata('user_id');
		$submit = $this->uri->segment(2);
		$id 	= $this->input->post('id');
		$kode 	= $this->input->post('kode');
		$cek 	= $this->Mod_adm->cek_item_id($id)->row_array();
		$cek_kode 	= $this->Mod_adm->cek_items($kode)->row_array();

		$data = array(
			'kode' 	=> $this->input->post('kode'),
			'custom_code' 	=> $this->input->post('custom_code'),
			'type' 	=> $this->input->post('type'), 
			'type_harga' 	=> $this->input->post('type_harga'), 
			'name'	=> $this->input->post('name'), 
			'jenis' => $this->input->post('jenis'), 
			'merek' => $this->input->post('merek'), 
			'rak'	=> $this->input->post('rak'), 
			'hpp' 	=> $this->input->post('hpp'), 
			'pajak' 		=> $this->input->post('pajak'), 
			'status_jual' 	=> $this->input->post('status_jual'), 
			'serial' 		=> $this->input->post('serial'), 
			'satuan_dasar' 	=> $this->input->post('satuan_dasar'), 
			'poin_dasar' 	=> str_replace(',', '', $this->input->post('poin_dasar')), 
			'barcode' 		=> $this->input->post('barcode'), 
			'komisi_sales' 	=> str_replace(',', '', $this->input->post('komisi_sales')), 
			'harga_pokok' 	=> str_replace(',', '', $this->input->post('harga_pokok')), 
			'persentase' 	=> str_replace(',', '', $this->input->post('persentase')), 
			'harga_jual' 	=> str_replace(',', '', $this->input->post('harga_jual')), 
			'stok_minimum' 	=> str_replace(',', '', $this->input->post('stok_minimum')), 
			'supplier' 		=> $this->input->post('supplier'), 
			'description' 	=> $this->input->post('desc'), 
			'finish' 		=> 1, 
			'status'	 	=> 'ok',
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'created_by' 	=> $created,
			'updated_by' 	=> $created,
		);

			if (empty($cek_kode)) {
				$this->Mod_adm->update_item($data,$id);
				$err = 0;
			}else{
				if($cek_kode['id'] == $id){
					$this->Mod_adm->update_item($data,$id);
					$err = 0;
				}else{
					$err = 1;
				}
			}
		
		echo json_encode($err);
	}
	function edit(){
		$seg = $this->uri->segment(2);
		$data = $this->main_data();
		$created = $this->session->userdata('user_id');
		
		$cek_kode = $this->Mod_adm->get_items_lskode()->row_array();
		$new_code = $this->Main->generate_code($data['module']['code'],$data['module']['code_length'],$cek_kode['kode']);
		
		if($seg == 'new'){
			$data['item'] 			= $this->Mod_adm->get_item_status($seg)->row_array();
			if (empty($data['item'])) {
				$add = array(
					'kode' 			=> $new_code,
					'status' 		=> 'new',
					'created_at' 	=> date('Y-m-d H:i:s'),
					'updated_at' 	=> date('Y-m-d H:i:s'),
					'created_by' 	=> $created,
					'updated_by' 	=> $created,
				);
			
				$this->Mod_adm->insert_items($add);
			$data['item'] = $this->Mod_adm->get_item_status($seg)->row_array();

			}
		$data['action'] = 'Create';
		$data['submit'] = 'Simpan';
		}else{
		$data['item'] 			= $this->Mod_adm->cek_items($seg)->row_array();
		$data['action'] = 'Edit';
		$data['submit'] = 'Update';
		}

		$data['item_types'] 	= $this->Mod_adm->get_item_types()->result();
		$data['item_brands'] 	= $this->Mod_adm->get_item_brands()->result();
		$data['item_units'] 	= $this->Mod_adm->get_item_units()->result();
		$data['supplier'] 		= $this->Mod_adm->get_suppliers()->result();
		
		if ($data['rm']['edit'] != 'None') {		
			if (!empty($data['item'])) {
			$this->Main->content($data['module']['name'],'masterdata/edit_item', $data);
			}else{
			$this->Main->content_error($data['module']['name'],'masterdata/edit_item', $data);
			}
		}else{
			$this->Main->content_error($data['module']['name'],'masterdata/edit_item', $data);
		}
	}
	function update_item_img(){

		$kode = $this->uri->segment(2);
		$created = $this->session->userdata('user_id');

		$date 			= 	new DateTime('Asia/Jakarta');
		$rel_id =  strtoupper(random_string('alnum', 16));
		$time = time();
		if(isset($_FILES['img']) && !empty($_FILES['img']['name']))
		{	

			$file 						= $_FILES['img']['name'];
			$explode 					= explode(".", $file);
			$extid 						= end($explode);
			$nm = "IMG_".$time.".".$extid;
			$config['upload_path'] 		= FCPATH.'assets/doc';
			$config['overwrite'] 		= TRUE;
			$config['allowed_types'] 	= 'jpg|png|JPG|PNG|jpeg';
			$config['remove_spaces'] 	= FALSE;
			$config['file_name'] 		= $nm;
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('img'))
			{
				$cek = $this->Mod_adm->cek_items($kode)->row_array();

				$data 	= array(
			  			'img'			=> $nm,
						'updated_at' 	=> date('Y-m-d H:i:s'),
						'updated_by' 	=> $created,
						'assign_id' 	=> $created,
					);
				if (!empty($cek['img'])) {
					unlink(FCPATH.'assets/doc/'.$cek['img']);
				}
			$this->Mod_adm->update_item($data, $cek['id']);
				$result = 1;
			}else{
				$result = 0;

				// $alert = $this->Main->alert_danger('Error! '.print_r($this->upload->display_errors()));
				// $this->session->set_flashdata('msg', $alert);
			}
		}else{
				$result = 0;

		}
		// echo json_encode($_FILES);
		redirect(base_url().'edit-item/'.$kode);

	}

	function delete_item_img(){
		$kode = $this->uri->segment(2);
		$created = $this->session->userdata('user_id');
		$cek = $this->Mod_adm->cek_items($kode)->row_array();

		$data 	= array(
		  			'img'			=> '',
					'updated_at' 	=> date('Y-m-d H:i:s'),
					'updated_by' 	=> $created,
					'assign_id' 	=> $created,
				);

			unlink(FCPATH.'assets/doc/'.$cek['img']);
			$this->Mod_adm->update_item($data, $cek['id']);
		redirect(base_url().'edit-item/'.$kode);
		// echo json_encode(1);

	}
	function delete(){
		$id = $this->uri->segment(2);
		$this->Mod_adm->deleted_price_units_item($id);
		$this->Mod_adm->deleted_item($id);
		redirect(base_url().$this->path());
	}
	function json_get_item_types(){
		$data = $this->Mod_adm->get_item_types()->result();
		echo json_encode($data);
	}
	function json_get_item_brands(){
		$data = $this->Mod_adm->get_item_brands()->result();
		echo json_encode($data);
	}
	function json_get_item_units(){
		$data = $this->Mod_adm->get_item_units()->result();
		echo json_encode($data);
	}
	function json_get_item(){
		$limit = $this->input->post('limit');
		$src = $this->input->post('src');

		if ($src != 'none') {
			$data = $this->Mod_adm->get_items_limit_src($limit,0,$src)->result();
		}else{
			$data = $this->Mod_adm->get_items_limit($limit,0)->result();
		}
		echo json_encode($data);
	}
	function json_get_item_kode(){
		$kode = $this->input->post('kode');
		$data = $this->Mod_adm->get_items_kode($kode)->row_array();
		echo json_encode($data);
	}
	function json_add_price_unit(){
		$item_id = $this->input->post('item_id');
		$cek = $this->Mod_adm->get_price_units($item_id)->result();
		$created = $this->session->userdata('user_id');

		if(empty($cek)){
			$jenis = 'Satuan Dasar';
			$konversi = '1.00';
		}else{
			$jenis = 'Konversi';
			$konversi = '0.00';
		}
		$data = array(
		  		'jenis_satuan'	=> $jenis,
		  		'konversi'		=> $konversi,
		  		'item_id'		=> $item_id,
		  		'poin'			=> '0.00',
		  		'komisi'		=> '0.00',
		  		'proc'			=> '0.00',
			);
		$this->Mod_adm->insert_price_units($data);
	}
	function json_get_price_units(){
		$item_id = $this->input->post('item_id');
		$data = $this->Mod_adm->get_price_units($item_id)->result();
		echo json_encode($data);
	}
	function json_update_price_unit(){
		$id = $this->input->post('id');
		
		$data = array(
		  		'satuan'		=> $this->input->post('satuan'),
		  		'barcode'		=> $this->input->post('barcode'),
		  		'konversi'		=> str_replace(',', '', $this->input->post('konversi')),
		  		'poin'			=> str_replace(',', '', $this->input->post('poin')),
		  		'komisi'		=> str_replace(',', '', $this->input->post('komisi')),
		  		'harga_pokok'	=> str_replace(',', '', $this->input->post('harga_pokok')),
		  		'proc'			=> str_replace(',', '', $this->input->post('proc')),
		  		'proc2'			=> str_replace(',', '', $this->input->post('proc2')),
		  		'proc3'			=> str_replace(',', '', $this->input->post('proc3')),
		  		'harga_jual' 	=> str_replace(',', '', $this->input->post('harga_jual')),
		  		'harga_jual2' 	=> str_replace(',', '', $this->input->post('harga_jual2')),
		  		'harga_jual3' 	=> str_replace(',', '', $this->input->post('harga_jual3')),
			);
		$this->Mod_adm->update_price_units($data,$id);
	}
	function json_delete_price_unit(){
		$id = $this->input->post('id');
		$cek = $this->Mod_adm->get_price_units_id($id)->row_array();
		if($cek['jenis_satuan'] == 'Konversi'){
			$this->Mod_adm->deleted_price_units($id);
		}else{
			$this->Mod_adm->deleted_price_units_item($cek['item_id']);
		}
	}

}
