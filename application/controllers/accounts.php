<?php
class Accounts extends CI_Controller{
	function _construct(){
		parent::_construct();
	}

	function index()
	{
		$this->register();	
	}
	
	function register(){
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<b class="error">', '</b>');
		$this->form_validation->set_rules('lname','Last Name','required|trim');
		$this->form_validation->set_rules('fname','First Name','required|trim');
		$this->form_validation->set_rules('password','Password','required|trum');
		$this->form_validation->set_message('required','%s is required');
		$this->form_validation->set_message('matches','Passwords do not match. Retype password.');
		$this->form_validation->set_rules('lname', 'Last Name', 'callback_show');			
		
		if($this->form_validation->run() == TRUE){
			$this->load->model('edituser');
			$this->edituser->adduser();
		}else{
			$this->load->view('reg1');
		}
	}
	
	function updateuser(){
		$this->load->database();
		$data = array(
					'lname' => $this->input->post('lname'),
					'fname' => $this->input->post('fname'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')	
					);

		$this->db->update('user', $data);
	}
}