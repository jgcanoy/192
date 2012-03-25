<?php
class User extends CI_Controller {
	function index() {
		if($id = $this->session->userdata('id')) {
			$user = $this->session->all_userdata();
			
			echo "<h2>Hello, ".$user['fname']." ".$user['lname']."!</h2><br />";
			
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
				
				$this->load->view('admin_view', $data);
			} else {
				echo "You are a regular user.<br />".anchor('/user/logout', 'Logout');
				//$this->load->view('regular_view');
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
		
		$data['refnum'] = $refnum;
		$data['date'] = $row['date'];
		$data['type'] = $row['type'];
		$data['status'] = $row['status'];
		
		//user name, tl name, app name
		$this->load->model('users');
		$urow = $this->users->userRow($row['userid']);
		$u = $urow->result();
		//echo $u->lname;
		
		$data['ptable'] = $this->users->getPartTable($refnum);
		
		if($user['isAdmin'] == 1 || $user['id'] == $data['userid'] || 
			$user['id'] == $data['teamid'] || $user['id'] == $data['appid']) {
			//$this->load->view('refnum_view', $data);
		} else {
			redirect("/main/");
		}
	}
	function logout() {
		$this->session->sess_destroy();
		redirect('/main/');
	}
}
?>