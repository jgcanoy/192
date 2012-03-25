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
	
	function findwithkey($key = 0) {
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("activationKey", $key);
		$query = $this->db->get();
		
		$row = $query->row_array();
		return $row;
	}
	
	function userRow($id) {
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("id", $id);
		$query = $this->db->get();
		
		return $query;
	}
	
	function updateUserCompany($cid, $user)  {
		$data['cid'] = $cid;
		$this->db->update('users', $data, "id = ".$user);
	}
	
	function getPending($user) {
		$tmpl =  array ( 'table_open'  => '<table cellpadding="2" class="altrowstable" id="alternatecolor">' );
		$this->table->set_template($tmpl);
		
		$this->db->select('*');
		$this->db->from('request');
		$this->db->join('users', 'users.id = request.userid');
		$this->db->where('request.cid', $user['cid']);
		$this->db->where('status', 'Pending');
		if($user['isAdmin'] == 0) {
			if($user['isLeader'] == 1) $this->db->where('teamid', $user['id']);
			if($user['isOfficer'] == 1) $this->db->where('appid', $user['id']);
			$this->db->or_where('userid', $user['id']);
		}
		$this->db->order_by('refnum', 'desc');
		
		$query = $this->db->get();
		
		if($user['isLeader'] == 0 && $user['isOfficer'] == 0) {
			$this->table->set_heading('Ref. No.', 'Date', 'Name', 'Type', 'Total Amount');
			foreach($query->result() as $row) {
				$total = $this->getTotal($row->refnum);
				$this->table->add_row(anchor('user/view/'.$row->refnum,$row->refnum), $row->date, $row->fname." ".$row->lname, $row->type, $total);
			}
		} else {
			$this->table->set_heading('Ref. No.', 'Date', 'Name', 'Type', 'Total Amount', 'Status');
			foreach($query->result() as $row) {
				$total = $this->getTotal($row->refnum);
				$status = '';
				if($user['isLeader'] == 1) {
					if($row->teamid == $user['id']) $status = "<input type=\"button\" class=\"chkbtn\" name=\"approve\" onClick=\"\">
					<input type=\"button\" class=\"crsbtn\" name=\"disapprove\" onClick=\"\">";
				}
				if($user['isOfficer'] == 1) {
					if($row->appid == $user['id']) $status = "<input type=\"button\" class=\"chkbtn\" name=\"approve\" onClick=\"\">
					<input type=\"button\" class=\"crsbtn\" name=\"disapprove\" onClick=\"\">";
				}
				$this->table->add_row(anchor('user/view/'.$row->refnum,$row->refnum), $row->date, $row->fname." ".$row->lname, $row->type, $total, $status);
			}
		}
				
		return $this->table->generate();
	}
	
	function getApproved($user) {
		$tmpl =  array ( 'table_open'  => '<table cellpadding="2" class="altrowstable" id="alternatecolor1">' );
		$this->table->set_template($tmpl);
		
		$this->db->select('*');
		$this->db->from('request');
		$this->db->join('users', 'users.id = request.userid');
		$this->db->where('request.cid', $user['cid']);
		$this->db->where('status', 'Approved');
		if($user['isAdmin'] == 0) {
			if($user['isLeader'] == 1) $this->db->where('teamid', $user['id']);
			if($user['isOfficer'] == 1) $this->db->where('appid', $user['id']);
			$this->db->or_where('userid', $user['id']);
		}
		$this->db->order_by('refnum', 'desc');
		
		$query = $this->db->get();
		
		$this->table->set_heading('Ref. No.', 'Date', 'Name', 'Type', 'Total Amount');
		foreach($query->result() as $row) {
			$total = $this->getTotal($row->refnum);
			$this->table->add_row(anchor('user/view/'.$row->refnum,$row->refnum), $row->date, $row->fname." ".$row->lname, $row->type, $total);
		}
			
		return $this->table->generate();
	}
	
	function getDisapproved($user) {
		$tmpl =  array ( 'table_open'  => '<table cellpadding="2" class="altrowstable" id="alternatecolor2">' );
		$this->table->set_template($tmpl);
		
		$this->db->select('*');
		$this->db->from('request');
		$this->db->join('users', 'users.id = request.userid');
		$this->db->where('request.cid', $user['cid']);
		$this->db->where('status', 'Disapproved');
		if($user['isAdmin'] == 0) {
			if($user['isLeader'] == 1) $this->db->where('teamid', $user['id']);
			if($user['isOfficer'] == 1) $this->db->where('appid', $user['id']);
			$this->db->or_where('userid', $user['id']);
		}
		$this->db->order_by('refnum', 'desc');
		
		$query = $this->db->get();
		
		echo $query->num_rows();
		
		$this->table->set_heading('Ref. No.', 'Date', 'Name', 'Type', 'Total Amount');
		foreach($query->result() as $row) {
			$total = $this->getTotal($row->refnum);
			$this->table->add_row(anchor('user/view/'.$row->refnum,$row->refnum), $row->date, $row->fname." ".$row->lname, $row->type, $total);
		}
			
		return $this->table->generate();
	}
	
	function getPart($refnum) {
		$this->db->select('*');
		$this->db->from('particulars');
		$this->db->where('refnum', $refnum);
		
		$query = $this->db->get();
		return $query;
	}
	
	function getPartTable($refnum) {
		$query = $this->getPart($refnum);
		
		$tmpl =  array ( 'table_open'  => '<table cellpadding="2" class="altrowstable" id="alternatecolor2">' );
		$this->table->set_template($tmpl);
		
		$this->table->set_heading('Particulars', 'Quantity', 'Price', 'Total Amount');
		
		foreach($query->result() as $row) {
			$total = $this->getTotal($refnum);
			$this->table->add_row($row->particulars, $row->quantity, $row->price, $row->quantity*$row->price);
		}
		
		return $this->table->generate();
	}
	
	function getTotal($refnum) {
		$query = $this->getPart($refnum);
		$total = 0;
		foreach($query->result() as $row) {
			$total = $row->price * $row->quantity;
		}
		return $total;
	}
}
?>