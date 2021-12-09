<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchases extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mod_adm');
		$this->load->model('Main');
		$this->load->model('Purchase/Mod_purchases');
		$this->load->helper('string');
	}
	public function index()
	{
		
		$src = $this->input->post('src');
		$data = $this->main_data();
		$data['src'] = $src;
		if (!empty($src) OR $src != '') {
			$data['data'] 	= $this->Mod_purchases->get_purchases_limit_src($data['pg']['limit'],$data['pg']['offset'],$src)->result();
		}else{
			$data['data'] 	= $this->Mod_purchases->get_purchases_limit($data['pg']['limit'],$data['pg']['offset'])->result();
		}

		$this->Main->content($data['module']['name'],'purchase/purchases', $data);
	}
	function main_data(){
		$role_id = $this->session->userdata('role_id');

		$offset = $this->uri->segment(2);
		$data['total'] = $this->Mod_purchases->get_purchases_total()->row_array();
		$path = base_url().$this->path();
	
		$data['pg'] = $this->Main->pagination($offset,$data['total']['row'],$path);
		$data['module'] = $this->Mod_adm->get_module_by_kode('PURCHASES')->row_array();
		$data['rm'] 	= $this->Mod_adm->get_role_module_rel($role_id,$data['module']['id'])->row_array();	
		return $data;
	}
	function path(){
		$data = $this->Mod_adm->get_module_by_kode('PURCHASES')->row_array();
		return $data['path'];
	}
	function edit(){
		$id = $this->uri->segment(2);
		$data = $this->main_data();
		$data['data'] 			= $this->Mod_purchases->get_purchases_id($id)->row_array();
		$kode 					= $data['data']['kode'];
		$data['cek'] 			= $this->Mod_purchases->get_purchases_lsno()->row_array();
		$data['supplier'] 		= $this->Mod_adm->get_suppliers()->result();
		$data['gudang'] 		= $this->Mod_adm->get_gudang()->result();
		
		if (empty($data['data'])) {
			$data['kode'] = $this->Main->generate_notrx($data['module']['code'],$data['module']['code_length'],$data['cek']['no']);
			$data['action'] = 'Create';
			$data['submit'] = 'Simpan';
		}else{
			$data['kode'] = $kode;
			$data['action'] = 'Edit';
			$data['submit'] = 'Update';
		}
		
		if ($data['rm']['edit'] != 'None') {
			$this->Main->content($data['module']['name'],'purchase/edit_purchases', $data);
		}else{
			$this->Main->content_error($data['module']['name'],'purchase/edit_purchases', $data);
		}
	}
	function insert(){
		$submit = $this->uri->segment(2);
		$kode 	= $this->input->post('kode');
		$cek 	= $this->Mod_purchases->cek_purchases($kode)->row_array();
		$created = $this->session->userdata('user_id');
		$no 	= explode('/', $kode);

		$data_main = array(
			'kode'	=> $kode, 
			'name' 	=> $this->input->post('name'), 
			'item' 	=> $this->input->post('item'), 
			'item_description' 	=> $this->input->post('item_description'), 
			'kode_item' 	=> $this->input->post('kode_item'), 
			'supplier' 		=> $this->input->post('supplier'), 
			'jenis_item' 		=> $this->input->post('jenis_item'), 
			'satuan' 		=> $this->input->post('satuan'), 
			'description' 		=> $this->input->post('description'), 
			'jenis' 		=> $this->input->post('jenis'), 
			'masuk_ke' 		=> $this->input->post('masuk_ke'),  
			'sub_total_item' 		=> str_replace(',', '', $this->input->post('sub_total_item')), 
			'sub_total_terima' 		=> str_replace(',', '', $this->input->post('sub_total_terima')), 
			'harga' 		=> str_replace(',', '', $this->input->post('harga')), 
			'potongan' 		=> str_replace(',', '', $this->input->post('potongan')), 
			'sub_total_harga' 		=> str_replace(',', '', $this->input->post('sub_total_harga')), 
			'total_akhir_harga' 		=> str_replace(',', '', $this->input->post('total_akhir_harga')), 
			'pot_nota_percent' 		=> str_replace(',', '', $this->input->post('pot_nota_percent')), 
			'pot_nota_nilai' 		=> str_replace(',', '', $this->input->post('pot_nota_nilai')), 
			'dp' 		=> str_replace(',', '', $this->input->post('dp')), 
			'kredit' 		=> str_replace(',', '', $this->input->post('kredit')), 
			'pajak_percent' 		=> str_replace(',', '', $this->input->post('pajak_percent')), 
			'pajak_nilai' 		=> str_replace(',', '', $this->input->post('pajak_nilai')), 
			'biaya_lain' 		=> str_replace(',', '', $this->input->post('biaya_lain')), 
			'tambah_total' 		=> $this->input->post('tambah_total'),  
			'no' 		=> $no['0'],  
			'tanggal' 		=> $this->input->post('tanggal'), 
			'jatuh_tempo' 		=> $this->input->post('jatuh_tempo'), 
			'status' 		=> 'Pembelian',  
		);

		if ($submit == 'Update') {
				$data_b = array(
					'updated_at' 	=> date('Y-m-d H:i:s'),
					'updated_by' 	=> $created,
				);
				$data = array_merge($data_main, $data_b);
			$this->Mod_purchases->update_purchases($data,$cek['id']);
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

			$this->Mod_purchases->insert_purchases($data);
				$err = 0;
			}else{
				$err = 1;
			}
		}
		echo json_encode($err);
	}
	function delete(){
		$id = $this->uri->segment(2);
		$this->Mod_purchases->delete_purchases($id);
		redirect(base_url().$this->path());
	}
	function insert_purchase_item(){
		$kode = $this->input->post('kode');
		$item = $this->Mod_adm->get_items_kode($kode)->row_array();
		
		if($item){
		$data = array(
					'kode_item' 	=> $item['kode'],
					'jumlah' 		=> 1,
					'satuan' 		=> $item['satuan_dasar'],
					'harga' 		=> $item['harga_pokok'],
					'total' 		=> $item['harga_pokok'],
				);
		$this->Mod_purchases->insert_purchase_item($data);
		}
		echo json_encode($item);
	}

}
?>