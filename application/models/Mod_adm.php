<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_adm extends CI_model {
	function cek_login($user,$pass){
		return $this->db->query("SELECT *,(SELECT name FROM roles WHERE id = a.role_id) AS role_name FROM users AS a WHERE user_name = '$user' AND password = '$pass'");

	}
	function get_role(){
		return $this->db->query("SELECT * FROM roles");
	}
	function get_gudang(){
		return $this->db->query("SELECT * FROM warehouses");
	}
	function get_role_by_id($id){
		return $this->db->query("SELECT * FROM roles WHERE id = '$id'");
	}
	function get_users(){
		return $this->db->query("SELECT *,(SELECT name FROM roles WHERE id = a.role_id) AS role_name FROM users AS a");
	}
	function get_items(){
		return $this->db->query("SELECT * FROM items ORDER BY date_entered DESC");
	}
	function get_items_kode($kode){
		return $this->db->query("SELECT * FROM items WHERE kode = '$kode'");
	}
	function get_modules(){
		return $this->db->query("SELECT *,(SELECT name FROM modules WHERE kode = a.parent) AS parent_name FROM modules AS a ORDER BY type ASC");
	}
	function get_module_by_kode($kode){
		return $this->db->query("SELECT *,(SELECT name FROM modules WHERE kode = a.parent) AS parent_name FROM modules AS a WHERE kode = '$kode'");
	}
	function get_users_by_username($user){
		return $this->db->query("SELECT * FROM users WHERE user_name = '$user'");
	}
	function get_users_by_id($id){
		return $this->db->query("SELECT * FROM users WHERE id = '$id'");
	}
	function get_role_module_rel($role_id,$module_id){
		return $this->db->query("SELECT * FROM role_modules WHERE role_id = '$role_id' AND module_id = '$module_id'");
	}
	function get_item_types(){
		return $this->db->query("SELECT * FROM item_types");
	}
	function cek_item_types($kode){
		return $this->db->query("SELECT * FROM item_types WHERE kode = '$kode'");
	}
	function get_items_lskode(){
		return $this->db->query("SELECT kode FROM items WHERE custom_code = 0 ORDER BY created_at DESC");
	}
	function get_item_brands(){
		return $this->db->query("SELECT * FROM item_brands");
	}
	function get_item_units(){
		return $this->db->query("SELECT * FROM item_units");
	}
	function get_items_limit($limit,$offset){
		return $this->db->query("SELECT * FROM items ORDER BY created_at DESC LIMIT $limit OFFSET $offset ");
	}
	function get_items_limit_src($limit,$offset,$src){
		return $this->db->query("SELECT * FROM items WHERE kode LIKE '%$src%' OR name LIKE '%$src%' ORDER BY created_at DESC  LIMIT $limit OFFSET $offset ");
	}
	function get_items_total(){
		return $this->db->query("SELECT count(id) AS row FROM items");
	}
	function get_suppliers(){
		return $this->db->query("SELECT * FROM suppliers");
	}
	function get_sales(){
		return $this->db->query("SELECT * FROM sales");
	}
	function get_regions(){
		return $this->db->query("SELECT * FROM regions");
	}
	function get_region_sub(){
		return $this->db->query("SELECT * FROM region_sub");
	}
	function get_price_units($item_id){
		return $this->db->query("SELECT * FROM price_units WHERE item_id = '$item_id' ");
	}
	function cek_item_brands($kode){
		return $this->db->query("SELECT * FROM item_brands WHERE kode = '$kode'");
	}
	function cek_item_units($kode){
		return $this->db->query("SELECT * FROM item_units WHERE kode = '$kode'");
	}
	function cek_items($kode){
		return $this->db->query("SELECT * FROM items WHERE kode = '$kode' AND status != 'new'");
	}
	function cek_item_id($id){
		return $this->db->query("SELECT * FROM items WHERE id = '$id'");
	}
	function get_item_status($status){
		return $this->db->query("SELECT * FROM items WHERE status = '$status'");
	}
	function insert_user($data){
		$this->db->insert('users',$data);
	}
	function insert_role_module($data){
		$this->db->insert('role_modules',$data);
	}
	function insert_roles($data){
		$this->db->insert('roles',$data);
	}
	function insert_item_types($data){
		$this->db->insert('item_types',$data);
	}
	function insert_item_brands($data){
		$this->db->insert('item_brands',$data);
	}
	function insert_item_units($data){
		$this->db->insert('item_units',$data);
	}
	function insert_items($data){
		$this->db->insert('items', $data);
	}
	function insert_price_units($data){
		$this->db->insert('price_units', $data);
	}
	function delete_user($id){
		$this->db->where('id',$id);
		$this->db->delete('users');
	}
	function delete_roles($id){
		$this->db->where('id',$id);
		$this->db->delete('roles');
	}
	function delete_role_modules($id){
		$this->db->where('role_id',$id);
		$this->db->delete('role_modules');
	}
	function deleted_item_types($id){
		$this->db->where('id',$id);
		$this->db->delete('item_types');
	}
	function deleted_item_brands($id){
		$this->db->where('id',$id);
		$this->db->delete('item_brands');
	}
	function deleted_item_units($id){
		$this->db->where('id',$id);
		$this->db->delete('item_units');
	}
	function deleted_item($id){
		$this->db->where('id',$id);
		$this->db->delete('items');
	}
	function deleted_new(){
		$this->db->where('status', 'new');
		$this->db->delete('items');
	}
	function update_user($data,$id){
		$this->db->where('id',$id);
		$this->db->update('users',$data);
	}
	function update_item($data,$id){
		$this->db->where('id',$id);
		$this->db->update('items',$data);
	}
	function update_role_module($data,$id){
		$this->db->where('id',$id);
		$this->db->update('role_modules',$data);	
	}
	function update_roles($data,$id){
		$this->db->where('id',$id);
		$this->db->update('roles',$data);	
	}
}
