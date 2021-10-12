<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_debts extends CI_model {

	function cek_debts($kode){
		return $this->db->query("SELECT * FROM purchases WHERE kode = '$kode'");
	}
	function get_debts_id($id){
		return $this->db->query("SELECT * FROM purchases WHERE id = '$id'");
	}
	function get_debts(){
		return $this->db->query("SELECT * FROM purchases WHERE kredit > 0");
	}
	function get_debts_lskode($kode){
		return $this->db->query("SELECT kode FROM purchases WHERE kode LIKE '%$kode%' ORDER BY no DESC");
	}
	function get_debts_lsno(){
		return $this->db->query("SELECT no FROM purchases ORDER BY no DESC");
	}
	function get_debts_limit($limit,$offset){
		return $this->db->query("SELECT * FROM purchases WHERE kredit > 0 LIMIT $limit OFFSET $offset ");
	}
	function get_debts_limit_src($limit,$offset,$src){
		return $this->db->query("SELECT * FROM purchases WHERE kredit > 0 AND (kode LIKE '%$src%' OR item LIKE '%$src%' OR kode_item LIKE '%$src%') LIMIT $limit OFFSET $offset ");
	}
	function get_debts_total(){
		return $this->db->query("SELECT count(id) AS row FROM purchases");
	}
	function insert_debts($data){
		$this->db->insert('purchases', $data);
	}
	function update_debts($data,$id){
		$this->db->where('id',$id);
		$this->db->update('purchases',$data);	
	}
	function delete_debts($id){
		$this->db->where('id',$id);
		$this->db->delete('purchases');	
	}
}
