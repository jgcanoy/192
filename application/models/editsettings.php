<?php
class Editsettings extends CI_Model{
	function _construct(){
		parent::_construct();
	
	}
	
	function edituser($id){

		$data = array(
					'lname' => $this->input->post('lname'),
					'fname' => $this->input->post('fname'),
					'mname' => $this->input->post('mname'),	
					'contact' => $this->input->post('contact'),					
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
					);
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}
	
	function editcompany($cid){
		$data = array(
					'cname' => $this->input->post('cname'),
					'cemail' => $this->input->post('cemail'),
					'caddr' => $this->input->post('caddr'),
					'cnum' => $this->input->post('cnum')			
					);
		$this->db->where('cid', $cid);
		$this->db->update('company', $data);	
	}	
}