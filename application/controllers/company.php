<?php
class Company extends CI_Controller{
	function _construct(){
		parent::_construct();
	}

	function index(){
		$this->companysettings();
	}
	
	function companysettings()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<b class="error">', '</b>');
		$this->form_validation->set_rules('cname','Company Name','required|trim');
		$this->form_validation->set_rules('cemail','Company Email','required|valid_email');
		$this->form_validation->set_message('required','%s is required');

		$cid = $this->session->userdata('cid');		
//		$cid = '3';
		if($this->form_validation->run() == TRUE){
			$this->load->model('editsettings');
			$this->editsettings->editcompany($cid);	
//			$this->session->sess_destroy();			
			redirect('/company/changesuccess');
			//paconnect nalang sa home
		} else {
			$this->db->select('cname, caddr, cemail, cnum')->where('cid', $cid);	
			//$data = array();
			$data = $this->db->get('company')->row_array();
			
			if($this->session->userdata('isAdmin') == 1) {
				$this->load->view('admin_header');
				$this->load->view('edit2', $data);
				$this->load->view('footer', $data); 			
			} else redirect('/main/');
		}
	}
	
	function changesuccess(){
		$this->load->view('reg_header');
		$data['message'] = "Changing company details successful";
		$this->load->view('message', $data);
		$this->load->view('footer');
	}
}