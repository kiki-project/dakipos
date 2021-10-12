<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_sales extends CI_model {

	function cek_sales($kode){
		return $this->db->query("SELECT * FROM sales WHERE kode = '$kode'");
	}
	function get_sales(){
		return $this->db->query("SELECT * FROM sales");
	}
	function get_sales_lskode($kode){
		return $this->db->query("SELECT kode FROM sales WHERE kode LIKE '%$kode%' ORDER BY id DESC");
	}
	function get_sales_limit($limit,$offset){
		return $this->db->query("SELECT * FROM sales LIMIT $limit OFFSET $offset ");
	}
	function get_sales_limit_src($limit,$offset,$src){
		return $this->db->query("SELECT * FROM sales WHERE kode LIKE '%$src%' OR name LIKE '%$src%' LIMIT $limit OFFSET $offset ");
	}
	function get_sales_total(){
		return $this->db->query("SELECT count(id) AS row FROM sales");
	}
	function insert_sales($data){
		$this->db->insert('sales', $data);
	}
	function update_sales($data,$id){
		$this->db->where('id',$id);
		$this->db->update('sales',$data);	
	}
	function delete_sales($id){
		$this->db->where('id',$id);
		$this->db->delete('sales');	
	}
}
