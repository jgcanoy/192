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
				//$this->users->getTable('requests');
				$this->load->library('table');
				
				$tmpl =  array ( 'table_open'  => '<table cellpadding="2" class="altrowstable" id="alternatecolor">' );
				$this->table->set_template($tmpl);
				$this->table->set_heading('Name', 'Color', 'Size');
				
				$this->table->add_row('Fred', 'Blue', 'Small');
				$this->table->add_row('Mary', 'Red', 'Large');
				$this->table->add_row('John', 'Green', 'Medium');
				
				$data['t1'] = $this->table->generate('alternatecolor');
				
				$this->load->view('admin_view', $data);
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