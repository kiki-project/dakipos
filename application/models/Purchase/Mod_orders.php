<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_orders extends CI_model {

	function cek_orders($kode){
		return $this->db->query("SELECT * FROM purchases WHERE kode = '$kode'");
	}
	function get_orders_id($id){
		return $this->db->query("SELECT * FROM purchases WHERE id = '$id'");
	}
	function get_orders(){
		return $this->db->query("SELECT * FROM purchases WHERE status = 'Pesanan'");
	}
	function get_orders_lskode($kode){
		return $this->db->query("SELECT kode FROM purchases WHERE kode LIKE '%$kode%' ORDER BY no DESC");
	}
	function get_orders_lsno(){
		return $this->db->query("SELECT no FROM purchases ORDER BY no DESC");
	}
	function get_orders_limit($limit,$offset){
		return $this->db->query("SELECT * FROM purchases WHERE status = 'Pesanan' ORDER BY created_at DESC LIMIT $limit OFFSET $offset ");
	}
	function get_orders_limit_src($limit,$offset,$src){
		return $this->db->query("SELECT * FROM purchases WHERE status = 'Pesanan' AND (kode LIKE '%$src%' OR item LIKE '%$src%' OR kode_item LIKE '%$src%') ORDER BY created_at DESC LIMIT $limit OFFSET $offset ");
	}
	function get_orders_total(){
		return $this->db->query("SELECT count(id) AS row FROM purchases");
	}
	function get_orders_finish($created){
		return $this->db->query("SELECT * FROM purchases WHERE finish = 0 AND created_by = $created");
	}
	function insert_orders($data){
		$this->db->insert('purchases', $data);
	}
	function update_orders($data,$id){
		$this->db->where('id',$id);
		$this->db->update('purchases',$data);	
	}
	function delete_orders($id){
		$this->db->where('id',$id);
		$this->db->delete('purchases');	
	}
}
