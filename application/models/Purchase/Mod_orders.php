<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_orders extends CI_model {

	function cek_orders($kode){
		return $this->db->query("SELECT *,(SELECT name FROM suppliers WHERE kode = a.supplier ) AS supplier_name,(SELECT name FROM users WHERE id = a.created_by ) AS user  FROM purchase_order AS a WHERE kode = '$kode' AND finish = 1");
	}
	function get_orders_id($id){
		return $this->db->query("SELECT *,(SELECT name FROM suppliers WHERE kode = a.supplier ) AS supplier_name,(SELECT name FROM users WHERE id = a.created_by ) AS user FROM purchase_order AS a WHERE id = '$id'");
	}
	function get_orders(){
		return $this->db->query("SELECT *,(SELECT name FROM suppliers WHERE kode = a.supplier ) AS supplier_name,(SELECT name FROM users WHERE id = a.created_by ) AS user  FROM purchase_order AS a");
	}
	function get_orders_lskode($kode){
		return $this->db->query("SELECT kode FROM purchase_order WHERE kode LIKE '%$kode%' ORDER BY no DESC");
	}
	function get_orders_lsno(){
		return $this->db->query("SELECT no FROM purchase_order ORDER BY no DESC");
	}
	function get_orders_limit($limit,$offset){
		return $this->db->query("SELECT *,(SELECT name FROM suppliers WHERE kode = a.supplier ) AS supplier_name,(SELECT name FROM users WHERE id = a.created_by ) AS user  FROM purchase_order AS a  WHERE finish = 1 ORDER BY created_at DESC LIMIT $limit OFFSET $offset ");
	}
	function get_orders_limit_src($limit,$offset,$src){
		return $this->db->query("SELECT *,(SELECT name FROM suppliers WHERE kode = a.supplier ) AS supplier_name,(SELECT name FROM users WHERE id = a.created_by ) AS user  FROM purchase_order AS a WHERE (kode LIKE '%$src%' OR item LIKE '%$src%' OR kode_item LIKE '%$src%') AND finish = 1 ORDER BY created_at DESC LIMIT $limit OFFSET $offset ");
	}
	function get_orders_total(){
		return $this->db->query("SELECT count(id) AS row FROM purchase_order");
	}
	function get_orders_finish($created){
		return $this->db->query("SELECT *,(SELECT name FROM suppliers WHERE kode = a.supplier ) AS supplier_name,(SELECT name FROM users WHERE id = a.created_by ) AS user  FROM purchase_order AS a WHERE finish = 0 AND created_by = $created");
	}
	function get_prc_orders_limit_src($limit,$offset,$src){
		return $this->db->query("SELECT * FROM purchase_order WHERE (kode_purchase is null OR kode_purchase = '') AND kode LIKE '%$src%' OR supplier LIKE '%$src%' ORDER BY created_at DESC  LIMIT $limit OFFSET $offset ");
	}
	function get_prc_orders_limit($limit,$offset){
		return $this->db->query("SELECT * FROM purchase_order WHERE (kode_purchase is null OR kode_purchase = '') ORDER BY created_at DESC LIMIT $limit OFFSET $offset ");
	}
	function insert_orders($data){
		$this->db->insert('purchase_order', $data);
	}
	function update_orders($data,$id){
		$this->db->where('id',$id);
		$this->db->update('purchase_order',$data);	
	}
	function delete_orders($id){
		$this->db->where('id',$id);
		$this->db->delete('purchase_order');	
	}
}
