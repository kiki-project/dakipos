<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_suppliers extends CI_model {

	function cek_suppliers($kode){
		return $this->db->query("SELECT * FROM suppliers WHERE kode = '$kode'");
	}
	function get_suppliers(){
		return $this->db->query("SELECT * FROM suppliers");
	}
	function get_suppliers_lskode($kode){
		return $this->db->query("SELECT kode FROM suppliers WHERE kode LIKE '%$kode%' ORDER BY id DESC");
	}
	function get_suppliers_limit($limit,$offset){
		return $this->db->query("SELECT * FROM suppliers ORDER BY created_at DESC  LIMIT $limit OFFSET $offset ");
	}
	function get_suppliers_limit_src($limit,$offset,$src){
		return $this->db->query("SELECT * FROM suppliers WHERE kode LIKE '%$src%' OR name LIKE '%$src%' ORDER BY created_at DESC  LIMIT $limit OFFSET $offset ");
	}
	function get_suppliers_total(){
		return $this->db->query("SELECT count(id) AS row FROM suppliers");
	}
	function insert_suppliers($data){
		$this->db->insert('suppliers', $data);
	}
	function update_suppliers($data,$id){
		$this->db->where('id',$id);
		$this->db->update('suppliers',$data);	
	}
	function delete_suppliers($id){
		$this->db->where('id',$id);
		$this->db->delete('suppliers');	
	}
}
