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
//		$id = '5';
		if($this->form_validation->run() == TRUE){
			$this->load->model('editsettings');
			$this->editsettings->edituser($id);	
//			$this->session->sess_destroy();			
			echo "Changes saved. ".anchor('/main/','Back to Home');	
			//paconnect nalang sa home
		}else{
			$this->db->select('*');
			//$this->db->from('users');
			$this->db->where('id', $id);	
			//$data = array();
			$data = $this->db->get('users')->row_array();
			
			$this->load->view('edit1', $data); 			
		}
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