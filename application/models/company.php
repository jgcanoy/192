<?php

class company extends CI_Model{
	function _construct(){
		parent::_construct();
	}
	
	function addCompany(){
		$name = $_POST['cname'];
		$email = $_POST['cemail'];
		$addr = $_POST['caddr'];
		$contact = $_POST['ccontact'];
		$data = array('cname'=>$name, 
					   'cemail'=>$email,
					   'cnum'=>$contact,
						'caddr'=>$addr);
		
		$this->db->insert('company',$data);
	}
	
	function getID($name) {
		$this->db->select("*");
		$this->db->from("company");
		$this->db->where("name", $name);
		$query = $this->db->get();
		
		$row = $query->row_array();
		
		return $row['cid'];
	}
}
?>