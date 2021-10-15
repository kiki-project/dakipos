<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_purchases extends CI_model {

	function cek_purchases($kode){
		return $this->db->query("SELECT * FROM purchases WHERE kode = '$kode'");
	}
	function get_purchases_id($id){
		return $this->db->query("SELECT * FROM purchases WHERE id = '$id'");
	}
	function get_purchases(){
		return $this->db->query("SELECT * FROM purchases WHERE status = 'Pembelian'");
	}
	function get_purchases_lskode($kode){
		return $this->db->query("SELECT kode FROM purchases WHERE kode LIKE '%$kode%' ORDER BY id DESC");
	}
	function get_purchases_lsno(){
		return $this->db->query("SELECT no FROM purchases ORDER BY no DESC");
	}
	function get_purchases_limit($limit,$offset){
		return $this->db->query("SELECT * FROM purchases WHERE status = 'Pembelian' ORDER BY created_at DESC LIMIT $limit OFFSET $offset ");
	}
	function get_purchases_limit_src($limit,$offset,$src){
		return $this->db->query("SELECT * FROM purchases WHERE status = 'Pembelian' AND (kode LIKE '%$src%' OR item LIKE '%$src%' OR kode_item LIKE '%$src%') ORDER BY created_at DESC LIMIT $limit OFFSET $offset ");
	}
	function get_purchases_total(){
		return $this->db->query("SELECT count(id) AS row FROM purchases");
	}
	function insert_purchases($data){
		$this->db->insert('purchases', $data);
	}
	function update_purchases($data,$id){
		$this->db->where('id',$id);
		$this->db->update('purchases',$data);	
	}
	function delete_purchases($id){
		$this->db->where('id',$id);
		$this->db->delete('purchases');	
	}
}
