<?php
class Edituser extends CI_Model{
	function _construct(){
		parent::_construct();
	
	}
	
	function adduser(){
		
		
		$data = array(
					'lname' => $this->input->post('lname'),
					'fname' => $this->input->post('fname'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')	
					);
		$this->db->insert('user', $data);
	}
	
	function updateuser(){
		$this->load->database();
		$data = array(
					'lname' => $this->input->post('lname'),
					'fname' => $this->input->post('fname'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')	
					);

		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}
}