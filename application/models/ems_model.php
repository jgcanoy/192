<?php
class ems_model extends CI_Model{
	function _construct(){
		parent::_construct();
	}
	
	function forActivation($email,$key){
		$data = array('email'=>$email,'activationKey'=>$key);
		$this->db->insert('users',$data);
	}
	
	function verify($key){
		//set activate field to 1
		$data = array('activated'=>'1');
		$this->db->where('activationKey',$key);
		$this->db->update('users',$data);
		//get user data to start session
		$query = $this->db->get_where('users',array('activationKey'=>$key));
		return $query;
		//$row = $query->row_array();
		
		//echo $row['activationKey'];
		//return $query;
		
		
		
	}
	function get_userinfo($id){
		$query = $this->db->get_where('users',array('id'=>$id));
		$row = $query->row();
		return $row->id;
	}
	
	function updateUser($id){
		$pass = $this->encrypt->encode($_POST['pass']);
		$lname = $_POST['lname'];
		$fname = $_POST['fname'];
		$password = $pass;
		$admin = '1';
		$team = $this->input->post('team');
	
		$appoff = $this->input->post('appoff');
		
		
		$data = array('lname'=>$lname, 
					   'fname'=>$fname,
					   'password'=>$password,
					   'isAdmin' => $admin, 'isLeader'=>$team,
					   'isOfficer'=>$appoff);
		$this->db->where('id',$id);
		$this->db->update('users',$data);
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
	
	function addUser($key){
		$data['lname'] = $_POST['lname'];
		$data['fname'] = $_POST['fname'];
		$data['email'] = $_POST['email'];
		$data['password'] = $this->encrypt->encode($_POST['pass']);
		$data['isAdmin'] = $this->input->post('admin'); 
		$data['isLeader'] =$this->input->post('leader'); 
		$data['isOfficer'] = $this->input->post('appoff'); 
		$data['isRegular'] = $this->input->post('regular'); 
		$data['activationKey'] = $key;
		$data['cid'] = $this->session->userdata('cid');
		$this->db->insert('users',$data);
	}
	
	function getcid($name) {
		$this->db->select("*");
		$this->db->from("company");
		$this->db->where("cname", $name);
		$query = $this->db->get();
		
		$row = $query->row_array();
		
		return $row['cid'];
	}
}
?>