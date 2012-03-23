<?php
class User extends CI_Controller {
	function index() {
		if($id = $this->session->userdata('id')) {
			$user = $this->session->all_userdata();
			
			echo "<h2>Hello, ".$user['fname']." ".$user['lname']."!</h2><br />";
			
			if($user['isLeader'] == 1) {
				echo "You are a team leader.<br />";
			} else if($user['isOfficer'] == 1) {
				echo "You are an approving officer.<br />";
			}
			
			if($user['isAdmin'] == 1) {
				echo "You are an admin.<br />".anchor('/user/logout', 'Logout');
				//$this->load->view('admin_view');
			} else {
				echo "You are a regular user.<br />".anchor('/user/logout', 'Logout');
				//$this->load->view('regular_view');
			}
		} else {
			redirect('/main/');
		}
	}
	function logout() {
		$this->session->sess_destroy();
		redirect('/main/');
	}
}
?>