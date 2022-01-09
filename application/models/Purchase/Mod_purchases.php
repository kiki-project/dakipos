<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_purchases extends CI_model {

	function cek_purchases($kode){
		return $this->db->query("SELECT *,(SELECT name FROM suppliers WHERE kode = a.supplier ) AS supplier_name,(SELECT name FROM users WHERE id = a.created_by ) AS user  FROM purchases AS a WHERE kode = '$kode' AND finish = 1");
	}
	function get_order_id($id){
		return $this->db->query("SELECT *,(SELECT name FROM suppliers WHERE kode = a.supplier ) AS supplier_name,(SELECT name FROM users WHERE id = a.created_by ) AS user  FROM purchase_order AS a WHERE id = '$id'");
	}
	function get_purchases_id($id){
		return $this->db->query("SELECT *,(SELECT name FROM suppliers WHERE kode = a.supplier ) AS supplier_name,(SELECT name FROM users WHERE id = a.created_by ) AS user  FROM purchases AS a WHERE id = '$id'");
	}
	function get_purchases(){
		return $this->db->query("SELECT *,(SELECT name FROM suppliers WHERE kode = a.supplier ) AS supplier_name,(SELECT name FROM users WHERE id = a.created_by ) AS user  FROM purchases AS a WHERE finish = 1");
	}
	function get_purchases_lskode($kode){
		return $this->db->query("SELECT kode FROM purchases WHERE kode LIKE '%$kode%' ORDER BY id DESC");
	}
	function get_purchases_lsno(){
		return $this->db->query("SELECT no FROM purchases ORDER BY no DESC");
	}
	function get_purchases_limit($limit,$offset){
		return $this->db->query("SELECT *,(SELECT name FROM suppliers WHERE kode = a.supplier ) AS supplier_name,(SELECT name FROM users WHERE id = a.created_by ) AS user  FROM purchases AS a WHERE finish = 1 ORDER BY created_at DESC LIMIT $limit OFFSET $offset ");
	}
	function get_purchases_limit_src($limit,$offset,$src){
		return $this->db->query("SELECT *,(SELECT name FROM suppliers WHERE kode = a.supplier ) AS supplier_name,(SELECT name FROM users WHERE id = a.created_by ) AS user  FROM purchases AS a WHERE finish = 1 AND (kode LIKE '%$src%' OR item LIKE '%$src%' OR kode_item LIKE '%$src%') ORDER BY created_at DESC LIMIT $limit OFFSET $offset ");
	}
	function get_purchases_total(){
		return $this->db->query("SELECT count(id) AS row FROM purchases");
	}
	function get_purchases_finish($created){
		return $this->db->query("SELECT *,(SELECT name FROM suppliers WHERE kode = a.supplier ) AS supplier_name,(SELECT name FROM users WHERE id = a.created_by ) AS user  FROM purchases AS a WHERE finish = 0 AND created_by = $created");
	}
	function get_purchase_item($id){
		return $this->db->query("SELECT * FROM purchase_item WHERE purchase_id = '$id'");
	}
	function get_purchase_item_order($id){
		return $this->db->query("SELECT * FROM purchase_item WHERE order_id = '$id'");
	}
	function get_purchase_item_id($id){
		return $this->db->query("SELECT * FROM purchase_item WHERE id = '$id'");
	}
	function get_price_item_unit($id,$unit){
		return $this->db->query("SELECT * FROM price_units WHERE item_id = '$id' AND satuan = '$unit'");
	}
	function insert_purchases($data){
		$this->db->insert('purchases', $data);
	}
	function insert_purchase_item($data){
		$this->db->insert('purchase_item', $data);
	}
	function update_purchases($data,$id){
		$this->db->where('id',$id);
		$this->db->update('purchases',$data);	
	}
	function update_purchase_item($data,$id){
		$this->db->where('id',$id);
		$this->db->update('purchase_item',$data);	
	}
	function update_purchase_item_by_order($data,$id){
		$this->db->where('order_id',$id);
		$this->db->update('purchase_item',$data);	
	}
	function delete_purchases($id){
		$this->db->where('id',$id);
		$this->db->delete('purchases');	
	}
	function delete_purchase_item($id){
		$this->db->where('id',$id);
		$this->db->delete('purchase_item');	
	}
	function delete_purchase_item_rel($id){
		$this->db->where('purchase_id',$id);
		$this->db->delete('purchase_item');	
	}
}
