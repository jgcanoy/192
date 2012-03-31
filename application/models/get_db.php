<?php

class Get_db extends CI_Model{
	function getAll(){
	
		$query=$this->db->query("SELECT * FROM users");
	
		return $query->result();
	}
	function insert1($data){
	$this->db->insert("users",$data);
	
	}
	function update1($email,$id){
	//$this->db->query('UPDATE cs192 SET email='.$email 'WHERE id='.$id);
	}
	/*function update2($data){
	$this->db->update("users",$data,"id");
	
	}*/
	function delete1($data){
	$this->db->delete("users",$data);
	
	}
	function delete_check($id){
        $this->db->query('DELETE FROM users WHERE id ='.$id);
	}
	/*function edit_check($id){
       $this->db->query('UPDATE cs192 SET email='.$email 'WHERE id='.$id);
	}*/
}