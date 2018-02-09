<?php
class Mlogin extends CI_Model{
	function __construct(){
		$this->load->database();
	}
	function maksi($data){		
		$d = $this->db->get_where('admin',$data);	
		return $d->num_rows();
	}
}
	function sukses(){
	$data = array(
		'USERNAME' => $this->session->userdata('USERNAME')
	);
	$this->load->view('home', $data);	
}
?>