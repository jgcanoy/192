<?php
class Form extends CI_Controller {
	function index(){
		 #Input and textarea field attributes
    
    $data['email'] = array('name' => 'email', 'id' => 'email');
	$data['lname'] = array('name' => 'lname', 'id' => 'lname');
	$data['fname'] = array('name' => 'fname', 'id' => 'fname');
	$this->load->library('form_validation');
	//$rules['email'] = "required|valid_email";
	//$rules['lname'] = "required";
	//$rules['lname'] = "required";
	$this->form_validation->set_rules('email','Email','required');
	$this->form_validation->set_rules('lname','Last Name','required');
	$this->form_validation->set_rules('fname','First Name','required');
	#$this->load->view('viewForm', $data);
	if ($this->form_validation->run() == FALSE){
		$this->load->view('viewForm', $data);
	}else{
		$email = $this->input->post('email');
		$lname = $this->input->post('lname');
		$fname = $this->input->post('fname');
		
		$this->load->model('Form_model','', TRUE);
		$this->Form_model->add_user();
		$this->load->view('formsuccess');
	}
	}
	
	/*function submit(){
		$email = $this->input->post('email');
		$lname = $this->input->post('lname');
		$fname = $this->input->post('fname');
		
		$this->load->model('Form_model','', TRUE);
		$this->Form_model->add_user();
		$this->load->view('formsuccess');
    }*/
	
	function view_users(){
		//this->load->library('table');
		//$this->load->library('calendar');
		//echo $this->calendar->generate();
		$this->load->model('Form_model','',TRUE);
		$data['query'] = $this->Form_model->list_users();
		$this->load->view('results',$data);
	}
}
?>