<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_model {
	function __construct(){
	 	cek_login();
	}
	function content($title,$path,$data){
		$nav['title'] = $title;
		$nav['nav_label'] = $this->get_modul_main()->result();
		$this->load->view('asside/navbar', $nav);
		if ($path != 'none') {
			if (!empty($data['rm'])) {
				if ($data['rm']['access'] == 'Enabled') {
					$this->load->view($path, $data);
				}else{
					$this->load->view('errors/role/error_403',$data);
				}
			}else{
					$this->load->view($path, $data);
			}
		}
		$this->load->view('asside/footer');
	}
	function content_error($title,$path,$data){
		$nav['title'] = $title;
		$nav['nav_label'] = $this->get_modul_main()->result();
		$this->load->view('asside/navbar', $nav);
		$this->load->view('errors/role/error_403',$data);
		$this->load->view('asside/footer');
	}
	function alert_success($data){
		return $alert = '<div class="alert alert-success" role="alert">'.$data.'</div>';
	}
	function alert_danger($data){
		return $alert = '<div class="alert alert-danger" role="alert">'.$data.'</div>';
	}
	function generate_code($code,$limit,$current){
		if (!empty($current)) {
			$current = $current;
		}else{
			$current = 0;
		}
		$rep_kode 	= str_replace($code, '', $current);
		$num_kode 	= str_replace(',', '', number_format($rep_kode));
		$num_kode2 	= ($num_kode + 1);

 		return $code.str_pad($num_kode2, $limit, '0', STR_PAD_LEFT);
	}
	function generate_notrx($code,$limit,$current){
		$dept = $this->session->userdata('dept');

		if (!empty($current)) {
			$current = $current;
		}else{
			$current = 0;
		}
		$urut 	= ($current + 1);

 		return str_pad($urut, $limit, '0', STR_PAD_LEFT)."/".$code."/".$dept."/".date('md');
	}

	function pagination($seg,$total,$path){
		if (!empty($this->session->userdata('per_page'))) {
			$per_page = $this->session->userdata('per_page');
		}else{
			$per_page = 10;
		}
		$this->load->library('pagination');
		$config['base_url'] = $path;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = 2;
		$config['num_links'] = 3;
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

		//echo $config['base_url'];

		if ($seg != NULL){ 
			$offset	= $seg; 
		
			$set = '';
		}else{ 
			$offset = 0;
		}
		$limit 		= $config['per_page'];

		
		$this->pagination->initialize($config);
		
		$data['limit'] 		= $limit;
		$data['row'] 		= $per_page;
		$data['offset'] 	= $offset;
		$data['pg_link'] 	= $this->pagination->create_links();
		$data['page_rows'] 	= $this->get_page_rows()->result();
		return $data;
	}
	function get_page_rows(){
		return $this->db->query("SELECT * FROM page_rows");
	}
	function get_modul_main(){
		$role_id = $this->session->userdata('role_id');
		return $this->db->query("SELECT a.id,a.name,a.type,a.path,a.parent,a.icon,a.treeview,a.kode
										FROM modules AS a 
										JOIN role_modules AS b ON a.id = b.module_id 
										WHERE a.type = 'main'
										AND b.role_id = '$role_id' 
										AND b.access = 'Enabled' 
										ORDER BY a.sort ASC");
	}
	function get_modul_sub($parent){
		$role_id = $this->session->userdata('role_id');
		return $this->db->query("SELECT a.id,a.name,a.type,a.path,a.parent,a.icon,a.treeview,a.kode
										FROM modules AS a 
										JOIN role_modules AS b ON a.id = b.module_id 
										WHERE a.type = 'sub'
										AND a.parent = '$parent' 
										AND b.role_id = '$role_id' 
										AND b.access = 'Enabled' 
										ORDER BY a.sort ASC");
	}
}
