<?php
	class Main extends CI_Controller {
		function _construct() {
			parent::CI_Controller();
		}
		function index() {
			if($this->session->userdata('id')) redirect('/user/');
			else {
				$data['title'] = "ExQuest | Log-in";
				$data['css'] = base_url()."/css/theme.css";
				
				$this->load->view('login_view.php', $data);
			}
		}
		function check() {
			$this->load->model('users');
			$id = $this->users->find($_POST['email'], $_POST['pass']);
			if($id != 0) {
				$query = $this->users->userRow($id);
				$user = $query->row_array();
				$this->session->set_userdata($user);
				redirect('/user/');
			}
			else {
				echo "Login Failed. ";
				echo anchor('/', 'Back to Home');
			}
		}
		function sendsuccess() {
			$data['title'] = "ExQuest | Register";
			
			$this->load->view('send_success', $data);
		}
	}
?>