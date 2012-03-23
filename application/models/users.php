<?php
class Users extends CI_Model {
	function _construct() {
		parent::CI_Model();
	}
	function find($user = 0, $inpass = 0) {
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("email", $user);
		$query = $this->db->get();
		
		if($query->num_rows > 0) {
			$row = $query->row_array();
			$pass = $this->encrypt->decode($row['password']);
			
			if($user == $row['email'] && $pass == $inpass) return $row['id'];
			else {
				return 0;
			}
		} else {
			return 0;
		}
	}
	function userRow($id) {
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("id", $id);
		$query = $this->db->get();

		return $query;
	}
}
?>