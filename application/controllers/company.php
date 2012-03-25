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

		$cid = $this->session->userdata('id');		
//		$cid = '3';
		if($this->form_validation->run() == TRUE){
			$this->load->model('editsettings');
			$this->editsettings->editcompany($cid);	
//			$this->session->sess_destroy();			
			echo "Changes saved. ".anchor('/main/','Back to Home');	
			//paconnect nalang sa home
		}else{
			$this->db->select('cname, caddr, cemail, cnum')->where('cid', $cid);	
			$data = array();
			$data = $this->db->get('company')->row_array();

			$this->load->view('edit2', $data); 			
		}
	}
}