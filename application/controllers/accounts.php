<?php
class Accounts extends CI_Controller{
	function _construct(){
		parent::_construct();
	}

	function index(){
		$this->usersettings();
	}
	
	function usersettings()
	{
		$this->passcheck('hello');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<b class="error">', '</b>');
		$this->form_validation->set_rules('lname','Last Name','required|trim');
		$this->form_validation->set_rules('fname','First Name','required|trim');
		$this->form_validation->set_rules('oldpassword','Current Password','required|callback_passcheck');
		$this->form_validation->set_rules('password','New Password','required|trim');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[password]');
		$this->form_validation->set_message('required','%s is required');
		$this->form_validation->set_message('matches','Passwords do not match. Retype password.');

		$id = $this->session->userdata('id');		
		if($this->form_validation->run() == TRUE){
			$this->load->model('editsettings');
			$this->editsettings->edituser($id);	
			redirect('/accounts/changesuccess');	
		}else{
			$this->db->select('*');
			$this->db->where('id', $id);	
			$data = $this->db->get('users')->row_array();
			
			if($this->session->userdata('isAdmin') == 1) $this->load->view('admin_header');
			else $this->load->view('regular_header');
			$this->load->view('edit1', $data); 	
			$this->load->view('footer', $data);
		}
	}
	
	function changesuccess(){
		$this->load->view('reg_header');
		$data['message'] = "Changing account details successful";
		$this->load->view('message', $data);
		$this->load->view('footer');
	}
	
	function passcheck($password) {
		$this->load->library('form_validation');
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->where('id', $id);
		$data = $this->db->get('users')->row_array();
		
		$data['password'] = $this->encrypt->decode($data['password']);
		if($password == $data['password']) return TRUE;
		else {
			$this->form_validation->set_message('passcheck', 'Incorrect Password');
			return FALSE;
		}
	}
}