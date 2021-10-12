<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_customers extends CI_model {

	function cek_customers($kode){
		return $this->db->query("SELECT * FROM customers WHERE kode = '$kode'");
	}
	function get_customers(){
		return $this->db->query("SELECT * FROM customers");
	}
	function get_customers_lskode($kode){
		return $this->db->query("SELECT kode FROM customers WHERE kode LIKE '%$kode%' ORDER BY id DESC");
	}
	function get_customers_limit($limit,$offset){
		return $this->db->query("SELECT * FROM customers LIMIT $limit OFFSET $offset ");
	}
	function get_customers_limit_src($limit,$offset,$src){
		return $this->db->query("SELECT * FROM customers WHERE kode LIKE '%$src%' OR name LIKE '%$src%' LIMIT $limit OFFSET $offset ");
	}
	function get_customers_total(){
		return $this->db->query("SELECT count(id) AS row FROM customers");
	}
	function insert_customers($data){
		$this->db->insert('customers', $data);
	}
	function update_customers($data,$id){
		$this->db->where('id',$id);
		$this->db->update('customers',$data);	
	}
	function delete_customers($id){
		$this->db->where('id',$id);
		$this->db->delete('customers');	
	}
}
