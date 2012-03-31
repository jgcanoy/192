<?php
class User extends CI_Controller {
	function index() {
		if($id = $this->session->userdata('id')) {
			$user = $this->session->all_userdata();
			if($message = $this->session->flashdata('msg')) {
				echo $message;
			}
			//echo "<h2>Hello, ".$user['fname']." ".$user['lname']."!</h2><br />";
			
			$this->load->model('users');
			
			if($user['isLeader'] == 1) {
				//echo "You are a team leader.<br />";
			} else if($user['isOfficer'] == 1) {
				//echo "You are an approving officer.<br />";
			}
			
			if($user['isAdmin'] == 1) {
				//echo "You are an admin.<br />".anchor('/user/logout', 'Logout');
				$this->users->getPending('requests');
				
				$data['t1'] = $this->users->getPending($user);
				$data['t2'] = $this->users->getApproved($user);
				$data['t3'] = $this->users->getDisapproved($user);
				
				$this->load->view('admin_header', $data);
				$this->load->view('admin_view', $data);
				$this->load->view('footer', $data);
			} else {
				//echo "You are a regular user.<br />".anchor('/user/logout', 'Logout');
				
				$data['t1'] = $this->users->getPending($user);
				$data['t2'] = $this->users->getApproved($user);
				$data['t3'] = $this->users->getDisapproved($user);
				
				$this->load->view('regular_header', $data);
				$this->load->view('regular_view', $data);
				$this->load->view('footer', $data);
			}
		} else {
			redirect('/main/');
		}
	}
	function view($refnum) {
		$user = $this->session->all_userdata();
		$this->db->select('*');
		$this->db->from('request');
		$this->db->where('cid', $user['cid']);
		$this->db->where('refnum', $refnum);
		$query = $this->db->get();
		$row = $query->row_array();
		
		$data['row'] = $row;
		$data['refnum'] = $refnum;
		$data['date'] = $row['date'];
		$data['type'] = $row['type'];
		$data['status'] = $row['status'];
		
		//user name, tl name, app name
		$this->load->model('users');
		$urow = $this->users->userRow($row['userid']);
		$u = $urow->row_array();
		$data['u'] = $u;
		$data['uname'] = $u['lname'].", ".$u['fname'];
		$trow = $this->users->userRow($row['teamid']);
		$t = $trow->row_array();
		$data['t'] = $t;
		$data['tname'] = $t['lname'].", ".$t['fname'];
		$arow = $this->users->userRow($row['appid']);
		$a = $arow->row_array();
		$data['a'] = $a;
		$data['aname'] = $a['lname'].", ".$a['fname'];
		
		$data['ptable'] = $this->users->getPartTable($refnum);
		$data['total'] = $this->users->getTotal($refnum);
		
		if($this->session->userdata('isAdmin') == 1) $this->load->view('admin_header');
		else if($user['id'] == $u['id'] || $user['id'] == $t['id'] || $user['id'] == $a['id']) $this->load->view('regular_header', $data);
		else redirect('/main/');
		$this->load->view('refnum_view', $data);
		$this->load->view('footer', $data);
	}
	
	function checkApproval($refnum) {
		if($this->input->post('t_approve') == 'Approve') {
			$data['teamapprove'] = 1; 
			$this->db->update('request', $data, 'refnum ='.$refnum);
		} else if($this->input->post('t_disapprove') == 'Disapprove') {
			$data['teamapprove'] = 0;
			$data['status'] = "Disapproved";
			$this->db->update('request', $data, 'refnum ='.$refnum);
		} else if($this->input->post('a_approve') == 'Approve') {
			$data['appoffapprove'] = 1;
			$data['status'] = "Approved";
			$this->db->update('request', $data, 'refnum ='.$refnum);
		} else if($this->input->post('a_disapprove') == 'Disapprove') {
			$data['appoffapprove'] = 0;
			$data['status'] = "Disapproved";
			$this->db->update('request', $data, 'refnum ='.$refnum);
		}
		redirect('/user/');
	}
	
	function delete($id) {
		$this->load->model('users');
		$data = $this->users->userRow($id)->row_array();
		
		if($this->session->userdata('isAdmin') == 1) {
			$this->load->view('delete_user', $data);
		} else redirect('/main/');
	}
	
	function cdelete($id) {
		if($this->input->post('delete') == "Confirm Delete") {
			$data['id'] = $id;
			$this->db->delete('users', $data);
			echo "User removed from database. ".anchor('/user/', 'Back to Home');
		} else {
			redirect('/main/edit');	
		}
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect('/main/');
	}
	function faqs(){
		$this->load->view('faqs_logged');
	}
	function contact(){
		$this->load->view('contact_logged');
	}
}
?>